<?php
	require('asset/mysql_con.php');

	$user = strtolower($_POST['user']);
	$password = $_POST['pass'];
	$email = $_POST['email'];
	$privilege = $_POST['privilege'];
	$user_id = $_POST['id'];

	if($query = mysql_query("UPDATE db_id SET user='$user', password='$password', email='$email', privilege='$privilege' WHERE id='$user_id'")){
		header('location:admin.php?value=');
	} else {
		echo "<a style='text-decoration: none' href='admin.php?value='><h1>Gagal!<h1></a>" . mysql_error();
	}
?>