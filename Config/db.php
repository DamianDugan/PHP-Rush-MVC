<?php

// require_once('configuration.php');

class Database {

    const DEFAULT_SQL_USER ='damian';
    const DEFAULT_SQL_HOST ='localhost';
    const DEFAULT_SQL_PASS ='mot2passe';
    const DEFAULT_SQL_DTB='todo_php';

    public static $PDOInstance = null;
    public $bdd;

    public function __construct()
    {
        try{
            $this->bdd = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if(is_null(self::$PDOInstance))
        {
            self::$PDOInstance = new Database();
        }
        return self::$PDOInstance;
    }

    public function prepare($query)
    {
        return $this->bdd->prepare($query);
        // execute l'instance
    }
}
?>