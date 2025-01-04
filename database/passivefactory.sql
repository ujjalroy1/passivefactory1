-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2024 at 05:52 AM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vejajafy_passivefactory`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_captchas`
--

CREATE TABLE `assigned_captchas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bought_package_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `used` int(11) NOT NULL DEFAULT 0,
  `start_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bought_packages`
--

CREATE TABLE `bought_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 'i:1;', 1729135580),
('ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4:timer', 'i:1729135580;', 1729135580),
('admon@gmail.com|103.18.169.109', 'i:1;', 1728184267),
('admon@gmail.com|103.18.169.109:timer', 'i:1728184267;', 1728184267);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `captchas`
--

CREATE TABLE `captchas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nft_code` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `eroi` decimal(10,2) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `user_id`, `nft_code`, `project_name`, `price`, `eroi`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, '782112', 'Demo Project', 250.00, 50.00, '14', '2024-10-29 11:51:00', '2024-10-29 11:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_28_181937_create_captchas_table', 1),
(5, '2024_09_30_183951_create_wallets_table', 1),
(6, '2024_10_04_061002_create_packages_table', 1),
(7, '2024_10_07_181204_create_bought_packages_table', 2),
(8, '2024_10_10_133751_create_teams_table', 2),
(9, '2024_10_21_042956_create_assigned_captchas_table', 3),
(10, '2024_10_24_111725_create_projects_table', 3),
(11, '2024_10_24_121242_create_nfts_table', 3),
(12, '2024_10_25_073525_create_suggestions_table', 3),
(13, '2024_10_26_102524_create_myassets_table', 3),
(14, '2024_10_26_172531_create_markets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `myassets`
--

CREATE TABLE `myassets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nft_code` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `eroi` decimal(10,2) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `start_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `myassets`
--

INSERT INTO `myassets` (`id`, `user_id`, `nft_code`, `project_name`, `price`, `eroi`, `duration`, `start_at`, `created_at`, `updated_at`) VALUES
(2, 1, '782112', 'Demo Project', 100.00, 50.00, '14', '2024-11-04 13:16:00', '2024-11-04 13:16:00', '2024-11-04 13:16:00'),
(3, 1, '782112', 'Demo Project', 100.00, 50.00, '14', '2024-11-04 13:20:46', '2024-11-04 13:20:46', '2024-11-04 13:20:46'),
(4, 1, '782112', 'Demo Project', 100.00, 50.00, '14', '2024-11-11 11:55:00', '2024-11-11 11:55:00', '2024-11-11 11:55:00'),
(5, 1, '782112', 'Demo Project', 100.00, 50.00, '14', '2024-11-11 11:55:04', '2024-11-11 11:55:04', '2024-11-11 11:55:04'),
(6, 1, '782112', 'Demo Project', 100.00, 50.00, '14', '2024-11-11 11:55:15', '2024-11-11 11:55:15', '2024-11-11 11:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `nfts`
--

CREATE TABLE `nfts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nft_code` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `eroi` decimal(10,2) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nfts`
--

INSERT INTO `nfts` (`id`, `nft_code`, `project_name`, `price`, `eroi`, `duration`, `created_at`, `updated_at`) VALUES
(1, '782112', 'Demo Project', 100.00, 50.00, '14', '2024-10-29 11:45:58', '2024-10-29 11:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `benifit` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `created_at`, `updated_at`) VALUES
(1, 'Demo Project', '2024-10-29 11:34:19', '2024-10-29 11:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9QCJEm9EWYBNdOSspqdUhGW3hA78sA5rkKh1hQet', NULL, '35.171.144.152', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUzNBQWNCclNyWDdmTEVuQnpKZHVEeE1NNU9PWkhmdkxOc0I1RU9FbSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cHM6Ly9wYXNzaXZlZmFjdG9yeS52ZWphbGluLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwczovL3Bhc3NpdmVmYWN0b3J5LnZlamFsaW4uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733869654),
('DOQrVMuem9fqt75WESKJT3Ua4rEygeQcjjc97xlL', NULL, '35.171.144.152', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWktxbG9PNXJqQ0tVczFqNGFQMU1TM1RGTmJoVnc0QmkwOFNob2htQSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozODoiaHR0cHM6Ly93d3cucGFzc2l2ZWZhY3RvcnkudmVqYWxpbi5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly93d3cucGFzc2l2ZWZhY3RvcnkudmVqYWxpbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733869654),
('ERF1MLsj564YO89QMaipTKBOcbSm9bGX0VCOCOr0', NULL, '35.171.144.152', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYk1hZ3N3b1Y4OEg4REtNSjJhd25KU3JNRTB6OUhWY3NYT3o3eldMYSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cHM6Ly9wYXNzaXZlZmFjdG9yeS52ZWphbGluLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733869654),
('FViQxE8cvyyL7VegnddxZBB6yZzanRTHwahRdBFi', NULL, '54.88.179.33', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNnVISk1TMUtpcEtKNGR5ZTdVMmhxUGNUZWtEcndVMTFiS1FxV1pLNyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cHM6Ly93d3cucGFzc2l2ZWZhY3RvcnkudmVqYWxpbi5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733869653),
('FYEBLrH2O0BlFwA9TkGmLXsoYZDTzIORr4yUu1zU', NULL, '167.94.145.105', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ3BOYW9lVWM4ZVZhS0JVdUY5aWVzb1pDWDVkcVZSaWFlUlJyMVYzaiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cHM6Ly93d3cucGFzc2l2ZWZhY3RvcnkudmVqYWxpbi5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733819301),
('IhOVTq8A5QRu2RZcWpJlu2dmdR2ILKeRM2Li8kod', NULL, '45.248.150.248', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVkhZeGc0NTBTcGtxN3pTRzhzMkw5eWo1eVNxeDNqenNqek5sdmh6SCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cHM6Ly9wYXNzaXZlZmFjdG9yeS52ZWphbGluLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL3Bhc3NpdmVmYWN0b3J5LnZlamFsaW4uY29tL2xvZ2luIjt9czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e319', 1733913448),
('ldkp0j1cDjCbXPkHqxdLoZ3vrNGNxUr86I4f8iZc', NULL, '167.94.145.105', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV0ZnVGNnWm1Md2VnYXNaN2pMMTdSV2tRWHFXa2FBS2hKSUR5bEhkYiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozODoiaHR0cHM6Ly93d3cucGFzc2l2ZWZhY3RvcnkudmVqYWxpbi5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly93d3cucGFzc2l2ZWZhY3RvcnkudmVqYWxpbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733819288),
('MpCVIbMy7hjrCIxNCqHLR5KiRfkxq41fCQ91xr9W', NULL, '35.171.144.152', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjF1eGpaY0xmMEp5T0dxMTFWdUtyMnlzWTA0RnhWd08yZVRLazh2ZiI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cHM6Ly93d3cucGFzc2l2ZWZhY3RvcnkudmVqYWxpbi5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733869655),
('mu0B78MTTATrhVYTKBb5M8ZOqlDLhNEM8ZVckT1J', NULL, '54.88.179.33', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidW15Szg0dDdYemdHN3ZqODFWSDZCV3F4NlQwa2laTWlVcWFRWVF2cyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozODoiaHR0cHM6Ly93d3cucGFzc2l2ZWZhY3RvcnkudmVqYWxpbi5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cHM6Ly93d3cucGFzc2l2ZWZhY3RvcnkudmVqYWxpbi5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733869653),
('pGFRFzcmL5mX0U5u6dcGGCMcpHqiarB87bwNWKhN', 1, '103.156.180.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieVNmSkFpV1hjbm9UTTU4RHRRYm5teWFWaVRzRXNNRVVJenE0MFhLcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cHM6Ly9wYXNzaXZlZmFjdG9yeS52ZWphbGluLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM5OiJodHRwczovL3Bhc3NpdmVmYWN0b3J5LnZlamFsaW4uY29tL2hvbWUiO31zOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1733902250),
('QBfRkdOayYjui4n3E4tMoxiKbzPFPST9T2m0t9w1', NULL, '35.171.144.152', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS2s2RXJnZURSTDlMUFc0d21yWXhFdHE3eGhLblRINDE3N3ExWFVEaSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cHM6Ly9wYXNzaXZlZmFjdG9yeS52ZWphbGluLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733869653),
('ygPyLWlRUfvWdGKVKoT7nxrzonjwLeEMcWtozegE', NULL, '35.171.144.152', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ0Y2NjNPUkhBWVBJbkQ3NlNXNDc1NHRIQ2t5YmdCSkVXUkViV2JDUiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cHM6Ly9wYXNzaXZlZmFjdG9yeS52ZWphbGluLmNvbSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwczovL3Bhc3NpdmVmYWN0b3J5LnZlamFsaW4uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733869653);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nft_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `start_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `user_id`, `nft_id`, `status`, `start_at`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2024-10-29 11:46:43', '2024-11-14 12:46:43', '2024-10-29 11:46:43', '2024-12-11 15:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent` varchar(255) NOT NULL,
  `child` varchar(255) NOT NULL,
  `refer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `account_id` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `auto_password` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `referral_code`, `account_id`, `user_type`, `auto_password`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sourav Das', 'imsourav6400@gmail.com', NULL, NULL, '30375478', 'user', NULL, '2024-10-06 06:05:40', '$2y$12$UjhLSl6qDdmqqclLy4Ydjulli4RtgXRX8YBmb79XhIJBqnEvH2lXe', NULL, '2024-10-06 00:01:40', '2024-10-06 00:01:40'),
(2, 'Sourav Das', 'admin@gmail.com', NULL, NULL, '30375487', 'admin', NULL, '2024-10-06 06:05:40', '$2y$12$UjhLSl6qDdmqqclLy4Ydjulli4RtgXRX8YBmb79XhIJBqnEvH2lXe', NULL, '2024-10-06 00:01:40', '2024-10-06 00:01:40'),
(5, 'Tilok Sarkar', 'colordigitalsign19@gmail.com', NULL, NULL, '39274220', 'user', NULL, NULL, '$2y$12$TXEEHTkfDgKBKIh9Q.75guu3.qBIhrImhJr5yuhIytXvfFesRvRqG', NULL, '2024-10-17 07:23:48', '2024-10-17 07:23:48'),
(6, 'Sourav Das', 'soura.das@w3scloud.com', NULL, NULL, '90392402', 'user', NULL, NULL, '$2y$12$RnfRA4vqef1LLLvj9ZTjJ.JH/s3GHQ/nP0cu.6sikmP9ub.LaGOFS', NULL, '2024-10-17 22:11:01', '2024-10-17 22:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `main_balance` decimal(15,2) NOT NULL,
  `bonus` decimal(15,2) NOT NULL,
  `refer` decimal(15,2) NOT NULL,
  `gift` decimal(15,2) NOT NULL,
  `cash_back` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `account_id`, `main_balance`, `bonus`, `refer`, `gift`, `cash_back`, `created_at`, `updated_at`) VALUES
(1, 1, '30375478', 9999400.00, 0.00, 0.00, 0.00, 0.00, '2024-10-06 00:01:40', '2024-11-11 11:55:15'),
(2, 5, '39274220', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-10-17 07:23:48', '2024-10-17 07:23:48'),
(3, 6, '90392402', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-10-17 22:11:01', '2024-10-17 22:11:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_captchas`
--
ALTER TABLE `assigned_captchas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_captchas_user_id_foreign` (`user_id`),
  ADD KEY `assigned_captchas_bought_package_id_foreign` (`bought_package_id`);

--
-- Indexes for table `bought_packages`
--
ALTER TABLE `bought_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bought_packages_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `captchas`
--
ALTER TABLE `captchas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `markets_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myassets`
--
ALTER TABLE `myassets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `myassets_user_id_foreign` (`user_id`);

--
-- Indexes for table `nfts`
--
ALTER TABLE `nfts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suggestions_user_id_foreign` (`user_id`),
  ADD KEY `suggestions_nft_id_foreign` (`nft_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `referral_code` (`referral_code`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_captchas`
--
ALTER TABLE `assigned_captchas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bought_packages`
--
ALTER TABLE `bought_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `captchas`
--
ALTER TABLE `captchas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `myassets`
--
ALTER TABLE `myassets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nfts`
--
ALTER TABLE `nfts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_captchas`
--
ALTER TABLE `assigned_captchas`
  ADD CONSTRAINT `assigned_captchas_bought_package_id_foreign` FOREIGN KEY (`bought_package_id`) REFERENCES `bought_packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assigned_captchas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bought_packages`
--
ALTER TABLE `bought_packages`
  ADD CONSTRAINT `bought_packages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `markets`
--
ALTER TABLE `markets`
  ADD CONSTRAINT `markets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `myassets`
--
ALTER TABLE `myassets`
  ADD CONSTRAINT `myassets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `suggestions_nft_id_foreign` FOREIGN KEY (`nft_id`) REFERENCES `nfts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `suggestions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
