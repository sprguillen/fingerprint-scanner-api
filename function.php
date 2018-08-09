<?php

	function getMemberFinger($member_id) {
		$sql = "SELECT * FROM member_finger WHERE member_id=" . $member_id;
		$result = mysql_query($sql);
		$arr = array();
		$i = 0;

		while($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				'member_id'	  =>$row['member_id'],
				"finger_id"	  =>$row['finger_id'],
				"finger_data" =>$row['finger_data']
				);
			$i++;

		}

		return $arr;
	}

	function getUserFinger($user_id) {
		$sql = "SELECT * FROM user_account_finger WHERE user_account_id=" . $user_id;
		$result = mysql_query($sql);
		$arr = array();
		$i = 0;

		while($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				"user_account_id" =>$row['user_account_id'],
				"finger_id"	  	  =>$row['finger_id'],
				"finger_data" 	  =>$row['finger_data']
				);
			$i++;

		}

		return $arr;
	}

	function getDeviceAcSn($vc) {
		$sql 	= "SELECT * FROM device WHERE verification_code ='".$vc."'";
		$result	= mysql_query($sql);
		$arr 	= array();
		$i 		= 0;

		while ($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				'device_name' => $row['device_name'],
				'sn'		  => $row['serial_number'],
				'vc'		  => $row['verification_code'],
				'ac'	  	  => $row['activation_code'],
				'vkey' 		  => $row['verification_key']
			);

			$i++;

		}

		return $arr;
	}

	function getDeviceBySn($sn) {
		$sql 	= "SELECT * FROM device WHERE serial_number ='".$sn."'";
		$result	= mysql_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['serial_number'],
				'vc'		=> $row['verification_code'],
				'ac'		=> $row['activation_code'],
				'vkey'		=> $row['verification_key']
			);

			$i++;

		}

		return $arr;
	}