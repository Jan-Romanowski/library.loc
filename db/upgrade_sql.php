<?php
$sqls = Array();

$sqls['1.0.0'] = "ALTER TABLE `accounts` 
										CHANGE COLUMN `ac_password` `ac_password` VARCHAR(51) 
										CHARACTER SET 'utf8mb4' NULL DEFAULT NULL";
$sqls['1.0.1'] = "UPDATE accounts SET ac_password = MD5(ac_password)";

$sqls['1.0.2'] = "CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL,
  `header` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `text` varchar(300) COLLATE utf8_polish_ci NOT NULL,
  `date_news` datetime NOT NULL DEFAULT current_timestamp(),
  `autor` text COLLATE utf8_polish_ci NOT NULL,
      PRIMARY KEY (id_news)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci";