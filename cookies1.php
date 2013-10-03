<?php
//setcookie("vegetable", "carrot", time() + 3600, "/", $_SERVER['SERVER_NAME'], 0);
setcookie("vegetable", "carrot", time() + 3600);
setcookie("discount", "gold", time() + 3600);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Handling cookies</title>
    </head>
    <body>
        <pre>
        <h2>Handling cookies in PHP</h2>
            <?php
            print("Session ID: ".  session_id());
            print("Cookies:\n");
            print_r($_COOKIE);
            if (isset($_COOKIE['vegetable'])) {
                print("Welcome! Your vegetable is {$_COOKIE['vegetable']}");
            } else {
                print("This is your first visit");
            }
            ?>
        </pre>
        <a href="cookies2.php">go to cookies 2</a>
          
    </body>
</html>
