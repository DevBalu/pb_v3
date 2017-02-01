<?php 
	// last  5 posts in dependence 
	include "php/connect.php";
	$language = $_GET['language'];
	$result = mysqli_query($con, "
		SELECT p.* FROM posts p
		JOIN groups g on g.language = '$language'
		WHERE p.id_group = g.id
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
						<a href="post.php?id=' . $row->id .'&language=' . $language .'">' .
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

	// Search result
	if (!empty($_POST['tags'])) {
		header('Location: /pb/search.php?language=' . $_GET['language'] . '&tags=' . $_POST['tags']);
	}

		//get value from href 
	$tags = $_GET['tags'];
		//divide word from string in array, decode %20 from url transform in space
	$tags_array = explode(' ', urldecode($tags));
	$i = 0;
	$sql = 'SELECT p.* FROM posts p WHERE p.teg';
	foreach($tags_array as $row){
		if ($i == 0) {
			$sql .= " " . "LIKE" . " " . "'%" . $row . "%'";
		}
		else {
			$sql .= " " . "OR p.teg LIKE" . " " . "'%" . '' . $row . "%'" . ' ';
		}
		$i++;
	}
		//request from table post , in order to compare filedt tags with value from input user
	$reqteg = mysqli_query($con, "$sql");
	// END Search result

 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include "components/head.php"; ?>
	</head>
	<body class="homepage" >
	<!-- bar -->
		<?php include "components/littlemenu.php"; ?>
	<!-- END bar -->

	<!-- Header -->
		<div style="padding-top: 77px;">
			<?php include "components/navbar.php"; ?>
		</div>
	<!-- END Header -->

	<!-- Page -->
		<div id="page" >
			<!-- Main -->
			<div id="main" class="container indexsidebar">
				<div class="row">
				<!-- info section -->
					<!-- section important post  -->
					<div class="col m9">
							<?php 
							if ($reqteg) {
								while ($row = $reqteg->fetch_object()) {
										?>
						<section style="margin-bottom: 0px;">
							<a href="post.php?id=<?php print $row->id?>&language=<?php print $language ?>">
										<header style="margin-bottom: 5px;">
												<h2 style="margin-top: 5px; text-transform: none; text-decoration: none !important;"><?php print $row->title ?></h2>
												<span class="byline" style="font-size: 15px;"><?php print $row->subtitle ?></span>
										</header>
										<p style="height: 70px; overflow: hidden; margin-bottom: 0;"><?php print $row->content ?></p>
										<?php  
											//date/time created
											$dtc = $row->created;
											$dtup = $row->updated;
											if(isset($dtup)){
												print '<p style="padding-top: 5px; float: right;">' . date("Y-m-d / h:i:s", $dtup) . ' </p>';
											}else{
												print '<p style="padding-top: 5px; float: right;">' . date("Y-m-d / h:i:s", $dtc) . ' </p>';
											}
											//END date/time created
										?>

							</a>
						</section>
						<!-- divider -->
						<div class="divider" style="width: 100%; border-bottom: 1px solid #ddd; margin: 20px 0px;"></div>
						<!--  /divider -->
								<?php
									;}
									$reqteg->close();
								} ?>
					</div>
					<!-- END section important post  -->

					<!-- section last post -->
					<div class="3u" >
						<section class="sidebar">
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