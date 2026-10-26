<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIMAS</title>
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
        .login-wrapper {
            width: 100%;
            max-width: 440px;
        }
        .login-card {
            background: white;
            border-radius: 24px;
            padding: 45px 40px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.3);
            animation: fadeInUp 0.6s ease;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-logo {
            text-align: center;
            margin-bottom: 35px;
        }
        .login-logo .icon {
            font-size: 3rem;
            color: var(--primary-green);
            margin-bottom: 10px;
        }
        .login-logo h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-green);
            margin: 0;
        }
        .login-logo .subtitle {
            color: #888;
            font-size: 0.85rem;
            margin-top: 5px;
        }
        .form-floating {
            margin-bottom: 16px;
        }
        .form-floating .form-control {
            border-radius: 14px;
            border: 2px solid #e8e8e8;
            padding: 16px 20px;
            height: 56px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        .form-floating .form-control:focus {
            border-color: var(--secondary-gold);
            box-shadow: 0 0 0 0.2rem rgba(201, 169, 92, 0.2);
        }
        .form-floating label {
            padding: 16px 20px;
            color: #999;
        }
        .btn-login {
            background: linear-gradient(135deg, var(--secondary-gold), #d4ba7a);
            color: var(--dark-green);
            font-weight: 700;
            border: none;
            padding: 14px;
            border-radius: 14px;
            width: 100%;
            font-size: 1.05rem;
            transition: all 0.3s;
            margin-top: 8px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #b8963e, var(--secondary-gold));
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(201,169,92,0.4);
        }
        .login-footer {
            text-align: center;
            margin-top: 25px;
        }
        .login-footer .register-link {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .login-footer .register-link:hover {
            color: var(--secondary-gold);
        }
        .login-footer .hint {
            font-size: 0.8rem;
            color: #aaa;
            margin-top: 12px;
        }
        .alert {
            border-radius: 14px;
            font-size: 0.9rem;
            padding: 12px 16px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: 0.3s;
        }
        .back-link:hover { color: white; }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-logo">
                <div class="icon"><i class="bi bi-building"></i></div>
                <h1>SIMAS</h1>
                <p class="subtitle">Sistem Informasi Manajemen Asrama</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <?php if (validation_errors()): ?>
                <div class="alert alert-warning">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill"></i> <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('auth/proses_login') ?>">
                <div class="form-floating">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
                    <label for="username"><i class="bi bi-person"></i> Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password"><i class="bi bi-lock"></i> Password</label>
                </div>
                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk
                </button>
            </form>

            <div class="login-footer">
                <p style="margin-bottom:8px; color:#666; font-size:0.9rem;">Belum punya akun?</p>
                <a href="<?= site_url('auth/register') ?>" class="register-link">
                    <i class="bi bi-person-plus"></i> Daftar Sekarang
                </a>
                <p class="hint">Login: admin / admin</p>
            </div>
        </div>
        <a href="<?= base_url() ?>" class="back-link">
            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>