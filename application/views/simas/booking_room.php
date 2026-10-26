<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAS - Booking Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>📅 Booking Kamar</h3>
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
                            <label class="form-label">Pilih Kamar</label>
                            <select name="room_id" class="form-control" required>
                                <option value="">-- Pilih Kamar --</option>
                                <?php foreach ($rooms as $room): ?>
                                    <option value="<?= $room->id ?>">
                                        <?= $room->room_number ?> - <?= ucfirst($room->type) ?> 
                                        (Lt.<?= $room->floor ?>, <?= $room->capacity ?> bed) 
                                        - Rp <?= number_format($room->price_per_night, 0, ',', '.') ?>
                                        [<?= $room->status ?>]
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Check-in</label>
                            <input type="date" name="check_in" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Check-out</label>
                            <input type="date" name="check_out" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>