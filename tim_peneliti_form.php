<?php
include_once 'top.php';
require_once 'koneksi.php';

// Start session untuk pesan error
session_start();

$isEdit = isset($_GET['dosen_id']) && isset($_GET['penelitian_id']);

if ($isEdit) {
    // Query untuk mengambil data tim peneliti yang akan diedit
    $stmt = $pdo->prepare("SELECT * FROM tim_penelitian WHERE dosen_id=? AND penelitian_id=?");
    $stmt->execute([$_GET['dosen_id'], $_GET['penelitian_id']]);
    $data = $stmt->fetch();
    
    if (!$data) {
        $_SESSION['error'] = "Data tim peneliti tidak ditemukan";
        header("Location: tim_peneliti.php");
        exit;
    }
}

// Ambil data dosen dan penelitian
try {
    $dosen = $pdo->query("SELECT id, nidn, nama FROM dosen ORDER BY nama")->fetchAll();
    $penelitian = $pdo->query("SELECT id, judul FROM penelitian ORDER BY judul")->fetchAll();
} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0"><?= $isEdit ? 'Edit' : 'Tambah' ?> Tim Peneliti</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="tim_peneliti.php">Tim Peneliti</a></li>
              <li class="breadcrumb-item active"><?= $isEdit ? 'Edit' : 'Tambah' ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger alert-dismissible fade show">
            <?= $_SESSION['error'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="card">
          <div class="card-body">
            <form method="post" action="tim_peneliti_simpan.php">
              <input type="hidden" name="is_edit" value="<?= $isEdit ? '1' : '0' ?>">
              
              <?php if ($isEdit): ?>
                <input type="hidden" name="old_dosen_id" value="<?= htmlspecialchars($data['dosen_id']) ?>">
                <input type="hidden" name="old_penelitian_id" value="<?= htmlspecialchars($data['penelitian_id']) ?>">
              <?php endif; ?>

              <div class="mb-3">
                <label class="form-label">Dosen</label>
                <select name="dosen_id" class="form-select" <?= $isEdit ? 'disabled' : 'required' ?>>
                  <?php if (!$isEdit): ?>
                    <option value="">-- Pilih Dosen --</option>
                  <?php endif; ?>
                  <?php foreach ($dosen as $d): ?>
                    <option value="<?= $d['id'] ?>" 
                      <?= ($isEdit && $d['id'] == $data['dosen_id']) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($d['nidn'] . ' - ' . $d['nama']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <?php if ($isEdit): ?>
                  <input type="hidden" name="dosen_id" value="<?= htmlspecialchars($data['dosen_id']) ?>">
                <?php endif; ?>
              </div>

              <div class="mb-3">
                <label class="form-label">Penelitian</label>
                <select name="penelitian_id" class="form-select" <?= $isEdit ? 'disabled' : 'required' ?>>
                  <?php if (!$isEdit): ?>
                    <option value="">-- Pilih Penelitian --</option>
                  <?php endif; ?>
                  <?php foreach ($penelitian as $p): ?>
                    <option value="<?= $p['id'] ?>" 
                      <?= ($isEdit && $p['id'] == $data['penelitian_id']) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($p['judul']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <?php if ($isEdit): ?>
                  <input type="hidden" name="penelitian_id" value="<?= htmlspecialchars($data['penelitian_id']) ?>">
                <?php endif; ?>
              </div>

              <div class="mb-3">
                <label class="form-label">Peran</label>
                <input type="text" name="peran" class="form-control" 
                       value="<?= isset($data['peran']) ? htmlspecialchars($data['peran']) : '' ?>" required>
              </div>

              <div class="d-flex justify-content-between">
                <a href="tim_peneliti.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
