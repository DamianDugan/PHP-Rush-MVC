<?php

require_once(ROOT . 'Src/router.php');
require_once(ROOT . 'Controllers/ArticlesController.php');
require_once(ROOT . 'Controllers/UsersController.php');
require_once(ROOT . 'Controllers/AdminController.php');

class Dispatcher
{
	public function dispatchURL($url = null)
	{

		$route = new Router();
		$params = $route->getRoute($url);

		$controller = $params[0].'Controller';
		$method = $params[1];
		if(isset($params[2]))
		{
			$id = $params[2];
		} else {
			$id = null;
		}
		$a = $controller::getInstance()->$method($id);
	}
}

?>