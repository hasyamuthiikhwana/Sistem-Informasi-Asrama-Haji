<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    
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

        .header-actions {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .header-actions .total-users {
            background: white;
            padding: 8px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            font-size: 14px;
            color: #555;
        }

        .header-actions .total-users strong {
            color: #1a1a2e;
            font-size: 18px;
        }

        .btn-add {
            background: linear-gradient(135deg, #00b894 0%, #00a381 100%);
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

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 184, 148, 0.4);
            color: white;
        }

        /* ========== STATISTICS CARDS ========== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px 24px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
            border-left: 4px solid #4e73df;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .stat-card .stat-label {
            font-size: 13px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .stat-card .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #1a1a2e;
            margin-top: 4px;
        }

        .stat-card .stat-icon {
            float: right;
            font-size: 32px;
            opacity: 0.15;
        }

        .stat-card:nth-child(1) { border-left-color: #4e73df; }
        .stat-card:nth-child(2) { border-left-color: #00b894; }
        .stat-card:nth-child(3) { border-left-color: #fdcb6e; }
        .stat-card:nth-child(4) { border-left-color: #e17055; }

        /* ========== TABLE CONTAINER ========== */
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        .table-header {
            padding: 18px 24px;
            background: #f8f9fc;
            border-bottom: 1px solid #eef2f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .table-header .table-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a2e;
        }

        .table-header .table-title span {
            background: #4e73df;
            color: white;
            padding: 1px 12px;
            border-radius: 12px;
            font-size: 13px;
            margin-left: 8px;
        }

        /* ========== SEARCH FORM ========== */
        .search-form {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-form .form-control {
            padding: 8px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border 0.3s;
            width: 220px;
        }

        .search-form .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.15);
        }

        .search-form .btn-search {
            background: #4e73df;
            color: white;
            border: none;
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-form .btn-search:hover {
            background: #3a5fc7;
        }

        .search-form .btn-reset {
            background: #6c757d;
            color: white;
            border: none;
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
            text-decoration: none;
        }

        .search-form .btn-reset:hover {
            background: #5a6268;
        }

        /* ========== TABLE STYLE ========== */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table thead {
            background: #f8f9fc;
        }

        table th {
            padding: 14px 20px;
            text-align: left;
            font-weight: 600;
            color: #555;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #eef2f7;
        }

        table td {
            padding: 14px 20px;
            border-bottom: 1px solid #f0f2f5;
            vertical-align: middle;
        }

        table tbody tr {
            transition: background 0.2s;
        }

        table tbody tr:hover {
            background: #f8f9fc;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        /* ========== AVATAR ========== */
        .user-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .user-avatar.admin {
            background: linear-gradient(135deg, #e17055 0%, #d63031 100%);
        }

        .user-avatar.user {
            background: linear-gradient(135deg, #00b894 0%, #00a381 100%);
        }

        /* ========== ROLE BADGE ========== */
        .role-badge {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .role-badge.admin {
            background: #fde8e8;
            color: #e17055;
        }

        .role-badge.user {
            background: #e3f7f1;
            color: #00b894;
        }

        /* ========== ACTION BUTTONS ========== */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .action-buttons .btn-edit {
            background: #e3f0ff;
            color: #1a73e8;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .action-buttons .btn-edit:hover {
            background: #1a73e8;
            color: white;
        }

        .action-buttons .btn-delete {
            background: #fde8e8;
            color: #e17055;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .action-buttons .btn-delete:hover {
            background: #e17055;
            color: white;
        }

        /* ========== STATUS INDICATOR ========== */
        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-indicator .dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #00b894;
        }

        .status-indicator .status-text {
            font-size: 12px;
            color: #888;
        }

        /* ========== PAGINATION ========== */
        .table-footer {
            padding: 16px 24px;
            background: #f8f9fc;
            border-top: 1px solid #eef2f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .table-footer .info {
            font-size: 13px;
            color: #888;
        }

        .pagination {
            display: flex;
            gap: 4px;
        }

        .pagination a {
            padding: 6px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            text-decoration: none;
            color: #555;
            font-size: 13px;
            transition: all 0.2s;
        }

        .pagination a:hover {
            background: #4e73df;
            color: white;
            border-color: #4e73df;
        }

        .pagination a.active {
            background: #4e73df;
            color: white;
            border-color: #4e73df;
        }

        /* ========== EMPTY STATE ========== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #aaa;
        }

        .empty-state .icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .empty-state h4 {
            color: #555;
            margin-bottom: 6px;
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

        /* ========== SEARCH INFO ========== */
        .search-info {
            padding: 10px 24px;
            background: #e8f4fd;
            border-bottom: 1px solid #d4e4f5;
            font-size: 14px;
            color: #1a73e8;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-info .highlight {
            font-weight: 600;
            color: #1a1a2e;
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

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 600px;
            }

            .search-form .form-control {
                width: 140px;
            }

            .header-actions {
                width: 100%;
                justify-content: space-between;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .page-header h3 {
                font-size: 18px;
            }

            .search-form {
                width: 100%;
                flex-wrap: wrap;
            }

            .search-form .form-control {
                flex: 1;
                width: auto;
            }

            .header-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .header-actions .total-users {
                text-align: center;
            }

            .btn-add {
                justify-content: center;
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
                <i class="fas fa-chart-line" style="color: #4e73df;"></i>
                Dashboard Admin
                <span class="badge-role">Administrator</span>
            </h3>
            <div class="header-actions">
                <div class="total-users">
                    <i class="fas fa-users"></i> Total: <strong><?= count($users) ?></strong> User
                </div>
                <a href="<?= base_url('dashboard/add') ?>" class="btn-add">
                    <i class="fas fa-plus"></i> Tambah User
                </a>
            </div>
        </div>

        <!-- ===== TAMPILKAN PESAN ===== -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert-custom alert-success">
                <i class="fas fa-check-circle"></i>
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-custom alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- ===== STATISTICS CARDS ===== -->
        <div class="stats-grid">
            <?php 
                $adminCount = 0;
                $userCount = 0;
                foreach($users as $u) {
                    if($u->role == 'admin') $adminCount++;
                    else $userCount++;
                }
            ?>
            <div class="stat-card">
                <span class="stat-icon"><i class="fas fa-users"></i></span>
                <div class="stat-label">Total Users</div>
                <div class="stat-value"><?= count($users) ?></div>
            </div>
            <div class="stat-card">
                <span class="stat-icon"><i class="fas fa-user-tie"></i></span>
                <div class="stat-label">Admin</div>
                <div class="stat-value"><?= $adminCount ?></div>
            </div>
            <div class="stat-card">
                <span class="stat-icon"><i class="fas fa-user"></i></span>
                <div class="stat-label">User Biasa</div>
                <div class="stat-value"><?= $userCount ?></div>
            </div>
            <div class="stat-card">
                <span class="stat-icon"><i class="fas fa-calendar-day"></i></span>
                <div class="stat-label">Bergabung</div>
                <div class="stat-value" style="font-size: 16px; margin-top: 6px;">
                    <?= date('d M Y') ?>
                </div>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <div class="table-container">
            <div class="table-header">
                <div class="table-title">
                    <i class="fas fa-list"></i> Daftar Pengguna
                    <span><?= count($users) ?></span>
                </div>
                
                <!-- ===== FORM PENCARIAN ===== -->
                <form class="search-form" method="get" action="<?= base_url('dashboard') ?>">
                    <input type="text" name="search" class="form-control" placeholder="Cari user..." value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>">
                    <button type="submit" class="btn-search">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    <?php if (isset($keyword) && !empty($keyword)): ?>
                        <a href="<?= base_url('dashboard') ?>" class="btn-reset">
                            <i class="fas fa-times"></i> Reset
                        </a>
                    <?php endif; ?>
                </form>
            </div>

            <!-- ===== INFO HASIL PENCARIAN ===== -->
            <?php if (isset($keyword) && !empty($keyword)): ?>
                <div class="search-info">
                    <span>
                        <i class="fas fa-search"></i> Hasil pencarian untuk: 
                        <span class="highlight">"<?= htmlspecialchars($keyword) ?>"</span>
                    </span>
                    <span>Ditemukan <strong><?= count($users) ?></strong> data</span>
                </div>
            <?php endif; ?>

            <table>
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($users)): ?>
                        <?php $no = 1; foreach($users as $u): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <div class="user-cell">
                                    <div class="user-avatar <?= $u->role ?>">
                                        <?= strtoupper(substr($u->username, 0, 1)) ?>
                                    </div>
                                    <span><?= htmlspecialchars($u->username) ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="role-badge <?= $u->role ?>">
                                    <?php 
                                        $roleLabels = [
                                        'admin' => '👑 Admin',
                                        'dosen' => '👨‍🏫 Dosen',
                                        'mahasiswa' => '🎓 Mahasiswa'
                                        ];
                                        echo $roleLabels[$u->role] ?? $u->role;
                                    ?>
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <span class="status-indicator">
                                    <span class="dot"></span>
                                    <span class="status-text">Aktif</span>
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <!-- ===== ACTION BUTTONS ===== -->
                                <div class="action-buttons">
                                <a href="<?= base_url('dashboard/edit/'.$u->id) ?>" class="btn-edit">
                                   <i class="fas fa-edit"></i> Edit
                                </a>
                            <a href="<?= base_url('dashboard/delete/'.$u->id) ?>" class="btn-delete" 
                                onclick="return confirm('Yakin ingin menghapus user <?= htmlspecialchars($u->username) ?>?')">
                                 <i class="fas fa-trash"></i> Hapus
                            </a>
                         </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <div class="icon"><i class="fas fa-inbox"></i></div>
                                    <h4><?= (isset($keyword) && !empty($keyword)) ? 'User tidak ditemukan!' : 'Belum ada pengguna' ?></h4>
                                    <p style="font-size: 13px;">
                                        <?= (isset($keyword) && !empty($keyword)) ? 'Coba dengan kata kunci lain' : 'Tambahkan user baru dengan klik tombol "Tambah User"' ?>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="table-footer">
                <div class="info">
                    Menampilkan <strong><?= count($users) ?></strong> data
                </div>
                <div class="pagination">
                    <a href="#"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>

    </div>
    <!-- ========== END CONTENT WRAPPER ========== -->

</body>
</html>