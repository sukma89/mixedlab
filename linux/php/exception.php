<?php
class MyException extends Exception {}
class AnotherException extends MyException {}

class Foo {
	public function sth() {
		throw new AnotherException();
	}

	public function sthElse() {
		throw new MyException();
	}
}

$a = new Foo();

try {

	try {
		$a->sth();
	} catch (AnotherException $e) {
		$a->sthElse();
	} catch (MyException $e) {
		echo "Caught Exception\n";
	}
} catch (Exception $e) {
	echo "No exception\n";


if ($e instanceof MyException) {
	echo "IS MyExcepton\n";
} else if ($e instanceof AnotherException) {
	echo "IS AnotherExcepton\n";
} else {
	echo "NO\n";
}

}
