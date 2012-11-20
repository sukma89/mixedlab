<?php
/*
* http://www.blogjava.net/Jack2007/archive/2008/10/17/234870.html
 给定一个长度为N的整数数组，只允许用乘法，计算任意（N-1）个数的组合乘积中最大的一组，并
 写出算法的时间复杂度。
        最容易想到的就是通过一次遍历把所有（N-1）个数的组合找出来，分别计算他们的乘积，并比较
		大小。由于总共有N个（N-1）个数的组合，总的时间复杂度为O（N的2次方）,显然这不是最好的解决
		办法。
		       且看下面的实现方法，当然也是比较简单的，毕竟没太多时间思考，他的时间复杂度只有O(N)。
*/
$arr = array(19, 2, -1, 77, 58, 39, 41, 8);
//$arr = array(1, 2, 3, 4, 5, 6);
$arr = array(1, 2, -3, 3, 4, 5);
function maxN($arr) {
	$max = 0;

	$size = count($arr);
	$s = array();
	$s[0] = 1;
	$t = array();
	$t[$size] = 1;

	for ($i = 1; $i <= $size; $i++) {
		$_i = $i - 1;
		$s[$i] = $s[$_i] * $arr[$_i];
	}

	for ($i = $size-1; $i >= 0; $i--) {
		$_i = $i + 1;
		$t[$i] = $t[$_i] * $arr[$i];
	}

	for ($i = 1; $i <= $size; $i++) {
		$p = $s[$i-1] * $t[$i];
		if ($p > $max) {
			$max = $p;
		}
	}

	return $max;
}

echo maxN($arr) . "\n";
