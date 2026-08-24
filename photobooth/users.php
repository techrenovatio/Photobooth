<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
require_once "config.php";

// Proteksi Khusus Admin
if (!isset($_SESSION['user_logged']) || $_SESSION['role'] !== 'admin') {
    die("Akses Ditolak! Halaman ini khusus Super Admin.");
}

$msg = "";

// Tambah User Baru
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_user'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $nama     = $conn->real_escape_string($_POST['nama_lengkap']);
    $role     = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $nama, $role);
    
    if ($stmt->execute()) {
        $msg = "User baru berhasil ditambahkan!";
    } else {
        $msg = "Gagal menambah user: " . $conn->error;
    }
}

// Hapus User
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM users WHERE id = $id AND username != 'admin'");
    header("Location: users.php");
    exit;
}

$users = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Panitia - Admin</title>
    <style>
        body { font-family: sans-serif; background: #f4f6f9; padding: 20px; color: #333; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; }
        .form-group { margin-bottom: 10px; }
        .form-group input, .form-group select { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { background: #2563eb; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
    </style>
</head>
<body>
<div class="container">
    <h3>Kelola Akun Panitia / Operator</h3>
    <a href="admin.php">← Kembali ke Dashboard Admin</a>
    <hr>
    <?php if($msg): ?><p style="color: green;"><?= $msg ?></p><?php endif; ?>

    <h4>Tambah User Baru</h4>
    <form method="POST">
        <div class="form-group"><input type="text" name="username" placeholder="Username" required></div>
        <div class="form-group"><input type="password" name="password" placeholder="Password" required></div>
        <div class="form-group"><input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required></div>
        <div class="form-group">
            <select name="role">
                <option value="operator">Operator Stand</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" name="add_user" class="btn">Simpan User</button>
    </form>

    <h4>Daftar User</h4>
    <table>
        <thead>
            <tr><th>No</th><th>Username</th><th>Nama</th><th>Role</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            <?php $no=1; while($u = $users->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($u['username']) ?></td>
                <td><?= htmlspecialchars($u['nama_lengkap']) ?></td>
                <td><b><?= htmlspecialchars($u['role']) ?></b></td>
                <td>
                    <?php if($u['username'] !== 'admin'): ?>
                        <a href="users.php?delete=<?= $u['id'] ?>" onclick="return confirm('Hapus user ini?')" style="color: red;">Hapus</a>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>