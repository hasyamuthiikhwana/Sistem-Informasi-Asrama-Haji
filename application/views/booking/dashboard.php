<?php
// Indonesian date helper function if not exists
if (!function_exists('format_tanggal_indo')) {
    function format_tanggal_indo($date_str) {
        if (!$date_str || $date_str == '0000-00-00') return '-';
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $timestamp = strtotime($date_str);
        $tgl = date('d', $timestamp);
        $bln = $bulan[(int)date('m', $timestamp)];
        $thn = date('Y', $timestamp);
        return $tgl . ' ' . $bln . ' ' . $thn;
    }
}
?>

<!-- Flash Messages -->
<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-4 shadow-sm" role="alert">
        <i class="fas fa-check-circle fs-5 me-2"></i>
        <div><?= $this->session->flashdata('success') ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-4 shadow-sm" role="alert">
        <i class="fas fa-exclamation-triangle fs-5 me-2"></i>
        <div><?= $this->session->flashdata('error') ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Welcome Banner -->
<div class="content-card mb-4" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%); color: white;">
    <div class="card-body-custom p-4">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-7">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-2 fw-semibold">
                    <i class="fas fa-shield-halved me-1"></i> SIMAS Booking Portal
                </span>
                <h3 class="fw-bold text-white mb-2">Selamat Datang, <?= htmlspecialchars($this->session->userdata('nama') ?: 'Pengguna') ?>!</h3>
                <p class="text-white-50 mb-0">
                    Kelola pemesanan fasilitas gedung, aula serbaguna, dan kamar penginapan dengan mudah, cepat, dan transparan.
                </p>
            </div>
            <div class="col-lg-4 col-md-5 text-md-end mt-3 mt-md-0">
                <a href="<?= base_url('booking/fasilitas/aula_besar') ?>" class="btn btn-gold shadow-sm px-4 py-2">
                    <i class="fas fa-calendar-plus me-1"></i> Booking Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<!-- 4 Stat Cards in a Row -->
