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
			header('Location: /pb/admin.php');
		}
	}else{
		header('Location: /pb');
	}	
 ?>