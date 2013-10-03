<?php

header("Content-type: image/png");
if (!empty($_GET)) {
    $picnum = (int) $_GET['picnum'];
    switch ($picnum) {
        case '1':
            // picture 1
            $pic1 = imagecreate(200, 200);
            $red = imagecolorallocate($pic1, 255, 0, 0);
            $blue = imagecolorallocate($pic1, 0, 0, 255);
            imageline($pic1, 0, 0, 199, 199, $blue);
            imagefill($pic1, 0, 199, $blue);
            imagepng($pic1);
            break;
        case '2':
            // picture 2
            $pic2 = imagecreate(200, 200);
            $aaa = imagecolorallocate($pic2, 125, 125, 0);
            $green = imagecolorallocate($pic2, 0, 255, 0);
            imagearc($pic2, 99, 99, 180, 180, 0, 360, $green);
            imagefill($pic2, 99, 99, $green);
            imagepng($pic2);
            break;
        case '3':
            // picture 3
            $pic3 = imagecreate(200, 200);
            $bbb = imagecolorallocate($pic3, 187, 125, 212);
            $ccc = imagecolorallocate($pic3, 123, 111, 175);
            imagefilledrectangle($pic3, 19, 19, 179, 179, $ccc);
            imagepng($pic3);
            break;
        case '4':
            // picture 4
            $pic4 = imagecreate(200, 200);
            $red = imagecolorallocate($pic4, 255, 0, 0);
            $blue = imagecolorallocate($pic4, 0, 0, 255);
            $points = array(10, 10, 190, 190, 190, 10, 10, 190);
            imagefilledpolygon($pic4, $points, count($points) / 2, $blue);
            //imagecolortransparent($pic4, $red);
            imagepng($pic4);
            break;
        case '5':
            // picture 5
            $pic5 = imagecreate(200, 200);
            $red = imagecolorallocate($pic5, 255, 0, 0);
            $blue = imagecolorallocate($pic5, 0, 0, 255);
            for ($x = 1; $x <= 5; $x++) {
                imagestring($pic5, $x, (20 * $x), (20 * $x), "Hello", $blue);
            }
            imagepng($pic5);
            break;
        case '6':
            // picture 6
            $pic6 = imagecreate(800, 200);
            $red = imagecolorallocate($pic6, 255, 0, 0);
            $blue = imagecolorallocate($pic6, 0, 0, 255);
            $font = "Vera.ttf";
            imagettftext($pic6, 50, 0, 20, 100, $blue, $font, "Welcome to PHP!");
            imagepng($pic6);
            break;
        default:
            echo "never mind";
            break;
    }
} else {
    print("no picture to display");
}
?>
