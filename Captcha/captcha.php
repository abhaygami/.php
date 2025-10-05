<?php
session_start();
$text = rand(100000, 999999);
$_SESSION['captcha'] = $text;

$height = 40;
$width = 120;
$image_p = imagecreate($width, $height);

// Pink background
$background_color = imagecolorallocate($image_p, 255, 182, 193); 

// Black text
$text_color = imagecolorallocate($image_p, 0, 0, 0);

$font_size = 15;

// Add random noise lines for better design
for ($i = 0; $i < 4; $i++) {
    $line_color = imagecolorallocate($image_p, 0, 0, 0);
    imageline($image_p, 0, rand()%$height, $width, rand()%$height, $line_color);
}

// Draw text
imagestring($image_p, $font_size, 30, 12, $text, $text_color);

header("Content-Type: image/png");
imagepng($image_p);
imagedestroy($image_p);
?>
