<?php namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Roles
{

    public function __invoke(Request $request, Response $response, $next)
    {
        $authHeader = $request->getHeader('Authorization');
        $reqPath = $request->getUri()->getPath();
        $authHeaderDecoded = JWT::decode($authHeader[0], getenv('SECRET_KEY'),array('HS256'));
        
        if($authHeaderDecoded->roleId == '3' || $authHeaderDecoded->roleId == '11'){
            $response = $next($request, $response);
        } else {
            $response->getBody()->write($this->settings['errors']['403']['title']);
        }
        
        return $response;
    }
}