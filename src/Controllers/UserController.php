<?php 
    namespace Controllers;

    use Controller\AppController;
    use Http\Request;

    class UserController extends AppController {
        public function add(Request $request) {
            debug($request);
        }

        public function view(Request $request) {
            debug($request);
        }
	}