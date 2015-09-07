<?php
	session_start();
	$mysql_con = new mysqli("localhost", "root", "0210sura", "test");
	require_once('asset/login_cek.php');
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$user = $_POST['user'];
	$id = $_POST['id'];
	$q = "UPDATE db_content SET judul='$judul', isi='$isi', user='$user' WHERE id='$id'";
	// menggunakan mysql object oriented
	$query = $mysql_con->query($q) or die(mysql_error());
	if($query){
		header('location:admin.php?value=edit');
	}
?>