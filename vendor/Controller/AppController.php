<?php 
    namespace Controller;

    class AppController {
        public function __get($method) {
            return (object) [$this, $method];
        }
    }