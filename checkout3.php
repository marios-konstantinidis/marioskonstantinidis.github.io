<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Eco-Pc</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
    <script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

    <script src="js/jquery-1.7.min.js" type="text/javascript"></script>
    <script src="js/superfish.js" type="text/javascript"></script>
    <script src="js/jquery.hoverIntent.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script> 
    <script src="js/script.js" type="text/javascript"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
          <script type="text/javascript" src="jquery.magnifier.js">


</script>

</head>
<body id="page5">
   <!--=========================================header=============================================-->
  
        <header class="border-2">
            <div class="main indent-bottom">
                <div class="container_12">
                    <article class="grid_6">
                        <div class="indent-top">
                            <hgroup>
                                <h1><a href="index.html">Eco Pc Technologies</a></h1>
                                <h2>Providing professional computer repair services</h2>
                            </hgroup>
                        </div>
                    </article>
                    <article class="grid_6">
                        <div class="wrapper">
                            <div class="fright size-1 indent-top1">
                                <span class="color-1">Support&nbsp;</span> info@eco_pc.com
                                                             <div id="header_right">

        
                              

                                
                            </div>
                            </div>
                        </div>
                    </article>
                    <div class="clear"></div>
                    <article class="grid_12">
                        <nav>
                          <ul class="menu">
                             <li class="first"><a  href="index.php">Home</a></li>
<li><a href="about.php">About Us</a></li>
<li><a href="service.php">Services</a></li>
<li><a href="datarecovery.php">Data Recovery</a></li>
<li><a class="active" href="technews.php" class="selected">Tech-News</a></li>
<li><a href="contact.php" class="selected">Contact</a></li>
                            </ul>
                            <div class="clear"></div>
                        </nav>
                        <div class="clear"></div>
                </article>
                    <div class="clear"></div>
                </div>
            </div>
        </header>
    
     <!--==============================content================================-->

     
     
        <section id="content">
            <div class="main">
            	<div class="container_12">
                	<div class="wrapper">
						<article class="grid_12">
							<div class="border-1 indent-bottom1 margin-bot2">
								<h1>News About<span> Software And Products</span></h1>
							</div>
<div class="clear"></div>  
	<h2 class="sec_head">Checkout</h2>
  <div id="catalogue">

 <?php

	include("connection.php");
	
	$sql="SELECT * FROM $tbl_stock";
	$result=mysql_query($sql);
	$overallCost = 0.00;
	$deliveryCharge = 0.00;
	
	echo "<div class='contentBox'><h1>Your Order</h1><form title='menuForm' id='checkoutForm' class='form' method='post' action='checkout_process2.php' onSubmit='return checkCheckout()'><table class='menuTable' summary='Menu Table'>";
	
	//loop through whole stock
	while ($row = mysql_fetch_array($result))
	{
		$image = $row['Image'];
		$product = $row['stockname'];
		$price = $row['stocksell'];
		$id = $row['stockid'];
		$description = $row['stockdesc'];
		$quantity = $_SESSION['order_array'][$id];
		
		if (($quantity !=0) || ($quantity !=''))  {
		
			$overallCost += $price * $quantity;
			echo "<tr><td class='productID' ><img class='productimg' src=".$image." alt='Product' width='120' height='95' /></td><td id='productDeskBool$id' class='productdesk' ><a href='javascript:deskon($id)'>+</a></td><td class='productName' >$product</td><td class='productPrice' >&pound;$price</td><td class='productSelection' ><select name='$id'>";
						
			for ($counter = 0; $counter < 9; $counter++) {
				echo "<option ";
				if ($quantity == $counter) {
					echo "selected='selected'";
				}
				echo " value='$counter'>$counter&nbsp;&nbsp;&nbsp;&nbsp;</option>";
			}
			echo "</select></td></tr><tr id='productDesk$id' class='productDescription'><td></td><td></td><td>$description</td><td></td><td></td></tr>";
		}
	}
	
	echo "</table><div id='checkoutinfo' ><label>Delivery Charge:</label><label class='checkoutlabel'>&pound;$deliveryCharge.00</label<br />
	<label class='bold'>Total Cost:</label><label id='totalcost' class='checkoutlabel'>&pound;$overallCost</label><br/></div>
	
	<label for='deldate'>Delivery Date (DD/MM/YY): </label> <input type='text' id='deldate' name='deldate' /><br />
	<label for='deltime'>Delivery Time: </label><select name='deltime'><option value='11:30'>11:30</option><option value='12:00'>12:00</option><option value='12:30'>12:30</option><option value='13:00'>13:00</option><option value='13:30'>13:30</option><option value='14:00'>14:00</option><option value='14:30'>14:30&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option></select><br />
	
	<label for='accountType'>Account Type: </label><select name='accountType'><option value='visa'>Visa / Mastercard&nbsp;&nbsp;&nbsp;&nbsp;</option><option value='switch'>Switch / Maestro</option></select><br />
	<label for='accountnumber'>Account Number: </label> <input type='text' id='accountNum' name='accountnumber'/><br />
	<label for='sortcode'>Sort Code: </label> <input type='text' id='sortCode' name='sortcode'/><br />
	<span id='errorCheckout' class='error'></span><br /><input type='submit' name='Submit' value='Buy Products'/></form></div>";
?>


   
   <div class="clear2"></div>
  </div>
           

</div> 
    <!--==============================footer================================-->
    <footer>
        <div class="">
            <div class="main">
                <div class="container_12">
                    <div class="wrapper">
                    	<article class="grid_12">
                            <nav>
                                <ul>
                                     <li><a  href="index.html">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="service.php">Services</a></li>
                                    <li><a href="datarecovery.php">Data Recovery</a></li>
                                    <li><a class="active" href="technews.php">Tech-News</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </nav>
                        </article>
                    </div>
                    <div class="wrapper">
                        <article class="grid_12">
                            Computer repair &copy; 2012 <a href="index-6.html" class="link2">Privacy Policy</a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>