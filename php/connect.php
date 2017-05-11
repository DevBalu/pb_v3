<?php  
	// $con = new mysqli("localhost", "root", "", "pb");
	$con = new mysqli("mysql.hostinger.co.uk", "u635131472_andy", "PopaMamonta9608", "u635131472_pb");

	if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit;
	}

?>