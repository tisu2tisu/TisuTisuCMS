<?php
	session_start();
	$mysql_con = new mysqli("localhost", "root", "0210sura", "test");
	require_once('asset/login_cek.php');
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$user = $_POST['user'];
	$id = $_POST['id'];
	$category = $_POST['category'];
	$q = "UPDATE db_content SET judul='$judul', isi='$isi', user='$user', category='$category' WHERE id='$id'";
	// menggunakan mysql object oriented
	$query = $mysql_con->query($q) or die(mysql_error());
	if($query){
		header('location:admin.php?value=edit');
	}
?>