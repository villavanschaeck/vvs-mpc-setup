<?php
	if(!include('mysql.php')) {
		header('HTTP/1.0 500 Internal Server Error');
		print("Database error\n");
		exit;
	}
	if(!isset($_GET['host'])) {
		header('HTTP/1.0 400 Bad Request');
		die("Missing verification parameter\n");
	}

	$ip = $_SERVER['REMOTE_ADDR'];
	$host = $_GET['host'];

	mysql_query("UPDATE muziekcomputers SET last_install=NOW(), should_install=0 WHERE ip='". addslashes($ip) ."' AND hostname='". addslashes($host) ."'");
	die("OK\n");
?>
