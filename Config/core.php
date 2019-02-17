<?php

require_once(ROOT . 'dispatcher.php');

class Core
{
	public function __construct ()
	{
		$a = new Dispatcher();
		$a->dispatchURL();
	}
}

?>