<?php
// index.php - Portal Utama HIMSI UNIS Tangerang (Kabinet Genesis)
if ($_SERVER['HTTP_HOST'] !== 'himsi-unis.34.9.82.228.sslip.io' || empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    header("Location: https://himsi-unis.34.9.82.228.sslip.io" . $_SERVER['REQUEST_URI'], true, 301);
    exit;
}

header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMSI UNIS Tangerang | Kabinet Genesis</title>

    <!-- Meta Tags Utama untuk SEO -->
    <meta name="title" content="HIMSI UNIS Tangerang | Kabinet Genesis">
    <meta name="description" content="Portal Resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang - Kabinet Genesis. Pusat informasi akademik, kegiatan organisasi, dan layanan digital.">

    <!-- Open Graph / Facebook / WhatsApp / Telegram / LinkedIn -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://himsi-unis.34.9.82.228.sslip.io/">
    <meta property="og:title" content="HIMSI UNIS Tangerang | Kabinet Genesis">
    <meta property="og:description" content="Portal Resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang - Kabinet Genesis. Pusat informasi akademik, kegiatan organisasi, dan layanan digital.">
    <meta property="og:image" content="https://himsi-unis.34.9.82.228.sslip.io/Logohimsi.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter / X -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://himsi-unis.34.9.82.228.sslip.io/">
    <meta property="twitter:title" content="HIMSI UNIS Tangerang | Kabinet Genesis">
    <meta property="twitter:description" content="Portal Resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang - Kabinet Genesis. Pusat informasi akademik, kegiatan organisasi, dan layanan digital.">
    <meta property="twitter:image" content="https://himsi-unis.34.9.82.228.sslip.io/Logohimsi.png">

    <!-- Favicon Icon Tab Browser -->
    <link rel="icon" type="image/png" href="Logohimsi.png">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        himsiMaroon: '#6b0f1a',
                        himsiCream: '#f7f1e3',
                        himsiGold: '#d4af37',
                        darkNavy: '#0f172a'
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #faf8f5;
        }

        .serif-title {
            font-family: 'Merriweather', serif;
        }

        .gallery-scroll::-webkit-scrollbar {
            height: 6px;
        }
        .gallery-scroll::-webkit-scrollbar-track {
            background: #1e293b;
            border-radius: 4px;
        }
        .gallery-scroll::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            #chatbotPanel {
                width: 88vw !important;
                max-width: 320px !important;
                height: 400px !important;
                max-height: 60vh !important;
                right: 0 !important;
                bottom: 70px !important;
                border-radius: 16px !important;
            }

            #chatbotToggleBtn {
                width: 52px !important;
                height: 52px !important;
                padding: 0 !important;
            }
        }
    </style>
</head>

