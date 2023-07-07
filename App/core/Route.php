<?php

namespace App\core;

class Route
{
	public static function start()
	{
		$controllerClassName = 'Main';
		// $modelName = 'Main';
		$actionName = 'index';
		$payload = [];

		$routes = explode('/', $_SERVER["REQUEST_URI"]);
		
		if(!empty($routes[1]))
		{
			$controllerClassName = $routes[1];
		}

		if(!empty($routes[2]))
		{
			$actionName = $routes[2];
		}

		if(!empty($routes[3]))
		{
			$payload = array_slice($routes, 3);
		}
		
		$controllerFileName = CONTROLLERS_NAMESPACE . ucfirst($controllerClassName);

		$controllerFile = ucfirst(strtolower($controllerClassName)) . '.php';

		$controller_path = CONTROLLER . $controllerFile;

		if(file_exists($controller_path))
		{
			include_once $controller_path;
		} else {
			Route::Error();
		}
		
		$controller = new $controllerFileName();

		$method = $actionName;

		if(method_exists($controller, $method))
		{
			$controller->$method($payload);
		} else {
			Route::Error();
		}
	}

	public static function Error()
	{
		header('HTTP/1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:/error');
    }
}
// class Route
// {
//     public static function start()
//     {
//         $controllerClassName = 'Main';
//         $actionName = 'index';
//         $payload = [];

//         $routes = explode('/', $_SERVER["REQUEST_URI"]);
		
//         if(!empty($routes[1]))
//         {
//             $controllerClassName = $routes[1];
//         }

//         if(!empty($routes[2]))
//         {
//             $actionName = $routes[2];
//         }

//         if(!empty($routes[3]))
//         {
//             $payload = array_slice($routes, 3);
//         }

//         // Определяем список доступных маршрутов
//         $routesList = [
//             '/' => ['controller' => 'Gallery', 'action' => 'index'],
//             '/image/view' => ['controller' => 'Image', 'action' => 'view'],
//             '/image/upload' => ['controller' => 'Image', 'action' => 'upload'],
//             '/comment/add' => ['controller' => 'Comment', 'action' => 'add'],
//             '/comment/delete' => ['controller' => 'Comment', 'action' => 'delete'],
//         ];

//         // Проверяем наличие текущего маршрута в списке доступных, и определяем соответствующий контроллер и метод
//         if (array_key_exists($_SERVER["REQUEST_URI"], $routesList)) {
//             $controllerClassName = $routesList[$_SERVER["REQUEST_URI"]]['controller'];
//             $actionName = $routesList[$_SERVER["REQUEST_URI"]]['action'];
//         }

//         $controllerFileName = CONTROLLERS_NAMESPACE . ucfirst($controllerClassName);

//         $controllerFile = ucfirst(strtolower($controllerClassName)) . '.php';

//         $controller_path = CONTROLLER . $controllerFile;

//         if(file_exists($controller_path))
//         {
//             include_once $controller_path;
//         } else {
//             Route::Error();
//         }

//         $controller = new $controllerFileName();

//         $method = $actionName;

//         if(method_exists($controller, $method))
//         {
//             $controller->$method($payload);
//         } else {
//             Route::Error();
//         }
//     }

//     public static function Error()
//     {
//         header('HTTP/1 404 Not Found');
//         header("Status: 404 Not Found");
//         header('Location:/error');
//     }
// }