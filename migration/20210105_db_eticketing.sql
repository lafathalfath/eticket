-- --------------------------------------------------------
-- Host:                         10.10.1.18
-- Server version:               10.0.15-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_eticketing.f_sid3401
CREATE TABLE IF NOT EXISTS `f_sid3401` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_permohonan` varchar(50) DEFAULT NULL,
  `nama_aplikasi` varchar(50) DEFAULT NULL,
  `pengguna_aplikasi` varchar(50) DEFAULT NULL,
  `pengembang_aplikasi` varchar(50) DEFAULT NULL,
  `deskripsi_aplikasi` text,
  `tgl_permohonan` date DEFAULT NULL,
  `mengetahui_kabiro` varchar(50) DEFAULT NULL,
  `mengetahui_kabidsitkd` varchar(50) DEFAULT NULL,
  `mengetahui_kapusdatin` varchar(50) DEFAULT NULL,
  `unit_kerja_id` int(6) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `ticket_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_unit_kerja_FK` (`unit_kerja_id`),
  KEY `f_sid3401_FK` (`ticket_id`),
  CONSTRAINT `f_sid3401_FK` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table db_eticketing.f_sid3401: ~1 rows (approximately)
/*!40000 ALTER TABLE `f_sid3401` DISABLE KEYS */;
INSERT INTO `f_sid3401` (`id`, `jenis_permohonan`, `nama_aplikasi`, `pengguna_aplikasi`, `pengembang_aplikasi`, `deskripsi_aplikasi`, `tgl_permohonan`, `mengetahui_kabiro`, `mengetahui_kabidsitkd`, `mengetahui_kapusdatin`, `unit_kerja_id`, `pegawai_id`, `ticket_id`) VALUES
	(5, 'Pembuatan Baru', 'Simantap', 'Internal', 'Koding Times', 'Simantap adalah .....', '2021-01-04', NULL, NULL, NULL, 7, 651, '2101040002');
/*!40000 ALTER TABLE `f_sid3401` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.f_sid3601
CREATE TABLE IF NOT EXISTS `f_sid3601` (
  `id` int(11) NOT NULL,
  `jenis_data` int(11) DEFAULT NULL,
  `tgl_permintaan` date DEFAULT NULL,
  `persetujuan_by` varchar(50) DEFAULT NULL,
  `tgl_permohonan` date DEFAULT NULL,
  `tgl_tindak_lanjut` date DEFAULT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  `tindak_lanjut_id` varchar(50) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `personil_id` int(11) DEFAULT NULL,
  `ticket_id` varchar(11) DEFAULT NULL,
  `unit_kerja_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `f_sid3601_FK` (`unit_kerja_id`),
  KEY `f_sid3601_FK_2` (`pegawai_id`),
  KEY `f_sid3601_FK_1` (`ticket_id`),
  CONSTRAINT `f_sid3601_FK` FOREIGN KEY (`unit_kerja_id`) REFERENCES `m_unit_kerja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `f_sid3601_FK_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `f_sid3601_FK_2` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.f_sid3601: ~0 rows (approximately)
/*!40000 ALTER TABLE `f_sid3601` DISABLE KEYS */;
/*!40000 ALTER TABLE `f_sid3601` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_bidang_pusdatin
CREATE TABLE IF NOT EXISTS `m_bidang_pusdatin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bidang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_bidang_pusdatin: ~4 rows (approximately)
/*!40000 ALTER TABLE `m_bidang_pusdatin` DISABLE KEYS */;
INSERT INTO `m_bidang_pusdatin` (`id`, `nama_bidang`) VALUES
	(1, 'Bidang SITKD'),
	(2, 'Bidang IKI'),
	(3, 'Pusdatin'),
	(4, 'Lainnya');
/*!40000 ALTER TABLE `m_bidang_pusdatin` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_faq
CREATE TABLE IF NOT EXISTS `m_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text,
  `last_modified` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_faq: ~3 rows (approximately)
/*!40000 ALTER TABLE `m_faq` DISABLE KEYS */;
INSERT INTO `m_faq` (`id`, `judul`, `isi`, `last_modified`, `created_by`) VALUES
	(3, 'PC Mati', 'SIlahkan lakukan', '2020-12-10', 'Admin IT'),
	(4, 'PC Lemot', 'Silahkan', '2020-12-10', 'Admin IT'),
	(5, 'Email Tidak Bisa di Akses', 'Pastikan anda', '2020-12-10', 'Admin IT');
/*!40000 ALTER TABLE `m_faq` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_form
CREATE TABLE IF NOT EXISTS `m_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_form: ~3 rows (approximately)
/*!40000 ALTER TABLE `m_form` DISABLE KEYS */;
INSERT INTO `m_form` (`id`, `form`) VALUES
	(1, 'f_sid3601'),
	(2, 'f_sid3401'),
	(3, 'f_sid3701');
/*!40000 ALTER TABLE `m_form` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_jawab
CREATE TABLE IF NOT EXISTS `m_jawab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jawab` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_jawab: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_jawab` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_jawab` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_jenis_layanan
CREATE TABLE IF NOT EXISTS `m_jenis_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_layanan` varchar(50) DEFAULT NULL,
  `jenis_layanan_detail` varchar(100) DEFAULT NULL,
  `is_active` int(1) DEFAULT '1',
  `gambar` varchar(20) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `bidang_id` int(11) DEFAULT NULL,
  `sub_layanan_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `kategori_id_FK` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategori_layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_jenis_layanan: ~24 rows (approximately)
/*!40000 ALTER TABLE `m_jenis_layanan` DISABLE KEYS */;
INSERT INTO `m_jenis_layanan` (`id`, `jenis_layanan`, `jenis_layanan_detail`, `is_active`, `gambar`, `kategori_id`, `bidang_id`, `sub_layanan_id`) VALUES
	(1, 'PC / Laptop', NULL, 1, 'complaint.jpg', 1, 2, NULL),
	(2, 'eSMKI', NULL, 1, 'complaint.jpg', 2, 1, 2),
	(3, 'Scanner', NULL, 1, 'complaint.jpg', 1, 2, NULL),
	(4, 'Email', NULL, 1, 'complaint.jpg', 4, 1, NULL),
	(9, 'Wifi', NULL, 1, 'request.jpg', 4, 2, NULL),
	(13, 'Dahara', 'Daftar Hadir Rapat', 1, 'request.jpg', 2, 1, 2),
	(14, 'eSign', 'Tanda Tangan Elektronik', 1, 'request.jpg', 2, 1, 2),
	(15, 'Microsoft Office', 'Software Microsoft Office', 1, 'request.jpg', 14, 2, 1),
	(16, 'Adobe Acrobat', 'Software PDF Tools', 1, 'request.jpg', 14, 2, 1),
	(17, 'SISPK', 'Sistem Informasi SPK', 1, 'request.jpg', 2, 1, NULL),
	(18, 'Printer', NULL, 1, 'complaint.jpg', 1, 2, NULL),
	(19, 'Peripheral Lainnya', 'Mouse, keyboard,speaker, dll', 1, 'complaint.jpg', 1, 2, NULL),
	(20, 'Monitor', NULL, 1, 'complaint.jpg', 1, 2, NULL),
	(21, 'Intranet / TNDE', NULL, 1, 'request.jpg', 2, 1, NULL),
	(22, 'Hadir', 'Absensi Online', 1, 'request.jpg', 2, 1, NULL),
	(23, 'Pesta', 'Pemesanan Standar', 1, 'request.jpg', 2, 1, NULL),
	(24, 'Akses SNI', NULL, 1, 'request.jpg', 2, 1, NULL),
	(25, 'e-Learning', NULL, 1, 'request.jpg', 2, 1, NULL),
	(26, 'Diklat', NULL, 1, 'request.jpg', 2, 1, NULL),
	(27, 'Sipakar', NULL, 1, 'request.jpg', 2, 1, NULL),
	(28, 'Pembimbingan SNI', NULL, 1, 'request.jpg', 2, 1, NULL),
	(29, 'LAN', 'Local Area Network', 1, 'complaint.jpg', 4, 2, NULL),
	(30, 'Zoom', 'Software Teleconference', 1, 'request.jpg', 14, 2, NULL),
	(31, 'Sophos VPN', NULL, 1, 'request.jpg', 14, 2, NULL);
/*!40000 ALTER TABLE `m_jenis_layanan` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_kategori_layanan
CREATE TABLE IF NOT EXISTS `m_kategori_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_layanan` varchar(50) DEFAULT NULL,
  `kategori_layanan_detail` varchar(100) DEFAULT NULL,
  `is_active` int(1) DEFAULT '1',
  `kategori_layanan_order` tinyint(3) DEFAULT NULL,
  `gambar` varchar(20) DEFAULT NULL,
  `klasifikasi_id` int(4) DEFAULT NULL,
  `form_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form_id` (`form_id`),
  CONSTRAINT `form_id_FK` FOREIGN KEY (`form_id`) REFERENCES `m_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_kategori_layanan: ~11 rows (approximately)
/*!40000 ALTER TABLE `m_kategori_layanan` DISABLE KEYS */;
INSERT INTO `m_kategori_layanan` (`id`, `kategori_layanan`, `kategori_layanan_detail`, `is_active`, `kategori_layanan_order`, `gambar`, `klasifikasi_id`, `form_id`) VALUES
	(1, 'Perangkat Keras', 'Permasalahan terkait perangkat keras (hardware)', 1, 1, 'complaint.jpg', 1, 1),
	(2, 'Website', 'Permasalahan terkait website', 1, 2, 'complaint.jpg', 1, 1),
	(4, 'Jaringan', 'Permasalahan terkait jaringan internet', 1, 3, 'complaint.jpg', 1, 1),
	(6, 'Data', 'Permintaan terkait data dan informasi', 1, 4, 'complaint.jpg', 2, 1),
	(7, 'Vidcon', 'Permintaan terkait penyelenggaraan video conference', 1, 5, 'request.jpg', 2, 1),
	(8, 'Akun', 'Permintaan terkait akun dan hak akses', 1, 6, 'request.jpg', 2, 1),
	(9, 'Jaringan', 'Permintaan terkait jaringan internet', 1, 7, 'request.jpg', 2, 1),
	(10, 'Storage Mandiri', 'Permintaan terkait penyimpanan mandiri', 1, 8, 'request.jpg', 2, 3),
	(11, 'Aplikasi Baru', 'Permintaan terkait perancangan aplikasi sistem informasi', 1, 9, 'request.jpg', 2, 2),
	(13, 'Email', 'Permasalahan terkait email', 1, 10, 'request.jpg', 1, 1),
	(14, 'Aplikasi / Tools', 'Permasalahan terkait aplikasi yang terinstal', 1, 11, 'request.jpg', 1, 1);
/*!40000 ALTER TABLE `m_kategori_layanan` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_kategori_tempat
CREATE TABLE IF NOT EXISTS `m_kategori_tempat` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kategori_tempat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_kategori_tempat: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_kategori_tempat` DISABLE KEYS */;
INSERT INTO `m_kategori_tempat` (`id`, `kategori_tempat`) VALUES
	(1, 'Tempat Tetap'),
	(2, 'Tempat Tidak Tetap');
/*!40000 ALTER TABLE `m_kategori_tempat` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_klasifikasi
CREATE TABLE IF NOT EXISTS `m_klasifikasi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `klasifikasi` varchar(50) DEFAULT NULL,
  `detail_klasifikasi` varchar(50) DEFAULT NULL,
  `gambar` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_klasifikasi: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_klasifikasi` DISABLE KEYS */;
INSERT INTO `m_klasifikasi` (`id`, `klasifikasi`, `detail_klasifikasi`, `gambar`) VALUES
	(1, 'Lapor / Komplain', '(Perangkat Keras, Perangkat Lunak, Jaringan)', 'complaint.jpg'),
	(2, 'Permintaan Baru', '(Data, Akun Email, Vidcon)', 'request.jpg');
/*!40000 ALTER TABLE `m_klasifikasi` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_masalah
CREATE TABLE IF NOT EXISTS `m_masalah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `masalah` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_masalah: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_masalah` DISABLE KEYS */;
INSERT INTO `m_masalah` (`id`, `masalah`) VALUES
	(1, 'Mati'),
	(2, 'Lemot'),
	(3, 'Tidak Bisa Internet'),
	(4, 'Tidak Bisa Akses');
/*!40000 ALTER TABLE `m_masalah` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_menu
CREATE TABLE IF NOT EXISTS `m_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) NOT NULL,
  `menu_order` tinyint(4) NOT NULL,
  `parent_id` tinyint(2) NOT NULL,
  `level_id` tinyint(2) NOT NULL,
  `publish_id` tinyint(2) NOT NULL,
  `ctime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mtime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FKmenu_level` (`level_id`),
  KEY `FKmenu_publish` (`publish_id`),
  CONSTRAINT `FKmenu_level` FOREIGN KEY (`level_id`) REFERENCES `m_menu_level` (`id`),
  CONSTRAINT `FKmenu_publish` FOREIGN KEY (`publish_id`) REFERENCES `m_menu_publish` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_menu: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_menu` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_menu_akses
CREATE TABLE IF NOT EXISTS `m_menu_akses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(3) unsigned NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_menu_akses: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_menu_akses` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_menu_akses` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_menu_level
CREATE TABLE IF NOT EXISTS `m_menu_level` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `menu_level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_menu_level: ~3 rows (approximately)
/*!40000 ALTER TABLE `m_menu_level` DISABLE KEYS */;
INSERT INTO `m_menu_level` (`id`, `menu_level`) VALUES
	(0, 'Menu'),
	(1, 'Sub Menu'),
	(2, 'Sub Sub Menu');
/*!40000 ALTER TABLE `m_menu_level` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_menu_publish
CREATE TABLE IF NOT EXISTS `m_menu_publish` (
  `id` tinyint(2) NOT NULL,
  `menu_publish` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_menu_publish: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_menu_publish` DISABLE KEYS */;
INSERT INTO `m_menu_publish` (`id`, `menu_publish`) VALUES
	(0, 'Tidak Aktif'),
	(1, 'Aktif');
/*!40000 ALTER TABLE `m_menu_publish` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_perangkat_keras
CREATE TABLE IF NOT EXISTS `m_perangkat_keras` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `perangkat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_perangkat_keras: ~4 rows (approximately)
/*!40000 ALTER TABLE `m_perangkat_keras` DISABLE KEYS */;
INSERT INTO `m_perangkat_keras` (`id`, `perangkat`) VALUES
	(1, 'Printer'),
	(2, 'PC'),
	(3, 'Laptop'),
	(4, 'scanner');
