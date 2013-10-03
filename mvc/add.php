<?php
$data = DataStore::getInstance();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add a task</title>
    </head>
    <body>
        <div>
            <h3><?php print $data->getMessage();?></h3>
            <form method="post" action="index.php">
                <input type="hidden" name="cmd" value="AddTask"/>
                <input type="hidden" name="addtask_submit" value="true"/>
                <p>your name<br/><input type="text" name="person" value="<?php print $_REQUEST['person']?>"/></p>
                <p>task summary<br/><input type="text" name="summary" value="<?php print $_REQUEST['summary']?>"/></p>
                <p><input type="submit" value="add task"/></p>
            </form>
        </div>
    </body>
</html>
