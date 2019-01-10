<?php namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class JsonResponse
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $response = $next($request, $response);

        $body = (string) $response->getBody();

        if(empty(json_decode($body))) return $response;
        
        $accept = $request->getHeader('Content-Type');
        if (!$accept || !preg_match('#^application/([^+\s]+\+)?json#', implode(',', $accept))) {
            $response = $response->setError(true)->withJson([], 406);
        }

        return $response
            // ->withHeader('Access-Control-Allow-Origin', '*')
            // ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            // ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->withHeader('X-Powered-By', '127.0.0.1');

            // 		// Development additions
// 		if( getSetting( "environment" ) eq "development" ){
// 			prc.response.addHeader( "x-current-route", event.getCurrentRoute() )
// 				.addHeader( "x-current-routed-url", event.getCurrentRoutedURL() )
// 				.addHeader( "x-current-routed-namespace", event.getCurrentRoutedNamespace() )
// 				.addHeader( "x-current-event", event.getCurrentEvent() );
// 		}
// 		// end timer
// 		prc.response.addHeader( "x-response-time", prc.response.getResponseTime() )
// 				.addHeader( "x-cached-response", prc.response.getCachedResponse() );
		
// 		// Response Headers
// 		for( var thisHeader in prc.response.getHeaders() ){
// 			event.setHTTPHeader( name=thisHeader.name, value=thisHeader.value );

    }
}