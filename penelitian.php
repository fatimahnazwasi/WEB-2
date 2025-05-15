<?php
include 'config/database.php';

// Tambah data penelitian
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $bidang_ilmu_id = $_POST['bidang_ilmu_id'];

    mysqli_query($conn, "INSERT INTO penelitian (judul, mulai, akhir, tahun_ajaran, bidang_ilmu_id)
                         VALUES ('$judul', '$mulai', '$akhir', '$tahun_ajaran', '$bidang_ilmu_id')");
}

// Hapus data penelitian
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM penelitian WHERE id=$id");
    header("Location: penelitian.php");
}

// Ambil data penelitian dengan nama bidang ilmu
$data = mysqli_query($conn, "SELECT p.*, b.nama AS nama_bidang 
                             FROM penelitian p 
                             LEFT JOIN bidang_ilmu b ON p.bidang_ilmu_id = b.id");

// Ambil data bidang ilmu untuk dropdown
$bidang_ilmu = mysqli_query($conn, "SELECT * FROM bidang_ilmu");
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="layoutSidenav_content">
<div class="container">
    <link href="css/styles2.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <div class="container-fluid px-4">
        <h2>Data Penelitian</h2>

        <!-- Form tambah penelitian -->
        <form method="POST" class="mb-4">
            <textarea name="judul" placeholder="Judul Penelitian" required></textarea><br>
            <label>Tanggal Mulai</label>
            <input type="date" name="mulai" required>
            <label>Tanggal Selesai</label>
            <input type="date" name="akhir" required>
            <input type="text" name="tahun_ajaran" placeholder="Tahun Ajaran (contoh: 2022/2023)" required>
            <select name="bidang_ilmu_id" required>
                <option value="">Pilih Bidang Ilmu</option>
                <?php while ($b = mysqli_fetch_assoc($bidang_ilmu)) { ?>
                    <option value="<?= $b['id'] ?>"><?= $b['nama'] ?></option>
                <?php } ?>
            </select>
            <button name="tambah">Tambah</button>
        </form>

        <!-- Tampilan data penelitian -->
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Penelitian</h5>
                        <p class="card-text">
                            <strong>Judul:</strong> <?= $row['judul'] ?><br>
                            <strong>Mulai:</strong> <?= $row['mulai'] ?><br>
                            <strong>Akhir:</strong> <?= $row['akhir'] ?><br>
                            <strong>Tahun Ajaran:</strong> <?= $row['tahun_ajaran'] ?><br>
                            <strong>Bidang Ilmu:</strong> <?= $row['nama_bidang'] ?>
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
