<?php
include("./pageBase.php");
// Стартуем сессию
session_start();
?>

<div class="background">
    <img src="../img/background.png" alt="">
</div>

<div class="content f-dir-column ctrl-e">
    <a href="../index.php">
        <img src="../img/logo.png" alt="Логотип Сасити" title="На главную" class="logo">
    </a>

    <?php
    if (!$_GET['newUser']) {
    ?>

        <div id="auth">
            <h2>Авторизация</h2>
            <form action="../user/auth.php" method="post" class="f-dir-column ctrl-e">
                <div><input class="text-input" type="text" class="neon-block" name="login" placeholder="Введите логин" /></div>
                <div><input class="text-input" type="password" class="neon-block" name="pass" placeholder="Введите пароль" /></div>
                <div><span class="mini-text"><?= $_SESSION['result'] ?></span></div>
                <button type="submit" class="neon-block auth-row">Войти</button>
            </form>
            <a href="?newUser=true" class="mini-text pointer non-dec">Регистрация</a>
        </div>

    <?php
    } else {
    ?>
        <div id="reg">
            <h2>Регистрация</h2>
            <form action="../user/reg.php" method="post" class="f-dir-column ctrl-e">
                <div><input class="text-input" type="text" class="neon-block" name="name" placeholder="Ник на сайте" /></div>
                <div><input class="text-input" type="text" class="neon-block" name="login" placeholder="Логин" /></div>
                <div><input class="text-input" type="password" class="neon-block" name="pass" placeholder="Пароль" /></div>
                <div><input class="text-input" type="password" class="neon-block" name="pass_rep" placeholder="Повтор пароля" /></div>
                <div><span class="mini-text"><?= $_SESSION['result'] ?></span></div>
                <button type="submit" class="neon-block auto-row">Зарегистрироваться</button>
            </form>
            <a href="?" class="mini-text pointer non-dec">Вход</a>
        </div>

</div>


<?php
    }
    unset($_SESSION['result'])
?>