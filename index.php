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
		$server = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].'/index.php?language=' . $language;
		// header('Location: ' . $server);
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
				<li style="background: rgba(255, 255, 255, 0.31);box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);">
					' . $datetimelp . '
					<div style="height: 135px; overflow: hidden;">
						<a href="post.php?id=' . $row->id . '&language=' . $implanguage .'" style="font-size: 17px;font-weight: 300;">' .
							$imageteg . '
							<p style="margin-bottom: 0.3rem;">'. $row->title.'</p>
							<p style="margin-bottom: 0.3rem;">'. $row->subtitle.'</p>
							<p style="margin-bottom: 0.3rem; font-size: 16px;">'. $row->content.'</p>
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
	<!-- btn-to-top -->
		<div id="btn-to-top"></div>
	<!-- END btn-to-top -->

	<!-- Banner -->
		<?php include "components/banner.php"; ?>
	<!-- END Banner -->

	<!-- Header -->
		<?php include "components/navbar.php"; ?>
	<!-- END Header -->

	<!-- Page -->
		<div id="page">
			<!-- Main -->
			<div id="main" class="container indexsidebar">
				<div class="row" style="margin-bottom: 0px; border-bottom: 1px solid #9c9898;">
					<div class="col s12 m3 l3">
						<?php
								// get languaage page
								$language = $_GET['language'];
								if (strlen($language) > 2) {
									$language = '';
								}
								//query groups 
								$resultgroup = mysqli_query($con, "SELECT g.* FROM groups g WHERE g.language = '$language' ORDER BY id ASC");

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
												$postitle = '';
												foreach ($posts['posts'] as $post) {
													$postitle .= '<a href="post.php?id=' . $post['post_id']. '&language=' . $implanguage . '" style="color:red;font-size: 16px;">' . $post['title'] . '</a><div class="divider" style="width: 100%; border-bottom: 1px solid #ddd; margin: 2px 0px;"></div>';
												}
												$rescatpos .= '
													<ul class="collapsible" data-collapsible="expandable" style="margin: 0;">
														<li>
															<div class="collapsible-header"><p style="margin: 0; padding: 10px 0 10px 0px;line-height: 26px; color: #2F4F4F;font-size: 18px;s"><span style="font-size: 25px;">\ </span>' . $posts['name'] . '</p></div>
															<div class="collapsible-body" style="padding: 10px 0px 10px 60px;">
																<span>
																	'. $postitle .'
																</span>
															</div>
														</li>
													</ul>';

											}

										// finaly form group / category / posts
										$menuallres .= '
											<ul class="collapsible" data-collapsible="expandable">
												<li>
													<div class="collapsible-header"><p>' .$gr_name . '</p></div>
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
						<section class="sidebar" style="width: 100%;">
							<ul class="style2">
							<?php print $image; ?>
							</ul>
						</section>
					</div>
					<!-- END section last post -->

			</div>
			<!-- END row -->
			<!-- map -->
			<div class="row">
				<div class="col m5 s6 padd-none">
					<div id="map" style=""></div>
					<script>
						function initMap() {
							var uluru = {lat: 48.364373, lng: 27.074627};
							var map = new google.maps.Map(document.getElementById('map'), {
								zoom: 9,
								center: uluru
							});
							var marker = new google.maps.Marker({
								position: uluru,
							 	map: map
							});
						}
					</script>
					<script async defer
						src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEGHul3kUlgGuBrr5MMJRPcSg2WvsNxJg&callback=initMap">
					</script>
				</div>

				<div class="col l3 s12 padd-none">
					<section style="font-size: 17px;">
						<h2 style="text-align: center; font-weight: 500;"><?php print $contacte; ?></h2>
						<ul class="default">
							<li>
								<h3><?php print $email; ?></h3><br>
								<p>infobriceni@gmail.com</p>
							</li>
							<li>
								<h3><?php print $ap; ?></h3><br>
								<p>(+373) 247 2 24 40</p>
							</li>
							<li>
								<h3><?php print $fax; ?></h3><br>
								<p>(+373) 247 2 21 95</p>
							</li>
						</ul>
				</div>
				<div class="col l4 s12 padd-none">
					<h2>Scrieți-ne un mesaj</h2>
					<form id="am" class="message"  action="php/messagereq.php" method="POST"><!--access message-->
						<div>
							<input name="fname" type="text" placeholder="Nume"><br>
							<input name="lname" type="text" placeholder="Prenume"><br>
							<input name="email" type="text" placeholder="Email"><br>
							<textarea name="message" placeholder="Mesaj"></textarea>
							<button class="btn" type="submit">TRIMITE</button>
						</div>
					</form>
				</div>
			</div>
			<!-- END map -->
		</div>
		<!-- END Main -->

		<div class="divider"></div>

		<!-- useful links -->
		<div id="useful_links">
			<div class="container">
				<div class="row">
					<div class="col l2 s2 padd-none">
						<a href="http://presedinte.md/">
							<img src="images/ban_presedinte_md.jpg">
						</a>
					</div>
					<div class="col l2 s2 padd-none">
						<a href="http://parlament.md/">
							<img src="images/ban_parlament_md.jpg">
						</a>
					</div>
					<div class="col l2 s2 padd-none">
						<a href="http://gov.md/">
							<img src="images/ban_guvern_md.jpg">
						</a>
					</div>
					<div class="col l2 s2 padd-none">
						<a href="http://www.moldova.md/">
							<img src="images/ban_moldova_md.jpg">
						</a>
					</div>
					<div class="col l2 s2 padd-none">
						<a href="/images/uploade/energie-electrica-atentie.pdf">
							<img src="images/energie-util.jpg">
						</a>
					</div>
					<div class="col l2 s2 padd-none	reg_actelor">
						<a href="http://businessportal.md/ro/">
							<img src="images/bussines_portal.png">
						</a>
					</div>
				</div><!-- END row -->
			</div><!-- END container -->
		</div>
		<!-- END useful links -->

	</div>
	<!-- END Page -->

	<!-- Copyright -->
		<?php include "components/copyright.php"; ?>
	<!-- /Copyright -->
	</body>
	<style>
		/*map*/
		#map {
			width: 100%;
			height: 400px;
		}
		/*ENDmap*/
		.padd-none {
			padding: 20px 10px 10px 10px!important;
		}
		.divider {
			width: 100%;
			border-bottom: 1px solid #9c9898;
			margin: 2px 0px;
		}
		/*usefull links*/
		#useful_links {
			width: 100%;
			background: url('images/bg.png');
		}
		#useful_links .row {
			margin-bottom: 0;
		}
		/*END usefull links*/
		/*banner*/
		.banner {
			width: 100%;
			padding-top: 106px;
			background: url('images/bg.png');
		}
		#slide_wrapper {
			height: 347px;overflow: hidden;
		}
		/*END banner*/


	</style>
</html>