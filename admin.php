<?php
	session_start();
	require('asset/mysql_con.php');
	require('asset/login_cek.php');
	$date = date("l d-M-Y");
	$q = mysql_query("select * from db_id where user='catur'");
	$query = mysql_query("select * from db_content");
?>
<html>
	<head>
		<title> Admin Management </title>
	</head>

	<body>
		<h2> Admin Panel v1
		<div style="clear: left; float: right;"><a href="logout.php" style="text-decoration: none">Logout</a></div></h2>
		<a href="index.php" target="_blank">View web </a>
		<p> <strong>Login as</strong> <?php echo $_SESSION['username']; ?></p>
		<p><?php echo $date; ?> </p>
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
						<td> Category </td>
						<td><select style="width: 200px" name="category">
							<option>Programming</option>
							<option>Physics</option>
							<option>Anime</option>
							</select>
						</td>
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

		<table cellspacing="5" cellpadding="3" width="850px" border="1" style="margin-top: 40px">
			<thead>
				<th>User Management</th>
			</thead>
			<tr>
				<td>
				<table cellspacing="7" align="center">
					<thead>
						<th>User ID </th>
						<th>User Name </th>
						<th>Password </th>
						<th>E-mail </th>
						<th>Jabatan</th>
						<th>Opsi </th>
						<th><a href="privilege_cek.php?action=tambah" style="color: #2A5DB0; text-decoration: none; font-size: 30px">+</a></th>
					</thead>
			<?php
					$query = mysql_query("select * from db_id order by id asc");
					while($q = mysql_fetch_array($query)){
						$id = $q['id'];
						$username = $q['user'];
						$password = $q['password'];
						$email = $q['email'];
						$privilege = $q['privilege'];
			?>
					<tr>
						<td style="text-align: center"><?php echo $id; ?></td>
						<td style="text-align: center"><?php echo $username; ?> </td>
						<td style="text-align: center"><?php echo md5($password); ?></td>
						<td style="text-align: center"><?php echo $email; ?> </td>
						<td style="text-align: center"><?php echo $privilege; ?> </td>
						<td style="text-align: center"><a href="privilege_cek.php?action=edit&userid=<?php echo $id; ?>">Edit</a> || <a href="privilege_cek.php?action=hapus&userid=<?php echo $id; ?>">Hapus</a></td>
					</tr>
			<?php
					}
			?>
				</table>
				</td>
			</tr>
		</table>
	</body>
</html>