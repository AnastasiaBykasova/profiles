<?php
function db_connect(){
	$db_name = "std_1992_profile";
	$host_name = "std-mysql";
	$user_name = "std_1992_profile";
	$password = "12345678";
	$conn_id = @mysqli_connect($host_name, $user_name, $password);

	if(!$conn_id){
		die(sprintf("Cannot connect to server: %s (%d)\n.",
			htmlspecialchars(mysql_error()),
			mysql_errno()));
	}

	if (!@mysql_select_db($db_name)){
		die(sprintf("Cannot select database: %s (%d)\n.",
		htmlspecialchars(mysqli_error($conn_id)),
		mysqli_errno($conn_id)));
	}
	
	return $conn_id;
}
?>