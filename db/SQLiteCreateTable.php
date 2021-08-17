<?php

namespace Db;

class SQLiteCreateTable {


    private $pdo;


    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function createTables() {
        $commands = ['CREATE TABLE IF NOT EXISTS tasks (
                        task_number VARCHAR(10) PRIMARY KEY,
                        task_name   VARCHAR (255) NOT NULL,
                        task_status VARCHAR (30),
                        task_priority VARCHAR (30)
                      )'];
        // execute the sql commands to create new tables
        foreach ($commands as $command) {
            $this->pdo->exec($command);
        }
    }

}