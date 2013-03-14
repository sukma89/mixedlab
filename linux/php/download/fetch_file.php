<?php

$file = $_GET['file'];

if (!file_exists($file)) {
    header('HTTP/1.1 404 Not Found');
    exit;
}

$mimeType = mime_content_type($file);
$md5sum = md5_file($file, true);

header('Content-Type: ' . $mimeType . '; charset=binary');
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Content-MD5: ' . base64_encode($md5sum));
//header('Content-Length: ' . filesize($file));

$fp = fopen($file, 'r');

if ($fp) {
    while (!feof($fp)) {
        echo fread($fp, 4096);
    }
    fclose($fp);
}
