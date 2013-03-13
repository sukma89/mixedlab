<?php

//$url = 'http://dict.fwso.cn/youdao_export.php';
//$url = 'http://dict.example.com/youdao_export.php';
$url = 'http://test.example.com/testfile.iso';
$data = file_get_contents($url);
file_put_contents('tmp.iso', $data);
/*
$fp = fsockopen('dict.fwso.cn', 80, $errno, $error);

$request = "GET /youdao_export.php HTTP/1.1\r\n";
$request .= "Host: dict.fwso.cn\r\n";
$request .= "Connection: close\r\n";
$request .= "\r\n";

fwrite($fp, $request);

$wfp = fopen('tmp2.gz', 'w');

$body_start = false;
while (!feof($fp)) {
    if (!$body_start) {
        $header = fgets($fp, 128);
        echo $header . "<br />\n";
        if ($header == "\r\n") {
            $body_start = true;
        }
    } else {
        $data = fread($fp, 4096);
        fwrite($wfp, $data);
    }
}

fclose($wfp);
fclose($fp);
 */
