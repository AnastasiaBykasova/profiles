<?php
require("connectdb.php");
require("session.php");
require("check_auth.php");

if(!isset($_GET["id"])){
    echo "Не указан идентификатор страницы.";
    exit;
}
mysqli_query($connect, "DELETE FROM pages WHERE id=".$_GET["id"]);
        
header("Location: allpages.php");

require("template.php");
?>