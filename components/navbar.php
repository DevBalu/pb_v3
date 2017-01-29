<div id="header" style="background: #f7f7f7;">
		<div class="container" style=" padding: 0 0; background: #f7f7f7; border-bottom: 1px solid #9c9898;">
			<div class="row" style="margin-bottom: 0;">
				<!-- Nav -->
				<?php $language = $_GET['language']; ?>
				<nav id="nav" class="col s12 s5 m7 offset-m1" style="background: #f7f7f7; !important; box-shadow:none; display:flex; align-items: center;">
					<ul>
						<li><a href="index.php?language=<?php print $language;?>">ACASA</a></li>
						<li><a href="search.php">CAUTARE</a></li>
						<li><a href="search.php">CONTACTE</a></li>
					<?php 
						include "php/connect.php";

						if (strlen($language) > 2) {
							$language = '';
						}
						$result = mysqli_query($con, "SELECT c.* FROM categories c WHERE g.language = '$language' AND c.name = 'contacte' ");
						if ($result) {
							while ($row = $result->fetch_object()) {
								print '<li>
											<a href="group.php?id=' . $row->id .'">'. $row->name .'</a>
											<a href="group.php?id=' . $row->id .'">'. $row->name .'</a>
										</li>';
							}
							$result->close();
						}
					?>
					</ul>
				</nav>
			</div>
		</div>

	<!-- </div> -->
</div>