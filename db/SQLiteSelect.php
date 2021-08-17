<?php

namespace Db;

/**
 * PHP SQLite Update Demo
 */
class SQLiteSelect {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * Initialize the object with a specified PDO object
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Mark a task specified by the task_id completed
     * @param type $taskId
     * @param type $completedDate
     * @return bool true if success and falase on failure
     */
    public function getTasks() {
        // SQL statement to get all tasks
        $sql = "SELECT * FROM tasks WHERE task_status = :status";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':status' => 'In Progress']);
        $result =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }
}