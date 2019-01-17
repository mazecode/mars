<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Firebase\JWT\JWT;

use App\Models\Descuento;

class DescuentoController extends BaseController
{

    public function login(Request $request, Response $response, array $args)
    {
        try {
            // $user = ToolUser::where('trim(username)', $request->getAttribute('username'))
            //     ->where('password', md5($request->getAttribute('password')))
            //     ->where('active', 1)
            //     ->firstOrFail();

            // ->orWhere('password', md5($this->container->constants['masterPassword']))

            $user = ToolUser::find(2);

            $user->id_role = 2;

            $jwt = JWT::encode(
                [
                    "iat" => time(),
                    "exp" => round(microtime(true)) + 6000,
                    "userId" => $user->id,
                    "roleId" => $user->id_role
                ],
                getenv('SECRET_KEY')
            );

            return $response->withJson(['user' => $user, 'token' => $jwt], 200);
        } catch (\Exception $e) {
            return $response->setError(true)
                ->addMessage('User not found')
                ->addMessage(getenv('APP_DEBUG') ? $e->getMessage() : '')
                ->withJson([], 502);
        }
    }
}