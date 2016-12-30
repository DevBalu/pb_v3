<!DOCTYPE HTML>
<html>
	<head>
		<?php include "components/head.php"; ?>
	</head>
	<body class="homepage">
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
	 	}else{
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
	<!-- Header -->

	<!-- Banner -->
		<?php include "components/banner.php"; ?>
	<!-- /Banner -->
	<!-- Page -->
		<div id="page">


			<!-- Main -->
			<div id="main" class="container indexsidebar">
				<div class="row">
					<div class="6u">
						<section>
						<?php 

						$resimp = mysqli_query($con, "
							SELECT p.* FROM posts p
							WHERE important = 1
							ORDER BY id DESC
							LIMIT 1
							");

						if ($resimp) {
							while ($row = $resimp->fetch_object()) {
									?>
									<header>
										<h2><?php print $row->title ?></h2>
										<span class="byline"><?php print $row->subtitle ?></span>
									</header>
									<p><?php print $row->content ?></p>
									<?php  
										print '<a class="button" href="/pb/post.php?id=' . $row->id .'">Mai multe</a>';
									?>

						</section>
								<?php
								;}
							$resimp->close();
						} ?>
					</div>
					<div class="3u">
						<section class="sidebar">
							<header>
								<h2>ultimile știri</h2>
							</header>
							<ul class="style2">
								<?php 
									include "php/connect.php";

										$result = mysqli_query($con, "
											SELECT p.* FROM posts p
											ORDER BY id DESC
											LIMIT 5
											");

										if ($result) {
											while ($row = $result->fetch_object()) {
												print '
													<li>
														<a href="/pb/post.php?id=' . $row->id .'">
															<img src="images/pics05.jpg" width="50%">
														</a>
														<p>'. $row->title.'</p>
													</li>
												';
											}
											$result->close();
										}
								?>
							</ul>
						</section>
					</div>
					<div class="3u">
						<section class="sidebar">
							<header>
								<h2>Feugiat Tempus</h2>
							</header>
							<ul class="style1">
								<li><a href="#">Maecenas luctus lectus at sapien</a></li>
								<li><a href="#">Etiam rhoncus volutpat erat</a></li>
								<li><a href="#">Donec dictum metus in sapien</a></li>
								<li><a href="#">Nulla luctus eleifend purus</a></li>
								<li><a href="#">Maecenas luctus lectus at sapien</a></li>
							</ul>
						</section>
						<section class="sidebar">
							<header>
								<h2>Nulla luctus eleifend</h2>
							</header>
							<ul class="style1">
								<li><a href="#">Maecenas luctus lectus at sapien</a></li>
								<li><a href="#">Donec dictum metus in sapien</a></li>
								<li><a href="#">Integer gravida nibh quis urna</a></li>
								<li><a href="#">Etiam posuere augue sit amet nisl</a></li>
								<li><a href="#">Mauris vulputate dolor sit amet nibh</a></li>
							</ul>
						</section>
					</div>
				</div>
			</div>
			<!-- /Main -->

		</div>
	<!-- /Pge -->

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
								$row->id = 1;
								print '
									<section class="4u">
										<div class="box" style="min-height: 150px; padding: 5px; border-radius: 5px;">
												<a href="/pb/post.php?id=' . $row->id .'" style="color: #000; text-decoration:none;">
													<p style="text-align:center; font-size: 20px">'.$row->title.'</p>
													<p>'.$row->subtitle.'</p>
												</a>
												<a href="/pb/post.php?id=' . $row->id . '" class="button" style="margin-right:0; padding:2px 5px;">Mai multe</a>
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
		<?php include "components/footer.php"; ?>
	<!-- /Footer -->

	<!-- Copyright -->
		<?php include "components/copyright.php"; ?>
	<!-- /Copyright -->
	</body>
</html>