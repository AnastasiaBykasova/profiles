<?php
function db_connect(){
	$db_name = "db";
	$host_name = "localhost";
	$user_name = "user";
	$password = "pass";
	$conn_id = @mysql_connect($host_name, $user_name, $password);

	if(!$conn_id){
		die(sprintf("Cannot connect to server: %s (%d)\n.",
			htmlspecialchars(mysql_error()),
			mysql_errno()));
	}

	if (!@mysql_select_db($db_name)){
		die(sprintf("Cannot select database: %s (%d)\n.",
		htmlspecialchars(mysql_error($conn_id)),
		mysql_errno($conn_id)));
	}
	
	return $conn_id;
}
?>