<?php
	require('privilege.php');
	require('asset/mysql_con.php');
	$id = $_GET['id'];

	if($q = mysql_query("DELETE FROM db_content  WHERE id='$id'")){
		header('location:admin.php?value=hapus');
	} else {
		die('error:' . mysql_error());
	}
?>
