<?php
function update_user($update_data) {
	global $session_user_id;
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	mysql_query("UPDATE `login_admin` SET " . implode(', ', $update) . " WHERE `user_id` = $session_user_id");
	
	
}

function change_password($user_id, $password) {
	$user_id = (int)$user_id;
	$password = md5($password);
	
	mysql_query("UPDATE `login_admin` SET `password` = '$password' WHERE `user_id` = $user_id");

}

function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	mysql_query("INSERT INTO `login_admin` ($fields) VALUES ($data) ");
	email($rgister_data['email'], 'Activate your account', "Hello " . $register_data['first_name'] . ",\n\nYou need to activate your account, please use the link below:\n\n http://trendmashing.gopagoda.com/Login/activate.php?email=" .$register_data['email'] . "&email_code=" . $register_data['email_code'] . "\n\n link - TrendMash
	");
}

function user_count() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `login_admin` WHERE `active` =1"), 0);
}

function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
	
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `login_admin` WHERE `user_id` = $user_id"));
	
		return $data;
	
	}
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}


function user_exists($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `login_admin` WHERE `username` = '$username'");
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `login_admin` WHERE `username` = '$username'"), 0) ==1) ? true : false;
}

function email_exists($email) {
	$email = sanitize($email);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `login_admin` WHERE `email` = '$email'"), 0) ==1) ? true : false;
}


function user_active($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `login_admin` WHERE `username` = '$username' AND `active` = 1");
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `login_admin` WHERE `username` = '$username' AND `active`"), 0) ==1) ? true : false;
}

function user_id_from_username($username){
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `login_admin` WHERE `username` = '$username'"), 0, 'user_id');
}


function login($username, $password){
	$user_id = user_id_from_username($username);
	
	$username = sanitize($username);
	$password = md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `login_admin` WHERE `username` = '$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
	
}

?>
