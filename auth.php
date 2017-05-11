<?php 
	session_start();
	if(!empty($_SESSION['auth'])){
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/admin.php';
		header('Location: ' . $server);
	}
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
			<form action="php/log.php" method="POST" >
				<div class="col s12 m6 l6 offset-l3" >
					<img src="images/logo.jpg" style="width: 100%"><br><br>
					<div style="border:3px solid #ccc; padding: 20px">
						<h4 class="center" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">INTRODUCETI DATE PENTRU AUTORIZARE.</h4>
						<div class="input-field">
							<input id="first_name" type="text" class="validate" name="username">
							<label for="first_name">LOGIN</label>
						</div>
						<div class="input-field">
							<input id="last_name" type="password" class="validate" name="password">
							<label for="last_name">PASSWORD</label>
						 </div><br>
						 <button class="btn right" type="submit" style="background:#e95d3c">LOG IN</button><br><br>
					</div>
				</div>
			</form>
		</div>
	</div>




	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
</body>
</html>