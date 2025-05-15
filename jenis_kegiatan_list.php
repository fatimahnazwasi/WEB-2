<?php include_once 'top.php'; require_once 'koneksi.php';

?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Jenis Kegiatan</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Jenis Kegiatan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="mb-0">Data Jenis Kegiatan</h5>
            <a href="jenis_kegiatan_tambah.php" class="btn btn-sm btn-primary ms-auto">+ Tambah</a>
          </div>

          <div class="card-body">
            <table class="table table-bordered table-sm" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Jenis Kegiatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $no = 1;
                $sql = "SELECT * FROM jenis_kegiatan";
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :

              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($row['nama']); ?></td>
                  <td>
                    <button data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</button>
                    <a href="jenis_kegiatan_proses.php?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                  </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <form method="POST" action="jenis_kegiatan_proses.php">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Jenis Kegiatan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?= $row['id'] ?>">
                          <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama']) ?>" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
