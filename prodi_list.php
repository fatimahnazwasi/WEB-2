<?php include_once 'top.php'; require_once 'koneksi.php'; ?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Daftar Prodi</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Prodi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <span>Data Program Studi</span>
              <a href="prodi_tambah.php" class="btn btn-primary btn-sm">Tambah Prodi</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telpon</th>
                  <th>Ketua</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Query untuk mengambil data program studi
                $stmt = $pdo->query("SELECT * FROM prodi");
                $no = 1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['kode']); ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['alamat']); ?></td>
                    <td><?= htmlspecialchars($row['telpon']); ?></td>
                    <td><?= htmlspecialchars($row['ketua']); ?></td>
                    <td>
                      <!-- Tombol Edit -->
                      <button data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</button>
                      <a href="prodi_proses.php?hapus_id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                  </tr>

                  <!-- Modal Edit untuk setiap baris -->
                 <!-- Modal Edit untuk setiap baris -->
<div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <form action="prodi_proses.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel<?= $row['id']; ?>">Edit Prodi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $row['id']; ?>"> <!-- ID yang akan diubah -->
          <div class="mb-3">
            <label for="kode" class="form-label">Kode Prodi</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $row['kode']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat']; ?>">
          </div>
          <div class="mb-3">
            <label for="telpon" class="form-label">Telpon</label>
            <input type="text" class="form-control" id="telpon" name="telpon" value="<?= $row['telpon']; ?>">
          </div>
          <div class="mb-3">
            <label for="ketua" class="form-label">Ketua Prodi</label>
            <input type="text" class="form-control" id="ketua" name="ketua" value="<?= $row['ketua']; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </div>
    </form>
  </div>
</div>

                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
