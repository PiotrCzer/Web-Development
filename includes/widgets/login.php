<?php
echo "<link rel='stylesheet' type='text/css' href='CSS/index.css' />";  
?>
<div id="login">
	<div id="loginform">
		<form action="login.php" method="post">
			<table>
				<tr><td id="username_password"><input type="text" name="username" id="uname" placeholder="Username"></td>
					<td id="username_password"><input type="password" name="password" id="pass" placeholder="Password"></td>
					<td><input type="submit" value="Log in" id="loginbtn"></td>
					<td><a href="register.php"><input type="button" value="Register" id="registerbtn"></a></td>
				</tr>
			</table>
		</form>
	</div>
</div>