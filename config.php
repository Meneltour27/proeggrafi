<?php

$HOST = "localhost";
$USER = "root";
$PASS = "";
 $DB = "proeggrafi";
 /*
$HOST = "sql206.php0h.com";
$USER = "p0_16696047";
$PASS = "D3m3tr!0s";
  * $DB = "p0_16696047_0";
*/


mysql_connect($HOST,$USER,$PASS);
mysql_select_db($DB);
mysql_query("set names 'utf8'");


?>