<div class="row g-3 mb-4">
    <!-- Total Booking -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card h-100 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1">Total Booking Saya</p>
                <h3 class="fw-bold mb-0 text-dark"><?= isset($total_booking) ? number_format($total_booking, 0, ',', '.') : 0 ?></h3>
                <small class="text-muted"><i class="fas fa-history me-1"></i>Semua transaksi</small>
            </div>
            <div class="stat-icon gold">
                <i class="fas fa-receipt"></i>
            </div>
        </div>
    </div>

    <!-- Aula Besar -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card h-100 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1">Aula Besar</p>
                <h3 class="fw-bold mb-0 text-dark"><?= isset($fasilitas_aula_besar) ? number_format($fasilitas_aula_besar, 0, ',', '.') : 0 ?></h3>
                <small class="text-muted"><i class="fas fa-building me-1"></i>Fasilitas tersedia</small>
            </div>
            <div class="stat-icon green">
                <i class="fas fa-landmark"></i>
            </div>
        </div>
    </div>

    <!-- Aula Kecil -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card h-100 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1">Aula Kecil</p>
                <h3 class="fw-bold mb-0 text-dark"><?= isset($fasilitas_aula_kecil) ? number_format($fasilitas_aula_kecil, 0, ',', '.') : 0 ?></h3>
                <small class="text-muted"><i class="fas fa-door-open me-1"></i>Fasilitas tersedia</small>
            </div>
            <div class="stat-icon blue">
                <i class="fas fa-door-open"></i>
            </div>
        </div>
    </div>

    <!-- Kamar Penginapan -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card h-100 d-flex align-items-center justify-content-between">
            <div>
                <p class="text-muted mb-1">Kamar Penginapan</p>
                <h3 class="fw-bold mb-0 text-dark"><?= isset($fasilitas_kamar) ? number_format($fasilitas_kamar, 0, ',', '.') : 0 ?></h3>
                <small class="text-muted"><i class="fas fa-bed me-1"></i>Kamar tersedia</small>
            </div>
            <div class="stat-icon red">
                <i class="fas fa-bed"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Booking Section -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold mb-1" style="color: var(--primary-dark);">
                <i class="fas fa-bolt me-2 text-warning"></i>Pilihan Kategori Fasilitas
            </h5>
            <p class="text-muted small mb-0">Pilih kategori fasilitas yang ingin Anda sewa untuk kegiatan Anda</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Aula Besar Card -->
        <div class="col-md-4">
            <div class="booking-facility-card d-flex flex-column h-100">
                <div class="card-img-top bg-aula-besar">
                    <i class="fas fa-landmark"></i>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold mb-0 text-dark">Aula Besar</h5>
                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill small">
                                <?= isset($fasilitas_aula_besar) ? $fasilitas_aula_besar : 0 ?> Unit
                            </span>
                        </div>
                        <p class="text-muted small mb-3" style="min-height: 48px;">
                            Gedung serbaguna utama berkapasitas besar, ideal untuk acara wisuda, seminar nasional, resepsi pernikahan, dan acara formal kampus.
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-light text-secondary border me-1 mb-1"><i class="fas fa-users me-1"></i> Kapasitas 500+ Org</span>
                            <span class="badge bg-light text-secondary border me-1 mb-1"><i class="fas fa-volume-high me-1"></i> Sound System</span>
                            <span class="badge bg-light text-secondary border me-1 mb-1"><i class="fas fa-snowflake me-1"></i> Full AC</span>
                        </div>
                    </div>
                    <div>
                        <a href="<?= base_url('booking/fasilitas/aula_besar') ?>" class="btn btn-simas w-100 d-flex align-items-center justify-content-center gap-2">
                            <i class="fas fa-calendar-check"></i> Booking Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aula Kecil Card -->
        <div class="col-md-4">
            <div class="booking-facility-card d-flex flex-column h-100">
                <div class="card-img-top bg-aula-kecil">
                    <i class="fas fa-door-open"></i>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold mb-0 text-dark">Aula Kecil</h5>
                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill small">
                                <?= isset($fasilitas_aula_kecil) ? $fasilitas_aula_kecil : 0 ?> Unit
                            </span>
                        </div>
                        <p class="text-muted small mb-3" style="min-height: 48px;">
                            Ruang pertemuan serbaguna sedang, tepat untuk rapat koordinasi, pelatihan intensif, workshop, seminar kecil, dan diskusi ilmiah.
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-light text-secondary border me-1 mb-1"><i class="fas fa-users me-1"></i> Kapasitas 100 Org</span>
                            <span class="badge bg-light text-secondary border me-1 mb-1"><i class="fas fa-video me-1"></i> Proyektor LCD</span>
                            <span class="badge bg-light text-secondary border me-1 mb-1"><i class="fas fa-snowflake me-1"></i> Full AC</span>
                        </div>
                    </div>
                    <div>
                        <a href="<?= base_url('booking/fasilitas/aula_kecil') ?>" class="btn btn-simas w-100 d-flex align-items-center justify-content-center gap-2">
                            <i class="fas fa-calendar-check"></i> Booking Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kamar Penginapan Card -->
        <div class="col-md-4">
            <div class="booking-facility-card d-flex flex-column h-100">
                <div class="card-img-top bg-kamar">
                    <i class="fas fa-bed"></i>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold mb-0 text-dark">Kamar Penginapan</h5>
                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill small">
                                <?= isset($fasilitas_kamar) ? $fasilitas_kamar : 0 ?> Unit
                            </span>
                        </div>
                        <p class="text-muted small mb-3" style="min-height: 48px;">
                            Kamar asrama dan wisma tamu yang bersih, tenang, dan nyaman untuk tempat tinggal tamu kampus, dosen tamu, maupun kegiatan inap.
                        </p>
                        <div class="mb-3">
                            <span class="badge bg-light text-secondary border me-1 mb-1"><i class="fas fa-bed me-1"></i> Bed Bersih</span>
                            <span class="badge bg-light text-secondary border me-1 mb-1"><i class="fas fa-wifi me-1"></i> Wi-Fi Cepat</span>
                            <span class="badge bg-light text-secondary border me-1 mb-1"><i class="fas fa-shower me-1"></i> Kamar Mandi</span>
                        </div>
                    </div>
                    <div>
                        <a href="<?= base_url('booking/fasilitas/kamar') ?>" class="btn btn-simas w-100 d-flex align-items-center justify-content-center gap-2">
                            <i class="fas fa-calendar-check"></i> Booking Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Active Bookings Table Section -->
