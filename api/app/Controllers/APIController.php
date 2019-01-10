<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\ToolUser;

class APIController extends BaseController
{
    public function index(Request $request, Response $response, array $args)
    {
        $this->container->logger->info("Users index");
        
        $users = ToolUser::all();

        return $response->withJson($users);
    }

    public function get(Request $request, Response $response, array $args)
    {
        try {
            $users = ToolUser::findOrFail((int)$request->getAttribute('id'));

            return $response->withJson($users);
        } catch (\Exception $ex) {
            return $response
                ->setError(true)
                ->addMessage('User not found')
                ->addMessage(getenv('APP_DEBUG') ? $ex->getMessage() : '')
                ->withJson([], 204);
        }
    }

    public function create(Request $request, Response $response, array $args)
    {
        $create = ToolUser::create([
            'name' => 'Jane Doe'
        ]);

        return $response->addMessage('User created successfuly')->withJson($create, 201);
    }

    public function delete(Request $request, Response $response, array $args)
    {
        ToolUser::destroy((int)$request->getAttribute('id'));
        return $response->addMessage('User deleted successfuly')->withJson([], 202);
    }
}