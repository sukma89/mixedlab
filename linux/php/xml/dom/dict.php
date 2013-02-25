<?php

header('Content-Type: application/json; charset=utf-8');
define('REQUEST_TIME', time());

//ini_set('error_reporting', E_ALL | E_STRICT);
//ini_set('display_errors', 'On');
//ini_set('display_errors', 'Off');

class RemoteQueryWord 
{
    public static $baseURL = 'http://www.collinsdictionary.com/dictionary/english/';

    private $word;
    private $queryWord;

    public function __construct(Word $word)
    {
        $this->word = $word;
        $this->queryWord = strtolower(preg_replace('/(\'|\s+)/', '-', $word->getParsedWord()));
        $this->word->setRemoteURL(self::$baseURL . $this->queryWord);
    }

    public function query()
    {
        $cacheFile = 'caches/' . $this->queryWord . '.data';

        if (file_exists($cacheFile)) {
            $result = file_get_contents($cacheFile);
            DictLog::info($this->queryWord . ': using cache page');
        } else {
            DictLog::info($this->queryWord . ': fetching remote page');
            $url = self::$baseURL . $this->queryWord;

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 65);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate,sdch');
            curl_setopt($curl, CURLOPT_REFERER, 'http://www.collinsdictionary.com/');
            curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11');
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Accept-Language: en-US,en;q=0.8,zh-CN;q=0.6',
                'Accept-Charset: GBK,utf-8;q=0.7,*;q=0.3'
            ));

            $result = curl_exec($curl);

            $curl_errno = curl_errno($curl);

            if ($curl_errno > 0) {
                $msg = 'Failed to fetch collins data with CURL error: ' . curl_error($curl);
                DictLog::error($msg . ', #' . $curl_errno);
                return false;
            }

            $result = trim($result);

            if (strlen($result) < 100) {
                DictLog::error($this->queryWord . ': no remote query result(blank response)');
                return false;
            }

            if (!is_dir('caches')) {
                mkdir('caches', 0777);
            }
            if (is_dir('caches')) {
                file_put_contents($cacheFile, $result);
            }
        }

        return $this->parseResponse($result);
    }

    private function parseResponse($resp)
    {
        libxml_use_internal_errors(true);
        DictLog::info($this->queryWord . ': ' . __METHOD__ . 
            ', response length(' . strlen($resp) . ')');
        $resp = str_replace(
            '<meta charset="utf-8">', 
            '<meta http-equiv="content-type" content="text/html;charset=utf-8" />', 
            $resp
        );
        $dom = new DOMDocument();
        $dom->loadHTML($resp);

        $xpath = new DOMXPath($dom);

        $commonness = $xpath->query('//div[@class="commonness"]/img/@data-band');
        if ($commonness->length > 0) {
            $commonness = (int) $commonness->item(0)->nodeValue;
        } else {
            $commonness = 0;
        }
        $this->word->setCommonness($commonness);

        $definitions = array();
        $i = 1;
        while (true) {
            $def = array();
            $defNode = $xpath->query('//div[@id="' . $this->queryWord . '_' . $i . '"]');
            if ($defNode && $defNode->length > 0) {
                $defNode = $defNode->item(0);
                $h2 = $xpath->query('div/h2', $defNode);
                if ($h2->length > 0) {
                    $h2 = $h2->item(0);
                    $childs = $h2->childNodes;
                    $word = $childs->item(0)->nodeValue;
                    $def['word'] = $word;

                    $prons = $this->innerHTML($h2);

                    $reg = '#^[^\(]*\(([^\)]+)\).*$#s';
                    if (preg_match($reg, $prons)) {
                        $prons = preg_replace(
                            "#<img[^>]*'(/sounds/[^>']+\.mp3)'[^>]*>#is", 
                            '[[\1]]', $prons); 
                        $prons = preg_replace('#\s+#', ' ', strip_tags($prons));
                        $prons = preg_replace($reg, '\1', $prons);
                        $_prons = explode(';', $prons);

                        $prons = array();
                        
                        foreach ($_prons as $pron) {
                            $pron = trim($pron);
                            $_pron = array();
                            if (preg_match('#\[\[([^\]]+)\]\]#', $pron, $mp3)) {
                                $_pron['mp3'] = $mp3[1];
                                $_pron['syllable'] = substr($pron, 0, strpos($pron, '[['));
                            } else {
                                $_pron['mp3'] = false;
                                $_pron['syllable'] = $pron;
                            } 
                            $prons[] = $_pron;
                        }
                    } else {
                        $prons = array();
                    }

                    $def['prons'] = $prons;
                }

                $defItemNodes = $xpath->query('div/div[@class="definitions hom-subsec"]/div[@class="hom"]', $defNode);
                $defItems = array();

                if ($defItemNodes->length > 0) {
                    foreach ($defItemNodes as $node) {
                       $grammerType = $xpath->query('h4/span', $node); 
                       if ($grammerType && $grammerType->length > 0) {
                           $grammerType = $grammerType->item(0)->nodeValue;
                           $defItems['type'] = $grammerType;
                           $lis = $xpath->query('ol/li', $node);
                           foreach ($lis as $li) {
                               $defItems['items'][] = $this->innerHTML($li);
                           }
                       }
                    }
                } else {
                    $defItemNodes = $xpath->query('div/div[@class="definitions hom-subsec"]/ol/li', $defNode);

                    if ($defItemNodes && $defItemNodes->length > 0) {
                        $defItems['type'] = 'null';
                        foreach ($defItemNodes as $node) {
                            $defItems['items'][] = $this->innerHTML($node);
                        }
                    }
                }
                $def['definitions'] = $defItems;

                $definitions[] = $def;
            } else {
                break;
            }
            $i++;
        }

        $this->word->setDefinitions($definitions);

        libxml_clear_errors();
    }

    private function innerHTML($node)
    {
        $meta = '<meta http-equiv="content-type" content="text/html;charset=utf-8"/>';
        $dom = new DOMDocument();
        $dom->loadHTML($meta);
        $dom->appendChild($dom->importNode($node, true));
        $html = preg_replace(
            '#^.*<' . $node->nodeName . '[^>]*>(.*)</' . $node->nodeName . '>.*$#s', 
            '\1', $dom->saveHTML());
        return $html;
    }
}

