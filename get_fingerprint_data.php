<?php 

	if (isset($_POST['RegTemp']) && !empty($_POST['RegTemp'])) {

		include 'global.php';
		include 'function.php';

		$data 		= explode(";",$_POST['RegTemp']);
		$vStamp 	= $data[0];
		$sn 		= $data[1];
		$member_id	= $data[2];
		$regTemp 	= $data[3];

		$device = getDeviceBySn($sn);

		$salt = md5($device[0]['ac'].$device[0]['vkey'].$regTemp.$sn.$member_id);

		if (strtoupper($vStamp) == strtoupper($salt)) {
			$sql1 		= "SELECT MAX(finger_id) as fid FROM member_finger WHERE member_id=".$member_id;
			$result1 	= mysql_query($sql1);
			$data 		= mysql_fetch_array($result1);
			$fid 		= $data['fid'];

			if ($fid == 0) {
				$finger_id 	 = $fid+1;
				$finger_data = $regTemp;

				echo $main_app_path . "members/register/register_fingerprint?status=success&member_id=$member_id&finger_id=$finger_id&finger_data=$finger_data";
			} else {
				echo $main_app_path . "members/register/register_fingerprint?status=fail&message=Template%20already%20exists!";
			}
		} else {
			echo $main_app_path . "members/register/register_fingerprint?status=fail&message=Parameters%20invalid!";
		}
	} 