<?php
	require('asset/mysql_con.php');
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$query = mysql_query("select * from db_id order by id desc");
	while($q = mysql_fetch_array($query)){
		if($username == $q['user'] && $password == $q['password']){
			session_start();
			$_SESSION['username'] = $username;
			header('location:admin.php?value=');
		}
	}
	if(!$username == $q['user'] && !$password == $q['password']) {
			die('Error. <a href="index.php">Go back</a> ' . mysql_error());
		}
?>