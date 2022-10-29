<?php
include "example3.php";

$conn_id = db_connect();

#Пример запроса, возвращающего множество строк: либо false, либо идентификатор результата.
result_id = mysql_query ("SELECT id, name, cats FROM profile", $conn_id);

if (!$result_id)
	die ("The query failed.");

while($row = mysql_fetch_row($result_id))
	print("id: $row[0], name: $row[1], cats: $row[2]\n.");

//while($row = mysql_fetch_array($result_id)){
//	print("id: $row[id], name: $row[name], cats: $row[cats]\n.");
//	printf ("id: %s, name: %s, cats: %s\n.", $row["id"], $row["name"], $row["cats"]);
//}

//while($row = mysql_fetch_object($result_id))
//	print ("id: $row->id, name: $row->name, cats: $row->cats\n.");

mysqli_free_result($result_id);
mysqli_close($conn_id);
?>