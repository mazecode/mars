<?php namespace App\Models;

use Symfony\Component\Config\Definition\Exception\Exception;


class Response extends \Slim\Http\Response
{
	private $format;
	public $data;
	public $error;
	private $binary;
	public $messagesResponse;
	public $location;
	public $jsonCallback;
	public $jsonQueryFormat;
	public $contentType;
	public $statusCode;
	public $statusText;
	public $responsetime;
	public $cachedResponse;

	function __construct()
	{
		parent::__construct();

		$this->format = "json";
		$this->data = [];
		$this->error = false;
		$this->binary = false;
		$this->messagesResponse = [];
		$this->location = "en";
		$this->jsonCallBack = "";
		$this->jsonQueryFormat = "query";
		$this->contentType = "application/json; charset=utf-8";
		$this->statusCode = 200;
		$this->statusText = "OK";
		$this->responsetime = 0;
		$this->cachedResponse = false;
	}

	public function getData() : array
	{
		return $this->data;
	}

	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}

	public function getStatusText() : string
	{
		return $this->statusText;
	}

	public function setStatusText($statusText)
	{
		$this->statusText = $statusText;

		return $this;
	}

	public function getStatusCode() : int
	{
		return $this->statusCode;
	}

	public function setStatusCode(int $statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	public function getError() : bool
	{
		return $this->error;
	}

	public function setError(bool $error)
	{
		$this->error = $error;

		return $this;
	}

	public function getFormat() : string
	{
		return $this->format;
	}

	public function setFormat(string $format)
	{
		$this->format = $format;

		return $this;
	}

	public function setLocation(string $location)
	{
		$this->location = $location;

		return $this;
	}

	public function addMessage($message)
	{
		if (!is_array($message) && !is_string($message)) {
			return $this->setError(true)->addMessage('Message must be an array or string')->withJson(null, 500);
		}

		if (is_string($message)) {
			$message = [$message];
		}

		$this->messagesResponse = @array_merge($this->messagesResponse, $message);

		return $this;
	}

	public function getDataPacket(bool $reset = false)
	{
		$packet = [
			"data" => $this->data,
			"messages" => $this->messagesResponse,
			"error" => $this->error ? true : false,
			"code" => $this->statusCode,
			"status" => $this->statusText,
			"location" => $this->location
		];

		if ($reset) {
			$packet->data = [];
		}

		return $packet;
	}

	public function withJson($data, $status = null, $encodingOptions = 0)
	{
		if (!isset($status)) {
			$status = 200;
		}

		$response = $this->withBody(new \Slim\Http\Body(fopen('php://temp', 'r+')))
			->withStatus($status)
			->setStatusCode($status)
			->setData($data);

		$response = $response->setStatusText($response->getReasonPhrase());

		if ($response->getFormat() === 'json') {
			$response->body->write($json = json_encode($response->getDataPacket(), $encodingOptions ?? JSON_PRETTY_PRINT));

			if ($json === false) {
				throw new \RuntimeException(json_last_error_msg(), json_last_error());
			}

			$response = $response->withHeader('Content-Type', 'application/json;charset=utf-8');
		}

		return $response;
	}

	public function withError($message, $status = null, $encodingOptions = 0)
	{
		return $this->addMessage($message)->setError(true)->withJson(null, $status, $encodingOptions);
	}
}