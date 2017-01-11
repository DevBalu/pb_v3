<?php 
function videoExist($id){
	$headers = get_headers('https://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $id . '&format=json');
	if(strpos($headers[0], '200')){
		return 'https://www.youtube.com/embed/'. $id;
	}
}
?>