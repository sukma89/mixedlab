<?php
$pattern = '/.*#/';
$src = 'Hello, world#James Tang#China';

preg_match($pattern, $src, $matches);
var_dump($matches);

preg_match($pattern . 'U', $src, $matches);
var_dump($matches);
