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
    </style>
</head>

<body class="text-slate-800 antialiased selection:bg-himsiMaroon selection:text-white relative min-h-screen overflow-x-hidden">

    <!-- GLOBAL WATERMARK LOGO -->
    <div class="fixed inset-0 flex items-center justify-center pointer-events-none z-0 overflow-hidden">
        <img src="Logohimsi.png" alt="HIMSI Giant Watermark" class="w-[110vw] max-w-[1100px] h-auto opacity-[0.12] select-none transform scale-105">
    </div>

    <!-- HEADER / NAVIGATION (LINK LOGO DIRECT KE #tentang) -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-md py-4">
        <div class="max-w-7xl mx-auto px-4 md:px-8 flex items-center justify-between">
            
            <!-- DIRECT KE SECTION TENTANG DENGAN OFFSET PRESISI -->
            <a href="#tentang" class="flex items-center space-x-5 md:space-x-8 group">
                <img src="Logohimsi.png" alt="Logo HIMSI UNIS" class="w-40 h-40 sm:w-48 sm:h-48 md:w-64 md:h-64 object-contain group-hover:scale-105 transition transform drop-shadow-md">
                <div class="border-l-4 border-himsiMaroon pl-4 md:pl-6 py-2">
                    <span class="serif-title font-bold text-2xl sm:text-3xl md:text-5xl tracking-tight text-himsiMaroon block leading-tight">HIMSI UNIS</span>
                    <span class="text-xs sm:text-sm md:text-lg text-slate-600 font-extrabold tracking-widest uppercase mt-1 block">Kabinet Genesis</span>
                </div>
            </a>

            <nav class="hidden lg:flex items-center space-x-10 text-lg font-bold text-slate-700">
                <a href="#beranda" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Beranda</a>
                <a href="#layanan" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Layanan Digital</a>
                <a href="#karya" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Karya Mahasiswa</a>
                <a href="#tentang" class="hover:text-himsiMaroon transition py-2 border-b-2 border-transparent hover:border-himsiMaroon">Tentang Kami</a>
            </nav>

        </div>
    </header>

    <!-- HERO SECTION -->
    <section id="beranda" class="relative bg-himsiMaroon/90 text-white py-24 md:py-32 px-6 overflow-hidden z-10 border-b border-white/10">
        <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>

        <div class="max-w-5xl mx-auto relative z-20 text-center">
            <span class="text-himsiGold font-bold tracking-widest text-xs uppercase bg-white/10 px-4 py-1.5 rounded-full inline-block mb-6 border border-white/10 backdrop-blur-sm">
                Universitas Islam Syekh Yusuf Tangerang
            </span>

            <h1 class="serif-title text-3xl sm:text-5xl md:text-6xl font-bold leading-tight mb-6 drop-shadow-md">
                Technology Innovation & Synergistic Leadership
            </h1>

            <p class="text-slate-200 text-sm md:text-xl font-light max-w-3xl mx-auto mb-10 leading-relaxed drop-shadow-sm">
                Selamat Datang di Portal Resmi Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang — Kabinet Genesis. Pusat informasi akademik, kegiatan organisasi, dan layanan digital himpunan.
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
    <section id="layanan" class="py-20 px-6 max-w-7xl mx-auto relative z-10">
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

    <!-- SECTION SHOWCASE KARYA MAHASISWA -->
    <section id="karya" class="py-20 bg-slate-100/50 border-t border-slate-200 px-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">Student Showcase</span>
                <h2 class="serif-title text-3xl md:text-4xl font-bold text-slate-900 mb-4">Karya & Inovasi Mahasiswa</h2>
                <p class="text-slate-600 text-sm">
                    Apresiasi dan portofolio hasil karya buatan mahasiswa Sistem Informasi UNIS Tangerang.
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
                    <a href="photobooth/" target="_blank" class="inline-flex items-center justify-center w-full bg-himsiMaroon text-white font-bold text-sm py-3.5 rounded-xl hover:bg-opacity-90 transition shadow-sm">
                        Buka Aplikasi Photobooth &rarr;
                    </a>
                </div>

                <!-- PAHRI BROS -->
                <div class="bg-white/85 backdrop-blur-sm rounded-2xl border border-slate-200 shadow-md overflow-hidden hover:shadow-2xl transition duration-300 flex flex-col justify-between group hover:-translate-y-1">
                    <div>
                        <div class="bg-slate-900 h-32 flex items-center justify-center relative overflow-hidden">
                            <span class="text-5xl group-hover:scale-110 transition transform">🎮</span>
                            <span class="absolute top-3 right-3 bg-himsiGold text-slate-900 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Game Dev</span>
                        </div>
                        <div class="p-6">
                            <h3 class="serif-title text-xl font-bold text-slate-900 mb-1">Pahri Bros</h3>
                            <p class="text-xs text-himsiMaroon font-semibold mb-3">Oleh: Mahasiswa SI UNIS</p>
                            <p class="text-slate-600 text-sm leading-relaxed mb-4">
                                Game retro 2D platformer bertema petualangan yang dibangun menggunakan teknologi HTML5 & JavaScript dengan efek suara chiptune.
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
                    <p class="text-xs text-slate-500 mt-1">Karya mahasiswa SI berikutnya akan ditampilkan di sini.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION TENTANG (DENGAN SCROLL MARGIN TOP AGAR DITAMPILKAN TEPAT BERSAMA HEADER) -->
    <section id="tentang" class="bg-white/85 backdrop-blur-sm py-20 border-y border-slate-200 px-6 relative z-10 scroll-mt-28 lg:scroll-mt-48">
        <div class="max-w-4xl mx-auto text-center">
            <span class="text-himsiMaroon font-bold text-xs uppercase tracking-widest block mb-2">HIMSI UNIS Tangerang</span>
            <h2 class="serif-title text-3xl sm:text-4xl font-bold text-slate-900 mb-6">Tentang Kabinet Genesis</h2>
            
            <p class="text-slate-700 text-base md:text-lg leading-relaxed mb-10">
                Kabinet Genesis berdiri sebagai simbol awal baru yang membawa semangat inovasi teknologi, integritas akademik, dan kepemimpinan adaptif bagi seluruh mahasiswa Sistem Informasi Universitas Islam Syekh Yusuf Tangerang.
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

    <!-- MODAL EMBED GAME -->
    <div id="gameModal" class="fixed inset-0 bg-black/85 z-50 hidden items-center justify-center p-2 sm:p-4 backdrop-blur-sm">
        <div class="bg-slate-900 rounded-2xl overflow-hidden w-[96vw] max-w-7xl h-auto md:h-[88vh] max-h-[85vh] shadow-2xl border border-slate-700 flex flex-col justify-between">
            
            <!-- HEADER MODAL -->
            <div class="px-4 py-3 md:px-5 md:py-4 bg-slate-800 flex justify-between items-center border-b border-slate-700 shrink-0">
                <div class="flex items-center gap-3">
                    <span class="text-xl md:text-3xl">🎮</span>
                    <h3 class="font-bold text-white text-sm md:text-xl tracking-wide">Pahri Bros — Game Showcase</h3>
                </div>
                <div class="flex items-center gap-2 md:gap-3">
                    <a id="btnFullscreen" href="karya/pahri-bros/" target="_blank" class="bg-sky-600 hover:bg-sky-500 text-white text-xs md:text-sm px-3 py-1.5 md:px-4 md:py-2 rounded-lg font-bold transition flex items-center gap-1.5 shadow-md">
                        <span>↗️</span> <span class="hidden sm:inline">Main Fullscreen</span>
                    </a>
                    <button onclick="tutupGameModal()" class="text-slate-400 hover:text-white text-2xl md:text-3xl font-bold px-2 leading-none transition">&times;</button>
                </div>
            </div>

            <!-- CONTAINER IFRAME GAME -->
            <div class="relative w-full h-[60vh] md:h-full bg-slate-950 flex items-center justify-center overflow-hidden grow p-0">
                <iframe id="gameIframe" src="" class="w-full h-full border-0"></iframe>
            </div>

        </div>
    </div>

    <script>
        function bukaGameModal(gameUrl) {
            document.getElementById('gameIframe').src = gameUrl;
            document.getElementById('gameModal').classList.remove('hidden');
            document.getElementById('gameModal').classList.add('flex');
        }

        function tutupGameModal() {
            document.getElementById('gameIframe').src = '';
            document.getElementById('gameModal').classList.remove('flex');
            document.getElementById('gameModal').classList.add('hidden');
        }
    </script>

</body>
</html>