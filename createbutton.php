<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
if (isset($_GET["message"])) {
    $font = 'times';
    $size = 12;
    $im = imagecreatefrompng('button.png');
    $tsize = imagettfbbox($size, 0, $font, $_GET["message"]);
    //center
    $dx = abs($tsize[2] - $tsize[0]);
    $dy = abs($tsize[5] - $tsize[3]);
    $x = (imagesx($im) - $dx) / 2;
    $x = (imagesy($im) - $dy) / 2 + $dy;

    //draw text
    $black = imagecolorallocate($im, 0, 0, 0);
    imagettftext($im, $size, 0, $x, $y, $black, $font, $_GET["message"]);

    //return image
    header('Content-type: image/png');
    imagepng($im);
    exit;
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Button form</title>
    </head>
    <body>
        <form action="<? $PHP_SELF; ?>" method="get">
            Message on button: <input type="text" name="message"/>
            <input type="submit" value="create button"/>
        </form>
    </body>
</html>
