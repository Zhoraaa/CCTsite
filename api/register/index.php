<?php
$name = $_GET['name'];
$password = $_GET['password'];

$seed = time() * random_int(1, 256);
$newAccesstoken = base64_encode(hash("sha256", $seed));

$query = "INSERT INTO `users` (`id`, `name`, `pass`, `accestoken`, `role`) VALUES (NULL, '$name', '$pass', '$newAccesstoken', '1')";

return $status;