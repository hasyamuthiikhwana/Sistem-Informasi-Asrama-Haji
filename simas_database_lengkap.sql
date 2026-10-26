-- ========================================================
-- SIMAS - Database Lengkap (Data Asli)
-- Copy-paste ke phpMyAdmin > tab SQL > Go
-- ========================================================

CREATE DATABASE IF NOT EXISTS `simas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `simas`;

-- --------------------------------------------------------
-- Tabel users
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) DEFAULT NULL,
  `nama` VARCHAR(100) DEFAULT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `no_hp` VARCHAR(20) DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  `role` ENUM('admin','dosen','mahasiswa') DEFAULT 'mahasiswa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `users`
  ADD COLUMN IF NOT EXISTS `nama` VARCHAR(100) DEFAULT NULL AFTER `username`,
  ADD COLUMN IF NOT EXISTS `email` VARCHAR(100) DEFAULT NULL AFTER `nama`,
  ADD COLUMN IF NOT EXISTS `no_hp` VARCHAR(20) DEFAULT NULL AFTER `email`;

-- User admin (password: admin)
INSERT INTO `users` (`id`, `username`, `nama`, `email`, `no_hp`, `password`, `role`) VALUES
(1, 'admin', 'Administrator', 'admin@simas.com', '089509429093', '$2y$10$1ljkdpISia95Is7x70dd4etW08KMcMzEGwMCsbjbVmSzPEL8XoUkm', 'admin')
ON DUPLICATE KEY UPDATE 
  `nama` = 'Administrator',
  `email` = 'admin@simas.com',
  `no_hp` = '089509429093',
  `password` = '$2y$10$1ljkdpISia95Is7x70dd4etW08KMcMzEGwMCsbjbVmSzPEL8XoUkm',
  `role` = 'admin';

-- User admin2 (password: admin123)
INSERT INTO `users` (`username`, `nama`, `email`, `no_hp`, `password`, `role`) VALUES
('admin2', 'Administrator 2', 'admin2@simas.com', '0895810732214', '$2y$10$hLp5.vU3RO6EIyI3lPzvdu4bm5Dtg.xHYmBvB.4ibYVEC7XaX/Ltq', 'admin')
ON DUPLICATE KEY UPDATE 
  `password` = '$2y$10$hLp5.vU3RO6EIyI3lPzvdu4bm5Dtg.xHYmBvB.4ibYVEC7XaX/Ltq',
  `role` = 'admin';

-- --------------------------------------------------------
-- Tabel fasilitas
-- --------------------------------------------------------
DROP TABLE IF EXISTS `booking_detail`;
DROP TABLE IF EXISTS `booking`;
DROP TABLE IF EXISTS `fasilitas`;

CREATE TABLE `fasilitas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(100) NOT NULL,
  `tipe` ENUM('aula_besar','aula_kecil','kamar') NOT NULL,
  `sub_tipe` VARCHAR(50) DEFAULT NULL COMMENT 'standard/vip untuk kamar, 8jam/12jam untuk aula kecil',
  `kapasitas` INT(11) NOT NULL,
  `harga_per_hari` DECIMAL(12,2) NOT NULL,
  `harga_dp` DECIMAL(12,2) DEFAULT 0 COMMENT 'Uang muka / DP',
  `harga_12jam` DECIMAL(12,2) DEFAULT 0 COMMENT 'Harga 12 jam (khusus aula kecil)',
  `lantai` INT(11) DEFAULT NULL,
  `deskripsi` TEXT DEFAULT NULL,
  `fasilitas_detail` TEXT DEFAULT NULL COMMENT 'Detail fasilitas yang tersedia',
  `foto` VARCHAR(255) DEFAULT NULL,
  `status` ENUM('tersedia','maintenance') NOT NULL DEFAULT 'tersedia',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabel booking
