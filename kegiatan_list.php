<?php include_once 'top.php'; require_once 'koneksi.php'; ?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Daftar Kegiatan</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Kegiatan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <a href="kegiatan_tambah.php" class="btn btn-primary mb-3">Tambah Kegiatan</a>

        <?php
       $query = "SELECT k.*, j.nama AS jenis_kegiatan 
       FROM kegiatan k 
       LEFT JOIN jenis_kegiatan j ON k.jenis_kegiatan_id = j.id";
$stmt = $pdo->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        ?>

        <div class="table-responsive">
          <table class="table table-bordered" style="text-align: center;">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Tempat</th>
                <th>Deskripsi</th>
                <th>Jenis Kegiatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
             $no = 1;
             foreach ($result as $row): ?>
             <tr>
               <td><?= $no++ ?></td>
               <td><?= $row['tanggal_mulai'] ?></td>
               <td><?= $row['tanggal_selesai'] ?></td>
               <td><?= $row['tempat'] ?></td>
               <td><?= $row['deskripsi'] ?></td>
               <td><?= $row['jenis_kegiatan'] ?></td>
               <td>
                 <a href="kegiatan_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                 <a href="kegiatan_proses.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
               </td>
             </tr>
             <?php endforeach; ?>
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
