<?php 
    namespace Http;

    class Request {
        private $method;
        private $uri;
        private $query;
        private $body;

        public function __construct() {
            // $uri = $_SERVER['REQUEST_URI'];
            // $param = explode('/', substr(parse_url($uri, PHP_URL_PATH), 1));
            // $path = implode('/', [array_shift($param), array_shift($param)]);
            // parse_str(parse_url($uri, PHP_URL_QUERY), $query);



            $this->method = $_SERVER['REQUEST_METHOD'];
            $this->uri = $_SERVER['REQUEST_URI'];
            $this->query = $_GET;
            $this->body = $_POST;

            // $param = parse_url($this->uri, PHP_URL_PATH);
            // preg_match_all('/{([a-z0-9]+)}/i', $param, $result);

            debug([
                'method' => $this->method,
                'uri'    => $this->uri,
                'query'  => $this->query,
                'body'   => $this->body,
            ]);
        }

        public function use(Router $router) {
            $this->router = $router;
        }

        public function listen() {
            
        }
	}