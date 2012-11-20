<?PHP
/**
 * Session handler functions
 * @package apc_error
 * @filesource
 */

function session_connection ($func_name='') {
    global $mysql;

    if (!is_object($mysql)) {

		if (class_exists('MySQL')) {
			$mysql = 
				new MySQL(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
		} else {
			die('Failed to connect to database for Session[' . 
				$func_name . ']');
		}
    }
    
    return $mysql;
}

function on_session_start ($save_path, $session_name) {

    if ( ($session_db = session_connection()) ) {
        
		$sql = "DELETE FROM " . SESSION_TABLE . 
				" WHERE `expire` < '" . time() . "'";
        
        $session_db->query($sql);
        
        return true;
        
    }

    return false;
}

function on_session_end () {
    return true;
}

function on_session_read ($key) {   

    if (($session_db = session_connection())) {
        
		$sql = "SELECT data FROM " . SESSION_TABLE . 
			" WHERE `key`= '" . $key . "' AND `expire` > " . time();

        $result = $session_db->query($sql);
        
        if ($result && ($row = $session_db->fetch_assoc($result))) {
            return $row['data'];
        }
    } 
    
    return false;
}

function on_session_write ($key, $val) {

    if (($session_db = session_connection(__FUNCTION__))) {
        
        $expire = time() + SESSION_MAX_LIFETIME;
        
		$sql = "REPLACE INTO " . SESSION_TABLE . 
			" VALUES ('" . $key . "', '" . $val . "', '$expire')";

        $session_db->query($sql);
        
        if ($session_db->affected_rows() > 0) {
            return true;
        }
    }
    
    return false;
}

function on_session_destroy ($key) {

    if (($session_db = session_connection())) {
        
		$sql = "DELETE FROM " . SESSION_TABLE . 
			" WHERE `key`='" . $key . "'";
        
        $session_db->query($sql);
        
        return true;
    
    }
    
    return false;
}

function on_session_gc ($max_lifetime) {

    if (($session_db = session_connection())) {
        
		$sql = "DELETE FROM " . SESSION_TABLE . 
			" WHERE `expire` < " . time();

        $session_db->query($sql);
        
        return true;
    }
    
    return false;
}

session_set_save_handler(
	"on_session_start", "on_session_end", 
	"on_session_read", "on_session_write", 
	"on_session_destroy", "on_session_gc"
);

//For test only, very dangerous session id
$_session_id = md5($_SERVER['REMOTE_ADDR']);
session_id($_session_id);
session_start();

