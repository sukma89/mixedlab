<?php
include_once './includes/bootstrap.inc';
//require("modules/node/node.pages.inc");
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
module_load_include('inc', 'node', 'node.pages');

if (!isset($user)) {
	$user = new stdClass();
	$user->uid = 1;
}

$n = $_GET['n'];

if (isset($n) && $n > 0) {
	$node = new stdClass();
	$node->uid = $user->uid;
	$node->type = 'image';
	$node->title = 'P test images ' . str_pad($n, 3, '0', STR_PAD_LEFT);
	node_save($node);
	$node->title = 'P test images[NID=' . $node->nid . ']';
	$node->body = 'BODY: ' . $node->title;
	$node->status = 1;
	$node->language = $language->language;

	$node->comment = 2; //0 - disabled, 1 - readonly, 2 - read/write

	//CCK fields
	$node->field_image_file = array(
			array(
					'fid'=> 8,
					'uid' => $user->uid,
					'filename' => '201111162147059111-1988454.jpg',
					'filepath' => 'sites/default/files/201111162147059111-1988454.jpg',
					'filemime' => 'image/jpeg',
					'filesize' => '352399',
					'status' => '1',
					//'timestamp' => '1323837307',
	
					
			),
	);
	//var_dump($language);

	$node->field_image_description = array(
		array('value' => 'ImD: ' . $node->title)
	);
	
	$node->field_discussion = array(
		array('nid' => 231)	
	);
	
	$node->field_publish_date = array(
		array(
			'value' => date('Y-m-d') . 'T' . date('H:i:s'),
			'timezone' => 'Asia/Shanghai',
			'timezone_db' => 'UTC',
			'date_type' => 'date',
		),		
	);
	
	//var_dump($node);
	node_save($node);
	echo 'Saved<br />' . '<a target="_blank" href="' . url('node/' . $node->nid) . '">Visit</a>';
}

module_load_include('inc', 'content', 'includes/content.crud');
content_fields();
content_field_instance_create();

$node = node_load(65);

/*
 if ($node->type == 'image' && $op == 'insert') {
echo '<pre>';
print_r($node);die;
}*/

//var_dump($node);
//echo '<pre>';
//print_r($node);

/*
[field_image_file] => Array
(
		[0] => Array
		(
				[fid] => 8
				[uid] => 1
				[filename] => 201111162147059111-1988454.jpg
				[filepath] => sites/default/files/201111162147059111-1988454.jpg
				[filemime] => image/jpeg
				[filesize] => 352399
				[status] => 1
				[timestamp] => 1323837307
				[data] => Array
				(
						[fid] => 8
						[width] => 1200
						[height] => 1788
						[duration] => 0
						[audio_format] =>
						[audio_sample_rate] => 0
						[audio_channel_mode] =>
						[audio_bitrate] => 0
						[audio_bitrate_mode] =>
						[tags] => Array
						(
						)

						[alt] =>
						[title] =>
				)

				[list] => 1
		)

)

[field_publish_date] => Array
(
		[0] => Array
		(
				[value] =>
				[timezone] => Asia/Shanghai
				[timezone_db] => UTC
				[date_type] => date
		)

)
*/