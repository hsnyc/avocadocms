<?php 

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
?>
	

	<form action="index.php?insert_article" method="post" enctype="multipart/form-data">

		<table>
			<tr>
				<td class="tblabel">Title:</td>
				<td><input class="tb-input" type="text" name="article_title" size="60"/></td>
			</tr>
			<tr>
				<td class="tblabel">Author:</td>
				<td><input class="tb-input" type="text" name="article_author" size="60" /></td>
			</tr>
			<tr>
				<td class="tblabel">Keywords:</td>
				<td><input class="tb-input" type="text" name="article_keywords" size="60" /></td>
			</tr>
			<tr>
				<td class="tblabel">Category:</td>
				<td>
					<select name="cat">
						<option value="null">Select a category</option>
						<?php
							//Database connection
							include("includes/database.php");										
							
							$get_cats = "select * from categories";
							
							$run_cats = mysqli_query($db, $get_cats);
							
							while ($cats_row = mysqli_fetch_array($run_cats)) {
								
								$cat_id = $cats_row['cat_id'];
								$cat_title = $cats_row['cat_title'];
								
								echo "<option value='$cat_id'>$cat_title</option>";
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
				<td><textarea name="article_content" id="article_content" rows="10" cols="100"></textarea>
				
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
		
		<div class="submit-bttn"><input  type="submit" name="submit" value="Publish Article" /></div>
		<div class="clear"></div>
	
	</form>

<?php
	if(isset($_POST['submit'])) {
		
		$article_title = $_POST['article_title'];
		$article_date = date('Y-m-d');  //date('F j, Y') = July 31, 2014
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
			
			$insert_articles = "insert into articles (category_id, article_title, article_date, article_author, article_keywords, article_content) values ('$article_cat','$article_title','$article_date','$article_author','$article_keywords','$article_content')";
			
			$run_articles = mysqli_query($db, $insert_articles);
			
				
			echo "<script>alert('Article had been published!')</script>";
			
			echo "<script>window.open('index.php?insert_article','_self')</script>";
			
			
			
		}
		
		
	}

?>

<?php } //SESSION WRAPPER  ?>