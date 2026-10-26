<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Mahasiswa</title>
    <style>
        /* ============================================================ */
        /* STYLES FOR PRINT                                              */
        /* ============================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            background: white;
            padding: 20px;
            color: #333;
        }

        .print-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }

        /* ===== HEADER ===== */
        .print-header {
            text-align: center;
            border-bottom: 3px double #333;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .print-header h1 {
            font-size: 28px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .print-header h2 {
            font-size: 18px;
            font-weight: 400;
            color: #555;
            margin-top: 5px;
        }

        .print-header .info {
            font-size: 14px;
            color: #666;
            margin-top: 8px;
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .print-header .info span {
            padding: 2px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #f8f9fc;
        }

        /* ===== TABLE ===== */
        .table-print {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            margin-top: 15px;
        }

        .table-print thead {
            background: #1a73e8;
            color: white;
        }

        .table-print th {
            padding: 10px 12px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            border: 1px solid #1a73e8;
        }

        .table-print td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        .table-print tbody tr:nth-child(even) {
            background: #f8f9fc;
        }

        .table-print tbody tr:hover {
            background: #e8f4fd;
        }

        .table-print .foto-cell {
            text-align: center;
        }

        .table-print .foto-cell img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .table-print .foto-cell .no-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            font-size: 16px;
        }

        .table-print .no-data {
            text-align: center;
            padding: 40px;
            color: #888;
            font-size: 16px;
        }

        /* ===== FOOTER ===== */
        .print-footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 2px solid #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #666;
        }

        .print-footer .ttd {
            text-align: center;
            margin-top: 20px;
        }

        .print-footer .ttd .line {
            display: inline-block;
            width: 200px;
            border-top: 1px solid #333;
            margin-top: 40px;
            padding-top: 5px;
        }

        .btn-print {
            display: inline-block;
            background: #1a73e8;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
            text-decoration: none;
        }

        .btn-print:hover {
            background: #1557b0;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(26, 115, 232, 0.3);
        }

        .btn-back {
            display: inline-block;
            background: #6c757d;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 20px;
        }

        /* ========== PRINT MEDIA ========== */
        @media print {
            body {
                padding: 10px;
                background: white;
            }

            .print-container {
                padding: 0;
            }

            .btn-print,
            .btn-back {
                display: none !important;
            }

            .no-print {
                display: none !important;
            }

            .table-print thead {
                background: #1a73e8 !important;
                color: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .table-print tbody tr:nth-child(even) {
                background: #f8f9fc !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .table-print .foto-cell img {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .print-footer .ttd .line {
                border-top: 1px solid #333 !important;
            }

            .print-header {
                border-bottom: 3px double #333 !important;
            }

            .print-footer {
                border-top: 2px solid #333 !important;
            }
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .print-container {
                padding: 10px;
            }

            .print-header h1 {
                font-size: 22px;
            }

            .print-header .info {
                gap: 10px;
                flex-direction: column;
                align-items: center;
            }

            .table-print {
                font-size: 12px;
            }

            .table-print th,
            .table-print td {
                padding: 6px 8px;
            }

            .print-footer {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-print,
            .btn-back {
                width: 100%;
                text-align: center;
            }

            .table-print .foto-cell img,
            .table-print .foto-cell .no-photo {
                width: 30px;
                height: 30px;
            }
        }
    </style>
</head>
<body>

    <div class="print-container">

        <!-- ===== PRINT HEADER ===== -->
        <div class="print-header">
            <h1>📊 Data Mahasiswa</h1>
            <h2>MyApp - Sistem Informasi Manajemen Mahasiswa</h2>
            <div class="info">
                <span>📅 Tanggal: <?= date('d F Y') ?></span>
                <span>⏱ Waktu: <?= date('H:i:s') ?></span>
                <span>👥 Total: <?= count($mhs) ?> Mahasiswa</span>
                <?php if (!empty($keyword)): ?>
                    <span>🔍 Pencarian: "<?= htmlspecialchars($keyword) ?>"</span>
                <?php endif; ?>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table class="table-print">
            <thead>
                <tr>
                    <th style="width: 40px; text-align: center;">No</th>
                    <th style="width: 60px; text-align: center;">Foto</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($mhs)): ?>
                    <?php $no = 1; foreach ($mhs as $row): ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td class="foto-cell">
                                <?php if (!empty($row->foto) && file_exists(FCPATH . 'uploads/foto/' . $row->foto)): ?>
                                    <img src="<?= base_url('uploads/foto/' . $row->foto) ?>" alt="Foto">
                                <?php else: ?>
                                    <span class="no-photo">
                                        <i class="fas fa-user"></i>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td><strong><?= htmlspecialchars($row->nim) ?></strong></td>
                            <td><?= htmlspecialchars($row->nama) ?></td>
                            <td><?= htmlspecialchars($row->prodi) ?></td>
                            <td><?= htmlspecialchars($row->jurusan) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="no-data">
                            <i class="fas fa-inbox"></i><br>
                            <?= (!empty($keyword)) ? 'Data dengan keyword "' . htmlspecialchars($keyword) . '" tidak ditemukan!' : 'Belum ada data mahasiswa!' ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- ===== PRINT FOOTER ===== -->
        <div class="print-footer">
            <div>
                <p>Dicetak oleh: <?= $this->session->userdata('username') ?: 'Admin' ?></p>
                <p>MyApp v1.0</p>
            </div>
            <div class="ttd">
                <div class="line">_________________________</div>
                <p>Mengetahui,</p>
                <p>Kepala Program Studi</p>
            </div>
        </div>

        <!-- ===== ACTION BUTTONS ===== -->
        <div class="action-buttons no-print">
            <button class="btn-print" onclick="window.print()">
                <i class="fas fa-print"></i> Cetak / Print PDF
            </button>
            <a href="<?= base_url('mhs') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

    </div>

    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</body>
</html>