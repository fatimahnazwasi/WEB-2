<?php
require_once 'koneksi.php';

if (isset($_POST['tambah'])) {
    $dosen_id = $_POST['dosen_id'];
    $kegiatan_id = $_POST['kegiatan_id'];

    $query = "INSERT INTO dosen_kegiatan (dosen_id, kegiatan_id) VALUES (:dosen_id, :kegiatan_id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':dosen_id' => $dosen_id,
        ':kegiatan_id' => $kegiatan_id
    ]);

    header('Location: kegiatan_dosen_list.php');
    exit;
}

// HAPUS KEGIATAN DOSEN
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM dosen_kegiatan WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);

    header('Location: kegiatan_dosen_list.php');
    exit;
}
