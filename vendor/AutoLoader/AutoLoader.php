<?php 
	namespace AutoLoader;

    class Autoloader {
        // Read namespaces imports and load class automatically.
        public static function load(array $paths) {
			spl_autoload_register(function ($namespace) use ($paths) {
                foreach ($paths as $path) {
                    $className = str_replace('\\', DS, $namespace);
                    $file = $path.$className.'.php';
        
                    if (file_exists($file)) require_once $file;
                }
            });
		}
	}