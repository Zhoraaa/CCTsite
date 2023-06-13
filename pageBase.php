<?php
// Подключение базы по внешней функции
require ("./functions/connect.php");

// Достаём нвигацию
require ("./functions/getNav.php");

// Достаём информацию об авторизованом пользователе, если есть соответствующая кукa
if (isset($_COOKIE['user'])) {
    // Записываем инфу о пользователе в ассоциативный масиив
    $userInfo = mysqli_fetch_assoc($con->query("SELECT * FROM users WHERE id=" . $_COOKIE['user']));
    // Ключи полученного массива: id, name, login, pass
    // Требуется добавить ключи на почту, роль в системе и дату регистрации
}

?>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CaCuTi</title>

    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/fonts.css">
    <script type="text/javascript" src="./scripts.js"></script>
</head>

<body>
    <!-- Предупреждение о необходимости использования JS -->
    <noscript class="ctrl-j">В вашем браузере выключено использование JavaScript. Некоторые функции сайта могут быть недоступны. Во избежание проблем с работой сайта включите использование Javascript в настройках браузера и обновите страницу.</noscript>
    <!-- Предохранитель на случай поломки стилей -->
    <p class="hide">Если вы видите этот текст, нажмите <a href="#" onclick="window.reload();">здесь</a></p>
    <!-- Адаптивный фон -->
    <div class="background">
        <img src="./img/background.png" alt="">
    </div>