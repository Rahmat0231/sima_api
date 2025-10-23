<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Origin, X-Requested-With');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit; }

$db_host = getenv('MYSQLHOST')     ?: 'mainline.proxy.rlwy.net';
$db_user = getenv('MYSQLUSER')     ?: 'root';
$db_pass = getenv('MYSQLPASSWORD') ?: 'OrvcFDljksMZMFchvFPGJFlvYnssFYQV';
$db_name = getenv('MYSQLDATABASE') ?: 'railway';
$db_port = (int)(getenv('MYSQLPORT') ?: 55903);

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
if ($conn->connect_error) {
  http_response_code(500);
  echo json_encode(["success"=>false, "message"=>"DB connect error: ".$conn->connect_error]);
  exit;
}
$conn->set_charset('utf8mb4');
?>
