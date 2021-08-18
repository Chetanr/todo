<?php

namespace Db;

class SQLiteUpdate {

    private $pdo;

    /*
        Initialize the object with a specified PDO object
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function completeTask($task) {
        // SQL statement to update status of a task to completed
        $sql = "UPDATE tasks SET task_status = 'Completed' WHERE task_name = :task";
                

        $stmt = $this->pdo->prepare($sql);
        // passing values to the parameters
        $stmt->bindValue(':task', $task);

        // execute the update statement
        $stmt->execute() or die(print_r($stmt->errorInfo(), true));

        header("Location: http://localhost/todo/");
    }

    /*
        Update the task priority
    */
    public function updateTask($task, $priority) {
        $sql = "UPDATE tasks SET task_priority = :priority WHERE task_name = :task";
                

        $stmt = $this->pdo->prepare($sql);
        // passing values to the parameters
        $stmt->bindValue(':task', $task);
        $stmt->bindValue(':priority', $priority);

        // execute the update statement
        $stmt->execute() or die(print_r($stmt->errorInfo(), true));

        header("Location: http://localhost/todo/");
    }
}