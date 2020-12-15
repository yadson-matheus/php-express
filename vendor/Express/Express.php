<?php 
    namespace Express;

    use Express\Router;

    class Express {
        private $method;
        private $uri;
        private $path;
        private $param;
        private $query;
        private $router;

        public function __construct() {
            $uri = $_SERVER['REQUEST_URI'];
            $param = explode('/', substr(parse_url($uri, PHP_URL_PATH), 1));
            $path = implode('/', [array_shift($param), array_shift($param)]);
            parse_str(parse_url($uri, PHP_URL_QUERY), $query);

            $this->method = $_SERVER['REQUEST_METHOD'];
            $this->uri = $uri;
            $this->path = (strlen($path) > 1) ? "/$path" : $path;
            $this->param = $param;
            $this->query = $query;

            //debug();



            debug([
                'method' => $this->method,
                'uri'    => $this->uri,
                'path'   => $this->path,
                'param'  => $this->param,
                'query'  => $this->query,
            ]);
        }

        public function use(Router $router) {
            $this->router = $router;
        }

        public function listen() {
            
        }
	}