-- --------------------------------------------------------
CREATE TABLE `booking` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `kode_booking` VARCHAR(20) NOT NULL,
  `tanggal_checkin` DATE NOT NULL,
  `tanggal_checkout` DATE NOT NULL,
  `durasi_jam` INT(11) DEFAULT NULL COMMENT '8 atau 12 jam untuk aula kecil',
  `total_harga` DECIMAL(12,2) NOT NULL,
  `dp_amount` DECIMAL(12,2) DEFAULT 0,
  `sisa_bayar` DECIMAL(12,2) DEFAULT 0,
  `extra_kursi` INT(11) DEFAULT 0,
  `extra_meja` INT(11) DEFAULT 0,
  `extra_total` DECIMAL(12,2) DEFAULT 0,
  `status` ENUM('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `catatan` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_booking` (`kode_booking`),
  KEY `fk_booking_user` (`user_id`),
  CONSTRAINT `fk_booking_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Tabel booking_detail
-- --------------------------------------------------------
CREATE TABLE `booking_detail` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `booking_id` INT(11) NOT NULL,
  `fasilitas_id` INT(11) NOT NULL,
  `jumlah_hari` INT(11) NOT NULL,
  `harga_satuan` DECIMAL(12,2) NOT NULL,
  `subtotal` DECIMAL(12,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bd_booking` (`booking_id`),
  KEY `fk_bd_fasilitas` (`fasilitas_id`),
  CONSTRAINT `fk_bd_booking` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_bd_fasilitas` FOREIGN KEY (`fasilitas_id`) REFERENCES `fasilitas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ========================================================
-- DATA FASILITAS
-- ========================================================

-- AULA BESAR (1 unit)
INSERT INTO `fasilitas` (`nama`, `tipe`, `sub_tipe`, `kapasitas`, `harga_per_hari`, `harga_dp`, `lantai`, `deskripsi`, `fasilitas_detail`) VALUES
('Aula Besar', 'aula_besar', NULL, 250, 11600000.00, 2100000.00, 1, 
'Aula besar serbaguna untuk acara wisuda, seminar nasional, resepsi pernikahan, dan gathering berskala besar.',
'Kursi Futura Biru: 250 unit\nMeja Bulat: 10 unit\nMeja Panjang Prasmanan: 12 unit\nAC Dinding: 10 unit\nAC Standing: 6 unit\n\nTambahan:\n- Kursi tambahan: Rp 7.000/kursi\n- Meja tambahan: Rp 10.000/meja');

-- AULA KECIL (1 unit)
INSERT INTO `fasilitas` (`nama`, `tipe`, `sub_tipe`, `kapasitas`, `harga_per_hari`, `harga_dp`, `harga_12jam`, `lantai`, `deskripsi`, `fasilitas_detail`) VALUES
('Aula Kecil', 'aula_kecil', NULL, 60, 600000.00, 0.00, 780000.00, 1, 
'Aula kecil untuk rapat, workshop, pelatihan, dan acara skala kecil-menengah.\n\nKetentuan:\n- 8 jam: Rp 600.000\n- 9-12 jam: Rp 780.000\n- Sewa 1 hari: tidak boleh DP\n- Sewa 2 hari atau lebih: boleh DP',
'Kursi: 60 unit\nMeja: menyesuaikan permintaan\nAC tersedia');

-- KAMAR PENGINAPAN

-- ===== LANTAI 1: 18 Kamar Standard =====
INSERT INTO `fasilitas` (`nama`, `tipe`, `sub_tipe`, `kapasitas`, `harga_per_hari`, `lantai`, `deskripsi`, `fasilitas_detail`) VALUES
('Kamar 101', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 102', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 103', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 104', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 105', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 106', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 107', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 108', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 109', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 110', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 111', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 112', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 113', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 114', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 115', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 116', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 117', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 118', 'kamar', 'standard', 4, 300000.00, 1, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur');

-- ===== LANTAI 2: 1 VIP + 17 Standard =====
INSERT INTO `fasilitas` (`nama`, `tipe`, `sub_tipe`, `kapasitas`, `harga_per_hari`, `lantai`, `deskripsi`, `fasilitas_detail`) VALUES
('Kamar VIP 201', 'kamar', 'vip', 2, 350000.00, 2, 'Kamar VIP dengan 1 bed besar (King Size).', '1 King Bed, AC, Kamar Mandi Dalam'),
('Kamar 202', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 203', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 204', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 205', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 206', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 207', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 208', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 209', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 210', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 211', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 212', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 213', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 214', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 215', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 216', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 217', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 218', 'kamar', 'standard', 4, 300000.00, 2, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur');

-- ===== LANTAI 3: 1 VIP + 17 Standard =====
INSERT INTO `fasilitas` (`nama`, `tipe`, `sub_tipe`, `kapasitas`, `harga_per_hari`, `lantai`, `deskripsi`, `fasilitas_detail`) VALUES
('Kamar VIP 301', 'kamar', 'vip', 2, 350000.00, 3, 'Kamar VIP dengan 1 bed besar (King Size).', '1 King Bed, AC, Kamar Mandi Dalam'),
('Kamar 302', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 303', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 304', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 305', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 306', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 307', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 308', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 309', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 310', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 311', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 312', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 313', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 314', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 315', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 316', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 317', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 318', 'kamar', 'standard', 4, 300000.00, 3, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur');

-- ===== LANTAI 4: 1 VIP + 17 Standard =====
INSERT INTO `fasilitas` (`nama`, `tipe`, `sub_tipe`, `kapasitas`, `harga_per_hari`, `lantai`, `deskripsi`, `fasilitas_detail`) VALUES
('Kamar VIP 401', 'kamar', 'vip', 2, 350000.00, 4, 'Kamar VIP dengan 1 bed besar (King Size).', '1 King Bed, AC, Kamar Mandi Dalam'),
('Kamar 402', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 403', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 404', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 405', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 406', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 407', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 408', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 409', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 410', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 411', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 412', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 413', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 414', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 415', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 416', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 417', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur'),
('Kamar 418', 'kamar', 'standard', 4, 300000.00, 4, 'Kamar Standard dengan 4 bed.', '4 Tempat Tidur');
