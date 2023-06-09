<?php
$responseCode = 400;

header("Access-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

$response = [
  "status" => false,
  "description" => "Пользователь не добавлен."
];

if (!empty($_POST['name']) || !empty($_POST['password'])) {
  $con = mysqli_connect("localhost", "root", "", "cctdb");

  if (!mysqli_errno($con)) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $password = base64_encode(hash("sha256", $name . $password));

    $seed = time() * random_int(1, 256);
    $newAccesstoken = base64_encode(hash("sha256", $seed));

    $query = "INSERT INTO `users` (`id`, `name`, `pass`, `accestoken`, `role`) VALUES (NULL, '$name', '$password', '$newAccesstoken', '1')";
    $res = $con->query($query);

    $responseCode = 200;

    $response = [
      "status" => true,
      "description" => "Пользователь добавлен."
    ];
  }
}
http_response_code($responseCode);
echo $json = json_encode($response);