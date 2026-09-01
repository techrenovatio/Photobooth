<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - HIMSI UNIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Desain Background & Scroll */
        body { background-color: #e2e8f0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .tree-container { width: 100%; height: calc(100vh - 60px); overflow: auto; padding: 40px 20px; cursor: grab; }
        .tree-container:active { cursor: grabbing; }

        /* Struktur CSS Tree (Garis Horizontal) */
        .tree ul {
            padding-top: 30px; position: relative;
            transition: all 0.5s; display: flex; justify-content: center; padding-left: 0;
        }
        .tree li {
            float: left; text-align: center; list-style-type: none;
            position: relative; padding: 30px 10px 0 10px; transition: all 0.5s;
        }
        
        /* Garis Penghubung */
        .tree li::before, .tree li::after {
            content: ''; position: absolute; top: 0; right: 50%;
            border-top: 2px solid #cbd5e1; width: 50%; height: 30px;
        }
        .tree li::after { right: auto; left: 50%; border-left: 2px solid #cbd5e1; }
        .tree li:only-child::after, .tree li:only-child::before { display: none; }
        .tree li:only-child { padding-top: 0; }
        .tree li:first-child::before, .tree li:last-child::after { border: 0 none; }
        
        /* Lengkungan Garis */
        .tree li:last-child::before { border-right: 2px solid #cbd5e1; border-radius: 0 8px 0 0; }
        .tree li:first-child::after { border-radius: 8px 0 0 0; }
        .tree ul ul::before {
            content: ''; position: absolute; top: 0; left: 50%;
            border-left: 2px solid #cbd5e1; width: 0; height: 30px; transform: translateX(-50%);
        }

        /* Desain Kartu / Node */
        .org-node {
            display: inline-flex; flex-direction: column; align-items: center;
            position: relative; padding: 0 10px;
        }
        .avatar-wrapper { position: relative; margin-bottom: 10px; }
        
        .org-node img {
            width: 75px; height: 75px; border-radius: 50%; object-fit: cover;
            border: 4px solid white; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background-color: #f1f5f9; position: relative; z-index: 10;
        }
        
        /* Tombol Plus/Minus */
        .toggle-btn {
            position: absolute; bottom: 0; right: 0;
            background-color: #ea580c; color: white; border-radius: 50%;
            width: 22px; height: 22px; display: flex; align-items: center; justify-content: center;
            font-size: 11px; cursor: pointer; z-index: 20; border: 2px solid white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2); transition: transform 0.2s;
        }
        .toggle-btn:hover { transform: scale(1.1); }
        .no-child .toggle-btn { display: none; }

        .name { font-size: 13px; font-weight: 700; color: #0f172a; white-space: nowrap; }
        .role { font-size: 11px; color: #64748b; margin-top: 2px; white-space: nowrap; }
    </style>
</head>
<body>

    <!-- PHP Helper -->
    <?php
    function renderNode($name, $imgFile, $role, $hasChild = true) {
        $safeName = urlencode($name);
        $fallback = "https://ui-avatars.com/api/?name={$safeName}&background=6b0f1a&color=fff&bold=true";
        $imageSrc = ($imgFile !== "") ? "foto_pengurus/" . $imgFile : $fallback;
        $childClass = $hasChild ? "" : "no-child";
        
        return "
        <div class='org-node {$childClass}'>
            <div class='avatar-wrapper'>
                <!-- Tambah class cursor-pointer dan onclick panggil openModal -->
                <img src='{$imageSrc}' onerror=\"this.src='{$fallback}'\" alt='{$name}' class='cursor-pointer hover:scale-105 transition-transform' onclick='openModal(\"{$name}\", this.src, \"{$role}\")'>
                <div class='toggle-btn' onclick='toggleBranch(this)'><i class='fa-solid fa-minus'></i></div>
            </div>
            <!-- Nama bisa diklik juga -->
            <div class='name cursor-pointer hover:text-red-700 transition-colors' onclick='openModal(\"{$name}\", \"{$imageSrc}\", \"{$role}\")'>{$name}</div>
            <div class='role'>{$role}</div>
        </div>";
    }
    ?>

    <!-- Header UI (Ditambah Tombol Kembali) -->
    <div class="bg-red-950 text-white px-6 py-4 flex items-center shadow-md sticky top-0 z-50 gap-4">
        <a href="index.php" class="flex items-center gap-2 hover:text-red-300 transition border-r border-red-800 pr-4 text-sm font-semibold">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
        <div class="font-bold text-lg tracking-wider">HIMSI UNIS <span class="text-red-300 font-normal text-sm ml-2 hidden sm:inline-block">| Organization Chart</span></div>
    </div>

    <!-- Area Bagan Struktur Organisasi -->
    <div class="tree-container" id="tree-container">
        <div class="tree">
            <ul>
                <li>
                    <?= renderNode("Rafli Fahrezi", "Rafli Fahrezi.png", "Ketua HIMSI") ?>
                    <ul>
                        <li>
                            <?= renderNode("Neyna Carissa", "Neyna Carissa.png", "Wakil Ketua HIMSI") ?>
                            <ul>
                                <!-- SEKRETARIS GROUP -->
                                <li>
                                    <?= renderNode("Sekretaris", "", "Departemen") ?>
                                    <ul>
                                        <li><?= renderNode("Novita Zahra", "Novita Zahra.png", "Sekretaris 1", false) ?></li>
                                        <li><?= renderNode("M Fajrun Naafi", "M Fajrun Naafi.png", "Sekretaris 2", false) ?></li>
                                    </ul>
                                </li>
                                <!-- BENDAHARA GROUP -->
                                <li>
                                    <?= renderNode("Bendahara", "", "Departemen") ?>
                                    <ul>
                                        <li><?= renderNode("Julia Nurmawati", "Julia Nurmawati.png", "Bendahara 1", false) ?></li>
                                        <li><?= renderNode("Silvia Azzlina Endraeni", "Silvia Azzlina Endraeni.png", "Bendahara 2", false) ?></li>
                                    </ul>
                                </li>
                                <!-- KOORDINATOR DIVISI -->
                                <li>
                                    <?= renderNode("Muhamad Dimyati", "Muhamad Dimyati.png", "Koordinator Divisi") ?>
                                    <ul>
                                        <!-- DIVISI PENDIDIKAN -->
                                        <li>
                                            <?= renderNode("Pendidikan", "", "Divisi") ?>
                                            <ul>
                                                <li><?= renderNode("Firda Nur Sopiarahma", "Firda Nur Sopiarahma.png", "Anggota", false) ?></li>
                                                <li><?= renderNode("M Rizky Ramadhan", "M Rizky Ramadhan.png", "Anggota", false) ?></li>
                                                <li><?= renderNode("Teguh Firmansyah", "Teguh Firmansyah.png", "Anggota", false) ?></li>
                                            </ul>
                                        </li>
                                        <!-- DIVISI HUMAS -->
                                        <li>
                                            <?= renderNode("Humas Int & Eks", "", "Divisi") ?>
                                            <ul>
                                                <li><?= renderNode("Risnanda Mei Damayanti", "Risnanda Mei Damayanti.png", "Anggota", false) ?></li>
                                                <li><?= renderNode("Ronal Ardiyansah", "Ronal Ardiyansah.png", "Anggota", false) ?></li>
                                                <li><?= renderNode("Salwania Azzizah Nst", "Salwania Azzizah Nst.png", "Anggota", false) ?></li>
                                            </ul>
                                        </li>
                                        <!-- DIVISI PDD -->
                                        <li>
                                            <?= renderNode("Publikasi & Desain", "", "Divisi PDD") ?>
                                            <ul>
                                                <li><?= renderNode("Dinda Rahmi Ramadhani", "Dinda Rahmi Ramadhani.png", "Anggota", false) ?></li>
                                                <li><?= renderNode("Alvina Ramadani", "Alvina Ramadani.png", "Anggota", false) ?></li>
                                            </ul>
                                        </li>
                                        <!-- DIVISI LOGISTIK -->
                                        <li>
                                            <?= renderNode("Logistik", "", "Divisi") ?>
                                            <ul>
                                                <li><?= renderNode("Satria Radityo Mumtaz", "Satria Radityo Mumtaz.png", "Anggota", false) ?></li>
                                                <li><?= renderNode("Maisatul Hikmah", "Maisatul Hikmah.png", "Anggota", false) ?></li>
                                                <li><?= renderNode("Hani Qurrotu Aini", "Hani Qurrotu Aini.png", "Anggota", false) ?></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- MODAL / POPUP PROFILE -->
    <div id="profileModal" class="fixed inset-0 z-[100] bg-black/60 hidden flex items-center justify-center opacity-0 transition-opacity duration-300 backdrop-blur-sm">
        <div class="bg-white rounded-3xl shadow-2xl p-8 w-80 text-center relative transform scale-95 transition-transform duration-300" id="modalContent">
            <!-- Tombol Close -->
            <button onclick="closeModal()" class="absolute top-4 right-5 text-gray-400 hover:text-red-600 transition text-2xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
            
            <!-- Foto Besar -->
            <img id="modalImg" src="" alt="Profile" class="w-32 h-32 rounded-full object-cover border-4 border-[#d4af37] mx-auto mb-4 shadow-lg bg-gray-100">
            
            <!-- Nama & Jabatan -->
            <h2 id="modalName" class="text-xl font-extrabold text-slate-800">Nama</h2>
            <p id="modalRole" class="text-xs font-semibold text-red-900 bg-red-100 py-1.5 px-4 rounded-full inline-block mt-2 tracking-wide">Jabatan</p>
        </div>
    </div>

    <!-- Javascript -->
    <script>
        // --- FUNGSI BUKA TUTUP CABANG (TREE) ---
        function toggleBranch(btn) {
            const li = btn.closest('li');
            const ul = li.querySelector('ul');
            const icon = btn.querySelector('i');

            if (ul) {
                if (ul.style.display === 'none') {
                    ul.style.display = 'flex';
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                } else {
                    ul.style.display = 'none';
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                }
            }
        }

        // --- FUNGSI DRAG TO SCROLL ---
        const slider = document.getElementById('tree-container');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.style.cursor = 'grabbing';
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => { isDown = false; slider.style.cursor = 'grab'; });
        slider.addEventListener('mouseup', () => { isDown = false; slider.style.cursor = 'grab'; });
        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2;
            slider.scrollLeft = scrollLeft - walk;
        });

        // --- FUNGSI POPUP (MODAL) PROFILE ---
        const modal = document.getElementById('profileModal');
        const modalContent = document.getElementById('modalContent');
        const modalImg = document.getElementById('modalImg');

        function openModal(name, imgSrc, role) {
            // Isi data ke dalam modal
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalRole').textContent = role;
            
            // Setel gambar dan antisipasi jika gambar gagal diload (fallback)
            modalImg.src = imgSrc;
            const safeName = encodeURIComponent(name);
            modalImg.onerror = function() {
                this.src = 'https://ui-avatars.com/api/?name=' + safeName + '&background=6b0f1a&color=fff&bold=true';
            };

            // Tampilkan Modal
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
            }, 10);
        }

        function closeModal() {
            // Sembunyikan dengan animasi
            modal.classList.add('opacity-0');
            modalContent.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Jika area gelap di luar kotak putih di-klik, modal akan menutup
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>
</body>
</html>