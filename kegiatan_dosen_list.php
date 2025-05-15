<?php include_once 'top.php'; require_once 'koneksi.php'; ?>
<?php
// Aktifkan error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
// Ambil data kegiatan dosen
$query = "
SELECT d.nama AS nama_dosen, k.deskripsi AS nama_kegiatan
FROM dosen_kegiatan dk
JOIN dosen d ON dk.dosen_id = d.id
JOIN kegiatan k ON dk.kegiatan_id = k.id
";

$stmt = $pdo->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Kegiatan Dosen</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Kegiatan Dosen</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <a href="kegiatan_dosen_tambah.php" class="btn btn-primary mb-3">Tambah Kegiatan Dosen</a>

        <div class="table-responsive">
          <table class="table table-bordered" style="text-align: center;">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Nama Dosen</th>
                <th>Nama Kegiatan</th>
                <!-- <th>Aksi</th> -->
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($data as $row): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama_dosen']) ?></td>
                <td><?= htmlspecialchars($row['nama_kegiatan']) ?></td>
                <!-- <td>
                    <a href="kegiatan_dosen_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="kegiatan_dosen_proses.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td> -->
                


              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
