<?php
require('mysql_con.php');
$query = mysql_query("select user from db_id order by user desc");
$q = mysql_fetch_array($query);

if(!isset($_SESSION['username'])) {
	die('anda harus login dahulu. <a href="index.php">Go back</a>');
} else if (!$_SESSION['username'] == $q['user']){
	die('anda harus login dahulu. <a href="index.php">Go back</a>');
}
?>