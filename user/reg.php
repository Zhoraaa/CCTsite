<?php
require("../functions/connect.php");
session_start();

$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$pass_rep = $_POST['pass_rep'];
$canReg = true;

// Проверки
$query = "SELECT * FROM `users` WHERE `login`='$login'";
$res = $con->query($query);
$check = $res->fetch_array();
if (!empty($check)) {
    $_SESSION['result'] = "Логин уже используется";
    $canReg = false;
} elseif (mb_strlen($name) < 6 || mb_strlen($name) > 32) {
    if ($name == "") {
        $_SESSION['result'] = "Введите имя на сайте";
        $canReg = false;
    } else {
        $_SESSION['result']  = "Недопустимое имя на сайте (от 6 до 32 символов)";
        $canReg = false;
    }
} elseif (mb_strlen($login) < 6 || mb_strlen($login) > 32) {
    if ($login == "") {
        $_SESSION['result'] = "Введите логин";
        $canReg = false;
    } else {
        $_SESSION['result']  = "Недопустимый логин (от 6 до 32 символов)";
        $canReg = false;
    }
} elseif (mb_strlen($pass) < 6 || mb_strlen($pass) > 32) {
    if ($pass == "") {
        $_SESSION['result'] = "Введите пароль";
        $canReg = false;
    } else {
        $_SESSION['result'] = "Недопустимый пароль (от 6 до 32 символов)";
        $canReg = false;
    }
} elseif ($pass != $pass_rep) {
    $_SESSION['result'] = "Пароли не совпадают";
    $canReg = false;
}

// Регистрация при выполнении уловий
if ($canReg) {
    $res = $con->query("INSERT INTO `users` (`name`, `login`, `pass`, `role`) VALUES ('$name', '$login', '$pass', '1');");
    $_SESSION['result'] = "Регистрация прошла успешно";
}
$location = ($canReg) ? "../" : "/auth-page.php?newUser=true";
header('location: ' . $location);
