$(document).ready(function() {
	$('select').material_select();
	$('.collapsible').collapsible();
	$('.carousel.carousel-slider').carousel({fullWidth: true});

	$('select[name="group"]').change(function() {
		insertParam('group', $(this).val());
	});

	$(".secbottom").click(function (e){
		e.preventDefault();
		alert("clicked");
	});

	// slider
	$("#slide_wrapper > div:gt(0)").hide();

	setInterval(function() {
		$('#slide_wrapper > div:first')
		.fadeOut(1000)
		.next()
		.fadeIn(1000)
		.end()
		.appendTo('#slide_wrapper');
	}, 10000);
	// END slider

	// btn auth
	if ($(window).width() < 960) {
		$("#auth_btn")
		.prop({
			style: "display: none !important;"
		});
	}
	// END btn auth

	//after scroll show never menu
	setInterval(function() {
		$(window).scroll(function(){
			if($(window).scrollTop() > 200){
				$("#logo").attr("class", "col l2")
			}else{
				$("#logo").attr("class", "col l3")
			}
		});
	}, 1000);
	//END after scroll show never menu
})

function insertParam(key, value) {
	key = escape(key); value = escape(value);

	var kvp = document.location.search.substr(1).split('&');
	if (kvp == '') {
		document.location.search = '?' + key + '=' + value;
	} else {

		var i = kvp.length; var x; while (i--) {
			x = kvp[i].split('=');

			if (x[0] == key) {
				x[1] = value;
				kvp[i] = x.join('=');
				break;
			}
		}

		if (i < 0) { kvp[kvp.length] = [key, value].join('='); }

		//this will reload the page, it's likely better to store this until finished
		document.location.search = kvp.join('&');
	}
}



