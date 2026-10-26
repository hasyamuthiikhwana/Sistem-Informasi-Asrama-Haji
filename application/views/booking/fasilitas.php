<?php
// Determine icon and theme class based on facility type
$current_tipe = isset($tipe) ? $tipe : 'aula_besar';
$tipe_class = 'aula-besar';
$tipe_icon = 'fa-landmark';
$tipe_desc = 'Gedung serbaguna utama berkapasitas besar untuk acara wisuda, seminar, resepsi, dan acara resmi.';

if ($current_tipe == 'aula_kecil') {
    $tipe_class = 'aula-kecil';
    $tipe_icon = 'fa-door-open';
    $tipe_desc = 'Ruang pertemuan berkapasitas sedang untuk kegiatan rapat kerja, pelatihan, workshop, dan seminar mini.';
} elseif ($current_tipe == 'kamar') {
    $tipe_class = 'kamar';
    $tipe_icon = 'fa-bed';
    $tipe_desc = 'Kamar asrama dan wisma tamu yang nyaman dengan fasilitas lengkap untuk penginapan harian.';
}

// Calculate standard and VIP counts for kamar if not already provided
if (!isset($count_standard) || !isset($count_vip)) {
    $count_standard = 0;
    $count_vip = 0;
    if (!empty($fasilitas)) {
        foreach ($fasilitas as $f) {
            $sub = isset($f->sub_tipe) ? strtolower($f->sub_tipe) : '';
            if ($sub === 'vip') {
                $count_vip++;
            } else {
                $count_standard++;
            }
        }
    }
}
$count_all = !empty($fasilitas) ? count($fasilitas) : 0;
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

<!-- Category Header Banner -->
<div class="content-card mb-4" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%); color: white;">
    <div class="card-body-custom p-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 60px; height: 60px; background: rgba(255,255,255,0.15); font-size: 1.8rem; color: var(--gold);">
                    <i class="fas <?= $tipe_icon ?>"></i>
                </div>
                <div>
                    <span class="badge bg-warning text-dark px-3 py-1 rounded-pill mb-1 small fw-semibold">
                        Kategori Fasilitas
                    </span>
                    <h3 class="fw-bold text-white mb-1"><?= isset($tipe_label) ? htmlspecialchars($tipe_label) : 'Daftar Fasilitas' ?></h3>
                    <p class="text-white-50 mb-0 small"><?= $tipe_desc ?></p>
                </div>
            </div>
            
            <!-- Type Switcher Pills -->
            <div class="btn-group bg-white bg-opacity-10 p-1 rounded-pill flex-shrink-0" role="group" aria-label="Facility Type Selector">
                <a href="<?= base_url('booking/fasilitas/aula_besar') ?>" class="btn btn-sm rounded-pill <?= ($current_tipe == 'aula_besar') ? 'btn-gold shadow-sm' : 'text-white' ?>">
                    <i class="fas fa-landmark me-1"></i> Aula Besar
                </a>
                <a href="<?= base_url('booking/fasilitas/aula_kecil') ?>" class="btn btn-sm rounded-pill <?= ($current_tipe == 'aula_kecil') ? 'btn-gold shadow-sm' : 'text-white' ?>">
                    <i class="fas fa-door-open me-1"></i> Aula Kecil
                </a>
                <a href="<?= base_url('booking/fasilitas/kamar') ?>" class="btn btn-sm rounded-pill <?= ($current_tipe == 'kamar') ? 'btn-gold shadow-sm' : 'text-white' ?>">
                    <i class="fas fa-bed me-1"></i> Kamar
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Kamar Sub-Type Filter Buttons (Only for Kamar) -->
<?php if ($current_tipe == 'kamar' && !empty($fasilitas)): ?>
<div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4 p-3 bg-white rounded-4 shadow-sm border">
    <div class="d-flex align-items-center gap-2">
        <i class="fas fa-filter text-primary"></i>
        <span class="fw-semibold text-dark small">Filter Tipe Kamar:</span>
    </div>
    <div class="d-flex flex-wrap gap-2" id="kamarFilterGroup">
        <button type="button" class="btn btn-sm btn-simas rounded-pill px-3 filter-btn active" data-filter="all">
            <i class="fas fa-list me-1"></i> Semua (<?= $count_all ?>)
        </button>
        <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 filter-btn" data-filter="standard">
            <i class="fas fa-bed me-1"></i> Standard (<?= $count_standard ?>)
        </button>
        <button type="button" class="btn btn-sm btn-outline-warning rounded-pill px-3 filter-btn" data-filter="vip" style="color: #926710; border-color: #c9a95c;">
            <i class="fas fa-crown me-1"></i> VIP (<?= $count_vip ?>)
        </button>
    </div>
