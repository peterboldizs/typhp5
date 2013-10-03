<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PHP functions - part 2</title>
    </head>
    <body>
        <pre>
            <?php
            //by value
            function addFive($num) {
                $num += 5;
            }
            //by reference
            function addFiveRef(&$num) {
                $num += 5;
            }
            $oldNum = 10;
            print("before invoke:  $oldNum");
            addFive($oldNum);
            print("\nafter invoke:  $oldNum");
            if (function_exists("addFiveRef")) {
                addFiveRef($oldNum);
                print("\nexists, after invoke ref: $oldNum");
            }
            
            //use cases for parameter passing
            function tenTimes1() {
                global $num1;
                $num1 = $num1 * 10;
            }
            
            function tenTimes2($n) {
              $n = $n *10;
            }
            
            function tenTimes3(&$n) {
              $n = $n *10;
            }
            
            $num1 = 50;
            tenTimes1();
            print "\ntenTimes1: $num1";
            $num2 = 50;
            tenTimes2($num2);
            print "\ntenTimes2: $num2";
            $num3 = 50;
            tenTimes3($num3);
            print "\ntenTimes3: $num3";
            ?>
        </pre>
    </body>
</html>
