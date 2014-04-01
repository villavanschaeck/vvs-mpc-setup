<?php
	header('Content-Type: text/plain');
	echo "#!ipxe\n";
	echo "\n";

	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($_GET['ip'])) {
		$ip = $_GET['ip'];
	}

	if(isset($_GET['forceinstall'])) {
		goto force_install;
	}

	if(!include('mysql.php')) {
		echo "# Database error\n";
		goto boot_from_disk;
	}

	$res = mysql_query("SELECT should_install FROM muziekcomputers WHERE ip='". addslashes($ip) ."'");
	if($row = mysql_fetch_assoc($res)) {
		if($row['should_install']) {
force_install:
			echo "dhcp\n";
			echo "kernel tftp://\${next-server}/pxelinux.0\n";
			echo "boot\n";
			exit;
		}
	}

boot_from_disk:
	echo "sanboot --no-describe --drive 0x80\n";
?>
