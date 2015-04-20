<?php

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
		include("database.php");
		
		if(isset($_GET['delete_article'])) {
		
			//TODO: Do a confirmation script here!!
			
			$delete_id = $_GET['delete_article'];
			
			$delete_article = "delete from articles where article_id = '$delete_id'";
			
			$run_delete = mysqli_query($db, $delete_article);
			
			if (!$run_delete)  {
					
				die('MSSQL error: Delete query failed!' );
				
			}
			
			echo "<script>alert ('Poof!! Article has been deleted! .. and there is noo way to get it back :| ')</script>";
			
			echo "<script>window.open('../index.php?view_articles','_self')</script>";

		}
		
	} //<-- SESSION WRAPPER 
	
?>


	


		
		


