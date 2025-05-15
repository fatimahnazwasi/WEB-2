<?php
require_once 'koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM kegiatan_dosen WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id]);

header('Location: kegiatan_dosen_list.php');
exit;
