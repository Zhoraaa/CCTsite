<?php
$con = mysqli_connect("localhost", "root", "", "cctdb");

if (!$con) {
  echo "Ошибка подключения: " . mysqli_connect_error() . 
  "<br>" . "Код ошибки: " . mysqli_connect_errno();
  exit();
} else {
  return $con;
}