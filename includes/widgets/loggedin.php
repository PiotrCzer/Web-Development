<link href="CSS/index.css" type="text/css" rel="stylesheet" />
<div id="loggedin">
	<h3 id="userli">Hello, <?php echo $user_data['username']; ?>!</h3>
		<div id="loggedinlinks">
		<ul>
			<li><a href="logout.php" id="loggedinlinks">Log out</a><li>
			<li><a href="changepassword.php" id="loggedinlinks">Change password</a></li>
			<li><a href="settings.php" id="loggedinlinks">Settings</a></li>
		</ul>
		</div>
</div>

<div id="search_box" align="center">
        <input id="textinput" type="text" name="search_terms" placeholder="Search A Trend" autofocus="autofocus" onkeydown="if (event.keyCode == 13) 
                  document.getElementById('search_button').click()" />
         <button id="search_button" align="center">Search</button>
</div>

