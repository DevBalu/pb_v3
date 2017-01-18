<?php 
	session_start();
	if(!$_SESSION['auth']){
		header('Location: /pb/index.php');
	}
	require_once('php/connect.php');

	if (!empty($con)) {
		$result = mysqli_query($con, "
			SELECT g.id, g.name group_name, c.name category_name, c.id category_id FROM groups g
			LEFT JOIN categories c ON c.id_group = g.id
		");

		$groups = array();
		if ($result) {
			while ($row = $result->fetch_object()) {
				$groups[$row->id]['group_name'] = $row->group_name;
				$groups[$row->id]['categories'][] = array('category_name' => $row->category_name,
				'category_id' => $row->category_id);
			}
			$result->close();
		}

		if (!empty($groups)) {
			$group_options = '';
			$categories_options = '';
			foreach ($groups as $id => $group) {
				$selected = '';
				if (!empty($_GET['group']) && $id == $_GET['group']) {
					$selected = 'selected="selected"';
				}
				$group_options .= '<option ' . $selected . ' value="' . $id . '">    ' . $group['group_name'] . '</option>';

			}
			
			if (!empty($_GET['group'])) {
				foreach ($groups[$_GET['group']]['categories'] as $category) {
					$selected = '';
					if (!empty($_GET['group']) && $id == $_GET['group']) {
						$selected = 'selected="selected"';
					}
					$categories_options .= '<option ' . $selected . ' value="' . $category['category_id'] . '">    ' . $category['category_name'] . '</option>';
				}
			}
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

					<h4 class="left" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">Adaugare Post</h4><br><br><br>

					<div class="input-field col s12">
						<span style="color: red; position: absolute; margin-top: 13px;">*</span> 
						<select name="group">
							<option value="" disabled selected>    GROUP</option>
							<?php print $group_options; ?>
						</select>
					</div><br><br><br><br>
					<div class="input-field col s12">
						<span style="color: red; position: absolute; margin-top: 13px;">*</span> 
						<select name="category">
							<option value="" disabled selected>    CATEGORY</option>
							<?php print $categories_options; ?>
						</select>
					</div><br><br>

					<div class="input-field col s12">
						<input name="important" type="checkbox" class="filled-in" id="filled-in-box"/>
						<label for="filled-in-box">IMPORTANT</label>
					</div><br><br><br><br><br>
					
					<div class="file-field input-field">
						<div class="btn" style="background:#e95d3c">
							<span>File</span>
							<input id="uimage" type="file" name="image">
						</div>
						<div class="file-path-wrapper" id="file-wrapper">
							<input id="uimager" class="file-path validate" type="text" placeholder="Alege Imaginea">
						</div>
					</div>

					<div class="input-field">
						<textarea id="title" type="text" class="materialize-textarea" name="title"></textarea>
						<label for="title"><span style="color: red;">*</span> Titlu</label>
					</div>

					<div class="input-field">
						<textarea id="subtit" type="text" class="materialize-textarea" name="subtitle"></textarea>
						<label for="subtit">Subtitlu</label>
					 </div><br>

					<div class="input-field">
						<textarea id="content1" type="text" class="materialize-textarea" name="content"></textarea>
						<label for="content1"><span style="color: red;">*</span> Content</label>
					</div><br>
					<div class="input-field">
						<input id="video" type="text" name="video"></input>
						<label for="video">Video : "YouTube"</label>
					</div><br>
					<div class="input-field">
						<input id="searchteg" type="text" name="searchteg"></input>
						<label for="searchteg"><span style="color: red;">*</span> Cuvinte cheie</label>
					</div><br>
					<input value="1" type="hidden" name="addpost"/>
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