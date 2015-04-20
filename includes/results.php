
<!-- Results area --->

<section id="short_articles_area">

	<div id="short-article-heading"><h2>Search Results</h2></div>

	<div id="short-article-wrapper">
	
		<?php 
								
			/*$get_search = $_GET['search_query'];*/
			
            //search query cookout
            $search_query = $_GET['search_query'];

			if ($search_query == '' ) {
			
				echo "<script>alert('I am not a mind reader, please enter your search!')</script>";
				echo "<script>window.open('index.php','_self');</script>";
				exit();
				
			}
			
			//Search entire term first. If not results are found, then explode the query into separate terms.
			$qry = "SELECT * FROM articles WHERE article_keywords LIKE '%$search_query%'
            OR article_title LIKE '%$search_query%' 
            OR article_author LIKE '%$search_query%'
            OR article_content LIKE '%$search_query%'
            OR article_date LIKE '%$search_query%' 
			ORDER by 1 desc";
			
			$run_results = mysqli_query($db, $qry);
			
			if (!$run_results) {
					
				die('MSSQL error: Search Query failed!');
					
			}
			
			//If no results are found from the first query then break it down.
			if (mysqli_num_rows($run_results) == 0) {
			
				$terms = explode(" ", $search_query);

				//print_r($terms);

				$qry = "SELECT * FROM articles WHERE ";

				$search_fields = array('article_keywords', 'article_title', 'article_author', 'article_content', 'article_date');

				$i = 0;

				foreach ($terms as $keyword)
				{              
					
					$i++;
					
					if ($i == 1) {
						
						$qry .= "article_keywords LIKE '%$keyword%' ";
						
						for ($c = 1; $c <= 4; $c++ ) {
							
							$qry .= "OR $search_fields[$c] LIKE '%$keyword%' ";
							
						}
						
					}
					
					else {

						foreach ($search_fields as $sf) {
							
							$qry .= "OR $sf LIKE '%$keyword%' ";
							
						}
						
					}
				}

				$qry .= "ORDER by 1 desc";
				
				$run_results = mysqli_query($db, $qry);

				if (!$run_results) {
						
					die('MSSQL error: Search Query failed!');
						
				}
				
				if (!mysqli_num_rows($run_results) == 0) {
					
					while ($row_articles = mysqli_fetch_array($run_results)) {
						
						//print_r($row_articles);

						$article_id = $row_articles['article_id'];
						$article_title = $row_articles['article_title'];				
						$article_date = date_create($row_articles['article_date']);
						$article_date = date_format($article_date, 'F j, Y');	
						$article_author = $row_articles['article_author'];
						$article_keywords = $row_articles['article_keywords'];
						/*$article_image = $row_articles['article_image'];*/
						/*$article_content = $row_articles['article_content'];*/
						
						echo "
						<div id='article_summary'>
							<h3><a href='details.php?article=$article_id'>$article_title</a></h3>
							<div id='article_meta'><span>$article_keywords</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span id='author'>$article_author</span>&nbsp;-&nbsp;<date>$article_date</date></div>
							<div class='clear'></div>
						</div> <!--- #article_summary end --->
						
						";	
										
					} //<<--- End of while loop --/
					
				}
				
				else {
				
					echo "
						<div id='article_summary'>
							<h3>No articles found! ..try broadening your search.</h3>
							<div class='clear'></div>
						</div> <!--- #article_summary end --->
						
						";
				}
			
			
			}
			
			//Ok. Results are found. Display those only.
			else {
			
				while ($row_articles = mysqli_fetch_array($run_results)) {
						
						//print_r($row_articles);

						$article_id = $row_articles['article_id'];
						$article_title = $row_articles['article_title'];				
						$article_date = date_create($row_articles['article_date']);
						$article_date = date_format($article_date, 'F j, Y');	
						$article_author = $row_articles['article_author'];
						$article_keywords = $row_articles['article_keywords'];
						/*$article_image = $row_articles['article_image'];*/
						/*$article_content = $row_articles['article_content'];*/
						
						echo "
						<div id='article_summary'>
							<h3><a href='details.php?article=$article_id'>$article_title</a></h3>
							<div id='article_meta'><span>$article_keywords</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span id='author'>$article_author</span>&nbsp;-&nbsp;<date>$article_date</date></div>
							<div class='clear'></div>
						</div> <!--- #article_summary end --->
						
						";											
					} //<<--- End of while loop --/
			}

            //echo $qry;
            //exit();

        //Sample of the Search query
        /*SELECT * FROM articles WHERE article_keywords LIKE '%henry%'
            OR article_title LIKE '%henry%' 
            OR article_author LIKE '%henry%'
            OR article_content LIKE '%henry%'
            OR article_date LIKE '%henry%'
            OR article_keywords LIKE '%sanchez%'
            OR article_title LIKE '%sanchez%' 
            OR article_author LIKE '%sanchez%'
            OR article_content LIKE '%sanchez%'
            OR article_date LIKE '%sanchez%' */

            //to find the number of time the keyword appears in the record 
            
            /*<?php
                $mystring = 'abc';
                $findme   = 'a';
                $pos = strpos($mystring, $findme);

                // The !== operator can also be used.  Using != would not work as expected
                // because the position of 'a' is 0. The statement (0 != false) evaluates 
                // to false.
                if ($pos !== false) {
                     echo "The string '$findme' was found in the string '$mystring'";
                         echo " and exists at position $pos";
                } else {
                     echo "The string '$findme' was not found in the string '$mystring'";
                }
            ?>*/
			
		?>
		
	</div> <!-- #short-article-wrapper -->

	<div class="clear"></div>
	
</section>

<!-- Results area End --->
		
	
		