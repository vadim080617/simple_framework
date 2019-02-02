<?php

namespace app\core\router;

use app\core\exception\NotFoundException;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require  ROOT_PATH . 'app/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params){
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match(){
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $queryPos = strrpos($url, '?');
        if($queryPos) {
            $url = substr($url, 0, $queryPos);
        }
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url,$matches) && array_key_exists($_SERVER['REQUEST_METHOD'], $params)){
                $this->params = $params[$_SERVER['REQUEST_METHOD']];
                return true;
            }
        }
        return false;
    }

    public function run(){
        if($this->match()) {
            $path =  'app\controllers\\' . ucfirst($this->params['controller']).'Controller';
            if(class_exists($path)){
                $action = $this->params['action'];
                if (method_exists($path, $action)){
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    throw new NotFoundException('Method ' . $action);
                }
            } else {
                throw new NotFoundException('Controller');
            }
        } else {
            throw new NotFoundException('Route');
        };
    }
}