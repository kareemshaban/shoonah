-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2025 at 10:06 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoonah`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `order` int NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int NOT NULL,
  `isVisible` int NOT NULL,
  `duration` int NOT NULL DEFAULT '0',
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `banner`, `type`, `order`, `url`, `item_id`, `isVisible`, `duration`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, '1744253742.jpg', 0, 1, 'https://www.freepik.com/free-vector/paper-style-podium-horizontal-banner_82457095.htm#fromView=search&page=1&position=9&uuid=b6c78019-10be-428e-b18b-6c99f0fd701e&query=perfume+banners', 0, 1, 3, 1, 1, '2025-04-10 00:55:42', '2025-04-11 04:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `advances`
--

DROP TABLE IF EXISTS `advances`;
CREATE TABLE IF NOT EXISTS `advances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `type` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(8,2) NOT NULL,
  `monthlyPayment` decimal(8,2) NOT NULL,
  `startDate` timestamp NOT NULL,
  `paymentsCount` int NOT NULL,
  `remainPaymentsCount` int NOT NULL,
  `user_ins` int NOT NULL,
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

DROP TABLE IF EXISTS `attends`;
CREATE TABLE IF NOT EXISTS `attends` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attend_days_count` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `absence_days_count` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL,
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authentications`
--

DROP TABLE IF EXISTS `authentications`;
CREATE TABLE IF NOT EXISTS `authentications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `form_id` int NOT NULL,
  `form_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_level` int NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authentications`
--

