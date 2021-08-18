<?php

namespace Db;

class SQLiteCreateTable {


    private $pdo;


    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    /*
        function to create the table if it not exists
    */
    public function createTables() {
        $command = 'CREATE TABLE IF NOT EXISTS tasks (
                        task_number VARCHAR(10) PRIMARY KEY,
                        task_name   VARCHAR (255) NOT NULL,
                        task_status VARCHAR (30),
                        task_priority VARCHAR (30)
                      )';
        // execute the sql command to create new table
        $this->pdo->exec($command);
    }

}