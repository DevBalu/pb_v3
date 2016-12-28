<?php 
	include "connect.php";

	if ($_GET['id']) {
		$id = $_GET['id'];
		$result = mysqli_query($con, "
			SELECT c.name, c.id category_id, p.title, p.id post_id FROM categories c
			LEFT JOIN posts p ON p.id_category = c.id
			WHERE c.id_group = '$id'
		");

		$categories_posts = array();
		if ($result) {
			while ($row = $result->fetch_object()) {
				$categories_posts[$row->category_id]['name'] = $row->name;
	    		$categories_posts[$row->category_id]['posts'][] = array('post_id' => $row->post_id, 'title' => $row->title);
			}
			$result->close();
		}
	}

	foreach ($categories_posts as $posts) {
		?>
		<section class="sidebar 3u">
			<header>
				<h2><?php echo $posts['name']; ?></h2>
			</header>
				<ul class="style1">
					<?php 
						foreach ($posts['posts'] as $post) {
							print '<li><a href="/pb/post.php?id=' . $post['post_id'] . '">' . $post['title'] . '</a></li>';
						}
					?>
					
				</ul>
		</section>
<?php 		
	}

	$con->close();

 ?>
