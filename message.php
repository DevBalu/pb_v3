<?php
	session_start();
	if(!$_SESSION['auth']){
		header('Location: /pb/index.php');
	}
	
	include('php/connect.php');

	$query_message = mysqli_query($con, "SELECT * FROM message ORDER BY id DESC");

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
				<a href="index.php"><img src="images/logo.jpg" style="width: 100%"><br><br></a>
				<div style="border:3px solid #ccc; padding: 20px">
	       			 <a href="/pb/index.php" class="btn right" style="background:#e95d3c">VIZUALIZEAZA SITE-UL</a><br><br>
					<ul class="collapsible" data-collapsible="expandable" style="box-shadow: none;">
						<?php 
							if($query_message){
								while($message = $query_message->fetch_assoc()){
									print '
										<li style="padding: 20px;">
											<div class="collapsible-header">
												<h4 style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">' . $message['fname'] .  $message['lname'] . '</h4>
												</div>
											<div class="collapsible-body">
												<h5>' . $message['email'] . '</h5>
												<p>' . $message['message'] . '</p>
											</div>
										</li>
									';
								}
							}
							$con->close();
						 ?>
					</ul>
					
					
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