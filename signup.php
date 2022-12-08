<?php
require("connectdb.php");
//require("session.php");

if (!empty($_POST)){
    $result = mysqli_query($connect, "SELECT * FROM users WHERE login=\"".$_POST['login']."\"");
    //echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0){
        mysqli_query($connect, "INSERT INTO users (name, login, password) VALUES (
            \"".$_POST["name"]."\", 
            \"".$_POST["login"]."\",
            \"".md5($_POST["password"])."\"
            )"
        );
    }
    //$id = mysqli_insert_id($connect);
    header("Location: allpages.php");
}

$title = "Регистрация";
$content = "
<form method=\"POST\">
    <div>
        <label>ФИО</label>
        <input type=\"text\" name=\"name\">
    </div>
    
    <div>
        <label>Логин</label>
        <input type=\"text\" name=\"login\">
    </div>
    
    <div>
        <label>Пароль</label>
        <input type=\"password\" name=\"password\">
    </div>
    
    <div>
        <button type=\"submit\" class=\"submit-btn\">Регистрация</button>
    </div>
</form>
";

require("template.php");

?>