<?php
$data = DataStore::getInstance();
$task = $data->getVar("tasks");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Task list</title>
    </head>
    <body>
        <div>
            <h3><?php print $data->getMessage();?></h3>
            <p>
                <b>The tasks</b>
                <a href="?cmd=AddTask">Add a task</a>
            </p>
            <table border="1">
                <?php
                foreach ($tasks as $task) {
                    print <<<TASK
   <tr><td>{$task['person']}</td><td>{$task['summary']}</td></tr>
TASK;
                }
                ?>
            </table>
        </div>
    </body>
</html>