/*!40000 ALTER TABLE `m_perangkat_keras` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_ruang_rapat
CREATE TABLE IF NOT EXISTS `m_ruang_rapat` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `ruang_rapat` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_ruang_rapat: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_ruang_rapat` DISABLE KEYS */;
INSERT INTO `m_ruang_rapat` (`id`, `ruang_rapat`) VALUES
	(1, 'Ruang Rapat Utama BSN, Lantai 9'),
	(2, 'Ruang Rapat Sestama BSN, Lantai 10');
/*!40000 ALTER TABLE `m_ruang_rapat` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_software
CREATE TABLE IF NOT EXISTS `m_software` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `software` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_software: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_software` DISABLE KEYS */;
INSERT INTO `m_software` (`id`, `software`) VALUES
	(1, 'Microsoft Office'),
	(2, 'PDF Tools');
/*!40000 ALTER TABLE `m_software` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_status
CREATE TABLE IF NOT EXISTS `m_status` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_status: ~3 rows (approximately)
/*!40000 ALTER TABLE `m_status` DISABLE KEYS */;
INSERT INTO `m_status` (`id`, `status`, `keterangan`) VALUES
	(1, 'Open', 'tiket belum direspon'),
	(2, 'Ongoing', 'tiket sdh didisposisikan'),
	(3, 'Closed', 'tiket telah selesai');
/*!40000 ALTER TABLE `m_status` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_sub_layanan
CREATE TABLE IF NOT EXISTS `m_sub_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_layanan` varchar(100) DEFAULT NULL,
  `sub_layanan_detail` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_sub_layanan: ~2 rows (approximately)
/*!40000 ALTER TABLE `m_sub_layanan` DISABLE KEYS */;
INSERT INTO `m_sub_layanan` (`id`, `sub_layanan`, `sub_layanan_detail`) VALUES
	(1, 'Tools / Aplikasi', 'Terinstall'),
	(2, 'Website', 'Layanan situs web BSN');
/*!40000 ALTER TABLE `m_sub_layanan` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_unit_kerja
CREATE TABLE IF NOT EXISTS `m_unit_kerja` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `unit_kerja` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_unit_kerja: ~17 rows (approximately)
/*!40000 ALTER TABLE `m_unit_kerja` DISABLE KEYS */;
INSERT INTO `m_unit_kerja` (`id`, `unit_kerja`) VALUES
	(1, 'Biro SDMOH'),
	(2, 'Biro PKU'),
	(3, 'Inspektorat'),
	(4, 'Direktorat SSPK'),
	(5, 'Direktorat AL'),
	(6, 'Direktorat ALIS'),
	(7, 'PUSDATIN'),
	(8, 'Direktorat PPSPK'),
	(9, 'PUSRISBANG'),
	(10, 'Direktorat PSAK2H'),
	(11, 'Direktorat SPSPK'),
	(12, 'Biro HKLI'),
	(13, 'Direktorat SISHAR'),
	(14, 'Direktorat SNSU MRB'),
	(15, 'Direktorat SNSU TK'),
	(16, 'Direktorat MEETTI'),
	(17, 'Direktorat IPPE');
/*!40000 ALTER TABLE `m_unit_kerja` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.m_web
CREATE TABLE IF NOT EXISTS `m_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.m_web: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_web` DISABLE KEYS */;
INSERT INTO `m_web` (`id`, `nama_aplikasi`, `url`) VALUES
	(1, 'Website BSN', 'bsn.go.id'),
	(2, 'Aplikasi Esign', 'esign.bsn.go.id');
