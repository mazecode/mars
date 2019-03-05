<?php
namespace App\Controllers;

use Psr\Container\ContainerInterface;

use App\Models\Response;
use Symfony\Component\Config\Definition\Exception\Exception;

class BaseController
{
	/** @var \Psr\Container\ContainerInterface */
	protected $container;
	/** @var \Respect\Validation\Validator */
	protected $validator;
	protected $translator;

	public function __construct($container)
	{
		// https://www.sitepoint.com/php-fractal-make-your-apis-json-pretty-always/
		$this->container = $container;
		$this->logger = $container->get('logger');
		$this->validator = $container->get('validator');
		$this->translator = $container->get('translator');
	}

	public function generatePassword($username)
	{
		return (rand(0, 99) . $username . rand(0, 99));
	}

	public function handleError($messages, $code = 500, $exception = null)
	{
		if (isset ($exception))
		{
			$exception = new Exception('General Error');
		}

		if (!count($messages))
		{
			$messages = array ('General Error');
		}

		$this->logger->error($exception->getMessage());

		return (new Response)->setError(true)
		->addMessage($messages)
		->addMessage(getenv('APP_DEBUG') ? $exception->getMessage() : '')
		->withJson([], $code);
	}

	public function trans($message, $params = [])
	{
		$message = $this->translator->trans($message);

		if (!empty ($params))
		{
			$message = @vsprintf($message, $params);
		}

		return $message;
	}
}