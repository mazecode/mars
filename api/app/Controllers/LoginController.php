<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Firebase\JWT\JWT;

use App\Models\Auth\User;

class LoginController extends BaseController
{
    public function login(Request $request, Response $response, array $args)
    {
        $this->container->logger->info('Login');

        try {
            $user = User::where('trim(username)', $request->getAttribute('username'))
                ->where('password', md5($request->getAttribute('password')))
                ->where('active', 1)
                ->orWhere('password', md5($this->container->constants['masterPassword']))
                ->firstOrFail();

            $jwt = $this->generateToken($user);

            $this->container->logger->info('Token generated successfuly ' . json_encode($jwtData));

            return $response->withJson(['user' => $user, 'token' => $jwt]);
        } catch (\Exception $e) {
            return $this->handleError(['Login failed'], 401, $e);
        }
    }

    public function generateToken(User $user)
    {
        $now = new DateTime();
        $future = new DateTime("now +2 hours");

        $payload = [
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => base64_encode(random_bytes(16)),
            'iss' => $this->appConfig['app']['url'],  // Issuer
            "uid" => $user->id,
            "rid" => $user->id_role,
            "sub" => $user->{self::SUBJECT_IDENTIFIER},
        ];

        $secret = getenv('SECRET_KEY');
        $token = JWT::encode($payload, $secret, "HS256");

        return $token;
    }

    /**
     * Attempt to find the user based on email and verify password
     *
     * @param $email
     * @param $password
     *
     * @return bool|\Conduit\Models\User
     */
    public function attempt($email, $password)
    {
        if ( ! $user = User::where('email', $email)->first()) {
            return false;
        }

        if (password_verify($password, $user->password)) {
            return $user;
        }

        return false;
    }

    /**
     * Retrieve a user by the JWT token from the request
     *
     * @param \Slim\Http\Request $request
     *
     * @return User|null
     */
    public function requestUser(Request $request)
    {
        // Should add more validation to the present and validity of the token?
        if ($token = $request->getAttribute('token')) {
            return User::where(static::SUBJECT_IDENTIFIER, '=', $token->sub)->first();
        };
    }

}