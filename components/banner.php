<div id="banner">
	<!-- Extra -->
	<div id="marketing" class="container">
		<div class="row">
<?php 
	include "php/connect.php";

		$result = mysqli_query($con, "SELECT g.* FROM groups g");

		if ($result) {
			while ($row = $result->fetch_object()) {
				print '<div class="box 3u">
					<div class="menu">
						<a href="/pb/group.php?id=' . $row->id .'">
							<div class="sectop">
								<img src="'. $row->thumbnail . '">
							</div>
							<div class="secbottom">
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