<?php
// index.php - Portal Utama HIMSI UNIS Tangerang (Kabinet Genesis)
// Mencegah clickjacking dengan Header Security
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

        /* Scrollbar kustom untuk galeri modal */
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
    </style>
</head>

<body class="text-slate-800 antialiased selection:bg-himsiMaroon selection:text-white relative min-h-screen overflow-x-hidden">

    <!-- GLOBAL WATERMARK LOGO (Mengambang melayang di tengah layar saat di-scroll) -->
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none z-0 select-none w-[85vw] max-w-[700px] aspect-square flex items-center justify-center">
        <img src="Logohimsi.png" alt="HIMSI Watermark" class="w-full h-full object-contain opacity-[0.12]">
    </div>

    <!-- HEADER / NAVIGATION -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-md py-3 relative">
        <div class="max-w-7xl mx-auto px-4 md:px-8 flex items-center justify-between">
            
            <a href="#tentang" class="flex items-center space-x-3 md:space-x-5 group">
                <img src="Logohimsi.png" alt="Logo HIMSI UNIS" class="w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 object-contain group-hover:scale-105 transition transform drop-shadow-md">
                <div class="border-l-3 md:border-l-4 border-himsiMaroon pl-3 md:pl-4 py-1.5">
                    <span class="serif-title font-bold text-xl sm:text-2xl md:text-3xl tracking-tight text-himsiMaroon block leading-tight">HIMSI UNIS</span>
                    <span class="text-[11px] sm:text-xs md:text-sm text-slate-600 font-extrabold tracking-widest uppercase mt-1 block">Kabinet Genesis</span>
                </div>
            </a>

            <!-- Navigasi Desktop -->
            <nav class="hidden lg:flex items-center space-x-6 xl:space-x-8 text-base lg:text-lg font-bold text-slate-700">
                <a href="#beranda" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Beranda</a>
                <a href="#layanan" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Layanan Digital</a>
                <a href="#kegiatan" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Berita & Kegiatan</a>
                <a href="#karya" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Karya Mahasiswa</a>
                <a href="#tentang" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Tentang Kami</a>
            </nav>

            <!-- Tombol Hamburger Menu Mobile -->
            <button id="mobileMenuBtn" class="lg:hidden text-slate-800 hover:text-himsiMaroon focus:outline-none p-2 transition-transform transform active:scale-95 z-50">
                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Dropdown Menu Mobile -->
        <div id="mobileMenuPanel" class="hidden lg:hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-xl flex flex-col py-4 px-6 space-y-4 font-bold text-slate-700">
            <a href="#beranda" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Beranda</a>
            <a href="#layanan" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Layanan Digital</a>
            <a href="#kegiatan" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Berita & Kegiatan</a>
            <a href="#karya" class="mobile-link block hover:text-himsiMaroon transition border-b border-slate-100 pb-3">Karya Mahasiswa</a>
            <a href="#tentang" class="mobile-link block hover:text-himsiMaroon transition pb-2">Tentang Kami</a>
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

            <div class="flex flex-wrap justify-center gap-4">
                <a href="#layanan" class="bg-white text-himsiMaroon px-6 md:px-8 py-3.5 rounded-lg font-bold text-sm shadow-xl hover:bg-himsiCream transition transform hover:-translate-y-0.5">
                    Jelajahi Layanan Digital
                </a>
                <a href="#karya" class="border-2 border-white/80 text-white px-6 md:px-8 py-3.5 rounded-lg font-bold text-sm hover:bg-white hover:text-himsiMaroon transition transform hover:-translate-y-0.5 backdrop-blur-sm">
                    Lihat Karya Mahasiswa 🎮
                </a>
            </div>
        </div>
    </section>

    <!-- PORTAL LAYANAN DIGITAL -->
    <section id="layanan" class="py-20 px-6 max-w-7xl mx-auto relative z-10 scroll-mt-36 sm:scroll-mt-44 md:scroll-mt-56">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">Direct Hub Access</span>
            <h2 class="serif-title text-3xl md:text-4xl font-bold text-slate-900 mb-4">Layanan & Aplikasi Digital</h2>
            <p class="text-slate-600 text-sm">
                Akses instan seluruh platform digital resmi HIMSI UNIS Tangerang.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
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
                <a href="#tentang" class="inline-flex items-center justify-center w-full bg-slate-900 text-white font-bold text-sm py-3.5 rounded-xl hover:bg-slate-800 transition shadow-sm">
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
                <button disabled class="w-full bg-slate-100 text-slate-400 font-bold text-sm py-3.5 rounded-xl cursor-not-allowed">
                    Segera Hadir
                </button>
            </div>
        </div>
    </section>

    <!-- SECTION BERITA & KEGIATAN -->
    <section id="kegiatan" class="py-20 bg-himsiCream/80 border-y border-slate-200 px-6 relative z-10 scroll-mt-36 sm:scroll-mt-44 md:scroll-mt-56">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">HIMSI News & Event</span>
                <h2 class="serif-title text-3xl md:text-4xl font-bold text-slate-900 mb-4">Berita & Kegiatan</h2>
                <p class="text-slate-600 text-sm">
                    Dokumentasi kegiatan, acara, dan informasi terbaru seputar Himpunan Mahasiswa Sistem Informasi UNIS Tangerang.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- CARD KEGIATAN 1: PELANTIKAN -->
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
                        <button onclick="bukaModalKegiatan('pelantikan')" class="w-full bg-slate-900 text-white font-bold text-sm py-3 rounded-xl hover:bg-slate-800 transition flex items-center justify-center gap-2">
                            <span>📸</span> Lihat Dokumentasi
                        </button>
                    </div>
                </div>

                <!-- CARD PLACEHOLDER -->
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
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">Student Showcase</span>
                <h2 class="serif-title text-3xl md:text-4xl font-bold text-slate-900 mb-4">Karya & Inovasi Mahasiswa</h2>
                <p class="text-slate-600 text-sm">
                    Apresiasi dan portofolio hasil karya buatan Mahasiswa Sistem Informasi UNIS Tangerang.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- PHOTOBOOTH -->
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
                    <a href="photobooth/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full bg-himsiMaroon text-white font-bold text-sm py-3.5 rounded-xl hover:bg-opacity-90 transition shadow-sm">
                        Buka Aplikasi Photobooth &rarr;
                    </a>
                </div>

                <!-- SUPER PAHRI -->
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
                        <button onclick="bukaGameModal('karya/pahri-bros/')" class="w-full bg-himsiMaroon text-white font-bold text-sm py-3.5 rounded-xl hover:bg-opacity-90 transition flex items-center justify-center gap-2 shadow-sm">
                            <span>▶️</span> Mainkan Game Sekarang
                        </button>
                    </div>
                </div>

                <!-- PLACEHOLDER -->
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
        <div class="max-w-4xl mx-auto text-center">
            <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">HIMSI UNIS Tangerang</span>
            <h2 class="serif-title text-3xl sm:text-4xl font-bold text-slate-900 mb-6">Tentang Kabinet Genesis</h2>
            
            <p class="text-slate-700 text-base md:text-lg leading-relaxed mb-10">
                Kabinet Genesis berdiri sebagai simbol awal baru yang membawa semangat inovasi teknologi, integritas akademik, dan kepemimpinan adaptif bagi seluruh Mahasiswa Sistem Informasi Universitas Islam Syekh Yusuf Tangerang.
            </p>

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

    <!-- FOOTER -->
    <footer id="kontak" class="bg-darkNavy/95 text-white py-12 px-6 relative z-10">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
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

    <!-- ============================================== -->
    <!-- FLOATING CHATBOT WIDGET (HIMSI BOT 24/7)       -->
    <!-- ============================================== -->
    <div class="fixed bottom-6 right-6 z-50">
        <!-- Floating Trigger Button -->
        <button id="chatbotToggleBtn" onclick="toggleChatbot()" class="bg-himsiMaroon hover:bg-red-900 text-white rounded-full p-4 shadow-2xl transition transform hover:scale-110 flex items-center justify-center border-2 border-himsiGold">
            <span class="text-2xl">🤖</span>
        </button>

        <!-- Chatbot Window Panel -->
        <div id="chatbotPanel" class="hidden absolute bottom-16 right-0 w-[90vw] max-w-[380px] h-[520px] bg-white rounded-2xl shadow-2xl border border-slate-200 flex flex-col overflow-hidden">
            <!-- Header Panel -->
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

            <!-- Messages Container -->
            <div id="chatMessages" class="flex-1 p-4 overflow-y-auto space-y-3 bg-slate-50 text-xs">
                <div class="flex items-start space-x-2">
                    <div class="w-7 h-7 bg-himsiMaroon text-white rounded-full flex items-center justify-center shrink-0 font-bold text-[10px]">AI</div>
                    <div class="bg-white p-3 rounded-2xl rounded-tl-none border border-slate-200 shadow-sm text-slate-700 leading-relaxed">
                        Halo Mahasiswa SI! 👋 Saya **HIMSI Bot**. Ada yang bisa saya bantu terkait jadwal perkuliahan, layanan WISNU/SIAKAD, atau info seputar HIMSI UNIS?
                    </div>
                </div>
            </div>

            <!-- Typing Indicator -->
            <div id="chatTyping" class="hidden px-4 py-2 bg-slate-50 text-[11px] text-slate-400 italic">
                HIMSI Bot sedang mengetik...
            </div>

            <!-- Input Form -->
            <div class="p-3 bg-white border-t border-slate-200 flex items-center gap-2">
                <input type="text" id="chatInput" placeholder="Ketik pertanyaan Anda..." onkeydown="if(event.key==='Enter') sendChatMessage()" class="flex-1 text-xs border border-slate-300 rounded-xl px-3 py-2.5 focus:outline-none focus:border-himsiMaroon">
                <button onclick="sendChatMessage()" class="bg-himsiMaroon text-white px-4 py-2.5 rounded-xl font-bold text-xs hover:bg-red-900 transition shadow-sm">Kirim</button>
            </div>
        </div>
    </div>

    <!-- MODAL POPUP: DOKUMENTASI KEGIATAN -->
    <div id="kegiatanModal" class="fixed inset-0 bg-black/95 z-[60] hidden items-center justify-center p-2 sm:p-6 backdrop-blur-md">
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
    <div id="gameModal" class="fixed inset-0 bg-black/85 z-[60] hidden items-center justify-center p-2 sm:p-4 backdrop-blur-sm">
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

    <!-- JAVASCRIPT SYSTEM -->
    <script>
        // -----------------------------------------
        // SCRIPT UNTUK CHATBOT WIDGET
        // -----------------------------------------
        function toggleChatbot() {
            const panel = document.getElementById('chatbotPanel');
            panel.classList.toggle('hidden');
        }

        async function sendChatMessage() {
            const input = document.getElementById('chatInput');
            const messages = document.getElementById('chatMessages');
            const typing = document.getElementById('chatTyping');
            const userMsg = input.value.trim();

            if (!userMsg) return;

            // Render Pesan User
            messages.innerHTML += `
                <div class="flex items-end justify-end space-x-2">
                    <div class="bg-himsiMaroon text-white p-3 rounded-2xl rounded-tr-none shadow-sm text-xs max-w-[80%] leading-relaxed">
                        ${userMsg}
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

                // Render Pesan Bot
                let botReply = data.reply ? data.reply.replace(/\n/g, '<br>') : 'Maaf, terjadi masalah.';
                botReply = botReply.replace(/(https?:\/\/[^\s<]+)/g, '<a href="$1" target="_blank" class="text-sky-600 underline font-semibold">$1</a>');

                messages.innerHTML += `
                    <div class="flex items-start space-x-2">
                        <div class="w-7 h-7 bg-himsiMaroon text-white rounded-full flex items-center justify-center shrink-0 font-bold text-[10px]">AI</div>
                        <div class="bg-white p-3 rounded-2xl rounded-tl-none border border-slate-200 shadow-sm text-slate-700 leading-relaxed max-w-[85%]">
                            ${botReply}
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