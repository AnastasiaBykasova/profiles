<?php
require("connectdb.php");
//require("session.php");

$result = mysqli_query($connect, "SELECT * FROM pages WHERE 1");

$title = "Все страницы";
$content = "";

if(!$result || mysqli_num_rows($result) == 0){
	$content = "В базе данных нет страниц.";
}
else{
    $content = "<ul>";
    while($page = mysqli_fetch_assoc($result)){
        $content .= "<li>
        <a href=\"page.php?id=".$page["id"]."\">
        ".$page["title"]."
        </a>
        |
        <a href=\"create_update.php?id=".$page["id"]."\">
        Редактировать
        </a>
        |
        <a href=\"delete.php?id=".$page["id"]."\">
        Удалить
        </a>
        </li>";   
    }
    $content .= "</ul>";
}


require("template.php");

?>