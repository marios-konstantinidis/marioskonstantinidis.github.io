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
<style type="text/css">
#page3 form table tr td {
	color: #9C3;
}
#page3 form table tr td {
	color: #00F;
	font-size: 16px;
	text-align: right;
	font-family: "Palatino Linotype";
}
</style>
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
                                 	<FORM METHOD='link' ACTION="Login.php">
			<INPUT TYPE="submit" VALUE="Login">
	 </FORM>
	
			<FORM METHOD='link' ACTION='add.php'>
			<INPUT TYPE='submit' VALUE='Register'>
			</FORM>
                            </div>
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
<?php 

 //Establish connection with hostname using your username and password
	if(!($connection = @mysql_connect('mysql11.000webhost.com','a2544598_actech','maddogskate2')))
	die("Cannot Connect (Check Database Settings)");
	
	if(!(@mysql_select_db('a2544598_actech',$connection)))
	showerror();

 //This code runs if the form has been submitted
 if (isset($_POST['submit'])) { 

 //This makes sure they did not leave any fields blank
 if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {
 		die('You did not complete all of the required fields');
 	}

 // checks if the username is in use
 	if (!get_magic_quotes_gpc()) {
 		$_POST['username'] = addslashes($_POST['username']);
 	}
 $usercheck = $_POST['username'];
 $check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") 
or die(mysql_error());
 $check2 = mysql_num_rows($check);

 //if the name exists it gives an error
 if ($check2 != 0) {
 		die('Sorry, the username '.$_POST['username'].' is already in use.'); 								
				}

 // this makes sure both passwords entered match
 	if ($_POST['pass'] != $_POST['pass2']) {
 		die('Your passwords did not match. ');
 	}

 	// here we encrypt the password and add slashes if needed
 	$_POST['pass'] = md5($_POST['pass']);
 	if (!get_magic_quotes_gpc()) {
 		$_POST['pass'] = addslashes($_POST['pass']);
 		$_POST['username'] = addslashes($_POST['username']);
 			}

 // now we insert it into the database
 	$insert = "INSERT INTO users (username, password,name,surname,tel,address,postcode)
 			VALUES ('".$_POST['username']."', '".$_POST['pass']."', '".$_POST['name']."', '".$_POST['surname']."', '".$_POST['tel']."', '".$_POST['address']."', '".$_POST['postcode']."')";
 	$add_member = mysql_query($insert);
 	?>

 
 <h1>Registered</h1>
 <p>Thank you, you have registered - you may now login</a>.</p>
  
 <?php 
 } 
 else 
 {
	 	
 ?>
<div id="content">
 <div id="form1">
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 <table border="0" align="center">
 <tr><td>Username:</td><td nowrap>
 <input type="text" name="username" maxlength="60">
 </td></tr>
 <tr><td>Password:</td><td>
 <input type="password" name="pass" maxlength="10">
 </td></tr>
 <tr><td>Confirm Password:</td><td>
 <input type="password" name="pass2" maxlength="10">
 </td></tr>
<tr><td>Name:</td><td>
 <input type="text" name="name" maxlength="60">
 </td></tr>
 <tr><td>Surname:</td><td>
 <input type="text" name="surname" maxlength="60">
 </td></tr>
 <tr><td>Telephone:</td><td>
 <input type="text" name="tel" maxlength="60">
 </td></tr>
 <tr><td>Address:</td><td>
 <input type="text" name="address" maxlength="60">
 </td></tr>
 <tr><td>Postcode:</td><td>
 <input type="text" name="postcode" maxlength="60">
 </td></tr>
 <tr><th colspan="2" align="right"><input type="submit" name="submit" value="Register"></th></tr> </table>
</form>
</div>
</div>
 <?php
 }
 ?> 

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