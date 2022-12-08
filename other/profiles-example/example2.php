<!-- Пример PHP-сценария. -->
<html>
<head><title>A simple page</title></head>
<body>
<p>
<?php
	#Соединение с сервером.
	#std-mysql.ist.mospolytech.ru:3306
	if(!($conn_id = @mysql_connect("std-mysql", "std_1992_profile", "12345678"))) #mysql_pconnect()
		die("Cannot connect to server.\n");
	
	print("Connected.\n");
	
	if(!@mysqli_select_db("std_1992_profile", $conn_id))
		die("Cannot select database.\n");

	mysqli_close($conn_id);
	
	print("Disconnected.\n");
?>
</p>
</body>
</html>