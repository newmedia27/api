<?php

	
	namespace api\components;
	
	
	class Router
	{
		private $routes;
		
		/**
		 * Router constructor.
		 */
		
		public function __construct()
		{
			$routesPut = ROOT . "/config/routes.php";
			$this->routes = require($routesPut);
		}
		
		/**
		 * analyze query, get controllerName && actionName, include Controller
		 */
		
		/**
		 * @return string
		 */
		public function getUri()
		{
			if (!empty($_SERVER['REQUEST_URI'])) {
				$uri = $_SERVER['REQUEST_URI'];
				
				return trim($uri, '/');
			}
		}
		
		public function run()
		{
			$parts = $this->getUri();
			
			foreach ($this->routes as $routesKey => $routesItem) {
				if (preg_match("~$routesKey~", $parts)) {
					$internalRoute = preg_replace("~$routesKey~", $routesItem, $parts);
					$params = explode('/', $internalRoute);
					
					$controllerName = ucfirst(array_shift($params)) . 'Controller';
					$actionName = 'action' . ucfirst(array_shift($params));
					
					require(ROOT . "/controllers/{$controllerName}.php");
					$controller = new $controllerName;
					$result = call_user_func_array([$controller, $actionName], $params);
					
					if ($result != null) {
						break;
					}
				}
			}
		}
		
		
	}