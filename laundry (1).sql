-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2022 at 11:38 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Cortez Hill I', 'quicktechitltd@gmail.com', '2022-09-25 22:43:05', '$2y$10$abiZ.MGyNxIOZRWHyzIbEOOlOu7wmu1iJTod2XcxAZ9UnV5RtL6Oa', '0147896325', 'Prof. Flo Goldner I', NULL, 0, 'a4mMNVS8tLtjidemfNgPlavEFYHrW4W9AFANF4eGCWNK6cETRy6CNDfM8lzg', '2022-09-25 22:43:05', '2022-09-26 03:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `shipping_charge` int(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `city_id`, `name`, `slug`, `status`, `shipping_charge`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mirpur - 1', 'mirpur-1', 1, 80, '2022-10-04 00:16:14', '2022-10-04 00:17:01'),
(2, 1, 'Mirpur - 2', 'mirpur-2', 1, 90, '2022-10-13 05:29:00', '2022-10-13 05:29:00'),
(3, 2, 'KA - 1', 'ka-1', 1, 50, '2022-10-13 05:29:13', '2022-10-13 05:29:13'),
(4, 2, 'KA - 2', 'ka-2', 1, 100, '2022-10-13 05:29:23', '2022-10-13 05:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'dhaka', 1, '2022-10-04 00:02:48', '2022-10-04 00:03:41'),
(2, 'Khulna', 'khulna', 1, '2022-10-13 05:28:43', '2022-10-13 05:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`id`, `about`, `address`, `phone_one`, `phone_two`, `phone_three`, `email`, `logo`, `favicon`, `app`, `app_link`, `facebook`, `twitter`, `instagram`, `youtube`, `pinterest`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Laundry Man BD Limited, \r\nHolding-18/2, Word-3, Road-6, Block-A, Solmaid, Vatara, Gulshan, Dhaka', '545644444', '5456000000', '5456099999', 'laundry@gmail.com', 'images/logo/1746574233599705.png', 'images/logo/1746462514430273.png', 'images/logo/1746462514434913.png', 'https://www.daraz.com.bd/?spm=a2a0e.pdp.header.dhome.4797mlulmlulFo', '###', '###', '###', '###', NULL, '###', '2022-03-14 03:18:20', '2022-10-13 06:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int(10) UNSIGNED NOT NULL,
  `cart_amount` int(10) UNSIGNED NOT NULL,
  `validity` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `percentage`, `cart_amount`, `validity`, `created_at`, `updated_at`) VALUES
(1, 'qwert', 1, 50, '2022-11-30', '2022-10-18 04:04:51', '2022-10-18 04:04:51'),
(2, 'asdfg', 2, 150, '2022-11-30', '2022-10-18 04:04:51', '2022-10-18 04:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `deliverymen`
--

CREATE TABLE `deliverymen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `commission` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliverymen`
--

INSERT INTO `deliverymen` (`id`, `city_id`, `area_id`, `commission`, `status`, `name`, `email`, `password`, `phone`, `address`, `image`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 1, 'Al Foisal', 'quicktech.foisal@gmail.com', '$2y$10$8q10yfWzp6Y6kbdF1IHk..CLqxtgn1pXNrP6txY3hgKcCq.6RFYJy', '01798032828', 'Mirpur - 10', 'img', NULL, NULL, '2022-10-20 07:56:39', '2022-10-20 07:56:39');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(5, '2022_09_26_032727_create_admins_table', 1),
(7, '2022_09_26_034200_create_company_infos_table', 2),
(8, '2022_09_26_092544_create_pages_table', 3),
(13, '2022_10_04_040923_create_cities_table', 4),
(14, '2022_10_04_040924_create_areas_table', 4),
(15, '2022_10_04_064625_create_services_table', 5),
(16, '2022_10_04_100210_create_working_processes_table', 6),
(20, '2022_10_10_040744_create_partners_table', 9),
(21, '2022_10_11_042709_create_packages_table', 10),
(22, '2022_10_11_104448_create_why_bests_table', 11),
(23, '2022_10_18_035309_create_coupons_table', 12),
(28, '2022_10_19_054453_create_orders_table', 13),
(29, '2022_10_19_062121_create_order_identities_table', 13),
(30, '2022_10_19_063122_create_order_details_table', 13),
(31, '2022_10_06_063616_create_deliverymen_table', 14),
(32, '2022_10_20_092854_create_order_statuses_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_payment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_payment_status` tinyint(4) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `shipping_charge` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `paid_amount` int(10) UNSIGNED NOT NULL,
  `partner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `partner_amount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `partner_payment_status` tinyint(4) NOT NULL DEFAULT '0',
  `deliveryman_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deliveryman_amount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `deliveryman_payment_status` tinyint(4) NOT NULL DEFAULT '0',
  `deliveryman_due` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `deliveryman_due_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_payment_method`, `user_payment_number`, `user_payment_status`, `coupon_code`, `coupon_percentage`, `total`, `discount`, `shipping_charge`, `paid_amount`, `partner_id`, `partner_amount`, `partner_payment_status`, `deliveryman_id`, `deliveryman_amount`, `deliveryman_payment_status`, `deliveryman_due`, `deliveryman_due_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'cod', NULL, 0, 'asdfg', '2', 520, 10, 80, 590, NULL, 0, 0, 1, 10, 0, 590, 0, 1, '2022-10-20 01:23:54', '2022-10-20 03:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `name`, `service`, `quantity`, `price`) VALUES
(1, 1, 'Coat/Blazer', 'Iron', 2, 180),
(2, 1, 'Per Item', 'Iron', 1, 10),
(3, 1, 'Suit (2pcs)', 'Iron', 1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `order_identities`
--

CREATE TABLE `order_identities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_identities`
--

INSERT INTO `order_identities` (`id`, `order_id`, `name`, `email`, `phone`, `address`, `city_id`, `area_id`) VALUES
(1, 1, 'Md Hafiz Al Foisal', 'quicktech.foisal@gmail.com', '01798032828', 'Below is an example form built entirely with Bootstrap’s form controls.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner` tinyint(4) DEFAULT NULL,
  `deliveryman` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `slug`, `partner`, `deliveryman`, `created_at`, `updated_at`) VALUES
(1, 'Pending', 'pending', NULL, NULL, NULL, NULL),
(2, 'Cloth Received', 'cloth-received', NULL, 1, NULL, NULL),
(3, 'Cloths are in Laundry Partner', 'cloths-are-in-laundry-partner', NULL, 1, NULL, NULL),
(4, 'Ready to Deliver', 'ready-to-deliver', 1, NULL, NULL, NULL),
(5, 'Delivered from LP', 'delivered-from-lp', 1, 1, NULL, NULL),
(6, 'Successfully Delivered', 'successfully-delivered', NULL, 1, NULL, NULL),
(7, 'Cancel', 'cancel', 1, 1, NULL, NULL),
(8, 'Return', 'return', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_front` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `service_id`, `name`, `price`, `image`, `on_front`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Per shirt', 30, 'images/package/1746385473547545.png', 1, 1, '2022-10-11 04:09:32', '2022-10-11 04:22:58'),
(2, 2, 'Per Item', 10, 'images/package/1746385933092214.png', 1, 1, '2022-10-11 04:16:50', '2022-10-11 04:23:02'),
(3, 3, 'Per Item', 20, 'images/package/1746385965363165.webp', 1, 1, '2022-10-11 04:17:21', '2022-10-11 04:23:05'),
(4, 1, 'Coat/Blazer', 180, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:20:22', '2022-10-11 04:20:22'),
(5, 1, 'Suit (3pcs)', 200, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:20:49', '2022-10-11 04:20:49'),
(6, 1, 'Suit (2pcs)', 150, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:21:02', '2022-10-11 04:21:02'),
(7, 2, 'Coat/Blazer', 180, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:20:22', '2022-10-11 04:20:22'),
(8, 2, 'Suit (3pcs)', 200, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:20:49', '2022-10-11 04:20:49'),
(9, 2, 'Suit (2pcs)', 150, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:21:02', '2022-10-11 04:21:02'),
(10, 3, 'Coat/Blazer', 180, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:20:22', '2022-10-11 04:20:22'),
(11, 3, 'Suit (3pcs)', 200, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:20:49', '2022-10-11 04:20:49'),
(12, 3, 'Suit (2pcs)', 150, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:21:02', '2022-10-11 04:21:02'),
(13, 3, 'Coat/Blazer', 180, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:20:22', '2022-10-11 04:20:22'),
(14, 3, 'Suit (3pcs)', 200, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:20:49', '2022-10-11 04:20:49'),
(15, 3, 'Suit (2pcs)', 150, 'images/package/1746385473547545.png', 0, 1, '2022-10-11 04:21:02', '2022-10-11 04:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'privacy-policy', '<p>Privacy policy details</p>', 1, '2022-09-26 03:57:18', '2022-09-26 03:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `commission` int(10) UNSIGNED DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `city_id`, `area_id`, `commission`, `status`, `name`, `email`, `password`, `phone`, `address`, `image`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, 1, 'Mr. Alexgender Flex', 'quicktech.foisal@gmail.com', '$2y$10$8q10yfWzp6Y6kbdF1IHk..CLqxtgn1pXNrP6txY3hgKcCq.6RFYJy', '01798032828', 'ABC Housing, Mirpur 1e', 'images/partner/1746281095708172.png', NULL, NULL, '2022-10-10 00:30:30', '2022-10-11 05:57:45');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', '463f793cfec66e64d5d7c17660c01b8e18f59744081f81b6ff4fc5ef184c41a5', '[\"*\"]', NULL, NULL, '2022-10-18 04:24:13', '2022-10-18 04:24:13'),
(2, 'App\\Models\\User', 1, 'authToken', 'b9902ec6b613db2c2908003a29ff5391b9457745d082173d1c4b5326198a3ec2', '[\"*\"]', NULL, NULL, '2022-10-18 22:37:04', '2022-10-18 22:37:04'),
(3, 'App\\Models\\User', 1, 'authToken', '9be07fd00430a839d75f41ed1c7dd5f0592ec1f8cbb64d73c2c8d86d2039a15b', '[\"*\"]', NULL, NULL, '2022-10-18 22:47:39', '2022-10-18 22:47:39'),
(4, 'App\\Models\\User', 1, 'authToken', 'd832663d3a67697729a98a9f5502e5d69aa347f5e2b8cdd84a040d1e84895477', '[\"*\"]', NULL, NULL, '2022-10-19 05:04:11', '2022-10-19 05:04:11'),
(5, 'App\\Models\\User', 1, 'authToken', '7bc4ef2087f75f7ee601484b6e2c38cd82d64182d1a240cd4d8401186af38dd2', '[\"*\"]', NULL, NULL, '2022-10-19 05:19:54', '2022-10-19 05:19:54'),
(6, 'App\\Models\\User', 1, 'authToken', 'a63c0c1fd6a0cb6db139e4a6d82cc2718a262036eeaa860224f025c2cb840333', '[\"*\"]', NULL, NULL, '2022-10-19 05:21:07', '2022-10-19 05:21:07'),
(7, 'App\\Models\\User', 1, 'authToken', '8df99cc388d53106fc6f2d2fbaa5102ff6298bc0d48b0a96eae85b1a5c36a725', '[\"*\"]', NULL, NULL, '2022-10-19 05:38:10', '2022-10-19 05:38:10'),
(8, 'App\\Models\\User', 1, 'authToken', '28675edf1a1105ba0993c04f7bdb5937981cac777cc2947fd1d7a2962f0a719f', '[\"*\"]', NULL, NULL, '2022-10-19 05:57:21', '2022-10-19 05:57:21'),
(9, 'App\\Models\\User', 1, 'authToken', '588eeca69d2bd251d8807cee6e614f1a59c543444d5c56da5faae7d9e32444eb', '[\"*\"]', NULL, NULL, '2022-10-20 00:36:36', '2022-10-20 00:36:36'),
(10, 'App\\Models\\User', 1, 'authToken', '2eb9bda9fc248bc1410d8eff74d51eec110ff02903f64eb408a7ae5ddbdbd9dc', '[\"*\"]', NULL, NULL, '2022-10-20 00:39:16', '2022-10-20 00:39:16'),
(11, 'App\\Models\\User', 1, 'authToken', 'a628a5e8541bbf0f9ef3970a8b000f8cf6df2c20a5786e494b47b4d36109ff47', '[\"*\"]', NULL, NULL, '2022-10-20 01:17:11', '2022-10-20 01:17:11'),
(12, 'App\\Models\\User', 1, 'authToken', 'd6ae5b7147d255c0b4f0b39fe7c4dcccf4ee4a61648a943404dd785c4f27fb31', '[\"*\"]', NULL, NULL, '2022-10-20 01:22:34', '2022-10-20 01:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Wash', 'wash', 'Keep up a vital separation from the hussle of Washing Cloths. Book your Laundry in your general region with LAundry.', 'images/service/1745750736521388.webp', '2022-10-04 03:14:42', '2022-10-04 04:00:40'),
(2, 'Iron', 'iron', 'Keep up a vital separation from the hussle of Washing Cloths. Book your Laundry in your general region with LAundry.', 'images/service/1745750748183933.png', '2022-10-04 03:14:42', '2022-10-04 04:00:51'),
(3, 'Dry', 'dry', 'Keep up a vital separation from the hussle of Washing Cloths. Book your Laundry in your general region with LAundry.', 'images/service/1745750761310844.png', '2022-10-04 03:14:42', '2022-10-04 04:01:03');

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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `city_id`, `area_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Hafiz Al Foisal', 'quicktech.foisal@gmail.com', NULL, '$2y$10$8q10yfWzp6Y6kbdF1IHk..CLqxtgn1pXNrP6txY3hgKcCq.6RFYJy', '01798032828', 'Below is an example form built entirely with Bootstrap’s form controls.', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `why_bests`
--

CREATE TABLE `why_bests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_bests`
--

INSERT INTO `why_bests` (`id`, `name`, `details`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Free Pickup and Delivery', 'Dupioni silk is centuries old and has always remained a favorite as it offers', 'images/why_best/1746390492564507.png', '2022-10-11 05:29:19', '2022-10-11 05:29:19'),
(3, 'Granted Quality', 'Dupioni silk is centuries old and has always remained a favorite as it offers', 'images/why_best/1746390492760512.png', '2022-10-11 05:29:19', '2022-10-11 05:29:51'),
(4, 'Affordable Price', 'Dupioni silk is centuries old and has always remained a favorite as it offers', 'images/why_best/1746390492954037.png', '2022-10-11 05:29:19', '2022-10-11 05:30:11'),
(5, 'Good Packing', 'Dupioni silk is centuries old and has always remained a favorite as it offers', 'images/why_best/1746390493155735.png', '2022-10-11 05:29:19', '2022-10-11 05:30:26'),
(6, 'Convenience', 'Dupioni silk is centuries old and has always remained a favorite as it offers', 'images/why_best/1746390493328981.png', '2022-10-11 05:29:19', '2022-10-11 05:30:39'),
(7, 'Live Order Tracking', 'Dupioni silk is centuries old and has always remained a favorite as it offers', 'images/why_best/1746390493568333.png', '2022-10-11 05:29:20', '2022-10-11 05:30:54'),
(8, 'Pickup and Delivery', 'Dupioni silk is centuries old and has always remained a favorite as it offers', 'images/why_best/1746390493809963.png', '2022-10-11 05:29:20', '2022-10-11 05:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `working_processes`
--

CREATE TABLE `working_processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_processes`
--

INSERT INTO `working_processes` (`id`, `name`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Service Choice', 'Keep up a vital separation from the hussle of Washing Cloths. Book your Laundry in your general region with LAundry.', 'images/working_process/1745755321027181.png', '2022-10-04 05:13:32', '2022-10-04 05:13:32'),
(2, 'Place Order', 'Keep up a vital separation from the hussle of Washing Cloths. Book your Laundry in your general region with LAundry.', 'images/working_process/1745755347137513.png', '2022-10-04 05:13:32', '2022-10-04 05:13:57'),
(3, 'Schedule', 'Keep up a vital separation from the hussle of Washing Cloths. Book your Laundry in your general region with LAundry.', 'images/working_process/1745755377753733.png', '2022-10-04 05:13:32', '2022-10-04 05:14:26'),
(4, 'Pickup Then Service Ready', 'Keep up a vital separation from the hussle of Washing Cloths. Book your Laundry in your general region with LAundry.', 'images/working_process/1745755402563043.webp', '2022-10-04 05:13:33', '2022-10-04 05:14:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverymen`
--
ALTER TABLE `deliverymen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deliverymen_email_unique` (`email`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_identities`
--
ALTER TABLE `order_identities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_identities_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_service_id_foreign` (`service_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partners_email_unique` (`email`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_bests`
--
ALTER TABLE `why_bests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_processes`
--
ALTER TABLE `working_processes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliverymen`
--
ALTER TABLE `deliverymen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_identities`
--
ALTER TABLE `order_identities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_bests`
--
ALTER TABLE `why_bests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `working_processes`
--
ALTER TABLE `working_processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_identities`
--
ALTER TABLE `order_identities`
  ADD CONSTRAINT `order_identities_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
