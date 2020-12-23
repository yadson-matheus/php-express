<?php 
    require_once dirname(__DIR__) . "/config/bootstrap.php";
    require_once SRC_PATH . "utils.php";

    require_once SRC_PATH . "routes.php";

    use Express\Express;

    $express = new Express();

    $express->use($routes);

    $express->listen();
