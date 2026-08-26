<?php
// api_chatbot.php - Backend API HIMSI Bot 24/7 (Membaca API Key dari .env)
header("Content-Type: application/json");
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");

// Fungsi sederhana untuk membaca file .env tanpa library eksternal
function getEnvVar($key, $default = '') {
    $envPath = __DIR__ . '/.env';
    if (file_exists($envPath)) {
        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            list($name, $value) = explode('=', $line, 2);
            if (trim($name) === $key) {
                return trim($value, "\" '");
            }
        }
    }
    return getenv($key) ?: $default;
}

// Ambil API Key dari .env
$apiKey = getEnvVar('GEMINI_API_KEY');

// Ambil input JSON dari frontend
$input = json_decode(file_get_contents('php://input'), true);
$userMessage = trim($input['message'] ?? '');

if (empty($userMessage)) {
    echo json_encode(['status' => 'error', 'message' => 'Pesan tidak boleh kosong.']);
    exit;
}

// Knowledge Base System Prompt (Data Resmi HIMSI UNIS Kabinet Genesis)
$systemKnowledge = "Anda adalah HIMSI Bot, asisten AI resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang Kabinet Genesis (2026/2027).
Jawablah pertanyaan mahasiswa secara ramah, komunikatif, dan akurat berdasarkan data resmi berikut:

1. PROFIL ORGANISASI:
   - Pembina HIMSI: Vina Septiana Windyasari, S.Kom., M.Kom., CADS.
   - Ketua HIMSI: Rafli Fahrezi (NIM: 2404060018).
   - Wakil Ketua HIMSI: Neyna Carissa Iskandar (NIM: 2404060013).
   - Dekan FT UNIS: Ir. Sutresna Juhara, M.Cs., IPM.
   - Divisi HIMSI: Pendidikan, Humas (Internal/Eksternal), PDD (Publikasi, Dekorasi, Dokumentasi), dan Logistik & Aset.

2. PROGRAM KERJA UTAMA 2026:
   - MILAD HIMSI: 10 Februari.
   - SI RAMAH (Sistem Informasi Ramadhan Berkah): 01 Maret 2026.
   - SIMAK Class (Mini Akademik Class), Seminar IT, PKKMB, dan Latihan Dasar SINERGI (Sistem Informasi Energik dan Inovatif).

3. TAUTAN RESMI LAYANAN KAMPUS UNIS TANGERANG:
   - SIAKAD / Nilai / KRS (WISNU UNIS): https://wisnu.unis.ac.id/
   - Perpustakaan / Bebas Pustaka / Skripsi: https://lib.unis.ac.id/
   - Pendaftaran KKK / KKN (SIKKK UNIS): https://sikkk.unis.ac.id/
   - Penerimaan Mahasiswa Baru / PMB: https://pmb.unis.ac.id/
   - Portal Utama Kampus UNIS: https://unis.ac.id/

Gunakan bahasa Indonesia yang sopan dan bersahabat. Jika ada pertanyaan teknis perkuliahan/akademik yang tidak ada dalam data, berikan petunjuk umum dan sarankan untuk menghubungi pengurus HIMSI atau sekretariat prodi.";

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

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

// Eksekusi API Call via cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    $responseData = json_decode($response, true);
    $reply = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? "Maaf, HIMSI Bot belum dapat memproses pertanyaan tersebut saat ini.";
    echo json_encode(['status' => 'success', 'reply' => $reply]);
} else {
    echo json_encode([
        'status' => 'success', 
        'reply' => "Halo! HIMSI Bot saat ini terhubung dalam mode offline. Untuk info KRS/Nilai silakan ke https://wisnu.unis.ac.id/ dan info Perpustakaan di https://lib.unis.ac.id/."
    ]);
}