</div>
<?php endif; ?>

<!-- Facilities Grid -->
<?php if (!empty($fasilitas)): ?>
    <div class="row g-4" id="facilitiesGrid">
        <?php foreach ($fasilitas as $f): ?>
            <?php 
                $sub_tipe = isset($f->sub_tipe) ? strtolower($f->sub_tipe) : '';
                $is_vip = ($sub_tipe === 'vip');
            ?>
            <div class="col-12 col-md-6 col-lg-4 facility-card-item" data-subtipe="<?= $sub_tipe ?>">
                <div class="booking-facility-card d-flex flex-column h-100">
                    <div class="card-img-top bg-<?= $tipe_class ?>" style="position: relative; overflow: hidden;">
                        <?php if ($current_tipe == 'kamar'): ?>
                            <?php if ($is_vip): ?>
                                <img src="<?= base_url('uploads/fasilitas/kamar_vip_1.jpg') ?>" alt="Kamar VIP" style="width:100%; height:100%; object-fit:cover;">
                            <?php else: ?>
                                <img src="<?= base_url('uploads/fasilitas/kamar_standard_1.png') ?>" alt="Kamar Standard" style="width:100%; height:100%; object-fit:cover;">
                            <?php endif; ?>
                        <?php elseif ($current_tipe == 'aula_besar'): ?>
                            <img src="<?= base_url('uploads/fasilitas/aula_besar_1.jpg') ?>" alt="Aula Besar" style="width:100%; height:100%; object-fit:cover;">
                        <?php else: ?>
                            <i class="fas <?= $tipe_icon ?>"></i>
                        <?php endif; ?>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between p-4">
                        <div>
                            <!-- Header: Title & Status -->
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold text-dark mb-0"><?= htmlspecialchars($f->nama) ?></h5>
                                <?php if (isset($f->status) && $f->status == 'tersedia'): ?>
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2 py-1 rounded-pill small">
                                        <i class="fas fa-check-circle me-1"></i> Tersedia
                                    </span>
                                <?php elseif (isset($f->status)): ?>
                                    <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1 rounded-pill small">
                                        <?= htmlspecialchars(ucfirst($f->status)) ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Badges: Sub-tipe (VIP/Standard), Lantai, & Kapasitas -->
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                <?php if ($current_tipe == 'kamar' || !empty($f->sub_tipe)): ?>
                                    <?php if ($is_vip): ?>
                                        <span class="badge px-2 py-1 rounded-pill shadow-xs" style="background: linear-gradient(135deg, #c9a95c, #d4ba7a); color: #0f3b26; font-weight: 600;">
                                            <i class="fas fa-crown me-1"></i> VIP
                                        </span>
                                    <?php else: ?>
                                        <span class="badge px-2 py-1 rounded-pill shadow-xs" style="background: linear-gradient(135deg, #1a5c3a, #2a7a4e); color: #ffffff; font-weight: 600;">
                                            <i class="fas fa-check me-1"></i> Standard
                                        </span>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if (!empty($f->lantai)): ?>
                                    <span class="badge bg-light text-secondary border px-2 py-1">
                                        <i class="fas fa-layer-group text-primary me-1"></i> Lantai <?= htmlspecialchars($f->lantai) ?>
                                    </span>
                                <?php endif; ?>

                                <span class="badge bg-light text-secondary border px-2 py-1">
                                    <i class="fas fa-users text-primary me-1"></i> Kapasitas: <strong><?= number_format($f->kapasitas, 0, ',', '.') ?> Orang</strong>
                                </span>
                            </div>

                            <!-- Description -->
                            <p class="text-secondary small mb-3" style="min-height: 48px; line-height: 1.6;">
                                <?= nl2br(htmlspecialchars($f->deskripsi)) ?>
                            </p>

                            <!-- Facility Details (if available) -->
                            <?php if (!empty($f->fasilitas_detail)): ?>
                                <div class="p-2 mb-3 rounded bg-light border small text-muted">
                                    <strong class="text-dark d-block mb-1">
                                        <i class="fas fa-list-check text-success me-1"></i> Fasilitas Termasuk:
                                    </strong>
                                    <?= nl2br(htmlspecialchars($f->fasilitas_detail)) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Pricing & Action Section -->
                        <div>
                            <hr class="my-3 opacity-25">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <?php if ($current_tipe == 'aula_kecil'): ?>
                                        <small class="text-muted d-block" style="font-size: 0.75rem;">Tarif Sewa (8 Jam)</small>
                                        <div class="price">
                                            Rp <?= number_format($f->harga_per_hari, 0, ',', '.') ?>
                                            <small>/ 8 Jam</small>
                                        </div>
                                        <?php if (!empty($f->harga_12jam) && $f->harga_12jam > 0): ?>
                                            <div class="small text-muted mt-1">
                                                <i class="fas fa-clock text-primary me-1"></i> Paket 12 Jam: <strong class="text-dark">Rp <?= number_format($f->harga_12jam, 0, ',', '.') ?></strong>
                                            </div>
                                        <?php endif; ?>
                                    <?php elseif ($current_tipe == 'aula_besar'): ?>
                                        <small class="text-muted d-block" style="font-size: 0.75rem;">Tarif Sewa</small>
                                        <div class="price">
                                            Rp <?= number_format($f->harga_per_hari, 0, ',', '.') ?>
                                            <small>/ hari</small>
                                        </div>
                                        <?php if (!empty($f->harga_dp) && $f->harga_dp > 0): ?>
                                            <div class="small text-muted mt-1">
                                                <i class="fas fa-hand-holding-dollar text-warning me-1"></i> DP Min: <strong class="text-dark">Rp <?= number_format($f->harga_dp, 0, ',', '.') ?></strong>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <small class="text-muted d-block" style="font-size: 0.75rem;">Tarif Sewa</small>
                                        <div class="price">
                                            Rp <?= number_format($f->harga_per_hari, 0, ',', '.') ?>
                                            <small>/ hari</small>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <a href="<?= base_url('booking/create/' . $f->id) ?>" class="btn btn-simas w-100 d-flex align-items-center justify-content-center gap-2">
                                <i class="fas fa-calendar-check"></i> Booking Fasilitas Ini
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Empty Filter Notice (Hidden by default, shown by JS when filter has no results) -->
    <div id="emptyFilterNotice" class="content-card py-5 text-center mt-4" style="display: none;">
        <div class="card-body-custom">
            <div class="mb-3">
                <i class="fas fa-bed fa-3x text-muted opacity-25"></i>
            </div>
            <h5 class="fw-bold text-dark mb-1">Tidak Ada Kamar Ditemukan</h5>
            <p class="text-muted small mb-0">Tidak ada unit kamar untuk tipe yang dipilih saat ini.</p>
        </div>
    </div>
