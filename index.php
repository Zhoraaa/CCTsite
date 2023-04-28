<?php
include("pageBase.php");
?>
<!-- Главная, логотип явлется ссылкой на перезагрузку, появится в случае ошибки подгрузки стилей -->
<div class="content f-dir-column ctrl-j">
    <a href="/"><img src="./img/logo.png" alt="Перезагрузить страницу" title="#CaCuTi" class="logo"></a>
    <!-- Приветка для не авторизованного пользователя, Текст берётся из БД -->
    <?php
    $server_info = $cctdb->query("SELECT * FROM server_info");
    $server_info = mysqli_fetch_assoc($server_info);
    ?>
    <h1><?= $server_info["name"]; ?></h1>
    <!-- Приветка для авторизованного пользователя -->
    <?php
    if (isset($_COOKIE['user'])) :
        $q_navigation = "SELECT * FROM navigation WHERE `name` != 'Войти';";
    ?>
        <div class="wrapper">
            <p>Ку, <?= $userInfo['name']; ?>! Это главная страница сайта, сейчас ты авторизован, но можешь <a href="./functions/exit.php">разлогиниться</a>.<br>Либо войти в <a href="../pages/per-area.php">личный кабинет</a>.</p>
        </div>
    <?php else :
        // Создание запроса на полную выборку из таблицы для навигации
        $query = "SELECT * FROM navigation"; ?>
        <div class="wrapper ta-center">
            <p><?= $server_info["description"]; ?></p>
        </div>
    <?php
    endif;
    ?>
    <!-- Кнопки для навигации, текст и ссылки берутся из БД -->
    <div class="btns">
        <?php
        $res = $cctdb->query($query);
        while ($navigation = mysqli_fetch_array($res)) {
        ?>
            <a href="<?= $navigation["link"]; ?>"><button class="neon-block"><?= $navigation["name"]; ?></button></a>
        <?php
        }
        ?>
        <button class="neon-block" onclick="getIP()">IP сервера</button>
    </div>
    <div class="social"><!-- Ссылки на соцсети из таблицы `social` --></div>
</div>
 