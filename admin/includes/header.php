<?php

	
	if (!isset($_SESSION['user_name'])) {
	
		$nav  = '<ul>';
		$nav .= '<li><a href="../index.php">Home</a></li>';
		$nav .= '<li><a href="../archive.php">Archives</a></li>';		
		$nav .= '</ul>';
		$nav .= '<div id="login-link"><a href="login.php"><b>Login</b></a></div>';
	
	}
	
	else {
	
		$nav  = '<ul>';
		$nav .= '<li><a href="../index.php">Home</a></li>';
		$nav .= '<li><a href="../archive.php">Archives</a></li>';
		$nav .= '<li><a href="index.php">Admin</a></li>';			
		$nav .= '</ul>';
		$nav .= '<div id="login-link"><a href="logout.php"><b>Logout</b></a></div>';
	
	}
?>

<header>
		
	<nav>
		
        <?php echo $nav; ?>
        
	</nav>
	
	<div class="clear"></div>
	
	<div id="main-logo">
		<img src="images/avocadocms-itkb-main-logo.jpg" alt="avocado-cms-logo">							
	</div>

	<h1></h1>
	
</header>