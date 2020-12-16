<?php 
    namespace Express;

    use Http\Request;
    use Express\Router;

    class Express {
        private $method;
        private $uri;
        private $path;
        private $param;
        private $query;
        private $router;

        public function __construct() {
            $request = new Request();

        }

        public function use(Router $router) {
            $this->router = $router;
        }

        public function listen() {
            
        }
	}