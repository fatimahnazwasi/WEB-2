<?php include_once 'top.php'; require_once 'koneksi.php'; 

$stmt = $pdo->query("SELECT p.*, b.nama AS bidang_nama 
                     FROM penelitian p 
                     LEFT JOIN bidang_ilmu b ON p.bidang_ilmu_id = b.id 
                     ORDER BY p.id ASC");
$data = $stmt->fetchAll();
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Daftar Penelitian</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Penelitian</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <a href="penelitian_tambah.php" class="btn btn-primary mb-3">+ Tambah</a>
      <table class="table table-bordered" style="text-align: center;">
        <thead>
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Mulai</th>
            <th>Akhir</th>
            <th>Tahun Ajaran</th>
            <th>Bidang Ilmu</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($data as $row): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['judul']) ?></td>
              <td><?= $row['mulai'] ?></td>
              <td><?= $row['akhir'] ?></td>
              <td><?= $row['tahun_ajaran'] ?></td>
              <td><?= htmlspecialchars($row['bidang_nama']) ?></td>
              <td>
                <a href="penelitian_edit.php?id=<?= $row['id'] ?>" class="btn btn-warning ">Edit</a>
                <a href="penelitian_hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger " onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
