<?php
	session_start();
	if(!$_SESSION['auth']){
		header('Location: /pb/index.php');
	}
	include "connect.php";
	
	// Add category logic.
	if (!empty($_POST['addcategory']) && !empty($_POST['name']) && !empty($_POST['select_group'])) {
		$name = $_POST['name'];
		$select_group = $_POST['select_group'];
		
		mysqli_query($con, "INSERT INTO categories (id_group, name) VALUES ('$select_group', '$name')");
		header('Location: /pb/addcategory.php');
	}
	else {
		echo 'Cimpurile sunt goale!';
	}

	// Add group logic.
	if (!empty($_POST['addgroup']) && !empty($_POST['name']) && !empty($_FILES['image'])) {
		if ($_FILES['image']['error']) {
			echo 'Sunt erori in adaugarea imaginii!';
			return;
		}
		$name = $_POST['name'];
		$filename = $_FILES['image']['tmp_name'];
		$plain = fread(fopen($filename, "r"), filesize($filename));
		$base64_encoded = 'data:image/' . $_FILES['image']['type'] . ';base64,' . base64_encode($plain);
		
		mysqli_query($con, "INSERT INTO groups (name, thumbnail) VALUES ('$name', '$base64_encoded')");
		header('Location: /pb/addgroup.php');
	}
	else {
		echo 'Cimpurile sunt goale!';
	}

	// Add post logic.
	if (!empty($_POST['addpost']) &&!empty($_POST['group']) && !empty($_POST['category']) && !empty($_POST['title']) && !empty($_POST['content'])) {
		$group = $_POST['group'];
		$category = $_POST['category'];
		$title = $_POST['title'];
		$subtitle = $_POST['subtitle'];
		$content = $_POST['content'];
		$important = $_POST['important'] ? 1 : 0;
		$created = $updated = time();
		$image_name = '../pb/post_images/' . $_FILES['image']['name'];
		if (file_exists($image_name)) {
			unlink($image_name);
		}
		if(!empty($_FILES['image']['name'])){
			move_uploaded_file($_FILES['image']['tmp_name'], $image_name);
			$image_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/pb/post_images/' . $_FILES['image']['name'];
		}else{
			$image_url = "";
		}

		mysqli_query($con, "
			INSERT INTO posts (id_group, id_category, image_url, title, subtitle, content, created, updated, important)
			VALUES ('$group', '$category', '$image_url', '$title', '$subtitle', '$content', '$created', '$updated', '$important')");

		// header('Location: /pb/addpost.php');
	}
	else {
		print "Cimpurile sunt goale.";
	}
	$con->close();
 ?>