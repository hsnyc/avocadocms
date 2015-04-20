<?php 
	
	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
		include("database.php");
		
		//DELETE the category
		if(isset($_GET['delete_comment'])) {

			$delete_id = $_GET['delete_comment'];
			
			$delete_com_sql = "delete from comments where comment_id = '$delete_id'";
			
			$run_com_qry = mysqli_query($db, $delete_com_sql);
			
			if (!$run_com_qry) {
			
				die('MSSQL error: Delete query failed!' );
				
			}
			
			//echo "<script>alert('Category has been deleted.')</script>";
					
			echo "<script>window.open('../index.php?view_comments','_self')</script>";
		
		}
		
	}  //<-- SESSION WRAPPER 
	
?>