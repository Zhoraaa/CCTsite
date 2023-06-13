<?php
    require("../functions/connect.php");
    session_start();
    
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $check_user = $con->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass';");
    $user = mysqli_fetch_assoc($check_user);

    if(count($user) == 0){
        $_SESSION['result'] = "Пользователь не найден";
        header('Location: /auth-page.php');
    }
    else{        
        setcookie('user', $user['id'], time() + 3600 * 24 * 365, "/");
        header('Location: /');
    }