<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="button.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,500&family=Nabla&family=Open+Sans:ital,wght@0,400;0,500;1,400;1,500&family=Poppins&display=swap" rel="stylesheet">
    <title>Главная</title>
</head>
<body>
    <header> 
        <div class="header">
            <div class="container">
                <div class="header-line">
                    <div class="nav">
                        <a data-content="Home" href="@">Home</a>
                        <a data-content="DataBase" href="database_1.php">DataBase</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="elements">
            <div class="text-desc">
                <p>Make today so awesome that yesterday gets jealous</p>
            </div>
        </div>
    </main>
    <footer>
        <a name="go-to-footer"></a>
        <div class="down-line">
            <div class="bottom-items">
                <a class="my-name">&#9802; Анастасия Быкасова, 211-361</a>
                <a class="text-email">&#9993; Почта:</a>
                <a class="email" href="#">nastybykasova@gmail.com</a>
                <a class="text-phone">&#9990; Телефон:</a>
                <a class="number-phone" href="#">+7(999)999-99-99</a>
                <a class = "foot-date" href="#"><?php require "date.php" ?></a>
            </div>
        </div>
    </footer>  
</body>
</html>
