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
								<h2 style="text-align:center; line-height: 50px;"><?php print $post->title; ?></h2>
								<span class="byline" style="text-align:center;"><?php print $post->subtitle; ?></span>
								<img src="<?php print $post->image_url; ?>">
							</header>
							<h3><?php print $post->content; ?></h3>
						</section>
						<?php 
							session_start();
							if(!empty($_SESSION['auth'])){
								print '<a href="/pb/editcontent.php?id_post='.$_GET['id'].'" class="button">EDITEAZA</a>';
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
				<p style="text-align:center; color:#fff; font-size:35px;">ULTIMILE STIRI IMPORTANTE</p>
				<div class="row">
				<?php 
						$resultimp = mysqli_query($con, "
							SELECT p.* FROM posts p
							WHERE important = 1
							ORDER BY id DESC
							LIMIT 3
							");

						if ($resultimp) {
							while ($row = $resultimp->fetch_object()) {
								$row->id = -1;
								print '
									<section class="4u">
										<div class="box">
											<a href="/pb/post.php?id=' . $row->id .'">
												<img src="images/children.jpg" width="50%">
											</a>
											<h3>'.$row->title.'</h3>
											<p>'.$row->subtitle.'</p>
											<a href="/pb/post.php?id=' . $row->id . '" class="button">More</a>
										</div>
									</section>
								';
							}
							$resultimp->close();
						}

				 ?>
				</div>
				<!-- <div class="divider"></div> -->
			</div>
		</div>
	<!-- /Featured -->

	<!-- Footer -->
		<?php include"components/footer.php"; ?> 
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