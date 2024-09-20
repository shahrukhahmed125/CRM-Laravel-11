-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 06:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `dob`, `company`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shahzaib', 'Khan', 'shahzaibahmed3821@gmail.com', '03146556456', 'A 40 Block B Burma Shell Society North Nazimabad Karachi pakistan', '2000-06-12', 'SoftTech', 'Active', '2024-09-01 06:50:15', '2024-09-16 11:45:06'),
(2, 'Syed', 'Shahrukh Ahmed', 'shahrukhahmed125@gmail.com', '03146556714', 'A 36 Block B Burma Shell Society North Nazimabad', '2000-06-12', 'IconicDev', 'Active', '2024-09-01 06:50:27', '2024-09-01 06:50:27'),
(3, 'Aliya', 'Khan', 'aliya@gmail.com', '03145556765', 'Ocean Towers، 5Th, Khayaban-e-Iqbal, Block 9 Clifton, Karachi, Karachi City, Sindh 75600, Pakistan', '2000-04-12', 'IconicDev', 'Not Active', '2024-09-01 06:50:56', '2024-09-01 06:50:56'),
(4, 'Iqra', 'Ali', 'shahzaibali3821@gmail.com', '03146556456', 'A 40 Block B Burma Shell Society North Nazimabad Karachi', '2000-04-10', 'SoftTech', 'Active', '2024-09-01 06:51:36', '2024-09-15 06:13:18'),
(5, 'Jon', 'Snow', 'jon@gmail.com', '03145466765', 'McDonald’s DM Hyderi، Shop # K-3, Dolmen Mall Hydri، D-14, Block C North Nazimabad Town, Karachi, Karachi City, Sindh 75500', NULL, 'IconicDev', 'Select Status', '2024-09-16 11:46:28', '2024-09-16 11:57:58'),
(6, 'Farhan', 'Ali', 'farhan@gmail.com', '03146556714', 'A 36 Block B Burma Shell Society North Nazimabad', '2024-09-17', 'IconicDev', 'Active', '2024-09-17 12:24:05', '2024-09-17 12:24:05'),
(7, 'yahya', 'zain', 'yahya@gmail.com', '03145466765', 'McDonald’s DM Hyderi، Shop # K-3, Dolmen Mall Hydri، D-14, Block C North Nazimabad Town, Karachi, Karachi City, Sindh 75500', '2024-09-17', 'HiTech', 'Not Active', '2024-09-17 12:28:48', '2024-09-17 12:28:48'),
(8, 'Hamza', 'Shah', 'hamza@gmail.com', '03164598752', 'A-50 Block B Burma Shell Society, North Nazimabad Karachi.', '1998-09-20', 'Aptech', 'Active', '2024-09-20 05:57:55', '2024-09-20 05:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deal_name` varchar(255) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `pipeline_id` bigint(20) UNSIGNED NOT NULL,
  `deal_value` decimal(15,2) NOT NULL,
  `closing_date` date DEFAULT NULL,
  `stage` varchar(255) NOT NULL DEFAULT 'New',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `deal_name`, `customer_id`, `pipeline_id`, `deal_value`, `closing_date`, `stage`, `user_id`, `notes`, `created_at`, `updated_at`) VALUES
(4, 'New Deal2', 4, 5, 100.00, '2024-09-15', 'new', 2, 'asdasdas qwqw', '2024-09-15 06:04:05', '2024-09-16 11:55:50'),
(5, 'old Deal', 2, 6, 10.00, '2024-09-27', 'new', 1, 'dasdasda', '2024-09-16 04:59:59', '2024-09-16 04:59:59'),
(7, 'New Deal3', 5, 6, 10.00, '2024-09-16', 'mid', 2, 'testing', '2024-09-16 11:56:37', '2024-09-16 11:56:37'),
(8, 'Winter Season', 8, 6, 1000.00, '2025-02-28', 'Start', 1, 'this for test. only', '2024-09-20 05:59:18', '2024-09-20 05:59:18');

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
-- Table structure for table `interactions`
--

CREATE TABLE `interactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('call','email','meeting') NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interactions`
--

