<?php 
	session_start();
	if(!$_SESSION['auth']){
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/index.php';
		header('Location: ' . $server);
	}
	// $language = $_GET['language'];
	require_once('php/connect.php');
	//  logic for edit group
	if (!empty($_GET['id_group'])) {
		if (!is_numeric($_GET['id_group'])) {
			print 'Grupa nu a fost gasita!';
			return;
		}
		$id = $_GET['id_group'];
		$query_group = mysqli_query($con, "SELECT g.* FROM groups g WHERE g.id = '$id'");
		$group = $query_group->fetch_assoc();
	}
	//  END logic for edit group

	//logic for edit category
	if (!empty($_GET['id_category'])) {
		if (!is_numeric($_GET['id_category'])) {
			print 'Categoria nu a fost gasita!';
			return;
		}
		$id = $_GET['id_category'];
		$query_category = mysqli_query($con, "SELECT c.* FROM categories c WHERE c.id = '$id'");
		// $query_groups = mysqli_query($con, "SELECT g.* FROM groups g");
		$category = $query_category->fetch_assoc();
		// $groups = $query_groups->fetch_assoc();
		if (!$category) {
			print 'Categoria nu a fost gasita!';
			return;
		}
	//logic for edit category

		// if (!empty($groups)) {
		// 	$group_options = '';
		// 	foreach ($groups as $group) {
		// 		$selected = '';
		// 		if ($category['id_group'] == $group['id']) {
		// 			$selected = 'selected="selected"';
		// 		}
		// 		$group_options .= '<option ' . $selected . ' value="' . $group['id'] . '">' . $group['name'] . '</option>';
		// 	}
		// }
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
		
		$query_categories = mysqli_query($con, "SELECT c.* FROM categories c WHERE c.id_group = '$id_group'");

		$categories_options = '';
		while ($category = $query_categories->fetch_assoc()) {
			$selected = '';
			if ($post['id_category'] == $category['id']) {
				$selected = 'selected="selected"';
			}
			$categories_options .= '<option ' . $selected . ' value="' . $category['id'] . '">' . $category['name'] . '</option>';
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
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col m3 offset-m4">
				<a href="index.php"><img src="images/logo.jpg" style="width: 100%"></a>
			</div>
			<form action="php/editcontent_action.php?language=<?php print $language;?>" method="POST" enctype="multipart/form-data">
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

		<!-- 				<div class="input-field col s12">
							<select name="select_group">
								<option value="" disabled selected>GRUPE</option>
								<?php //print $group_options; ?>
							</select>
						</div><br><br><br><br>
 -->
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
						// confirmation for delete group
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

						<input value="<?php print $_GET['id_group']; ?>" type="hidden" name="group"/>
						<a href="admin.php" class="btn left" style="background:#e95d3c">PAGINA ADMIN</a>
						<button class="btn right" type="submit" style="background:#e95d3c">SALVEAZA</button>
					<?php 
					}
					?>
					<!-- END edit group -->

					<!-- edit content -->
					<!-- confirmation at deleting post -->
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
					<!-- END confirmation at deleting post -->
					<h4 class="left" style="color:#ff0000;  font-weight: 200; margin-bottom: 30px;">Editarea Postuui</h4><br><br><br>

					<div class="input-field col s12">
						<select name="category">
							<option value="" disabled selected>CATEGORY</option>
							<?php print $categories_options; ?>
						</select>
					</div><br><br><br><br>
					<!-- show current post image -->
					<?php 
						if ($post['image_url']) {
							print '
							<img src="' . $post['image_url'] . '" style="width: 15%;"/>
							<input type="hidden" value="' . $post['image_url'] . '" name="image_url"/>
							<div class="row">
								<div class="col m3"> 	
									<input name="delimg" type="checkbox" class="filled-in" id="delimg"/>
									<label for="delimg">Sterge imaginea</label>
								</div>
							</div>';
						}
					?>
					<!-- END show current post image -->
					<div class="file-field input-field">
						<div class="btn" style="background:#e95d3c">
							<span>File</span>
							<input id="uimage" type="file" name="image">
						</div>
						<div class="file-path-wrapper" id="file-wrapper">
							<input id="uimager" class="file-path validate" type="text" placeholder="Alege imaginea">
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

<!-- 					<div class="input-field">
						<textarea id="content1" type="text" class="materialize-textarea" name="content"><?php //print $post['content']; ?></textarea>
						<label for="content1">Content</label>
					 </div><br> -->
					<div id="text-editor">
						<textarea id="editor1" name="txt" cols="100" rows="20"><?php echo $txt[0]['text'] ?><?php print $post['content']; ?></textarea>
						<script type="text/javascript">
							CKEDITOR.replace( 'editor1' );
							AjexFileManager.init({
								returnTo: 'ckeditor',
								editor: ckeditor1
							});
						</script>
					</div><br>

					<!-- show current post video -->
					<?php 
						if ($post['video']) {
							print '
							<div style="width: 30%;">
								<iframe width="100%" src="'.$post['video'].'" allowfullscreen="allowfullscreen"></iframe>
							</div>
							';
						}
					?>
					<!-- END show current post video -->
					<div class="input-field">
						<input id="video" type="text" value="<?php print $post['video']; ?>" name="editvideo"></input>
						<label for="video">Video : "YouTube"</label>
					</div><br>

					<div class="input-field">
						<input id="searchteg" type="text" value="<?php print $post['teg']; ?>" name="searchteg"></input>
						<label for="searchteg">Cuvinte cheie</label>
					</div><br>

					<input type="hidden" value="<?php print $_GET['id_post'] ?>" name="post" />
					<div class="row">
						<div class="col m4"><a class="btn" href="editcontent.php?id_post=<?php print $_GET['id_post']; ?>&delete=1" style="background:#e95d3c" >STERGE POSTUL</a></div>
						<div class="col m4"><a class="btn" href="post.php?id=<?php print $_GET['id_post'] . '&viewpage=1' . '&language=' . $language;?>" style="background:#e95d3c;" >VIZUALIZARE POSTULUI</a></div>
						<div class="col m4"><button class="btn" type="submit" name="save" style="background:#e95d3c">SALVEAZA</button></div>
					</div>
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
	<script type="text/javascript" src="js/verimgsize.js"></script>
	
</body>
</html>