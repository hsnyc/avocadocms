<?php

	$db = mysqli_connect("localhost", "avocado", "r00t", "avocado" );
	
	if (!$db) {
		
		die('Could not connect to MySQL: ' . mysqli_connect_error());
	
	}
		
?>