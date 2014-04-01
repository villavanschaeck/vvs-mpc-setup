<?php
	if(!include('mysql.php')) {
		header('HTTP/1.0 500 Internal Server Error');
		print("Database error\n");
		exit;
	}

	$res = mysql_query("SELECT name, vlan, humanname, msc_passwd FROM verenigingen_active WHERE NOT ISNULL(msc_passwd)");
	while($row = mysql_fetch_assoc($res)) {
		printf("%s:%s:%s:%s\n", $row['name'], $row['humanname'], $row['msc_passwd'], $row['vlan']);
	}
?>
