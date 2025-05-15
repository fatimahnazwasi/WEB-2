<?php
require_once 'koneksi.php';

if (isset($_POST['simpan'])) {
    $stmt = $pdo->prepare("INSERT INTO penelitian 
        (judul, mulai, akhir, tahun_ajaran, bidang_ilmu_id) 
        VALUES 
        (:judul, :mulai, :akhir, :tahun_ajaran, :bidang_ilmu_id)");

    $stmt->execute([
        ':judul' => $_POST['judul'],
        ':mulai' => $_POST['mulai'],
        ':akhir' => $_POST['akhir'],
        ':tahun_ajaran' => $_POST['tahun_ajaran'],
        ':bidang_ilmu_id' => $_POST['bidang_ilmu_id']
    ]);

    header("Location: penelitian_list.php");
    exit;
}

if (isset($_POST['update'])) {
    $stmt = $pdo->prepare("UPDATE penelitian SET 
        judul = :judul, 
        mulai = :mulai, 
        akhir = :akhir, 
        tahun_ajaran = :tahun_ajaran, 
        bidang_ilmu_id = :bidang_ilmu_id 
        WHERE id = :id");

    $stmt->execute([
        ':judul' => $_POST['judul'],
        ':mulai' => $_POST['mulai'],
        ':akhir' => $_POST['akhir'],
        ':tahun_ajaran' => $_POST['tahun_ajaran'],
        ':bidang_ilmu_id' => $_POST['bidang_ilmu_id'],
        ':id' => $_POST['id']
    ]);

    header("Location: penelitian_list.php");
    exit;
}
?>