INSERT INTO `authentications` (`id`, `role_id`, `form_id`, `form_name`, `access_level`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:08'),
(3, 1, 2, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:08'),
(4, 1, 3, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(5, 1, 4, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(6, 1, 5, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(7, 1, 6, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(8, 1, 7, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(9, 1, 8, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(10, 1, 9, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(11, 1, 10, '', 0, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(12, 1, 11, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(13, 1, 12, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(14, 1, 13, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(15, 1, 14, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(16, 1, 15, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(17, 1, 16, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(18, 1, 17, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(19, 1, 18, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(20, 1, 19, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(21, 1, 20, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(22, 1, 21, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(23, 1, 22, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(24, 1, 23, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(25, 1, 24, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(26, 1, 25, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(27, 1, 26, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(28, 1, 27, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(29, 1, 28, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(30, 1, 29, '', 1, 1, 1, '2025-04-28 01:17:55', '2025-04-28 01:24:09'),
(31, 3, 1, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(32, 3, 2, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(33, 3, 3, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(34, 3, 4, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(35, 3, 5, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(36, 3, 6, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(37, 3, 7, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(38, 3, 8, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(39, 3, 9, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(40, 3, 10, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(41, 3, 11, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(42, 3, 12, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(43, 3, 13, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(44, 3, 14, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(45, 3, 15, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(46, 3, 16, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(47, 3, 17, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(48, 3, 18, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(49, 3, 19, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(50, 3, 20, '', 1, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(51, 3, 21, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(52, 3, 22, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(53, 3, 23, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(54, 3, 24, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(55, 3, 25, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(56, 3, 26, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(57, 3, 27, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(58, 3, 28, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56'),
(59, 3, 29, '', 0, 1, 0, '2025-04-28 01:25:56', '2025-04-28 01:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_ins` int NOT NULL,
  `user_upd` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_ar`, `name_en`, `prefix`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'كلير', 'Clear', 'CL', 1, 1, '2025-03-25 22:47:31', '2025-04-11 09:15:26'),
(4, 'ريكسونا', 'Rexona', 'R', 1, 1, '2025-04-05 07:16:21', '2025-04-11 09:15:35'),
(3, 'فاتيكا', 'vatikaa', 'VK', 1, 1, '2025-03-25 22:48:01', '2025-04-11 09:15:40'),
(5, 'فانسية', 'vansia', 'vv', 11, 0, '2025-04-28 23:40:13', '2025-04-28 23:40:13'),
(6, 'جديد', 'new', 'xx', 13, 0, '2025-04-30 17:04:20', '2025-04-30 17:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` int NOT NULL,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `department_id`, `name_ar`, `name_en`, `prefix`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 1, 'عطر عود', 'aoud perfum', 'A', 1, 1, '2025-03-26 09:46:49', '2025-04-11 09:16:28'),
(2, 3, 'شامبو', 'Shampoo', 'SH', 1, 1, '2025-03-29 20:50:19', '2025-04-11 09:16:35'),
(3, 3, 'كريم شعر', 'Hair cream', 'HC', 1, 1, '2025-03-29 20:54:48', '2025-04-11 09:16:40'),
(4, 6, 'مزيل عرق اسبراي', 'spray', 'SP', 1, 1, '2025-04-05 07:17:02', '2025-04-11 09:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name_ar`, `name_en`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 1, 'الأسكندرية', 'Alexandria', 1, 1, '2025-03-25 13:13:39', '2025-03-25 13:15:08'),
(3, 3, 'دبي', 'Dubai', 1, 0, '2025-03-25 19:56:37', '2025-03-25 19:56:37'),
(4, 1, 'كفر الشيخ', 'kafr el-sheikh', 1, 0, '2025-04-10 16:10:22', '2025-04-10 16:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int NOT NULL,
  `city_id` int NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasAccount` int NOT NULL,
  `gender` int NOT NULL,
  `block` int NOT NULL DEFAULT '0',
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `country_id`, `city_id`, `address`, `phone`, `email`, `mobile`, `hasAccount`, `gender`, `block`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'محمود ياسين', 1, 1, '', '', '', '', 0, 0, 0, 0, 0, NULL, '2025-04-08 14:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `compositions`
--

DROP TABLE IF EXISTS `compositions`;
CREATE TABLE IF NOT EXISTS `compositions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(131) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int NOT NULL,
  `category_id` int NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `additional_cost` decimal(8,2) NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `formula_equation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(181) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compositionsdetails`
--

DROP TABLE IF EXISTS `compositionsdetails`;
CREATE TABLE IF NOT EXISTS `compositionsdetails` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `composition_id` int NOT NULL,
  `material_id` int NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `flag`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'مصر', 'Egypt', '1742914154.png', 1, 0, '2025-03-25 12:49:14', '2025-03-25 12:49:14'),
(3, 'الامارات', 'united arab states', '1742914578.png', 1, 1, '2025-03-25 12:51:33', '2025-03-25 12:56:18'),
(4, 'البحرين', 'bahreen', '1744308550.png', 1, 0, '2025-04-10 16:09:10', '2025-04-10 16:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDefault` int NOT NULL,
  `rate` decimal(8,3) NOT NULL DEFAULT '1.000',
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name_ar`, `name_en`, `symbol`, `isDefault`, `rate`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'درهم إماراتي', 'UAE dirham', 'AED', 1, 1.000, 1, 1, '2025-04-09 14:11:26', '2025-04-09 14:11:55'),
(2, 'الريال السعودي', 'saudi Ryal', 'SRA', 0, 0.767, 1, 1, '2025-04-11 04:51:34', '2025-04-11 04:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_and_bonses`
--

DROP TABLE IF EXISTS `deduction_and_bonses`;
CREATE TABLE IF NOT EXISTS `deduction_and_bonses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int NOT NULL,
  `hours` decimal(8,2) NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL,
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name_ar`, `name_en`, `prefix`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'العطور', 'Perfiums', 'P', 1, 1, '2025-03-26 09:31:48', '2025-04-11 09:15:55'),
(3, 'مستحضرات التجميل', 'cosmetics', 'CO', 1, 1, '2025-03-26 09:32:50', '2025-04-11 09:16:03'),
(4, 'العناية بالبشرة', 'skin care', 'SK', 1, 1, '2025-03-26 09:33:11', '2025-04-11 09:16:17'),
(6, 'مزيل عرق', 'dudrant', 'DO', 1, 1, '2025-04-05 07:16:39', '2025-04-11 09:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag` int NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `workHoursCount` int NOT NULL,
  `workDaysCount` int NOT NULL,
  `offWeaklyDaysCount` int NOT NULL,
  `user_ins` int NOT NULL,
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'شاشة الدول', 'Coutries Form', NULL, NULL),
(2, 'شاشة المدن', 'Cities Form', NULL, NULL),
(3, 'شاشة العملات', 'Currency Form', NULL, NULL),
(4, 'شاشة الموردين', 'Suppliers Form', NULL, NULL),
(5, 'شاشة تقييمات الموردين', 'Suppliers Reviews ', NULL, NULL),
(6, 'شاشة العملاء', 'Clients Forms', NULL, NULL),
(7, 'شاشة الماركات', 'Brands Form', NULL, NULL),
(8, 'شاشة الأقسام الرئيسية', 'Department Form', NULL, NULL),
(9, 'شاشة الأقسام الفرعية', 'Categories Form', NULL, NULL),
(10, 'شاشة المنتجات', 'Products Form', NULL, NULL),
(11, 'شاشة إضافة منتج', 'Add Product Form', NULL, NULL),
(12, 'شاشة إضافة منتج إلي مورد', 'Add Product to Supplier', NULL, NULL),
(13, 'شاشة المواد الخام', 'Material Form', NULL, NULL),
(14, 'شاشة التركيبات', 'Compositions Form', NULL, NULL),
(15, 'شاشة إضافة تركيبة', 'Add Composition Form', NULL, NULL),
(16, 'شاشة طلبات التسعير', 'Quotation Request List Form', NULL, NULL),
(17, 'شاشة عروض الأسعار', 'Quotations List', NULL, NULL),
(18, 'شاشة اخبار العطور', 'Perfume News Form', NULL, NULL),
(19, 'شاشة إضافة خبر', 'Add New Form', NULL, NULL),
(20, 'شاشة الإعلانات', 'Ads Form', NULL, NULL),
(21, 'شاشة تقرير الزيارات', 'Visitors Report', NULL, NULL),
(22, 'شاشة تقرير طلبات التسعير', 'Quotations Request Report', NULL, NULL),
(23, 'شاشة تقرير عروض الأسعار', 'Quotations Report Form', NULL, NULL),
(24, 'شاشة التقرير حسب الشركات', 'Quotation by company Report', NULL, NULL),
(25, 'شاشة تقرير عروض الأسعار حسب المنتج', 'Product Quotation Report Form', NULL, NULL),
(26, 'شاشة تقرير عروض الأسعار حسب المورد', 'Supplier Quotation Report Screen', NULL, NULL),
(27, 'شاشة المستخدمين', 'Users Form', NULL, NULL),
(28, 'شاشة الأدوار', 'Roles Form', NULL, NULL),
(29, 'شاشة الصلاحيات', 'Auth Form', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` int NOT NULL,
  `priceOfHundred` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name_ar`, `name_en`, `description_ar`, `description_en`, `unit_id`, `priceOfHundred`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'كحول اثيلي', 'ethyl alcohol', '', '', 0, 30.00, 1, 1, '2025-04-06 22:48:41', '2025-04-06 22:48:48'),
(2, 'زيت عطري فل بلدي', 'Jasmine essential oil', '', '', 0, 300.00, 1, 0, '2025-04-06 22:49:22', '2025-04-06 22:49:22'),
(3, 'زيت عطري فانيلا', 'Vanilla essential oil', '', '', 0, 290.00, 1, 0, '2025-04-06 22:49:53', '2025-04-06 22:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_18_060515_create_employees_table', 1),
(6, '2024_11_19_090252_create_deduction_and_bonses_table', 1),
(7, '2024_11_19_090545_create_rewards_table', 1),
(8, '2024_11_19_090850_create_advances_table', 1),
(44, '2025_03_17_031549_create_news_table', 15),
(10, '2024_11_26_063424_create_month_closings_table', 1),
(11, '2024_11_30_112938_create_attends_table', 1),
(12, '2025_03_17_015958_create_countries_table', 1),
(27, '2025_03_17_020236_create_cities_table', 2),
(28, '2025_03_17_021326_create_suppliers_table', 3),
(33, '2025_03_17_021433_create_categories_table', 8),
(34, '2025_03_17_021445_create_products_table', 9),
(31, '2025_03_17_021459_create_brands_table', 6),
(32, '2025_03_17_021627_create_departments_table', 7),
(36, '2025_03_17_023531_create_materials_table', 11),
(37, '2025_03_17_023557_create_compositions_table', 12),
(39, '2025_03_17_024800_create_quotation_requests_table', 13),
(41, '2025_03_17_024809_create_quotations_table', 14),
(47, '2025_03_17_025550_create_roles_table', 16),
(48, '2025_03_17_025711_create_authentications_table', 17),
(43, '2024_11_26_055714_create_settings_table', 15),
(29, '2025_03_25_215900_create_reviews_table', 4),
(30, '2025_03_25_231750_create_clients_table', 5),
(35, '2025_03_26_211843_create_supplier_products_table', 10),
(38, '2025_04_07_010304_composition_details', 12),
(40, '2025_04_08_225448_create_quotation_items_table', 13),
(42, '2025_04_08_231802_create_quotation_details_table', 14),
(45, '2025_03_17_031817_create_ads_table', 15),
(46, '2025_04_09_085223_create_currencies_table', 15),
(49, '2025_04_27_180647_create_forms_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `month_closings`
--

DROP TABLE IF EXISTS `month_closings`;
CREATE TABLE IF NOT EXISTS `month_closings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `attend_days_count` decimal(8,2) NOT NULL,
  `absence_days_count` decimal(8,2) NOT NULL,
  `deductions_days_count` decimal(8,2) NOT NULL,
  `bonse_days_count` decimal(8,2) NOT NULL,
  `deductions_amount` decimal(8,2) NOT NULL,
  `bonse_amount` decimal(8,2) NOT NULL,
  `advance_amount` decimal(8,2) NOT NULL,
  `net_salary` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL,
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL,
  `mainImg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isVisible` int NOT NULL,
  `url` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title_ar`, `title_en`, `publisher`, `date`, `mainImg`, `details_ar`, `details_en`, `img1`, `img2`, `img3`, `isVisible`, `url`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'كارل لاغرفيلد يقدم ثنائي عطري جديد وجريء', 'Karl Lagerfeld introduces a bold new olfactory duo', 'kareem shaban', '2025-04-10 04:32:00', '1744259556mainImg.jpg', '<p><strong>في عام ٢٠٢٥، تُطلق دار &quot;لي بارفان ماتيير&quot; من كارل لاغرفيلد إبداعين جديدين يُكملان تكريم الدار لنبل المواد الخام، وهو نهجٌ مُتجذر في شغف لاغرفيلد الدائم بالأنسجة والحرفية. يُقدم هذا الثنائي الجديد لمسةً راقيةً وعصريةً لمكونين شهيرين، السوسن وخشب الصندل، مُحتفيًا بفن صناعة العطور من خلال تركيباتٍ جريئةٍ وحسية. يُضفي عطر &quot;فلور ديريس&quot; لمسةً من زهرة السوسن الثمينة على قلب عطرٍ زهريٍّ كهرمانيٍّ مُشرق. يُفتتح العطر بنفحاتٍ من خلاصة اليوسفي وخلاصة زهر البرتقال، ليكشف عن سوسنٍ كريميٍّ ناعمٍ يتكشف برشاقةٍ على البشرة. تُضفي نفحاتٌ ناعمةٌ من الهليوتروب وخلاصة الفانيليا المدغشقرية والمسك أثرًا حسيًا مُغلفًا - أنيقًا ومريحًا، ولكنه عصريٌّ بلا شك. يُبرز عطر &quot;بوا دو سانتال&quot; عمق وثراء خشب الصندل، مُعززًا بنفحات منعشة وحارة من فلفل مدغشقر الأسود والمريمية والسرو. في قلبه، يُعزز دفء خلاصة خشب الصندل بهالة بالو سانتو المقدسة. قاعدة من حبوب التونكا والعنبر تُضفي حسية دخانية وأثرًا طويل الأمد على هذا العطر الحار والخشبي والعنبري. صُنع هذان العطران بشغف وعاطفة، ويُجسدان روح &quot;لي بارفان ماتيير&quot;: قوية وأنيقة وخالدة.</strong></p>', '<p><strong>في عام ٢٠٢٥، تُطلق دار &quot;لي بارفان ماتيير&quot; من كارل لاغرفيلد إبداعين جديدين يُكملان تكريم الدار لنبل المواد الخام، وهو نهجٌ مُتجذر في شغف لاغرفيلد الدائم بالأنسجة والحرفية. يُقدم هذا الثنائي الجديد لمسةً راقيةً وعصريةً لمكونين شهيرين، السوسن وخشب الصندل، مُحتفيًا بفن صناعة العطور من خلال تركيباتٍ جريئةٍ وحسية. يُضفي عطر &quot;فلور ديريس&quot; لمسةً من زهرة السوسن الثمينة على قلب عطرٍ زهريٍّ كهرمانيٍّ مُشرق. يُفتتح العطر بنفحاتٍ من خلاصة اليوسفي وخلاصة زهر البرتقال، ليكشف عن سوسنٍ كريميٍّ ناعمٍ يتكشف برشاقةٍ على البشرة. تُضفي نفحاتٌ ناعمةٌ من الهليوتروب وخلاصة الفانيليا المدغشقرية والمسك أثرًا حسيًا مُغلفًا - أنيقًا ومريحًا، ولكنه عصريٌّ بلا شك. يُبرز عطر &quot;بوا دو سانتال&quot; عمق وثراء خشب الصندل، مُعززًا بنفحات منعشة وحارة من فلفل مدغشقر الأسود والمريمية والسرو. في قلبه، يُعزز دفء خلاصة خشب الصندل بهالة بالو سانتو المقدسة. قاعدة من حبوب التونكا والعنبر تُضفي حسية دخانية وأثرًا طويل الأمد على هذا العطر الحار والخشبي والعنبري. صُنع هذان العطران بشغف وعاطفة، ويُجسدان روح &quot;لي بارفان ماتيير&quot;: قوية وأنيقة وخالدة.</strong></p>', '1744262865img1.jpg', '', '', 1, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=acc-suez&table=advances', 1, 1, '2025-04-10 02:32:36', '2025-04-11 04:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int NOT NULL,
  `department_id` int NOT NULL,
  `category_id` int NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isPrivate` int NOT NULL,
  `isAvailable` int NOT NULL,
  `type` int NOT NULL,
  `mainImg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img4` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isReviewed` int NOT NULL DEFAULT '1',
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `department_id`, `category_id`, `code`, `name_ar`, `name_en`, `description_ar`, `description_en`, `short_description_ar`, `short_description_en`, `tag`, `isPrivate`, `isAvailable`, `type`, `mainImg`, `img1`, `img2`, `img3`, `img4`, `isReviewed`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'PR-000001', 'عود عربي', 'Arabic Ouad', '<h3><strong>عطر عود شرقي برائحة مميزة لا تقاوم بطابع عربي عبوة 100 مللي بتغليف مميز انيق تصلح ان تكون هدية مميزة . أيضا تقدم بصناعة إماراتية فاخرة وثبات يدوم لأيام</strong></h3>', '<h3><strong>An oriental oud perfume with an irresistible, distinctive scent and an Arabian flair. A 100ml bottle in elegant packaging, it makes a great gift. It&#39;s also made in the UAE and has a long-lasting scent.</strong></h3>', 'عطر عود شرقي برائحة مميزة لا تقاوم بطابع عربي', 'An oriental oud perfume with a distinctive, irresistible scent and an Arabic character.', 'شرقي', 0, 1, 0, '1743070819mainImg.webp', '1743070819img1.webp', '', '', '', 1, 1, 0, '2025-03-27 08:20:19', '2025-04-10 03:42:54'),
(2, 1, 3, 2, 'PR-000002', 'شامبو كلير ازرق', 'Blue Clear Shampoo', 'شامبو كلير ازرق ضد القشرة  عبوة حجم 300 مللي بتركيبة جديدة مميزة ضد القشرة و تقوية خصلات الشعر خلاصة من اعشاب طبيعية و مناسب لجميع انواع الشعر المختلفة', 'Clear Blue Anti-Dandruff Shampoo, 300ml bottle, with a new, distinctive formula against dandruff and strengthening hair strands, extracted from natural herbs, and suitable for all different hair types.', 'شامبو كلير ازرق ضد القشرة', 'Clear blue anti-dandruff shampoo', 'shampoo', 0, 1, 0, '1743288843mainImg.jpg', '1743288843img1.jpg', '1743288843img2.jpg', '', '', 1, 1, 0, '2025-03-29 20:54:03', '2025-03-29 20:54:03'),
(3, 3, 3, 3, 'PR-000003', 'كريم فاتيكا للشعر', 'Vatika Hair Cream', 'كريم الحمام فاتيكا ناتشورالز يغذي ويحمي تصفيف الشعر 125 مل | الحنة واللوز والصبار مع زيوت فاتيكا المغذية', 'Vatika Naturals nourish & protect styling Hammam cream 125 ml | henna, almond & aloe vera with nourishing vatika oils', 'كريم فاتيكا لتصفيف الشعر و تغذيته', '', 'Hair Cream', 0, 1, 0, '1743289015mainImg.jpg', '1743289016img1.jpg', '', '', '', 1, 1, 0, '2025-03-29 20:56:56', '2025-03-29 20:56:56'),
(4, 4, 6, 4, 'PR-000004', 'ريكسونا 72 ساعة', 'Rexona 72h', 'مزيل عرق ريكسونا اسبراي برائحة عطرية مميزة يدوم حتي 72 ساعة لا يترك أثر علي الملابس', 'Rexona deodorant spray with a distinctive fragrant scent that lasts up to 72 hours and does not leave a residue on clothes', 'مزيل عرق ريكسونا اسبراي', 'Rexona Deodorant Spray', 'مزيل عرق', 0, 1, 0, '1743844773mainImg.jpg', '1743844774img1.jpg', '1743844774img2.jpg', '', '', 1, 1, 0, '2025-04-05 07:19:34', '2025-04-05 07:19:34'),
(7, 1, 1, 1, 'CLPA000005', 'xx', 'xxx', '', '', 'xx', 'xx', 'xx', 1, 1, 0, '1746043679mainImg.jpg', '', '', '', '', 0, 13, 0, '2025-04-30 17:07:59', '2025-04-30 17:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

DROP TABLE IF EXISTS `quotations`;
CREATE TABLE IF NOT EXISTS `quotations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `request_id` int NOT NULL,
  `ref_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int NOT NULL,
  `client_id` int NOT NULL,
  `date` timestamp NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `net` decimal(8,2) NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_details`
--

DROP TABLE IF EXISTS `quotation_details`;
CREATE TABLE IF NOT EXISTS `quotation_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quotation_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

DROP TABLE IF EXISTS `quotation_items`;
CREATE TABLE IF NOT EXISTS `quotation_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quotation_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_requests`
--

DROP TABLE IF EXISTS `quotation_requests`;
CREATE TABLE IF NOT EXISTS `quotation_requests` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(181) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `state` int NOT NULL,
  `date` timestamp NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `review` decimal(8,2) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `client_id`, `supplier_id`, `review`, `comment`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 4.50, 'خدمة ممتازة انصح بالتعامل معه ', NULL, NULL),
(3, 1, 2, 4.00, 'خدمة ممتازة انصح بالتعامل معه ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

DROP TABLE IF EXISTS `rewards`;
CREATE TABLE IF NOT EXISTS `rewards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int NOT NULL,
  `reward` decimal(8,2) NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL,
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name_ar`, `name_en`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'مدير الموقع', 'site Admin', 1, 1, '2025-04-10 04:10:37', '2025-04-10 04:10:41'),
(2, 'مشرف', 'supervisor', 1, 0, '2025-04-10 04:10:55', '2025-04-10 04:10:55'),
(3, 'مدخل بيانات', 'data entery', 1, 0, '2025-04-10 04:11:08', '2025-04-10 04:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FDOFDIV07t4PDReDJ0DWL9TCaCQQyGPLJprlBBCQ', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQU9lcng5bXBWTHNzNDUwRVVPRXZMazRKc0tzd2ZXam5oSE1ITUgzNiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746040226),
('C5N9pT3I15EnbVLPMou6vuzYEtjDE02K5qO9IWIN', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTU9ybklCY2owU3VTUlZqZWhzalF3c2NjempOQlVETGVaYXNaRTZGZSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746042313),
('Hkr06Z53GiqpbWPzUnCa9NGeaHQxUH1tuHcU13EV', 13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNktZTWdvNVhDQ0NTR2o2b1l1NWhSZHdjWldiUVZ4S0tueGtZVk8xMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hci9jcmVhdGUtY29tcG9zaXRpb25zIjt9czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0NjA0MzM4NDt9fQ==', 1746043901);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `defaultCurrency` int NOT NULL,
  `user_ins` int NOT NULL,
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int NOT NULL,
  `city_id` int NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vatNumber` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrationNumber` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasAccount` int NOT NULL DEFAULT '0',
  `block` int NOT NULL DEFAULT '0',
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `company`, `logo`, `country_id`, `city_id`, `address`, `phone`, `email`, `mobile`, `vatNumber`, `registrationNumber`, `type`, `hasAccount`, `block`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(1, 'محمد عرفة', 'عرفة استور', '1742939450.png', 1, 1, 'اسكندرية بكوس اول طريق 45', '04584511452', 'info@arafa.com', '01014974471', '', '', '0', 1, 0, 1, 11, '2025-03-25 19:50:51', '2025-04-28 15:43:53'),
(2, 'حمادة برل', 'مصنع برل للعطور', '1742939670.png', 1, 1, '', '', '', '01229540308', '', '', '1', 1, 0, 1, 0, '2025-03-25 19:54:30', '2025-04-28 15:06:08'),
(3, 'حمد ابو سلطان', 'لاروز بيوتي', '1742939879.png', 3, 3, '', '', '', '04514541121', '', '', '0', 1, 0, 1, 0, '2025-03-25 19:57:59', '2025-04-30 17:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_products`
--

DROP TABLE IF EXISTS `supplier_products`;
CREATE TABLE IF NOT EXISTS `supplier_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `finalPrice` decimal(8,2) NOT NULL,
  `user_ins` int NOT NULL DEFAULT '0',
  `user_upd` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_products`
--

INSERT INTO `supplier_products` (`id`, `supplier_id`, `product_id`, `price`, `quantity`, `discount`, `finalPrice`, `user_ins`, `user_upd`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 150.00, 500, 0.00, 150.00, 1, 1, '2025-04-06 21:22:18', '2025-04-08 14:48:30'),
(3, 1, 4, 75.00, 100, 0.00, 75.00, 1, 0, '2025-04-10 16:28:47', '2025-04-10 16:28:47'),
(6, 1, 1, 1950.00, 100, 0.00, 1950.00, 11, 0, '2025-04-30 07:57:58', '2025-04-30 07:57:58'),
(7, 1, 2, 25.00, 100, 0.00, 25.00, 1, 0, '2025-04-30 16:56:49', '2025-04-30 16:56:49'),
(8, 3, 7, 100.00, 50, 0.00, 100.00, 13, 0, '2025-04-30 17:07:59', '2025-04-30 17:07:59'),
(9, 3, 1, 125.00, 100, 0.00, 125.00, 13, 0, '2025-04-30 17:08:20', '2025-04-30 17:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL DEFAULT '0',
  `supplier_id` int NOT NULL DEFAULT '0',
  `block` int NOT NULL DEFAULT '0',
  `role_id` int NOT NULL DEFAULT '0',
  `default_password` varchar(171) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `type`, `supplier_id`, `block`, `role_id`, `default_password`, `verified`, `created_at`, `updated_at`) VALUES
(1, 'kareem', 'admin@gmail.com', NULL, '$2y$12$.6YaoGzzHbcFbgpqFxzhWe/jShIxjD0K2QIiZW3oqlVi0jYL7IvKS', '9nSgc2cfrKVZst4YUiQxVUg5GjkSXq20lgE7H5qv7cLnnLHsYrEXugwYNsFK', 0, 0, 0, 1, '', 0, '2025-01-18 06:56:31', '2025-04-26 16:13:39'),
(3, 'محمد بلتاجي', 'm@beltagy.com', NULL, '$2y$12$/AstO5z2wgr4RDGep0AuU.02UVizgSabmx62OSQvivSmG1Ij.42P6', 'JKDTGDlBylu4EJe9hgTCtmSjKZBUeyA2CxuUPLKXhDxlbcsyeLa0KBTEDPpr', 0, 0, 0, 1, '', 0, '2025-01-23 13:21:42', '2025-04-10 15:50:03'),
(4, 'حمد ابو سلطان', 'hamed_laroze@shoonah.com', NULL, '$2y$10$BdvBSnS1FLY8ESqlxegOaeJaJqEBe9zPHlqiK70X7JPa0v0/WwnNG', NULL, 0, 3, 0, 0, '', 0, '2025-03-25 20:54:41', '2025-03-25 22:33:04'),
(12, 'حمادة برل', 'hamda@shoonah.com', NULL, '$2y$12$2K1tGVn2uRo.v7eVp3M9GOVNAVfDQKWzpwE7ceWVwoebaZ0DPUDje', 'nKVk4I77MYTdzpC6TY7lwN3h1MtiV6ZFXYm5WL0HCZ5yVm3SeF6xI17I032C', 1, 2, 0, 0, '$2y$12$UPGMnZ2hhB3OH5OBTLu3bOWkN3OwMaax/R3w4yKlPPx.6FWKFJfGi', 1, '2025-04-28 15:06:08', '2025-04-28 15:06:44'),
(11, 'محمد عرفة', 'arafa@shoonah.com', NULL, '$2y$12$pIcxPOZhe2gWbJFzATFMCOqZQML71ck2lCQx/I4TGoGvxKTAq0tca', 'V4hMU8pKYHPoajtOrDKrQrH0fANciKl0wTINRqMrkNyrFoDvwuv41DLMCozD', 1, 1, 0, 0, '$2y$12$VCt6.OK7mAjz58Ips681Q.6txDuA/vlG.fYaRANC.O/Htkubbbj.C', 1, '2025-04-28 13:35:56', '2025-04-28 14:26:30'),
(13, 'حمد ابو سلطان', 'test@shoonah.com', NULL, '$2y$12$xzDSD6W6V8OHb9SldeUi.u49UZrzHYsWowBtbBLqHbm5SHbTaz4SG', 'QSpn9AOf4YsppgFiJFPnpOPDPJHG8YjysdbHlAvcdpe2vDfY9fEoVqjeL7y9', 1, 3, 0, 0, '$2y$12$NYOIsEom6VG35Hr9YlK/3Oe/g0Jwr9UsSsljhZBPvoqMfGCI0KGC2', 1, '2025-04-30 17:02:54', '2025-04-30 17:03:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
