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
	<title>Avocado - IT Knowledge Base</title>
	
</head>


<body>
	
	<div class="container">
		
		<?php include ('includes/header.php'); ?>
		
		<div id="search">
            
            <?php  // this checks if search field is empty
                if (empty($_GET['search_query'])) {
                    
                    $search_value = "";
                    
                } else {
                    
                    $search_value = $_GET['search_query'];
                }
            ?>
			
			<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				<input type="search" name="search_query" value="<?php echo $search_value; ?>" placeholder="Search articles.." class="searchbar" align="top"/>
				<input type="submit" name="search" value="" class="searchbutton" />		
			</form>
		
		</div><!-- #search bar end -->
		
		<div id="top-separator"><img src="images/top-separator.png" alt="top border"></div>
	

		<!-- Article area --->
		<?php 
			
			if(isset($_GET['cat'])) {
				
				include("includes/category_articles.php");
			
			}
			
			else if (isset($_GET['search'])) {
				
				include ("includes/results.php"); 
				
			}
			
					
			else {
			
				include ("includes/article_content.php");
			}

		?>		
		<!-- Article area End --->
	
		<!-- Categories area --->
		<?php include ("includes/categories_aside.php"); ?>
		<!-- Categories area end --->
		
		<div class="clear"></div>
		
		<div id="bottom-separator"><img src="images/bottom-separator.png" alt="bottom border"></div>
		
		<?php include ("includes/footer.php"); ?>
		
	</div><!-- .container end -->
	
</body>

</html> 
