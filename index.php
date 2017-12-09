<?php
	require_once('config.php');
	$user = new usuarios();
	$user->login("anandahermione", '123456');

	echo $user;
?>