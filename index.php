<?php
include("pageBase.php");
?>
<!-- Главная, логотип явлется ссылкой на перезагрузку, появится в случае ошибки подгрузки стилей -->
<div class="content center f-dir-column ctrl-j">
    <a href="/"><img src="./img/logo.png" alt="Перезагрузить страницу" title="#CaCuTi" class="logo"></a>
    <!-- Приветка для не авторизованного пользователя, Текст берётся из БД -->
    <?php
    $server_info = $con->query("SELECT * FROM server_info");
    $server_info = mysqli_fetch_assoc($server_info);
    ?>
    <h1><?= $server_info["name"]; ?></h1>
    <!-- Приветка для авторизованного пользователя -->
    <?php
    if (isset($_COOKIE['user'])) {
    ?>
        <div class="wrapper">
            <p>Ку, <?= $userInfo['name']; ?>! Это главная страница сайта, сейчас ты авторизован, но можешь <a href="./user/exit.php">разлогиниться</a>.<br>Либо войти в <a href="../per-area.php">личный кабинет</a>.</p>
        </div>
    <?php
    } else {
        ?>
        <div class="wrapper ta-center">
            <p><?= $server_info["description"]; ?></p>
        </div>
    <?php
    }
    ?>
    <!-- Кнопки для навигации, текст и ссылки берутся из JSON -->
    <div class="btns">
        <?php
        require ("./functions/getNav.php");

        foreach ($nav as $navLink) {
        ?>
            <a href="<?= $navLink["link"]; ?>"><button class="neon-block"><?= $navLink["name"]; ?></button></a>
        <?php
        }
        ?>
        <button class="neon-block" onclick="getIP()">IP сервера</button>
    </div>
    <div class="social"><!-- Ссылки на соцсети из таблицы `social` --></div>
</div>