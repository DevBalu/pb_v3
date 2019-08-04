<?php
	session_start();
	if(!$_SESSION['auth']){
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/index.php';
		header('Location: ' . $server);
	}
	include('php/connect.php');

	$query_languages = mysqli_query($con, "SELECT * FROM languages");
	$query_groups = mysqli_query($con, "SELECT * FROM groups") ;
	$query_categories = mysqli_query($con, "SELECT * FROM categories") ;

	$languages_operations = '';
	while ($language = $query_languages->fetch_assoc()) {
		$languages_operations .= '<div><p>' . $language['name'] . ', ' . $language['prefix'] . ':</p>
		<a href="php/languagedefault.php?id_language=' . $language['id'] . '" class="btn" style="background:#e95d3c">SETEAZA IMPLICIT</a></div>';
	}
	
	$groups_operations = '';
	while ($group = $query_groups->fetch_assoc()) {
		$groups_operations .= '<p>' . $group['name'] . ':</p>
			<a href="editcontent.php?id_group=' . $group['id'] . '" class="btn left" style="background:#e95d3c">EDITEAZA</a>
			<a href="editcontent.php?id_group=' . $group['id'] . '&delete=1" class="btn right" style="background:#e95d3c">STERGE</a><br><br>';
		}

	$categories_operations = '';
	while ($category = $query_categories->fetch_assoc()) {
		$categories_operations .= '<p>' . $category['name'] . ':</p>
		<a href="editcontent.php?id_category=' . $category['id'] . '" class="btn left" style="background:#e95d3c">EDITEAZA</a>
		<a href="editcontent.php?id_category=' . $category['id'] . '&delete=1" class="btn right" style="background:#e95d3c">STERGE</a><br><br>';
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
			<div class="col s12 m8 l8 offset-l2" >
				<a href="index.php"><img src="images/logo.jpg" style="width: 100%"><br><br></a>
				<div style="border:3px solid #ccc; padding: 20px">
					
					<h4 class="center" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">VIZUALIZEAZA:</h4>
					<div class="row">
						<a href="index.php" class="btn right col m3" style="background:#e95d3c">SITE-UL</a>
						<a href="message.php" class="btn left col m3" style="background:#e95d3c">MESSAJE</a>
					</div>
					<div class="divider"></div>
					
					<h4 class="center" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">ADAUGA:</h4>
					<a href="addpost.php" class="btn left" style="background:#e95d3c">POST</a><br><br>
					<a href="addgroup.php" class="btn left" style="background:#e95d3c">GRUPA</a><br><br>
					<a href="addcategory.php" class="btn left" style="background:#e95d3c">CATEGORIE</a><br><br>
					<a href="addlanguage.php" class="btn left" style="background:#e95d3c">LIMBA</a><br><br>
					<!-- <div class="divider"></div> -->

					<ul class="collapsible" data-collapsible="expandable" style="box-shadow: none; border-left:none; border-right: none;">
						<li style="padding: 20px;">
							<div class="collapsible-header"><h4 class="center" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">OPERATII LIMBI:</h4></div>
							<div class="collapsible-body"><?php print $languages_operations; ?></div>
						</li>
						<li style="padding: 20px;">
							<div class="collapsible-header"><h4 class="center" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">OPERATII GRUPE:</h4></div>
							<div class="collapsible-body"><?php print $groups_operations; ?></div>
						</li>
						<li style="padding: 20px;">
							<div class="collapsible-header"><h4 class="center" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">OPERATII CATEGORII:</h4></div>
							<div class="collapsible-body"><?php print $categories_operations; ?></div>
						</li>
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