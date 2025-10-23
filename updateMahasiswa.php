<?php
require 'config.php';
$id   = $_POST['id'] ?? '';
$nama = $_POST['nama'] ?? '';
$nim  = $_POST['nim'] ?? '';
$jurusan = $_POST['jurusan'] ?? '';
$email = $_POST['email'] ?? '';
$no_hp = $_POST['no_hp'] ?? '';
$foto  = $_POST['foto'] ?? '';

if ($id==='') { echo json_encode(["success"=>false,"message"=>"ID wajib"]); exit; }

$stmt = $conn->prepare("UPDATE mahasiswa
   SET nama=?, nim=?, jurusan=?, email=?, no_hp=?, foto=?
   WHERE id=?");
$stmt->bind_param('ssssssi', $nama, $nim, $jurusan, $email, $no_hp, $foto, $id);
$ok = $stmt->execute();
echo json_encode(["success"=>$ok, "message"=>$ok ? "Berhasil update" : "Gagal update"]);
