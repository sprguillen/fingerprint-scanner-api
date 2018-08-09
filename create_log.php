<?php

	if (isset($_POST['VerPas']) && !empty($_POST['VerPas'])) {
		include 'global.php';
		include 'function.php';

		$data 	       = explode(';', $_POST['VerPas']);
		$member_id     = $data[0];
		$vStamp		   = $data[1];
		$time 	       = $data[2];
		$sn 	       = $data[3];
		$membership_id = $data[4];

		$fingerData = getMemberFinger($member_id);
		$device 	= getDeviceBySn($sn);
		$sql1 		= "SELECT * FROM member WHERE id=".$member_id;
		$result1 	= mysql_query($sql1);
		$data 		= mysql_fetch_array($result1);

		$salt = md5($sn.$fingerData[0]['finger_data'].$device[0]['vc'].$time.$member_id.$device[0]['vkey']);

		if (strtoupper($vStamp) == strtoupper($salt)) {
			echo $main_app_path . "members/verify_fingerprint?status=success&member_id=$member_id&time=$time&membership_id=$membership_id";
		} else {
			echo $main_app_path . "members/verify_fingerprint?status=fail&message=Fingerprint%20does%20not%20match!";
		}
	}