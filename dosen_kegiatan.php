<?php
include 'config/database.php';

// Tambah relasi dosen-kegiatan
if (isset($_POST['tambah'])) {
    $dosen_id = $_POST['dosen_id'];
    $kegiatan_id = $_POST['kegiatan_id'];
    mysqli_query($conn, "INSERT INTO dosen_kegiatan (dosen_id, kegiatan_id) VALUES ('$dosen_id', '$kegiatan_id')");
}

// Hapus relasi
if (isset($_GET['hapus'])) {
    $dosen_id = $_GET['dosen_id'];
    $kegiatan_id = $_GET['kegiatan_id'];
    mysqli_query($conn, "DELETE FROM dosen_kegiatan WHERE dosen_id = $dosen_id AND kegiatan_id = $kegiatan_id");
    header("Location: dosen_kegiatan.php");
}

// Ambil data relasi
$data = mysqli_query($conn, "SELECT dk.dosen_id, dk.kegiatan_id, d.nama AS nama_dosen, k.deskripsi AS nama_kegiatan 
                             FROM dosen_kegiatan dk
                             JOIN dosen d ON dk.dosen_id = d.id
                             JOIN kegiatan k ON dk.kegiatan_id = k.id");

// Ambil data untuk dropdown
$dosen = mysqli_query($conn, "SELECT * FROM dosen");
$kegiatan = mysqli_query($conn, "SELECT * FROM kegiatan");
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="layoutSidenav_content">
<div class="container">
    <link href="css/styles2.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <div class="container-fluid px-4">
        <h2>Relasi Dosen dan Kegiatan</h2>

        <!-- Form tambah relasi -->
        <form method="POST" class="mb-4">
            <select name="dosen_id" required>
                <option value="">Pilih Dosen</option>
                <?php while ($d = mysqli_fetch_assoc($dosen)) { ?>
                    <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                <?php } ?>
            </select>

            <select name="kegiatan_id" required>
                <option value="">Pilih Kegiatan</option>
                <?php while ($k = mysqli_fetch_assoc($kegiatan)) { ?>
                    <option value="<?= $k['id'] ?>"><?= $k['deskripsi'] ?></option>
                <?php } ?>
            </select>

            <button name="tambah">Tambah</button>
        </form>

        <!-- Tampilkan data relasi -->
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_dosen'] ?></h5>
                        <p class="card-text"><strong>Kegiatan:</strong> <?= $row['nama_kegiatan'] ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a class="small text-primary" href="#">View</a>
                        <a class="small text-danger" 
                           href="?hapus=1&dosen_id=<?= $row['dosen_id'] ?>&kegiatan_id=<?= $row['kegiatan_id'] ?>">Hapus</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