/*!40000 ALTER TABLE `m_web` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `jenis_user` varchar(10) DEFAULT NULL,
  `log_time` int(128) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=677 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.pegawai: ~645 rows (approximately)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`id`, `name`, `email`, `image`, `username`, `password`, `nomor_telepon`, `role_id`, `is_active`, `date_created`, `jenis_user`, `log_time`, `nip`) VALUES
	(1, 'Ajeng Harisetyowati', 'a.hari@bsn.go.id', 'default.jpg', 'a.hari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362960, NULL),
	(2, 'Agus Setiadi', 'a_setiadi@bsn.go.id', 'default.jpg', 'a_setiadi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(3, 'Aam Badrul Salam', 'aambs@bsn.go.id', 'default.jpg', 'aambs', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359821, NULL),
	(4, 'Abdurrachman W', 'abdurrachman@bsn.go.id', 'default.jpg', 'abdurrachman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(5, 'Febriyanto Nugroho', 'abi@bsn.go.id', 'default.jpg', 'abi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360058, NULL),
	(6, 'Acep Sujita', 'acep@bsn.go.id', 'default.jpg', 'acep', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363193, NULL),
	(7, 'Achalik', 'achalik@bsn.go.id', 'default.jpg', 'achalik', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(8, 'Aderina Uli Panggabean', 'aderina@bsn.go.id', 'default.jpg', 'aderina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360059, NULL),
	(9, 'Adi Husada', 'adi_husada@bsn.go.id', 'default.jpg', 'adi_husada', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366551, NULL),
	(10, 'Adin Danarto', 'adin@bsn.go.id', 'default.jpg', 'adin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362037, NULL),
	(11, 'Aditya Achmadi', 'aditya@bsn.go.id', 'default.jpg', 'aditya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367729, NULL),
	(12, 'adlin ichsan', 'adlin@bsn.go.id', 'default.jpg', 'adlin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363012, NULL),
	(13, 'Adriana Andang Gitasari', 'adriana@bsn.go.id', 'default.jpg', 'adriana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360810, NULL),
	(14, 'Nur Aeni', 'aeni@bsn.go.id', 'default.jpg', 'aeni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(15, 'Agus Marwanto', 'agus.marwanto@bsn.go.id', 'default.jpg', 'agus.marwanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360624, NULL),
	(16, 'Agus Prasetyo', 'agus.prasetyo@bsn.go.id', 'default.jpg', 'agus.prasetyo', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(17, 'Eko Agus Purnomo', 'agus.purnomo@bsn.go.id', 'default.jpg', 'agus.purnomo', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603370382, NULL),
	(18, 'Agus Purnawarman', 'agus_p@bsn.go.id', 'default.jpg', 'agus_p', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362175, NULL),
	(19, 'Agus Setiawan', 'agussetiawan@bsn.go.id', 'default.jpg', 'agussetiawan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365368, NULL),
	(20, 'Ahmad Hidayat', 'ahmad.hidayat@bsn.go.id', 'default.jpg', 'ahmad.hidayat', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367687, NULL),
	(21, 'Ahmad Fahmi Hidayatullah', 'ahmad_fahmi@bsn.go.id', 'default.jpg', 'ahmad_fahmi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363093, NULL),
	(22, 'Ahnan Maruf, ST', 'ahnan@bsn.go.id', 'default.jpg', 'ahnan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(23, 'Aisah Latifah Rahmah Putri', 'aisah.rahmah@bsn.go.id', 'default.jpg', 'aisah.rahmah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603368328, NULL),
	(24, 'Sumarna', 'ajang@bsn.go.id', 'default.jpg', 'ajang', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360259, NULL),
	(25, 'Ajat sudrajat', 'ajat@bsn.go.id', 'default.jpg', 'ajat', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361182, NULL),
	(26, 'Aji Margono', 'aji@bsn.go.id', 'default.jpg', 'aji', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366851, NULL),
	(27, 'Ajun Tri Setyoko', 'ajun_ts@bsn.go.id', 'default.jpg', 'ajun_ts', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(28, 'Akbar Aryanto', 'akbar@bsn.go.id', 'default.jpg', 'akbar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365830, NULL),
	(29, 'Akreditasi KAN', 'akreditasi@bsn.go.id', 'default.jpg', 'akreditasi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(30, 'Albi Kusuma Hermawan', 'albi@bsn.go.id', 'default.jpg', 'albi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(31, 'Aldila Winzariski Rahmawati', 'aldila.wr@bsn.go.id', 'default.jpg', 'aldila.wr', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360148, NULL),
	(32, 'Aldy Muslim Prasetya', 'aldy.mp@bsn.go.id', 'default.jpg', 'aldy.mp', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361604, NULL),
	(33, 'Ratri Alfitasari', 'alfitasari.ratri@bsn.go.id', 'default.jpg', 'alfitasari.ratri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(34, 'Muhamad Ali Akbar', 'ali@bsn.go.id', 'default.jpg', 'ali', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(35, 'Alifah Rahmi Heritiera', 'alifah@bsn.go.id', 'default.jpg', 'alifah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(36, 'Alin Mursalin', 'alin@bsn.go.id', 'default.jpg', 'alin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360346, NULL),
	(37, 'Alky Jatisantoso Wibowo', 'alky_j@bsn.go.id', 'default.jpg', 'alky_j', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(38, 'Chalid Alonto', 'alonto@bsn.go.id', 'default.jpg', 'alonto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362150, NULL),
	(39, 'Amir Muchtar', 'amir@bsn.go.id', 'default.jpg', 'amir', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603371153, NULL),
	(40, 'Amjad Tri Puspitasari', 'amjad.tri.puspitasari@bsn.go.id', 'default.jpg', 'amjad.tri.puspitasari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362661, NULL),
	(41, 'Amri Arifianto', 'amri@bsn.go.id', 'default.jpg', 'amri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603358845, NULL),
	(42, 'Amsar', 'amsar@bsn.go.id', 'default.jpg', 'amsar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366252, NULL),
	(43, 'Ahmad Bahrul Anam', 'anam.ab@bsn.go.id', 'default.jpg', 'anam.ab', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367255, NULL),
	(44, 'Anang Tri Setyo Utomo', 'anang_t@bsn.go.id', 'default.jpg', 'anang_t', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364379, NULL),
	(45, 'Anas Tasia Nuki Charisma', 'anastasianc@bsn.go.id', 'default.jpg', 'anastasianc', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362767, NULL),
	(46, 'Andiko Perdana', 'andiko.perdana@bsn.go.id', 'default.jpg', 'andiko.perdana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361374, NULL),
	(47, 'Andreas Tri Handoko', 'andre.th@bsn.go.id', 'default.jpg', 'andre.th', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361082, NULL),
	(48, 'Andrew Agustinus Marulitua Sitorus Pane', 'andrew.pane@bsn.go.id', 'default.jpg', 'andrew.pane', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364449, NULL),
	(49, 'Andry Ridhya Prihikmat', 'andry@bsn.go.id', 'default.jpg', 'andry', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362354, NULL),
	(50, 'Angela Prasetya', 'angela.prasetya@bsn.go.id', 'default.jpg', 'angela.prasetya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359843, NULL),
	(51, 'Angga Madi Utomo', 'anggamadi@bsn.go.id', 'default.jpg', 'anggamadi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362951, NULL),
	(52, 'Anggraeni Resmi Untari', 'anggre@bsn.go.id', 'default.jpg', 'anggre', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360540, NULL),
	(53, 'Anindhita Putri Wibawa', 'anindhitaputri@bsn.go.id', 'default.jpg', 'anindhitaputri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360835, NULL),
	(54, 'Anita', 'anita@bsn.go.id', 'default.jpg', 'anita', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(55, 'Anjar Oktikawati', 'anjar@bsn.go.id', 'default.jpg', 'anjar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(56, 'Anna Melianawati', 'anna@bsn.go.id', 'default.jpg', 'anna', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361005, NULL),
	(57, 'Kristiati Andriani', 'anne@bsn.go.id', 'default.jpg', 'anne', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361838, NULL),
	(58, 'Annisa Hapsari', 'annisa@bsn.go.id', 'default.jpg', 'annisa', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(59, 'Anthony Achmad Fathony', 'anthony.achmad@bsn.go.id', 'default.jpg', 'anthony.achmad', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(60, 'Murdianto', 'anto@bsn.go.id', 'default.jpg', 'anto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(61, 'Antonius Ari Pramono', 'antonius.aripramono@bsn.go.id', 'default.jpg', 'antonius.aripramono', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362625, NULL),
	(62, 'Anugerah Media', 'anugerahmedia@bsn.go.id', 'default.jpg', 'anugerahmedia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(63, 'Dini Apriori', 'apriori@bsn.go.id', 'default.jpg', 'apriori', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359755, NULL),
	(64, 'Ardi Cahyadi Syarif', 'ardi.cahyadi@bsn.go.id', 'default.jpg', 'ardi.cahyadi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361108, NULL),
	(65, 'Ardi Rahman', 'ardi.rahman@bsn.go.id', 'default.jpg', 'ardi.rahman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362240, NULL),
	(66, 'Ardian Wiratama', 'ardian.wn@bsn.go.id', 'default.jpg', 'ardian.wn', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(67, 'Arfan Sindu Tistomo', 'arfan@bsn.go.id', 'default.jpg', 'arfan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363185, NULL),
	(68, 'Ari Nugraheni', 'ari.nugraheni@bsn.go.id', 'default.jpg', 'ari.nugraheni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(69, 'Ari Wibowo', 'ari@bsn.go.id', 'default.jpg', 'ari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367077, NULL),
	(70, 'Muhamad Ari Bahtiar Al Machi', 'ari_almachi@bsn.go.id', 'default.jpg', 'ari_almachi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369709, NULL),
	(71, 'Arie Eka', 'arie.eka@bsn.go.id', 'default.jpg', 'arie.eka', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360746, NULL),
	(72, 'Arief Gunawan', 'arief.g@bsn.go.id', 'default.jpg', 'arief.g', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361341, NULL),
	(73, 'Arief Eko Prasetiyo', 'ariefeko@bsn.go.id', 'default.jpg', 'ariefeko', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(74, 'Aries Agus Budi Hartanto', 'aries@bsn.go.id', 'default.jpg', 'aries', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(75, 'Arif Widyantoro', 'arif.widyantoro@bsn.go.id', 'default.jpg', 'arif.widyantoro', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603371030, NULL),
	(76, 'Arini Widyastuti', 'arini@bsn.go.id', 'default.jpg', 'arini', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361076, NULL),
	(77, 'Arintina Sri Maradewi', 'arintina.sri.m@bsn.go.id', 'default.jpg', 'arintina.sri.m', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361266, NULL),
	(78, 'Ari Yanto Hernowo', 'ariyanto@bsn.go.id', 'default.jpg', 'ariyanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359942, NULL),
	(79, 'A r l a n', 'arlan@bsn.go.id', 'default.jpg', 'arlan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363332, NULL),
	(80, 'Ika Arlina Prabowo', 'arlin_toya@bsn.go.id', 'default.jpg', 'arlin_toya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365176, NULL),
	(81, 'Arsanti Rakhasiwi', 'arsantirs@bsn.go.id', 'default.jpg', 'arsantirs', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369327, NULL),
	(82, 'Ary Budi Mulyono', 'arybudi@bsn.go.id', 'default.jpg', 'arybudi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369052, NULL),
	(83, 'Asep Sutisna', 'asep@bsn.go.id', 'default.jpg', 'asep', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(84, 'Asep Hapiddin', 'aseph@bsn.go.id', 'default.jpg', 'aseph', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367236, NULL),
	(85, 'Ashri Khusnul Chotimah Alwahid Setiawan', 'ashri@bsn.go.id', 'default.jpg', 'ashri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(86, 'Asrie Koestantini', 'asrie.koestantini@bsn.go.id', 'default.jpg', 'asrie.koestantini', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366669, NULL),
	(87, 'Agus Suhartaji', 'asuhartaji@bsn.go.id', 'default.jpg', 'asuhartaji', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(88, 'Aulia Nur Gaida', 'aulia@bsn.go.id', 'default.jpg', 'aulia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(89, 'Auraga Dewantoro', 'auraga@bsn.go.id', 'default.jpg', 'auraga', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360776, NULL),
	(90, 'Awang Dewan Pratama', 'awang@bsn.go.id', 'default.jpg', 'awang', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360708, NULL),
	(91, 'Awan Taufani', 'awantaufani@bsn.go.id', 'default.jpg', 'awantaufani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(92, 'Ayu Hindayani', 'ayu.hindayani@bsn.go.id', 'default.jpg', 'ayu.hindayani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359920, NULL),
	(93, 'Rindang Ayu Puspa Srikandi', 'ayu@bsn.go.id', 'default.jpg', 'ayu', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603372137, NULL),
	(94, 'Ayumi Hikmawati', 'ayumi@bsn.go.id', 'default.jpg', 'ayumi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363342, NULL),
	(95, 'Azmi Zuhdi Fabian Nur', 'azmi.zuhdi@bsn.go.id', 'default.jpg', 'azmi.zuhdi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 3, 1, 1591610581, 'PNS', 1603358675, NULL),
	(96, 'Muhammad Azzumar', 'azum@bsn.go.id', 'default.jpg', 'azum', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(97, 'Azwar Sabana', 'azwar.sabana@bsn.go.id', 'default.jpg', 'azwar.sabana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359820, NULL),
	(98, 'Prof. Dr. Ir. Bambang Prasetya, M.Sc', 'bambang.prasetya@bsn.go.id', 'default.jpg', 'bambang.prasetya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361689, NULL),
	(99, 'Bambang Laksono Putro', 'bambanglp@bsn.go.id', 'default.jpg', 'bambanglp', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364701, NULL),
	(100, 'Banu Sirnamala', 'banu@bsn.go.id', 'default.jpg', 'banu', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(101, 'Basith Ardhiyansyah', 'basith@bsn.go.id', 'default.jpg', 'basith', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367242, NULL),
	(102, 'Basundoro', 'basundoro@bsn.go.id', 'default.jpg', 'basundoro', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603368639, NULL),
	(103, 'Bayu Krishna Murti', 'bayu.krishna@bsn.go.id', 'default.jpg', 'bayu.krishna', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360140, NULL),
	(104, 'Bendjamin B. Louhenapessy', 'bendjamin@bsn.go.id', 'default.jpg', 'bendjamin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(105, 'Beni Adi Trisna', 'beni.adi@bsn.go.id', 'default.jpg', 'beni.adi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(106, 'Beni Nugraha', 'beninugraha@bsn.go.id', 'default.jpg', 'beninugraha', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361264, NULL),
	(107, 'Bety Prastiwi', 'bety.prastiwi@bsn.go.id', 'default.jpg', 'bety.prastiwi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361556, NULL),
	(108, 'Bety Wahyu Hapsari', 'bety@bsn.go.id', 'default.jpg', 'bety', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(109, 'R. Iskandar Novianto', 'bibob@bsn.go.id', 'default.jpg', 'bibob', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(110, 'Bondan Dwisetyo', 'bondan@bsn.go.id', 'default.jpg', 'bondan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(111, 'Muhamad Wibowo Sukendar', 'bowo@bsn.go.id', 'default.jpg', 'bowo', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361742, NULL),
	(112, 'A. Mohamad Boynawan', 'boy@bsn.go.id', 'default.jpg', 'boy', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(113, 'Amar Bramantiyo', 'bramantiyo@bsn.go.id', 'default.jpg', 'bramantiyo', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364725, NULL),
	(114, 'Ir. Budhy Basuki', 'budhyb@bsn.go.id', 'default.jpg', 'budhyb', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(115, 'Budi Rahardjo', 'budi_r@bsn.go.id', 'default.jpg', 'budi_r', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(116, 'Budi Triswanto', 'budi_wangid@bsn.go.id', 'default.jpg', 'budi_wangid', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603358750, NULL),
	(117, 'Eka Candra Wayana', 'candra.wayana@bsn.go.id', 'default.jpg', 'candra.wayana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360168, NULL),
	(118, 'Celly Silviana', 'celly@bsn.go.id', 'default.jpg', 'celly', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603370177, NULL),
	(119, 'Chery Chaen Putri', 'chery@bsn.go.id', 'default.jpg', 'chery', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362893, NULL),
	(120, 'Christine Benedicta', 'christine.benedicta@bsn.go.id', 'default.jpg', 'christine.benedicta', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359967, NULL),
	(121, 'Christine Elishian', 'christine@bsn.go.id', 'default.jpg', 'christine', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361560, NULL),
	(122, 'Ayu Citra Pawestrie Decsadwihardyanti', 'citra@bsn.go.id', 'default.jpg', 'citra', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359905, NULL),
	(123, 'corista karamina hanum', 'corista.karamina@bsn.go.id', 'default.jpg', 'corista.karamina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362282, NULL),
	(124, 'Cynthia Kirana Puteri', 'cynthia.kirana@bsn.go.id', 'default.jpg', 'cynthia.kirana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366121, NULL),
	(125, 'Dadang Chaerudin', 'dadang.chaerudin@bsn.go.id', 'default.jpg', 'dadang.chaerudin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360527, NULL),
	(126, 'Dadang Jatmiko', 'dadang.jatmiko@bsn.go.id', 'default.jpg', 'dadang.jatmiko', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(127, 'Daeng Darmaji', 'daeng@bsn.go.id', 'default.jpg', 'daeng', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367010, NULL),
	(128, 'Danar Agus Susanto', 'danar@bsn.go.id', 'default.jpg', 'danar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360799, NULL),
	(129, 'Jahiram Daniel Purba', 'daniel_jahiram@bsn.go.id', 'default.jpg', 'daniel_jahiram', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603368369, NULL),
	(130, 'Dannies Permata Putri', 'dannies_putri@bsn.go.id', 'default.jpg', 'dannies_putri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360611, NULL),
	(131, 'Danu Dwi Cahyo', 'danudwic@bsn.go.id', 'default.jpg', 'danudwic', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362822, NULL),
	(132, 'Muhammad Daryl Bustaman', 'daryl@bsn.go.id', 'default.jpg', 'daryl', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362974, NULL),
	(133, 'Daryono Restu Wahono', 'daryono@bsn.go.id', 'default.jpg', 'daryono', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(134, 'David Nicko Harmanditya', 'davidnicko@bsn.go.id', 'default.jpg', 'davidnicko', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359946, NULL),
	(135, 'Daya Aruna Bratajaya', 'daya.aruna@bsn.go.id', 'default.jpg', 'daya.aruna', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(136, 'Dedy Damhudi', 'ddamhudi@bsn.go.id', 'default.jpg', 'ddamhudi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(137, 'Dea Winiarti', 'dea@bsn.go.id', 'default.jpg', 'dea', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362156, NULL),
	(138, 'Drs. Dede Erawan, M.SC', 'dede_erawan@bsn.go.id', 'default.jpg', 'dede_erawan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(139, 'Dedi Sartono', 'dedi.sartono@bsn.go.id', 'default.jpg', 'dedi.sartono', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366581, NULL),
	(140, 'Dedy Maulana', 'dedy@bsn.go.id', 'default.jpg', 'dedy', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(141, 'Dedy Supriadi', 'dedysupriadi@bsn.go.id', 'default.jpg', 'dedysupriadi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369092, NULL),
	(142, 'Deni Nareswara Darmawan', 'deni.darmawan@bsn.go.id', 'default.jpg', 'deni.darmawan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(143, 'Denny Hermawanto', 'denny.hermawanto@bsn.go.id', 'default.jpg', 'denny.hermawanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(144, 'Denny Wahyudhi', 'denny@bsn.go.id', 'default.jpg', 'denny', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361408, NULL),
	(145, 'Denny Kusuma Hendraningrat', 'denny_kh@bsn.go.id', 'default.jpg', 'denny_kh', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359618, NULL),
	(146, 'Denok Wahyu Febriana', 'denok@bsn.go.id', 'default.jpg', 'denok', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(147, 'Dentino Aji Sasmita', 'dentino@bsn.go.id', 'default.jpg', 'dentino', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359649, NULL),
	(148, 'Desi Kurnia', 'desikurnia@bsn.go.id', 'default.jpg', 'desikurnia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361246, NULL),
	(149, 'Dessy Fitrica Sylviani', 'dessy@bsn.go.id', 'default.jpg', 'dessy', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366752, NULL),
	(150, 'Desvia Asmarini', 'desviaasmarini@bsn.go.id', 'default.jpg', 'desviaasmarini', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(151, 'Dewi Komalasari', 'dewi.komalasari@bsn.go.id', 'default.jpg', 'dewi.komalasari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(152, 'Dewi Nurlatifah', 'dewi.nurlatifah@bsn.go.id', 'default.jpg', 'dewi.nurlatifah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361194, NULL),
	(153, 'Dewi Kusumawardani', 'dewi_k@bsn.go.id', 'default.jpg', 'dewi_k', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367404, NULL),
	(154, 'Dewi Noviyanti Sari', 'dewi_ns@bsn.go.id', 'default.jpg', 'dewi_ns', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359702, NULL),
	(155, 'Dhandy Arisaktiwardhana', 'dhandy@bsn.go.id', 'default.jpg', 'dhandy', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(156, 'Dharma Wanita Persatuan BSN', 'dharmawanitapersatuan@bsn.go.id', 'default.jpg', 'dharmawanitapersatuan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(157, 'Dheni Yetiningsih', 'dheniyeti@bsn.go.id', 'default.jpg', 'dheniyeti', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603368333, NULL),
	(158, 'Dhias Tanaya', 'dhias@bsn.go.id', 'default.jpg', 'dhias', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366671, NULL),
	(159, 'Dhika Dwi Anggrain', 'dhikadwia@bsn.go.id', 'default.jpg', 'dhikadwia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364235, NULL),
	(160, 'Diah Aristya Hesti', 'diaharistya@bsn.go.id', 'default.jpg', 'diaharistya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(161, 'Dian Asriani', 'dian.asriani@bsn.go.id', 'default.jpg', 'dian.asriani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360446, NULL),
	(162, 'Dian Silviani', 'dian_silviani@bsn.go.id', 'default.jpg', 'dian_silviani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361425, NULL),
	(163, 'Diandra Nessia Alisty', 'diandranessia@bsn.go.id', 'default.jpg', 'diandranessia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603373694, NULL),
	(164, 'dianita adiwirjono', 'dianita@bsn.go.id', 'default.jpg', 'dianita', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359916, NULL),
	(165, 'Dian Kemala Tenri Asih', 'diankemala@bsn.go.id', 'default.jpg', 'diankemala', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603371357, NULL),
	(166, 'R. Dicky Virgansyah', 'dicky_virgansyah@bsn.go.id', 'default.jpg', 'dicky_virgansyah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(167, 'Didit Yuan Permadi', 'didit@bsn.go.id', 'default.jpg', 'didit', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(168, 'Diina Qiyaman M', 'diina@bsn.go.id', 'default.jpg', 'diina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(171, 'Dina Nur Febriani', 'dina.nf@bsn.go.id', 'default.jpg', 'dina.nf', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361337, NULL),
	(172, 'Dinar Nurcahyo', 'dinar@bsn.go.id', 'default.jpg', 'dinar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360924, NULL),
	(173, 'Dini Suryani', 'dini@bsn.go.id', 'default.jpg', 'dini', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361620, NULL),
	(174, 'Dini Karunia Sari', 'dinikaruniasari@bsn.go.id', 'default.jpg', 'dinikaruniasari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366306, NULL),
	(175, 'Dirga Sugama', 'dirga@bsn.go.id', 'default.jpg', 'dirga', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361587, NULL),
	(176, 'Ditha Aziezah Setiyono', 'ditha@bsn.go.id', 'default.jpg', 'ditha', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(177, 'Diyan Nurisnawati', 'diyanisna@bsn.go.id', 'default.jpg', 'diyanisna', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360420, NULL),
	(178, 'Dwi Larassati', 'dlarasati@bsn.go.id', 'default.jpg', 'dlarasati', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361310, NULL),
	(179, 'Dodi Rusjadi', 'dodi@bsn.go.id', 'default.jpg', 'dodi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(180, 'Dohana', 'dohana.viskhurin@bsn.go.id', 'default.jpg', 'dohana.viskhurin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361809, NULL),
	(181, 'Donny Purnomo Januardhi Effyandono', 'donny@bsn.go.id', 'default.jpg', 'donny', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365028, NULL),
	(182, 'Biatna Dulbert Tampubolon', 'dulbert@bsn.go.id', 'default.jpg', 'dulbert', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365218, NULL),
	(183, 'Dusep', 'dusep@bsn.go.id', 'default.jpg', 'dusep', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360887, NULL),
	(184, 'Dwi Sistha Rahayuningsih', 'dwi_sistha@bsn.go.id', 'default.jpg', 'dwi_sistha', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(185, 'Dwi Kurniasari', 'dwikurnia@bsn.go.id', 'default.jpg', 'dwikurnia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365627, NULL),
	(186, 'Dwitiya Bayu Pratama', 'dwitiya.bayu@bsn.go.id', 'default.jpg', 'dwitiya.bayu', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362323, NULL),
	(187, 'Dwitya Rupakumara', 'dwitya@bsn.go.id', 'default.jpg', 'dwitya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361696, NULL),
	(188, 'Dyah Mahastuti Retno Widarti', 'dyah.retno@bsn.go.id', 'default.jpg', 'dyah.retno', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369233, NULL),
	(189, 'Dyah Styarini', 'dyah.stya@bsn.go.id', 'default.jpg', 'dyah.stya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362488, NULL),
	(190, 'Edi Humaedi', 'edi@bsn.go.id', 'default.jpg', 'edi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365344, NULL),
	(191, 'Edithia Ruth', 'edithia@bsn.go.id', 'default.jpg', 'edithia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362053, NULL),
	(192, 'Effendi', 'efendi@bsn.go.id', 'default.jpg', 'efendi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366865, NULL),
	(193, 'Adindra Vickar Ega', 'ega@bsn.go.id', 'default.jpg', 'ega', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(194, 'Eko Prihatono', 'eko.prihartono@bsn.go.id', 'default.jpg', 'eko.prihartono', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367686, NULL),
	(195, 'Ellia Kristiningrum', 'ellia@bsn.go.id', 'default.jpg', 'ellia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360067, NULL),
	(196, 'Ely Pertamiyanti', 'elyp@bsn.go.id', 'default.jpg', 'elyp', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363057, NULL),
	(197, 'Tantri Emelia', 'emelia@bsn.go.id', 'default.jpg', 'emelia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359686, NULL),
	(198, 'Emil Saprudin', 'emil@bsn.go.id', 'default.jpg', 'emil', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(199, 'Endah Primaningsih', 'endah@bsn.go.id', 'default.jpg', 'endah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(200, 'Endang Nurbiyanti', 'endang@bsn.go.id', 'default.jpg', 'endang', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(201, 'Endi Hari Purwanto', 'endi@bsn.go.id', 'default.jpg', 'endi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(202, 'Erni Retno Kusmiati', 'eni@bsn.go.id', 'default.jpg', 'eni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603371348, NULL),
	(203, 'erin', 'erin@bsn.go.id', 'default.jpg', 'erin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(204, 'Erlyta Intan Perwitasari', 'erlyta.perwitasari@bsn.go.id', 'default.jpg', 'erlyta.perwitasari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360288, NULL),
	(205, 'Erni Sumarni', 'erni@bsn.go.id', 'default.jpg', 'erni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(206, 'Esa Winasih', 'esa.sh@bsn.go.id', 'default.jpg', 'esa.sh', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360085, NULL),
	(207, 'Esti Premati', 'esti@bsn.go.id', 'default.jpg', 'esti', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363314, NULL),
	(208, 'Estiyani Indraningsih', 'estiyani.indrani@bsn.go.id', 'default.jpg', 'estiyani.indrani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362008, NULL),
	(210, 'Evan Buwana', 'evan.buwana@bsn.go.id', 'default.jpg', 'evan.buwana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363056, NULL),
	(211, 'R. Ewang Kurniawan', 'ewang@bsn.go.id', 'default.jpg', 'ewang', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366202, NULL),
	(212, 'Nursidik Fadillah', 'fadil@bsn.go.id', 'default.jpg', 'fadil', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(213, 'Fadly Irmansyah', 'fadly.irmansyah@bsn.go.id', 'default.jpg', 'fadly.irmansyah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363743, NULL),
	(214, 'Fadly Amri', 'fadly@bsn.go.id', 'default.jpg', 'fadly', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360079, NULL),
	(215, 'Fahmy Munawar Cholil', 'fahmymc@bsn.go.id', 'default.jpg', 'fahmymc', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(216, 'Agah Faisal', 'faisal@bsn.go.id', 'default.jpg', 'faisal', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363568, NULL),
	(217, 'Faisal Yunus', 'faisalyunus@bsn.go.id', 'default.jpg', 'faisalyunus', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363269, NULL),
	(218, 'Fajar Budi Utomo', 'fajar@bsn.go.id', 'default.jpg', 'fajar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362441, NULL),
	(219, 'Fajar Zulfikar', 'fajarz@bsn.go.id', 'default.jpg', 'fajarz', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367544, NULL),
	(220, 'Fandi Yogiswara', 'fandi.y@bsn.go.id', 'default.jpg', 'fandi.y', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(221, 'Fanfan Budi Mulya', 'fanfan@bsn.go.id', 'default.jpg', 'fanfan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(222, 'Fansuri', 'fansuri@bsn.go.id', 'default.jpg', 'fansuri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364890, NULL),
	(223, 'Farah Ramadhiani', 'farah.ramadhiani@bsn.go.id', 'default.jpg', 'farah.ramadhiani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367190, NULL),
	(224, 'Farida Pari', 'farida@bsn.go.id', 'default.jpg', 'farida', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363640, NULL),
	(225, 'Ahmad Faris Abrori', 'farisabrori@bsn.go.id', 'default.jpg', 'farisabrori', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365567, NULL),
	(226, 'Farisah Primarani Siswi', 'farisahprimarani@bsn.go.id', 'default.jpg', 'farisahprimarani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360154, NULL),
	(228, 'Fauzi Ahmad', 'fauzi@bsn.go.id', 'default.jpg', 'fauzi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364579, NULL),
	(229, 'Febi Amanda', 'febiamanda@bsn.go.id', 'default.jpg', 'febiamanda', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(230, 'Febri Andriawan', 'febri.andriawan@bsn.go.id', 'default.jpg', 'febri.andriawan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364231, NULL),
	(231, 'Febrian Isharyadi', 'febrian@bsn.go.id', 'default.jpg', 'febrian', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360219, NULL),
	(232, 'Feby Riyani Wirda', 'feby.riyani@bsn.go.id', 'default.jpg', 'feby.riyani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(233, 'Feizar Mahendra', 'feizar.mahendra@bsn.go.id', 'default.jpg', 'feizar.mahendra', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365182, NULL),
	(234, 'Ferry Christianus', 'ferrych@bsn.go.id', 'default.jpg', 'ferrych', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603373461, NULL),
	(235, 'Fery Kurniawan', 'fery85@bsn.go.id', 'default.jpg', 'fery85', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359600, NULL),
	(236, 'Fetika Pratiwi', 'fetikapratiwi@bsn.go.id', 'default.jpg', 'fetikapratiwi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(237, 'Fidryaningsih Fiona', 'fidryfiona@bsn.go.id', 'default.jpg', 'fidryfiona', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364171, NULL),
	(238, 'Fika Permata Sari', 'fika.permatasari@bsn.go.id', 'default.jpg', 'fika.permatasari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361362, NULL),
	(239, 'Nurhana Rafika Sari', 'fika@bsn.go.id', 'default.jpg', 'fika', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(240, 'Firmansyah', 'firmansyah@bsn.go.id', 'default.jpg', 'firmansyah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(241, 'Fitor Imanul Huda', 'fitor@bsn.go.id', 'default.jpg', 'fitor', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360782, NULL),
	(242, 'Fitria Rachmawati Dewi', 'fitria.dewi@bsn.go.id', 'default.jpg', 'fitria.dewi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364838, NULL),
	(243, 'Fitricia Yunianti', 'fitricia@bsn.go.id', 'default.jpg', 'fitricia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360436, NULL),
	(244, 'Fitriana Khoirunnisa', 'fkhoirunnisa@bsn.go.id', 'default.jpg', 'fkhoirunnisa', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361516, NULL),
	(246, 'Fransiska Sri Rahayu', 'fransiska@bsn.go.id', 'default.jpg', 'fransiska', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(247, 'Andri Gandhi', 'gandhi@bsn.go.id', 'default.jpg', 'gandhi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(248, 'Gansoe', 'gansoe@bsn.go.id', 'default.jpg', 'gansoe', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(249, 'Gema Dwireka Hakim', 'gema@bsn.go.id', 'default.jpg', 'gema', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(250, 'Lenggo Geni Aulia', 'geni@bsn.go.id', 'default.jpg', 'geni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369331, NULL),
	(251, 'Ghufron Zaid', 'ghufron@bsn.go.id', 'default.jpg', 'ghufron', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361043, NULL),
	(252, 'Gigin Ginanjar', 'gigin@bsn.go.id', 'default.jpg', 'gigin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(253, 'Brillyana Githanadi', 'githanadi@bsn.go.id', 'default.jpg', 'githanadi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364247, NULL),
	(254, 'Rani Gustia', 'gustia.rani@bsn.go.id', 'default.jpg', 'gustia.rani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(255, 'Heri Sutanto', 'h.sutanto@bsn.go.id', 'default.jpg', 'h.sutanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(256, 'Habib Nurhasan', 'habib@bsn.go.id', 'default.jpg', 'habib', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361354, NULL),
	(257, 'R. Hadi Sardjono', 'hadisarjono@bsn.go.id', 'default.jpg', 'hadisarjono', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603370989, NULL),
	(258, 'Muhammad Haekal Habibie', 'haekal@bsn.go.id', 'default.jpg', 'haekal', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360302, NULL),
	(259, 'Hafid', 'hafid@bsn.go.id', 'default.jpg', 'hafid', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360065, NULL),
	(260, 'Hanif Nurcholis', 'hanif@bsn.go.id', 'default.jpg', 'hanif', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366158, NULL),
	(261, 'Sony Muchlison H', 'hanifudin@bsn.go.id', 'default.jpg', 'hanifudin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364585, NULL),
	(262, 'Hanna Sutsuga Purbasari', 'hanna.sutsuga@bsn.go.id', 'default.jpg', 'hanna.sutsuga', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367920, NULL),
	(263, 'Hanum Nayomi', 'hanum@bsn.go.id', 'default.jpg', 'hanum', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363179, NULL),
	(264, 'Apriani Hapsari', 'hapsari@bsn.go.id', 'default.jpg', 'hapsari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(265, 'Hara Isidoro Simarmata', 'hara@bsn.go.id', 'default.jpg', 'hara', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364038, NULL),
	(266, 'Hardiles', 'hardiles@bsn.go.id', 'default.jpg', 'hardiles', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359704, NULL),
	(267, 'Harry Budiman', 'harry@bsn.go.id', 'default.jpg', 'harry', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(268, 'Harsono', 'harsono@bsn.go.id', 'default.jpg', 'harsono', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(269, 'Haryanto', 'haryanto@bsn.go.id', 'default.jpg', 'haryanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360626, NULL),
	(270, 'Hasni Rahayu Nurhidayah', 'hasnirahayu@bsn.go.id', 'default.jpg', 'hasnirahayu', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361478, NULL),
	(271, 'Hastori', 'hastori@bsn.go.id', 'default.jpg', 'hastori', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(272, 'Ahmad Hawari Assufi', 'hawari.assufi@bsn.go.id', 'default.jpg', 'hawari.assufi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366299, NULL),
	(273, 'Hayati Amalia', 'hayati@bsn.go.id', 'default.jpg', 'hayati', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360599, NULL),
	(274, 'Hendro Kusumo', 'hendro@bsn.go.id', 'default.jpg', 'hendro', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365374, NULL),
	(275, 'Henry Adipratama', 'henry.adipratama@bsn.go.id', 'default.jpg', 'henry.adipratama', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363272, NULL),
	(276, 'Heri Kurniawan', 'heri.kurniawan@bsn.go.id', 'default.jpg', 'heri.kurniawan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364052, NULL),
	(277, 'Herlin Rosdiana', 'herlin@bsn.go.id', 'default.jpg', 'herlin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360459, NULL),
	(278, 'Hermawan Febriansyah', 'hermawan.febriansyah@bsn.go.id', 'default.jpg', 'hermawan.febriansyah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(279, 'Heru Suseno', 'heru@bsn.go.id', 'default.jpg', 'heru', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359922, NULL),
	(280, 'Dwi Hery Susanto Saputro', 'hery@bsn.go.id', 'default.jpg', 'hery', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361194, NULL),
	(281, 'Nur Hidayati', 'hidayati@bsn.go.id', 'default.jpg', 'hidayati', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367928, NULL),
	(282, 'Ir. Hidayat Wiriadinata', 'hidayatwr@bsn.go.id', 'default.jpg', 'hidayatwr', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367047, NULL),
	(284, 'Muhammad Husein Alfaritsi', 'husein@bsn.go.id', 'default.jpg', 'husein', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360611, NULL),
	(285, 'Ifa Luthfiana', 'ifa.luthfiana@bsn.go.id', 'default.jpg', 'ifa.luthfiana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(286, 'Ifan Cahyadi', 'ifan@bsn.go.id', 'default.jpg', 'ifan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367134, NULL),
	(287, 'Iip Ahmad Rifai', 'iip@bsn.go.id', 'default.jpg', 'iip', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(288, 'ika damayanti', 'ika.damayanti@bsn.go.id', 'default.jpg', 'ika.damayanti', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(289, 'Ika Dewi Agustin', 'ika.dewi@bsn.go.id', 'default.jpg', 'ika.dewi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(290, 'Ika Partiwi', 'ika.partiwi@bsn.go.id', 'default.jpg', 'ika.partiwi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369203, NULL),
	(291, 'Ika Rahayu', 'ika_r@bsn.go.id', 'default.jpg', 'ika_r', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360987, NULL),
	(292, 'Ika Yulianti', 'ika_y@bsn.go.id', 'default.jpg', 'ika_y', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367356, NULL),
	(293, 'Ike Permata Sari', 'ike@bsn.go.id', 'default.jpg', 'ike', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(294, 'Imam Sabari', 'imam.sabari@bsn.go.id', 'default.jpg', 'imam.sabari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(295, 'Immanullah', 'immanullah@bsn.go.id', 'default.jpg', 'immanullah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(296, 'Imun Saimun', 'imun@bsn.go.id', 'default.jpg', 'imun', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359994, NULL),
	(297, 'Ina Yulianingtiyas Budi', 'ina@bsn.go.id', 'default.jpg', 'ina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364247, NULL),
	(298, 'Indah Mugi Lestari', 'indah.mugilestari@bsn.go.id', 'default.jpg', 'indah.mugilestari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362137, NULL),
	(299, 'Indar Setyorini Tri Cahyanti', 'indar@bsn.go.id', 'default.jpg', 'indar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362790, NULL),
	(300, 'Indra Hikmawan', 'indra.hikmawan@bsn.go.id', 'default.jpg', 'indra.hikmawan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369356, NULL),
	(301, 'Indra Satria Wibowo', 'indra.satria.w@bsn.go.id', 'default.jpg', 'indra.satria.w', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366650, NULL),
	(302, 'Indra Bayu Suseno', 'indra.suseno@bsn.go.id', 'default.jpg', 'indra.suseno', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369304, NULL),
	(303, 'Inika Rudiyana', 'inika@bsn.go.id', 'default.jpg', 'inika', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359469, NULL),
	(304, 'Intan Fitalia', 'intan.fitalia@bsn.go.id', 'default.jpg', 'intan.fitalia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361510, NULL),
	(305, 'Elvi Syafitri', 'ipit@bsn.go.id', 'default.jpg', 'ipit', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(306, 'Muhammad Irfan', 'irfan@bsn.go.id', 'default.jpg', 'irfan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(307, 'Irma Astriyati', 'irma.astriyati@bsn.go.id', 'default.jpg', 'irma.astriyati', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365823, NULL),
	(308, 'Irma Permata Sari', 'irpermata@bsn.go.id', 'default.jpg', 'irpermata', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365884, NULL),
	(309, 'Irya Triangga Ditya', 'irya_triangga@bsn.go.id', 'default.jpg', 'irya_triangga', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361725, NULL),
	(310, 'Iryana Margahayu', 'iryana@bsn.go.id', 'default.jpg', 'iryana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(311, 'Iskandar Fauzi', 'iskandar@bsn.go.id', 'default.jpg', 'iskandar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359733, NULL),
	(312, 'Isna Komalasari', 'isna@bsn.go.id', 'default.jpg', 'isna', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(313, 'Istiqomah', 'istiqomah@bsn.go.id', 'default.jpg', 'istiqomah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359777, NULL),
	(314, 'Ita Rosita', 'ita@bsn.go.id', 'default.jpg', 'ita', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(315, 'I Firda Zahnia', 'izahzahnia@bsn.go.id', 'default.jpg', 'izahzahnia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(316, 'Joko Ismoyo', 'jismoyo@bsn.go.id', 'default.jpg', 'jismoyo', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(317, 'Juanda Reputra', 'juanda@bsn.go.id', 'default.jpg', 'juanda', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363509, NULL),
	(318, 'Nofi Juariah', 'juju@bsn.go.id', 'default.jpg', 'juju', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(319, 'Juliantino', 'juliantino@bsn.go.id', 'default.jpg', 'juliantino', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(320, 'Juli Hadiyanto', 'julihadiyanto@bsn.go.id', 'default.jpg', 'julihadiyanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359996, NULL),
	(321, 'Mohamad Kadhafi', 'kadhafi@bsn.go.id', 'default.jpg', 'kadhafi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(323, 'Kamila Martsa', 'kamila@bsn.go.id', 'default.jpg', 'kamila', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(324, 'Kamsori', 'kamsori@bsn.go.id', 'default.jpg', 'kamsori', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603368785, NULL),
	(325, 'Karina Dyasti Hari', 'karina_dh@bsn.go.id', 'default.jpg', 'karina_dh', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360240, NULL),
	(328, 'Ketty Mustika Prasetianty', 'ketty.prasetianty@bsn.go.id', 'default.jpg', 'ketty.prasetianty', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(329, 'Kiki Ropiki', 'kiki@bsn.go.id', 'default.jpg', 'kiki', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365815, NULL),
	(330, 'M. Rizky Mulyana', 'kiky@bsn.go.id', 'default.jpg', 'kiky', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364504, NULL),
	(331, 'Konny Sagala', 'konny@bsn.go.id', 'default.jpg', 'konny', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362793, NULL),
	(333, 'Kristanto', 'kris.tanto@bsn.go.id', 'default.jpg', 'kris.tanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360106, NULL),
	(334, 'Y. Kristianto Widiwardono', 'kris@bsn.go.id', 'default.jpg', 'kris', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(335, 'Krisma Yessi Sianturi', 'krismayessi@bsn.go.id', 'default.jpg', 'krismayessi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363766, NULL),
	(336, 'Krisnandana Dhaneswara', 'krisnandana.dhanes@bsn.go.id', 'default.jpg', 'krisnandana.dhanes', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361693, NULL),
	(337, 'Kukuh Prawita Satriaji', 'kukuh.satriaji@bsn.go.id', 'default.jpg', 'kukuh.satriaji', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362145, NULL),
	(338, 'Kukuh S. Achmad', 'kukuh@bsn.go.id', 'default.jpg', 'kukuh', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(339, 'Kukuh Budi Harto', 'kukuh_b@bsn.go.id', 'default.jpg', 'kukuh_b', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361781, NULL),
	(340, 'Mochamad Kurniawan', 'kurniawan@bsn.go.id', 'default.jpg', 'kurniawan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363236, NULL),
	(341, 'Kusman Haryono', 'kusman@bsn.go.id', 'default.jpg', 'kusman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363313, NULL),
	(342, 'Purnama Laurentina', 'lauren.tina@bsn.go.id', 'default.jpg', 'lauren.tina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361471, NULL),
	(343, 'Lena Anggraini', 'lena@bsn.go.id', 'default.jpg', 'lena', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361785, NULL),
	(344, 'Jelianita', 'lia@bsn.go.id', 'default.jpg', 'lia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(345, 'Lilis Handayani', 'lilis.handayani@bsn.go.id', 'default.jpg', 'lilis.handayani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369540, NULL),
	(346, 'Lina Kusmiati', 'lina@bsn.go.id', 'default.jpg', 'lina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(347, 'Lintang Harwina Madyaratry', 'lintangharwina@bsn.go.id', 'default.jpg', 'lintangharwina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362052, NULL),
	(348, 'Lisa Rosiana', 'lisa.rosiana@bsn.go.id', 'default.jpg', 'lisa.rosiana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(350, 'Liswanto', 'liswanto@bsn.go.id', 'default.jpg', 'liswanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603368963, NULL),
	(352, 'Lora Septriani', 'loraseptriani@bsn.go.id', 'default.jpg', 'loraseptriani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363814, NULL),
	(353, 'Lucky Feminine', 'lucky_feminine@bsn.go.id', 'default.jpg', 'lucky_feminine', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362878, NULL),
	(354, 'Reza Lukiawan', 'lukiawan@bsn.go.id', 'default.jpg', 'lukiawan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360144, NULL),
	(355, 'Lukluk Khairiyati', 'lukluk@bsn.go.id', 'default.jpg', 'lukluk', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361196, NULL),
	(356, 'Lusy Imelda Siagian', 'lusy.imelda@bsn.go.id', 'default.jpg', 'lusy.imelda', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361659, NULL),
	(357, 'Lyonni Ayu Evelhin', 'lyonniayuevelhin@bsn.go.id', 'default.jpg', 'lyonniayuevelhin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(358, 'Mahya Ashari', 'm.ashari@bsn.go.id', 'default.jpg', 'm.ashari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361319, NULL),
	(359, 'Muhammad Bahrudin', 'm.bahrudin@bsn.go.id', 'default.jpg', 'm.bahrudin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362106, NULL),
	(360, 'Mukhammad Sigit Kurniawan', 'm.sigitkurniawan@bsn.go.id', 'default.jpg', 'm.sigitkurniawan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603373858, NULL),
	(361, 'Muhamad Yusuf', 'm.yusuf@bsn.go.id', 'default.jpg', 'm.yusuf', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359876, NULL),
	(362, 'Mahardhika Akhmad Nusantara', 'mahar_dhika@bsn.go.id', 'default.jpg', 'mahar_dhika', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360929, NULL),
	(363, 'Maharani Ratna Palupi', 'maharani@bsn.go.id', 'default.jpg', 'maharani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360322, NULL),
	(364, 'Nindya Malvins Trimadya', 'malvins@bsn.go.id', 'default.jpg', 'malvins', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359670, NULL),
	(365, 'Slamet Aji Pamungkas', 'mamung@bsn.go.id', 'default.jpg', 'mamung', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361154, NULL),
	(366, 'Mangasa Ritonga', 'mangasa@bsn.go.id', 'default.jpg', 'mangasa', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(367, 'Eka Mardika Handayani', 'mardika@bsn.go.id', 'default.jpg', 'mardika', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(368, 'Margaretha Mawaty Dewi', 'margaretha_md@bsn.go.id', 'default.jpg', 'margaretha_md', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(369, 'Lina Marlinah', 'marlina@bsn.go.id', 'default.jpg', 'marlina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363186, NULL),
	(370, 'Marpudin', 'marpudin@bsn.go.id', 'default.jpg', 'marpudin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(371, 'Marta Romaisi Damanik', 'marta@bsn.go.id', 'default.jpg', 'marta', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364174, NULL),
	(372, 'Martiman', 'martiman@bsn.go.id', 'default.jpg', 'martiman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367340, NULL),
	(373, 'Martin Tunas Rianto', 'martin@bsn.go.id', 'default.jpg', 'martin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(375, 'Maya Kusuma Wardani', 'maya.kusuma@bsn.go.id', 'default.jpg', 'maya.kusuma', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360276, NULL),
	(376, 'Mayang Sri Wulan', 'mayang@bsn.go.id', 'default.jpg', 'mayang', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367237, NULL),
	(377, 'Mayastria Yektiningtyas', 'mayastria@bsn.go.id', 'default.jpg', 'mayastria', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(378, 'Mega Ayu Pithaloka', 'mega@bsn.go.id', 'default.jpg', 'mega', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359662, NULL),
	(379, 'Meilinda Ayundyahrini', 'meilinda.ayundyahrini@bsn.go.id', 'default.jpg', 'meilinda.ayundyahrini', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(380, 'Meira Rini', 'meira_rini@bsn.go.id', 'default.jpg', 'meira_rini', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364241, NULL),
	(381, 'Meitiandari Mutiara', 'meitiandari@bsn.go.id', 'default.jpg', 'meitiandari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366402, NULL),
	(382, 'Melati Azizka Fajria', 'melati@bsn.go.id', 'default.jpg', 'melati', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361610, NULL),
	(383, 'Meri Hastiandari', 'meri.hastiandari@bsn.go.id', 'default.jpg', 'meri.hastiandari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359609, NULL),
	(384, 'Metik Bekti Sulistiorini', 'metikromo@bsn.go.id', 'default.jpg', 'metikromo', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361244, NULL),
	(385, 'Miftahul Munir', 'miftah@bsn.go.id', 'default.jpg', 'miftah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364233, NULL),
	(386, 'Milla Septiana Wiyantin', 'milla@bsn.go.id', 'default.jpg', 'milla', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360607, NULL),
	(387, 'Mima Aulia', 'mima@bsn.go.id', 'default.jpg', 'mima', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361429, NULL),
	(388, 'Minanuddin', 'minanuddin@bsn.go.id', 'default.jpg', 'minanuddin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(389, 'Miradini', 'miradini@bsn.go.id', 'default.jpg', 'miradini', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359804, NULL),
	(390, 'Helmi Zaini', 'mizain@bsn.go.id', 'default.jpg', 'mizain', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362587, NULL),
	(391, 'Mohammad Fahmi Aminuddin', 'moh.fahmia@bsn.go.id', 'default.jpg', 'moh.fahmia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360079, NULL),
	(392, 'Muhammad Rifki', 'mrifki@bsn.go.id', 'default.jpg', 'mrifki', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(393, 'Bagus Muhammad Irvan', 'muhammad.bagus@bsn.go.id', 'default.jpg', 'muhammad.bagus', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360100, NULL),
	(394, 'Muhammad Syukri', 'muhammad.syukri@bsn.go.id', 'default.jpg', 'muhammad.syukri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603372282, NULL),
	(395, 'Mulad Aribowo', 'mulad@bsn.go.id', 'default.jpg', 'mulad', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366579, NULL),
	(396, 'Murip', 'murip@bsn.go.id', 'default.jpg', 'murip', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(397, 'Murni Aryani', 'murni@bsn.go.id', 'default.jpg', 'murni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369742, NULL),
	(398, 'Muti Sophira Hilman', 'muti@bsn.go.id', 'default.jpg', 'muti', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603373012, NULL),
	(399, 'Maya Marisa', 'my.marisa@bsn.go.id', 'default.jpg', 'my.marisa', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367371, NULL),
	(400, 'Susiyana', 'nana@bsn.go.id', 'default.jpg', 'nana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(401, 'Nandang Mulya, A.Md', 'nandangm@bsn.go.id', 'default.jpg', 'nandangm', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(402, 'Nandaroose Rucky Prasetyaning Galih', 'nandaroose@bsn.go.id', 'default.jpg', 'nandaroose', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(403, 'Nandita Harmina', 'nandita.hrmn@bsn.go.id', 'default.jpg', 'nandita.hrmn', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359735, NULL),
	(404, 'Nasir, A.Md', 'nasir@bsn.go.id', 'default.jpg', 'nasir', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(405, 'Ir. Nasrudin Irawan, M.Env.Stud', 'nasrudin@bsn.go.id', 'default.jpg', 'nasrudin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367275, NULL),
	(406, 'Nayong', 'nayong@bsn.go.id', 'default.jpg', 'nayong', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366654, NULL),
	(407, 'Nazarudin', 'nazarudin@bsn.go.id', 'default.jpg', 'nazarudin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359937, NULL),
	(408, 'Nazirwan', 'nazirwan@bsn.go.id', 'default.jpg', 'nazirwan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(409, 'Nur Tjahyo Eka Darmayanti', 'nc_eka@bsn.go.id', 'default.jpg', 'nc_eka', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359877, NULL),
	(410, 'Nelfyenny', 'nelfy@bsn.go.id', 'default.jpg', 'nelfy', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361282, NULL),
	(411, 'Neneng Soidah', 'neneng@bsn.go.id', 'default.jpg', 'neneng', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(412, 'Neni Widyana', 'neni@bsn.go.id', 'default.jpg', 'neni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360659, NULL),
	(413, 'Nibras Fitrah Yayienda', 'nibras@bsn.go.id', 'default.jpg', 'nibras', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(414, 'Nihayati', 'niha@bsn.go.id', 'default.jpg', 'niha', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362296, NULL),
	(415, 'Nila Yantrisiana Puspitasari', 'nila.yantrisiana@bsn.go.id', 'default.jpg', 'nila.yantrisiana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603358854, NULL),
	(416, 'Dian Anindya Murti', 'ninda@bsn.go.id', 'default.jpg', 'ninda', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(417, 'Nindya Nofira Ningtyas', 'nindyanofira@bsn.go.id', 'default.jpg', 'nindyanofira', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360540, NULL),
	(418, 'Erniningsih', 'ning@bsn.go.id', 'default.jpg', 'ning', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(419, 'Suningsih, SE', 'nining@bsn.go.id', 'default.jpg', 'nining', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360205, NULL),
	(420, 'Ninuk Ragil Prasasti', 'ninuk@bsn.go.id', 'default.jpg', 'ninuk', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362597, NULL),
	(421, 'Nono Sudarsono', 'nono@bsn.go.id', 'default.jpg', 'nono', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(422, 'Noviati Listiyasningsih', 'novi@bsn.go.id', 'default.jpg', 'novi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363171, NULL),
	(423, 'Noviana Bayu Alnavis', 'noviana@bsn.go.id', 'default.jpg', 'noviana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(424, 'Novin Aliyah', 'novin@bsn.go.id', 'default.jpg', 'novin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361320, NULL),
	(425, 'Nuari Wahyu Dwi Cahyani', 'nuari.cahyani@bsn.go.id', 'default.jpg', 'nuari.cahyani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360940, NULL),
	(426, 'Nuela Dwi Putriani', 'nueladwi.putriani@bsn.go.id', 'default.jpg', 'nueladwi.putriani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360663, NULL),
	(427, 'Muhammad Nukman Wijaya', 'nukman@bsn.go.id', 'default.jpg', 'nukman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(428, 'Nur Astriani Sofiana', 'nur.astriana@bsn.go.id', 'default.jpg', 'nur.astriana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364841, NULL),
	(429, 'Nuraedih S.', 'nuraedi@bsn.go.id', 'default.jpg', 'nuraedi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(430, 'Nur Aeniatus Solekakh', 'nuraeniatus@bsn.go.id', 'default.jpg', 'nuraeniatus', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369778, NULL),
	(431, 'Nur Arti Permatasari', 'nurarti@bsn.go.id', 'default.jpg', 'nurarti', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(432, 'Nureka Yuliani', 'nureka.yuliani@bsn.go.id', 'default.jpg', 'nureka.yuliani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362441, NULL),
	(433, 'Nuri Wulansari', 'nuri.wulansari@bsn.go.id', 'default.jpg', 'nuri.wulansari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364471, NULL),
	(434, 'Nurlathifah', 'nurlathifah@bsn.go.id', 'default.jpg', 'nurlathifah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359718, NULL),
	(435, 'Nur Sabbaha', 'nursabbaha@bsn.go.id', 'default.jpg', 'nursabbaha', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(436, 'Nursatia', 'nursatia@bsn.go.id', 'default.jpg', 'nursatia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360379, NULL),
	(437, 'Nurul Alfiyati', 'nurul@bsn.go.id', 'default.jpg', 'nurul', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364939, NULL),
	(438, 'Nuryatini', 'nuryatini@bsn.go.id', 'default.jpg', 'nuryatini', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(439, 'I Nyoman Supriyatna', 'nyoman@bsn.go.id', 'default.jpg', 'nyoman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(440, 'Ocka Hedrony, ST', 'ocka@bsn.go.id', 'default.jpg', 'ocka', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360226, NULL),
	(441, 'Dewi Odjar', 'odjar@bsn.go.id', 'default.jpg', 'odjar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(442, 'Ohan Burhan', 'ohan@bsn.go.id', 'default.jpg', 'ohan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(443, 'Okasatria Novyanto', 'okasatria@bsn.go.id', 'default.jpg', 'okasatria', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359871, NULL),
	(444, 'Olivia Sary', 'olivia@bsn.go.id', 'default.jpg', 'olivia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(445, 'Dr. Oman Zuas', 'oman@bsn.go.id', 'default.jpg', 'oman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361499, NULL),
	(446, 'One Agus Sukarno', 'one@bsn.go.id', 'default.jpg', 'one', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362264, NULL),
	(447, 'Orieza Febriandhani', 'oriezafebri@bsn.go.id', 'default.jpg', 'oriezafebri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360340, NULL),
	(448, 'Panitia CPNS BSN', 'panitia_cpnsbsn@bsn.go.id', 'default.jpg', 'panitia_cpnsbsn', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(449, 'Panji Ashari', 'panjiashari@bsn.go.id', 'default.jpg', 'panjiashari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367993, NULL),
	(451, 'Patria Rahayu', 'patria@bsn.go.id', 'default.jpg', 'patria', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360849, NULL),
	(452, 'Paulus Rian Gautama', 'paulus@bsn.go.id', 'default.jpg', 'paulus', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360522, NULL),
	(453, 'Ponimin', 'ponimin@bsn.go.id', 'default.jpg', 'ponimin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360916, NULL),
	(454, 'Agustinus Praba Drijarkara', 'praba@bsn.go.id', 'default.jpg', 'praba', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361021, NULL),
	(455, 'Prasetyo Nugroho', 'prasetyo.nugroho@bsn.go.id', 'default.jpg', 'prasetyo.nugroho', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603358848, NULL),
	(457, 'Puji Winarni', 'puji.winarni@bsn.go.id', 'default.jpg', 'puji.winarni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(458, 'Puri Wulandari Rahayu', 'puri.rahayu@bsn.go.id', 'default.jpg', 'puri.rahayu', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365606, NULL),
	(459, 'dian purnamasari', 'purnamasaridian@bsn.go.id', 'default.jpg', 'purnamasaridian', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603358800, NULL),
	(460, 'Purwanto Hadi Saputro', 'purwanto@bsn.go.id', 'default.jpg', 'purwanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360283, NULL),
	(461, ' Puspaning Utami', 'puspa@bsn.go.id', 'default.jpg', 'puspa', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365581, NULL),
	(462, 'Putri Irvanna', 'putri.irvanna@bsn.go.id', 'default.jpg', 'putri.irvanna', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(463, 'Putty Anggraeni', 'putty.anggraeni@bsn.go.id', 'default.jpg', 'putty.anggraeni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(465, 'A. Rachman Mustar', 'rachman@bsn.go.id', 'default.jpg', 'rachman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(466, 'Rachman Soleh, ST', 'rachmans@bsn.go.id', 'default.jpg', 'rachmans', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(467, 'Ramita Utami', 'ramita@bsn.go.id', 'default.jpg', 'ramita', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603358843, NULL),
	(468, 'Ranti Wening Ingtyas', 'ranti@bsn.go.id', 'default.jpg', 'ranti', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365010, NULL),
	(469, 'Rasta Winata', 'rasta@bsn.go.id', 'default.jpg', 'rasta', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(470, 'Ratih Paramithasari', 'ratih@bsn.go.id', 'default.jpg', 'ratih', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360263, NULL),
	(471, 'Ratih Aulia Tiara', 'ratihaulia@bsn.go.id', 'default.jpg', 'ratihaulia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363019, NULL),
	(472, 'Ratna Rahayu', 'ratna@bsn.go.id', 'default.jpg', 'ratna', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(473, 'Ratnaningsih, ST', 'ratnaningsih@bsn.go.id', 'default.jpg', 'ratnaningsih', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360517, NULL),
	(474, 'redaksi sni valuasi', 'redaksi.snivaluasi@bsn.go.id', 'default.jpg', 'redaksi.snivaluasi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(475, 'Refiano Andores', 'refiano.andores@bsn.go.id', 'default.jpg', 'refiano.andores', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360037, NULL),
	(476, 'Renanta Hayu Kresiani', 'renanta@bsn.go.id', 'default.jpg', 'renanta', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359870, NULL),
	(477, 'Rendika Singgih Kurniawan', 'rendika.sk@bsn.go.id', 'default.jpg', 'rendika.sk', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(478, 'Reni Selvianingati', 'reni@bsn.go.id', 'default.jpg', 'reni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367299, NULL),
	(479, 'R. Reni Siti Maryam', 'renimaryam@bsn.go.id', 'default.jpg', 'renimaryam', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367214, NULL),
	(480, 'Reski Putra', 'reskiputra@bsn.go.id', 'default.jpg', 'reskiputra', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(481, 'Restu Okkiarto Adisiswoyo', 'restu_ok@bsn.go.id', 'default.jpg', 'restu_ok', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(482, 'Reti Rosmalasari', 'reti@bsn.go.id', 'default.jpg', 'reti', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369063, NULL),
	(483, 'Reynard Valintino', 'reynard@bsn.go.id', 'default.jpg', 'reynard', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(484, 'Reza Aditya Saputra', 'reza.aditya@bsn.go.id', 'default.jpg', 'reza.aditya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362395, NULL),
	(485, 'Ria Dwi Jayati', 'riadwi@bsn.go.id', 'default.jpg', 'riadwi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359967, NULL),
	(486, 'Rian Rizky Perdana', 'rian@bsn.go.id', 'default.jpg', 'rian', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(487, 'Rois Ricaro', 'ricaro_propo@bsn.go.id', 'default.jpg', 'ricaro_propo', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364486, NULL),
	(488, 'Ridho Wibowo', 'ridhowibowo@bsn.go.id', 'default.jpg', 'ridhowibowo', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(489, 'Rika Dwi Susmiarn', 'rika_ds@bsn.go.id', 'default.jpg', 'rika_ds', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360342, NULL),
	(490, 'Rina Yuniarty', 'rina.arty@bsn.go.id', 'default.jpg', 'rina.arty', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359968, NULL),
	(491, 'Fajarina Budiantari', 'rina@bsn.go.id', 'default.jpg', 'rina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360546, NULL),
	(492, 'Rinawati Muauwana', 'rinawati_m@bsn.go.id', 'default.jpg', 'rinawati_m', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364074, NULL),
	(493, 'Rina Yasmina Lubis', 'rinayasminalubis@bsn.go.id', 'default.jpg', 'rinayasminalubis', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365586, NULL),
	(494, 'Rio Lumban Toruan', 'rio@bsn.go.id', 'default.jpg', 'rio', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360934, NULL),
	(495, 'Ririn Setiaasih', 'ririn@bsn.go.id', 'default.jpg', 'ririn', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361035, NULL),
	(496, 'Harisa Adhatia', 'risa@bsn.go.id', 'default.jpg', 'risa', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(497, 'Riska Rozida Bastomi', 'riska@bsn.go.id', 'default.jpg', 'riska', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361769, NULL),
	(498, 'Rita Ariyana', 'rita@bsn.go.id', 'default.jpg', 'rita', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(499, 'Titis Wahyu Riyanto', 'riyanto.titis@bsn.go.id', 'default.jpg', 'riyanto.titis', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367230, NULL),
	(500, 'Rizal', 'rizal@bsn.go.id', 'default.jpg', 'rizal', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(501, 'Rizki Irawati Septiani', 'rizkirawati@bsn.go.id', 'default.jpg', 'rizkirawati', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367473, NULL),
	(502, 'Rizky Indah Nurpratiwi', 'rizky.indah@bsn.go.id', 'default.jpg', 'rizky.indah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360571, NULL),
	(503, 'Rizky Mulya Akbar', 'rizky.mulya@bsn.go.id', 'default.jpg', 'rizky.mulya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365189, NULL),
	(504, 'Abd. Rojak, A.Md', 'rojak@bsn.go.id', 'default.jpg', 'rojak', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364039, NULL),
	(505, 'Romani', 'romani@bsn.go.id', 'default.jpg', 'romani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603368833, NULL),
	(506, 'Rommy Perdana Putra', 'rommy@bsn.go.id', 'default.jpg', 'rommy', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(507, 'Rosalia Surtiasih', 'rosalia@bsn.go.id', 'default.jpg', 'rosalia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363158, NULL),
	(508, 'Muhammad Rosyid Al-amin', 'rosyid.alamin@bsn.go.id', 'default.jpg', 'rosyid.alamin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369340, NULL),
	(509, 'R. Rudi Anggoro Samodro', 'rudi.samodro@bsn.go.id', 'default.jpg', 'rudi.samodro', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(510, 'Rudiansyah', 'rudiansyah@bsn.go.id', 'default.jpg', 'rudiansyah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363320, NULL),
	(511, 'Rulia Maulani Ruhiyat', 'rulia.maulani@bsn.go.id', 'default.jpg', 'rulia.maulani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361781, NULL),
	(512, 'Rully Tri Juliant Putra', 'rully_tjp@bsn.go.id', 'default.jpg', 'rully_tjp', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360226, NULL),
	(513, 'Sabrina Editha Putri', 'sabrina.putri@bsn.go.id', 'default.jpg', 'sabrina.putri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(514, 'Indra Saefudin', 'saefudin@bsn.go.id', 'default.jpg', 'saefudin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361488, NULL),
	(515, 'Sainun', 'sainun@bsn.go.id', 'default.jpg', 'sainun', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362458, NULL),
	(516, 'Sari Herawati', 'sari@bsn.go.id', 'default.jpg', 'sari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360280, NULL),
	(517, 'Sasiani Novia Ningrum', 'sasi@bsn.go.id', 'default.jpg', 'sasi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(518, 'Seno Ajisaka', 'seno_ajisaka@bsn.go.id', 'default.jpg', 'seno_ajisaka', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360793, NULL),
	(519, 'Sentya Wisenda', 'sentya@bsn.go.id', 'default.jpg', 'sentya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360568, NULL),
	(520, 'Sepritahara', 'sepritahara@bsn.go.id', 'default.jpg', 'sepritahara', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367060, NULL),
	(521, 'Septiana Isnaeni', 'septiana@bsn.go.id', 'default.jpg', 'septiana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360140, NULL),
	(522, 'Septiyan Maulana', 'septiyanmaulana@bsn.go.id', 'default.jpg', 'septiyanmaulana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603371428, NULL),
	(523, 'Eko Septriani', 'septriani@bsn.go.id', 'default.jpg', 'septriani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(524, 'Seto Kuncoro', 'setokuncoro@bsn.go.id', 'default.jpg', 'setokuncoro', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360084, NULL),
	(525, 'Anissa Tiana Sheilayanti Putri', 'sheila@bsn.go.id', 'default.jpg', 'sheila', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360506, NULL),
	(526, 'Sigit', 'sigit@bsn.go.id', 'default.jpg', 'sigit', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359905, NULL),
	(527, 'Sigit Suyanto', 'sigit_suyanto@bsn.go.id', 'default.jpg', 'sigit_suyanto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363096, NULL),
	(528, 'Singgih Harjanto', 'singgih@bsn.go.id', 'default.jpg', 'singgih', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361876, NULL),
	(532, 'Sistia Nur Fattah', 'sistia@bsn.go.id', 'default.jpg', 'sistia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(533, 'Siti Nurhayati', 'siti.nurhayati@bsn.go.id', 'default.jpg', 'siti.nurhayati', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(535, 'Andri Sobari', 'sobari@bsn.go.id', 'default.jpg', 'sobari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360391, NULL),
	(536, 'Sofyan Yusuf', 'sofyanyusuf@bsn.go.id', 'default.jpg', 'sofyanyusuf', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364266, NULL),
	(537, 'Sri Elsa Fatmi', 'sri.elsa@bsn.go.id', 'default.jpg', 'sri.elsa', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360394, NULL),
	(538, 'Sri Kumolowati', 'sri_k@bsn.go.id', 'default.jpg', 'sri_k', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(539, 'Sri Rahayu Safitri', 'sri_rs@bsn.go.id', 'default.jpg', 'sri_rs', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(540, 'Sri Sulastri', 'sri_s@bsn.go.id', 'default.jpg', 'sri_s', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603370840, NULL),
	(541, 'Sutarwanto', 'star@bsn.go.id', 'default.jpg', 'star', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(542, 'Stefanie Dwipuspita', 'stefaniedwi@bsn.go.id', 'default.jpg', 'stefaniedwi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603370162, NULL),
	(543, 'Stephani Laura', 'stephani.sianturi@bsn.go.id', 'default.jpg', 'stephani.sianturi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362688, NULL),
	(544, 'Sri Sudiatmini', 'sudiatmini@bsn.go.id', 'default.jpg', 'sudiatmini', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(545, 'Sugeng Raharjo', 'sugeng@bsn.go.id', 'default.jpg', 'sugeng', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359892, NULL),
	(546, 'Suhaimi A. Kasman', 'suhaimi@bsn.go.id', 'default.jpg', 'suhaimi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(547, 'Suherlan', 'suherlan@bsn.go.id', 'default.jpg', 'suherlan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360679, NULL),
	(548, 'Sukanta', 'sukanta@bsn.go.id', 'default.jpg', 'sukanta', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(549, 'Sukmawijiati Inderasari Utami', 'sukma@bsn.go.id', 'default.jpg', 'sukma', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362097, NULL),
	(550, 'Suminto', 'suminto@bsn.go.id', 'default.jpg', 'suminto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(551, 'Suprapto', 'suprapto@bsn.go.id', 'default.jpg', 'suprapto', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360243, NULL),
	(553, 'Mohamad Syahadi', 'syahadi@bsn.go.id', 'default.jpg', 'syahadi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(554, 'Syaiful', 'syaiful@bsn.go.id', 'default.jpg', 'syaiful', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365670, NULL),
	(555, 'Syamsi', 'syamsi@bsn.go.id', 'default.jpg', 'syamsi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(556, 'Syamsuir', 'syamsuir@bsn.go.id', 'default.jpg', 'syamsuir', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(557, 'Sylvia Agnes', 'sylviagnes@bsn.go.id', 'default.jpg', 'sylviagnes', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(558, 'Tri Astuti Ramandhani', 'ta.ramandhani@bsn.go.id', 'default.jpg', 'ta.ramandhani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603375021, NULL),
	(559, 'penilaian kesesuan PSPS. psps', 'tandasni@bsn.go.id', 'default.jpg', 'tandasni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(560, 'Teungku Abdul Rahman Hanfiah', 'tar_hanafiah@bsn.go.id', 'default.jpg', 'tar_hanafiah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(561, 'Sri Lestari Handayani', 'tari@bsn.go.id', 'default.jpg', 'tari', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360438, NULL),
	(563, 'Tegar Ega Pragita', 'tegar@bsn.go.id', 'default.jpg', 'tegar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360144, NULL),
	(564, 'Teguh Pribadi Adinugroho', 'teguh.adi@bsn.go.id', 'default.jpg', 'teguh.adi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(565, 'Teguh Prihatin', 'teguh.prihatin@bsn.go.id', 'default.jpg', 'teguh.prihatin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(566, 'Teguh Prakosa', 'teguh@bsn.go.id', 'default.jpg', 'teguh', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361245, NULL),
	(567, 'Testianto Hanung Fajar Prabowo', 'testianto.hanung@bsn.go.id', 'default.jpg', 'testianto.hanung', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(568, 'Theista Savanty', 'theista.savanty@bsn.go.id', 'default.jpg', 'theista.savanty', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361947, NULL),
	(569, 'Taufiq Hidayat', 'thopiq@bsn.go.id', 'default.jpg', 'thopiq', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(570, 'Layanan TI. BSN', 'ti.bsn@bsn.go.id', 'default.jpg', 'ti.bsn', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(571, 'Mutia Ardhaneswari', 'tia@bsn.go.id', 'default.jpg', 'tia', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(572, 'Tiara', 'tiara@bsn.go.id', 'default.jpg', 'tiara', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(573, 'Latifa Dinar', 'tifa@bsn.go.id', 'default.jpg', 'tifa', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362170, NULL),
	(574, 'Kartika Anggar Kusuma', 'tika@bsn.go.id', 'default.jpg', 'tika', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(575, 'Time', 'time@bsn.go.id', 'default.jpg', 'time', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(576, 'Tintin Prihatiningrum', 'tintin@bsn.go.id', 'default.jpg', 'tintin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360386, NULL),
	(577, 'Titin Resmiatin', 'titin@bsn.go.id', 'default.jpg', 'titin', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363245, NULL),
	(578, 'Eka Pratiwi', 'tiwi@bsn.go.id', 'default.jpg', 'tiwi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362154, NULL),
	(579, 'Tom Abbel Sulendro', 'tomabbels@bsn.go.id', 'default.jpg', 'tomabbels', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(580, 'Toto Sugiharto', 'totos@bsn.go.id', 'default.jpg', 'totos', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366413, NULL),
	(581, 'Tri Suhartanti', 'tri@bsn.go.id', 'default.jpg', 'tri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366740, NULL),
	(582, 'Trifani Indriana', 'trifani@bsn.go.id', 'default.jpg', 'trifani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360093, NULL),
	(583, 'Triningsih Herlinawati', 'triningsih@bsn.go.id', 'default.jpg', 'triningsih', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(584, 'Trissa Karina', 'trissakarina@bsn.go.id', 'default.jpg', 'trissakarina', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360913, NULL),
	(586, 'Tyas Kurniasih', 'tyas@bsn.go.id', 'default.jpg', 'tyas', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362967, NULL),
	(587, 'U. Herding', 'u.herding@bsn.go.id', 'default.jpg', 'u.herding', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(588, 'Yusuf', 'ucup@bsn.go.id', 'default.jpg', 'ucup', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(591, 'umi nuraeni', 'umi.nuraeni@bsn.go.id', 'default.jpg', 'umi.nuraeni', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360499, NULL),
	(592, 'Umu Kusnawati', 'umu@bsn.go.id', 'default.jpg', 'umu', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(593, 'Unang Sunaryo', 'unang@bsn.go.id', 'default.jpg', 'unang', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(595, 'Sri Utami, SE.', 'utami@bsn.go.id', 'default.jpg', 'utami', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359903, NULL),
	(596, 'Utari Ayuningtyas', 'utari.ayu@bsn.go.id', 'default.jpg', 'utari.ayu', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(597, 'Dewi Utari Wulandari', 'utari.dewi@bsn.go.id', 'default.jpg', 'utari.dewi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367961, NULL),
	(598, 'Utomo', 'utomo@bsn.go.id', 'default.jpg', 'utomo', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(599, 'Veny Luvita', 'veny@bsn.go.id', 'default.jpg', 'veny', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(600, 'Vitriatie Nuzullestary', 'vitriatie@bsn.go.id', 'default.jpg', 'vitriatie', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(601, 'Voting Manager', 'voman@bsn.go.id', 'default.jpg', 'voman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(602, 'Wahyu Purbowasito', 'wahyupurbowasito@bsn.go.id', 'default.jpg', 'wahyupurbowasito', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362596, NULL),
	(603, 'Wahyu Wibawa', 'wahyuwibawa@bsn.go.id', 'default.jpg', 'wahyuwibawa', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361138, NULL),
	(604, 'Warsidi', 'warsidi@bsn.go.id', 'default.jpg', 'warsidi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363602, NULL),
	(605, 'Wiwin Farhania', 'wfarhania@bsn.go.id', 'default.jpg', 'wfarhania', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362043, NULL),
	(606, 'Nurilla Gunawan Wibisono', 'wibi@bsn.go.id', 'default.jpg', 'wibi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359909, NULL),
	(607, 'Widia Citra Anggundari', 'widiacitra@bsn.go.id', 'default.jpg', 'widiacitra', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362563, NULL),
	(608, 'Widita Kasih Pramita', 'widita@bsn.go.id', 'default.jpg', 'widita', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361568, NULL),
	(609, 'Widi Wulan Puspita Sari', 'widiwulanp@bsn.go.id', 'default.jpg', 'widiwulanp', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359773, NULL),
	(610, 'widya', 'widya@bsn.go.id', 'default.jpg', 'widya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(611, 'Winarti Kartika Putri', 'winartikartikaputri@bsn.go.id', 'default.jpg', 'winartikartikaputri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366075, NULL),
	(612, 'Windi Kurnia Perangin-angin', 'windi@bsn.go.id', 'default.jpg', 'windi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361619, NULL),
	(613, 'Windri Widyaningsih', 'windri@bsn.go.id', 'default.jpg', 'windri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360889, NULL),
	(614, 'Wiranti Suwarti Sari', 'wiranti@bsn.go.id', 'default.jpg', 'wiranti', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(615, 'Yayah Waliyah, A.Md', 'y_waliyah@bsn.go.id', 'default.jpg', 'y_waliyah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(616, 'Meyani', 'yani@bsn.go.id', 'default.jpg', 'yani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360760, NULL),
	(617, 'Yanma Faradita Firdausi', 'yanma@bsn.go.id', 'default.jpg', 'yanma', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359878, NULL),
	(618, 'Yanuar Eko Irawan', 'yanuar.eko@bsn.go.id', 'default.jpg', 'yanuar.eko', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369313, NULL),
	(619, 'Yasir, SE.', 'yasir@bsn.go.id', 'default.jpg', 'yasir', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362052, NULL),
	(620, 'Yeani Sri Iryanie', 'yeani@bsn.go.id', 'default.jpg', 'yeani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603370340, NULL),
	(621, 'Yeyen Febriyanti', 'yeyen@bsn.go.id', 'default.jpg', 'yeyen', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603371324, NULL),
	(622, 'Yogi Dwisatria', 'yogi.dwisatria@bsn.go.id', 'default.jpg', 'yogi.dwisatria', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360675, NULL),
	(623, 'Yola Anda Rozza', 'yola@bsn.go.id', 'default.jpg', 'yola', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603363840, NULL),
	(624, 'Yonan Prihhapso', 'yonan@bsn.go.id', 'default.jpg', 'yonan', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(625, 'Harjono', 'yongki@bsn.go.id', 'default.jpg', 'yongki', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(626, 'Yopi Prasetya Haeroni', 'yopi.prasetya@bsn.go.id', 'default.jpg', 'yopi.prasetya', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(627, 'yopi', 'yopi@bsn.go.id', 'default.jpg', 'yopi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361902, NULL),
	(628, 'Yosi Aristiawan', 'yosi@bsn.go.id', 'default.jpg', 'yosi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(629, 'Yayat Rahmat Hidayat', 'yrahmat@bsn.go.id', 'default.jpg', 'yrahmat', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362889, NULL),
	(630, 'Yudha Septi Prasaja', 'yudhasepti@bsn.go.id', 'default.jpg', 'yudhasepti', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360900, NULL),
	(631, 'Dominicus Satria Yudhatma', 'yudhatamasatria@bsn.go.id', 'default.jpg', 'yudhatamasatria', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(632, 'Yudi Prakoso', 'yudi@bsn.go.id', 'default.jpg', 'yudi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603366662, NULL),
	(633, 'Yudrika Putra', 'yudrika@bsn.go.id', 'default.jpg', 'yudrika', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361369, NULL),
	(634, 'R. A. Bayuarti Wahyu Kusumaningrum', 'yuke@bsn.go.id', 'default.jpg', 'yuke', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603364331, NULL),
	(635, 'Yuliyaswan', 'yuli@bsn.go.id', 'default.jpg', 'yuli', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603362890, NULL),
	(636, 'Yuliandri Heru Kussumaputra', 'yuliandri.heru@bsn.go.id', 'default.jpg', 'yuliandri.heru', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361127, NULL),
	(637, 'Yuliandri Admaja', 'yuliandria@bsn.go.id', 'default.jpg', 'yuliandria', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(638, 'Yulianto Adi Wibowo', 'yuliantoadiwb@bsn.go.id', 'default.jpg', 'yuliantoadiwb', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361672, NULL),
	(639, 'Yulita Ika Pawestri', 'yulita@bsn.go.id', 'default.jpg', 'yulita', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(640, 'Yuniar Wahyudi', 'yuniar@bsn.go.id', 'default.jpg', 'yuniar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(641, 'Yuniar Restuwati', 'yuniarrestu@bsn.go.id', 'default.jpg', 'yuniarrestu', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603367137, NULL),
	(642, 'Yurridha Amarin Mahardinis', 'yurridha@bsn.go.id', 'default.jpg', 'yurridha', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603359759, NULL),
	(643, 'Yusep Hermansyah, ST', 'yuseph@bsn.go.id', 'default.jpg', 'yuseph', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603360982, NULL),
	(644, 'Zakiyah', 'zakiyah@bsn.go.id', 'default.jpg', 'zakiyah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(645, 'Achmad Rozali', 'zali@bsn.go.id', 'default.jpg', 'zali', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603365955, NULL),
	(646, 'Muhammad Zidni Ilman', 'zidni.ilman@bsn.go.id', 'default.jpg', 'zidni.ilman', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603369644, NULL),
	(647, 'Zola Mukhda', 'zola.mukhda@bsn.go.id', 'default.jpg', 'zola.mukhda', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603373400, NULL),
	(648, 'Zuhdi Ismail', 'zuhdi@bsn.go.id', 'default.jpg', 'zuhdi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(649, 'Zul Amri', 'zul@bsn.go.id', 'default.jpg', 'zul', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, 1603361461, NULL),
	(650, 'Zulhamidi', 'zulhamidi@bsn.go.id', 'default.jpg', 'zulhamidi', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591610581, NULL, NULL, NULL),
	(651, 'ilham muhammad', 'ilham@bsn.go.id', 'default.jpg', 'ilham.m', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591662490, NULL, NULL, NULL),
	(652, 'Febri Andriawan', 'febri.andriawan@bsn.go.id', 'default.jpg', 'febriand', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591919777, NULL, 1603364231, NULL),
	(653, 'Andri Sobari', 'sobari@bsn.go.id', 'default.jpg', 'andri_s', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591925923, NULL, 1603360391, NULL),
	(654, 'widya', 'widya@bsn.go.id', 'default.jpg', 'widyapku', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591926981, NULL, NULL, NULL),
	(656, 'Meilinda Ayundyahrini', 'meilinda.ayundyahrini@bsn.go.id', 'default.jpg', 'Meilinda', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1591952167, NULL, NULL, NULL),
	(657, 'Dicky D. Virgansyah', 'dicky_virgansyah@bsn.go.id', 'default.jpg', 'dicky', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592178239, NULL, NULL, NULL),
	(658, 'Kris Nanda Dhaneswara', 'krisnandana.dhanes@bsn.go.id', 'default.jpg', 'krisnanda.dhanes', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592180340, NULL, 1603361693, NULL),
	(659, 'Amjad Tri Puspitasari', 'amjad.tri.puspitasari@bsn.go.id', 'default.jpg', 'amjad.tri.puspitasar', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592181114, NULL, 1603362661, NULL),
	(661, 'Widya Yulia Cahyanti', 'widya.yc', 'default.jpg', 'widya.yc', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, NULL, 'PPNPN', NULL, NULL),
	(662, 'Yunida Aberine El Annisa', 'yunida', 'default.jpg', 'yunida', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, NULL, 'PPNPN', NULL, NULL),
	(663, 'Nanda Tri Sekar Langit', 'nanda.tri', 'default.jpg', 'nanda.tri', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592234924, 'PPNPN', NULL, NULL),
	(665, 'Sumarna', 'ajang@bsn.go.id', 'default.jpg', 'Sumarna', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592266346, NULL, 1603360259, NULL),
	(666, 'Sri Kumolowati', 'sri_k@bsn.go.id', 'default.jpg', 'srikumolowati', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592266367, NULL, NULL, NULL),
	(667, 'Susiyana', 'nana@bsn.go.id', 'default.jpg', 'susiyana', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592266665, NULL, NULL, NULL),
	(669, 'Rasta Winata', 'rasta@bsn.go.id', 'default.jpg', 'rastawinata', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592272302, NULL, NULL, NULL),
	(671, 'sekre.dir.ippe', 'sekre.dir.ippe@bsn.go.id', 'default.jpg', 'sekre.dir.ippe', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592285008, NULL, NULL, NULL),
	(672, 'Nuraedih S, S.E.', 'nuraedi@bsn.go.id', 'default.jpg', 'nuraedih', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592311878, NULL, NULL, NULL),
	(673, 'Fadly Irmansyah', 'fadly.irmansyah@bsn.go.id', 'default.jpg', 'FadlyIrmansyah', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592368894, NULL, 1603363743, NULL),
	(674, 'Agus Suhartaji', 'agshartaji@bsn.go.id', 'default.jpg', 'agshartaji', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1592568480, NULL, 1603366713, NULL),
	(675, 'ismail PPNPN', NULL, 'default.jpg', 'ismail', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1594605740, NULL, NULL, NULL),
	(676, 'Yuli Apriliani', NULL, 'default.jpg', 'yuli.apriliani', '$2y$10$mKqXqJcAPQSchJdWyCPkduaG4oGeov1sI26nyVsj8O3lPYBQWOtpy', NULL, 6, 1, 1596067228, NULL, NULL, NULL);
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.personil
CREATE TABLE IF NOT EXISTS `personil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.personil: ~7 rows (approximately)
/*!40000 ALTER TABLE `personil` DISABLE KEYS */;
INSERT INTO `personil` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
	(1, 'Ilham Muhammad', 'ilhamhmmd', '$2y$10$bpqdoFIi1Yqp18QHDE2jreq95qTce2nQhwLPmVAYDWVtAi0IE6geS', 4),
	(2, 'Budi Tris', 'budi', '$2y$10$bpqdoFIi1Yqp18QHDE2jreq95qTce2nQhwLPmVAYDWVtAi0IE6geS', 2),
	(3, 'Akbar Aryanto', 'akbar', '$2y$10$bpqdoFIi1Yqp18QHDE2jreq95qTce2nQhwLPmVAYDWVtAi0IE6geS', 3),
	(4, 'Azmi Zuhdi', 'azmi', '$2y$10$bpqdoFIi1Yqp18QHDE2jreq95qTce2nQhwLPmVAYDWVtAi0IE6geS', 4),
	(5, 'Adlin Ichsan', 'adlin', '$2y$10$bpqdoFIi1Yqp18QHDE2jreq95qTce2nQhwLPmVAYDWVtAi0IE6geS', 4),
	(6, 'Rizky Mulya', 'rizky', '$2y$10$bpqdoFIi1Yqp18QHDE2jreq95qTce2nQhwLPmVAYDWVtAi0IE6geS', 5),
	(7, 'Indra Hikmawan', 'indra', '$2y$10$bpqdoFIi1Yqp18QHDE2jreq95qTce2nQhwLPmVAYDWVtAi0IE6geS', 5);
