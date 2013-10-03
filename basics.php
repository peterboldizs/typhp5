<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Basics</title>
    </head>
    <body>
        <div>
            <pre>
                <?php
                echo "Teach yourself PHP5";
                print "\nhello world";
                print ("\nhello again");
                //phpinfo();
                $first;
                $num1 = 2;
                $num2 = 4.5;
                $str = "hello";
                $fname = "John";
                $bol = true;
                $res = $num1 + $num2;
                print("\n$num1 + $num2 = $res");
                print "\ngetting types:"."\n";
                print gettype($first)."\n";
                print 'is_null($first):'."\n";
                print is_null($first)."\n";
                var_dump($first);
                print is_integer($num1);
                print gettype($num1)."\n";
                var_dump($num1);
                if(is_double($num2)) {
                    print '$num2 is now double'."\n";
                    settype($num2, string);
                }
                if(is_string($num2)) {
                    print '$num2 is now string'."\n";
                    settype($num2, int);
                }
                print gettype($num2)."\n";
                var_dump($num2);
                print("\ncast: ");
                $varstore = (double)$num2;
                print gettype($varstore)."\n";
                print($num2);
                print gettype($num2)."\n";
                print gettype($str)."\n";
                var_dump($str);
                print gettype($bol)."\n";
                var_dump($bol);
                print("\nvariable substitution: ");
                print ("$str, $fname");
                print("\nno variable substitution: ");
                print ('$str, $fname');
                print("\nMath:");
                $len = 212;
                print("length is ".($len/100)." meters.");
                define("MYUSER", "Anna");
                print "\nWelcome, ".MYUSER;
                print "\nthe version of php: ".PHP_VERSION;
                print "\noperations with $num1 and $num2";
                print ($num1 < $num2)."\n";
                print ($num1 <= $num2)."\n";
                print ($num1 > $num2)."\n";
                print ($num1 >= $num2)."\n";
                print ($num1 != $num2)."\n";
                ?>
            </pre>
        </div>
    </body>
</html>
