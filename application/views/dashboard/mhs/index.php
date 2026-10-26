<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    
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

        .header-actions .total-data {
            background: white;
            padding: 8px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            font-size: 14px;
            color: #555;
        }

        .header-actions .total-data strong {
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

            .header-actions .total-data {
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
                <i class="fas fa-user-graduate" style="color: #4e73df;"></i>
                Data Mahasiswa
                <span class="badge-role"><?= ucfirst($this->session->userdata('role')) ?></span>
            </h3>
            <div class="header-actions">
                <div class="total-data">
                    <i class="fas fa-users"></i> Total: <strong><?= count($mhs) ?></strong> Mahasiswa
                </div>
                <a href="<?= base_url('mhs/print_data') ?>" class="btn-print" style="background: #6c757d; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-weight: 600; transition: all 0.3s;">
                    <i class="fas fa-print"></i> Print Data
                </a>
                <a href="<?= base_url('mhs/add') ?>" class="btn-add">
                    <i class="fas fa-plus"></i> Tambah Mahasiswa
                </a>
            </div>
        </div>

        <!-- ===== FLASHDATA ===== -->
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

        <!-- ===== TABLE ===== -->
        <div class="table-container">
            <div class="table-header">
                <div class="table-title">
                    <i class="fas fa-list"></i> Daftar Mahasiswa
                    <span><?= count($mhs) ?></span>
                </div>
                
                <!-- ===== SEARCH FORM ===== -->
                <form class="search-form" method="get" action="<?= base_url('mhs') ?>">
                    <input type="text" name="search" class="form-control" placeholder="Cari NIM/Nama..." value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>">
                    <button type="submit" class="btn-search">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    <?php if (isset($keyword) && !empty($keyword)): ?>
                        <a href="<?= base_url('mhs') ?>" class="btn-reset">
                            <i class="fas fa-times"></i> Reset
                        </a>
                    <?php endif; ?>
                </form>
            </div>

            <!-- ===== SEARCH INFO ===== -->
            <?php if (isset($keyword) && !empty($keyword)): ?>
                <div class="search-info">
                    <span>
                        <i class="fas fa-search"></i> Hasil pencarian: 
                        <span class="highlight">"<?= htmlspecialchars($keyword) ?>"</span>
                    </span>
                    <span>Ditemukan <strong><?= count($mhs) ?></strong> data</span>
                </div>
            <?php endif; ?>

            <!-- ===== TABLE ===== -->
            <table>
                <!-- ===== TABLE HEADER ===== -->
<thead>
    <tr>
        <th style="width: 50px;">#</th>
        <th style="width: 60px;">Foto</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Jurusan</th>
        <th style="text-align: center;">Aksi</th>
    </tr>
</thead>

<!-- ===== TABLE BODY ===== -->
<tbody>
    <?php if(!empty($mhs)): ?>
        <?php $no = 1; foreach($mhs as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>
                <?php if (!empty($row->foto) && file_exists(FCPATH . 'uploads/foto/' . $row->foto)): ?>
                    <img src="<?= base_url('uploads/foto/' . $row->foto) ?>" 
                         alt="Foto" 
                         style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #eef2f7;">
                <?php else: ?>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: #e9ecef; display: flex; align-items: center; justify-content: center; color: #888;">
                        <i class="fas fa-user"></i>
                    </div>
                <?php endif; ?>
            </td>
            <td><strong><?= htmlspecialchars($row->nim) ?></strong></td>
            <td><?= htmlspecialchars($row->nama) ?></td>
            <td><?= htmlspecialchars($row->prodi) ?></td>
            <td><?= htmlspecialchars($row->jurusan) ?></td>
            <td style="text-align: center;">
                <div class="action-buttons">
                    <a href="<?= base_url('mhs/edit/'.$row->nim) ?>" class="btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('mhs/confirm_delete/'.$row->nim) ?>" class="btn-delete">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">
                <div class="empty-state">
                    <div class="icon"><i class="fas fa-inbox"></i></div>
                    <h4><?= (isset($keyword) && !empty($keyword)) ? 'Data tidak ditemukan!' : 'Belum ada data mahasiswa' ?></h4>
                    <p style="font-size: 13px;">
                        <?= (isset($keyword) && !empty($keyword)) ? 'Coba dengan kata kunci lain' : 'Tambahkan data mahasiswa dengan klik tombol "Tambah Mahasiswa"' ?>
                    </p>
                </div>
            </td>
        </tr>
    <?php endif; ?>
</tbody>
            </table>

            <div class="table-footer">
                <div class="info">
                    Menampilkan <strong><?= count($mhs) ?></strong> data
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