<?php $sl1 = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/images/slshow/sl1.JPG"; ?>
<?php $sl2 = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/images/slshow/sl2.JPG"; ?>
<?php $sl3 = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/images/slshow/sl3.JPG"; ?>
<?php $sl4 = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/images/slshow/sl4.JPG"; ?>
<div class="banner" style="width: 100%; padding-top: 77px; background: #f7f7f7;">
	<div class="container">
		<div data-flickity="{ &quot;groupCells&quot;: true, &quot;autoPlay&quot;: true}" class="carousel" style="height: 347px;">
			<div class="carousel-cell"><img src=<?php print $sl1; ?> class="carousel-cell-image"></div>
			<div class="carousel-cell"><img src=<?php print $sl2; ?> class="carousel-cell-image"></div>
			<div class="carousel-cell"><img src=<?php print $sl3; ?> class="carousel-cell-image"></div>
			<div class="carousel-cell"><img src=<?php print $sl4; ?> class="carousel-cell-image"></div>
		</div>
	</div>
</div>