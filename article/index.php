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
			$id = $q['id'];
?>
	<li><a href="index.php?id=<?php echo $id; ?>&article=<?php echo str_replace(' ','-',$data); ?>"><?php echo $data; ?></a></li>
<?php
			}
		}
?>					
				</ol>
			</div>

			<div class="aside">
				<h3> have any account?<br /> you can Login in this form :</h3>
				<table>
					<form action="aunt_login.php/article" method="post">
					<tr>
						<td>Username:</td>
						<td><input type="text" name="user" value="you cannot login. go back to homepage." disabled/></td>
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
				<br />
				<br />
				<br />
			<div class="comment">
				<h3> Komentar : </h3>
				<?php
					$query = mysql_query("select * from db_comment where id_article=$id");
					if(mysql_affected_rows() == 0){
						echo "<p> There is no comment, Be a first comment!</p>";
					}
					while($q = mysql_fetch_array($query)){
						// mengambil data
						$nama = ucfirst($q['nama']);
						$comment = $q['comment'];
						$tanggal = $q['tanggal'];
				?>
					<table>
						<tr>
							<td> <p><strong><?php echo $nama . ' - ' . $tanggal ?> said:</strong>
								<br />
								<div class="comment_kecil">&nbsp;<?php echo $comment; ?></div>
							 </p> </td>
						</tr>
					</table>
				<?php
					}
				?>
			</div>
		</div>

		<div class="article">
			<table cellspacing = "5">
				<form action="content_comment.php" method="post">
					<tr>	
						<td>Nama:</td>
						<td><input type="text" name="nama" /></td>
						<td><input type="hidden" name ="artikel" value="<?php echo $_GET['article']; ?>" /></td>
					</tr>

					<tr>
						<td>Email:</td>
						<td><input type="email" name="email" /></td>
						<td><input type="hidden" name ="id" value="<?php echo $_GET['id']; ?>" /></td>
						<td><input type="hidden" name="tanggal" value="<?php echo date('t M H:i'); ?>" /></td>
					</tr>
				<table>
					<tr>
						<td><strong>Comment</strong></td>
					</tr>
					<tr>
						<td colspan="2"><textarea name="comment" style="width: 550px; height: 180px"></textarea></td>
					</tr>
				</table>
					<tr>
						<td><input type="submit" value="Submit" /></td>
				</form>
			</table>
		</div>x

		<div class="footer">
			<p> @2015 <a href="https://www.facebook.com/dhen.Jore.Ceria"><u>Catur Sura</u></a> | Hi, Welcome to my Noob site.</p>
		</div>	
		
		</body>
	</html>