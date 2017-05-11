<?php 
	session_start();
	if(!$_SESSION['auth']){
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/index.php';
		header('Location: ' . $server);
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
			$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/admin.php';
			header('Location: ' . $server);
		}
		else {
			print 'Nu s-a putut actualiza limba!';
		}
	}
	$con->close();
 ?>