<!-- ===== HERO SECTION ===== -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="hero-title animate-up">
                    Selamat Datang di <span class="text-gold">SIMAS</span>
                </h1>
                <p class="hero-subtitle animate-up">
                    Sistem Informasi Manajemen Asrama untuk kemudahan pemesanan aula pertemuan dan kamar penginapan secara mudah, cepat, dan transparan.
                </p>
                <div class="d-flex flex-wrap gap-3 animate-up">
                    <a href="<?= base_url('auth') ?>" class="btn-hero-primary">
                        <i class="fas fa-calendar-check me-2"></i>Booking Sekarang
                    </a>
                    <a href="<?= base_url('landing/fasilitas') ?>" class="btn-hero-outline">
                        <i class="fas fa-eye me-2"></i>Lihat Fasilitas
                    </a>
                </div>
                <div class="hero-stats animate-up">
                    <div class="hero-stat-item">
                        <h3>72</h3>
                        <p>Kamar</p>
                    </div>
                    <div class="hero-stat-item">
                        <h3>2</h3>
                        <p>Aula</p>
                    </div>
                    <div class="hero-stat-item">
                        <h3>4</h3>
                        <p>Lantai</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="hero-image text-center animate-up">
                    <img src="<?= base_url('uploads/fasilitas/gedung_utama.jpg') ?>" alt="Gedung Asrama Haji Pontianak" style="width: 100%; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); border: 4px solid rgba(255,255,255,0.15);">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== FASILITAS KAMI ===== -->
<section class="section-fasilitas">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Fasilitas Kami</h2>
            <p class="section-subtitle">Pilihan aula pertemuan representatif dan kamar penginapan nyaman untuk kebutuhan acara dan istirahat Anda</p>
            <div class="title-decorator"></div>
        </div>

        <div class="row g-4">
            <!-- Aula Besar -->
            <div class="col-lg-4 col-md-6">
                <div class="facility-card">
                    <div class="facility-card-img aula-besar">
                        <img src="<?= base_url('uploads/fasilitas/aula_besar_1.jpg') ?>" alt="Aula Besar">
                    </div>
                    <div class="facility-card-body d-flex flex-column">
                        <h4>Aula Besar</h4>
                        <p>Kapasitas 250 kursi, 10 meja bulat, 12 meja prasmanan, 10 AC dinding, dan 6 AC standing. Sangat ideal untuk seminar besar, resepsi, maupun pertemuan akbar.</p>
                        <div class="small text-muted mb-3">
                            <div class="mb-1"><i class="fas fa-hand-holding-usd text-success me-1"></i> DP: <strong>Rp 2.100.000</strong></div>
                            <div><i class="fas fa-chair text-success me-1"></i> 250 Kursi & Meja Lengkap</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <div class="facility-price">
                                Rp 11.600.000 <small>/ hari</small>
                            </div>
                            <a href="<?= base_url('auth') ?>" class="btn-booking">
                                <i class="fas fa-calendar-plus me-1"></i> Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aula Kecil -->
            <div class="col-lg-4 col-md-6">
                <div class="facility-card">
                    <div class="facility-card-img aula-kecil">
                        <img src="<?= base_url('uploads/fasilitas/aula_besar_2.jpg') ?>" alt="Aula Kecil - Ruang Rias">
                    </div>
                    <div class="facility-card-body d-flex flex-column">
                        <h4>Aula Kecil</h4>
                        <p>Kapasitas 60 kursi dengan fasilitas full AC dan perlengkapan rapat standar. Pilihan tepat untuk rapat dinas, pelatihan, workshop, atau diskusi kelompok.</p>
                        <div class="small text-muted mb-3">
                            <div class="mb-1"><i class="fas fa-clock text-success me-1"></i> 8 Jam: <strong>Rp 600.000</strong></div>
                            <div><i class="fas fa-clock text-success me-1"></i> 12 Jam: <strong>Rp 780.000</strong></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <div class="facility-price">
                                Mulai Rp 600.000 <small>/ 8 jam</small>
                            </div>
                            <a href="<?= base_url('auth') ?>" class="btn-booking">
                                <i class="fas fa-calendar-plus me-1"></i> Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kamar Penginapan -->
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="facility-card">
                    <div class="facility-card-img kamar">
                        <img src="<?= base_url('uploads/fasilitas/kamar_vip_1.jpg') ?>" alt="Kamar VIP">
                    </div>
                    <div class="facility-card-body d-flex flex-column">
                        <h4>Kamar Penginapan</h4>
                        <p>Total 72 kamar penginapan bersih, aman, dan nyaman yang tersedia dalam dua tipe akomodasi:</p>
                        <div class="small text-muted mb-3">
                            <div class="mb-1">
                                <i class="fas fa-bed text-warning me-1"></i> <strong>Standard (4 Bed):</strong> Rp 300.000/malam <span class="badge bg-light text-dark border ms-1">69 Kamar</span>
                            </div>
                            <div>
                                <i class="fas fa-crown text-warning me-1"></i> <strong>VIP (1 King Bed):</strong> Rp 350.000/malam <span class="badge bg-light text-dark border ms-1">3 Kamar (Lt. 2,3,4)</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                            <div class="facility-price">
                                Mulai Rp 300.000 <small>/ malam</small>
                            </div>
                            <a href="<?= base_url('auth') ?>" class="btn-booking">
                                <i class="fas fa-calendar-plus me-1"></i> Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== GALERI FASILITAS ===== -->
