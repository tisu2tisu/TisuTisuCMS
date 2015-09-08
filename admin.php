<?php
	session_start();
	require('asset/mysql_con.php');
	require('asset/login_cek.php');
	$date = date("l d-M-Y");

	$query = mysql_query("select * from db_content");
?>
<html>
	<head>
		<title> Admin Management </title>
	</head>

	<body>
		<h2> Admin Panel v1 user: <?php echo $_SESSION['username']; ?> 
		<div style="clear: left; float: right;"><a href="logout.php" style="text-decoration: none">Logout</a></div></h2>
		<p><?php echo $date; ?></p>
		<table cellspacing="3" cellpadding="2" border="1">
			<form action="add_content.php" method="post">
				<thead>
					<th colspan="2"> Add Content </h3></th>
				</thead>
					<tr>
						<td> Judul </td>
						<td><input style="width: 500px" type="text" name="judul" /></td>
					</tr>
					<tr>
						<td> Nama Penulis </td>
						<td><input style="width: 500px" type="text" name="user" /></td>
					</tr>
					<tr>
					
					</tr>
					<tr>
						<td colspan="2"><textarea cols="5" rows="8" style="width:850px; height:380px" name="isi" >
						</textarea>
						</td>
					</tr>

					<tr>
						<td colspan="2"><input type="submit" value="Selesai" /></td>
					</tr>
			</form>
		</table>
		<?php
			if($_GET['value'] == 'success'){
				echo "<p><strong>Data berhasil ditambahkan! </strong></p>";
			} else if($_GET['value'] == 'hapus'){
				echo "<p><strong>Data berhasil dihapus! </strong></p>";
			} else if ($_GET['value'] == 'edit'){
				echo "<p><strong>Data berhasil diedit!</strong></p>";
			}
		?>
		<br />
		<table cellspacing="5" cellpadding="3" width="850px" border="1">
			<thead>
				<th colspan="5">List Content</th>
			</thead>
			<tr>
				<td>
			<?php
				while($q = mysql_fetch_array($query)){
					$judul = $q['judul'];
					$id = $q['id'];
					$isi = $q['isi'];
					$tanggal = $q['tanggal'];
					$user = $q['user'];
			?>
					<table>
			<tr>
				<td>Judul : <?php echo $judul; ?> </td>
				<td>&nbsp;</td>
				<td>Di posting oleh : <?php echo $user; ?> </td>
				<td>&nbsp;</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
			<tr>
				<td colspan="5"><hr></td>
			</tr>
			<tr>
				<td colspan="5" ><p><?php echo $isi; ?></p></td>
			</tr>
			<tr>
				<td><a href="edit_content.php?id=<?php echo $id;?>">Edit</a> || <a href="hapus_content.php?id=<?php echo $id;?>">Hapus</a></td>
			<br />
			<br />
			</tr>
				</table>
			<?php
				}
			?>
			</td>
		</tr>
		</table>
	</body>
</html>