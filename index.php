<?php
	require('asset/mysql_con.php');
	include_once("analyticstracking.php");
	session_start();
?>

<!DOCTYPE html>
	<html>
		<head>
			<title> TISUTISU.org Programming - physics - Technology  </title>
			<link rel="stylesheet" type="text/css" href="asset/stylesheet.css" />
			<meta property="og:title" content="TisuTisu - Ngoding Ngopi Anime" />
			<meta property="og:description" content="all about Programming physics and anime"/>
			<meta property="og:image" content="https://gothicreviews.files.wordpress.com/2015/08/me-me-me.png" />
			<meta property="og:image:type" content="image/jpg"/>
			<meta property="og:image:width" content="158px" />
			<meta property="og:image:height" content="158px" />
		</head>

		<body>
			<div class="header">
				 <h1>TisuTisu</h1> 
			</div>

			<div class="nav">
				<ul>
					<li><a href="index.php"> HOME </a></li>
					<li><a href="programming.php">Programming </a></li>
					<li><a href="physics.php">Physics </a></li>
					<li><a href="anime.php">Anime </a></li>
				</ul>
			</div>

		<div class="aside_container">
			<div class="aside">
				<h3> Postingan Terakhir : </h3>
				<ol>
<?php 
// membuat kode posting terakhir
$query = mysqli_query($link, "select * from db_content order by id asc");
	for($i=0; $i<3; $i++){
		if($q = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$data = $q['judul'];
			$data_id = $q['id'];
?>
	<li><a href="article/index.php?id=<?php echo $data_id; ?>&article=<?php echo str_replace(' ','-',$data); ?>&comment="><?php echo $data; ?></a></li>
<?php
			}
		}
?>					
				</ol>
			</div>
<?php 
// jika user telah login
if(isset($_SESSION['username'])){
?>
			<div class="aside">
				<h3> Welcome <?php echo $_SESSION['username']; ?> </h3>
				<p><a href="admin.php?value=">Admin Page </a></p>
			</div>
<?php
// jika belum login
			} else {
?>
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
<?php       } ?>
<!-- end -->
		</div>

<?php
// setting page
	$halaman = (int) (!isset($_GET['halaman']) ? 1 : $_GET['halaman']) or die('<div style="color: #fff">PAGE NOT FOUND</div>');
	$limit = 4;
	$posisi = ($halaman*$limit)-$limit;
	$totalpage = mysqli_num_rows(mysqli_query($link, "SELECT * FROM db_content"));

	$nextpage = $halaman+1;
	$lastpage = ceil($totalpage / $limit);
	$lastbfp = $lastpage-1;

	$query = mysqli_query($link, "select * from db_content order by id desc limit $posisi,$limit");
		while($q = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			$judul = $q['judul'];
			$isi = $q['isi'];
			$tanggal = $q['tanggal'];
			$user = $q['user'];
			$id = $q['id'];
			$category = $q['category'];
			$pquery = mysqli_query($link, "SELECT * FROM pageview WHERE page='$id'");

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
				<div style="font-family: Helvetica Neue; margin-bottom:30px">By <?php echo ucfirst($user); ?></div>
				<p> 
					<?php echo $string; ?>
					<br />
					<br />
					<a href="article/index.php?id=<?php echo $id; ?>&article=<?php echo str_replace(' ','-',$judul); ?>&comment=">Readmore </a>
				</p>
				<br />
				<hr>
				<h4>Viewed <?php echo mysqli_num_rows($pquery); ?> times <?php for($i=0;$i<60;$i++){ echo "&nbsp"; } ?> <?php echo $tanggal; ?></h4>
<?php
// menghitung komentar
	$komen = mysqli_query($link, "select * from db_comment where id_article=$id");
	$jumlah_komen = mysqli_num_rows($komen);
?>
				<h5><?php echo "Category: " . $category; ?></h4> 
				<h4><?php echo $jumlah_komen; ?> Comments</h4>
			</div>
		<?php
				}
			/* close connection mysqli */
			mysqli_close($link);
		?>

			</div>

<?php
	if($lastpage > 1) {
		echo "<div class='article'>";
		echo "<ul>";
		if($lastpage < 5) {
			for($i=1; $i<=$totalpage; $i++) {
				if($halaman != $i) {
					echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=$i'>$i</a></li>";
				} else {
					echo "<li class='nolist'>$i</li>";
			}
			}
		} else if($lastpage > 9) {
			if ($halaman < 4) {
				for($i=1; $i <= 9; $i++){
					if($halaman != $i)
					echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=$i'>$i</a></li>";
					else
					echo "<li class='nolist'>$i</li>";
				}
					echo "<li>...</li>";
					echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=$lastbfp'>$lastbfp</a></li>";
					echo "<li class='last'><a href='$_SERVER[PHP_SELF]?halaman=$lastpage'>LAST</a></li>";
			} else if($lastpage - 4 > $halaman && $halaman > 4) {
					echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=1'>1</a></li>";
					echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=2'>2</a></li>";
					echo "<li>...</li>";

					for($i=$halaman-2; $i <= $halaman+2; $i++) {
						if($halaman != $i)
							echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=$i'>$i</a></li>";
						else
							echo "<li class='nolist'>$i</li>";
					}

					echo "<li>...</li>";
					echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=$lastbfp'>$lastbfp</a></li>";
					echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=$lastpage'>$lastpage</a></li>";
			} else {
				echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=1'>1</a></li>";
				echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=2'>2</a></li>";
				echo "<li>...</li>";

				for($i=$lastpage - 4; $i <= $lastpage; $i++) {
					if($halaman != $i)
						echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=$i'>$i</a></li>";
					else
						echo "<li class='nolist'>$i</li>";
				}
			}
		}
		if ( $halaman < $i - 1){
			echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=$nextpage'>NEXT</a></li>";
			echo "<li class='list'><a href='$_SERVER[PHP_SELF]?halaman=$lastpage'>LAST</a></li>";
		} else {
			echo "<li class='next'>NEXT</li>";
			echo "<li class='last'>LAST</li>";
		}
		echo "</div>";
	}

?>
			</div>
			<div class="footer">
				<p> @2015 <a href="https://www.facebook.com/dhen.Jore.Ceria"><u>Catur Sura</u></a> |<?php echo "$lastpage - " . $totalpage; ?> Hi, Welcome to my Noob site.</p>
			</div>	
		
		</body>
	</html>