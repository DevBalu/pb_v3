<?php
	/*Connection with DB pb*/
	include "connect.php";
	/*END Connection with DB pb*/

	/*get login and password  from db*/
	$adminquery = mysqli_query($con, "SELECT * FROM admin");
	$adminlog = "";
	$adminpas = "";
		
		$resadmin = [];
		
		while($res = $adminquery->fetch_assoc()){
			$resadmin[] = $res;
		}

		for($i = 0; $i < sizeof($resadmin); $i++){
			$adminlog = $resadmin[$i]['username'];
			$adminpas = $resadmin[$i]['password'];
		}
	/*END get login and password  of  db*/

	/*get version of log & pass from form of autorization */
		$formlog = $_POST['usname'];
		$formpas = $_POST['pasus'];
	/*END get version of log & pass from form of autorization */
	
	/*work with session*/
	session_start();

	$autorization = true;
	$_SESSION['aut'] = $autorization;
	/*END work with session*/

			

 ?>