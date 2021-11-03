#!/usr/bin/php -q
<?php 
@set_time_limit(0);

define('ROOT', dirname(__FILE__).'/..');

require_once (ROOT.'/components/Autoload.php');
require_once dirname(__FILE__).'/UpdateDb.php';

//UpdateDB::testAccess(); // only specific IP

require_once dirname(__FILE__).'/upgrade_sql.php';
echo "Database Upgrade Start: ".date("Y-m-d")."\n";
new UpdateDB($sqls);
echo "\nUpgrade End: ".date("Y-m-d")."\n";
