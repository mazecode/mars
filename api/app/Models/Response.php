<?php namespace App\Models;

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
		$this->location = "";
		$this->jsonCallBack = "";
		$this->jsonQueryFormat = "query";
		$this->contentType = "";
		$this->statusCode = 200;
		$this->statusText = "OK";
		$this->responsetime = 0;
		$this->cachedResponse = false;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}

	public function getStatusText()
	{
		return $this->statusText;
	}

	public function setStatusText($statusText)
	{
		$this->statusText = $statusText;

		return $this;
	}

	public function getStatusCode()
	{
		return $this->statusCode;
	}

	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	public function getError()
	{
		return $this->error;
	}

	public function setError($error)
	{
		$this->error = $error;

		return $this;
	}

	public function getFormat()
	{
		return $this->format;
	}

	public function setFormat($format)
	{
		$this->format = $format;

		return $this;
	}

	/**
	 * Add some messages
	 * @message Array or string of message to incorporate
	 */
	function addMessage(string $message)
	{
		if (is_string($message)) {
			$message = [$message];
		}
		$this->messagesResponse = array_merge($this->messagesResponse, $message);

		return $this;
	}

	function getDataPacket(bool $reset = false)
	{
		$packet = [
			"data" => $this->data,
			"messages" => $this->messagesResponse,
			"error" => $this->error ? true : false,
			"code" => $this->statusCode,
			"status" => $this->statusText
		];

		if ($reset) {
			$packet->data = [];
		}

		return $packet;
	}

	public function withJson($data, $status = null, $encodingOptions = 0)
	{
		if(!isset($status)) {
			$status = 200;
		}
		$response = $this->withBody(new \Slim\Http\Body(fopen('php://temp', 'r+')))->withStatus($status);
		$response = $response->setData($data)->setStatusCode($status)->setStatusText($response->getReasonPhrase());
		
		if ($response->getFormat() === 'json') {
			$response->body->write($json = json_encode($response->getDataPacket(), $encodingOptions | JSON_PRETTY_PRINT));

			if ($json === false) {
				throw new \RuntimeException(json_last_error_msg(), json_last_error());
			}

			$response = $response->withHeader('Content-Type', 'application/json;charset=utf-8');
		}

		return $response;
	}

	public function to_json() {
        return json_encode(array(
            'something' => $this->something,
            'protected_something' => $this->get_protected_something(),
            'private_something' => $this->get_private_something()                
        ));
    }

}