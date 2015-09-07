<?php
	require('asset/mysql_con.php');
?>

<!DOCTYPE html>
	<html>
		<head>
			<title> TISUTISU.org Programming - Physics - Technology 

			 </title>
			<link rel="stylesheet" type="text/css" href="asset/stylesheet.css" />
		</head>

		<body>
			<div class="header">
				 <h1>TisuTisu</h1> 
			</div>

			<div class="nav">
				<ul>
					<li><a href="javascript:history.go(-1)"> HOME </a></li>
					<li><a href="#">Programming </a></li>
					<li><a href="#">Physics </a></li>
					<li><a href="#">Technology </a></li>
				</ul>
			</div>

		<div class="aside_container">
			<div class="aside">
				<h3> Postingan Terakhir : </h3>
				<ol>
<?php 
// membuat kode posting terakhir
$query = mysql_query("select * from db_content order by id asc");
	for($i=0; $i<3; $i++){
		if($q = mysql_fetch_array($query)){
			$data = $q['judul'];
?>
	<li><a href="#"><?php echo $data; ?></a></li>
<?php
			}
		}
?>					
				</ol>
			</div>

			<div class="aside">
				<h3> have any account?<br /> you can Login in this form :</h3>
				<table>
					<form action="aunt_login.php" method="post">
					<tr>
						<td>Username:</td>
						<td><input type="text" name="user" /></td>
					</tr>

					<tr>
					 	<td>Password:</td>
					 	<td><input type="password" name="pass" /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" value="Login"/></td>
					</tr>
					</form>
				</table>
			</div>
		</div>
<?php
	$id = $_GET['id'];
	$query = mysql_query("select * from db_content where id=$id");
	if($q = mysql_fetch_array($query)){
		$judul = $q['judul'];
		$user = $q['user'];
		$tanggal = $q['tanggal'];
		$isi = $q['isi'];
	}
?>
		<div class="article">
				<h2> <?php echo $judul; ?></h2>
				<p> 
					<?php echo $isi; ?>
				</p>
				<br />
				<hr>
				<h4>Di posting oleh: <?php echo $user; ?> <?php for($i=0;$i<60;$i++){ echo "&nbsp"; } ?> <?php echo $tanggal; ?></h4>
		</div>



		<div class="footer">
			<p> Copyright @2015 Design by <em>Catur Sura</em> </p>
		</div>	
		
		</body>
	</html>