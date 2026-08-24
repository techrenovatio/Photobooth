<?php
require_once "config.php";

if (php_sapi_name() !== 'cli') {
    die("Akses hanya diizinkan melalui terminal server.");
}

if ($argc < 4) {
    echo "Cara Penggunaan: php add_user.php [username] [password] [nama_lengkap] [role: admin/operator]\n";
    echo "Contoh: php add_user.php panitia1 pass123 'Budi Santoso' operator\n";
    exit;
}

$username = $argv[1];
$password = password_hash($argv[2], PASSWORD_BCRYPT);
$nama     = $argv[3];
$role     = isset($argv[4]) && in_array($argv[4], ['admin', 'operator']) ? $argv[4] : 'operator';

$stmt = $conn->prepare("INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $password, $nama, $role);

if ($stmt->execute()) {
    echo "SUCCESS: User '$username' ($nama) dengan role '$role' berhasil ditambahkan!\n";
} else {
    echo "ERROR: " . $conn->error . "\n";
}
?>