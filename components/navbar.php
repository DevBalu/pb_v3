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
						<li class="col l1 acasa"><a href="index.php?language=<?php print $language;?>"><?php print $acasa; ?></a></li>

						<li class="col l2 contacte_wrap">
							<!-- Dropdown Trigger -->
							<a class='contacte dropdown-button' href='#' data-activates='dropdown1' ><?php print $contacte; ?></a>
							<!-- Dropdown Structure -->
							<ul id='dropdown1' class='dropdown-content'>
								<?php //print $contacts; ?>
								<li><a href="/post.php?id=70&language=<?php print $language;?>"><?php print $email; ?></a></li>
								<li><a href="/post.php?id=71&language=<?php print $language;?>"><?php print $tel; ?></a></li>
								<li><a href="/post.php?id=74&language=<?php print $language;?>"><?php print $address; ?></a></li>
								<li><a href="/index.php?#map"><?php print $harta; ?></a></li>
							</ul>
						</li>

						<li class="col l4" style="color: #000;">
							<div class="row" style="background: #fff; margin-bottom: 0;">
								<form style="padding-left: 0 !important; width: 100%;" action="search.php?language=<?php print $language;?>" method="POST">
									<div class="input-field col m10" style="overflow: hidden;">
										<input id="input_text" name="tags" type="text" placeholder="<?php print $cautare;?>" style="">
									</div>

									<div class="col m2 sb_wrap">
										<button class="sb" type="submit"><i class="tiny material-icons">search</i></button>
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
				padding: 0 0;
				background: #f7f7f7;
			}
			#nav {
				background: url('images/bg.png'); box-shadow:none; display:flex; align-items: center;
			}
			#nav ul {
				width: 100%;
			}
			.input_field {
				padding-left: 0;
				padding-right: 0;
			}
			#input_text {
				margin: 0;
				padding: 0;
				padding-left: 0px;
				height: 51px;
			}
			.contacte_wrap {
				padding: 0 !important;
			}
			.contacte {
				margin-left: 0 !important;
				text-align: center;
			}
			.acasa {
				margin-left: 0 !important;
				text-align: center;
				padding: 0 !important;
			}
			.sb_wrap {
				padding: 0 !important;
			}
			.sb {
				padding: 0;
				width: 100%;
				height: 51px;
			}
			.sb i {
				height: 100% !important;
				line-height: 26px !important;
				padding-top: 11px;
				color: #fff;
			}

		</style>

</div><!-- END header -->