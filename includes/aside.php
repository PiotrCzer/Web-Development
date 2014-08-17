
<aside id="aside">
	
	<?php 
	if (logged_in() === true){
		include 'includes/widgets/loggedin.php';
		include 'includes/widgets/user_count.php';
	}else {
	include 'includes/widgets/login.php'; 
	}
	
	?>
	
<aside>