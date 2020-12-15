<?php 
    namespace Controllers;

    class UserController {
        public function index() {
            echo 'index method';
        }

        public function add() {
            echo 'add method';
        }

        public function __get($method) {
            return (object) [$this, $method];
        }
	}