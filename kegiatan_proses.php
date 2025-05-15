<?php
require_once 'koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// TAMBAH KEGIATAN
if (isset($_POST['tambah'])) {
    $mulai = $_POST['tanggal_mulai'];
    $selesai = $_POST['tanggal_selesai'];
    $tempat = $_POST['tempat'];
    $deskripsi = $_POST['deskripsi'];
    $jenis_id = $_POST['jenis_kegiatan_id'];

    $query = "INSERT INTO kegiatan (tanggal_mulai, tanggal_selesai, tempat, deskripsi, jenis_kegiatan_id)
              VALUES (:mulai, :selesai, :tempat, :deskripsi, :jenis_id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':mulai' => $mulai,
        ':selesai' => $selesai,
        ':tempat' => $tempat,
        ':deskripsi' => $deskripsi,
        ':jenis_id' => $jenis_id,
    ]);

    header('Location: kegiatan_list.php');
    exit;
}

// EDIT KEGIATAN
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $mulai = $_POST['tanggal_mulai'];
    $selesai = $_POST['tanggal_selesai'];
    $tempat = $_POST['tempat'];
    $deskripsi = $_POST['deskripsi'];
    $jenis_id = $_POST['jenis_kegiatan_id'];

    $query = "UPDATE kegiatan SET 
                tanggal_mulai = :mulai,
                tanggal_selesai = :selesai,
                tempat = :tempat,
                deskripsi = :deskripsi,
                jenis_kegiatan_id = :jenis_id
              WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':mulai' => $mulai,
        ':selesai' => $selesai,
        ':tempat' => $tempat,
        ':deskripsi' => $deskripsi,
        ':jenis_id' => $jenis_id,
        ':id' => $id,
    ]);

    header('Location: kegiatan_list.php');
    exit;
}

// HAPUS KEGIATAN
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "DELETE FROM kegiatan WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);

    header('Location: kegiatan_list.php');
    exit;
}
