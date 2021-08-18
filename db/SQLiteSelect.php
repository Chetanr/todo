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

    /*
        get all the tasks from the database
    */
    public function getTasks() {
        // SQL statement to get all tasks
        $sql = "SELECT * FROM tasks";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;

    }
}