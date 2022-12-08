<?php
require("connectdb.php");
require("session.php");
require("check_auth.php");

if(!empty($_POST)){
    $id = null;
    
    if(!isset($_GET["id"])){
        mysqli_query($connect, "INSERT INTO pages (title, content, user_id) VALUES (
            \"".mysqli_escape_string($connect, $_POST["title"])."\", 
            \"".mysqli_escape_string($connect, $_POST["content"])."\",
            ".$session_user["id"]."
            )"
        );
        
        $id = mysqli_insert_id($connect);
    }
    else{
        mysqli_query($connect, "UPDATE pages SET 
            title = \"".mysqli_escape_string($connect, $_POST["title"])."\", 
            content = \"".mysqli_escape_string($connect, $_POST["content"])."\" 
            WHERE id=".$_GET["id"]
        );
        
        $id = $_GET["id"];
    }

    header("Location: page.php?id=".$id);
    exit;
}

$title = "";
$titleValue = "";
$contentValue = "";

if(isset($_GET["id"])){
    $result = mysqli_query($connect, "SELECT * FROM pages WHERE id=".$_GET["id"]);
    
    if(!$result || mysqli_num_rows($result) == 0){
        echo "Такой страницы не существует";
        exit;
    }
    
    $page = mysqli_fetch_assoc($result);
    $titleValue = $page["title"];
    $contentValue = $page["content"];
    $title = "Редактирование страницы";
}
else{
    $title = "Создание новой страницы";
}

$content = "
<form method=\"POST\">
    <div>
        <label>Заголовок</label>
        <input type=\"text\" name=\"title\" value=\"".$titleValue."\" id=\"input-title\">
    </div>
    
    <div>
        <label>Содержимое</label>
        <textarea name=\"content\" id=\"input-content\">".$contentValue."</textarea>
    </div>
    
    <div>
        <button type=\"submit\">Сохранить</button>
    </div>
</form>
";

require("template.php");
?>