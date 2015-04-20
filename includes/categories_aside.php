<aside id="categories">

	<img src="images/category-bg.png" alt="Avocado Web Design Logo">
	<ul id="category">
		<?php
													
			
			$get_cats = "select * from categories order by cat_title";
			
			$run_cats = mysqli_query($db, $get_cats);
			
			while ($cats_row = mysqli_fetch_array($run_cats)) {
				
				$cat_id = $cats_row['cat_id'];
				$cat_title = $cats_row['cat_title'];
				
				echo "
					<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>												
				";
			}
		
		?>	
	</ul><!-- #category end -->

</aside>