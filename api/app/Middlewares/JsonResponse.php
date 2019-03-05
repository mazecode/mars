<?php namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class JsonResponse
{
    private $limit;
    private $remaining;
    private $reste;

    public function __construct($limit = 30, $remaining = 11, $reset = 44)
    {
        $this->limit = $limit;
        $this->remaining = $remaining;
        $this->reset = $reset;
    }

    public function __invoke(Request $request, Response $response, $next)
    {
        $response = $next($request, $response);

        $body = (string)$response->getBody();

        if (empty(json_decode($body))) return $response;

        $response = $this->validateHeaders($request, $response);

        return $response
            ->withHeader('X-RateLimit-Limit', $this->limit) // How many requests the user is allowed to make in an hour.
            ->withHeader('X-RateLimit-Remaining', $this->remaining) // How many requests the user can make in the remaning time (before they exceed their rate limit).
            ->withHeader('X-RateLimit-Reset', $this->reset) // The time at which the rate limit will be reset (when they enter a new time period).
            ->withHeader('X-Powered-By', 'Vodafone');
    }

    private function validateHeaders(Request $request, Response $response)
    {
        $accept = $request->getHeader('Content-Type');

        if (!$accept || !preg_match('#^application/([^+\s]+\+)?json#', implode(',', $accept))) {
            $response = $response->addMessage('Headers not allowed')->setError(true)->withJson([], 406);
        }

        return $response;
    }
}