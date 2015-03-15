<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
    <script src="js/jquery-1.7.min.js" type="text/javascript"></script>
    <script src="js/superfish.js" type="text/javascript"></script>
    <script src="js/jquery.hoverIntent.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script> 
    <script src="js/script.js" type="text/javascript"></script>
	<!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
        	<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
	<![endif]-->
    <!--[if lt IE 9]>
	    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
   		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
</head>
<body id="page3">
   <!--=========================================header=============================================-->
        <header class="border-2">
            <div class="main indent-bottom">
                <div class="container_12">
                    <article class="grid_6">
                        <div class="indent-top">
                            <hgroup>
                                <h1><a href="index.html">Eco pc Technologies</a></h1>
                                <h2>Providing professional computer repair services</h2>
                            </hgroup>
                        </div>
                    </article>
                    <article class="grid_6">
                        <div class="wrapper">
                            <div class="fright size-1 indent-top1">
                                <span class="color-1">Support&nbsp;</span> info@eco_pc.com

                        </div>
                    </article>
                    
      
                    <div class="clear"></div>
                    <article class="grid_12">
                        <nav>
                          <ul class="menu">
                             <li class="first"><a  href="index.php">Home</a></li>
<li><a href="about.php">About Us</a></li>
<li><a class="active" href="service.php">Services</a></li>
<li><a href="datarecovery.php">Data Recovery</a></li>
<li><a href="technews.php" class="selected">Tech-News</a></li>
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

<div id="content">
    
<div class="content_box">
<?php 
 
 //Establish connection with hostname using your username and password
	if(!($connection = @mysql_connect('mysql11.000webhost.com','a2544598_actech','maddogskate2')))
	die("Cannot Connect (Check Database Settings)");
	
	
	if (mysql_query("CREATE DATABASE actech",$connection))
	  {
	  
	  }
	else
	  {
	  
	  }
	
	if(!(@mysql_select_db('a2544598_actech',$connection)))
	showerror();
	

	
		
  
 //Checks if there is a login cookie
 if(isset($_COOKIE['ID_my_site']))

 //if there is, it logs you in and directes you to the members page
 { 
 	$username = $_COOKIE['ID_my_site']; 
 	$pass = $_COOKIE['Key_my_site'];
 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
 	while($info = mysql_fetch_array( $check )) 	
 		{
 		if ($pass != $info['password']) 
 			{
 			 			}
 		else
 			{
 			header("Location: index.php");

 			}
 		}
 }

 //if the login form is submitted 
 if (isset($_POST['submit'])) { // if form has been submitted

 // makes sure they filled it in
 	if(!$_POST['username'] | !$_POST['pass']) {
 		die('You did not fill in a required field.<a href=Login.php>');
 	}
 	// checks it against the database

 	//if (!get_magic_quotes_gpc()) {
 	//	$_POST['email'] = addslashes($_POST['email']);
 	//}
 	$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());

 //Gives error if user dosen't exist
 $check2 = mysql_num_rows($check);
 if ($check2 == 0) {
 		die('That user does not exist in our database. <a href=add.php>Click Here to Register</a>');
 				}
 while($info = mysql_fetch_array( $check )) 	
 {
 $_POST['pass'] = stripslashes($_POST['pass']);
 	$info['password'] = stripslashes($info['password']);
 	$_POST['pass'] = md5($_POST['pass']);

 //gives error if the password is wrong
 	if ($_POST['pass'] != $info['password']) {
 		die('Incorrect password, please try again.');
 	}
	
	else 
 { 
 
 // if login is ok then we add a cookie 
 	 $_POST['username'] = stripslashes($_POST['username']); 
 	 $hour = time() + 3600; 
 setcookie(ID_my_site, $_POST['username'], $hour); 
 setcookie(Key_my_site, $_POST['pass'], $hour);	 
 $_SESSION["logged"] = 1;
		$_SESSION["user_id"] = $id;
 //then redirect them to the members area 
 header("Location: index.php"); 
 } 
 } 
 } 
 else 
{	 
 
 // if they are not logged in 
 ?> 
 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
 <table border="0"> 
 <tr><td colspan=2><h1>Login</h1></td></tr> 
 <tr><td>Username:</td><td> 
 <input type="text" name="username" maxlength="40"> 
 </td></tr> 
 <tr><td>Password:</td><td> 
 <input type="password" name="pass" maxlength="50"> 
 </td></tr> 
 <tr><td colspan="2" align="left"> 
 <input type="submit" name="submit" value="Login"> 
 </td></tr> 
 </table> 
 </form> 
 
 <?php 
 } 
 
 ?>
 <FORM METHOD='link' ACTION='add.php'>
   <input type='submit' value='Register'>
 </FORM>       
     
           
</div>
            </div>
		</section>
    <!--==============================footer================================-->
    <footer>
        <div class="">
            <div class="main">
                <div class="container_12">
                    <div class="wrapper">
                    	<article class="grid_12">
                            <nav>
                                <ul>
                                     <li><a class="active" href="index.html">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="service.php">Services</a></li>
                                    <li><a href="datarecovery.php">Data Recovery</a></li>
                                    <li><a href="technews.php">Tech-News</a></li>
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