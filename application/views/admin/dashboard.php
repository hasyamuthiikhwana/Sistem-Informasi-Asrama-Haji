<div class="row g-3 mb-4">
    <!-- Stat Cards -->
    <div class="col-md-3">
        <div class="card stat-card bg-white border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3 text-warning">
                    <i class="fas fa-clock fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Pending</h6>
                    <h3 class="mb-0 fw-bold"><?= isset($pending) ? $pending : 0 ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card bg-white border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3 text-success">
                    <i class="fas fa-check-circle fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Confirmed</h6>
                    <h3 class="mb-0 fw-bold"><?= isset($confirmed) ? $confirmed : 0 ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card bg-white border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="rounded-circle bg-info bg-opacity-10 p-3 me-3 text-info">
                    <i class="fas fa-flag-checkered fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Completed</h6>
                    <h3 class="mb-0 fw-bold"><?= isset($completed) ? $completed : 0 ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card bg-white border-0 shadow-sm h-100">
            <div class="card-body d-flex align-items-center">
                <div class="rounded-circle bg-danger bg-opacity-10 p-3 me-3 text-danger">
                    <i class="fas fa-times-circle fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Cancelled</h6>
                    <h3 class="mb-0 fw-bold"><?= isset($cancelled) ? $cancelled : 0 ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card bg-white border-0 shadow-sm h-100">
            <div class="card-body text-center py-4">
                <div class="rounded-circle bg-success bg-opacity-10 p-3 d-inline-block mb-3 text-success">
                    <i class="fas fa-building fa-2x"></i>
                </div>
                <h3 class="fw-bold mb-1"><?= isset($total_fasilitas) ? $total_fasilitas : 0 ?></h3>
                <p class="text-muted mb-0">Total Fasilitas</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <a href="<?= base_url('admin/bookings') ?>" class="text-decoration-none">
            <div class="card bg-white border-0 shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-block mb-3 text-primary">
                        <i class="fas fa-calendar-alt fa-2x"></i>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark"><?= (isset($pending) ? $pending : 0) + (isset($confirmed) ? $confirmed : 0) + (isset($completed) ? $completed : 0) + (isset($cancelled) ? $cancelled : 0) ?></h3>
                    <p class="text-muted mb-0">Total Booking</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="<?= base_url('admin/fasilitas') ?>" class="text-decoration-none">
            <div class="card bg-white border-0 shadow-sm h-100">
                <div class="card-body text-center py-4">
                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 d-inline-block mb-3 text-warning">
                        <i class="fas fa-cogs fa-2x"></i>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark"><i class="fas fa-arrow-right"></i></h3>
                    <p class="text-muted mb-0">Kelola Fasilitas</p>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0" style="color: #1a5c3a;">Booking Terbaru</h5>
            <a href="<?= base_url('admin/bookings') ?>" class="btn btn-sm btn-outline-success">Lihat Semua</a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Kode Booking</th>
                        <th>Nama User</th>
                        <th>Fasilitas</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($recent_bookings)): ?>
                        <?php $no = 1; foreach($recent_bookings as $b): ?>
                            <tr>
                                <td class="ps-4"><?= $no++ ?></td>
                                <td>
                                    <a href="<?= base_url('booking/detail/'.$b->id) ?>" class="fw-medium text-decoration-none" style="color: #1a5c3a;">
                                        <?= $b->kode_booking ?>
                                    </a>
                                </td>
                                <td><?= htmlspecialchars(isset($b->nama_user) ? $b->nama_user : $b->username) ?></td>
                                <td><?= htmlspecialchars(isset($b->nama_fasilitas) ? $b->nama_fasilitas : '-') ?></td>
                                <td>
                                    <div class="small">
                                        <div><i class="fas fa-sign-in-alt text-success me-1"></i> <?= date('d M Y', strtotime($b->tanggal_checkin)) ?></div>
                                        <div><i class="fas fa-sign-out-alt text-danger me-1"></i> <?= date('d M Y', strtotime($b->tanggal_checkout)) ?></div>
                                    </div>
                                </td>
                                <td><strong>Rp <?= number_format($b->total_harga, 0, ',', '.') ?></strong></td>
                                <td>
                                    <?php if($b->status == 'pending'): ?>
                                        <span class="badge bg-warning text-dark rounded-pill px-3">Pending</span>
                                    <?php elseif($b->status == 'confirmed'): ?>
                                        <span class="badge bg-success rounded-pill px-3">Confirmed</span>
                                    <?php elseif($b->status == 'completed'): ?>
                                        <span class="badge bg-info text-dark rounded-pill px-3">Completed</span>
                                    <?php elseif($b->status == 'cancelled'): ?>
                                        <span class="badge bg-danger rounded-pill px-3">Cancelled</span>
                                    <?php endif; ?>
                                </td>
                                <td class="pe-4 text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                            <li>
                                                <a href="<?= base_url('booking/detail/'.$b->id) ?>" class="dropdown-item"><i class="fas fa-eye me-2"></i>Detail</a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="<?= base_url('admin/update_status/'.$b->id) ?>" method="POST">
                                                    <input type="hidden" name="status" value="confirmed">
                                                    <button type="submit" class="dropdown-item text-success"><i class="fas fa-check-circle me-2"></i>Konfirmasi</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="<?= base_url('admin/update_status/'.$b->id) ?>" method="POST">
                                                    <input type="hidden" name="status" value="completed">
                                                    <button type="submit" class="dropdown-item text-info"><i class="fas fa-flag-checkered me-2"></i>Selesaikan</button>
                                                </form>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="<?= base_url('admin/update_status/'.$b->id) ?>" method="POST">
                                                    <input type="hidden" name="status" value="cancelled">
                                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Yakin batalkan booking ini?');"><i class="fas fa-times-circle me-2"></i>Batalkan</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">Belum ada data booking.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
