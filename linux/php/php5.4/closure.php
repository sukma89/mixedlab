<?php

function hello($str, $func) {
	return $func($str);
}

$name = "James Tang";

//php 5.3 features
echo hello($name, function ($str) {
	return strlen($str);
}) . "\n";

//php 5.4 features
$closure = function() { 
	    echo $this->foo . "\n";
};

$context = new \StdClass;
$context->foo = "Hello World";

$boundClosure = $closure->bindTo($context);
$boundClosure();