/*!40000 ALTER TABLE `personil` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  `parent_role` int(2) DEFAULT NULL,
  `bidang_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.role: ~6 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `role`, `parent_role`, `bidang_id`) VALUES
	(1, 'kapusdatin', 0, 3),
	(2, 'kabid_sitkd', 1, 1),
	(3, 'kabid_iki', 1, 2),
	(4, 'staff_sitkd', 2, 1),
	(5, 'staff_iki', 3, 2),
	(6, 'pegawai', 0, 4);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` varchar(11) NOT NULL,
  `description` text NOT NULL,
  `feedback` varchar(30) DEFAULT NULL COMMENT 'fill after closed',
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  `status_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_FK` (`pegawai_id`),
  CONSTRAINT `ticket_FK` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.ticket: ~4 rows (approximately)
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` (`id`, `description`, `feedback`, `created_at`, `modified_at`, `pegawai_id`, `status_id`) VALUES
	('2101040001', '<p>PC ane lemot gan</p>', NULL, '2021-01-04 04:37:34', NULL, 651, 2),
	('2101040002', 'Request Pembuatan Baru Aplikasi', NULL, '2021-01-04 04:43:29', NULL, 651, 2),
	('2101050001', 'PCKU MATII', NULL, '2021-01-05 00:10:10', NULL, 651, 2),
	('2101050002', '<p>PCKU LEMOT</p>', NULL, '2021-01-05 00:11:16', NULL, 651, 2);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.tr_faq
CREATE TABLE IF NOT EXISTS `tr_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_id` int(4) DEFAULT NULL,
  `tr_masalah_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_id` (`faq_id`),
  KEY `tr_masalah_id` (`tr_masalah_id`),
  CONSTRAINT `faq_id_FK` FOREIGN KEY (`faq_id`) REFERENCES `m_faq` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tr_maslaah_id_FK2` FOREIGN KEY (`tr_masalah_id`) REFERENCES `tr_masalah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.tr_faq: ~3 rows (approximately)
/*!40000 ALTER TABLE `tr_faq` DISABLE KEYS */;
INSERT INTO `tr_faq` (`id`, `faq_id`, `tr_masalah_id`) VALUES
	(9, 3, 11),
	(10, 4, 12),
	(11, 5, 13);
