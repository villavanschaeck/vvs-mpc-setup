<?php
	if(!include('mysql.php')) {
		header('HTTP/1.0 500 Internal Server Error');
		echo "Database error\n";
		exit;
	}

	$ip = $_SERVER['REMOTE_ADDR'];

	$res = mysql_query("SELECT master.mac FROM muziekcomputers slave, muziekcomputers master WHERE slave.master=master.ip AND slave.ip='". addslashes($ip) ."'");
	if($row = mysql_fetch_assoc($res)) {
		passthru("/usr/local/bin/sudo /usr/sbin/wake vlan2 ". escapeshellarg($row['mac']));
	} else {
		header('HTTP/1.0 500 Internal Server Error');
		echo "Error\n";
	}
?>
