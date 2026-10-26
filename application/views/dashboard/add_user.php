<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* ============================================================ */
        /* CONTENT AREA                                                 */
        /* ============================================================ */
        .content-wrapper {
            margin-left: 250px;
            padding: 30px 35px;
            min-height: 100vh;
            background: #f0f2f5;
        }

        /* ========== PAGE HEADER ========== */
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

        .page-header h3 .badge-role {
            font-size: 13px;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            padding: 4px 16px;
            border-radius: 20px;
            font-weight: 500;
        }

        .btn-back {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #5a6268;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
        }

        /* ========== FORM CARD ========== */
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

        .form-group .form-control.is-invalid {
            border-color: #e17055;
        }

        .form-group .form-control.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(225, 112, 85, 0.15);
        }

        .form-group .invalid-feedback {
            font-size: 13px;
            color: #e17055;
            margin-top: 4px;
        }

        .form-group .form-text {
            font-size: 12px;
            color: #888;
            margin-top: 4px;
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

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .btn-cancel {
            background: #f8f9fc;
            color: #555;
            border: 1px solid #ddd;
            padding: 11px 35px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-cancel:hover {
            background: #e9ecef;
            color: #333;
        }

        /* ========== ALERT ========== */
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

        /* ========== RESPONSIVE ========== */
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
        }

        @media (max-width: 480px) {
            .page-header h3 {
                font-size: 18px;
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
                <i class="fas fa-user-plus" style="color: #4e73df;"></i>
                Tambah User
                <span class="badge-role">Administrator</span>
            </h3>
            <a href="<?= base_url('dashboard') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- ===== FORM CARD ===== -->
        <div class="form-card">
            <div class="form-title">
                <i class="fas fa-user-circle"></i> Form Tambah User
            </div>

            <!-- Tampilkan error/success -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert-custom alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert-custom alert-success">
                    <i class="fas fa-check-circle"></i>
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('dashboard/save') ?>" method="post" id="formAddUser">
                <!-- CSRF Token (jika aktif) -->
                <!-- <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>"> -->

                <div class="form-group">
                    <label>
                        <i class="fas fa-user"></i> Username
                        <span class="required">*</span>
                    </label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" 
                           value="<?= set_value('username') ?>" required>
                    <div class="form-text">Minimal 3 karakter, maksimal 50 karakter</div>
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-lock"></i> Password
                        <span class="required">*</span>
                    </label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    <div class="form-text">Minimal 4 karakter</div>
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-check-circle"></i> Konfirmasi Password
                        <span class="required">*</span>
                    </label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi password" required>
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-user-tag"></i> Role
                        <span class="required">*</span>
                    </label>
               <!-- ===== SESUDAH (admin/dosen/mahasiswa) ===== -->
<select name="role" class="form-control" required>
    <option value="">-- Pilih Role --</option>
    <option value="admin" <?= set_value('role') == 'admin' ? 'selected' : '' ?>>👑 Admin</option>
    <option value="dosen" <?= set_value('role') == 'dosen' ? 'selected' : '' ?>>👨‍🏫 Dosen</option>
    <option value="mahasiswa" <?= set_value('role') == 'mahasiswa' ? 'selected' : '' ?>>🎓 Mahasiswa</option>
</select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit" id="btnSubmit">
                        <i class="fas fa-save"></i> Simpan User
                    </button>
                    <a href="<?= base_url('dashboard') ?>" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>

    </div>
    <!-- ========== END CONTENT WRAPPER ========== -->

    <!-- ============================================================ -->
    <!-- JAVASCRIPT                                                    -->
    <!-- ============================================================ -->
    <script>
        // ========== FORM VALIDATION ==========
        document.getElementById('formAddUser').addEventListener('submit', function(e) {
            const password = document.querySelector('input[name="password"]');
            const confirm = document.querySelector('input[name="confirm_password"]');
            const username = document.querySelector('input[name="username"]');
            const role = document.querySelector('select[name="role"]');
            
            let isValid = true;
            let errorMessage = '';
            
            // Reset error
            document.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
            });
            document.querySelectorAll('.invalid-feedback').forEach(el => {
                el.remove();
            });
            
            // Validasi username
            if (username.value.trim() === '') {
                showError(username, 'Username harus diisi!');
                isValid = false;
            } else if (username.value.trim().length < 3) {
                showError(username, 'Username minimal 3 karakter!');
                isValid = false;
            } else if (username.value.trim().length > 50) {
                showError(username, 'Username maksimal 50 karakter!');
                isValid = false;
            }
            
            // Validasi password
            if (password.value === '') {
                showError(password, 'Password harus diisi!');
                isValid = false;
            } else if (password.value.length < 4) {
                showError(password, 'Password minimal 4 karakter!');
                isValid = false;
            }
            
            // Validasi konfirmasi password
            if (confirm.value === '') {
                showError(confirm, 'Konfirmasi password harus diisi!');
                isValid = false;
            } else if (password.value !== confirm.value) {
                showError(confirm, 'Password tidak cocok!');
                isValid = false;
            }
            
            // Validasi role
            if (role.value === '') {
                showError(role, 'Role harus dipilih!');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
                // Scroll ke error pertama
                document.querySelector('.is-invalid')?.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
            }
        });
        
        // ========== SHOW ERROR FUNCTION ==========
        function showError(element, message) {
            element.classList.add('is-invalid');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback';
            errorDiv.textContent = message;
            element.parentNode.appendChild(errorDiv);
        }
        
        // ========== REAL-TIME VALIDATION ==========
        // Username
        document.querySelector('input[name="username"]').addEventListener('blur', function() {
            if (this.value.trim() === '') {
                showError(this, 'Username harus diisi!');
            } else if (this.value.trim().length < 3) {
                showError(this, 'Username minimal 3 karakter!');
            } else if (this.value.trim().length > 50) {
                showError(this, 'Username maksimal 50 karakter!');
            } else {
                this.classList.remove('is-invalid');
                document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
            }
        });
        
        // Password
        document.querySelector('input[name="password"]').addEventListener('blur', function() {
            if (this.value === '') {
                showError(this, 'Password harus diisi!');
            } else if (this.value.length < 4) {
                showError(this, 'Password minimal 4 karakter!');
            } else {
                this.classList.remove('is-invalid');
                document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
            }
        });
        
        // Konfirmasi Password
        document.querySelector('input[name="confirm_password"]').addEventListener('blur', function() {
            const password = document.querySelector('input[name="password"]');
            if (this.value === '') {
                showError(this, 'Konfirmasi password harus diisi!');
            } else if (password.value !== this.value) {
                showError(this, 'Password tidak cocok!');
            } else {
                this.classList.remove('is-invalid');
                document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
            }
        });
        
        // Role
        document.querySelector('select[name="role"]').addEventListener('change', function() {
            if (this.value === '') {
                showError(this, 'Role harus dipilih!');
            } else {
                this.classList.remove('is-invalid');
                document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
            }
        });
        
        // ========== PREVENT DOUBLE SUBMIT ==========
        document.getElementById('formAddUser').addEventListener('submit', function(e) {
            const btn = document.getElementById('btnSubmit');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            
            // Re-enable setelah 5 detik (fallback)
            setTimeout(function() {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-save"></i> Simpan User';
            }, 5000);
        });
    </script>

</body>
</html>