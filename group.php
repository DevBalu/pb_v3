<?php 
	//verification, if exists post show page else redirect at index page
	if(!isset($_GET['id'])){
		header('Location: /pb/index.php');
	}
	//logic for FEUTERED group.php 
	require_once('php/connect.php');
	if(!empty($con)){
	 	//get group id 
		$id = $_GET['id'];

		// query for last three posts from this group 
		$lastGroupPost = mysqli_query($con, "
			SELECT p.id, p.image_url, p.title, p.subtitle, p.created, p.updated FROM categories c 
			JOIN posts p ON p.id_category = c.id
			WHERE c.id_group = '$id' 
			ORDER BY p.id DESC
			LIMIT 3
			");
		//query for getting group name for section last posts
		$secTitLasPos = mysqli_query($con, "SELECT g.name FROM groups g WHERE g.id = '$id'");
		$titleLP = $secTitLasPos->fetch_assoc();

		// show query result in required field 
		$lastGroupPostForm = '';
		if(!empty($lastGroupPost)){
			while($row = $lastGroupPost->fetch_assoc()){
				$dtgrc = $row['created'];
				$dtgrup = $row['updated'];
				$datetime = '';
				// verify if post is has update
				if(isset($dtgrup)){
					$datetime .= date("jS \of F Y", $dtgrup);
				}else{
					$datetime .= date("jS \of F Y", $dtgrc);
				}
				//END  verify if post is has update

				$lastGroupPostForm .= '
				<section class="4u">
					<div class="box" style="height: 300px; padding: 5px; border-radius: 5px;">
							<div style="height: 250px; overflow: hidden">
								<a href="post.php?id='.$row['id'].'" style="color: #000; text-decoration:none;">
									<div style="width: 75%; height: 60%; margin:auto; display:flex; justify-content: center;">
										<img src="'.$row['image_url'].'" style="height:100%;" >
									</div>
								</a>
								<p style="text-align:center; font-size: 20px">'.$row['title'].'</p>
								<p>'.$row['subtitle'].'</p>
							</div>
							<a href="post.php?id='.$row['id'].'&important" class="button" style="margin-right:0; padding:2px 5px; float: right;">Mai multe</a>
							<p style="padding-top: 10px;">' . $datetime . '</p>
					</div>
				</section>';
			}//end while
		}//end if

		if (!empty($lastGroupPostForm)) {
			$secTit = 'ULTIMILE STIRI DIN GRUPA : '.$titleLP['name'];
		}else{
			$secTit= '';
		}
	}
	$con->close();
	//END logic for FEUTERED  

 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include "components/head.php"; ?>
	</head>
	<body class="right-sidebar" onload="changeColor()">
	<?php 
		session_start();
		if(!empty($_SESSION['auth'])){
		// authorization how administrator
			print '
				<div class="row">
					<div style="float:left; margin: 30px 0 0 30px;">
						<p class="tel" style="padding-left: 20px; font-size: 25px; margin-bottom: 0;">(+373) 247 2 24 40</p>
					</div>
					<div style="float:right; margin-right:20px;">
						<a href="admin.php" class="button">ADMIN</a>
						<a href="logout.php" class="button">LOG OUT</a>
					 </div>
				</div>';
		}else{
		// authorization how guest
			print '
				<div class="row">
					<div style="float:left; margin: 30px 0 0 30px;">
							<p class="tel" style="padding-left: 20px; font-size: 25px; margin-bottom: 0;">(+373) 247 2 24 40</p>
					</div>
					<div style="float:right; margin-right: 20px;">
							<a href="auth.php" class="button">LOG IN</a>
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
				<p style="text-align:center; color:#fff; font-size:35px; line-height: 2rem;"><?php print $secTit;?></p>
				<div class="row">
				<!-- last posts from group -->
					<?php print $lastGroupPostForm;?>
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
	<script type="text/javascript" src="js/groups.js"></script>
</html>