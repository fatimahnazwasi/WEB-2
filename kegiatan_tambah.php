<?php include_once 'top.php'; require_once 'koneksi.php'; ?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Tambah Kegiatan</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="kegiatan_list.php">Kegiatan</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <form action="kegiatan_proses.php" method="POST">
          <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tempat</label>
            <input type="text" name="tempat" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Kegiatan</label>
            <select name="jenis_kegiatan_id" class="form-select" required>
              <option value="">- Pilih Jenis Kegiatan -</option>
              <?php
              $stmt = $pdo->query("SELECT * FROM jenis_kegiatan");
              $jenisList = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if (count($jenisList) > 0) {
                foreach ($jenisList as $jenis) {
                  echo "<option value='{$jenis['id']}'>{$jenis['nama']}</option>";
                }
              } else {
                echo "<option value='' disabled>Tidak ada data</option>";
              }
              ?>
            </select>
            <?php if (count($jenisList) === 0): ?>
              <div class="text-danger mt-1">Data jenis kegiatan belum ada. Silakan tambah dulu.</div>
            <?php endif; ?>
          </div>

          <button type="submit" name="tambah" class="btn btn-success">Simpan</button>
          <a href="kegiatan_list.php" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
