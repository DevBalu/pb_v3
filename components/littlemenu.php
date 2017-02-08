<?php 
	if(!empty($_SESSION['auth'])){
		$indicator = '<p style="color: #000;">ADMIN</p>';
		$href = 'admin.php';
		$logout = '<a class="btn-floating btn-large waves-effect waves-light white right" href="logout.php" style="margin: 10px 10px 0 0px; box-shadow: 0 0px 2px 0 rgba(0, 0, 0, 0.11), 0 1px 0px 0 rgba(0, 0, 0, 0), 0 3px 1px -2px rgba(0, 0, 0, 0); color: #000;">Esire</a>';
	}else{
		$href = "auth.php";
		$indicator = '';
		$logout = '';
	} 
	$ru = $ro = $en = $acasa = $contacte ='';
	switch ($_GET['language']) {
	case "ru":
		$ru = "РУ";
		$ro = "РО";
		$en = "ЕН";
		$acasa = "ДОМОЙ";
		$contacte = "КОНТАКТЫ";
		$cautare = "ПОИСК";
		$harta = "КАРТА";
		$email = "МАИЛ";
		$ap  = "ЗАЛ ПРЕДДВЕРИЕ";
		$fax = "ФАКС";
		break;
	case "ro":
		$ru = "RU";
		$ro = "RO";
		$en = "EN";
		$acasa = "ACASA";
		$contacte = "CONTACTE";
		$cautare = "CAUTARE";
		$harta = "HARTA";
		$ap  = "ANTICAMERA PRIMĂRIEI";
		$email = "MAIL";
		$fax = "FAX";
		break;
	case "en":
		$ru = "RU";
		$ro = "RO";
		$en = "EN";
		$acasa = "HOME";
		$contacte = "CONTACTS";
		$harta = "MAP";
		$cautare = "SEARCH";
		$ap  = "CALL CENTER";
		$email = "MAIL :";
		$fax = "FAX :";
		break;
}
?>
<div id="littlemenu" style="position: fixed; z-index: 2000; width: 100%; background: #fff;">
		<a class="btn-floating btn-large waves-effect waves-light white left" href="<?php print $href; ?>" style="margin: 10px 0 0 10px; box-shadow: 0 0px 1px 0 rgba(0, 0, 0, 0.11), 0 1px 0px 0 rgba(0, 0, 0, 0), 0 3px 1px -2px rgba(0, 0, 0, 0); color: #fff;"><?php print $indicator;?></a>
		<?php print $logout;?>
		<div class="container" style=" padding: 5px 0; background: #fff;">
			<div class="row" style="margin-bottom: 0;">
				<!-- Logo -->
				<?php $language = $_GET['language']; ?>
				<div id="logo" class="col s12 s4 m2 "><a href="index.php?language=<?php $language;?>"><img src="images/logo.jpg"></a></div>
				<!-- Nav -->
				<nav class="col s12 s5 m2" style="background: #fff; !important; box-shadow:none; float: right; display:flex; align-items: center; ">
					<ul >
						<li style="min-width: 50px; text-align: center;"><a href="index.php?language=ro" style="color: #333 !important;"><?php print $ro; ?></a></li>
						<li style="min-width: 50px; text-align: center;"><a href="index.php?language=ru" style="color: #333 !important;"><?php print $ru; ?></a></li>
						<li style="min-width: 50px; text-align: center;"><a href="index.php?language=en" style="color: #333 !important;"><?php print $en; ?></a></li>
					</ul>
				</nav>
			</div>
		</div>

	<!-- </div> -->
</div>