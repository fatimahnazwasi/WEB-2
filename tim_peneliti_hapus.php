<?php
require_once 'koneksi.php';

// Tampilkan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['dosen_id']) && isset($_GET['penelitian_id'])) {
    $dosen_id = $_GET['dosen_id'];
    $penelitian_id = $_GET['penelitian_id'];

    try {
        // Jalankan DELETE berdasarkan dosen_id dan penelitian_id
        $stmt = $pdo->prepare("DELETE FROM tim_penelitian WHERE dosen_id = ? AND penelitian_id = ?");
        $stmt->execute([$dosen_id, $penelitian_id]);

        // Redirect setelah berhasil
        header("Location: tim_peneliti.php");
        exit;
    } catch (PDOException $e) {
        echo "Gagal menghapus data: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "Parameter tidak lengkap.";
}
?>
