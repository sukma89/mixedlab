<?php
/**
 * geo_distance.php
 * 
 * Created on 2010-9-29
 * @author James Tang (fwsous@gmail.com) 
 * @copyright (C)2010 <a href="http://fwso.cn">James Lab</a>.
 */
 
/**
 * Calculate the distance between two coordinates.
 * @param array $s, array(float:latitude, float: longitude)
 * @param array $e, array(float:latitude, float: longitude)
 * @return float, the distance
 */
function geo_distance($s, $e) {

	//earth's mean radius in KM
	$r = 6378.137;

	$s[0] = deg2rad($s[0]);
	$s[1] = deg2rad($s[1]);

	$e[0] = deg2rad($e[0]);
	$e[1] = deg2rad($e[1]);

	$d0 = abs($s[0] - $e[0]);
	$d1 = abs($s[1] - $e[1]);

	$p = pow(sin($d0/2), 2) + cos($s[0]) * cos($e[0]) * pow(sin($d1/2), 2);

	$ds = $r * 2 * asin(sqrt($p));

	return $ds;
}


echo 'Map Distance: ' . geo_distance(array(24.123412341234,113.12341234123463), array(35.345, 117.8348)) . '<br />';
?>
