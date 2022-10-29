<?php
include "example3.php"; #include_once

$conn_id = db_connect();

function sql_quote($str){
	return (isset($str) ? "'" . mysql_escape_string($str) . "'" : "null");
}

unset($null);

$stmt = sprintf("
	INSERT INTO profile (name,birth,color,foods,cats) VALUES (%s, %s, %s, %s, %s)",
	sql_quote("De'Mont"),
	sql_quote("1973-01-12"),
	sql_quote($null),
	sql_quote("eggroll"),
	sql_quote(4));

$result_id = mysql_query($stmt, $conn_id);

print(mysqli_num_rows($result_id) . " rows were returned\n.");
mysqli_free_result($result_id);

mysqli_close($conn_id);
?>