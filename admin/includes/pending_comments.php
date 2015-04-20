<?php 

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
?>

<div id="view-articles-heading"><h2>Pending Comments</h2></div>
<div id='view-articles-meta'><span id='author'>Welcome <?php echo $_SESSION['user_name']; ?>!</span></div>
<div class='clear'></div>

<section id="view-articles-section">

	<table id="view-articles-table">
		
		<thead>
			<th>#</th>
			<th>Comment</th>
			<th>Name</th>
			<th>Email</th>
			<th>Status</th>
			<th>Delete</th>
		</thead>
		
		<?php
		
			//Database connection
			include("includes/database.php");
		
			$get_comments = "select * from comments where status = 'unapproved'";
			
			$run_comments = mysqli_query($db, $get_comments);
			
			$counter = 1; //To count the articles
			
			$line_ctr = 0; //to alternate row colors
			
			while ($row_comments = mysqli_fetch_array($run_comments)) {
				
				$comment_id = $row_comments['comment_id'];
				$comment_name = $row_comments['comment_name'];
				$comment_email = $row_comments['comment_email'];
				$comment_text = $row_comments['comment_text'];
				$comment_date = $row_comments['comment_date'];
				$status = $row_comments['status'];

				
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
			<td><?php echo $comment_text; ?></td>
			<td><?php echo $comment_name; ?></td>
			<td><?php echo $comment_email; ?></td>
			<td style="width: 75px;">
			
			<?php 
			
				//Change comment status
				
				if ($status == 'approved') {
				
					echo "<a href='includes/approve_comments.php?unapprove=$comment_id'>Approved</a>";
				
				} 
				
				else {
				
					echo "<a href='includes/approve_comments.php?approve=$comment_id'>Unapproved</a>";
				
				}
			?>
			
			
			</td>
			<td><a href="includes/delete_comment.php?delete_comment=<?php echo $comment_id; ?>" onclick="return confirm('Are you sure you want to delete this comment?');"><div id="delete-article-td"></div></a></td>
			
		</tr>
		
		<?php } ?>

	</table>

</section>

<?php } //SESSION WRAPPER  ?>





	


		
		


