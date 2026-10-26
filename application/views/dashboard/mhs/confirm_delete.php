<div class="user-info">
    <?php if (!empty($mhs->foto) && file_exists(FCPATH . 'uploads/foto/' . $mhs->foto)): ?>
        <img src="<?= base_url('uploads/foto/' . $mhs->foto) ?>" 
             alt="Foto" 
             style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; margin-bottom: 10px; border: 3px solid #eef2f7;">
    <?php else: ?>
        <div style="width: 80px; height: 80px; border-radius: 50%; background: #e9ecef; display: flex; align-items: center; justify-content: center; margin: 0 auto 10px auto; font-size: 32px; color: #aaa;">
            <i class="fas fa-user"></i>
        </div>
    <?php endif; ?>
    
    <div class="nama"><?= htmlspecialchars($mhs->nama) ?></div>
    <div class="nim">NIM: <?= htmlspecialchars($mhs->nim) ?></div>
    <div style="margin-top: 5px; font-weight: normal; color: #555;">
        <?= htmlspecialchars($mhs->prodi) ?> | <?= htmlspecialchars($mhs->jurusan) ?>
    </div>
</div>