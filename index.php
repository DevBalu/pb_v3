<?php 
	// last  5 posts
	include "php/connect.php";

	$language_query = mysqli_query($con, "SELECT prefix FROM languages WHERE is_default = 1");
	$language = $language_query->fetch_object();
	$language = $language->prefix;
	
	$implanguage = $_GET['language'];
	if (strlen($implanguage) > 2) {
		$implanguage = '';
	}

	if (empty($_GET['language'])) {
		header('Location: /pb/index.php?language=' . $language);
	}

	$result = mysqli_query($con, "
		SELECT p.* FROM posts p
		JOIN groups g on g.language = '$implanguage'
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
				$datetimelp .= date("Y-m-d / h:i:s", $dtlfpup);
			}else{
				$datetimelp .= date("Y-m-d / h:i:s", $dtlfpc);
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
		JOIN groups g on g.language = '$implanguage'
		WHERE p.id_group = g.id and p.important = 1
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
				$datetime .= date("Y-m-d / h:i:s", $dtimpup);
			}else{
				$datetime .= date("Y-m-d / h:i:s", $dtimpc) ;
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

				<!--<div id="search" style="padding-left: 0;">
					<form action="search.php" method="POST">
						<div>
							<input name="search" type="text" placeholder="CAUTARE"><br>
						</div>
						<button class="cbut"></button>
					</form>
				</div>-->

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

					<!--<div id="search" style="padding-left: 0;">
						<form action="search.php" method="POST">
							<div>
								<input name="search" type="text" placeholder="CAUTARE"><br>
							</div>
							<button class="cbut"></button>
						</form>
					</div>-->
				
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
					<div class="3u">
						<?php
								// get languaage page
								$language = $_GET['language'];
								if (strlen($language) > 2) {
									$language = '';
								}
								//query groups 
								$resultgroup = mysqli_query($con, "SELECT g.* FROM groups g WHERE g.language = '$language'");

								$menuallres = '';
								//show content query result groups
								if ($resultgroup) {
									while ($row = $resultgroup->fetch_object()) {
											$id_group = $row->id;
											$gr_name = $row->name;
											// query categories and post 
											$resultcat = mysqli_query($con, "
												SELECT c.name, c.id category_id, p.title, p.id post_id FROM categories c
												LEFT JOIN posts p ON p.id_category = c.id
												WHERE c.id_group = '$id_group'
											");
											//array that contains category post
											$categories_posts = array();
											//filtering query resultcat content 
											if ($resultcat) {
												while ($row = $resultcat->fetch_object()) {
													$categories_posts[$row->category_id]['name'] = $row->name;
													$categories_posts[$row->category_id]['posts'][] = array('post_id' => $row->post_id, 'title' => $row->title);
												}
											}
											// work with category & post
											$rescatpos = '';
											foreach ($categories_posts as $posts) {
												$postname = '';
												foreach ($posts['posts'] as $post) {
												$rescatpos .= '
													<ul class="collapsible" data-collapsible="expandable" style="margin: 0;">
														<li>
															<div class="collapsible-header" style="padding: 0rem 0rem 0rem 4rem;"><p style="margin: 0; padding: 0 0 0 10px;line-height: 26px;">' . $posts['name'] . '</p></div>
															<div class="collapsible-body" style="padding: 0 0 0 70px;">
																<span>
																	<a href="post.php?id=' . $post['post_id'] . '">' . $post['title'] . '</a>
																</span>
																<br>
															</div>
														</li>
													</ul>';
												}
											}
										//finaly form group / category / posts
										$menuallres .= '
											<ul class="collapsible" data-collapsible="expandable" style="margin: 0;">
												<li>
													<div class="collapsible-header"><p style="margin: 0; padding: 0;">' .$gr_name . '</p></div>
													<div class="collapsible-body">' . $rescatpos . '</div>
												</li>
											</ul>
										';
									}
								}
// print '<pre>';
print_r($menuallres);
// print '</pre>';
							// $result->close();
						?>
					</div>

					<!-- section last post -->
					<div class="9u">
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