-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 11:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhakacitynorth`
--
CREATE DATABASE IF NOT EXISTS `dhakacitynorth` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dhakacitynorth`;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `d_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `d_name`, `created_at`, `updated_at`) VALUES
(1, 'Presindent', '2022-05-17 05:03:07', '2022-05-17 05:03:07'),
(2, 'Secreatry', '2022-05-17 05:03:40', '2022-05-17 05:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_14_115859_parlament_seat', 1),
(6, '2022_05_14_121148_parlament', 2),
(9, '2022_05_17_070746_create_designation_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mp_details`
--

CREATE TABLE `mp_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `mp_name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mp_phone` int(11) NOT NULL,
  `mp_nid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mp_details`
--

INSERT INTO `mp_details` (`id`, `p_id`, `mp_name`, `mp_phone`, `mp_nid`, `created_at`, `updated_at`) VALUES
(1, 2, 'Salman', 1988406007, 1265435489, '2022-05-17 03:18:19', '2022-05-17 03:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `parlament_seat`
--

CREATE TABLE `parlament_seat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parlament_seat`
--

INSERT INTO `parlament_seat` (`id`, `name`, `no`, `created_at`, `updated_at`) VALUES
(2, 'Dhaka', 121, '2022-05-14 08:48:46', '2022-05-14 08:48:46'),
(5, 'Dhaka', 452, '2022-05-15 12:13:51', '2022-05-15 12:13:51'),
(6, 'Dhaka', 21, '2022-05-15 12:19:04', '2022-05-16 03:12:37'),
(7, 'Dhaka', 444, '2022-05-17 08:37:09', '2022-05-17 08:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `police_stations`
--

CREATE TABLE `police_stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PS_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `P_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `police_stations`
--

INSERT INTO `police_stations` (`id`, `PS_name`, `P_id`, `created_at`, `updated_at`) VALUES
(1, 'Sher-e-bangla Nagar', 1, '2022-05-14 06:38:07', '2022-05-14 06:38:07'),
(2, 'Adabar', 1, '2022-05-14 07:20:09', '2022-05-14 07:20:09'),
(3, 'Adabar', 3, '2022-05-14 08:36:06', '2022-05-14 08:36:06'),
(4, 'gulshan', 4, '2022-05-14 08:36:19', '2022-05-14 08:36:19'),
(5, 'Sher-e-bangla Nagar', 5, '2022-05-14 08:40:11', '2022-05-14 08:40:11'),
(6, 'basabo', 1, '2022-05-14 08:49:03', '2022-05-14 08:49:03'),
(8, 'Adabar', 4, '2022-05-15 07:54:26', '2022-05-15 07:54:26'),
(9, 'Dhanmondi', 4, '2022-05-15 07:54:47', '2022-05-15 07:54:47'),
(10, 'MIrpur-1', 2, '2022-05-15 07:55:15', '2022-05-15 07:55:15'),
(11, 'mirpur-2', 2, '2022-05-15 07:55:48', '2022-05-15 07:55:48'),
(12, 'mirpur-3', 2, '2022-05-15 07:55:59', '2022-05-15 07:55:59'),
(14, 'polton', 5, '2022-05-15 12:14:13', '2022-05-15 12:14:13'),
(15, 'Shahabag', 5, '2022-05-15 12:14:32', '2022-05-15 12:14:32'),
(16, 'Dhanmondi', 6, '2022-05-15 12:19:36', '2022-05-15 12:19:36'),
(17, 'Bosila', 6, '2022-05-15 12:19:50', '2022-05-15 12:19:50'),
(18, 'Mohammodpur', 6, '2022-05-15 12:20:13', '2022-05-15 12:20:13'),
(19, 'Tilla', 6, '2022-05-16 08:57:22', '2022-05-16 08:57:22'),
(20, 'Rajbari', 6, '2022-05-18 00:31:22', '2022-05-18 00:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `police_station_responsible_parsons`
--

CREATE TABLE `police_station_responsible_parsons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `ps_id` bigint(20) UNSIGNED NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `rp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_phone` int(11) NOT NULL,
  `rp_nid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `police_station_responsible_parsons`
--

INSERT INTO `police_station_responsible_parsons` (`id`, `p_id`, `ps_id`, `d_id`, `rp_name`, `rp_phone`, `rp_nid`, `created_at`, `updated_at`) VALUES
(7, 2, 11, 1, 'nobir', 32165123, 241562, '2022-05-17 06:25:54', '2022-05-17 06:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `ps_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `union_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `p_id`, `ps_id`, `w_id`, `union_name`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 6, 'Parbat', '2022-05-16 06:05:20', '2022-05-16 06:05:20'),
(3, 2, 11, 5, 'Parbats', '2022-05-16 09:19:03', '2022-05-16 09:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `unit_r_p_s`
--

CREATE TABLE `unit_r_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `ps_id` bigint(20) UNSIGNED NOT NULL,
  `w_id` bigint(20) UNSIGNED NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `rp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_phone` int(11) NOT NULL,
  `rp_nid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `ps_id` int(11) NOT NULL,
  `w_number` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `p_id`, `ps_id`, `w_number`, `updated_at`, `created_at`) VALUES
(1, 2, 2, 23, '2022-05-16 04:01:48', '2022-05-16 04:01:48'),
(3, 5, 14, 1, '2022-05-16 04:44:57', '2022-05-16 04:44:57'),
(5, 2, 11, 2, '2022-05-16 05:50:36', '2022-05-16 05:50:36'),
(7, 6, 18, 1, '2022-05-17 09:17:35', '2022-05-17 09:17:35'),
(8, 6, 17, 5, '2022-05-18 00:32:15', '2022-05-18 00:32:15'),
(9, 6, 18, 4, '2022-05-18 00:32:35', '2022-05-18 00:32:35'),
(10, 6, 16, 1, '2022-05-18 00:33:00', '2022-05-18 00:33:00'),
(11, 5, 5, 12, '2022-05-18 01:12:43', '2022-05-18 01:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `word_rps`
--

CREATE TABLE `word_rps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `ps_id` bigint(20) UNSIGNED NOT NULL,
  `w_id` bigint(20) UNSIGNED NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `rp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_phone` int(11) NOT NULL,
  `rp_nid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `word_rps`
--

INSERT INTO `word_rps` (`id`, `p_id`, `ps_id`, `w_id`, `d_id`, `rp_name`, `rp_phone`, `rp_nid`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 5, 1, 'nobir', 54654, 56456, '2022-05-17 07:33:31', '2022-05-17 07:33:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mp_details`
--
ALTER TABLE `mp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parlament_seat`
--
ALTER TABLE `parlament_seat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `police_stations`
--
ALTER TABLE `police_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police_station_responsible_parsons`
--
ALTER TABLE `police_station_responsible_parsons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_r_p_s`
--
ALTER TABLE `unit_r_p_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `word_rps`
--
ALTER TABLE `word_rps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mp_details`
--
ALTER TABLE `mp_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parlament_seat`
--
ALTER TABLE `parlament_seat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `police_stations`
--
ALTER TABLE `police_stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `police_station_responsible_parsons`
--
ALTER TABLE `police_station_responsible_parsons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit_r_p_s`
--
ALTER TABLE `unit_r_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `word_rps`
--
ALTER TABLE `word_rps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
