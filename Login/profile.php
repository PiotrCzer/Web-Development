<?php
echo "<link rel='stylesheet' type='text/css' href='css/screen.css' />";  
?>
<?php
include 'core/init.php';
include 'includes/overall/header.php'; 

if (isset($_GET['username']) === true && empty($_GET['username']) === false)  {
	$username = $_GET['username'];
	
	echo $username;
}else{
	header('Location: index.php');
	exit();
}

include 'includes/overall/footerr.php'; 
?>