<?php
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		include "connect.php";
		$username = $_POST['username'];
		$password = $_POST['password'];

		$userreq = mysqli_query($con, "SELECT * FROM admin") ;
		$response = $userreq->fetch_assoc();

		if($response['username'] ==  $username && $response['password'] == $password){
			session_start();
			$_SESSION['auth'] = true;
			header('Location: /pb');
		}else{
			$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/admin.php';
			header('Location: ' . $server);
		}
	}else{
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/index.php';
		header('Location: ' . $server);
	}
 ?>