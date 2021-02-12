<?php
namespace Components;
class Router
{
	private $routes;


	public function __construct()
	{
		$routesPath = ROOT.'/Config/routes.php';
		$this->routes = include($routesPath);
	}

	private function getURI()
	{
		if(!empty($_SERVER['REQUEST_URI'])) 
		{
			return trim($_SERVER['REQUEST_URI'], '/');
		}		
	}
	public function run()
	{
		//Получить строку запроса
		$uri = $this->getURI();

		//Проверить наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path) 
		{
			//сравниваем $uriPattern и $uri
			if (preg_match("~$uriPattern~", $uri)) 
			{
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
								
				//определяем контроллер и метод действия
				$segments = explode('/', $internalRoute);
				
				//контролер
				$controllerName = 'Controllers\\'.ucfirst(array_shift($segments)).'Controller';
				//метод действия
				$actionName = 'action'.ucfirst(array_shift($segments));
				//параметры
				$parameters = $segments;
							
				$controllerObject = new $controllerName;

				include_once(ROOT.'/Views/base/head.php');				
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				include_once(ROOT.'/Views/base/footer.php');
				if($result != null){
					break;
				}
			}
		}
	}
}




?>
