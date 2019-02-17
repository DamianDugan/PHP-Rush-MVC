<?php

class Router
{
	public function getRoute($url)
	{
		if ($url == null)
		{
			$path = ltrim($_SERVER['REQUEST_URI'], '/');
		}
		else
		{
			$path = ltrim($url, '/');	
		}

		$params = explode('/', $path);
		array_shift($params);
		return $params;
	}
}

?>