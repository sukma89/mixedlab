<?php
$src = 'Hello, world, A very popular demo program called "Hello, world"9., df Hello, world. Test data.hello, world. ';
$p1 = '/Hello,\sworld/';
$p2 = '/Hello,\sworld/i';
$p3 = '/(?:")Hello,\sworld(?:")/';

preg_match_all($p1, $src, $matches);
var_dump($matches);
preg_match_all($p2, $src, $matches);
var_dump($matches);
preg_match_all($p3, $src, $matches);
var_dump($matches);
