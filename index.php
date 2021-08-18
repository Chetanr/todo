<?php
require 'vendor/autoload.php';

use Db\SQLiteConnection as SQLiteConnection;
use Db\SQLiteCreateTable as SQLiteCreateTable;
use Db\SQLiteSelect as SQLiteSelect;

$sqlite = new SQLiteCreateTable((new SQLiteConnection())->connect());
$sqlite->createTables();

$select = new SQLiteSelect((new SQLiteConnection())->connect());
$tasks = $select->getTasks();
?>

<html>
    <head>
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>To do List</h1>
    </head>
        <article class = "card">
            <div class="text">
                <form action="addTask.php" method="post">
                    <input type = "text" name="task" id = "task" maxlength="30" class = "task"/>
                    <br/>
                    <input type="submit" class = "button" value = "Add task" />
                </form>
                <h4>Tasks in Progress</h4>
                <?php
                    $i = 0;
                    while(!empty($tasks[$i])) {
                        if ($tasks[$i]['task_status'] == 'In Progress'){
                ?>
                <div class="content-div">
                    <label class="label">
                        <?php echo $tasks[$i]['task_name'];?>
                    </label>
                </div>
                    &nbsp; &nbsp;
                <div class="content-div2">
                    <form action="deleteTask.php" method="post">
                        <button>
                        <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="content-div3">
                <form action="updateTask.php" method="post">
                    <input type = "hidden" value="<?php
                        echo $tasks[$i]['task_name'];
                        ?>" class="label" name = "taskName">
                    </input>
                    <button>
                    <i class="fa fa-check"></i>
                    </button>
                    </form>
                </div>
                    
                    <!-- &nbsp; -->
                    
                <!-- </div> -->
                <?php
                        }
                $i++;
            }?>
            </div>
            <br/>   
        </article> 
</html>

