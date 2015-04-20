<?php session_start(); ?>

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

	<meta name="description" content="Avocado Web Design - IT Department" charset="utf-8"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
	<title>Avocado - IT Knowledge Base</title>
	
</head>



<body>
	
	<div class="container">
		
		<?php include ('includes/header.php'); ?>
		
		<div id="admin-login-top-separator"><img src="images/top-separator.png" alt="top border"></div>

		<div id='admin-login-heading'><h2>Admin Login</h2></div>
		<div id='login-article_meta'><span id='author'><?php echo @$_GET['not_authorize']; ?></span></div>
		<div class='clear'></div>			
		
		<section id='login-section'>
		
			<!-- LOGIN FORM -->
			<form id="login-section-form" action="login.php" method="post" enctype="multipart/form-data">

				<table>
					<tr>
						<td class="tblabel">User:</td>
						<td><input class="tb-input" type="text" name="user_name" placeholder="user name.." size="58"/></td>
					</tr>
					
					<tr>
						<td class="tblabel">Password:</td>
						<td><input class="tb-input" type="password" name="user_password" placeholder="password.."size="58"/></td>
					</tr>
					
				</table>
				
				<div id="login-bttn"><button  type="submit" name="login" >Login</button></div>
				<div class="clear"></div>

			</form>
			
			<!-- LOGIN FORM -->
			
		</section>
		
		<div class="clear"></div>
		
		<div id="bottom-separator"><img src="images/bottom-separator.png" alt="bottom border"></div>
		
		<?php include ("includes/footer.php"); ?>
		
	</div><!-- .container end -->
	
</body>

</html> 

<?php
	
	//Database connection
	include("includes/database.php");
	
	if(isset($_POST['login'])) {
	
		$user_name = mysqli_real_escape_string($db, $_POST['user_name']);
		
		$user_password = mysqli_real_escape_string($db, $_POST['user_password']);
		
		$encrypt_password = md5($user_password);
		
		$select_user = "select * from users where user_name = '$user_name' AND user_password = '$encrypt_password'";
		
		$run_user = mysqli_query($db, $select_user);
		
		$row = mysqli_fetch_array($run_user); 
		$usr = $row['user_name'];
		
		
		/*echo "<script>alert('user: $usr')</script>";
		echo "<script>alert('pw: $pw')</script>"; */
		
		if (!$run_user) {
		
			echo "<script>alert('Login query failed!.')</script>";
			die();
		}
		
		if ($user_name = '' || $user_password = '') {
		
			echo "<script>alert('Please enter your credentials.')</script>";
			exit();
		}
		
		
		if(mysqli_num_rows($run_user) > 0) {
			
			$_SESSION['user_name'] = $usr;
			
			echo "<script>window.open('index.php?logged=You have successfully logged in!!', '_self')</script>";	
		
		}
		
		else {
		
			echo "<script>alert('Please check your credentials and try again.')</script>";
			
		}
	
	}
	
?>