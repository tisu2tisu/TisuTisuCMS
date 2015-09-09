<?php
	require('asset/mysql_con.php');
	// membuat variable 
	$id = $_POST['id'];
	$comment = $_POST['comment'];
	$nama = strtolower($_POST['nama']);
	$email = strtolower($_POST['email']);
	$artikel = $_POST['artikel'];
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date("d M H:i");

	$q = mysql_query("select count(nama) AS num from db_comment where nama='$nama'");
	$q2 = mysql_query("select * from db_comment where nama='$nama'");
	
	// fungsi untuk mengecek apabila email ditemukan maka akan meng izinkan memakai nama yg sama
	if($quer = mysql_fetch_array($q2)){
		$mail = $quer['email'];
		if($email == $mail){
			$query = mysql_query("insert into db_comment values('', '$comment', '$id', '$nama', '$email','$tanggal')");

			if($query){
				header("location:index.php?id=$id&article=$artikel&comment=");
				die();
			} else {
				die('Error.' .  mysql_error());
			}
		}
	}

	// mengecek untuk mencegah pemakaian username yang sama
	$q_data = mysql_fetch_assoc($q);
	$jumlah = $q_data['num'];
	if($jumlah > 0){
		header("location:index.php?id=$id&article=$artikel&comment=gagal");
	} else {

		$query = mysql_query("insert into db_comment values('', '$comment', '$id', '$nama', '$email','$tanggal')");

			if($query){
				header("location:index.php?id=$id&article=$artikel&comment=");
			} else {
				die('Error.' .  mysql_error());
			}
	}
	
?>