-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 10:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sialvi_motors_business`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `client_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `contact`, `cnic`, `address`, `client_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(1, 'Super Asia', '0000000', '00000000000', '000000', 'vendor', '2021-10-14 08:45:09', 6, NULL, NULL, 0),
(2, 'Kashif Imran', '03123836371', '34101-6895562-5', 'GT road Lahori Chungi Muhala Mukhtar colony gujranwala', 'client', '2021-10-14 08:51:43', 6, NULL, NULL, 0),
(3, 'Muhammad Afzal', '03057211352', '34102-0969228-9', 'Line Paar Muhalla bahar sanah kamonki district gujranwala', 'client', '2021-10-14 09:16:39', 6, NULL, NULL, 0),
(4, 'Naeem Ullah Nazeer', '03058732897', '34104-7655501-9', 'Daak Khana Khass laweriwala Tehsil wazirabad District Gujranwala', 'client', '2021-10-14 10:09:07', 6, NULL, NULL, 0),
(5, 'Muhammad Ramzan', '03016408383', '34104-7679392-9', 'Weryal Khurd post office tehsil wazirabad district gujranwala', 'client', '2021-10-14 10:14:07', 6, NULL, NULL, 0),
(6, 'Muhammad Saleem Abbas', '03216643719', '34101-4112878-9', '..', 'client', '2021-10-14 10:19:56', 6, NULL, NULL, 0),
(7, 'Zulfiqar', '03134021540', '34101-4839316-9', 'Link Sui Gass Road Street No 1 Muhalla Shokatabad Gujranwala', 'client', '2021-10-14 10:24:54', 6, NULL, NULL, 0),
(8, 'Habib Maseeh', '03057005143', '34101-2371683-7', 'Saharan Khwad post office khas tehsil wazirabad district gujranwala', 'client', '2021-10-14 10:30:40', 6, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2021_09_17_103555_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `purchase_id` varchar(100) DEFAULT NULL,
  `sale_id` varchar(100) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `debit_card` double DEFAULT NULL,
  `credit_card` double DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `purchase_id`, `sale_id`, `client_id`, `type`, `status`, `description`, `date`, `debit_card`, `credit_card`, `created_by`, `created_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(85, NULL, 'SL - 1', 2, 'Client', NULL, 'This is Cash in', '2021-10-20', 0, 20, 1, '2021-10-20 11:11:36', NULL, NULL, 0),
