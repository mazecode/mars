<?php namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Firebase\JWT\JWT;

use App\Models\Discount;

class DiscountController extends BaseController
{

    public function index(Request $request, Response $response, array $args)
    {
        $this->container->logger->info('All Discounts');

        try {
            return $response->withJson(Discount::fake());
        } catch (\Exception $e) {
            return $this->handleError(['Discounts not found'], 502, $e);
        }
    }

}