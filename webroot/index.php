<?php 
    require_once '../config/bootstrap.php';
    require_once SRC_PATH.'utils.php';
    require_once SRC_PATH.'routes.php';

    use Express\Express;

    $express = new Express();

    $express->use($routes);

    $express->listen();



    

    // if ($path) {
    //     $path = array_filter(explode('/', $path));
    // }
    // if ($args) {
    //     parse_str($args, $args);
    // }

    // if ($path) {
    //     $controller = ucfirst(array_shift($path)) . 'Controller';

    //     require_once('../src/controllers/'. $controller .'.php');

    //     $a = new controllers\UserController();

    //     debug($a->sayHello());
    // }

    // debug($path);
    // debug($args);
    // debug($method);
