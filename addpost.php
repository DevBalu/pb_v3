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
			<div class="col m3 offset-m4">
				<img src="images/logo.jpg" style="width: 100%">
			</div>
			<form action="php/addcontent.php" method="POST">
				<div class="col s12 m8 l8 offset-m2 offset-l2">

					<h4 class="left" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">Setarea Postuui</h4><br><br><br>
				  	
				  	<div class="input-field col s12">
				    	<select name="categories">
				      		<option value="" disabled selected>CATEGORIE</option>
				      		<option value="audiereacetatenilor">Audierea cetățenilor</option>
				      		<option value="autcert">Autorizații și certificate</option>
				      		<option value="bensoc">Beneficii sociale și ajutoare</option>
				      		<option value="busantr">Business și antreprenoriat</option>
				      		<option value="ects">Educație, cultură, turism și sport</option>
				      		<option value="impcet">Implicarea cetățenilor</option>
				      		<option value="imptax">Impozite și taxe locale</option>
				      		<option value="moddeacte">Modele de acte / formulare</option>
				      		<option value="consloc">Consiliul local</option>
				      		<option value="comspec">Comisiile de specialitate</option>
				      		<option value="spp">Strategii, planuri și politici</option>
				    	</select>
				  	</div><br><br><br><br>

			        <div class="input-field">
	          			<textarea id="intadresa" type="text" class="materialize-textarea" name="urlimg"></textarea>
	          			<label for="intadresa">Introduceti adresa imaginii</label>
	          		</div>

			        <div class="input-field">
	          			<textarea id="title" type="text" class="materialize-textarea" name="title"></textarea>
	          			<label for="title">Titlu</label>
	          		</div>

	  		        <div class="input-field">
	          			<textarea id="subtit" type="text" class="materialize-textarea" name="subtit"></textarea>
	         			<label for="subtit">Subtitlu</label>
	       			 </div><br>

	  		        <div class="input-field">
	          			<textarea id="content1" type="text" class="materialize-textarea" name="content"></textarea>
	         			<label for="content1">Content</label>
	       			 </div><br>
	       			 <button class="btn right" type="submit" style="background:#e95d3c">SAVE</button>
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