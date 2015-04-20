<?php 

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";	
	}
	
	else {
	
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- IE 10 compatibility fix-->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<meta name="viewport" content="width=device-width">
	<!-- IE 10 compatibility fix end -->

	<!-- Text Editor -->
	<script src="../js/ckeditor/ckeditor.js"></script>
	<meta name="description" content="Avocado Web Design - IT Department" charset="utf-8"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<title>Avocado - IT Knowledge base</title>
	
</head>

<body>
	
	<div class="container">
		
		<header>
		
			<nav>
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="#">Archives</a></li>
								
				</ul>
				<div id="login-link"><a href="#"><b>Login</b></a></div>
			</nav>
			
			<div class="clear"></div>
			
			<div>
				<img src="images/bot-main-logo.png" alt="Avocado Web Design Logo">							
			</div>	
		
			<h1></h1>

		</header>
		
		<div id="top-separator-admin"><img src="images/top-separator.png" alt="top border"></div>
		<div><img src="images/new-article.png" alt="top border"></div>
	
		
	
		<section id="insert-article">
			
			<!-- options panel area --->
				
				<?php include ("includes/admin_controls.php"); ?>

			<!-- options panel area end --->
			
			<form action="insert_article.php" method="post" enctype="multipart/form-data">

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

		</section>
		
		
		
		<div class="clear"></div>
		
		<div id="bottom-separator"><img src="../images/bottom-separator.png" alt="bottom border"></div>
		
		<footer>
			<div>Home made in Tampa Fl &nbsp;&nbsp;|&nbsp;&nbsp; by&nbsp;<a href="http://hsnyc.co" target="_blank" alt="hsnyc link">Henry Sanchez</a></div>
		</footer>
		
	</div><!-- .container end -->
	
</body>

</html> 


<?php
	if(isset($_POST['submit'])) {
		
		$article_title = $_POST['article_title'];
		$article_date = date('m-d-y');
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
			
			echo "<script>window.open('insert_article.php','_self')</script>";
			
			
			
		}
		
		
	}
	
?>

<?php } //SESSION WRAPPER  ?>