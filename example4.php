<?php
include "example3.php"; #include_once #require

$conn_id = db_connect();
print("Connected.\n");

mysql_close($conn_id);
print("Disconnected.\n");
?>