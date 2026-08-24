<?php
require_once "config.php";

// Set zona waktu WIB
date_default_timezone_set('Asia/Jakarta');

// Buat Tabel Users jika belum ada
$conn->query("
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    role ENUM('admin', 'operator') DEFAULT 'operator',
    last_login DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
");

// Buat Tabel Activity Logs jika belum ada
$conn->query("
CREATE TABLE IF NOT EXISTS activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    action VARCHAR(255) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    created_at DATETIME NOT NULL
);
");

// Generate Password Hash yang Valid
$passAdmin    = password_hash("admin123", PASSWORD_BCRYPT);
$passOperator = password_hash("op123", PASSWORD_BCRYPT);

// Bersihkan data lama jika ada
$conn->query("TRUNCATE TABLE users");

// Insert Akun Admin & Operator
$stmt = $conn->prepare("INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, ?)");

// 1. Akun Admin
$userAdmin = "admin";
$namaAdmin = "Super Admin Panitia";
$roleAdmin = "admin";
$stmt->bind_param("ssss", $userAdmin, $passAdmin, $namaAdmin, $roleAdmin);
$stmt->execute();

// 2. Akun Operator
$userOp = "operator";
$namaOp = "Operator Stand";
$roleOp = "operator";
$stmt->bind_param("ssss", $userOp, $passOperator, $namaOp, $roleOp);
$stmt->execute();

echo "SUCCESS: Akun Admin dan Operator berhasil dibuat ulang dengan password hash yang valid!\n";
?>