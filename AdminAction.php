<?php
session_start();

// (1) Use include to database connection and select database
$con = mysql_connect("mysql11.000webhost.com", "a2544598_actech", "maddogskate2") or die(mysql_error());
	mysql_select_db("a2544598_actech") or die("Unable to select database!");   

// (2) Collect data from form and save in variables

$username = $_POST["login1"];
$password = $_POST["login2"];

if (empty($username))
 {
   print "please enter your admin username";
   exit;  //Not good as script just exits
 }
 else if (empty($password))
 {
   print "please enter your admin password";
   exit;  //Not good as script just exits
 }
 else if ($username!= 'admin')
 {
   print "Not valid username";
   exit; //Not good as script just exits
 }
 else if ($password!= 'admin')
 {
   print "Not valid password";
 } 

 
else

 {
$_SESSION["authenticatedUser"] = $username;
// Relocate to the logged-in page
header("Location: adminIndex.php");
} 
?>