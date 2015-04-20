<?php
	
	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
		include("database.php");
		
		if (isset($_GET['unapprove'])) {
		
			$unapprove_id = $_GET['unapprove'];
			
			$unapprove_comment = "update comments set status = 'unapproved' where comment_id = '$unapprove_id'";
			
			$run_comment_update = mysqli_query($db, $unapprove_comment);
			
			echo "<script>alert('Comment has been unapproved.')</script>";
					
			echo "<script>window.open('../index.php?view_comments','_self')</script>";
			
		}
		
		
		if (isset($_GET['approve'])) {
		
			$approve_id = $_GET['approve'];
			
			$approve_comment = "update comments set status = 'approved' where comment_id = '$approve_id'";
			
			$run_comment_update = mysqli_query($db, $approve_comment);
			
			echo "<script>alert('Comment has been approved.')</script>";
					
			echo "<script>window.open('../index.php?view_comments','_self')</script>";
			
		}
		
	} //<-- SESSION WRAPPER 

?>