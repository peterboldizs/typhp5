<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Processes</title>
    </head>
    <body>
        <h2>Invoking commands from PHP</h2>
        <pre>

            <?php
            exec("dir", $out, $ret);
            print("Return value: $ret");
            foreach ($out as $value) {
                print("\n $value");
            }
            ?>
        </pre>
    </body>
</html>
