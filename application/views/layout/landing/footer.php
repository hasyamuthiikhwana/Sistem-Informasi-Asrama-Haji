</main>

<!-- ===== FOOTER ===== -->
<footer class="footer-simas">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <h5 class="d-flex align-items-center gap-2">
                    <span>🏛️</span> SIMAS
                </h5>
                <p>Sistem Informasi Manajemen Asrama mempermudah proses reservasi aula pertemuan dan kamar penginapan dengan sistem yang terintegrasi, transparan, dan terpercaya.</p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="fs-5 text-decoration-none"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="fs-5 text-decoration-none"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="fs-5 text-decoration-none"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="fs-5 text-decoration-none"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5>Quick Links</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="<?= base_url('landing/home') ?>"><i class="fas fa-chevron-right me-1 small"></i> Home</a></li>
                    <li><a href="<?= base_url('landing/fasilitas') ?>"><i class="fas fa-chevron-right me-1 small"></i> Fasilitas</a></li>
                    <li><a href="<?= base_url('landing/tentang') ?>"><i class="fas fa-chevron-right me-1 small"></i> Tentang</a></li>
                    <li><a href="<?= base_url('landing/hubungi') ?>"><i class="fas fa-chevron-right me-1 small"></i> Hubungi</a></li>
                    <li><a href="<?= base_url('auth') ?>"><i class="fas fa-chevron-right me-1 small"></i> Login</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>Fasilitas Kami</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="<?= base_url('landing/fasilitas') ?>"><i class="fas fa-landmark me-1 small"></i> Aula Besar</a></li>
                    <li><a href="<?= base_url('landing/fasilitas') ?>"><i class="fas fa-door-open me-1 small"></i> Aula Kecil</a></li>
                    <li><a href="<?= base_url('landing/fasilitas') ?>"><i class="fas fa-bed me-1 small"></i> Kamar Penginapan</a></li>
                    <li><a href="<?= base_url('auth') ?>"><i class="fas fa-calendar-alt me-1 small"></i> Cek Jadwal Booking</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>Kontak Kami</h5>
                <div class="footer-contact">
                    <p class="mb-2"><i class="fas fa-map-marker-alt"></i> Jl. Letnan Jendral Sutoyo No.17, Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78121</p>
                    <p class="mb-2"><i class="fas fa-phone"></i> 089509429093 (Admin 1)</p>
                    <p class="mb-2"><i class="fas fa-phone"></i> 0895810732214 (Admin 2)</p>
                    <p class="mb-2"><i class="fab fa-instagram"></i> <a href="https://instagram.com/kemenhaj.pontianak" class="text-decoration-none" style="color: inherit;">@kemenhaj.pontianak</a></p>
                    <p class="mb-0"><i class="fas fa-clock"></i> Senin - Minggu: 24 Jam</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">&copy; <?= date('Y') ?> SIMAS - Sistem Informasi Manajemen Asrama. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar-simas');
        if (navbar) {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }
    });
</script>
</body>
</html>