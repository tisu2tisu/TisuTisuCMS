<?php
	require('asset/mysql_con.php');
	// set variable

	$judul = $_POST['judul'];
	$user = $_POST['user'];
	$tanggal = date("l d-M-Y");
	$isi = $_POST['isi'];
	$category = $_POST['category'];

	$query = mysqli_query($link, "insert into db_content values('','$judul','$isi','$tanggal','$user','$category')");
	if($query){
		header('location:admin.php?value=success');
	} else {
		die('gagal menambah data. <a href="admin.php?value=">Go back</a>' . mysqli_error($query));
	}
?>