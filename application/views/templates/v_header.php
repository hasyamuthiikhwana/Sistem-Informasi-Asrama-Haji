<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
            color: #2d3748;
        }

        /* Header Tabel Berwarna Hitam Elegan Modern */
.custom-academic-table thead tr th {
    background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%) !important;
    color: #ffffff !important;
    font-weight: 700;
    padding: 18px;
    border-top: none !important;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
    border-bottom: 2px solid #333333 !important; /* Garis bawah penegas hitam */
}

        /* 1. Top Mini Navbar */
        .top-bar {
            background-color: #ffffff;
            border-bottom: 1px solid #edf2f7;
            padding: 8px 0;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* 2. Hero Banner Gradasi Ungu-Oranye */
        .hero-banner {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 40%, #f97316 100%);
            border-radius: 0 0 24px 24px;
            color: white;
            padding: 3rem 2rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.15);
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            top: -50px;
            right: -50px;
        }

        .btn-banner {
            background-color: #ffffff;
            color: #7c3aed;
            font-weight: 700;
            border-radius: 50px;
            padding: 8px 24px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-banner:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,255,255,0.3);
            background-color: #f3e8ff;
        }

        /* 3. Main Navigation & Branding */
        .main-nav {
            background: #ffffff;
            padding: 1.2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            margin-top: -20px;
            position: relative;
            z-index: 10;
        }

        .brand-title {
            font-weight: 800;
            color: #1e1b4b;
            line-height: 1.2;
        }

        /* 4. PDDikti Style Search Bar */
        .search-container {
            margin-top: -25px;
            position: relative;
            z-index: 11;
        }

        .search-box {
            background: #ffffff;
            border-radius: 50px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .search-select {
            background-color: #c0b6f2;
            color: #4c1d95;
            font-weight: 600;
            border: none;
            padding: 0 25px;
            border-radius: 50px 0 0 50px;
        }

        .search-input {
            border: none;
            padding: 15px 25px;
            font-size: 0.95rem;
        }

        .search-input:focus {
            box-shadow: none;
        }

        .search-btn {
            background: transparent;
            border: none;
            color: #7c3aed;
            padding-right: 25px;
            font-size: 1.2rem;
        }

        /* 5. 3D Menu Grid Cards */
        .menu-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 1.8rem;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.03);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            text-decoration: none;
            display: block;
            color: #475569;
        }

        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.12);
            color: #7c3aed;
        }

        .menu-icon-wrapper {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            font-size: 1.6rem;
            background: linear-gradient(135deg, #f3e8ff 0%, #e0e7ff 100%);
            color: #7c3aed;
        }

        /* 6. Desain Tabel Akademik Ganjil (Kuning) & Genap (Putih) */
        .table-container {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            border: 1px solid #edf2f7;
        }

        .custom-academic-table thead {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }

        .custom-academic-table th {
            color: #ffffff !important;
            font-weight: 700;
            padding: 18px;
            border: none;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        .custom-academic-table td {
            padding: 18px;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
        }

        /* Logika Warna Request */
        .custom-academic-table tbody tr.row-ganjil {
            background-color: #fffde7 !important; /* Kuning Pastel Lembut */
        }

        .custom-academic-table tbody tr.row-genap {
            background-color: #ffffff !important; /* Putih */
        }

        .custom-academic-table tbody tr {
            transition: all 0.2s ease;
        }

        .custom-academic-table tbody tr:hover {
            background-color: #fff9c4 !important; /* Sorotan kuning lebih terang saat hover */
            transform: scale(1.005);
            box-shadow: inset 4px 0 0 #7c3aed;
        }

        .nim-badge {
            background: #f1f5f9;
            color: #334155;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.9rem;
            border: 1px solid #e2e8f0;
        }

        /* 7. Footer */
        footer {
            margin-top: 80px;
            padding: 30px 0;
            font-size: 1.2em;
            color: #64748b;
            font-weight: 500;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <i class="fa-solid fa-university text-muted me-2"></i>Politeknik Negeri Sambas
            </div>
            <div class="d-flex gap-3 text-muted">
                <i class="fa-solid fa-chevron-left cursor-pointer"></i>
                <i class="fa-solid fa-chevron-right cursor-pointer"></i>
                <i class="fa-solid fa-ellipsis-vertical cursor-pointer"></i>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="hero-banner p-5">
            <div class="row align-items-center">
                <div class="col-md-7 text-center text-md-start">
                    <h1 class="fw-extrabold display-5 mb-3 text-white" style="font-weight: 800;">Sistem Informasi Data Akademik</h1>
                    <button class="btn btn-banner shadow-sm">Poltesa</button>
                </div>
                <div class="col-md-5 d-none d-md-flex justify-content-center position-relative">
                    <i class="fa-solid fa-user-gear text-white opacity-25" style="font-size: 12rem;"></i>
                </div>
            </div>
        </div>
    </div>

<!--
    <div class="container">
        <div class="main-nav d-flex flex-column flex-md-row justify-content-between align-items-center px-4 py-3">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div class="bg-primary text-white rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: linear-gradient(135deg, #7c3aed, #4f46e5) !important;">
                    <i class="fa-solid fa-chart-line style-icon fs-4"></i>
                </div>
                <div>
                    <h4 class="brand-title mb-0">Pangkalan Data</h4>
                    <span class="text-muted fw-semibold" style="font-size: 0.9rem;">Pendidikan Tinggi</span>
                </div>
            </div>
            <div class="d-flex gap-4 fw-semibold text-secondary">
                <span class="cursor-pointer text-dark">Tentang PDDikti <i class="fa-solid fa-chevron-down ms-1 fs-7"></i></span>
                <span class="cursor-pointer">Kebijakan Privasi</span>
            </div>
        </div>
    </div>

    <div class="container search-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="search-box d-flex align-items-stretch">
                    <select class="form-select search-select d-none d-sm-block" style="width: 140px;">
                        <option>Semua</option>
                        <option>Mahasiswa</option>
                        <option>Dosen</option>
                        <option>Prodi</option>
                    </select>
                    <input type="text" class="form-control search-input" placeholder="Keyword: [Nama] [PT] [Prodi] [NIM] [NIDN]">
                    <button class="search-btn">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 pt-3">
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="menu-card">
                    <div class="menu-icon-wrapper"><i class="fa-solid fa-book"></i></div>
                    <span class="fw-bold small d-block">Program Studi</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="menu-card">
                    <div class="menu-icon-wrapper"><i class="fa-solid fa-building-columns"></i></div>
                    <span class="fw-bold small d-block">Perguruan Tinggi</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="menu-card">
                    <div class="menu-icon-wrapper"><i class="fa-solid fa-chart-simple"></i></div>
                    <span class="fw-bold small d-block">Statistik</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="menu-card">
                    <div class="menu-icon-wrapper"><i class="fa-solid fa-book-bookmark"></i></div>
                    <span class="fw-bold small d-block">Publikasi</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="menu-card">
                    <div class="menu-icon-wrapper"><i class="fa-solid fa-bullhorn"></i></div>
                    <span class="fw-bold small d-block">Pengumuman</span>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="menu-card">
                    <div class="menu-icon-wrapper"><i class="fa-solid fa-map-location-dot"></i></div>
                    <span class="fw-bold small d-block">Peta</span>
                </a>
            </div>
        </div>
    </div>
-->
    
