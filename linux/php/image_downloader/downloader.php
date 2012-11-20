<?php

final class Downloader {

	private static $path = 'downloads';

	private static function save($data, $filename, $subdir=false) {
		$to = self::$path; 

		if ($subdir) {
			$to .= DIRECTORY_SEPARATOR . $subdir;
			if (!is_dir($to)) {
				error_log('mkdir: ' . $to . "\n");
				if (!mkdir($to, 0777, true)) {
					error_log("Failed to mkdir: $to\n");
					return false;
				}
			}
		}

		$to .= DIRECTORY_SEPARATOR . $filename;

		error_log("Saving to: $to\n");
		if (file_put_contents($to, $data)) {
			return true;
		}
		return false;	
	}

	private static function download($urls, $subdir=false) {
		
		$count = 0;

		foreach ($urls as $url) {
			++$count;
			error_log('[' . str_pad($count, 2, '0', STR_PAD_LEFT) . "]Downloading: $url");
			$data = file_get_contents($url);
			if ($data) {
				$file = substr($url, strrpos($url, '/')+1);
				if (!self::save($data, $file, $subdir)) {
					error_log("Failed to save: $file\n");
				}
			} else {
				error_log("Failed to download: $url\n");
			}
		}	
	}

	private static function init() {
		$config = __DIR__ . DIRECTORY_SEPARATOR . 'config.ini';
		if (file_exists($config)) {
			$conf = parse_ini_file($config);
			if ($conf && isset($conf['base_path'])) {
				self::$path = $conf['base_path'];
			} else {
				error_log('Failed to parse configuration file OR has no value of base_path.');	
			}
		} else {
			error_log('Configuration file does not exists:$config');
		}
	}

	public static function start($argv) {
		self::init();

		$parser = isset($argv[1]) ? $argv[1] : false;
		$url = isset($argv[2]) ? $argv[2] : false;
		$subdirectory = isset($argv[3]) ? $argv[3] : date('Ymds');

		if ($url) {
			$html = file_get_contents($url);
			if ($html) {
				$parser = $parser . 'Parser';
				$parser = new $parser();
				$parser->setHTML($html);
				if (!$parser->doParse()) {
					error_log("Failed to parse the html.\n");
				} else {
					$result = $parser->getResult();
					if (is_array($result)) {
						self::download($result, $subdirectory);
						error_log($url . '[Done]');
						return true;
					}
				}
			} else {
				error_log("Failed to fetch content.\n");
			}	
		} else {
			error_log("Invalid URL:$url\n");
		}
		return false;
	}
}

interface ParserInterface {
	public function setHTML($html);
	public function doParse();
	public function getResult();
}

abstract class HTMLParser implements ParserInterface {
	protected $html = NULL;
	protected $result = NULL;
	protected $title = NULL;

	public function setHTML($html) {
		$this->html = $html;
	}

	public function getResult() {
		return $this->result;
	}

	public function getTitle() {
		return $this->title;
	}

	protected static function matches($html, $pattern) {

		if ($html !== NULL 
			&& preg_match_all($pattern, $html, $matches)) {
			if (is_array($matches) && count($matches) > 0) {
				return $matches;
			}
		}	
		return false;
	}
}

class VOCParser extends HTMLParser {
	
	private $pattern = '/<a\s+[^>]*href="([^">]+\.jpg)"[^>]*>/i';

	public function doParse() {
		$matches = self::matches($this->html, $this->pattern);
		if ($matches && isset($matches[1])) {
			$this->result = $matches[1];
			return true;
		}
		return false;
	}
}

//Downloader::start($argv);

