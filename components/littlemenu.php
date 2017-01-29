<?php 
	if(!empty($_SESSION['auth'])){
		$indicator = '<p style="color: #000;">ADMIN</p>';
		$href = 'admin.php';
		$logout = '<a class="btn-floating btn-large waves-effect waves-light white right" href="logout.php" style="margin: 10px 10px 0 0px; box-shadow: 0 0px 2px 0 rgba(0, 0, 0, 0.11), 0 1px 0px 0 rgba(0, 0, 0, 0), 0 3px 1px -2px rgba(0, 0, 0, 0); color: #000;">Log Out</a>';
	}else{
		$href = "auth.php";
		$indicator = 'AUTH';
		$logout = '';
	} 
?>
<div id="littlemenu" style="position: fixed; z-index: 2000; width: 100%; background: #fff;">
		<a class="btn-floating btn-large waves-effect waves-light white left" href="<?php print $href; ?>" style="margin: 10px 0 0 10px; box-shadow: 0 0px 1px 0 rgba(0, 0, 0, 0.11), 0 1px 0px 0 rgba(0, 0, 0, 0), 0 3px 1px -2px rgba(0, 0, 0, 0); color: #fff;"><?php print $indicator;?></a>
		<?php print $logout;?>
		<div class="container" style=" padding: 5px 0; background: #fff;">
			<div class="row" style="margin-bottom: 0;">
				<!-- Logo -->
				<?php $language = $_GET['language']; ?>
				<div id="logo" class="col s12 s4 m6 l2 "><a href="index.php?language=<?php $language;?>"><img src="images/logo.jpg"></a></div>
				<!-- Nav -->
				<nav class="col s12 s5 m2" style="background: #fff; !important; box-shadow:none; float: right; display:flex; align-items: center; ">
					<ul >
						<li style="min-width: 50px; text-align: center;"><a href="index.php?language=ru" style="color: #333 !important;">RU</a></li>
						<li style="min-width: 50px; text-align: center;"><a href="index.php?language=ro" style="color: #333 !important;">RO</a></li>
						<li style="min-width: 50px; text-align: center;"><a href="index.php?language=en" style="color: #333 !important;">EN</a></li>
					<?php 
						include "php/connect.php";

						if (strlen($language) > 2) {
							$language = '';
						}
						$result = mysqli_query($con, "SELECT g.* FROM groups g WHERE g.language = '$language'");
						if ($result) {
							while ($row = $result->fetch_object()) {
								//print '<li><a href="group.php?id=' . $row->id .'">'. $row->name .'</a></li>';
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