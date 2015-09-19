<?php
	require('asset/mysql_con.php');

	// dapatkan user ip address
	$userip = $_SERVER['REMOTE_ADDR'];
	$page = $_GET['id'];
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('d/m/y G:H:i');

	$checkip = 	mysqli_query($link, "SELECT userip FROM pageview where page='$page' AND userip='$userip'");
	if(mysqli_num_rows($checkip) >= 1){
	$update_pw = mysqli_query($link, "UPDATE pageview SET last_tanggal='$tanggal', count=count+1 WHERE userip='$userip'");
	} else {
		$insertview = mysqli_query($link, "INSERT INTO pageview VALUES('','$page','$userip','$tanggal','$tanggal','1')");
	}
?>