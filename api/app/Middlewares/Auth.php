<?php namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;

class Auth
{

    public function __invoke(Request $request, Response $response, $next)
    {
        $authHeader = $request->getHeader('Authorization');

        if (!isset($authHeader) || sizeof($authHeader) == 0) {
            return $response->setError(true)->addMessage('401 Unauthorized')->addMessage('Header Unauthorized')->withJson([], 401);
        }
        
        try {
            list($jwt) = sscanf($authHeader[0], 'Bearer %s');

            $authHeaderDecoded = JWT::decode($jwt, getenv('SECRET_KEY'), array('HS256'));
            
            $response = $next($request, $response);
        } catch (SignatureInvalidException $e) {
            // Suplantacion
            return $response->setError(true)->addMessage('Intento de suplantación detectado. Su IP ha sido guardada.');
        } catch (UnexpectedValueException $e) {
            // 401 Unauthorized - Expired
            return $response->setError(true)->addMessage('401 Unauthorized - Token expirado');
        } catch (\Exception $e) {
            // 401 Unauthorized
            return $response->setError(true)
                ->addMessage('401 Unauthorized')
                ->addMessage(getenv('APP_DEBUG') ? $e->getMessage() : '')
                ->withJson([], 401);
        }

        return $response;
    }
}