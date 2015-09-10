<?php
require('mysql_con.php');
// basic security
$user = $_SESSION['username'];
$query = mysql_query("select * from db_id where user=$user");
if($q = mysql_fetch_array($query)){
	if($q['privilege'] == 'user'){
		die('<h1>Upssss. anda bukan admin, jadi jgn coba2 untuk masuk secara illegal ;)');
	}
}
