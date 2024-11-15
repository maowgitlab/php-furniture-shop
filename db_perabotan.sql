-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_perabotan
DROP DATABASE IF EXISTS `db_perabotan`;
CREATE DATABASE IF NOT EXISTS `db_perabotan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_perabotan`;

-- Dumping structure for table db_perabotan.tb_barang
DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id` int NOT NULL,
  `id_kategori` int DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `detail` text,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perabotan.tb_barang: ~4 rows (approximately)
DELETE FROM `tb_barang`;
INSERT INTO `tb_barang` (`id`, `id_kategori`, `nama`, `harga`, `stok`, `foto`, `detail`) VALUES
	(1, 1, 'Kursi Besi', 50000, 7, 'kursi besi.jpg', 'Kursi Terbuat dari bahan besi\r\n'),
	(2, 1, 'Kursi Kayu', 30000, 56, 'kursi kayu.jpg', 'Kursi terbuat dari bahan kayu'),
	(3, 2, 'Meja Besi', 10000, 67, 'meja besi.png', 'Meja terbuat dari besi'),
	(4, 2, 'kursi', 600000, 50, 'meja besi.png', 'Meja terbuat dari bahan besi');

-- Dumping structure for table db_perabotan.tb_karyawan
DROP TABLE IF EXISTS `tb_karyawan`;
CREATE TABLE IF NOT EXISTS `tb_karyawan` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `jenkel` enum('L','P') DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perabotan.tb_karyawan: ~3 rows (approximately)
DELETE FROM `tb_karyawan`;
INSERT INTO `tb_karyawan` (`id`, `nama`, `email`, `password`, `jenkel`, `status`) VALUES
	(0, NULL, NULL, '9b8533f741f6de72cf093e43e39e11', 'L', NULL),
	(1, 'Mraicode', 'admin', 'admin', 'L', 'master'),
	(2, 'byybae', 'robianoor2002@gmail.com', '12345', 'L', 'non master');

-- Dumping structure for table db_perabotan.tb_kategori
DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perabotan.tb_kategori: ~0 rows (approximately)
DELETE FROM `tb_kategori`;

-- Dumping structure for table db_perabotan.tb_pembeli
DROP TABLE IF EXISTS `tb_pembeli`;
CREATE TABLE IF NOT EXISTS `tb_pembeli` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenkel` enum('L','P') DEFAULT NULL,
  `tgl_gabung` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perabotan.tb_pembeli: ~1 rows (approximately)
DELETE FROM `tb_pembeli`;
INSERT INTO `tb_pembeli` (`id`, `nama`, `email`, `password`, `alamat`, `jenkel`, `tgl_gabung`) VALUES
	(1, 'Albert', 'albert', '12345', 'Bumi Mas Citra', 'P', '2020-01-05');

-- Dumping structure for table db_perabotan.tb_pengiriman
DROP TABLE IF EXISTS `tb_pengiriman`;
CREATE TABLE IF NOT EXISTS `tb_pengiriman` (
  `id` int NOT NULL,
  `id_supir` int DEFAULT NULL,
  `id_transaksi` int DEFAULT NULL,
  `tgl_pengiriman` date DEFAULT NULL,
  `alamat_pengiriman` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_supir` (`id_supir`),
  KEY `id_transaksi` (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perabotan.tb_pengiriman: ~1 rows (approximately)
DELETE FROM `tb_pengiriman`;
INSERT INTO `tb_pengiriman` (`id`, `id_supir`, `id_transaksi`, `tgl_pengiriman`, `alamat_pengiriman`, `status`) VALUES
	(2, 1, 1, '2019-05-06', 'Bumi Mas Citra', 'Terkirim');

-- Dumping structure for table db_perabotan.tb_supir
DROP TABLE IF EXISTS `tb_supir`;
CREATE TABLE IF NOT EXISTS `tb_supir` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lhr` varchar(50) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jenkel` enum('L','P') DEFAULT NULL,
  `tgl_gabung` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perabotan.tb_supir: ~1 rows (approximately)
DELETE FROM `tb_supir`;
INSERT INTO `tb_supir` (`id`, `nama`, `tempat_lhr`, `tgl_lhr`, `jenkel`, `tgl_gabung`) VALUES
	(1, 'alfaridzi zulkarnain', 'Banjarmasin', '2019-09-19', 'L', '2020-01-06');

-- Dumping structure for table db_perabotan.tb_transaksi
DROP TABLE IF EXISTS `tb_transaksi`;
CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id` int NOT NULL,
  `id_pembeli` int DEFAULT NULL,
  `id_karyawan` int DEFAULT NULL,
  `id_barang` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total_harga` int DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pembeli` (`id_pembeli`),
  KEY `id_barang` (`id_barang`),
  KEY `id_karyawan` (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perabotan.tb_transaksi: ~3 rows (approximately)
DELETE FROM `tb_transaksi`;
INSERT INTO `tb_transaksi` (`id`, `id_pembeli`, `id_karyawan`, `id_barang`, `quantity`, `total_harga`, `tgl_beli`, `status`) VALUES
	(1, 1, 1, 1, 4, 200000, '2020-01-06', '1'),
	(2, 1, 0, 1, 5, 250000, '2020-01-06', '0'),
	(3, 1, 0, 1, 3, 150000, '2020-01-06', '0');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
