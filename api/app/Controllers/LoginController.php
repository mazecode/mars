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
            // $user = User::where('trim(username)', $request->getAttribute('username'))
            //     ->where('password', md5($request->getAttribute('password')))
            //     ->where('active', 1)
            //     // ->orWhere('password', md5($this->container->constants['masterPassword']))
            //     ->firstOrFail();

            $user = User::find(2);
            $user->id_role = 2;

            $jwtData = [
                "iat" => time(),
                "exp" => round(microtime(true)) + 6000,
                "userId" => $user->id,
                "roleId" => $user->id_role
            ];
            $jwt = JWT::encode($jwtData, getenv('SECRET_KEY'));

            $this->container->logger->info('Token generated successfuly ' . json_encode($jwtData));

            return $response->withJson(['user' => $user, 'token' => $jwt]);
        } catch (\Exception $e) {
            return $this->handleError(['Login failed'], 401, $e);
        }
    }
}