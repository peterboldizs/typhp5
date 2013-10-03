<?php
session_start();
if (empty($_SESSION['products'])) {
    $_SESSION['products'] = array();
}
if (is_array($_REQUEST['product_form'])) {
    $_SESSION['products'] = array_unique(
            array_merge($_SESSION['products'], $_REQUEST['product_form'])
    );
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sessions in PHP</title>
    </head>
    <h2>Sessions in PHP</h2>
    <body>
        <pre>
            <?php
            print("Welcome!\nYour session ID: " . session_id());
            $_SESSION['product1'] = "screwdriver";
            $_SESSION['product2'] = "HAL-2000";
            print("\nsession variables saved here: " . session_save_path());
            foreach ($_SESSION as $key => $value) {
                print("\n$key = $value");
            }
            print("\nProducts in session:\n");
            print_r($_SESSION['products']);
            $enc_sess = session_encode();
            print("\nEncoded session: $enc_sess");
//            $dec_sess = session_decode($enc_sess);
//            foreach ($dec_sess as $sessvalue) {
//                print("\n$sessvalue");
//            }
            ?>
        </pre>
        <h2>Product browser</h2>
        <form action="<?php print $_SERVER['PHP_SELF'] ?>" method="post">
            <select name="product_form[]" multiple="multiple">
                <option>Hammer</option>
                <option>Wrench</option>
                <option>Stapler</option>
                <option>Saw</option>
            </select>
            <input type="submit" value="OK"></input>
        </form>
        <a href="cookies1.php?<?php print session_id(); ?>">go to cookies</a>
    </body>
</html>
