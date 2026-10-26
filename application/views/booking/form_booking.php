<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card content-card shadow-sm border-0 mb-4">
                <div class="card-header card-header-custom bg-white border-0 py-3">
                    <h5 class="mb-0 text-simas-primary fw-bold"><i class="fas fa-calendar-check me-2"></i> Form Booking - <?= $fasilitas->nama ?></h5>
                </div>
                <div class="card-body card-body-custom p-4">
                    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                    <form action="<?= site_url('booking/proses_booking') ?>" method="post" id="bookingForm">
                        <input type="hidden" name="fasilitas_id" value="<?= $fasilitas->id ?>">
                        <input type="hidden" id="fasilitas_tipe" value="<?= $fasilitas->tipe ?>">
                        <input type="hidden" id="harga_per_hari" value="<?= $fasilitas->harga_per_hari ?>">
                        <input type="hidden" id="harga_dp" value="<?= $fasilitas->harga_dp ?>">
                        <input type="hidden" id="harga_12jam" value="<?= isset($fasilitas->harga_12jam) ? $fasilitas->harga_12jam : 0 ?>">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted fw-bold">Tanggal Check-in</label>
                                <input type="date" name="tanggal_checkin" id="tanggal_checkin" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted fw-bold">Tanggal Check-out</label>
                                <input type="date" name="tanggal_checkout" id="tanggal_checkout" class="form-control" required>
                            </div>
                        </div>

                        <?php if ($fasilitas->tipe == 'aula_besar'): ?>
                            <div class="alert alert-info border-0 rounded bg-light">
                                <strong>Fasilitas Termasuk:</strong><br>
                                <?= $fasilitas->fasilitas_detail ?: '250 kursi, 10 meja bulat, 12 meja prasmanan, 10 AC dinding, 6 AC standing' ?>
                            </div>
                            
                            <h6 class="fw-bold mt-4 mb-3 text-simas-primary">Tambahan Extra (Opsional)</h6>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted">Extra Kursi (Rp 7.000/kursi)</label>
                                    <input type="number" name="extra_kursi" id="extra_kursi" class="form-control" min="0" value="0">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted">Extra Meja (Rp 10.000/meja)</label>
                                    <input type="number" name="extra_meja" id="extra_meja" class="form-control" min="0" value="0">
                                </div>
                            </div>
                        <?php elseif ($fasilitas->tipe == 'aula_kecil'): ?>
                            <div class="alert alert-warning border-0 rounded">
                                <ul class="mb-0">
                                    <li>Durasi 9 jam ke atas akan dihitung 12 jam.</li>
                                    <li>Sewa 1 hari tidak boleh DP, sewa 2 hari atau lebih diperbolehkan DP.</li>
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted fw-bold">Durasi Sewa Per Hari</label>
                                <select name="durasi_jam" id="durasi_jam" class="form-select">
                                    <option value="8">8 Jam (Rp <?= number_format($fasilitas->harga_per_hari, 0, ',', '.') ?>)</option>
                                    <option value="12">12 Jam (Rp <?= number_format($fasilitas->harga_12jam, 0, ',', '.') ?>)</option>
                                </select>
                            </div>
                        <?php elseif ($fasilitas->tipe == 'kamar'): ?>
                            <div class="alert alert-info border-0 rounded bg-light">
                                <strong>Info Kamar:</strong><br>
                                Tipe: <?= ucfirst(isset($fasilitas->sub_tipe) ? $fasilitas->sub_tipe : 'Standard') ?><br>
                                Lantai: <?= isset($fasilitas->lantai) ? $fasilitas->lantai : '-' ?><br>
                                Harga: Rp <?= number_format($fasilitas->harga_per_hari, 0, ',', '.') ?> / malam
                            </div>
                        <?php endif; ?>

                        <div class="mb-4">
                            <label class="form-label text-muted fw-bold">Catatan Tambahan</label>
                            <textarea name="catatan" class="form-control" rows="3" placeholder="Contoh: Keperluan sound system, dll..."></textarea>
                        </div>

                        <!-- Ringkasan Biaya -->
                        <div class="card stat-card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3 text-simas-primary border-bottom pb-2">Ringkasan Biaya</h6>
                                
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Jumlah Hari/Malam:</span>
                                    <span id="calc_hari" class="fw-bold">0 Hari</span>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Subtotal Sewa:</span>
                                    <span id="calc_subtotal" class="fw-bold">Rp 0</span>
                                </div>

                                <?php if ($fasilitas->tipe == 'aula_besar'): ?>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Total Extra:</span>
                                    <span id="calc_extra" class="fw-bold">Rp 0</span>
                                </div>
                                <?php endif; ?>

                                <div class="d-flex justify-content-between mb-2 border-top pt-2">
                                    <span class="text-dark fw-bold">Total Biaya:</span>
                                    <span id="calc_total" class="text-simas-primary fw-bold fs-5">Rp 0</span>
                                </div>

                                <?php if ($fasilitas->tipe == 'aula_besar'): ?>
                                <div class="d-flex justify-content-between mb-2 text-danger">
                                    <span>Minimal DP:</span>
                                    <span id="calc_dp" class="fw-bold">Rp <?= number_format($fasilitas->harga_dp, 0, ',', '.') ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted">Sisa Bayar:</span>
                                    <span id="calc_sisa" class="fw-bold">Rp 0</span>
                                </div>
                                <?php elseif ($fasilitas->tipe == 'aula_kecil'): ?>
                                <div class="d-flex justify-content-between mb-2 text-danger d-none" id="dp_container">
                                    <span>DP (Wajib Bayar 1 Hari):</span>
                                    <span id="calc_dp" class="fw-bold">Rp 0</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2 d-none" id="sisa_container">
                                    <span class="text-muted">Sisa Bayar:</span>
                                    <span id="calc_sisa" class="fw-bold">Rp 0</span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?= site_url('booking/fasilitas/'.$fasilitas->tipe) ?>" class="btn btn-light border px-4">Batal</a>
                            <button type="submit" class="btn btn-simas text-white px-4" style="background-color: #1a5c3a;">Proses Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tipe = document.getElementById('fasilitas_tipe').value;
    const inputCheckin = document.getElementById('tanggal_checkin');
    const inputCheckout = document.getElementById('tanggal_checkout');
    
    // elements for calculation
    const calcHari = document.getElementById('calc_hari');
    const calcSubtotal = document.getElementById('calc_subtotal');
    const calcTotal = document.getElementById('calc_total');
    const hargaPerHari = parseFloat(document.getElementById('harga_per_hari').value);
    
    // aula besar
    const inputExtraKursi = document.getElementById('extra_kursi');
    const inputExtraMeja = document.getElementById('extra_meja');
    const calcExtra = document.getElementById('calc_extra');
    const calcSisa = document.getElementById('calc_sisa');
    const hargaDp = document.getElementById('harga_dp') ? parseFloat(document.getElementById('harga_dp').value) : 0;
    
    // aula kecil
    const inputDurasi = document.getElementById('durasi_jam');
    const harga12Jam = document.getElementById('harga_12jam') ? parseFloat(document.getElementById('harga_12jam').value) : 0;
    const dpContainer = document.getElementById('dp_container');
    const sisaContainer = document.getElementById('sisa_container');
    const calcDp = document.getElementById('calc_dp');

    // set min date to today
    const today = new Date().toISOString().split('T')[0];
    inputCheckin.min = today;
    
    inputCheckin.addEventListener('change', function() {
        inputCheckout.min = this.value;
        if(inputCheckout.value && inputCheckout.value < this.value) {
            inputCheckout.value = this.value;
        }
        calculateTotal();
    });
    
    inputCheckout.addEventListener('change', calculateTotal);
    if(inputExtraKursi) inputExtraKursi.addEventListener('input', calculateTotal);
    if(inputExtraMeja) inputExtraMeja.addEventListener('input', calculateTotal);
    if(inputDurasi) inputDurasi.addEventListener('change', calculateTotal);

    function formatRupiah(angka) {
        return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function calculateTotal() {
        if(!inputCheckin.value || !inputCheckout.value) return;
        
        const date1 = new Date(inputCheckin.value);
        const date2 = new Date(inputCheckout.value);
        const diffTime = Math.abs(date2 - date1);
        let hari = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        if (hari < 1) hari = 1;
        
        calcHari.textContent = hari + (tipe === 'kamar' ? ' Malam' : ' Hari');
        
        let subtotal = 0;
        let total = 0;
        
        if (tipe === 'aula_besar') {
            subtotal = hargaPerHari * hari;
            const extraKursi = parseInt(inputExtraKursi.value) || 0;
            const extraMeja = parseInt(inputExtraMeja.value) || 0;
            const totalExtra = (extraKursi * 7000) + (extraMeja * 10000);
            
            if(calcExtra) calcExtra.textContent = formatRupiah(totalExtra);
            calcSubtotal.textContent = formatRupiah(subtotal);
            total = subtotal + totalExtra;
            calcTotal.textContent = formatRupiah(total);
            
            let sisa = total - hargaDp;
            if(sisa < 0) sisa = 0;
            if(calcSisa) calcSisa.textContent = formatRupiah(sisa);
            
        } else if (tipe === 'aula_kecil') {
            const is12Jam = inputDurasi.value === '12';
            const curHarga = is12Jam ? harga12Jam : hargaPerHari;
            
            subtotal = curHarga * hari;
            calcSubtotal.textContent = formatRupiah(subtotal);
            total = subtotal;
            calcTotal.textContent = formatRupiah(total);
            
            if (hari >= 2) {
                if(dpContainer) dpContainer.classList.remove('d-none');
                if(sisaContainer) sisaContainer.classList.remove('d-none');
                if(calcDp) calcDp.textContent = formatRupiah(curHarga);
                let sisa = total - curHarga;
                if(sisa < 0) sisa = 0;
                if(calcSisa) calcSisa.textContent = formatRupiah(sisa);
            } else {
                if(dpContainer) dpContainer.classList.add('d-none');
                if(sisaContainer) sisaContainer.classList.add('d-none');
            }
            
        } else if (tipe === 'kamar') {
            subtotal = hargaPerHari * hari;
            calcSubtotal.textContent = formatRupiah(subtotal);
            total = subtotal;
            calcTotal.textContent = formatRupiah(total);
        }
    }
});
</script>
