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
				<li style="background: rgba(255, 255, 255, 0.77);">
					' . $datetimelp . '
					<div style="height: 135px; overflow: hidden;">
						<a href="post.php?id=' . $row->id . '&language=' . $language .'">' .
							$imageteg . '
							<p style="margin-bottom: 0.3rem;">'. $row->title.'</p>
							<p style="margin-bottom: 0.3rem;">'. $row->subtitle.'</p>
							<p style="margin-bottom: 0.3rem;">'. $row->content.'</p>
						</a>
					</div>
				</li>
			';
		}
		$result->close();
	}
	// END last 5 posts

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
		}
	?>


	<!-- bar -->
		<?php include "components/littlemenu.php"; ?>
	<!-- END bar -->

	<!-- Banner -->
		<?php include "components/banner.php"; ?>
	<!-- END Banner -->

	<!-- Header -->
		<?php include "components/navbar.php"; ?>
	<!-- END Header -->

	<!-- Page -->
		<div id="page">
			<!-- Main -->
			<div id="main" class="container indexsidebar" style="border-bottom: 1px solid #9c9898;">
				<div class="row" style="margin-right: auto;">
					<div class="col s12 m3 l3">
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
															<div class="collapsible-header" style="padding: 0rem 0rem 0rem 2rem; background: rgba(255, 255, 255, 0.77);"><p style="margin: 0; padding: 10px 0 10px 0px;line-height: 26px;">' . $posts['name'] . '</p></div>
															<div class="collapsible-body" style="padding: 10px 0px 10px 60px;">
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
												<li style="margin-bottom: 10px;">
													<div class="collapsible-header" style="background: rgba(255, 255, 255, 0.77);"><p style="margin: 0; padding: 0; ">' .$gr_name . '</p></div>
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
					<div class="col s12 m9 l9">
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

	<!-- Featured -->
	<!-- 	<div id="featured">
			<div class="container" style="height: 400px;">
				<p style="text-align:center; color:#fff; font-size:35px; line-height: 2rem;">ULTIMILE STIRI IMPORTANTE</p>
				<div class="row">
				</div>
			</div>
		</div> -->
	<!-- END Featured -->

	<!-- Footer -->
		<?php //include "components/footer.php"; ?>
	<!-- /Footer -->

	<!-- Copyright -->
		<?php include "components/copyright.php"; ?>
	<!-- /Copyright -->
	</body>
</html>