<?php
session_start();
require_once(ROOT . 'Core/Controller.php');

class UsersController extends Controller
{
    public static $UserInstance;

    public function delete($id)
    {
        if($_SESSION["status"] === 2 || $_SESSION["id"] === $id)
        {
            $this->loadModel("User");
            $d = $this->User->delete_user($id);
            echo "<p> User ".$id. " a bien été supprimé </p>";
            $this->redirect(WEBROOT . 'Users/displayAll/1');
        }
    }

    public function displayAll()
    {
        $this->loadModel("User");
        $d = $this->User->get_users();
        $this->set($d);
        $this->render('Users','index');
    }

    public function display($id)
    {
        $this->loadModel("User");
        $d = $this->User->get_user($id);
        if(count($d) != 0)
        {
            $this->set($d);
            echo "<p> User " .$id. "</p>";
            $this->render('Users','index');
        }
        else {
            echo "Aucun User trouvé <br>";
        }
    }

    public function login()
    {
        $this->loadModel("User");

        if(!isset($_POST["submit"]))
        {
            $a = $this->render('Users', 'login');
        }
        if(isset($_POST["password"]))
        {
            $d = $this->User->email_check($_POST["email"]);
        }

        if(isset($_POST["password"]) && (password_verify($_POST["password"], $d["password"]) == true))
        {
            $this->redirect(WEBROOT . 'Articles/displayAll/1');
            $_SESSION["email"]  = $d["email"];
            $_SESSION["status"] = $d["status"];
            $_SESSION["groupe"] = $d["groupe"];
            $_SESSION["id"] = $d["id"];
            var_dump($_SESSION["id"], $_SESSION["groupe"], $_SESSION["status"], $_SESSION["email"] );
        } else if(isset($_POST["submit"])){
            echo "Wrong username/password";
            $this->render('Users', 'login');
        }
    }

    public function register()
    {
        $this->loadModel("User");
        $this->render("Users", "signup");
        if(isset($_POST["email"]))
        {
            $checkemail =$this->checkemail($_POST["email"]);
        }

        if(isset($_POST["username"]))
        {
            $checkuser =$this->checkusername($_POST["username"]);
        }

        if(empty($_POST["groupe"]))
        {
            $_POST["groupe"] = 0;
        }

        if(empty($_POST["status"]))
        {
            $_POST["status"] = 0;
        }
        
        if(isset($_POST["username"]) && (strlen($_POST["username"]) < 3 || strlen($_POST["username"]) > 10 ))
        {
            $this->render("Users", "signup");
            echo "Username must be between 3 and 10 characters !";
        }

        else if (isset($_POST["email"]) && (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))) {
                $this->render("Users", "signup");
                echo "Invalid email address";
            }

        else if(isset($checkemail))
        {
            $this->render("Users", "signup");
            echo "Email already used";
        }

        else if(isset($checkuser))
        {
            $this->render("Users", "signup");
            echo "Username already used";
        }

        else if(isset($_POST["password"]) && (strlen($_POST["password"]) < 8 || strlen($_POST["password"] > 20 || $_POST["password"] !== $_POST["password_confirmation"])))
            {
                $this->render("Users", "signup");
                echo "Invalid password";
            }
        else if (isset($_POST["submit"])){
            $d = $this->User->post_user($_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["email"], $_POST["groupe"], $_POST["status"] );
            echo "User ajouté <br>";
            //$this->redirect(WEBROOT . 'Users/login');
            header("Location: http://localhost/PHP_Rush_MVC/Users/login/");
        }
    }

    public function logout()
	{
        unset($_SESSION);
		header("Location: http://localhost/PHP_Rush_MVC/Users/login/");
	}

    public function edit($id)
    {
        if($id === null)
        {
            $this->redirect(WEBROOT . 'Users/displayAll');
            return;
        }
        $this->loadModel("User");

        if (!isset($_POST["submit"]))
        {
            $this->render("Users", "editform");
        } else {
            if(!empty($_POST["title"]))
            {
                $d = $this->User->put_user($id, $_POST["title"], $_POST["description"]);
                echo "User modifié <br>";
                $this->redirect(WEBROOT . 'Users/displayAll');
            } else {
                echo "Met un titre ducon";
                $this->render("Users", "editform");
            }
        }
    }

    public function checkemail($email)
    {
        $this->loadModel("User");
        $d = $this->User->email_check($email);
        if($d["email"] === $_POST["email"])
        {
            return false;
        }
    }

    public function checkusername($username)
    {
        $this->loadModel("User");
        $d = $this->User->username_check($username);
        if($d["username"] === $_POST["username"])
        {
            return false;
        }
    }

    public static function getInstance()
    {
        if(is_null(self::$UserInstance))
        {
            self::$UserInstance = new UsersController();
        }
        return self::$UserInstance;
    }
}
?>