<?php
require 'config.php';
$nama = $_POST['nama'] ?? '';
$nim  = $_POST['nim'] ?? '';
$jurusan = $_POST['jurusan'] ?? '';
$email = $_POST['email'] ?? '';
$no_hp = $_POST['no_hp'] ?? '';
$foto  = $_POST['foto'] ?? ''; // nama file (hasil uploadFoto.php)

if ($nama==='' || $nim==='') {
  echo json_encode(["success"=>false,"message"=>"Nama & NIM wajib diisi"]); exit;
}

$stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
                        VALUES (?,?,?,?,?,?)");
$stmt->bind_param('ssssss', $nama, $nim, $jurusan, $email, $no_hp, $foto);
$ok = $stmt->execute();
echo json_encode(["success"=>$ok, "message"=>$ok ? "Berhasil menambah" : "Gagal menambah"]);
