<?php
		mysql_connect('localhost','root','0210sura');
		$mysql_db = mysql_select_db('test');
		if(!$mysql_db){
			die('Error:' . mysql_error());	
		}
?>