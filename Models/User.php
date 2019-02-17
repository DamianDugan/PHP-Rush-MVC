<?php

require_once(ROOT . 'Config/db.php');

class User {
    public static $UserInstance;

    public static function getInstance()
    {
        if (is_null(self::$UserInstance))
        {
            self::$UserInstance = new User;
        }
        return self::$UserInstance;
    }

    public function get_users()
    {
        $req = Database::getInstance()->prepare('SELECT * FROM users');
        $query = $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
 
    public function get_user($id)
    {
        $req = Database::getInstance()->prepare('SELECT * FROM users WHERE id="'.$id.'"');
        $query = $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function post_user($username, $password, $email, $groupe, $status)
    {
        $req = Database::getInstance()->prepare('INSERT INTO users (username, password, email, groupe, status) VALUES ("'.$username.'", "'.$password.'", "'.$email.'", "'.$groupe.'",  "'.$status.'")');
        $req->execute();

    }

    public function put_user($id, $username, $password, $email, $groupe, $status)
    {         
        $req = Database::getInstance()->prepare('UPDATE users SET username="'.$username.'", password="'.$password.'", email="'.$email.'", groupe="'.$groupe.'",  status="'.$status.'" WHERE id="'.$id.'"');
        $req->execute();
    }

    public function delete_user($id)
    {
        $req = Database::getInstance()->prepare('DELETE FROM users WHERE id="'.$id.'"');
        $result = $req->execute();
    }

    public function email_check($email)
    {
       $req = Database::getInstance()->prepare('SELECT * FROM users WHERE email="'.$email.'"');
       $req->execute();
       $result = $req->fetch();
       return $result;
    }

    public function username_check($username)
    {
       $req = Database::getInstance()->prepare('SELECT * FROM users WHERE username="'.$username.'"');
       $req->execute();
       $result = $req->fetch();
       return $result;
    }
}
?>