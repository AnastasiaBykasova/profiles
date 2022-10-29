<?php
include "example3.php.php"; #include_once

$conn_id = db_connect();

#Пример запроса, изменяющего таблицу: либо false, либо true.
$result_id = mysql_query("DELETE FROM profile WHERE cats = 0", $conn_id);

if (!$result_id)
	die("The query failed.");

print(mysql_affected_rows($conn_id) . " rows were deleted.\n");

mysql_close($conn_id);
?>