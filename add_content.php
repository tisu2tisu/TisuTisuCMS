<?php
	require('asset/mysql_con.php');
	// set variable

	$judul = $_POST['judul'];
	$user = $_POST['user'];
	$tanggal = date("l d-M-Y");
	$isi = $_POST['isi'];

	$query = mysql_query("insert into db_content values('','$judul','$isi','$tanggal','$user')");
	if($query){
		header('location:admin.php?value=success');
	} else {
		die('gagal menambah data. <a href="admin.php?value=">Go back</a>' . mysql_error());
	}
?>