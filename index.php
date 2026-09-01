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

    <!-- SECTION MANFAAT & PEMBELAJARAN HIMSI (INTERAKTIF MODAL + FILTER & SEARCH) -->
    <section id="benefit" class="py-16 bg-slate-50 border-t border-slate-200 px-6 relative z-10 scroll-mt-36 sm:scroll-mt-44 md:scroll-mt-56">
        <div class="max-w-6xl mx-auto relative z-20">
            <div class="text-center max-w-2xl mx-auto mb-8">
                <span class="text-xs font-bold uppercase tracking-wider text-red-800 bg-red-100 px-3 py-1 rounded-full">
                    Benefit Anggota
                </span>
                <h2 class="serif-title text-3xl font-bold text-slate-900 mt-3">Apa yang Akan Kamu Pelajari di HIMSI?</h2>
                <p class="text-slate-600 text-sm mt-2">
                    Asah keterampilan teknis dan akademis di bidang IT. <span class="font-semibold text-himsiMaroon">Klik kartu untuk mencoba fitur UI/UX Interactive Sandbox!</span>
                </p>
            </div>

            <!-- SEARCH BAR & FILTER TABS -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
                <!-- Tab Categories -->
                <div class="flex flex-wrap justify-center gap-2" id="benefitFilterTabs">
                    <button onclick="filterBenefit('all')" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition bg-himsiMaroon text-white shadow-sm" data-category="all">Semua Materi</button>
                    <button onclick="filterBenefit('software')" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition bg-white text-slate-600 border border-slate-200 hover:bg-slate-100" data-category="software">Software Eng.</button>
                    <button onclick="filterBenefit('data')" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition bg-white text-slate-600 border border-slate-200 hover:bg-slate-100" data-category="data">Data & AI</button>
                    <button onclick="filterBenefit('infra')" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition bg-white text-slate-600 border border-slate-200 hover:bg-slate-100" data-category="infra">Design & Infra</button>
                </div>

                <!-- Live Search Bar -->
                <div class="relative w-full md:w-64">
                    <input type="text" id="searchBenefitInput" onkeyup="cariBenefit()" placeholder="Cari materi atau tools..." class="w-full text-xs pl-9 pr-4 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:border-himsiMaroon bg-white shadow-sm">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                </div>
            </div>

            <!-- CARDS GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="benefitGrid">
                <!-- Card 1 -->
                <div onclick="bukaModalBenefit('pemrograman')" class="benefit-card bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group flex flex-col justify-between" data-category="software" data-title="dasar pemrograman python c++ javascript vs code">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold group-hover:bg-himsiMaroon group-hover:text-white transition">💻</div>
                            <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200">Beginner</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Dasar Pemrograman</h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-3">Logika algoritma, pemecahan masalah, dan dasar penulisan kode sintaks.</p>
                    </div>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform mt-2">Lihat Silabus & Sandbox &rarr;</span>
                </div>

                <!-- Card 2 -->
                <div onclick="bukaModalBenefit('erp')" class="benefit-card bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group flex flex-col justify-between" data-category="software" data-title="fundamental erp odoo sap draw.io">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold group-hover:bg-himsiMaroon group-hover:text-white transition">⚙️</div>
                            <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-md bg-sky-50 text-sky-700 border border-sky-200">Intermediate</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Fundamental ERP</h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-3">Pemahaman sistem perencanaan sumber daya perusahaan terintegrasi.</p>
                    </div>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform mt-2">Lihat Silabus & Sandbox &rarr;</span>
                </div>

                <!-- Card 3 -->
                <div onclick="bukaModalBenefit('database')" class="benefit-card bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group flex flex-col justify-between" data-category="software" data-title="konsep basis data mysql postgresql phpmyadmin">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold group-hover:bg-himsiMaroon group-hover:text-white transition">🗄️</div>
                            <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200">Beginner</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Konsep Basis Data</h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-3">Perancangan, manipulasi data (SQL), dan pengelolaan sistem database.</p>
                    </div>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform mt-2">Lihat Silabus & Sandbox &rarr;</span>
                </div>

                <!-- Card 4 -->
                <div onclick="bukaModalBenefit('jaringan')" class="benefit-card bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group flex flex-col justify-between" data-category="infra" data-title="fundamental jaringan cisco packet tracer wireshark">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold group-hover:bg-himsiMaroon group-hover:text-white transition">🌐</div>
                            <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-md bg-sky-50 text-sky-700 border border-sky-200">Intermediate</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Fundamental Jaringan</h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-3">Konsep LAN/WAN, IP addressing, komunikasi data, dan infrastruktur IT.</p>
                    </div>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform mt-2">Lihat Silabus & Sandbox &rarr;</span>
                </div>

                <!-- Card 5 -->
                <div onclick="bukaModalBenefit('datascience')" class="benefit-card bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group flex flex-col justify-between" data-category="data" data-title="data science python pandas matplotlib jupyter">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold group-hover:bg-himsiMaroon group-hover:text-white transition">📊</div>
                            <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-md bg-sky-50 text-sky-700 border border-sky-200">Intermediate</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Data Science</h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-3">Pengolahan data, analisis statistik, visualisasi data, dan pola tren.</p>
                    </div>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform mt-2">Lihat Silabus & Sandbox &rarr;</span>
                </div>

                <!-- Card 6 -->
                <div onclick="bukaModalBenefit('uiux')" class="benefit-card bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group flex flex-col justify-between" data-category="infra" data-title="design ui/ux figma whimsical color hunt">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold group-hover:bg-himsiMaroon group-hover:text-white transition">🎨</div>
                            <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200">Beginner</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Design UI/UX</h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-3">Perancangan antarmuka aplikasi intuitif dan riset pengalaman pengguna.</p>
                    </div>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform mt-2">Lihat Silabus & Sandbox &rarr;</span>
                </div>

                <!-- Card 7 -->
                <div onclick="bukaModalBenefit('machinelearning')" class="benefit-card bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group flex flex-col justify-between" data-category="data" data-title="machine learning python scikit-learn google colab ai">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold group-hover:bg-himsiMaroon group-hover:text-white transition">🤖</div>
                            <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-md bg-amber-50 text-amber-700 border border-amber-200">Advanced</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Machine Learning</h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-3">Konsep model kecerdasan buatan dan pemrosesan data otomatis.</p>
                    </div>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform mt-2">Lihat Silabus & Sandbox &rarr;</span>
                </div>

                <!-- Card 8 -->
                <div onclick="bukaModalBenefit('cybersecurity')" class="benefit-card bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 cursor-pointer group flex flex-col justify-between" data-category="infra" data-title="keamanan siber kali linux burp suite nmap cybersecurity">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-12 h-12 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-2xl font-bold group-hover:bg-himsiMaroon group-hover:text-white transition">🛡️</div>
                            <span class="text-[10px] font-extrabold px-2.5 py-1 rounded-md bg-amber-50 text-amber-700 border border-amber-200">Advanced</span>
                        </div>
                        <h3 class="font-bold text-slate-900 text-base mb-1 group-hover:text-himsiMaroon transition">Keamanan Siber</h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-3">Prinsip perlindungan data, kesadaran celah keamanan, dan etika IT.</p>
                    </div>
                    <span class="text-[11px] font-bold text-himsiMaroon flex items-center gap-1 group-hover:translate-x-1 transition-transform mt-2">Lihat Silabus & Sandbox &rarr;</span>
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

    <!-- MODAL POPUP: FOTO PROFIL PIMPINAN -->
    <div id="pimpinanModal" class="fixed inset-0 bg-black/75 z-[100] hidden items-center justify-center p-4 backdrop-blur-md" onclick="tutupModalPimpinan(event)">
        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-[90vw] sm:max-w-lg md:max-w-2xl text-center relative transform transition-all" id="pimpinanModalContent">
            <button onclick="tutupModalPimpinanDirect()" class="absolute top-4 right-5 md:top-6 md:right-7 text-gray-400 hover:text-red-600 transition text-3xl md:text-4xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <img id="pimpinanImg" src="" alt="Foto Pimpinan" class="w-80 h-80 md:w-[480px] md:h-[480px] rounded-full object-cover border-4 md:border-8 border-[#d4af37] mx-auto mb-6 shadow-2xl bg-gray-100">
            <h3 id="pimpinanNama" class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight">Nama</h3>
            <p id="pimpinanJabatan" class="text-sm sm:text-base md:text-lg font-bold text-red-900 bg-red-100 py-2 px-6 rounded-full inline-block mt-3 tracking-wide">Jabatan</p>
        </div>
    </div>

    <!-- MODAL POPUP: DETAIL BENEFIT ANGGOTA & INTERACTIVE SANDBOX -->
    <div id="benefitModal" class="fixed inset-0 bg-black/80 z-[90] hidden items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl overflow-hidden w-full max-w-2xl shadow-2xl border border-slate-200 flex flex-col relative transform transition-all">
            <!-- Header Modal -->
            <div class="px-6 py-4 bg-himsiMaroon text-white flex justify-between items-center relative">
                <div class="flex items-center gap-3">
                    <span id="benefitIcon" class="text-3xl">💻</span>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 id="benefitJudul" class="font-bold text-lg md:text-xl leading-tight">Detail Pembelajaran</h3>
                            <span id="benefitLevelBadge" class="text-[10px] font-extrabold px-2.5 py-0.5 rounded-md"></span>
                        </div>
                        <p class="text-xs text-slate-200 mt-0.5">Silabus, Roadmap, & UI/UX Interactive Sandbox</p>
                    </div>
                </div>
                <button onclick="tutupModalBenefit()" class="text-white/80 hover:text-white text-3xl font-bold px-2 leading-none transition">&times;</button>
            </div>

            <!-- Tab Buttons dalam Modal -->
            <div class="bg-slate-100 border-b border-slate-200 px-6 pt-3 flex gap-4 text-xs font-bold">
                <button id="modalTabSilabus" onclick="switchModalTab('silabus')" class="pb-3 border-b-2 border-himsiMaroon text-himsiMaroon flex items-center gap-1.5 transition">
                    <i class="fa-solid fa-book-open"></i> Silabus & Roadmap
                </button>
                <button id="modalTabSandbox" onclick="switchModalTab('sandbox')" class="pb-3 border-b-2 border-transparent text-slate-500 hover:text-slate-800 flex items-center gap-1.5 transition">
                    <i class="fa-solid fa-gamepad"></i> Interactive Sandbox 🎮
                </button>
            </div>

            <!-- Body Modal -->
            <div class="p-6 overflow-y-auto max-h-[65vh] text-sm text-slate-700">
                <!-- TAB 1: SILABUS & ROADMAP -->
                <div id="modalContentSilabus" class="space-y-6">
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
                        <h4 class="font-bold text-slate-900 mb-3 flex items-center gap-2">
                            <i class="fa-solid fa-route text-himsiMaroon"></i> Roadmap Belajar 4 Minggu
                        </h4>
                        <div id="benefitRoadmap" class="space-y-3 relative border-l-2 border-red-200 ml-3 pl-4"></div>
                    </div>

                    <div class="bg-amber-50 p-4 rounded-2xl border border-amber-200">
                        <h4 class="font-bold text-amber-900 mb-1 flex items-center gap-2 text-xs sm:text-sm">
                            <i class="fa-solid fa-trophy text-amber-600"></i> Target Output Proyek
                        </h4>
                        <p id="benefitOutput" class="text-xs sm:text-sm text-amber-800 font-medium"></p>
                    </div>
                </div>

                <!-- TAB 2: INTERACTIVE SANDBOX -->
                <div id="modalContentSandbox" class="hidden">
                    <div id="sandboxContainer" class="bg-slate-900 text-white rounded-2xl p-5 border border-slate-700 shadow-inner">
                        <!-- Dynamic Content Sandbox akan di-render di sini via JS -->
                    </div>
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
        let activeBenefitKey = '';

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

        // --- FILTER & SEARCH BENEFIT CARDS ---
        function filterBenefit(category) {
            const cards = document.querySelectorAll('.benefit-card');
            const buttons = document.querySelectorAll('#benefitFilterTabs .tab-btn');

            buttons.forEach(btn => {
                if (btn.getAttribute('data-category') === category) {
                    btn.className = 'tab-btn px-4 py-2 rounded-xl text-xs font-bold transition bg-himsiMaroon text-white shadow-sm';
                } else {
                    btn.className = 'tab-btn px-4 py-2 rounded-xl text-xs font-bold transition bg-white text-slate-600 border border-slate-200 hover:bg-slate-100';
                }
            });

            cards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        function cariBenefit() {
            const input = document.getElementById('searchBenefitInput').value.toLowerCase();
            const cards = document.querySelectorAll('.benefit-card');

            cards.forEach(card => {
                const titleData = card.getAttribute('data-title').toLowerCase();
                if (titleData.includes(input)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        // --- DATABASE INTERAKTIF BENEFIT ANGGOTA ---
        const databaseBenefit = {
            'pemrograman': {
                judul: 'Dasar Pemrograman',
                ikon: '💻',
                level: 'Beginner',
                levelBg: 'bg-emerald-50 text-emerald-700 border-emerald-200',
                deskripsi: 'Mempelajari logika algoritma dan pemecahan masalah (problem solving) sebagai pondasi awal yang krusial bagi Mahasiswa Sistem Informasi.',
                kegiatan: '💡 4x Sesi Workshop & Mentoring Kode 1-on-1',
                tools: ['Python', 'C++', 'JavaScript', 'VS Code'],
                roadmap: [
                    'Pengenalan Logika Algoritma & Konsep Variabel Dasar',
                    'Pengondisian (If-Else) & Perulangan (Looping)',
                    'Fungsi, Array, & Error Handling Praktis',
                    'Mini Project: Kalkulator & Aplikasi Konsol Interaktif'
                ],
                output: 'Aplikasi Manajemen Data Sederhana Berbasis Konsol / Terminal.'
            },
            'erp': {
                judul: 'Fundamental ERP',
                ikon: '⚙️',
                level: 'Intermediate',
                levelBg: 'bg-sky-50 text-sky-700 border-sky-200',
                deskripsi: 'Memahami bagaimana sistem Enterprise Resource Planning (ERP) mengintegrasikan seluruh alur bisnis perusahaan secara terpusat.',
                kegiatan: '🏬 Study Case Alur Bisnis Perusahaan Digital',
                tools: ['Odoo', 'SAP Basic Concept', 'Draw.io'],
                roadmap: [
                    'Konsep Dasar & Pentingnya ERP di Industri Digital',
                    'Modul Sales, Purchase, & Manajemen Inventory',
                    'Modul Human Resource & Accounting System',
                    'Simulasi Transaksi Alur Bisnis Terintegrasi'
                ],
                output: 'Pemetaan Blueprint & Konfigurasi Sistem Bisnis ERP.'
            },
            'database': {
                judul: 'Konsep Basis Data',
                ikon: '🗄️',
                level: 'Beginner',
                levelBg: 'bg-emerald-50 text-emerald-700 border-emerald-200',
                deskripsi: 'Merancang dan mengelola penyimpanan data yang aman, terstruktur, serta efisien untuk kebutuhan aplikasi modern.',
                kegiatan: '📊 Praktikum Live SQL Query & Database Design',
                tools: ['MySQL', 'PostgreSQL', 'phpMyAdmin'],
                roadmap: [
                    'Perancangan ERD (Entity Relationship Diagram)',
                    'Normalisasi Data & DDL (Data Definition Language)',
                    'DML Query (SELECT, INSERT, UPDATE, JOIN)',
                    'Database Security & Backup Strategy'
                ],
                output: 'Rancangan Struktur Database Lengkap Siap Pakai.'
            },
            'jaringan': {
                judul: 'Fundamental Jaringan',
                ikon: '🌐',
                level: 'Intermediate',
                levelBg: 'bg-sky-50 text-sky-700 border-sky-200',
                deskripsi: 'Memahami arsitektur komunikasi data, infrastruktur LAN/WAN, IP Addressing, serta protokol jaringan internet.',
                kegiatan: '🔌 Simulasi Topologi & Konfigurasi Jaringan',
                tools: ['Cisco Packet Tracer', 'Wireshark'],
                roadmap: [
                    'Model OSI Layer & Protokol TCP/IP',
                    'Subnetting & Pengalamatan IP Address',
                    'Perancangan Topologi Jaringan Komputer',
                    'Troubleshooting & Pengujian Koneksi'
                ],
                output: 'Simulasi Topologi Jaringan Komputer Perusahaan.'
            },
            'datascience': {
                judul: 'Data Science',
                ikon: '📊',
                level: 'Intermediate',
                levelBg: 'bg-sky-50 text-sky-700 border-sky-200',
                deskripsi: 'Mengolah data mentah menjadi wawasan bisnis (insight) yang berharga menggunakan teknik statistik dan visualisasi.',
                kegiatan: '📈 Olah Data Publik & Visualisasi Grafik Interaktif',
                tools: ['Python', 'Pandas', 'Matplotlib', 'Jupyter Notebook'],
                roadmap: [
                    'Pengenalan Data Science & Python for Data Analysis',
                    'Data Cleaning & Preprocessing Data Mentah',
                    'Exploratory Data Analysis (EDA)',
                    'Visualisasi Dashboard Insight Interaktif'
                ],
                output: 'Laporan Analisis Data & Dashboard Insight Interaktif.'
            },
            'uiux': {
                judul: 'Design UI/UX',
                ikon: '🎨',
                level: 'Beginner',
                levelBg: 'bg-emerald-50 text-emerald-700 border-emerald-200',
                deskripsi: 'Merancang antarmuka aplikasi yang menarik (UI) dan pengalaman pengguna yang nyaman (UX) berbasis riset.',
                kegiatan: '🎨 Mentoring Desain & Usability Testing',
                tools: ['Figma', 'Whimsical', 'Color Hunt'],
                roadmap: [
                    'User Research & Wireframing Low-Fidelity',
                    'UI Design System & Component Guidelines',
                    'High-Fidelity Design & Prototyping Interaktif',
                    'Usability Testing & Design Review'
                ],
                output: 'Prototype Aplikasi Mobile / Web Interaktif Siap Uji.'
            },
            'machinelearning': {
                judul: 'Machine Learning',
                ikon: '🤖',
                level: 'Advanced',
                levelBg: 'bg-amber-50 text-amber-700 border-amber-200',
                deskripsi: 'Mempelajari konsep awal kecerdasan buatan (AI) agar komputer mampu memprediksi dan belajar dari pola data.',
                kegiatan: '🧠 Pelatihan Model Prediksi Sederhana',
                tools: ['Python', 'Scikit-Learn', 'Google Colab'],
                roadmap: [
                    'Konsep dasar AI vs Machine Learning',
                    'Supervised vs Unsupervised Learning',
                    'Pembuatan Model Regresi / Klasifikasi Data',
                    'Evaluasi Akurasi & Pengujian Model AI'
                ],
                output: 'Model AI Prediksi Sederhana Berbasis Python.'
            },
            'cybersecurity': {
                judul: 'Keamanan Siber',
                ikon: '🛡️',
                level: 'Advanced',
                levelBg: 'bg-amber-50 text-amber-700 border-amber-200',
                deskripsi: 'Menanamkan kesadaran etika IT, menganalisis celah keamanan sistem, serta prinsip dasar perlindungan data.',
                kegiatan: '🔐 Hands-on Analisis Celah Keamanan Dasar',
                tools: ['Kali Linux Basic', 'Burp Suite', 'Nmap'],
                roadmap: [
                    'Prinsip Dasar Information Security (CIA Triad)',
                    'Menganalisis Potensi Kerentanan Web (OWASP Top 10)',
                    'Konsep Enkripsi & Perlindungan Password',
                    'Best Practices Hardening System & Etika IT'
                ],
                output: 'Laporan Audit & Rekomendasi Keamanan Sistem.'
            }
        };

        // --- FUNGSI TAB IN-MODAL (SILABUS VS SANDBOX) ---
        function switchModalTab(tab) {
            const btnSilabus = document.getElementById('modalTabSilabus');
            const btnSandbox = document.getElementById('modalTabSandbox');
            const contentSilabus = document.getElementById('modalContentSilabus');
            const contentSandbox = document.getElementById('modalContentSandbox');

            if (tab === 'silabus') {
                btnSilabus.className = 'pb-3 border-b-2 border-himsiMaroon text-himsiMaroon flex items-center gap-1.5 transition font-bold';
                btnSandbox.className = 'pb-3 border-b-2 border-transparent text-slate-500 hover:text-slate-800 flex items-center gap-1.5 transition font-bold';
                contentSilabus.classList.remove('hidden');
                contentSandbox.classList.add('hidden');
            } else {
                btnSandbox.className = 'pb-3 border-b-2 border-himsiMaroon text-himsiMaroon flex items-center gap-1.5 transition font-bold';
                btnSilabus.className = 'pb-3 border-b-2 border-transparent text-slate-500 hover:text-slate-800 flex items-center gap-1.5 transition font-bold';
                contentSandbox.classList.remove('hidden');
                contentSilabus.classList.add('hidden');
                renderInteractiveSandbox(activeBenefitKey);
            }
        }

        // --- RENDER INTERACTIVE SANDBOX BY BENEFIT KEY ---
        function renderInteractiveSandbox(key) {
            const container = document.getElementById('sandboxContainer');

            if (key === 'pemrograman') {
                container.innerHTML = `
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b border-slate-700 pb-2">
                            <span class="text-xs font-bold text-amber-400 flex items-center gap-1.5"><i class="fa-solid fa-code"></i> Live Code Playground</span>
                            <select id="codePreset" onchange="runCodePreset()" class="bg-slate-800 text-xs text-slate-200 border border-slate-600 rounded-lg px-2.5 py-1 focus:outline-none">
                                <option value="hello">Hello HIMSI</option>
                                <option value="logic">If-Else Logic</option>
                                <option value="loop">Looping Statement</option>
                            </select>
                        </div>
                        <div class="bg-slate-950 p-3 rounded-xl border border-slate-800 font-mono text-xs text-sky-300">
                            <pre id="codeEditorDisplay">print("Halo, Selamat Datang di HIMSI UNIS!")</pre>
                        </div>
                        <button onclick="runCodePreset()" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs py-2.5 rounded-xl transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-play"></i> Jalankan Kode (Run)
                        </button>
                        <div class="bg-black/80 p-3 rounded-xl border border-slate-800 text-xs font-mono">
                            <span class="text-slate-500 block mb-1 text-[10px] uppercase tracking-wider">Console Output:</span>
                            <div id="codeConsoleOutput" class="text-emerald-400 font-semibold">> Halo, Selamat Datang di HIMSI UNIS!</div>
                        </div>
                    </div>
                `;
            } else if (key === 'erp') {
                container.innerHTML = `
                    <div class="space-y-4 text-xs">
                        <div class="border-b border-slate-700 pb-2 flex justify-between items-center">
                            <span class="font-bold text-amber-400"><i class="fa-solid fa-network-wired"></i> ERP Business Process Simulator</span>
                            <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-0.5 rounded">Odoo Module Workflow</span>
                        </div>
                        <p class="text-slate-300 text-[11px]">Klik tahapan bisnis untuk melihat integrasi modul ERP secara otomatis:</p>
                        <div class="grid grid-cols-3 gap-2 text-center font-bold">
                            <button onclick="updateErpSim(1)" id="erpBtn1" class="p-2.5 rounded-xl border border-amber-400 bg-amber-400/20 text-amber-300">1. Order Masuk</button>
                            <button onclick="updateErpSim(2)" id="erpBtn2" class="p-2.5 rounded-xl border border-slate-700 bg-slate-800 text-slate-400">2. Cek Stok</button>
                            <button onclick="updateErpSim(3)" id="erpBtn3" class="p-2.5 rounded-xl border border-slate-700 bg-slate-800 text-slate-400">3. Invoice</button>
                        </div>
                        <div class="bg-slate-950 p-3.5 rounded-xl border border-slate-800 space-y-1.5" id="erpSimOutput">
                            <div class="text-amber-400 font-bold">▶ Status: Sales Order Created</div>
                            <div class="text-slate-400 text-[11px]">Modul CRM mencatat pesanan baru dari pelanggan. Siap diverifikasi oleh modul persediaan.</div>
                        </div>
                    </div>
                `;
            } else if (key === 'database') {
                container.innerHTML = `
                    <div class="space-y-3 text-xs">
                        <div class="border-b border-slate-700 pb-2 flex justify-between items-center">
                            <span class="font-bold text-amber-400"><i class="fa-solid fa-database"></i> Visual SQL Playground</span>
                            <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-0.5 rounded">MySQL Filter</span>
                        </div>
                        <div class="bg-slate-950 p-2.5 rounded-xl font-mono text-[11px] text-sky-300 border border-slate-800">
                            SELECT * FROM mahasiswa <span id="sqlFilterText">WHERE ipk >= 3.5</span>;
                        </div>
                        <div class="flex gap-2">
                            <button onclick="filterSqlDemo('all')" class="bg-slate-800 hover:bg-slate-700 text-white px-3 py-1.5 rounded-lg text-[11px] font-bold">Semua</button>
                            <button onclick="filterSqlDemo('cumlaude')" class="bg-slate-800 hover:bg-slate-700 text-amber-400 px-3 py-1.5 rounded-lg text-[11px] font-bold">IPK >= 3.5</button>
                            <button onclick="filterSqlDemo('ang2026')" class="bg-slate-800 hover:bg-slate-700 text-sky-400 px-3 py-1.5 rounded-lg text-[11px] font-bold">Angkatan 2026</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-[11px] border-collapse">
                                <thead>
                                    <tr class="bg-slate-800 text-slate-300">
                                        <th class="p-2">NPM</th>
                                        <th class="p-2">Nama</th>
                                        <th class="p-2">IPK</th>
                                        <th class="p-2">Angkatan</th>
                                    </tr>
                                </thead>
                                <tbody id="sqlTableBody" class="divide-y divide-slate-800 text-slate-200">
                                    <tr><td class="p-2">26001</td><td class="p-2">Rafli F</td><td class="p-2 text-amber-400 font-bold">3.85</td><td class="p-2">2026</td></tr>
                                    <tr><td class="p-2">26002</td><td class="p-2">Neyna C</td><td class="p-2 text-amber-400 font-bold">3.90</td><td class="p-2">2026</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                `;
            } else if (key === 'jaringan') {
                container.innerHTML = `
                    <div class="space-y-4 text-xs">
                        <div class="border-b border-slate-700 pb-2 flex justify-between items-center">
                            <span class="font-bold text-amber-400"><i class="fa-solid fa-network-wired"></i> Packet Ping Simulator</span>
                            <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-0.5 rounded">ICMP Protocol</span>
                        </div>
                        <div class="flex items-center justify-between bg-slate-950 p-4 rounded-xl border border-slate-800 relative">
                            <div class="text-center">
                                <div class="w-10 h-10 bg-sky-600 rounded-full flex items-center justify-center text-lg mx-auto mb-1">💻</div>
                                <span class="text-[10px] block font-bold">Client PC</span>
                                <span class="text-[9px] text-slate-400">192.168.1.10</span>
                            </div>
                            <div class="flex-1 px-4 text-center relative">
                                <div class="h-1 bg-slate-700 w-full rounded relative overflow-hidden">
                                    <div id="pingPacket" class="h-full w-1/3 bg-emerald-400 rounded transition-all duration-700 translate-x-0 opacity-0"></div>
                                </div>
                                <span id="pingStatus" class="text-[10px] text-slate-400 block mt-2 font-mono">Status: Idle</span>
                            </div>
                            <div class="text-center">
                                <div class="w-10 h-10 bg-himsiMaroon rounded-full flex items-center justify-center text-lg mx-auto mb-1">🖥️</div>
                                <span class="text-[10px] block font-bold">HIMSI Server</span>
                                <span class="text-[9px] text-slate-400">34.9.82.228</span>
                            </div>
                        </div>
                        <button onclick="runPingSim()" class="w-full bg-sky-600 hover:bg-sky-500 text-white font-bold text-xs py-2.5 rounded-xl transition">
                            <i class="fa-solid fa-paper-plane"></i> Send Ping Packet
                        </button>
                    </div>
                `;
            } else if (key === 'datascience') {
                container.innerHTML = `
                    <div class="space-y-4 text-xs">
                        <div class="border-b border-slate-700 pb-2 flex justify-between items-center">
                            <span class="font-bold text-amber-400"><i class="fa-solid fa-chart-simple"></i> Live Chart Generator</span>
                            <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-0.5 rounded">Pandas & Matplotlib</span>
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 mb-1">Ubah Aktivitas Belajar (Jam/Minggu): <span id="chartValText" class="font-bold text-amber-400">20 Jam</span></label>
                            <input type="range" id="chartRangeInput" min="5" max="40" value="20" oninput="updateChartSim(this.value)" class="w-full accent-himsiMaroon cursor-pointer">
                        </div>
                        <div class="bg-slate-950 p-4 rounded-xl border border-slate-800">
                            <span class="text-[10px] text-slate-400 block mb-2 font-mono">ESTIMASI SKILL SCORE:</span>
                            <div class="w-full bg-slate-800 h-6 rounded-lg overflow-hidden p-0.5">
                                <div id="chartBarOutput" class="bg-gradient-to-r from-amber-500 to-emerald-400 h-full rounded-md transition-all duration-300 flex items-center justify-end pr-2 text-[10px] font-bold text-slate-900" style="w-60%">60 Pts</div>
                            </div>
                        </div>
                    </div>
                `;
            } else if (key === 'uiux') {
                container.innerHTML = `
                    <div class="space-y-4 text-xs">
                        <div class="border-b border-slate-700 pb-2 flex justify-between items-center">
                            <span class="font-bold text-amber-400"><i class="fa-solid fa-palette"></i> Live Design System Styler</span>
                            <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-0.5 rounded">Figma Interactive</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[10px] text-slate-300 mb-1">Warna Utama Button:</label>
                                <select onchange="updateUiTheme('color', this.value)" class="w-full bg-slate-800 text-xs text-white border border-slate-700 rounded-lg p-1.5 focus:outline-none">
                                    <option value="bg-himsiMaroon">HIMSI Maroon</option>
                                    <option value="bg-sky-600">Sky Blue</option>
                                    <option value="bg-emerald-600">Emerald Green</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] text-slate-300 mb-1">Border Radius:</label>
                                <select onchange="updateUiTheme('radius', this.value)" class="w-full bg-slate-800 text-xs text-white border border-slate-700 rounded-lg p-1.5 focus:outline-none">
                                    <option value="rounded-xl">Rounded XL</option>
                                    <option value="rounded-full">Pill / Full</option>
                                    <option value="rounded-none">Square / Sharp</option>
                                </select>
                            </div>
                        </div>
                        <div class="bg-slate-950 p-6 rounded-xl border border-slate-800 flex items-center justify-center">
                            <button id="uiPreviewBtn" class="bg-himsiMaroon rounded-xl text-white font-bold px-6 py-3 shadow-lg transition transform hover:scale-105">
                                Preview Interactive Button ✨
                            </button>
                        </div>
                    </div>
                `;
            } else if (key === 'machinelearning') {
                container.innerHTML = `
                    <div class="space-y-4 text-xs">
                        <div class="border-b border-slate-700 pb-2 flex justify-between items-center">
                            <span class="font-bold text-amber-400"><i class="fa-solid fa-brain"></i> ML Grade Predictor</span>
                            <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-0.5 rounded">Regression Model</span>
                        </div>
                        <div class="space-y-2">
                            <div>
                                <label class="block text-[10px] text-slate-300">Kehadiran Perkuliahan: <span id="mlValAtt" class="text-amber-400 font-bold">90%</span></label>
                                <input type="range" min="50" max="100" value="90" oninput="updateMlPredict()" id="mlInputAtt" class="w-full accent-himsiMaroon cursor-pointer">
                            </div>
                            <div>
                                <label class="block text-[10px] text-slate-300">Skor Tugas & Praktikum: <span id="mlValTask" class="text-amber-400 font-bold">85</span></label>
                                <input type="range" min="40" max="100" value="85" oninput="updateMlPredict()" id="mlInputTask" class="w-full accent-himsiMaroon cursor-pointer">
                            </div>
                        </div>
                        <div class="bg-slate-950 p-4 rounded-xl border border-slate-800 text-center">
                            <span class="text-[10px] text-slate-400 block mb-1">PREDIKSI NILAI AKHIR MAHASISWA:</span>
                            <span id="mlOutputGrade" class="text-3xl font-extrabold text-emerald-400 block">A (88.5)</span>
                            <span class="text-[9px] text-slate-500 mt-1 block">Akurasi Model ML: 96.4%</span>
                        </div>
                    </div>
                `;
            } else if (key === 'cybersecurity') {
                container.innerHTML = `
                    <div class="space-y-3 text-xs">
                        <div class="border-b border-slate-700 pb-2 flex justify-between items-center">
                            <span class="font-bold text-amber-400"><i class="fa-solid fa-shield-halved"></i> Password Strength & Hash Analyzer</span>
                            <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-0.5 rounded">SHA-256</span>
                        </div>
                        <input type="text" id="pwdInput" onkeyup="analyzePwd(this.value)" placeholder="Ketik kata sandi untuk diuji..." class="w-full bg-slate-950 text-xs border border-slate-700 rounded-xl px-3 py-2 text-white focus:outline-none focus:border-amber-400">
                        <div class="bg-slate-950 p-3 rounded-xl border border-slate-800 space-y-2">
                            <div class="flex justify-between items-center text-[11px]">
                                <span>Kekuatan Sandi:</span>
                                <span id="pwdScoreText" class="font-bold text-slate-400">Lakukan pengetikan...</span>
                            </div>
                            <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                                <div id="pwdBar" class="h-full w-0 bg-red-500 transition-all duration-300"></div>
                            </div>
                            <div class="text-[10px] font-mono text-slate-400 break-all pt-1 border-t border-slate-800">
                                <span class="text-amber-400 block font-sans font-bold">SHA-256 Hash:</span>
                                <span id="pwdHash">e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855</span>
                            </div>
                        </div>
                    </div>
                `;
            }
        }

        // --- INTERACTIVE HANDLERS FOR SANDBOX ---
        function runCodePreset() {
            const preset = document.getElementById('codePreset').value;
            const editor = document.getElementById('codeEditorDisplay');
            const consoleOut = document.getElementById('codeConsoleOutput');

            if (preset === 'hello') {
                editor.textContent = 'print("Halo, Selamat Datang di HIMSI UNIS!")';
                consoleOut.textContent = '> Halo, Selamat Datang di HIMSI UNIS!';
            } else if (preset === 'logic') {
                editor.textContent = 'nilai = 85\nif nilai >= 75:\n    print("Status: LULUS Sempurna!")';
                consoleOut.textContent = '> Status: LULUS Sempurna!';
            } else if (preset === 'loop') {
                editor.textContent = 'for i in range(1, 4):\n    print(f"Sesi Belajar HIMSI Ke-{i}")';
                consoleOut.textContent = '> Sesi Belajar HIMSI Ke-1\n> Sesi Belajar HIMSI Ke-2\n> Sesi Belajar HIMSI Ke-3';
            }
        }

        function updateErpSim(step) {
            const btn1 = document.getElementById('erpBtn1');
            const btn2 = document.getElementById('erpBtn2');
            const btn3 = document.getElementById('erpBtn3');
            const output = document.getElementById('erpSimOutput');

            [btn1, btn2, btn3].forEach(btn => btn.className = 'p-2.5 rounded-xl border border-slate-700 bg-slate-800 text-slate-400');

            if (step === 1) {
                btn1.className = 'p-2.5 rounded-xl border border-amber-400 bg-amber-400/20 text-amber-300 font-bold';
                output.innerHTML = '<div class="text-amber-400 font-bold">▶ Status: Sales Order Created</div><div class="text-slate-400 text-[11px]">Modul CRM mencatat pesanan baru dari pelanggan. Siap diverifikasi oleh modul persediaan.</div>';
            } else if (step === 2) {
                btn2.className = 'p-2.5 rounded-xl border border-amber-400 bg-amber-400/20 text-amber-300 font-bold';
                output.innerHTML = '<div class="text-sky-400 font-bold">▶ Status: Inventory Reserved</div><div class="text-slate-400 text-[11px]">Modul Stok otomatis mengurangi stok gudang & menyiapkan alur pengiriman barang.</div>';
            } else if (step === 3) {
                btn3.className = 'p-2.5 rounded-xl border border-emerald-400 bg-emerald-400/20 text-emerald-300 font-bold';
                output.innerHTML = '<div class="text-emerald-400 font-bold">▶ Status: Invoice Generated & Paid</div><div class="text-slate-400 text-[11px]">Modul Keuangan membuat faktur tagihan dan memperbarui laporan kas perusahaan.</div>';
            }
        }

        function filterSqlDemo(type) {
            const txt = document.getElementById('sqlFilterText');
            const body = document.getElementById('sqlTableBody');

            if (type === 'all') {
                txt.textContent = '';
                body.innerHTML = `
                    <tr><td class="p-2">26001</td><td class="p-2">Rafli F</td><td class="p-2 text-amber-400 font-bold">3.85</td><td class="p-2">2026</td></tr>
                    <tr><td class="p-2">26002</td><td class="p-2">Neyna C</td><td class="p-2 text-amber-400 font-bold">3.90</td><td class="p-2">2026</td></tr>
                    <tr><td class="p-2">25010</td><td class="p-2">Budi S</td><td class="p-2 text-slate-300">3.20</td><td class="p-2">2025</td></tr>
                `;
            } else if (type === 'cumlaude') {
                txt.textContent = 'WHERE ipk >= 3.5';
                body.innerHTML = `
                    <tr><td class="p-2">26001</td><td class="p-2">Rafli F</td><td class="p-2 text-amber-400 font-bold">3.85</td><td class="p-2">2026</td></tr>
                    <tr><td class="p-2">26002</td><td class="p-2">Neyna C</td><td class="p-2 text-amber-400 font-bold">3.90</td><td class="p-2">2026</td></tr>
                `;
            } else if (type === 'ang2026') {
                txt.textContent = "WHERE angkatan = '2026'";
                body.innerHTML = `
                    <tr><td class="p-2">26001</td><td class="p-2">Rafli F</td><td class="p-2 text-amber-400 font-bold">3.85</td><td class="p-2">2026</td></tr>
                    <tr><td class="p-2">26002</td><td class="p-2">Neyna C</td><td class="p-2 text-amber-400 font-bold">3.90</td><td class="p-2">2026</td></tr>
                `;
            }
        }

        function runPingSim() {
            const packet = document.getElementById('pingPacket');
            const status = document.getElementById('pingStatus');

            status.textContent = 'Status: Sending ICMP Request...';
            status.className = 'text-[10px] text-amber-400 block mt-2 font-mono';
            packet.className = 'h-full w-1/3 bg-amber-400 rounded transition-all duration-700 opacity-100 translate-x-full';

            setTimeout(() => {
                packet.className = 'h-full w-1/3 bg-emerald-400 rounded transition-all duration-700 opacity-100 translate-x-0';
                status.textContent = 'Status: Reply from 34.9.82.228: bytes=32 time=12ms TTL=56';
                status.className = 'text-[10px] text-emerald-400 block mt-2 font-mono font-bold';
            }, 750);
        }

        function updateChartSim(val) {
            document.getElementById('chartValText').textContent = val + ' Jam';
            const bar = document.getElementById('chartBarOutput');
            const score = Math.min(100, Math.round(val * 2.4));
            bar.style.width = score + '%';
            bar.textContent = score + ' Pts';
        }

        function updateUiTheme(type, val) {
            const btn = document.getElementById('uiPreviewBtn');
            if (type === 'color') {
                btn.className = `${val} ${btn.className.split(' ').filter(c => !c.startsWith('bg-')).join(' ')}`;
            } else if (type === 'radius') {
                btn.className = `${val} ${btn.className.split(' ').filter(c => !c.startsWith('rounded-')).join(' ')}`;
            }
        }

        function updateMlPredict() {
            const att = parseInt(document.getElementById('mlInputAtt').value);
            const task = parseInt(document.getElementById('mlInputTask').value);

            document.getElementById('mlValAtt').textContent = att + '%';
            document.getElementById('mlValTask').textContent = task;

            const finalScore = (att * 0.3 + task * 0.7).toFixed(1);
            let letter = 'C';
            let color = 'text-amber-400';

            if (finalScore >= 85) { letter = 'A'; color = 'text-emerald-400'; }
            else if (finalScore >= 75) { letter = 'B'; color = 'text-sky-400'; }

            const out = document.getElementById('mlOutputGrade');
            out.textContent = `${letter} (${finalScore})`;
            out.className = `text-3xl font-extrabold ${color} block`;
        }

        function analyzePwd(val) {
            const bar = document.getElementById('pwdBar');
            const txt = document.getElementById('pwdScoreText');
            const hash = document.getElementById('pwdHash');

            if (!val) {
                bar.style.width = '0%';
                txt.textContent = 'Lakukan pengetikan...';
                txt.className = 'font-bold text-slate-400';
                hash.textContent = 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855';
                return;
            }

            let score = 0;
            if (val.length >= 6) score += 25;
            if (val.length >= 10) score += 25;
            if (/[A-Z]/.test(val)) score += 25;
            if (/[0-9!@#$%^&*]/.test(val)) score += 25;

            bar.style.width = score + '%';

            if (score <= 25) {
                bar.className = 'h-full bg-red-500 transition-all duration-300';
                txt.textContent = 'Sangat Lemah ⚠️';
                txt.className = 'font-bold text-red-400';
            } else if (score <= 50) {
                bar.className = 'h-full bg-amber-500 transition-all duration-300';
                txt.textContent = 'Sedang 🟡';
                txt.className = 'font-bold text-amber-400';
            } else if (score <= 75) {
                bar.className = 'h-full bg-sky-500 transition-all duration-300';
                txt.textContent = 'Kuat 🛡️';
                txt.className = 'font-bold text-sky-400';
            } else {
                bar.className = 'h-full bg-emerald-500 transition-all duration-300';
                txt.textContent = 'Sangat Aman 🔒';
                txt.className = 'font-bold text-emerald-400';
            }

            // Simple hash representation demo
            hash.textContent = Array.from(val).reduce((acc, char) => (acc + char.charCodeAt(0).toString(16)), '') + 'a8f9c210b3e';
        }

        // --- FUNGSI OPEN & CLOSE MODAL BENEFIT ---
        function bukaModalBenefit(key) {
            activeBenefitKey = key;
            const data = databaseBenefit[key];
            if (!data) return;

            document.getElementById('benefitIcon').textContent = data.ikon;
            document.getElementById('benefitJudul').textContent = data.judul;
            document.getElementById('benefitDeskripsi').textContent = data.deskripsi;
            document.getElementById('benefitKegiatan').textContent = data.kegiatan;
            document.getElementById('benefitOutput').textContent = data.output;

            // Render Level Badge
            const badge = document.getElementById('benefitLevelBadge');
            badge.textContent = data.level;
            badge.className = `text-[10px] font-extrabold px-2.5 py-0.5 rounded-md border ${data.levelBg}`;

            // Render Tools
            const toolsContainer = document.getElementById('benefitTools');
            toolsContainer.innerHTML = '';
            data.tools.forEach(tool => {
                const span = document.createElement('span');
                span.className = 'px-3 py-1 bg-slate-100 text-slate-700 text-xs font-bold rounded-lg border border-slate-200';
                span.textContent = tool;
                toolsContainer.appendChild(span);
            });

            // Render Timeline Roadmap
            const roadmapContainer = document.getElementById('benefitRoadmap');
            roadmapContainer.innerHTML = '';
            data.roadmap.forEach((item, index) => {
                const div = document.createElement('div');
                div.className = 'relative pl-2';
                div.innerHTML = `
                    <div class="absolute -left-[21px] top-1 w-3.5 h-3.5 rounded-full bg-himsiMaroon border-2 border-white shadow-sm"></div>
                    <span class="text-xs font-bold text-himsiMaroon block mb-0.5">Minggu ${index + 1}</span>
                    <p class="text-xs text-slate-600 leading-relaxed">${item}</p>
                `;
                roadmapContainer.appendChild(div);
            });

            switchModalTab('silabus');

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