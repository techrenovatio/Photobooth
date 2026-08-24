<?php
date_default_timezone_set('Asia/Jakarta');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "config.php";

// ============================================
// 1. PROTEKSI LOGIN KETAT (Mencegah Akses Tanpa Session)
// ============================================
if (!isset($_SESSION['user_logged']) || $_SESSION['user_logged'] !== true) {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    
    header("Location: login");
    exit();
}

$currentRole     = $_SESSION['role'] ?? 'operator';
$currentUsername = $_SESSION['username'] ?? 'User';
$currentNama     = $_SESSION['nama'] ?? 'Operator';

$msg = "";

// ============================================
// 2. LOGIKA KELOLA USER (KHUSUS ADMIN)
// ============================================

// Tambah User Baru
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_user'])) {
    if ($currentRole !== 'admin') {
        die("<script>alert('Akses Ditolak!'); window.location='dashboard';</script>");
    }

    $u_name = $conn->real_escape_string($_POST['username']);
    $u_pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $u_fullname = $conn->real_escape_string($_POST['nama_lengkap']);
    $u_role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $u_name, $u_pass, $u_fullname, $u_role);

    if ($stmt->execute()) {
        $ip  = $_SERVER['REMOTE_ADDR'];
        $now = date("Y-m-d H:i:s");
        $conn->query("INSERT INTO activity_logs (username, action, ip_address, created_at) VALUES ('$currentUsername', 'Tambah User: $u_name', '$ip', '$now')");
        header("Location: dashboard?msg=user_added");
        exit();
    } else {
        $msg = "Gagal menambah user: " . $conn->error;
    }
}

// Hapus User
if (isset($_GET['action']) && $_GET['action'] === 'delete_user' && isset($_GET['uid'])) {
    if ($currentRole !== 'admin') {
        die("<script>alert('Akses Ditolak!'); window.location='dashboard';</script>");
    }

    $uid = intval($_GET['uid']);
    $conn->query("DELETE FROM users WHERE id = $uid AND username != 'admin'");
    header("Location: dashboard?msg=user_deleted");
    exit();
}

// ============================================
// 3. LOGIKA HAPUS FOTO (SATUAN & BULK CHECKBOX)
// ============================================

