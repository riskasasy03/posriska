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


-- Dumping database structure for pos_riska
CREATE DATABASE IF NOT EXISTS `pos_riska` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pos_riska`;

-- Dumping structure for table pos_riska.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.cache: ~0 rows (approximately)

-- Dumping structure for table pos_riska.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.cache_locks: ~0 rows (approximately)

-- Dumping structure for table pos_riska.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pos_riska.item_penjualan
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
  CONSTRAINT `item_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_penjualan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.item_penjualan: ~15 rows (approximately)
INSERT INTO `item_penjualan` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
	(2, 2, 2, 5, 10000, 50000, '2026-07-26 19:56:04', '2026-07-26 19:56:10'),
	(3, 4, 2, 14, 10000, 140000, '2026-07-26 19:59:33', '2026-07-26 19:59:36'),
	(4, 5, 2, 2, 10000, 20000, '2026-07-26 21:01:39', '2026-07-26 21:05:59'),
	(5, 3, 3, 11, 30000, 330000, '2026-07-26 21:32:55', '2026-07-26 21:33:04'),
	(7, 6, 4, 6, 35000, 210000, '2026-07-26 23:17:22', '2026-07-26 23:17:33'),
	(8, 7, 3, 2, 30000, 60000, '2026-08-02 21:15:53', '2026-08-02 21:15:56'),
	(9, 7, 4, 2, 35000, 70000, '2026-08-02 21:16:02', '2026-08-02 21:16:07'),
	(10, 7, 2, 1, 10000, 10000, '2026-08-02 21:16:16', '2026-08-02 21:16:16'),
	(14, 10, 7, 1, 30000, 30000, '2026-08-06 00:46:20', '2026-08-06 00:46:20'),
	(15, 10, 3, 1, 30000, 30000, '2026-08-06 00:46:26', '2026-08-06 00:46:26'),
	(16, 10, 6, 1, 45000, 45000, '2026-08-06 00:46:31', '2026-08-06 00:46:31'),
	(17, 10, 2, 1, 10000, 10000, '2026-08-06 00:46:34', '2026-08-06 00:46:34'),
	(22, 14, 3, 1, 30000, 30000, '2026-08-09 19:17:14', '2026-08-09 19:17:14'),
	(23, 14, 2, 1, 10000, 10000, '2026-08-09 19:17:19', '2026-08-09 19:17:19'),
	(24, 14, 5, 1, 25000, 25000, '2026-08-09 19:17:20', '2026-08-09 19:17:20'),
	(25, 13, 8, 1, 35000, 35000, '2026-08-10 18:46:57', '2026-08-10 18:46:57'),
	(26, 13, 6, 1, 45000, 45000, '2026-08-10 18:47:07', '2026-08-10 18:47:07'),
	(27, 16, 6, 1, 45000, 45000, '2026-08-19 23:40:21', '2026-08-19 23:40:21'),
	(28, 16, 3, 1, 30000, 30000, '2026-08-19 23:40:24', '2026-08-19 23:40:24');

-- Dumping structure for table pos_riska.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.jobs: ~0 rows (approximately)

-- Dumping structure for table pos_riska.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.job_batches: ~0 rows (approximately)

-- Dumping structure for table pos_riska.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_roles_table', 1),
	(2, '0001_01_01_000000_create_users_table', 1),
	(3, '0001_01_01_000001_create_cache_table', 1),
	(4, '0001_01_01_000002_create_jobs_table', 1),
	(5, '2026_04_20_072115_create_produk_table', 1),
	(6, '2026_04_20_072912_create_penjualan_table', 1),
	(7, '2026_04_20_073738_create_item_penjualan_table', 1);

