<?php
include 'config/database.php';




// Tambah data
if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    $ketua = $_POST['ketua'];
    mysqli_query($conn, "INSERT INTO prodi (kode, nama, alamat, telpon, ketua) VALUES ('$kode','$nama','$alamat','$telpon','$ketua')");

}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM prodi WHERE id=$id");
    header("Location: prodi.php");

}

// Ambil data
$data = mysqli_query($conn, "SELECT * FROM prodi");
?>

<!-- HTML -->
 
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="layoutSidenav_content">
<div class="container">
    <link href="css/styles2.css" rel="stylesheet" />

    
    <div class="container-fluid px-4">
    <h2>Data Prodi</h2>

    <!-- Form tambah prodi -->
<!-- Form tambah prodi -->
<form method="POST" class="mb-4">
        <input type="text" name="kode" placeholder="Kode">
        <input type="text" name="nama" placeholder="Nama">
        <input type="text" name="alamat" placeholder="Alamat">
        <input type="text" name="telpon" placeholder="Telpon">
        <input type="text" name="ketua" placeholder="Ketua" >
        <button name="tambah">Tambah</button>
    </form>


    <!-- Konten Prodi -->
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($data)) { ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['nama'] ?></h5>
                    <p class="card-text">
                        <strong>Kode:</strong> <?= $row['kode'] ?><br>
                        <strong>Alamat:</strong> <?= $row['alamat'] ?><br>
                        <strong>Telpon:</strong> <?= $row['telpon'] ?><br>
                        <strong>Ketua Prodi:</strong> <?= $row['ketua'] ?>
                    </p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-primary" href="#">View Details</a>
                    <a class="small text-danger" href="?hapus=<?= $row['id'] ?>">Hapus</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</div>








<?php include 'footer.php'; ?>
