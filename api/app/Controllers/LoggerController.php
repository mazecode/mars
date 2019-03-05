<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class LoggerController extends BaseController
{
    public function index(Request $request, Response $response, array $args)
    {
        $this->container->logger->info('Logger Controller');

        return $request->addMessage('Logger Controller')->withJson(null, 200);
    }
}

