<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAS - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h1>🏢 SIMAS Dashboard</h1>
            <p class="lead">Sistem Informasi Manajemen Asrama</p>
            <a href="<?= site_url('simas') ?>" class="btn btn-sm btn-secondary">Kembali ke Landing</a>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Kamar</h5>
                    <p class="card-text display-6"><?= $total_kamar ?? 0 ?></p>
                    <small>Standar: <?= $standar ?? 0 ?> | VIP: <?= $vip ?? 0 ?></small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Tersedia</h5>
                    <p class="card-text display-6"><?= $tersedia ?? 0 ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Terisi</h5>
                    <p class="card-text display-6"><?= $terisi ?? 0 ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pendapatan</h5>
                    <p class="card-text display-6">Rp <?= number_format($pendapatan ?? 0, 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Menu Aplikasi</div>
                <div class="card-body">
                    <a href="<?= site_url('simas/booking_room') ?>" class="btn btn-primary">📅 Booking Kamar</a>
                    <a href="<?= site_url('simas/booking_small') ?>" class="btn btn-success">🏠 Booking Aula Kecil</a>
                    <a href="<?= site_url('simas/booking_big') ?>" class="btn btn-warning">🏛️ Booking Aula Besar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>