<?php
echo "<link rel='stylesheet' type='text/css' href='css/screen.css' />";  
?>
<?php
include 'Login/core/init.php';
?>
<?php 
include 'Login/includes/overall/header.php'; 
?>	
<?php

$url = 'back.jpg';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <title>TrendMash</title>
   </head>
   <link rel="stylesheet" type="text/css" href="CSS/style.css">
   <link href='http://fonts.googleapis.com/css?family=Oregano' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <link href="CSS/index.css" type="text/css" rel="stylesheet" />
   <link href="CSS/tweet.css" type="text/css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Finger+Paint' rel='stylesheet' type='text/css'>
   <script src="Javascript/jquery.min.js"></script> 
   <script src="Javascript/ajax.js"></script> 
   <body>
      <div id="wrapper">
         <div id="header">
            <p id="logo" align="center">TrendMash</p>
         </div>
         <div id="content">
            <p id="title" align="center">Please Enter the Trend you would like to search for.</p>
            <p id="login"> <a href="Login/index.php" id="loginRef">Login</a> </p>
            <div id="icons" align="center"> 
               <a href="https://twitter.com/"><img src="images/twitter.png" alt="twitter" height="40px" id="twitter1" target="_blank"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <a href="https://flickr.com"><img src="images/flickr.png" alt="flckr" height="40px" id="flickr" target="_blank"></a>
            </div>
            <div id="search_box" align="center">
               <input id="textinput" type="text" name="search_terms" autofocus="autofocus" onkeydown="if (event.keyCode == 13) 
                  document.getElementById('search_button').click()" />
               <button id="search_button" align="center">Search</button>
               <div id="top">
               </div>
            </div>
            <div id="results_wrapper">
               <div id="search_results"></div>
               <div id="search_results1"></div>
            </div>
         </div>
         <a href="#"><img src="images/up.png" alt="up" id="up"></a>
      </div>
      </div>
      </div>
   </body>
</html>

				
<?php 
include 'Login/includes/overall/footerr.php'; 
?>
