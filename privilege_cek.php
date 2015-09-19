<?php
	require('asset/mysql_con.php');

	$user = $_SESSION['username'];
	$userid = $_GET['userid'];
	$query = mysqli_query($link, "select * from db_id where user='$user'");
	$q = mysqli_fetch_array($query, MYSQLI_ASSOC);
	$word = $_GET['action'];

	if($q['privilege'] == $user){
		if($_GET['action'] == 'edit'){
			header("location:edit_user.php?userid=$userid");
		} else if($_GET['action'] == 'hapus'){
			header("location:hapus_user.php?userid=$userid");
		} else if($_GET['action'] == 'tambah'){
			header('location:tambah_user.php?action=');
		}
	} else {
		echo "<h1><a href='admin.php?value='>Anda tidak punya akses untuk men$word user.</a></h1>";
	}
?>