<?php

namespace Db;

class SQLiteSelect {

    private $pdo;

    /*
     Initialize the object with a specified PDO object
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /*
        get all the tasks from the database
    */
    public function getTasks() {
        $sql = "SELECT * FROM tasks ORDER BY task_priority, task_name";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }
}