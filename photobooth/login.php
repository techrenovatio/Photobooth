<?php
date_default_timezone_set('Asia/Jakarta');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "config.php";

// Jika sudah login, lempar langsung ke dashboard
if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] === true) {
    header("Location: dashboard");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_logged'] = true;
                $_SESSION['user_id']     = $user['id'];
                $_SESSION['username']    = $user['username'];
                $_SESSION['nama']        = $user['nama_lengkap'];
                $_SESSION['role']        = $user['role'];

                // Update last_login
                $now = date("Y-m-d H:i:s");
                $conn->query("UPDATE users SET last_login = '$now' WHERE id = {$user['id']}");

                // Activity Log
                $ip = $_SERVER['REMOTE_ADDR'];
                $conn->query("INSERT INTO activity_logs (username, action, ip_address, created_at) VALUES ('{$user['username']}', 'Login ke sistem', '$ip', '$now')");

                header("Location: dashboard");
                exit();
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Username tidak ditemukan!";
        }
    } else {
        $error = "Isi username dan password!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Operator - Photobooth</title>
    <style>
        :root {
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #0f172a;
            --text-sub: #475569;
            --border-color: #cbd5e1;
            --input-bg: #ffffff;
            --btn-glass-bg: #ffffff;
            --btn-glass-text: #0f172a;
            --btn-glass-border: #cbd5e1;
            --btn-glass-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        body.dark-theme {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --text-main: #f8fafc;
            --text-sub: #94a3b8;
            --border-color: #334155;
            --input-bg: #0f172a;
            --btn-glass-bg: #1e293b;
            --btn-glass-text: #ffffff;
            --btn-glass-border: #334155;
            --btn-glass-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        * { box-sizing: border-box; transition: background 0.3s ease, color 0.3s ease; }
        
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: var(--bg-body); 
            margin: 0; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh; 
            color: var(--text-main);
            position: relative;
        }

        /* TOMBOL TOGGLE THEME POJOK KIRI ATAS */
        .btn-theme-toggle {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--btn-glass-bg);
            color: var(--btn-glass-text);
            border: 1px solid var(--btn-glass-border);
            box-shadow: var(--btn-glass-shadow);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            z-index: 100;
        }

        .login-card { 
            background: var(--bg-card); 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.15); 
            width: 100%; 
            max-width: 360px; 
            border: 1px solid var(--border-color);
            text-align: center;
        }

        .login-card h2 { margin-top: 0; color: var(--text-main); font-size: 22px; }
        .login-card p { font-size: 12px; color: var(--text-sub); margin-bottom: 20px; }

        .form-group { text-align: left; margin-bottom: 15px; }
        .form-group label { display: block; font-size: 12px; font-weight: bold; margin-bottom: 5px; color: var(--text-sub); }
        .form-group input { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid var(--border-color); 
            border-radius: 6px; 
            font-size: 13px; 
            background: var(--input-bg); 
            color: var(--text-main); 
            outline: none;
        }

        .btn-login { 
            width: 100%; 
            padding: 12px; 
            background: #2563eb; 
            color: #fff; 
            border: none; 
            border-radius: 6px; 
            font-weight: bold; 
            font-size: 14px; 
            cursor: pointer; 
            margin-top: 10px;
        }

        .btn-login:hover { background: #1d4ed8; }
        .btn-back { display: inline-block; margin-top: 15px; font-size: 12px; color: #2563eb; text-decoration: none; font-weight: bold; }
        .error-msg { background: #fee2e2; color: #dc2626; padding: 10px; border-radius: 6px; font-size: 12px; margin-bottom: 15px; text-align: left; }
    </style>
</head>
<body>

<button class="btn-theme-toggle" id="themeBtn" onclick="toggleMainTheme()">🌙 Dark Mode</button>

<div class="login-card">
    <h2>🔐 Login Operator</h2>
    <p>Presensi & Photobooth PKKMB</p>

    <?php if (!empty($error)): ?>
        <div class="error-msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required autofocus>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>
        <button type="submit" class="btn-login">MASUK DASHBOARD</button>
    </form>

    <a href="index" class="btn-back">← Kembali ke Photobooth</a>
</div>

<script>
    function applyTheme(themeName) {
        const body = document.body;
        const btn = document.getElementById('themeBtn');
        if (themeName === 'dark') {
            body.classList.add('dark-theme');
            if (btn) btn.innerHTML = '☀️ Light Mode';
        } else {
            body.classList.remove('dark-theme');
            if (btn) btn.innerHTML = '🌙 Dark Mode';
        }
    }

    function toggleMainTheme() {
        const currentTheme = document.body.classList.contains('dark-theme') ? 'light' : 'dark';
        localStorage.setItem('theme', currentTheme);
        applyTheme(currentTheme);
    }

    (function initTheme() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        applyTheme(savedTheme);
    })();
</script>

</body>
</html>