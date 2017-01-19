<?php 
	require_once('php/connect.php');

	if (!empty($con)) {
		$result = mysqli_query($con, "SELECT g.* FROM groups g");

		$group_options = '';
		if ($result) {
			while ($row = $result->fetch_object()) {
				$group_options .= '<option value="' . $row->id . '">   ' . $row->name . ' : ' . $row->language . '</option>';
			}
			$result->close();
		}
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

					<h4 class="left" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">ADAUGATI CATEGORIE</h4><br><br><br>

					<div class="input-field col s12">
						<select name="select_group">
							<option value="" disabled selected>GROUP</option>
							<?php print $group_options; ?>
						</select>
					</div><br><br><br><br>

					<div class="input-field">
						<input id="content" type="text" name="name"/>
						<label for="content">NUME</label>
					 </div><br>
					<input value="1" type="hidden" name="addcategory"/>
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