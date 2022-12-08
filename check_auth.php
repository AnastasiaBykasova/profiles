<link rel="stylesheet" href="style.css">
<?php
if(!$session_user){
	echo '<div class="auth-needed">'."Необходимо авторизоваться.".'</div>';
	exit;
}
echo '<a class="style-button" href="template.php">На главную</a>';
?>
