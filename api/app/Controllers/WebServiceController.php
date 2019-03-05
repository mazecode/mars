<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\WS\WebService;

class WebServiceController extends BaseController
{
    const WEBSERVICE_URL = '';
    const WEBSERVICE_METHOD = '';

    public function __construct()
    { }

    public function index(Request $request, Response $response, array $args)
    {
        $this->container->logger->info("API index");
    }

    public function stock(Request $request, Response $response, array $args)
    {
        WebService::test();
    }
}