-- Dumping structure for table pos_riska.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pos_riska.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `total_pembayaran` int NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('OPEN','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_user_id_foreign` (`user_id`),
  CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.penjualan: ~12 rows (approximately)
INSERT INTO `penjualan` (`id`, `user_id`, `total_pembayaran`, `metode_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 40000, 'CASH', 'COMPLETED', '2026-07-22 21:36:29', '2026-07-22 21:36:53'),
	(2, 7, 50000, 'CASH', 'COMPLETED', '2026-07-26 19:52:18', '2026-07-26 19:56:18'),
	(3, 7, 330000, 'CASH', 'COMPLETED', '2026-07-26 19:58:27', '2026-07-26 21:33:11'),
	(4, 2, 140000, 'QRIS', 'COMPLETED', '2026-07-26 19:59:29', '2026-07-26 19:59:50'),
	(5, 2, 20000, 'QRIS', 'COMPLETED', '2026-07-26 20:57:42', '2026-07-26 21:06:05'),
	(6, 7, 210000, 'QRIS', 'COMPLETED', '2026-07-26 21:34:29', '2026-07-26 23:17:41'),
	(7, 7, 140000, 'QRIS', 'COMPLETED', '2026-08-02 20:37:10', '2026-08-02 21:16:23'),
	(10, 7, 115000, 'CASH', 'COMPLETED', '2026-08-06 00:46:14', '2026-08-06 00:46:43'),
	(13, 7, 80000, 'QRIS', 'COMPLETED', '2026-08-09 19:03:07', '2026-08-10 18:47:15'),
	(14, 8, 65000, 'CASH', 'COMPLETED', '2026-08-09 19:16:14', '2026-08-09 19:17:28'),
	(15, 8, 0, 'CASH', 'OPEN', '2026-08-10 18:51:49', '2026-08-10 18:51:49'),
	(16, 7, 75000, 'QRIS', 'COMPLETED', '2026-08-19 23:40:16', '2026-08-19 23:40:29');

-- Dumping structure for table pos_riska.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_nama_index` (`nama`),
  KEY `produk_user_id_foreign` (`user_id`),
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.produk: ~7 rows (approximately)
INSERT INTO `produk` (`id`, `user_id`, `foto`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
	(2, 7, 'products/lTy47iP9njWquDbsO0UM04eUOKZM8MCszSA8aDzU.jpg', 'Cookies n Cream', 8000, 10000, 6, '2026-07-26 19:10:54', '2026-08-09 19:17:19'),
	(3, 7, 'products/hKKIscaKA1RFGMVVjXpt6uKojW0wdEu5wVKa3zx4.jpg', 'Brownies', 25000, 30000, 34, '2026-07-26 21:32:30', '2026-08-19 23:40:24'),
	(4, 7, 'products/6nyBCJAzWUfI04sJskGAqd5PXB1up4mEalMXbgdm.jpg', 'CinnamonRoll', 30000, 35000, 28, '2026-07-26 23:12:20', '2026-08-02 21:16:07'),
	(5, 7, 'products/0jaHWIbqgBDldEK00h8sKu0EYfYx8GDySDne1HUM.jpg', 'Croissant', 20000, 25000, 49, '2026-08-02 21:18:30', '2026-08-09 19:17:20'),
	(6, 7, 'products/HOXOzYpdG9GNGoO80aS9WTV8rVVt2ERH3mVll8is.jpg', 'Sourdough', 40000, 45000, 57, '2026-08-02 21:22:06', '2026-08-19 23:40:21'),
	(7, 7, 'products/OkeZ27wrYxILjCgV54VhjCIZVstPrJRC6TyhY2XZ.jpg', 'Apple Pie', 25000, 30000, 49, '2026-08-06 00:08:23', '2026-08-09 18:55:15'),
	(8, 7, 'products/Rg6PblfJTa9UuObQLxLxDrrZ8OCXwvRBqriAiJM9.jpg', 'Frolla', 30000, 35000, 49, '2026-08-10 18:45:42', '2026-08-10 18:46:57');

-- Dumping structure for table pos_riska.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2026-07-22 21:24:16', '2026-07-22 21:24:16'),
	(2, 'kasir', '2026-07-22 21:24:16', '2026-07-22 21:24:16');

-- Dumping structure for table pos_riska.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('iPY70xQ2aSVlycfwy0e48ih1FaycQnKBdOXrLr9g', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV3NKQzc5YThCcm9UNkF2eWt4bzZyMDhGSjBQMFN4YnNvdElEUVlmQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5qdWFsYW4iO3M6NToicm91dGUiO3M6MTU6InBlbmp1YWxhbi5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7fQ==', 1787208030),
	('r9vJsqDcnyy5mWglAyngtUSA2m2MFf0mgcDKgyLR', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoialNYQzVYSjY3bnBDN1BtOWxRSmdrUWhpeVp2SXBYNWFJU0tSa1hrUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5qdWFsYW4/cGFnZT0xIjtzOjU6InJvdXRlIjtzOjE1OiJwZW5qdWFsYW4uaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1786589527);

-- Dumping structure for table pos_riska.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  FULLTEXT KEY `users_name_email_fulltext` (`name`,`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos_riska.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Brigitte Feeney IV', 'yshields@example.net', '2026-07-22 21:24:16', '$2y$12$eINdD4wwKGHBKZlOWMpjreYtVspPSBYio3xrYbO.QAaetf3J11s42', 'q23rKt5hUd', '2026-07-22 21:24:17', '2026-07-22 21:24:17'),
	(2, 2, 'Larry Thompson', 'aimee43@example.org', '2026-07-22 21:24:17', '$2y$12$eINdD4wwKGHBKZlOWMpjreYtVspPSBYio3xrYbO.QAaetf3J11s42', 'OZCS3b1POdGe1AKErTtsvj9qgbABrw3sA9UzDfesszUSyCbX0dpHmPKLefTL', '2026-07-22 21:24:17', '2026-07-22 21:24:17'),
	(7, 1, 'cantika', 'cantika@gmail.com', NULL, '$2y$12$pfO.o8g.azawo.XSANgaGOf6hBWBZ/RBh3QDMk3RSK4axuVQYUIAq', NULL, '2026-07-22 21:28:36', '2026-07-22 21:28:36'),
	(8, 2, 'java', 'javaa@gmail.com', NULL, '$2y$12$TDmjM57xNSc0/Ik0KZdGA.MeaY6D0TGnq9patAXUwSmZakbi3X.1u', NULL, '2026-07-30 19:37:56', '2026-07-30 19:37:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
