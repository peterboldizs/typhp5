<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php $PHP_SELF; ?>" method="post">
            <input type="text" name="testname"/><br>
            <input type="text" name="num"/><br>
            <input type="submit" value="Go!"
        </form>
        <?php
        $test = $_POST['testname'];
        echo "Hello, $test<br>";
        if ($test == 'Peter') {
            echo "I know you, $test<br>";
        } elseif ($test == 'David') {
            echo "OK, I know you, $test<br>";
        } else {
            echo "you are a stranger, $test<br>";
        }
        //with string
        switch ($test) {
            case 'david':
                echo "go to gym, $test<br>";
                break;
            case 'dori':
                echo "go to swim, $test<br>";
                break;
            case 'anna':
                echo "go to kindergarten, $test<br>";
                break;
            default:
                break;
        }
        //with number
        $num = (int) $_POST['num'];
        switch ($num) {
            case '1':
                echo "one";
                break;
            case '2':
                echo "two";
                break;
            case '3':
                echo "three";
                break;
            case '4':
                echo "four";
                break;
            default:
                echo "never mind";
                break;
        }
        //while loops
        $total = 0;
        $i = 1;
        while ($i <= 10) {
            $total += $i;
            $i++;
        }
        echo "<br>total: $total<br>";

        $j = 1;
        while ($i < 25) {
            while ($j < 25) {
                if ($j == 8) {
                    break 2;
                }
                $j++;
            }
        }
        echo "i= $i - j= $j<br>";

        /* while ($i < 25) {
          while($j < 25) {
          if($j == 8) {
          continue;
          }
          $j++;
          }
          }
          echo "i= $i - j= $j<br>";
         */

        for ($i = 0; $i < 15; $i++) {
            echo "this is $i<br>";
        }
         for ($i = 0; $i < 15; $i++) {
            include "newhtml.html";
        }
        ?>
    </body>

</html>
