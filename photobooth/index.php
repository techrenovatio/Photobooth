<?php
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photobooth</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* VARIABLE THEME SYSTEM */
        :root {
            --bg-app: #f8fafc;
            --text-main: #0f172a;
            --text-sub: #475569;
            --modal-bg: #ffffff;
            --input-bg: #ffffff;
            --input-border: #cbd5e1;
            --btn-glass-bg: #ffffff;
            --btn-glass-text: #0f172a;
            --btn-glass-border: #cbd5e1;
            --btn-glass-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            
            /* Toast Colors Light */
            --toast-bg: rgba(255, 255, 255, 0.95);
            --toast-text: #0f172a;
            --toast-border: rgba(15, 23, 42, 0.15);
        }

        body.dark-theme {
            --bg-app: #0f172a;
            --text-main: #f8fafc;
            --text-sub: #94a3b8;
            --modal-bg: #1e293b;
            --input-bg: #0f172a;
            --input-border: #334155;
            --btn-glass-bg: #1e293b;
            --btn-glass-text: #ffffff;
            --btn-glass-border: #334155;
            --btn-glass-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);

            /* Toast Colors Dark */
            --toast-bg: rgba(15, 23, 42, 0.95);
            --toast-text: #ffffff;
            --toast-border: rgba(255, 255, 255, 0.15);
        }

        /* STYLING NOTIFIKASI MENGAMBANG (FLOATING TOAST) */
        .toast-floating {
            position: fixed;
            top: 24px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999999;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            background: var(--toast-bg);
            color: var(--toast-text);
            border: 1px solid var(--toast-border);
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            font-size: 14px;
            font-weight: 700;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            pointer-events: none;
        }

        .toast-floating.hidden {
            opacity: 0;
            visibility: hidden;
            transform: translate(-50%, -20px);
        }

        /* OVERRIDE SELURUH CONTAINER LAYAR AGAR BISA DARK MODE */
        body, 
        main.app, 
        .screen, 
        .welcome-screen, 
        .welcome-content {
            background-color: var(--bg-app) !important;
            color: var(--text-main) !important;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* PERBAIKAN TEKS UTAMA & SUBSIDIARI */
        .welcome-content h1 {
            color: var(--text-main) !important;
            font-weight: 900 !important;
            letter-spacing: 2px !important;
            opacity: 1 !important;
        }

        .welcome-content h2 {
            color: var(--text-main) !important;
            font-weight: 700 !important;
            opacity: 0.9 !important;
        }

        .welcome-description, 
        .welcome-small, 
        .tap-info {
            color: var(--text-sub) !important;
            font-weight: 600 !important;
            opacity: 1 !important;
        }

        /* MODAL PRESENSI */
        .modal-presensi {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.75);
            z-index: 99999;
            align-items: center;
            justify-content: center;
        }

        .modal-content-presensi {
            background: var(--modal-bg) !important;
            color: var(--text-main) !important;
            padding: 25px;
            border-radius: 12px;
            width: 90%;
            max-width: 380px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            text-align: left;
            border: 1px solid var(--input-border);
        }

        .modal-content-presensi h3 {
            margin-top: 0;
            color: var(--text-main) !important;
            font-size: 18px;
            text-align: center;
        }

        .modal-content-presensi p {
            font-size: 13px;
            color: var(--text-sub) !important;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group-presensi {
            margin-bottom: 12px;
        }

        .form-group-presensi label {
            display: block;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 4px;
            color: var(--text-sub) !important;
        }

        .form-group-presensi input, 
        .form-group-presensi select {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--input-border) !important;
            border-radius: 6px;
            font-size: 13px;
            box-sizing: border-box;
            outline: none;
            background: var(--input-bg) !important;
            color: var(--text-main) !important;
        }

        .btn-submit-presensi {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }

        .btn-submit-presensi:hover {
            background: #1d4ed8;
        }

        /* TOMBOL TOGGLE THEME POJOK KIRI ATAS */
        .btn-theme-toggle {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--btn-glass-bg) !important;
            color: var(--btn-glass-text) !important;
            border: 1px solid var(--btn-glass-border) !important;
            box-shadow: var(--btn-glass-shadow) !important;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            z-index: 100;
        }

        /* TOMBOL LOGIN POJOK KANAN ATAS */
        .btn-admin-access {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--btn-glass-bg) !important;
            color: var(--btn-glass-text) !important;
            border: 1px solid var(--btn-glass-border) !important;
            box-shadow: var(--btn-glass-shadow) !important;
            padding: 8px 18px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
            z-index: 100;
        }

        .btn-theme-toggle:hover, 
        .btn-admin-access:hover {
            background: #2563eb !important;
            color: #ffffff !important;
            border-color: #2563eb !important;
        }

        /* INBOX / SPAM EMAIL NOTICE STYLING (FIXED DISPLAY) */
        .email-notice-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
            padding: 8px 18px;
            background: rgba(37, 99, 235, 0.1);
            color: #2563eb;
            border: 1px dashed #2563eb;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
        }

        body.dark-theme .email-notice-box {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border-color: #60a5fa;
        }

        /* FOOTER CREDITS */
        .welcome-footer {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 11px;
            color: var(--text-sub) !important;
            text-align: center;
            font-weight: 600;
            letter-spacing: 0.3px;
            z-index: 10;
            white-space: nowrap;
            background: var(--btn-glass-bg) !important;
            padding: 8px 18px;
            border-radius: 20px;
            border: 1px solid var(--btn-glass-border) !important;
            box-shadow: var(--btn-glass-shadow) !important;
        }

        @media (max-width: 480px) {
            .welcome-footer {
                white-space: normal;
                width: 85%;
                font-size: 10px;
                bottom: 12px;
            }
        }
    </style>
