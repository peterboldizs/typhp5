#!/usr/bin/php
<?php

//now OOP
class Person {

    public $fName = '';

    function setName($namePar) {
        if (!is_null($namePar)) {
            $this->fName = $namePar;
        }
    }

    function getName() {
        return $this->fName;
    }

}

//use class
$peter = new Person();
$peter->setName('Petike');
printf("\nMy name is %s\n", $peter->getName());
$zoli = new Person;
$zoli->setName('Zolika');
printf("\nAnd I am %s\n", $zoli->getName());

//variables
$thisisaprettybigvariable = "PHP";
$small = & $thisisaprettybigvariable;
echo "my var: $small\n";

function update_counter() {
    //global $counter;
    static $counter = 0;
    $counter++;
    echo "now static counter = $counter\n";
}

$counter = 10;
update_counter();
update_counter();
echo "global counter = $counter\n";
?>
