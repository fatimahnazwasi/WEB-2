<?php include_once 'top.php'; require_once 'koneksi.php'; ?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Tambah Bidang Ilmu</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Bidang Ilmu</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
    <form action="proses_bidang_ilmu.php" method="POST">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Bidang</label>
          <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control" name="deskripsi" rows="3"></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="bidang_ilmu.php" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>

