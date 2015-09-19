<?php
	require('asset/mysql_con.php');

	$user = strtolower($_POST['user']);
	$pass = $_POST['pass'];
	$email = strtolower($_POST['email']);
	$privilege = $_POST['privilege'];
	$tanggal = $_POST['tanggal'];
	$query = mysqli_query($link, "select * from db_id WHERE user='$user'");
	if(mysqli_num_rows($query) >= 1){
		header('location:tambah_user.php?action=gagal');
	} else {
		if($q = mysqli_query($link, "INSERT INTO db_id VALUES('','$user','$pass','$email','$privilege','$tanggal')")){
			header('location:admin.php?value=');
		} else {
			die('<a href="admin.php?value=">Gagal</a>' . mysqli_error());
		}
	}
?>