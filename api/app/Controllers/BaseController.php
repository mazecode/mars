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