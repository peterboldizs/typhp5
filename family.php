<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $family = array("dora","anna","david", "marti", "peter");
        foreach ($family as $firstname) {
            echo "Hello, $firstname<br>";
        }

        $kids = array(
            'first' => 'anna',
            'second' => 'dori',
            'third' => 'david'
        );
        foreach ($kids as $num => $kid) {
            echo "$num is $kid<br>";
        }
        echo "The third family member is $family[3]<br>";
        echo "The first is $family[0]<br>";

        //array copy-on-write
        $newfamily = $family;
        $newfamily[0] = "dorika"; //array is not copied until now
        foreach ($newfamily as $firstname) {
            echo "Hello new, $firstname<br>";
        }
        echo "old: $family[0]<br>";
        //echo "The first kid is $kids[0]";
        sort($family);
        echo "now sorted family:<br>";
        foreach ($family as $sortedname) {
            echo "Hello, $sortedname<br>";
        }
        if(is_array($family)) {
            echo "$family is an array";
        }
        //now OOP
        class Person {
            public $fName ='';
            
            function setName($namePar) {
                if(!is_null($namePar)) {
                    $this->fName = $namePar;
                }
            }

            function getName() {
                return $this->fName;
            }

            function greet($fName) {
                echo "Hello, $fName<br>";
            }

        }
        //use class
        $peter = new Person();
        $peter->setName('Petike');
        printf("\nMy name is %s\n", $peter->getName());
        $zoli = new Person;
        $zoli->setName('Zolika');
        printf("\nAnd I am %s\n", $zoli->getName());
        //invoke function
        $zoli->greet('Adrienn');
        $zoli->greet("Magda");

        //variables
        $thisisaprettybigvariable = "PHP";
        $small = & $thisisaprettybigvariable;
        echo "my var: $small<br>";
        $s1 = isset($newname);
        $newname = "Petike";
        $s2 = isset($newname);
        echo "isset: $s1 - $s2";
        unset($newname);
        $s3 = isset($newname);
        echo "isset: $s1 - $s2 - $s3";
        function update_counter() {
            //global $counter;
            static $counter = 0;
            $counter++;
            echo "<br>now static counter = $counter\n";
        }
        $counter = 10;
        update_counter();
        update_counter();
        echo "global counter = $counter\n";

        ?>
    </body>
</html>
