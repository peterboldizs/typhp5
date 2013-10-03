<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Calculator</h2>
        <form action="<?php $PHP_SELF; ?>" method="post">
            <table>
                <tr>
                    <td>first:</td><td><input type="text" name="firstnum"/></td>
                </tr>
                <tr>
                    <td>second:</td><td><input type="text" name="secondnum"/></td>
                </tr>
                <tr>
                    <td>third:</td><td><input type="text" name="thirdstr"/></td>
                </tr>
                <tr>
                    <td>fourth:</td><td><input type="text" name="fourthbool"/></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Calculate!"/></td><td></td>
                </tr>
            </table>
        </form>
        <?php
        $first = $_POST['firstnum'];
        $second = $_POST['secondnum'];
        $third = $_POST['thirdstr'];
        //$fourth = $_POST['fourthbool'];
        $fourth = false;
        if (!empty($first) && !empty($second)) {
            if ($first == $second) {
                echo "$first and $second are the same";
            } else {
                echo "$first and $second are different";
            }
            echo "<br>";
            /* if (is_string($first) || is_string($second)) {
              echo "$first or $second is string, do not calculate...";
              } else { */
            $sum = $first + $second;
            if (is_int($sum)) {
                echo "$sum is integer";
            } else if (is_float($sum)) {
                echo "$sum is float";
            }
            $product = $first * $second;
            echo "<br>";
            echo "sum: $sum <br>";
            echo "product: $product";
            //}
        }
        if(is_string($third)) {
            echo "$third is string";
        }
        if(is_bool($fourth)) {
            echo "$fourth is boolean";
        }
        ?>
    </body>
</html>
