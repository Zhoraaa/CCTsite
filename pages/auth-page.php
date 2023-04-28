<?php
include("../pageBase.php");
// Стартуем сессию
session_start();

$auth_info = $_SESSION['auth_info'];
$reg_info = $_SESSION['reg_info'];
?>

<div class="background">
    <img src="../img/background.png" alt="">
</div>

<div class="content f-dir-column ctrl-e">
    <a href="../index.php">
        <img src="../img/logo.png" alt="Логотип Сасити" title="На главную" class="logo">
    </a>

    <?php
    if (!$_GET['goReg']) {
    ?>

        <div id="auth">
            <h2>Авторизация</h2>
            <form action="../functions/auth.php" method="post" class="f-dir-column ctrl-e">
                <input class="text-input" type="text" class="neon-block" name="login" placeholder="Введите логин" /><br>
                <input class="text-input" type="password" class="neon-block" name="pass" placeholder="Введите пароль" /><br>
                <span class="mini-text"><?= $auth_info . "<br>"; ?></span>
                <button type="submit" class="neon-block auth-row">Войти</button>
            </form>
            <a href="?goReg=true" class="mini-text pointer non-dec">Регистрация</a>
        </div>

    <?php
    } else {
    ?>

        <div id="reg">
            <h2>Регистрация</h2>
            <form action="../functions/reg.php" method="post" class="f-dir-column ctrl-e">
                <input class="text-input" type="text" class="neon-block" name="name" placeholder="Ник на сайте" /><br>
                <input class="text-input" type="text" class="neon-block" name="login" placeholder="Логин" /><br>
                <input class="text-input" type="password" class="neon-block" name="pass" placeholder="Пароль" /><br>
                <input class="text-input" type="password" class="neon-block" name="pass_rep" placeholder="Повтор пароля" /><br>
                <span class="mini-text"><?= $reg_info . "<br>"; ?></span>
                <button type="submit" class="neon-block auto-row">Зарегистрироваться</button>
            </form>
            <a href="?goReg=" class="mini-text pointer non-dec">Вход</a>
        </div>

</div>


<?php
    }
    session_destroy();
    endPage($cctdb);
?>