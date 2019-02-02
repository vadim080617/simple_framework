<?php

namespace app;

use app\core\router\Router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\','/',$class.'.php');
    require_once ROOT_PATH . $path;
});

$router = new Router();
$router->run();