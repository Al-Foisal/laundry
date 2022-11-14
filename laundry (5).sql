-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2022 at 11:21 AM
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
  `j_from` date DEFAULT NULL,
  `c_to` date DEFAULT NULL,
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

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `j_from`, `c_to`, `address`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Cortez Hill I', 'quicktechitltd@gmail.com', '2022-09-25 22:43:05', '$2y$10$abiZ.MGyNxIOZRWHyzIbEOOlOu7wmu1iJTod2XcxAZ9UnV5RtL6Oa', '0147896325', '2022-11-02', '2023-11-01', 'Prof. Flo Goldner I', NULL, 0, 'BZOIYGlYIOZYuVyckEru6zLIZyZvOjQPKX1mKHURGEugld2usVgTCGonUkhp', '2022-09-25 22:43:05', '2022-09-26 03:57:36');

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
(2, 1, 'Mirpur - 2', 'mirpur-2', 1, 90, '2022-10-13 05:29:00', '2022-10-13 05:29:00');

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
(1, 'Dhaka', 'dhaka', 1, '2022-10-04 00:02:48', '2022-10-04 00:03:41');

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
  `bottom_app_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `play_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_large_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor` bigint(100) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`id`, `about`, `address`, `phone_one`, `phone_two`, `phone_three`, `email`, `logo`, `favicon`, `bottom_app_image`, `play_logo`, `top_large_banner`, `app`, `app_link`, `facebook`, `twitter`, `instagram`, `youtube`, `pinterest`, `linkedin`, `visitor`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Laundry Man BD Limited, \r\nHolding-18/2, Word-3, Road-6, Block-A, Solmaid, Vatara, Gulshan, Dhaka', '545644444', '5456000000', '5456099999', 'laundry@gmail.com', 'images/logo/1746574233599705.png', 'images/logo/1746462514430273.png', 'images/logo/1747461464404297.png', 'images/logo/1747462194407723.png', 'images/logo/1747461640383043.jpg', 'images/logo/1746462514434913.png', 'https://www.daraz.com.bd/?spm=a2a0e.pdp.header.dhome.4797mlulmlulFo', '###', '###', '###', '###', NULL, '###', 177, '2022-03-14 03:18:20', '2022-11-08 00:50:52');

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
  `coupon_type` int(2) NOT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `percentage`, `cart_amount`, `validity`, `coupon_type`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 'qwert', 1, 50, '2022-11-30', 1, '3 4 11 12 16', '2022-10-18 04:04:51', '2022-10-18 04:04:51'),
(2, 'asdfg', 2, 150, '2022-11-30', 2, '1 2 3 4 16', '2022-10-18 04:04:51', '2022-10-18 04:04:51'),
(3, 'qazxsw', 100, 1000, '2022-11-30', 2, '1 2 3 4 11 12 16', '2022-11-07 02:53:04', '2022-11-07 02:53:04');

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
  `e_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliverymen`
--

INSERT INTO `deliverymen` (`id`, `city_id`, `area_id`, `commission`, `status`, `name`, `email`, `password`, `phone`, `address`, `image`, `email_verified_at`, `remember_token`, `e_phone`, `nid`, `e_nid`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 2, 1, 'Al Foisal', 'quicktech.foisal@gmail.com', '$2y$10$8q10yfWzp6Y6kbdF1IHk..CLqxtgn1pXNrP6txY3hgKcCq.6RFYJy', '01798032828', 'Mirpur - 10', 'images/deliveryman/1748367703020935.jpg', NULL, NULL, '1221', 'images/deliveryman/1748367666885854.jpg', 'images/deliveryman/1748367666889917.jpg', '2022-11-02 01:16:14', '2022-10-20 07:56:39');

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
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(2, 'Contrary to popular', 'That’s why it’s important to identify the must-haves vs nice-to-have skills and qualifications for the role to encourage a more diverse set of candidates to apply. 71% of the employers we surveyed said they’re already doing this.**', '2022-10-23 23:26:38', '2022-10-23 23:26:38'),
(3, 'Contrary to popular', 'That’s why it’s important to identify the must-haves vs nice-to-have skills and qualifications for the role to encourage a more diverse set of candidates to apply. 71% of the employers we surveyed said they’re already doing this.**', '2022-10-23 23:26:39', '2022-10-23 23:26:39'),
(4, 'Contrary to popular', 'That’s why it’s important to identify the must-haves vs nice-to-have skills and qualifications for the role to encourage a more diverse set of candidates to apply. 71% of the employers we surveyed said they’re already doing this.**', '2022-10-23 23:26:39', '2022-10-23 23:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dead_line` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `dead_line`, `image`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Contrary to popular Contrary to popular', '2022-11-05', 'images/job/1747544157297751.jpg', '4+ years of experience, 150+ roles filled\n\nCrafting a compelling job description is essential to helping you attract the most qualified candidates for your job. With more than 25 million jobs listed on Indeed, a great job description can help your jobs stand out from the rest. Your job descriptions are where you start marketing your company and your job to your future hire.\n\nThe key to writing effective job descriptions is to find the perfect balance between providing enough detail so candidates understand the role and your company while keeping your description concise.\n\nUse the tips and sample job descriptions below to create a compelling job listing.\n\nWhat Is a Job Description?\nA job description summarizes the essential responsibilities, activities, qualifications and skills for a role. Also known as a JD, this document describes the type of work performed.\n\nA job description should include important company details — company mission, culture and any benefits it provides to employees. It may also specify to whom the position reports and salary range.\n\nAn effective job description will provide enough detail for candidates to determine if they’re qualified for the position. Not only that, but according to an Indeed survey, 52% of job seekers say the quality of a job description is very or extremely influential on their decision to apply for a job.*', '2022-10-23 23:06:19', '2022-10-23 23:06:19'),
(2, 'This Isn’t a Diet, It’s a Lifestyle', '2022-10-28', 'images/job/1747544212614992.jpg', '<div class=\"jdp-index-section\" style=\"box-sizing: inherit; overflow-wrap: anywhere; padding-bottom: 24px; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px;\"><div style=\"box-sizing: inherit; overflow-wrap: anywhere;\"><p style=\"box-sizing: inherit; overflow-wrap: anywhere; font-size: 18px; line-height: 1.4;\">*Indeed survey, n=2,091</p><p style=\"box-sizing: inherit; overflow-wrap: anywhere; font-size: 18px; line-height: 1.4;\"><span style=\"box-sizing: inherit; overflow-wrap: anywhere; font-weight: 700;\">Include an exact job location.</span>&nbsp;Provide an exact job location to optimize your job posting so it appears higher in job search results.</p></div></div><div class=\"jdp-index-section\" style=\"box-sizing: inherit; overflow-wrap: anywhere; padding-bottom: 24px; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px;\"><h2 style=\"box-sizing: inherit; overflow-wrap: anywhere; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 700; line-height: 35px; color: rgb(45, 45, 45); font-size: 1.75rem; margin-block-start: 0.83em;\">Responsibilities and Duties</h2><div style=\"box-sizing: inherit; overflow-wrap: anywhere;\"><p style=\"box-sizing: inherit; overflow-wrap: anywhere; font-size: 18px; line-height: 1.4;\"><span style=\"box-sizing: inherit; overflow-wrap: anywhere; font-weight: 700;\">Outline the core responsibilities of the position.</span>&nbsp;Make sure your list of responsibilities is detailed but concise. Also emphasize the duties that may be unique to your organization. For example, if you are hiring for an “Event Management” role and the position requires social media expertise to promote events, include this detail to ensure candidates understand the requirements and can determine if they’re qualified.</p><p style=\"box-sizing: inherit; overflow-wrap: anywhere; font-size: 18px; line-height: 1.4;\"><span style=\"box-sizing: inherit; overflow-wrap: anywhere; font-weight: 700;\">Highlight the day-to-day activities of the position.</span>&nbsp;This will help candidates understand the work environment and the activities they will be exposed to on a daily basis. This level of detail will help the candidate determine if the role and company are a right fit, helping you attract the best candidates for your position.</p><p style=\"box-sizing: inherit; overflow-wrap: anywhere; font-size: 18px; line-height: 1.4;\"><span style=\"box-sizing: inherit; overflow-wrap: anywhere; font-weight: 700;\">Specify how the position fits into the organization.</span>&nbsp;Indicate who the job reports to and how the person will function within your organization, helping candidates see the bigger picture and understand how the role impacts the business.</p></div></div><div class=\"jdp-index-section\" style=\"box-sizing: inherit; overflow-wrap: anywhere; padding-bottom: 24px; color: rgb(45, 45, 45); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px;\"><h2 style=\"box-sizing: inherit; overflow-wrap: anywhere; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 700; line-height: 35px; color: rgb(45, 45, 45); font-size: 1.75rem; margin-block-start: 0.83em;\">Qualifications and Skills</h2><div style=\"box-sizing: inherit; overflow-wrap: anywhere;\"><p style=\"box-sizing: inherit; overflow-wrap: anywhere; font-size: 18px; line-height: 1.4;\"><span style=\"box-sizing: inherit; overflow-wrap: anywhere; font-weight: 700;\">Include a list of hard and soft skills.</span>&nbsp;Of course, the job description should specify<br style=\"box-sizing: inherit; overflow-wrap: anywhere;\">education, previous job experience, certifications and technical skills required for the role.<br style=\"box-sizing: inherit; overflow-wrap: anywhere;\">You may also include soft skills, like communication and problem solving, as well as personality<br style=\"box-sizing: inherit; overflow-wrap: anywhere;\">traits that you envision for a successful hire.</p><p style=\"box-sizing: inherit; overflow-wrap: anywhere; font-size: 18px; line-height: 1.4;\"><span style=\"box-sizing: inherit; overflow-wrap: anywhere; font-weight: 700;\">Keep your list concise.</span>&nbsp;While you may be tempted to list out every requirement you envision for your ideal hire, including too many qualifications and skills could dissuade potential candidates. According to a 2018 Indeed survey, 63% of candidates said they chose not to apply for a job because they felt like they didn’t know the specific tools or skills listed in the job description. A further 47% said they didn’t apply because they didn’t have the specific years of experience listed in the job description.*</p><p style=\"box-sizing: inherit; overflow-wrap: anywhere; font-size: 18px; line-height: 1.4;\">That’s why it’s important to identify the must-haves vs nice-to-have skills and qualifications for the role to encourage a more diverse set of candidates to apply. 71% of the employers we surveyed said they’re already doing this.**</p></div></div>', '2022-10-23 23:07:12', '2022-10-23 23:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(32, '2022_10_20_092854_create_order_statuses_table', 15),
(33, '2022_10_24_044954_create_jobs_table', 16),
(34, '2022_10_24_045241_create_job_applications_table', 16),
(35, '2022_10_24_051846_create_f_a_q_s_table', 17),
(36, '2022_10_24_053830_create_order_notifications_table', 18);

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
(1, 1, 'cod', NULL, 0, 'asdfg', '2', 520, 10, 80, 590, 1, 510, 1, 1, 2, 0, 590, 0, 4, '2022-10-20 01:23:54', '2022-11-05 04:30:46'),
(2, 1, 'cod', NULL, 0, 'asdfg', '2', 520, 10, 80, 590, 1, 510, 0, 1, 2, 0, 590, 0, 6, '2022-10-20 01:23:54', '2022-11-05 03:18:02'),
(3, 1, 'cod', NULL, 0, NULL, NULL, 180, 0, 90, 270, NULL, 0, 0, 1, 2, 0, 270, 0, 1, '2022-11-07 00:29:23', '2022-11-07 00:39:08'),
(4, 1, 'cod', NULL, 0, 'qwert', '1', 1120, 7, 80, 1193, NULL, 0, 0, NULL, 0, 0, 0, 0, 1, '2022-11-07 23:52:04', '2022-11-07 23:52:04');

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
  `price` int(10) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `name`, `service`, `quantity`, `price`, `details`) VALUES
