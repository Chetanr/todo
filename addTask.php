<?php
    require 'vendor/autoload.php';

    use Db\SQLiteConnection;
    use Db\SQLiteInsert;

    
    $pdo = (new SQLiteConnection())->connect();
    $insert = new SQLiteInsert($pdo);


    $task = $_POST['task'];
    $task_id = $insert->insertTask($task);

    return $task_id;

?>