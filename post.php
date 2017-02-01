<?php
	session_start();
	//logic for post field
	require_once('php/connect.php');
	$language = $_GET['language'];
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$result = mysqli_query($con, "SELECT p.* FROM posts p WHERE p.id = '$id'");
	}else{
		header('Location: /pb/index.php');
	}
	$post = $result->fetch_object();
	if (!$post) {
		header('Location: /pb/index.php');
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
	<!-- bar -->
		<?php include "components/littlemenu.php"; ?>
	<!-- END bar -->

	<!-- Header -->
		<div style="padding-top: 77px;">
			<?php include "components/navbar.php"; ?>
		</div>
	<!-- END Header -->

	<!-- PAGE -->
		<div id="page">
				
			<!-- MAIN -->
			<div id="main" class="container">
				<div class="row">
					<div class="12u">
						<section>
							<header>

								<!-- date/time created/updated -->
								<?php
									$dtpc = $post->created;
									$dtpup = $post->updated;
									if(isset($dtpup)){
										print date("l jS \of F Y h:i:s A", $dtpup);
									}else{
										print date("l jS \of F Y h:i:s A", $dtpc);
									}
								?>
								<!-- END date/time created/updated -->

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
								print '<a href="editcontent.php?id_post=' . $_GET['id'] . '&language=' . $language .'" class="button" style="margin-right:0px;"">EDITEAZA</a>';
							}
						?>
					</div>

				</div>
			</div>
			<!--  /MAIN -->

		</div>
	<!--  /PAGE -->

	<!-- COPYRIGHT -->
		<div id="copyright" >
			<div class="container">
				Developer: <a href="#">DevBalu</a>
			</div>
		</div>
	<!--  /COPYRIGHT -->


	</body>
</html>