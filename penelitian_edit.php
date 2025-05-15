<?php include_once 'top.php'; require_once 'koneksi.php'; 

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM penelitian WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch();

// ambil bidang ilmu
$bidang = $pdo->query("SELECT * FROM bidang_ilmu ORDER BY nama ASC")->fetchAll();
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content">
      <h3>Edit Penelitian</h3>
      <form action="penelitian_proses.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="mb-3">
          <label>Judul</label>
          <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
        </div>
        <div class="mb-3">
          <label>Mulai</label>
          <input type="date" name="mulai" class="form-control" value="<?= $data['mulai'] ?>" required>
        </div>
        <div class="mb-3">
          <label>Akhir</label>
          <input type="date" name="akhir" class="form-control" value="<?= $data['akhir'] ?>" required>
        </div>
        <div class="mb-3">
          <label>Tahun Ajaran</label>
          <input type="text" name="tahun_ajaran" class="form-control" value="<?= $data['tahun_ajaran'] ?>" required>
        </div>
        <div class="mb-3">
          <label>Bidang Ilmu</label>
          <select name="bidang_ilmu_id" class="form-control" required>
            <?php foreach($bidang as $b): ?>
              <option value="<?= $b['id'] ?>" <?= $data['bidang_ilmu_id'] == $b['id'] ? 'selected' : '' ?>>
                <?= $b['nama'] ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="penelitian_list.php" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
