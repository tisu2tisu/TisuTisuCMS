<?php
session_start();
require('asset/mysql_con.php');
// basic security
$user = $_SESSION['username'];
$query = mysql_query("select * from db_id where user='$user'");
if($q = mysql_fetch_array($query)){
	if($q['privilege'] == 'User'){
		die('<a style="text-decoration: none; color: #2A5DB0" href="admin.php?value="><h2>Upssss. anda bukan admin ;)</h2></a>');
	}
}
