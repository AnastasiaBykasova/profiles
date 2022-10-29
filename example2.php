<!-- Пример PHP-сценария. -->
<html>
<head><title>A simple page</title></head>
<body>
<p>
<?php
	#Соединение с сервером.
	#std-mysql.ist.mospolytech.ru:3306
	if(!($conn_id = @mysql_connect("localhost", "user", "pass"))) #mysql_pconnect()
		die("Cannot connect to server.\n");
	
	print("Connected.\n");
	
	if(!@mysql_select_db("db", $conn_id))
		die("Cannot select database.\n");

	mysql_close($conn_id);
	
	print("Disconnected.\n");
?>
</p>
</body>
</html>