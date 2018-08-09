<?php 

	if (isset($_POST['RegTemp']) && !empty($_POST['RegTemp'])) {

		include 'global.php';
		include 'function.php';

		$data 		= explode(";",$_POST['RegTemp']);
		$vStamp 	= $data[0];
		$sn 		= $data[1];
		$user_id	= $data[2];
		$regTemp 	= $data[3];

		$device = getDeviceBySn($sn);

		$salt = md5($device[0]['ac'].$device[0]['vkey'].$regTemp.$sn.$user_id);

		if (strtoupper($vStamp) == strtoupper($salt)) {
			$sql1 		= "SELECT MAX(finger_id) as fid FROM user_account_finger WHERE user_account_id=".$user_id;
			$result1 	= mysql_query($sql1);
			$data 		= mysql_fetch_array($result1);
			$fid 		= $data['fid'];

			if ($fid == 0) {
				$finger_id 	 = $fid+1;
				$finger_data = $regTemp;

				echo $main_app_path . "users/save_fingerprint?status=success&user_account_id=$user_id&finger_id=$finger_id&finger_data=$finger_data";
			} else {
				echo $main_app_path . "users/save_fingerprint?status=fail&message=Template%20already%20exists!";
			}
		} else {
			echo $main_app_path . "users/save_fingerprint?status=fail&message=Parameters%20invalid!";
		}
	} 