/*!40000 ALTER TABLE `tr_faq` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.tr_feedback
CREATE TABLE IF NOT EXISTS `tr_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `masalah_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FKMasalah` (`masalah_id`),
  CONSTRAINT `FKMasalah` FOREIGN KEY (`masalah_id`) REFERENCES `m_masalah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.tr_feedback: ~0 rows (approximately)
/*!40000 ALTER TABLE `tr_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_feedback` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.tr_jawaban
CREATE TABLE IF NOT EXISTS `tr_jawaban` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tickettr_id` int(11) DEFAULT NULL,
  `faq_id` int(11) DEFAULT NULL,
  `jawaban_id` int(11) DEFAULT NULL COMMENT 'is faq fill, jabawan null. is faq null, jawaban must be filled',
  `waktu_jawab` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKtrticket` (`tickettr_id`),
  KEY `FKjawaban` (`jawaban_id`),
  KEY `FKfaq` (`faq_id`),
  CONSTRAINT `FKfaq` FOREIGN KEY (`faq_id`) REFERENCES `m_faq` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKjawaban` FOREIGN KEY (`jawaban_id`) REFERENCES `m_jawab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKtrticket` FOREIGN KEY (`tickettr_id`) REFERENCES `tr_ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.tr_jawaban: ~0 rows (approximately)
/*!40000 ALTER TABLE `tr_jawaban` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_jawaban` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.tr_layanan
CREATE TABLE IF NOT EXISTS `tr_layanan` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `jenis_layanan_id` int(4) DEFAULT NULL,
  `kategori_layanan_id` int(4) DEFAULT NULL,
  `bidang_id` int(2) DEFAULT NULL,
  `tr_masalah_id` int(4) DEFAULT NULL,
  `ticket_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tr_layanan_FK` (`kategori_layanan_id`),
  KEY `tr_layanan_FK_1` (`jenis_layanan_id`),
  KEY `FK_bidang` (`bidang_id`),
  KEY `tr_layanan_FK_2` (`ticket_id`),
  KEY `tr_layanan_FK_3` (`tr_masalah_id`),
  CONSTRAINT `FK_bidang` FOREIGN KEY (`bidang_id`) REFERENCES `m_bidang_pusdatin` (`id`),
  CONSTRAINT `tr_layanan_FK` FOREIGN KEY (`kategori_layanan_id`) REFERENCES `m_kategori_layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tr_layanan_FK_1` FOREIGN KEY (`jenis_layanan_id`) REFERENCES `m_jenis_layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tr_layanan_FK_2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tr_layanan_FK_3` FOREIGN KEY (`tr_masalah_id`) REFERENCES `tr_masalah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.tr_layanan: ~4 rows (approximately)
/*!40000 ALTER TABLE `tr_layanan` DISABLE KEYS */;
INSERT INTO `tr_layanan` (`id`, `jenis_layanan_id`, `kategori_layanan_id`, `bidang_id`, `tr_masalah_id`, `ticket_id`) VALUES
	(19, 1, 1, 2, 12, '2101040001'),
	(20, NULL, 11, 1, NULL, '2101040002'),
	(23, 1, 1, 2, 11, '2101050001'),
	(24, 1, 1, 2, 12, '2101050002');