(1, 1, 'Coat/Blazer', 'Iron', 2, 180, 'Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)'),
(2, 1, 'Per Item', 'Dry', 1, 10, 'Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)'),
(3, 1, 'Suit (2pcs)', 'Iron', 1, 150, 'Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)'),
(4, 2, 'Coat/Blazer', 'Wash', 2, 180, 'Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)'),
(5, 2, 'Per Item', 'Dry', 1, 10, 'Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)'),
(6, 2, 'Suit (2pcs)', 'Wash', 1, 150, 'Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)Showing rows 0 - 5 (6 total, Query took 0.0014 seconds.)'),
(7, 3, 'Coat/Blazer', 'Iron', 1, 180, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.'),
(8, 4, 'Coat/Blazer hh', 'Wash', 4, 180, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.'),
(9, 4, 'Suit (3pcs)', 'Wash', 2, 200, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.');

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
(1, 1, 'Md Hafiz Al Foisal', 'quicktech.foisal@gmail.com', '01798032828', 'Below is an example form built entirely with Bootstrap’s form controls.', 1, 1),
(2, 2, 'Md Hafiz Al Foisal', 'quicktech.foisal@gmail.com', '01798032828', 'Below is an example form built entirely with Bootstrap’s form controls.', 1, 1),
(3, 3, 'Md Hafiz Al Foisal', 'quicktech.foisal@gmail.com', '01798032828', 'Below is an example form built entirely with Bootstrap’s form controls.', 1, 2),
(4, 4, 'Md Hafiz Al Foisal', 'quicktech.foisal@gmail.com', '01798032828', 'Below is an example form built entirely with Bootstrap’s form controls.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_notifications`
--

CREATE TABLE `order_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `deliveryman_id` int(10) UNSIGNED DEFAULT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL,
  `order_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_deliveryman_seen` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_partner_seen` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `city_id` int(11) UNSIGNED NOT NULL,
  `area_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_notifications`
--

INSERT INTO `order_notifications` (`id`, `order_id`, `deliveryman_id`, `partner_id`, `order_status_id`, `is_deliveryman_seen`, `is_partner_seen`, `city_id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 0, 1, 1, '2022-10-24 06:38:47', '2022-11-02 03:18:02'),
(2, 3, 1, NULL, 1, 1, 0, 1, 2, '2022-11-07 00:29:23', '2022-11-07 00:39:08'),
(3, 4, NULL, NULL, 1, 0, 0, 1, 1, '2022-11-07 23:52:04', '2022-11-07 23:52:04');

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
(3, 'Cloths are in Laundry Partner', 'cloths-are-in-laundry-partner', 1, 1, NULL, NULL),
(4, 'Ready to Deliver', 'ready-to-deliver', 1, NULL, NULL, NULL),
(5, 'Delivered from LP', 'delivered-from-lp', 1, 1, NULL, NULL),
(6, 'Successfully Delivered', 'successfully-delivered', 1, 1, NULL, NULL),
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
  `discount` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `j_from` date DEFAULT NULL,
  `c_to` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `on_front` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `service_id`, `name`, `price`, `discount`, `discount_price`, `j_from`, `c_to`, `image`, `details`, `on_front`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Per shirt', 30, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 1, 1, '2022-10-11 04:09:32', '2022-10-11 04:22:58'),
(2, 2, 'Per Item', 10, NULL, NULL, NULL, NULL, 'images/package/1746385933092214.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 1, 1, '2022-10-11 04:16:50', '2022-10-11 04:23:02'),
(3, 3, 'Per Item', 20, NULL, NULL, NULL, NULL, 'images/package/1746385965363165.webp', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 1, 1, '2022-10-11 04:17:21', '2022-10-11 04:23:05'),
(4, 1, 'Coat/Blazer hh', 180, 10, 162, '2022-11-17', '2024-06-04', 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:20:22', '2022-11-03 00:35:02'),
(5, 1, 'Suit (3pcs)', 200, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:20:49', '2022-10-11 04:20:49'),
(6, 1, 'Suit (2pcs)', 150, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:21:02', '2022-10-11 04:21:02'),
(7, 2, 'Coat/Blazer', 180, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:20:22', '2022-10-11 04:20:22'),
(8, 2, 'Suit (3pcs)', 200, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:20:49', '2022-10-11 04:20:49'),
(9, 2, 'Suit (2pcs)', 150, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:21:02', '2022-10-11 04:21:02'),
(10, 3, 'Coat/Blazer', 180, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:20:22', '2022-10-11 04:20:22'),
(11, 3, 'Suit (3pcs)', 200, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:20:49', '2022-10-11 04:20:49'),
(12, 3, 'Suit (2pcs)', 150, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:21:02', '2022-10-11 04:21:02'),
(13, 3, 'Coat/Blazer', 180, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:20:22', '2022-10-11 04:20:22'),
(14, 3, 'Suit (3pcs)', 200, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:20:49', '2022-10-11 04:20:49'),
(15, 3, 'Suit (2pcs)', 150, NULL, NULL, NULL, NULL, 'images/package/1746385473547545.png', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-10-11 04:21:02', '2022-10-11 04:21:02'),
(16, 1, 'Contrary to popular', 1212, 12, 1067, '2022-11-02', '2022-11-30', 'images/package/1748385330553602.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 0, 1, '2022-11-02 05:56:24', '2022-11-02 05:56:24');

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
  `e_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `j_from` date DEFAULT NULL,
  `c_to` date DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `city_id`, `area_id`, `commission`, `status`, `name`, `email`, `password`, `phone`, `e_phone`, `address`, `image`, `j_from`, `c_to`, `nid`, `e_nid`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, 1, 'Mr. Alexgender Flex', 'quicktech.foisal@gmail.com', '$2y$10$8q10yfWzp6Y6kbdF1IHk..CLqxtgn1pXNrP6txY3hgKcCq.6RFYJy', '01798032828', '586', 'ABC Housing, Mirpur 1e', 'images/partner/1746281095708172.png', '2022-10-30', '2023-11-01', 'images/partner/1748093910494983.png', 'images/partner/1748093910499780.png', NULL, NULL, '2022-10-10 00:30:30', '2022-10-30 00:44:25'),
(2, 1, 2, 55, 1, 'Contrary to popular', 'a@a.c', '$2y$10$opqk4cy4xVs0q4IfZPJWxud8PEuHEIkcvAG59HMTfSGNPqGa9g9b6', '1238', '1221', 'Mirpur Mirpur Mirpur Mirpur Mirpur Mirpur Mirpur Mirpur Mirpur Mirpur', 'images/partner/1748365985173354.jpg', '2022-11-02', '2023-04-21', 'images/partner/1748365985174704.jpg', 'images/partner/1748365985175723.jpg', NULL, NULL, '2022-11-02 00:48:55', '2022-11-02 00:51:49');

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
(12, 'App\\Models\\User', 1, 'authToken', 'd6ae5b7147d255c0b4f0b39fe7c4dcccf4ee4a61648a943404dd785c4f27fb31', '[\"*\"]', NULL, NULL, '2022-10-20 01:22:34', '2022-10-20 01:22:34'),
(13, 'App\\Models\\User', 1, 'authToken', '18f1d89bff2b2da838c6de42f92774d0d382e861cc67b9c20365e3735bdbdd4d', '[\"*\"]', NULL, NULL, '2022-10-22 04:11:27', '2022-10-22 04:11:27'),
(14, 'App\\Models\\User', 1, 'authToken', '5e0b855216acc36ddbd8fb7fc6bc7ce15251690ae93dc61d078e189259370496', '[\"*\"]', NULL, NULL, '2022-10-22 05:37:30', '2022-10-22 05:37:30'),
(15, 'App\\Models\\User', 1, 'authToken', '67b03608c3c925121d8f8da1ca49e113735b15eb1174e1f5a919e4bb12d81c2c', '[\"*\"]', NULL, NULL, '2022-10-23 03:12:48', '2022-10-23 03:12:48'),
(16, 'App\\Models\\User', 1, 'authToken', '8efee818dabf75f8f320422b5af234c26036d2d03fda468e6b55c2fd7c04a3ab', '[\"*\"]', NULL, NULL, '2022-10-23 03:38:09', '2022-10-23 03:38:09'),
(17, 'App\\Models\\User', 1, 'authToken', '095d84ed713e3283f4aece78830408110a8418b70d640581ec9e6d38a9cab64a', '[\"*\"]', NULL, NULL, '2022-10-23 03:53:54', '2022-10-23 03:53:54'),
(18, 'App\\Models\\User', 1, 'authToken', '9c3d5c229cb919b679f5deb79148fd0ed7c29ed89af1c3461c0cd659db23aaf4', '[\"*\"]', NULL, NULL, '2022-10-23 04:07:32', '2022-10-23 04:07:32'),
(19, 'App\\Models\\User', 1, 'authToken', '6046fb475083ceea247fc1b97789591a5b1dbde285416f3d1cba937a945b019b', '[\"*\"]', NULL, NULL, '2022-10-23 04:19:37', '2022-10-23 04:19:37'),
(20, 'App\\Models\\User', 1, 'authToken', '122ac9816b454bef6f4d331b22e80c96757e18037a4117f4a60ae6c8e61c3b56', '[\"*\"]', NULL, NULL, '2022-10-23 04:21:20', '2022-10-23 04:21:20'),
(21, 'App\\Models\\User', 1, 'authToken', 'a90e2d99b6f1a219870e8815da29795c9d8bf27f4c07f663d4aede608e5ac956', '[\"*\"]', NULL, NULL, '2022-10-23 04:22:49', '2022-10-23 04:22:49'),
(22, 'App\\Models\\User', 1, 'authToken', '4ee1b808f75fb6586c4f2f001a8b63fefaa20c64263aa44e3d5c7ef5d2321687', '[\"*\"]', NULL, NULL, '2022-10-23 04:23:15', '2022-10-23 04:23:15'),
(23, 'App\\Models\\User', 1, 'authToken', '9a060f219819ed7a16a9c5c51ff62272ea80a30e6b2cf26165a6615f08e4df7c', '[\"*\"]', NULL, NULL, '2022-10-23 04:24:57', '2022-10-23 04:24:57'),
(24, 'App\\Models\\User', 1, 'authToken', '6d58c56e30a2b3c6707dfcd6264544bced7b39a4d3be40aee31a17bb23461690', '[\"*\"]', NULL, NULL, '2022-10-23 04:29:01', '2022-10-23 04:29:01'),
(25, 'App\\Models\\User', 1, 'authToken', 'de900bc04a2518c2fae012b9358d67ee08bb9edb29d38e78443818a81bf00ce3', '[\"*\"]', NULL, NULL, '2022-10-23 04:32:19', '2022-10-23 04:32:19'),
(26, 'App\\Models\\User', 1, 'authToken', '34a1697c6a8647ad9f04a177a56b2fd70a2b75146c16f673c1a14fc31df0a5a8', '[\"*\"]', NULL, NULL, '2022-10-23 04:35:08', '2022-10-23 04:35:08'),
(27, 'App\\Models\\User', 1, 'authToken', 'e08236c37a865a5fbeea52ef6c6abb759972dab83cc922d676436041b1206e50', '[\"*\"]', NULL, NULL, '2022-10-23 04:39:39', '2022-10-23 04:39:39'),
(28, 'App\\Models\\User', 1, 'authToken', '2669b55847bab96ff4c1c2dd35f6a501dbb58363d8a1ed5d49fbd5ae054eb696', '[\"*\"]', NULL, NULL, '2022-10-23 04:44:16', '2022-10-23 04:44:16'),
(29, 'App\\Models\\User', 1, 'authToken', '273b625a72900a45be29c41fb88cc99551857ae03066eaf58b00c2e03e67eee9', '[\"*\"]', NULL, NULL, '2022-10-23 04:45:25', '2022-10-23 04:45:25'),
(30, 'App\\Models\\User', 1, 'authToken', '665ebb3ab4a2649567f35fb33db60e00764efb45dd178f0aab3016b0b7158b8f', '[\"*\"]', NULL, NULL, '2022-10-23 04:47:03', '2022-10-23 04:47:03'),
(31, 'App\\Models\\User', 1, 'authToken', '60603dca3405660160e99454a2a271ee2524b4ef8a9d9a8d952bbdfe0d9c8c90', '[\"*\"]', NULL, NULL, '2022-11-07 00:26:26', '2022-11-07 00:26:26'),
(32, 'App\\Models\\User', 1, 'authToken', '7993d39cc4e844afbe0b5d2baba7a3bb4fade004209418205b242541e5ebc055', '[\"*\"]', NULL, NULL, '2022-11-07 23:38:51', '2022-11-07 23:38:51'),
(33, 'App\\Models\\User', 1, 'authToken', '70a016913e67d8c00c340a2a727608f6b571cdc087eca5f512806078af4bd1c8', '[\"*\"]', NULL, NULL, '2022-11-08 00:31:57', '2022-11-08 00:31:57');

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
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`);

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
-- Indexes for table `order_notifications`
--
ALTER TABLE `order_notifications`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_identities`
--
ALTER TABLE `order_identities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_notifications`
--
ALTER TABLE `order_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_applications` (`id`) ON DELETE CASCADE;

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
