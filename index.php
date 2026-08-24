<?php
// index.php - Portal Utama HIMSI UNIS Tangerang (Kabinet Genesis)
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMSI UNIS Tangerang | Kabinet Genesis</title>

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

    <!-- Google Fonts ala Harvard -->
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
    </style>
</head>

<body class="text-slate-800 antialiased selection:bg-himsiMaroon selection:text-white">

    <!-- HEADER / NAVIGATION -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            
            <!-- Brand & Logo -->
            <a href="#" class="flex items-center space-x-3 group">
                <img src="Logohimsi.png" alt="Logo HIMSI UNIS" class="w-12 h-12 object-contain group-hover:scale-105 transition transform">
                <div>
                    <span class="serif-title font-bold text-xl tracking-tight text-himsiMaroon block leading-none">HIMSI UNIS</span>
                    <span class="text-[10px] text-slate-500 font-semibold tracking-widest uppercase mt-1 block">Kabinet Genesis</span>
                </div>
            </a>

            <!-- Menu Navigasi -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-semibold text-slate-700">
                <a href="#beranda" class="hover:text-himsiMaroon transition">Beranda</a>
                <a href="#aplikasi" class="text-himsiMaroon font-bold transition">Aplikasi & Layanan</a>
                <a href="#tentang" class="hover:text-himsiMaroon transition">Tentang Kami</a>
                <a href="#kontak" class="hover:text-himsiMaroon transition">Kontak</a>
            </nav>

            <!-- Tombol Direct Link Photobooth -->
            <div>
                <a href="photobooth/" class="bg-himsiMaroon text-white px-5 py-2.5 rounded-lg text-sm font-bold shadow hover:bg-opacity-90 transition flex items-center gap-2">
                    <span>📸</span> Buka Photobooth
                </a>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section id="beranda" class="relative bg-himsiMaroon text-white py-24 px-6 overflow-hidden">
        <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px]"></div>

        <div class="max-w-5xl mx-auto relative z-10 text-center">
            <span class="text-himsiGold font-bold tracking-widest text-xs uppercase bg-white/10 px-4 py-1.5 rounded-full inline-block mb-6 border border-white/10">
                Universitas Islam Syekh Yusuf Tangerang
            </span>

            <h1 class="serif-title text-4xl sm:text-5xl md:text-6xl font-bold leading-tight mb-6">
                Technology Innovation & Synergistic Leadership
            </h1>

            <p class="text-slate-200 text-base md:text-xl font-light max-w-3xl mx-auto mb-10 leading-relaxed">
                Selamat Datang di Portal Resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang — Kabinet Genesis. Pusat informasi akademik, kegiatan organisasi, dan layanan digital himpunan.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#aplikasi" class="bg-white text-himsiMaroon px-8 py-3.5 rounded-lg font-bold text-sm shadow-xl hover:bg-himsiCream transition transform hover:-translate-y-0.5">
                    Jelajahi Layanan Digital
                </a>
                <a href="photobooth/" class="border-2 border-white/80 text-white px-8 py-3.5 rounded-lg font-bold text-sm hover:bg-white hover:text-himsiMaroon transition transform hover:-translate-y-0.5">
                    Photobooth PKKMB 2026 ✨
                </a>
            </div>
        </div>
    </section>

    <!-- PORTAL DIRECT LINK / APLIKASI DIGITAL -->
    <section id="aplikasi" class="py-20 px-6 max-w-7xl mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">Direct Hub Access</span>
            <h2 class="serif-title text-3xl md:text-4xl font-bold text-slate-900 mb-4">Layanan & Aplikasi Digital</h2>
            <p class="text-slate-600 text-sm">
                Akses instan seluruh platform digital HIMSI UNIS. Pilih aplikasi yang ingin Anda gunakan di bawah ini.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- CARD 1: PHOTOBOOTH PKKMB -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-md hover:shadow-2xl transition-all duration-300 p-8 flex flex-col justify-between group hover:-translate-y-1">
                <div>
                    <div class="w-14 h-14 bg-red-50 text-himsiMaroon rounded-xl flex items-center justify-center text-3xl font-bold mb-6 group-hover:bg-himsiMaroon group-hover:text-white transition">
                        📸
                    </div>
                    <span class="text-xs font-bold text-himsiGold uppercase tracking-wider block mb-1">Aplikasi Aktif</span>
                    <h3 class="serif-title text-xl font-bold text-slate-900 mb-3">Photobooth PKKMB 2026</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Abadikan momen seru dengan frame eksklusif Kabinet Genesis. Dilengkapi auto-send email softfile dan QR Code scanner.
                    </p>
                </div>
                <a href="photobooth/" class="inline-flex items-center justify-center w-full bg-himsiMaroon text-white font-bold text-sm py-3.5 rounded-xl hover:bg-opacity-90 transition shadow-sm">
                    Buka Aplikasi Photobooth &rarr;
                </a>
            </div>

            <!-- CARD 2: ADMIN DASHBOARD PHOTOBOOTH -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-md hover:shadow-2xl transition-all duration-300 p-8 flex flex-col justify-between group hover:-translate-y-1">
                <div>
                    <div class="w-14 h-14 bg-amber-50 text-amber-700 rounded-xl flex items-center justify-center text-3xl font-bold mb-6 group-hover:bg-slate-900 group-hover:text-white transition">
                        🔐
                    </div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Internal Panitia / Admin</span>
                    <h3 class="serif-title text-xl font-bold text-slate-900 mb-3">Dashboard Presensi & Admin</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Panel kelola data mahasiswa, rekapitulasi foto tersimpan, ekspor data, serta pengaturan user pengurus HIMSI.
                    </p>
                </div>
                <a href="photobooth/dashboard" class="inline-flex items-center justify-center w-full bg-slate-900 text-white font-bold text-sm py-3.5 rounded-xl hover:bg-slate-800 transition shadow-sm">
                    Masuk Panel Admin &rarr;
                </a>
            </div>

            <!-- CARD 3: RESOURCE CENTER SI -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-md p-8 flex flex-col justify-between opacity-80">
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
                <button disabled class="w-full bg-slate-100 text-slate-400 font-bold text-sm py-3.5 rounded-xl cursor-not-allowed">
                    Segera Hadir
                </button>
            </div>

        </div>
    </section>

    <!-- SECTION TENTANG -->
    <section id="tentang" class="bg-white py-20 border-y border-slate-200 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">HIMSI UNIS Tangerang</span>
            <h2 class="serif-title text-3xl font-bold text-slate-900 mb-6">Tentang Kabinet Genesis</h2>
            
            <p class="text-slate-700 text-base leading-relaxed mb-10">
                Kabinet Genesis berdiri sebagai simbol awal baru yang membawa semangat inovasi teknologi, integritas akademik, dan kepemimpinan adaptif bagi seluruh mahasiswa Sistem Informasi Universitas Islam Syekh Yusuf Tangerang.
            </p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-8 border-t border-slate-100">
                <div class="p-4 rounded-xl bg-slate-50">
                    <span class="block text-2xl font-bold text-himsiMaroon serif-title">UNIS</span>
                    <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Tangerang</span>
                </div>
                <div class="p-4 rounded-xl bg-slate-50">
                    <span class="block text-2xl font-bold text-himsiMaroon serif-title">SI</span>
                    <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Sistem Informasi</span>
                </div>
                <div class="p-4 rounded-xl bg-slate-50">
                    <span class="block text-2xl font-bold text-himsiMaroon serif-title">2026</span>
                    <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Kabinet Genesis</span>
                </div>
                <div class="p-4 rounded-xl bg-slate-50">
                    <span class="block text-2xl font-bold text-himsiMaroon serif-title">0001 1010</span>
                    <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-wider">Technology Innovation</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="kontak" class="bg-darkNavy text-white py-12 px-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center space-x-3">
                <img src="Logohimsi.png" alt="Logo Footer" class="w-10 h-10 object-contain">
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

</body>
</html>