<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-check-circle me-2"></i> <?= $this->session->flashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i> <?= $this->session->flashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="btn-group shadow-sm" role="group" aria-label="Booking Filters">
        <a href="<?= base_url('admin/bookings') ?>" class="btn <?= empty($current_status) ? 'btn-success' : 'btn-outline-success' ?>">Semua</a>
        <a href="<?= base_url('admin/bookings/pending') ?>" class="btn <?= (isset($current_status) && $current_status == 'pending') ? 'btn-success' : 'btn-outline-success' ?>">Pending</a>
        <a href="<?= base_url('admin/bookings/confirmed') ?>" class="btn <?= (isset($current_status) && $current_status == 'confirmed') ? 'btn-success' : 'btn-outline-success' ?>">Confirmed</a>
        <a href="<?= base_url('admin/bookings/completed') ?>" class="btn <?= (isset($current_status) && $current_status == 'completed') ? 'btn-success' : 'btn-outline-success' ?>">Completed</a>
        <a href="<?= base_url('admin/bookings/cancelled') ?>" class="btn <?= (isset($current_status) && $current_status == 'cancelled') ? 'btn-success' : 'btn-outline-success' ?>">Cancelled</a>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Kode</th>
                        <th>User</th>
                        <th>Fasilitas</th>
                        <th>Check-in / Out</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($bookings)): ?>
                        <?php $no = 1; foreach($bookings as $b): ?>
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
                            <td colspan="8" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-inbox fa-3x mb-3"></i>
                                    <h5>Belum ada data booking</h5>
                                    <p>Tidak ditemukan data booking yang sesuai.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
