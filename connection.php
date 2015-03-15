<?php		
	//This file is used to store database information and connect to the database.
	
	// Database Hostname
	$dbhost="mysql11.000webhost.com";

	// Database Username
	$dbusername="a2544598_actech";

	// Database Password
	$dbpassword="maddogskate2"; 
	
	// Database Name
	$db_name="a2544598_actech";
			
	
	// Database customer table
	$tbl_customer="users";
						
	// Database stock table
	$tbl_stock="stock";
				
	// Database customer order table
	$tbl_custorder="custorder";
		
						
	// Connect to server
	mysql_connect("$dbhost", "$dbusername", "$dbpassword")or die("Cannot connect to database.");
	
	// Select Database
	mysql_select_db("$db_name")or die("Cannot select database.");
	
?>