/*!40000 ALTER TABLE `tr_layanan` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.tr_masalah
CREATE TABLE IF NOT EXISTS `tr_masalah` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `masalah_id` int(2) DEFAULT NULL,
  `jenis_layanan_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `masalah_id` (`masalah_id`),
  KEY `jenis_layanan_id` (`jenis_layanan_id`),
  CONSTRAINT `jenis_layanan_id_FK` FOREIGN KEY (`jenis_layanan_id`) REFERENCES `m_jenis_layanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `masalah_id_FK` FOREIGN KEY (`masalah_id`) REFERENCES `m_masalah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.tr_masalah: ~3 rows (approximately)
/*!40000 ALTER TABLE `tr_masalah` DISABLE KEYS */;
INSERT INTO `tr_masalah` (`id`, `masalah_id`, `jenis_layanan_id`) VALUES
	(11, 1, 1),
	(12, 2, 1),
	(13, 3, 9);
/*!40000 ALTER TABLE `tr_masalah` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.tr_ticket
CREATE TABLE IF NOT EXISTS `tr_ticket` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `urgensi_id` tinyint(2) DEFAULT NULL COMMENT '1 - 3, low to high',
  `waktu_disposisi` datetime DEFAULT NULL,
  `ticket_id` varchar(11) DEFAULT NULL,
  `personil_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKPersonil` (`personil_id`),
  KEY `tr_ticket_FK` (`ticket_id`),
  CONSTRAINT `FKPersonil` FOREIGN KEY (`personil_id`) REFERENCES `personil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tr_ticket_FK` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.tr_ticket: ~4 rows (approximately)
/*!40000 ALTER TABLE `tr_ticket` DISABLE KEYS */;
INSERT INTO `tr_ticket` (`id`, `urgensi_id`, `waktu_disposisi`, `ticket_id`, `personil_id`) VALUES
	(2, 2, '2021-01-04 08:47:16', '2101040001', 7),
	(3, 2, '2021-01-04 08:52:13', '2101040002', 1),
	(4, 1, '2021-01-05 09:21:51', '2101050001', 5),
	(5, 3, '2021-01-05 09:58:53', '2101050002', 6);
