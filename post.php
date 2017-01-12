<?php
	//logic for post field
	require_once('php/connect.php');
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$result = mysqli_query($con, "SELECT p.* FROM posts p WHERE p.id = '$id'");
	}else{
		header('Location: /pb/index.php');
	}
	$post = $result->fetch_object();
	//END logic for post field
	
	//logic for FEUTERED post.php
	$id_cat = $post->id_category;
	if(!empty($con)){
		// query for last three posts from this category
		$lastCatPost = mysqli_query($con, "
			SELECT p.id, p.image_url, p.title, p.subtitle FROM posts  p
			WHERE p.id_category = '$id_cat' 
			ORDER BY p.id DESC
			LIMIT 3
			");
		//query for getting category name for section last posts
		$secTitLasPos = mysqli_query($con, "SELECT c.name FROM categories c WHERE c.id = '$id_cat'");
		$titleLP = $secTitLasPos->fetch_assoc();
	

		// show query result in required field 
		$lastCatPostForm = '';
		if(!empty($lastCatPost)){
			while($row = $lastCatPost->fetch_assoc()){
				$lastCatPostForm .= '
				<section class="4u">
					<div class="box" style="height: 300px; padding: 5px; border-radius: 5px;">
							<div style="height: 250px; overflow: hidden">
								<a href="post.php?id='.$row['id'].'" style="color: #000; text-decoration:none;">
									<img src="'.$row['image_url'].'" width="50%" style="width: 50%; margin-left: 20%;">
								</a>
								<p style="text-align:center; font-size: 20px">'.$row['title'].'</p>
								<p>'.$row['subtitle'].'</p>
							</div>
							<a href="post.php?id='.$row['id'].'&important" class="button" style="margin-right:0; padding:2px 5px;">Mai multe</a>
					</div>
				</section>';
			}//end while
		}//end if

		if (!empty($lastCatPostForm)) {
			$secTit = 'ULTIMILE STIRI DIN CATEGORIE : '.$titleLP['name'];
		}else{
			$secTit= '';
		}
	}
	$con->close();
	//END logic for FEUTERED post.php  
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
	<!-- HEADER -->
		<?php include "components/navbar.php"; ?>
	<!-- /HEADER -->
		
	<!-- BANNER -->
		<div id="banner2">
			<div class="container">
			</div>
		</div>
	<!--  /BANNER -->

	<!-- PAGE -->
		<div id="page">
				
			<!-- MAIN -->
			<div id="main" class="container">
				<div class="row">
					<div class="12u">
						<section>
							<header>
								<!-- divider -->
								<div class="divider" style="width: 100%; border-bottom: 1px solid #ddd; margin: 20px 0px;"></div>
								<!--  /divider -->

								<!-- title -->
								<h2 style="text-align:center; line-height: 50px;"><?php print $post->title; ?></h2>
								<!--  /title -->

								<!-- subtitle -->
								<span class="byline" style="text-align:center;"><?php print $post->subtitle; ?></span><br>
								<!--  /subtitle -->

								<!-- image -->
								<div style="width: 50%;">
									<?php 
										$img = $post->image_url;
										if(!empty($img)){
											$imageteg = '<img src="'. $img .'" style="max-height: 550px;">';
										}else{
											$imageteg = '';
										}
										print $imageteg;
									 ?>
								</div>
								<!--  /image -->
							</header>
							<!-- content -->
							<h3><?php print $post->content; ?></h3>
							<!--  /content -->

							<!-- divider -->
							<div class="divider" style="width: 100%; border-bottom: 1px solid #ddd; margin: 20px 0px;"></div>
							<!--  /divider -->

							<!-- video -->
							<?php 
								$video = $post->video;
								if(!empty($video)){
								?>
									<div style="width: 50%;">
										<iframe width="100%" height="315" src="<?php print $post->video;?>" allowfullscreen="allowfullscreen"></iframe>
									</div>
									<!-- divider -->
									<div class="divider" style="width: 100%; border-bottom: 1px solid #ddd; margin: 20px 0px;"></div>
									<!--  /divider -->
								<?php
								} 
							 ?>
							<!--  /video -->

						</section>
						<?php 
							if(!empty($_SESSION['auth'])){
								print '<a href="editcontent.php?id_post='.$_GET['id'].'" class="button" style="margin-right:0px;"">EDITEAZA</a>';
							}
						?>
					</div>

				</div>
			</div>
			<!--  /MAIN -->

		</div>
	<!--  /PAGE -->

	<!-- FEATURED -->
		<div id="featured">
			<div class="container">
				<p style="text-align:center; color:#fff; font-size:35px; line-height: 2rem;"><?php print $secTit;?></p>
				<div class="row">
				<!-- last posts from category -->
					<?php print $lastCatPostForm;?>
				<!--  /last posts from category -->
				</div>
				<!--  /row -->
			</div>
			<!--  /container -->
		</div>
	<!--  /FEATURED -->

	<!-- FOOTER -->
		<?php include"components/footer.php"; ?> 
	<!--  /FOOTER -->

	<!-- COPYRIGHT -->
		<div id="copyright" >
			<div class="container">
				Developer: <a href="#">DevBalu</a>
			</div>
		</div>
	<!--  /COPYRIGHT -->


	</body>
</html>