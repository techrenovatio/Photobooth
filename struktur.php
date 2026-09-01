<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - HIMSI UNIS Kabinet Genesis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom transitions for collapsible branches */
        .collapsible-content {
            transition: all 0.3s ease-in-out;
            max-height: 2000px;
            opacity: 1;
            overflow: hidden;
        }
        .collapsible-content.collapsed {
            max-height: 0;
            opacity: 0;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Interactive Org Tree Desktop Lines */
        @media (min-width: 1024px) {
            .tree-node-wrapper {
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            
            .tree-children {
                display: flex;
                justify-content: center;
                position: relative;
                padding-top: 20px;
                transition: all 0.3s ease;
            }

            .tree-children::before {
                content: '';
                position: absolute;
                top: 0;
                left: 50%;
                width: 2px;
                height: 20px;
                background-color: #991b1b;
            }

            .tree-child-item {
                position: relative;
                padding: 0 6px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .tree-child-item::before {
                content: '';
                position: absolute;
                top: -20px;
                left: 0;
                width: 50%;
                height: 20px;
                border-top: 2px solid #991b1b;
            }

            .tree-child-item::after {
                content: '';
                position: absolute;
                top: -20px;
                right: 0;
                width: 50%;
                height: 20px;
                border-top: 2px solid #991b1b;
            }

            .tree-child-item:first-child::before { border-top: none; }
            .tree-child-item:last-child::after { border-top: none; }
            .tree-child-item:only-child::before,
            .tree-child-item:only-child::after { border-top: none; }

            .tree-child-item > .tree-node-wrapper::before {
                content: '';
                position: absolute;
                top: -20px;
                left: 50%;
                transform: translateX(-50%);
                width: 2px;
                height: 20px;
                background-color: #991b1b;
            }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen selection:bg-red-900 selection:text-white pb-12">

    <!-- Header Navigation -->
    <nav class="bg-red-950 text-white p-4 shadow-md sticky top-0 z-50 border-b border-red-900">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-2">
            <a href="/" class="flex items-center gap-2 font-bold text-sm sm:text-base hover:text-red-200 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
            </a>
            <span class="font-semibold text-xs sm:text-sm bg-red-900 border border-red-800 px-3 py-1 rounded-full flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Kabinet Genesis
            </span>
        </div>
    </nav>

    <!-- Main Content Header -->
    <div class="max-w-7xl mx-auto p-4 sm:p-8">
        <div class="text-center mb-6">
            <span class="text-xs font-bold uppercase tracking-widest text-red-900 bg-red-100 px-3 py-1.5 rounded-full border border-red-200">
                <i class="fa-solid fa-sitemap mr-1"></i> Interactive Process Tree
            </span>
            <h1 class="text-2xl sm:text-4xl font-extrabold text-red-950 uppercase tracking-wider mt-3">
                Struktur Organisasi
            </h1>
            <p class="text-slate-600 text-xs sm:text-sm mt-1 max-w-lg mx-auto">
                Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang 2026/2027
            </p>
            <div class="mt-4 inline-flex items-center gap-2 text-xs bg-amber-50 text-amber-900 border border-amber-200 px-3.5 py-1.5 rounded-xl">
                <i class="fa-solid fa-hand-pointer text-amber-600"></i>
                <span>Klik pada kartu untuk menyembunyikan / memunculkan cabang pengurus.</span>
            </div>
        </div>

        <!-- Controls Bar (Buka / Tutup Semua) -->
        <div class="flex justify-center items-center gap-3 mb-8">
            <button onclick="expandAll()" class="bg-red-950 hover:bg-red-900 text-white text-xs font-semibold px-4 py-2 rounded-xl shadow transition flex items-center gap-1.5">
                <i class="fa-solid fa-folder-open"></i> Buka Semua
            </button>
            <button onclick="collapseAll()" class="bg-slate-200 hover:bg-slate-300 text-slate-800 text-xs font-semibold px-4 py-2 rounded-xl shadow-sm transition flex items-center gap-1.5">
                <i class="fa-solid fa-folder"></i> Tutup Semua
            </button>
        </div>

        <!-- LAYOUT DESKTOP (Interactive Tree View - Dynamic Auto Fit) -->
        <div class="hidden lg:flex justify-center items-center w-full overflow-x-auto pb-12 pt-2">
            <div class="w-full max-w-7xl mx-auto flex justify-center">
                <div class="tree-node-wrapper w-full">
                    <!-- Ketua dan Wakil Ketua NODE -->
                    <div onclick="toggleBranch('presidium-branch', 'presidium-btn')" class="cursor-pointer group relative bg-red-950 text-white border-2 border-red-900 p-3.5 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 w-64 text-center hover:-translate-y-1 mx-auto">
                        <div class="flex items-center justify-center gap-1.5 text-[10px] font-bold text-red-300 uppercase tracking-wider mb-1">
                            <span>Ketua dan Wakil Ketua</span>
                            <i id="presidium-btn" class="fa-solid fa-chevron-up text-xs ml-1 transition-transform"></i>
                        </div>
                        <div class="font-extrabold text-base">Rafli Fahrezi</div>
                        <div class="text-[11px] text-red-200 font-medium">Ketua HIMSI</div>
                        <div class="border-t border-red-800/80 my-1.5"></div>
                        <div class="font-extrabold text-base">Neyna Carissa</div>
                        <div class="text-[11px] text-red-200 font-medium">Wakil Ketua HIMSI</div>
                    </div>

                    <!-- PRESIDIUM BRANCH (CHILDREN) -->
                    <div id="presidium-branch" class="collapsible-content w-full">
                        <div class="tree-children">
                            <!-- SEKRETARIS NODE -->
                            <div class="tree-child-item">
                                <div class="tree-node-wrapper">
                                    <div onclick="toggleBranch('sekretaris-branch', 'sekretaris-btn')" class="cursor-pointer bg-red-900 hover:bg-red-800 text-white p-3 rounded-2xl shadow-md border border-red-700 w-44 text-center transition group hover:-translate-y-0.5">
                                        <div class="flex items-center justify-center gap-1 text-[10px] font-bold text-red-200 uppercase">
                                            <span>Sekretaris</span>
                                            <i id="sekretaris-btn" class="fa-solid fa-chevron-up text-[10px] transition-transform"></i>
                                        </div>
                                        <div id="sekretaris-branch" class="collapsible-content mt-1">
                                            <div class="text-[11px] font-bold mt-1 text-slate-100">1. Novita Zahra</div>
                                            <div class="text-[11px] font-bold text-slate-100">2. M Fajrun Naafi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- KOORDINATOR DIVISI NODE -->
                            <div class="tree-child-item">
                                <div class="tree-node-wrapper">
                                    <div onclick="toggleBranch('koor-branch', 'koor-btn')" class="cursor-pointer bg-red-900 hover:bg-red-800 text-white p-3 rounded-2xl shadow-md border border-red-700 w-48 text-center transition group hover:-translate-y-0.5">
                                        <div class="flex items-center justify-center gap-1 text-[10px] font-bold text-red-200 uppercase">
                                            <span>Koordinator Divisi</span>
                                            <i id="koor-btn" class="fa-solid fa-chevron-up text-[10px] transition-transform"></i>
                                        </div>
                                        <div class="text-xs font-extrabold mt-1">Muhamad Dimyati</div>
                                    </div>

                                    <!-- DIVISI CHILDREN BRANCH -->
                                    <div id="koor-branch" class="collapsible-content">
                                        <div class="tree-children">
                                            <!-- Divisi Pendidikan -->
                                            <div class="tree-child-item">
                                                <div class="tree-node-wrapper">
                                                    <div onclick="toggleBranch('div-pendidikan', 'pend-btn')" class="cursor-pointer bg-white hover:bg-slate-50 border-2 border-red-900 p-3 rounded-2xl shadow-md w-40 text-left transition group">
                                                        <div class="flex justify-between items-center text-[10px] font-extrabold text-red-950 uppercase border-b border-red-100 pb-1 mb-1.5">
                                                            <span>Pendidikan</span>
                                                            <i id="pend-btn" class="fa-solid fa-chevron-up text-red-800 text-[10px] transition-transform"></i>
                                                        </div>
                                                        <div id="div-pendidikan" class="collapsible-content text-[11px] text-slate-700 space-y-1 font-medium">
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Firda Nur Sopiarahma</div>
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> M Rizky R.</div>
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Teguh F.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Divisi Humas -->
                                            <div class="tree-child-item">
                                                <div class="tree-node-wrapper">
                                                    <div onclick="toggleBranch('div-humas', 'humas-btn')" class="cursor-pointer bg-white hover:bg-slate-50 border-2 border-red-900 p-3 rounded-2xl shadow-md w-44 text-left transition group">
                                                        <div class="flex justify-between items-center text-[10px] font-extrabold text-red-950 uppercase border-b border-red-100 pb-1 mb-1.5">
                                                            <span>Humas Int & Eks</span>
                                                            <i id="humas-btn" class="fa-solid fa-chevron-up text-red-800 text-[10px] transition-transform"></i>
                                                        </div>
                                                        <div id="div-humas" class="collapsible-content text-[11px] text-slate-700 space-y-1 font-medium">
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Risnanda Mei D.</div>
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Ronal Ardiyansah</div>
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Salwania A.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Divisi PDD -->
                                            <div class="tree-child-item">
                                                <div class="tree-node-wrapper">
                                                    <div onclick="toggleBranch('div-pdd', 'pdd-btn')" class="cursor-pointer bg-white hover:bg-slate-50 border-2 border-red-900 p-3 rounded-2xl shadow-md w-40 text-left transition group">
                                                        <div class="flex justify-between items-center text-[10px] font-extrabold text-red-950 uppercase border-b border-red-100 pb-1 mb-1.5">
                                                            <span>Divisi PDD</span>
                                                            <i id="pdd-btn" class="fa-solid fa-chevron-up text-red-800 text-[10px] transition-transform"></i>
                                                        </div>
                                                        <div id="div-pdd" class="collapsible-content text-[11px] text-slate-700 space-y-1 font-medium">
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Dinda Rahmi R.</div>
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Andika Rizky P.</div>
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Alvina Ramadani</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Divisi Logistik -->
                                            <div class="tree-child-item">
                                                <div class="tree-node-wrapper">
                                                    <div onclick="toggleBranch('div-logistik', 'log-btn')" class="cursor-pointer bg-white hover:bg-slate-50 border-2 border-red-900 p-3 rounded-2xl shadow-md w-40 text-left transition group">
                                                        <div class="flex justify-between items-center text-[10px] font-extrabold text-red-950 uppercase border-b border-red-100 pb-1 mb-1.5">
                                                            <span>Divisi Logistik</span>
                                                            <i id="log-btn" class="fa-solid fa-chevron-up text-red-800 text-[10px] transition-transform"></i>
                                                        </div>
                                                        <div id="div-logistik" class="collapsible-content text-[11px] text-slate-700 space-y-1 font-medium">
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Satria Radityo M.</div>
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Maisatul H.</div>
                                                            <div class="flex items-center gap-1"><i class="fa-solid fa-user-check text-[9px] text-red-800"></i> Hani Qurrotu A.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BENDAHARA NODE -->
                            <div class="tree-child-item">
                                <div class="tree-node-wrapper">
                                    <div onclick="toggleBranch('bendahara-branch', 'bendahara-btn')" class="cursor-pointer bg-red-900 hover:bg-red-800 text-white p-3 rounded-2xl shadow-md border border-red-700 w-44 text-center transition group hover:-translate-y-0.5">
                                        <div class="flex items-center justify-center gap-1 text-[10px] font-bold text-red-200 uppercase">
                                            <span>Bendahara</span>
                                            <i id="bendahara-btn" class="fa-solid fa-chevron-up text-[10px] transition-transform"></i>
                                        </div>
                                        <div id="bendahara-branch" class="collapsible-content mt-1">
                                            <div class="text-[11px] font-bold mt-1 text-slate-100">1. Julia Nurmawati</div>
                                            <div class="text-[11px] font-bold text-slate-100">2. Silvia Azzlina E.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LAYOUT MOBILE & TABLET (Interactive Vertical Accordions) -->
        <div class="lg:hidden max-w-md mx-auto space-y-4">
            <!-- Presidium Card Mobile -->
            <div onclick="toggleBranch('mob-presidium', 'mob-pres-btn')" class="cursor-pointer bg-red-950 text-white p-5 rounded-2xl shadow-md border border-red-900 relative">
                <div class="flex justify-between items-center border-b border-red-800 pb-2 mb-2">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-red-300 bg-red-900 px-2.5 py-1 rounded-full border border-red-700">
                        Ketua dan Wakil Ketua
                    </span>
                    <i id="mob-pres-btn" class="fa-solid fa-chevron-up text-red-300 transition-transform"></i>
                </div>
                <div id="mob-presidium" class="collapsible-content">
                    <div class="mt-2">
                        <div class="text-lg font-extrabold">Rafli Fahrezi</div>
                        <div class="text-xs text-red-200">Ketua HIMSI</div>
                    </div>
                    <div class="border-t border-red-800 my-2.5"></div>
                    <div>
                        <div class="text-lg font-extrabold">Neyna Carissa</div>
                        <div class="text-xs text-red-200">Wakil Ketua HIMSI</div>
                    </div>
                </div>
            </div>

            <!-- Sekretaris & Bendahara Grid Mobile -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div onclick="toggleBranch('mob-sekretaris', 'mob-sek-btn')" class="cursor-pointer bg-red-900 text-white p-4 rounded-2xl shadow border border-red-800">
                    <div class="flex justify-between items-center text-[10px] font-bold text-red-200 uppercase mb-1">
                        <span>Sekretaris</span>
                        <i id="mob-sek-btn" class="fa-solid fa-chevron-up transition-transform"></i>
                    </div>
                    <div id="mob-sekretaris" class="collapsible-content">
                        <div class="text-xs font-bold mt-2 text-slate-100">1. Novita Zahra</div>
                        <div class="text-xs font-bold text-slate-100">2. M Fajrun Naafi</div>
                    </div>
                </div>

                <div onclick="toggleBranch('mob-bendahara', 'mob-bend-btn')" class="cursor-pointer bg-red-900 text-white p-4 rounded-2xl shadow border border-red-800">
                    <div class="flex justify-between items-center text-[10px] font-bold text-red-200 uppercase mb-1">
                        <span>Bendahara</span>
                        <i id="mob-bend-btn" class="fa-solid fa-chevron-up transition-transform"></i>
                    </div>
                    <div id="mob-bendahara" class="collapsible-content">
                        <div class="text-xs font-bold mt-2 text-slate-100">1. Julia Nurmawati</div>
                        <div class="text-xs font-bold text-slate-100">2. Silvia Azzlina E.</div>
                    </div>
                </div>
            </div>

            <!-- Koordinator Divisi Header Mobile -->
            <div onclick="toggleBranch('mob-divisi-group', 'mob-koor-btn')" class="cursor-pointer bg-red-900 text-white p-4 rounded-2xl shadow border border-red-800 flex justify-between items-center">
                <div class="text-left">
                    <div class="text-[10px] font-bold text-red-200 uppercase">Koordinator Divisi</div>
                    <div class="text-base font-extrabold text-white mt-0.5">Muhamad Dimyati</div>
                </div>
                <div class="flex items-center gap-1.5 text-xs bg-red-950 px-3 py-1.5 rounded-xl border border-red-700">
                    <span>Divisi</span>
                    <i id="mob-koor-btn" class="fa-solid fa-chevron-up transition-transform"></i>
                </div>
            </div>

            <!-- Divisi List Accordions Mobile -->
            <div id="mob-divisi-group" class="collapsible-content space-y-3">
                <div onclick="toggleBranch('mob-pend', 'mob-pend-btn')" class="cursor-pointer bg-white rounded-2xl border-2 border-red-900 p-4 shadow-sm">
                    <div class="flex justify-between items-center font-bold text-red-950 text-sm border-b pb-2">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-graduation-cap text-red-900"></i> Divisi Pendidikan</span>
                        <i id="mob-pend-btn" class="fa-solid fa-chevron-up text-red-800 text-xs transition-transform"></i>
                    </div>
                    <div id="mob-pend" class="collapsible-content mt-2">
                        <ul class="text-xs text-slate-700 space-y-2 pt-1 font-medium">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Firda Nur Sopiarahma</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> M Rizky Ramadhan</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Teguh Firmansyah</li>
                        </ul>
                    </div>
                </div>

                <div onclick="toggleBranch('mob-humas', 'mob-humas-btn')" class="cursor-pointer bg-white rounded-2xl border-2 border-red-900 p-4 shadow-sm">
                    <div class="flex justify-between items-center font-bold text-red-950 text-sm border-b pb-2">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-bullhorn text-red-900"></i> Humas Eksternal & Internal</span>
                        <i id="mob-humas-btn" class="fa-solid fa-chevron-up text-red-800 text-xs transition-transform"></i>
                    </div>
                    <div id="mob-humas" class="collapsible-content mt-2">
                        <ul class="text-xs text-slate-700 space-y-2 pt-1 font-medium">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Risnanda Mei Damayanti</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Ronal Ardiyansah</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Salwania Azzizah Nst</li>
                        </ul>
                    </div>
                </div>

                <div onclick="toggleBranch('mob-pdd', 'mob-pdd-btn')" class="cursor-pointer bg-white rounded-2xl border-2 border-red-900 p-4 shadow-sm">
                    <div class="flex justify-between items-center font-bold text-red-950 text-sm border-b pb-2">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-camera text-red-900"></i> Divisi PDD</span>
                        <i id="mob-pdd-btn" class="fa-solid fa-chevron-up text-red-800 text-xs transition-transform"></i>
                    </div>
                    <div id="mob-pdd" class="collapsible-content mt-2">
                        <ul class="text-xs text-slate-700 space-y-2 pt-1 font-medium">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Dinda Rahmi Ramadhani</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Andika Rizky Pratama</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Alvina Ramadani</li>
                        </ul>
                    </div>
                </div>

                <div onclick="toggleBranch('mob-log', 'mob-log-btn')" class="cursor-pointer bg-white rounded-2xl border-2 border-red-900 p-4 shadow-sm">
                    <div class="flex justify-between items-center font-bold text-red-950 text-sm border-b pb-2">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-boxes-packing text-red-900"></i> Divisi Logistik</span>
                        <i id="mob-log-btn" class="fa-solid fa-chevron-up text-red-800 text-xs transition-transform"></i>
                    </div>
                    <div id="mob-log" class="collapsible-content mt-2">
                        <ul class="text-xs text-slate-700 space-y-2 pt-1 font-medium">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Satria Radityo Mumtaz</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Maisatul Hikmah</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-user-check text-red-800 text-[11px]"></i> Hani Qurrotu Aini</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Interactive System -->
    <script>
        function toggleBranch(elementId, iconId) {
            const content = document.getElementById(elementId);
            const icon = document.getElementById(iconId);

            if (!content) return;

            if (content.classList.contains('collapsed')) {
                content.classList.remove('collapsed');
                if (icon) icon.style.transform = 'rotate(0deg)';
            } else {
                content.classList.add('collapsed');
                if (icon) icon.style.transform = 'rotate(180deg)';
            }
        }

        function expandAll() {
            document.querySelectorAll('.collapsible-content').forEach(el => {
                el.classList.remove('collapsed');
            });
            document.querySelectorAll('.fa-chevron-up').forEach(icon => {
                icon.style.transform = 'rotate(0deg)';
            });
        }

        function collapseAll() {
            document.querySelectorAll('.collapsible-content').forEach(el => {
                el.classList.add('collapsed');
            });
            document.querySelectorAll('.fa-chevron-up').forEach(icon => {
                icon.style.transform = 'rotate(180deg)';
            });
        }
    </script>
</body>
</html>