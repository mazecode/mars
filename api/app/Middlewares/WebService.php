<?php namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class WebService
{
    public function __invoke(Request $request, Response $response, $next)
    {
        // $body = (string) $response->getBody()->__toString(); // Before
        $response = $next($request, $response);
        // $body = (string)$response->getBody()->__toString(); // After
        // if (empty(json_decode($body))) return $response;
        

        return $response;
    }
}
