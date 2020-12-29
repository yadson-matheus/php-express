<?php 
    namespace Http;

    class Request {
        private $protocol;
        private $host;
        private $port;
        private $method;
        private $uri;
        private $query;
        private $body;

        public function __construct() {
            $this->setProtocol($_SERVER["SERVER_PROTOCOL"]);
            $this->setHost($_SERVER["SERVER_NAME"]);
            $this->setPort($_SERVER["SERVER_PORT"]);
            $this->setMethod($_SERVER["REQUEST_METHOD"]);
            $this->setUri($_SERVER["REQUEST_URI"]);
            $this->setQuery($_GET);
            $this->setBody($_POST);
        }

        public function setProtocol(string $protocol): void { 
            $this->protocol = (strpos($protocol, "HTTP") !== false) ? "http" : "https";
        }

        public function getProtocol(): string {
            return $this->protocol;
        }

        public function setHost(string $host): void { 
            $this->host = $host;
        }

        public function getHost(): string {
            return $this->host;
        }

        public function setPort(int $port): void { 
            $this->port = $port;
        }

        public function getPort(): int {
            return $this->port;
        }

        public function setMethod(string $method): void { 
            $this->method = mb_strtolower($method);
        }

        public function getMethod(): string {
            return $this->method;
        }

        public function setUri(string $uri): void { 
            $this->uri = parse_url($uri, PHP_URL_PATH);
        }

        public function getUri(): string {
            return $this->uri;
        }

        public function setQuery(array $query): void { 
            $this->query = $query;
        }

        public function getQuery(): array {
            return $this->query;
        }

        public function setBody(array $body): void { 
            $this->body = $body;
        }

        public function getBody(): array {
            return $this->body;
        }

        public function __debugInfo(): array {
            return [
                "protocol" => $this->getProtocol(),
                "host"     => $this->getHost(),
                "port"     => $this->getPort(),
                "method"   => $this->getMethod(),
                "uri"      => $this->getUri(),
                "query"    => $this->getQuery(),
                "body"     => $this->getBody(),
            ];
        }
    }
    