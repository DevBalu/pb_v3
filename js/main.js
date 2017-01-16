  $(document).ready(function() {
    $('select').material_select();
    $('.collapsible').collapsible();

    $('select[name="group"]').change(function() {
        insertParam('group', $(this).val());
    });

    $(".secbottom").click(function (e){
        e.preventDefault();
        alert("clicked");
    });

  });

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

