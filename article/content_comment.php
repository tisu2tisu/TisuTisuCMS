<?php
	require('asset/mysql_con.php');
	// membuat variable 
	$id = $_POST['id'];
	$comment = $_POST['comment'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$artikel = $_POST['artikel'];
	$tanggal = $_POST['tanggal'];

	$query = mysql_query("insert into db_comment values('', '$comment', '$id', '$nama', '$email','$tanggal')");

	if($query){
		header("location:index.php?id=$id&article=$artikel");
	} else {
		die('Error.' .  mysql_error());
	}
?>