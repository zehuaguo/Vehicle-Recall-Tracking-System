<?php
	$dbuser = "zehua";
	$dbpass = "0227";
	$dbname = "SSID";

	$con = OCILogon($dbuser, $dbpass, $dbname);

	if (!$con) {
		echo "Error occurred while connecting to the database";
		exit;
	}
?>