<?php namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class JsonResponse
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
        $response = $next($request, $response);

        $body = (string) $response->getBody();

        if(empty(json_decode($body))) return $response;
        
        $accept = $request->getHeader('Content-Type');
        if (!$accept || !preg_match('#^application/([^+\s]+\+)?json#', implode(',', $accept))) {
            $response = $response->setError(true)->withJson([], 406);
        }

        return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:8888/')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->withHeader('X-Powered-By', '127.0.0.1');

    }
}