<?php
    require 'vendor/autoload.php';

    use Db\SQLiteConnection;
    use Db\SQLiteUpdate;

    
    $pdo = (new SQLiteConnection())->connect();
    $update = new SQLiteUpdate($pdo);


    $task = $_POST['taskName3'];
    $priority = $_POST['priority'];
    $result = $update->updateTask($task, $priority);

    return $result;

?>