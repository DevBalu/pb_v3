<?php 
	session_start();
	$_SESSION['auth'] = null;
	header('Location: /pb/index.php');
	$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/index.php';
	header('Location: ' . $server);
?>