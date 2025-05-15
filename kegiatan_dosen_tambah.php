<?php 
include_once 'top.php'; 
require_once 'koneksi.php';

// Ambil data dosen
$dosenStmt = $pdo->query("SELECT * FROM dosen");
$dosenList = $dosenStmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil data kegiatan
$kegiatanStmt = $pdo->query("SELECT * FROM kegiatan");
$kegiatanList = $kegiatanStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Tambah Kegiatan Dosen</h3></div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <form action="kegiatan_dosen_proses.php" method="POST">
          <div class="mb-3">
            <label for="dosen_id" class="form-label">Nama Dosen</label>
            <select name="dosen_id" class="form-select" required>
              <option value="">- Pilih Dosen -</option>
              <?php foreach ($dosenList as $dosen): ?>
              <option value="<?= $dosen['id'] ?>"><?= $dosen['nama'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="kegiatan_id" class="form-label">Nama Kegiatan</label>
            <select name="kegiatan_id" class="form-select" required>
              <option value="">- Pilih Kegiatan -</option>
              <?php foreach ($kegiatanList as $kegiatan): ?>
              <option value="<?= $kegiatan['id'] ?>"><?= $kegiatan['deskripsi'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
          <a href="kegiatan_dosen_list.php" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
