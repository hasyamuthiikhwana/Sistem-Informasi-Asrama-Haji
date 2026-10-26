<?php
// Helper function for Indonesian date formatting
if (!function_exists('format_tanggal_indo_riwayat')) {
    function format_tanggal_indo_riwayat($date_str) {
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

<!-- Header Banner -->
<div class="content-card mb-4" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%); color: white;">
    <div class="card-body-custom p-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 55px; height: 55px; background: rgba(255,255,255,0.15); font-size: 1.5rem; color: var(--gold);">
                    <i class="fas fa-history"></i>
                </div>
                <div>
                    <h4 class="fw-bold text-white mb-1">Riwayat Booking Anda</h4>
                    <p class="text-white-50 mb-0 small">Daftar seluruh riwayat pemesanan fasilitas gedung, aula, dan kamar penginapan SIMAS.</p>
                </div>
            </div>
            <div>
                <a href="<?= base_url('booking/fasilitas/aula_besar') ?>" class="btn btn-gold shadow-sm btn-sm px-3 py-2">
                    <i class="fas fa-calendar-plus me-1"></i> Buat Booking Baru
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bookings Table Card -->
<div class="content-card">
    <div class="card-header-custom">
        <div class="d-flex align-items-center gap-2">
            <i class="fas fa-clipboard-list fs-5" style="color: var(--primary);"></i>
            <h5 class="mb-0">Daftar Transaksi Pemesanan</h5>
        </div>
        <span class="badge bg-light text-muted border">
            Total <?= !empty($bookings) ? count($bookings) : 0 ?> Data
        </span>
    </div>
    <div class="card-body-custom p-0">
        <div class="table-responsive">
            <table class="table table-hover table-simas align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4" style="width: 50px;">No</th>
                        <th>Kode Booking</th>
                        <th>Tanggal Check-in</th>
                        <th>Tanggal Check-out</th>
                        <th>Total Biaya</th>
                        <th>Status</th>
                        <th class="pe-4 text-end" style="width: 170px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($bookings)): ?>
                        <?php $no = 1; foreach ($bookings as $b): ?>
                            <tr>
                                <td class="ps-4 fw-medium text-muted"><?= $no++ ?></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="p-2 rounded bg-light border text-primary small">
                                            <i class="fas fa-receipt"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark d-block"><?= htmlspecialchars($b->kode_booking) ?></span>
                                            <small class="text-muted"><?= date('d/m/Y H:i', strtotime($b->created_at)) ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="small fw-semibold text-dark">
                                        <i class="fas fa-sign-in-alt text-success me-1"></i> <?= format_tanggal_indo_riwayat($b->tanggal_checkin) ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="small fw-semibold text-dark">
                                        <i class="fas fa-sign-out-alt text-danger me-1"></i> <?= format_tanggal_indo_riwayat($b->tanggal_checkout) ?>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">Rp <?= number_format($b->total_harga, 0, ',', '.') ?></span>
                                </td>
                                <td>
                                    <?php if ($b->status == 'pending'): ?>
                                        <span class="badge badge-pending px-3 py-2 rounded-pill">
                                            <i class="fas fa-clock me-1"></i> Menunggu
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
                                    <div class="d-inline-flex gap-1">
                                        <a href="<?= base_url('booking/detail/' . $b->id) ?>" class="btn btn-sm btn-simas" title="Lihat Detail Booking">
                                            <i class="fas fa-eye me-1"></i> Detail
                                        </a>

                                        <?php if ($b->status == 'pending'): ?>
                                            <a href="<?= base_url('booking/cancel/' . $b->id) ?>" 
                                               class="btn btn-sm btn-outline-danger" 
                                               title="Batalkan Booking"
                                               onclick="return confirm('Apakah Anda yakin ingin membatalkan booking <?= $b->kode_booking ?>?');">
                                                <i class="fas fa-ban"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Empty State -->
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <div class="mb-3">
                                        <i class="fas fa-clipboard-question fa-4x text-secondary opacity-25"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark mb-1">Belum Ada Riwayat Booking</h5>
                                    <p class="small text-muted mb-4">Anda belum pernah melakukan pemesanan fasilitas gedung, aula, maupun kamar.</p>
                                    <a href="<?= base_url('booking/fasilitas/aula_besar') ?>" class="btn btn-simas">
                                        <i class="fas fa-calendar-plus me-1"></i> Mulai Booking Fasilitas Sekarang
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
