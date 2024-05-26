-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2024 at 03:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testingsaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint UNSIGNED NOT NULL,
  `id_barang` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `id_barang`, `created_at`, `updated_at`) VALUES
(13, 10, '2024-05-22 08:35:37', '2024-05-22 08:35:37'),
(16, 9, '2024-05-25 08:58:22', '2024-05-25 08:58:22'),
(17, 11, '2024-05-25 09:27:57', '2024-05-25 09:27:57'),
(18, 11, '2024-05-25 09:43:12', '2024-05-25 09:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `alternativescores`
--

CREATE TABLE `alternativescores` (
  `id` bigint UNSIGNED NOT NULL,
  `alternative_id` bigint UNSIGNED NOT NULL,
  `criteria_id` bigint UNSIGNED NOT NULL,
  `rating_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternativescores`
--

INSERT INTO `alternativescores` (`id`, `alternative_id`, `criteria_id`, `rating_id`, `created_at`, `updated_at`) VALUES
(49, 13, 2, 4, '2024-05-22 08:35:37', '2024-05-22 08:35:37'),
(50, 13, 3, 8, '2024-05-22 08:35:37', '2024-05-22 08:35:37'),
(51, 13, 4, 12, '2024-05-22 08:35:37', '2024-05-22 08:35:37'),
(52, 13, 5, 15, '2024-05-22 08:35:37', '2024-05-22 08:35:37'),
(61, 16, 2, 6, '2024-05-25 08:58:22', '2024-05-25 08:58:22'),
(62, 16, 3, 7, '2024-05-25 08:58:22', '2024-05-25 08:58:22'),
(63, 16, 4, 13, '2024-05-25 08:58:22', '2024-05-25 08:58:22'),
(64, 16, 5, 15, '2024-05-25 08:58:22', '2024-05-25 08:58:22'),
(65, 17, 2, 5, '2024-05-25 09:27:57', '2024-05-25 09:27:57'),
(66, 17, 3, 9, '2024-05-25 09:27:57', '2024-05-25 09:27:57'),
(67, 17, 4, 14, '2024-05-25 09:27:57', '2024-05-25 09:27:57'),
(68, 17, 5, 16, '2024-05-25 09:27:57', '2024-05-25 09:27:57'),
(69, 18, 2, 4, '2024-05-25 09:43:12', '2024-05-25 09:43:12'),
(70, 18, 3, 8, '2024-05-25 09:43:12', '2024-05-25 09:43:12'),
(71, 18, 4, 11, '2024-05-25 09:43:12', '2024-05-25 09:43:12'),
(72, 18, 5, 2, '2024-05-25 09:43:12', '2024-05-25 09:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `deskripsi`, `created_at`, `updated_at`, `jumlah`) VALUES
(9, 'AMD Ryzen 9 9800HX', 'CPU', '2024-05-24 19:00:22', '2024-05-25 09:37:18', 20),
(10, 'Intel i7 7800HX', 'CPU', '2024-05-24 19:11:08', '2024-05-25 09:25:30', 50),
(11, 'Philips 24 144Hz', 'Monitor 24 inch', '2024-05-25 09:18:15', '2024-05-25 09:18:15', 10);

-- --------------------------------------------------------

--
-- Table structure for table `criteriaratings`
--

CREATE TABLE `criteriaratings` (
  `id` bigint UNSIGNED NOT NULL,
  `criteria_id` bigint UNSIGNED NOT NULL,
  `rating` double(8,2) NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteriaratings`
--

INSERT INTO `criteriaratings` (`id`, `criteria_id`, `rating`, `description`, `created_at`, `updated_at`) VALUES
(2, 5, 0.25, 'KW', '2023-06-03 07:59:38', '2024-05-25 09:27:10'),
(3, 2, 1.00, 'murah', '2023-06-03 07:59:59', '2023-06-03 07:59:59'),
(4, 2, 0.75, 'cukup murah', '2023-06-03 08:00:14', '2023-06-03 08:00:14'),
(5, 2, 0.50, 'mahal', '2023-06-03 08:00:27', '2023-06-03 08:00:27'),
(6, 2, 0.25, 'Sangat Mahal', '2023-06-03 08:00:41', '2023-06-03 08:00:41'),
(7, 3, 1.00, 'Sangat Cepat', '2023-06-03 08:00:59', '2023-06-03 08:00:59'),
(8, 3, 0.75, 'Cepat', '2023-06-03 08:01:09', '2023-06-03 08:01:09'),
(9, 3, 0.50, 'Cukup Cepat', '2023-06-03 08:01:25', '2023-06-03 08:01:25'),
(10, 3, 0.25, 'Lambat', '2023-06-03 08:01:33', '2023-06-03 08:01:33'),
(11, 4, 1.00, 'Sangat Baik', '2023-06-03 08:01:45', '2023-06-03 08:01:45'),
(12, 4, 0.75, 'Cukup Baik', '2023-06-03 08:01:57', '2023-06-03 08:01:57'),
(13, 4, 0.50, 'Baik', '2023-06-03 08:02:38', '2023-06-03 08:02:38'),
(14, 4, 0.25, 'Cukup Baik', '2023-06-03 08:02:54', '2023-06-03 08:02:54'),
(15, 5, 1.00, 'Original', '2023-06-03 08:03:30', '2023-06-03 08:03:30'),
(16, 5, 0.50, 'Barang Reject', '2024-05-25 09:26:42', '2024-05-25 09:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `criteriaweights`
--

CREATE TABLE `criteriaweights` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('benefit','cost') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double(8,2) NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteriaweights`
--

INSERT INTO `criteriaweights` (`id`, `name`, `type`, `weight`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Harga', 'cost', 0.30, 'Penting', '2023-06-03 07:57:48', '2023-06-03 07:57:48'),
(3, 'Service', 'benefit', 0.20, 'Cukup Penting', '2023-06-03 07:58:04', '2024-05-24 21:18:51'),
(4, 'After Sale', 'benefit', 0.10, 'Tidak Terlalu Penting', '2023-06-03 07:58:21', '2024-05-24 21:18:42'),
(5, 'Kualitas', 'benefit', 0.40, 'Sangat Penting', '2023-06-03 07:59:02', '2023-06-03 07:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id` int NOT NULL,
  `nama_gudang` varchar(100) DEFAULT NULL,
  `lokasi_gudang` varchar(100) DEFAULT NULL,
  `kapasitas_gudang` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id`, `nama_gudang`, `lokasi_gudang`, `kapasitas_gudang`, `created_at`, `updated_at`) VALUES
(1, 'Gudang A', 'Jl. Malang', 10001, '2024-05-25 03:54:00', '2024-05-25 03:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int NOT NULL,
  `nama_kendaraan` varchar(50) DEFAULT NULL,
  `jenis_kendaraan` varchar(50) DEFAULT NULL,
  `kapasitas_muatan` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama_kendaraan`, `jenis_kendaraan`, `kapasitas_muatan`, `created_at`, `updated_at`) VALUES
(1, 'Mercedes', 'Container', 1000, '2024-05-25 02:42:43', '2024-05-25 02:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_30_045911_create_barang_table', 1),
(7, '2023_04_30_050200_create_supplier_table', 1),
(8, '2023_05_02_034911_create_riwayat_pembelian_table', 1),
(9, '2023_05_03_074041_create_alternatives_table', 1),
(10, '2023_05_03_074138_create_criteriaweights_table', 1),
(11, '2023_05_03_074223_create_criteriaratings_table', 1),
(12, '2023_05_03_074332_create_alternativescores_table', 1),
(13, '2023_05_20_095337_create_testimoni_table', 1),
(14, '2023_05_23_075551_create_feedback_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('2218025@scholar.itn.ac.id', '$2y$10$uwzQkSiMp0oBNeL/VN8GO.DL4IhpDfY64yWqVM8ZJZzoMAPYLKQBG', '2024-05-24 21:12:45'),
('it@gmail.com', '$2y$10$TQdnYhKkBu1tteSGKnDR5us2yPgRKqKwQdGnjRnAwtZkokLgzoF0W', '2023-06-02 08:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Supplier A', 'jl.yaaa', '123', '2023-05-24 08:14:59', '2023-05-24 08:14:59'),
(2, 'Supplier B', 'jl.ajadulu', '456', '2023-05-24 08:15:06', '2023-05-24 08:15:06'),
(3, 'Supplier C', 'jl.kemana gitu', '789', '2023-05-24 08:15:13', '2023-05-24 08:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int NOT NULL,
  `nama_toko` varchar(50) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `nama_toko`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Toko Komputer', 'Jl. Malang', '2024-05-25 07:10:19', '2024-05-25 07:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'DzuNa', 'dzuna@gmail.com', NULL, 0, '$2y$10$vYanSKkc75mN2S3Pn10zIO574XReCFs36m7uU1mQVDjBAxdpwfZ0S', NULL, '2024-05-24 21:15:21', '2024-05-24 21:15:21'),
(3, 'Dzulfidho Wijianto Putra', '2218025@scholar.itn.ac.id', NULL, 0, '$2y$10$bqfhItQbu8ecOY8zwgwJ9OwEUNfBMR2uusD5dPtcZm9ocp8qcRifu', NULL, '2024-05-25 08:07:35', '2024-05-25 08:07:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `alternativescores`
--
ALTER TABLE `alternativescores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternativescores_alternative_id_foreign` (`alternative_id`),
  ADD KEY `alternativescores_criteria_id_foreign` (`criteria_id`),
  ADD KEY `alternativescores_rating_id_foreign` (`rating_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteriaratings`
--
ALTER TABLE `criteriaratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteriaratings_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `criteriaweights`
--
ALTER TABLE `criteriaweights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `alternativescores`
--
ALTER TABLE `alternativescores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `criteriaratings`
--
ALTER TABLE `criteriaratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `criteriaweights`
--
ALTER TABLE `criteriaweights`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `alternativescores`
--
ALTER TABLE `alternativescores`
  ADD CONSTRAINT `alternativescores_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`),
  ADD CONSTRAINT `alternativescores_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criteriaweights` (`id`),
  ADD CONSTRAINT `alternativescores_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `criteriaratings` (`id`);

--
-- Constraints for table `criteriaratings`
--
ALTER TABLE `criteriaratings`
  ADD CONSTRAINT `criteriaratings_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criteriaweights` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
