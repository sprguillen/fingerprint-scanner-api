<?php

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

	if (isset($_GET['vc']) && !empty($_GET['vc'])) {

		include 'global.php';

		$data = getDeviceAcSn($_GET['vc']);
		echo $data[0]['ac'].$data[0]['sn'];
	}