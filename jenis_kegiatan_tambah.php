<?php include_once 'top.php'; require_once 'koneksi.php'; ?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Tambah Jenis Kegiatan</h3></div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-success text-white">Form Tambah</div>
          <div class="card-body">
            <form method="POST" action="jenis_kegiatan_proses.php">
              <div class="mb-3">
                <label class="form-label">Nama Jenis Kegiatan</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              <a href="jenis_kegiatan_list.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
