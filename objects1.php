<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/plain; charset=UTF-8">
        <title>PHP functions</title>
    </head>
    <body>
        <pre>
            <?php

// introduction to OOP in PHP
            class Item {

                private $name;
                private $code;

                function Item($name = "myitem", $code = 0) {
                    $this->name = $name;
                    $this->code = $code;
                }

                function getName() {
                    return $this->name;
                }

                function setName($nam) {
                    $this->name = $nam;
                }

                function getCode() {
                    return $this->code;
                }

                function setCode($cod) {
                    $this->code = $cod;
                }

                function describe() {
                    print("\nI am  " . $this->name . " - " . $this->code);
                }

            }

            class PricedItem extends Item {

                private $price;

                function PricedItem($name, $code, $price) {
                    parent::Item($name, $code);
                    $this->price = $price;
                }

                function describe() {
                    //only getters can be used re. parent fields!
                    print("\nI am  " . $this->getName() . " - " . $this->getCode() . " price: " . $this->price);
                }

            }

            $item1 = new Item();
            $item1->setName("myitem");
            $item1->setCode(1234);
            printf("I am %s, my code is %d", $item1->getName(), $item1->getCode());
            $item1->describe();
            $item2 = new Item("youritem", 4567);
            $item2->describe();
            $item3 = new PricedItem("outpriceditem", 7890, 12.99);
            $item3->describe();

            $a = array('name' => 'Fred', 'age' => '35', 'wife' => 'Wilma');
            $o = (object) $a;
            echo "\nName: $o->name";
            echo "\nWife: $o->wife";
            ?>
    
        </pre>
    </body>
</html>