(86, NULL, 'SL - 1', 2, 'Client', NULL, 'This is Cash in', '2021-10-20', 0, 20, 1, '2021-10-20 11:37:21', NULL, NULL, 0),
(87, NULL, 'SL - 2', 2, 'Client', NULL, 'This is Cash in', '2021-10-22', 0, 1000, 1, '2021-10-22 08:18:32', NULL, NULL, 0),
(88, NULL, '3', 6, 'Sale', NULL, 'Sale Amount', '2021-10-19', 290000, 0, 6, '2021-10-28 08:23:33', NULL, NULL, 0),
(89, NULL, '3', 6, 'Sale', NULL, 'Advance Amount', '2021-10-12', 0, 200, 6, '2021-10-28 08:23:33', NULL, NULL, 0),
(90, NULL, 'SL-4', 3, 'Sale', NULL, 'Sale Amount', '2021-10-05', 290000, 0, 6, '2021-10-28 08:37:06', NULL, NULL, 0),
(91, NULL, 'SL-4', 3, 'Sale', NULL, 'Advance Amount', '2021-10-05', 0, 200, 6, '2021-10-28 08:37:06', NULL, NULL, 0),
(92, NULL, 'SL-4', 3, 'Rent Amount', NULL, 'this is test', '2021-10-28', 45, 0, 6, '2021-10-28 10:13:29', NULL, NULL, 0),
(93, NULL, 'SL-4', 3, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 45, 6, '2021-10-28 10:13:29', NULL, NULL, 0),
(94, NULL, 'SL-4', 3, 'Installment', NULL, 'this is test', '2021-10-28', 0, 3000, 6, '2021-10-28 10:13:29', NULL, NULL, 0),
(95, NULL, 'SL-4', 3, 'Rent Amount', NULL, 'this is test', '2021-10-28', 45, 0, 6, '2021-10-28 10:15:45', NULL, NULL, 0),
(96, NULL, 'SL-4', 3, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 45, 6, '2021-10-28 10:15:45', NULL, NULL, 0),
(97, NULL, 'SL-4', 3, 'Installment', NULL, 'this is test', '2021-10-28', 0, 3000, 6, '2021-10-28 10:15:45', NULL, NULL, 0),
(98, NULL, 'SL-4', 3, 'Rent Amount', NULL, 'this is test', '2021-10-28', 45, 0, 6, '2021-10-28 10:19:06', NULL, NULL, 0),
(99, NULL, 'SL-4', 3, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 45, 6, '2021-10-28 10:19:06', NULL, NULL, 0),
(100, NULL, 'SL-4', 3, 'Installment', NULL, 'this is test', '2021-10-28', 0, 3000, 6, '2021-10-28 10:19:06', NULL, NULL, 0),
(101, NULL, 'SL-4', 3, 'Rent Amount', NULL, 'this is test', '2021-10-28', 45, 0, 6, '2021-10-28 10:19:22', NULL, NULL, 0),
(102, NULL, 'SL-4', 3, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 45, 6, '2021-10-28 10:19:22', NULL, NULL, 0),
(103, NULL, 'SL-4', 3, 'Installment', NULL, 'this is test', '2021-10-28', 0, 3000, 6, '2021-10-28 10:19:22', NULL, NULL, 0),
(104, NULL, 'SL-4', 3, 'Rent Amount', NULL, 'this is test', '2021-10-28', 45, 0, 6, '2021-10-28 10:26:15', NULL, NULL, 0),
(105, NULL, 'SL-4', 3, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 45, 6, '2021-10-28 10:26:15', NULL, NULL, 0),
(106, NULL, 'SL-4', 3, 'Installment', NULL, 'this is test', '2021-10-28', 0, 3000, 6, '2021-10-28 10:26:15', NULL, NULL, 0),
(107, NULL, 'SL-5', 6, 'Sale', NULL, 'Sale Amount', '2021-10-28', 10000, 0, 6, '2021-10-28 12:14:15', NULL, NULL, 0),
(108, NULL, 'SL-5', 6, 'Sale', NULL, 'Advance Amount', '2021-10-28', 0, 2000, 6, '2021-10-28 12:14:15', NULL, NULL, 0),
(109, NULL, 'SL-5', 6, 'Rent Amount', NULL, 'this is test', '2021-10-28', 1000, 0, 6, '2021-10-28 12:19:23', NULL, NULL, 0),
(110, NULL, 'SL-5', 6, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 1000, 6, '2021-10-28 12:19:23', NULL, NULL, 0),
(111, NULL, 'SL-5', 6, 'Installment', NULL, 'this is test', '2021-10-28', 0, 11000, 6, '2021-10-28 12:19:23', NULL, NULL, 0),
(112, NULL, 'SL-5', 6, 'Rent Amount', NULL, 'this is test', '2021-10-28', 1000, 0, 6, '2021-10-28 12:20:25', NULL, NULL, 0),
(113, NULL, 'SL-5', 6, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 1000, 6, '2021-10-28 12:20:25', NULL, NULL, 0),
(114, NULL, 'SL-5', 6, 'Installment', NULL, 'this is test', '2021-10-28', 0, 11000, 6, '2021-10-28 12:20:25', NULL, NULL, 0),
(115, NULL, 'SL-5', 6, 'Rent Amount', NULL, 'this is test', '2021-10-28', 1000, 0, 6, '2021-10-28 12:21:08', NULL, NULL, 0),
(116, NULL, 'SL-5', 6, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 1000, 6, '2021-10-28 12:21:08', NULL, NULL, 0),
(117, NULL, 'SL-5', 6, 'Installment', NULL, 'this is test', '2021-10-28', 0, 11000, 6, '2021-10-28 12:21:08', NULL, NULL, 0),
(118, NULL, 'SL-5', 6, 'Rent Amount', NULL, 'this is test', '2021-10-28', 1000, 0, 6, '2021-10-28 12:21:39', NULL, NULL, 0),
(119, NULL, 'SL-5', 6, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 1000, 6, '2021-10-28 12:21:39', NULL, NULL, 0),
(120, NULL, 'SL-5', 6, 'Installment', NULL, 'this is test', '2021-10-28', 0, 11000, 6, '2021-10-28 12:21:39', NULL, NULL, 0),
(121, NULL, 'SL-5', 6, 'Rent Amount', NULL, 'this is test', '2021-10-28', 1000, 0, 6, '2021-10-28 12:21:58', NULL, NULL, 0),
(122, NULL, 'SL-5', 6, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 1000, 6, '2021-10-28 12:21:59', NULL, NULL, 0),
(123, NULL, 'SL-5', 6, 'Installment', NULL, 'this is test', '2021-10-28', 0, 11000, 6, '2021-10-28 12:21:59', NULL, NULL, 0),
(124, NULL, 'SL-5', 6, 'Rent Amount', NULL, 'this is test', '2021-10-28', 1000, 0, 6, '2021-10-28 12:22:40', NULL, NULL, 0),
(125, NULL, 'SL-5', 6, 'Rent Received', NULL, 'this is test', '2021-10-28', 0, 1000, 6, '2021-10-28 12:22:40', NULL, NULL, 0),
(126, NULL, 'SL-5', 6, 'Installment', NULL, 'this is test', '2021-10-28', 0, 11000, 6, '2021-10-28 12:22:40', NULL, NULL, 0),
(127, NULL, 'SL-5', 6, 'Rent Amount', NULL, 'this is test', '2021-10-29', 65000, 0, 6, '2021-10-29 08:37:04', NULL, NULL, 0),
(128, NULL, 'SL-5', 6, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 65000, 6, '2021-10-29 08:37:04', NULL, NULL, 0),
(129, NULL, 'SL-5', 6, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 08:37:04', NULL, NULL, 0),
(130, NULL, 'SL-6', 5, 'Sale', NULL, 'Sale Amount', '2021-10-29', 5000, 0, 6, '2021-10-29 08:46:02', NULL, NULL, 0),
(131, NULL, 'SL-6', 5, 'Sale', NULL, 'Advance Amount', '2021-10-29', 0, 200, 6, '2021-10-29 08:46:02', NULL, NULL, 0),
(132, NULL, 'SL-6', 5, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 08:59:32', NULL, NULL, 0),
(133, NULL, 'SL-6', 5, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 08:59:32', NULL, NULL, 0),
(134, NULL, 'SL-6', 5, 'Installment', NULL, 'this is test', '2021-10-29', 0, 5045, 6, '2021-10-29 08:59:32', NULL, NULL, 0),
(135, NULL, 'SL-7', 8, 'Sale', NULL, 'Sale Amount', '2021-10-29', 290000, 0, 6, '2021-10-29 09:03:09', NULL, NULL, 0),
(136, NULL, 'SL-7', 8, 'Sale', NULL, 'Advance Amount', '2021-10-29', 0, 200, 6, '2021-10-29 09:03:09', NULL, NULL, 0),
(137, NULL, 'SL-8', 2, 'Sale', NULL, 'Sale Amount', '2021-10-29', 5000, 0, 6, '2021-10-29 09:07:04', NULL, NULL, 0),
(138, NULL, 'SL-8', 2, 'Sale', NULL, 'Advance Amount', '2021-10-29', 0, 200, 6, '2021-10-29 09:07:04', NULL, NULL, 0),
(139, NULL, 'SL-8', 2, 'Rent Amount', NULL, 'this is test', '2021-10-29', 1000, 0, 6, '2021-10-29 09:08:41', NULL, NULL, 0),
(140, NULL, 'SL-8', 2, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 1000, 6, '2021-10-29 09:08:41', NULL, NULL, 0),
(141, NULL, 'SL-8', 2, 'Installment', NULL, 'this is test', '2021-10-29', 0, 6000, 6, '2021-10-29 09:08:41', NULL, NULL, 0),
(142, NULL, 'SL-9', 2, 'Sale', NULL, 'Advance Amount', '2021-10-29', 0, 1000, 6, '2021-10-29 09:13:35', 6, NULL, 0),
(143, NULL, 'SL-9', 2, 'Sale', NULL, 'Advance Amount', '2021-10-29', 0, 1000, 6, '2021-10-29 09:13:35', 6, NULL, 0),
(144, NULL, 'SL-9', 2, 'Sale', NULL, 'Advance Amount', '2021-10-29', 0, 1000, 6, '2021-10-29 09:15:01', 6, NULL, 0),
(145, NULL, 'SL-9', 2, 'Sale', NULL, 'Advance Amount', '2021-10-29', 0, 1000, 6, '2021-10-29 09:15:01', 6, NULL, 0),
(146, NULL, 'SL-9', 2, 'Sale', NULL, 'Advance Amount', '2021-10-29', 0, 1000, 6, '2021-10-29 09:15:01', 6, NULL, 0),
(147, NULL, 'SL-10', 3, 'Sale', NULL, 'Sale Amount', '2021-10-29', 290000, 0, 6, '2021-10-29 09:45:02', NULL, NULL, 0),
(148, NULL, 'SL-10', 3, 'Sale', NULL, 'Advance Amount', '2021-10-29', 0, 200, 6, '2021-10-29 09:45:02', NULL, NULL, 0),
(149, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:15:58', NULL, NULL, 0),
(150, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:15:58', NULL, NULL, 0),
(151, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:15:58', NULL, NULL, 0),
(152, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:28:06', NULL, NULL, 0),
(153, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:28:06', NULL, NULL, 0),
(154, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:28:06', NULL, NULL, 0),
(155, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:28:21', NULL, NULL, 0),
(156, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:28:21', NULL, NULL, 0),
(157, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:28:21', NULL, NULL, 0),
(158, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:30:05', NULL, NULL, 0),
(159, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:30:05', NULL, NULL, 0),
(160, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:30:05', NULL, NULL, 0),
(161, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:30:22', NULL, NULL, 0),
(162, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:30:22', NULL, NULL, 0),
(163, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:30:22', NULL, NULL, 0),
(164, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:30:37', NULL, NULL, 0),
(165, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:30:37', NULL, NULL, 0),
(166, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:30:37', NULL, NULL, 0),
(167, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:30:53', NULL, NULL, 0),
(168, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:30:53', NULL, NULL, 0),
(169, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:30:53', NULL, NULL, 0),
(170, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:31:13', NULL, NULL, 0),
(171, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:31:13', NULL, NULL, 0),
(172, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:31:13', NULL, NULL, 0),
(173, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:31:43', NULL, NULL, 0),
(174, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:31:43', NULL, NULL, 0),
(175, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:31:43', NULL, NULL, 0),
(176, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:31:58', NULL, NULL, 0),
(177, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:31:58', NULL, NULL, 0),
(178, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:31:58', NULL, NULL, 0),
(179, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:33:02', NULL, NULL, 0),
(180, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:33:02', NULL, NULL, 0),
(181, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:33:02', NULL, NULL, 0),
(182, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:33:56', NULL, NULL, 0),
(183, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:33:56', NULL, NULL, 0),
(184, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:33:56', NULL, NULL, 0),
(185, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:37:30', NULL, NULL, 0),
(186, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:37:30', NULL, NULL, 0),
(187, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:37:30', NULL, NULL, 0),
(188, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:37:43', NULL, NULL, 0),
(189, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:37:43', NULL, NULL, 0),
(190, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 11000, 6, '2021-10-29 10:37:43', NULL, NULL, 0),
(191, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:38:00', NULL, NULL, 0),
(192, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:38:00', NULL, NULL, 0),
(193, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:38:00', NULL, NULL, 0),
(194, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:38:57', NULL, NULL, 0),
(195, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:38:57', NULL, NULL, 0),
(196, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:38:57', NULL, NULL, 0),
(197, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:39:05', NULL, NULL, 0),
(198, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:39:05', NULL, NULL, 0),
(199, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:39:05', NULL, NULL, 0),
(200, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:39:21', NULL, NULL, 0),
(201, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:39:21', NULL, NULL, 0),
(202, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:39:21', NULL, NULL, 0),
(203, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:39:28', NULL, NULL, 0),
(204, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:39:28', NULL, NULL, 0),
(205, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:39:28', NULL, NULL, 0),
(206, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:39:39', NULL, NULL, 0),
(207, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:39:39', NULL, NULL, 0),
(208, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:39:39', NULL, NULL, 0),
(209, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:41:53', NULL, NULL, 0),
(210, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:41:53', NULL, NULL, 0),
(211, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:41:53', NULL, NULL, 0),
(212, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:42:03', NULL, NULL, 0),
(213, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:42:03', NULL, NULL, 0),
(214, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:42:03', NULL, NULL, 0),
(215, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:43:43', NULL, NULL, 0),
(216, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:43:43', NULL, NULL, 0),
(217, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:43:43', NULL, NULL, 0),
(218, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:44:18', NULL, NULL, 0),
(219, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:44:18', NULL, NULL, 0),
(220, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:44:18', NULL, NULL, 0),
(221, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:49:55', NULL, NULL, 0),
(222, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:49:55', NULL, NULL, 0),
(223, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:49:55', NULL, NULL, 0),
(224, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:50:08', NULL, NULL, 0),
(225, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:50:08', NULL, NULL, 0),
(226, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:50:08', NULL, NULL, 0),
(227, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:50:32', NULL, NULL, 0),
(228, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:50:32', NULL, NULL, 0),
(229, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:50:32', NULL, NULL, 0),
(230, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:51:41', NULL, NULL, 0),
(231, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:51:41', NULL, NULL, 0),
(232, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:51:41', NULL, NULL, 0),
(233, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:52:36', NULL, NULL, 0),
(234, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:52:36', NULL, NULL, 0),
(235, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:52:36', NULL, NULL, 0),
(236, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:54:09', NULL, NULL, 0),
(237, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:54:09', NULL, NULL, 0),
(238, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:54:09', NULL, NULL, 0),
(239, NULL, 'SL-10', 3, 'Rent Amount', NULL, 'this is test', '2021-10-29', 45, 0, 6, '2021-10-29 10:54:36', NULL, NULL, 0),
(240, NULL, 'SL-10', 3, 'Rent Received', NULL, 'this is test', '2021-10-29', 0, 45, 6, '2021-10-29 10:54:36', NULL, NULL, 0),
(241, NULL, 'SL-10', 3, 'Installment', NULL, 'this is test', '2021-10-29', 0, 290045, 6, '2021-10-29 10:54:36', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administer roles & permissions', 'web', '2021-09-17 18:14:29', '2021-09-17 18:14:29'),
(2, 'admin', 'web', '2021-09-17 18:17:30', '2021-09-17 18:17:30'),
(3, 'client', 'web', '2021-09-17 18:20:09', '2021-09-17 18:20:09'),
(4, 'supplier', 'web', '2021-09-17 18:20:19', '2021-09-17 18:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `sale_rate` varchar(100) NOT NULL,
  `purchase_rate` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `brand`, `sale_rate`, `purchase_rate`, `created_by`, `created_at`, `updated_by`, `update_at`, `is_deleted`) VALUES
(1, 'Tuk Tuk edit', 'Tuk Tuk', '00', '000', 6, '2021-10-14 08:46:28', 6, '2021-10-28 06:05:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_amount` double NOT NULL,
  `paid_amount` double NOT NULL,
  `date` date NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `serial_num` varchar(100) NOT NULL,
  `engine_num` varchar(100) NOT NULL,
  `is_sold` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-09-17 18:17:44', '2021-09-17 18:17:44'),
(2, 'client', 'web', '2021-09-17 18:20:31', '2021-09-17 18:20:31'),
(3, 'supplier', 'web', '2021-09-17 18:20:40', '2021-09-17 18:20:40');

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
(1, 1),
(2, 1),
(3, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sale_amount` double NOT NULL,
  `advance_amount` double NOT NULL,
  `date` date NOT NULL,
  `serial_num` varchar(100) DEFAULT NULL,
  `engine_num` varchar(100) DEFAULT NULL,
  `frame_num` varchar(100) NOT NULL,
  `remaining_asal` double NOT NULL,
  `total_amount` double NOT NULL,
  `total_rent` double NOT NULL,
  `final_installment` double DEFAULT NULL,
  `asal_installment` int(11) NOT NULL,
  `installment_amount` double NOT NULL,
  `witness_name_1` varchar(100) DEFAULT NULL,
  `witness_name_2` varchar(100) DEFAULT NULL,
  `witness_cnic_1` varchar(100) DEFAULT NULL,
  `witness_cnic_2` varchar(100) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `advocate_name` varchar(100) DEFAULT NULL,
  `no_of_installments` varchar(100) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `rent_rate` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `client_id`, `sale_amount`, `advance_amount`, `date`, `serial_num`, `engine_num`, `frame_num`, `remaining_asal`, `total_amount`, `total_rent`, `final_installment`, `asal_installment`, `installment_amount`, `witness_name_1`, `witness_name_2`, `witness_cnic_1`, `witness_cnic_2`, `file`, `advocate_name`, `no_of_installments`, `paid_amount`, `rent_rate`, `created_at`, `created_by`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 1, 2, 5000, 200, '2021-10-28', '3214242', '3243235', 'TT20021958', 4800, 5135, 135, 245, 0, 5045, NULL, NULL, NULL, NULL, '', NULL, '3', NULL, '45', '2021-10-28 06:58:08', 6, NULL, NULL, 0),
(2, 1, 3, 900, 200, '2021-10-28', '3214242', 'TT20021958', 'TT20021958', 700, 1300, 400, 1000, 0, 1000, NULL, NULL, NULL, NULL, 'upload/architectural-design-for-technicians  -1.jpg', NULL, '4', NULL, '100', '2021-10-28 06:59:39', 6, NULL, NULL, 0),
(3, 1, 6, 290000, 200, '2021-10-28', '3214242', '3243235', '3243235', 289800, 485000, 195000, 1000, 0, 355000, NULL, NULL, NULL, NULL, 'upload/architectural-design-for-technicians  -1.jpg', NULL, '3', NULL, '65000', '2021-10-28 08:23:33', 6, NULL, NULL, 0),
(4, 1, 3, 290000, 200, '2021-10-28', '3214242', '3243235', '3243235', 289800, 290135, 135, 900, 0, 290045, NULL, NULL, NULL, NULL, 'upload/architectural-design-for-technicians  -1.jpg', NULL, '3', NULL, '45', '2021-10-28 08:37:06', 6, NULL, NULL, 0),
(5, 1, 6, 10000, 2000, '2021-10-28', '3214242', '3243235', '3243235', 8000, 15000, 5000, 1000, 0, 11000, NULL, NULL, NULL, NULL, 'upload/architectural-design-for-technicians  -1.jpg', NULL, '5', NULL, '1000', '2021-10-28 12:14:14', 6, NULL, NULL, 0),
(6, 1, 5, 5000, 200, '2021-10-29', '3214242', '3243235', '3243235', 4800, 5135, 135, 4378, 0, 5045, NULL, NULL, NULL, NULL, 'upload/CG D4 58 07 13.pdf', NULL, '3', NULL, '45', '2021-10-29 08:46:02', 6, NULL, NULL, 0),
(7, 1, 8, 290000, 200, '2021-10-29', '3214242', '3243235', '3243235', 289800, 290135, 135, 1000, 0, 290045, NULL, NULL, NULL, NULL, 'upload/CG D2 46.pdf', NULL, '3', NULL, '45', '2021-10-29 09:03:09', 6, NULL, NULL, 0),
(8, 1, 2, 5000, 200, '2021-10-29', '3214242', '3243235', '3243235', 4800, 7000, 2000, 1000, 0, 6000, NULL, NULL, NULL, NULL, 'upload/CG2154.pdf', NULL, '2', NULL, '1000', '2021-10-29 09:07:04', 6, NULL, NULL, 0),
(9, 1, 2, 150000, 1000, '2021-10-29', 'TT20021940', 'TT20021940', '3243235', 149000, 200000, 50000, NULL, 14900, 19900, NULL, NULL, NULL, NULL, 'upload/cg2037.pdf', NULL, '10', NULL, '5000', '2021-10-29 09:13:35', 6, 6, '2021-10-29 04:24:48', 0),
(10, 1, 3, 290000, 200, '2021-10-29', 'TT20021940', 'TT20021940', '3243235', 289800, 290090, 90, NULL, 145000, 145045, NULL, NULL, NULL, NULL, 'upload/LC 04 43 11 18 (WOS).pdf', NULL, '2', NULL, '45', '2021-10-29 09:45:02', 6, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cnic`, `contact`, `address`, `date`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Tanzeem', 'afsheen@gmail.com', '341084934', '98247346', 'Garden Town', '2021-10-07', NULL, '$2y$10$iUisHe9Vc78S6TmGnIXBXev9AYcPR.K.tKcTPhwrl1ra6LbhvL3SK', NULL, '2021-10-06 19:48:34', '2021-10-07 05:35:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `sale_id` (`sale_id`);

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
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`);

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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
