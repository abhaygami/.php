<?php
    session_start();
    $num = rand(100000,999999);
    $text = dechex($num);
    $_SESSION['captcha'] = $text;

    $image = imagecreate(120,40);

    $backgroundColor = imagecolorallocate($image,0,0,0);
    $textColor = imagecolorallocate($image,255,255,255);

    $fontSize = 5;

    imagestring($image,$fontSize,40,12,$text,$textColor);

    header("Content-Type: image/jpeg");

    imagejpeg($image);
    
?>