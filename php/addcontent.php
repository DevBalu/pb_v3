<?php 
	include "connect.php";
	
	if (!empty($_POST['group']) && !empty($_POST['category']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['content']) && !empty($_FILES['image'])) {
		$group = $_POST['group'];
		$category = $_POST['category'];
		$title = $_POST['title'];
		$subtitle = $_POST['subtitle'];
		$content = $_POST['content'];
		$image_name = '../post_images/' . $_FILES['image']['name'];
		if (file_exists($image_name)) {
			unlink($image_name);
		}
		move_uploaded_file($_FILES['image']['tmp_name'], $image_name);
		$image_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/post_images/' . $_FILES['image']['name'];

		mysqli_query($con, "
			INSERT INTO posts (id_group, id_category, image_url, title, subtitle, content)
			VALUES ('$group', '$category', '$image_url', '$title', '$subtitle', '$content')");

		header('Location: /pb/addpost.php');
	}
	else {
		print "Cimpurile sunt goale.";
	}
	$con->close();
 ?>