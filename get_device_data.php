<?php

	if (isset($_GET['vc']) && !empty($_GET['vc'])) {

		include 'global.php';
		include 'function.php';

		$data = getDeviceAcSn($_GET['vc']);
		echo $data[0]['ac'].$data[0]['sn'];
	}