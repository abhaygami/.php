<?php
    session_start();
    $num = rand(100000, 999999);
    $text = dechex($num);
    $_SESSION['captcha'] = $text;

    $height = 50;
    $width = 150;
    $image_p = imagecreate($width, $height);

    // Pink background
    $background_color = imagecolorallocate($image_p,  255, 255, 255); 

    // Black text
    $text_color = imagecolorallocate($image_p, 0, 0, 255);

    $font_size = 5;

    // Add random noise lines for better design
    for ($i = 0; $i < 4; $i++) {
        $line_color = imagecolorallocate($image_p, 0, 0, 255);
        imageline($image_p, 0, rand()%$height, $width, rand()%$height, $line_color);
    }

    // Draw text
    imagestring($image_p, $font_size, 50, 18, $text, $text_color);

    header("Content-Type: image/png");
    imagepng($image_p);
    imagedestroy($image_p);
?>
