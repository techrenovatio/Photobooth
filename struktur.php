2026/2027
            </p>
        </div>

        <div class="flex justify-center items-center gap-3 mb-10">
            <button onclick="expandAll()" class="bg-himsi-navy hover:bg-slate-800 text-white text-xs font-semibold px-5 py-2.5 rounded-xl shadow-md transition flex items-center gap-2">
                <i class="fa-solid fa-folder-open text-himsi-gold"></i> Buka Semua
            </button>
            <button onclick="collapseAll()" class="bg-white hover:bg-slate-50 text-himsi-navy text-xs font-semibold px-5 py-2.5 rounded-xl shadow-md border border-slate-200 transition flex items-center gap-2">
                <i class="fa-solid fa-folder"></i> Tutup Semua
            </button>
        </div>

        <!-- DESKTOP VIEW -->
        <div class="hidden lg:flex justify-center items-center w-full overflow-x-auto pb-12 pt-2">
            <div class="w-full max-w-max mx-auto flex justify-center px-10">
                <div class="tree-node-wrapper w-full">
                    
                    <!-- KETUA & WAKIL NODE -->
                    <div onclick="toggleBranch('presidium-branch', 'presidium-btn')" class="cursor-pointer group relative bg-himsi-maroon text-white border-2 border-himsi-gold p-4 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 w-80 text-center hover:-translate-y-1 mx-auto">
                        <div class="flex items-center justify-center gap-2 text-[11px] font-bold text-himsi-gold uppercase tracking-widest mb-3 border-b border-red-900/50 pb-2">
                            <span>Presidium Utama</span>
                            <i id="presidium-btn" class="fa-solid fa-chevron-up text-xs transition-transform"></i>
                        </div>
                        <div class="flex flex-col gap-2">
                            
        <div class="flex items-center gap-3 bg-red-950/40 border-red-900/50 p-2 rounded-xl border transition">
            <img src="Rafli Fahrezi.jpg" alt="Rafli Fahrezi" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Rafli+Fahrezi&background=6b0f1a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Rafli Fahrezi</div>
                <div class="text-[10px] text-himsi-cream/80">Ketua HIMSI</div>
            </div>
        </div>
                            
        <div class="flex items-center gap-3 bg-red-950/40 border-red-900/50 p-2 rounded-xl border transition">
            <img src="Neyna Carissa.jpg" alt="Neyna Carissa" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Neyna+Carissa&background=6b0f1a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Neyna Carissa</div>
                <div class="text-[10px] text-himsi-cream/80">Wakil Ketua HIMSI</div>
            </div>
        </div>
                        </div>
                    </div>

                    <!-- LEVEL 2 BRANCHES -->
                    <div id="presidium-branch" class="collapsible-content w-full">
                        <div class="tree-children">
                            
                            <!-- SEKRETARIS NODE -->
                            <div class="tree-child-item">
                                <div class="tree-node-wrapper">
                                    <div onclick="toggleBranch('sekretaris-branch', 'sekretaris-btn')" class="cursor-pointer bg-himsi-navy text-white p-3.5 rounded-2xl shadow-lg border-2 border-slate-700 hover:border-himsi-gold w-64 text-center transition group hover:-translate-y-1">
                                        <div class="flex items-center justify-center gap-2 text-[10px] font-bold text-himsi-gold uppercase mb-2">
                                            <span>Sekretaris</span>
                                            <i id="sekretaris-btn" class="fa-solid fa-chevron-up text-[10px] transition-transform"></i>
                                        </div>
                                        <div id="sekretaris-branch" class="collapsible-content flex flex-col gap-1.5">
                                            
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="Novita Zahra.jpg" alt="Novita Zahra" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Novita+Zahra&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Novita Zahra</div>
                <div class="text-[10px] text-himsi-cream/80">Sekretaris 1</div>
            </div>
        </div>
                                            
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="M Fajrun Naafi.jpg" alt="M Fajrun Naafi" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=M+Fajrun+Naafi&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">M Fajrun Naafi</div>
                <div class="text-[10px] text-himsi-cream/80">Sekretaris 2</div>
            </div>
        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- KOORDINATOR DIVISI NODE -->
                            <div class="tree-child-item">
                                <div class="tree-node-wrapper">
                                    <div onclick="toggleBranch('koor-branch', 'koor-btn')" class="cursor-pointer bg-himsi-navy text-white p-3.5 rounded-2xl shadow-lg border-2 border-slate-700 hover:border-himsi-gold w-64 text-center transition group hover:-translate-y-1">
                                        <div class="flex items-center justify-center gap-2 text-[10px] font-bold text-himsi-gold uppercase mb-2">
                                            <span>Koordinator Divisi</span>
                                            <i id="koor-btn" class="fa-solid fa-chevron-up text-[10px] transition-transform"></i>
                                        </div>
                                        
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="Muhamad Dimyati.jpg" alt="Muhamad Dimyati" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Muhamad+Dimyati&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Muhamad Dimyati</div>
                <div class="text-[10px] text-himsi-cream/80">Koordinator Divisi</div>
            </div>
        </div>
                                    </div>

                                    <!-- LEVEL 3: DIVISI BRANCHES -->
                                    <div id="koor-branch" class="collapsible-content">
                                        <div class="tree-children">
                                            
                                            <!-- PENDIDIKAN -->
                                            <div class="tree-child-item">
                                                <div class="tree-node-wrapper">
                                                    <div onclick="toggleBranch('div-pendidikan', 'pend-btn')" class="cursor-pointer bg-white border-2 border-himsi-maroon p-3.5 rounded-2xl shadow-lg w-64 text-left transition group hover:-translate-y-1">
                                                        <div class="flex justify-between items-center text-[11px] font-extrabold text-himsi-navy uppercase border-b border-gray-200 pb-2 mb-2">
                                                            <span class="flex items-center gap-1.5"><i class="fa-solid fa-graduation-cap text-himsi-maroon"></i> Pendidikan</span>
                                                            <i id="pend-btn" class="fa-solid fa-chevron-up text-himsi-maroon transition-transform"></i>
                                                        </div>
                                                        <div id="div-pendidikan" class="collapsible-content flex flex-col gap-1.5">
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Firda Nur Sopiarahma.jpg" alt="Firda Nur Sopiarahma" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Firda+Nur+Sopiarahma&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Firda Nur Sopiarahma</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="M Rizky Ramadhan.png" alt="M Rizky Ramadhan" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=M+Rizky+Ramadhan&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">M Rizky Ramadhan</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Teguh Firmansyah.jpg" alt="Teguh Firmansyah" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Teguh+Firmansyah&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Teguh Firmansyah</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- HUMAS -->
                                            <div class="tree-child-item">
                                                <div class="tree-node-wrapper">
                                                    <div onclick="toggleBranch('div-humas', 'humas-btn')" class="cursor-pointer bg-white border-2 border-himsi-maroon p-3.5 rounded-2xl shadow-lg w-64 text-left transition group hover:-translate-y-1">
                                                        <div class="flex justify-between items-center text-[11px] font-extrabold text-himsi-navy uppercase border-b border-gray-200 pb-2 mb-2">
                                                            <span class="flex items-center gap-1.5"><i class="fa-solid fa-bullhorn text-himsi-maroon"></i> Humas Int & Eks</span>
                                                            <i id="humas-btn" class="fa-solid fa-chevron-up text-himsi-maroon transition-transform"></i>
                                                        </div>
                                                        <div id="div-humas" class="collapsible-content flex flex-col gap-1.5">
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Risnanda Mei Damayanti.jpg" alt="Risnanda Mei Damayanti" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Risnanda+Mei+Damayanti&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Risnanda Mei Damayanti</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Ronal Ardiyansah.jpg" alt="Ronal Ardiyansah" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Ronal+Ardiyansah&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Ronal Ardiyansah</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Salwania Azzizah Nst.jpg" alt="Salwania Azzizah Nst" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Salwania+Azzizah+Nst&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Salwania Azzizah Nst</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- PDD -->
                                            <div class="tree-child-item">
                                                <div class="tree-node-wrapper">
                                                    <div onclick="toggleBranch('div-pdd', 'pdd-btn')" class="cursor-pointer bg-white border-2 border-himsi-maroon p-3.5 rounded-2xl shadow-lg w-64 text-left transition group hover:-translate-y-1">
                                                        <div class="flex justify-between items-center text-[11px] font-extrabold text-himsi-navy uppercase border-b border-gray-200 pb-2 mb-2">
                                                            <span class="flex items-center gap-1.5"><i class="fa-solid fa-camera text-himsi-maroon"></i> Divisi PDD</span>
                                                            <i id="pdd-btn" class="fa-solid fa-chevron-up text-himsi-maroon transition-transform"></i>
                                                        </div>
                                                        <div id="div-pdd" class="collapsible-content flex flex-col gap-1.5">
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Dinda Rahmi Ramadhani.jpg" alt="Dinda Rahmi Ramadhani" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Dinda+Rahmi+Ramadhani&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Dinda Rahmi Ramadhani</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Andika Rizky Pratama.jpg" alt="Andika Rizky Pratama" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Andika+Rizky+Pratama&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Andika Rizky Pratama</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Alvina Ramadani.jpg" alt="Alvina Ramadani" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Alvina+Ramadani&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Alvina Ramadani</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- LOGISTIK -->
                                            <div class="tree-child-item">
                                                <div class="tree-node-wrapper">
                                                    <div onclick="toggleBranch('div-log', 'log-btn')" class="cursor-pointer bg-white border-2 border-himsi-maroon p-3.5 rounded-2xl shadow-lg w-64 text-left transition group hover:-translate-y-1">
                                                        <div class="flex justify-between items-center text-[11px] font-extrabold text-himsi-navy uppercase border-b border-gray-200 pb-2 mb-2">
                                                            <span class="flex items-center gap-1.5"><i class="fa-solid fa-boxes-packing text-himsi-maroon"></i> Logistik</span>
                                                            <i id="log-btn" class="fa-solid fa-chevron-up text-himsi-maroon transition-transform"></i>
                                                        </div>
                                                        <div id="div-log" class="collapsible-content flex flex-col gap-1.5">
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Satria Radityo Mumtaz.jpg" alt="Satria Radityo Mumtaz" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Satria+Radityo+Mumtaz&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Satria Radityo Mumtaz</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Maisatul Hikmah.jpg" alt="Maisatul Hikmah" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Maisatul+Hikmah&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Maisatul Hikmah</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                                                            
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Hani Qurrotu Aini.jpg" alt="Hani Qurrotu Aini" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Hani+Qurrotu+Aini&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Hani Qurrotu Aini</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
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
                                    <div onclick="toggleBranch('bendahara-branch', 'bendahara-btn')" class="cursor-pointer bg-himsi-navy text-white p-3.5 rounded-2xl shadow-lg border-2 border-slate-700 hover:border-himsi-gold w-64 text-center transition group hover:-translate-y-1">
                                        <div class="flex items-center justify-center gap-2 text-[10px] font-bold text-himsi-gold uppercase mb-2">
                                            <span>Bendahara</span>
                                            <i id="bendahara-btn" class="fa-solid fa-chevron-up text-[10px] transition-transform"></i>
                                        </div>
                                        <div id="bendahara-branch" class="collapsible-content flex flex-col gap-1.5">
                                            
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="Julia Nurmawati.jpg" alt="Julia Nurmawati" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Julia+Nurmawati&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Julia Nurmawati</div>
                <div class="text-[10px] text-himsi-cream/80">Bendahara 1</div>
            </div>
        </div>
                                            
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="Silvia Azzlina Endraeni.jpg" alt="Silvia Azzlina Endraeni" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Silvia+Azzlina+Endraeni&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Silvia Azzlina Endraeni</div>
                <div class="text-[10px] text-himsi-cream/80">Bendahara 2</div>
            </div>
        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MOBILE VIEW -->
        <div class="lg:hidden max-w-md mx-auto space-y-4">
            
            <!-- PRESIDIUM -->
            <div onclick="toggleBranch('mob-presidium', 'mob-pres-btn')" class="cursor-pointer bg-himsi-maroon text-white p-4 rounded-3xl shadow-lg border-2 border-himsi-gold relative">
                <div class="flex justify-between items-center border-b border-red-900/50 pb-3 mb-3">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-himsi-gold bg-red-950 px-3 py-1.5 rounded-full border border-red-900">
                        Presidium Utama
                    </span>
                    <i id="mob-pres-btn" class="fa-solid fa-chevron-up text-himsi-gold transition-transform"></i>
                </div>
                <div id="mob-presidium" class="collapsible-content flex flex-col gap-2">
                    
        <div class="flex items-center gap-3 bg-red-950/40 border-red-900/50 p-2 rounded-xl border transition">
            <img src="Rafli Fahrezi.jpg" alt="Rafli Fahrezi" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Rafli+Fahrezi&background=6b0f1a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Rafli Fahrezi</div>
                <div class="text-[10px] text-himsi-cream/80">Ketua HIMSI</div>
            </div>
        </div>
                    
        <div class="flex items-center gap-3 bg-red-950/40 border-red-900/50 p-2 rounded-xl border transition">
            <img src="Neyna Carissa.jpg" alt="Neyna Carissa" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Neyna+Carissa&background=6b0f1a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Neyna Carissa</div>
                <div class="text-[10px] text-himsi-cream/80">Wakil Ketua HIMSI</div>
            </div>
        </div>
                </div>
            </div>

            <!-- SEKRETARIS & BENDAHARA -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div onclick="toggleBranch('mob-sekretaris', 'mob-sek-btn')" class="cursor-pointer bg-himsi-navy text-white p-4 rounded-2xl shadow-md border-2 border-slate-700">
                    <div class="flex justify-between items-center text-[10px] font-bold text-himsi-gold uppercase mb-3">
                        <span>Sekretaris</span>
                        <i id="mob-sek-btn" class="fa-solid fa-chevron-up transition-transform"></i>
                    </div>
                    <div id="mob-sekretaris" class="collapsible-content flex flex-col gap-2">
                        
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="Novita Zahra.jpg" alt="Novita Zahra" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Novita+Zahra&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Novita Zahra</div>
                <div class="text-[10px] text-himsi-cream/80">Sekretaris 1</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="M Fajrun Naafi.jpg" alt="M Fajrun Naafi" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=M+Fajrun+Naafi&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">M Fajrun Naafi</div>
                <div class="text-[10px] text-himsi-cream/80">Sekretaris 2</div>
            </div>
        </div>
                    </div>
                </div>

                <div onclick="toggleBranch('mob-bendahara', 'mob-bend-btn')" class="cursor-pointer bg-himsi-navy text-white p-4 rounded-2xl shadow-md border-2 border-slate-700">
                    <div class="flex justify-between items-center text-[10px] font-bold text-himsi-gold uppercase mb-3">
                        <span>Bendahara</span>
                        <i id="mob-bend-btn" class="fa-solid fa-chevron-up transition-transform"></i>
                    </div>
                    <div id="mob-bendahara" class="collapsible-content flex flex-col gap-2">
                        
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="Julia Nurmawati.jpg" alt="Julia Nurmawati" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Julia+Nurmawati&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Julia Nurmawati</div>
                <div class="text-[10px] text-himsi-cream/80">Bendahara 1</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="Silvia Azzlina Endraeni.jpg" alt="Silvia Azzlina Endraeni" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Silvia+Azzlina+Endraeni&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Silvia Azzlina Endraeni</div>
                <div class="text-[10px] text-himsi-cream/80">Bendahara 2</div>
            </div>
        </div>
                    </div>
                </div>
            </div>

            <!-- KOORDINATOR -->
            <div onclick="toggleBranch('mob-divisi-group', 'mob-koor-btn')" class="cursor-pointer bg-himsi-navy text-white p-4 rounded-2xl shadow-md border-2 border-slate-700">
                <div class="flex justify-between items-center mb-3">
                    <div class="text-[10px] font-bold text-himsi-gold uppercase">Koordinator Divisi</div>
                    <i id="mob-koor-btn" class="fa-solid fa-chevron-up text-himsi-gold transition-transform"></i>
                </div>
                
        <div class="flex items-center gap-3 bg-slate-800/40 border-slate-700/50 p-2 rounded-xl border transition">
            <img src="Muhamad Dimyati.jpg" alt="Muhamad Dimyati" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-gold bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Muhamad+Dimyati&background=0f172a&color=fff'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-white">Muhamad Dimyati</div>
                <div class="text-[10px] text-himsi-cream/80">Koordinator Divisi</div>
            </div>
        </div>
            </div>

            <!-- DIVISIONS MOBILE -->
            <div id="mob-divisi-group" class="collapsible-content space-y-4">
                
                <div onclick="toggleBranch('mob-pend', 'mob-pend-btn')" class="cursor-pointer bg-white rounded-2xl border-2 border-himsi-maroon p-4 shadow-sm">
                    <div class="flex justify-between items-center font-bold text-himsi-navy text-sm border-b pb-3 mb-3">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-graduation-cap text-himsi-maroon"></i> Pendidikan</span>
                        <i id="mob-pend-btn" class="fa-solid fa-chevron-up text-himsi-maroon text-xs transition-transform"></i>
                    </div>
                    <div id="mob-pend" class="collapsible-content flex flex-col gap-2">
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Firda Nur Sopiarahma.jpg" alt="Firda Nur Sopiarahma" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Firda+Nur+Sopiarahma&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Firda Nur Sopiarahma</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="M Rizky Ramadhan.png" alt="M Rizky Ramadhan" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=M+Rizky+Ramadhan&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">M Rizky Ramadhan</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Teguh Firmansyah.jpg" alt="Teguh Firmansyah" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Teguh+Firmansyah&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Teguh Firmansyah</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                    </div>
                </div>

                <div onclick="toggleBranch('mob-humas', 'mob-humas-btn')" class="cursor-pointer bg-white rounded-2xl border-2 border-himsi-maroon p-4 shadow-sm">
                    <div class="flex justify-between items-center font-bold text-himsi-navy text-sm border-b pb-3 mb-3">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-bullhorn text-himsi-maroon"></i> Humas Int & Eks</span>
                        <i id="mob-humas-btn" class="fa-solid fa-chevron-up text-himsi-maroon text-xs transition-transform"></i>
                    </div>
                    <div id="mob-humas" class="collapsible-content flex flex-col gap-2">
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Risnanda Mei Damayanti.jpg" alt="Risnanda Mei Damayanti" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Risnanda+Mei+Damayanti&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Risnanda Mei Damayanti</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Ronal Ardiyansah.jpg" alt="Ronal Ardiyansah" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Ronal+Ardiyansah&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Ronal Ardiyansah</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Salwania Azzizah Nst.jpg" alt="Salwania Azzizah Nst" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Salwania+Azzizah+Nst&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Salwania Azzizah Nst</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                    </div>
                </div>

                <div onclick="toggleBranch('mob-pdd', 'mob-pdd-btn')" class="cursor-pointer bg-white rounded-2xl border-2 border-himsi-maroon p-4 shadow-sm">
                    <div class="flex justify-between items-center font-bold text-himsi-navy text-sm border-b pb-3 mb-3">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-camera text-himsi-maroon"></i> Divisi PDD</span>
                        <i id="mob-pdd-btn" class="fa-solid fa-chevron-up text-himsi-maroon text-xs transition-transform"></i>
                    </div>
                    <div id="mob-pdd" class="collapsible-content flex flex-col gap-2">
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Dinda Rahmi Ramadhani.jpg" alt="Dinda Rahmi Ramadhani" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Dinda+Rahmi+Ramadhani&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Dinda Rahmi Ramadhani</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Andika Rizky Pratama.jpg" alt="Andika Rizky Pratama" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Andika+Rizky+Pratama&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Andika Rizky Pratama</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Alvina Ramadani.jpg" alt="Alvina Ramadani" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Alvina+Ramadani&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Alvina Ramadani</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                    </div>
                </div>

                <div onclick="toggleBranch('mob-log', 'mob-log-btn')" class="cursor-pointer bg-white rounded-2xl border-2 border-himsi-maroon p-4 shadow-sm">
                    <div class="flex justify-between items-center font-bold text-himsi-navy text-sm border-b pb-3 mb-3">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-boxes-packing text-himsi-maroon"></i> Divisi Logistik</span>
                        <i id="mob-log-btn" class="fa-solid fa-chevron-up text-himsi-maroon text-xs transition-transform"></i>
                    </div>
                    <div id="mob-log" class="collapsible-content flex flex-col gap-2">
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Satria Radityo Mumtaz.jpg" alt="Satria Radityo Mumtaz" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Satria+Radityo+Mumtaz&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Satria Radityo Mumtaz</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Maisatul Hikmah.jpg" alt="Maisatul Hikmah" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Maisatul+Hikmah&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Maisatul Hikmah</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                        
        <div class="flex items-center gap-3 bg-slate-50 border-slate-100 hover:border-himsi-gold p-2 rounded-xl border transition">
            <img src="Hani Qurrotu Aini.jpg" alt="Hani Qurrotu Aini" class="w-11 h-11 rounded-full object-cover border-2 border-himsi-maroon bg-gray-200" onerror="this.src='https://ui-avatars.com/api/?name=Hani+Qurrotu+Aini&background=f7f1e3&color=6b0f1a'">
            <div class="leading-tight text-left">
                <div class="text-xs font-bold text-himsi-navy">Hani Qurrotu Aini</div>
                <div class="text-[10px] text-gray-500">Anggota</div>
            </div>
        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function toggleBranch(elementId, iconId) {
            const content = document.getElementById(elementId);
            const icon = document.getElementById(iconId);
            if (!content) return;

            // Stop event bubbling if clicking inside an inner card
            if (event && event.stopPropagation) event.stopPropagation();

            if (content.classList.contains('collapsed')) {
                content.classList.remove('collapsed');
                if (icon) icon.style.transform = 'rotate(0deg)';
            } else {
                content.classList.add('collapsed');
                if (icon) icon.style.transform = 'rotate(180deg)';
            }
        }

        function expandAll() {
            document.querySelectorAll('.collapsible-content').forEach(el => el.classList.remove('collapsed'));
            document.querySelectorAll('.fa-chevron-up').forEach(icon => icon.style.transform = 'rotate(0deg)');
        }

        function collapseAll() {
            document.querySelectorAll('.collapsible-content').forEach(el => el.classList.add('collapsed'));
            document.querySelectorAll('.fa-chevron-up').forEach(icon => icon.style.transform = 'rotate(180deg)');
        }
    </script>
</body>
</html>