<?php
	session_start();
	require_once('asset/login_cek.php');
	require('asset/mysql_con.php');
	$id = $_GET['id'];
	$query = mysql_query("select * from db_content where id='$id'");

	if($q = mysql_fetch_array($query)){
		$judul = $q['judul'];
		$user = $q['user'];
		$isi = $q['isi'];
		$tanggal = $q['tanggal'];
	} else {
		die('Error : ' . mysql_query());
	}
?>
<html>
	<head>
		<title>Edit Content </title>
	</head>
	<body>
		<h1 style="text-align: center; color: red">Admin Edit v1 </h1>
		<table cellspacing="10">
			<form action="edit_aunt.php" method="post"/>
				<tr>
					<td>Judul : </td>
					<td><input style="width: 500px" type="text" name="judul" value="<?php echo $judul; ?>"/></td>
				</tr>
				<tr>
					<td>Nama Penulis </td>
					<td><input style="width: 500px" type="text" name="user" value="<?php echo $user; ?>"/></td>
				</tr>
				<tr>
					<td colspan="2"><textarea name="isi"  style="width:850px; height: 500px"><?php echo $isi; ?></textarea></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Edit" /></td>
				</tr>
			</form>
		</table>
	</body>
</html>