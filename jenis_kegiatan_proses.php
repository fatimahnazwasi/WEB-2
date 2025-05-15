<?php
require_once 'koneksi.php';

// Simpan data baru
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];

    try {
        $stmt = $pdo->prepare("INSERT INTO jenis_kegiatan (nama) VALUES (:nama)");
        $stmt->execute(['nama' => $nama]);
        header("Location: jenis_kegiatan_list.php");
        exit;
    } catch (PDOException $e) {
        die("Gagal simpan data: " . $e->getMessage());
    }
}


// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    try {
        $stmt = $pdo->prepare("UPDATE jenis_kegiatan SET nama = :nama WHERE id = :id");
        $stmt->execute([
            'nama' => $nama,
            'id' => $id
        ]);
        header("Location: jenis_kegiatan_list.php");
        exit;
    } catch (PDOException $e) {
        die("Gagal update data: " . $e->getMessage());
    }
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    try {
        $stmt = $pdo->prepare("DELETE FROM jenis_kegiatan WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: jenis_kegiatan_list.php");
        exit;
    } catch (PDOException $e) {
        die("Gagal hapus data: " . $e->getMessage());
    }
}
