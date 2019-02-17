<?php

require_once(ROOT . 'Config/db.php');

class Article {
    public static $ArticleInstance;

    public static function getInstance()
    {
        if (is_null(self::$ArticleInstance))
        {
            self::$ArticleInstance = new Article;
        }
        return self::$ArticleInstance;
    }

    public function get_tasks()
    {
        $req = Database::getInstance()->prepare('SELECT * FROM tasks ORDER BY creation_date DESC');
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_task($id)
    {
        $req = Database::getInstance()->prepare('SELECT * FROM tasks WHERE id="'.$id.'"');
        $query = $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function post_task($title, $description=null)
    {
        $req = Database::getInstance()->prepare('INSERT INTO tasks (title, description) VALUES ("'.$title.'", "'.$description.'")');
        $req->execute();

    }

    public function put_task($id, $title = null, $description = null)
    {         
        $req = Database::getInstance()->prepare('UPDATE tasks SET title="'.$title.'", description="'.$description.'" WHERE id="'.$id.'"');
        $req->execute();
    }

    public function delete_task($id)
    {
        $req = Database::getInstance()->prepare('DELETE FROM tasks WHERE id="'.$id.'"');
        $req->execute();
    }
}

?>