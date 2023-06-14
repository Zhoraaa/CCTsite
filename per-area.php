<?php
include("./pageBase.php");
?>
<!-- ДОБАВИТЬ -->
<!-- Привязку почты -->
<!-- Дату регистрации -->
<!-- Статус аккаунта (Пользователь/игрок/администратор) -->
<div class="content center f-dir-column">
    <a href="../index.php"><img src="../img/logo.png" alt="Логотип Сасити" title="На главную" class="logo"></a>

    <!-- Блок с выводом ника и предложением его сменить -->
    <div id="nowNickname" class="inner outer">
        <span><?= $userInfo['name'] ?></span>
        <input class="neon-block" type="button" onclick="summonChanger(document.getElementById('nowNickname'), document.getElementById('setNickname'))" title="Сменить никнейм" value="&#9998" />
    </div>
    <!-- Формы для редактирования личной информации. Информация берётся из БД и туда же записывается -->
    <!-- Форма для смены ника -->
    <div id="setNickname" class="ctrl-e hide inner outer">
        <p>Сменить никнейм</p>
        <form action="" class="ctrl-e">
            <input class="neon-block" type="password" name="confirmNewNickname" placeholder="Введите пароль"><br>
            <input class="neon-block" type="text" name="newNickname" placeholder="Введите новый ник"><br>
            <input class="neon-block" type="button" value="Готово" onclick="summonChanger(document.getElementById('nowNickname'), document.getElementById('setNickname'))">
            <input class="neon-block" type="button" value="Сохранить">
        </form>
    </div>

    <br>

    <!-- Кнопка с предложением сменить пароль -->
    <button class="neon-block inner outer" onclick="summonChanger(document.getElementById('changePassword'), document.getElementById('setNewPassword'))" id="changePassword">Сменить пароль</button>
    <!-- Форма для смены пароля -->
    <!-- Прикрутить подтверждение по почте -->
    <div id="setNewPassword" class="ctrl-e hide inner outer">
        <p>Сменить пароль</p>
        <form action="">
            <input type="text" class="neon-block" placeholder="Введите старый пароль"><br>
            <input type="text" class="neon-block" placeholder="Введите новый пароль"><br>
            <input type="text" class="neon-block" placeholder="Повторите пароль"><br>
            <input type="button" class="neon-block" value="Готово" onclick="summonChanger(document.getElementById('changePassword'), document.getElementById('setNewPassword'))">
            <input class="neon-block" type="button" value="Сохранить">
        </form>
    </div>

</div> 