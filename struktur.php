<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - HIMSI UNIS Kabinet Genesis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Tree Layout Desktop */
        @media (min-width: 1024px) {
            .tree ul {
                padding-top: 20px; position: relative; transition: all 0.3s;
            }
            .tree li {
                float: left; text-align: center; list-style-type: none;
                position: relative; padding: 20px 5px 0 5px; transition: all 0.3s;
            }
            .tree li::before, .tree li::after {
                content: ''; position: absolute; top: 0; right: 50%;
                border-top: 2px solid #7f1d1d; width: 50%; height: 20px;
            }
            .tree li::after {
                right: auto; left: 50%; border-left: 2px solid #7f1d1d;
            }
            .tree li:only-child::after, .tree li:only-child::before { display: none; }
            .tree li:only-child { padding-top: 0; }
            .tree li:first-child::before, .tree li:last-child::after { border: 0 none; }
            .tree li:last-child::before { border-right: 2px solid #7f1d1d; border-radius: 0 5px 0 0; }
            .tree li:first-child::after { border-radius: 5px 0 0 0; }
            .tree ul ul::before {
                content: ''; position: absolute; top: 0; left: 50%;
                border-left: 2px solid #7f1d1d; width: 0; height: 20px;
            }
        }

        .node-card {
            transition: all 0.2s ease-in-out;
        }
        .node-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(107, 15, 26, 0.2);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen selection:bg-red-900 selection:text-white">

    <!-- Header Navigation -->
    <nav class="bg-red-950 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-2">
            <a href="/" class="flex items-center gap-2 font-bold text-sm sm:text-base hover:text-red-200 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
            </a>
            <span class="font-semibold text-xs sm:text-sm bg-red-900 border border-red-800 px-3 py-1 rounded-full">
                Kabinet Genesis
            </span>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto p-4 sm:p-8">
        <div class="text-center mb-8">
            <span class="text-xs font-bold uppercase tracking-widest text-red-900 bg-red-100 px-3 py-1 rounded-full">
                Interactive Chart
            </span>
            <h1 class="text-2xl sm:text-4xl font-extrabold text-red-950 uppercase tracking-wider mt-3">
                Struktur Organisasi
            </h1>
            <p class="text-slate-600 text-xs sm:text-sm mt-1">
                Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang 2026/2027
            </p>
        </div>

        <!-- LAYOUT DESKTOP (Tampil di Layar Besar) -->
        <div class="hidden lg:block overflow-x-auto pb-8">
            <div class="tree flex justify-center min-w-[1000px]">
                <ul>
                    <li>
                        <!-- PRESIDIUM UTAMA -->
                        <div class="node-card bg-red-950 text-white border border-red-900 p-4 rounded-2xl shadow-md inline-block w-64 text-center">
                            <div class="text-[10px] uppercase font-bold text-red-300 tracking-wider">Presidium Utama</div>
                            <div class="font-bold text-base mt-1">Rafli Fahrezi</div>
                            <div class="text-xs text-red-200">Ketua HIMSI</div>
                            <div class="border-t border-red-800 my-2"></div>
                            <div class="font-bold text-base">Neyna Carissa</div>
                            <div class="text-xs text-red-200">Wakil Ketua HIMSI</div>
                        </div>

                        <ul>
                            <!-- SEKRETARIS -->
                            <li>
                                <div class="node-card bg-red-900 text-white p-3 rounded-xl shadow inline-block w-48">
                                    <div class="text-[10px] font-bold text-red-200 uppercase">Sekretaris</div>
                                    <div class="text-xs font-semibold mt-1">1. Novita Zahra</div>
                                    <div class="text-xs font-semibold">2. M Fajrun Naafi</div>
                                </div>
                            </li>

                            <!-- KOORDINATOR & DIVISI -->
                            <li>
                                <div class="node-card bg-red-900 text-white p-3 rounded-xl shadow inline-block w-52">
                                    <div class="text-[10px] font-bold text-red-200 uppercase">Koordinator Divisi</div>
                                    <div class="text-sm font-bold mt-1">Muhamad Dimyati</div>
                                </div>

                                <ul>
                                    <li>
                                        <div class="node-card bg-white border border-red-900 p-3 rounded-xl shadow text-left w-44">
                                            <div class="text-[11px] font-extrabold text-red-950 uppercase border-b pb-1 mb-2">Divisi Pendidikan</div>
                                            <div class="text-xs text-slate-700 space-y-1">
                                                <div>• Firda Sofia</div>
                                                <div>• M Rizky Ramadhan</div>
                                                <div>• Teguh Firmansyah</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="node-card bg-white border border-red-900 p-3 rounded-xl shadow text-left w-48">
                                            <div class="text-[11px] font-extrabold text-red-950 uppercase border-b pb-1 mb-2">Humas Eksternal & Internal</div>
                                            <div class="text-xs text-slate-700 space-y-1">
                                                <div>• Risnanda Mei D.</div>
                                                <div>• Ronal Ardiyansah</div>
                                                <div>• Salwania Azzizah</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="node-card bg-white border border-red-900 p-3 rounded-xl shadow text-left w-44">
                                            <div class="text-[11px] font-extrabold text-red-950 uppercase border-b pb-1 mb-2">Divisi PDD</div>
                                            <div class="text-xs text-slate-700 space-y-1">
                                                <div>• Dinda Rahmi R.</div>
                                                <div>• Andika Rizky P.</div>
                                                <div>• Alvina Ramadani</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="node-card bg-white border border-red-900 p-3 rounded-xl shadow text-left w-44">
                                            <div class="text-[11px] font-extrabold text-red-950 uppercase border-b pb-1 mb-2">Divisi Logistik</div>
                                            <div class="text-xs text-slate-700 space-y-1">
                                                <div>• Satria Radityo M.</div>
                                                <div>• Maisatul Hikmah</div>
                                                <div>• Hani Qurrotu Aini</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <!-- BENDAHARA -->
                            <li>
                                <div class="node-card bg-red-900 text-white p-3 rounded-xl shadow inline-block w-48">
                                    <div class="text-[10px] font-bold text-red-200 uppercase">Bendahara</div>
                                    <div class="text-xs font-semibold mt-1">1. Julia Nurmawati</div>
                                    <div class="text-xs font-semibold">2. Silvia Azzlina E.</div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- LAYOUT MOBILE & TABLET (Vertical Expandable Tree - Sangat Rapi di HP) -->
        <div class="lg:hidden space-y-4 max-w-md mx-auto">
            <!-- Pimpinan Utama -->
            <div class="bg-red-950 text-white p-5 rounded-2xl shadow-md text-center border border-red-900">
                <span class="text-[10px] font-bold uppercase tracking-wider text-red-300 bg-red-900/60 px-2.5 py-1 rounded-full">
                    Presidium Utama
                </span>
                <div class="mt-3">
                    <div class="text-lg font-bold">Rafli Fahrezi</div>
                    <div class="text-xs text-red-200">Ketua HIMSI</div>
                </div>
                <div class="border-t border-red-800/80 my-3"></div>
                <div>
                    <div class="text-lg font-bold">Neyna Carissa</div>
                    <div class="text-xs text-red-200">Wakil Ketua HIMSI</div>
                </div>
            </div>

            <!-- Sekretaris & Bendahara Side-by-Side -->
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-red-900 text-white p-3.5 rounded-xl text-center shadow">
                    <div class="text-[10px] font-bold text-red-200 uppercase">Sekretaris</div>
                    <div class="text-xs font-semibold mt-1">1. Novita Zahra</div>
                    <div class="text-xs font-semibold">2. M Fajrun N.</div>
                </div>
                <div class="bg-red-900 text-white p-3.5 rounded-xl text-center shadow">
                    <div class="text-[10px] font-bold text-red-200 uppercase">Bendahara</div>
                    <div class="text-xs font-semibold mt-1">1. Julia Nurmawati</div>
                    <div class="text-xs font-semibold">2. Silvia Azzlina E.</div>
                </div>
            </div>

            <!-- Koordinator Divisi (Accordion Expandable) -->
            <div class="bg-red-900 text-white p-4 rounded-xl shadow text-center">
                <div class="text-[10px] font-bold text-red-200 uppercase">Koordinator Divisi</div>
                <div class="text-base font-bold mt-0.5">Muhamad Dimyati</div>
            </div>

            <!-- List Divisi Vertikal -->
            <div class="space-y-3 pt-2">
                <!-- Divisi Pendidikan -->
                <div class="bg-white rounded-xl border border-red-900 p-4 shadow-sm">
                    <div class="font-bold text-red-950 text-sm border-b pb-2 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-graduation-cap text-red-900"></i> Divisi Pendidikan
                    </div>
                    <ul class="text-xs text-slate-700 space-y-1.5 pl-2">
                        <li>• Firda Sofia</li>
                        <li>• M Rizky Ramadhan</li>
                        <li>• Teguh Firmansyah</li>
                    </ul>
                </div>

                <!-- Humas -->
                <div class="bg-white rounded-xl border border-red-900 p-4 shadow-sm">
                    <div class="font-bold text-red-950 text-sm border-b pb-2 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-bullhorn text-red-900"></i> Humas Eksternal & Internal
                    </div>
                    <ul class="text-xs text-slate-700 space-y-1.5 pl-2">
                        <li>• Risnanda Mei Damayanti</li>
                        <li>• Ronal Ardiyansah</li>
                        <li>• Salwania Azzizah Nst</li>
                    </ul>
                </div>

                <!-- PDD -->
                <div class="bg-white rounded-xl border border-red-900 p-4 shadow-sm">
                    <div class="font-bold text-red-950 text-sm border-b pb-2 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-camera text-red-900"></i> Divisi PDD
                    </div>
                    <ul class="text-xs text-slate-700 space-y-1.5 pl-2">
                        <li>• Dinda Rahmi Ramadhani</li>
                        <li>• Andika Rizky Pratama</li>
                        <li>• Alvina Ramadani</li>
                    </ul>
                </div>

                <!-- Logistik -->
                <div class="bg-white rounded-xl border border-red-900 p-4 shadow-sm">
                    <div class="font-bold text-red-950 text-sm border-b pb-2 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-boxes-packing text-red-900"></i> Divisi Logistik
                    </div>
                    <ul class="text-xs text-slate-700 space-y-1.5 pl-2">
                        <li>• Satria Radityo Mumtaz</li>
                        <li>• Maisatul Hikmah</li>
                        <li>• Hani Qurrotu Aini</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>
</html>