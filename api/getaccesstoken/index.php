<?php
$responseCode = 400;

header("Access-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

$response = [
  "status" => false
];

if (!empty($_POST['name']) || !empty($_POST['password'])) {
  $con = mysqli_connect("localhost", "root", "", "cctdb");

  if (!mysqli_errno($con)) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $password = base64_encode(hash("sha256", $name . $password));

    $query = "SELECT `accesstoken` FROM `users` WHERE `name` = '$name' AND `password` = '$password'";
    $res = $con->query($query);
    $user = $res->fetch_assoc();

    $responseCode = 200;

    $response = [
      "status" => true,
      "accesstoken" => '"'.$user['accesstoken'].'"'
    ];
  }
}
http_response_code($responseCode);
echo $json = json_encode($response);