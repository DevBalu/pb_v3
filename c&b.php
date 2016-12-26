<!DOCTYPE HTML>
<html>
	<head>
		<?php include "components/head.php"; ?>			
	</head>
	<body class="right-sidebar">
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
						<?php include"php/c&breq.php"; ?>
						<!-- END db request -->
					</div>

				</div>
			</div>
	<!-- Main -->

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
		<?php include"components/copyright.php"; ?>
	<!-- /Copyright -->

	</body>
</html>