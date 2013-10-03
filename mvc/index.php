<?php 
require_once 'Controller.php';
require_once 'ApplicationResourcesImpl.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MVC Pattern in PHP</title>
    </head>
    <body>
        <h2>MVC Pattern in PHP</h2>
        <pre>
            <?php
            try {
                $controller = new Controller(new ApplicationResourcesImpl());
                $controller->handleRequest();
            } catch(Exception $e) {
                print_r($e);
            }
            
            ?>
        </pre>
    </body>
</html>
