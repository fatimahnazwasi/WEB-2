<?php
require_once 'koneksi.php';

if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    $ketua = $_POST['ketua'];

    try {
        // Query untuk insert data ke tabel prodi
        $stmt = $pdo->prepare("INSERT INTO prodi (kode, nama, alamat, telpon, ketua) 
                               VALUES (:kode, :nama, :alamat, :telpon, :ketua)");

        // Bind parameter
        $stmt->bindParam(':kode', $kode);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':telpon', $telpon);
        $stmt->bindParam(':ketua', $ketua);

        // Eksekusi query
        $stmt->execute();

        // Redirect ke halaman daftar prodi
        header("Location: prodi_list.php");
        exit;
    } catch (PDOException $e) {
        echo "Gagal menambah data: " . $e->getMessage();
    }
}

// Proses Update
if (isset($_POST['update'])) {
    $id     = $_POST['id'];
    $kode   = $_POST['kode'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    $ketua  = $_POST['ketua'];

    try {
        $stmt = $pdo->prepare("UPDATE prodi SET kode = :kode, nama = :nama, alamat = :alamat, telpon = :telpon, ketua = :ketua WHERE id = :id");
        $stmt->execute([
            ':kode' => $kode,
            ':nama' => $nama,
            ':alamat' => $alamat,
            ':telpon' => $telpon,
            ':ketua' => $ketua,
            ':id' => $id
        ]);
        header("Location: prodi_list.php");
        exit;
    } catch (PDOException $e) {
        die("Gagal mengupdate data: " . $e->getMessage());
    }
}

// Hapus Prodi
if (isset($_GET['hapus_id'])) {
    $id = $_GET['hapus_id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM prodi WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: prodi_list.php");
        exit;
    } catch (PDOException $e) {
        die("Gagal menghapus data: " . $e->getMessage());
    }
}
?>
