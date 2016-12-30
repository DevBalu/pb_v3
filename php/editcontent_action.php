<?php
	session_start();
	if(!$_SESSION['auth']){
		header('Location: /pb/index.php');
	}
	include "connect.php";
	
	// Edit category logic.
	if (!empty($_POST['category']) && !empty($_POST['name']) && !empty($_POST['select_group'])) {
		$id = $_POST['category'];
		$name = $_POST['name'];
		$id_group = $_POST['select_group'];

		mysqli_query($con, "UPDATE categories SET name='$name', id_group='$id_group' WHERE id = '$id'");
		header('Location: /pb/editcontent.php?id_category=' . $id);
	}

	// Remove category logic.
	if (!empty($_POST['deletecategory'])) {
		$id = $_POST['deletecategory'];
		if (mysqli_query($con, "DELETE c.* FROM categories c WHERE c.id = '$id'")) {
			header('Location: /pb/admin.php');
		}
	}

	// Remove group logic.
	if (!empty($_POST['deletegroup'])) {
		$id = $_POST['deletegroup'];
		if (mysqli_query($con, "DELETE g.* FROM groups g WHERE g.id = '$id'")) {
			header('Location: /pb/admin.php');
		}
	}

	// Edit group logic.
	if (!empty($_POST['group']) && !empty($_POST['name'])) {
		$id = $_POST['group'];
		$name = $_POST['name'];
		
		if (!empty($_FILES['image']['name'])) {
			if ($_FILES['image']['error']) {
				echo 'Sunt erori in adaugarea imaginii!';
				return;
			}
			$filename = $_FILES['image']['tmp_name'];
			$plain = fread(fopen($filename, "r"), filesize($filename));
			$base64_encoded = 'data:image/' . $_FILES['image']['type'] . ';base64,' . base64_encode($plain);
		}

		$update_string = "UPDATE groups SET name='$name' WHERE id = '$id'";
		if ($base64_encoded) {
			$update_string = "UPDATE groups SET name='$name', thumbnail='$base64_encoded' WHERE id = '$id'";
		}
		mysqli_query($con, $update_string);
		header('Location: /pb/editcontent.php?id_group=' . $id);
	}

	// Remove post logic.
	if (!empty($_POST['deletepost'])) {
		$id = $_POST['deletepost'];
		if (mysqli_query($con, "DELETE p.* FROM posts p WHERE p.id = '$id'")) {
			header('Location: /pb/index.php');
		}
	}
	
	// Edit post logic.
	if (!empty($_POST['post'])&& !empty($_POST['category']) && !empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['content'])) {
		$id = $_POST['post'];
		$category = $_POST['category'];
		$title = $_POST['title'];
		$subtitle = $_POST['subtitle'];
		$content = $_POST['content'];
		$image_url = $_POST['image_url'];
		$important = !empty($_POST['important']) ? 1 : 0;

		if (!empty($_FILES['image']['name'])) {
			$image_name = '../post_images/' . $_FILES['image']['name'];
			if (file_exists($image_name)) {
				unlink($image_name);
			}
			move_uploaded_file($_FILES['image']['tmp_name'], $image_name);
			$image_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/post_images/' . $_FILES['image']['name'];
		}

		$update_string = "UPDATE posts p SET p.id_category=$category, p.title='$title', p.subtitle='$subtitle', p.content='$content', p.image_url='$image_url', important='$important' WHERE id = '$id'";
		
		mysqli_query($con, $update_string);
		header('Location: /pb/editcontent.php?id_post=' . $id);
	}
	$con->close();
 ?>