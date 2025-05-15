<?php
include 'config/database.php';

// Tambah data bidang ilmu
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    mysqli_query($conn, "INSERT INTO bidang_ilmu (nama, deskripsi) VALUES ('$nama', '$deskripsi')");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM bidang_ilmu WHERE id=$id");
    header("Location: bidang_ilmu.php");
}

// Ambil semua data bidang ilmu
$data = mysqli_query($conn, "SELECT * FROM bidang_ilmu");
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="layoutSidenav_content">
<div class="container">
    <link href="css/styles2.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <div class="container-fluid px-4">
        <h2>Data Bidang Ilmu</h2>

        <!-- Form tambah bidang ilmu -->
        <form method="POST" class="mb-4">
            <input type="text" name="nama" placeholder="Nama Bidang Ilmu" required>
            <textarea name="deskripsi" placeholder="Deskripsi" rows="3"></textarea>
            <button name="tambah">Tambah</button>
        </form>

        <!-- Tampilan data bidang ilmu -->
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama'] ?></h5>
                        <p class="card-text"><?= nl2br($row['deskripsi']) ?></p>
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
