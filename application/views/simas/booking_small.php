<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAS - Booking Aula Kecil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>🏠 Booking Aula Kecil</h3>
                    <a href="<?= site_url('simas') ?>" class="btn btn-sm btn-secondary float-end">Kembali</a>
                </div>
                <div class="card-body">
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
                            <label class="form-label">Pilih Durasi</label>
                            <select name="duration" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="8">8 Jam (Rp 600.000)</option>
                                <option value="12">12 Jam (Rp 780.000)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Pesan Aula</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>