<?php include_once 'top.php'; require_once 'koneksi.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM dosen WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if (!$data) {
    die("Dosen tidak ditemukan.");
}
?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Edit Dosen</h3></div>
          <div class="col-sm-6"><ol class="breadcrumb float-sm-end"><li class="breadcrumb-item"><a href="index.php">Home</a></li><li class="breadcrumb-item"><a href="dosen_list.php">Dosen</a></li><li class="breadcrumb-item active">Edit</li></ol></div>
        </div>
      </div>
    </div>

    <div class="app-content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header bg-warning text-white">Form Edit Dosen</div>
          <div class="card-body">
            <form method="POST" action="dosen_proses.php">
              <input type="hidden" name="id" value="<?= $data['id']; ?>">
              <div class="row">
                <!-- sama seperti form tambah -->
                <?php
                $fields = [
                    'nidn', 'nama', 'gelar_depan', 'gelar_belakang', 'jenis_kelamin',
                    'tempat_lahir', 'tanggal_lahir', 'alamat', 'email', 'tahun_masuk'
                ];
                foreach ($fields as $f) {
                    echo '<div class="col-md-6 mb-3"><label>' . ucfirst(str_replace('_', ' ', $f)) . '</label><input class="form-control" type="' . ($f === 'tanggal_lahir' ? 'date' : 'text') . '" name="' . $f . '" value="' . htmlspecialchars($data[$f]) . '"></div>';
                }
                ?>
                <div class="col-md-6 mb-3">
                  <label>Program Studi</label>
                  <select name="prodi_id" class="form-control">
                    <?php
                    $prodi = $pdo->query("SELECT * FROM prodi");
                    while ($p = $prodi->fetch()) {
                        $selected = $p['id'] == $data['prodi_id'] ? 'selected' : '';
                        echo "<option value='{$p['id']}' $selected>{$p['nama']}</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
              <a href="dosen_list.php" class="btn btn-secondary">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>
