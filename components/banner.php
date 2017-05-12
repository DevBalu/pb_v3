<!-- 
	Do not forget to put in font of word image "/"
 -->
<?php $sl1 = /*$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].*/"images/slshow/1.jpg"; ?>
<?php $sl2 = /*$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].*/"images/slshow/1.jpg"; ?>
<?php $sl3 = /*$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].*/"images/slshow/2.jpg"; ?>

<div class="banner" style="width: 100%; padding-top: 115px; background: url('images/bg.png');">
	<div class="container">
		<div id="slide_wrapper" style="height: 347px;overflow: hidden;">
			<div><img src="<?php print $sl1;?>"></div>
			<div><img src="<?php print $sl2;?>"></div>
			<div><img src="<?php print $sl3;?>"></div> 
		</div>
	</div>
</div>