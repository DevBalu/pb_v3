<script src="js/groups.js"></script>
<div id="banner">
	<!-- Extra -->
	<div id="marketing" class="container">
		<div class="row">
<?php 
	include "php/connect.php";

	$language = $_GET['language'];
	if (strlen($language) > 2) {
		$language = '';
	}
	$result = mysqli_query($con, "SELECT g.* FROM groups g WHERE g.language = '$language'");

	if ($result) {
		while ($row = $result->fetch_object()) {
			print '<div class="box 3u">
				<div class="menu">
					<a href="group.php?id=' . $row->id .'">
						<div class="sectop">
							<img src="'. $row->thumbnail . '">
						</div>
						<div class="secbottom g'. $row->id .'" id="groupid g'. $row->id .'" onclick="getGid(this)">
							<h2>' . $row->name . '</h2>
						</div>
					</a>
				</div>
			</div>';
		}
		$result->close();
	}
?>
		</div>
	</div>

	<!-- /Extra -->
</div>