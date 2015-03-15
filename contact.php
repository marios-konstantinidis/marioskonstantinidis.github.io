<!DOCTYPE html>
<html lang="en">
<head>
    <title> Eco-Pc</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
    <script src="js/jquery-1.7.min.js" type="text/javascript"></script>
    <script src="js/superfish.js" type="text/javascript"></script>
    <script src="js/jquery.hoverIntent.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script> 
    <script src="js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/forms.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		$('#form1').forms({
		 ownerEmail:'#'
		 })
		})
	</script>
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
<body id="page6">
   <!--=========================================header=============================================-->
        <header class="border-2">

   </div>
    
    <div class="cleaner"></div>
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
 			 echo "You are logged in<p>"; 
 
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
                    </article>
                    <div class="clear"></div>
                    <article class="grid_12">
                        <nav>
                          <ul class="menu">
                    <li class="first"><a  href="index.php">Home</a></li>
<li><a href="about.php">About Us</a></li>
<li><a href="service.php">Services</a></li>
<li><a href="datarecovery.php">Data Recovery</a></li>
<li><a href="technews.php" class="selected">Tech-News</a></li>
<li><a class="active" href="contact.php" class="selected">Contact</a></li>
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
						<article class="grid_5">
							<div class="border-1 indent-bottom1 margin-bot5">
								<h3>Contact Info</h3>
							</div>
                            <figure class="map">
              <div style="width: 500px">       <iframe width="325" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=4a+Nireos,+Limassol,+Cyprus&amp;aq=0&amp;oq=nireos+4a+&amp;sll=37.0625,-95.677068&amp;sspn=44.204685,105.732422&amp;ie=UTF8&amp;hq=&amp;hnear=Nireos,+Limassol,+Cyprus&amp;ll=34.669823,33.003861&amp;spn=0.011259,0.025814&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=4a+Nireos,+Limassol,+Cyprus&amp;aq=0&amp;oq=nireos+4a+&amp;sll=37.0625,-95.677068&amp;sspn=44.204685,105.732422&amp;ie=UTF8&amp;hq=&amp;hnear=Nireos,+Limassol,+Cyprus&amp;ll=34.669823,33.003861&amp;spn=0.011259,0.025814&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>  
           
</div>

                            </figure>
                            <dl class="dl-1">
                                
                               
                               <dd><span>Telephone:</span>+357-97888520</dd>
                               
                                <dd>E-mail: <a class="link color-6" href="#"><strong>info@actechcy.com</strong></a></dd>
                            </dl>
						</article>
						<article class="grid_7">
							<div class="border-1 indent-bottom1 margin-bot5">
								<h3>Get In Touch</h3>
							</div>
 <div id="cp_contact_form">                        <!-- Do not change code! -->
<form action="contactcheck.php" method="post">
<p><b>Your Name:</b> <input type="text" name="yourname" /><br />

<b>E-mail:</b> <input type="text" name="email" /><br />

<p>How did you find us?
<select name="how">
<option value=""> -- Please select -- </option>
<option>Suggested by a friend</option>
<option>From Web</option>
<option>Facebook</option>
<option>Leaflets</option>
<option>Other</option>
</select>

<p>what do you need help with?
<input type="radio" name="likeit" value="Repair" checked="checked" /> Repair
<input type="radio" name="likeit" value="Sale" /> Sale
<input type="radio" name="likeit" value="Support" /> Support</p>



<p><b>Your comments:</b><br />
<textarea name="comments" rows="10" cols="40"></textarea></p>

<p>&nbsp;</p>
<p><input type="reset" value="Reset Form" name="submit"></p>
<p><input type="submit" value="Submit Form" name="submit2" /></p>

</form>
</div>
<!-- Do not change code! -->

						</article>
					</div>
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
                                       <li><a  href="index.html">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="service.php">Services</a></li>
                                    <li><a href="datarecovery.php">Data Recovery</a></li>
                                    <li><a href="technews.php">Tech-News</a></li>
                                    <li><a class="active" href="contact.php">Contact</a></li>
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