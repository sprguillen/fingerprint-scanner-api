<?php
	include 'global.php';
	include 'function.php';

	if (isset($_GET['action']) && $_GET['action'] === 'register') {
		
		if (isset($_GET['member_id']) && !empty($_GET['member_id'])) {
			$member_id = $_GET['member_id'];
			
			echo "$member_id;SecurityKey;" . $time_limit_reg . ";" . 
				$base_path . "get_fingerprint_data.php;" . 
				$base_path . "get_device_data.php";
		}
	}

	if (isset($_GET['action']) && $_GET['action'] === 'verification') {
		if (isset($_GET['member_id']) && !empty($_GET['member_id'])) {
			$member_id = $_GET['member_id'];

			$finger = getMemberFinger($member_id);

			echo "$member_id;" . $finger[0]['finger_data'] . ";SecurityKey;" . $time_limit_ver . ";" .
				$base_path . "create_log.php;" .
				$base_path . "get_device_data.php;" .
				"extraParams";
		}
	}