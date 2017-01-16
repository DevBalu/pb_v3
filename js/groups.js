function getGid(arg) {
	var id = arg.getAttribute("id").substring(9);
	document.cookie = `gid=${id}`;
}

function changeColor() {
	var id = document.cookie[4];
	document.getElementById("groupid g"+id).style.background = "-webkit-linear-gradient(top, rgba(211,211,211,1) 1%,rgba(229,210,206,1) 2%,rgba(229,153,137,1) 38%,rgba(229,153,137,1) 68%,rgba(229,210,206,1) 95%)";
}