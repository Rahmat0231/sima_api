<?php
require 'config.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$data = [];
if ($q === '') {
  $sql = "SELECT * FROM mahasiswa ORDER BY id DESC";
  $stmt = $conn->prepare($sql);
} else {
  $like = "%$q%";
  $sql = "SELECT * FROM mahasiswa
          WHERE nama LIKE ? OR nim LIKE ? OR jurusan LIKE ?
          ORDER BY id DESC";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sss', $like, $like, $like);
}
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) { $data[] = $row; }
echo json_encode(["success"=>true, "data"=>$data]);
