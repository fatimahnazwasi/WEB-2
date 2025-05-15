<?php
include 'config/database.php';

// Tambah data
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    mysqli_query($conn, "INSERT INTO jenis_kegiatan (nama) VALUES ('$nama')");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM jenis_kegiatan WHERE id=$id");
    header("Location: jenis_kegiatan.php");
}

// Ambil data
$data = mysqli_query($conn, "SELECT * FROM jenis_kegiatan");
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="layoutSidenav_content">
<div class="container">
    <link href="css/styles2.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <div class="container-fluid px-4">
        <h2>Data Jenis Kegiatan</h2>

        <!-- Form tambah jenis kegiatan -->
        <form method="POST" class="mb-4">
            <input type="text" name="nama" placeholder="Nama Jenis Kegiatan" required>
            <button name="tambah">Tambah</button>
        </form>

        <!-- Tampilkan data -->
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama'] ?></h5>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a class="small text-primary" href="#">View</a>
                        <a class="small text-danger" href="?hapus=<?= $row['id'] ?>">Hapus</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
