<?php 
include_once 'top.php'; 
require_once 'koneksi.php'; 

$id = $_GET['id'];

// Ambil data kegiatan berdasarkan ID
$query = "SELECT * FROM kegiatan WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Ambil daftar jenis kegiatan
$jenisQuery = "SELECT * FROM jenis_kegiatan";
$jenisStmt = $pdo->query($jenisQuery);
$jenisList = $jenisStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Edit Kegiatan</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="kegiatan_list.php">Kegiatan</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <form action="kegiatan_proses.php" method="POST">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">

          <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="<?= $data['tanggal_mulai'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="<?= $data['tanggal_selesai'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="tempat" class="form-label">Tempat</label>
            <input type="text" name="tempat" class="form-control" value="<?= $data['tempat'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required><?= $data['deskripsi'] ?></textarea>
          </div>
          <div class="mb-3">
            <label for="jenis_kegiatan_id" class="form-label">Jenis Kegiatan</label>
            <select name="jenis_kegiatan_id" class="form-select" required>
              <option value="">- Pilih Jenis Kegiatan -</option>
              <?php foreach ($jenisList as $row): ?>
                <option value="<?= $row['id'] ?>" <?= ($row['id'] == $data['jenis_kegiatan_id']) ? 'selected' : '' ?>>
                  <?= $row['nama'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="kegiatan_list.php" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
