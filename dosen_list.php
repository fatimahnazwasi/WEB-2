<?php include_once 'top.php'; require_once 'koneksi.php'; ?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Daftar Dosen</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dosen</li>
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
              <span>Data Dosen</span>
              <a href="dosen_tambah.php" class="btn btn-primary btn-sm">Tambah Dosen</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-sm table-bordered" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIDN</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Prodi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = "SELECT d.*, p.nama AS nama_prodi FROM dosen d LEFT JOIN prodi p ON d.prodi_id = p.id";
                $stmt = $pdo->query($query);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($row['nidn']); ?></td>
                  <td><?= htmlspecialchars($row['gelar_depan'] . ' ' . $row['nama'] . ', ' . $row['gelar_belakang']); ?></td>
                  <td><?= htmlspecialchars($row['email']); ?></td>
                  <td><?= htmlspecialchars($row['nama_prodi']); ?></td>
                  <td>
                    <a href="dosen_edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="dosen_proses.php?hapus=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                  </td>
                </tr>
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
