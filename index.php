<?php
require 'vendor/autoload.php';

use App\SQLiteConnection;

$pdo = (new SQLiteConnection())->connect();
// if ($pdo != null)
//     echo 'Connected to the SQLite database successfully!';
// else
//     echo 'Whoops, could not connect to the SQLite database!';
?>

<html>
    <head>
    <link rel="stylesheet" href="./assets/css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>To do List</h1>
    </head>
    
    

    <main class="cards">
        <article class = "card">
            <div class="text">
            <input type = "text" maxlength="30" class = "task"/>
            <button>Add Task</button> 
            </div>
            <br/>   
        </article>
   
    </main>

    
</html>

