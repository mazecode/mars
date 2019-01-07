<?php namespace App\Controllers;

use App\Models\ToolUser;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class APIController extends BaseController
{
    public function index(Request $request, Response $response)
    {
        $this->container->logger->info("Users index");
        
        $users = ToolUser::all();

        return $response->withJson($users);
    }

    public function get(Request $request, Response $response)
    {
        try {
            $users = ToolUser::findOrFail((int)$request->getAttribute('id'));

            return $response->withJson($users);
        } catch (\Exception $ex) {
            return $response
                ->setError(true)
                ->addMessage('User not found')
                ->addMessage($ex->getMessage())
                ->withJson([], 204);
        }
    }

    public function create(Request $request, Response $response)
    {
        $create = ToolUser::create([
            'name' => 'Jane Doe'
        ]);

        return $response->addMessage('User created successfuly')->withJson($create, 201);
    }

    public function delete(Request $request, Response $response)
    {
        ToolUser::destroy((int)$request->getAttribute('id'));
        return $response->addMessage('User deleted successfuly')->withJson([], 202);
    }
}