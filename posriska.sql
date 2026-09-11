-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for posriska
CREATE DATABASE IF NOT EXISTS `posriska` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `posriska`;

-- Dumping structure for table posriska.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.cache: ~0 rows (approximately)

-- Dumping structure for table posriska.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.cache_locks: ~0 rows (approximately)

-- Dumping structure for table posriska.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table posriska.item_penjualan
CREATE TABLE IF NOT EXISTS `item_penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned NOT NULL,
  `kuantitas` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_penjualan_penjualan_id_foreign` (`penjualan_id`),
  KEY `item_penjualan_produk_id_foreign` (`produk_id`),
  CONSTRAINT `item_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`),
  CONSTRAINT `item_penjualan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.item_penjualan: ~11 rows (approximately)
INSERT INTO `item_penjualan` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 25000, 25000, '2026-09-01 20:55:53', '2026-09-01 20:55:53'),
	(2, 1, 6, 1, 18000, 18000, '2026-09-01 20:55:54', '2026-09-01 20:55:54'),
	(3, 2, 2, 1, 25000, 25000, '2026-09-01 20:56:01', '2026-09-01 20:56:01'),
	(4, 2, 9, 1, 15000, 15000, '2026-09-01 20:56:04', '2026-09-01 20:56:04'),
	(5, 2, 3, 1, 45000, 45000, '2026-09-01 20:56:06', '2026-09-01 20:56:06'),
	(12, 4, 9, 1, 15000, 15000, '2026-09-06 23:45:55', '2026-09-06 23:45:55'),
	(13, 4, 3, 1, 45000, 45000, '2026-09-06 23:45:58', '2026-09-06 23:45:58'),
	(14, 5, 5, 1, 20000, 20000, '2026-09-06 23:46:10', '2026-09-06 23:46:10'),
	(15, 5, 6, 1, 18000, 18000, '2026-09-06 23:46:15', '2026-09-06 23:46:15'),
	(22, 8, 1, 1, 25000, 25000, '2026-09-10 21:15:41', '2026-09-10 21:15:41'),
	(23, 8, 7, 1, 19000, 19000, '2026-09-10 21:15:44', '2026-09-10 21:15:44');

-- Dumping structure for table posriska.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jenis_nama_jenis_unique` (`nama_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.jenis: ~2 rows (approximately)
INSERT INTO `jenis` (`id`, `nama_jenis`, `created_at`, `updated_at`) VALUES
	(1, 'Minuman', '2026-09-01 20:35:09', '2026-09-01 20:35:09'),
	(2, 'Makanan', '2026-09-01 20:35:16', '2026-09-01 20:35:16');

-- Dumping structure for table posriska.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.jobs: ~0 rows (approximately)

-- Dumping structure for table posriska.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.job_batches: ~0 rows (approximately)

-- Dumping structure for table posriska.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.migrations: ~10 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_roles_table', 1),
	(2, '0001_01_01_000000_create_users_table', 1),
	(3, '0001_01_01_000001_create_cache_table', 1),
	(4, '0001_01_01_000002_create_jobs_table', 1),
	(5, '2026_04_20_072115_create_produk_table', 1),
	(6, '2026_04_20_072912_create_penjualan_table', 1),
	(7, '2026_04_20_073738_create_item_penjualan_table', 1),
	(8, '2026_08_21_012540_create_jenis_table', 1),
	(9, '2026_08_21_013642_add_jenis_id_to_produk_table', 1),
	(10, '2026_09_09_035142_add_uang_diterima_kembalian_to_sales_table', 2);

-- Dumping structure for table posriska.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table posriska.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `total_pembayaran` int NOT NULL,
  `metode_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uang_diterima` bigint unsigned DEFAULT NULL,
  `kembalian` bigint unsigned DEFAULT NULL,
  `status` enum('OPEN','COMPLETED') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_user_id_foreign` (`user_id`),
  CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.penjualan: ~5 rows (approximately)
INSERT INTO `penjualan` (`id`, `user_id`, `total_pembayaran`, `metode_pembayaran`, `uang_diterima`, `kembalian`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 43000, 'CASH', NULL, NULL, 'COMPLETED', '2026-09-01 20:55:47', '2026-09-01 20:55:57'),
	(2, 2, 85000, 'QRIS', NULL, NULL, 'COMPLETED', '2026-09-01 20:55:59', '2026-09-01 20:56:11'),
	(4, 8, 60000, 'QRIS', NULL, NULL, 'COMPLETED', '2026-09-06 23:45:51', '2026-09-06 23:46:03'),
	(5, 8, 38000, 'CASH', NULL, NULL, 'OPEN', '2026-09-06 23:46:06', '2026-09-06 23:46:15'),
	(8, 7, 44000, 'CASH', 100000, 56000, 'COMPLETED', '2026-09-10 21:15:38', '2026-09-10 21:18:02');

-- Dumping structure for table posriska.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jenis_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_user_id_foreign` (`user_id`),
  KEY `produk_nama_index` (`nama`),
  KEY `produk_jenis_id_foreign` (`jenis_id`),
  CONSTRAINT `produk_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE SET NULL,
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.produk: ~10 rows (approximately)
INSERT INTO `produk` (`id`, `jenis_id`, `user_id`, `foto`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 'products/bEyXwaGpPatbS0KzyHimmej021ht5GGBsuxZP9BV.jpg', 'Brownies', 20000, 25000, 48, '2026-09-01 20:37:39', '2026-09-10 21:15:41'),
	(2, 2, 2, 'products/d3DR4WDTK2JGaJNbLOxF5ReCVa49S6M4dRx5YSKK.jpg', 'Chocolate Cookies And Cream Cookies', 20000, 25000, 49, '2026-09-01 20:38:46', '2026-09-10 21:15:10'),
	(3, 2, 2, 'products/6gODxi94EjmgbJRbOh885hlGSgCXKOyaXLItqWuI.jpg', 'Lemon Blueberry Sourdough Bread', 35000, 45000, 58, '2026-09-01 20:39:33', '2026-09-10 19:16:30'),
	(4, 2, 2, 'products/zN3kqt3M8NUFc2fN32c87Y3XmxolGu3qCz46PAI1.jpg', 'Cinnamon rolls', 30000, 35000, 50, '2026-09-01 20:45:08', '2026-09-10 21:15:10'),
	(5, 2, 2, 'products/IAqDKeYGg3LJlCwOTWKb4ID1xLsPyTzHwBbzJy28.jpg', 'Tiramisu Croissant', 15000, 20000, 59, '2026-09-01 20:47:11', '2026-09-06 23:46:10'),
	(6, 1, 2, 'products/jWo2udQS9YEAFLpmeqwV06HeDhBn9LHUJYccgkkc.jpg', 'Iced Americano', 10000, 18000, 48, '2026-09-01 20:48:45', '2026-09-10 19:16:34'),
	(7, 1, 2, 'products/vrLHGKxUp1G9P8cxaC11d7J83u8Wh7LsTWsCB8XT.jpg', 'Signature Iced Chocolate', 12000, 19000, 59, '2026-09-01 20:49:47', '2026-09-10 21:15:44'),
	(8, 1, 2, 'products/fpTeZ1zywX1I58Dd9ZugJmPJavW2k6dy9klGC6Rs.jpg', 'Signature Iced Matcha Latte', 15000, 22000, 60, '2026-09-01 20:50:36', '2026-09-10 19:16:27'),
	(9, 1, 2, 'products/WCfjDj7q8LHCBgizxFRz3ilOVhMynAojNnh7GEdk.jpg', 'Iced Plain Latte (Espresso Base)', 10000, 15000, 48, '2026-09-01 20:51:20', '2026-09-10 20:49:40'),
	(10, 1, 2, 'products/MEc8tIrT84HZ8a5UGq5Lgvk04rXRMhK0i9avozOc.jpg', 'Signature Iced Hazelnut Chocolate', 19000, 26000, 60, '2026-09-01 20:55:39', '2026-09-10 19:16:32');

-- Dumping structure for table posriska.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2026-09-01 20:02:58', '2026-09-01 20:02:58'),
	(2, 'kasir', '2026-09-01 20:02:58', '2026-09-01 20:02:58');

-- Dumping structure for table posriska.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('KynOImxmw2bg9gKGDzIIBJ1D4FI2Sh9ZvQcxOFqh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSjBENnd4RDlxZWRDOEFkdTZWUzR0RkU3QUZaWklCV2NsNjJ0czdnSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1789101419);

-- Dumping structure for table posriska.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  FULLTEXT KEY `users_name_email_fulltext` (`name`,`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table posriska.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 1, 'Jaunita Emmerich', 'ukuphal@example.net', '2026-09-01 20:02:59', '$2y$12$Vp/iFM/bZB6kZm38Y2tOBeUSrvfAny3FHyvd4tcKI8uShEGsiMIKC', 'jurIhd2iny', '2026-09-01 20:02:59', '2026-09-01 20:02:59'),
	(7, 1, 'cantika', 'cantika@gmail.com', NULL, '$2y$12$jIejjDt8oh3ZmwEIcbfaa.Ox2wpDj2ye1km8V3xvUch8VzUIYk5FW', NULL, '2026-09-01 20:34:19', '2026-09-01 20:34:19'),
	(8, 2, 'java', 'javaa@gmail.com', NULL, '$2y$12$vP7a5hBVxoFKk9AtSrERCu1tP2yGpw9jcdnxbegUNKF2ErORFS6J2', NULL, '2026-09-01 20:34:57', '2026-09-01 20:34:57');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
