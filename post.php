<?php 
	include "php/connect.php";
	
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$result = mysqli_query($con, "SELECT p.* FROM posts p WHERE p.id = '$id'");
	}else{
		header('Location: /pb/index.php');
	}
	$post = $result->fetch_object();

	$con->close();
 ?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include"components/head.php";?>
	</head>
	<body class="no-sidebar">
	<!-- Header -->
		<?php include "components/navbar.php"; ?>
	<!-- Header -->
		
	<!-- Banner -->
		<div id="banner2">
			<div class="container">
			</div>
		</div>
	<!-- /Banner -->

	<!-- Main -->
		<div id="page">
				
			<!-- Main -->
			<div id="main" class="container">
				<div class="row">
					<div class="12u">
						<section>
							<header>
								<h2><?php print $post->title; ?></h2>
								<span class="byline"><?php print $post->subtitle; ?></span>
								<img src="<?php print $post->image_url; ?>">
							</header>
							<p><?php print $post->content; ?></p>
						</section>
						<?php 
							session_start();
							if(!empty($_SESSION['auth'])){
								print '<a href="/pb/editpost.php?id='.$_GET['id'].'" class="button">EDITEAZA</a>';
						 	}
						 ?>
					</div>

				</div>
			</div>
			<!-- Main -->

		</div>
	<!-- /Main -->

	<!-- Featured -->
		<div id="featured">
			<div class="container">
				<div class="row">
					<section class="4u">
						<div class="box">
							<a href="#" class="image left"><img src="images/pics04.jpg" alt=""></a>
							<h3>Etiam posuere augue</h3>
							<p>Donec nonummy magna quis risus eleifend. </p>
							<a href="#" class="button">More</a>
						</div>
					</section>
					<section class="4u">
						<div class="box">
							<a href="#" class="image left"><img src="images/pics05.jpg" alt=""></a>
							<h3>Etiam posuere augue</h3>
							<p>Donec nonummy magna quis risus eleifend. </p>
							<a href="#" class="button">More</a>
						</div>
					</section>
					<section class="4u">
						<div class="box">
							<a href="#" class="image left"><img src="images/pics06.jpg" alt=""></a>
							<h3>Etiam posuere augue</h3>
							<p>Donec nonummy magna quis risus eleifend. </p>
							<a href="#" class="button">More</a>
						</div>
					</section>
				</div>
				<div class="divider"></div>
			</div>
		</div>
	<!-- /Featured -->

	<!-- Footer -->
		<?php include"components/infofooter.php"; ?>
	<!-- /Footer -->

	<!-- Copyright -->
		<div id="copyright" >
			<div class="container">
				Design: <a href="#">DevBalu</a>
			</div>
		</div>
	<!-- /Copyright -->


	</body>
</html>