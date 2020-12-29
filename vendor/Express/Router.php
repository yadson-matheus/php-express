<?php 
    namespace Express;

    class Router {
        private $routes = [
            "get"    => [],
            "post"   => [],
            "patch"  => [],
            "put"    => [],
            "delete" => [],
        ];

        public function get(string $route, object ...$handlers): void {
            $this->setRoute("get", $route, $handlers);
        }

        public function post(string $route, object ...$handlers): void {
            $this->setRoute("post", $route, $handlers);
        }

        public function patch(string $route, object ...$handlers): void {
            $this->setRoute("patch", $route, $handlers);
        }

        public function put(string $route, object ...$handlers): void {
            $this->setRoute("put", $route, $handlers);
        }

        public function delete(string $route, object ...$handlers): void {
            $this->setRoute("delete", $route, $handlers);
        }

        private function setRoute(string $method, string $route, array $handlers): void {
            foreach ($handlers as $handler) {
                if (!is_callable($handler)) $handler = (array) $handler;
                
                if (is_callable($handler)) {
                    $this->routes[$method][$route][] = $handler;
                }
            }
        }

        public function getRoute(string $type, string $route): ?array {
            if (isset($this->routes[$type])) {
                foreach (array_keys($this->routes[$type]) as $routeName) {
                    $routePattern = $this->getRoutePattern($routeName);

                    if ($this->routeMatch($routePattern, $route)) {
                        return $this->routes[$type][$routeName];
                    }
                }
            }
            return null;
        }

        private function getRoutePattern(string $route): string {
            $pattern = preg_replace(
                ["/{([a-z0-9]+)}/i", "/\//i"], 
                ["([a-z0-9]+)", "\/"], 
                $route
            );

            return "/$pattern/i";
        }

        private function routeMatch(string $pattern, string $route): bool {
            preg_match($pattern, $route, $match);

            return (in_array($route, $match));
        }
	}