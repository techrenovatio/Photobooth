<?php
// Set zona waktu PHP ke WIB
date_default_timezone_set('Asia/Jakarta');

// PAKSA DETEKSI HTTPS DARI CLOUDFLARE TUNNEL (MENIHILKAN PORT 8080 SAAT REDIRECT)
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;
}

// DETEKSI OTOMATIS APAKAH DIJALANKAN DI LOCALHOST ATAU SERVER PUBLIC
$is_localhost = false;
if (isset($_SERVER['HTTP_HOST'])) {
    $host_name = parse_url($_SERVER['HTTP_HOST'], PHP_URL_HOST) ?: $_SERVER['HTTP_HOST'];
    if ($host_name === 'localhost' || $host_name === '127.0.0.1') {
        $is_localhost = true;
    }
}

// KONFIGURASI KEAMANAN SESSION COOKIE
ini_set('session.cookie_httponly', 1);
// cookie_secure bernilai 0 di Localhost (HTTP) dan 1 di GCP (HTTPS)
ini_set('session.cookie_secure', $is_localhost ? 0 : 1);
ini_set('session.cookie_samesite', 'Lax');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// KONFIGURASI KONEKSI DATABASE
$host = "localhost";
$user = "root";
$pass = ""; // sesuaikan jika ada password database
$db   = "photobooth";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi Database Gagal: " . $conn->connect_error);
}

// Force timezone koneksi MySQL ke WIB (+07:00)
$conn->query("SET time_zone = '+07:00'");
?>