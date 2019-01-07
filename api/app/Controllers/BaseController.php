<?php namespace App\Controllers;

use Slim\Http\StatusCode;
use Psr\Container\ContainerInterface;


class BaseController
{
	protected $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}
}

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