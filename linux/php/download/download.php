<?php

$url = 'http://test.example.com/testfile.iso';
$data = file_get_contents($url);
file_put_contents('tmp.iso', $data);
