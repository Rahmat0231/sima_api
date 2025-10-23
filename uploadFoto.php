<?php
require 'config.php';
$dir = __DIR__ . '/uploads';              // dipetakan ke Volume /app/uploads
if (!file_exists($dir)) { mkdir($dir, 0777, true); }

if (!isset($_FILES['file'])) {
  echo json_encode(["success"=>false,"message"=>"Tidak ada file"]); exit;
}
$allowed = ['jpg','jpeg','png','webp'];
$ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
if (!in_array($ext, $allowed)) {
  echo json_encode(["success"=>false,"message"=>"Ekstensi tidak didukung"]); exit;
}
$filename = time().'_'.bin2hex(random_bytes(3)).'.'.$ext;
$target = $dir.'/'.$filename;

if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
  echo json_encode(["success"=>true, "filename"=>$filename]);
} else {
  echo json_encode(["success"=>false, "message"=>"Gagal upload"]);
}
