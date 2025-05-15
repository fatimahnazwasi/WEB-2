<?php include_once 'top.php'; require_once 'koneksi.php'; ?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Tambah Prodi</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="prodi_list.php">Prodi</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-success text-white">Form Tambah Prodi</div>
          <div class="card-body">
            <form method="POST" action="prodi_proses.php">
              <div class="mb-3">
                <label for="kode" class="form-label">Kode Prodi</label>
                <input type="text" class="form-control" id="kode" name="kode" required>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Prodi</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
              </div>
              <div class="mb-3">
                <label for="telpon" class="form-label">Telpon</label>
                <input type="text" class="form-control" id="telpon" name="telpon">
              </div>
              <div class="mb-3">
                <label for="ketua" class="form-label">Ketua Prodi</label>
                <input type="text" class="form-control" id="ketua" name="ketua">
              </div>
              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              <a href="prodi_list.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
