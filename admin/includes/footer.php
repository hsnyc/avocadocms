<footer>

	<div>
        
        <p>
        
            <?php 

                $startYear = 2014;

                $thisYear = date('Y');

                if ($startYear == $thisYear) {

                    echo $startYear;

                }

                else {

                    echo "{$startYear}&nbsp;&#8211;&nbsp;{$thisYear}";

                }

           ?>

            &nbsp; | &nbsp;&nbsp;Home made using &nbsp;
	
	    </p>
        
        <a href="http://hsnyc.co" target="_blank" alt="hsnyc link"><img src="images/avocado-cms-footer-logo.png" alt="avocado-cms-footer-logo"></a>
    
    </div>
	
</footer>