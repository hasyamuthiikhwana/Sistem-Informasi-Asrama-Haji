<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAS - Booking Aula Besar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>🏛️ Booking Aula Besar</h3>
                    <a href="<?= site_url('simas') ?>" class="btn btn-sm btn-secondary float-end">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <strong>Fasilitas Standar:</strong><br>
                        • 250 Kursi Futura Biru <br>
                        • 10 Meja Bulat & 12 Meja Prasmanan <br>
                        • 10 AC Dinding & 6 AC Standing <br>
                        <hr>
                        <strong>Tambahan:</strong> Kursi Rp 7.000/unit, Meja Rp 10.000/unit
                    </div>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <?php if (isset($success)): ?>
                        <div class="alert alert-success"><?= $success ?></div>
                    <?php endif; ?>

                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pemakaian</label>
                            <input type="date" name="booking_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tambahan Kursi (opsional)</label>
                            <input type="number" name="extra_chairs" class="form-control" value="0" min="0">
                            <small>Harga per unit: Rp 7.000</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tambahan Meja (opsional)</label>
                            <input type="number" name="extra_tables" class="form-control" value="0" min="0">
                            <small>Harga per unit: Rp 10.000</small>
                        </div>
                        <button type="submit" class="btn btn-warning">Pesan Aula Besar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>