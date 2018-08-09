<?php

	if (isset($_GET['status']) && $_GET['status'] === 'success') {
		echo $_GET['member_id'] . "<br/>" . $_GET['finger_id'] . "<br/>" . $_GET['finger_data'];
	} else {
		echo $_GET['message'];
	}