<?php
session_start();

function randText()
{
    $txt = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $str = "";
    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, strlen($txt) - 1);
        $str .= $txt[$index];
    }
    return $str;
}

$image = imagecreate(80, 30);
$backColor = imagecolorallocate($image, 220, 220, 220);
$textColor = imagecolorallocate($image, 0, 0, 0);
$code = randText();
imagestring($image, 5, 15, 7, $code, $textColor);
imagepng($image);
header("Content-type:image/png");
$_SESSION['captcha'] = $code;
imagecolordeallocate($backColor);
imagecolordeallocate($textColor);
imagedestroy($image);
?>