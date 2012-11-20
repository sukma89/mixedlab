<?php
$file = 'i1.dat';
$saveto = './i1/';

$contents = file_get_contents($file);

if ($contents && strlen($contents) > 0) {
	//echo $contents;
	//$contents = '<p><img src="http://google.daili39.com/daili39.com.php?u=25dda9d2f5cac5T2k4dmJIVnNlbWx0Wnk1amIyMHZhVEEzTHpBd016UmtaUzVxY0djPQ%3D%3D&amp;b=29"  alt="" /><p><img src="http://google.daili39.com/daili39.com.php?u=25dda9d2f5cac5T2k4dmJIVnNlbWx0Wnk1amIyMHZhVEEzTHpBd016UmtaUzVxY0djPQ%3D%3D&amp;b=29"  alt="" />';
	if (!file_exists($saveto)) {
		if (!mkdir($saveto)) {
			echo 'Failed to mkdir ' . $saveto . '<br />';die;
		}
	}

	$matches = array();

	preg_match_all('/<img[^<>]+src="([^<>"]+b=29)"[^<>]*\/>\s*<br\s+\/>/i', $contents, $matches);
	//var_dump($matches);

	if ( ($c = count($matches)) > 0) {
		echo 'Matches: ' . $c . '<br />';
		$i = 0;
		
		if (isset($matches[1]) && ($c = count($matches[1])) > 0) {
			echo 'Matches(R): ' . $c . '<br />';
			//die;
			set_time_limit(0);
			ignore_user_abort();
			foreach ($matches[1] as $url) {
				echo $url . '(' . $i . ')'. "<br />\n";
				$_img = file_get_contents($url);
				if ($_img) {
					file_put_contents($saveto . 'i1_' . $i . '.jpg', $_img);
					$i++;
				}
			}			
		}	
	} else {
		echo 'No Image Data Matched.<br />';
	}
} else {
	echo 'No data';
}
