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

     
       	<?php 
 //Establish connection with hostname using your username and password
	if(!($connection = @mysql_connect('mysql11.000webhost.com','a2544598_actech','maddogskate2')))
	die("Cannot Connect (Check Database Settings)");
	
	if(!(@mysql_select_db('a2544598_actech',$connection)))
	showerror();
 
 //checks cookies to make sure they are logged in 
 if(isset($_COOKIE['ID_my_site'])) 
 { 
 	$username = $_COOKIE['ID_my_site']; 
 	$pass = $_COOKIE['Key_my_site']; 
 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 
 	while($info = mysql_fetch_array( $check )) 	 
 		{ 
 
 //if the cookie has the wrong password, they are taken to the login page 
 		if ($pass != $info['password']) 
 			{ 			header("Location: login.php"); 
 			} 
 
 //otherwise they are shown the admin area	 
 	else 
 			{ 
 			 echo "You are logged in ($username)<p>"; 
 
 echo "<a href=logout.php>Logout</a>"; 
 			} 
 		} 
 		} 
 else 
 
 //if the cookie does not exist, they are taken to the login screen 
 {			 
 header("Location: Login.php"); 
 } 
 ?>          
                              

                                
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
								<h1><span> Software And Products</span></h1>
							</div>
<div class="content_box">

      
          
     
           
<?php
	
			include("connection.php");

					echo "<div class='contentBox'><h1>Products</h1><p> Choose from the Big variety of our Products.</p><form title='menuForm' id='menuForm' class='form' method='post' action='order3.php'>";
		
			$my_data = array(	"SELECT * FROM $tbl_stock WHERE stocktype='Laptop' ORDER BY stockid;",
								"SELECT * FROM $tbl_stock WHERE stocktype='charger' ORDER BY stockid;",
							    
							);
						
			$my_data_heading = array("Laptop","charger");
		
			$my_data_count = count($my_data);

			for ($typecat = 0; $typecat < $my_data_count; $typecat++) {
			
				$sql=$my_data[$typecat];
		
				$result=mysql_query($sql);
		
				$productCount=mysql_num_rows($result);
		
				echo "<fieldset><legend> $my_data_heading[$typecat] </legend><table class='menuTable' summary='Menu Table'>";
				
				while ($row = mysql_fetch_array($result)) {
					$image = $row['Image'];
					$product = $row['stockname'];
					$price = $row['stocksell'];
					$id = $row['stockid'];
					$description = $row['stockdesc'];
					
					$inStock = true;
					
					//check to see if enough in stock
					if ($row['stockquantity'] < 9) {
						$inStock = false;
						echo "<tr class='noStock'>";
					}
					else {
						echo "<tr>";
					}
						
					echo "<td class='productID' ><img src=".$image." class=magnify width='100' height='100' /></td><td id='productDeskBool$id' class='productdesk' ><a href='javascript:deskon($id)'>+</a></td><td class='productName' >$product</td><td class='productPrice' >&pound;$price</td><td class='productSelection' >";
					
					if ($inStock) {
						echo "<select name='$id'>";
						
						for ($counter = 0; $counter < 9; $counter++) {
							echo "<option value='$counter'>$counter&nbsp;&nbsp;&nbsp;&nbsp;</option>";
						}
						echo "</select>";
					}
					else {
						echo "Out of Stock";
					}
						
					echo "</td></tr><tr id='productDesk$id' class='productDescription'><td></td><td></td><td>$description</td><td></td><td></td></tr>";
					
				}
				echo "</table></fieldset><br/>";
			}	
			echo "<span id='errorMenu' class='error'></span><br /><input type='submit' name='Submit' value='Place Order!'/></form></div>";
			
			echo"$order_array";
		
			
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
                            Computer repair &copy; 2012 <a href="index-6.html" class="link2">Privacy Policy</a> <a href="admin.php">Admin</a> 
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>