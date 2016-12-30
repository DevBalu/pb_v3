	<!-- Featured -->
		<div id="featured">
			<div class="container">
				<p style="text-align:center; color:#fff; font-size:35px;">ULTIMILE STIRI IMPORTANTE</p>
				<div class="row">
				<?php 
						include "../php/connect.php";

						$resultimp = mysqli_query($con, "
							SELECT p.* FROM posts p
							WHERE important = 1
							ORDER BY id DESC
							LIMIT 3
							");

						if ($resultimp) {
							while ($row = $resultimp->fetch_object()) {
								$row->id = -1;
								print '
									<section class="4u">
										<div class="box">
											<a href="/pb/post.php?id=' . $row->id .'">
												<img src="images/children.jpg" width="50%">
											</a>
											<h3>'.$row->title.'</h3>
											<p>'.$row->subtitle.'</p>
											<a href="/pb/post.php?id=' . $row->id . '" class="button">More</a>
										</div>
									</section>
								';
							}
							$resultimp->close();
						}

				 ?>
				</div>
				<!-- <div class="divider"></div> -->
			</div>
		</div>
	<!-- /Featured -->