INSERT INTO `interactions` (`id`, `user_id`, `customer_id`, `type`, `details`, `date`, `created_at`, `updated_at`) VALUES
(4, 1, 3, 'meeting', 'Discussion for upcoming projects.', '2024-03-20', '2024-09-05 04:05:00', '2024-09-05 04:05:00'),
(5, 1, 2, 'meeting', 'this for testing reminders notifications', '2024-09-10', '2024-09-10 06:14:04', '2024-09-10 06:14:04'),
(6, 1, 4, 'meeting', 'testing notifications', '2024-09-10', '2024-09-10 06:20:24', '2024-09-10 06:20:24'),
(7, 1, 1, 'meeting', 'asdasdad', '2024-09-11', '2024-09-11 05:16:45', '2024-09-11 05:16:45'),
(8, 1, 3, 'meeting', 'This is the test for notification using helper.php', '2024-09-11', '2024-09-11 05:33:33', '2024-09-11 05:33:33'),
(9, 1, 2, 'meeting', 'sadasd', '2024-09-11', '2024-09-11 06:12:00', '2024-09-11 06:12:00'),
(10, 3, 2, 'meeting', 'sfdsfds this working 4', '2024-09-11', '2024-09-11 06:17:07', '2024-09-16 12:00:42'),
(11, 3, 3, 'meeting', 'dasdasd', '2024-09-11', '2024-09-11 06:23:11', '2024-09-11 06:23:11'),
(12, 1, 1, 'meeting', 'dasda', '2024-09-11', '2024-09-11 06:26:10', '2024-09-11 06:26:10'),
(13, 1, 2, 'meeting', 'fsdfsdf', '2024-09-12', '2024-09-12 06:23:29', '2024-09-12 06:23:29'),
(14, 1, 3, 'meeting', 'dasdad', '2024-09-12', '2024-09-12 06:39:20', '2024-09-12 06:39:20'),
(15, 1, 2, 'meeting', 'This is the test for notifications', '2024-09-12', '2024-09-12 07:04:22', '2024-09-12 07:04:22'),
(16, 1, 2, 'meeting', 'this test2 for nitify', '2024-09-12', '2024-09-12 07:25:49', '2024-09-12 07:25:49'),
(17, 1, 3, 'meeting', 'this tes3', '2024-09-12', '2024-09-12 07:27:46', '2024-09-12 07:27:46'),
(18, 1, 2, 'meeting', 'dasdasd', '2024-09-12', '2024-09-12 07:56:03', '2024-09-12 07:56:03'),
(19, 1, 4, 'meeting', 'dasdasd', '2024-09-12', '2024-09-12 08:00:21', '2024-09-12 08:00:21'),
(20, 2, 2, 'meeting', 'this is working test using windows task scheduler 3', '2024-09-12', '2024-09-12 08:05:29', '2024-09-16 11:45:47'),
(21, 2, 4, 'meeting', 'This is a test using', '2024-09-13', '2024-09-13 06:37:48', '2024-09-13 06:37:48'),
(22, 2, 3, 'meeting', 'thios is for update and edit\r\nnow updated', '2024-09-15', '2024-09-15 06:57:01', '2024-09-15 07:10:01'),
(23, 2, 3, 'meeting', 'this is testing interaction for sales dashboard', '2024-09-16', '2024-09-16 05:20:08', '2024-09-16 05:27:46'),
(24, 1, 3, 'meeting', 'this route changing to admin', '2024-09-16', '2024-09-16 07:02:01', '2024-09-16 07:02:01'),
(25, 2, 4, 'email', 'dasdasd', '2024-09-16', '2024-09-16 07:14:09', '2024-09-16 07:14:09'),
(26, 3, 3, 'call', 'dasdad', '2024-09-16', '2024-09-16 07:20:39', '2024-09-16 07:20:39'),
(27, 2, 5, 'meeting', 'test', '2024-09-16', '2024-09-16 11:47:26', '2024-09-16 11:47:26'),
(28, 3, 5, 'call', 'winter is here', '2024-09-16', '2024-09-16 12:01:41', '2024-09-16 12:01:41');

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
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2024_08_23_112049_create_permission_tables', 2),
(9, '2024_08_27_111027_create_customers_table', 3),
(12, '2024_09_01_115800_create_interactions_table', 4),
(14, '2024_09_05_090629_create_pipelines_table', 5),
(15, '2024_09_05_153308_create_deals_table', 6),
(16, '2024_09_08_100608_create_reminders_table', 7),
(17, '2024_09_08_101950_create_notifications_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('021ee7af-4768-400f-beae-71ea17f4a9c8', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 2, '{\"interaction_id\":25,\"interaction_type\":\"email\",\"interaction_details\":\"dasdasd\",\"reminder_at\":\"2024-09-16 12:14:09\",\"user_id\":2}', NULL, '2024-09-17 06:40:04', '2024-09-17 06:40:04'),
('27356988-7ad3-4593-beac-53b69a93473f', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 2, '{\"interaction_id\":23,\"interaction_type\":\"meeting\",\"interaction_details\":\"this is testing interaction for sales dashboard\",\"reminder_at\":\"2024-09-16 11:40:00\",\"user_id\":2}', NULL, '2024-09-16 06:40:04', '2024-09-16 06:40:04'),
('4bdd5b8c-d8fd-4939-aae8-c85d7c17fb52', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 3, '{\"interaction_id\":28,\"interaction_type\":\"call\",\"interaction_details\":\"winter is here\",\"reminder_at\":\"2024-09-16 17:01:41\",\"user_id\":3}', NULL, '2024-09-17 06:40:04', '2024-09-17 06:40:04'),
('4c792604-3856-4b04-832d-ff37b1e654a5', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 1, '{\"interaction_id\":20,\"interaction_type\":\"meeting\",\"interaction_details\":\"this is working test using windows task scheduler\",\"reminder_at\":\"2024-09-12 13:10:00\",\"user_id\":1}', NULL, '2024-09-12 08:10:53', '2024-09-12 08:10:53'),
('561f7a27-aafc-49fc-b85e-573d8f20dd23', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 1, '{\"interaction_id\":19,\"interaction_type\":\"meeting\",\"interaction_details\":\"dasdasd\",\"reminder_at\":\"2024-09-12 13:02:00\",\"user_id\":1}', NULL, '2024-09-12 08:02:00', '2024-09-12 08:02:00'),
('75ebcdd9-1f13-430a-87b9-ba40b03324ee', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 3, '{\"interaction_id\":10,\"interaction_type\":\"meeting\",\"interaction_details\":\"sfdsfds this working 4\",\"reminder_at\":\"2024-09-16 12:20:00\",\"user_id\":3}', NULL, '2024-09-17 06:40:04', '2024-09-17 06:40:04'),
('7df0ad7b-510a-45df-9212-376406693a19', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 3, '{\"interaction_id\":10,\"interaction_type\":\"meeting\",\"interaction_details\":\"sfdsfds this working\",\"reminder_at\":\"2024-09-16 10:51:49\",\"user_id\":3}', NULL, '2024-09-16 06:40:04', '2024-09-16 06:40:04'),
('9216d6b1-b8e4-4fa0-bfc7-a29c712e841c', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 2, '{\"interaction_id\":20,\"interaction_type\":\"meeting\",\"interaction_details\":\"this is working test using windows task scheduler 3\",\"reminder_at\":\"2024-09-16 12:13:00\",\"user_id\":2}', NULL, '2024-09-17 06:40:04', '2024-09-17 06:40:04'),
('a5cde7ea-01f7-4410-9e04-0c3cb236c554', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 2, '{\"interaction_id\":27,\"interaction_type\":\"meeting\",\"interaction_details\":\"test\",\"reminder_at\":\"2024-09-16 16:47:26\",\"user_id\":2}', NULL, '2024-09-17 06:40:04', '2024-09-17 06:40:04'),
('d07df0f8-e5ba-44c2-a775-d74eef4c6bde', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 3, '{\"interaction_id\":26,\"interaction_type\":\"call\",\"interaction_details\":\"dasdad\",\"reminder_at\":\"2024-09-16 12:20:40\",\"user_id\":3}', NULL, '2024-09-17 06:40:04', '2024-09-17 06:40:04'),
('d215b03d-c722-447d-a5d0-ae0b2db5631c', 'App\\Notifications\\ReminderNotification', 'App\\Models\\User', 1, '{\"interaction_id\":21,\"interaction_type\":\"meeting\",\"interaction_details\":\"This is a test using\",\"reminder_at\":\"2024-09-13 11:40:00\",\"user_id\":1}', NULL, '2024-09-13 06:40:01', '2024-09-13 06:40:01');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pipelines`
--

CREATE TABLE `pipelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipelines`
--

INSERT INTO `pipelines` (`id`, `name`, `description`, `position`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Sales Representative', 'this is for test pipline', 2, '2024-09-05 10:51:40', '2024-09-05 10:51:40', 1),
(5, 'Ali Zain', 'dasdad new', 3, '2024-09-15 06:03:31', '2024-09-15 06:11:35', 1),
(6, 'The City School', 'dsahjg test', 10, '2024-09-16 04:59:28', '2024-09-16 11:12:30', 2),
(7, 'Syed Shahrukh Ahmed', 'test', 12, '2024-09-16 11:10:25', '2024-09-16 11:10:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interaction_id` bigint(20) UNSIGNED NOT NULL,
  `reminder_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('dryq4JbipDIx8D03GenFTqM3LUT6EEdQ764cJEUY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IjIxOXhQaFJrak90QnhTZFFUcG9HRGxURGJGMHlGT2U5dTRuMkxoUXciO30=', 1726849198),
('FtV2go8ZbfEkp9P0d2T9l1ZW5NNhxNxJ6NfNcMSG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidEhveTFWb25mNlVENFVOTVJ2RFBaRTFBZkhHRkZhU3VrRk1tRDd5UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9BZG1pbi9ub3RpZmljYXRpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1726836955),
('I9mPso3IIaevjvSljDN0BwGLhDD9oot6xViXSPIu', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL1NhbGVzRGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6Ik44b2V6d2l3RDlvYTNkbEFnTXN0ejQ3RTIxTVQ1Mlh6Y0hBVVRxMWwiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1726836882),
('LXP2ZBfKJmFMkZtGFtBRVrnZXUJ99Y7AHRGesKNE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IjFOcDNaMklzUnJ4TjdlM0hkaEZIeEQxckFQMkg0UmdxVHdmQXVOZ0YiO30=', 1726849515);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123@gmail.com', '2024-08-22 07:33:11', '$2y$12$URZse0kkftYraFwVw7.5cOEEELtIUqdovT4X6a2wltMZLotq7pTJi', 'admin', 'zkjlqQNNEugIdhjjTP4TsrvUq07jCPwoiSVVDX6GOqi6sThAmeEM44ajSeq9', '2024-08-22 07:33:11', '2024-08-27 05:58:56'),
(2, 'Ali Khan', 'ali@gmail.com', '2024-08-22 07:33:11', '$2y$12$msJXonbJAWvykvu0.wPQJ.XKo3wazUZW.JofB.B7pjg.szkTVZ7Iu', 'sales', '5WWCDS3FHd107jbC8InYcaJvZvdqzmixYjDpC1q8L8d5P06QmFQefgO7MTAC', '2024-08-22 07:33:12', '2024-08-24 07:08:30'),
(3, 'Zain Khatri', 'zain@gmail.com', '2024-08-22 07:33:12', '$2y$12$73jMm/VdcdmdAUruysI9euZ1.fkZhyHg66yf0A9TzYU2IC50PEFvi', 'support', 'cTcKJx4YZNaAKkuQK3a7JJX0w8a0sLjNCOhiizTbYJcXv5J8s1rLpJ7UQxrl', '2024-08-22 07:33:12', '2024-09-20 11:04:04'),
(4, 'Syed Shahrukh Ahmed', 'shahrukhahmed125@gmail.com', '2024-09-07 19:00:00', '$2y$12$kqfRa9EEUeDa9fv7xf/u2OXo75t1fTsGqAFS697qzUC1Zl26iAdUu', 'admin', NULL, '2024-09-08 04:45:00', '2024-09-08 06:41:45'),
(5, 'Farhan Ali', 'farhan123@gmail.com', NULL, '$2y$12$HOynUYdtlYMt1Dla2MOQaeIiRTFbqe9KUVxpgmmB632QpGMUZxjwW', 'user', NULL, '2024-09-08 07:17:18', '2024-09-17 07:12:01'),
(13, 'Aliya ALi', 'aliya@gmail.com', NULL, '$2y$12$t3n/ON/yOJ0nh9LeoKbDI.UOAVFJTCuVtJG6kKfIvJhz3X6aPAA6u', 'user', NULL, '2024-09-20 11:25:10', '2024-09-20 11:25:10');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deals_customer_id_foreign` (`customer_id`),
  ADD KEY `deals_pipeline_id_foreign` (`pipeline_id`),
  ADD KEY `deals_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `interactions`
--
ALTER TABLE `interactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interactions_user_id_foreign` (`user_id`),
  ADD KEY `interactions_customer_id_foreign` (`customer_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `pipelines`
--
ALTER TABLE `pipelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminders_interaction_id_foreign` (`interaction_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interactions`
--
ALTER TABLE `interactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pipelines`
--
ALTER TABLE `pipelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deals_pipeline_id_foreign` FOREIGN KEY (`pipeline_id`) REFERENCES `pipelines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `interactions`
--
ALTER TABLE `interactions`
  ADD CONSTRAINT `interactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_interaction_id_foreign` FOREIGN KEY (`interaction_id`) REFERENCES `interactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
