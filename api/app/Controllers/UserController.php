<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\Auth\User as ToolUser;

class UserController extends BaseController
{

    public function index(Request $request, Response $response, array $args)
    {
        $this->container->logger->info("Users index");
        try {
            return $response->withJson(ToolUser::all(), 200);
        } catch (\Exception $e) {
            return $response->setError(true)
                ->addMessage('Error while updating user')
                ->addMessage(getenv('APP_DEBUG') ? $e->getMessage() : '')
                ->withJson([], 502);
        }
    }

    public function get(Request $request, Response $response, array $args)
    {
        $this->container->logger->info("User getting {$request->getAttribute('id')}");

        try {
            return $response->withJson(ToolUser::findOrFail((int)$request->getAttribute('id')), 200);
        } catch (\Exception $e) {
            return $response->setError(true)
                ->addMessage('User not found')
                ->addMessage(getenv('APP_DEBUG') ? $e->getMessage() : '')
                ->withJson([], 204);
        }
    }

    public function create(Request $request, Response $response, array $args)
    {

        $this->container->logger->info("User create");

        try {
            // TODO: Validate at least username field
            if (empty((string)$request->getParam('username'))) {
                return $response->setError(true)->addMessage('Field Username is required')->withJson([], 500);
            }

            $user = new ToolUser();

            $user->name = $request->getParam('name');
            $user->surnames = $request->getParam('surnames');
            $user->email = $request->getParam('email');
            $user->password = md5($this->generatePassword((string)$request->getParam('username')));
            $user->acd = $request->getParam('acd');
            $user->team_leader = $request->getParam('team_leader');
            $user->agency = $request->getParam('agency');
            $user->service = $request->getParam('service');
            $user->segment = $request->getParam('segment');
            $user->active = $request->getParam('active');
            $user->id_role = $request->getParam('id_role');
            $user->location = $request->getParam('location');
            $user->is_fijo = $request->getParam('is_fijo');
            $user->team_admin = $request->getParam('team_admin');

            $user->save();

            return $response->addMessage('User created successfuly')->addMessage('Password: ' . $password)->withJson($user, 201);
        } catch (\Exception $e) {
            return $response->setError(true)
                ->addMessage('Error while creating user')
                ->addMessage(getenv('APP_DEBUG') ? $e->getMessage() : '')
                ->withJson([], 502);
        }
    }

    public function update(Request $request, Response $response, array $args)
    {
        $this->container->logger->info("User update");

        try {
            $user = ToolUser::findOrFail((int)$request->getParam('id'));

            $user->name = $request->getParam('name');
            $user->surnames = $request->getParam('surnames');
            $user->email = $request->getParam('email');
            $user->acd = $request->getParam('acd');
            $user->team_leader = $request->getParam('team_leader');
            $user->agency = $request->getParam('agency');
            $user->service = $request->getParam('service');
            $user->segment = $request->getParam('segment');
            $user->active = $request->getParam('active');
            $user->id_role = $request->getParam('id_role');
            $user->location = $request->getParam('location');
            $user->is_fijo = $request->getParam('is_fijo');
            $user->team_admin = $request->getParam('team_admin');

            $user->save();

            return $response->addMessage('User updated successfuly')->withJson($user, 200);
        } catch (\Exception $e) {
            return $response->setError(true)
                ->addMessage('Error while updating user')
                ->addMessage(getenv('APP_DEBUG') ? $e->getMessage() : '')
                ->withJson([], 502);
        }
    }

    public function delete(Request $request, Response $response, array $args)
    {
        $this->container->logger->info("User delete");

        try {
            ToolUser::destroy((int)$request->getAttribute('id'));

            return $response->addMessage('User deleted successfuly')->withJson([], 202);
        } catch (\Exception $e) {
            return $response->setError(true)
                ->addMessage('Error while updating user')
                ->addMessage(getenv('APP_DEBUG') ? $e->getMessage() : '')
                ->withJson([], 502);
        }
    }
}