/*!40000 ALTER TABLE `tr_ticket` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.tr_ticket_attachment
CREATE TABLE IF NOT EXISTS `tr_ticket_attachment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `path_attachment` varchar(128) NOT NULL,
  `detail_attachment` varchar(50) DEFAULT NULL,
  `ticket_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tr_ticket_attachment_FK` (`ticket_id`),
  CONSTRAINT `tr_ticket_attachment_FK` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.tr_ticket_attachment: ~3 rows (approximately)
/*!40000 ALTER TABLE `tr_ticket_attachment` DISABLE KEYS */;
INSERT INTO `tr_ticket_attachment` (`id`, `path_attachment`, `detail_attachment`, `ticket_id`) VALUES
	(17, './assets/upload/ticket_attachment/301220_peserta.xlsx', '301220_peserta.xlsx', '2101040001'),
	(18, './assets/upload/ticket_attachment/20201229022443-F_SID_5_0_2.docx', '20201229022443-F.SID.5.0.2.docx', '2101040001'),
	(19, './assets/upload/ticket_attachment/bg_zoom5.jpg', 'bg zoom5.jpg', '2101040001');
/*!40000 ALTER TABLE `tr_ticket_attachment` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.urgensi
CREATE TABLE IF NOT EXISTS `urgensi` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `urgensi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.urgensi: ~2 rows (approximately)
/*!40000 ALTER TABLE `urgensi` DISABLE KEYS */;
INSERT INTO `urgensi` (`id`, `urgensi`) VALUES
	(1, 'High'),
	(2, 'Normal'),
	(3, 'Low');
