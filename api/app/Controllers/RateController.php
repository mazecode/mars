<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Firebase\JWT\JWT;

use App\Models\Rate;

class RateController extends BaseController
{
    public function index(Request $request, Response $response, array $args)
    {
        $this->container->logger->info('Rates All');

        try {
            return $response->withJson(Rate::fake());
        } catch (\Exception $e) {
            return $this->handleError(['Rates not found'], 502, $e);
        }
    }
}