// Hapus Satu Foto
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    if ($currentRole !== 'admin') {
        die("<script>alert('Akses Ditolak!'); window.location='dashboard';</script>");
    }

    $id = intval($_GET['id']);
    
    $stmt = $conn->prepare("SELECT file_name FROM photos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultFile = $stmt->get_result();
    
    if ($rowFile = $resultFile->fetch_assoc()) {
        $filePath = __DIR__ . "/uploads/hasil/" . $rowFile['file_name'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
    
    $stmtDel = $conn->prepare("DELETE FROM photos WHERE id = ?");
    $stmtDel->bind_param("i", $id);
    $stmtDel->execute();

    $ip  = $_SERVER['REMOTE_ADDR'];
    $now = date("Y-m-d H:i:s");
    $conn->query("INSERT INTO activity_logs (username, action, ip_address, created_at) VALUES ('$currentUsername', 'Hapus Foto ID #$id', '$ip', '$now')");
    
    header("Location: dashboard?msg=deleted");
    exit();
}

// Hapus Banyak Foto (Bulk Delete via Checkbox)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['bulk_delete'])) {
    if ($currentRole !== 'admin') {
        die("<script>alert('Akses Ditolak!'); window.location='dashboard';</script>");
    }

    if (!empty($_POST['selected_ids']) && is_array($_POST['selected_ids'])) {
        $ids = array_map('intval', $_POST['selected_ids']);
        $idList = implode(',', $ids);

        // Hapus File Gambar
        $resFiles = $conn->query("SELECT file_name FROM photos WHERE id IN ($idList)");
        while ($rowFile = $resFiles->fetch_assoc()) {
            $filePath = __DIR__ . "/uploads/hasil/" . $rowFile['file_name'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Hapus Record Database
        $conn->query("DELETE FROM photos WHERE id IN ($idList)");

        $ip  = $_SERVER['REMOTE_ADDR'];
        $now = date("Y-m-d H:i:s");
        $count = count($ids);
        $conn->query("INSERT INTO activity_logs (username, action, ip_address, created_at) VALUES ('$currentUsername', 'Hapus Bulk $count Data Foto', '$ip', '$now')");

        header("Location: dashboard?msg=bulk_deleted");
        exit();
    }
}

// Reset Semua Foto
if (isset($_GET['action']) && $_GET['action'] === 'truncate') {
    if ($currentRole !== 'admin') {
        die("<script>alert('Akses Ditolak!'); window.location='dashboard';</script>");
    }

    $files = glob(__DIR__ . '/uploads/hasil/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
    
    $conn->query("TRUNCATE TABLE photos");

    $ip  = $_SERVER['REMOTE_ADDR'];
    $now = date("Y-m-d H:i:s");
    $conn->query("INSERT INTO activity_logs (username, action, ip_address, created_at) VALUES ('$currentUsername', 'Reset Semua Data & Foto', '$ip', '$now')");

    header("Location: dashboard?msg=truncated");
    exit();
}

// ============================================
// 4. QUERY DATA DASHBOARD
// ============================================
$queryTotal = "SELECT COUNT(*) as total FROM photos";
$resTotal   = $conn->query($queryTotal);
$totalMaba  = $resTotal->fetch_assoc()['total'] ?? 0;

$queryData = "SELECT * FROM photos ORDER BY id DESC";
$result    = $conn->query($queryData);

$queryUsers = "SELECT * FROM users ORDER BY id ASC";
$resUsers   = $conn->query($queryUsers);

$queryLogs = "SELECT * FROM activity_logs ORDER BY id DESC LIMIT 5";
$resLogs   = $conn->query($queryLogs);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Presensi PKKMB Photobooth</title>
    <style>
        :root {
            --bg-body: #f4f6f9;
            --bg-card: #ffffff;
            --text-main: #333333;
            --text-sub: #64748b;
            --border-color: #e2e8f0;
            --box-bg: #f8fafc;
            --table-header-bg: #f8fafc;
            --table-hover: #f1f5f9;
            --topbar-bg: #1e293b;
        }

        body.dark-theme {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --text-main: #f8fafc;
            --text-sub: #94a3b8;
            --border-color: #334155;
            --box-bg: #0f172a;
            --table-header-bg: #0f172a;
            --table-hover: #334155;
            --topbar-bg: #020617;
        }

        * { box-sizing: border-box; transition: background 0.2s, color 0.2s; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: var(--bg-body); margin: 0; padding: 15px; color: var(--text-main); }
        .container { max-width: 1250px; margin: auto; background: var(--bg-card); padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        
        .top-bar { display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; background: var(--topbar-bg); color: #fff; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; gap: 10px; }
        .top-bar .user-info { font-size: 14px; }
        .top-bar .role-badge { background: #3b82f6; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: bold; text-transform: uppercase; margin-left: 5px; }
        .top-bar .role-badge.admin { background: #ef4444; }
        
        .nav-buttons { display: flex; gap: 8px; flex-wrap: wrap; align-items: center; }
        .btn-nav { background: #334155; color: #fff; text-decoration: none; padding: 6px 12px; border-radius: 5px; font-size: 12px; font-weight: bold; }
        .btn-logout { background: #ef4444; color: #fff; text-decoration: none; padding: 6px 12px; border-radius: 5px; font-size: 12px; font-weight: bold; }
        .btn-theme { background: rgba(255, 255, 255, 0.2); color: #fff; border: 1px solid rgba(255,255,255,0.3); padding: 6px 12px; border-radius: 20px; font-size: 12px; cursor: pointer; font-weight: bold; }

        .header { display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 2px solid var(--border-color); padding-bottom: 15px; gap: 15px; }
        .header h2 { margin: 0; color: var(--text-main); font-size: 20px; }
        .actions-group { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; }
        .stats-card { background: #3b82f6; color: #fff; padding: 8px 16px; border-radius: 8px; text-align: center; font-weight: bold; }
        .btn-export { background: #10b981; color: #fff; border: none; padding: 10px 14px; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 12px; }
        .btn-truncate { background: #ef4444; color: #fff; text-decoration: none; padding: 10px 14px; border-radius: 6px; font-weight: bold; font-size: 12px; }
        .btn-bulk-delete { background: #dc2626; color: #fff; border: none; padding: 10px 14px; border-radius: 6px; font-weight: bold; font-size: 12px; cursor: pointer; display: none; }

        .grid-dashboard { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px; }
        .card-box { background: var(--box-bg); border: 1px solid var(--border-color); border-radius: 8px; padding: 15px; overflow-x: auto; }
        .card-box h4 { margin: 0 0 10px 0; color: var(--text-main); font-size: 14px; border-bottom: 1px solid var(--border-color); padding-bottom: 5px; }

        /* FORM USER RESPONSIVE */
        .form-user-inline { display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 8px; margin-bottom: 15px; }
        .form-user-inline input, .form-user-inline select { padding: 8px; border: 1px solid var(--border-color); border-radius: 4px; font-size: 12px; width: 100%; background: var(--bg-card); color: var(--text-main); }
        .btn-add-user { background: #2563eb; color: #fff; border: none; padding: 8px; border-radius: 4px; font-weight: bold; font-size: 12px; cursor: pointer; }

        .table-responsive { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; margin-top: 15px; }
        table.main-table, table.user-table { width: 100%; border-collapse: collapse; min-width: 650px; }
        table.main-table th, table.main-table td, table.user-table th, table.user-table td { padding: 10px 8px; text-align: left; border-bottom: 1px solid var(--border-color); font-size: 12px; color: var(--text-main); }
        table.main-table th { background: var(--table-header-bg); color: var(--text-sub); }
        table.main-table tr:hover { background: var(--table-hover); }
        .thumb { width: 45px; height: 65px; object-fit: cover; border-radius: 4px; }
        .log-item { display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px dashed var(--border-color); font-size: 12px; }
        .alert { padding: 10px 15px; background: #d1fae5; color: #065f46; border-radius: 6px; margin-bottom: 15px; font-size: 13px; }

        /* CHECKBOX CUSTOM */
        input[type="checkbox"] { transform: scale(1.2); cursor: pointer; }

        @media (max-width: 850px) {
            .grid-dashboard { grid-template-columns: 1fr; }
            body { padding: 8px; }
            .container { padding: 12px; }
            .header h2 { font-size: 18px; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-bar">
        <div class="user-info">
            Halo, <strong><?= htmlspecialchars($currentNama) ?></strong> 
            <span class="role-badge <?= $currentRole === 'admin' ? 'admin' : '' ?>"><?= htmlspecialchars($currentRole) ?></span>
        </div>
        <div class="nav-buttons">
            <button class="btn-theme" id="themeToggleBtn" onclick="toggleTheme()">🌙 Dark Mode</button>
            <a href="logout.php?redirect=booth" class="btn-nav">📸 Photobooth</a>
            <a href="logout.php" class="btn-logout">🔒 Logout</a>
        </div>
    </div>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
        <div class="alert">Data dan foto berhasil dihapus!</div>
    <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'bulk_deleted'): ?>
        <div class="alert">Beberapa data dan foto terpilih berhasil dihapus!</div>
    <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'truncated'): ?>
        <div class="alert">Seluruh data presensi dan foto berhasil dibersihkan!</div>
    <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'user_added'): ?>
        <div class="alert">User panitia baru berhasil ditambahkan!</div>
    <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'user_deleted'): ?>
        <div class="alert">User panitia berhasil dihapus!</div>
    <?php endif; ?>

    <div class="header">
        <div>
            <h2>Rekap Presensi & Photobooth PKKMB</h2>
            <p style="margin: 3px 0 0; color: var(--text-sub); font-size: 12px;">Data kehadiran Maba real-time</p>
        </div>
        <div class="actions-group">
            <div class="stats-card">
                <span style="font-size: 16px;"><?= $totalMaba ?></span>
                <span style="display: block; font-size: 10px; opacity: 0.9;">Total Foto</span>
            </div>
            
            <?php if ($currentRole === 'admin'): ?>
                <button type="button" id="btnBulkDelete" onclick="submitBulkDelete()" class="btn-bulk-delete">🗑️ Hapus Terpilih (<span id="selectedCount">0</span>)</button>
            <?php endif; ?>

            <button onclick="exportTableToCSV('rekap_presensi_pkkmb.csv')" class="btn-export">📥 Export Excel</button>
            
            <?php if ($currentRole === 'admin' && $totalMaba > 0): ?>
                <a href="dashboard?action=truncate" onclick="return confirm('Apakah Anda yakin ingin MENGHAPUS SEMUA DATA & FOTO?')" class="btn-truncate">🗑️ Hapus Semua</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="grid-dashboard">
        <div class="card-box">
            <h4>👥 Kelola Akun Panitia / Operator</h4>
            <?php if ($currentRole === 'admin'): ?>
                <form method="POST" class="form-user-inline">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
                    <select name="role">
                        <option value="operator">Operator</option>
                        <option value="admin">Admin</option>
                    </select>
                    <button type="submit" name="add_user" class="btn-add-user">+ Tambah</button>
                </form>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Terakhir Login</th>
                            <?php if ($currentRole === 'admin'): ?><th>Aksi</th><?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resUsers && $resUsers->num_rows > 0): ?>
                            <?php while ($u = $resUsers->fetch_assoc()): ?>
                                <tr>
                                    <td><b><?= htmlspecialchars($u['username']) ?></b></td>
                                    <td><?= htmlspecialchars($u['nama_lengkap']) ?></td>
                                    <td><?= htmlspecialchars($u['role']) ?></td>
                                    <td style="color: var(--text-sub); font-size:11px;"><?= $u['last_login'] ? $u['last_login'] : '-' ?></td>
                                    <?php if ($currentRole === 'admin'): ?>
                                        <td>
                                            <?php if ($u['username'] !== 'admin'): ?>
                                                <a href="dashboard?action=delete_user&uid=<?= $u['id'] ?>" onclick="return confirm('Hapus user ini?')" style="color:red; font-weight:bold; text-decoration:none;">Hapus</a>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-box">
            <h4>📜 Activity Log Terakhir</h4>
            <?php if ($resLogs && $resLogs->num_rows > 0): ?>
                <?php while ($l = $resLogs->fetch_assoc()): ?>
                    <div class="log-item">
                        <span><b><?= htmlspecialchars($l['username']) ?></b>: <?= htmlspecialchars($l['action']) ?></span>
                        <span style="color: var(--text-sub); font-size:11px;"><?= htmlspecialchars($l['created_at']) ?></span>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- FORM BULK DELETE TABEL MABA -->
    <form id="formBulkDelete" method="POST">
        <input type="hidden" name="bulk_delete" value="1">
        <div class="table-responsive">
            <table class="main-table">
                <thead>
                    <tr>
                        <?php if ($currentRole === 'admin'): ?>
                            <th style="width: 30px;"><input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)"></th>
                        <?php endif; ?>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Lengkap</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Fakultas</th>
                        <th>Program Studi</th>
                        <th>Waktu Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <?php if ($currentRole === 'admin'): ?>
                                    <td><input type="checkbox" name="selected_ids[]" value="<?= $row['id'] ?>" class="item-checkbox" onclick="updateBulkState()"></td>
                                <?php endif; ?>
                                <td><?= $no++ ?></td>
                                <td>
                                    <img src="uploads/hasil/<?= htmlspecialchars($row['file_name']) ?>" class="thumb" alt="Foto">
                                </td>
                                <td><strong><?= htmlspecialchars($row['nama'] ?? '-') ?></strong></td>
                                <td><?= htmlspecialchars($row['nim'] ?? '-') ?></td>
                                <td><a href="mailto:<?= htmlspecialchars($row['email'] ?? '') ?>" style="color:#2563eb; text-decoration:none;"><?= htmlspecialchars($row['email'] ? $row['email'] : '-') ?></a></td>
                                <td><?= htmlspecialchars($row['fakultas'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['prodi'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($row['created_at'] ?? '-') ?></td>
                                <td>
                                    <a href="uploads/hasil/<?= htmlspecialchars($row['file_name']) ?>" target="_blank" style="color:#2563eb; font-weight:bold; text-decoration:none; margin-right:5px;">Lihat</a>
                                    <?php if ($currentRole === 'admin'): ?>
                                        <a href="dashboard?action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Hapus data dan foto ini?')" style="color:#ef4444; font-weight:bold; text-decoration:none;">Hapus</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?= $currentRole === 'admin' ? '10' : '9' ?>" style="text-align: center; color: var(--text-sub); padding: 20px;">Belum ada data presensi/foto Maba.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<script>
function toggleSelectAll(source) {
    let checkboxes = document.querySelectorAll('.item-checkbox');
    checkboxes.forEach(cb => cb.checked = source.checked);
    updateBulkState();
}

function updateBulkState() {
    let selected = document.querySelectorAll('.item-checkbox:checked').length;
    let btnBulk = document.getElementById('btnBulkDelete');
    let countSpan = document.getElementById('selectedCount');

    if (btnBulk && countSpan) {
        if (selected > 0) {
            btnBulk.style.display = 'inline-block';
            countSpan.innerText = selected;
        } else {
            btnBulk.style.display = 'none';
        }
    }
}

function submitBulkDelete() {
    let selected = document.querySelectorAll('.item-checkbox:checked').length;
    if (selected > 0) {
        if (confirm(`Apakah Anda yakin ingin MENGHAPUS ${selected} data terpilih beserta fotonya?`)) {
            document.getElementById('formBulkDelete').submit();
        }
    }
}

// LOGIKA TEMA TERANG / GELAP (SELARAS MENGGUNAKAN KEY 'theme')
function applyTheme(themeName) {
    const body = document.body;
    const btn = document.getElementById('themeToggleBtn');
    if (themeName === 'dark') {
        body.classList.add('dark-theme');
        if (btn) btn.innerText = '☀️ Light Mode';
    } else {
        body.classList.remove('dark-theme');
        if (btn) btn.innerText = '🌙 Dark Mode';
    }
}

function toggleTheme() {
    const currentTheme = document.body.classList.contains('dark-theme') ? 'light' : 'dark';
    localStorage.setItem('theme', currentTheme);
    applyTheme(currentTheme);
}

(function initTheme() {
    const savedTheme = localStorage.getItem('theme') || 'light';
    applyTheme(savedTheme);
})();

function exportTableToCSV(filename) {
    let csv = [];
    let rows = document.querySelectorAll("table.main-table tr");
    
    for (let i = 0; i < rows.length; i++) {
        let row = [], cols = rows[i].querySelectorAll("td, th");
        for (let j = 0; j < cols.length; j++) {
            let isCheckbox = cols[j].querySelector('input[type="checkbox"]');
            let isPhoto = cols[j].querySelector('img');
            let isAction = cols[j].innerText.includes('Lihat');

            if (!isCheckbox && !isPhoto && !isAction) {
                let text = cols[j].innerText.replace(/"/g, '""');
                row.push('"' + text + '"');
            }
        }
        if (row.length > 0) csv.push(row.join(","));
    }

    let csvFile = new Blob([csv.join("\n")], { type: "text/csv" });
    let downloadLink = document.createElement("a");
    downloadLink.download = filename;
    downloadLink.href = window.URL.URL ? window.URL.createObjectURL(csvFile) : window.webkitURL.createObjectURL(csvFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}
</script>

</body>
</html>