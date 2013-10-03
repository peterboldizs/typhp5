<?php
$guessnum = 42;
$msg = "";
if (!isset($_POST['tip'])) {
    $msg = "welcome to number guessing";
} else if ($_POST['tip'] > $guessnum) {
    print("too big, try smaller");
} else if ($_POST['tip'] < $guessnum) {
    print("too small, try bigger");
} else {
    header("Location:congrats.html");
    /* if(!headers_sent()) {
      header("Location: congrats.html");
      } */
    exit;
}
$tip = (int) $_POST['tip'];
$numtries = (int) $_POST['tries'];
$numtries++;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Number guessing</title>
    </head>
    <body>
        <div>
            <pre>
            <h1><?php print("$msg"); ?></h1>
                <?php
                print("\nNumber of tips: $numtries");
                ?>
            </pre>
            <form action="<?php $PHP_SELF; ?>" method="post">
                <input type="hidden" name="tries" value="<?php print $tries ?>"/>
                <input type="text" name="tip" value="<?php print $tip ?>"/>
                <input type="submit" value="Guess!"/>
            </form>
        </div>
    </body>
</html>
