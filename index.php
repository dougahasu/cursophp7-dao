<?php
	require_once('config.php');

	$sql = new sql('localhost', 'db_teste', 'postgres', 'postgres2000');

	$users = $sql->select("SELECT * FROM tb_usuarios");

	echo json_encode($users);
?>