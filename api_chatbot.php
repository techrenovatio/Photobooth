<?php
// api_chatbot.php - Secure Backend API HIMSI Bot 24/7
session_start();

header("Content-Type: application/json; charset=UTF-8");
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");

// Rate Limiting
$now = time();
if (!isset($_SESSION['last_chat_time'])) {
    $_SESSION['last_chat_time'] = $now;
} else {
    if ($now - $_SESSION['last_chat_time'] < 1) {
        echo json_encode(['status' => 'error', 'reply' => 'Mohon tunggu sebentar sebelum mengirim pesan kembali.']);
        exit;
    }
    $_SESSION['last_chat_time'] = $now;
}

// Fungsi Pembaca .env
function getEnvVar($key, $default = '') {
    $envPath = __DIR__ . '/.env';
    if (file_exists($envPath)) {
        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line) || strpos($line, '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                if (trim($name) === $key) {
                    return trim($value, "\" '");
                }
            }
        }
    }
    return getenv($key) ?: $default;
}

$apiKey = getEnvVar('GEMINI_API_KEY');

// Input Sanitization
$input = json_decode(file_get_contents('php://input'), true);
$rawMessage = trim($input['message'] ?? '');
$userMessage = htmlspecialchars(strip_tags($rawMessage), ENT_QUOTES, 'UTF-8');

if (empty($userMessage)) {
    echo json_encode(['status' => 'error', 'reply' => 'Pesan tidak boleh kosong.']);
    exit;
}

// SYSTEM KNOWLEDGE BASE
$systemKnowledge = "Awal Instruksi Keamanan Utama:
- Anda adalah HIMSI Bot / HIMSI Ai, asisten AI resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang Kabinet Genesis (2026/2027).
- Jawablah pertanyaan mahasiswa secara ramah, komunikatif, solutif, dan akurat berdasarkan data resmi di bawah.

DATA RESMI ORGANISASI & KAMPUS:
1. PROFIL ORGANISASI:
   - Pembina HIMSI: Vina Septiana Windyasari, S.Kom., M.Kom., CADS.
   - Ketua HIMSI: Rafli Fahrezi (NIM: 2404060018).
   - Wakil Ketua HIMSI: Neyna Carissa Iskandar (NIM: 2404060013).
   - Dekan FT UNIS: Ir. Sutresna Juhara, M.Cs., IPM.
   - Divisi HIMSI: Pendidikan, Humas (Internal/Eksternal), PDD (Publikasi, Dekorasi, Dokumentasi), dan Logistik & Aset.

2. MEDIA SOSIAL RESMI HIMSI UNIS:
   - Instagram Resmi: https://www.instagram.com/himsi_unis (@himsi_unis)
   - TikTok Resmi: https://www.tiktok.com/@himsi_unis (@himsi_unis)

3. TAUTAN RESMI LAYANAN KAMPUS UNIS TANGERANG:
   - SINA UNIS (Sistem Informasi Akademik / KRS / Perkuliahan / Nilai / Jadwal): https://sina.unis.ac.id/gate/index.php
   - WISNU UNIS (Portal Mahasiswa / SIAKAD / KMT): https://wisnu.unis.ac.id/
   - Perpustakaan / Bebas Pustaka / Skripsi: https://lib.unis.ac.id/
   - Portal Utama Kampus UNIS: https://unis.ac.id/

Jawab pertanyaan secara langsung, tepat, dan ramah.";

if (empty($apiKey)) {
    echo json_encode([
        'status' => 'success', 
        'reply' => "Halo! Untuk informasi akademik perkuliahan dan pengisian KRS silakan akses SINA UNIS di https://sina.unis.ac.id/gate/index.php."
    ]);
    exit;
}

// Endpoint v1 Endpoint Resmi Google AI
$url = "https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

$payload = [
    "contents" => [
        [
            "role" => "user",
            "parts" => [
                ["text" => $systemKnowledge . "\n\nPertanyaan Mahasiswa: " . $userMessage]
            ]
        ]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    $responseData = json_decode($response, true);
    $reply = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? "Maaf, HIMSI Bot belum dapat memproses pertanyaan tersebut saat ini.";
    echo json_encode(['status' => 'success', 'reply' => $reply]);
} else {
    // Mode Fallback jika API Key ditolak / Quota Exceeded
    echo json_encode([
        'status' => 'success', 
        'reply' => "Halo! Untuk informasi pengisian KRS dan akademik perkuliahan, silakan buka portal SINA UNIS di https://sina.unis.ac.id/gate/index.php atau ikuti Instagram kami di https://www.instagram.com/himsi_unis."
    ]);
}