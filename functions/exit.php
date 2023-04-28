<?php
    setcookie('user', $user['login'], time() - 3600 * 24 * 365, "/");
    header('Location: /');
?>