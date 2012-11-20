/**
 * convert an array to string recursively.
 * @param array $arr
 * @param string &$str, 
 * @param integer $level
 */
function array_to_string($arr, &$str, $level=1) {
		if (is_array($arr)) {
			
			$str .= "array(\n";
			$_ts = str_pad("", $level, "\t");
			
			foreach ($arr as $k=>$v) {
				
				$str .= $_ts . "'" . $k . "'=>";
				
				if (is_array($v)) {
					array_to_string($v, $str, $level+1);
				} else {
					$str .= "'" . $v . "',\n";	
				}
			}
			
			$str .= substr($_ts, 0, -1) . "),\n";
		}
}