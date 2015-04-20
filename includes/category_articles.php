<section id="short_articles_area">
			
	<?php 
		
		if(isset($_GET['cat'])) {
		
			$cat_id = $_GET['cat'];			
			$get_cats = "select * from categories where cat_id = '$cat_id'";
			$get_articles = "select * from articles where category_id = '$cat_id' order by 1 desc";
						
			$run_categories = mysqli_query($db, $get_cats);
			$run_articles = mysqli_query($db, $get_articles);
			
			if ((!$run_categories) || (!$run_articles)) {
				
				die('MSSQL error: Query failed!' );
				
			}

			// Fetch the row
			$row_categories = mysqli_fetch_row($run_categories); 
			
			$category_title = $row_categories[1];				
				
			echo "<div id='short-article-heading'><h2>Articles under category: <span>$category_title</span></h2></div>			
				  <div id='short-article-wrapper'>";
			
			while ($row_articles = mysqli_fetch_array($run_articles)) {
				
				$article_id = $row_articles['article_id'];
				$article_title = $row_articles['article_title'];
				$article_date = date_create($row_articles['article_date']);
				$article_date = date_format($article_date, 'F j, Y');
				$article_author = $row_articles['article_author'];
				$article_keywords = $row_articles['article_keywords'];
				/*$article_image = $row_articles['article_image'];*/
				/*$article_content = substr ($row_articles['article_content'],0, 300); */
				
				echo "
				
					<div id='article_summary'>
						<h3><a href='details.php?article=$article_id'>$article_title</a></h3>
						<div id='article_meta'><span>$article_keywords</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span id='author'>$article_author</span>&nbsp;-&nbsp;<date>$article_date</date></div>
						<div class='clear'></div>
					</div> <!--- #article_summary end --->

				";				
			}
			
			echo "</div><!-- #short-article-wrapper -->";
		}
	?>

	
	
	
</section>