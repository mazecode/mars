<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Firebase\JWT\JWT;

use App\Models\Tarifa;
use App\Models\Descuento;

class TarifaController extends BaseController
{

    public function index(Request $request, Response $response, array $args)
    {
        try {
            return $response->withJson(Descuento::fake(), 200);
        } catch (\Exception $e) {
            return $response->setError(true)
                ->addMessage('User not found')
                ->addMessage(getenv('APP_DEBUG') ? $e->getMessage() : '')
                ->withJson([], 502);
        }
    }
}