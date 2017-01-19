<?php 
	// last  5 posts
	include "php/connect.php";

	$language_query = mysqli_query($con, "SELECT prefix FROM languages WHERE is_default = 1");
	$language = $language_query->fetch_object();
	$language = $language->prefix;

	if (empty($_GET['language'])) {
		header('Location: /pb/index.php?language=' . $language);
	}

	$result = mysqli_query($con, "
		SELECT p.* FROM posts p
		ORDER BY id DESC
		LIMIT 5
		");

	if ($result) {
		$image = '';
		while ($row = $result->fetch_object()) {
			$img = $row->image_url;
			if(!empty($img)){
				$imageteg = '<img src="'. $img .'" style="max-height: 128px;">';
			}else{
				$imageteg = '';
			}

			$datetimelp = '';
			$dtlfpc = $row->created;
			$dtlfpup = $row->updated;
			if(isset($dtlfpup)){
				$datetimelp .= date("l j.m / h:i", $dtlfpup);
			}else{
				$datetimelp .= date("l j.m / h:i", $dtlfpc);
			}

			$image .= '
				<li>
					' . $datetimelp . '
					<div>
						<a href="post.php?id=' . $row->id .'">' .
							$imageteg . '
						<p style="margin-bottom: 0.3rem;">'. $row->title.'</p>
						</a>
					</div>
				</li>
			';
		}
		$result->close();
	}
	// END last 5 posts

	// last 3 posts important
	$resultimp = mysqli_query($con, "
		SELECT p.* FROM posts p
		WHERE important = 1
		ORDER BY id DESC
		LIMIT 3
		");

	$posimp = '';
	if ($resultimp) {
		while ($row = $resultimp->fetch_object()) {
			$img = $row->image_url;
			if(!empty($img)){
				$imageteg = '<img src="'. $img .'" style="height:100%;">';
			}else{
				$imageteg = '';
			}
			$dtimpc = $row->created;
			$dtimpup = $row->updated;
			$datetime = '';
			if(isset($dtimpup)){
				$datetime .= date("jS \of F Y", $dtimpup);
			}else{
				$datetime .= date("jS \of F Y", $dtimpc) ;
			}
			$posimp .= '
				<section class="4u">
					<div class="box" style="height: 300px; padding: 5px; border-radius: 5px;">
						<div style="height: 250px; overflow: hidden; border-bottom: 1px solid #ddd;">
							<a href="post.php?id=' . $row->id .'" style="color: #000; text-decoration:none;">
								<div style="width: 75%; height: 60%; margin:auto; display:flex; justify-content: center;"> 
										' . $imageteg. '
								</div>
							</a>
							<p style="text-align:center; font-size: 20px">'.$row->title.'</p>
							<p>'.$row->subtitle.'</p>
						</div>
						<a href="post.php?id=' . $row->id . '&important" class="button" style="margin-right:0; padding:2px 5px; float: right;">Mai multe</a>
						<p style="padding-top: 10px;">' . $datetime . '</p>
					</div>
				</section>
			';
		}
		$resultimp->close();
	}
	$con->close();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include "components/head.php"; ?>
	</head>
	<body class="homepage">
	<?php 
		session_start();
		// authorization how administrator
		if(!empty($_SESSION['auth'])){
		print '
			<div class="row">
				<div style="float:left; margin: 30px 0 0 30px;">
					<p class="tel" style="padding-left: 20px; font-size: 25px; margin-bottom: 0;">(+373) 247 2 24 40</p>
				</div>

				<div style="float:right; margin-right:20px;">
					<a href="admin.php" class="button">ADMIN</a>
					<a href="logout.php" class="button">LOG OUT</a>
				</div>

				<div id="search" style="padding-left: 0;">
					<form action="search.php" method="POST">
						<div>
							<input name="search" type="text" placeholder="CAUTARE"><br>
						</div>
						<button class="cbut"></button>
					</form>
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

					<div id="search" style="padding-left: 0;">
						<form action="search.php" method="POST">
							<div>
								<input name="search" type="text" placeholder="CAUTARE"><br>
							</div>
							<button class="cbut"></button>
						</form>
					</div>
				
				</div>';
		}
	?>

	<!-- Header -->
		<?php include "components/navbar.php"; ?>
	<!-- END Header -->

	<!-- Banner -->
		<?php include "components/banner.php"; ?>
	<!-- END Banner -->

	<!-- Page -->
		<div id="page">


			<!-- Main -->
			<div id="main" class="container indexsidebar">
				<div class="row">
				<!-- info section -->
					<!-- section important post  -->
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
							$img = $row->image_url;
							if(!empty($img)){
								$imageteg = '<img src="'. $img .'"  style="width: 100%;">';
							}else{
								$imageteg = '';
							}
									?>
									<header>
										<h2 style="text-align:center; margin-top: 5px;"><?php print $row->title ?></h2>
										<span class="byline" style="text-align:center;"><?php print $row->subtitle ?></span>
									<div style="width: 60%; margin:auto;">
										<?php print $imageteg;?>
									</div>
									</header>
									<p><?php print $row->content ?></p>
								<!-- divider -->
								<div class="divider" style="width: 100%; border-bottom: 1px solid #ddd; margin: 20px 0px;"></div>
								<!--  /divider -->
									<?php  
										print '<a class="button" style="float:right;" href="post.php?id=' . $row->id .'">Mai multe</a>';
										//date/time created
										$dtc = $row->created;
										$dtup = $row->updated;
										if(isset($dtup)){
											print '<p style="padding-top: 10px;">' . date("l jS \of F Y h:i:s A", $dtup) . ' </p>';
										}else{
											print '<p style="padding-top: 10px;">' . date("l jS \of F Y h:i:s A", $dtc) . ' </p>';
										}
										//END date/time created
									?>

						</section>
								<?php
								;}
							$resimp->close();
						} ?>
					</div>
					<!-- END section important post  -->

					<!-- section last post -->
					<div class="3u">
						<section class="sidebar">
							<header>
								<h2>ultimile știri</h2>
							</header>
							<ul class="style2">
							<?php print $image; ?>
							</ul>
						</section>
					</div>
					<!-- END section last post -->
					
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
			<!-- END Main -->

		</div>
	<!-- END Pge -->

	<!-- Featured -->
		<div id="featured">
			<div class="container">
				<p style="text-align:center; color:#fff; font-size:35px; line-height: 2rem;">ULTIMILE STIRI IMPORTANTE</p>
				<div class="row">
				<?php print $posimp; ?>
				</div>
			</div>
		</div>
	<!-- END Featured -->

	<!-- Footer -->
		<?php include "components/footer.php"; ?>
	<!-- /Footer -->

	<!-- Copyright -->
		<?php include "components/copyright.php"; ?>
	<!-- /Copyright -->
	</body>
</html>