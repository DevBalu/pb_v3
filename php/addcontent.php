<?php 
	include"connect.php";

	$id = bin2hex(openssl_random_pseudo_bytes(20));

	$urlimg = $_POST['urlimg'];
	$title = $_POST['title'];
	$subtit = $_POST['subtit'];
	$content = $_POST['content'];
	$categories = $_POST['categories'];

	if($urlimg !== "" && $title !== "" && $subtit !== "" && $content !== "" && $categories !== ""){

		mysqli_query($con, "INSERT INTO $categories (urlimg, title, previu, content, id) VALUES ('$urlimg', '$title', '$subtit', '$content', '$id')");
	}else{
		printf("Cimpurile sunt goale.");
	}
	
	$con->close();
	// header('Location: /pb');
 ?>