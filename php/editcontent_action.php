<?php
	session_start();
	if(!$_SESSION['auth']){
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/index.php';
		header('Location: ' . $server);
	}
	$language = $_GET['language'];
	include "connect.php";

	include "videoexists.php";

	// Edit category logic.
	if (!empty($_POST['category']) && !empty($_POST['name'])) {
		$id = $_POST['category'];
		$name = $_POST['name'];

		mysqli_query($con, "UPDATE categories SET name='$name' WHERE id = '$id'");
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/editcontent.php?id_category=' . $id;
		header('Location: ' . $server);
	}

	// Remove category logic.
	if (!empty($_POST['deletecategory'])) {
		$id = $_POST['deletecategory'];
		if (mysqli_query($con, "DELETE c.* FROM categories c WHERE c.id = '$id'")) {
			$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/admin.php';
			header('Location: ' . $server);
		}
	}

	// Remove message logic.
	if (!empty($_POST['delmessage'])) {
		$id = $_POST['delmessage'];
		if (mysqli_query($con, "DELETE m.* FROM message m WHERE m.id = '$id'")) {
			$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/message.php';
			header('Location: ' . $server);
		}

	}

	// Remove group logic.
	if (!empty($_POST['deletegroup'])) {
		$id = $_POST['deletegroup'];
		if (mysqli_query($con, "DELETE g.* FROM groups g WHERE g.id = '$id'")) {
			$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/admin.php';
			header('Location: ' . $server);
		}
	}

	// Edit group logic.
	if (!empty($_POST['group']) && !empty($_POST['name'])) {
		$id = $_POST['group'];
		$name = $_POST['name'];

		$update_string = "UPDATE groups SET name='$name' WHERE id = '$id'";
		mysqli_query($con, $update_string);
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/editcontent.php?id_group=' . $id;
		header('Location: ' . $server);
	}

	// Remove post logic.
	if (!empty($_POST['deletepost'])) {
		$id = $_POST['deletepost'];
		if (mysqli_query($con, "DELETE p.* FROM posts p WHERE p.id = '$id'")) {
			header('Location: /pb/index.php');
			$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/index.php';
			header('Location: ' . $server);
		}
	}

	// Edit post logic.
	if (!empty($_POST['post'])&& !empty($_POST['category']) && !empty($_POST['title']) && !empty($_POST['content']) && $searchteg = $_POST['searchteg']) {
		$id = $_POST['post'];
		$category = $_POST['category'];
		$title = $_POST['title'];
		$subtitle = $_POST['subtitle'];
		$content = $_POST['content'];
		$updated = time();
		$searchteg = $_POST['searchteg'];

		// get res from video field
		$editvideo = $_POST['editvideo'];
		$href = '';
		if (!empty($editvideo)) {
			$pos = strpos($editvideo, 'embed');
			if($pos !== false){
				$v_id = substr($editvideo, 30);
				$href = videoExist($v_id);
			} else {
				$v_id = substr($editvideo, 32);
				$href = videoExist($v_id);
			}
		}
		// END get res from video field


		//get res from image field
		$image_url = $_POST['image_url'];
		if (!empty($_FILES['image']['name'])) {
			$image_name = '../post_images/' . $_FILES['image']['name'];
			if (file_exists($image_name)) {
				unlink($image_name);
			}
			move_uploaded_file($_FILES['image']['tmp_name'], $image_name);
			$image_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/post_images/' . $_FILES['image']['name'];
		}

		//check at touch checkbox delimg
		$delimg = $_POST['delimg'];
		if(!empty($delimg)){
			$image_url = '';
		}
		// END check at touch checkbox delimg
		
		//END get res from image field

		$update_string = "UPDATE posts p SET p.id_category=$category, p.title='$title', p.subtitle='$subtitle', p.content='$content', p.video='$href', p.image_url='$image_url', p.updated='$updated', p.teg='$searchteg'  WHERE id = '$id'";

		mysqli_query($con, $update_string);

		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/editcontent.php?id_post=' . $id . '&language=' . $language;
		header('Location: ' . $server);
	}
	$con->close();
 ?>