<?php
	$db_name		= "gym_master";
	$db_user		= "root";
	$db_pass		= "";
	$db_host		= "127.0.0.1";

	$time_limit_reg = 15;
	$time_limit_ver = 10;
	$base_path = 'http://localhost/fingerprint-scanner-api/';
	$main_app_path = 'http://localhost/gym-system/';

	$conn = mysql_connect($db_host, $db_user, $db_pass);
	if (!$conn) die("Connection for user $db_user refused!");
	mysql_select_db($db_name, $conn) or die("Can not connect to database!");