<section class="section-gallery">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Galeri Fasilitas</h2>
            <p class="section-subtitle">Lihat langsung kondisi fasilitas aula dan kamar penginapan kami</p>
            <div class="title-decorator"></div>
        </div>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="<?= base_url('uploads/fasilitas/gedung_utama.jpg') ?>" alt="Gedung Asrama Haji Pontianak">
                <div class="gallery-overlay">
                    <h6>Gedung Asrama Haji Pontianak</h6>
                    <small>Jl. Letnan Jendral Sutoyo No.17, Pontianak</small>
                </div>
            </div>
            <div class="gallery-item">
                <img src="<?= base_url('uploads/fasilitas/aula_besar_1.jpg') ?>" alt="Ruang Aula Besar">
                <div class="gallery-overlay">
                    <h6>Ruang Aula Besar</h6>
                    <small>Kapasitas 250 kursi dengan panggung utama</small>
                </div>
            </div>
            <div class="gallery-item">
                <img src="<?= base_url('uploads/fasilitas/aula_besar_3.jpg') ?>" alt="Ruang Cattering">
                <div class="gallery-overlay">
                    <h6>Ruang Cattering</h6>
                    <small>Area persiapan konsumsi</small>
                </div>
            </div>
            <div class="gallery-item">
                <img src="<?= base_url('uploads/fasilitas/kamar_vip_1.jpg') ?>" alt="Kamar VIP">
                <div class="gallery-overlay">
                    <h6>Kamar VIP</h6>
                    <small>1 King Bed, AC, TV, kamar mandi dalam</small>
                </div>
            </div>
            <div class="gallery-item">
                <img src="<?= base_url('uploads/fasilitas/kamar_vip_2.jpg') ?>" alt="Kamar Mandi VIP">
                <div class="gallery-overlay">
                    <h6>Kamar Mandi VIP</h6>
                    <small>Dilengkapi bathtub jacuzzi</small>
                </div>
            </div>
            <div class="gallery-item">
                <img src="<?= base_url('uploads/fasilitas/kamar_standard_1.png') ?>" alt="Kamar Standard">
                <div class="gallery-overlay">
                    <h6>Kamar Standard</h6>
                    <small>4 Bed, lemari, meja - Rp 300.000/malam</small>
                </div>
            </div>
            <div class="gallery-item">
                <img src="<?= base_url('uploads/fasilitas/kamar_standard_2.png') ?>" alt="Kamar Mandi Standard">
                <div class="gallery-overlay">
                    <h6>Kamar Mandi Standard</h6>
                    <small>Bersih dan nyaman</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== MENGAPA MEMILIH KAMI ===== -->
<section class="section-why">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Mengapa Memilih Kami</h2>
            <p class="section-subtitle">Keunggulan layanan yang membuat pengalaman Anda bersama SIMAS menjadi yang terbaik</p>
            <div class="title-decorator"></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="why-card">
                    <div class="why-icon green">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>Lokasi Strategis</h5>
                    <p>Terletak di pusat lokasi asrama dengan akses mudah ke berbagai fasilitas umum dan transportasi.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="why-card">
                    <div class="why-icon gold">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h5>Harga Terjangkau</h5>
                    <p>Tarif sewa kompetitif dan transparan dengan rincian fasilitas lengkap tanpa biaya tersembunyi.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="why-card">
                    <div class="why-icon green">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <h5>72 Kamar Tersedia</h5>
                    <p>Kapasitas akomodasi memadai dengan 69 kamar Standard (4 bed) dan 3 kamar VIP di lantai 2, 3, dan 4.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="why-card">
                    <div class="why-icon gold">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5>Pelayanan 24 Jam</h5>
                    <p>Tim pengelola dan layanan bantuan yang ramah serta siap melayani kebutuhan Anda kapan saja.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== CARA BOOKING ===== -->
<section class="section-howto">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-white">Cara Booking</h2>
            <p class="section-subtitle text-white-50">Langkah mudah untuk melakukan pemesanan fasilitas di SIMAS</p>
            <div class="title-decorator"></div>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h5>Daftar & Login</h5>
                    <p>Buat akun baru atau masuk ke sistem SIMAS untuk memulai proses pemesanan fasilitas.</p>
                    <div class="step-arrow d-none d-lg-block">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h5>Pilih Fasilitas & Tanggal</h5>
                    <p>Pilih aula atau kamar penginapan sesuai kebutuhan, lalu tentukan tanggal dan durasi penggunaan.</p>
                    <div class="step-arrow d-none d-lg-block">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h5>Konfirmasi Booking</h5>
                    <p>Lakukan konfirmasi pemesanan dan verifikasi pembayaran untuk mendapatkan izin penggunaan resmi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== STATS ===== -->
<section class="section-stats">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-6">
                <div class="stat-item">
                    <h2>72</h2>
                    <p>Kamar</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="stat-item">
                    <h2>2</h2>
                    <p>Aula</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="stat-item">
                    <h2>4</h2>
                    <p>Lantai</p>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="stat-item">
                    <h2>24/7</h2>
                    <p>Support</p>
                </div>
            </div>
        </div>
    </div>
</section>