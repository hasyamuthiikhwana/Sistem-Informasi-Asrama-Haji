<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAS - <?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1a5c3a;
            --primary-dark: #0f3b26;
            --primary-light: #2a7a4e;
            --gold: #c9a95c;
            --gold-light: #d4ba7a;
            --sidebar-width: 260px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; min-height: 100vh; }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary) 100%);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            padding: 0;
            transition: all 0.3s;
            overflow-y: auto;
        }
        .sidebar-brand {
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-brand h4 {
            color: white;
            font-weight: 700;
            margin: 0;
            font-size: 1.3rem;
        }
        .sidebar-brand small {
            color: var(--gold);
            font-size: 0.7rem;
        }
        .sidebar-menu {
            padding: 15px 0;
        }
        .sidebar-menu .menu-label {
            color: rgba(255,255,255,0.4);
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 10px 20px 5px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }
        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        .sidebar-menu a.active {
            background: rgba(255,255,255,0.12);
            color: white;
            border-left-color: var(--gold);
            font-weight: 600;
        }
        .sidebar-menu a i {
            width: 22px;
            text-align: center;
            font-size: 1rem;
        }

        /* Main Content */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }
        .topbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .topbar .page-title {
            font-weight: 600;
            color: var(--primary-dark);
            font-size: 1.2rem;
            margin: 0;
        }
        .topbar .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .topbar .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }
        .topbar .user-name {
            font-weight: 500;
            color: #333;
            font-size: 0.9rem;
        }
        .topbar .user-role {
            font-size: 0.75rem;
            color: #999;
        }
        .content-area {
            padding: 30px;
        }

        /* Cards */
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
            transition: all 0.3s;
            border: 1px solid rgba(0,0,0,0.04);
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }
        .stat-card .stat-icon {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }
        .stat-card .stat-icon.green { background: rgba(26,92,58,0.1); color: var(--primary); }
        .stat-card .stat-icon.gold { background: rgba(201,169,92,0.15); color: var(--gold); }
        .stat-card .stat-icon.blue { background: rgba(59,130,246,0.1); color: #3b82f6; }
        .stat-card .stat-icon.red { background: rgba(239,68,68,0.1); color: #ef4444; }
        .stat-card h3 { font-weight: 700; color: #333; margin: 8px 0 2px; font-size: 1.8rem; }
        .stat-card p { color: #888; font-size: 0.85rem; margin: 0; }

        .content-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.04);
            overflow: hidden;
        }
        .content-card .card-header-custom {
            padding: 20px 25px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-card .card-header-custom h5 {
            font-weight: 600;
            color: var(--primary-dark);
            margin: 0;
        }
        .content-card .card-body-custom {
            padding: 25px;
        }

        /* Buttons */
        .btn-simas {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s;
        }
        .btn-simas:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: white;
            transform: translateY(-1px);
        }
        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: var(--primary-dark);
            border: none;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s;
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, #b8963e, var(--gold));
            color: white;
            transform: translateY(-1px);
        }

        /* Tables */
        .table-simas th {
            background: var(--primary);
            color: white;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 12px 15px;
            border: none;
        }
        .table-simas td {
            padding: 12px 15px;
            font-size: 0.88rem;
            vertical-align: middle;
        }

        /* Status badges */
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-confirmed { background: #d1fae5; color: #065f46; }
        .badge-completed { background: #dbeafe; color: #1e40af; }
        .badge-cancelled { background: #fee2e2; color: #991b1b; }

        /* Facility card in booking */
        .booking-facility-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.06);
            transition: all 0.3s;
            border: 2px solid transparent;
            height: 100%;
        }
        .booking-facility-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-color: var(--gold);
        }
        .booking-facility-card .card-img-top {
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            color: white;
        }
        .booking-facility-card .card-img-top.bg-aula-besar { background: linear-gradient(135deg, var(--primary-dark), var(--primary)); }
        .booking-facility-card .card-img-top.bg-aula-kecil { background: linear-gradient(135deg, var(--primary), var(--primary-light)); }
        .booking-facility-card .card-img-top.bg-kamar { background: linear-gradient(135deg, #b8963e, var(--gold)); }
        .booking-facility-card .card-body { padding: 20px; }
        .booking-facility-card .price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--gold);
        }
        .booking-facility-card .price small {
            font-size: 0.75rem;
            color: #999;
            font-weight: 400;
        }

        .alert { border-radius: 12px; }

        /* Mobile */
        .sidebar-toggle {
            display: none;
            background: var(--primary);
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 1.2rem;
        }
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-wrapper { margin-left: 0; }
            .sidebar-toggle { display: block; }
            .content-area { padding: 15px; }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <h4>🏛️ SIMAS</h4>
        <small>Sistem Informasi Manajemen Asrama</small>
    </div>
    <div class="sidebar-menu">
        <div class="menu-label">Menu Utama</div>
        <a href="<?= base_url('booking') ?>" class="<?= (isset($active_menu) && $active_menu == 'dashboard') ? 'active' : '' ?>">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>

        <div class="menu-label">Booking Fasilitas</div>
        <a href="<?= base_url('booking/fasilitas/aula_besar') ?>" class="<?= (isset($active_menu) && $active_menu == 'fasilitas_aula_besar') ? 'active' : '' ?>">
            <i class="fas fa-landmark"></i> Aula Besar
        </a>
        <a href="<?= base_url('booking/fasilitas/aula_kecil') ?>" class="<?= (isset($active_menu) && $active_menu == 'fasilitas_aula_kecil') ? 'active' : '' ?>">
            <i class="fas fa-door-open"></i> Aula Kecil
        </a>
        <a href="<?= base_url('booking/fasilitas/kamar') ?>" class="<?= (isset($active_menu) && $active_menu == 'fasilitas_kamar') ? 'active' : '' ?>">
            <i class="fas fa-bed"></i> Kamar Penginapan
        </a>

        <div class="menu-label">Riwayat</div>
        <a href="<?= base_url('booking/riwayat') ?>" class="<?= (isset($active_menu) && $active_menu == 'riwayat') ? 'active' : '' ?>">
            <i class="fas fa-history"></i> Riwayat Booking
        </a>

        <?php if ($this->session->userdata('role') == 'admin'): ?>
        <div class="menu-label">Admin Panel</div>
        <a href="<?= base_url('admin/dashboard') ?>" class="<?= (isset($active_menu) && $active_menu == 'admin_dashboard') ? 'active' : '' ?>">
            <i class="fas fa-chart-bar"></i> Admin Dashboard
        </a>
        <a href="<?= base_url('admin/bookings') ?>" class="<?= (isset($active_menu) && $active_menu == 'admin_bookings') ? 'active' : '' ?>">
            <i class="fas fa-clipboard-list"></i> Kelola Booking
        </a>
        <a href="<?= base_url('admin/fasilitas') ?>" class="<?= (isset($active_menu) && $active_menu == 'admin_fasilitas') ? 'active' : '' ?>">
            <i class="fas fa-cogs"></i> Kelola Fasilitas
        </a>
        <?php endif; ?>

        <div class="menu-label">Akun</div>
        <a href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</div>

<!-- Main -->
<div class="main-wrapper">
    <div class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="sidebar-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
                <i class="fas fa-bars"></i>
            </button>
            <h5 class="page-title"><?= $title ?></h5>
        </div>
        <div class="user-info">
            <div>
                <div class="user-name"><?= $this->session->userdata('nama') ?></div>
                <div class="user-role"><?= ucfirst($this->session->userdata('role')) ?></div>
            </div>
            <div class="user-avatar">
                <?= strtoupper(substr($this->session->userdata('nama') ?? 'U', 0, 1)) ?>
            </div>
        </div>
    </div>
    <div class="content-area">