<div class="content-card mb-4">
    <div class="card-header-custom">
        <div class="d-flex align-items-center gap-2">
            <i class="fas fa-clock-rotate-left fs-5" style="color: var(--primary);"></i>
            <h5 class="mb-0">Booking Aktif Anda</h5>
        </div>
        <a href="<?= base_url('booking/riwayat') ?>" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-history me-1"></i> Lihat Semua Riwayat
        </a>
    </div>
    <div class="card-body-custom p-0">
        <div class="table-responsive">
            <table class="table table-hover table-simas align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4" style="width: 60px;">No</th>
                        <th>Kode Booking</th>
                        <th>Tanggal Check-in & Check-out</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                        <th class="pe-4 text-end" style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($active_bookings)): ?>
                        <?php $no = 1; foreach ($active_bookings as $b): ?>
                            <tr>
                                <td class="ps-4 fw-medium text-muted"><?= $no++ ?></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="p-2 rounded bg-light border text-primary">
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark d-block"><?= htmlspecialchars($b->kode_booking) ?></span>
                                            <small class="text-muted">Dibuat: <?= date('d/m/Y H:i', strtotime($b->created_at)) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <div class="text-success mb-1">
                                            <i class="fas fa-sign-in-alt me-1"></i> In: <?= format_tanggal_indo($b->tanggal_checkin) ?>
                                        </div>
                                        <div class="text-danger">
                                            <i class="fas fa-sign-out-alt me-1"></i> Out: <?= format_tanggal_indo($b->tanggal_checkout) ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">Rp <?= number_format($b->total_harga, 0, ',', '.') ?></span>
                                </td>
                                <td>
                                    <?php if ($b->status == 'pending'): ?>
                                        <span class="badge badge-pending px-3 py-2 rounded-pill">
                                            <i class="fas fa-clock me-1"></i> Menunggu Konfirmasi
                                        </span>
                                    <?php elseif ($b->status == 'confirmed'): ?>
                                        <span class="badge badge-confirmed px-3 py-2 rounded-pill">
                                            <i class="fas fa-check-circle me-1"></i> Dikonfirmasi
                                        </span>
                                    <?php elseif ($b->status == 'completed'): ?>
                                        <span class="badge badge-completed px-3 py-2 rounded-pill">
                                            <i class="fas fa-flag-checkered me-1"></i> Selesai
                                        </span>
                                    <?php elseif ($b->status == 'cancelled'): ?>
                                        <span class="badge badge-cancelled px-3 py-2 rounded-pill">
                                            <i class="fas fa-times-circle me-1"></i> Dibatalkan
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary px-3 py-2 rounded-pill">
                                            <?= htmlspecialchars(ucfirst($b->status)) ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="<?= base_url('booking/detail/' . $b->id) ?>" class="btn btn-sm btn-simas">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <div class="mb-3">
                                        <i class="fas fa-calendar-xmark fa-3x text-secondary opacity-50"></i>
                                    </div>
                                    <h6 class="fw-bold text-dark mb-1">Tidak Ada Booking Aktif</h6>
                                    <p class="small text-muted mb-3">Anda belum memiliki pemesanan fasilitas yang sedang berlangsung atau menunggu konfirmasi.</p>
                                    <a href="<?= base_url('booking/fasilitas/aula_besar') ?>" class="btn btn-sm btn-simas">
                                        <i class="fas fa-calendar-plus me-1"></i> Pesan Fasilitas Sekarang
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
