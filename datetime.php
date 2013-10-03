<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Date and time handling</title>
    </head>
    <body>
        <pre>
            <?php
            print time();
            $date_array = getdate();
            foreach ($date_array as $key => $value) {
                print("\n$key = $value");
            }
            $time = mktime(10, 27, 31, 7, 20);
            print("\nthe date: ");
            print date("Y.m.d H:i",  $time);
            if( checkdate(12, 12, 2012)) {
                print("\ndate OK");
            } else {
                print("\ndate wrong");
            }
            if( checkdate(13, 35, 2012)) {
                print("\ndate OK");
            } else {
                print("\ndate wrong");
            }
            ?>
        </pre>
    </body>
</html>