/*!40000 ALTER TABLE `urgensi` ENABLE KEYS */;

-- Dumping structure for table db_eticketing.user_vidcon
CREATE TABLE IF NOT EXISTS `user_vidcon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kode_unit_kerja` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table db_eticketing.user_vidcon: ~20 rows (approximately)
/*!40000 ALTER TABLE `user_vidcon` DISABLE KEYS */;
INSERT INTO `user_vidcon` (`id`, `nama`, `email`, `kode_unit_kerja`) VALUES
	(1, 'vicon1', 'vicon1@bsn.go.id', 3),
	(2, 'vicon2', 'vicon2@bsn.go.id', 2),
	(3, 'vicon3', 'vicon3@bsn.go.id ', 1),
	(4, 'vicon4', 'vicon4@bsn.go.id', 12),
	(5, 'vicon5', 'vicon5@bsn.go.id', 10),
	(6, 'vicon6', 'vicon6@bsn.go.id', 16),
	(7, 'vicon7', 'vicon7@bsn.go.id', 17),
	(8, 'vicon8', 'vicon8@bsn.go.id', 11),
	(9, 'vicon9', 'vicon9@bsn.go.id', 8),
	(10, 'vicon10', 'vicon10@bsn.go.id', 13),
	(11, 'vicon11', 'vicon11@bsn.go.id', 5),
	(12, 'vicon12', 'vicon12@bsn.go.id', 6),
	(13, 'vicon13', 'vicon13@bsn.go.id', 14),
	(14, 'vicon14', 'vicon14@bsn.go.id', 15),
	(15, 'vicon15', 'vicon15@bsn.go.id', 9),
	(16, 'vicon16', 'vicon16@bsn.go.id', 7),
	(17, 'vicon17', 'vicon17@bsn.go.id', 18),
	(18, 'vicon18', 'vicon18@bsn.go.id', 18),
	(19, 'vicon19', 'vicon19@bsn.go.id', 19),
	(20, 'pasc', 'pasc@bsn.go.id', 12);
/*!40000 ALTER TABLE `user_vidcon` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
