<?php
	
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

define('ROOT', dirname(__FILE__).'/..');
require_once (ROOT. '/components/Autoload.php');
include_once (ROOT.'/inc/common_functions.php');

$router = new Router();
$router->run();