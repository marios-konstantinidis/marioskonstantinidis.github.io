<?php
include("connection.php");
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
<style type="text/css">
#ticketAdminTable td{
	text-align:center;
	}
#ticketAdminTable th{
	border:#333 solid;
	background-color:#333;
	color:#FFF;
	}
#ticketAdminTable td {border:#999 solid;}	

</style>  
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
								<h1><span> Admin Login</span></h1>
							</div>
<div class="content_box">

     
<?php  
$con = mysql_connect("mysql11.000webhost.com", "a2544598_actech", "maddogskate2"); 
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("a2544598_actech", $con);

// query to get records  
$query = "SELECT * FROM $tbl_custorder";  

if ($result = mysql_query($query)) 
{  
    
    // see if any rows were returned  
   if (mysql_num_rows($result) > 0) 
   {  
        // yes  
        // print them one after another  
        echo "<table id='ticketAdminTable' cellpadding=5 >";  
		 echo "<tr><th>Order ID</th><th>Customer ID</th><th>Product ID</th><th>Order Date</th><th>Order Delivery Date</th><th>Product Quantity</th><th>Actions</th></tr> ";  
        while($row = mysql_fetch_array($result))  
		{  
            echo "<tr>";  
            echo "<td>".$row["orderid"]."</td>";  
            echo "<td>".$row["id"]."</td>";  
            echo "<td>".$row["stockid"]."</td>";  
			echo "<td>".$row["orderdate"]."</td>";
			echo "<td>".$row["orderdel"]."</td>";
			echo "<td>".$row["quantity"]."</td>";
            echo "<td><a href=ProductOrderDelete.php?orderid=".$row["orderid"].">Delete</a></td>";  
            echo "</tr>";  
        }  
            echo "</table>";  
    }  
 
mysql_free_result($result);  
}  
else 
{
    echo "Error in query: $query. ".mysql_error();  
}  
 
mysql_close($con);  
?>  
 
 </div>           
<div class="clear2"></div>
</div>
</div>      
      
   <?php
require_once('adminSidebar.html'); 

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