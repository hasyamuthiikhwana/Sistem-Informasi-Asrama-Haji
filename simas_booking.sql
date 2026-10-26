-- ========================================================
-- SIMAS Booking Database Schema & Initial Data
-- ========================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Table structure for table `users` (create if not exists)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) DEFAULT NULL,
  `nama` VARCHAR(100) DEFAULT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `no_hp` VARCHAR(20) DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  `role` ENUM('admin','dosen','mahasiswa','user') DEFAULT 'user',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Alter `users` table to add extra fields if they don't exist
-- --------------------------------------------------------
ALTER TABLE `users` 
  ADD COLUMN IF NOT EXISTS `nama` VARCHAR(100) DEFAULT NULL AFTER `username`,
  ADD COLUMN IF NOT EXISTS `email` VARCHAR(100) DEFAULT NULL AFTER `nama`,
  ADD COLUMN IF NOT EXISTS `no_hp` VARCHAR(20) DEFAULT NULL AFTER `email`;

-- --------------------------------------------------------
-- Table structure for table `fasilitas`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(100) NOT NULL,
  `tipe` ENUM('aula_besar','aula_kecil','kamar') NOT NULL,
  `kapasitas` INT(11) NOT NULL,
  `harga_per_hari` DECIMAL(12,2) NOT NULL,
  `deskripsi` TEXT DEFAULT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `status` ENUM('tersedia','maintenance') NOT NULL DEFAULT 'tersedia',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `booking`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `booking` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `kode_booking` VARCHAR(20) NOT NULL,
  `tanggal_checkin` DATE NOT NULL,
  `tanggal_checkout` DATE NOT NULL,
  `total_harga` DECIMAL(12,2) NOT NULL,
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
-- Table structure for table `booking_detail`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `booking_detail` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `booking_id` INT(11) NOT NULL,
  `fasilitas_id` INT(11) NOT NULL,
  `jumlah_hari` INT(11) NOT NULL,
  `harga_satuan` DECIMAL(12,2) NOT NULL,
  `subtotal` DECIMAL(12,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_booking_detail_booking` (`booking_id`),
  KEY `fk_booking_detail_fasilitas` (`fasilitas_id`),
  CONSTRAINT `fk_booking_detail_booking` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_booking_detail_fasilitas` FOREIGN KEY (`fasilitas_id`) REFERENCES `fasilitas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Sample data for table `fasilitas`
-- --------------------------------------------------------
INSERT INTO `fasilitas` (`id`, `nama`, `tipe`, `kapasitas`, `harga_per_hari`, `deskripsi`, `foto`, `status`) VALUES
(1, 'Aula Besar Nusantara', 'aula_besar', 500, 2500000.00, 'Aula besar serbaguna yang cocok untuk acara wisuda, seminar nasional, resepsi pernikahan, dan gathering berskala besar. Dilengkapi panggung utama, sound system profesional, proyektor raksasa, dan pendingin ruangan sentral.', NULL, 'tersedia'),
(2, 'Aula Kecil Cendrawasih', 'aula_kecil', 100, 1000000.00, 'Aula kapasitas sedang yang ideal untuk workshop, pelatihan, rapat kerja, dan seminar skala menengah. Dilengkapi sound system, proyektor, dan AC.', NULL, 'tersedia'),
(3, 'Aula Kecil Mawar', 'aula_kecil', 50, 750000.00, 'Ruang pertemuan intim untuk rapat koordinasi, focus group discussion (FGD), atau presentasi kelompok. Dilengkapi smart TV / proyektor dan AC.', NULL, 'tersedia'),
(4, 'Kamar Deluxe 101', 'kamar', 2, 350000.00, 'Kamar tidur tipe Deluxe nyaman dengan 1 King Bed, kamar mandi dalam dengan pemanas air (water heater), AC, TV kabel, WiFi, dan meja kerja.', NULL, 'tersedia'),
(5, 'Kamar Deluxe 102', 'kamar', 2, 350000.00, 'Kamar tidur tipe Deluxe dengan 2 Twin Bed, kamar mandi dalam dengan water heater, AC, TV kabel, WiFi, dan fasilitas lemari pakaian.', NULL, 'tersedia'),
(6, 'Kamar Standard 201', 'kamar', 2, 200000.00, 'Kamar tipe Standard dengan 2 Twin Bed, kipas angin/AC, meja belajar, lemari pakaian, dan kamar mandi luar yang bersih.', NULL, 'tersedia'),
(7, 'Kamar Standard 202', 'kamar', 2, 200000.00, 'Kamar tipe Standard kapasitas 2 orang dengan 2 tempat tidur Single, meja belajar, lemari pakaian, dan fasilitas kamar mandi bersama.', NULL, 'tersedia'),
(8, 'Kamar Standard 203', 'kamar', 3, 250000.00, 'Kamar tipe Standard berkapasitas 3 orang dengan 3 Single Bed, lemari pakaian, meja belajar, dan sirkulasi udara yang nyaman.', NULL, 'tersedia'),
(9, 'Kamar Family 301', 'kamar', 4, 500000.00, 'Kamar tipe Family luas untuk keluarga atau rombongan berkapasitas 4 orang dengan 2 Queen Bed, AC, TV LED, sofa, dan kamar mandi dalam.', NULL, 'tersedia'),
(10, 'Kamar Family 302', 'kamar', 4, 500000.00, 'Kamar tipe Family luas kapasitas 4 orang dengan 4 Single Bed, AC, lemari besar, meja kerja, dan kamar mandi dalam yang bersih dan nyaman.', NULL, 'tersedia')
ON DUPLICATE KEY UPDATE 
  `nama` = VALUES(`nama`),
  `tipe` = VALUES(`tipe`),
  `kapasitas` = VALUES(`kapasitas`),
  `harga_per_hari` = VALUES(`harga_per_hari`),
  `deskripsi` = VALUES(`deskripsi`);

-- --------------------------------------------------------
-- Update and Insert Users
-- --------------------------------------------------------
UPDATE `users` SET `password` = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' WHERE `username` = 'admin';

INSERT IGNORE INTO `users` (`username`, `password`, `nama`, `email`, `role`) VALUES 
('admin2', '$2y$10$HfzIhGCCaxqyLm1BigPVOeQx1Ld7LGGgaaBkr5eWRzLdPgMFdCNXi', 'Administrator', 'admin@simas.com', 'admin');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
