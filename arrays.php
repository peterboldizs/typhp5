<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PHP Arrays</title>
    </head>
    <body>
        <pre>
            <?php
	//this is to test git
	//another change before commit
            $users = array("peter", "marti", "david", "dori", "anna");
            $users[] = "robi";
            foreach ($users as $pers) {
                print "\nperson: $pers";
            }

            //associative array
            $person = array(
                "fname" => "peter",
                "lname" => "boldizs",
                "age" => 41
            );
            print("\n");
            print $person['lname'];

            //two dimensional arrays
            $people = array(
                array(
                    "fname" => "peter",
                    "lname" => "boldizs",
                    "age" => 41),
                array(
                    "fname" => "david",
                    "lname" => "boldizs",
                    "age" => 12),
                array(
                    "fname" => "anna",
                    "lname" => "boldizs",
                    "age" => 5)
            );
            print("\n");
            print $people[2]['age'];
            print("\n");
            print count($people);
            print("\n");
            print count($people[0]);
            foreach ($people as $person) {
                print("\n");
                foreach ($person as $key => $value) {
                    print("\n$key = $value");
                }
            }
            //echo "\n using print_r():\n";
            //print_r($people);
            
            array_push($users, "feri", "zoli");
            foreach ($users as $pers) {
                print "\nperson: $pers";
            }
            
            sort($users);
            print("\nsorted:");
            foreach ($users as $pers) {
                print "\n $pers";
            }
            
            $busers = array_slice($users, 2,4);
            print("\nsliced:");
            foreach ($busers as $value) {
                print "\n $value";
            }
            
            while(count($busers)) {
                 $val = array_shift($busers);
                 print("\nprocessing $val ...");
                 print("\nnow the array has ".count($busers)." elements");
            }
            
            function addThese() {
                $pars = func_get_args();
                $retval = "<table border=\"1\">";
                foreach ($pars as $key => $value) {
                    $result += $value;
                    $retval .= "<tr><td>". ($key + 1). ". number: </td><td>$value</td></tr>"; 
                }
                $retval .= "<tr><td> Result: </td><td>$result</td><tr>";
                $retval .= "</table>";
                return $retval;
            }
            
            print addThese(12,23,34,45,56);
            
            ?>
        </pre>
    </body>
</html>
