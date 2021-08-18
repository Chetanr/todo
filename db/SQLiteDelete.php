<?php

namespace Db;

class SQLiteDelete {

    private $pdo;

    /**
     * Initialize the object with a specified PDO object
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    /*
        function to perform the task deletion from the table
    */
    public function deleteTask($task) {
        $sql = "DELETE FROM tasks where task_name = :task";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':task', $task);

        $stmt->execute() or die(print_r($stmt->errorInfo(), true));

        header("Location: http://localhost/todo/");

    }
}