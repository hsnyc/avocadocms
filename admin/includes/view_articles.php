<?php 

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
?>

<div id="view-articles-heading"><h2>View All Articles</h2></div>
<div id='view-articles-meta'><span id='author'>Welcome <?php echo $_SESSION['user_name']; ?>!</span></div>
<div class='clear'></div>

<section id="view-articles-section">

	<table id="view-articles-table">
		
		<thead>
			<th>ID</th>
			<th>Title</th>
			<th>Author</th>
			<th>Comments</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		
		<?php
		
			//Database connection
			include("includes/database.php");
		
			$get_articles = "select * from articles";
			
			$run_articles = mysqli_query($db, $get_articles);
			
			$counter = 1; //To count the articles
			
			$line_ctr = 0; //to alternate row colors
			
			while ($row_articles = mysqli_fetch_array($run_articles)) {
				
				$article_id = $row_articles['article_id'];
				$article_title = $row_articles['article_title'];
				$article_author = $row_articles['article_author'];

				
				//to alternate row colors
				$line_ctr++;

				$line_ctr_remainder = $line_ctr % 2;  

				if ($line_ctr_remainder == 0)
				{
					$style = "style='background-color: #F1F4E6;'";
				} 
				else 
				{
					$style = "style='background-color: white;'";
				}
		
		
		?>
		
		<tr <?php echo $style ?> >
			<td><?php echo $counter++; ?></td>
			<td><?php echo $article_title; ?></td>
			<td><?php echo $article_author; ?></td>
			<td style="text-align: center">
				<?php 
				
					$get_comments = "select * from comments where article_id = '$article_id'";
				
					$run_comments = mysqli_query($db, $get_comments);
					
					if (!$run_comments)  {
				
						die('MSSQL error: Query failed!' );
						
					}

					$count = mysqli_num_rows($run_comments);
					
					echo $count;
				?>
			</td>
			<td><a href="index.php?edit_article=<?php echo $article_id; ?>" ><div id="edit-article-td"></div></a></td>
			<td><a href="includes/delete_article.php?delete_article=<?php echo $article_id; ?>" onclick="return confirm('Are you sure you want to delete this article?   <?php echo $article_title; ?>');"><div id="delete-article-td"></div></a></td>
			
		</tr>
		
		<?php } ?>

	</table>

</section>

<?php } //SESSION WRAPPER  ?>


	


		
		


