<?php  
	$con = new mysqli("localhost", "root", "", "pb");
	// $con = new mysqli("mysql.hostinger.co.uk", "u699553655_andy", "popamamonta", "u699553655_pb");

	if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit;
	}

?>