<?php
/**
 * Required extensions:
 * exif
 * gd
 * imagick
 */

$img = 'yansuo_p1.jpg';
//$img = 'yansuo_p2.jpg';
echo '<h1>exif_read_data()</h1>';
$info = exif_read_data($img, NULL, true, false);

$thumb = exif_thumbnail($img, $width, $height, $type);
$mimeType = image_type_to_mime_type($type);
$data = base64_encode($thumb);

echo 'Thumbnail: ', $width , 'x', $height, ', Type:', 
	$type, ';', $mimeType , "<br /><br />\n";

echo '<img alt="" src="data:', $type, ';base64,', $data, '" />';

foreach ($info as $key=>$sinfo) {
	echo '<h3>', $key, '</h3>';
	if (is_array($sinfo)) {
		echo '<table border="1" cellspacing="0" borderColor="#CCC">';
		foreach ($sinfo as $skey=>$svalue) {
			echo '<tr><td>', $skey, '</td><td>', $svalue, '</td></tr>';
		}
		echo '</table>';
	}
}

if (class_exists('imagick')) {

	echo '<h1>Imagick::getImageProperties</h1>';

	$im = new imagick($img);

	$minfo = $im->getImageProperties();

	if (is_array($minfo)) {
		
		echo '<table border="1" cellspacing="0" borderColor="#CCC">';

		foreach ($minfo as $skey=>$svalue) {
			echo '<tr><td>', $skey, '</td><td>', $svalue, '</td></tr>';
		}

		echo '</table>';
	}
}


