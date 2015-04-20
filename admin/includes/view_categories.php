<?php 

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
?>

<div id="view-articles-heading"><h2>All Categories</h2></div>
<div id='view-articles-meta'><span id='author'>Welcome <?php echo $_SESSION['user_name']; ?>!</span></div>
<div class='clear'></div>

<section id="view-articles-section">

	<table id="view-articles-table">
		
		<thead>
			<th>ID</th>
			<th>Title</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		
		<?php
		
			$get_cats = "select * from categories";
			
			$run_cats = mysqli_query($db, $get_cats);
			
			$counter = 1; //To count the articles
			
			$line_ctr = 0; //to alternate row colors
			
			while ($row_cats = mysqli_fetch_array($run_cats)) {
				
				$category_id = $row_cats['cat_id'];
				$category_title = $row_cats['cat_title'];

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
			<td><?php echo $category_title; ?></td>
			<td><a href="index.php?edit_category=<?php echo $category_id; ?>" ><div id="edit-article-td"></div></a></td>
			<td><a href="includes/delete_category.php?delete_category=<?php echo $category_id; ?>"><div id="delete-article-td" onclick="return confirm('Are you sure you want to delete this category?  <?php echo $category_title; ?>');"></div></a></td>
			
		</tr>
		
		<?php } ?>

	</table>

</section>

<?php } //SESSION WRAPPER  ?>







	


		
		


