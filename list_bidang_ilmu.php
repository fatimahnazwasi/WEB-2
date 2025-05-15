<?php
require_once 'koneksi.php';

// Pesan sukses
if (isset($_GET['success'])) {
    echo "<p style='color:green'>Data berhasil ".($_GET['success'] == 1 ? 'ditambahkan' : 'diperbarui')."!</p>";
}

// Pesan delete
if (isset($_GET['deleted'])) {
    echo "<p style='color:green'>Data berhasil dihapus!</p>";
}

$sql = "SELECT * FROM bidang_ilmu ORDER BY nama";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Bidang Ilmu</title>
</head>
<body>
    <h2>Daftar Bidang Ilmu</h2>
    <a href="create_bidang_ilmu.php">Tambah Baru</a><br><br>
    
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama Bidang Ilmu</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['deskripsi']) ?></td>
            <td>
                <a href="edit_bidang_ilmu.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="delete_bidang_ilmu.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>