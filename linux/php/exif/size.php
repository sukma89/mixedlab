<?php

$img = "test.png";
$img = "test.jpg";

$size = getimagesize($img, $info);

var_dump($size, $info);

