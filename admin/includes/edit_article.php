<?php

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('login.php?not_authorize=Please log in!', '_self')</script>";
	
	}
	
	else {
	
?>


	<form action="" method="post" enctype="multipart/form-data">

	<?php
		
		//Database connection
		include("includes/database.php");
	
		if(isset($_GET['edit_article'])) {
		
			$edit_id = $_GET['edit_article'];
			
			$select_article = "select * from articles where article_id = '$edit_id'";
			
			$run_query = mysqli_query($db, $select_article);
			
			//TODO: this does not need to be a loop since one record is being returned..
			while ($row_article = mysqli_fetch_array($run_query)) {
			
				$article_id = $row_article['article_id'];
				$title = $row_article['article_title'];
				$category = $row_article['category_id'];
				$author = $row_article['article_author'];
				$keywords = $row_article['article_keywords'];
				$content = $row_article['article_content'];
			}
		
		}
	
	?>
	
		<table>
			<tr>
				<td class="tblabel">Title:</td>
				<td><input class="tb-input" type="text" name="article_title" size="60" value="<?php echo $title; ?>"/></td>
			</tr>
			<tr>
				<td class="tblabel">Author:</td>
				<td><input class="tb-input" type="text" name="article_author" size="60" value="<?php echo $author; ?>"/></td>
			</tr>
			<tr>
				<td class="tblabel">Keywords:</td>
				<td><input class="tb-input" type="text" name="article_keywords" size="60" value="<?php echo $keywords; ?>"/></td>
			</tr>
			<tr>
				<td class="tblabel">Category:</td>
				<td>
					<select name="cat">
						<?php
									
							$get_article_cat = "select * from article ";
							
							$get_cats = "select * from categories";
							
							$run_cats = mysqli_query($db, $get_cats);
							
							while ($cats_row = mysqli_fetch_array($run_cats)) {
								
								$cat_id = $cats_row['cat_id'];
								$cat_title = $cats_row['cat_title'];								
								
								/* Build the category drop down and then select the category assigned to the article
								** with an IF statement */
								$option_value = "<option value='$cat_id'";
								
								if ($cat_id == $category) {
									
									$option_value .= " selected='selected' >$cat_title</option>";
									
								}
								
								else {
								
									$option_value .= ">$cat_title</option>";
								
								}
								
								
								echo $option_value;
								
								//OLD --> "<option value='$cat_id'>$cat_title</option>";
							}
						?>				
					</select>
				
				</td>
			</tr>
			<!--<tr>
				<td class="tblabel">Image:</td>
				<td ><input class="select-image-bttn" type="file" name="article_image" /></td>
			</tr>-->
			<tr>
				<td></td>
				<td><textarea name="article_content" id="article_content" rows="10" cols="100"><?php echo $content; ?></textarea>
				
				<script> 
					CKEDITOR.replace( 'article_content',
					{
						filebrowserBrowseUrl : '/avocadocms/js/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : '/avocadocms/js/ckfinder/ckfinder.html?type=Images',
						filebrowserFlashBrowseUrl : '/avocadocms/js/ckfinder/ckfinder.html?type=Flash',
						filebrowserUploadUrl : '/avocadocms/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : '/avocadocms/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : '/avocadocms/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
					});
							
					/*var editor = CKEDITOR.replace('article_content');							   
					CKFinder.setupCKEditor( editor, '/js/ckfinder/' );*/
				</script>

				<!--<script>
					CKEDITOR.replace('article_content' 
					);
				</script>-->
				</td>
				
				
			</tr>
			<tr>					
				<td ></td>
			</tr>	
		</table>
		
		<div class="submit-bttn"><input  type="submit" name="update" value="Update Article" /></div>
		<div class="clear"></div>
	
	</form>

<?php
	if(isset($_POST['update'])) {
		
		$update_id = $article_id;
		
		$article_title = $_POST['article_title'];
		$article_EditDate = date('Y-m-d');
		$article_cat = $_POST['cat'];
		$article_author = $_POST['article_author'];
		$article_keywords = $_POST['article_keywords'];
		//$article_image = $_FILES['article_image']['name'];
		//$article_image_tmp = $_FILES['article_image']['tmp_name'];
		$article_content = $_POST['article_content'];
		
		if($article_title == '' OR $article_cat == 'null' OR $article_keywords == '' OR $article_content == '') {
			
			echo "<script>alert('Please fill in all the fields!')</script>";
		}
		
		else {
			
			//move_uploaded_file($article_image_tmp, "../data/articles/images/$article_image");
			
			$update_articles = "update articles set category_id = '$article_cat', article_title = '$article_title', article_editDate = '$article_EditDate', article_author = '$article_author', article_keywords = '$article_keywords', article_content = '$article_content' where article_id = '$update_id'"; 
			
			$run_update = mysqli_query($db, $update_articles);
			
			if (!$run_update)  {
				
				die('MSSQL error: Update query failed!' );
			
			}
				
			echo "<script>alert('Hooray! Article had been updated!')</script>";
			
			echo "<script>window.open('index.php?view_articles','_self')</script>";
	
		}	
	}

?>

<?php } //SESSION WRAPPER  ?>