<?php
include 'config/database.php';

// Tambah data
if (isset($_POST['tambah'])) {
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $gelar_belakang = $_POST['gelar_belakang'];
    $gelar_depan = $_POST['gelar_depan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $prodi_id = $_POST['prodi_id'];

    mysqli_query($conn, "INSERT INTO dosen (nidn, nama, gelar_belakang, gelar_depan, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, email, tahun_masuk, prodi_id)
    VALUES ('$nidn','$nama','$gelar_belakang','$gelar_depan','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat','$email','$tahun_masuk','$prodi_id')");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM dosen WHERE id=$id");
    header("Location: dosen.php");
}

// Ambil data dosen
$data = mysqli_query($conn, "SELECT dosen.*, prodi.nama as nama_prodi FROM dosen 
                             LEFT JOIN prodi ON dosen.prodi_id = prodi.id");

// Ambil data prodi untuk dropdown
$prodi = mysqli_query($conn, "SELECT * FROM prodi");
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="layoutSidenav_content">
<div class="container">
    <link href="css/styles2.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <div class="container-fluid px-4">
        <h2>Data Dosen</h2>

        <!-- Form tambah dosen -->
        <form method="POST" class="mb-4">
            <input type="text" name="nidn" placeholder="NIDN" required>
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="gelar_depan" placeholder="Gelar Depan">
            <input type="text" name="gelar_belakang" placeholder="Gelar Belakang">
            <select name="jenis_kelamin" required>
                <option value="">Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            <input type="text" name="tempat_lahir" placeholder="Tempat Lahir">
            <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir">
            <input type="text" name="alamat" placeholder="Alamat">
            <input type="email" name="email" placeholder="Email">
            <input type="number" name="tahun_masuk" placeholder="Tahun Masuk">
            <select name="prodi_id" required>
                <option value="">Pilih Prodi</option>
                <?php while ($p = mysqli_fetch_assoc($prodi)) { ?>
                    <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                <?php } ?>
            </select>
            <button name="tambah">Tambah</button>
        </form>

        <!-- Tampilan data dosen -->
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['gelar_depan'] . ' ' . $row['nama'] . ', ' . $row['gelar_belakang'] ?></h5>
                        <p class="card-text">
                            <strong>NIDN:</strong> <?= $row['nidn'] ?><br>
                            <strong>JK:</strong> <?= $row['jenis_kelamin'] ?><br>
                            <strong>Lahir:</strong> <?= $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'] ?><br>
                            <strong>Alamat:</strong> <?= $row['alamat'] ?><br>
                            <strong>Email:</strong> <?= $row['email'] ?><br>
                            <strong>Tahun Masuk:</strong> <?= $row['tahun_masuk'] ?><br>
                            <strong>Prodi:</strong> <?= $row['nama_prodi'] ?>
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
