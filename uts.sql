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


-- Dumping database structure for uts
CREATE DATABASE IF NOT EXISTS `uts` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `uts`;

-- Dumping structure for table uts.dokter
CREATE TABLE IF NOT EXISTS `dokter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table uts.dokter: ~2 rows (approximately)
DELETE FROM `dokter`;
INSERT INTO `dokter` (`id`, `nama`) VALUES
	(2, 'Dokter Boyke Coy'),
	(3, 'Dokter Tirta');

-- Dumping structure for table uts.kunjungan
CREATE TABLE IF NOT EXISTS `kunjungan` (
  `id` int NOT NULL,
  `id_pasien` int DEFAULT NULL,
  `id_dokter` int DEFAULT NULL,
  `tanggal_kunjungan` date DEFAULT NULL,
  `keluhan` varchar(100) DEFAULT NULL,
  `id_poli` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__pasien` (`id_pasien`),
  KEY `FK__dokter` (`id_dokter`),
  KEY `FK__poli` (`id_poli`),
  KEY `FK__user` (`id_user`),
  CONSTRAINT `FK__dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`),
  CONSTRAINT `FK__pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`),
  CONSTRAINT `FK__poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`),
  CONSTRAINT `FK__user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table uts.kunjungan: ~1 rows (approximately)
DELETE FROM `kunjungan`;
INSERT INTO `kunjungan` (`id`, `id_pasien`, `id_dokter`, `tanggal_kunjungan`, `keluhan`, `id_poli`, `id_user`) VALUES
	(1, 2, 2, '2024-04-26', 'Sakit Selangkangan', 1, 1);

-- Dumping structure for table uts.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_pasien_users` (`id_user`),
  CONSTRAINT `FK_pasien_users` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table uts.pasien: ~2 rows (approximately)
DELETE FROM `pasien`;
INSERT INTO `pasien` (`id`, `nama`, `tanggal_lahir`, `alamat`, `id_user`) VALUES
	(2, 'Kevin Hart Coy', '2002-10-10', 'Bojonggede Utara RT01/05', 1),
	(3, 'Dave Chappele', '2002-04-09', 'Garut Selatan RT01/02', 1);

-- Dumping structure for table uts.poli
CREATE TABLE IF NOT EXISTS `poli` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table uts.poli: ~2 rows (approximately)
DELETE FROM `poli`;
INSERT INTO `poli` (`id`, `nama`) VALUES
	(1, 'Penyakit Dalam'),
	(3, 'Penyakit Hati');

-- Dumping structure for table uts.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table uts.user: ~1 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `username`, `password`) VALUES
	(1, 'admin', 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
