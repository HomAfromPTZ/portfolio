<?php
class Route{
	static function init(){
		// echo "<pre>";
		// print_r($_SERVER);
		// echo "</pre>";
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		// print_r($routes);

		if(!empty($routes[1])){
			$controller = $routes[1];
		} else {
			$controller = 'index';
		}

		$controller_file = 'app/controllers/'.strtolower($controller).'.controller.php';

		if(file_exists($controller_file)){
			require_once ($controller_file);
			new $controller;
		} else {
			self::error_404();
		}
	}

	static function error_404(){
		echo "404";
	}
}