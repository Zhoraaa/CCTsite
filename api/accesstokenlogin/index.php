<?php
$responseCode = 400;

header("Access-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

$response = [
  "status" => false,
  "description" => "Пользователь не аутентифицирован."
];

if (!empty($_POST['name']) || !empty($_POST['password'])) {
  $con = mysqli_connect("localhost", "root", "", "cctdb");

  if (!mysqli_errno($con)) {
    $name = $_POST['name'];
    $accesstoken = $_POST['accesstoken'];

    $query = "SELECT * FROM `users` WHERE `name` = '$name' AND `accesstoken` = '$accesstoken'";
    $res = $con->query($query);

    $responseCode = 200;

    $response = [
      "status" => true,
      "description" => "Пользователь аутентифицирован."
    ];
  }
}
http_response_code($responseCode);
echo $json = json_encode($response);
