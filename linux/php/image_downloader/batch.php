<?php
require_once 'urlextractor.php';
require_once 'downloader.php';

$ext = new VOCUrlExtractor(false, 10);
$urls = $ext->getUrls();
if (is_array($urls)) {
	foreach ($urls as $key=>$url) {	
		error_log('Downloading: [' . $key . ']' . $url);
		Downloader::start(array('', 'VOC', $url, $key));
	}
}
