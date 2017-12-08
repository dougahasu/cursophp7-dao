<?php
	require_once('config.php');
	$user = new usuarios();
	$user->loadById('0000000001');
	echo "$user";
?>