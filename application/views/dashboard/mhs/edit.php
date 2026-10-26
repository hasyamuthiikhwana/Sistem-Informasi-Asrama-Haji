<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .content-wrapper {
            margin-left: 250px;
            padding: 30px 35px;
            min-height: 100vh;
            background: #f0f2f5;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-header h3 {
            font-size: 26px;
            font-weight: 700;
            color: #1a1a2e;
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0;
        }

        .btn-back {
            background: #6c757d;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: #5a6268;
            color: white;
            transform: translateY(-2px);
        }

        .form-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            padding: 30px;
            max-width: 700px;
        }

        .form-card .form-title {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eef2f7;
        }

        .form-card .form-title i {
            color: #4e73df;
            margin-right: 10px;
        }

        .user-info-box {
            background: #f8f9fc;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 20px;
            border: 1px solid #eef2f7;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info-box .info-icon {
            font-size: 24px;
            color: #4e73df;
        }

        .user-info-box .info-text {
            font-size: 14px;
            color: #555;
        }

        .user-info-box .info-text strong {
            color: #1a1a2e;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 14px;
            color: #333;
            margin-bottom: 6px;
            display: block;
        }

        .form-group label .required {
            color: #e17055;
            margin-left: 4px;
        }

        .form-group .form-control {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .form-group .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.15);
        }

        .form-group .form-text {
            font-size: 12px;
            color: #888;
            margin-top: 4px;
        }

        /* ===== FOTO PREVIEW ===== */
        .foto-preview {
            width: 150px;
            height: 150px;
            border-radius: 12px;
            border: 2px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            overflow: hidden;
            background: #f8f9fc;
        }

        .foto-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .foto-preview .placeholder {
            color: #aaa;
            font-size: 14px;
            text-align: center;
        }

        .foto-preview .placeholder i {
            font-size: 40px;
            display: block;
            margin-bottom: 5px;
        }

        .foto-current {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 10px;
            padding: 10px 15px;
            background: #f8f9fc;
            border-radius: 8px;
        }

        .foto-current .label {
            font-weight: 600;
            color: #555;
        }

        .foto-current .filename {
            color: #4e73df;
            font-family: monospace;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eef2f7;
        }

        .btn-submit {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            border: none;
            padding: 11px 35px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 115, 223, 0.4);
            color: white;
        }

        .btn-cancel {
            background: #f8f9fc;
            color: #555;
            border: 1px solid #ddd;
            padding: 11px 35px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: #e9ecef;
            color: #333;
        }

        .alert-custom {
            padding: 14px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
        }

        .alert-custom.alert-danger {
            background: #fde8e8;
            color: #e17055;
            border-left: 4px solid #e17055;
        }

        .alert-custom.alert-success {
            background: #e3f7f1;
            color: #00b894;
            border-left: 4px solid #00b894;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                margin-left: 0;
                padding: 20px 16px;
                padding-top: 70px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header h3 {
                font-size: 20px;
                flex-wrap: wrap;
            }

            .form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn-submit,
            .form-actions .btn-cancel {
                justify-content: center;
                width: 100%;
            }

            .user-info-box {
                flex-direction: column;
                text-align: center;
            }

            .foto-current {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <!-- ========== SIDEBAR ========== -->
    <?php $this->load->view('layout/sidebar'); ?>

    <!-- ========== CONTENT WRAPPER ========== -->
    <div class="content-wrapper">
        
        <!-- ===== PAGE HEADER ===== -->
        <div class="page-header">
            <h3>
                <i class="fas fa-user-edit" style="color: #4e73df;"></i>
                Edit Mahasiswa
                <span class="badge-role">Administrator</span>
            </h3>
            <a href="<?= base_url('mhs') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- ===== FORM CARD ===== -->
        <div class="form-card">
            <div class="form-title">
                <i class="fas fa-user-circle"></i> Form Edit Mahasiswa
            </div>

            <!-- ===== INFO ===== -->
            <div class="user-info-box">
                <div class="info-icon">
                    <i class="fas fa-id-card"></i>
                </div>
                <div class="info-text">
                    Mengedit data mahasiswa: <strong><?= htmlspecialchars($mhs->nama) ?></strong>
                    <span style="margin-left: 10px; color: #888;">|</span>
                    NIM: <strong><?= htmlspecialchars($mhs->nim) ?></strong>
                </div>
            </div>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert-custom alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('mhs/update/'.$mhs->nim) ?>" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label>
                        <i class="fas fa-id-card"></i> NIM
                        <span class="required">*</span>
                    </label>
                    <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" 
                           value="<?= set_value('nim', $mhs->nim) ?>" required>
                    <div class="form-text">Minimal 5 karakter, maksimal 20 karakter</div>
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-user"></i> Nama
                        <span class="required">*</span>
                    </label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama mahasiswa" 
                           value="<?= set_value('nama', $mhs->nama) ?>" required>
                    <div class="form-text">Minimal 3 karakter, maksimal 100 karakter</div>
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-graduation-cap"></i> Program Studi
                        <span class="required">*</span>
                    </label>
                    <input type="text" name="prodi" class="form-control" placeholder="Masukkan program studi" 
                           value="<?= set_value('prodi', $mhs->prodi) ?>" required>
                    <div class="form-text">Minimal 3 karakter, maksimal 50 karakter</div>
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-building"></i> Jurusan
                        <span class="required">*</span>
                    </label>
                    <input type="text" name="jurusan" class="form-control" placeholder="Masukkan jurusan" 
                           value="<?= set_value('jurusan', $mhs->jurusan) ?>" required>
                    <div class="form-text">Minimal 3 karakter, maksimal 50 karakter</div>
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-camera"></i> Foto
                        <span class="form-text" style="font-weight: normal; color: #888;">(Kosongkan jika tidak ingin mengubah)</span>
                    </label>
                    <input type="file" name="foto" class="form-control" accept="image/*" id="fotoInput">
                    <div class="form-text">Format: JPG, JPEG, PNG, GIF | Maks: 2MB</div>
                    
                    <!-- Preview Foto -->
                    <div class="foto-preview" id="fotoPreview">
                        <?php if (!empty($mhs->foto) && file_exists(FCPATH . 'uploads/foto/' . $mhs->foto)): ?>
                            <img src="<?= base_url('uploads/foto/' . $mhs->foto) ?>" alt="Foto">
                        <?php else: ?>
                            <div class="placeholder">
                                <i class="fas fa-camera"></i>
                                <span>Belum ada foto</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($mhs->foto) && file_exists(FCPATH . 'uploads/foto/' . $mhs->foto)): ?>
                        <div class="foto-current">
                            <span class="label">📷 Foto saat ini:</span>
                            <span class="filename"><?= htmlspecialchars($mhs->foto) ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="<?= base_url('mhs') ?>" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>

    </div>

    <!-- ===== JAVASCRIPT PREVIEW FOTO ===== -->
    <script>
        document.getElementById('fotoInput').addEventListener('change', function(e) {
            const preview = document.getElementById('fotoPreview');
            const file = e.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
                };
                reader.readAsDataURL(file);
            } else {
                // Kembali ke foto lama jika ada
                <?php if (!empty($mhs->foto) && file_exists(FCPATH . 'uploads/foto/' . $mhs->foto)): ?>
                    preview.innerHTML = '<img src="<?= base_url('uploads/foto/' . $mhs->foto) ?>" alt="Foto">';
                <?php else: ?>
                    preview.innerHTML = `
                        <div class="placeholder">
                            <i class="fas fa-camera"></i>
                            <span>Belum ada foto</span>
                        </div>
                    `;
                <?php endif; ?>
            }
        });
    </script>

</body>
</html>