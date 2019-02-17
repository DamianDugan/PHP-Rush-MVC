<?php
require_once(ROOT . 'dispatcher.php');

class Controller
{
	var $vars = array();
	var $layout = 'default';  

	public function loadModel($model)
	{
		require_once (ROOT . "Models/" . $model . '.php');
		$this->$model = $model::getInstance();
	}

	public function set($d)
	{
		$this->vars = array_merge($this->vars, $d);
	}

	public function render($className, $file = null)
	{
		extract($this->vars);
		if($file != null)
		{
			ob_start();
			require_once(ROOT . "Views/" . $className . '/' . $file . '.php');
			$content_for_layout = ob_get_clean();
			if($this->layout==false)
			{
				echo $content_for_layout;
			}
			else {
				require_once(ROOT. 'Views/Layouts/'. $this->layout. '.php');
			}
		}
	}

	
	public function redirect($param)
	{
		$a = new Dispatcher;
		$a -> dispatchURL($param);
	}
}

?>