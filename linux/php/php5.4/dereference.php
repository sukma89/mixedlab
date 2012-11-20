<?php

class Hello {
	public function say() {
		echo 'Hello, world!' . "\n";
	}
}

function get_hello() {
	return new Hello();
}

get_hello()->say();

