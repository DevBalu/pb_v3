<?php
	include "php/connect.php";
	
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$result = mysqli_query($con, "SELECT p.* FROM posts p WHERE p.id = '$id'");
	}else{
		header('Location: /pb/index.php');
	}
	$post = $result->fetch_object();

 ?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include"components/head.php";?>
	</head>
	<body class="no-sidebar">
	<?php 
		session_start();
		// authorization how administrator
		if(!empty($_SESSION['auth'])){
		print '
			<div class="container">
				<div class="row">
					<div class="3u" style="float:right">			
							<a href="admin.php" class="button" style="margin-right:20px;">ADMIN</a>
							<a href="logout.php" class="button">LOG OUT</a>
					 </div>
				</div>
			</div>';
	 	}else{
			// authorization how guest
	 		print '
			<div class="container">
				<div class="row">
					<div style="float:right">			
							<a href="auth.php" class="button">LOG IN</a>
					 </div>
				</div>
			</div>';
	 	}
	 ?>
	<!-- Header -->
		<?php include "components/navbar.php"; ?>
	<!-- END Header -->
		
	<!-- Banner -->
		<div id="banner2">
			<div class="container">
			</div>
		</div>
	<!-- END Banner -->

	<!-- Page -->
		<div id="page">
				
			<!-- Main -->
			<div id="main" class="container">
				<div class="row">
					<div class="12u">
						<section>
							<header>
								<h2 style="text-align:center; line-height: 50px;"><?php print $post->title; ?></h2>
								<span class="byline" style="text-align:center;"><?php print $post->subtitle; ?></span>
								<img src="<?php print $post->image_url ?>" style="width: 50%; margin-left:100px;">
							</header>
							<h3><?php print $post->content; ?></h3>
							<div class="wrapper">
								<div class="video">
									<iframe id="postVideo" src="https://www.youtube.com/watch?v=aHFZkPumniI" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
								</div>
							</div>
							<style>
								.wrapper {
									position: relative;
									perspective: 500px;
									width: 400px;
									height: 200px;
								}
								.video {
									position: absolute;
									width: 300px;
									height: 200px;
									/*margin: 400px 0 0 100px; */
								}
								#postVideo{
									width: 100%;
									height: 100%;
								}
									
							</style>
						</section>
						<?php 
							session_start();
							if(!empty($_SESSION['auth'])){
								print '<a href="editcontent.php?id_post='.$_GET['id'].'" class="button">EDITEAZA</a>';
						 	}
						 ?>
					</div>

				</div>
			</div>
			<!-- END Main -->

		</div>
	<!-- END Page -->

	<!-- Featured -->
		<div id="featured">
			<div class="container">
				<p style="text-align:center; color:#fff; font-size:35px; line-height: 2rem;">ULTIMILE STIRI IMPORTANTE</p>
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
								print '
									<section class="4u">
										<div class="box" style="height: 300px; padding: 5px; border-radius: 5px;">
												<div style="height: 250px; overflow: hidden">
													<a href="post.php?id=' . $row->id .'" style="color: #000; text-decoration:none;">
														<img src="'. $row->image_url .'" width="50%" style="width: 50%; margin-left: 20%;">
													</a>
													<p style="text-align:center; font-size: 20px">'.$row->title.'</p>
													<p>'.$row->subtitle.'</p>
												</div>
												<a href="post.php?id=' . $row->id . '&important" class="button" style="margin-right:0; padding:2px 5px;">Mai multe</a>
										</div>
									</section>
								';
							}
							$resultimp->close();
						}

				 ?>
				</div>
			</div>
		</div>
	<!-- END Featured -->

	<!-- Footer -->
		<?php include"components/footer.php"; ?> 
	<!-- END Footer -->

	<!-- Copyright -->
		<div id="copyright" >
			<div class="container">
				Design: <a href="#">DevBalu</a>
			</div>
		</div>
	<!-- END Copyright -->


	</body>
</html>