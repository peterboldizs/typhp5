<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Operators</title>
    </head>
    <body>
        <form action="<?php $PHP_SELF; ?>" method="post">
            First operand: <input type="text" name="firstOp"/><br>
            Second operand: <input type="text" name="secondOp"/><br>
            <input type="submit" value="evaluate!"/><br>
        </form>
        <?php
            $intVal1 = (int)$_POST['firstOp'];
            $floatVal1 = (float)$_POST['secondOp'];
            if(is_int($intVal1)) {
                echo "$intVal1 is int<br>";
            }
            if(is_float($floatVal1)) {
                echo "$floatVal1 is float<br>";
            }
            $result = $inttVal1 + $floatVal1;
            echo "result = $result<br>";
            if(is_float($result)) {
                echo "$result is float";
            }
        ?>
    </body>
</html>
