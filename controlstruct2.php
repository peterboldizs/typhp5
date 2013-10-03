<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PHP control structures</title>
    </head>
    <body>
        <pre>
            <?php
            $num1 = 2;
            
            print "IF statement\n";
            if ($num1 < 5) {
                echo "less than 5";
            } else {
                echo "greater than 5";
            }

            $str1 = "other";
            if ($str1 == "good") {
                echo "\nit is good";
            } elseif ($str == "bad") {
                echo "\nit is bad";
            } else {
                echo "\nit is ugly";
            }
            print ($str1 == "other") ? "\nit is other" : "something";

            //same with switch
            print "\nSWITCH statement\n";
            switch ($str1) {
                case "good":
                    echo "\nit is good";
                    break;
                case "bad":
                    echo "\nit is bad";
                    break;
                case "ugly":
                    echo "\nit is ugly";
                    break;
                default :
                    print "\nsomething else";
                    break;
            } 
            
            print "\nWHILE loop";
            while($num1 < 5) {
                print "\nnumber: $num1 doubled: ".($num1 *2);
                $num1++;
            }
            echo "\nnow the number is: $num1";
            do {
                print "\nanother round for $num1";
                $num1++;
            } while($num1 < 10);
            
            echo "\nFOR loop";
            for ($num2 = 1; $num2 < 5; $num2++) {
                print "\nfor printing: $num2";
            }
            //use break
            $num3 = -4;
            for(;$num3 < 5;$num3++) {
                if($num3 == 0) {
                    print "\ndo not divide by $num3";
                    //break;
                    continue;
                }
                $num4 = 3000/$num3;
                print "\ndivision result: $num4";
            }
            ?>
        </pre>
    </body>
</html>
