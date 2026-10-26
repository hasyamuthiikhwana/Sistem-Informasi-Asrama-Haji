<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAS - Sistem Informasi Manajemen Asrama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-green: #1a5c3a;
            --secondary-gold: #c9a95c;
        }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { background-color: rgba(26, 92, 58, 0.95) !important; backdrop-filter: blur(10px); }
        .navbar-brand, .nav-link { color: white !important; font-weight: 600; }
        .nav-link:hover { color: var(--secondary-gold) !important; }
        .btn-gold { background-color: var(--secondary-gold); color: #1a3a2a; font-weight: 700; border: none; padding: 10px 30px; border-radius: 50px; transition: 0.3s; }
        .btn-gold:hover { background-color: #b8963e; color: #fff; transform: scale(1.05); }
        .btn-outline-gold { border: 2px solid var(--secondary-gold); color: var(--secondary-gold); background: transparent; padding: 8px 25px; border-radius: 50px; font-weight: 600; transition: 0.3s; }
        .btn-outline-gold:hover { background: var(--secondary-gold); color: #1a3a2a; }
        .hero { background: linear-gradient(135deg, #0f3b26 0%, #1a5c3a 50%, #2a7a4e 100%); color: white; padding: 120px 0 80px; position: relative; overflow: hidden; }
        .hero::after { content: ''; position: absolute; top: -50%; right: -20%; width: 600px; height: 600px; background: rgba(201, 169, 92, 0.1); border-radius: 50%; }
        .hero h1 { font-size: 3.5rem; font-weight: 800; }
        .hero .highlight { color: var(--secondary-gold); }
        .hero p { font-size: 1.2rem; opacity: 0.9; }
        .hero-stats { background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); border-radius: 20px; padding: 30px; margin-top: 40px; }
        .hero-stats .stat-number { font-size: 2.5rem; font-weight: 800; color: var(--secondary-gold); }
        .section-title { color: var(--primary-green); font-weight: 700; position: relative; }
        .section-title::after { content: ''; display: block; width: 80px; height: 4px; background: var(--secondary-gold); margin: 10px auto 0; border-radius: 10px; }
        .facility-card { background: white; border-radius: 20px; padding: 30px 25px; box-shadow: 0 10px 40px rgba(0,0,0,0.06); transition: 0.3s; height: 100%; border: 1px solid rgba(201, 169, 92, 0.2); }
        .facility-card:hover { transform: translateY(-10px); box-shadow: 0 20px 60px rgba(26, 92, 58, 0.15); border-color: var(--secondary-gold); }
        .facility-card .icon { font-size: 3rem; color: var(--secondary-gold); margin-bottom: 15px; }
        .facility-card h5 { color: var(--primary-green); font-weight: 700; }
        .facility-card ul { list-style: none; padding: 0; font-size: 0.95rem; }
        .facility-card ul li { padding: 5px 0; border-bottom: 1px dashed #eee; }
        .facility-card ul li:last-child { border-bottom: none; }
        .price-tag { background: var(--primary-green); color: white; padding: 5px 15px; border-radius: 50px; font-weight: 600; font-size: 0.9rem; display: inline-block; margin-top: 10px; }
        .cta-section { background: linear-gradient(135deg, #1a5c3a, #0f3b26); color: white; padding: 70px 0; border-radius: 40px; margin: 50px 0; }
        .cta-section h2 { font-weight: 700; }
        footer { background: #0a1f15; color: #aaa; padding: 40px 0 20px; }
        footer h6 { color: white; font-weight: 700; }
        @media (max-width: 768px) {
            .hero h1 { font-size: 2.2rem; }
            .hero { padding: 100px 0 50px; }
            .hero-stats .stat-number { font-size: 1.8rem; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="<?= site_url('simas') ?>">
            <i class="bi bi-building"></i> SIMAS
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#fasilitas">Fasilitas</a></li>
                <li class="nav-item"><a class="nav-link" href="#harga">Harga</a></li>
                <li class="nav-item"><a class="nav-link" href="#booking">Booking</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= site_url('simas/dashboard') ?>"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1><span class="highlight">SIMAS</span><br>Sistem Informasi <br>Manajemen Asrama</h1>
                <p>Solusi penginapan nyaman dengan 72 kamar siap huni, serta aula besar dan kecil untuk berbagai acara. Tersedia untuk <strong>Jemaah Haji</strong> dan <strong>Masyarakat Umum</strong>.</p>
                <div class="mt-4 d-flex flex-wrap gap-3">
                    <a href="#booking" class="btn btn-gold btn-lg"><i class="bi bi-calendar-check"></i> Pesan Sekarang</a>
                    <a href="#fasilitas" class="btn btn-outline-gold btn-lg">Lihat Fasilitas</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-stats">
                    <div class="row text-center">
                        <div class="col-4"><div class="stat-number"><?= $total_kamar ?? 0 ?></div><small>Total Kamar</small></div>
                        <div class="col-4"><div class="stat-number"><?= $standar ?? 0 ?></div><small>Standar (4 Bed)</small></div>
                        <div class="col-4"><div class="stat-number"><?= $vip ?? 0 ?></div><small>VIP (1 Bed)</small></div>
                    </div>
                    <hr class="bg-light opacity-50">
                    <div class="row text-center">
                        <div class="col-12">
                            <span class="badge bg-warning text-dark fs-6 p-2">
                                <i class="bi bi-check-circle-fill"></i> <?= $tersedia ?? 0 ?> Kamar Tersedia
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="fasilitas" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Fasilitas Unggulan</h2>
            <p class="text-muted">Nikmati kenyamanan fasilitas lengkap kami</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="facility-card">
                    <div class="icon"><i class="bi bi-hotel"></i></div>
                    <h5>🛏️ Penginapan</h5>
                    <ul>
                        <li><strong>69 Kamar Standar</strong> (4 Bed) <br> <span class="badge bg-success">Rp 300.000/malam</span></li>
                        <li><strong>3 Kamar VIP</strong> (1 Bed Besar) <br> <span class="badge bg-warning text-dark">Rp 350.000/malam</span></li>
                        <li><i class="bi bi-geo-alt-fill text-muted"></i> VIP di Lantai 2, 3, 4</li>
                        <li><i class="bi bi-check-circle text-success"></i> AC, TV, Kamar Mandi Dalam</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="facility-card">
                    <div class="icon"><i class="bi bi-building"></i></div>
                    <h5>🏛️ Aula Besar</h5>
                    <ul>
                        <li><strong>250 Kursi Futura Biru</strong> (tambahan Rp 7.000/unit)</li>
                        <li><strong>10 Meja Bulat</strong> & <strong>12 Meja Prasmanan</strong> (tambahan Rp 10.000/unit)</li>
                        <li><strong>10 AC Dinding</strong> + <strong>6 AC Standing</strong></li>
                        <li class="mt-2"><span class="price-tag">Sewa mulai dari Rp 11.600.000</span></li>
                        <li><small>DP: Rp 2.100.000</small></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="facility-card">
                    <div class="icon"><i class="bi bi-easel"></i></div>
                    <h5>🏠 Aula Kecil</h5>
                    <ul>
                        <li><strong>60 Kursi</strong> (meja menyesuaikan)</li>
                        <li><strong>8 Jam</strong> <span class="badge bg-primary">Rp 600.000</span></li>
                        <li><strong>12 Jam</strong> <span class="badge bg-primary">Rp 780.000</span></li>
                        <li><i class="bi bi-check-circle text-success"></i> Jika >8 jam sampai 12 jam, dihitung 12 jam</li>
                        <li><i class="bi bi-info-circle text-info"></i> Sewa 1 hari: Tidak boleh DP</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="harga" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Daftar Harga</h2>
            <p class="text-muted">Transparansi harga untuk semua layanan</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="pricing-box text-center p-4 bg-white rounded shadow-sm h-100">
                    <h6>Kamar Standar</h6>
                    <p class="display-6 fw-bold text-success">Rp 300K</p>
                    <small class="text-muted">/ malam / 4 bed</small>
                    <hr><small><i class="bi bi-check-circle text-success"></i> 69 Kamar</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pricing-box text-center p-4 bg-white rounded shadow-sm h-100 border border-warning">
                    <h6>Kamar VIP</h6>
                    <p class="display-6 fw-bold text-warning">Rp 350K</p>
                    <small class="text-muted">/ malam / 1 bed</small>
                    <hr><small><i class="bi bi-check-circle text-success"></i> Lantai 2,3,4</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pricing-box text-center p-4 bg-white rounded shadow-sm h-100">
                    <h6>Aula Kecil</h6>
                    <p class="display-6 fw-bold text-primary">Rp 600K</p>
                    <small class="text-muted">8 jam paket</small>
                    <hr><small><i class="bi bi-arrow-right"></i> 12 jam: Rp 780K</small>
                    <small><br><i class="bi bi-info-circle"></i> 1 hari: tanpa DP</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="pricing-box text-center p-4 bg-white rounded shadow-sm h-100">
                    <h6>Aula Besar</h6>
                    <p class="display-6 fw-bold text-dark">Rp 11,6 Jt</p>
                    <small class="text-muted">DP Rp 2,1 Jt</small>
                    <hr><small><i class="bi bi-plus-circle"></i> Add-on kursi/meja</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="booking" class="container">
    <div class="cta-section">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2><i class="bi bi-calendar-check"></i> Siap Memesan?</h2>
                <p class="mb-0">Klik tombol di samping untuk mengakses halaman pemesanan.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="<?= site_url('simas/booking_room') ?>" class="btn btn-gold btn-lg d-block d-sm-inline-block mb-2 mb-sm-0 me-2">
                    <i class="bi bi-hotel"></i> Kamar
                </a>
                <a href="<?= site_url('simas/booking_small') ?>" class="btn btn-light btn-lg d-block d-sm-inline-block mb-2 mb-sm-0 me-2">
                    <i class="bi bi-easel"></i> Aula Kecil
                </a>
                <a href="<?= site_url('simas/booking_big') ?>" class="btn btn-outline-gold btn-lg d-block d-sm-inline-block">
                    <i class="bi bi-building"></i> Aula Besar
                </a>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h6><i class="bi bi-building"></i> SIMAS</h6>
                <p>Sistem Informasi Manajemen Asrama<br>Melayani Jemaah Haji & Masyarakat Umum.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h6>Alamat</h6>
                <p>
                    Jl. Letnan Jendral Sutoyo No.17, Parit Tokaya,<br>
                    Kecamatan Pontianak Selatan,<br>
                    Kota Pontianak, Kalimantan Barat 78121.
                </p>
            </div>
            <div class="col-md-4 mb-3">
                <h6>Kontak</h6>
                <p>
                    <i class="bi bi-telephone"></i> +62 812-3456-7890<br>
                    <i class="bi bi-envelope"></i> kemenhaj.ri@haji.go.id
                </p>
            </div>
        </div>
        <hr class="bg-secondary">
        <div class="text-center">
            <small>© 2026 SIMAS. All rights reserved.</small>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
});
</script>
</body>
</html>