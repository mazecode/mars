<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\Auth\User as ToolUser;

class APIController extends BaseController
{
    public function index(Request $request, Response $response, array $args)
    {
        $this->container->logger->info("API index");

        $users = ToolUser::all();

        return $response->withJson($users);
    }
}