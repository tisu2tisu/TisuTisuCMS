<?php
	require('asset/mysql_con.php');
	require('privilege.php');
	$id = $_GET['userid'];

	if($query = mysqli_query($link, "DELETE FROM db_id WHERE id='$id'")){
		header('location:admin.php?value=');
	} else {
		die('Error:' . mysqli_error());
	}
?>