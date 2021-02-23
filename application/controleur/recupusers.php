<?php
		include_once('../model/bigModelForMe.php');
		$envoi = $manager->selection('users',array('*'));
		echo json_encode($envoi);
?>