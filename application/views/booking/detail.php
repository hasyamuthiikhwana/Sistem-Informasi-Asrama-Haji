<?php
// Helper function for Indonesian date formatting
if (!function_exists('format_tanggal_indo_detail')) {
    function format_tanggal_indo_detail($date_str) {
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

$status = isset($booking->status) ? strtolower($booking->status) : 'pending';
$has_extra = (!empty($booking->extra_kursi) && $booking->extra_kursi > 0) || 
             (!empty($booking->extra_meja) && $booking->extra_meja > 0) || 
             (!empty($booking->extra_total) && $booking->extra_total > 0);
$has_dp = (!empty($booking->dp_amount) && $booking->dp_amount > 0);
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

<!-- Top Navigation & Action Buttons -->
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('booking') ?>" class="text-decoration-none text-muted"><i class="fas fa-home me-1"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('booking/riwayat') ?>" class="text-decoration-none text-muted">Riwayat Booking</a></li>
            <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page"><?= htmlspecialchars($booking->kode_booking) ?></li>
        </ol>
    </nav>
    <div class="d-flex gap-2">
        <button onclick="window.print()" class="btn btn-outline-secondary btn-sm shadow-sm d-print-none">
            <i class="fas fa-print me-1"></i> Cetak Bukti
        </button>
        <a href="<?= base_url('booking/riwayat') ?>" class="btn btn-light border btn-sm shadow-sm d-print-none">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Left Column: Booking Info & Summary -->
    <div class="col-12 col-lg-4">
        <!-- Status Card -->
        <div class="content-card mb-4">
            <div class="card-header-custom">
                <h5 class="mb-0"><i class="fas fa-receipt text-warning me-2"></i>Status Booking</h5>
                <?php if ($status == 'pending'): ?>
                    <span class="badge badge-pending px-3 py-2 rounded-pill fw-semibold">
                        <i class="fas fa-clock me-1"></i> Menunggu Konfirmasi
                    </span>
                <?php elseif ($status == 'confirmed'): ?>
                    <span class="badge badge-confirmed px-3 py-2 rounded-pill fw-semibold">
                        <i class="fas fa-check-circle me-1"></i> Dikonfirmasi
                    </span>
                <?php elseif ($status == 'completed'): ?>
                    <span class="badge badge-completed px-3 py-2 rounded-pill fw-semibold">
                        <i class="fas fa-flag-checkered me-1"></i> Selesai
                    </span>
                <?php elseif ($status == 'cancelled'): ?>
                    <span class="badge badge-cancelled px-3 py-2 rounded-pill fw-semibold">
                        <i class="fas fa-times-circle me-1"></i> Dibatalkan
                    </span>
                <?php else: ?>
                    <span class="badge bg-secondary px-3 py-2 rounded-pill">
                        <?= htmlspecialchars(ucfirst($status)) ?>
                    </span>
                <?php endif; ?>
            </div>
            <div class="card-body-custom">
                <div class="text-center py-3 border-bottom mb-3">
                    <small class="text-muted text-uppercase letter-spacing-1 d-block mb-1">Kode Transaksi</small>
                    <h3 class="fw-bold mb-0 text-primary" style="color: var(--primary) !important;">
                        <?= htmlspecialchars($booking->kode_booking) ?>
                    </h3>
                </div>

                <ul class="list-unstyled mb-0" style="line-height: 2.1;">
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted"><i class="fas fa-calendar-plus text-success me-2"></i>Tanggal Check-in:</span>
                        <strong class="text-dark"><?= format_tanggal_indo_detail($booking->tanggal_checkin) ?></strong>
                    </li>
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted"><i class="fas fa-calendar-minus text-danger me-2"></i>Tanggal Check-out:</span>
                        <strong class="text-dark"><?= format_tanggal_indo_detail($booking->tanggal_checkout) ?></strong>
                    </li>

                    <?php if (!empty($booking->durasi_jam) && $booking->durasi_jam > 0): ?>
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted"><i class="fas fa-hourglass-half text-info me-2"></i>Durasi:</span>
                        <strong class="text-dark"><?= htmlspecialchars($booking->durasi_jam) ?> Jam</strong>
                    </li>
                    <?php endif; ?>

                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted"><i class="fas fa-clock text-secondary me-2"></i>Waktu Pemesanan:</span>
                        <span class="text-dark"><?= !empty($booking->created_at) ? date('d/m/Y H:i', strtotime($booking->created_at)) . ' WIB' : '-' ?></span>
                    </li>

                    <!-- Extra Fields Breakdown -->
                    <?php if (!empty($booking->extra_kursi) && $booking->extra_kursi > 0): ?>
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted"><i class="fas fa-chair text-primary me-2"></i>Tambahan Kursi:</span>
                        <span class="text-dark fw-medium"><?= number_format($booking->extra_kursi, 0, ',', '.') ?> (@ Rp 7.000)</span>
                    </li>
                    <?php endif; ?>

                    <?php if (!empty($booking->extra_meja) && $booking->extra_meja > 0): ?>
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted"><i class="fas fa-table text-primary me-2"></i>Tambahan Meja:</span>
                        <span class="text-dark fw-medium"><?= number_format($booking->extra_meja, 0, ',', '.') ?> (@ Rp 10.000)</span>
                    </li>
                    <?php endif; ?>

                    <?php if (!empty($booking->extra_total) && $booking->extra_total > 0): ?>
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2">
                        <span class="text-muted"><i class="fas fa-plus-circle text-warning me-2"></i>Biaya Tambahan:</span>
                        <strong class="text-dark">Rp <?= number_format($booking->extra_total, 0, ',', '.') ?></strong>
                    </li>
                    <?php endif; ?>

                    <!-- Total Price -->
                    <li class="d-flex justify-content-between pt-2 pb-1 <?= $has_dp ? 'border-bottom mb-2' : '' ?>">
                        <span class="fw-bold text-dark"><i class="fas fa-money-bill-wave text-success me-2"></i>Total Harga:</span>
                        <span class="fw-bold fs-5 text-success">Rp <?= number_format($booking->total_harga, 0, ',', '.') ?></span>
                    </li>

                    <!-- DP & Sisa Bayar if DP exists -->
                    <?php if ($has_dp): ?>
                    <li class="d-flex justify-content-between border-bottom pb-2 mb-2 bg-light p-2 rounded">
                        <span class="text-muted"><i class="fas fa-hand-holding-dollar text-warning me-2"></i>DP (Uang Muka):</span>
                        <strong class="text-warning">Rp <?= number_format($booking->dp_amount, 0, ',', '.') ?></strong>
                    </li>
                    <?php 
                        $sisa = isset($booking->sisa_bayar) ? $booking->sisa_bayar : ($booking->total_harga - $booking->dp_amount);
                        if ($sisa < 0) $sisa = 0;
                    ?>
                    <li class="d-flex justify-content-between pt-1 bg-light p-2 rounded">
                        <span class="fw-bold text-dark"><i class="fas fa-file-invoice-dollar text-danger me-2"></i>Sisa Bayar:</span>
                        <strong class="text-danger fs-6">Rp <?= number_format($sisa, 0, ',', '.') ?></strong>
                    </li>
                    <?php endif; ?>
                </ul>

                <!-- Cancel Booking Action (If Pending) -->
                <?php if ($status == 'pending'): ?>
                    <hr class="my-3">
                    <div class="d-grid d-print-none">
                        <a href="<?= base_url('booking/cancel/' . $booking->id) ?>" 
                           class="btn btn-outline-danger btn-sm"
                           onclick="return confirm('Apakah Anda yakin ingin membatalkan pemesanan dengan kode <?= $booking->kode_booking ?>?');">
                            <i class="fas fa-ban me-1"></i> Batalkan Booking
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Notes Card -->
        <div class="content-card">
            <div class="card-header-custom">
                <h6 class="fw-bold mb-0 text-dark"><i class="fas fa-note-sticky text-info me-2"></i>Catatan Pemesanan</h6>
            </div>
            <div class="card-body-custom">
                <p class="text-muted small mb-0" style="line-height: 1.6;">
                    <?= !empty($booking->catatan) ? nl2br(htmlspecialchars($booking->catatan)) : '<span class="text-muted fst-italic">Tidak ada catatan tambahan untuk pemesanan ini.</span>' ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Right Column: Facilities Detail Table -->
    <div class="col-12 col-lg-8">
        <div class="content-card">
            <div class="card-header-custom">
                <div class="d-flex align-items-center gap-2">
                    <i class="fas fa-list-check fs-5" style="color: var(--primary);"></i>
                    <h5 class="mb-0">Rincian Fasilitas yang Dipesan</h5>
                </div>
                <span class="badge bg-light text-muted border">
                    <?= !empty($details) ? count($details) : 0 ?> Item
                </span>
            </div>
            <div class="card-body-custom p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-simas align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4" style="width: 50px;">No</th>
                                <th>Nama Fasilitas</th>
                                <th>Tipe</th>
                                <th class="text-center">Kapasitas</th>
                                <th class="text-center">Durasi</th>
                                <th class="text-end">Tarif Satuan</th>
                                <th class="pe-4 text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($details)): ?>
                                <?php $no = 1; $total_fasilitas = 0; foreach ($details as $d): ?>
                                    <?php 
                                        $nama_fas = isset($d->nama_fasilitas) ? $d->nama_fasilitas : (isset($d->nama) ? $d->nama : 'Fasilitas');
                                        $tipe_fas = isset($d->tipe) ? $d->tipe : '-';
                                        $tipe_badge_label = ucfirst(str_replace('_', ' ', $tipe_fas));
                                        $total_fasilitas += $d->subtotal;
                                    ?>
                                    <tr>
                                        <td class="ps-4 fw-medium text-muted"><?= $no++ ?></td>
                                        <td>
                                            <div class="fw-bold text-dark"><?= htmlspecialchars($nama_fas) ?></div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-secondary border px-2 py-1">
                                                <?= htmlspecialchars($tipe_badge_label) ?>
                                            </span>
                                        </td>
                                        <td class="text-center text-muted small">
                                            <?= !empty($d->kapasitas) ? number_format($d->kapasitas, 0, ',', '.') . ' Orang' : '-' ?>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill">
                                                <?= $d->jumlah_hari ?> Hari
                                            </span>
                                            <?php if (!empty($booking->durasi_jam) && $booking->durasi_jam > 0): ?>
                                                <div class="small text-muted mt-1"><?= $booking->durasi_jam ?> Jam</div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-end">
                                            Rp <?= number_format($d->harga_satuan, 0, ',', '.') ?>
                                        </td>
                                        <td class="pe-4 text-end fw-bold text-dark">
                                            Rp <?= number_format($d->subtotal, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Tidak ada rincian fasilitas.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <?php if ($has_extra): ?>
                                <tr class="table-light">
                                    <td colspan="6" class="text-end text-muted fw-semibold">Subtotal Fasilitas:</td>
                                    <td class="pe-4 text-end text-muted fw-semibold">
                                        Rp <?= number_format($total_fasilitas, 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <?php if (!empty($booking->extra_kursi) && $booking->extra_kursi > 0): ?>
                                <tr>
                                    <td colspan="6" class="text-end text-muted">
                                        Tambahan Kursi (<?= number_format($booking->extra_kursi, 0, ',', '.') ?> @ Rp 7.000):
                                    </td>
                                    <td class="pe-4 text-end text-muted">
                                        Rp <?= number_format($booking->extra_kursi * 7000, 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php if (!empty($booking->extra_meja) && $booking->extra_meja > 0): ?>
                                <tr>
                                    <td colspan="6" class="text-end text-muted">
                                        Tambahan Meja (<?= number_format($booking->extra_meja, 0, ',', '.') ?> @ Rp 10.000):
                                    </td>
                                    <td class="pe-4 text-end text-muted">
                                        Rp <?= number_format($booking->extra_meja * 10000, 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endif; ?>

                            <tr class="table-light">
                                <td colspan="6" class="text-end fw-bold py-3">Total Pembayaran:</td>
                                <td class="pe-4 text-end fw-bold fs-6 text-success py-3">
                                    Rp <?= number_format($booking->total_harga, 0, ',', '.') ?>
                                </td>
                            </tr>

                            <?php if ($has_dp): ?>
                                <tr>
                                    <td colspan="6" class="text-end text-warning fw-semibold">DP (Uang Muka):</td>
                                    <td class="pe-4 text-end text-warning fw-semibold">
                                        Rp <?= number_format($booking->dp_amount, 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-end text-danger fw-bold">Sisa Pembayaran:</td>
                                    <td class="pe-4 text-end text-danger fw-bold">
                                        Rp <?= number_format($sisa, 0, ',', '.') ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Info / Guidelines Box -->
        <div class="content-card mt-4">
            <div class="card-body-custom p-4">
                <div class="d-flex align-items-start gap-3">
                    <div class="text-warning fs-3">
                        <i class="fas fa-circle-question"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-1">Informasi Pembayaran & Konfirmasi</h6>
                        <p class="text-muted small mb-0" style="line-height: 1.6;">
                            Setelah melakukan pemesanan, silakan tunggu verifikasi dan konfirmasi dari Admin Pengelola Asrama SIMAS. Jika Anda memiliki pertanyaan atau butuh penyesuaian jadwal penggunaan, silakan hubungi pusat layanan pengelola kampus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
