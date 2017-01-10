<?php 
	session_start();
	if(!$_SESSION['auth']){
		header('Location: /pb/index.php');
	}
	require_once('php/connect.php');

	if (!empty($_GET['id_group'])) {
		if (!is_numeric($_GET['id_group'])) {
			print 'Grupa nu a fost gasita!';
			return;
		}
		$id = $_GET['id_group'];
		$query_group = mysqli_query($con, "SELECT g.* FROM groups g WHERE g.id = '$id'");
		$group = $query_group->fetch_assoc();
	}

	if (!empty($_GET['id_category'])) {
		if (!is_numeric($_GET['id_category'])) {
			print 'Categoria nu a fost gasita!';
			return;
		}
		$id = $_GET['id_category'];
		$query_category = mysqli_query($con, "SELECT c.* FROM categories c WHERE c.id = '$id'");
		$query_groups = mysqli_query($con, "SELECT g.* FROM groups g");
		$category = $query_category->fetch_assoc();
		$groups = $query_groups->fetch_all();
		if (!$category) {
			print 'Categoria nu a fost gasita!';
			return;
		}

		if (!empty($groups)) {
			$group_options = '';
			foreach ($groups as $group) {
				$selected = '';
				if ($category['id_group'] == $group[0]) {
					$selected = 'selected="selected"';
				}
				$group_options .= '<option ' . $selected . ' value="' . $group[0] . '">' . $group[1] . '</option>';
			}
		}
	}

	if (!empty($_GET['id_post'])) {
		if (!is_numeric($_GET['id_post'])) {
			print 'Postul nu a fost gasit!';
			return;
		}
		$id = $_GET['id_post'];
		$query_post = mysqli_query($con, "SELECT p.* FROM posts p WHERE p.id = '$id'");
		$post = $query_post->fetch_assoc();
		$id_group = $post['id_group'];
		
		// $query_groups = mysqli_query($con, "SELECT g.* FROM groups g");
		$query_categories = mysqli_query($con, "
			SELECT c.* FROM categories c WHERE c.id_group = '$id_group'");
		// $groups = $query_groups->fetch_all();
		$categories = $query_categories->fetch_all();
		
		// if (!empty($groups)) {
		// 	$group_options = '';
		// 	foreach ($groups as $group) {
		// 		$selected = '';
		// 		if ($post['id_group'] == $group[0]) {
		// 			$selected = 'selected="selected"';
		// 		}
		// 		$group_options .= '<option ' . $selected . ' value="' . $group[0] . '">' . $group[1] . '</option>';
		// 	}
		// }



		if (!empty($categories)) {
			$categories_options = '';
			foreach ($categories as $category) {
				$selected = '';
				if ($post['id_category'] == $category[0]) {
					$selected = 'selected="selected"';
				}
				$categories_options .= '<option ' . $selected . ' value="' . $category[0] . '">' . $category[2] . '</option>';
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
	<title>Editarea Postului</title>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col m3 offset-m4">
				<a href="index.php"><img src="images/logo.jpg" style="width: 100%"></a>
			</div>
			<form action="php/editcontent_action.php" method="POST" enctype="multipart/form-data">
				<div class="col s12 m8 l8 offset-m2 offset-l2">
					<!-- edit category -->
					<?php 
					if (!empty($_GET['id_category'])) {
						// confirmation for delete category
						if (!empty($_GET['delete'])) {
							print '
							<h2 class="center">Sunteti sigur ?</h2>
							<input value="' . $_GET['id_category'] .'" type="hidden" name="deletecategory"/>
	   						<a href="admin.php" class="btn left" style="background:#e95d3c">PAGINA ADMIN</a>
	   						<button class="btn right" type="submit" style="background:#e95d3c">STERGE</button>';
	   						return;
						}
					?>
						<h4 class="left" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">EDITEAZA CATEGORIA</h4><br><br><br>

	 				  	<div class="input-field col s12">
					    	<select name="select_group">
					      		<option value="" disabled selected>GRUPE</option>
					      		<?php print $group_options; ?>
					    	</select>
					  	</div><br><br><br><br>

		  		        <div class="input-field">
		          			<input value="<?php print $category['name']; ?>" id="content" type="text" name="name"/>
		         			<label for="content">NUME</label>
		       			 </div><br>
		       			<input value="<?php print $_GET['id_category'];?>" type="hidden" name="category"/>
	   					<a class="btn left" href="admin.php" style="background:#e95d3c">PAGINA ADMIN</a>	
	   					<button class="btn right" type="submit" style="background:#e95d3c">SALVEAZA</button>	
					<?php 
					}
					?>
					<!-- END edit category -->

					<!-- edit group -->
					<?php 
					if (!empty($_GET['id_group'])) {
						// confirmation for delete category
						if (!empty($_GET['delete'])) {
							print '
							<h2 class="center">Sunteti sigur ?</h2>
							<input value="' . $_GET['id_group'] .'" type="hidden" name="deletegroup"/>
	   						<a href="admin.php" class="btn left" style="background:#e95d3c">PAGINA ADMIN</a>
	   						<button class="btn right" type="submit" style="background:#e95d3c">STERGE</button>';
	   						return;
						}
					?>
						<h4 class="left" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">EDITEAZA GRUPA</h4><br><br><br>

		  		        <div class="input-field">
		          			<input value="<?php print $group['name']; ?>" id="content" type="text" name="name"/>
		         			<label for="content">NUME</label>
		       			</div><br>
		       			<?php 
		       				if ($group['thumbnail']) {
		       					print '<img src="' . $group['thumbnail'] . '" />';
		       				}
		       			?>
	          			<div class="file-field input-field">
					      <div class="btn" style="background:#e95d3c">
					        <span>File</span>
					        <input type="file" name="image">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text" placeholder="Alege Imaginea">
					      </div>
					    </div>
	          			<input value="<?php print $_GET['id_group']; ?>" type="hidden" name="group"/>
	   					<a href="admin.php" class="btn left" style="background:#e95d3c">PAGINA ADMIN</a>
	   					<button class="btn right" type="submit" style="background:#e95d3c">SALVEAZA</button>
					<?php 
					}
					?>
					<!-- END edit group -->

					<!-- edit content -->
					<?php 
					if (!empty($_GET['id_post'])) {
						if (!empty($_GET['delete'])) {
							print '
							<h2 class="center">Sunteti sigur ?</h2>
							<input value="' . $_GET['id_post'] .'" type="hidden" name="deletepost"/>
	   						<a href="editcontent.php?id_post=' . $_GET['id_post'] . '" class="btn left" style="background:#e95d3c">EDITARE POST</a>
	   						<button class="btn right" type="submit" style="background:#e95d3c">STERGE</button>';
	   						return;
						}
					?>
					<h4 class="left" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">Editarea Postuui</h4><br><br><br>

				  	<div class="input-field col s12">
				    	<select name="category">
				      		<option value="" disabled selected>CATEGORY</option>
				      		<?php print $categories_options; ?>
				    	</select>
				  	</div><br><br><br><br>
	
					<?php 
						if ($post['image_url']) {
							print '
							<img src="' . $post['image_url'] . '" style="width: 15%;"/>
							<input type="hidden" value="' . $post['image_url'] . '" name="image_url"/>
							';
						}
					?>
			        <div class="file-field input-field">
				      <div class="btn" style="background:#e95d3c">
				        <span>File</span>
				        <input type="file" name="image">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text" placeholder="Alege imaginea">
				      </div>
				    </div>

			        <div class="input-field">
	          			<input value="<?php print $post['title']; ?>" id="title" type="text" name="title" />
	          			<label for="title">Titlu</label>
	          		</div>

	  		        <div class="input-field">
	          			<input value="<?php print $post['subtitle']; ?>" id="subtit" type="text" class="materialize-textarea" name="subtitle">
	         			<label for="subtit">Subtitlu</label>
	       			 </div><br>

	  		        <div class="input-field">
	          			<textarea id="content1" type="text" class="materialize-textarea" name="content"><?php print $post['content']; ?></textarea>
	         			<label for="content1">Content</label>
	       			 </div><br>
	       			 <div class="row">
						<div class="col m3"> 	
		       			  	<input name="important" <?php print $post['important'] ? 'checked=checked' : ''; ?> type="checkbox" class="filled-in" id="important"/>
	      					<label for="important">IMPORTANT</label>
	   				 	</div>
	   				 </div>
	   				 <input type="hidden" value="<?php print $_GET['id_post'] ?>" name="post" />
	       			 <a class="btn left" href="editcontent.php?id_post=<?php print $_GET['id_post']; ?>&delete=1" style="background:#e95d3c" >STERGE POSTUL</a>
	       			 <button class="btn right" type="submit" name="save" style="background:#e95d3c">SALVEAZA</button>
	       			<?php 
					}
					?>
					<!-- END edit content -->
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