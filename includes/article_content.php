<section id="short_articles_area">
			
	<div id="short-article-heading"><h2>Recent Articles</h2></div>
	
	<div id="short-article-wrapper">
	
		<?php 
			$get_articles = "select * from articles
							order by article_date desc
							limit 0, 7";
			
			$run_articles = mysqli_query($db, $get_articles);
			
			
			
			while ($row_articles = mysqli_fetch_array($run_articles)) {
				
				$article_id = $row_articles['article_id'];
				$article_title = $row_articles['article_title'];				
				$article_date = date_create($row_articles['article_date']);
				$article_date = date_format($article_date, 'F j, Y');
				$article_author = $row_articles['article_author'];
				$article_keywords = $row_articles['article_keywords'];
				/*$article_image = $row_articles['article_image'];*/
				//$article_date = date("F j, Y", $article_date);
				/*$article_content = substr ($row_articles['article_content'],0, 300); */
				
				echo "
				<div id='article_summary'>
					<h3><a href='details.php?article=$article_id'>$article_title</a></h3>
					<div id='article_meta'><span>$article_keywords</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span id='author'>$article_author</span>&nbsp;-&nbsp;<date>$article_date</date></div>			
				</div> <!--- #article_summary end --->

				";				
			}
			
		?>

	</div><!-- #short-article-wrapper -->

</section>