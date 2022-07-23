<?php
// Load the PHP logo, we need to create two instances 
// to show the differences
$logo1 = imagecreatefromjpeg('./img.jpg');
$logo2 = imagecreatefromjpeg('./img.jpg');

// Create the image instance we want to show the 
// differences on
$output = imagecreatetruecolor(imagesx($logo1) * 2, imagesy($logo1));

// Apply pixelation to each instance, with a block 
// size of 3
imagefilter($logo1, IMG_FILTER_PIXELATE, 100);
imagefilter($logo2, IMG_FILTER_PIXELATE, 50, true);

// Merge the differences onto the output image
imagecopy($output, $logo1, 0, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
imagecopy($output, $logo2, imagesx($logo2), 0, 0, 0, imagesx($logo2) - 1, imagesy($logo2) - 1);
imagedestroy($logo1);
imagedestroy($logo2);

// Output the differences
header('Content-Type: image/jpeg');
imagepng($output);
imagedestroy($output);
?>