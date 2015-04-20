<?php 

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
?>

<form id="insert-category-form" action="index.php?insert_category" method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<td class="tblabel">New Category:</td>
			<td><input class="tb-input" type="text" name="category_name" size="58"/></td>
		</tr>
		
	</table>
	
	<div class="submit-bttn"><input  type="submit" name="insert_category" value="Insert Category" /></div>
	<div class="clear"></div>

</form>

<?php
	
	if(isset($_POST['insert_category'])) {
		
		$category_name = $_POST['category_name'];
		
		
		//TODO: also check if category already exists in Database
		
		if($category_name == '') {
			
			echo "<script>alert('Please fill in the category name :P')</script>";
		}
		
		else {
			
			$insert_cat = "insert into categories (cat_title) values ('$category_name')";
			
			$run_cat = mysqli_query($db, $insert_cat);
			
			if (!$run_cat)  {
				
				die('MSSQL error: Insert query failed!' );
			
			}
			
			echo "<script>alert('Wooho! category has been added! now go on and categorize something!')</script>";
				
			echo "<script>window.open('index.php?view_categories','_self')</script>";
		
		}

	}
	
?> 

<?php } //SESSION WRAPPER  ?>