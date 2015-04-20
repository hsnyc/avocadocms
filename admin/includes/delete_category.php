<?php 
	
	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
		include("database.php");
		
		//DELETE the category
		if(isset($_GET['delete_category'])) {

			$delete_id = $_GET['delete_category'];
			
			$delete_cat_sql = "delete from categories where cat_id = '$delete_id'";
			
			$run_cat_qry = mysqli_query($db, $delete_cat_sql);
			
			if (!$run_cat_qry) {
			
				die('MSSQL error: Delete query failed!' );
				
			}
			
			//echo "<script>alert('Category has been deleted.')</script>";
					
			echo "<script>window.open('../index.php?view_categories','_self')</script>";
		
		}
		
	} //<-- SESSION WRAPPER 

?>