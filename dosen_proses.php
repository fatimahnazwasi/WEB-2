<?php
require_once 'koneksi.php';

if (isset($_POST['simpan'])) {
    $stmt = $pdo->prepare("INSERT INTO dosen 
        (nidn, nama, gelar_depan, gelar_belakang, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, email, tahun_masuk, prodi_id) 
        VALUES 
        (:nidn, :nama, :gelar_depan, :gelar_belakang, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat, :email, :tahun_masuk, :prodi_id)");

    $stmt->execute([
        ':nidn' => $_POST['nidn'],
        ':nama' => $_POST['nama'],
        ':gelar_depan' => $_POST['gelar_depan'],
        ':gelar_belakang' => $_POST['gelar_belakang'],
        ':jenis_kelamin' => $_POST['jenis_kelamin'],
        ':tempat_lahir' => $_POST['tempat_lahir'],
        ':tanggal_lahir' => $_POST['tanggal_lahir'],
        ':alamat' => $_POST['alamat'],
        ':email' => $_POST['email'],
        ':tahun_masuk' => $_POST['tahun_masuk'],
        ':prodi_id' => $_POST['prodi_id']
    ]);
    header("Location: dosen_list.php");
    exit;
}


if (isset($_POST['update'])) {
    $stmt = $pdo->prepare("UPDATE dosen SET 
        nidn = :nidn, 
        nama = :nama, 
        gelar_depan = :gelar_depan, 
        gelar_belakang = :gelar_belakang, 
        jenis_kelamin = :jenis_kelamin, 
        tempat_lahir = :tempat_lahir, 
        tanggal_lahir = :tanggal_lahir, 
        alamat = :alamat, 
        email = :email, 
        tahun_masuk = :tahun_masuk, 
        prodi_id = :prodi_id 
        WHERE id = :id");

    $stmt->execute([
        ':nidn' => $_POST['nidn'],
        ':nama' => $_POST['nama'],
        ':gelar_depan' => $_POST['gelar_depan'],
        ':gelar_belakang' => $_POST['gelar_belakang'],
        ':jenis_kelamin' => $_POST['jenis_kelamin'],
        ':tempat_lahir' => $_POST['tempat_lahir'],
        ':tanggal_lahir' => $_POST['tanggal_lahir'],
        ':alamat' => $_POST['alamat'],
        ':email' => $_POST['email'],
        ':tahun_masuk' => $_POST['tahun_masuk'],
        ':prodi_id' => $_POST['prodi_id'],
        ':id' => $_POST['id']
    ]);
    header("Location: dosen_list.php");
    exit;
}


if (isset($_GET['hapus'])) {
    $stmt = $pdo->prepare("DELETE FROM dosen WHERE id = ?");
    $stmt->execute([$_GET['hapus']]);
    header("Location: dosen_list.php");
    exit;
}
