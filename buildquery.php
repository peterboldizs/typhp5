<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>build query</title>
    </head>
    <body>
        <h2>Building HTTP query strings</h2>
        <pre>
        <?php
        $qu = array(
            'name' => "Boldizs Péter",
            'interest' => "programming",
            'homepage' => "http://www.kiskapu.hu/prog"
        );
        $encquery = http_build_query($qu);
        print($encquery);
        print("\n");
        print($_SERVER['QUERY_STRING']);
        ?>
</pre>
    </body>
</html>
