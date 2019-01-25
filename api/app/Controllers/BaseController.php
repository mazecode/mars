<?php namespace App\Controllers;

use Slim\Http\StatusCode;
use Psr\Container\ContainerInterface;

use Respect\Validation\Validator as v;

use App\Models\Response;
use Symfony\Component\Config\Definition\Exception\Exception;

class BaseController
{
	protected $container;
	/** @var \Conduit\Validation\Validator */
	protected $validator;
	/** @var \Conduit\Services\Auth\Auth */
	protected $auth;
	protected $translator;

	public function __construct(ContainerInterface $container)
	{
		// https://www.sitepoint.com/php-fractal-make-your-apis-json-pretty-always/
		$this->container = $container;
		$this->logger = $container->get('logger');
		// $this->auth = $container->get('auth');	
		$this->validator = $container->get('validator');
		$this->translator = $container->get('translator');
	}

	public function generatePassword(string $username) : string
	{
		return (rand(0, 99) . $username . rand(0, 99));
	}

	public function handleError(array $messages, int $code = 500, $exception = null)
	{
		if (isset($exception)) {
			$exception = new Exception('General Error');
		}

		if (!count($messages)) {
			$mesages = array('General Error');
		}

		$this->logger->error($exception->getMessage());

		return (new Response)->setError(true)
			->addMessage($messages)
			->addMessage(getenv('APP_DEBUG') ? $exception->getMessage() : '')
			->withJson([], $code);

	}

	public function trans(string $message, array $params = []) : string
	{
		$message = $this->translator->trans($message);

		if (!empty($params)) {
			$message = @vsprintf($message, $params);
		}

		return $message;
	}
}