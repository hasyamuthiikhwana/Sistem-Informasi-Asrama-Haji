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
            --gold-dark: #b8963e;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: 'Poppins', sans-serif;
            padding-top: 76px;
            color: #333;
            overflow-x: hidden;
        }

        /* ===== NAVBAR ===== */
        .navbar-simas {
            background: rgba(255,255,255,0.98);
            backdrop-filter: blur(20px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            padding: 12px 0;
            transition: all 0.3s;
        }
        .navbar-simas.scrolled {
            padding: 8px 0;
            box-shadow: 0 4px 30px rgba(0,0,0,0.12);
        }
        .navbar-brand-simas {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary) !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .navbar-brand-simas .brand-icon {
            font-size: 1.8rem;
        }
        .navbar-brand-simas .brand-sub {
            font-size: 0.65rem;
            color: var(--gold);
            font-weight: 500;
            display: block;
            line-height: 1;
            margin-top: -2px;
        }
        .nav-link-simas {
            font-weight: 500;
            color: #555 !important;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        .nav-link-simas:hover, .nav-link-simas.active {
            color: var(--primary) !important;
            background: rgba(26,92,58,0.08);
        }
        .btn-login-nav {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white !important;
            border-radius: 25px;
            padding: 8px 24px !important;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            font-size: 0.95rem;
        }
        .btn-login-nav:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(26,92,58,0.3);
            color: white !important;
        }

        /* ===== HERO ===== */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, var(--primary-light) 100%);
            color: white;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(201,169,92,0.15) 0%, transparent 70%);
            border-radius: 50%;
        }
        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            border-radius: 50%;
        }
        .hero-title {
            font-size: 3.2rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        .hero-title .text-gold { color: var(--gold); }
        .hero-subtitle {
            font-size: 1.15rem;
            opacity: 0.9;
            margin-bottom: 35px;
            font-weight: 300;
            line-height: 1.7;
        }
        .btn-hero-primary {
            background: var(--gold);
            color: var(--primary-dark);
            border: none;
            padding: 14px 35px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-hero-primary:hover {
            background: var(--gold-dark);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(201,169,92,0.4);
        }
        .btn-hero-outline {
            background: transparent;
            color: white;
            border: 2px solid rgba(255,255,255,0.4);
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 500;
            font-size: 1.05rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-hero-outline:hover {
            background: rgba(255,255,255,0.15);
            border-color: white;
            color: white;
        }
        .hero-stats {
            display: flex;
            gap: 40px;
            margin-top: 50px;
        }
        .hero-stat-item h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gold);
        }
        .hero-stat-item p {
            font-size: 0.85rem;
            opacity: 0.8;
            margin: 0;
        }
        .hero-image {
            text-align: center;
        }
        .hero-image i {
            font-size: 15rem;
            opacity: 0.2;
            color: var(--gold);
        }

        /* ===== SECTION TITLES ===== */
        .section-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 10px;
        }
        .section-subtitle {
            color: #777;
            font-size: 1.05rem;
            margin-bottom: 50px;
        }
        .title-decorator {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--gold));
            border-radius: 2px;
            margin: 15px auto 0;
        }

        /* ===== FACILITY CARDS ===== */
        .section-fasilitas { padding: 80px 0; background: #f8faf9; }
        .facility-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            transition: all 0.4s;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.04);
        }
        .facility-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(26,92,58,0.15);
        }
        .facility-card-img {
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
            overflow: hidden;
            position: relative;
        }
        .facility-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .facility-card:hover .facility-card-img img {
            transform: scale(1.05);
        }
        .facility-card-img.aula-besar { background: linear-gradient(135deg, var(--primary-dark), var(--primary)); }
        .facility-card-img.aula-kecil { background: linear-gradient(135deg, var(--primary), var(--primary-light)); }
        .facility-card-img.kamar { background: linear-gradient(135deg, var(--gold-dark), var(--gold)); }

        /* ===== GALLERY ===== */
        .section-gallery { padding: 80px 0; }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        .gallery-item {
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            height: 250px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.4s;
        }
        .gallery-item:first-child {
            grid-column: span 2;
            height: 320px;
        }
        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .gallery-item:hover img {
            transform: scale(1.08);
        }
        .gallery-item .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            color: white;
        }
        .gallery-item .gallery-overlay h6 {
            font-weight: 600;
            margin: 0;
        }
        .gallery-item .gallery-overlay small {
            opacity: 0.8;
        }
        @media (max-width: 768px) {
            .gallery-item:first-child { grid-column: span 1; height: 250px; }
        }
        .facility-card-body {
            padding: 25px;
        }
        .facility-card-body h4 {
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 10px;
        }
        .facility-card-body p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
        }
        .facility-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--gold-dark);
        }
        .facility-price small {
            font-size: 0.75rem;
            color: #999;
            font-weight: 400;
        }
        .btn-booking {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }
        .btn-booking:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26,92,58,0.3);
        }

        /* ===== WHY CHOOSE US ===== */
        .section-why { padding: 80px 0; }
        .why-card {
            text-align: center;
            padding: 35px 25px;
            border-radius: 20px;
            transition: all 0.3s;
            height: 100%;
            background: white;
            border: 1px solid rgba(0,0,0,0.04);
        }
        .why-card:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transform: translateY(-5px);
        }
        .why-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
        }
        .why-icon.green { background: rgba(26,92,58,0.1); color: var(--primary); }
        .why-icon.gold { background: rgba(201,169,92,0.15); color: var(--gold-dark); }
        .why-card h5 { font-weight: 600; color: var(--primary-dark); margin-bottom: 10px; }
        .why-card p { color: #777; font-size: 0.9rem; line-height: 1.6; }

        /* ===== HOW TO BOOK ===== */
        .section-howto { padding: 80px 0; background: linear-gradient(135deg, var(--primary-dark), var(--primary)); color: white; }
        .step-card {
            text-align: center;
            padding: 30px;
            position: relative;
        }
        .step-number {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--gold);
            color: var(--primary-dark);
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .step-card h5 { font-weight: 600; margin-bottom: 10px; }
        .step-card p { opacity: 0.85; font-size: 0.9rem; }
        .step-arrow {
            position: absolute;
            right: -20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            color: var(--gold);
        }

        /* ===== STATS ===== */
        .section-stats { padding: 60px 0; background: #f8faf9; }
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        .stat-item h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
        }
        .stat-item p {
            color: #777;
            font-weight: 500;
        }

        /* ===== FOOTER ===== */
        .footer-simas {
            background: var(--primary-dark);
            color: rgba(255,255,255,0.7);
            padding: 50px 0 20px;
        }
        .footer-simas h5 { color: white; font-weight: 600; margin-bottom: 20px; }
        .footer-simas a { color: rgba(255,255,255,0.7); text-decoration: none; transition: 0.3s; }
        .footer-simas a:hover { color: var(--gold); }
        .footer-simas .footer-links li { margin-bottom: 8px; }
        .footer-simas .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 30px;
        }
        .footer-contact i { color: var(--gold); margin-right: 10px; width: 20px; }

        /* ===== PAGE HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: white;
            padding: 50px 0;
            margin-bottom: 40px;
        }
        .page-header h1 { font-weight: 700; margin-bottom: 10px; }
        .page-header p { opacity: 0.85; }

        /* ===== GENERAL ===== */
        .content-section { padding: 60px 0; }
        
        /* Contact page */
        .contact-info-card {
            padding: 25px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 3px 15px rgba(0,0,0,0.06);
            margin-bottom: 20px;
            transition: 0.3s;
        }
        .contact-info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .contact-info-card i {
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-up { animation: fadeInUp 0.6s ease forwards; }

        @media (max-width: 768px) {
            .hero-title { font-size: 2rem; }
            .hero-stats { gap: 20px; flex-wrap: wrap; }
            .hero-image { display: none; }
            .section-title { font-size: 1.6rem; }
            .step-arrow { display: none; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-simas fixed-top">
    <div class="container">
        <a class="navbar-brand navbar-brand-simas" href="<?= base_url('landing') ?>">
            <span class="brand-icon">🏛️</span>
            <div>
                SIMAS
                <span class="brand-sub">Sistem Informasi Manajemen Asrama</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSimas">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSimas">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link nav-link-simas <?= ($active == 'home') ? 'active' : '' ?>" href="<?= base_url('landing/home') ?>">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-simas <?= ($active == 'fasilitas') ? 'active' : '' ?>" href="<?= base_url('landing/fasilitas') ?>">
                        <i class="fas fa-building"></i> Fasilitas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-simas <?= ($active == 'tentang') ? 'active' : '' ?>" href="<?= base_url('landing/tentang') ?>">
                        <i class="fas fa-info-circle"></i> Tentang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-simas <?= ($active == 'hubungi') ? 'active' : '' ?>" href="<?= base_url('landing/hubungi') ?>">
                        <i class="fas fa-envelope"></i> Hubungi
                    </a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link btn-login-nav" href="<?= base_url('auth') ?>">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="main-content">