<?php
include 'config/database.php';

// Tambah data kegiatan
if (isset($_POST['tambah'])) {
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $tempat = $_POST['tempat'];
    $deskripsi = $_POST['deskripsi'];
    $jenis_kegiatan_id = $_POST['jenis_kegiatan_id'];

    mysqli_query($conn, "INSERT INTO kegiatan (tanggal_mulai, tanggal_selesai, tempat, deskripsi, jenis_kegiatan_id)
                         VALUES ('$tanggal_mulai', '$tanggal_selesai', '$tempat', '$deskripsi', '$jenis_kegiatan_id')");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM kegiatan WHERE id=$id");
    header("Location: kegiatan.php");
}

// Ambil data kegiatan dan jenis_kegiatan
$data = mysqli_query($conn, "SELECT kegiatan.*, jenis_kegiatan.nama AS jenis_nama FROM kegiatan 
                             LEFT JOIN jenis_kegiatan ON kegiatan.jenis_kegiatan_id = jenis_kegiatan.id");

// Ambil data jenis kegiatan untuk form
$jenis = mysqli_query($conn, "SELECT * FROM jenis_kegiatan");
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="layoutSidenav_content">
<div class="container">
    <link href="css/styles2.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <div class="container-fluid px-4">
        <h2>Data Kegiatan</h2>

<!-- Form tambah kegiatan -->
<form method="POST" class="mb-4">
    <label for="tanggal_mulai">Tanggal Mulai</label><br>
    <input type="date" name="tanggal_mulai" id="tanggal_mulai" required><br><br>

    <label for="tanggal_selesai">Tanggal Selesai</label><br>
    <input type="date" name="tanggal_selesai" id="tanggal_selesai" required><br><br>

    <input type="text" name="tempat" placeholder="Tempat" required>
    <textarea name="deskripsi" placeholder="Deskripsi" required></textarea>

    <select name="jenis_kegiatan_id" required>
        <option value="">Pilih Jenis Kegiatan</option>
        <?php while ($j = mysqli_fetch_assoc($jenis)) { ?>
            <option value="<?= $j['id'] ?>"><?= $j['nama'] ?></option>
        <?php } ?>
    </select>
    <button name="tambah">Tambah</button>
</form>


        <!-- Tampilan data kegiatan -->
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['jenis_nama'] ?></h5>
                        <p class="card-text">
                            <strong>Tempat:</strong> <?= $row['tempat'] ?><br>
                            <strong>Mulai:</strong> <?= $row['tanggal_mulai'] ?><br>
                            <strong>Selesai:</strong> <?= $row['tanggal_selesai'] ?><br>
                            <strong>Deskripsi:</strong> <?= $row['deskripsi'] ?>
                        </p>
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
