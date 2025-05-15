<?php
require_once 'koneksi.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$isEdit = $_POST['is_edit'] == '1';
$dosen_id = $_POST['dosen_id'];
$penelitian_id = $_POST['penelitian_id'];
$peran = $_POST['peran'];

if ($isEdit) {
    // Update data tim peneliti
    $stmt = $pdo->prepare("UPDATE tim_penelitian SET peran=? WHERE dosen_id=? AND penelitian_id=?");
    $stmt->execute([$peran, $_POST['old_dosen_id'], $_POST['old_penelitian_id']]);
} else {
    // Menambahkan data baru tim peneliti
    $stmt = $pdo->prepare("INSERT INTO tim_penelitian (dosen_id, penelitian_id, peran)
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE peran = VALUES(peran)");
    $stmt->execute([$dosen_id, $penelitian_id, $peran]);
}

header("Location: tim_peneliti.php");
exit;
