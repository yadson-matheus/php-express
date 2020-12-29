<?php 
    use Express\Router;

    use Controllers\UserController;

    $routes = new Router();

    $userController = new UserController();

    $routes->post("/user/add", $userController->add);
    $routes->get("/user/view/{id}", $userController->view);
