<?php
/**
* DataBase Updater
*
* $sql['key1'][] = "CREATE TABLE IF NOT EXISTS `db_version` ( `key` VARCHAR(20) NOT NULL default '0', `dt` DATETIME )";
*/

class UpdateDB{

	var $version = "0";
	var $old_version = "0";
	var $output = array();
	var $line = '';
	
	function UpdateDB($sqls){
		$this->db = Db::getConnection();
		$this->checkAndCreateTB();
    
		foreach ($sqls as $k => $v) {
			$this->line .= "Check patch $k\t";
			
		  if (!$this->cheackdb($k)) {
		    $this->line .= "proceed...\t";
				$this->make_upgradedb_verison($v);
				$this->insert_key($k);
				$this->addline("done");
			} else {
				$this->addline("skip...");
			}
		}
		$this->writeoutput();
  }
	
	function insert_key($k) {
		$sql = "INSERT INTO `db_version` (`key`,`dt`) VALUES('$k', NOW())";
		$result = $this->db->prepare($sql);
		$result->execute();
	}
	
	function addline($a){
		$this->output[] = $this->line.$a;
		$this->line = '';
	}
    
  function writeoutput(){
		$tdd = 30;
		$out = array();
		foreach (array_reverse($this->output) as $l){
		  if (!preg_match('/skip/', $l)){
				$out[] = $l;
				continue;
		  }
		  $tdd--;
		  if ($tdd>0)
			$out[] = $l;
		}
		echo implode("\n", array_reverse($out));
  }
 
	function cheackdb($k){
		$sql = "SELECT * FROM `db_version` WHERE `key` = '$k'";
		$result = $this->db->query($sql);

		if ($result->rowCount() > 0) {
			return 1;
		}
		return 0;
  }

	function make_upgradedb_verison ($sql) {
		$result = $this->db->prepare($sql);
		$result->execute();
	}
  
	function checkAndCreateTB(){
		$foldersList = array();
		$result = $this->db->query("SHOW TABLES LIKE 'db_version'");

		if ($result->rowCount() == 0) {
			$result = $this->db->prepare(
							"CREATE TABLE IF NOT EXISTS db_version(
								`key` VARCHAR(20) NOT NULL DEFAULT '',
								`dt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
								PRIMARY KEY(`key`) 
							)");
			$result->execute();
		}
	}

	/**
	 * test  file access 
	 */
	static function testAccess() {
		global $_SERVER;

		$allowedIPs[] = '127.0.0.1/24';
		$ip = $_SERVER['REMOTE_ADDR'];
			
		if(count($allowedIPs) && $ip){
			foreach($allowedIPs as $k=>$v) {
				$_ = explode('/', $v);
				if(self::ipMatch($ip, $_[0], $_[1])){
					return true;
				}
			}

			header('Location: http://'.$_SERVER['HTTP_HOST']);
			exit();
		}
	}
	
	/**
	 * Check IP match 
	 */
	function ipMatch($ip1, $ip2, $mask){
		if ((ip2long($ip1) & ~(pow(2, 32-$mask)-1)) == (ip2long($ip2) & ~(pow(2, 32-$mask)-1))) return true;
		else return false;
	}
}