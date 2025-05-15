<?php
require_once 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $pdo->prepare("INSERT INTO bidang_ilmu (nama, deskripsi) VALUES (?, ?)");
    $stmt->execute([$nama, $deskripsi]);

    header("Location: bidang_ilmu.php?pesan=sukses");
    exit;
}

// Tambahan jika kamu juga pakai edit
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $pdo->prepare("UPDATE bidang_ilmu SET nama = ?, deskripsi = ? WHERE id = ?");
    $stmt->execute([$nama, $deskripsi, $id]);

    header("Location: bidang_ilmu.php?pesan=updated");
    exit;
}
