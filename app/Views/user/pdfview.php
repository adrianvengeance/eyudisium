<?php
// $file = $path;
// header('Content-type: application/pdf');
// header('Content-Disposition: inline; filename:"' . $file . '"');
// header('Content-Transfer-Encoding: binary');
// header('Accept-Ranges: bytes');
// @readfile($file);


// $file = $path;
// $filename = $pdf; /* Note: Always use .pdf at the end. */

// header('Content-type: application/pdf');
// header('Content-Disposition: inline; filename="' . $filename . '"');
// header('Content-Transfer-Encoding: binary');
// header('Content-Length: ' . filesize($file));
// header('Accept-Ranges: bytes');

// @readfile($file);


$url = $path;
$content = file_get_contents($url);

header('Content-Type: application/pdf');
header('Content-Length: ' . strlen($content));
header('Content-Disposition: inline; filename="$pdf"');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');
ini_set('zlib.output_compression', '0');
die($content);
