-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 05:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beshkichu`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `summary`, `created_at`, `updated_at`) VALUES
(1, 'Capture.JPG', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cumque doloribus repudiandae provident sequi incidunt veniam neque, reiciendis commodi dicta nemo deserunt beatae ea aperiam ratione quaerat ab. Excepturi et doloribus numquam dolores aperiam accusantium nobis voluptatum, eveniet ut in error fuga veniam consequuntur nostrum exercitationem voluptate ratione nam officiis nemo amet, facere, iste quasi provident cumque. Numquam rem nulla incidunt suscipit! Illum', '2021-11-23 14:20:35', '2021-11-23 08:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_words` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_registration` tinyint(4) DEFAULT 1 COMMENT '1 = disabled, 2 = enabled',
  `new_login` tinyint(4) DEFAULT 1 COMMENT '1 = disabled, 2 = enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `site_title`, `tagline`, `logo`, `icon`, `key_words`, `new_registration`, `new_login`, `created_at`, `updated_at`) VALUES
(1, 'Beshkichu.com', 'Beshkichu Sourching', 'beshkichucom-2021_10_25-logo.png', 'beshkichucom-2021_10_23-icon.png', 'ecommerce, shop, wholsale', 2, 2, '2021-10-23 14:05:04', '2021-10-25 07:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `street_adress1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_adress2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `user_id`, `name`, `company`, `phone`, `email`, `region_id`, `district_id`, `upazila_id`, `street_adress1`, `street_adress2`, `zip_code`, `note`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 34, 'Anik Kumar Nandi', NULL, '01783674575', 'anik.mbf@gmail.com', 5, 42, 332, 'Atharabari,', NULL, NULL, NULL, 'cod', '2021-11-16 02:50:16', '2021-11-16 02:50:16'),
(2, 34, 'Anik Kumar Nandi', NULL, '01783674575', 'anik.mbf@gmail.com', 5, 42, 332, 'Atharabari,', NULL, NULL, NULL, 'cod', '2021-11-18 07:53:03', '2021-11-18 07:53:03'),
(3, 34, 'Anik Kumar Nandi', NULL, '01783674575', 'anik.mbf@gmail.com', 5, 42, 332, 'Atharabari,', NULL, NULL, NULL, 'cod', '2021-11-18 07:55:07', '2021-11-18 07:55:07'),
(4, 34, 'Anik Kumar Nandi', NULL, '01783674575', 'anik.mbf@gmail.com', 5, 42, 332, 'Atharabari,', NULL, NULL, NULL, 'cod', '2021-11-18 07:57:07', '2021-11-18 07:57:07'),
(5, 34, 'Anik Kumar Nandi', NULL, '01783674575', 'anik.mbf@gmail.com', 5, 42, 332, 'Atharabari,', NULL, NULL, NULL, 'cod', '2021-11-18 09:11:20', '2021-11-18 09:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cookie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Woman Fashion', 'woman-fashion', 'woman-fashion-2021_10_31_09_00_071635670807.jpg', '2021-10-10 23:55:50', '2021-10-31 03:00:07', NULL),
(5, 'Men Fashion', 'men-fashion', 'men-fashion-2021_10_31_08_55_291635670529.jpg', '2021-10-10 23:55:57', '2021-10-31 02:55:29', NULL),
(8, 'Kids Fashion', 'kids-fashion', 'kids-fashion-2021_10_31_08_51_361635670296.jpg', '2021-10-31 02:39:03', '2021-10-31 02:51:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_informations`
--

CREATE TABLE `contact_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` int(20) NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_informations`
--

INSERT INTO `contact_informations` (`id`, `email`, `phone`, `division_id`, `district_id`, `upazila_id`, `street_address`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'support@beshkichu.com', NULL, 5, 5, 334, 'C.O Office, R.K Mission Road', 2200, '2021-10-31 12:55:04', '2021-11-01 06:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `contact_mobiles`
--

CREATE TABLE `contact_mobiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_mobiles`
--

INSERT INTO `contact_mobiles` (`id`, `number`, `created_at`, `updated_at`) VALUES
(10, '01984938473', '2021-11-01 06:54:12', '2021-11-01 06:54:12'),
(11, '01783674575', '2021-11-08 12:32:37', '2021-11-08 12:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer_personal_information`
--

CREATE TABLE `customer_personal_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `street_address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_personal_information`
--

INSERT INTO `customer_personal_information` (`id`, `user_id`, `username`, `mobile`, `birth_date`, `gender`, `region_id`, `district_id`, `upazila_id`, `street_address1`, `street_address2`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 31, '61778d59effcc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-25 23:08:41', '2021-10-25 23:08:41'),
(2, 34, 'anik', '01783674575', '2000-03-24', 'male', 5, 42, 332, 'Atharabari,', NULL, NULL, '2021-10-25 23:16:35', '2021-10-30 05:06:35'),
(3, 35, 'surjo-nandis', NULL, '2021-12-09', 'male', 5, 42, 332, 'Atharabari', NULL, 2200, '2021-10-26 04:33:18', '2021-11-02 11:02:55'),
(4, 36, 'surjo-nandikiKgJ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27 13:29:06', '2021-10-27 13:29:06'),
(5, 22, 'anik-kumar-nandi', '01783674575', '2000-03-24', 'male', 5, 42, 332, 'Atharabari', 'Atharabari', 2282, NULL, '2021-11-16 02:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'Barguna', 1, 8700, '2021-10-17 18:11:06', '2021-10-17 18:11:06'),
(2, 'Barishal', 1, 8200, '2021-10-17 18:11:06', '2021-10-17 18:11:06'),
(3, 'Bhola', 1, 8300, '2021-10-17 18:11:06', '2021-10-17 18:11:06'),
(4, 'Jhalokati', 1, 8400, '2021-10-17 18:11:06', '2021-10-17 18:11:06'),
(5, 'Patuakhali', 1, 8600, '2021-10-17 18:11:06', '2021-10-17 18:11:06'),
(6, 'Pirojpur', 1, 8500, '2021-10-17 18:11:06', '2021-10-17 18:11:06'),
(7, 'Bandarban', 2, 4600, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(8, 'Brahmanbaria', 2, 3400, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(9, 'Chandpur', 2, 3600, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(10, 'Chittagong', 2, 4000, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(11, 'Cumilla', 2, 3500, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(12, 'Cox\'s Bazar', 2, 4700, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(13, 'Feni', 2, 3900, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(14, 'Khagrachhari', 2, 4400, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(15, 'Lakshmipur', 2, 3700, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(16, 'Noakhali', 2, 3800, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(17, 'Rangamati', 2, 4500, '2021-10-17 18:19:30', '2021-10-17 18:19:30'),
(18, 'Dhaka', 3, 1000, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(19, 'Faridpur', 3, 7800, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(20, 'Gazipur', 3, 1700, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(21, 'Gopalganj', 3, 8100, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(22, 'Kishoreganj', 3, 2300, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(23, 'Madaripur', 3, 7900, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(24, 'Manikganj', 3, 1800, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(25, 'Munshiganj', 3, 1500, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(26, 'Narayanganj', 3, 1400, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(27, 'Narsingdi', 3, 1600, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(28, 'Rajbari', 3, 7700, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(29, 'Shariatpur', 3, 8000, '2021-10-17 18:27:59', '2021-10-18 18:27:59'),
(30, 'Tangail', 3, 1900, '2021-10-17 18:27:59', '2021-10-17 18:27:59'),
(31, 'Bagerhat', 4, 9300, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(32, 'Chuadanga', 4, 7200, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(33, 'Jashore', 4, 7400, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(34, 'Jhenaidah', 4, 7300, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(35, 'Khulna', 4, 9100, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(36, 'Kushtia', 4, 7000, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(37, 'Magura', 4, 7600, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(38, 'Meherpur', 4, 7100, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(39, 'Narail', 4, 7500, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(40, 'Satkhira', 4, 9400, '2021-10-17 18:39:20', '2021-10-17 18:39:20'),
(41, 'Jamalpur', 5, 2000, '2021-10-17 18:49:05', '2021-10-17 18:49:05'),
(42, 'Mymensingh', 5, 2200, '2021-10-17 18:49:05', '2021-10-17 18:49:05'),
(43, 'Netrokona', 5, 2400, '2021-10-17 18:49:05', '2021-10-17 18:49:05'),
(44, 'Sherpur', 5, 2100, '2021-10-17 18:49:05', '2021-10-17 18:49:05'),
(45, 'Bogura', 6, 5800, '2021-10-17 18:52:28', '2021-10-17 18:52:28'),
(46, 'Chapai Nawabganj', 6, 6300, '2021-10-17 18:52:28', '2021-10-17 18:52:28'),
(47, 'Joypurhat', 6, 5900, '2021-10-17 18:52:28', '2021-10-17 18:52:28'),
(48, 'Naogaon', 6, 6500, '2021-10-17 18:52:28', '2021-10-17 18:52:28'),
(49, 'Natore', 6, 6400, '2021-10-17 18:52:28', '2021-10-17 18:52:28'),
(50, 'Pabna', 6, 6600, '2021-10-17 18:52:28', '2021-10-17 18:52:28'),
(51, 'Rajshahi', 6, 6000, '2021-10-17 18:52:28', '2021-10-17 18:52:28'),
(52, 'Sirajganj', 6, 6700, '2021-10-17 18:52:28', '2021-10-17 18:52:28'),
(53, 'Dinajpur', 7, 5200, '2021-10-18 02:15:29', '2021-10-18 02:15:29'),
(54, 'Gaibandha', 7, 5700, '2021-10-18 02:15:29', '2021-10-18 02:15:29'),
(55, 'Kurigram', 7, 5600, '2021-10-18 02:15:29', '2021-10-18 02:15:29'),
(56, 'Lalmonirhat', 7, 5500, '2021-10-18 02:15:29', '2021-10-18 02:15:29'),
(57, 'Nilphamari', 7, 5300, '2021-10-25 02:15:29', '2021-10-18 02:15:29'),
(58, 'Panchagarh', 7, 5000, '2021-10-18 02:15:29', '2021-10-18 02:15:29'),
(59, 'Rangpur', 7, 5400, '2021-10-18 02:15:29', '2021-10-18 02:15:29'),
(60, 'Thakurgaon', 7, 5100, '2021-10-18 02:15:29', '2021-10-18 02:15:29'),
(61, 'Habiganj', 8, 3300, '2021-10-18 02:26:47', '2021-10-18 02:26:47'),
(62, 'Moulvibazar', 8, 3200, '2021-10-18 02:26:47', '2021-10-18 02:26:47'),
(63, 'Sunamganj', 8, 3000, '2021-10-18 02:26:47', '2021-10-18 02:26:47'),
(64, 'Sylhet', 8, 3100, '2021-10-18 02:26:47', '2021-10-18 02:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Barishal', '2021-10-17 17:58:33', '2021-10-17 17:58:33'),
(2, 'Chattogram', '2021-10-18 17:58:33', '2021-10-18 17:58:33'),
(3, 'Dhaka', '2021-10-18 17:58:33', '2021-10-18 17:58:33'),
(4, 'Khulna', '2021-10-18 17:58:33', '2021-10-18 17:58:33'),
(5, 'Mymensingh', '2021-10-18 17:58:33', '2021-10-18 17:58:33'),
(6, 'Rajshahi', '2021-10-18 17:58:33', '2021-10-18 17:58:33'),
(7, 'Rangpur', '2021-10-18 17:58:33', '2021-10-18 17:58:33'),
(8, 'Sylhet', '2021-10-18 17:58:33', '2021-10-18 17:58:33');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
(5, '2021_10_04_165217_create_permission_tables', 2),
(8, '2021_10_08_151654_create_categories_table', 3),
(9, '2021_10_08_174905_create_subcategories_table', 4),
(13, '2021_10_09_042425_create_products_table', 5),
(15, '2021_10_09_044846_create_product__attributes_table', 6),
(17, '2021_10_09_133702_create_product_warranties_table', 7),
(18, '2021_10_09_134456_create_product_returns_table', 8),
(22, '2021_10_09_135042_create_product_colors_table', 9),
(23, '2021_10_09_140832_create_product_sizes_table', 10),
(24, '2021_10_09_165130_create_product_image_galleries_table', 11),
(29, '2021_10_11_164619_create_vouchers_table', 12),
(30, '2021_10_12_084953_create_wishlists_table', 13),
(33, '2021_10_15_162932_create_carts_table', 14),
(36, '2021_10_17_165919_create_billing_details_table', 15),
(38, '2021_10_17_174651_create_order__deatails_table', 15),
(39, '2021_10_18_153641_create_divisions_table', 16),
(40, '2021_10_18_154035_create_districts_table', 17),
(41, '2021_10_18_162141_create_upazilas_table', 18),
(42, '2021_10_17_174613_create_order__summaries_table', 19),
(44, '2021_10_19_073613_create_orders_table', 20),
(48, '2021_10_20_135640_create_customer_personal_information_table', 21),
(52, '2021_10_08_145506_create_basic_settings_table', 22),
(55, '2021_10_23_192610_create_sliders_table', 23),
(56, '2021_10_31_160840_create_contact_informations_table', 24),
(57, '2021_10_31_161443_create_contact_mobiles_table', 25),
(58, '2021_10_31_161502_create_contact_phones_table', 25),
(59, '2021_11_09_153354_create_product_size_attributes_table', 26),
(61, '2021_11_18_155214_create_faqs_table', 27),
(62, '2021_11_22_171629_create_abouts_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(9, 'App\\Models\\User', 22),
(15, 'App\\Models\\User', 35),
(16, 'App\\Models\\User', 34),
(16, 'App\\Models\\User', 36);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order__deatails`
--

CREATE TABLE `order__deatails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_summary_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order__deatails`
--

INSERT INTO `order__deatails` (`id`, `order_summary_id`, `product_id`, `image_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 34, 1, '2021-11-16 02:50:16', '2021-11-16 02:50:16'),
(2, 1, 4, 10, 40, 1, '2021-11-16 02:50:16', '2021-11-16 02:50:16'),
(3, 2, 4, 7, 35, 2, '2021-11-18 07:53:03', '2021-11-18 07:53:03'),
(4, 3, 4, 10, 39, 1, '2021-11-18 07:55:07', '2021-11-18 07:55:07'),
(5, 4, 4, 8, 35, 2, '2021-11-18 07:57:07', '2021-11-18 07:57:07'),
(6, 5, 4, 7, 35, 1, '2021-11-18 09:11:20', '2021-11-18 09:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `order__summaries`
--

CREATE TABLE `order__summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billing_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `shipping_fee` int(11) DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) DEFAULT 1 COMMENT '1=unpaid, 2=paid',
  `current_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Picup in Progress, 2=Shipped, 3=Out for Delivery, 4=Delivered, 5= Canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivered_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order__summaries`
--

INSERT INTO `order__summaries` (`id`, `billing_id`, `voucher_name`, `discount`, `shipping_fee`, `sub_total`, `total_price`, `invoice_no`, `payment_status`, `current_status`, `created_at`, `updated_at`, `delivered_date`) VALUES
(1, 1, NULL, NULL, 1500, 4190, 4190, 'BK-619370c8039ca', 2, 4, '2021-11-16 02:50:16', '2021-11-16 02:54:26', '2021-11-16 02:54:26'),
(2, 2, NULL, NULL, NULL, 4000, 4000, 'BK-61965abf2dae1', 1, 1, '2021-11-18 07:53:03', '2021-11-18 07:53:03', NULL),
(3, 3, NULL, NULL, NULL, 2190, 2190, 'BK-61965b3b26e4e', 1, 1, '2021-11-18 07:55:07', '2021-11-18 07:55:07', NULL),
(4, 4, NULL, NULL, NULL, 7000, 7000, 'BK-61965bb3a4c60', 1, 1, '2021-11-18 07:57:07', '2021-11-18 07:57:07', NULL),
(5, 5, NULL, NULL, NULL, 2000, 2000, 'BK-61966d18c9a52', 1, 1, '2021-11-18 09:11:20', '2021-11-18 09:11:20', NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'product add', 'web', '2021-10-04 10:55:35', '2021-10-04 10:55:35'),
(2, 'product delete', 'web', '2021-10-04 11:43:50', '2021-10-04 11:43:50'),
(3, 'buy product', 'web', '2021-10-05 03:48:08', '2021-10-05 03:48:08'),
(4, 'product review', 'web', '2021-10-05 03:48:08', '2021-10-05 03:48:08'),
(5, 'cart checkout', 'web', '2021-10-05 03:48:09', '2021-10-05 03:48:09'),
(6, 'role management', 'web', '2021-10-05 04:21:17', '2021-10-05 04:21:17'),
(7, 'category add', 'web', '2021-10-08 10:58:32', '2021-10-08 10:58:32'),
(8, 'category delete', 'web', '2021-10-08 10:58:32', '2021-10-08 10:58:32'),
(9, 'category edit', 'web', '2021-10-08 10:58:32', '2021-10-08 10:58:32'),
(10, 'category view', 'web', '2021-10-08 10:58:32', '2021-10-08 10:58:32'),
(11, 'subcategory add', 'web', '2021-10-08 14:02:20', '2021-10-08 14:02:20'),
(12, 'subcategory delete', 'web', '2021-10-08 14:02:20', '2021-10-08 14:02:20'),
(13, 'subcategory edit', 'web', '2021-10-08 14:02:20', '2021-10-08 14:02:20'),
(14, 'subcategory view', 'web', '2021-10-08 14:02:20', '2021-10-08 14:02:20'),
(15, 'product edit', 'web', '2021-10-10 14:22:10', '2021-10-10 14:22:10'),
(16, 'product view', 'web', '2021-10-10 14:22:10', '2021-10-10 14:22:10'),
(17, 'voucher edit', 'web', '2021-10-11 14:37:09', '2021-10-11 14:37:09'),
(18, 'voucher active', 'web', '2021-10-11 14:37:09', '2021-10-11 14:37:09'),
(19, 'voucher deactivate', 'web', '2021-10-11 14:37:09', '2021-10-11 14:37:09'),
(20, 'voucher actives view', 'web', '2021-10-11 14:37:09', '2021-10-11 14:37:09'),
(21, 'voucher deactivates view', 'web', '2021-10-11 14:37:09', '2021-10-11 14:37:09'),
(22, 'voucher add', 'web', '2021-10-11 14:43:09', '2021-10-11 14:43:09'),
(23, 'voucher trash', 'web', '2021-10-11 14:58:27', '2021-10-11 14:58:27'),
(24, 'voucher trash view', 'web', '2021-10-12 02:18:58', '2021-10-12 02:18:58'),
(25, 'voucher trash restore', 'web', '2021-10-12 02:18:58', '2021-10-12 02:18:58'),
(26, 'wishlist view', 'web', '2021-10-12 14:42:16', '2021-10-12 14:42:16'),
(27, 'order management', 'web', '2021-10-21 03:34:55', '2021-10-21 03:34:55'),
(28, 'slider add', 'web', '2021-10-24 08:37:01', '2021-10-24 08:37:01'),
(29, 'slider view', 'web', '2021-10-24 08:37:01', '2021-10-24 08:37:01'),
(30, 'slider edit', 'web', '2021-10-24 08:37:01', '2021-10-24 08:37:01'),
(31, 'slider trash', 'web', '2021-10-24 08:37:01', '2021-10-24 08:37:01'),
(32, 'slider trash restore', 'web', '2021-10-24 08:37:01', '2021-10-24 08:37:01'),
(33, 'slider deactivate', 'web', '2021-10-24 08:37:01', '2021-10-24 08:37:01'),
(34, 'slider activate', 'web', '2021-10-24 08:42:59', '2021-10-24 08:42:59'),
(35, 'site settings edit', 'web', '2021-11-01 01:16:47', '2021-11-01 01:16:47'),
(36, 'contact information edit', 'web', '2021-11-01 01:16:47', '2021-11-01 01:16:47'),
(37, 'faq view', 'web', '2021-11-19 08:47:32', '2021-11-19 08:47:32'),
(38, 'faq add', 'web', '2021-11-19 08:47:32', '2021-11-19 08:47:32'),
(39, 'faq edit', 'web', '2021-11-19 08:47:32', '2021-11-19 08:47:32'),
(40, 'faq trash', 'web', '2021-11-19 08:47:32', '2021-11-19 08:47:32'),
(41, 'faq trash restore', 'web', '2021-11-19 08:47:32', '2021-11-19 08:47:32'),
(42, 'faq trash delete', 'web', '2021-11-19 08:52:27', '2021-11-19 08:52:27'),
(43, 'faq trash view', 'web', '2021-11-19 08:55:17', '2021-11-19 08:55:17');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `main_upper_material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `outsole_material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'None',
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `return` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `authentic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` int(11) DEFAULT NULL,
  `delivery_deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `thumbnail`, `category_id`, `subcategory_id`, `brand`, `main_upper_material`, `outsole_material`, `gender`, `summary`, `description`, `sku`, `origin`, `warranty`, `return`, `authentic`, `promotions`, `shipping_charge`, `delivery_deadline`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BREATHABLE CADES', 'breathable-cades', 'breathable-cades-2021_11_09.jpg', 5, 11, 'Han Mou', 'Strecth fabric', 'Strecth fabric', 'male', 'cscscczc cscscczc cscscczc cscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczc', 'cscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczccscscczc', '618A49016F64F', 'China', '1', '1', '100', NULL, 750, '20-25', '2021-11-09 04:10:09', '2021-11-09 04:10:09', NULL),
(2, 'YOUTH TREND', 'youth-trend', 'youth-trend-2021_11_09.jpg', 4, 12, 'wohdhe', NULL, NULL, 'female', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '618A4Fa66Fd65', 'China', '1', '1', '100', NULL, 750, '20-25', '2021-11-09 04:38:30', '2021-11-09 04:38:30', NULL),
(3, 'Quail Martin', 'quail-martin', 'quail-martin-2021_11_09.jpg', 5, 11, 'Consequatur quae ma', 'Veniam illo quia do', 'Vero quaerat et a te', 'male', 'Laboris animi lorem Laboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi lorem', 'Vitae ad veniam exeLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi loremLaboris animi lorem', '618A99F0Ce483', 'Velit nihil nostrum', '4', '4', '100', NULL, 64, '20-25', '2021-11-09 09:55:28', '2021-11-09 09:55:28', NULL),
(4, 'Xander Whitakers', 'xander-whitaker', 'xander-whitaker-2021_11_22.jpg', 8, 13, 'Consectetur est pos', 'Quidem libero impedis', 'Tenetur ea quas dolos', 'male', 'Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid iss', 'Id impedit deserunrem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid i Lorem nemo aliquid its', '619bae0ed12dc', 'Enim expedita ab eoss', '1', '1', '50', NULL, 749, '20-25', '2021-11-09 12:23:34', '2021-11-22 08:49:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'white', '2021-10-09 14:00:30', NULL, NULL),
(2, 'green', '2021-10-09 14:00:30', NULL, NULL),
(3, 'red', '2021-10-09 14:00:54', NULL, NULL),
(4, 'gray', '2021-10-09 14:00:54', NULL, NULL),
(5, 'pink', '0000-00-00 00:00:00', NULL, NULL),
(6, 'black', '2021-10-09 14:00:54', NULL, NULL),
(7, 'blue', '0000-00-00 00:00:00', NULL, NULL),
(8, 'none', '2021-10-10 10:16:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image_galleries`
--

CREATE TABLE `product_image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image_galleries`
--

INSERT INTO `product_image_galleries` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'breathable-cades-2021_11_090.jpg', '2021-11-09 04:10:09', '2021-11-09 04:10:09'),
(2, 2, 'youth-trend-2021_11_090.jpg', '2021-11-09 04:38:30', '2021-11-09 04:38:30'),
(3, 2, 'youth-trend-2021_11_12_1636710583.JPG', '2021-11-09 04:38:30', '2021-11-12 03:49:44'),
(4, 3, 'quail-martin-2021_11_090.jpg', '2021-11-09 09:55:28', '2021-11-09 09:55:28'),
(5, 3, 'quail-martin-2021_11_091.jpg', '2021-11-09 09:55:28', '2021-11-09 09:55:28'),
(7, 4, 'xander-whitakers-2021_11_22_1637592607.jpg', '2021-11-11 12:28:54', '2021-11-22 08:50:07'),
(8, 4, 'xander-whitaker-2021_11_11_1636657010.jpg', '2021-11-11 12:56:50', '2021-11-11 12:56:50'),
(9, 2, 'youth-trend-2021_11_12_1636710105.jpg', '2021-11-11 13:02:00', '2021-11-12 03:41:45'),
(10, 4, 'xander-whitaker-2021_11_12_1636715117.jpg', '2021-11-12 05:05:17', '2021-11-12 05:05:17'),
(11, 4, 'xander-whitaker-2021_11_12_1636715185.jpg', '2021-11-12 05:06:26', '2021-11-12 05:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_returns`
--

CREATE TABLE `product_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_returns`
--

INSERT INTO `product_returns` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3 Days', '2021-11-09 10:01:58', NULL, NULL),
(2, '5 Days', '2021-11-09 10:01:58', NULL, NULL),
(3, '10 Days', '2021-11-09 10:02:31', NULL, NULL),
(4, '15 Days', '2021-11-09 10:02:31', NULL, NULL),
(5, '1 Month', '2021-11-09 10:02:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'S', '2021-10-09 14:09:25', NULL, NULL),
(2, 'M', '2021-10-09 14:09:25', NULL, NULL),
(3, 'L', '2021-10-09 14:09:52', NULL, NULL),
(4, 'XL', '2021-10-10 10:16:56', NULL, NULL),
(5, 'XXL', '2021-10-09 14:10:07', NULL, NULL),
(6, 'XXL', '2021-10-10 10:16:53', NULL, NULL),
(7, 'none', '2021-10-10 10:09:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_size_attributes`
--

CREATE TABLE `product_size_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size_attributes`
--

INSERT INTO `product_size_attributes` (`id`, `attribute_id`, `size_id`, `created_at`, `updated_at`) VALUES
(5, 8, 35, '2021-11-11 12:56:50', '2021-11-11 12:56:50'),
(27, 9, 35, '2021-11-12 03:41:45', '2021-11-12 03:41:45'),
(28, 9, 36, '2021-11-12 03:41:45', '2021-11-12 03:41:45'),
(29, 9, 39, '2021-11-12 03:41:45', '2021-11-12 03:41:45'),
(46, 3, 34, '2021-11-12 03:50:22', '2021-11-12 03:50:22'),
(47, 3, 35, '2021-11-12 03:50:22', '2021-11-12 03:50:22'),
(51, 2, 35, '2021-11-12 03:56:57', '2021-11-12 03:56:57'),
(52, 2, 36, '2021-11-12 03:56:57', '2021-11-12 03:56:57'),
(53, 2, 37, '2021-11-12 03:56:57', '2021-11-12 03:56:57'),
(54, 2, 38, '2021-11-12 03:56:57', '2021-11-12 03:56:57'),
(87, 7, 34, '2021-11-22 08:50:10', '2021-11-22 08:50:10'),
(88, 7, 35, '2021-11-22 08:50:10', '2021-11-22 08:50:10'),
(89, 7, 36, '2021-11-22 08:50:10', '2021-11-22 08:50:10'),
(90, 7, 37, '2021-11-22 08:50:10', '2021-11-22 08:50:10'),
(91, 11, 39, '2021-11-22 08:50:30', '2021-11-22 08:50:30'),
(92, 11, 40, '2021-11-22 08:50:30', '2021-11-22 08:50:30'),
(93, 11, 41, '2021-11-22 08:50:30', '2021-11-22 08:50:30'),
(94, 11, 42, '2021-11-22 08:50:30', '2021-11-22 08:50:30'),
(95, 11, 43, '2021-11-22 08:50:30', '2021-11-22 08:50:30'),
(96, 10, 39, '2021-11-22 08:50:47', '2021-11-22 08:50:47'),
(97, 10, 40, '2021-11-22 08:50:47', '2021-11-22 08:50:47'),
(98, 10, 41, '2021-11-22 08:50:47', '2021-11-22 08:50:47'),
(99, 10, 42, '2021-11-22 08:50:47', '2021-11-22 08:50:47'),
(100, 10, 43, '2021-11-22 08:50:47', '2021-11-22 08:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_warranties`
--

CREATE TABLE `product_warranties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_warranties`
--

INSERT INTO `product_warranties` (`id`, `warranty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6 Months', '2021-10-09 13:40:37', NULL, NULL),
(2, '1 Year', '2021-10-09 13:40:37', NULL, NULL),
(3, '2 Year', '0000-00-00 00:00:00', NULL, NULL),
(4, 'none', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product__attributes`
--

CREATE TABLE `product__attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_gallery_id` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` int(11) NOT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__attributes`
--

INSERT INTO `product__attributes` (`id`, `image_gallery_id`, `product_id`, `size_id`, `regular_price`, `offer_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '35', 2500, 2000, '2021-11-09 04:10:09', '2021-11-09 04:10:09', NULL),
(2, 2, 2, '36', 2500, 300, '2021-11-09 04:38:30', '2021-11-12 03:52:21', NULL),
(3, 3, 2, '34', 2200, 2000, '2021-11-09 04:38:30', '2021-11-09 04:38:30', NULL),
(4, 4, 3, NULL, 492, 556, '2021-11-09 09:55:28', '2021-11-09 09:55:28', NULL),
(5, 5, 3, NULL, 492, 556, '2021-11-09 09:55:28', '2021-11-09 09:55:28', NULL),
(7, 7, 4, NULL, 2400, 2000, '2021-11-11 12:28:54', '2021-11-11 12:28:54', NULL),
(8, 8, 4, NULL, 2000, 3500, '2021-11-11 12:56:50', '2021-11-11 12:56:50', NULL),
(9, 9, 2, NULL, 2500, 2200, '2021-11-11 13:02:00', '2021-11-12 03:41:37', NULL),
(10, 10, 4, NULL, 2250, 2190, '2021-11-12 05:05:17', '2021-11-12 05:05:17', NULL),
(11, 11, 4, NULL, 2250, 2190, '2021-11-12 05:06:26', '2021-11-12 05:06:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'Super Admin', 'web', '2021-10-05 02:36:44', '2021-10-05 02:36:44'),
(15, 'Editor', 'web', '2021-10-05 03:44:27', '2021-10-05 03:44:27'),
(16, 'Customer', 'web', '2021-10-05 03:48:33', '2021-10-05 03:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 9),
(1, 15),
(2, 9),
(2, 15),
(3, 16),
(4, 16),
(5, 16),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9),
(11, 9),
(12, 9),
(13, 9),
(14, 9),
(15, 9),
(16, 9),
(17, 9),
(18, 9),
(19, 9),
(20, 9),
(21, 9),
(22, 9),
(23, 9),
(24, 9),
(25, 9),
(26, 9),
(27, 9),
(28, 9),
(29, 9),
(30, 9),
(31, 9),
(32, 9),
(33, 9),
(34, 9),
(35, 9),
(36, 9),
(37, 9),
(38, 9),
(39, 9),
(40, 9),
(41, 9),
(42, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 2=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `promotions`, `url`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Exclusive Offer 2021', 'exclusive-offer-2021-2021_10_25_06_49_311635187771.png', NULL, 'www.facebook.com', 1, '2021-10-24 01:51:07', '2021-10-25 12:49:51', '2021-10-25 12:49:51'),
(2, 'Exclusive Offer 2021', 'exclusive-offer-2021-2021_10_25_06_49_241635187764.png', NULL, 'www.facebook.com', 1, '2021-10-24 02:13:15', '2021-10-25 13:23:01', NULL),
(3, 'Exclusive Collection', 'exclusive-collection-2021_10_25_06_49_161635187756.png', NULL, 'www.facebook.com', 1, '2021-10-24 03:03:41', '2021-10-25 13:22:57', NULL),
(4, 'Exclusive Offer 2021', 'exclusive-offer-2021-2021_10_24_09_11_301635066690.png', NULL, 'https://imrulkaisar.com/', 2, '2021-10-24 03:11:30', '2021-10-25 12:46:33', '2021-10-25 12:46:33'),
(5, 'Flat Discount 20%', 'flat-discount-20-2021_10_24_09_21_071635067267.png', NULL, 'www.facebook.com', 1, '2021-10-24 03:21:07', '2021-10-25 12:42:18', '2021-10-25 12:42:18'),
(6, 'Muktir bondhon', 'muktir-bondhon-2021_10_24_09_36_441635068204.jpg', NULL, 'https://aniknandi.com/', 1, '2021-10-24 03:36:44', '2021-10-24 03:37:10', '2021-10-24 03:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Shoes', 'shoes', 2, '2021-10-20 11:50:44', '2021-10-25 10:42:32', '2021-10-25 10:42:32'),
(10, 'Shoes', 'shoes', 6, '2021-10-22 02:35:52', '2021-10-25 10:42:35', '2021-10-25 10:42:35'),
(11, 'Shoes', 'shoes', 5, '2021-10-25 02:55:59', '2021-10-25 10:34:52', NULL),
(12, 'Shoes', 'shoes', 4, '2021-10-28 11:26:39', '2021-10-28 11:26:39', NULL),
(13, 'Shoes', 'shoes', 8, '2021-10-31 03:11:49', '2021-10-31 03:11:49', NULL),
(14, 'Jackets', 'jackets', 5, '2021-11-18 11:49:21', '2021-11-18 11:49:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `name`, `division_id`, `district_id`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'Amtali', 1, 1, 8710, '2021-10-18 01:05:35', '2021-10-18 01:05:36'),
(2, 'Bamna', 1, 1, 8730, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(3, 'Barguna Sadar', 1, 1, 8700, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(4, 'Betagi', 1, 1, 8740, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(5, 'Patharghata', 1, 1, 8720, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(6, 'Taltali', 1, 1, 8750, '2021-10-18 01:05:36', '2021-10-18 01:05:36'),
(7, 'Agailjhara', 1, 2, 8240, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(8, 'Babuganj', 1, 2, 8210, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(9, 'Bakerganj', 1, 2, 8280, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(10, 'Banaripara', 1, 2, 8530, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(11, 'Barishal Sadar', 1, 2, 8200, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(12, 'Gouranadi', 1, 2, 8230, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(13, 'Hizla', 1, 2, 8230, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(14, 'Mehendiganj', 1, 2, 8270, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(15, 'Muladi', 1, 2, 8250, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(16, 'Uzirpur', 1, 2, 8220, '2021-10-18 01:22:50', '2021-10-18 01:22:50'),
(17, 'Bhola Sadar', 1, 3, 8300, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(18, 'Borhanuddin', 1, 3, 8320, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(19, 'Charfassion', 1, 3, 8340, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(20, 'Daulatkhan', 1, 3, 8310, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(21, 'Lalmohan', 1, 3, 8330, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(22, 'Manpura', 1, 3, 8360, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(23, 'Tazumuddin', 1, 3, 8350, '2021-10-18 11:19:30', '2021-10-18 11:19:30'),
(24, 'Jhalokathi Sadar', 1, 4, 8400, '2021-10-18 11:35:35', '2021-10-18 11:35:35'),
(25, 'Kathalia', 1, 4, 8430, '2021-10-18 11:35:35', '2021-10-18 11:35:35'),
(26, 'Nalchity', 1, 4, 8420, '2021-10-18 11:35:35', '2021-10-18 11:35:35'),
(27, 'Rajapur', 1, 4, 8410, '2021-10-18 11:35:35', '2021-10-18 11:35:35'),
(36, 'Bauphal', 1, 5, 8620, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(37, 'Dashmina', 1, 5, 8630, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(38, 'Dumki', 1, 5, 8602, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(39, 'Galachipa', 1, 5, 8640, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(40, 'Kalapara', 1, 5, 8650, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(41, 'Mirzaganj', 1, 5, NULL, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(42, 'Patuakhali Sadar', 1, 5, 8600, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(43, 'Rangabali', 1, 5, NULL, '2021-10-19 11:39:53', '2021-10-19 11:39:53'),
(44, 'Bhandaria', 1, 6, 8550, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(45, 'Kaukhali', 1, 6, 8510, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(46, 'Mathbaria', 1, 6, 8560, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(47, 'Nazirpur', 1, 6, 8540, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(48, 'Swarupkathi (Nesarabad)', 1, 6, 8520, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(49, 'Pirojpur Sadar', 1, 6, 8500, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(50, 'Indurkani', 1, 6, 8502, '2021-10-18 12:07:39', '2021-10-18 12:07:39'),
(51, 'Bandarban Sadar', 2, 7, 4600, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(52, 'Lama', 2, 7, 4641, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(53, 'Naikhongchhari', 2, 7, 4660, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(54, 'Rowangchhari', 2, 7, 4610, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(55, 'Ruma', 2, 7, 4620, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(56, 'Thanchi', 2, 7, 4630, '2021-10-18 20:18:56', '2021-10-18 20:18:56'),
(57, 'Akhaura', 2, 8, 3450, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(58, 'Ashuganj', 2, 8, 3402, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(59, 'Brahmanbaria Sadar', 2, 8, 3400, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(60, 'Bancharampur', 2, 8, 3420, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(61, 'Bijoynagar', 2, 8, NULL, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(62, 'Kasba', 2, 8, 3460, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(63, 'Nabinagar', 2, 8, 3410, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(64, 'Nasirnagar', 2, 8, 3443, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(65, 'Sarail', 2, 8, 3430, '2021-10-18 20:34:50', '2021-10-18 20:34:50'),
(66, 'Chandpur Sadar', 2, 9, 3600, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(67, 'Faridganj', 2, 9, 3650, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(68, 'Haimchar', 2, 9, 3660, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(69, 'Hajiganj', 2, 9, 3610, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(70, 'Kachua', 2, 9, 3630, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(71, 'Matlab (Dakshin)', 2, 9, 3640, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(72, 'Matlab (Uttar)', 2, 9, 3640, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(73, 'Shahrasti', 2, 9, 3620, '2021-10-18 20:55:36', '2021-10-18 20:55:36'),
(74, 'Anwara', 2, 10, 4376, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(75, 'Banskhali', 2, 10, 4390, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(76, 'Boalkhali', 2, 10, 4366, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(77, 'Chandanaish', 2, 10, NULL, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(78, 'Chattogram Sadar', 2, 10, 4000, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(79, 'Fatikchari', 2, 10, 4350, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(80, 'Hathazari', 2, 10, 4330, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(81, 'Karnaphuli', 2, 10, NULL, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(82, 'Lohagara', 2, 10, 4396, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(83, 'Mirsharai', 2, 10, 4320, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(84, 'Patiya', 2, 10, 4370, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(85, 'Rangunia', 2, 10, 4360, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(86, 'Raozan', 2, 10, 4340, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(87, 'Sandwip', 2, 10, 4300, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(88, 'Satkania', 2, 10, 4386, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(89, 'Sitakunda', 2, 10, 4310, '2021-10-18 23:34:02', '2021-10-18 23:34:02'),
(90, 'Chakaria', 2, 12, NULL, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(91, 'Cox\'s Bazar Sadar', 2, 12, 4700, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(92, 'Kutubdia', 2, 12, 4720, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(93, 'Moheskhali', 2, 12, NULL, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(94, 'Pekua', 2, 12, NULL, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(95, 'Ramu', 2, 12, 4730, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(96, 'Teknaf', 2, 12, 4760, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(97, 'Ukhiya', 2, 12, 4750, '2021-10-18 23:54:04', '2021-10-18 23:54:04'),
(98, 'Barura', 2, 11, 3560, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(99, 'Brahmanpara', 2, 11, 3526, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(100, 'Burichang', 2, 11, 3520, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(101, 'Chandina', 2, 11, 3510, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(102, 'Chouddagram', 2, 11, 3550, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(103, 'Cumilla Sadar', 2, 11, 3500, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(104, 'Cumilla Sadar Dakshin', 2, 11, 3500, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(105, 'Daudkandi', 2, 11, 3516, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(106, 'Debidwar', 2, 11, 3530, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(107, 'Homna', 2, 11, 3546, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(108, 'Laksham', 2, 11, 3570, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(109, 'Lalmai', 2, 11, NULL, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(110, 'Meghna', 2, 11, NULL, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(111, 'Monohorganj', 2, 11, NULL, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(112, 'Muradnagar', 2, 11, 3540, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(113, 'Nangalkot', 2, 11, 3580, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(114, 'Titas', 2, 11, NULL, '2021-10-19 00:07:06', '2021-10-19 00:07:06'),
(115, 'Chhagalnaiya', 2, 13, 3910, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(116, 'Daganbhuiyan', 2, 13, 3920, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(117, 'Feni Sadar', 2, 13, 3900, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(118, 'Fulgazi', 2, 13, 3942, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(119, 'Porshuram', 2, 13, 3940, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(120, 'Sonagazi', 2, 13, 3930, '2021-10-19 02:14:31', '2021-10-19 02:14:31'),
(121, 'Dighinala', 2, 14, 4420, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(122, 'Guimara', 2, 14, NULL, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(123, 'Khagrachari Sadar', 2, 14, 4400, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(124, 'Laxmichari', 2, 14, 4470, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(125, 'Mahalchari', 2, 14, 4430, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(126, 'Manikchari', 2, 14, 4460, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(127, 'Matiranga', 2, 14, 4450, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(128, 'Panchari', 2, 14, 4410, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(129, 'Ramgarh', 2, 14, 4440, '2021-10-19 02:21:13', '2021-10-19 02:21:13'),
(130, 'Komol Nagar', 2, 15, NULL, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(131, 'Lakshmipur Sadar', 2, 15, 3700, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(132, 'Raipur', 2, 15, 3710, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(133, 'Ramganj', 2, 15, 3720, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(134, 'Ramgati', 2, 15, 3732, '2021-10-19 02:27:23', '2021-10-19 02:27:23'),
(135, 'Begumganj', 2, 16, 3820, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(136, 'Chatkhil', 2, 16, 3870, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(137, 'Companiganj', 2, 16, NULL, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(138, 'Hatiya', 2, 16, 3890, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(139, 'Kabir Hat', 2, 16, 3807, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(140, 'Noakhali Sadar', 2, 16, 3800, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(141, 'Senbag', 2, 16, 3860, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(142, 'Sonaimuri', 2, 16, 3827, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(143, 'Subarna Char', 2, 16, NULL, '2021-10-19 02:34:39', '2021-10-19 02:34:39'),
(144, 'Baghaichari', 2, 17, NULL, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(145, 'Barkal', 2, 17, 4570, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(146, 'Belaichari', 2, 17, 4550, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(147, 'Juraichari', 2, 17, 4560, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(148, 'Kaptai', 2, 17, 4530, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(149, 'Kaukhali', 2, 17, NULL, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(150, 'Langadu', 2, 17, NULL, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(151, 'Naniarchar', 2, 17, 4520, '2021-10-26 02:41:23', '2021-10-19 02:41:23'),
(152, 'Rajasthali', 2, 17, 4540, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(153, 'Rangamati Sadar', 2, 17, 4500, '2021-10-19 02:41:23', '2021-10-19 02:41:23'),
(154, 'Dhamrai', 3, 18, 1350, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(155, 'Dohar', 3, 18, 1330, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(156, 'Keraniganj', 3, 18, 1310, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(157, 'Nawabganj', 3, 18, 1320, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(158, 'Savar', 3, 18, 1340, '2021-10-19 02:49:57', '2021-10-19 02:49:57'),
(177, 'Alfadanga', 3, 19, 7870, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(178, 'Bhanga', 3, 19, 7830, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(179, 'Boalmari', 3, 19, 7860, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(180, 'Charbhadrasan', 3, 19, 7810, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(181, 'Faridpur Sadar', 3, 19, 7800, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(182, 'Madhukhali', 3, 19, 7850, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(183, 'Nagarkanda', 3, 19, 7840, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(184, 'Sadarpur', 3, 19, 7820, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(185, 'Saltha', 3, 19, NULL, '2021-10-19 02:56:26', '2021-10-19 02:56:26'),
(186, 'Gazipur Sadar', 3, 20, 1700, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(187, 'Kaliakair', 3, 20, 1750, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(188, 'Kaliganj', 3, 20, 1720, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(189, 'Kapasia', 3, 20, 1730, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(190, 'Sreepur', 3, 20, 1740, '2021-10-19 03:01:04', '2021-10-19 03:01:04'),
(191, 'Gopalganj Sadar', 3, 21, 8100, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(192, 'Kashiani', 3, 21, 8130, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(193, 'Kotalipara', 3, 21, 8110, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(194, 'Muksudpur', 3, 21, 8140, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(195, 'Tungipara', 3, 21, 8120, '2021-10-19 03:03:55', '2021-10-19 03:03:55'),
(196, 'Austagram', 3, 22, 2380, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(197, 'Bajitpur', 3, 22, 2336, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(198, 'Bhairab', 3, 22, 2350, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(199, 'Hossainpur', 3, 22, 2320, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(200, 'Itna', 3, 22, 2390, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(201, 'Karimganj', 3, 22, 2310, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(202, 'Katiadi', 3, 22, 2330, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(203, 'Kishoreganj Sadar', 3, 22, 2300, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(204, 'Kuliarchar', 3, 22, 2340, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(205, 'Mithamoin', 3, 22, 2370, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(206, 'Nikli', 3, 22, 2360, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(207, 'Pakundia', 3, 22, 2326, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(208, 'Tarail', 3, 22, 2316, '2021-10-19 03:07:00', '2021-10-19 03:07:00'),
(209, 'Kalkini', 3, 23, 7920, '2021-10-19 03:16:51', '2021-10-19 03:16:51'),
(210, 'Madaripur Sadar', 3, 23, 7900, '2021-10-19 03:16:51', '2021-10-19 03:16:51'),
(211, 'Rajoir', 3, 23, 7910, '2021-10-19 03:16:51', '2021-10-19 03:16:51'),
(212, 'Shibchar', 3, 23, NULL, '2021-10-19 03:16:51', '2021-10-19 03:16:51'),
(213, 'Daulatpur', 3, 24, 1860, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(214, 'Ghior', 3, 24, 1840, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(215, 'Harirampur', 3, 24, 1830, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(216, 'Manikganj Sadar', 3, 24, 1800, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(217, 'Saturia', 3, 24, 1810, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(218, 'Shivalaya', 3, 24, 1850, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(219, 'Singair', 3, 24, 1820, '2021-10-19 03:19:33', '2021-10-19 03:19:33'),
(220, 'Gazaria', 3, 25, 1510, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(221, 'Lohajang', 3, 25, 1530, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(222, 'Munshiganj Sadar', 3, 25, 1500, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(223, 'Sirajdikhan', 3, 25, 1540, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(224, 'Sreenagar', 3, 25, 1550, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(225, 'Tongibari', 3, 25, 1520, '2021-10-19 03:25:14', '2021-10-19 03:25:14'),
(226, 'Araihazar', 3, 26, 1450, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(227, 'Bandar', 3, 26, 1410, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(228, 'Narayanganj Sadar', 3, 26, 1400, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(229, 'Rupganj', 3, 26, 1460, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(230, 'Sonargaon', 3, 26, NULL, '2021-10-19 03:30:43', '2021-10-19 03:30:43'),
(231, 'Belabo', 3, 27, 1640, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(232, 'Monohardi', 3, 27, 1650, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(233, 'Narshingdi Sadar', 3, 27, 1600, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(234, 'Palash', 3, 27, 1610, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(235, 'Raipura', 3, 27, 1630, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(236, 'Shibpur', 3, 27, 1620, '2021-10-19 03:35:27', '2021-10-19 03:35:27'),
(237, 'Baliakandi', 3, 28, 7730, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(238, 'Goalanda', 3, 28, 7710, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(239, 'Kalukhali', 3, 28, NULL, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(240, 'Pangsha', 3, 28, 7720, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(241, 'Rajbari Sadar', 3, 28, 7700, '2021-10-19 03:38:27', '2021-10-19 03:38:27'),
(242, 'Bhedarganj', 3, 29, 8030, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(243, 'Damudya', 3, 29, 8040, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(244, 'Gosairhat', 3, 29, 8050, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(245, 'Zajira', 3, 29, 8010, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(246, 'Naria', 3, 29, 8020, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(247, 'Shariatpur Sadar', 3, 29, 8000, '2021-10-20 00:45:33', '2021-10-20 00:45:33'),
(248, 'Basail', 3, 30, 1920, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(249, 'Bhuapur', 3, 30, 1960, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(250, 'Delduar', 3, 30, 1910, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(251, 'Dhanbari', 3, 30, 1997, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(252, 'Ghatail', 3, 30, 1980, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(253, 'Gopalpur', 3, 30, 1990, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(254, 'Kalihati', 3, 30, 1970, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(255, 'Madhupur', 3, 30, 1996, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(256, 'Mirzapur', 3, 30, 1940, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(257, 'Nagarpur', 3, 30, 1936, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(258, 'Shakhipur', 3, 30, 1950, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(259, 'Tangail Sadar', 3, 30, 1900, '2021-10-20 00:51:07', '2021-10-20 00:51:07'),
(260, 'Bagerhat Sadar', 4, 31, 9300, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(261, 'Chitalmari', 4, 31, 9360, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(262, 'Fakirhat', 4, 31, 9370, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(263, 'Kachua', 4, 31, 9310, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(264, 'Mollahat', 4, 31, 9380, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(265, 'Mongla', 4, 31, NULL, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(266, 'Morrelganj', 4, 31, 9320, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(267, 'Rampal', 4, 31, 9340, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(268, 'Sarankhola', 4, 31, NULL, '2021-10-20 00:57:18', '2021-10-20 00:57:18'),
(269, 'Alamdanga', 4, 32, 7210, '2021-10-20 01:03:54', '2021-10-20 01:03:54'),
(270, 'Chuadanga Sadar', 4, 32, 7200, '2021-10-20 01:03:54', '2021-10-20 01:03:54'),
(271, 'Damurhuda', 4, 32, 7220, '2021-10-20 01:03:54', '2021-10-20 01:03:54'),
(272, 'Jibannagar', 4, 32, NULL, '2021-10-20 01:03:54', '2021-10-20 01:03:54'),
(273, 'Abhoynagar', 4, 33, NULL, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(274, 'Bagherpara', 4, 33, 7470, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(275, 'Chaugachha', 4, 33, 7410, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(276, 'Jashore Sadar', 4, 33, 7400, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(277, 'Jhikargacha', 4, 33, 7420, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(278, 'Keshabpur', 4, 33, 7450, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(279, 'Monirampur', 4, 33, 7440, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(280, 'Sharsha', 4, 33, 7430, '2021-10-21 02:08:21', '2021-10-21 02:08:21'),
(281, 'Harinakunda', 4, 34, 7310, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(282, 'Jhenaidah Sadar', 4, 34, 7300, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(283, 'Kaliganj', 4, 34, NULL, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(284, 'Kotchandpur', 4, 34, 7330, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(285, 'Maheshpur', 4, 34, 7340, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(286, 'Shailkupa', 4, 34, 7320, '2021-10-21 02:16:22', '2021-10-21 02:16:22'),
(287, 'Batiaghata', 4, 35, 9260, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(288, 'Dacope', 4, 35, 9271, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(289, 'Dighalia', 4, 35, 9220, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(290, 'Dumuria', 4, 35, NULL, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(291, 'Khulna Sadar', 4, 35, 9100, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(292, 'Koyra', 4, 35, 9290, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(293, 'Paikgachha', 4, 35, 9280, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(294, 'Phultala', 4, 35, 9210, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(295, 'Rupsa', 4, 35, 9241, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(296, 'Terokhada', 4, 35, 9230, '2021-10-21 02:26:38', '2021-10-21 02:26:38'),
(297, 'Bheramara', 4, 36, 7040, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(298, 'Daulatpur', 4, 36, 7042, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(299, 'Khoksa', 4, 36, 7021, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(300, 'Kumarkhali', 4, 36, 7010, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(301, 'Kushtia Sadar', 4, 36, 7000, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(302, 'Mirpur', 4, 36, 7030, '2021-10-21 02:32:17', '2021-10-21 02:32:17'),
(303, 'Magura Sadar', 4, 37, 7600, '2021-10-21 02:35:50', '2021-10-21 02:35:50'),
(304, 'Mohammadpur', 4, 37, 7630, '2021-10-21 02:35:50', '2021-10-21 02:35:50'),
(305, 'Salikha', 4, 37, NULL, '2021-10-21 02:35:50', '2021-10-21 02:35:50'),
(306, 'Sreepur', 4, 37, 7610, '2021-10-21 02:35:50', '2021-10-21 02:35:50'),
(307, 'Gangni', 4, 38, 7110, '2021-10-21 02:38:59', '2021-10-21 02:38:59'),
(308, 'Meherpur Sadar', 4, 38, 7100, '2021-10-21 02:38:59', '2021-10-21 02:38:59'),
(309, 'Mujib Nagar', 4, 38, 7102, '2021-10-21 02:38:59', '2021-10-21 02:38:59'),
(310, 'Kalia', 4, 39, 7520, '2021-10-21 02:41:06', '2021-10-21 02:41:06'),
(311, 'Lohagara', 4, 39, 7511, '2021-10-21 02:41:06', '2021-10-21 02:41:06'),
(312, 'Narail Sadar', 4, 39, 7500, '2021-10-21 02:41:06', '2021-10-21 02:41:06'),
(313, 'Assasuni', 4, 40, 9460, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(314, 'Debhata', 4, 40, 9430, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(315, 'Kalaroa', 4, 40, 9410, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(316, 'Kaliganj', 4, 40, 9440, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(317, 'Satkhira Sadar', 4, 40, 9400, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(318, 'Shyamnagar', 4, 40, NULL, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(319, 'Tala', 4, 40, 9420, '2021-10-21 02:42:54', '2021-10-21 02:42:54'),
(320, 'Bakshiganj', 5, 41, 2140, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(321, 'Dewanganj', 5, 41, 2140, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(322, 'Islampur', 5, 41, 2020, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(323, 'Jamalpur Sadar', 5, 41, 2000, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(324, 'Madarganj', 5, 41, 2040, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(325, 'Melandah', 5, 41, 2010, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(326, 'Sarishabari', 5, 41, 2050, '2021-10-21 02:47:47', '2021-10-21 02:47:47'),
(327, 'Bhaluka', 5, 42, 2240, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(328, 'Fulbaria', 5, 42, 2216, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(329, 'Gafargaon', 5, 42, 2230, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(330, 'Gouripur', 5, 42, 2270, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(331, 'Haluaghat', 5, 42, 2260, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(332, 'Ishwarganj', 5, 42, 2280, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(333, 'Muktagacha', 5, 42, 2210, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(334, 'Mymensingh Sadar', 5, 42, 2200, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(335, 'Nandail', 5, 42, 2290, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(336, 'Phulpur', 5, 42, 2250, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(337, 'Tarakanda', 5, 42, 2252, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(338, 'Trishal', 5, 42, 2220, '2021-10-21 02:55:26', '2021-10-21 02:55:26'),
(339, 'Atpara', 5, 43, 2470, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(340, 'Barhatta', 5, 43, 2440, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(341, 'Dhobaura', 5, 43, 2416, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(342, 'Durgapur', 5, 43, 2420, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(343, 'Kalmakanda', 5, 43, 2430, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(344, 'Kendua', 5, 43, 2480, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(345, 'Khaliajuri', 5, 43, 2460, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(346, 'Madan', 5, 43, 2490, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(347, 'Mohanganj', 5, 43, 2446, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(348, 'Netrakona Sadar', 5, 43, 2400, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(349, 'Purbadhala', 5, 43, 2410, '2021-10-21 03:02:48', '2021-10-21 03:02:48'),
(350, 'Jhenaigati', 5, 44, 2120, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(351, 'Nakla', 5, 44, 2150, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(352, 'Nalitabari', 5, 44, 2110, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(353, 'Sherpur Sadar', 5, 44, 2100, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(354, 'Sreebordi', 5, 44, 2130, '2021-10-21 03:09:54', '2021-10-21 03:09:54'),
(355, 'Adamdighi', 6, 45, 5890, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(356, 'Bogura Sadar', 6, 45, 5800, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(357, 'Dhunot', 6, 45, 5850, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(358, 'Dhupchancia', 6, 45, 5880, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(359, 'Gabtali', 6, 45, 5820, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(360, 'Kahaloo', 6, 45, 5870, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(361, 'Nandigram', 6, 45, 5860, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(362, 'Sariakandi', 6, 45, 5830, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(363, 'Shajahanpur', 6, 45, NULL, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(364, 'Sherpur', 6, 45, 5840, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(365, 'Shibganj', 6, 45, 5810, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(366, 'Sonatala', 6, 45, 5826, '2021-10-21 03:12:57', '2021-10-21 03:12:57'),
(367, 'Bholahat', 6, 46, 6330, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(368, 'Gomostapur', 6, 46, 6321, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(369, 'Nachol', 6, 46, 6310, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(370, 'Nawabganj Sadar', 6, 46, 6300, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(371, 'Shibganj', 6, 46, 6340, '2021-10-21 03:18:39', '2021-10-21 03:18:39'),
(372, 'Akkelpur', 6, 47, 5940, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(373, 'Joypurhat Sadar', 6, 47, 5900, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(374, 'Kalai', 6, 47, 5930, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(375, 'Khetlal', 6, 47, 5920, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(376, 'Panchbibi', 6, 47, 5910, '2021-10-21 03:24:00', '2021-10-21 03:24:00'),
(377, 'Atrai', 6, 48, NULL, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(378, 'Badalgacchi', 6, 48, 6570, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(379, 'Dhamoirhat', 6, 48, 6580, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(380, 'Manda', 6, 48, NULL, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(381, 'Mohadevpur', 6, 48, 6530, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(382, 'Naogaon Sadar', 6, 48, 6500, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(383, 'Niamatpur', 6, 48, 6520, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(384, 'Patnitala', 6, 48, 6540, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(385, 'Porsha', 6, 48, 6551, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(386, 'Raninagar', 6, 48, 6590, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(387, 'Sapahar', 6, 48, 6560, '2021-10-21 03:26:09', '2021-10-21 03:26:09'),
(388, 'Bagatipara', 6, 49, NULL, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(389, 'Baraigram', 6, 49, 6432, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(390, 'Gurudaspur', 6, 49, 6440, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(391, 'Lalpur', 6, 49, 6421, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(392, 'Naldanga', 6, 49, NULL, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(393, 'Natore Sadar', 6, 49, 6400, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(394, 'Singra', 6, 49, 6450, '2021-10-23 08:14:00', '2021-10-23 08:14:00'),
(395, 'Atghoria', 6, 50, 6610, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(396, 'Bera', 6, 50, 6680, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(397, 'Bhangura', 6, 50, 6640, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(398, 'Chatmohar', 6, 50, 6630, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(399, 'Faridpur', 6, 50, NULL, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(400, 'Ishwardi', 6, 50, 6620, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(401, 'Pabna Sadar', 6, 50, 6600, '2021-10-23 08:20:25', '2021-10-23 08:20:25'),
(402, 'Santhia', 6, 50, 6670, '2021-10-24 08:27:25', '2021-10-24 08:27:25'),
(403, 'Sujanagar', 6, 50, 6660, '2021-10-24 08:27:25', '2021-10-24 08:27:25'),
(414, 'Bagha', 6, 51, 6280, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(415, 'Bagmara', 6, 51, NULL, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(416, 'Charghat', 6, 51, 6270, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(417, 'Durgapur', 6, 51, 6240, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(418, 'Godagari', 6, 51, 6290, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(419, 'Mohanpur', 6, 51, NULL, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(420, 'Paba', 6, 51, NULL, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(421, 'Puthia', 6, 51, 6260, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(422, 'Rajshahi Sadar', 6, 51, 6000, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(423, 'Tanore', 6, 51, 6230, '2021-10-24 08:37:10', '2021-10-24 08:37:10'),
(424, 'Belkuchi', 6, 52, 6740, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(425, 'Chowhali', 6, 52, NULL, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(426, 'Kamarkhand', 6, 52, NULL, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(427, 'Kazipur', 6, 52, 6710, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(428, 'Raiganj', 6, 52, NULL, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(429, 'Shahzadpur', 6, 52, 6770, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(430, 'Sirajganj Sadar', 6, 52, 6700, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(431, 'Tarash', 6, 52, 6780, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(432, 'Ullapara', 6, 52, 6760, '2021-10-24 08:42:14', '2021-10-24 08:42:14'),
(433, 'Birampur', 7, 53, 5266, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(434, 'Birganj', 7, 53, 5220, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(435, 'Biral', 7, 53, 5210, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(436, 'Bochaganj', 7, 53, NULL, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(437, 'Chirirbandar', 7, 53, 5240, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(438, 'Dinajpur Sadar', 7, 53, 5200, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(439, 'Fulbari', 7, 53, 5260, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(440, 'Ghoraghat', 7, 53, 5291, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(441, 'Hakimpur', 7, 53, NULL, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(442, 'Kaharol', 7, 53, NULL, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(443, 'Khansama', 7, 53, 5230, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(444, 'Nawabganj', 7, 53, 5280, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(445, 'Parbatipur', 7, 53, 5250, '2021-10-24 08:47:20', '2021-10-24 08:47:20'),
(446, 'Phulchhari', 7, 54, 5760, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(447, 'Gaibandha Sadar', 7, 54, 5700, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(448, 'Gobindaganj', 7, 54, 5740, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(449, 'Palashbari', 7, 54, 5730, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(450, 'Sadullapur', 7, 54, 5710, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(451, 'Saghata', 7, 54, 5751, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(452, 'Sundarganj', 7, 54, 5720, '2021-10-24 08:54:00', '2021-10-24 08:54:00'),
(453, 'Bhurungamari', 7, 55, 5670, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(454, 'Chilmari', 7, 55, 5630, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(455, 'Fulbari', 7, 55, 5680, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(456, 'Kurigram Sadar', 7, 55, 5600, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(457, 'Nageshwari', 7, 55, 5660, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(458, 'Rajarhat', 7, 55, 5610, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(459, 'Rajibpur', 7, 55, 5650, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(460, 'Rowmari', 7, 55, 5640, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(461, 'Ulipur', 7, 55, 5620, '2021-10-24 08:58:34', '2021-10-24 08:58:34'),
(462, 'Aditmari', 7, 56, 5510, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(463, 'Hatibandha', 7, 56, 5530, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(464, 'Kaliganj', 7, 56, NULL, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(465, 'Lalmonirhat Sadar', 7, 56, 5500, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(466, 'Patgram', 7, 56, 5540, '2021-10-24 09:05:23', '2021-10-24 09:05:23'),
(467, 'Dimla', 7, 57, 5350, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(468, 'Domar', 7, 57, 5340, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(469, 'Jaldhaka', 7, 57, 5330, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(470, 'Kishorganj', 7, 57, 5320, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(471, 'Nilphamari Sadar', 7, 57, 5300, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(472, 'Saidpur', 7, 57, 5310, '2021-10-24 09:13:56', '2021-10-24 09:13:56'),
(473, 'Atwari', 7, 58, NULL, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(474, 'Boda', 7, 58, 5010, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(475, 'Debiganj', 7, 58, 5020, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(476, 'Panchagarh Sadar', 7, 58, 5000, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(477, 'Tetulia', 7, 58, 5030, '2021-10-24 09:18:14', '2021-10-24 09:18:14'),
(478, 'Badarganj', 7, 59, 5430, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(479, 'Gangachara', 7, 59, 5410, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(480, 'Kaunia', 7, 59, 5440, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(481, 'Mithapukur', 7, 59, 5460, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(482, 'Pirgacha', 7, 59, 5450, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(483, 'Pirganj', 7, 59, NULL, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(484, 'Rangpur Sadar', 7, 59, 5400, '2021-10-24 09:20:54', NULL),
(485, 'Taraganj', 7, 59, 5420, '2021-10-24 09:20:54', '2021-10-24 09:20:54'),
(486, 'Baliadangi', 7, 60, 5140, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(487, 'Haripur', 7, 60, NULL, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(488, 'Pirganj', 7, 60, 5110, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(489, 'Ranisankail', 7, 60, 5120, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(490, 'Thakurgaon Sadar', 7, 60, 5100, '2021-10-24 09:24:39', '2021-10-24 09:24:39'),
(491, 'Ajmiriganj', 8, 61, 3360, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(492, 'Bahubal', 8, 61, 3310, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(493, 'Baniachong', 8, 61, 3350, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(494, 'Chunarughat', 8, 61, 3320, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(495, 'Habiganj Sadar', 8, 61, 3300, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(496, 'Lakhai', 8, 61, 3341, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(497, 'Madhabpur', 8, 61, 3330, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(498, 'Nabiganj', 8, 61, 3370, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(499, 'Sayestaganj', 8, 61, NULL, '2021-10-24 09:27:42', '2021-10-24 09:27:42'),
(500, 'Barlekha', 8, 62, 3250, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(501, 'Juri', 8, 62, 3251, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(502, 'Kamalganj', 8, 62, 3220, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(503, 'Kulaura', 8, 62, 3230, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(504, 'Moulvibazar Sadar', 8, 62, 3200, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(505, 'Rajnagar', 8, 62, 3240, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(506, 'Sreemangal', 8, 62, 3210, '2021-10-24 09:41:20', '2021-10-24 09:41:20'),
(518, 'Biswamvarpur', 8, 63, 3010, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(519, 'Chhatak', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(520, 'Dakhin Sunamganj', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(521, 'Derai', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(522, 'Dharmapasha', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(523, 'Dowarabazar', 8, 63, 3070, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(524, 'Jagannathpur', 8, 63, 3060, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(525, 'Jamalganj', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(526, 'Sulla', 8, 63, NULL, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(527, 'Sunamganj Sadar', 8, 63, 3000, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(528, 'Tahirpur', 8, 63, 3030, '2021-10-24 09:53:39', '2021-10-24 09:53:39'),
(529, 'Balaganj', 8, 64, 3120, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(530, 'Beanibazar', 8, 64, 3170, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(531, 'Biswanath', 8, 64, 3130, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(532, 'Companiganj', 8, 64, NULL, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(533, 'Dakshin Surma', 8, 64, NULL, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(534, 'Fenchuganj', 8, 64, 3116, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(535, 'Golapganj', 8, 64, 3160, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(536, 'Gowainghat', 8, 64, NULL, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(537, 'Jaintiapur', 8, 64, 3156, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(538, 'Kanaighat', 8, 64, 3180, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(539, 'Osmaninagar', 8, 64, NULL, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(540, 'Sylhet Sadar', 8, 64, 3100, '2021-10-24 10:03:52', '2021-10-24 10:03:52'),
(541, 'Zakiganj', 8, 64, 3190, '2021-10-24 10:03:52', '2021-10-24 10:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(22, 'Anik Kumar Nandi', 'aniknandi.it@gmail.com', '2021-10-26 04:19:07', '$2y$10$36QErv0zuiNItDdTw3wiWuSL0dlB6.E170oodjFaOaMTeO9U2y1oy', '3Sp2EIRVUmKuH1fl01OqwMowVAUdZI8p1BRpUBHOoCnswZiEhkOcDypY1Emm', '2021-10-08 06:36:30', '2021-11-08 08:57:22'),
(34, 'Anik Kumar Nandi', 'anik.mbf@gmail.com', '2021-10-26 12:47:21', '$2y$10$NmA9qbQfu1B8i2/Vs2ZrMeRk7rPto1IyjzVEZxrDmJH84TsAMLFbS', 'dGjnkt9UXr9WbY2rGWu4GqZn0UdP9to7nvF8CQIdypNdg9nmJLycQrsDVC7f', '2021-10-25 23:16:35', '2021-11-08 08:46:07'),
(35, 'Surjo Nandi', 'surjo.nondi.sn@gmail.com', '2021-10-26 04:50:01', '$2y$10$T.M89C9uQWfLbXfFnlQvteVn.34BRPaCfIv06gnl8xrxDqcB/yRCq', 'XorQFGMD5CvdrXYkfPsiXsF99KSFYqjo4newk2C7oyCu7SV84hrzgfrT3DFx', '2021-10-26 04:33:18', '2021-11-02 09:59:21'),
(36, 'Surjo Nandi', 'surjo.nondi.sns@gmail.com', NULL, '$2y$10$8Acs3Yrbx2gPn/aAxvCZp.2jHpuykJhoNgjCro75elBMUT.Wsd4.W', NULL, '2021-10-27 13:29:06', '2021-10-27 13:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` tinyint(4) NOT NULL,
  `expiry_date` date NOT NULL,
  `limit` tinyint(4) NOT NULL,
  `used` int(11) DEFAULT 0,
  `min_checkout_price` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '1=active, 2=deactivated',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `name`, `slug`, `discount`, `expiry_date`, `limit`, `used`, `min_checkout_price`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PUJA5', 'puja5', 5, '2021-10-30', 49, 0, 5000, 1, '2021-10-25 06:44:56', '2021-10-30 04:37:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cookie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `cookie_id`, `product_id`, `created_at`, `updated_at`) VALUES
(23, '1635523300-IeouNuSGLI', 2, '2021-10-30 12:34:23', '2021-10-30 12:34:23'),
(26, '1635523300-IeouNuSGLI', 1, '2021-10-30 13:34:09', '2021-10-30 13:34:09'),
(28, '1635768643-wLeXg3MMoH', 4, '2021-11-18 06:29:46', '2021-11-18 06:29:46'),
(30, '1635768643-wLeXg3MMoH', 2, '2021-11-18 06:29:50', '2021-11-18 06:29:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_informations`
--
ALTER TABLE `contact_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_mobiles`
--
ALTER TABLE `contact_mobiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_personal_information`
--
ALTER TABLE `customer_personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order__deatails`
--
ALTER TABLE `order__deatails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order__summaries`
--
ALTER TABLE `order__summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_returns`
--
ALTER TABLE `product_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size_attributes`
--
ALTER TABLE `product_size_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_warranties`
--
ALTER TABLE `product_warranties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__attributes`
--
ALTER TABLE `product__attributes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_informations`
--
ALTER TABLE `contact_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_mobiles`
--
ALTER TABLE `contact_mobiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_personal_information`
--
ALTER TABLE `customer_personal_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order__deatails`
--
ALTER TABLE `order__deatails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order__summaries`
--
ALTER TABLE `order__summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_returns`
--
ALTER TABLE `product_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_size_attributes`
--
ALTER TABLE `product_size_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `product_warranties`
--
ALTER TABLE `product_warranties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product__attributes`
--
ALTER TABLE `product__attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
