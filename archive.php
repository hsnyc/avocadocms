<!doctype html>
<html>
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
	<title>Avocado - Archives</title>
    
    </head>
    
    <body>
    
    	<div class="container">
            
            <?php include ('includes/header.php'); ?>
             
            <div id="top-separator-archives"><img src="images/top-separator.png" alt="top border"></div>
        
            <!-- Archive area --->
            <div id="archive-heading"><h2>Archives</h2></div>
	
			<div id="archive-wrapper"><!-- archive wrapper -->

			<?php 
			
				include ('includes/database.php');
                
				$get_article_year = "select article_date from articles 
									 group by Year(article_date)
									 order by article_date desc";
				
				$run_article_year = mysqli_query($db, $get_article_year);
				
				while ($row_article_year =  mysqli_fetch_array($run_article_year)) {
					
					$article_year = date_create($row_article_year['article_date']);
					$article_year = date_format($article_year, 'Y');										
					
					echo "<div id='archive-area'>
						  <h2>$article_year</h2>
						  <table>";
					
					$get_year_articles = "select * from articles 
										  where Year(article_date) = '$article_year'
										  order by article_date desc"; 
					
					$run_year_articles = mysqli_query($db, $get_year_articles);
					
					while ($row_year_articles = mysqli_fetch_array($run_year_articles)) {
						
							$article_id = $row_year_articles['article_id'];
							$article_title = $row_year_articles['article_title'];
							$article_date = date_create($row_year_articles['article_date']);
							$article_date = date_format($article_date, 'F j');
							
							echo "<tr>
									<td class='articleDate'>$article_date</td>
									<td class='articleTitle'><a href='details.php?article=$article_id'>$article_title</a></td>
								  </tr>";
					}
					
					echo "</table>
						  </div> <!-- #archive-area ends -->";
						
				}
    
            ?>		
            <!-- Archive area End --->
			</div> <!-- archive wrapper end -->
            
            <div class="clear"></div>
            
            <div id="bottom-separator"><img src="images/bottom-separator.png" alt="bottom border"></div>
            
            <?php include ("includes/footer.php"); ?>
            
        </div><!-- .container end -->
    	
    
    </body>
</html>