<?php 
    namespace Express;

    class Router {
        private $routes = [
            'get'    => [],
            'post'   => [],
            'patch'  => [],
            'put'    => [],
            'delete' => [],
        ];

        public function get(string $path, object ...$handlers): void {
            foreach ($handlers as $handler) {
                $this->routes['get'][$path][] = $handler;
            }
        }

        public function post(string $path, object ...$handlers): void {
            foreach ($handlers as $handler) {
                $this->routes['post'][$path][] = $handler;
            }
        }

        public function patch(string $path, object ...$handlers): void {
            foreach ($handlers as $handler) {
                $this->routes['patch'][$path][] = $handler;
            }
        }

        public function put(string $path, object ...$handlers): void {
            foreach ($handlers as $handler) {
                $this->routes['put'][$path][] = $handler;
            }
        }

        public function delete(string $path, object ...$handlers): void {
            foreach ($handlers as $handler) {
                $this->routes['delete'][$path][] = $handler;
            }
        }

        public function getRoute(string $type, string $pattern) {
            if (isset($this->routes[$type])) {
                foreach ($this->routes[$type] as $path => $route) {
                    if (preg_match("$pattern/i", $path)) {
                        return $this->routes[$type][$path];
                    }
                }
            }
        }
	}