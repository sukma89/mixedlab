<?php

libxml_use_internal_errors(true);
$html = '<!DOCTYPE html><html><head><title>标题Title</title><meta http-equiv="content-type" content="text/html;charset=utf-8" /></head><body><div id="box"><h1>标题Header</h1><p id="box">内容Content</div></body></html>';
//$html = '<html><head><title>标题1</title><meta charset="utf-8" /></head><body><div id="box"><h1>标题Header</h1><p>内容Content</p></div></body></html>';
$dom = new DOMDocument();
//$dom->loadHTML($html);
//echo $dom->saveXML();
//echo $dom->saveHTML();

//$word = 'just';
$word = 'as';
$dom->loadHTMLFile('dom-' . $word . '.html');

$i = 1;

while (true) {
    $node = $dom->getElementById($word . '_' . $i);
    if ($node) {
        //print_r($node);
        echo htmlspecialchars(innerHTML($node));
        echo "<hr />\n";
    } else {
        break;
    }
    $i++;
}

//$errors = libxml_get_errors();
//var_dump($errors);
libxml_clear_errors();

function innerHTML($el) {
    $doc = new DOMDocument();
    $doc->appendChild($doc->importNode($el, TRUE));
    $html = trim($doc->saveHTML());
    $tag = $el->nodeName;
    return $html;
    //return preg_replace('@^<' . $tag . '[^>]*>|</' . $tag . '>$@', '', $html);
}
