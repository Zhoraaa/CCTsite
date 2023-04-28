<?php
    session_start();
    $cctdb = mysqli_connect("localhost", "root", "", "cctdb");
    $login = filter_var(htmlspecialchars(trim($_POST['login'])));
    $pass = filter_var(htmlspecialchars(trim($_POST['pass'])));

    // echo $login."<br>".$pass;
    $auth_info = "";
    
    $pass = md5($pass."key");
    
    $check_user = $cctdb->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass';");
    $user = mysqli_fetch_assoc($check_user);

    if(count($user) == 0){
        $auth_info = "Пользователь не найден";
        $_SESSION['auth_info'] = $auth_info;;
        header('Location: /pages/auth-page.php');
    }
    else{        
        // $cctdb->close();
        setcookie('user', $user['id'], time() + 3600 * 24 * 365, "/");
        header('Location: /');
    }
?>