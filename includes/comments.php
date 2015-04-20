
<div id="comments-wrapper">

	<div id="comment-heading"><h3>Comments and Suggestions</h3></div>

	<div id="comments">
		
		<?php 
			
			//query db for comments for this article
			$query_comments = "select * from comments where article_id = '$article_id' AND status = 'approved'";
			
			$comment_query = mysqli_query($db, $query_comments);
			
			while ($row_comment = mysqli_fetch_array($comment_query)) {
			
				$comment_name = $row_comment['comment_name'];
				$comment_date = $row_comment['comment_date'];
				$comment = $row_comment['comment_text'];
				
				//For counting the comments - will not use at this time
				//$count = mysqli_num_rows($comment_query);
				//echo "(". $count . ")";
				
				//Selecting first name only. 
				/*$name = trim($comment_name);	
				$first_name = substr(" ", );*/
			
				echo "
				
					<div class='comment'>
						<h4>$comment_name <i>says:</i></h4>
						<date>$comment_date</date>
						<p>$comment</p>
					</div><!--.comment end--->
					
				";
			
			}
		
		?>
	
	</div>
	
	<div id="comment-entry"><h4>Enter comment:</h4></div>	
	<form id="comments_form" method="post" action="details.php?article=<?php echo $article_id; ?>">
				
		<table>
		
			<tr>
				<td class="cm-label">Name:</td>
				<td><input class="cm-input" type="text" name="comment_name" /></td>
			</tr>
			
			<tr>
				<td class="cm-label">Email:</td>
				<td><input class="cm-input" type="text" name="comment_email" /></td>
			</tr>
			
			<tr>
				<td class="cm-label">Comment:</td>
				<td><textarea class="cm-input" name="comment_text" ></textarea></td>
			</tr>

		</table>
		
		<div id="submit-container"><input  id="cm-submit" type="submit" name="submit" value="Submit Comment" /></div>
						
	</form>
	
</div><!--- #comments-wrapper --->

<?php 

	if(isset($_POST['submit'])) {
		
		$comment_name = $_POST['comment_name'];
		$comment_email = $_POST['comment_email'];
		$comment_text = $_POST['comment_text'];
		$comment_date = date('F j, Y');
		$status = "unapproved";
	
		if($comment_name == '' OR $comment_email == '' OR $comment_text == '') {
			
			echo "<script>alert('Please fill in all blanks')</script>";
			exit(); 			
		}
		
		else {
			
			//TODO: Use PDO to write this query in order to escape common chars.
			
			$query_comment = "insert into comments (article_id, comment_name, comment_email, comment_text, comment_date, status) values ('$article_id','$comment_name','$comment_email','$comment_text','$comment_date','$status')";
			
			$run_query = mysqli_query($db, $query_comment);
			
			if (!$run_query)  {
				
				die('MSSQL error: Comment query failed!' );
			
			}
				
			echo "<script>alert('Thank you! Your comment and suggestions are appreciated! ')</script>";
	
		}
	
	}
	
?>