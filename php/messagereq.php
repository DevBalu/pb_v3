<?php 
	include "connect.php";

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$message = $_POST['message'];


	if($con &&!empty($fname) && !empty($lname) && !empty($email) && !empty($message)){
		$message_query = mysqli_query($con, "
			INSERT INTO message (fname, lname, email, message) VALUES ('$fname', '$lname', '$email', '$message');
		");
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Administrarea</title>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
</head>
<body><br><br>
	<div class="container">
		<div class="row">
			<div class="col s12 m8 l8 offset-l2" >
				<div style="border:3px solid #ccc; padding: 50px">
					
					<p class="center" style="color:#ff0000;  font-size: 25px; font-weight: 200; margin-bottom: 30px;"><?php print'MESAJUL DUMNEAVOASTRU A FOST TRIMIS CU SUCCES' ?>!</p>
					<a class="btn right" style="background-color:#de3d27;" href="../index.php">PAGINA PRINCIPALA</a>
					<?php
						}else{
							print'CIMPURILE SUNT GOALE';
						}
						$con->close();
					 ?>
					
				</div>
			</div>
		</div>
	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
</body>
</html>