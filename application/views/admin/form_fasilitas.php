<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                <h5 class="fw-bold" style="color: #1a5c3a;">
                    <?= isset($fasilitas) ? 'Edit Fasilitas' : 'Tambah Fasilitas Baru' ?>
                </h5>
            </div>
            <div class="card-body">
                <form action="<?= isset($fasilitas) ? base_url('admin/update_fasilitas/'.$fasilitas->id) : base_url('admin/save_fasilitas') ?>" method="POST">
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-medium">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($fasilitas) ? htmlspecialchars($fasilitas->nama) : '' ?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tipe" class="form-label fw-medium">Tipe Fasilitas</label>
                            <select class="form-select" id="tipe" name="tipe" required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="aula_besar" <?= isset($fasilitas) && $fasilitas->tipe == 'aula_besar' ? 'selected' : '' ?>>Aula Besar</option>
                                <option value="aula_kecil" <?= isset($fasilitas) && $fasilitas->tipe == 'aula_kecil' ? 'selected' : '' ?>>Aula Kecil</option>
                                <option value="kamar" <?= isset($fasilitas) && $fasilitas->tipe == 'kamar' ? 'selected' : '' ?>>Kamar Penginapan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="kapasitas" class="form-label fw-medium">Kapasitas (Orang)</label>
                            <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="1" value="<?= isset($fasilitas) ? $fasilitas->kapasitas : '' ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="harga_per_hari" class="form-label fw-medium">Harga per Hari (Rp)</label>
                        <input type="number" class="form-control" id="harga_per_hari" name="harga_per_hari" min="0" value="<?= isset($fasilitas) ? $fasilitas->harga_per_hari : '' ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-medium">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?= isset($fasilitas) ? htmlspecialchars($fasilitas->deskripsi) : '' ?></textarea>
                    </div>

                    <?php if(isset($fasilitas)): ?>
                    <div class="mb-4">
                        <label for="status" class="form-label fw-medium">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="tersedia" <?= $fasilitas->status == 'tersedia' ? 'selected' : '' ?>>Tersedia</option>
                            <option value="maintenance" <?= $fasilitas->status == 'maintenance' ? 'selected' : '' ?>>Maintenance</option>
                        </select>
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url('admin/fasilitas') ?>" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-success" style="background-color: #1a5c3a; border-color: #1a5c3a;">
                            <i class="fas fa-save me-1"></i> <?= isset($fasilitas) ? 'Simpan Perubahan' : 'Simpan Fasilitas' ?>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
