<?php 
    $num = rand(100000,999999);
    $text = dechex($num); //
    session_start();
    $_SESSION['captcha'] = $text;

    $img = imagecreate(120,40);

    $backgroundColor = imagecolorallocate($img,255,255,255);
    $textColor = imagecolorallocate($img,0,0,0);

    imagestring($img,5,30,12,$text,$textColor);

    header("Content-type: image/jpeg");
    imagejpeg($img);
?>