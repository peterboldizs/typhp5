<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Advanced objects</title>
    </head>
    <body>
        <h2>Advanced objects</h2>
        <pre>
            <?php
            //classes
            class Article {
                const OLD = 1;
                const RECENT = 2;
                const OUTSIDE = 4;
                private $state = 0;
                public $name = "art";
                private $updater;

                public function setUpdater(Updater $upd) {
                    $this->updater = $upd;
                }

                function __destruct() {
                    print("\ndestructor invoked");
                    if (!empty($this->updater)) {
                        $this->updater->update($this);
                    }
                }

                public function addState($num) {
                    $this->state |= $num;
                }

                public function isOld() {
                    return (Article::OLD & $this->state) ? true : false;
                }

                public function isRecent() {
                    return (Article::RECENT & $this->state) ? true : false;
                }

                public function getState() {
                    return $this->state;
                }

                public function doSomething() {
                    throw new Exception("exception during method", 719);
                    print("unreachable");
                }

                public function readFile($filename) {
                    if (!file_exists($filename)) {
                        throw new FileNotFoundException("$filename cannot be found");
                    }
                    $fp = @fopen($filename, 'r');
                    if (!$fp) {
                        throw new FileOpenException("$filename cannot be opened");
                    }
                    while (!feof($fp)) {
                        $ret .= fgets($fp, 1024);
                    }
                    fclose($fp);
                    return $ret;
                }

            }

            class FileNotFoundException extends Exception {
                
            }

            class FileOpenException extends Exception {
                
            }

            class Updater {

                public function update(Article $art) {
                    print("\nupdating... $art->name");
                }

            }

            class Shop {

                private static $instance;
                public $name = "MyShop";

                private function __construct() {
                    //cannot be invoked publicly;
                }

                public static function getInstance() {
                    if (empty(self::$instance)) {
                        Shop::$instance = new Shop();
                    }
                    return Shop::$instance;
                }

            }

            class TestCall {

                function __call($methodname, $params) {
                    $ret = "\n$methodname invoked with\n ";
                    $ret .= print_r($params, true);
                    return $ret;
                }

            }

            //working with classes
            //state
            $art = new Article();
            $art->addState(Article::OLD);
            $art->addState(Article::RECENT);
            $art->addState(Article::OUTSIDE);
            if ($art->isOld()) {
                print("\nOld");
            }
            if ($art->isRecent()) {
                print("\nRecent");
            }
            printf("\nState: %b", $art->getState());

            //singleton
            $firstShop = Shop::getInstance();
            $firstShop->name = "My Singleton Acme Shop";
            $secondShop = Shop::getInstance();
            print ("\n$secondShop->name");

            //call
            $caller = new TestCall();
            print $caller->justAMethod("a", "b", 1);

            //destructor
            $art2 = new Article();
            $art2->setUpdater(new Updater());
            unset($art2);
            
            //exceptions
            $art3 = new Article();
            try {
                $art3->doSomething();
            } catch (Exception $e) {
                print("\nin catch: " . $e->getCode() . " = " . $e->getMessage());
            }
            try {
                print("\n");
                print $art3->readFile("test1.txt");
                print("\n");
                print $art3->readFile("test2.txt");
                print("\n");
            } catch (FileNotFoundException $fnfe) {
                print $fnfe->getMessage();
            } catch (FileOpenException $foe) {
                print $foe->getMessage();
            }
            ?>
        </pre>
    </body>
</html>
