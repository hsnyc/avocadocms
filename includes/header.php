<?php

	session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		$nav  = '<ul>';
		$nav .= '<li><a href="index.php">Home</a></li>';
		$nav .= '<li><a href="archive.php">Archives</a></li>';		
		$nav .= '</ul>';
		$nav .= '<div id="login-link"><a href="admin/login.php"><b>Login</b></a></div>';
	
	}
	
	else {
	
		$nav  = '<ul>';
		$nav .= '<li><a href="index.php">Home</a></li>';
		$nav .= '<li><a href="archive.php">Archives</a></li>';
		$nav .= '<li><a href="admin/index.php">Admin</a></li>';			
		$nav .= '</ul>';
		$nav .= '<div id="login-link"><a href="admin/logout.php"><b>Logout</b></a></div>';
	
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
	
</header>