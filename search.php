<?php 
	// last  5 posts
	include "php/connect.php";

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
					<form action="php/search.php" method="POST">
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
						<form action="php/search.php" method="POST">
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

	<!-- Page -->
		<div id="page">

			<!-- Main -->
			<div id="main" class="container indexsidebar">
				<div class="row">
				<!-- info section -->
					<!-- section important post  -->
					<div class="9u">
						<section style="margin-bottom: 0px;">
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
									<header style="margin-bottom: 5px;">
										<a href="post.php?id=<?php $row->id?> ">
											<h2 style="margin-top: 5px; text-transform: none; text-decoration: none !important;"><?php print $row->title ?></h2>
											<span class="byline" style="font-size: 15px;"><?php print $row->subtitle ?></span>
										</a>
									</header>
									<p style="height: 70px; overflow: hidden; margin-bottom: 0;"><?php print $row->content ?></p>
									<?php  
										//date/time created
										$dtc = $row->created;
										$dtup = $row->updated;
										if(isset($dtup)){
											print '<p style="padding-top: 5px; float: right;">' . date("l jS \of F Y h:i:s A", $dtup) . ' </p>';
										}else{
											print '<p style="padding-top: 5px; float: right;">' . date("l jS \of F Y h:i:s A", $dtc) . ' </p>';
										}
										//END date/time created
									?>

						</section>
								<?php
								;}
							$resimp->close();
						} ?>
								<!-- divider -->
								<div class="divider" style="width: 100%; border-bottom: 1px solid #ddd; margin: 2px 0px;"></div>
								<!--  /divider -->
					</div>
					<!-- END section important post  -->

					<!-- section last post -->
					<div class="3u" >
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
			</div>
			<!-- END Main -->

		</div>
	<!-- END Pge -->
	
	<!-- Copyright -->
		<?php include "components/copyright.php"; ?>
	<!-- /Copyright -->
	</body>
</html>