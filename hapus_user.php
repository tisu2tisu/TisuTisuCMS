<?php
	require('asset/mysql_con.php');
	require('privilege.php');
	$id = $_GET['userid'];

	if($query = mysql_query("DELETE FROM db_id WHERE id='$id'")){
		header('location:admin.php?value=');
	} else {
		die('Error:' . mysql_error());
	}
?>