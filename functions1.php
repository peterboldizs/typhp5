<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PHP functions</title>
    </head>
    <body>
        <pre>
            <?php
            
            $testvar2 = "Anna";
            print(abs(-321));

            function sayHello() {
                $testvar = "Peter";
                global $testvar2;
                print("<h1>Hello! $testvar2</h1>");
            }

            function writeLine($line) {
                print("$line<br>\n");
            }

            function add($num1, $num2) {
                return $num1 + $num2;
            }

            function greet($name) {
                echo "\nhello, $name";
            }

            sayHello();
            writeLine("this is line 1");
            writeLine("this is line 2");
            print(add(2, 6));
            $func_container = "greet";
            $func_container("peter");
            print("\nmy test var: $testvar");
            //$numCalls = 0;
            function numberedTitles($title) {
                //global $numCalls;
                static $numCalls = 0;
                $numCalls++;
                print("<h2>$numCalls. $title</h2>");
            }
            numberedTitles("Widgets");
            print("\nwide selection");
            numberedTitles("Gadgets");
            print("best of their kind")
            ?>
        </pre>
    </body>
</html>
