<?php
	session_start(); 

	include("connection.php");
	
	$order_array = array(); 
	$sql="SELECT * FROM $tbl_stock";
	$result=mysql_query($sql);
	$valid=false;
	
	// loop through whole stock
	while ($row = mysql_fetch_array($result))
	{
		$id = $row['stockid'];
		
		// check if any of this stockID where ordered
		if ($_POST[$id] != 0) {
			$valid=true;
			$order_array[$id] = $_POST[$id];
		}
	}
	
	if (($valid) && (isLogged()))  {
		$_SESSION['order_array']=$order_array;
		header("location:checkout3.php");
	} else if (!(isLogged())) {
		// Login error
		$_SESSION['order_array']=$order_array;
		header("location:checkout3.php");
	} else {
		// Invalid order error
		$_SESSION['order_array']=$order_array;
		header("location:checkout3.php");
	}
	
	
	function isLogged() {
		if ($_SESSION['logged'] != 1) {
			return false;
		} else {
			return true;
		}
	}
?> 

