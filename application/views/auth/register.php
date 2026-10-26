<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SIMAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-green: #1a5c3a;
            --secondary-gold: #c9a95c;
            --dark-green: #0f3b26;
        }
        body {
            background: linear-gradient(135deg, #0f3b26 0%, #1a5c3a 50%, #2a7a4e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }
        .register-wrapper { width: 100%; max-width: 480px; }
        .register-card {
            background: white;
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.3);
            animation: fadeInUp 0.6s ease;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .register-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .register-logo .icon { font-size: 2.5rem; color: var(--primary-green); }
        .register-logo h2 { font-weight: 700; color: var(--primary-green); margin: 8px 0 0; }
        .register-logo p { color: #888; font-size: 0.85rem; }
        .form-floating { margin-bottom: 14px; }
        .form-floating .form-control {
            border-radius: 12px;
            border: 2px solid #e8e8e8;
            padding: 14px 18px;
            height: 52px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        .form-floating .form-control:focus {
            border-color: var(--secondary-gold);
            box-shadow: 0 0 0 0.2rem rgba(201, 169, 92, 0.2);
        }
        .form-floating label { padding: 14px 18px; color: #999; font-size: 0.9rem; }
        .btn-register {
            background: linear-gradient(135deg, var(--primary-green), #2a7a4e);
            color: white;
            font-weight: 700;
            border: none;
            padding: 14px;
            border-radius: 14px;
            width: 100%;
            font-size: 1.05rem;
            transition: all 0.3s;
            margin-top: 5px;
        }
        .btn-register:hover {
            background: linear-gradient(135deg, var(--dark-green), var(--primary-green));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(26,92,58,0.4);
            color: white;
        }
        .register-footer {
            text-align: center;
            margin-top: 20px;
        }
        .register-footer a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
        }
        .register-footer a:hover { color: var(--secondary-gold); }
        .alert { border-radius: 12px; font-size: 0.88rem; }
        .back-link {
            display: block; text-align: center; margin-top: 20px;
            color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.9rem; transition: 0.3s;
        }
        .back-link:hover { color: white; }
    </style>
</head>
<body>
    <div class="register-wrapper">
        <div class="register-card">
            <div class="register-logo">
                <div class="icon"><i class="bi bi-person-plus-fill"></i></div>
                <h2>Daftar Akun</h2>
                <p>Buat akun untuk mulai booking</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><i class="bi bi-exclamation-triangle-fill"></i> <?= $error ?></div>
            <?php endif; ?>
            <?php if (validation_errors()): ?>
                <div class="alert alert-warning"><?= validation_errors() ?></div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('auth/proses_register') ?>">
                <div class="form-floating">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama') ?>" required>
                    <label for="nama"><i class="bi bi-person"></i> Nama Lengkap</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
                    <label for="email"><i class="bi bi-envelope"></i> Email</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" value="<?= set_value('no_hp') ?>" required>
                    <label for="no_hp"><i class="bi bi-phone"></i> No. HP</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>" required>
                    <label for="username"><i class="bi bi-at"></i> Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password"><i class="bi bi-lock"></i> Password (min. 6 karakter)</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Konfirmasi" required>
                    <label for="password_confirm"><i class="bi bi-lock-fill"></i> Konfirmasi Password</label>
                </div>
                <button type="submit" class="btn-register">
                    <i class="bi bi-check-circle"></i> Daftar
                </button>
            </form>

            <div class="register-footer">
                <p style="color:#666; font-size:0.9rem; margin-bottom:5px;">Sudah punya akun?</p>
                <a href="<?= site_url('auth') ?>"><i class="bi bi-box-arrow-in-right"></i> Login di sini</a>
            </div>
        </div>
        <a href="<?= base_url() ?>" class="back-link"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
