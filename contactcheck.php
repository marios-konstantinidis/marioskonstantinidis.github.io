<?php
/* Set e-mail recipient */
$myemail  = "mkmarios@hotmail.com";

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['yourname'], "Enter your name");

$email    = check_input($_POST['email']);

$likeit   = check_input($_POST['likeit']);
$how_find = check_input($_POST['how']);
$comments = check_input($_POST['comments'], "Write your comments");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* If URL is not valid set $website to empty */
if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $website))
{
    $website = '';
}

/* Let's prepare the message for the e-mail */
$message = "Hello!

Your contact form has been submitted by:

Name: $yourname
E-mail: $email
URL: $website

what do you need help with? $likeit
How did he/she find it? $how_find

Comments:
$comments

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks.php');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>


    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                                <h1><a href="index.html">Eco Pc Technologies</a></h1>
                                <h2>Providing professional computer repair services</h2>
                            </hgroup>
                        </div>
                    </article>
                    <article class="grid_6">
                        <div class="wrapper">
                            <div class="fright size-1 indent-top1">
                                <span class="color-1">Support&nbsp;</span> info@eco_pc.com
                            </div>
                        </div>
                    </article>
                    
      
                    <div class="clear"></div>
                    <article class="grid_12">
                        <nav>
                          <ul class="menu">
                             <li class="first"><a class="active" href="index.php">Home</a></li>
<li><a href="about.php">About Us</a></li>
<li><a href="service.php">Services</a></li>
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
        <section id="content">
            <div class="main">
            	<div class="container_12">
                
<div class="content_box">
    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>
<p><a href="contact.php"><span>Back</span></a></p>
      
          
    </div> 
           
</div>

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
<?php
exit();
}
?>
</body>
</html>