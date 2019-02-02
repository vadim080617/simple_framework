<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 28.01.19
 * Time: 15:25
 */

namespace app\core\view;

use app\core\response\Response;

class View
{
    public $path;
    public $layout = 'default';
    public $route;

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = []) {
        if(file_exists('app/views/'.$this->path.'.php')){
            ob_start();
            require 'app/views/'.$this->path.'.php';
            $content = ob_get_clean();
            ob_start();
            require 'app/views/layouts/' . $this->layout.'.php';
            $bodyText = ob_get_clean();
            $response = new Response($bodyText);
            $response->send();
        } else {
            echo 'Вид не найден';
        }
    }
}