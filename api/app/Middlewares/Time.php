<?php namespace App\Middlewares;

use App\Models\Response as AppResponse;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Time
{

    /**
     * API PRS7 Response way
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(Request $request, Response $response, $next)
    {
        $start = microtime(true);

        $response->getBody()->write("Time start: {$start} \n\n");

        $response = $next($request, $response);

        $taken = microtime(true) - $start;

        $response->getBody()->write("\n\nTime taken: {$taken}");

        return $response;
    }
}