<?php 

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
		if (isset($_GET['edit_category'])) {
			
			$edit_cat = $_GET['edit_category'];
			
			$edit_cat_qry = "select * from categories where cat_id = '$edit_cat'";
			
			$run_cat_qry = mysqli_query($db, $edit_cat_qry);
			
			$row_cat_qry = mysqli_fetch_array($run_cat_qry);
			
			$cat_id = $row_cat_qry['cat_id'];
			$cat_title = $row_cat_qry['cat_title'];

		}

?>


<form id="insert-category-form" action="" method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<td class="tblabel">Edit Category:</td>
			<td><input class="tb-input" type="text" name="category_name" size="58" value="<?php echo $cat_title ?>"/></td>
		</tr>
		
	</table>
	
	<div class="submit-bttn"><input  type="submit" name="edit_category" value="Update Category" /></div>
	<div class="clear"></div>

</form>

<?php
	
	if(isset($_POST['edit_category'])) {
		
		$category_name = $_POST['category_name'];
		
		
		//TODO: also check if category already exists in Database
		
		if($category_name == '') {
			
			echo "<script>alert('Please fill in the category name :P')</script>";
		}
		
		else {
			
			$update_cat = "update categories set cat_title = '$category_name' where cat_id = '$cat_id'"; 
			
			$run_cat = mysqli_query($db, $update_cat);
			
			if (!$run_cat)  {
				
				die('MSSQL error: Insert query failed!' );
			
			}
			
			echo "<script>alert('Ok, category has been updated! now try not to make it a habit :\)')</script>";
				
			echo "<script>window.open('index.php?view_categories','_self')</script>";
		
		}

	}
	
?>

<?php } //SESSION WRAPPER  ?>