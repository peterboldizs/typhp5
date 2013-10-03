<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Server properties</title>
    </head>
    <body>
        <hr>
        <h3>Post</h3>
        <form action="<?php $PHP_SELF; ?>" method="post">
            Enter name: <input type="text" name="firstName"/>
            <input type="submit"/>
        </form>
        <hr>
        <h3>Get</h3>
        <a href="serverprops.php?tespar1=val1&testpar2=val2">Send GET request</a><br>
        <pre>
            <?php
            if (!empty($_POST['firstName'])) {
                echo "\nGreetings {$_POST['firstName']} and welcome to php";
                print("\nThis is your POST request information:\n");
                foreach ($_REQUEST as $key => $value) {
                    print("\$_REQUEST[\"$key\"] == $value\n");
                }
                print("\nThis is your server information:\n");
                foreach ($_SERVER as $key => $value) {
                    print("\$_SERVER[\"$key\"] == $value\n");
                }
            } else if (!empty($_GET)) {
                print("\nThis is your GET request information:\n");
                foreach ($_GET as $key => $value) {
                    print("\$_GET[\"$key\"] == $value\n");
                    print_r(gd_info());
                    phpinfo();
                }
            } else {
                echo "please enter your name";
            }
            ?>
        </pre>
    </body>
</html>
