<?php
/**
 * Required extensions:
 * exif
 * gd
 */

$resourcePath = realpath('../../../resources');
$img = $resourcePath . '/yansuo_p1.jpg';
$thumb = 'yansuo_p1_thumb.jpg';

$info = exif_read_data($img);

if (!$info) {
	die('Failed to get exif information.');
}

if (!file_exists($thumb)) {
	
	list($width, $height) = getimagesize($img);
	$thumb_width = 500;
	$thumb_height = $height * ($thumb_width/$width);
	
	$gdimg = imagecreatefromjpeg($img);
	$thumb_img = imagecreatetruecolor($thumb_width, $thumb_height);

	if (!imagecopyresampled($thumb_img, $gdimg, 0, 0, 0, 0, $thumb_width, 
		$thumb_height, $width, $height)) {
		die('Failed to generate thumbnail');
	}

	if (!imagejpeg($thumb_img, $thumb)) {
		die('Failed to save thumbnail');
	}
}

$thumb = 'http://test.lab/exif/' . $thumb;

?>
<!DOCTYPE html>
<html>
<head>
<title>EXIF Demo</title>
<meta charset="utf-8" />
<style type="text/css">
body {
	padding:0;
	margin:0;
	font-size:12px;
}

#wrapper {
	width:960px;
	margin:50px auto;
	min-height:400px;
}

#image {
	float:left;
	padding:5px;
	border:1px solid #CCC;
}

#imageMeta {
	margin:0 0 0 10px;
	float:left;
}

#imageMeta table, #imageMeta table th, #imageMeta table td  {
	border-collapse:collapse;
}

#imageMeta table th, #imageMeta table td  {
	padding:3px;
}

#imageMeta table th {
	text-align:right;
	font-weight:bold;
}

</style>
</head>
<body>
<div id="wrapper">
	<div id="image">
		<img alt="" src="<?php echo $thumb;?>" />
	</div>

	<div id="imageMeta">
		<table>
			<tr>
				<th>文件大小:</th>
				<td><?php echo ($info['FileSize']/1024/1024), 'M';?></td>
			</tr>
			<tr>
				<th>Mime类型:</th>
				<td><?php echo $info['MimeType'];?></td>
			</tr>
			<tr>
				<th>相机型号:</th>
				<td><?php echo $info['Model'];?></td>
			</tr>
			<tr>
				<th>焦距:</th>
				<td><?php echo $info['COMPUTED']['CCDWidth'];?></td>
			</tr>
			<tr>
				<th>光圈:</th>
				<td><?php echo $info['COMPUTED']['ApertureFNumber'];?></td>
			</tr>
			<tr>
				<th>快门速度:</th>
				<td><?php echo $info['ExposureTime'];?></td>
			</tr>
			<tr>
				<th>ISO感光度:</th>
				<td><?php echo $info['ISOSpeedRatings'];?></td>
			</tr>
			<tr>
				<th>拍摄时间:</th>
				<td><?php echo $info['DateTimeOriginal'];?></td>
			</tr>
		</table>
	</div>
</div><!-- #wrapper -->
</body>
</html>
