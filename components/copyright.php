<?php
	switch ($_GET['language']) {
	case "ru":
		$dev = "Разработано";
		$pers = "Пержу Вячеслав, Генов Андрей";
		break;
	case "ro":
		$dev = "Elaborat de";
		$pers = "Perju Veaceslav, Ghenov Andrei";
		break;
	case "en":
		$dev = "Developed by";
		$pers = "Perju Veaceslav, Ghenov Andrei";
		break;
}
?>
<!-- Copyright -->
<div id="copyright" >
	<div class="container">
		<?php print $dev;?> : <p style="margin-bottom: 0;"><?php print $pers;?></p>
		<p style="margin-bottom: 0;">2017</p>
	</div>
</div>
<!-- /Copyright -->