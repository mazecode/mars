<?php namespace App\Middlewares;

use App\Models\Response as AppResponse;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Time
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $server = $request->getServerParams();
        if (!isset($server['REQUEST_TIME_FLOAT'])) {
            $server['REQUEST_TIME_FLOAT'] = microtime(true);
        }
        $response = $next($request, $response);
        $time = (microtime(true) - $server['REQUEST_TIME_FLOAT']) * 1000;

        return $response->withHeader('X-Response-Time', sprintf('%2.3fms', $time));
    }
}