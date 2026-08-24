<?php
date_default_timezone_set('Asia/Jakarta');
require_once "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Autoloader dari Composer
require 'vendor/autoload.php';

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Method tidak diizinkan."]);
    exit;
}

$photoData = $_POST["photo"] ?? "";

// Tangkap Data Presensi & Email
$nama     = !empty($_POST["nama"])     ? $conn->real_escape_string($_POST["nama"])     : "Anonim";
$nim      = !empty($_POST["nim"])      ? $conn->real_escape_string($_POST["nim"])      : "-";
$fakultas = !empty($_POST["fakultas"]) ? $conn->real_escape_string($_POST["fakultas"]) : "-";
$prodi    = !empty($_POST["prodi"])    ? $conn->real_escape_string($_POST["prodi"])    : "-";
$angkatan = !empty($_POST["angkatan"]) ? $conn->real_escape_string($_POST["angkatan"]) : "-";
$email    = !empty($_POST["email"])    ? $conn->real_escape_string($_POST["email"])    : "";

if (empty($photoData)) {
    echo json_encode(["success" => false, "message" => "Data foto tidak ditemukan."]);
    exit;
}

// Decode Base64 Foto
$photoData = preg_replace('/^data:image\/jpeg;base64,/', '', $photoData);
$imageData = base64_decode($photoData, true);

$folder = __DIR__ . "/uploads/hasil/";
if (!is_dir($folder)) { 
    mkdir($folder, 0777, true); 
}

$fileName = "PKKMB-" . date("Ymd-His") . "-" . uniqid() . ".jpg";
$filePath = $folder . $fileName;

if (file_put_contents($filePath, $imageData) === false) {
    echo json_encode(["success" => false, "message" => "Gagal menyimpan foto ke server."]);
    exit;
}

// Ambil Waktu WIB Secara Eksplisit
$waktu_wib = date("Y-m-d H:i:s");

// Simpan ke Database
$sql = "INSERT INTO photos (nama, nim, fakultas, prodi, angkatan, email, file_name, created_at) 
        VALUES ('$nama', '$nim', '$fakultas', '$prodi', '$angkatan', '$email', '$fileName', '$waktu_wib')";

if (!$conn->query($sql)) {
    echo json_encode(["success" => false, "message" => "Gagal menyimpan data presensi: " . $conn->error]);
    exit;
}

// PROSES PENGIRIMAN EMAIL (JIKA EMAIL DIISI & VALID)
if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $mail = new PHPMailer(true);
    try {
        // Konfigurasi Server SMTP Gmail Panitia
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        
        // KREDENSIAL EMAIL HIMSI PKKMB
        $mail->Username   = 'himsippkmb@gmail.com';
        $mail->Password   = 'yextahvsxxqtdqcq'; // App Password tanpa spasi
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Pengirim & Penerima
        $mail->setFrom('himsippkmb@gmail.com', 'Panitia PKKMB HIMSI');
        $mail->addAddress($email, $nama);

        // Lampiran Softfile Foto
        $mail->addAttachment($filePath, $fileName);

        // Subjek & Isi Email
        $mail->isHTML(true);
        $mail->Subject = "Softfile Photobooth PKKMB - $nama";
        $mail->Body    = "
            <div style='font-family: Arial, sans-serif; color: #333;'>
                <h2>Halo $nama,</h2>
                <p>Selamat bergabung di Universitas Islam Syekh Yusuf! Berikut kami lampirkan kenang-kenangan foto Anda dari Photobooth Himpunan Mahasiswa Sistem Informasi - HIMSI Kabinet Genesis.</p>
                <p>Terima kasih atas partisipasinya.</p>
                <br>
                <p>Salam hangat,<br><b>Panitia PKKMB HIMSI</b></p>
            </div>
        ";

        $mail->send();
    } catch (Exception $e) {
        // Jika email gagal terkirim, proses pendaftaran foto tetap berjalan sukses
    }
}

// Deteksi Otomatis URL Publik Cloudflare
$protocol  = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "https://";
$host      = $_SERVER['HTTP_X_FORWARDED_HOST'] ?? $_SERVER['HTTP_HOST'];
$hostClean = explode(':', $host)[0];

$url = $protocol . $hostClean . "/photobooth/uploads/hasil/" . $fileName;

echo json_encode(["success" => true, "file" => $fileName, "url" => $url]);
?>