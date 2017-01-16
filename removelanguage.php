<?php 
	session_start();
	if(!$_SESSION['auth']){
		header('Location: /pb/index.php');
	}
	require_once('php/connect.php');

	//  logic for remove language.
	if (!empty($_GET['id_language'])) {
		if (!is_numeric($_GET['id_language'])) {
			print 'Grupa nu a fost gasita!';
			return;
		}
		$id = $_GET['id_language'];
		if (mysqli_query($con, "DELETE l.* FROM languages l WHERE l.id = '$id'")) {
			header('Location: /pb/admin.php');
		}
	}
	$con->close();
 ?>