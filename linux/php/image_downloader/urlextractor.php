<?php

abstract class UrlExtractor {

	protected $pattern = NULL;
	protected $flags = PREG_PATTERN_ORDER;
	protected $urls = NULL;
	protected $url = NULL;

	public function __construct($url) {
		$this->url = trim($url);
		if (strlen($this->url) < 1 || 
			!preg_match('/(http|https):\/\/\w+/i', $this->url)) {
			new Exception('Invalide URL for URLExtractor: ' . $this->url);
		}

		$this->parse();
	}

	public function getUrls() {
		return $this->urls;
	}

	protected abstract function parse();

	protected function _parse() {
		$html = file_get_contents($this->url);

		if ($html) {
			preg_match_all($this->pattern, $html, $matches, $this->flags);	
			if (is_array($matches) && count($matches) > 0) {
				return $matches;
			} else {
				error_log('No matched url for pattern:' . $this->pattern);
			}
		} else {
			error_log('Failed to parse the url: ' . $this->url);
		}

		return false;
	}
}

class VOCUrlExtractor extends UrlExtractor {
	
	private $prefix = 'http://bbs.voc.com.cn';
	private $bypass = 0;

	/**
	 * @param string $url, url to parse
	 * @param integer $bypass, how many url to bypass
	 */
	public function __construct($url=false, $bypass=0) {
		if ($url === false) {
			$url = 'http://bbs.voc.com.cn/forum-50-1.html';
		}
		$this->bypass = $bypass;
		$this->pattern = '/img[^>]*>\s*<a\s+[^>]*href="([^>"]*\-([^>"\-]+)\-1\-1\.html)"[^>]*>/i';
		$this->flags = PREG_SET_ORDER;
		parent::__construct($url);
	}

	public function parse() {

		$matches = $this->_parse();

		if ($matches && isset($matches[1]) && count($matches[1]) > 0) {

			$this->urls = array();
			$i = 0;

			foreach ($matches as $m) {
				
				$i++;

				if ($i <= $this->bypass) {
					continue;
				}

				if (isset($m[1])) {
					$url = $m[1];
					$key = $m[2];

					if (stripos($url, 'http://') !== 0) {
						if (strpos($url, '/') !== 0) {
							$url = '/' . $url;
						}	
						$url = $this->prefix . $url;
					}

					$this->urls[$key] = $url;
				}
			}

			$this->urls = array_unique($this->urls);
		}
	}
}

//TODO http://bbs.voc.com.cn/archiver/fid-50.html

/*
$ext = new VOCUrlExtractor();

$urls = $ext->getUrls();

var_dump($urls);
 */

