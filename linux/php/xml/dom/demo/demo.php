<?php
libxml_use_internal_errors(true);

$html = file_get_contents('data.html');
$html = str_replace(
    '<meta charset="utf-8" />', 
    '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">', 
    $html
);

$dom = new DOMDocument();
$dom->loadHTML($html);
$xpath = new DOMXPath($dom);

$nodes = $xpath->query('//*[@id="header"]/h1', NULL);
$name = $nodes->item(0)->nodeValue;
echo "Name: " . $name . "\n";

$nodes = $xpath->query('//div[@id="header"]');
$headerNode = $nodes->item(0);
$nodes = $xpath->query('h1', $headerNode);
$name = $nodes->item(0)->nodeValue;
echo "Name: " . $name . "\n";

$nodes = $xpath->query('//*[@id="profile-box"]/ul/li');

foreach ($nodes as $node) {
    $childNodes = $xpath->query('span', $node);
    $key = $childNodes->item(0)->nodeValue;
    $value = $childNodes->item(1)->nodeValue;
    echo $key . ' ' . $value . "\n";
}


libxml_clear_errors();

