<?php namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Auth
{

    public function __invoke(Request $request, Response $response, $next)
    {
        $response = $next($request, $response);

        $body = (string) $response->getBody();

        if(empty(json_decode($body))) return $response;
    }
}