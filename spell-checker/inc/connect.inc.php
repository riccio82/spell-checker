<?php
$mysql_hostname  = "10.30.1.241";		 // Database Server machine
$mysql_database  = "translated";     // Database Name
$mysql_username  = "translated";		 // Database User
$mysql_password  = "azerty1";		 // Database Password

$mysql_link = mysql_connect($mysql_hostname, $mysql_username, $mysql_password);
mysql_select_db($mysql_database, $mysql_link);
?>
