<?php 
	session_start();
	$_SESSION['auth'] = null;
	header('Location: /pb/index.php');
?>