<?php
	require('asset/mysql_con.php');
	require('privilege.php');
?>
<html>
	<head>
		<title>Add User</title>
	</head>

	<body>
		<h1 style="text-align: center">Form Tambah User v.0.1 </h1>
		<table align="center" cellspacing="15">
			<form action="tambah_user_aunt.php" method="post">
				<tr>
					<td>Username : </td>
					<td><input type="text" name="user" required/></td>
				</tr>

				<tr>
					<td>Password : </td>
					<td><input type="text" name="pass" required/></td>
				</tr>

				<tr>
					<td>Email : </td>
					<td><input type="email" name="email" required/></td>
				</tr>

				<tr>
					<td>Privilege : </td>
					<td><select name="privilege">
							<option>User</option>
							<option>Admin</option>
						</select>
					</td>
				</tr>

				<tr>
					<td><input type="hidden" name="tanggal" value="<?php 
					date_default_timezone_set('Asia/Jakarta');
					echo date('d-m-Y'); ?>" /></td>
				</tr>

				<tr>
					<td><input type="submit" value="tambah" /></td>
					<td><a style="text-decoration: none; color: #2A5DB0" href="admin.php?value="><strong>Cancel</strong></a></td>
				</tr>
			</form>
		</table>
		<?php
		if($_GET['action'] == 'gagal'){
			echo "<p> Gagal menambah data karena username sudah ada! </p>";
		}
		?>
	</body>
</html>
