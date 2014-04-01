<?php
	if(!include('mysql.php')) {
		header('HTTP/1.0 500 Internal Server Error');
		print("Database error\n");
		exit;
	}

	$ip = $_SERVER['REMOTE_ADDR'];

	mysql_query("UPDATE muziekcomputers SET last_boot=NOW() WHERE ip='". addslashes($ip) ."'");
	die("OK\n");
?>
