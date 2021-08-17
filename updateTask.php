<?php
    require 'vendor/autoload.php';

    use Db\SQLiteConnection;
    use Db\SQLiteUpdate;

    
    $pdo = (new SQLiteConnection())->connect();
    $update = new SQLiteUpdate($pdo);


    $task = $_POST['taskName'];
    $result = $update->completeTask($task);

    return $result;

?>