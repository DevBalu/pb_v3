<?php $sl1 = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/images/slshow/sl1.JPG"; ?>
<?php $sl2 = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/images/slshow/sl2.JPG"; ?>
<div class="banner" style="width: 100%; padding-top: 77px; background: rgba(221, 221, 221, 0.45);;">
	<div class="container">
		<div data-flickity="{ &quot;groupCells&quot;: true, &quot;autoPlay&quot;: true}" class="carousel" style="height: 347px;">
			<div class="carousel-cell"><img src=<?php print $sl1; ?> class="carousel-cell-image"></div>
			<div class="carousel-cell"><img src=<?php print $sl2; ?> class="carousel-cell-image"></div>
			<div class="carousel-cell"><img src=<?php print $sl1; ?> class="carousel-cell-image"></div>
			<div class="carousel-cell"><img src=<?php print $sl2; ?> class="carousel-cell-image"></div>
		</div>
	</div>
</div>