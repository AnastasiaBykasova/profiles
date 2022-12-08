<?php
include "example3.php"; #include_once

$conn_id = db_connect();

$result_id = mysql_query ("SELECT name, birth, foods FROM profile", $conn_id);

if (!$result_id)
	die ("Oops, the query failed\n");

while($row = mysqli_fetch_row($result_id)){
	while(list($key, $value) = each($row)){
		if(!isset($row[$key]))
			$row[$key] = "null";
	}
	print ("name: $row[0], birth: $row[1], foods: $row[2]\n");
}

print(mysqli_num_rows($result_id) . " rows were returned\n.");
mysqli_free_result($result_id);

mysqli_close($conn_id);
?>