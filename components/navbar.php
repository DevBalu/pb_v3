<div id="header" style="background: #f7f7f7;">
		<div class="container" style=" padding: 0 0; background: #f7f7f7; border-bottom: 1px solid #9c9898;">
			<div class="row" style="margin-bottom: 0;">
				<!-- Nav -->
				<?php $language = $_GET['language']; ?>
				<nav id="nav" class="col m12" style="background: #f7f7f7; !important; box-shadow:none; display:flex; align-items: center;">
					<ul style="width: 100%;">
						<li><a href="index.php?language=<?php print $language;?>">ACASA</a></li>
						<li><a href="#">CONTACTE</a></li>
						<li class="col m4" style="color: #000; padding-top: 5px;">
							<form action="search.php?language=<?php print $language;?>" method="POST">
								<div class="row" style="border: 1px solid #ddd; margin: 0 0 0 5px; ">
									<div class="input-field col m10" style="margin-top: 3px; height: 32px; overflow: hidden; padding: 0 5px;">
										<input id="input_text" name="tags" type="text" placeholder="CAUTARE" style="margin: 0; padding: 0;">
									</div>
									<div class="col m2" style="margin: 0; padding: 0; height: 100%;">
										<button class="waves-effect waves-light btn" type="submit" style="margin: 0; padding: 0; width: 100%; height: 100%;background-color: rgba(148, 148, 148, 0.63); font-size: 25px;">></button>
									</div>
								</div>
							</form>
						</li>
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