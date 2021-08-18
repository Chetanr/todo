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
                <h4>Tasks Ongoing</h4>
                <?php
                    $index = 0;
                    $inProgressCount = 0;
                    while(!empty($tasks[$index])) {
                        if ($tasks[$index]['task_status'] == 'In Progress'){
                            $inProgressCount++;
                ?>
                <div class="content-div">
                    <label class="label">
                        <?php echo $tasks[$index]['task_name'];?>
                    </label>
                </div>
                    &nbsp; &nbsp;
                <div class="content-div2">
                    <form action="deleteTask.php" method="post">
                    <input type = "hidden" value="<?php
                        echo $tasks[$index]['task_name'];
                        ?>" class="label" name = "taskName2">
                    </input>
                        <button>
                        <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="content-div3">
                <form action="updateTask.php" method="post">
                    <input type = "hidden" value="<?php
                        echo $tasks[$index]['task_name'];
                        ?>" class="label" name = "taskName">
                    </input>
                    <button>
                    <i class="fa fa-check"></i>
                    </button>
                    </form>
                </div>
                <?php
                    }
                $index++;
            }?>
            <h4>Tasks Completed</h4>
                <?php
                    $j = 0;
                    $k = 0;
                    while(!empty($tasks[$j])) {
                        if ($tasks[$j]['task_status'] == 'Completed'){
                            $k++;
                ?>
                <div class="content-div">
                    <label class="label">
                        <?php echo $tasks[$j]['task_name'];?>
                    </label>
                </div>
                <?php
                        }
                $j++;
            }?>
            <br/>
            <br/>
            <div class="total-content1">
                <h4>Total: <?php echo $inProgressCount + $k ?></h4>
            </div>
            <div class="total-content2">
                <h4>Ongoing: <?php echo $inProgressCount ?></h4>
            </div>
            <div class="total-content3">
                <h4>Completed: <?php echo $k ?></h4>
            </div>
            
            </div>
            <br/>   
        </article> 
</html>

