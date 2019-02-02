<?php

namespace app\core\response;


class Response {
	const STATUSES = [
        200 => 'Ok',
        301 => 'Moved Permanently',
        302 => 'Moved Temporary',
        400 => 'Bad Request',
        401 => 'Auth Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Server Error'
    ];

    public $headers = [];
    public $code = 200;

    protected $body = null;
	
	public function __construct($body, int $code = 200) {
        $this->body = $body;
        $this->code = $code;
    }

    public function setHeader(string $key, string $value) {
        $this->headers[$key] = $value;
    }

    public function sendBody() {
        echo $this->body;
    }

    public function sendHeaders() {
    	$this->setHeader('Code',$this->code);
        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }
    }

    public function send() {
        $this->sendHeaders();
        $this->sendBody();
    }
}