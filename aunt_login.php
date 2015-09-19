<?php
	require('asset/mysql_con.php');
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$query = mysqli_query($link, "select * from db_id order by id desc");
	while($q = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		if($username == $q['user'] && $password == $q['password']){
			session_start();
			$_SESSION['username'] = $username;
			header("location:admin.php?value='");
		}
	}
	if(!$username == $q['user'] && !$password == $q['password']) {
			die('Error. <a href="index.php">Go back</a> ' . mysqli_error());
		}
?>