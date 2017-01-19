<?php 
	session_start();
	if(!$_SESSION['auth']){
		header('Location: /pb/index.php');
	}
	require_once('connect.php');

	//  logic for setting current language as default.
	if (!empty($_GET['id_language'])) {
		if (!is_numeric($_GET['id_language'])) {
			print 'Limba nu a fost gasita!';
			return;
		}
		$id = $_GET['id_language'];
		if (mysqli_query($con, "UPDATE languages SET is_default = 0 WHERE is_default = 1")) {
			mysqli_query($con, "UPDATE languages SET is_default = 1 WHERE id = $id");
			header('Location: /pb/admin.php');
		}
		else {
			print 'Nu s-a putut actualiza limba!';
		}
	}
	$con->close();
 ?>