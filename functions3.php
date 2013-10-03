<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        <form action="<?php $PHP_SELF; ?>" method="post">
            <input type="text" name="teststr"/><br>
            <input type="text" name="teststr2"/><br>
            <input type="submit" value="go!"/>
        </form>
        <?php
        $myvar = $_POST['teststr'];
        $myvar2 = $_POST['teststr2'];
        $len = strlen($myvar);
        echo "the length is $len<br>";
        $sinus = sin($myvar);
        echo "sinus: $sinus<br>";
        $sum = adder($myvar, $myvar2);
        echo "function result: $sum<br>";

        echo "before: $len<br>";
        doubler($len);
        echo "after: $len<br>";
        echo "argument counter:<br>";
        echo count_list(1,2,4,6,8,11);

        echo "static counter:<br>";
        for ($index = 0; $index < 15; $index++) {
            //echo "\ncounter: ";
            print counter();
        }
        
        takes_two(1, 2);
        //takes_two(1);
        $names = array("fred","barney","wilma","betty");
        $person =& find_one(1);
        echo "<br>person(before): $person";
        $person = "petike";
        //print the changed array
        foreach ($names as $value) {
            echo "<br>$value";
        }

        if(function_exists(counter)) {
            echo "<br>function counter exists";
        }

        //-----------------------------
        // functions
        //-----------------------------

        function adder($i1, $i2) {
            return $i1 + $i2;
        }

        function counter() {
            static $cntr = 0;
            return $cntr++;
        }

        //pass by reference
        function doubler(&$a) {
            $a = $a * 2;
        }

        function count_list() {
            if(func_get_args () == 0) {
                return false;
            }
            for ($index = 0; $index < func_num_args(); $index++) {
                $count += func_get_arg($index);
            }
            return $count;
        }

        //missing params
        function takes_two($a,$b) {
            if(isset ($a)) {
                echo "a is set \n";
            }
            if(isset ($b)) {
                echo "b is set \n";
            }
        }
        //return an array
        function & find_one($n) {
            global $names;
            return $names[$n];
        }
        ?>
    </body>
</html>
