<?php
namespace Db;


class SQLiteConnection {

    private $pdo;

    /*
        connect to the database
    */
    public function connect() {
        if ($this->pdo == null) {
            try {
                $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
             } catch (\PDOException $e) {
                echo "failed";
             }
        }
        return $this->pdo;
    }
}