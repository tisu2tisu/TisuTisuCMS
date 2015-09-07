<?php
	require('asset/mysql_con.php');
?>

<!DOCTYPE html>
	<html>
		<head>
			<title> TISUTISU.org Programming - Physics - Technology  </title>
			<link rel="stylesheet" type="text/css" href="asset/stylesheet.css" />
		</head>

		<body>
			<div class="header">
				 <h1>TisuTisu</h1> 
			</div>

			<div class="nav">
				<ul>
					<li><a href="index.php"> HOME </a></li>
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
			$data_id = $q['id'];
?>
	<li><a href="article/index.php?id=<?php echo $data_id; ?>&article=<?php echo str_replace(' ','-',$data); ?>"><?php echo $data; ?></a></li>
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
	$query = mysql_query("select * from db_content order by id desc");
		while($q = mysql_fetch_array($query)){
			$judul = $q['judul'];
			$isi = $q['isi'];
			$tanggal = $q['tanggal'];
			$user = $q['user'];
			$id = $q['id'];

			// function readmore
				$string = strip_tags($isi);
				if(strlen($string) > 500) {
					// truncate string
					$string_cut = substr($string, 0, 500);

					// make sure it ends in a word so assassinate doesn't become ass
					$string = substr($string_cut, 0, strrpos($string_cut, ' '));
				} else {
					$string = $isi;
				}

?>

			<div class="article">
				<h2> <?php echo $judul; ?></h2>
				<p> 
					<?php echo $string; ?>
					<br />
					<br />
					<a href="article/index.php?id=<?php echo $id; ?>&article=<?php echo str_replace(' ','-',$judul); ?>">Readmore </a>
				</p>
				<br />
				<hr>
				<h4>Di posting oleh: <?php echo $user; ?> <?php for($i=0;$i<60;$i++){ echo "&nbsp"; } ?> <?php echo $tanggal; ?></h4>
			</div>
		<?php
				}
		?>

			</div>


			<div class="footer">
				<p> @2015 <a href="https://www.facebook.com/dhen.Jore.Ceria"><u>Catur Sura</u></a> | Hi, Welcome to my Noob site.</p>
			</div>	
		
		</body>
	</html>