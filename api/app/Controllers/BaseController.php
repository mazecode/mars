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

	public function generatePassword(string $username) : string
	{
		return (rand(0, 99) . $username . rand(0, 99));
	}
}