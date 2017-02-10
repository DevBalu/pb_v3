<?php 
		include "php/connect.php";

		$language = $_GET['language'];
		if (strlen($language) > 2) {
			$language = '';
		}
		$result = mysqli_query($con, "
			SELECT p.* FROM posts p
			JOIN categories c ON c.name = 'Contacte'
			WHERE p.id_category = c.id
		");
		$contacts = '';
		if ($result) {
			while ($row = $result->fetch_object()) {
				$contacts .= '<li><a href="post.php?id=' . $row->id . '&language=' . $language . '">'. $row->title .'</a></li>';
			}
			$result->close();
		} 
?>
<div id="header" style="background: url('images/bg.png');">
		<div class="container" style=" padding: 0 0; background: #f7f7f7; border-bottom: 1px solid #9c9898;">
			<div class="row" style="margin-bottom: 0;">
				<!-- Nav -->
				<nav id="nav" class="col m12" style="background: url('images/bg.png'); box-shadow:none; display:flex; align-items: center;">
					<ul style="width: 100%;">
						<li><a href="index.php?language=<?php print $language;?>"><?php print $acasa; ?></a></li>

						<li>
							<!-- Dropdown Trigger -->
							<a class='dropdown-button btn' href='#' data-activates='dropdown1' style="background: none; box-shadow:none;margin: 0 0 0 0.7em;padding: 0.5em 0.2em;"><?php print $contacte; ?></a>
							<!-- Dropdown Structure -->
							<ul id='dropdown1' class='dropdown-content'>
								<?php print $contacts; ?>
								<li><a href="/pb/index.php?#map"><?php print $harta; ?></a></li>
							</ul>
						</li>

						<li class="col m4" style="color: #000; padding-top: 5px;">
							<form action="search.php?language=<?php print $language;?>" method="POST">
								<div class="row" style="border: 1px solid #ddd; margin: 0 0 0 5px; background: #fff;">
									<div class="input-field col m10" style="margin-top: 3px; height: 32px; overflow: hidden; padding: 0 5px;">
										<input id="input_text" name="tags" type="text" placeholder="<?php print $cautare;?>" style="margin: 0; padding: 0;">
									</div>

									<div class="col m2" style="margin: 0; padding: 0; height: 100%;">
										<button class="waves-effect waves-light btn" type="submit" style="margin: 0; padding: 0; width: 100%; height: 100%;background-color: rgba(148, 148, 148, 0.63); font-size: 25px;"><i class="tiny material-icons" style="height: 37px;line-height: 39px;">search</i></button>
									</div>
								</div>
							</form>
						</li>

					</ul>
				</nav>
			</div>
		</div>

	<!-- </div> -->
</div>