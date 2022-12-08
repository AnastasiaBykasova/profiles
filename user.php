<?php
require("connectdb.php");
require("session.php");
require("check_auth.php");

if(!isset($_GET["id"])){
	echo "Укажите идентификатор пользователя.";
	exit;
}

$result = mysqli_query($connect , "SELECT * FROM users WHERE id=".$_GET["id"]);

if (!$result || !mysqli_num_rows($result)) {
	echo "Такого пользователя не существует.";
	exit;
}

$user = mysqli_fetch_assoc($result);
$pages = array();
$result = mysqli_query($connect , "SELECT * FROM pages WHERE user_id = ".$user["id"]);


if ($result) {
	while($page = mysqli_fetch_assoc($result)) {
		$pages[] = $page;
	}
}

$title = "Страница пользователя";
$content = "<p>".$user["name"]." [".$user["login"]."]</p>";
$content .= "<h2>Страницы пользователя</h2>";

if(count($pages)) {
	$content .= "<ul>";
	foreach($pages as $page){
		$content .= "<li><a href =\"page.php?id=".$page["id"]."\">".$page["title"]."</a></li>";
	}
	$content .= "</ul>";
} 
else{
	$content .= "<p>У данного пользователя еще нет страниц.</p>";
}

require("template.php");
?>