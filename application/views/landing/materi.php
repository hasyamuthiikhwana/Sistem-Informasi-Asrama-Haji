<!-- ===== PAGE TITLE ===== -->
<div class="content-section">
    <h1 class="page-title">📚 Daftar Materi</h1>
    <p class="text-muted">Klik pada file untuk membuka materi.</p>
    
    <div class="row g-4 mt-2">
        <?php if (!empty($files)): ?>
            <?php foreach ($files as $file): ?>
                <?php 
                    // Ambil nama file tanpa ekstensi untuk judul
                    $title = pathinfo($file, PATHINFO_FILENAME);
                    // Ubah underscore atau dash menjadi spasi
                    $title = str_replace(['_', '-'], ' ', $title);
                    // Kapitalisasi judul
                    $title = ucwords($title);
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="card materi-card">
                        <div class="card-body text-center">
                            <div class="materi-icon">
                                <i class="fas fa-file-code text-primary"></i>
                            </div>
                            <h6 class="card-title"><?= htmlspecialchars($title) ?></h6>
                            <p class="card-text text-muted small">
                                <i class="fas fa-html5 text-warning"></i> HTML
                            </p>
                            <a href="<?= base_url('materi/' . $file) ?>" class="btn btn-sm btn-primary" target="_blank">
                                <i class="fas fa-eye"></i> Buka
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <div class="empty-state">
                    <div class="icon"><i class="fas fa-folder-open fa-4x text-muted"></i></div>
                    <h4 class="mt-3">Belum Ada Materi</h4>
                    <p class="text-muted">Belum ada file materi HTML yang tersedia.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .materi-card {
        border: none;
        border-radius: 12px;
        transition: all 0.3s;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        height: 100%;
        cursor: pointer;
    }
    
    .materi-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    
    .materi-card .materi-icon {
        font-size: 48px;
        margin-bottom: 10px;
    }
    
    .materi-card .card-title {
        font-size: 14px;
        font-weight: 600;
        color: #1a1a2e;
        word-break: break-word;
    }
    
    .materi-card .btn-primary {
        background: #4e73df;
        border: none;
        border-radius: 20px;
        padding: 6px 20px;
    }
    
    .materi-card .btn-primary:hover {
        background: #224abe;
    }
    
    .empty-state .icon {
        color: #ddd;
    }
</style>