<?php else: ?>
    <!-- Empty State -->
    <div class="content-card py-5 text-center">
        <div class="card-body-custom">
            <div class="mb-3">
                <i class="fas <?= $tipe_icon ?> fa-4x text-muted opacity-25"></i>
            </div>
            <h5 class="fw-bold text-dark mb-1">Belum Ada Fasilitas <?= isset($tipe_label) ? htmlspecialchars($tipe_label) : '' ?></h5>
            <p class="text-muted small mb-4">Saat ini belum ada unit fasilitas untuk kategori ini atau fasilitas sedang tidak aktif.</p>
            <a href="<?= base_url('booking') ?>" class="btn btn-simas">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard Booking
            </a>
        </div>
    </div>
<?php endif; ?>

<!-- Simple JavaScript for Kamar Filter -->
<?php if ($current_tipe == 'kamar' && !empty($fasilitas)): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('#kamarFilterGroup .filter-btn');
    const items = document.querySelectorAll('.facility-card-item');
    const emptyNotice = document.getElementById('emptyFilterNotice');

    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const filterValue = this.getAttribute('data-filter');

            // Reset classes on all filter buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'btn-simas', 'btn-gold');
                const btnFilter = btn.getAttribute('data-filter');
                if (btnFilter === 'standard') {
                    btn.className = 'btn btn-sm btn-outline-success rounded-pill px-3 filter-btn';
                } else if (btnFilter === 'vip') {
                    btn.className = 'btn btn-sm btn-outline-warning rounded-pill px-3 filter-btn';
                    btn.style.color = '#926710';
                    btn.style.borderColor = '#c9a95c';
                } else {
                    btn.className = 'btn btn-sm btn-outline-secondary rounded-pill px-3 filter-btn';
                }
            });

            // Activate current button
            this.classList.add('active');
            if (filterValue === 'vip') {
                this.className = 'btn btn-sm btn-gold rounded-pill px-3 filter-btn active shadow-sm';
            } else {
                this.className = 'btn btn-sm btn-simas rounded-pill px-3 filter-btn active shadow-sm';
            }

            // Filter the card items
            let visibleCount = 0;
            items.forEach(item => {
                const subtipe = (item.getAttribute('data-subtipe') || '').toLowerCase();
                if (filterValue === 'all' || subtipe === filterValue) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (emptyNotice) {
                emptyNotice.style.display = (visibleCount === 0) ? 'block' : 'none';
            }
        });
    });
});
</script>
<?php endif; ?>
