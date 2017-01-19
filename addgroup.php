<?php
	session_start();
	if(!$_SESSION['auth']){
		header('Location: /pb/index.php');
	}
	require_once('php/connect.php');

	$languages = '';
	if (!empty($con)) {
		$result = mysqli_query($con, "SELECT languages.* FROM languages");
		while ($language = $result->fetch_object()) {
			$languages .= '<option value="' . $language->prefix . '">    ' . $language->name . '</option>';
		}
		$result->close();
	}
	$con->close();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Adaugarea Postului</title>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
		<br>
			<div class="col m3 offset-m4">
				<a href="index.php"><img src="images/logo.jpg" style="width: 100%"></a>
			</div>
			<form action="php/addcontent.php" method="POST" enctype="multipart/form-data">
				<div class="col s12 m8 l8 offset-m2 offset-l2"><br>

					<h4 class="left" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">ADAUGATI GRUPA</h4><br><br><br>

					<div class="input-field col s12">
						<span style="color: red; position: absolute; margin-top: 13px;">*</span> 
						<select name="language">
							<option value="" disabled selected>    LIMBA</option>
							<?php print $languages; ?>
						</select>
					</div>
					<br><br><br><br>

	  		        <div class="input-field">
	          			<input id="content" type="text" name="name"/>
	         			<label for="content">NUME</label>
	       			 </div><br>
          			<div class="file-field input-field">
				      <div class="btn" style="background:#e95d3c">
				        <span>File</span>
				        <input type="file" name="image">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text" placeholder="Alege Imaginea">
				      </div>
				    </div>
          			<input value="1" type="hidden" name="addgroup"/>
   					<a class="btn left" href="admin.php" style="background:#e95d3c">PAGINA ADMIN</a>	
   					<button class="btn right" type="submit" style="background:#e95d3c">SALVEAZA</button>
				</div>
			</form>
		</div>
	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  	<!-- Main custum file js -->
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>