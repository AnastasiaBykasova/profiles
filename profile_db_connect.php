<?php
include_once "MySQL_Access.php";

class Profile_DB_Access extends MySQL_Access{
	var $host_name = "localhost";
	var $user_name = "user";
	var $password = "pass";
	var $db_name = "my_db";
}
?>