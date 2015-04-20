<?php

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";
	
	}
	
	else {
	
?>

<aside id="admin-controls">
			
	<ul>
		<!--<li><a href="index.php">Admin Home</a></li>-->
		<li><a href="index.php?view_articles">View all Articles</a></li>
        <li><a href="index.php?insert_article">Insert Article</a></li>
		<li><a href="index.php?view_categories">View all categories</a></li>
		<li><a href="index.php?insert_category">Insert new category</a></li>	
		<li><a href="index.php?view_comments">View all comments</a></li>
	</ul><!-- #admin-controls end -->

</aside>

<?php } //SESSION WRAPPER  ?>

