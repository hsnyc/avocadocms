<?php 

	@session_start();
	
	if (!isset($_SESSION['user_name'])) {
	
		echo "<script>window.open('../login.php?not_authorize=Please log in!', '_self')</script>";
	
	}
	
	else {
	

		$get_comments = "select * from comments where status = 'unapproved'";
		
		$run_comments = mysqli_query($db, $get_comments);
		
		$total_comments = mysqli_num_rows($run_comments);

?>

<div id="admin-heading"><h2>Admin Area</h2></div>
<div id='article_meta'><span id='author'>Welcome <?php echo $_SESSION['user_name']; ?>!</span></div>
<div class='clear'></div>
	
<section id="admin_area">

	<div id='welcome_summary'>
		<h3>Welcome! You are successfully logged in to the IT KB Admin Area.</h3>
		<p>From this area you can manage the content found in the Knowledge Base. Instructions about creating articles, categories, and managing comments can be posted here. More info is yet to come. Also, any updates being done to the site itself will be posted here. Thanks for stopping by.</p>
		
		<h3 id="pending-comments-link">Comments pending:<span>&nbsp;(<a href="index.php?pending_comments"><?php echo $total_comments; ?></a>)</span></h3>
		
		
		
		<!--<form action="" method="post" enctype="multipart/form-data"><input id="backup-db" type="submit" name="backup" value="Backup DB" /></form> -->
		
		<div class='clear'></div>
	</div> <!--- #article_summary end --->
	
	<div id="backup-db"><a  href="DB/backup/bkdb.php">Backup DB</a></div>
	
	<?php 
		if (isset($_GET['bkdone']))
		{
			$date = date("Y-m-d H:i:s");
			echo "<h3 id='db-bk-alert'>DB has been backed up!</h3>
				  <p id='db-bk-alert-p'>Location: admin\DB\backup <br/>
					Time: $date
				  </p>
			
			";
		
		}
	?>
	
	<div class="clear"></div>

</section>

<?php 

	if(isset($_POST['backup'])) {
		
		include ("/DB/backup/bkdb.php");
		
	}

?>

<?php } //SESSION WRAPPER ?>




