<?php

	session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('login.php?not_authorize=Please log in!', '_self')</script>";
	
	}
	
	else {
	
	//Database connection
	include("includes/database.php");
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
	<script src="js/ckeditor/ckeditor.js"></script>

	<meta name="description" content="Avocado Web Design - IT Department" charset="utf-8"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<title>Avocado - Admin</title>
	
</head>



<body>
	
	<div class="container">
		
		<?php include ('includes/header.php'); ?>	
			
		<div id="top-separator-admin"><img src="images/top-separator.png" alt="top border"></div>
	
		<?php 
			
			$user_name = $_SESSION['user_name'];  //This is the logged in user name.
			
			if(isset($_GET['insert_article'])) {
				
				echo ("<div id='admin-heading'><h2>Add New Article</h2></div>
				<div id='article_meta'><span id='author'>Welcome $user_name!</span></div>
				<div class='clear'></div>			
				<section id='insert-article'> ");
				
				/*-- options panel area --*/
				include ("includes/admin_controls.php");
				
				include("includes/insert_article.php");
				
				echo "</section>";
			
			}
			
			else if(isset($_GET['view_articles'])) {			
			
				include ("includes/view_articles.php");
				
				/*-- options panel area --*/
				include ("includes/admin_controls.php");
			
			}
		
			
			else if (isset($_GET['edit_article'])) {
				
				echo "
				<div id='admin-heading'><h2>Edit Article</h2></div>
				<div id='article_meta'><span id='author'>Welcome $user_name!</span></div>
				<div class='clear'></div>			
				<section id='insert-article'> ";
				
				/*-- options panel area --*/
				include ("includes/admin_controls.php");
				
				include ("includes/edit_article.php"); 
				
				echo "</section>";
			}
			
			else if (isset($_GET['insert_category'])) {
				
				echo "
				<div id='admin-heading'><h2>Insert Category</h2></div>
				<div id='article_meta'><span id='author'>Welcome $user_name!</span></div>
				<div class='clear'></div>			
				<section id='insert-article'> ";
				
				/*-- options panel area --*/
				include ("includes/admin_controls.php");
				
				include ("includes/insert_category.php"); 
				
				echo "</section>";
			}
			
			else if(isset($_GET['view_categories'])) {			
			
				include ("includes/view_categories.php");
				
				/*-- options panel area --*/
				include ("includes/admin_controls.php");
			
			}
			
			else if(isset($_GET['edit_category'])) {			
			
				echo "
				<div id='admin-heading'><h2>Edit Category</h2></div>
				<div id='article_meta'><span id='author'>Welcome $user_name!</span></div>
				<div class='clear'></div>			
				<section id='insert-article'> ";
				
				/*-- options panel area --*/
				include ("includes/admin_controls.php");
				
				include ("includes/edit_category.php");
				
				echo "</section>";
			
			}
			
			else if(isset($_GET['view_comments'])) {			
			
				include ("includes/view_comments.php");
				
				/*-- options panel area --*/
				include ("includes/admin_controls.php");
			
			}
			
			else if(isset($_GET['pending_comments'])) {			
			
				include ("includes/pending_comments.php");
				
				/*-- options panel area --*/
				include ("includes/admin_controls.php");
			
			}
			
			
			else {
			
				/*-- Welcome area --*/
		
				include ("includes/welcome_area.php");
		
				/*-- Welcome area End --*/
				
				
				/*-- options panel area --*/

				include ("includes/admin_controls.php");
				
				/*-- options panel area end --*/
			}

		?>		
		
	
		<div class="clear"></div>
		
		
		<div id="bottom-separator"><img src="images/bottom-separator.png" alt="bottom border"></div>
		
		<?php include ("includes/footer.php"); ?>
		
	</div><!-- .container end -->
	
</body>

</html> 

<?php } ?>


