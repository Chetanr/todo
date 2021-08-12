<?php

namespace Db;

class SQLiteInsert {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function insertTask($task) {
        $sql = 'INSERT INTO tasks(task_name, task_status, task_priority) ' . 'VALUES(:task_name, :task_status, :task_priority)';
        $status = 'In Progress';
        $priority = "Low";
        $statement = $this->pdo->prepare($sql);
        
        $statement->execute([
            ':task_name' => $task,
            ':task_status' => $status,
            ':task_priority' => $priority,
        ]) or die(print_r($statement->errorInfo(), true));

        return $this->pdo->lastInsertId();

    }

}