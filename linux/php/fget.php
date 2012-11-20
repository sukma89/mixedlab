<?php
/**
 * FGet.php
 * 
 * 1. Download and save.
 * http://camo.lab/fget.php?url=http://fwso.cn/index.php&file
 * 
 * 2. Display
 * http://camo.lab/fget.php?url=http://fwso.cn/index.php
 * 
 * @author James Tang
 * 
 */
set_time_limit(0);
ignore_user_abort(true);

$url = $_GET['url'];

$get = '';
$file_result = 'No file.';

if (strpos($url, 'http://') === 0) {
	$get = file_get_contents($url);
	if (isset($_GET['file'])) {
		$file = substr($url, strrpos($url, '/') + 1);
		$ext = strtolower(substr($file, strrpos($file, '.')));
		
		if ($ext == '.php') {
			$ext .= '.bak';
		}
		
		$file = $file . time() . $ext;
		
		$file_result = 'Failed.';
		if (file_put_contents($file, $get)) {
			$file_result = 'Saved to: ' . $file;
		}
		
		$get = '';
	} else {
		$get = base64_encode($get);
	}
} else {
	header('Location:/fget.php', true, 404);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>FGet.php</title>
		<meta charset="utf-8" />
	</head>
	
<body>
	<p style="border:1px solid #3366FF;padding:10px;"><?php echo $file_result;?></p>
	<p>
	<?php 
	$code = $get;
	if (isset($_POST['code'])) {
		$code = $_POST['code'];
		//echo htmlspecialchars(base64_decode($code));
		echo iconv('gb2312', 'utf-8', base64_decode($code));
	}
	?>
	</p>
	<div>
	<form action="" method="post">
		<textarea name="code" style="width:500px;height:300px;"><?php echo $code;?></textarea>
		
		<input type="submit" value="Decode" />
	</form>
	</div>
	
	<div>
	<form action="" method="get">
		<input type="text" name="url" />
		<input type="submit" value="Get" />
	</form>
	</div>
</body>
</html>

