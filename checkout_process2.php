<?php
	session_start();
	
	include("connection.php");
	
	$currentdate = date("d/m/y H:i:s", time());
	$userdeldate =$_POST['deldate'];
	$userdeltime =$_POST['deltime']; 
	$orderdel = "$userdeldate $userdeltime";
	$userid = $_SESSION['user_id'];
	$totalcost = 0.00;
	$payment =$_POST['paymentmethod'];
	
	//get the new orderid to be used
	$sql="SELECT * FROM $tbl_custorder";
	$result=mysql_query($sql) or die(mysql_error()); 
	$rownum=mysql_num_rows($result);
	if ($rownum != 0) {
		$sql="SELECT * FROM $tbl_custorder WHERE orderid='$rownum'";
		$result=mysql_query($sql) or die(mysql_error()); 
		while ($row = mysql_fetch_array($result)) {
			$orderuseid = $row['orderuseid'] + 1;
		}
	} else {
		$orderuseid = 1;
	}
	
	//get user credit
	$sql="SELECT * FROM $tbl_customer WHERE id='$userid'";
	$result=mysql_query($sql) or die(mysql_error()); 
	while ($row = mysql_fetch_array($result)) {
		$credit = $row['credit'];
	}
	
	// get the order and total cost
	$order_array = array(); 
	$sql="SELECT * FROM $tbl_stock";
	$result=mysql_query($sql) or die(mysql_error()); 
	$stocknum=mysql_num_rows($result);
	$valid=false;
	while ($row = mysql_fetch_array($result)) {
		$stockid = $row['stockid'];
		$stockprice = $row['stocksell'];
		
		if (($_POST[$stockid] != 0) && ($_POST[$stockid] != NULL)) {
			$valid=true;
			$order_array[$stockid] = $_POST[$stockid];
			$totalcost += $stockprice * $_POST[$stockid];
		}
	}
	
	//check if they have enough credits before carrying out the order
	if (($payment == 'credit') && ($credit < $totalcost)) {
		header("location:checkout.php?action=checkoutError");
	} else {
		for ($counter = 1; $counter < $stocknum; $counter++) {
			
			if ($order_array[$counter] != NULL) {
				//get current stock quantity
				$sql="SELECT * FROM $tbl_stock WHERE stockid='$counter'";
				$result=mysql_query($sql);
				while ($row = mysql_fetch_array($result)) {
					$quantity = $row['stockquantity'] - $order_array[$counter];
				}	
				//set new stock quantity
				mysql_query("UPDATE $tbl_stock SET stockquantity='$quantity' WHERE stockid='$counter' LIMIT 1 ");

				//create order 
				$sql="INSERT INTO $tbl_custorder (`orderid` , `orderuseid`, `id` , `stockid` , `orderdate` , `orderdel` , `quantity`)
VALUES (NULL, '$orderuseid', '$userid', '$counter', '$currentdate', '$orderdel', '$order_array[$counter]')";
				mysql_query($sql) or die(mysql_error());
			}
		}
		//take the credit off
		if ($payment == 'credit') {
			$newcredit = $credit - $totalcost;
			mysql_query("UPDATE $tbl_account SET credit = '$newcredit' WHERE id='$userid' LIMIT 1 ");
		}
		
		$order_array['order_id'] = $orderuseid;
		$order_array['del_date'] = $orderdel;
		
		$_SESSION['receipt_array']=$order_array;
		
		//direct to order_success page
		header("location:receipt2.php");
	}
?>

