<?php

require_once(ROOT . 'Core/Controller.php');

class AdminController extends Controller
{
	public static $AdminInstance;

	public static function getInstance()
	{
		if(is_null(self::$AdminInstance))
		{
			self::$AdminInstance = new AdminController();
		}
		return self::$AdminInstance;
	}

	public function displayAll()
	{
		$this->loadModel("User");
		$d = $this->User->get_users();
		$this->set($d);
		$this->render('Admin','displayAll');
	}

	public function desactiveUser($id)
	{
		$this->loadModel("User");
		$this->User->desactive_user($id);
		echo 'User ' . $id . ' desactived<br>';
	}

	public function activeUser($id)
	{
		$this->loadModel("User");
		$this->User->active_user($id);
		echo 'User ' . $id . ' actived<br>';
	}

	public function addUser()
	{
		$this->render('Admin','addUser');
	}

	public function createUser()
	{
		$this->loadModel("User");
		$this->User->post_user($_POST['username'], $_POST['password'], $_POST['email'], $_POST['groupe'], $_POST['status']);
		echo 'Users ajouté <br>';
		$this->redirect(WEBROOT . 'Admin/displayAll');
	}

	public function editUser($id)
	{
		$this->loadModel("User");
		$d = $this->User->get_user($id);
		$this->set($d);
		$this->render('Admin','editUser');
	}

	public function updateUser($id)
	{
		$this->loadModel("User");
		$this->User->put_user($id, $_POST['username'], $_POST['password'], $_POST['email'], $_POST['groupe'], $_POST['status']);
		echo 'User '. $id . ' modifie<br>';
		$this->redirect(WEBROOT . 'Admin/displayAll/1');
	}

	public function delete($id)
	{
		$this->loadModel("User");
		$d = $this->User->delete_user($id);
		echo 'User '. $id . ' a bien été supprimé<br>';
		$this->redirect(WEBROOT . 'Admin/displayAll/1');
	}
}

?>