<!DOCTYPE html>
<?php
	//Database connection
	include("includes/database.php");
?>

<html lang="en">

<head>
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- IE 10 compatibility fix-->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<meta name="viewport" content="width=device-width">
	<!-- IE 10 compatibility fix end -->

	<meta name="description" content="Avocado Web Design - IT Department" charset="utf-8"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<title>Article - IT Knowledge base</title>
	
</head>



<body>
	
	<div class="container">
		
		<?php include ('includes/header.php'); ?>
		
		<!--<div id="search">
			
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="search_query" placeholder="Search articles.." class="searchbar" align="top"/>
				<input type="submit" name="search" value="" class="searchbutton" />		
			</form>
		
		</div><!-- #search bar end -->
		
		<div id="top-separator-details"><img src="images/top-separator.png" alt="top border"></div>
	
		<!-- Article area --->
		<section id="articles_area">					
			
				<?php 
					
					if(isset($_GET['article'])) {
						
						$article_id = $_GET['article'];
										
						$get_articles = "select * from articles
										 where article_id = '$article_id'";
						
						$run_articles = mysqli_query($db, $get_articles);
						
						while ($row_articles = mysqli_fetch_array($run_articles)) {
							
							$article_title = $row_articles['article_title'];
							$article_date = date_create($row_articles['article_date']);
							$article_date = date_format($article_date, 'F j, Y');
							$article_author = $row_articles['article_author'];
							$article_content = $row_articles['article_content'];
							
							echo "
							<div id='article_details'>
								
								<div id='article-heading'><h2>$article_title</h2></div>								
								<div id='details-article_meta'><span id='details-author'>$article_author</span><date>$article_date</date></div>
								<div class='clear'></div>										
								<div id='article_content'>$article_content</div>
							</div> <!--- #article_details end --->

							";				
						}
					}
				?>

			
			<div class="clear"></div>
			
		</section>
		<!-- Article area End --->
	
		<!-- Comments area --->
		
		<?php include("includes/comments.php"); ?>
		
		<!-- Comments area end --->
		
		<div class="clear"></div>
		
		<div id="bottom-separator"><img src="images/bottom-separator.png" alt="bottom border"></div>
		
		<?php include ("includes/footer.php"); ?>
		
	</div><!-- .container end -->
	
</body>

</html> 