</head>

<body>

<!-- =================================
     ELEMEN NOTIFIKASI MENGAMBANG (TOAST)
================================= -->
<div id="toastNotification" class="toast-floating">
    <span id="toastIcon">👋</span>
    <span id="toastMessage">Selamat datang! Klik tombol 'TAP TO START' untuk memulai.</span>
</div>

<main class="app">

    <!-- =================================
         MODAL PRESENSI MABA
    ================================= -->
    <div id="modalPresensi" class="modal-presensi">
        <div class="modal-content-presensi">
            <h3>Himpunan Mahasiswa Sistem Informasi</h3>
            <p>Isi identitas secara lengkap sebelum mengambil foto</p>

            <div class="form-group-presensi">
                <label for="mabaNama">1. NAMA LENGKAP <span style="color:#ef4444;">*</span></label>
                <input type="text" id="mabaNama" placeholder="Contoh: Ahmad Fadillah" required>
            </div>

            <div class="form-group-presensi">
                <label for="mabaNim">2. NOMOR INDUK MAHASISWA (NIM) <span style="color:#ef4444;">*</span></label>
                <input type="text" id="mabaNim" placeholder="Contoh: 230101001" required>
            </div>

            <div class="form-group-presensi">
                <label for="mabaFakultas">3. FAKULTAS <span style="color:#ef4444;">*</span></label>
                <select id="mabaFakultas" onchange="updateProdiOptions()" required>
                    <option value="">Pilih Fakultas</option>
                    <option value="F. Teknik">F. Teknik</option>
                    <option value="F. FKIP">F. FKIP</option>
                    <option value="FEB">FEB</option>
                    <option value="FISIP">FISIP</option>
                    <option value="F. Hukum">F. Hukum</option>
                    <option value="FAI">FAI</option>
                </select>
            </div>

            <div class="form-group-presensi">
                <label for="mabaProdi">4. PROGRAM STUDI <span style="color:#ef4444;">*</span></label>
                <select id="mabaProdi" disabled required>
                    <option value="">Pilih Fakultas Terlebih Dahulu</option>
                </select>
            </div>

            <div class="form-group-presensi">
                <label for="mabaAngkatan">5. SEMESTER / TAHUN <span style="color:#ef4444;">*</span></label>
                <input type="text" id="mabaAngkatan" value="Semester 1 / 2026" required>
            </div>

            <div class="form-group-presensi">
                <label for="mabaEmail">6. EMAIL (Wajib - Kirim Softfile Foto) <span style="color:#ef4444;">*</span></label>
                <input type="email" id="mabaEmail" placeholder="Contoh: maba@gmail.com" required>
            </div>

            <button type="button" class="btn-submit-presensi" onclick="simpanPresensiDanLanjut()">
                LANJUT PILIH FRAME
            </button>
        </div>
    </div>


    <!-- =================================
         SCREEN 1 : WELCOME
    ================================= -->
    <section id="welcomeScreen" class="screen welcome-screen active">
        <button class="btn-theme-toggle" id="themeBtn" onclick="toggleMainTheme()">🌙 Dark Mode</button>
        <a href="dashboard" class="btn-admin-access">🔐 Login</a>

        <div class="welcome-content">
            <div class="welcome-logo">📸</div>
            <p class="welcome-small">WELCOME TO</p>
            <h1>PHOTOBOOTH</h1>
            <h2>Capture Your Moment</h2>
            <p class="welcome-description">Take a photo, make a memory.</p>
            <button id="startWelcomeBtn" class="start-anywhere" onclick="bukaModalPresensi()">
                TAP TO START
            </button>
            <p class="tap-info">Klik untuk memulai</p>
        </div>

        <div class="welcome-footer">
            Created by Himpunan Mahasiswa Sistem Informasi - Kabinet Genesis - Universitas Islam Syekh Yusuf
        </div>
    </section>

    <!-- =================================
         SCREEN 2 : PILIH FRAME
    ================================= -->
    <section id="frameScreen" class="screen frame-screen">
        <div class="screen-header">
            <h1>Choose Your Frame</h1>
            <span>Pilih frame favoritmu untuk hasil foto yang lebih memorable.</span>
        </div>
        <div id="frameList" class="frame-list"></div>
        <div class="frame-action">
            <button id="continueFrameBtn" class="primary-button" disabled>PILIH FRAME</button>
        </div>
    </section>

    <!-- =================================
         SCREEN 3 : READY
    ================================= -->
    <section id="readyScreen" class="screen ready-screen">
        <button id="backToFrameBtn" class="back-button">Kembali</button>
        <div class="ready-content">
            <h1>Siap Berfoto?</h1>
            <p id="photoCountInfo">Kamu akan mengambil beberapa foto.</p>
            <p>Siapkan pose terbaikmu dan nikmati momennya.</p>
            <div id="selectedFramePreview" class="selected-frame-preview"></div>
            <button id="readyButton" class="primary-button">&nbsp; MULAI FOTO</button>
        </div>
    </section>

    <!-- =================================
         SCREEN 4 : CAMERA
    ================================= -->
    <section id="cameraScreen" class="screen camera-screen">
        <div class="camera-header">
            <div>
                <h1>PHOTOBOOTH</h1>
                <p>Capture your moment</p>
            </div>
        </div>
        <div class="camera-layout">
            <div class="camera-main">
                <div class="camera-wrapper">
                    <video id="video" autoplay playsinline></video>
                    <div class="camera-overlay">
                        <div class="corner top-left"></div>
                        <div class="corner top-right"></div>
                        <div class="corner bottom-left"></div>
                        <div class="corner bottom-right"></div>
                    </div>
                    <div id="countdown" class="countdown"></div>
                    <div id="photoCounter" class="photo-counter"></div>
                    <div id="flash" class="flash"></div>
                    <div id="capturedPreview" class="captured-preview">
                        <img id="capturedImage" src="" alt="Hasil Foto">
                        <div class="retake-hint">↻ Klik foto untuk retake</div>
                    </div>
                </div>
                <div id="cameraStatus" class="camera-status">
                    <span class="status-dot"></span>
                    <span>Menghubungkan kamera...</span>
                </div>
                <button id="takePhotoBtn" class="btn-start-photo"><span>AMBIL FOTO</span></button>
                <button id="continuePhotoBtn" class="btn-continue-photo">&nbsp; LANJUTKAN</button>
            </div>
            <div class="frame-preview-area">
                <p>PREVIEW HASIL</p>
                <div id="liveFrame" class="live-frame"></div>
            </div>
        </div>
    </section>

    <!-- =================================
         SCREEN 5 : RESULT
    ================================= -->
    <section id="resultScreen" class="screen result-screen">
        <div class="result-content">
            <p class="step-label">SELESAI</p>
            <h1>Your Photo</h1>
            <p>Ini hasil photobooth kamu!</p>
            <div class="email-notice-box">
                📩 Softfile foto otomatis dikirim. Silakan periksa <b>Inbox / Spam</b> email kamu.
            </div>
            <div id="finalPhoto" class="final-photo"></div>
            <div class="result-buttons">
                <button id="qrButton" class="primary-button">&nbsp; TAMPILKAN QR</button>
                <button id="restartButton" class="secondary-button">&nbsp; ULANGI</button>
                <button id="downloadButton" class="btn-download">&nbsp; DOWNLOAD FOTO</button>
            </div>
        </div>
    </section>

    <!-- =================================
         SCREEN 6 : QR
    ================================= -->
    <section id="qrScreen" class="screen qr-screen">
        <div class="qr-content">
            <p class="step-label">DOWNLOAD</p>
            <h1>Scan QR Code</h1>
            <p>Scan menggunakan kamera HP kamu untuk mengunduh foto.</p>
            <div id="qrCode" class="qr-code"></div>
            <p class="qr-info">Scan untuk download softfile</p>
            <button id="qrBackButton" class="secondary-button">&nbsp; KEMBALI</button>
        </div>
    </section>

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
    // PERBAIKAN TOAST AGAR SELALU TAMPIL TANPA DURATION
    function showToast(message, icon = '📸') {
        const toast = document.getElementById('toastNotification');
        const toastMsg = document.getElementById('toastMessage');
        const toastIcn = document.getElementById('toastIcon');

        if (!toast || !toastMsg || !toastIcn) return;

        toastMsg.textContent = message;
        toastIcn.textContent = icon;
        toast.classList.remove('hidden');
    }

    // LOGIKA TOGGLE THEME SYSTEM
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

    const prodiData = {
        "F. Teknik": [
            "Sistem Informasi",
            "Teknik Informatika",
            "Teknik Sipil",
            "Teknik Kimia",
            "Teknik Industri",
            "Teknik Lingkungan"
        ],
        "F. FKIP": [
            "Pendidikan Ekonomi",
            "Pendidikan Bhs. Inggris"
        ],
        "FEB": [
            "Manajemen",
            "Akuntansi",
            "Bisnis Digital"
        ],
        "FISIP": [
            "Ilmu Adm. Negara",
            "Ilmu Komunikasi"
        ],
        "F. Hukum": [
            "Ilmu Hukum"
        ],
        "FAI": [
            "Pendidikan Agama Islam"
        ]
    };

    function updateProdiOptions() {
        const fakultasSelect = document.getElementById('mabaFakultas');
        const prodiSelect = document.getElementById('mabaProdi');
        const selectedFakultas = fakultasSelect.value;

        prodiSelect.innerHTML = '';

        if (selectedFakultas && prodiData[selectedFakultas]) {
            prodiSelect.disabled = false;
            prodiData[selectedFakultas].forEach(prodi => {
                const option = document.createElement('option');
                option.value = prodi;
                option.textContent = prodi;
                prodiSelect.appendChild(option);
            });
        } else {
            prodiSelect.disabled = true;
            const option = document.createElement('option');
            option.value = '';
            option.textContent = 'Pilih Fakultas Terlebih Dahulu';
            prodiSelect.appendChild(option);
        }
    }

    function bukaModalPresensi() {
        sessionStorage.clear();

        document.getElementById('mabaNama').value = '';
        document.getElementById('mabaNim').value = '';
        document.getElementById('mabaEmail').value = '';
        document.getElementById('mabaFakultas').value = '';
        
        const prodiSelect = document.getElementById('mabaProdi');
        prodiSelect.innerHTML = '<option value="">Pilih Fakultas Terlebih Dahulu</option>';
        prodiSelect.disabled = true;

        document.getElementById('mabaAngkatan').value = 'Semester 1 / 2026';

        document.getElementById('modalPresensi').style.display = 'flex';

        showToast("Silakan isi identitas lengkap Anda.", "📝");
    }

    function simpanPresensiDanLanjut() {
        const nama = document.getElementById('mabaNama').value.trim();
        const nim = document.getElementById('mabaNim').value.trim();
        const fakultas = document.getElementById('mabaFakultas').value;
        const prodi = document.getElementById('mabaProdi').value;
        const angkatan = document.getElementById('mabaAngkatan').value.trim();
        const email = document.getElementById('mabaEmail').value.trim();

        if (!nama || !nim || !fakultas || !prodi || !angkatan || !email) {
            showToast("Harap lengkapi seluruh kolom presensi termasuk Email!", "⚠️");
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showToast("Format Email tidak valid! Contoh: maba@gmail.com", "❌");
            return;
        }

        sessionStorage.setItem('maba_nama', nama);
        sessionStorage.setItem('maba_nim', nim);
        sessionStorage.setItem('maba_fakultas', fakultas);
        sessionStorage.setItem('maba_prodi', prodi);
        sessionStorage.setItem('maba_angkatan', angkatan);
        sessionStorage.setItem('maba_email', email);

        document.getElementById('modalPresensi').style.display = 'none';

        const welcomeScreen = document.getElementById('welcomeScreen');
        const frameScreen = document.getElementById('frameScreen');
        if(welcomeScreen && frameScreen) {
            welcomeScreen.classList.remove('active');
            frameScreen.classList.add('active');
        }

        showToast("Identitas disimpan! Silakan pilih frame.", "✅");
    }
</script>

<script src="assets/js/photobooth.js?v=<?= time() ?>"></script>

</body>
</html>