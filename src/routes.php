<?php 
    use Express\Router;

    use Controllers\UserController;

    $routes = new Router();

    $userController = new UserController();

    $routes->get('/user', $userController->index);
    $routes->post('/user', $userController->add);
