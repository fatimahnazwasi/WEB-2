<?php
include 'config/database.php';

// Tambah data tim penelitian
if (isset($_POST['tambah'])) {
    $penelitian_id = $_POST['penelitian_id'];
    $dosen_id = $_POST['dosen_id'];
    $peran = $_POST['peran'];
    mysqli_query($conn, "INSERT INTO tim_penelitian (penelitian_id, dosen_id, peran) VALUES ('$penelitian_id', '$dosen_id', '$peran')");
}

// Hapus relasi tim
if (isset($_GET['hapus'])) {
    $penelitian_id = $_GET['penelitian_id'];
    $dosen_id = $_GET['dosen_id'];
    mysqli_query($conn, "DELETE FROM tim_penelitian WHERE penelitian_id=$penelitian_id AND dosen_id=$dosen_id");
    header("Location: tim_penelitian.php");
}

// Ambil data tim dengan relasi dosen dan penelitian
$data = mysqli_query($conn, "SELECT tp.*, d.nama AS nama_dosen, p.judul AS judul_penelitian
                             FROM tim_penelitian tp
                             LEFT JOIN dosen d ON tp.dosen_id = d.id
                             LEFT JOIN penelitian p ON tp.penelitian_id = p.id");

// Ambil data dosen dan penelitian untuk dropdown
$dosen = mysqli_query($conn, "SELECT * FROM dosen");
$penelitian = mysqli_query($conn, "SELECT * FROM penelitian");
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="layoutSidenav_content">
<div class="container">
    <link href="css/styles2.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <div class="container-fluid px-4">
        <h2>Tim Penelitian</h2>

        <!-- Form tambah tim penelitian -->
        <form method="POST" class="mb-4">
            <select name="penelitian_id" required>
                <option value="">Pilih Judul Penelitian</option>
                <?php while ($p = mysqli_fetch_assoc($penelitian)) { ?>
                    <option value="<?= $p['id'] ?>"><?= $p['judul'] ?></option>
                <?php } ?>
            </select>

            <select name="dosen_id" required>
                <option value="">Pilih Dosen</option>
                <?php while ($d = mysqli_fetch_assoc($dosen)) { ?>
                    <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                <?php } ?>
            </select>

            <input type="text" name="peran" placeholder="Peran (contoh: Ketua, Anggota)" required>
            <button name="tambah">Tambah</button>
        </form>

        <!-- Tampilan data tim penelitian -->
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_dosen'] ?></h5>
                        <p class="card-text">
                            <strong>Penelitian:</strong> <?= $row['judul_penelitian'] ?><br>
                            <strong>Peran:</strong> <?= $row['peran'] ?>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a class="small text-primary" href="#">View</a>
                        <a class="small text-danger" href="?hapus=1&penelitian_id=<?= $row['penelitian_id'] ?>&dosen_id=<?= $row['dosen_id'] ?>">Hapus</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
