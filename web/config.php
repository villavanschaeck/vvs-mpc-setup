<?php
	if(!include('mysql.php')) {
		header('HTTP/1.0 500 Internal Server Error');
		print("echo 'Database error'; touch /database-error-in-host-config; exit 0");
		exit;
	}

	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($_GET['ip'])) {
		$ip = $_GET['ip'];
	}

	$res = mysql_query("SELECT * FROM muziekcomputers WHERE ip='". addslashes($ip) ."'");
	if($row = mysql_fetch_assoc($res)) {
		echo 'HOSTNAME='. $row['hostname'] ."\n";
		echo "DOMAIN=vvs-nijmegen.nl\n";
		echo 'IP='. $row['ip'] ."\n";
		if($row['master']) {
			echo 'MASTER='. $row['master'] ."\n";
		} else {
			echo "MASTER=\n";
		}
		if(is_file('local-config.txt')) {
			readfile('local-config.txt');
		}
	}
?>
