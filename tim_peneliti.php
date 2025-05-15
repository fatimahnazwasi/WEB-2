<?php 
include_once 'top.php'; 
require_once 'koneksi.php';

// Tampilkan error
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Tim Peneliti</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Tim Peneliti</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <a href="tim_peneliti_form.php" class="btn btn-primary mb-3">+ Tambah Tim Peneliti</a>

        <?php
        try {
            $stmt = $pdo->query("
                SELECT tp.dosen_id, tp.penelitian_id, tp.peran,
                       d.nama AS nama_dosen, 
                       p.judul AS judul_penelitian
                FROM tim_penelitian tp
                LEFT JOIN dosen d ON tp.dosen_id = d.id
                LEFT JOIN penelitian p ON tp.penelitian_id = p.id
                ORDER BY p.judul ASC, d.nama ASC
            ");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($rows) > 0): ?>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped" style="text-align: center;">
                    <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>Judul Penelitian</th>
                        <th>Peran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($rows as $row): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= htmlspecialchars($row['nama_dosen'] ?? '-') ?></td>
                          <td><?= htmlspecialchars($row['judul_penelitian'] ?? '-') ?></td>
                          <td><?= htmlspecialchars($row['peran'] ?? '-') ?></td>
                          <td>
                            <a href="tim_peneliti_form.php?dosen_id=<?= $row['dosen_id'] ?>&penelitian_id=<?= $row['penelitian_id'] ?>" 
                               class="btn btn-warning btn-sm" title="Edit">
                              <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="tim_peneliti_hapus.php?dosen_id=<?= $row['dosen_id'] ?>&penelitian_id=<?= $row['penelitian_id'] ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Yakin ingin menghapus data ini?')" 
                               title="Hapus">
                              <i class="fas fa-trash"></i> Hapus
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
            <?php else: ?>
              <div class="alert alert-info">Belum ada data tim peneliti. <a href="tim_peneliti_form.php" class="alert-link">Tambah sekarang</a>.</div>
            <?php endif;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
        ?>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
