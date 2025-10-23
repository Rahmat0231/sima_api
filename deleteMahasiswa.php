<?php
require 'config.php';
$id = $_POST['id'] ?? '';
if ($id==='') { echo json_encode(["success"=>false,"message"=>"ID wajib"]); exit; }

$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id=?");
$stmt->bind_param('i', $id);
$ok = $stmt->execute();
echo json_encode(["success"=>$ok, "message"=>$ok ? "Berhasil hapus" : "Gagal hapus"]);
