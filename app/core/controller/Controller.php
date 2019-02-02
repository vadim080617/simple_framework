<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 28.01.19
 * Time: 15:24
 */

namespace app\core\controller;

use app\core\view\View;
use app\core\request\Request;

class Controller
{
    public $route;
    public $view;
    public $request;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->request = new Request();
    }
}