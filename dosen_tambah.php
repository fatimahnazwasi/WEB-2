<?php include_once 'top.php'; require_once 'koneksi.php'; ?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Tambah Dosen</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="dosen_list.php">Dosen</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-success text-white">Form Tambah Dosen</div>
          <div class="card-body">
            <form method="POST" action="dosen_proses.php">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3"><label>NIDN</label><input type="text" name="nidn" class="form-control" required></div>
                  <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
                  <div class="mb-3"><label>Gelar Depan</label><input type="text" name="gelar_depan" class="form-control"></div>
                  <div class="mb-3"><label>Gelar Belakang</label><input type="text" name="gelar_belakang" class="form-control"></div>
                  <div class="mb-3"><label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                  <div class="mb-3"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control"></div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control"></div>
                  <div class="mb-3"><label>Alamat</label><input type="text" name="alamat" class="form-control"></div>
                  <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
                  <div class="mb-3"><label>Tahun Masuk</label><input type="number" name="tahun_masuk" class="form-control"></div>
                  <div class="mb-3"><label>Program Studi</label>
                    <select name="prodi_id" class="form-control">
                      <?php
                      $prodi = $pdo->query("SELECT * FROM prodi");
                      while ($p = $prodi->fetch()) {
                          echo "<option value='{$p['id']}'>{$p['nama']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              <a href="dosen_list.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
