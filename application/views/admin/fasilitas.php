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

<div class="d-flex justify-content-end mb-4">
    <a href="<?= base_url('admin/add_fasilitas') ?>" class="btn btn-success shadow-sm" style="background-color: #1a5c3a; border-color: #1a5c3a;">
        <i class="fas fa-plus me-2"></i> Tambah Fasilitas
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Nama Fasilitas</th>
                        <th>Tipe</th>
                        <th>Kapasitas</th>
                        <th>Harga per Hari</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($fasilitas)): ?>
                        <?php $no = 1; foreach($fasilitas as $f): ?>
                            <tr>
                                <td class="ps-4"><?= $no++ ?></td>
                                <td><span class="fw-medium"><?= htmlspecialchars($f->nama) ?></span></td>
                                <td>
                                    <?php 
                                        $tipe = str_replace('_', ' ', $f->tipe);
                                        echo ucwords($tipe);
                                    ?>
                                </td>
                                <td><?= $f->kapasitas ?> Orang</td>
                                <td>Rp <?= number_format($f->harga_per_hari, 0, ',', '.') ?></td>
                                <td>
                                    <?php if($f->status == 'tersedia'): ?>
                                        <span class="badge bg-success rounded-pill px-3">Tersedia</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark rounded-pill px-3">Maintenance</span>
                                    <?php endif; ?>
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="<?= base_url('admin/edit_fasilitas/'.$f->id) ?>" class="btn btn-sm btn-outline-primary shadow-sm rounded-circle me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/delete_fasilitas/'.$f->id) ?>" class="btn btn-sm btn-outline-danger shadow-sm rounded-circle" title="Delete" onclick="return confirm('Yakin ingin menghapus fasilitas ini?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-building fa-3x mb-3"></i>
                                    <h5>Belum ada data fasilitas</h5>
                                    <p>Silakan tambah fasilitas baru.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
