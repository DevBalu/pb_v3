<div id="header">
	<!-- <div class="container"> -->
			
			<div class="row" style="margin: 0 0 0 0;">
				<!-- Logo -->
				<div id="logo" class="col s12  s3 m3 l2 offset-s1 offset-m1 offset-l1"><a href="index.php"><img src="images/logo.jpg"></a></div>
				<!-- Nav -->
				<nav id="nav" class="col s12 s5 m7 offset-m1" style="background: #fff !important; box-shadow:none;">
					<ul>
					<?php 
						include "php/connect.php";

						$language = $_GET['language'];
						if (strlen($language) > 2) {
							$language = '';
						}
						$result = mysqli_query($con, "SELECT g.* FROM groups g WHERE g.language = '$language'");
						if ($result) {
							while ($row = $result->fetch_object()) {
								print '<li><a href="group.php?id=' . $row->id .'">'. $row->name .'</a></li>';
							}
							$result->close();
						}
					?>
						<!-- <li><p class="tel">(+373) 247 2 24 40</p></li> -->
					</ul>
				</nav>
			</div>

	<!-- </div> -->
</div>