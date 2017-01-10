<?php 
	if(!isset($_GET['id'])){
		header('Location: /pb/index.php');
	}
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
		// authorization how administrator
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
				<?php 
					if (!empty($con)) {
						//get group id 
						$id = $_GET['id'];
						//query for getting group name for section last posts
						$titleLastPost = mysqli_query($con, "SELECT g.name FROM groups g WHERE g.id = '$id'");
						$titleLP = $titleLastPost->fetch_assoc();
				 ?>
				<p style="text-align:center; color:#fff; font-size:35px; line-height: 2rem;">
					<?php 
						if(!empty($lastGroupPost)){
							print 'ULTIMILE STIRI DIN GRUPA :'.$titleLP['name'];
						}
					?>
				</p>
				<div class="row">
				<!-- last posts from group -->
					<?php 
						// query for last three posts from this group 
						$lastGroupPost = mysqli_query($con, "
							SELECT p.id, p.image_url, p.title, p.subtitle FROM categories c 
							JOIN posts p ON p.id_category = c.id
							WHERE c.id_group = '$id' 
							ORDER BY p.id DESC
							LIMIT 3
							");
						// show query result in required field 
						if(!empty($lastGroupPost)){
							while($row = $lastGroupPost->fetch_assoc()){
								?>
									<section class="4u">
										<div class="box" style="height: 300px; padding: 5px; border-radius: 5px;">
												<div style="height: 250px; overflow: hidden">
													<a href="post.php?id=<?php print $row['id'];?>" style="color: #000; text-decoration:none;">
														<img src="<?php $row['image_url'];?>" width="50%" style="width: 50%; margin-left: 20%;">
													</a>
													<p style="text-align:center; font-size: 20px"><?php print $row['title'];?></p>
													<p><?php print $row['subtitle'];?></p>
												</div>
												<a href="post.php?id=<?php print $row['id'];?>&important" class="button" style="margin-right:0; padding:2px 5px;">Mai multe</a>
										</div>
									</section>
								<?php
							}//end while
						}//end if
					} else {
						print 'Connection error';
					}
				 ?>
				<!-- END last posts from group -->
				</div>
				<!-- END row -->
			</div>
			<!-- END container -->
		</div>
	<!-- END Featured -->

	<!-- Footer -->
		<?php include"components/footer.php"; ?>
	<!-- /Footer -->

	<!-- Copyright -->
		<?php include"components/copyright.php"; ?>
	<!-- /Copyright -->

	</body>
</html>