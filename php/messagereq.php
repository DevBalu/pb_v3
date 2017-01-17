<?php 
	include "connect.php";

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$message = $_POST['message'];

	//verification of email format is correct
	$email = '';
	
	$emailfield = $_POST['email'];
	$err = '';
	$sendsucces = '';

	if(filter_var($emailfield, FILTER_VALIDATE_EMAIL)){
		$email = $emailfield;
	}else{
		$err = 'Formatul la email nu este corect.<br>';
	}
	//verification of email format is correct

	if($con &&!empty($fname) && !empty($lname) && !empty($email) && !empty($message)){
		$message_query = mysqli_query($con, "
			INSERT INTO message (fname, lname, email, message) VALUES ('$fname', '$lname', '$email', '$message');
		");
		$sendsucces = 'Mesajul a fost trimis cu success!';
	}else{
		$err .= 'Сompletați corect câmpurile.';
	}
	$con->close();
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
					<p class="center" style="color:#ff0000;  font-size: 25px; font-weight: 200; margin-bottom: 30px;"><?php print $err . $sendsucces;?></p>
					<a class="btn right" style="background-color:#de3d27;" href="../index.php">PAGINA PRINCIPALA</a>
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