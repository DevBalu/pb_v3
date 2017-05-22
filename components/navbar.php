<?php 
		include "php/connect.php";

		$language = $_GET['language'];
		if (strlen($language) > 2) {
			$language = '';
		}
?>
<div id="header" style="">
		<div class="container" style=" ">
			<div class="row" style="margin-bottom: 0;">
				<!-- Nav -->
				<nav id="nav" class="col m12" style="">
					<ul style="">
						<li><a href="index.php?language=<?php print $language;?>"><?php print $acasa; ?></a></li>

						<li>
							<!-- Dropdown Trigger -->
							<a class='dropdown-button btn contacte' href='#' data-activates='dropdown1' style="background: none; box-shadow:none;margin: 0 0 0 0.7em;padding: 0.5em 0.2em; min-width: 120px;"><?php print $contacte; ?></a>
							<!-- Dropdown Structure -->
							<ul id='dropdown1' class='dropdown-content'>
								<?php //print $contacts; ?>
								<li><a href="/post.php?id=70&language=<?php print $language;?>"><?php print $email; ?></a></li>
								<li><a href="/post.php?id=71&language=<?php print $language;?>"><?php print $tel; ?></a></li>
								<li><a href="/post.php?id=74&language=<?php print $language;?>"><?php print $address; ?></a></li>
								<li><a href="/index.php?#map"><?php print $harta; ?></a></li>
							</ul>
						</li>

						<li class="col m5" style="color: #000; padding-top: 5px;">
							<div class="row" style="background: #fff; margin-bottom: 0;">
								<form style="padding-left: 0 !important;" action="search.php?language=<?php print $language;?>" method="POST">
									<div class="input-field col m10" style="overflow: hidden;">
										<input id="input_text" name="tags" type="text" placeholder="<?php print $cautare;?>" style="">
									</div>

									<div class="col m2">
										<button class="waves-effect waves-light btn" type="submit"><i class="tiny material-icons">search</i></button>
									</div>
								</form>
							</div>
						</li>

					</ul>
				</nav><!-- END nav -->
			</div><!-- END row -->
		</div><!-- END container -->
		<style>
			#header {
				background: url('images/bg.png'); border-bottom: 1px solid #9c9898;
			}
			#header .container{
				padding: 0 0; background: #f7f7f7;
			}
			#nav {
				background: url('images/bg.png'); box-shadow:none; display:flex; align-items: center;
			}
			#nav ul {
				/*width: 100%;*/
			}
			#input_text {
				margin: 0; padding: 0;
				padding-left: 0px;
			}

		</style>

</div><!-- END header -->