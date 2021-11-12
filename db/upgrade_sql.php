<?php
$sqls = Array();

$sqls['1.0.0'] = "ALTER TABLE `accounts` 
										CHANGE COLUMN `ac_password` `ac_password` VARCHAR(51) 
										CHARACTER SET 'utf8mb4' NULL DEFAULT NULL";
$sqls['1.0.1'] = "UPDATE accounts SET ac_password = MD5(ac_password)";
