<?php 
	// if(!isset($_GET['id'])){
	// 	header('Location: /pb/index.php');
	// }
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include "components/head.php"; ?>			
	</head>
	<body class="right-sidebar">
	<?php 
		session_start();
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
	 	}
	 ?>
	<!-- Header -->
		<?php include"components/navbar.php"; ?>
	<!-- Header -->
		
	<!-- Banner -->
		<?php include"components/banner.php"; ?>
	<!-- /Banner -->

<!-- Main -->
		<div id="page">
				
			<!-- Main -->
			<div id="main" class="container">
				<div class="row">

					<div class="categories 12u">
						<!-- db request -->
						<?php include"php/categories.php"; ?>
						<!-- END db request -->
					</div>

				</div>
			</div>
	<!-- Main -->

			<!-- Featured -->
		<div id="featured">
			<div class="container">
				<p style="text-align:center; color:#fff; font-size:35px;">ULTIMILE STIRI IMPORTANTE</p>
				<div class="row">
				<?php 
						include "php/connect.php";

						$resultimp = mysqli_query($con, "
							SELECT p.* FROM posts p
							WHERE important = 1
							ORDER BY id DESC
							LIMIT 3
							");

						if ($resultimp) {
							while ($row = $resultimp->fetch_object()) {
								$row->id = 1;
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
		<?php include"components/copyright.php"; ?>
	<!-- /Copyright -->

	</body>
</html>