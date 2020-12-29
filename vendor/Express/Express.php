<?php 
    namespace Express;

    use Http\Request;
    use Express\Router;

    class Express {
        private $request;
        private $router;

        public function __construct() {
            $this->request = new Request();
        }

        public function use(Router $router) {
            $this->router = $router;
        }

        public function listen() {
            $uri = $this->request->getUri();
            $method = $this->request->getMethod();
            $routes = $this->router->getRoute($method, $uri);

            if ($routes) {
                foreach ($routes as $route) {
                    call_user_func_array($route, [$this->request]);
                }   
            }
        }
	}