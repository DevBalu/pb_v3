// check image size in file addpost.php & editcontent.php  
var img = document.getElementById("uimage");

var errmsg = document.createElement("div");
document.getElementById("file-wrapper").appendChild(errmsg);
var validation = document.getElementById("uimager");

img.addEventListener("change", function() {
	var file = img.files;
	if (file[0].size > 5000000) {
		validation.style.borderBottom = "2px solid red";
		validation.style.boxShadow = "none";
		errmsg.setAttribute("class", "card-panel red darken-1");
		errmsg.innerHTML = '<span class="white-text" style="font-size: 20px;">Dimensiunea imaginii trebuie sa fie mai mica de 5mb.</span>';
		img.value = null;
	} else {
		validation.style.borderBottom = "2px solid #4CAF50";
		validation.style.boxShadow = "none";
		errmsg.removeAttribute("class");
		errmsg.innerHTML = '';
	}
});
// END check image size in file addpost.php & editcontent.php  