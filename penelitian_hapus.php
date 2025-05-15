<?php
require_once 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data berdasarkan ID
    $stmt = $pdo->prepare("DELETE FROM penelitian WHERE id = ?");
    $stmt->execute([$id]);

    // Redirect kembali ke halaman daftar
    header("Location: penelitian_list.php");
    exit;
} else {
    // Jika tidak ada ID di URL
    echo "ID tidak ditemukan!";
}
?>
