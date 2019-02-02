<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 29.01.19
 * Time: 15:33
 */
namespace app\core\request;

class Request
{
    public $headers = [];
    protected $input_data = [];

    public function __construct()
    {
        $this->headers = $this->getallheaders();
        $this->input_data = $this->getRequestInput();
    }

    private function getallheaders()
    {
        $headers = array ();
        foreach ($_SERVER as $name => $value)
        {
            if (substr($name, 0, 5) == 'HTTP_')
            {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }

    public function getRequestInput() {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            return $_GET;
        } else {
            return json_decode(file_get_contents("php://input"), true);
        }
    }
}