<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Firebase\JWT\JWT;
use DateTime;

use App\Models\Auth\User;

use Respect\Validation\Validator as V;



class LoginController extends BaseController
{
    public static $SUBJECT_IDENTIFIER = 'username';

    /**
     * Login main POST function
     * 
     * @param $request \Request
     * @param $response \Response
     * @param $args array
     * 
     * @return json|Response
     */
    public function login(Request $request, Response $response, array $args)
    {
        $this->container->logger->info('Login');

        try {
            // dd($this->validator);

            // $validator = $this->validator->validate($request, [
            //     'username' => V::notEmpty()->length(3, 50),
            //     'password' => V::notEmpty()->length(5, 20)
            // ]);

            // if ($validator) return $response->addMessage('Validation error')->withError($validator->getErrors(), 422);
            // // if (!$validator->isValid()) return $response->addMessage('Validation error')->withError($validator->getErrors(), 422);

            $user = User::where('username', $request->getParam('username'))->where('is_active', true);

            if ($request->getParam('password') == $this->container->constants['masterPassword']) {
                $user = $user->firstOrFail();
            } else {
                $user = $user->where('password', md5($request->getParam('password')))->firstOrFail();
            }

            $jwt = $this->generateToken($user);

            $this->container->logger->info('Token generated successfuly ' . $jwt);

            return $response->withJson(['user' => $user, 'token' => $jwt]);

        } catch (\Exception $e) {
            return $this->handleError($this->trans('errors.login.failed'), 401, $e);
        }
    }

    /**
     * Generate authentication token
     * 
     * @param $user \App\Models\Auth\User
     * 
     * @return string|null
     */
    public function generateToken(User $user)
    {
        $now = new DateTime();
        $future = new DateTime("now +2 hours");

        $payload = [
            "iat" => $now->getTimeStamp(),
            "exp" => $future->getTimeStamp(),
            "jti" => base64_encode(random_bytes(16)),
            'iss' => $this->container->get('settings')['app']['url'],  // Issuer
            "uid" => (int)$user->id,
            "rid" => (int)$user->id_role,
            "sub" => $user->username,
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
     * @return bool|\App\Models\Auth\User
     */
    public function attempt($email, $password)
    {
        if (!$user = User::where('email', $email)->first()) {
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
            return User::where(self::$SUBJECT_IDENTIFIER, '=', $token->sub)->first();
        };
    }
}