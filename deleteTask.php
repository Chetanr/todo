<?php
    require 'vendor/autoload.php';

    use Db\SQLiteConnection;
    use Db\SQLiteDelete;

    
    $pdo = (new SQLiteConnection())->connect();
    $update = new SQLiteDelete($pdo);


    $task = $_POST['taskName2'];
    $result = $update->deleteTask($task);

    return $result;

?>