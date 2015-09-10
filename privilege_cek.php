<?php
	require('asset/mysql_con.php');

	$user = $_SESSION['username'];
	$userid = $_GET['userid'];
	$query = mysql_query("select * from db_id where user='$user'");
	$q = mysql_fetch_array($query);
	$word = $_GET['action'];

	if($q['privilege'] == $user){
		if($_GET['action'] == 'edit'){
			header("location:edit_user.php?userid=$userid");
		} else if($_GET['action'] == 'hapus'){
			header("location:hapus_user.php?userid=$userid");
		} else if($_GET['action'] == 'tambah'){
			header('location:tambah_user.php');
		}
	} else {
		echo "<h1><a href='admin.php?value='>Anda tidak punya akses untuk men$word user.</a></h1>";
	}
?>