<?php
    session_start();
    $cctdb = mysqli_connect("localhost", "root", "", "cctdb");
    $name = filter_var(htmlspecialchars(trim($_POST['name'])));
    $login = filter_var(htmlspecialchars(trim($_POST['login'])));
    $pass = filter_var(htmlspecialchars(trim($_POST['pass'])));
    $pass_rep = filter_var(htmlspecialchars(trim($_POST['pass_rep'])));

    // echo $login."<br>".$pass;
    $reg_info = "";

    $q_logins = "SELECT * FROM `users` WHERE `login`='$login'";
    $get_logins = mysqli_query($cctdb, $q_logins);
    $logins = mysqli_fetch_array($get_logins);
    if(count($logins) != 0){
        $reg_info = "Логин уже используется";
        $_SESSION['reg_info'] = $reg_info;
    }    
    elseif(mb_strlen($name) < 6 || mb_strlen($name) > 32){
        if($name == ""){
            $reg_info = "Введите имя на сайте";
            $_SESSION['reg_info'] = $reg_info;
        }
        else{
            $reg_info  = "Недопустимое имя на сайте (от 6 до 32 символов)";
            $_SESSION['reg_info'] = $reg_info;
        }
    }
    elseif(mb_strlen($login) < 6 || mb_strlen($login) > 32){
        if($login == ""){
            $reg_info = "Введите логин";
            $_SESSION['reg_info'] = $reg_info;
        }
        else{
            $reg_info  = "Недопустимый логин (от 6 до 32 символов)";
            $_SESSION['reg_info'] = $reg_info;
        }
    }
    elseif(mb_strlen($pass) < 6 || mb_strlen($pass) > 32){
        if($pass == ""){
            $reg_info = "Введите пароль";
            $_SESSION['reg_info'] = $reg_info;
        }
        else{
            $reg_info = "Недопустимый пароль (от 6 до 32 символов)";
            $_SESSION['reg_info'] = $reg_info;
        }
    }
    elseif($pass != $pass_rep){
        $reg_info = "Пароли не совпадают";
        $_SESSION['reg_info'] = $reg_info;
    }
    else{
        $pass = md5($pass."key");
    
        $cctdb = mysqli_connect("localhost","root","","cctdb");
        $new_user = $cctdb->query("INSERT INTO `users` (`user_name`, `login`, `pass`) VALUES ('$name', '$login', '$pass');");
        $reg_info = "Регистрация прошла успешно";
        $_SESSION['reg_info'] = $reg_info;
        $cctdb->close();
    }
    header("Location: /pages/auth-page.php?goReg=true");
