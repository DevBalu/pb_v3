<?php 
	include "connect.php";

	$names_querys = array(
			"audiereacetatenilor" => "Audierea cetățenilor",
			"autcert" => "Autorizații și certificate",
			"bensoc" => "Beneficii sociale și ajutoare",
			"busantr" => "Business și antreprenoriat",
			"ects" => "Educație, cultură, turism și sport",
			"impcet" => "Implicarea cetățenilor",
			"imptax" => "Impozite și taxe locale",
			"moddeacte" => "Modele de acte / formulare"
		);

	foreach ($names_querys as $key => $value) {
		?>
		<section class="sidebar 3u">
			<header>
				<h2><?php echo $value; ?></h2>
			</header>
				<ul class="style1">
					<?php 
						$res = $con->query("select * from $key");
						if ($res == true) {
							$results = [];

							while ($res1 = $res->fetch_assoc()){
								$results[] = $res1;
							}

							for ($i=0; $i < sizeof($results); $i++) {
								?>

								<li><a href="singlepost.php?id=<?php echo $results[$i]['id']; ?>"><?php echo $results[$i]['title']; ?></a></li>
								<?php 
							}

						}
					?>
					
				</ul>
		</section>
<?php 		
	}

	$con->close();

 ?>
