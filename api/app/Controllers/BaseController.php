<?php namespace App\Controllers;

use Slim\Http\StatusCode;
use Psr\Container\ContainerInterface;

use App\Models\Response;
use Symfony\Component\Config\Definition\Exception\Exception;

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

	public function handleError(array $messages, int $code = 500, $exception = null)
	{
		if (isset($exception)) {
			$exception = new Exception('General Error');
		}

		if (!count($messages)) {
			$mesages = array('General Error');
		}

		$this->container->logger->error($exception->getMessage());

		return (new Response)->setError(true)
			->addMessage($messages)
			->addMessage(getenv('APP_DEBUG') ? $exception->getMessage() : '')
			->withJson([], $code);

	}

	public function trans(string $message, array $params = []) : string
	{
		$message = $this->container->translator->trans($message);
		
		if (!empty($params)) {
			$message = @vsprintf($message, $params);
		}

		return $message;
	}
}