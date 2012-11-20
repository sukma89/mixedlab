<?php
$subject = array('1', 'a', '2', 'b', '3', 'A', 'B', '4'); 
$pattern = array('/\d/', '/[a-z]/', '/[1a]/'); 
$replace = array('A:$0', 'B:$0', 'C:$0'); 

echo "preg_filter returns\n";
print_r(preg_filter($pattern, $replace, $subject)); 

echo "preg_replace returns\n";
print_r(preg_replace($pattern, $replace, $subject)); 

echo preg_replace(array('/w([a-z]+)/', '/c([a-z]+)/'), 
	array('c\1', 'd\1'), 'Hello, world, w2,c3'), "\n";
echo preg_replace(array('/c([a-z]+)/', '/w([a-z]+)/'), 
	array('d\1', 'c\1'), 'Hello, world, w2,c3'), "\n";

preg_match_all('/((?:James)\s+(?i:[a-z]+))/', 'Welcome, James Tang, Peter Tang, James Pu, Jerry Tang.', $matches);
var_dump($matches);

preg_match_all('/((?!:James)\s+(?i:[a-z]+))/', 'Welcome, James Tang, Peter Tang, James Pu, Jerry Tang.', $matches);
var_dump($matches);
