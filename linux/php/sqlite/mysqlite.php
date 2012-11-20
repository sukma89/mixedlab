<?php

class MySQLiteDatabase extends SQLiteDatabase {

	/**
	 * Create table if not exists or do nothing.
	 * @param string $tablename
	 * @param string $definition
	 * @return boolean, true is succeed or exists, false otherwise.
	 */
	public function createTable($tablename, $definition) {
		//TODO validate the tablename
		if ($this->isTableExists($tablename)) {
			return true;
		}
		$sql = "CREATE TABLE IF NOT EXISTS $tablename $definition";
		if ($this->query($sql, SQLITE_BOTH, $error)) {
			return true;
		}
		//$this->log($error);
		return false;
	}

	public function isTableExists($tablename) {
		$tables = $this->getTables();
		return in_array($tablename, $tables);
	}

	/**
	 * @see http://www.php.net/manual/en/function.sqlite-query.php#107192
	 */
	public function getTables()  {
		$tables=array();
		$q = $this->query("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name");
		$result = $q->fetchAll();
		foreach($result as $tot_table) {
			$tables[] = $tot_table['name'];
		}
		return $tables;
	}
}
