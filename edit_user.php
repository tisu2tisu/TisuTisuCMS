<?php
	require('asset/mysql_con.php');
	require('privilege.php');
?>
<html>
	<head>
		<title>Edit User </title>
	</head>
	<body>
<?php
	$user_id = $_GET['userid'];
	$query = mysqli_query($link, "SELECT * FROM db_id WHERE id='$user_id'");
	if($q = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		$nama = $q['user'];
		$password = $q['password'];
		$email = $q['email'];
		$privilege = $q['privilege'];
	} else {
		die('Error : ' . mysql_error());
	}
?>
<h1 style="text-align: center;"> Edit User Form v0.1 </h1>
		<table align="center" cellspacing="15">
			<form action="edit_user_aunt.php" method="post">
				<tr>
					<td>Username : </td>
					<td><input type="text" name="user" value="<?php echo $nama; ?>" /></td>
				</tr>

				<tr>
					<td>Password : </td>
					<td><input type="text" name="pass" value="<?php echo $password; ?>" /></td>
				</tr>

				<tr>
					<td>Email : </td>
					<td><input type="email" name="email" value="<?php echo $email; ?>" /></td>
				</tr>

				<tr>
					<td>Privilege : </td>
					<td><select name="privilege">
							<option>Admin</option>
							<option <?php if($privilege == 'user') { echo "selected"; } ?>>User</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?php echo $user_id; ?>"/> </td>
				<tr>
					<td><input type="submit" value="Update" /></td>
					<td><a style="text-decoration: none; color: #2A5DB0" href="admin.php?value="><strong>Cancel</strong></a></td>
				</tr>
			</form>
		</table>