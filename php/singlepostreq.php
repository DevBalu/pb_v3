<?php 
	include "connect.php";
	$id = $_GET['id'];

	$sdb = "SELECT * FROM audiereacetatenilor UNION SELECT * FROM autcert UNION SELECT * FROM bensoc UNION SELECT * FROM busantr UNION SELECT * FROM ects UNION SELECT * FROM impcet UNION SELECT * FROM imptax UNION SELECT * FROM moddeacte UNION SELECT * FROM consloc UNION SELECT * FROM comspec UNION SELECT * FROM spp WHERE id=".$id;
	$req = $con->query($sdb);
			

	if ($req == true) {
		$results = [];

		while ($res1 = $req->fetch_assoc()){
			$results[] = $res1;
		}
		echo $results[0]['id'];
	}else{
		echo $con->error;
	}
	$con->close();
 ?>