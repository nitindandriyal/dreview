<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'dreview_user');
define('DB_PASSWORD', 'dreview_user');
define('DB_DATABASE', 'dreview');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>
