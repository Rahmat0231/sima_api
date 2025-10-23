<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Origin, X-Requested-With');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit; }

$host = "mainline.proxy.rlwy.net"; // Ganti dengan host kamu
$user = "root";                              // Ganti user kamu
$pass = "OrvcFDljksMZMFchvFPGJFlvYnssFYQV";                     // Ganti password kamu
$db = "railway";                             // Biasanya tetap railway
$port = 55903;                               // Ganti dengan port kamu

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
if ($conn->connect_error) {
  http_response_code(500);
  echo json_encode(["success"=>false, "message"=>"DB connect error: ".$conn->connect_error]);
  exit;
}
$conn->set_charset('utf8mb4');
?>
