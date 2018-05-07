<?php
	if (isset($_GET['action']) && $_GET['action'] === 'register') {
		
		include 'global.php';
		
		if (isset($_GET['member_id']) && !empty($_GET['member_id'])) {
			$member_id = $_GET['member_id'];
			
			echo "$member_id;SecurityKey;" . $time_limit_reg . ";" . 
				$base_path . "get_fingerprint_data.php;" . 
				$base_path . "get_device_data.php";
		}
	}