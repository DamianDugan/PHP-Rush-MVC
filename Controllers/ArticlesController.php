<?php

require_once(ROOT . 'Core/Controller.php');

class ArticlesController extends Controller
{
	public static $ArticleInstance;

	public function delete($id)
	{
		$this->loadModel("Article");
		$d = $this->Article->delete_task($id);
		echo "<p> Article ".$id. " a bien été supprimé </p>";
		$this->redirect(WEBROOT . 'Articles/displayAll/1');
	}

	public function displayAll()
	{
		$this->loadModel("Article");
		$d = $this->Article->get_tasks();
		$this->set($d);
		$this->render('Articles','displayAll');

	}

	public function display($id)
	{
		$this->loadModel("Article");
		$d = $this->Article->get_task($id);
		if(count($d) != 0)
		{
			$this->set($d);
			echo "<p> Article " .$id. "</p>";
			$this->render('Articles','displayAll');
		}
		else {
			echo "Aucun article trouvé <br>";
		}
	}

	public function create()
	{
		$this->loadModel("Article");
		
		if(empty($_POST["title"]))
		{
			$this->render("Articles", "createform");
			
		} else {
			$d = $this->Article->post_task($_POST["title"], $_POST["description"]);
			echo "Article ajouté <br>";
			$this->redirect(WEBROOT . 'Articles/displayAll');
		}
	}

	public function edit($id)
	{
		if($id === null)
		{
			$this->redirect(WEBROOT . 'Articles/displayAll');
			return;
		}
		$this->loadModel("Article");

		if (!isset($_POST["submit"]))
		{
			$this->render("Articles", "editform");
		} else {
			if(!empty($_POST["title"]))
			{
				$d = $this->Article->put_task($id, $_POST["title"], $_POST["description"]);
				echo "Article modifié <br>";
				$this->redirect(WEBROOT . 'Articles/displayAll');
			} else {
				echo "Met un titre ducon";
				$this->render("Articles", "editform");
			}
		}
	}

	public static function getInstance()
	{
		if(is_null(self::$ArticleInstance))
		{
			self::$ArticleInstance = new ArticlesController();
		}
		return self::$ArticleInstance;
	}
}
?>