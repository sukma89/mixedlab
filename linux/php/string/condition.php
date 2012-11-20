<?php
$src1 = 'FR 23/11/2011';
$src2 = '2011/11/23';
$pattern = '#(?(?=[A-Z]{2}\s+)\d{2}/\d{2}/\d{4}|\d{4}/\d{2}/\d{2})#';

preg_match_all($pattern, $src1, $matches);
var_dump($matches);

preg_match_all($pattern, $src2, $matches);
var_dump($matches);

$pattern = '/(\()?[^\(\)]+(?(1)\))/';
preg_match_all($pattern, 'Hello, world', $matches);
var_dump($matches);

preg_match_all($pattern, 'Hel(lo, wor)ld', $matches);
var_dump($matches);

