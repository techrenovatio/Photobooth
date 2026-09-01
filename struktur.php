<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - HIMSI UNIS Kabinet Genesis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Process / Org Tree Styling */
        .tree ul {
            padding-top: 20px; position: relative;
            transition: all 0.5s;
        }
        .tree li {
            float: left; text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
            transition: all 0.5s;
        }
        .tree li::before, .tree li::after {
            content: ''; position: absolute; top: 0; right: 50%;
            border-top: 2px solid #7f1d1d;
            width: 50%; height: 20px;
        }
        .tree li::after {
            right: auto; left: 50%;
            border-left: 2px solid #7f1d1d;
        }
        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }
        .tree li:only-child { padding-top: 0;}
        .tree li:first-child::before, .tree li:last-child::after {
            border: 0 none;
        }
        .tree li:last-child::before{
            border-right: 2px solid #7f1d1d;
            border-radius: 0 5px 0 0;
        }
        .tree li:first-child::after{
            border-radius: 5px 0 0 0;
        }
        .tree ul ul::before{
            content: ''; position: absolute; top: 0; left: 50%;
            border-left: 2px solid #7f1d1d;
            width: 0; height: 20px;
        }
        .node-card {
            border: 1px solid #991b1b;
            padding: 10px 15px;
            display: inline-block;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            min-width: 150px;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen">
    <!-- Header Navigation -->
    <nav class="bg-red-950 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="flex items-center gap-2 font-bold text-lg hover:text-red-200 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
            </a>
            <span class="font-semibold text-sm bg-red-800 px-3 py-1 rounded-full">Kabinet Genesis 2026/2027</span>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto p-6 overflow-x-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-red-950 uppercase tracking-wider">Struktur Organisasi</h1>
            <p class="text-slate-600 mt-2">Himpunan Mahasiswa Sistem Informasi (HIMSI) UNIS Tangerang</p>
        </div>

        <div class="tree flex justify-center min-w-[1000px]">
            <ul>
                <!-- KETUA & WAKIL -->
                <li>
                    <div class="node-card bg-red-900 text-white border-red-950">
                        <div class="text-xs uppercase font-semibold text-red-200">Presidium Utama</div>
                        <div class="font-bold text-lg mt-1">Rafli Fahrezi</div>
                        <div class="text-xs text-red-100">Ketua HIMSI</div>
                        <div class="border-t border-red-700 my-2"></div>
                        <div class="font-bold text-lg">Neyna Carissa</div>
                        <div class="text-xs text-red-100">Wakil Ketua HIMSI</div>
                    </div>

                    <ul>
                        <!-- SEKRETARIS, BENDAHARA & KOORDINATOR -->
                        <li>
                            <div class="node-card bg-red-800 text-white border-red-900">
                                <div class="text-xs font-semibold text-red-200">Sekretaris</div>
                                <div class="text-sm font-bold mt-1">1. Novita Zahra</div>
                                <div class="text-sm font-bold">2. M Fajrun Naafi</div>
                            </div>
                        </li>
                        <li>
                            <div class="node-card bg-red-800 text-white border-red-900">
                                <div class="text-xs font-semibold text-red-200">Koordinator Divisi</div>
                                <div class="text-base font-bold mt-1">Muhamad Dimyati</div>
                            </div>

                            <!-- DIVISI-DIVISI -->
                            <ul>
                                <li>
                                    <div class="node-card bg-white text-slate-800">
                                        <div class="text-xs font-bold text-red-900 uppercase">Divisi Pendidikan</div>
                                        <div class="text-xs mt-2 text-slate-600">
                                            <div>Firda Sofia</div>
                                            <div>M Rizky Ramadhan</div>
                                            <div>Teguh Firmansyah</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="node-card bg-white text-slate-800">
                                        <div class="text-xs font-bold text-red-900 uppercase">Humas Eksternal & Internal</div>
                                        <div class="text-xs mt-2 text-slate-600">
                                            <div>Risnanda Mei Damayanti</div>
                                            <div>Ronal Ardiyansah</div>
                                            <div>Salwania Azzizah Nst</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="node-card bg-white text-slate-800">
                                        <div class="text-xs font-bold text-red-900 uppercase">Divisi PDD</div>
                                        <div class="text-xs mt-2 text-slate-600">
                                            <div>Dinda Rahmi Ramadhani</div>
                                            <div>Andika Rizky Pratama</div>
                                            <div>Alvina Ramadani</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="node-card bg-white text-slate-800">
                                        <div class="text-xs font-bold text-red-900 uppercase">Divisi Logistik</div>
                                        <div class="text-xs mt-2 text-slate-600">
                                            <div>Satria Radityo Mumtaz</div>
                                            <div>Maisatul Hikmah</div>
                                            <div>Hani Qurrotu Aini</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="node-card bg-red-800 text-white border-red-900">
                                <div class="text-xs font-semibold text-red-200">Bendahara</div>
                                <div class="text-sm font-bold mt-1">1. Julia Nurmawati</div>
                                <div class="text-sm font-bold">2. Silvia Azzlina E.</div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>