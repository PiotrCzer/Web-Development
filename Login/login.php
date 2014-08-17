<?php

include 'core/init.php';
logged_in_redirect();

if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'You need to enter a Username and Password.';
	} else if (user_exists($username) === false) {
		$errors[] = 'We cant find that username. Have you registered?';
	}else if (user_active($username) === false){
		$errors[] = 'You havent activated your account!';
	}else {
		
		if(strlen($password) > 32){
			$errors[] = 'Password too long';
		}
		
		
		$login = login($username, $password);
		if ($login === false) {
			$errors[] = 'That username/password combination is incorrect';
		}else{
			
			$_SESSION['user_id'] = $login;
			header('Location: index.php');
			exit();
		}
	}
}else {
	$errors[] = 'No data received';
}
include 'includes/overall/header.php';
if (empty($errors) === false) {
?>
<html lang="en">
<head>
<style type="text/css">
body
{
background-image:url('<?php echo $url ?>');
}
</style>

</head>

<body>
</body>
</html>
	<h3 class="errors1">We tried to log you in, but...</h3>
<div class="errors2">
	<?php 
	echo output_errors($errors);
	
}
include 'includes/overall/footer.php';
?>
</div>