class Word {

    private $word;
    private $parsedWord;
    private $definitions;

    private $remoteURL;
    private $commonness;
    
    public function __construct($word) 
    {
        $this->word = $word;
        $this->parsedWord = self::parseWord($this->word);

        if (false === $this->parsedWord) {
            throw new Exception('`' . $this->word  . '` is not a valid word', '1');
        }

        $this->definitions = array();
        $this->query();
    }

    public function setRemoteURL($url)
    {
        $this->remoteURL = $url;
    }

    public function setDefinitions($definitions)
    {
        $this->definitions = $definitions;
    }

    public function setCommonness($commonness)
    {
        $this->commonness = $commonness;
    }

    public function getRemoteURL()
    {
        return $this->remoteURL;
    }

    public function getParsedWord()
    {
        return $this->parsedWord;
    }

    public function getDefinitions()
    {
        return $this->definitions;
    }

    public function getCommonness()
    {
        return $this->commonness;
    }

    private function query()
    {
        $remoteQuery = new RemoteQueryWord($this);
        if ($remoteQuery->query()) {
            $this->store();
        }
    }

    public static function parseWord($word)
    {
        if (preg_match('/[a-z]+[a-z\s\']*/i', $word, $matches)) {
            return preg_replace('/\s+/', ' ', trim($matches[0]));
        }
        return false;
    }
}

class QueryWordService
{
    public static function init()
    {
        if ('cli' == php_sapi_name()) {
            global $argc, $argv;
            $word = $argc > 1 ? trim($argv[1]) : '';
        } else {
            $word = isset($_GET['w']) ? trim($_GET['w']) : '';
        }

        if (strlen($word)) {
            try {
                $wordObj = new Word($word);
                self::renderWord($wordObj);
            } catch (Exception $ex) {
                self::renderException($ex->getMessage());
            }
        } else {
            self::renderError('Word missing');
        }
    }

    public static function renderException(Exception $ex)
    {
        self::renderError($ex->getMessage(), $ex->getCode());
    }

    public static function renderError($message, $code = '-1')
    {
        echo json_encode(array('code' => $code, 'message' => $message)) . "\n";
    }

    public static function renderWord($word)
    {
        echo json_encode(array(
            'word' => $word->getParsedWord(),
            'commonness' => $word->getCommonness(),
            'remote_url' => $word->getRemoteURL(),
            'definitions' => $word->getDefinitions()
        )) . "\n";
    }
}

class DictLog 
{
    const TYPE_DEBUG = 10;
    const TYPE_INFO = 20;
    const TYPE_WARN = 30;
    const TYPE_ERROR = 40;

    public static function log($message, $type)
    {
        $prefix = date('Y-m-d H:i:s', REQUEST_TIME) . ' - ';
        switch ($type) {
        case self::TYPE_ERROR:
            $prefix .= '[ERROR]';
            break;
        case self::TYPE_WARN:
            $prefix .= '[WARN]';
            break;
        case self::TYPE_INFO:
            $prefix .= '[INFO]';
            break;
        case self::TYPE_DEBUG:
            $prefix .= '[DEBUG]';
            break;
        }

        $path = 'logs';
        if (!is_dir($path)) {
            @mkdir($path, 0777);
        }
        if (is_dir($path)) {
            $fp = fopen($path . '/' . date('Ymd', REQUEST_TIME) . '.log', 'a');
            if ($fp) {
                fwrite($fp, $prefix . ' - ' . $message . "\n");
            }
            fclose($fp);
        }
    }

    public static function error($message)
    {
        self::log($message, self::TYPE_ERROR);
    }

    public static function warn($message)
    {
        self::log($message, self::TYPE_WARN);
    }

    public static function info($message)
    {
        self::log($message, self::TYPE_INFO);
    }

    public static function debug($message)
    {
        self::log($message, self::TYPE_DEBUG);
    }
}

QueryWordService::init();