<body class="text-slate-800 antialiased selection:bg-himsiMaroon selection:text-white relative min-h-screen overflow-x-hidden">

    <!-- GLOBAL WATERMARK LOGO -->
    <div class="fixed inset-0 pointer-events-none z-0 select-none flex items-center justify-center">
        <img src="Logohimsi.png" alt="HIMSI Watermark" class="w-[85vw] max-w-[700px] object-contain opacity-[0.12] pointer-events-none">
    </div>

    <!-- HEADER / NAVIGATION -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-md py-3 relative">
        <div class="max-w-7xl mx-auto px-4 md:px-8 flex items-center justify-between">
            <a href="#tentang" class="flex items-center space-x-3 md:space-x-5 group">
                <img src="Logohimsi.png" alt="Logo HIMSI UNIS" class="w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 object-contain group-hover:scale-105 transition transform drop-shadow-md">
                <div class="border-l-3 md:border-l-4 border-himsiMaroon pl-3 md:pl-4 py-1.5">
                    <span class="serif-title font-bold text-xl sm:text-2xl md:text-3xl tracking-tight text-himsiMaroon block leading-tight">HIMSI UNIS</span>
                    <span class="text-[11px] sm:text-xs md:text-sm text-slate-600 font-extrabold tracking-widest uppercase mt-1 block">Kabinet Genesis</span>
                </div>
            </a>

            <!-- Navigasi Desktop -->
            <nav class="hidden lg:flex items-center space-x-6 xl:space-x-8 text-base lg:text-lg font-bold text-slate-700 relative z-50">
                <a href="#beranda" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Beranda</a>
                <a href="#layanan" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Layanan Digital</a>
                <a href="#kegiatan" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Berita & Kegiatan</a>
                <a href="#karya" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Karya Mahasiswa</a>
                <a href="#tentang" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Tentang Kami</a>
                <a href="#benefit" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Benefit Anggota</a>
                <a href="#gabung" class="bg-himsiMaroon text-white px-5 py-2 rounded-xl hover:bg-red-900 transition shadow-sm text-sm flex items-center gap-2 relative z-50">
                    <i class="fa-solid fa-user-plus"></i> Gabung HIMSI
                </a>
            </nav>

            <button id="mobileMenuBtn" class="lg:hidden text-slate-800 hover:text-himsiMaroon focus:outline-none p-2 transition-transform transform active:scale-95 relative z-50">
                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <div id="mobileMenuPanel" class="hidden lg:hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-xl flex flex-col py-4 px-6 space-y-4 font-bold text-slate-700 z-50">
            <a href="#beranda" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Beranda</a>
            <a href="#layanan" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Layanan Digital</a>
            <a href="#kegiatan" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Berita & Kegiatan</a>
            <a href="#karya" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Karya Mahasiswa</a>
            <a href="#tentang" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Tentang Kami</a>
            <a href="#benefit" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Benefit Anggota</a>
            <a href="#gabung" class="mobile-link bg-himsiMaroon text-white text-center py-3 rounded-xl font-bold">✨ Bergabung Bersama HIMSI</a>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section id="beranda" class="relative bg-himsiMaroon/90 text-white py-24 md:py-32 px-6 overflow-hidden z-10 border-b border-white/10 scroll-mt-36 sm:scroll-mt-44 md:scroll-mt-56">
        <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>

        <div class="max-w-5xl mx-auto relative z-20 text-center">
            <span class="text-himsiGold font-bold tracking-widest text-xs uppercase bg-white/10 px-4 py-1.5 rounded-full inline-block mb-6 border border-white/10 backdrop-blur-sm">
                Universitas Islam Syekh Yusuf Tangerang
            </span>

            <h1 class="serif-title text-3xl sm:text-5xl md:text-6xl font-bold leading-tight mb-6 drop-shadow-md">
                Technology Innovation & Synergistic Leadership
            </h1>

            <p class="text-slate-200 text-sm md:text-xl font-light max-w-3xl mx-auto mb-10 leading-relaxed drop-shadow-sm">
                Selamat Datang di Portal Resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang - Kabinet Genesis. Pusat informasi akademik, kegiatan organisasi, dan layanan digital himpunan.
            </p>

            <div class="flex flex-wrap justify-center gap-4 relative z-30">
                <a href="#gabung" class="bg-himsiGold text-slate-900 px-6 md:px-8 py-3.5 rounded-lg font-bold text-sm shadow-xl hover:bg-yellow-400 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                    <span>🚀</span> Daftar Anggota HIMSI
                </a>
                <a href="#layanan" class="bg-white/10 text-white border border-white/30 px-6 md:px-8 py-3.5 rounded-lg font-bold text-sm hover:bg-white hover:text-himsiMaroon transition transform hover:-translate-y-0.5 backdrop-blur-sm">
                    Jelajahi Layanan Digital
                </a>
            </div>
        </div>
    </section>

    <!-- PORTAL LAYANAN DIGITAL -->
    <section id="layanan" class="py-20 px-6 max-w-7xl mx-auto relative z-10 scroll-mt-36 sm:scroll-mt-44 md:scroll-mt-56">
        <div class="text-center max-w-2xl mx-auto mb-16 relative z-20">
            <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">Direct Hub Access</span>
            <h2 class="serif-title text-3xl md:text-4xl font-bold text-slate-900 mb-4">Layanan & Aplikasi Digital</h2>
            <p class="text-slate-600 text-sm">
                Akses instan seluruh platform digital resmi HIMSI UNIS Tangerang.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto relative z-20">
            <div class="bg-white/85 backdrop-blur-sm rounded-2xl border border-slate-200 shadow-md hover:shadow-2xl transition-all duration-300 p-8 flex flex-col justify-between group hover:-translate-y-1">
                <div>
                    <div class="w-14 h-14 bg-amber-50 text-amber-700 rounded-xl flex items-center justify-center text-3xl font-bold mb-6 group-hover:bg-himsiMaroon group-hover:text-white transition">
                        🏛️
                    </div>
                    <span class="text-xs font-bold text-himsiMaroon uppercase tracking-wider block mb-1">Profil Organisasi</span>
                    <h3 class="serif-title text-xl font-bold text-slate-900 mb-3">Kabinet Genesis</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Mengenal lebih dekat visi, misi, divisi, dan pengurus Himpunan Mahasiswa Sistem Informasi UNIS Tangerang periode 2026.
                    </p>
                </div>
                <a href="struktur.php" class="inline-flex items-center justify-center w-full bg-slate-900 text-white font-bold text-sm py-3.5 rounded-xl hover:bg-slate-800 transition shadow-sm relative z-30">
                    Lihat Struktur Organisasi &rarr;
                </a>
            </div>

            <div class="bg-white/85 backdrop-blur-sm rounded-2xl border border-slate-200 shadow-md p-8 flex flex-col justify-between opacity-80">
                <div>
                    <div class="w-14 h-14 bg-slate-100 text-slate-400 rounded-xl flex items-center justify-center text-3xl font-bold mb-6">
                        📚
                    </div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Tahap Pengembangan</span>
                    <h3 class="serif-title text-xl font-bold text-slate-800 mb-3">Resource Center SI</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6">
                        Pusat modul perkuliahan Sistem Informasi, bank soal, panduan tugas akhir, serta informasi beasiswa dan magang IT.
                    </p>
                </div>
                <button disabled class="w-full bg-slate-100 text-slate-400 font-bold text-sm py-3.5 rounded-xl cursor-not-allowed relative z-30">
                    Segera Hadir
                </button>
            </div>
        </div>
    </section>

    <!-- SECTION BERITA & KEGIATAN -->
    <section id="kegiatan" class="py-20 bg-himsiCream/80 border-y border-slate-200 px-6 relative z-10 scroll-mt-36 sm:scroll-mt-44 md:scroll-mt-56">
        <div class="max-w-7xl mx-auto relative z-20">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">HIMSI News & Event</span>
                <h2 class="serif-title text-3xl md:text-4xl font-bold text-slate-900 mb-4">Berita & Kegiatan</h2>
                <p class="text-slate-600 text-sm">
                    Dokumentasi kegiatan, acara, dan informasi terbaru seputar Himpunan Mahasiswa Sistem Informasi UNIS Tangerang.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group hover:-translate-y-1">
                    <div class="h-48 bg-slate-200 overflow-hidden relative">
                        <img src="kegiatan/pelantikan-1.webp" loading="lazy" alt="Pelantikan HIMSI 2026" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 fallback-bg" onerror="this.src='Logohimsi.png'; this.classList.add('p-8','object-contain','opacity-50')">
                        <div class="absolute top-3 right-3 bg-himsiMaroon text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                            10 Feb 2026
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="serif-title text-xl font-bold text-slate-900 mb-2 leading-tight">Pelantikan Pengurus HIMSI Kabinet Genesis</h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                            Momen sakral pelantikan seluruh pengurus Himpunan Mahasiswa Sistem Informasi UNIS Tangerang periode 2026 secara resmi, membawa semangat integritas dan sinergi.
                        </p>
                        <button onclick="bukaModalKegiatan('pelantikan')" class="w-full bg-slate-900 text-white font-bold text-sm py-3 rounded-xl hover:bg-slate-800 transition flex items-center justify-center gap-2 relative z-30">
                            <span>📸</span> Lihat Dokumentasi
                        </button>
                    </div>
                </div>

                <div class="bg-white/50 rounded-2xl border border-dashed border-slate-300 shadow-sm p-8 flex flex-col justify-center items-center text-center opacity-70">
                    <span class="text-4xl mb-3">📰</span>
                    <h3 class="serif-title font-bold text-slate-700">Kegiatan Selanjutnya</h3>
                    <p class="text-xs text-slate-500 mt-2">Dokumentasi kegiatan HIMSI berikutnya akan segera dipublikasikan di sini.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION SHOWCASE KARYA MAHASISWA -->
    <section id="karya" class="py-20 bg-slate-100/50 border-t border-slate-200 px-6 relative z-10 scroll-mt-36 sm:scroll-mt-44 md:scroll-mt-56">
        <div class="max-w-7xl mx-auto relative z-20">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">Student Showcase</span>
                <h2 class="serif-title text-3xl md:text-4xl font-bold text-slate-900 mb-4">Karya & Inovasi Mahasiswa</h2>
                <p class="text-slate-600 text-sm">
                    Apresiasi dan portofolio hasil karya buatan Mahasiswa Sistem Informasi UNIS Tangerang.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white/85 backdrop-blur-sm rounded-2xl border border-slate-200 shadow-md hover:shadow-2xl transition-all duration-300 p-8 flex flex-col justify-between group hover:-translate-y-1">
                    <div>
                        <div class="w-14 h-14 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-3xl font-bold mb-6 group-hover:bg-himsiMaroon group-hover:text-white transition">
                            📸
                        </div>
                        <span class="text-xs font-bold text-himsiGold uppercase tracking-wider block mb-1">Web Application</span>
                        <h3 class="serif-title text-xl font-bold text-slate-900 mb-2">Photobooth PKKMB 2026</h3>
                        <p class="text-xs text-himsiMaroon font-semibold mb-3">Oleh: Mahasiswa SI UNIS</p>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6">
                            Abadikan momen seru dengan frame eksklusif Kabinet Genesis. Dilengkapi auto-send email softfile dan QR Code scanner.
                        </p>
                    </div>
                    <a href="photobooth/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full bg-himsiMaroon text-white font-bold text-sm py-3.5 rounded-xl hover:bg-opacity-90 transition shadow-sm relative z-30">
                        Buka Aplikasi Photobooth &rarr;
                    </a>
                </div>

                <div class="bg-white/85 backdrop-blur-sm rounded-2xl border border-slate-200 shadow-md overflow-hidden hover:shadow-2xl transition duration-300 flex flex-col justify-between group hover:-translate-y-1">
                    <div>
                        <div class="bg-slate-900 h-32 flex items-center justify-center relative overflow-hidden">
                            <span class="text-5xl group-hover:scale-110 transition transform">🎮</span>
                            <span class="absolute top-3 right-3 bg-himsiGold text-slate-900 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Game Dev</span>
                        </div>
                        <div class="p-6">
                            <h3 class="serif-title text-xl font-bold text-slate-900 mb-1">Super Pahri</h3>
                            <p class="text-xs text-himsiMaroon font-semibold mb-3">Oleh: Mahasiswa SI UNIS</p>
                            <p class="text-slate-600 text-sm leading-relaxed mb-4">
                                Game retro 2D platformer bertema petualangan yang dibangun menggunakan teknologi HTML5 & JavaScript dengan toko item, BGM chiptune, dan multi-level.
                            </p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <button onclick="bukaGameModal('karya/pahri-bros/')" class="w-full bg-himsiMaroon text-white font-bold text-sm py-3.5 rounded-xl hover:bg-opacity-90 transition flex items-center justify-center gap-2 shadow-sm relative z-30">
                            <span>▶️</span> Mainkan Game Sekarang
                        </button>
                    </div>
                </div>

                <div class="bg-white/75 backdrop-blur-sm rounded-2xl border border-slate-200 shadow-md p-6 flex flex-col justify-center items-center text-center opacity-60">
                    <span class="text-4xl mb-3">🚀</span>
                    <h3 class="serif-title font-bold text-slate-700">Project Selanjutnya</h3>
                    <p class="text-xs text-slate-500 mt-1">Karya Mahasiswa SI berikutnya akan ditampilkan di sini.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION TENTANG -->
    <section id="tentang" class="bg-white/85 backdrop-blur-sm py-20 border-y border-slate-200 px-6 relative z-10 scroll-mt-36 sm:scroll-mt-44 md:scroll-mt-56">
        <div class="max-w-4xl mx-auto text-center relative z-20">
            <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">HIMSI UNIS Tangerang</span>
            <h2 class="serif-title text-3xl sm:text-4xl font-bold text-slate-900 mb-6">Tentang Kabinet Genesis</h2>
            
            <p class="text-slate-700 text-base md:text-lg leading-relaxed mb-10">
                Kabinet Genesis berdiri sebagai simbol awal baru yang membawa semangat inovasi teknologi, integritas akademik, dan kepemimpinan adaptif bagi seluruh Mahasiswa Sistem Informasi Universitas Islam Syekh Yusuf Tangerang.
            </p>

            <!-- Card Preview Struktur Organisasi Pimpinan -->
            <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-200 mb-10 text-center max-w-2xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-wider text-red-800 bg-red-100 px-3 py-1 rounded-full">
                    Profil Organisasi
                </span>
                <h3 class="text-2xl font-bold text-slate-800 mt-3">Kabinet Genesis</h3>
                <p class="text-slate-500 text-sm mt-1 mb-6">Pimpinan Himpunan Mahasiswa Sistem Informasi Periode 2026/2027 <br><span class="text-xs text-himsiMaroon font-semibold">(Klik nama pimpinan untuk melihat foto profil)</span></p>

                <!-- KARTU PIMPINAN DENGAN ONCLICK -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div onclick="bukaModalPimpinan('Rafli Fahrezi', 'foto_pengurus/Rafli Fahrezi.webp', 'Ketua HIMSI')" class="bg-slate-50 p-4 rounded-xl border border-slate-200 hover:border-himsiMaroon hover:shadow-md transition cursor-pointer group">
                        <div class="text-xs font-semibold text-red-700">Ketua HIMSI</div>
                        <div class="font-bold text-slate-800 text-lg mt-1 group-hover:text-himsiMaroon transition flex items-center justify-center gap-1.5">
                            Rafli Fahrezi <i class="fa-solid fa-circle-user text-sm text-himsiGold"></i>
                        </div>
                    </div>
                    <div onclick="bukaModalPimpinan('Neyna Carissa', 'foto_pengurus/Neyna Carissa.webp', 'Wakil Ketua HIMSI')" class="bg-slate-50 p-4 rounded-xl border border-slate-200 hover:border-himsiMaroon hover:shadow-md transition cursor-pointer group">
                        <div class="text-xs font-semibold text-red-700">Wakil Ketua HIMSI</div>
                        <div class="font-bold text-slate-800 text-lg mt-1 group-hover:text-himsiMaroon transition flex items-center justify-center gap-1.5">
                            Neyna Carissa <i class="fa-solid fa-circle-user text-sm text-himsiGold"></i>
                        </div>
                    </div>
                </div>

                <a href="struktur.php" class="inline-flex items-center justify-center gap-2 bg-himsiMaroon hover:bg-red-900 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg w-full sm:w-auto relative z-30">
                    <i class="fa-solid fa-sitemap"></i> Lihat Struktur Organisasi Lengkap
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-8 border-t border-slate-100">
                <div class="p-4 rounded-xl bg-slate-50/80">
                    <span class="block text-2xl font-bold text-himsiMaroon serif-title">UNIS</span>
                    <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Tangerang</span>
                </div>
                <div class="p-4 rounded-xl bg-slate-50/80">
                    <span class="block text-2xl font-bold text-himsiMaroon serif-title">SI</span>
                    <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Sistem Informasi</span>
                </div>
                <div class="p-4 rounded-xl bg-slate-50/80">
                    <span class="block text-2xl font-bold text-himsiMaroon serif-title">2026</span>
                    <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Kabinet Genesis</span>
                </div>
                <div class="p-4 rounded-xl bg-slate-50/80">
                    <span class="block text-2xl font-bold text-himsiMaroon serif-title">0001 1010</span>
                    <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Technology Innovation</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION MANFAAT & PEMBELAJARAN HIMSI (INTERAKTIF MODAL) -->
    <section id="benefit" class="py-16 bg-slate-50 border-t border-slate-200 px-6 relative z-10 scroll-mt-36 sm:scroll-mt-44 md:scroll-mt-56">
        <div class="max-w-6xl mx-auto relative z-20">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-wider text-red-800 bg-red-100 px-3 py-1 rounded-full">
                    Benefit Anggota
                </span>
                <h2 class="serif-title text-3xl font-bold text-slate-900 mt-3">Apa yang Akan Kamu Pelajari di HIMSI?</h2>
                <p class="text-slate-600 text-sm mt-2">
                    Asah keterampilan teknis dan akademis di bidang Teknologi Informasi. <span class="font-semibold text-himsiMaroon">Klik kartu untuk melihat detail silabus & roadmap!</span>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div onclick="bukaModalBenefit('pemrograman')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group">
                    <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold mb-4 group-hover:bg-himsiMaroon group-hover:text-white transition">💻</div>
                    <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Dasar Pemrograman</h3>
                    <p class="text-slate-500 text-xs leading-relaxed mb-3">Logika algoritma, pemecahan masalah, dan dasar penulisan kode sintaks.</p>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform">Lihat Detail Silabus &rarr;</span>
                </div>

                <!-- Card 2 -->
                <div onclick="bukaModalBenefit('erp')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group">
                    <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold mb-4 group-hover:bg-himsiMaroon group-hover:text-white transition">⚙️</div>
                    <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Fundamental ERP</h3>
                    <p class="text-slate-500 text-xs leading-relaxed mb-3">Pemahaman sistem perencanaan sumber daya perusahaan terintegrasi.</p>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform">Lihat Detail Silabus &rarr;</span>
                </div>

                <!-- Card 3 -->
                <div onclick="bukaModalBenefit('database')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group">
                    <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold mb-4 group-hover:bg-himsiMaroon group-hover:text-white transition">🗄️</div>
                    <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Konsep Basis Data</h3>
                    <p class="text-slate-500 text-xs leading-relaxed mb-3">Perancangan, manipulasi data (SQL), dan pengelolaan sistem database.</p>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform">Lihat Detail Silabus &rarr;</span>
                </div>

                <!-- Card 4 -->
                <div onclick="bukaModalBenefit('jaringan')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group">
                    <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold mb-4 group-hover:bg-himsiMaroon group-hover:text-white transition">🌐</div>
                    <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Fundamental Jaringan</h3>
                    <p class="text-slate-500 text-xs leading-relaxed mb-3">Konsep LAN/WAN, IP addressing, komunikasi data, dan infrastruktur IT.</p>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform">Lihat Detail Silabus &rarr;</span>
                </div>

                <!-- Card 5 -->
                <div onclick="bukaModalBenefit('datascience')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group">
                    <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold mb-4 group-hover:bg-himsiMaroon group-hover:text-white transition">📊</div>
                    <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Data Science</h3>
                    <p class="text-slate-500 text-xs leading-relaxed mb-3">Pengolahan data, analisis statistik, visualisasi data, dan pola tren.</p>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform">Lihat Detail Silabus &rarr;</span>
                </div>

                <!-- Card 6 -->
                <div onclick="bukaModalBenefit('uiux')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group">
                    <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold mb-4 group-hover:bg-himsiMaroon group-hover:text-white transition">🎨</div>
                    <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Design UI/UX</h3>
                    <p class="text-slate-500 text-xs leading-relaxed mb-3">Perancangan antarmuka aplikasi intuitif dan riset pengalaman pengguna.</p>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform">Lihat Detail Silabus &rarr;</span>
                </div>

                <!-- Card 7 -->
                <div onclick="bukaModalBenefit('machinelearning')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group">
                    <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold mb-4 group-hover:bg-himsiMaroon group-hover:text-white transition">🤖</div>
                    <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Machine Learning</h3>
                    <p class="text-slate-500 text-xs leading-relaxed mb-3">Konsep model kecerdasan buatan dan pemrosesan data otomatis.</p>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform">Lihat Detail Silabus &rarr;</span>
                </div>

                <!-- Card 8 -->
                <div onclick="bukaModalBenefit('cybersecurity')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group">
                    <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold mb-4 group-hover:bg-himsiMaroon group-hover:text-white transition">🛡️</div>
                    <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Keamanan Siber</h3>
                    <p class="text-slate-500 text-xs leading-relaxed mb-3">Prinsip perlindungan data, kesadaran celah keamanan, dan etika IT.</p>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform">Lihat Detail Silabus &rarr;</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION BERGABUNG DENGAN HIMSI UNIS -->
    <section id="gabung" class="py-20 bg-gradient-to-br from-himsiMaroon via-red-900 to-darkNavy text-white px-6 relative z-10 border-t border-white/10 scroll-mt-24">
        <div class="max-w-5xl mx-auto text-center relative z-20">
            <span class="text-himsiGold font-bold text-xs uppercase tracking-widest bg-white/10 px-4 py-1.5 rounded-full inline-block mb-4 border border-white/10">
                Open Recruitment 2026/2027
            </span>
            <h2 class="serif-title text-3xl sm:text-5xl font-bold mb-6">Bergabung Bersama HIMSI UNIS</h2>
            <p class="text-slate-200 text-base sm:text-lg max-w-2xl mx-auto mb-10 leading-relaxed font-light">
                Jadilah bagian dari Himpunan Mahasiswa Sistem Informasi - HIMSI UNIS! Tingkatkan wawasan teknologi, perluas jaringan koneksi, serta kembangkan karakter kepemimpinan kamu bersama keluarga besar Sistem Informasi.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 text-left">
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/15">
                    <div class="text-himsiGold font-bold text-2xl mb-2">01.</div>
                    <h3 class="font-bold text-lg mb-1">Status Mahasiswa</h3>
                    <p class="text-slate-300 text-xs leading-relaxed">Mahasiswa/i aktif Program Studi Sistem Informasi UNIS Tangerang.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/15">
                    <div class="text-himsiGold font-bold text-2xl mb-2">02.</div>
                    <h3 class="font-bold text-lg mb-1">Komitmen & Antusias</h3>
                    <p class="text-slate-300 text-xs leading-relaxed">Memiliki semangat belajar, berkembang, dan berkontribusi aktif dalam himpunan.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/15">
                    <div class="text-himsiGold font-bold text-2xl mb-2">03.</div>
                    <h3 class="font-bold text-lg mb-1">Isi Formulir</h3>
                    <p class="text-slate-300 text-xs leading-relaxed">Lengkapi data diri melalui formulir pendaftaran resmi HIMSI UNIS.</p>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-4 relative z-30">
                <a href="https://instagram.com/himsi_unis" target="_blank" rel="noopener noreferrer" class="bg-himsiGold text-slate-900 px-8 py-4 rounded-xl font-bold text-sm shadow-xl hover:bg-yellow-400 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                    <i class="fa-brands fa-instagram text-lg"></i> Info Pendaftaran via Instagram
                </a>
                <a href="https://forms.gle/XS3AHjB9BDsX5CdT6" target="_blank" rel="noopener noreferrer" class="bg-white/10 hover:bg-white hover:text-himsiMaroon border border-white/30 text-white px-8 py-4 rounded-xl font-bold text-sm transition transform hover:-translate-y-0.5 backdrop-blur-sm flex items-center gap-2">
                    <i class="fa-solid fa-envelope-open-text text-lg"></i> Hubungi Humas via Form
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="kontak" class="bg-darkNavy/95 text-white py-12 px-6 relative z-10">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6 relative z-20">
            <div class="flex items-center space-x-4">
                <img src="Logohimsi.png" alt="Logo Footer" class="w-16 h-16 object-contain">
                <div>
                    <h3 class="serif-title text-base font-bold text-white">HIMSI UNIS Tangerang</h3>
                    <p class="text-slate-400 text-xs">Himpunan Mahasiswa Sistem Informasi — Kabinet Genesis</p>
                </div>
            </div>

            <div class="text-center md:text-right text-xs text-slate-400 leading-relaxed">
                <p>&copy; 2026 HIMSI UNIS Tangerang. All rights reserved.</p>
                <p class="mt-1">Universitas Islam Syekh Yusuf Tangerang</p>
            </div>
        </div>
    </footer>

    <!-- MODAL POPUP: FOTO PROFIL PIMPINAN (RESPONSIF & SUPER BESAR) -->
    <div id="pimpinanModal" class="fixed inset-0 bg-black/75 z-[100] hidden items-center justify-center p-4 backdrop-blur-md" onclick="tutupModalPimpinan(event)">
        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-[90vw] sm:max-w-lg md:max-w-2xl text-center relative transform transition-all" id="pimpinanModalContent">
            <!-- Tombol Close -->
            <button onclick="tutupModalPimpinanDirect()" class="absolute top-4 right-5 md:top-6 md:right-7 text-gray-400 hover:text-red-600 transition text-3xl md:text-4xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
            
            <!-- Foto Profil: w-80 h-80 di HP/Tablet (2x), md:w-[480px] md:h-[480px] di Laptop (3x) -->
            <img id="pimpinanImg" src="" alt="Foto Pimpinan" class="w-80 h-80 md:w-[480px] md:h-[480px] rounded-full object-cover border-4 md:border-8 border-[#d4af37] mx-auto mb-6 shadow-2xl bg-gray-100">
            
            <!-- Nama & Jabatan -->
            <h3 id="pimpinanNama" class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight">Nama</h3>
            <p id="pimpinanJabatan" class="text-sm sm:text-base md:text-lg font-bold text-red-900 bg-red-100 py-2 px-6 rounded-full inline-block mt-3 tracking-wide">Jabatan</p>
        </div>
    </div>

    <!-- MODAL POPUP: DETAIL BENEFIT ANGGOTA -->
    <div id="benefitModal" class="fixed inset-0 bg-black/80 z-[90] hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl overflow-hidden w-full max-w-2xl shadow-2xl border border-slate-200 flex flex-col relative transform transition-all">
            <!-- Header Modal -->
            <div class="px-6 py-5 bg-himsiMaroon text-white flex justify-between items-center relative">
                <div class="flex items-center gap-3">
                    <span id="benefitIcon" class="text-3xl">💻</span>
                    <div>
                        <h3 id="benefitJudul" class="font-bold text-lg md:text-xl leading-tight">Detail Pembelajaran</h3>
                        <p class="text-xs text-slate-200 mt-0.5">Silabus & Output Pembelajaran Anggota HIMSI</p>
                    </div>
                </div>
                <button onclick="tutupModalBenefit()" class="text-white/80 hover:text-white text-3xl font-bold px-2 leading-none transition">&times;</button>
            </div>

            <!-- Body Modal -->
            <div class="p-6 overflow-y-auto max-h-[75vh] space-y-6 text-sm text-slate-700">
                <div>
                    <h4 class="font-bold text-slate-900 mb-1.5 flex items-center gap-2">
                        <i class="fa-solid fa-circle-info text-himsiMaroon"></i> Ringkasan Materi
                    </h4>
                    <p id="benefitDeskripsi" class="text-slate-600 leading-relaxed text-xs sm:text-sm"></p>
                    <div id="benefitKegiatan" class="mt-2 text-xs font-semibold text-himsiMaroon bg-red-50 p-2.5 rounded-xl border border-red-100 inline-block"></div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-screwdriver-wrench text-himsiMaroon"></i> Teknologi & Tools
                    </h4>
                    <div id="benefitTools" class="flex flex-wrap gap-2"></div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-route text-himsiMaroon"></i> Roadmap Belajar 4 Minggu
                    </h4>
                    <ul id="benefitRoadmap" class="space-y-2 text-xs sm:text-sm"></ul>
                </div>

                <div class="bg-amber-50 p-4 rounded-2xl border border-amber-200">
                    <h4 class="font-bold text-amber-900 mb-1 flex items-center gap-2 text-xs sm:text-sm">
                        <i class="fa-solid fa-trophy text-amber-600"></i> Target Output Proyek
                    </h4>
                    <p id="benefitOutput" class="text-xs sm:text-sm text-amber-800 font-medium"></p>
                </div>
            </div>

            <!-- Footer Modal -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex justify-between items-center gap-4">
                <button onclick="tutupModalBenefit()" class="text-slate-500 hover:text-slate-800 text-xs font-semibold py-2 px-4 transition">
                    Tutup
                </button>
                <a href="#gabung" onclick="tutupModalBenefit()" class="bg-himsiMaroon hover:bg-red-900 text-white font-bold text-xs sm:text-sm py-2.5 px-6 rounded-xl transition shadow-md flex items-center gap-2">
                    <span>🚀</span> Daftar & Belajar
                </a>
            </div>
        </div>
    </div>

    <!-- MODAL POPUP: DOKUMENTASI KEGIATAN -->
    <div id="kegiatanModal" class="fixed inset-0 bg-black/95 z-[70] hidden items-center justify-center p-2 sm:p-6 backdrop-blur-md">
        <div class="bg-slate-900 rounded-2xl overflow-hidden w-full max-w-5xl h-[95vh] md:h-[85vh] shadow-2xl border border-slate-700 flex flex-col">
            <div class="px-5 py-4 bg-slate-800 flex justify-between items-center border-b border-slate-700 shrink-0">
                <div>
                    <h3 id="modalKegiatanJudul" class="font-bold text-white text-lg md:text-xl tracking-wide">Dokumentasi Kegiatan</h3>
                    <p id="modalKegiatanTanggal" class="text-slate-400 text-xs mt-1">Tanggal</p>
                </div>
                <button onclick="tutupModalKegiatan()" class="text-slate-400 hover:text-white text-3xl font-bold px-2 leading-none transition">&times;</button>
            </div>
            <div class="flex flex-col grow min-h-0 bg-black relative">
                <div class="w-full flex-1 min-h-0 flex items-center justify-center p-2 relative group">
                    <div id="mediaLoader" class="absolute inset-0 flex items-center justify-center pointer-events-none hidden z-0">
                        <svg class="animate-spin h-12 w-12 text-white opacity-70" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    <img id="mainMediaDisplay" src="" alt="Galeri" class="max-w-full max-h-full object-contain transition-opacity duration-300 relative z-10 opacity-0">
                    <iframe id="mainVideoDisplay" src="" class="w-full h-full border-0 hidden relative z-10" allowfullscreen></iframe>
                    <button onclick="navigasiGaleri(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-himsiMaroon/90 border border-white/20 text-white rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center transition-all duration-300 opacity-0 group-hover:opacity-100 z-20 shadow-lg cursor-pointer">
                        <span class="text-xl md:text-2xl font-bold">&larr;</span>
                    </button>
                    <button onclick="navigasiGaleri(1)" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-himsiMaroon/90 border border-white/20 text-white rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center transition-all duration-300 opacity-0 group-hover:opacity-100 z-20 shadow-lg cursor-pointer">
                        <span class="text-xl md:text-2xl font-bold">&rarr;</span>
                    </button>
                </div>
                <div class="px-6 py-4 bg-slate-900 border-t border-slate-800 shrink-0 z-20">
                    <p id="modalKegiatanDesc" class="text-slate-300 text-sm leading-relaxed"></p>
                </div>
                <div class="h-24 bg-slate-950 border-t border-slate-800 p-3 shrink-0 flex items-center overflow-x-auto gallery-scroll space-x-3 scroll-smooth z-20" id="thumbnailContainer"></div>
            </div>
        </div>
    </div>

    <!-- MODAL EMBED GAME PAHRI BROS -->
    <div id="gameModal" class="fixed inset-0 bg-black/85 z-[70] hidden items-center justify-center p-2 sm:p-4 backdrop-blur-sm">
        <div class="bg-slate-900 rounded-2xl overflow-hidden w-[96vw] max-w-7xl h-auto md:h-[88vh] max-h-[85vh] shadow-2xl border border-slate-700 flex flex-col justify-between">
            <div class="px-4 py-3 md:px-5 md:py-4 bg-slate-800 flex justify-between items-center border-b border-slate-700 shrink-0">
                <div class="flex items-center gap-3">
                    <span class="text-xl md:text-3xl">🎮</span>
                    <h3 class="font-bold text-white text-sm md:text-xl tracking-wide">Super Pahri — Game Showcase</h3>
                </div>
                <div class="flex items-center gap-2 md:gap-3">
                    <a id="btnFullscreen" href="karya/pahri-bros/" target="_blank" rel="noopener noreferrer" class="bg-sky-600 hover:bg-sky-500 text-white text-xs md:text-sm px-3 py-1.5 md:px-4 md:py-2 rounded-lg font-bold transition flex items-center gap-1.5 shadow-md">
                        <span>↗️</span> <span class="hidden sm:inline">Main Fullscreen</span>
                    </a>
                    <button onclick="tutupGameModal()" class="text-slate-400 hover:text-white text-2xl md:text-3xl font-bold px-2 leading-none transition">&times;</button>
                </div>
            </div>
            <div class="relative w-full h-[60vh] md:h-full bg-slate-950 flex items-center justify-center overflow-hidden grow p-0">
                <iframe id="gameIframe" src="" class="w-full h-full border-0"></iframe>
            </div>
        </div>
    </div>

    <!-- FLOATING CHATBOT WIDGET (HIMSI BOT 24/7) -->
    <div class="fixed bottom-6 right-6 z-[100]">
        <button id="chatbotToggleBtn" onclick="toggleChatbot()" class="bg-himsiMaroon hover:bg-red-900 text-white rounded-full p-4 shadow-2xl transition transform hover:scale-110 flex items-center justify-center border-2 border-himsiGold relative z-[100] cursor-pointer">
            <span class="text-2xl pointer-events-none">🤖</span>
        </button>

        <div id="chatbotPanel" class="hidden absolute bottom-16 right-0 w-[90vw] max-w-[380px] h-[520px] bg-white rounded-2xl shadow-2xl border border-slate-200 flex flex-col overflow-hidden">
            <div class="bg-himsiMaroon text-white p-4 flex items-center justify-between shadow-md">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-xl border border-white/20">🤖</div>
                    <div>
                        <h4 class="font-bold text-sm leading-tight">HIMSI Bot 24/7</h4>
                        <span class="text-[10px] text-amber-300 font-semibold flex items-center gap-1">
                            <span class="w-2 h-2 bg-green-400 rounded-full inline-block animate-pulse"></span> Online • AI Support
                        </span>
                    </div>
                </div>
                <button onclick="toggleChatbot()" class="text-white/80 hover:text-white text-2xl font-bold leading-none">&times;</button>
            </div>

            <div id="chatMessages" class="flex-1 p-4 overflow-y-auto space-y-3 bg-slate-50 text-xs">
                <div class="flex items-start space-x-2">
                    <div class="w-7 h-7 bg-himsiMaroon text-white rounded-full flex items-center justify-center shrink-0 font-bold text-[10px]">AI</div>
                    <div class="bg-white p-3 rounded-2xl rounded-tl-none border border-slate-200 shadow-sm text-slate-700 leading-relaxed">
                        Halo! 👋 Saya <b>HIMSI Ai</b>. Ada yang bisa saya bantu terkait pendaftaran HIMSI, jadwal perkuliahan, atau info seputar HIMSI UNIS?
                    </div>
                </div>
            </div>

            <div id="chatTyping" class="hidden px-4 py-2 bg-slate-50 text-[11px] text-slate-400 italic">
                HIMSI Bot sedang mengetik...
            </div>

            <div class="p-3 bg-white border-t border-slate-200 flex items-center gap-2">
                <input type="text" id="chatInput" placeholder="Ketik pertanyaan Anda..." onkeydown="if(event.key==='Enter') sendChatMessage()" class="flex-1 text-xs border border-slate-300 rounded-xl px-3 py-2.5 focus:outline-none focus:border-himsiMaroon">
                <button onclick="sendChatMessage()" class="bg-himsiMaroon text-white px-4 py-2.5 rounded-xl font-bold text-xs hover:bg-red-900 transition shadow-sm">Kirim</button>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT SYSTEM -->
    <script>
        // --- FUNGSI MODAL PIMPINAN ---
        function bukaModalPimpinan(nama, imgSrc, jabatan) {
            document.getElementById('pimpinanNama').textContent = nama;
            document.getElementById('pimpinanJabatan').textContent = jabatan;
            
            const img = document.getElementById('pimpinanImg');
            img.src = imgSrc;
            const safeName = encodeURIComponent(nama);
            img.onerror = function() {
                this.src = 'https://ui-avatars.com/api/?name=' + safeName + '&background=6b0f1a&color=fff&bold=true';
            };

            const modal = document.getElementById('pimpinanModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function tutupModalPimpinan(e) {
            if (e.target === document.getElementById('pimpinanModal')) {
                tutupModalPimpinanDirect();
            }
        }

        function tutupModalPimpinanDirect() {
            const modal = document.getElementById('pimpinanModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        // --- DATABASE INTERAKTIF BENEFIT ANGGOTA ---
        const databaseBenefit = {
            'pemrograman': {
                judul: 'Dasar Pemrograman',
                ikon: '💻',
                deskripsi: 'Mempelajari logika algoritma dan pemecahan masalah (problem solving) sebagai pondasi awal yang krusial bagi Mahasiswa Sistem Informasi.',
                kegiatan: '💡 4x Sesi Workshop & Mentoring Kode 1-on-1',
                tools: ['Python', 'C++', 'JavaScript', 'VS Code'],
                roadmap: [
                    '<b>Minggu 1:</b> Pengenalan Logika Algoritma & Konsep Variabel',
                    '<b>Minggu 2:</b> Pengondisian (If-Else) & Perulangan (Looping)',
                    '<b>Minggu 3:</b> Fungsi, Array, & Error Handling',
                    '<b>Minggu 4:</b> Mini Project: Kalkulator & Aplikasi Konsol'
                ],
                output: 'Aplikasi Manajemen Data Sederhana Berbasis Konsol / Terminal.'
            },
            'erp': {
                judul: 'Fundamental ERP',
                ikon: '⚙️',
                deskripsi: 'Memahami bagaimana sistem Enterprise Resource Planning (ERP) mengintegrasikan seluruh alur bisnis perusahaan secara terpusat.',
                kegiatan: '🏬 Study Case Alur Bisnis Perusahaan Digital',
                tools: ['Odoo', 'SAP Basic Concept', 'Draw.io'],
                roadmap: [
                    '<b>Minggu 1:</b> Konsep Dasar & Pentingnya ERP di Industri',
                    '<b>Minggu 2:</b> Modul Sales, Purchase, & Inventory',
                    '<b>Minggu 3:</b> Modul Human Resource & Accounting',
                    '<b>Minggu 4:</b> Simulasi Transaksi Alur Bisnis Terintegrasi'
                ],
                output: 'Pemetaan Blueprint & Konfigurasi Sistem Bisnis ERP.'
            },
            'database': {
                judul: 'Konsep Basis Data',
                ikon: '🗄️',
                deskripsi: 'Merancang dan mengelola penyimpanan data yang aman, terstruktur, serta efisien untuk kebutuhan aplikasi modern.',
                kegiatan: '📊 Praktikum Live SQL Query & Database Design',
                tools: ['MySQL', 'PostgreSQL', 'phpMyAdmin'],
                roadmap: [
                    '<b>Minggu 1:</b> Perancangan ERD (Entity Relationship Diagram)',
                    '<b>Minggu 2:</b> Normalisasi Data & DDL (Data Definition Language)',
                    '<b>Minggu 3:</b> DML Query (SELECT, INSERT, UPDATE, JOIN)',
                    '<b>Minggu 4:</b> Database Security & Backup Strategy'
                ],
                output: 'Rancangan Struktur Database Lengkap Siap Pakai.'
            },
            'jaringan': {
                judul: 'Fundamental Jaringan',
                ikon: '🌐',
                deskripsi: 'Memahami arsitektur komunikasi data, infrastruktur LAN/WAN, IP Addressing, serta protokol jaringan internet.',
                kegiatan: '🔌 Simulasi Topologi & Konfigurasi Jaringan',
                tools: ['Cisco Packet Tracer', 'Wireshark'],
                roadmap: [
                    '<b>Minggu 1:</b> Model OSI Layer & Protokol TCP/IP',
                    '<b>Minggu 2:</b> Subnetting & Pengalamatan IP Address',
                    '<b>Minggu 3:</b> Perancangan Topologi Jaringan Komputer',
                    '<b>Minggu 4:</b> Troubleshooting & Pengujian Koneksi'
                ],
                output: 'Simulasi Topologi Jaringan Komputer Perusahaan.'
            },
            'datascience': {
                judul: 'Data Science',
                ikon: '📊',
                deskripsi: 'Mengolah data mentah menjadi wawasan bisnis (insight) yang berharga menggunakan teknik statistik dan visualisasi.',
                kegiatan: '📈 Olah Data Publik & Visualisasi Grafik Interaktif',
                tools: ['Python', 'Pandas', 'Matplotlib', 'Jupyter Notebook'],
                roadmap: [
                    '<b>Minggu 1:</b> Pengenalan Data Science & Python for Data',
                    '<b>Minggu 2:</b> Data Cleaning & Preprocessing',
                    '<b>Minggu 3:</b> Exploratory Data Analysis (EDA)',
                    '<b>Minggu 4:</b> Visualisasi Dashboard Insight'
                ],
                output: 'Laporan Analisis Data & Dashboard Insight Interaktif.'
            },
            'uiux': {
                judul: 'Design UI/UX',
                ikon: '🎨',
                deskripsi: 'Merancang antarmuka aplikasi yang menarik (UI) dan pengalaman pengguna yang nyaman (UX) berbasis riset.',
                kegiatan: '🎨 Mentoring Desain & Usability Testing',
                tools: ['Figma', 'Whimsical', 'Color Hunt'],
                roadmap: [
                    '<b>Minggu 1:</b> User Research & Wireframing Low-Fidelity',
                    '<b>Minggu 2:</b> UI Design System & Component Guidelines',
                    '<b>Minggu 3:</b> High-Fidelity Design & Prototyping',
                    '<b>Minggu 4:</b> Usability Testing & Design Review'
                ],
                output: 'Prototype Aplikasi Mobile / Web Interaktif Siap Uji.'
            },
            'machinelearning': {
                judul: 'Machine Learning',
                ikon: '🤖',
                deskripsi: 'Mempelajari konsep awal kecerdasan buatan (AI) agar komputer mampu memprediksi dan belajar dari pola data.',
                kegiatan: '🧠 Pelatihan Model Prediksi Sederhana',
                tools: ['Python', 'Scikit-Learn', 'Google Colab'],
                roadmap: [
                    '<b>Minggu 1:</b> Konsep dasar AI vs Machine Learning',
                    '<b>Minggu 2:</b> Supervised vs Unsupervised Learning',
                    '<b>Minggu 3:</b> Pembuatan Model Regresi / Klasifikasi',
                    '<b>Minggu 4:</b> Evaluasi Akurasi & Pengujian Model'
                ],
                output: 'Model AI Prediksi Sederhana Berbasis Python.'
            },
            'cybersecurity': {
                judul: 'Keamanan Siber',
                ikon: '🛡️',
                deskripsi: 'Menanamkan kesadaran etika IT, menganalisis celah keamanan sistem, serta prinsip dasar perlindungan data.',
                kegiatan: '🔐 Hands-on Analisis Celah Keamanan Dasar',
                tools: ['Kali Linux Basic', 'Burp Suite', 'Nmap'],
                roadmap: [
                    '<b>Minggu 1:</b> Prinsip Dasar Information Security (CIA Triad)',
                    '<b>Minggu 2:</b> Menganalisis Potensi Kerentanan Web (OWASP Top 10)',
                    '<b>Minggu 3:</b> Konsep Enkripsi & Perlindungan Password',
                    '<b>Minggu 4:</b> Best Practices Hardening System & Etika IT'
                ],
                output: 'Laporan Audit & Rekomendasi Keamanan Sistem.'
            }
        };

        // --- FUNGSI OPEN & CLOSE MODAL BENEFIT ---
        function bukaModalBenefit(key) {
            const data = databaseBenefit[key];
            if (!data) return;

            document.getElementById('benefitIcon').textContent = data.ikon;
            document.getElementById('benefitJudul').textContent = data.judul;
            document.getElementById('benefitDeskripsi').textContent = data.deskripsi;
            document.getElementById('benefitKegiatan').textContent = data.kegiatan;
            document.getElementById('benefitOutput').textContent = data.output;

            const toolsContainer = document.getElementById('benefitTools');
            toolsContainer.innerHTML = '';
            data.tools.forEach(tool => {
                const span = document.createElement('span');
                span.className = 'px-3 py-1 bg-slate-100 text-slate-700 text-xs font-bold rounded-lg border border-slate-200';
                span.textContent = tool;
                toolsContainer.appendChild(span);
            });

            const roadmapContainer = document.getElementById('benefitRoadmap');
            roadmapContainer.innerHTML = '';
            data.roadmap.forEach(item => {
                const li = document.createElement('li');
                li.className = 'flex items-start gap-2 bg-slate-50 p-2.5 rounded-xl border border-slate-100';
                li.innerHTML = `<span class="text-himsiMaroon font-bold">•</span> <span>${item}</span>`;
                roadmapContainer.appendChild(li);
            });

            const modal = document.getElementById('benefitModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function tutupModalBenefit() {
            const modal = document.getElementById('benefitModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        // Chatbot Panel Toggle
        function toggleChatbot() {
            const panel = document.getElementById('chatbotPanel');
            panel.classList.toggle('hidden');
        }

        function formatMarkdownText(text) {
            if (!text) return '';
            let formatted = text.replace(/\*\*(.*?)\*\*/g, '<b>$1</b>');
            formatted = formatted.replace(/\*(.*?)\*/g, '<i>$1</i>');
            formatted = formatted.replace(/(https?:\/\/[^\s<]+)/g, '<a href="$1" target="_blank" class="text-sky-600 underline font-semibold">$1</a>');
            formatted = formatted.replace(/\n/g, '<br>');
            return formatted;
        }

        async function sendChatMessage() {
            const input = document.getElementById('chatInput');
            const messages = document.getElementById('chatMessages');
            const typing = document.getElementById('chatTyping');
            const userMsg = input.value.trim();

            if (!userMsg) return;

            messages.innerHTML += `
                <div class="flex items-end justify-end space-x-2">
                    <div class="bg-himsiMaroon text-white p-3 rounded-2xl rounded-tr-none shadow-sm text-xs max-w-[80%] leading-relaxed">
                        ${userMsg.replace(/</g, "&lt;").replace(/>/g, "&gt;")}
                    </div>
                </div>
            `;
            input.value = '';
            messages.scrollTop = messages.scrollHeight;

            typing.classList.remove('hidden');

            try {
                const response = await fetch('api_chatbot.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ message: userMsg })
                });
                const data = await response.json();

                typing.classList.add('hidden');

                let botReplyFormatted = formatMarkdownText(data.reply);

                messages.innerHTML += `
                    <div class="flex items-start space-x-2">
                        <div class="w-7 h-7 bg-himsiMaroon text-white rounded-full flex items-center justify-center shrink-0 font-bold text-[10px]">AI</div>
                        <div class="bg-white p-3 rounded-2xl rounded-tl-none border border-slate-200 shadow-sm text-slate-700 leading-relaxed max-w-[85%]">
                            ${botReplyFormatted}
                        </div>
                    </div>
                `;
            } catch (error) {
                typing.classList.add('hidden');
                messages.innerHTML += `
                    <div class="flex items-start space-x-2">
                        <div class="w-7 h-7 bg-red-600 text-white rounded-full flex items-center justify-center shrink-0 font-bold text-[10px]">ERR</div>
                        <div class="bg-red-50 text-red-600 p-3 rounded-2xl rounded-tl-none border border-red-200 text-xs">
                            Gagal terhubung ke server API Chatbot.
                        </div>
                    </div>
                `;
            }
            messages.scrollTop = messages.scrollHeight;
        }

        // Mobile Menu
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenuPanel = document.getElementById('mobileMenuPanel');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuPanel.classList.toggle('hidden');
        });

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenuPanel.classList.add('hidden');
            });
        });

        // Modal Game
        function bukaGameModal(gameUrl) {
            if (gameUrl.startsWith('karya/')) {
                document.getElementById('gameIframe').src = gameUrl;
                document.getElementById('gameModal').classList.remove('hidden');
                document.getElementById('gameModal').classList.add('flex');
            }
        }

        function tutupGameModal() {
            document.getElementById('gameIframe').src = '';
            document.getElementById('gameModal').classList.remove('flex');
            document.getElementById('gameModal').classList.add('hidden');
        }

        // Modal Galeri Kegiatan
        const databaseKegiatan = {
            'pelantikan': {
                judul: 'Pelantikan Pengurus HIMSI Kabinet Genesis',
                tanggal: '10 Februari 2026',
                deskripsi: 'Dokumentasi resmi kegiatan pelantikan seluruh pengurus Himpunan Mahasiswa Sistem Informasi Universitas Islam Syekh Yusuf Tangerang periode 2026.',
                media: [
                    { type: 'image', url: 'kegiatan/pelantikan-1.webp' },
                    { type: 'image', url: 'kegiatan/pelantikan-2.webp' },
                    { type: 'image', url: 'kegiatan/pelantikan-3.webp' },
                    { type: 'image', url: 'kegiatan/pelantikan-4.webp' },
                    { type: 'image', url: 'kegiatan/pelantikan-5.webp' }
                ]
            }
        };

        let currentGalleryData = [];
        let currentGalleryIndex = 0;

        function bukaModalKegiatan(idKegiatan) {
            const data = databaseKegiatan[idKegiatan];
            if(!data) return;

            currentGalleryData = data.media;
            currentGalleryIndex = 0;

            document.getElementById('modalKegiatanJudul').innerText = data.judul;
            document.getElementById('modalKegiatanTanggal').innerText = data.tanggal;
            document.getElementById('modalKegiatanDesc').innerText = data.deskripsi;

            const thumbContainer = document.getElementById('thumbnailContainer');
            thumbContainer.innerHTML = '';

            data.media.forEach((item, index) => {
                const btn = document.createElement('button');
                btn.className = `h-16 w-24 shrink-0 rounded-md overflow-hidden border-2 transition relative focus:outline-none`;
                btn.onclick = () => gantiMediaUtama(index);
                btn.innerHTML = `<img src="${item.url}" loading="lazy" onerror="this.src='Logohimsi.png'" class="w-full h-full object-cover">`;
                thumbContainer.appendChild(btn);
            });

            gantiMediaUtama(0);
            document.getElementById('kegiatanModal').classList.remove('hidden');
            document.getElementById('kegiatanModal').classList.add('flex');
        }

        function gantiMediaUtama(index) {
            if (index < 0 || index >= currentGalleryData.length) return;
            currentGalleryIndex = index;
            const mediaObj = currentGalleryData[index];
            const imgDisplay = document.getElementById('mainMediaDisplay');
            const loader = document.getElementById('mediaLoader');

            imgDisplay.classList.add('opacity-0');
            loader.classList.remove('hidden');

            imgDisplay.onload = function() {
                loader.classList.add('hidden');
                this.classList.remove('opacity-0');
            };
            imgDisplay.src = mediaObj.url;
        }

        function navigasiGaleri(arah) {
            let nextIndex = currentGalleryIndex + arah;
            if (nextIndex < 0) nextIndex = currentGalleryData.length - 1;
            if (nextIndex >= currentGalleryData.length) nextIndex = 0;
            gantiMediaUtama(nextIndex);
        }

        function tutupModalKegiatan() {
            document.getElementById('kegiatanModal').classList.remove('flex');
            document.getElementById('kegiatanModal').classList.add('hidden');
        }
    </script>
</body>
</html>