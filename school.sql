-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 07:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `employee_status` tinyint(1) NOT NULL DEFAULT '1',
  `avater` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `permanent_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `ifsc_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_salary` decimal(10,2) DEFAULT NULL,
  `contract_type` int(11) DEFAULT '1',
  `work_sift` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_leaving` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`employee_id`, `id`, `adminname`, `phone`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `verification_code`, `status`, `employee_status`, `avater`, `created_at`, `updated_at`, `gender`, `religion`, `blood_group_id`, `group_id`, `department_id`, `date_of_birth`, `joining_date`, `present_address`, `permanent_address`, `designation`, `qualification`, `facebook_link`, `linkedIn_link`, `twitter_link`, `bank_name`, `account_holder`, `bank_branch`, `bank_address`, `ifsc_code`, `account_no`, `deleted_status`, `deleted_by`, `deleted_at`, `basic_salary`, `contract_type`, `work_sift`, `location`, `date_of_leaving`) VALUES
(NULL, 8, 'Admin', '01854284712', 'admin@gmail.com', NULL, '$2y$10$T0TyQAMWZ0k8BwcMyH3jxuuqr5rx5vUpLh91ZmBHrb.x39RT21GoG', '1', 'a7RM3SWsRRFjW0d73pKOa22lTTQIqnIeSE6gK6B7BLqPl39FKFr8IEIo47wT', NULL, '1', 1, 'admin.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032009', 9, 'Farea Sultana', '1234123121', 'sefyxy@mailinator.net', NULL, '$2y$10$HsaAumfIygHyO4hF52t2heYMkxlRa9TH3GS.Oob6JwzLPC67u..5e', '3', NULL, NULL, '0', 1, '5e7d92a80c101.jpg', '2020-03-27 05:44:08', '2020-06-02 12:30:49', 'Female', 'Muslim', 5, 2, NULL, '2020-03-14', '19-03-2020', 'Mirpur 1, Dhaka, Bangladesh', 'M.pase, Khulna, Bangladesh', 'Teacher', 'B.S.C', 'Eu quia laboriosam', 'Nobis anim ea mollit', 'Ex officia ex molest', 'Kay Mcknight', 'Andrew Cote', 'Delectus repudianda', 'Rerum delectus reru', 'Ut tempora laborum', '1234567', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032010', 10, 'Jerome Cortez', '0198524547', 'waxoqovi@mailinator.com', NULL, '$2y$10$icpsPNFsrghtvlrFxJIdp.OnXX8kAQaLFNLe2UXWos/d.taO9dYvW', '2', NULL, NULL, '0', 1, '5e7e123268059.jpg', '2020-03-27 05:47:50', '2020-06-09 12:14:50', 'Female', 'Christian', 2, 3, NULL, '1990-01-01', '10-03-2020', 'Nulla exercitationem', 'Consequatur aut quis', 'Asst. Teacher', 'M.S.C', 'https://facebook.com', 'https://linkedin.com', 'https://twitter.com', 'Sonali Bank', 'JEROME CORTEZ', 'Mirput 1 Branch', 'Mirpur 1, Dhaka, Bangladesh', '2024', '1235788', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032011', 11, 'Ivory Russo', '12341234123', 'viwew@mailinator.net', NULL, '$2y$10$Zv2lfg.i1oW7rX7KZrYuNun9DG4x67Xgz6hP1p8N8jX9J3kKSJnlu', '4', NULL, NULL, '1', 1, '5e7df4db6b878.jpg', '2020-03-27 06:14:38', '2020-03-27 15:22:23', 'Male', 'Dolore dolores ut vo', 2, 1, NULL, '1977-05-10', '05/06/2014', 'Laboriosam ut volup', 'Vero laborum est lab', 'Accountant', 'Non et Nam excepteur', 'Sapiente qui sed com', 'Quos magna quam sed', 'Qui vitae occaecat d', 'Harding Wilson', 'Ex autem enim quas o', 'Ratione veritatis no', 'Repellendus Beatae', 'Aliqua Dolor minus', 'Eum dolorem iusto lo', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032012', 12, 'Wyatt Bender', '78', 'cylawyto@mailinator.com', NULL, '$2y$10$uCGPHUjSX3sAW/O.EJrC7uRFZ3FI1RZ.1.lE5UiHMeSWkNvSqe8vm', '5', NULL, NULL, '1', 0, '5e7d9d3090362.png', '2020-03-27 06:29:04', '2020-05-27 03:27:43', 'Male', 'Vitae nulla cillum e', 6, 4, NULL, '1979-04-29', '20/05/1984', 'Ducimus magna possi', 'Qui minus laboris in', 'Libraian', 'Deserunt reiciendis', 'Ratione ea in exerci', 'Debitis excepteur si', 'Nisi alias dolores d', 'Yasir Bullock', 'Nihil lorem reprehen', 'Veritatis veritatis', 'Et beatae rerum irur', 'Magnam mollitia volu', 'Reprehenderit illo q', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032013', 13, 'Philip Griffin', '40', 'wetehep@mailinator.net', NULL, '$2y$10$ymZWv7uvoHdKkzZfm2RqTeCFxo5bVl26AAbjdI6VwYBJ3uOcpxsYq', '7', NULL, NULL, '1', 1, '5e7da1130b712.png', '2020-03-27 06:45:39', NULL, 'Female', 'Amet enim voluptate', 1, 4, NULL, '2000-05-20', '27/05/1994', 'Aut doloremque exerc', 'Aliquip qui maxime d', 'Another Staf', 'Accusantium magna es', 'Culpa placeat labor', 'Labore autem digniss', 'Itaque at sunt tota', 'Natalie Ellis', 'Dolor est sint omnis', 'Asperiores harum qua', 'Inventore qui mollit', 'Amet recusandae Pa', 'Eum odit qui illum', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032014', 14, 'Cain Small', '12341234127', 'xizifav@mailinator.net', NULL, '$2y$10$EE0dZyoBAzmIzKyFRBX/cuU2dMAeyAew432b/IFZ3U2awgXDpfFm.', '6', NULL, NULL, '1', 1, '5e7da8e815a69.jpg', '2020-03-27 07:19:04', '2020-03-29 10:35:36', 'Male', 'Sint id dolore pari', 1, 4, NULL, '2019-03-01', '01-03-2020', 'Sed omnis minim omni', 'Nulla sint nostrum', 'Driver', 'S.S.C', 'Quis dolorem autem o', 'Dolorum et dolores e', 'Ea ipsum quisquam d', 'Nadine Sweet', 'Voluptatem ea anim i', 'Eveniet optio hic', 'Dolores temporibus n', 'In quibusdam non in', '122358558', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032015', 15, 'Maxwell Moran', '43', 'xepenatyf@mailinator.com', NULL, '$2y$10$3Bvo.mpQ8ae05YiPhpn5IOBjvjVo2h/8cosxaewWbDodVIvIYuZdu', '8', NULL, NULL, '1', 1, '5e7fa6ed97967.png', '2020-03-27 07:38:41', '2020-03-28 19:35:09', 'Female', 'Quo sit aliqua Hic', 4, 4, NULL, '2012-05-31', '09-06-2005', 'Ut qui consectetur d', 'Nihil non pariatur', 'Security Guard', 'Ut rerum ad corporis', 'Odio minim exercitat', 'Consequatur voluptas', 'Dolorum dolore volup', 'Dexter Burt', 'Et architecto facili', 'Neque id nihil sequi', 'Provident consequat', 'Provident aut velit', '1235544', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032016', 16, 'Alexis Harrell', '35', 'jixyti@mailinator.com', NULL, '$2y$10$ZRaDNNhHHzsJfQ1yOGf2pus6FiKP7fzvQi/yl4wKlFcGEH3JtMOyi', '3', NULL, NULL, '1', 1, '5e7db60b0d64a.jpg', '2020-03-27 08:15:07', NULL, 'Male', 'Aliquid irure ab eli', 3, 2, NULL, '2005-09-11', '05/05/1992', 'Id recusandae Velit', 'Accusamus culpa veri', 'Teacher', 'Commodo inventore do', 'Distinctio Aut veli', 'Sunt harum iure dolo', 'Cillum cum quo quis', 'Melyssa Rasmussen', 'In est corporis exer', 'Dolor adipisci eu te', 'Exercitationem venia', 'Minim nemo ex tempor', 'Exercitation dolor e', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032017', 17, 'Jescie Aguilar', '66', 'wepoqusa@mailinator.net', NULL, '$2y$10$v6mSRZmzL10swrrNtU7o.OpSNy4gasDp2LzTBaSUC4WQhuye9K5Fe', '3', NULL, NULL, '1', 1, '5e7db626445a0.jpg', '2020-03-27 08:15:34', NULL, 'Other', 'Consectetur dicta q', 3, 3, NULL, '2000-08-29', '07/12/1982', 'Aut atque sequi irur', 'Ex id sit consequunt', 'Teacher', 'Doloremque eum error', 'Voluptate lorem aspe', 'Provident in est u', 'Tempora ipsum autem', 'Kennedy Madden', 'Quia aspernatur et q', 'Qui hic nisi in ut a', 'Omnis ea sed corpori', 'Ratione quas et nihi', 'Molestiae maiores vo', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032018', 18, 'Rosalyn Holloway', '12341234125', 'zaje@mailinator.com', NULL, '$2y$10$0J6NdXQqmzPhMHjeHruOP.iwgjHkQd.1oznHujKufucys.Ndb1eYS', '6', NULL, NULL, '1', 1, '5e7db63e9eafb.jpg', '2020-03-27 08:15:58', '2020-03-27 16:22:31', 'Male', 'Aliquam sequi fuga', 3, 4, NULL, '2007-08-18', '03/06/1993', 'Et iste laborum Nis', 'Veniam accusantium', 'Driver', 'At qui mollitia aliq', 'Facilis blanditiis m', 'Consequatur quas si', 'Voluptates anim id', 'Nevada Beck', 'Ut et voluptates ear', 'Ea sit et distinctio', 'Iste quod minus ex e', 'Ut laudantium nulla', 'Quo quasi deserunt a', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL),
('E032019', 19, 'Karly Castro', '12345678965', 'topicyp@mailinator.com', NULL, '$2y$10$FpR7LHCw1guvbeqIoOzTMex.TaRy.iI67irlqyo.Z0o6FiMxTyyZ.', '6', NULL, NULL, '1', 1, '5e8053dbd79e5.png', '2020-03-29 07:53:00', '2020-03-29 08:24:36', 'Male', 'Quis do eveniet max', 6, 4, NULL, '1986-09-26', '28-11-2017', 'Optio ut vero qui s', 'Reprehenderit ut of', 'Driver', 'S.S.C', 'At laborum Omnis in', 'Quia neque perspicia', 'Nemo nostrum amet r', 'Dustin Chen', 'Aut cumque molestias', 'Omnis velit blanditi', 'Magna eius eum delen', 'Exercitationem quide', 'Laborum quibusdam od', NULL, NULL, NULL, '10000.00', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admit_card_templates`
--

CREATE TABLE `admit_card_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_student_photo` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admit_card_templates`
--

INSERT INTO `admit_card_templates` (`id`, `template_name`, `heading`, `title`, `exam_id`, `school_name`, `footer_text`, `left_logo`, `right_logo`, `background_photo`, `is_student_photo`, `status`, `deleted_status`, `created_at`, `updated_at`, `deleted_by`, `delete_at`) VALUES
(38, 'Test Template', 'MIRPUR UPOSHOHOR HIGH SCHOOL, DHAKA', 'SECOND TERM EXAM 2020', NULL, NULL, 'ADMIT CARD', '5eb98ba345e9c.png', '5eb98ba3c1c42.png', '5ec94499e81db.png', 1, 1, NULL, '2020-05-11 00:09:00', '2020-05-30 14:13:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attachment_types`
--

CREATE TABLE `attachment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachment_types`
--

INSERT INTO `attachment_types` (`id`, `name`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Syllabus', 1, NULL, NULL, NULL, '2020-04-24 14:05:46', '2020-04-24 14:05:46'),
(2, 'Study Material', 0, NULL, NULL, NULL, '2020-04-24 14:06:50', '2020-05-17 00:55:19'),
(3, 'Other Downloads', 1, NULL, NULL, NULL, '2020-04-24 14:07:13', '2020-04-24 14:07:13'),
(4, 'Assignment', 1, NULL, NULL, NULL, '2020-04-24 14:07:26', '2020-04-24 14:07:26'),
(6, 'Independent Day', 1, NULL, NULL, NULL, '2020-04-24 14:10:57', '2020-04-24 14:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Sonali Bank', 1, 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-29 22:05:16', '2020-04-27 19:00:30', '2020-04-29 16:05:16'),
(2, 'Agrani Bank', 1, NULL, NULL, NULL, '2020-04-27 19:28:06', '2020-04-29 16:05:28'),
(3, 'Sonali Bank', 1, NULL, NULL, NULL, '2020-04-29 16:43:57', '2020-04-29 16:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `holder_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance` bigint(20) NOT NULL,
  `balance` bigint(20) NOT NULL,
  `last_deposit` bigint(20) DEFAULT NULL,
  `last_withdraw` bigint(20) DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `bank_id`, `holder_name`, `account_no`, `bank_branch`, `address`, `opening_balance`, `balance`, `last_deposit`, `last_withdraw`, `remarks`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 3, 'Harrison', '12245258', 'Mirput 1', 'Mirpur 1, Dhaka', 10000, 20000, NULL, NULL, NULL, 1, 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-06-11 17:42:22', '2020-05-26 11:47:43', '2020-06-11 11:42:22'),
(10, 2, 'Harrison', '12245252', 'Mirpur 1', 'Mirpur 1, Dhaka.', 50000, 16000, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-05-26 12:02:56', '2020-05-26 12:09:00'),
(11, 3, 'Harrison', '12245258', 'Voluptate aute enim', 'asdasdas asdaSDa', 697, 697, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-06-11 11:42:16', '2020-06-11 11:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposits`
--

CREATE TABLE `bank_deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voucher_header_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_amount` bigint(20) DEFAULT NULL,
  `after_deposit_balance` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_deposits`
--

INSERT INTO `bank_deposits` (`id`, `invoice_no`, `bank_id`, `bank_account_id`, `voucher_header_id`, `date`, `refer`, `remarks`, `deposit_amount`, `after_deposit_balance`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 'BD2605201', 3, 9, 2, '01-05-2020', NULL, NULL, 20000, NULL, 1, NULL, NULL, NULL, '2020-05-26 11:48:45', '2020-05-26 11:48:45'),
(18, 'BD26052018', 2, 10, 3, '01-05-2020', NULL, NULL, 500, NULL, 1, NULL, NULL, NULL, '2020-05-26 12:04:00', '2020-05-26 12:04:00'),
(19, 'BD26052019', 2, 10, 3, '01-05-2020', NULL, NULL, 500, NULL, 1, NULL, NULL, NULL, '2020-05-26 12:07:06', '2020-05-26 12:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `bank_withdraws`
--

CREATE TABLE `bank_withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voucher_header_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdraw_amount` bigint(20) DEFAULT NULL,
  `after_withdraw_balance` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_withdraws`
--

INSERT INTO `bank_withdraws` (`id`, `invoice_no`, `bank_id`, `bank_account_id`, `voucher_header_id`, `date`, `refer`, `remarks`, `withdraw_amount`, `after_withdraw_balance`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'BW2605201', 3, 9, 3, '12-05-2020', NULL, NULL, 10000, NULL, 1, NULL, NULL, NULL, '2020-05-26 11:50:02', '2020-05-26 11:50:02'),
(7, 'BW2605207', 2, 10, 4, '01-05-2020', NULL, NULL, 35000, NULL, 1, NULL, NULL, NULL, '2020-05-26 12:09:00', '2020-05-26 12:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_deleted` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `group_name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'A+', '1', '0', NULL, NULL),
(2, 'A-', '1', '0', NULL, NULL),
(3, 'B+', '1', '0', NULL, NULL),
(4, 'AB+', '1', '0', NULL, NULL),
(5, 'O-', '1', '0', NULL, NULL),
(6, 'O+', '1', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `deleted_status`, `created_at`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(50, 'General', 1, NULL, '2020-03-03 22:50:08', '2020-03-03 23:41:19', '0', '0'),
(51, 'Physically Challenged', 1, NULL, '2020-03-11 06:07:28', '2020-03-11 06:07:28', '0', '0'),
(52, 'Freedom fighter\'s son', 1, NULL, '2020-03-11 06:08:14', '2020-03-11 06:08:14', '0', '0'),
(53, 'Harrison', 1, 1, '2020-04-13 15:37:58', '2020-04-13 15:42:17', '{\"id\":8,\"guard\":\"admin\"}', '2020-04-13 21:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `class_teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `status`, `class_teacher_id`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(15, 'One', 1, NULL, NULL, NULL, NULL, '2020-03-08 00:58:14', '2020-05-16 12:50:17'),
(16, 'Two (2)', 1, NULL, NULL, NULL, NULL, '2020-03-08 00:58:26', '2020-04-18 16:01:17'),
(18, 'Three (3)', 1, NULL, NULL, NULL, NULL, '2020-03-08 00:59:17', '2020-04-18 16:01:22'),
(19, 'Five (5)', 1, NULL, NULL, NULL, NULL, '2020-03-08 00:59:38', '2020-04-18 16:01:27'),
(20, 'Six (6)', 1, NULL, NULL, NULL, NULL, '2020-03-08 01:49:32', '2020-04-18 16:01:33'),
(21, 'Nine (9)', 1, NULL, NULL, NULL, NULL, '2020-03-09 22:43:14', '2020-04-18 16:01:39'),
(22, 'Ten (10)', 1, NULL, NULL, NULL, NULL, '2020-03-30 14:07:37', '2020-04-18 16:01:45'),
(23, 'Eight (8)', 1, NULL, NULL, NULL, NULL, '2020-05-16 00:46:02', '2020-05-16 00:46:02'),
(24, 'Seven (7)', 1, NULL, NULL, NULL, NULL, '2020-05-16 12:47:45', '2020-05-16 12:47:45'),
(25, 'Seven (11)', 1, NULL, NULL, NULL, NULL, '2020-05-16 12:50:03', '2020-05-16 12:50:03'),
(26, 'Twelve (12)', 1, NULL, NULL, NULL, NULL, '2020-05-17 00:30:52', '2020-05-17 00:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `class_sections`
--

CREATE TABLE `class_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `is_assigned_subject` tinyint(1) NOT NULL DEFAULT '0',
  `is_assigned_teacher` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_status` tinyint(1) DEFAULT NULL,
  `prepare_to_update` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_sections`
--

INSERT INTO `class_sections` (`id`, `class_id`, `section_id`, `is_assigned_subject`, `is_assigned_teacher`, `created_at`, `updated_at`, `deleted_status`, `prepare_to_update`, `deleted_by`, `deleted_at`) VALUES
(15, 19, 5, 1, 0, '2020-03-08 00:59:38', '2020-04-18 16:01:27', NULL, 0, NULL, NULL),
(16, 19, 6, 0, 0, '2020-03-08 00:59:38', '2020-04-18 16:01:27', NULL, 0, NULL, NULL),
(17, 20, 5, 1, 1, '2020-03-08 01:49:32', '2020-05-16 02:26:55', NULL, 0, NULL, NULL),
(18, 20, 6, 1, 0, '2020-03-08 01:49:32', '2020-04-24 17:16:40', NULL, 0, NULL, NULL),
(53, 21, 5, 1, 1, '2020-03-09 23:21:42', '2020-05-16 02:26:18', NULL, 0, NULL, NULL),
(54, 21, 6, 1, 1, '2020-03-09 23:21:42', '2020-05-16 12:52:29', NULL, 0, NULL, NULL),
(55, 21, 7, 1, 0, '2020-03-09 23:21:42', '2020-04-24 17:16:45', NULL, 0, NULL, NULL),
(67, 16, 5, 1, 0, '2020-03-11 06:03:19', '2020-04-24 17:16:32', NULL, 0, NULL, NULL),
(68, 16, 6, 1, 0, '2020-03-11 06:03:19', '2020-04-24 17:16:32', NULL, 0, NULL, NULL),
(69, 16, 7, 1, 1, '2020-03-11 06:03:19', '2020-04-26 01:40:08', NULL, 0, NULL, NULL),
(70, 16, 8, 1, 0, '2020-03-11 06:03:19', '2020-04-24 17:16:32', NULL, 0, NULL, NULL),
(71, 18, 5, 1, 0, '2020-03-13 22:57:37', '2020-04-24 17:16:36', NULL, 0, NULL, NULL),
(72, 18, 6, 1, 1, '2020-03-13 22:57:37', '2020-05-16 02:27:43', NULL, 0, NULL, NULL),
(73, 18, 7, 0, 0, '2020-03-13 22:57:37', '2020-04-24 17:16:36', NULL, 0, NULL, NULL),
(74, 18, 8, 0, 0, '2020-03-13 22:57:37', '2020-04-24 17:16:36', NULL, 0, NULL, NULL),
(75, 22, 5, 0, 0, '2020-03-30 14:07:37', '2020-05-01 21:05:21', NULL, 0, NULL, NULL),
(76, 22, 6, 0, 0, '2020-03-30 14:07:37', '2020-05-01 21:05:21', NULL, 0, NULL, NULL),
(84, 15, 5, 1, 1, '2020-04-05 10:38:25', '2020-05-21 11:48:20', NULL, 0, NULL, NULL),
(85, 15, 6, 1, 1, '2020-04-05 10:38:25', '2020-05-21 11:48:20', NULL, 0, NULL, NULL),
(86, 15, 7, 0, 0, '2020-04-05 10:38:25', '2020-05-21 11:48:20', NULL, 0, NULL, NULL),
(87, 22, 7, 0, 0, '2020-05-01 21:05:21', '2020-05-01 21:05:21', NULL, 0, NULL, NULL),
(88, 22, 8, 0, 0, '2020-05-01 21:05:21', '2020-05-01 21:05:21', NULL, 0, NULL, NULL),
(89, 23, 5, 1, 1, '2020-05-16 00:46:02', '2020-05-16 02:50:34', NULL, 0, NULL, NULL),
(90, 23, 6, 0, 0, '2020-05-16 00:46:02', '2020-05-16 00:46:02', NULL, 0, NULL, NULL),
(91, 23, 7, 0, 0, '2020-05-16 00:46:02', '2020-05-16 00:46:02', NULL, 0, NULL, NULL),
(92, 24, 5, 0, 0, '2020-05-16 12:47:46', '2020-05-16 12:47:46', NULL, 0, NULL, NULL),
(93, 24, 6, 0, 0, '2020-05-16 12:47:46', '2020-05-16 12:47:46', NULL, 0, NULL, NULL),
(94, 24, 7, 0, 0, '2020-05-16 12:47:46', '2020-05-16 12:47:46', NULL, 0, NULL, NULL),
(95, 25, 5, 1, 0, '2020-05-16 12:50:03', '2020-05-16 12:53:14', NULL, 0, NULL, NULL),
(96, 25, 6, 0, 0, '2020-05-16 12:50:03', '2020-05-16 12:50:03', NULL, 0, NULL, NULL),
(97, 25, 7, 0, 0, '2020-05-16 12:50:03', '2020-05-16 12:50:03', NULL, 0, NULL, NULL),
(98, 15, 8, 0, 0, '2020-05-16 12:50:12', '2020-05-21 11:48:20', NULL, 0, NULL, NULL),
(99, 26, 5, 1, 1, '2020-05-17 00:30:52', '2020-05-17 00:33:35', NULL, 0, NULL, NULL),
(100, 26, 6, 0, 0, '2020-05-17 00:30:52', '2020-05-17 00:30:52', NULL, 0, NULL, NULL),
(101, 26, 7, 0, 0, '2020-05-17 00:30:53', '2020-05-17 00:30:53', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_status` tinyint(1) DEFAULT NULL,
  `prepare_to_update` tinyint(1) NOT NULL DEFAULT '0',
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `class_section_id`, `subject_id`, `deleted_status`, `prepare_to_update`, `class_id`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(158, 55, 7, NULL, 0, NULL, NULL, NULL, '2020-03-27 01:00:06', '2020-03-27 01:00:06'),
(159, 55, 6, NULL, 0, NULL, NULL, NULL, '2020-03-27 01:00:06', '2020-03-27 01:00:06'),
(160, 55, 5, NULL, 0, NULL, NULL, NULL, '2020-03-27 01:00:06', '2020-03-27 01:00:06'),
(161, 55, 4, NULL, 0, NULL, NULL, NULL, '2020-03-27 01:00:06', '2020-03-27 01:00:06'),
(162, 55, 3, NULL, 0, NULL, NULL, NULL, '2020-03-27 01:00:06', '2020-03-27 01:00:06'),
(163, 55, 1, NULL, 0, NULL, NULL, NULL, '2020-03-27 01:00:06', '2020-03-27 01:00:06'),
(433, 71, 7, NULL, 0, 18, NULL, NULL, '2020-04-25 14:27:21', '2020-04-25 14:27:21'),
(434, 71, 6, NULL, 0, 18, NULL, NULL, '2020-04-25 14:27:21', '2020-04-25 14:27:21'),
(435, 71, 5, NULL, 0, 18, NULL, NULL, '2020-04-25 14:27:21', '2020-04-25 14:27:21'),
(436, 71, 4, NULL, 0, 18, NULL, NULL, '2020-04-25 14:27:21', '2020-04-25 14:27:21'),
(437, 71, 3, NULL, 0, 18, NULL, NULL, '2020-04-25 14:27:21', '2020-04-25 14:27:21'),
(438, 71, 1, NULL, 0, 18, NULL, NULL, '2020-04-25 14:27:21', '2020-04-25 14:27:21'),
(445, 70, 7, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:32', '2020-04-25 14:27:32'),
(446, 70, 6, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:32', '2020-04-25 14:27:32'),
(447, 70, 5, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:33', '2020-04-25 14:27:33'),
(448, 70, 4, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:33', '2020-04-25 14:27:33'),
(449, 70, 3, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:33', '2020-04-25 14:27:33'),
(450, 70, 1, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:33', '2020-04-25 14:27:33'),
(451, 69, 7, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:39', '2020-04-25 14:27:39'),
(452, 69, 6, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:39', '2020-04-25 14:27:39'),
(453, 69, 5, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:39', '2020-04-25 14:27:39'),
(454, 69, 4, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:39', '2020-04-25 14:27:39'),
(455, 69, 3, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:39', '2020-04-25 14:27:39'),
(456, 69, 1, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:39', '2020-04-25 14:27:39'),
(457, 68, 6, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:46', '2020-04-25 14:27:46'),
(458, 68, 5, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:46', '2020-04-25 14:27:46'),
(459, 68, 4, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:46', '2020-04-25 14:27:46'),
(460, 68, 1, NULL, 0, 16, NULL, NULL, '2020-04-25 14:27:46', '2020-04-25 14:27:46'),
(461, 67, 7, NULL, 0, 16, NULL, NULL, '2020-04-25 14:28:00', '2020-04-25 14:28:00'),
(462, 67, 6, NULL, 0, 16, NULL, NULL, '2020-04-25 14:28:00', '2020-04-25 14:28:00'),
(463, 67, 5, NULL, 0, 16, NULL, NULL, '2020-04-25 14:28:00', '2020-04-25 14:28:00'),
(464, 67, 4, NULL, 0, 16, NULL, NULL, '2020-04-25 14:28:00', '2020-04-25 14:28:00'),
(465, 67, 3, NULL, 0, 16, NULL, NULL, '2020-04-25 14:28:00', '2020-04-25 14:28:00'),
(466, 67, 1, NULL, 0, 16, NULL, NULL, '2020-04-25 14:28:00', '2020-04-25 14:28:00'),
(467, 15, 7, NULL, 0, 19, NULL, NULL, '2020-04-25 14:28:05', '2020-04-25 14:28:05'),
(468, 15, 6, NULL, 0, 19, NULL, NULL, '2020-04-25 14:28:05', '2020-04-25 14:28:05'),
(469, 15, 5, NULL, 0, 19, NULL, NULL, '2020-04-25 14:28:05', '2020-04-25 14:28:05'),
(470, 15, 3, NULL, 0, 19, NULL, NULL, '2020-04-25 14:28:05', '2020-04-25 14:28:05'),
(471, 15, 1, NULL, 0, 19, NULL, NULL, '2020-04-25 14:28:05', '2020-04-25 14:28:05'),
(472, 17, 7, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:08', '2020-04-25 14:28:08'),
(473, 17, 6, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:08', '2020-04-25 14:28:08'),
(474, 17, 5, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:08', '2020-04-25 14:28:08'),
(475, 17, 4, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:08', '2020-04-25 14:28:08'),
(476, 17, 3, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:08', '2020-04-25 14:28:08'),
(477, 17, 1, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:08', '2020-04-25 14:28:08'),
(478, 18, 7, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:11', '2020-04-25 14:28:11'),
(479, 18, 6, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:11', '2020-04-25 14:28:11'),
(480, 18, 5, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:11', '2020-04-25 14:28:11'),
(481, 18, 4, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:11', '2020-04-25 14:28:11'),
(482, 18, 3, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:11', '2020-04-25 14:28:11'),
(483, 18, 1, NULL, 0, 20, NULL, NULL, '2020-04-25 14:28:11', '2020-04-25 14:28:11'),
(490, 53, 7, NULL, 0, 21, NULL, NULL, '2020-04-25 14:28:19', '2020-04-25 14:28:19'),
(491, 53, 6, NULL, 0, 21, NULL, NULL, '2020-04-25 14:28:19', '2020-04-25 14:28:19'),
(492, 53, 5, NULL, 0, 21, NULL, NULL, '2020-04-25 14:28:19', '2020-04-25 14:28:19'),
(493, 53, 4, NULL, 0, 21, NULL, NULL, '2020-04-25 14:28:19', '2020-04-25 14:28:19'),
(494, 53, 3, NULL, 0, 21, NULL, NULL, '2020-04-25 14:28:19', '2020-04-25 14:28:19'),
(495, 53, 1, NULL, 0, 21, NULL, NULL, '2020-04-25 14:28:19', '2020-04-25 14:28:19'),
(496, 72, 6, NULL, 0, 18, NULL, NULL, '2020-04-25 14:29:09', '2020-04-25 14:29:09'),
(497, 72, 5, NULL, 0, 18, NULL, NULL, '2020-04-25 14:29:09', '2020-04-25 14:29:09'),
(498, 72, 4, NULL, 0, 18, NULL, NULL, '2020-04-25 14:29:09', '2020-04-25 14:29:09'),
(499, 72, 3, NULL, 0, 18, NULL, NULL, '2020-04-25 14:29:09', '2020-04-25 14:29:09'),
(500, 72, 1, NULL, 0, 18, NULL, NULL, '2020-04-25 14:29:09', '2020-04-25 14:29:09'),
(507, 85, 7, NULL, 0, 15, NULL, NULL, '2020-04-25 14:29:19', '2020-04-25 14:29:19'),
(508, 85, 6, NULL, 0, 15, NULL, NULL, '2020-04-25 14:29:19', '2020-04-25 14:29:19'),
(509, 85, 5, NULL, 0, 15, NULL, NULL, '2020-04-25 14:29:19', '2020-04-25 14:29:19'),
(510, 85, 4, NULL, 0, 15, NULL, NULL, '2020-04-25 14:29:19', '2020-04-25 14:29:19'),
(511, 85, 3, NULL, 0, 15, NULL, NULL, '2020-04-25 14:29:19', '2020-04-25 14:29:19'),
(512, 85, 1, NULL, 0, 15, NULL, NULL, '2020-04-25 14:29:19', '2020-04-25 14:29:19'),
(513, 54, 1, NULL, 0, 21, NULL, NULL, '2020-05-16 02:42:11', '2020-05-16 02:42:11'),
(514, 54, 3, NULL, 0, 21, NULL, NULL, '2020-05-16 02:42:11', '2020-05-16 02:42:11'),
(515, 89, 1, NULL, 0, 23, NULL, NULL, '2020-05-16 02:50:34', '2020-05-16 02:50:34'),
(516, 89, 3, NULL, 0, 23, NULL, NULL, '2020-05-16 02:50:34', '2020-05-16 02:50:34'),
(517, 89, 4, NULL, 0, 23, NULL, NULL, '2020-05-16 02:50:34', '2020-05-16 02:50:34'),
(518, 89, 5, NULL, 0, 23, NULL, NULL, '2020-05-16 02:50:34', '2020-05-16 02:50:34'),
(519, 89, 6, NULL, 0, 23, NULL, NULL, '2020-05-16 02:50:34', '2020-05-16 02:50:34'),
(520, 95, 1, NULL, 0, 25, NULL, NULL, '2020-05-16 12:53:14', '2020-05-16 12:53:14'),
(521, 95, 3, NULL, 0, 25, NULL, NULL, '2020-05-16 12:53:14', '2020-05-16 12:53:14'),
(522, 95, 4, NULL, 0, 25, NULL, NULL, '2020-05-16 12:53:14', '2020-05-16 12:53:14'),
(523, 95, 5, NULL, 0, 25, NULL, NULL, '2020-05-16 12:53:14', '2020-05-16 12:53:14'),
(524, 95, 6, NULL, 0, 25, NULL, NULL, '2020-05-16 12:53:14', '2020-05-16 12:53:14'),
(525, 95, 8, NULL, 0, 25, NULL, NULL, '2020-05-16 12:53:14', '2020-05-16 12:53:14'),
(541, 99, 9, NULL, 0, 26, NULL, NULL, '2020-05-17 00:33:45', '2020-05-17 00:33:45'),
(542, 99, 8, NULL, 0, 26, NULL, NULL, '2020-05-17 00:33:45', '2020-05-17 00:33:45'),
(543, 99, 7, NULL, 0, 26, NULL, NULL, '2020-05-17 00:33:45', '2020-05-17 00:33:45'),
(544, 99, 6, NULL, 0, 26, NULL, NULL, '2020-05-17 00:33:45', '2020-05-17 00:33:45'),
(545, 99, 5, NULL, 0, 26, NULL, NULL, '2020-05-17 00:33:45', '2020-05-17 00:33:45'),
(546, 99, 4, NULL, 0, 26, NULL, NULL, '2020-05-17 00:33:45', '2020-05-17 00:33:45'),
(547, 99, 3, NULL, 0, 26, NULL, NULL, '2020-05-17 00:33:45', '2020-05-17 00:33:45'),
(548, 99, 1, NULL, 0, 26, NULL, NULL, '2020-05-17 00:33:45', '2020-05-17 00:33:45'),
(549, 84, 9, NULL, 0, 15, NULL, NULL, '2020-06-05 15:01:50', '2020-06-05 15:01:50'),
(550, 84, 8, NULL, 0, 15, NULL, NULL, '2020-06-05 15:01:50', '2020-06-05 15:01:50'),
(551, 84, 7, NULL, 0, 15, NULL, NULL, '2020-06-05 15:01:50', '2020-06-05 15:01:50'),
(552, 84, 6, NULL, 0, 15, NULL, NULL, '2020-06-05 15:01:50', '2020-06-05 15:01:50'),
(553, 84, 5, NULL, 0, 15, NULL, NULL, '2020-06-05 15:01:50', '2020-06-05 15:01:50'),
(554, 84, 4, NULL, 0, 15, NULL, NULL, '2020-06-05 15:01:50', '2020-06-05 15:01:50'),
(555, 84, 3, NULL, 0, 15, NULL, NULL, '2020-06-05 15:01:50', '2020-06-05 15:01:50'),
(556, 84, 1, NULL, 0, 15, NULL, NULL, '2020-06-05 15:01:50', '2020-06-05 15:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `class_teachers`
--

CREATE TABLE `class_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_section_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_teachers`
--

INSERT INTO `class_teachers` (`id`, `class_section_id`, `employee_id`, `status`, `deleted_status`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 84, 9, 1, NULL, NULL, NULL, '2020-04-05 10:39:16', '2020-04-05 10:39:16'),
(2, 84, 16, 1, NULL, NULL, NULL, '2020-04-05 10:39:16', '2020-04-05 10:39:16'),
(3, 84, 17, 1, NULL, NULL, NULL, '2020-04-05 10:39:16', '2020-04-05 10:39:16'),
(4, 69, 9, 1, NULL, NULL, NULL, '2020-04-26 01:40:08', '2020-04-26 01:40:08'),
(5, 69, 16, 1, NULL, NULL, NULL, '2020-04-26 01:40:08', '2020-04-26 01:40:08'),
(6, 69, 17, 1, NULL, NULL, NULL, '2020-04-26 01:40:08', '2020-04-26 01:40:08'),
(10, 53, 9, 1, NULL, NULL, NULL, '2020-05-16 02:26:18', '2020-05-16 02:26:18'),
(11, 53, 16, 1, NULL, NULL, NULL, '2020-05-16 02:26:18', '2020-05-16 02:26:18'),
(12, 53, 17, 1, NULL, NULL, NULL, '2020-05-16 02:26:18', '2020-05-16 02:26:18'),
(13, 17, 9, 1, NULL, NULL, NULL, '2020-05-16 02:26:55', '2020-05-16 02:26:55'),
(14, 17, 16, 1, NULL, NULL, NULL, '2020-05-16 02:26:55', '2020-05-16 02:26:55'),
(15, 72, 9, 1, NULL, NULL, NULL, '2020-05-16 02:27:43', '2020-05-16 02:27:43'),
(16, 72, 16, 1, NULL, NULL, NULL, '2020-05-16 02:27:43', '2020-05-16 02:27:43'),
(17, 72, 17, 1, NULL, NULL, NULL, '2020-05-16 02:27:43', '2020-05-16 02:27:43'),
(18, 89, 9, 1, NULL, NULL, NULL, '2020-05-16 02:28:41', '2020-05-16 02:28:41'),
(19, 89, 16, 1, NULL, NULL, NULL, '2020-05-16 02:28:41', '2020-05-16 02:28:41'),
(20, 89, 17, 1, NULL, NULL, NULL, '2020-05-16 02:28:41', '2020-05-16 02:28:41'),
(21, 54, 9, 1, NULL, NULL, NULL, '2020-05-16 12:52:28', '2020-05-16 12:52:28'),
(22, 54, 16, 1, NULL, NULL, NULL, '2020-05-16 12:52:29', '2020-05-16 12:52:29'),
(23, 54, 17, 1, NULL, NULL, NULL, '2020-05-16 12:52:29', '2020-05-16 12:52:29'),
(27, 99, 9, 1, NULL, NULL, NULL, '2020-05-17 00:32:36', '2020-05-17 00:32:36'),
(28, 99, 16, 1, NULL, NULL, NULL, '2020-05-17 00:32:36', '2020-05-17 00:32:36'),
(29, 85, 9, 1, NULL, NULL, NULL, '2020-05-29 13:10:46', '2020-05-29 13:10:46'),
(30, 85, 16, 1, NULL, NULL, NULL, '2020-05-29 13:10:46', '2020-05-29 13:10:46'),
(31, 85, 17, 1, NULL, NULL, NULL, '2020-05-29 13:10:46', '2020-05-29 13:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `class_timetables`
--

CREATE TABLE `class_timetables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_timetables`
--

INSERT INTO `class_timetables` (`id`, `class_id`, `section_id`, `subject_id`, `day`, `teacher_id`, `start_time`, `end_time`, `room_no`, `created_at`, `updated_at`) VALUES
(328, 15, 5, 1, 'Thusday', 9, '01:00', '01:00', 5, '2020-03-31 05:08:20', '2020-03-31 05:08:20'),
(329, 15, 5, 3, 'Thusday', 16, '01:00', '01:01', 2, '2020-03-31 05:08:20', '2020-03-31 05:08:20'),
(330, 15, 5, 4, 'Thusday', 16, '01:00', '01:00', 3, '2020-03-31 05:08:20', '2020-03-31 05:08:20'),
(331, 15, 5, 5, 'Thusday', 16, '01:00', '01:00', 5, '2020-03-31 05:08:20', '2020-03-31 05:08:20'),
(332, 15, 5, 6, 'Thusday', 17, '01:00', '01:01', 3, '2020-03-31 05:08:20', '2020-03-31 05:08:20'),
(602, 16, 5, 1, 'Thursday', 9, '12:15 AM', '12:15 AM', 3, '2020-03-31 12:16:36', '2020-03-31 12:16:36'),
(603, 16, 5, 5, 'Thursday', 9, '12:15 AM', '12:15 AM', 2, '2020-03-31 12:16:36', '2020-03-31 12:16:36'),
(604, 16, 5, 4, 'Thursday', 9, '12:16 AM', '12:16 AM', 4, '2020-03-31 12:16:36', '2020-03-31 12:16:36'),
(605, 16, 5, 5, 'Thursday', 16, '12:16 AM', '12:16 AM', 6, '2020-03-31 12:16:36', '2020-03-31 12:16:36'),
(606, 16, 5, 6, 'Thursday', 16, '12:16 AM', '12:16 AM', 7, '2020-03-31 12:16:36', '2020-03-31 12:16:36'),
(607, 16, 5, 7, 'Thursday', 16, '12:16 AM', '12:16 AM', 5, '2020-03-31 12:16:36', '2020-03-31 12:16:36'),
(614, 16, 5, 1, 'Saturday', 9, '12:18 AM', '12:18 AM', 2, '2020-03-31 12:18:57', '2020-03-31 12:18:57'),
(615, 16, 5, 3, 'Saturday', 9, '12:18 AM', '12:18 AM', 3, '2020-03-31 12:18:57', '2020-03-31 12:18:57'),
(616, 16, 5, 4, 'Saturday', 16, '12:18 AM', '12:18 AM', 3, '2020-03-31 12:18:57', '2020-03-31 12:18:57'),
(617, 16, 5, 5, 'Saturday', 17, '12:18 AM', '12:18 AM', 4, '2020-03-31 12:18:57', '2020-03-31 12:18:57'),
(618, 16, 5, 6, 'Saturday', 17, '12:18 AM', '12:18 AM', 6, '2020-03-31 12:18:57', '2020-03-31 12:18:57'),
(619, 16, 5, 7, 'Saturday', 17, '12:18 AM', '12:18 AM', 7, '2020-03-31 12:18:57', '2020-03-31 12:18:57'),
(626, 16, 5, 1, 'Tuesday', 9, '11:07 AM', '12:07 AM', 8, '2020-03-31 12:20:49', '2020-03-31 12:20:49'),
(627, 16, 5, 3, 'Tuesday', 16, '11:08 AM', '11:50 AM', 6, '2020-03-31 12:20:49', '2020-03-31 12:20:49'),
(628, 16, 5, 6, 'Tuesday', 16, '12:09 AM', '03:14 AM', 10, '2020-03-31 12:20:49', '2020-03-31 12:20:49'),
(629, 16, 5, 4, 'Tuesday', 9, '12:20 AM', '12:20 AM', 2, '2020-03-31 12:20:49', '2020-03-31 12:20:49'),
(630, 16, 5, 5, 'Tuesday', 9, '12:20 AM', '12:20 AM', 3, '2020-03-31 12:20:49', '2020-03-31 12:20:49'),
(631, 16, 5, 7, 'Tuesday', 16, '12:20 AM', '12:20 AM', 1, '2020-03-31 12:20:49', '2020-03-31 12:20:49'),
(649, 16, 5, 1, 'Monday', 9, '11:46 PM', '11:46 PM', 1, '2020-03-31 12:25:00', '2020-03-31 12:25:00'),
(650, 16, 5, 3, 'Monday', 16, '01:46 PM', '01:43 PM', 2, '2020-03-31 12:25:00', '2020-03-31 12:25:00'),
(651, 16, 5, 5, 'Monday', 17, '01:46 PM', '11:46 PM', 3, '2020-03-31 12:25:00', '2020-03-31 12:25:00'),
(652, 16, 5, 4, 'Monday', 16, '12:24 PM', '11:46 PM', 4, '2020-03-31 12:25:00', '2020-03-31 12:25:00'),
(653, 16, 5, 7, 'Monday', 16, '12:24 PM', '11:46 PM', 5, '2020-03-31 12:25:00', '2020-03-31 12:25:00'),
(654, 16, 5, 6, 'Monday', 16, '12:21 AM', '12:21 AM', 3, '2020-03-31 12:25:00', '2020-03-31 12:25:00'),
(685, 15, 6, 1, 'Monday', 9, '12:27 AM', '12:27 AM', 1, '2020-03-31 12:27:38', '2020-03-31 12:27:38'),
(686, 15, 6, 3, 'Monday', 16, '12:27 AM', '12:27 AM', 4, '2020-03-31 12:27:38', '2020-03-31 12:27:38'),
(687, 15, 6, 4, 'Monday', 16, '12:27 AM', '12:27 AM', 5, '2020-03-31 12:27:38', '2020-03-31 12:27:38'),
(688, 15, 6, 5, 'Monday', 16, '12:27 AM', '12:27 AM', 6, '2020-03-31 12:27:38', '2020-03-31 12:27:38'),
(689, 15, 6, 6, 'Monday', 16, '12:27 AM', '12:27 AM', 3, '2020-03-31 12:27:38', '2020-03-31 12:27:38'),
(690, 15, 6, 7, 'Monday', 17, '12:23 AM', '12:23 AM', 3, '2020-03-31 12:27:38', '2020-03-31 12:27:38'),
(696, 15, 6, 1, 'Tuesday', 9, '12:27 AM', '12:27 AM', 2, '2020-03-31 12:27:50', '2020-03-31 12:27:50'),
(697, 15, 6, 4, 'Tuesday', 16, '12:27 AM', '12:27 AM', 4, '2020-03-31 12:27:50', '2020-03-31 12:27:50'),
(698, 15, 6, 3, 'Tuesday', 16, '12:27 AM', '12:27 AM', 10, '2020-03-31 12:27:50', '2020-03-31 12:27:50'),
(699, 15, 6, 6, 'Tuesday', 16, '12:27 AM', '12:27 AM', 11, '2020-03-31 12:27:50', '2020-03-31 12:27:50'),
(700, 15, 6, 7, 'Tuesday', 16, '12:27 AM', '12:27 AM', 12, '2020-03-31 12:27:50', '2020-03-31 12:27:50'),
(701, 15, 6, 5, 'Wednesday', 9, '12:27 AM', '12:27 AM', 3, '2020-03-31 12:28:01', '2020-03-31 12:28:01'),
(702, 15, 6, 3, 'Wednesday', 16, '12:27 AM', '12:27 AM', 2, '2020-03-31 12:28:01', '2020-03-31 12:28:01'),
(703, 15, 6, 4, 'Wednesday', 16, '12:27 AM', '12:27 AM', 3, '2020-03-31 12:28:01', '2020-03-31 12:28:01'),
(704, 15, 6, 6, 'Wednesday', 16, '12:27 AM', '12:27 AM', 5, '2020-03-31 12:28:01', '2020-03-31 12:28:01'),
(705, 15, 6, 7, 'Wednesday', 16, '12:27 AM', '12:28 AM', 6, '2020-03-31 12:28:01', '2020-03-31 12:28:01'),
(706, 15, 6, 1, 'Thursday', 9, '12:28 AM', '12:28 AM', 2, '2020-03-31 12:28:09', '2020-03-31 12:28:09'),
(707, 15, 6, 3, 'Thursday', 16, '12:28 AM', '12:28 AM', 3, '2020-03-31 12:28:09', '2020-03-31 12:28:09'),
(708, 15, 6, 4, 'Thursday', 16, '12:28 AM', '12:28 AM', 4, '2020-03-31 12:28:09', '2020-03-31 12:28:09'),
(709, 15, 6, 5, 'Thursday', 9, '12:28 AM', '12:28 AM', 5, '2020-03-31 12:28:09', '2020-03-31 12:28:09'),
(710, 15, 6, 6, 'Thursday', 16, '12:28 AM', '12:28 AM', 6, '2020-03-31 12:28:10', '2020-03-31 12:28:10'),
(711, 15, 6, 1, 'Saturday', 9, '12:28 AM', '12:28 AM', 3, '2020-03-31 12:28:21', '2020-03-31 12:28:21'),
(712, 15, 6, 3, 'Saturday', 16, '12:28 AM', '12:28 AM', 4, '2020-03-31 12:28:21', '2020-03-31 12:28:21'),
(713, 15, 6, 4, 'Saturday', 16, '12:28 AM', '12:28 AM', 6, '2020-03-31 12:28:21', '2020-03-31 12:28:21'),
(714, 15, 6, 5, 'Saturday', 16, '12:28 AM', '12:28 AM', 6, '2020-03-31 12:28:21', '2020-03-31 12:28:21'),
(715, 15, 6, 6, 'Saturday', 16, '12:28 AM', '12:28 AM', 7, '2020-03-31 12:28:21', '2020-03-31 12:28:21'),
(716, 15, 6, 7, 'Saturday', 9, '12:28 AM', '12:28 AM', 3, '2020-03-31 12:28:21', '2020-03-31 12:28:21'),
(751, 15, 7, 5, 'Sunday', 16, '12:29 AM', '12:29 AM', 2, '2020-03-31 12:30:33', '2020-03-31 12:30:33'),
(752, 15, 7, 4, 'Sunday', 16, '12:29 AM', '12:29 AM', 4, '2020-03-31 12:30:33', '2020-03-31 12:30:33'),
(753, 15, 7, 1, 'Sunday', 16, '12:29 AM', '12:29 AM', 5, '2020-03-31 12:30:34', '2020-03-31 12:30:34'),
(754, 15, 7, 6, 'Sunday', 16, '12:29 AM', '12:29 AM', 5, '2020-03-31 12:30:34', '2020-03-31 12:30:34'),
(755, 15, 7, 7, 'Sunday', 16, '12:29 AM', '12:29 AM', 4, '2020-03-31 12:30:34', '2020-03-31 12:30:34'),
(756, 15, 7, 3, 'Sunday', 9, '12:30 AM', '12:30 AM', 4, '2020-03-31 12:30:34', '2020-03-31 12:30:34'),
(772, 15, 7, 1, 'Tuesday', 16, '12:28 AM', '12:28 AM', 2, '2020-03-31 12:31:50', '2020-03-31 12:31:50'),
(773, 15, 7, 6, 'Tuesday', 9, '12:29 AM', '12:29 AM', 3, '2020-03-31 12:31:50', '2020-03-31 12:31:50'),
(774, 15, 7, 5, 'Tuesday', 9, '12:29 AM', '12:29 AM', 3, '2020-03-31 12:31:50', '2020-03-31 12:31:50'),
(775, 15, 7, 3, 'Tuesday', 9, '12:29 AM', '12:29 AM', 2, '2020-03-31 12:31:50', '2020-03-31 12:31:50'),
(776, 15, 7, 4, 'Tuesday', 16, '12:31 AM', '12:31 AM', 1, '2020-03-31 12:31:50', '2020-03-31 12:31:50'),
(777, 15, 7, 7, 'Tuesday', 16, '12:31 AM', '12:31 AM', 1, '2020-03-31 12:31:50', '2020-03-31 12:31:50'),
(790, 15, 7, 3, 'Wednesday', 16, '13:00', '01:00', 4, '2020-03-31 12:34:01', '2020-03-31 12:34:01'),
(791, 15, 7, 1, 'Wednesday', 9, '01:00', '01:00', 2, '2020-03-31 12:34:01', '2020-03-31 12:34:01'),
(792, 15, 7, 4, 'Wednesday', 9, '01:00', '01:00', 4, '2020-03-31 12:34:01', '2020-03-31 12:34:01'),
(793, 15, 7, 6, 'Wednesday', 16, '01:00', '01:00', 3, '2020-03-31 12:34:01', '2020-03-31 12:34:01'),
(794, 15, 7, 5, 'Wednesday', 16, '12:31 AM', '12:31 AM', 5, '2020-03-31 12:34:01', '2020-03-31 12:34:01'),
(795, 15, 7, 7, 'Wednesday', 9, '12:33 AM', '12:33 AM', 4, '2020-03-31 12:34:01', '2020-03-31 12:34:01'),
(796, 15, 7, 4, 'Thursday', 9, '01:00', '13:10', 4, '2020-03-31 12:34:19', '2020-03-31 12:34:19'),
(797, 15, 7, 5, 'Thursday', 16, '13:00', '01:00', 4, '2020-03-31 12:34:19', '2020-03-31 12:34:19'),
(798, 15, 7, 4, 'Thursday', 9, '01:00', '01:00', 5, '2020-03-31 12:34:19', '2020-03-31 12:34:19'),
(799, 15, 7, 7, 'Thursday', 16, '01:00', '01:00', 6, '2020-03-31 12:34:19', '2020-03-31 12:34:19'),
(800, 15, 7, 5, 'Thursday', 16, '12:30 AM', '12:30 AM', 1, '2020-03-31 12:34:19', '2020-03-31 12:34:19'),
(801, 15, 7, 6, 'Thursday', 16, '12:34 AM', '12:34 AM', 6, '2020-03-31 12:34:19', '2020-03-31 12:34:19'),
(802, 15, 7, 4, 'Saturday', 16, '12:29 AM', '12:29 AM', 2, '2020-03-31 12:34:47', '2020-03-31 12:34:47'),
(803, 15, 7, 5, 'Saturday', 16, '12:29 AM', '12:29 AM', 3, '2020-03-31 12:34:47', '2020-03-31 12:34:47'),
(804, 15, 7, 6, 'Saturday', 16, '12:29 AM', '12:29 AM', 2, '2020-03-31 12:34:47', '2020-03-31 12:34:47'),
(805, 15, 7, 7, 'Saturday', 9, '12:29 AM', '12:29 AM', 3, '2020-03-31 12:34:47', '2020-03-31 12:34:47'),
(806, 15, 7, 3, 'Saturday', 9, '12:30 AM', '12:30 AM', 1, '2020-03-31 12:34:47', '2020-03-31 12:34:47'),
(807, 15, 7, 1, 'Saturday', 9, '12:34 AM', '12:34 AM', 3, '2020-03-31 12:34:47', '2020-03-31 12:34:47'),
(808, 15, 7, 1, 'Monday', 9, '12:28 AM', '12:28 AM', 1, '2020-03-31 12:37:15', '2020-03-31 12:37:15'),
(809, 15, 7, 5, 'Monday', 16, '12:28 AM', '12:28 AM', 4, '2020-03-31 12:37:15', '2020-03-31 12:37:15'),
(810, 15, 7, 6, 'Monday', 16, '12:28 AM', '12:28 AM', 2, '2020-03-31 12:37:15', '2020-03-31 12:37:15'),
(811, 15, 7, 7, 'Monday', 17, '12:28 AM', '12:28 AM', 5, '2020-03-31 12:37:15', '2020-03-31 12:37:15'),
(812, 15, 7, 4, 'Monday', 16, '12:32 AM', '12:32 AM', 3, '2020-03-31 12:37:15', '2020-03-31 12:37:15'),
(813, 15, 7, 3, 'Monday', 17, '12:37 AM', '12:37 AM', 3, '2020-03-31 12:37:15', '2020-03-31 12:37:15'),
(817, 16, 6, 1, 'Monday', 9, '05:48 PM', '05:48 PM', 1, '2020-04-05 05:49:45', '2020-04-05 05:49:45'),
(818, 16, 6, 3, 'Monday', 16, '05:48 PM', '05:48 PM', 1, '2020-04-05 05:49:45', '2020-04-05 05:49:45'),
(819, 16, 6, 4, 'Monday', 16, '05:48 PM', '05:48 PM', 2, '2020-04-05 05:49:45', '2020-04-05 05:49:45'),
(820, 16, 6, 5, 'Monday', 17, '05:49 PM', '05:49 PM', 3, '2020-04-05 05:49:45', '2020-04-05 05:49:45'),
(821, 16, 6, 6, 'Monday', 16, '05:49 PM', '05:49 PM', 4, '2020-04-05 05:49:45', '2020-04-05 05:49:45'),
(822, 16, 6, 7, 'Monday', 9, '05:49 PM', '05:49 PM', 5, '2020-04-05 05:49:45', '2020-04-05 05:49:45'),
(823, 16, 6, 1, 'Tuesday', 9, '05:50 PM', '05:50 PM', 3, '2020-04-05 05:51:28', '2020-04-05 05:51:28'),
(824, 16, 6, 3, 'Tuesday', 16, '05:50 PM', '05:50 PM', 3, '2020-04-05 05:51:28', '2020-04-05 05:51:28'),
(825, 16, 6, 5, 'Tuesday', 16, '05:51 PM', '05:51 PM', 1, '2020-04-05 05:51:28', '2020-04-05 05:51:28'),
(826, 16, 6, 6, 'Tuesday', 17, '05:51 PM', '05:51 PM', 3, '2020-04-05 05:51:28', '2020-04-05 05:51:28'),
(827, 16, 6, 7, 'Tuesday', 16, '05:51 PM', '05:51 PM', 5, '2020-04-05 05:51:28', '2020-04-05 05:51:28'),
(828, 16, 6, 1, 'Wednesday', 16, '05:52 PM', '05:52 PM', 2, '2020-04-05 05:52:55', '2020-04-05 05:52:55'),
(829, 16, 6, 3, 'Wednesday', 16, '05:52 PM', '05:52 PM', 3, '2020-04-05 05:52:55', '2020-04-05 05:52:55'),
(830, 16, 6, 4, 'Wednesday', 17, '05:52 PM', '05:52 PM', 4, '2020-04-05 05:52:55', '2020-04-05 05:52:55'),
(831, 16, 6, 5, 'Wednesday', 17, '05:52 PM', '05:52 PM', 5, '2020-04-05 05:52:55', '2020-04-05 05:52:55'),
(832, 16, 6, 6, 'Wednesday', 17, '05:52 PM', '05:52 PM', 6, '2020-04-05 05:52:55', '2020-04-05 05:52:55'),
(833, 16, 6, 7, 'Wednesday', 17, '05:52 PM', '05:52 PM', 7, '2020-04-05 05:52:55', '2020-04-05 05:52:55'),
(834, 16, 6, 1, 'Thursday', 9, '05:53 PM', '05:53 PM', 3, '2020-04-05 05:55:09', '2020-04-05 05:55:09'),
(835, 16, 6, 3, 'Thursday', 9, '05:53 PM', '05:53 PM', 2, '2020-04-05 05:55:09', '2020-04-05 05:55:09'),
(836, 16, 6, 5, 'Thursday', 16, '05:53 PM', '05:53 PM', 1, '2020-04-05 05:55:10', '2020-04-05 05:55:10'),
(837, 16, 6, 4, 'Thursday', 16, '05:53 PM', '05:53 PM', 4, '2020-04-05 05:55:10', '2020-04-05 05:55:10'),
(838, 16, 6, 6, 'Thursday', 17, '05:54 PM', '05:54 PM', 5, '2020-04-05 05:55:10', '2020-04-05 05:55:10'),
(839, 16, 6, 7, 'Thursday', 17, '05:55 PM', '05:55 PM', 6, '2020-04-05 05:55:10', '2020-04-05 05:55:10'),
(840, 16, 6, 1, 'Saturday', 16, '05:55 PM', '05:55 PM', 3, '2020-04-05 06:07:26', '2020-04-05 06:07:26'),
(841, 16, 6, 3, 'Saturday', 16, '05:55 PM', '05:55 PM', 4, '2020-04-05 06:07:26', '2020-04-05 06:07:26'),
(842, 16, 6, 4, 'Saturday', 16, '05:55 PM', '05:55 PM', 4, '2020-04-05 06:07:26', '2020-04-05 06:07:26'),
(843, 16, 6, 6, 'Saturday', 17, '06:06 PM', '06:06 PM', 5, '2020-04-05 06:07:26', '2020-04-05 06:07:26'),
(844, 16, 6, 7, 'Saturday', 16, '06:06 PM', '06:06 PM', 6, '2020-04-05 06:07:26', '2020-04-05 06:07:26'),
(845, 16, 6, 5, 'Saturday', 16, '06:07 PM', '06:07 PM', 5, '2020-04-05 06:07:26', '2020-04-05 06:07:26'),
(846, 16, 6, 1, 'Sunday', 9, '06:07 PM', '06:07 PM', 2, '2020-04-05 06:08:35', '2020-04-05 06:08:35'),
(847, 16, 6, 3, 'Sunday', 16, '06:07 PM', '06:07 PM', 3, '2020-04-05 06:08:35', '2020-04-05 06:08:35'),
(848, 16, 6, 4, 'Sunday', 16, '06:07 PM', '06:07 PM', 4, '2020-04-05 06:08:35', '2020-04-05 06:08:35'),
(849, 16, 6, 5, 'Sunday', 17, '06:08 PM', '06:08 PM', 6, '2020-04-05 06:08:35', '2020-04-05 06:08:35'),
(850, 16, 6, 6, 'Sunday', 17, '06:08 PM', '06:08 PM', 7, '2020-04-05 06:08:35', '2020-04-05 06:08:35'),
(851, 16, 6, 7, 'Sunday', 16, '06:08 PM', '06:08 PM', 8, '2020-04-05 06:08:35', '2020-04-05 06:08:35'),
(853, 16, 7, 1, 'Monday', 9, '06:08 PM', '06:08 PM', 1, '2020-04-05 06:10:17', '2020-04-05 06:10:17'),
(854, 16, 7, 3, 'Monday', 16, '06:09 PM', '06:09 PM', 2, '2020-04-05 06:10:17', '2020-04-05 06:10:17'),
(855, 16, 7, 4, 'Monday', 16, '06:09 PM', '06:09 PM', 4, '2020-04-05 06:10:17', '2020-04-05 06:10:17'),
(856, 16, 7, 5, 'Monday', 17, '06:09 PM', '06:09 PM', 5, '2020-04-05 06:10:17', '2020-04-05 06:10:17'),
(857, 16, 7, 6, 'Monday', 17, '06:09 PM', '06:09 PM', 6, '2020-04-05 06:10:17', '2020-04-05 06:10:17'),
(858, 16, 7, 7, 'Monday', 17, '06:10 PM', '06:10 PM', 7, '2020-04-05 06:10:17', '2020-04-05 06:10:17'),
(859, 16, 7, 1, 'Tuesday', 9, '06:10 PM', '06:10 PM', 1, '2020-04-05 06:11:24', '2020-04-05 06:11:24'),
(860, 16, 7, 3, 'Tuesday', 16, '06:10 PM', '06:10 PM', 2, '2020-04-05 06:11:25', '2020-04-05 06:11:25'),
(861, 16, 7, 4, 'Tuesday', 16, '06:10 PM', '06:10 PM', 4, '2020-04-05 06:11:25', '2020-04-05 06:11:25'),
(862, 16, 7, 3, 'Tuesday', 16, '06:10 PM', '06:10 PM', 5, '2020-04-05 06:11:25', '2020-04-05 06:11:25'),
(863, 16, 7, 5, 'Tuesday', 17, '06:10 PM', '06:10 PM', 6, '2020-04-05 06:11:25', '2020-04-05 06:11:25'),
(864, 16, 7, 6, 'Tuesday', 17, '06:11 PM', '06:11 PM', 7, '2020-04-05 06:11:25', '2020-04-05 06:11:25'),
(865, 16, 7, 1, 'Wednesday', 9, '06:11 PM', '06:11 PM', 1, '2020-04-05 06:12:22', '2020-04-05 06:12:22'),
(866, 16, 7, 3, 'Wednesday', 16, '06:11 PM', '06:11 PM', 2, '2020-04-05 06:12:22', '2020-04-05 06:12:22'),
(867, 16, 7, 4, 'Wednesday', 16, '06:11 PM', '06:11 PM', 4, '2020-04-05 06:12:22', '2020-04-05 06:12:22'),
(868, 16, 7, 5, 'Wednesday', 17, '06:11 PM', '06:11 PM', 3, '2020-04-05 06:12:22', '2020-04-05 06:12:22'),
(869, 16, 7, 6, 'Wednesday', 17, '06:12 PM', '06:12 PM', 5, '2020-04-05 06:12:22', '2020-04-05 06:12:22'),
(870, 16, 7, 7, 'Wednesday', 17, '06:12 PM', '06:12 PM', 6, '2020-04-05 06:12:22', '2020-04-05 06:12:22'),
(871, 16, 7, 1, 'Thursday', 9, '06:12 PM', '06:12 PM', 1, '2020-04-05 06:13:12', '2020-04-05 06:13:12'),
(872, 16, 7, 3, 'Thursday', 9, '06:12 PM', '06:12 PM', 2, '2020-04-05 06:13:12', '2020-04-05 06:13:12'),
(873, 16, 7, 4, 'Thursday', 16, '06:12 PM', '06:12 PM', 3, '2020-04-05 06:13:12', '2020-04-05 06:13:12'),
(874, 16, 7, 5, 'Thursday', 17, '06:12 PM', '06:12 PM', 4, '2020-04-05 06:13:12', '2020-04-05 06:13:12'),
(875, 16, 7, 6, 'Thursday', 17, '06:12 PM', '06:12 PM', 5, '2020-04-05 06:13:12', '2020-04-05 06:13:12'),
(876, 16, 7, 7, 'Thursday', 17, '06:13 PM', '06:13 PM', 6, '2020-04-05 06:13:12', '2020-04-05 06:13:12'),
(877, 16, 7, 1, 'Saturday', 16, '06:13 PM', '06:13 PM', 3, '2020-04-05 06:14:09', '2020-04-05 06:14:09'),
(878, 16, 7, 3, 'Saturday', 16, '06:13 PM', '06:13 PM', 2, '2020-04-05 06:14:09', '2020-04-05 06:14:09'),
(879, 16, 7, 5, 'Saturday', 16, '06:13 PM', '06:13 PM', 3, '2020-04-05 06:14:09', '2020-04-05 06:14:09'),
(880, 16, 7, 6, 'Saturday', 16, '06:13 PM', '06:13 PM', 5, '2020-04-05 06:14:09', '2020-04-05 06:14:09'),
(881, 16, 7, 7, 'Saturday', 16, '06:13 PM', '06:13 PM', 3, '2020-04-05 06:14:09', '2020-04-05 06:14:09'),
(882, 16, 7, 4, 'Saturday', 9, '06:14 PM', '06:14 PM', 2, '2020-04-05 06:14:09', '2020-04-05 06:14:09'),
(883, 16, 7, 1, 'Sunday', 9, '06:14 PM', '06:14 PM', 3, '2020-04-05 06:15:51', '2020-04-05 06:15:51'),
(884, 16, 7, 4, 'Sunday', 16, '06:14 PM', '06:14 PM', 5, '2020-04-05 06:15:51', '2020-04-05 06:15:51'),
(885, 16, 7, 6, 'Sunday', 9, '06:14 PM', '06:14 PM', 5, '2020-04-05 06:15:51', '2020-04-05 06:15:51'),
(886, 16, 7, 5, 'Sunday', 16, '06:14 PM', '06:14 PM', 6, '2020-04-05 06:15:51', '2020-04-05 06:15:51'),
(887, 16, 7, 6, 'Sunday', 17, '06:15 PM', '06:15 PM', 7, '2020-04-05 06:15:51', '2020-04-05 06:15:51'),
(888, 16, 7, 7, 'Sunday', 16, '06:15 PM', '06:15 PM', 8, '2020-04-05 06:15:51', '2020-04-05 06:15:51'),
(960, 18, 5, 1, 'Tuesday', 9, '09:04 PM', '09:04 PM', 3, '2020-04-08 09:04:41', '2020-04-08 09:04:41'),
(961, 18, 5, 5, 'Tuesday', 16, '09:04 PM', '09:04 PM', 5, '2020-04-08 09:04:41', '2020-04-08 09:04:41'),
(962, 18, 5, 6, 'Tuesday', 16, '09:04 PM', '09:04 PM', 5, '2020-04-08 09:04:41', '2020-04-08 09:04:41'),
(963, 18, 5, 1, 'Wednesday', 9, '09:04 PM', '09:04 PM', 4, '2020-04-08 09:05:36', '2020-04-08 09:05:36'),
(964, 18, 5, 3, 'Wednesday', 16, '09:04 PM', '09:04 PM', 3, '2020-04-08 09:05:36', '2020-04-08 09:05:36'),
(965, 18, 5, 4, 'Wednesday', 17, '09:05 PM', '09:05 PM', 4, '2020-04-08 09:05:36', '2020-04-08 09:05:36'),
(966, 18, 5, 6, 'Wednesday', 16, '09:05 PM', '09:05 PM', 4, '2020-04-08 09:05:36', '2020-04-08 09:05:36'),
(967, 18, 5, 7, 'Wednesday', 16, '09:05 PM', '09:05 PM', 5, '2020-04-08 09:05:36', '2020-04-08 09:05:36'),
(968, 18, 5, 5, 'Wednesday', 16, '09:05 PM', '09:05 PM', 4, '2020-04-08 09:05:36', '2020-04-08 09:05:36'),
(972, 18, 5, 1, 'Monday', 9, '12:42 AM', '12:42 AM', 3, '2020-04-08 09:06:44', '2020-04-08 09:06:44'),
(973, 18, 5, 3, 'Monday', 9, '09:04 PM', '06:04 PM', 3, '2020-04-08 09:06:44', '2020-04-08 09:06:44'),
(974, 18, 5, 4, 'Monday', 16, '09:06 PM', '09:06 PM', 3, '2020-04-08 09:06:44', '2020-04-08 09:06:44'),
(975, 18, 5, 6, 'Monday', 16, '09:06 PM', '09:06 PM', 4, '2020-04-08 09:06:44', '2020-04-08 09:06:44'),
(976, 18, 5, 7, 'Monday', 16, '09:06 PM', '09:06 PM', 1, '2020-04-08 09:06:44', '2020-04-08 09:06:44'),
(977, 18, 5, 5, 'Monday', 16, '09:06 PM', '09:06 PM', 3, '2020-04-08 09:06:45', '2020-04-08 09:06:45'),
(1170, 18, 6, 1, 'Monday', 16, '12:41 AM', '12:41 AM', 1, '2020-04-20 10:38:27', '2020-04-20 10:38:27'),
(1171, 18, 6, 3, 'Monday', 9, '10:38 PM', '10:38 PM', 3, '2020-04-20 10:38:27', '2020-04-20 10:38:27'),
(1172, 18, 6, 1, 'Tuesday', 9, '10:38 PM', '10:38 PM', 2, '2020-04-20 10:39:02', '2020-04-20 10:39:02'),
(1173, 18, 6, 1, 'Tuesday', 9, '10:38 PM', '09:40 PM', 2, '2020-04-20 10:39:02', '2020-04-20 10:39:02'),
(1204, 15, 6, 1, 'Sunday', 9, '12:28 AM', '12:28 AM', 5, '2020-04-22 10:56:36', '2020-04-22 10:56:36'),
(1205, 15, 6, 3, 'Sunday', 16, '12:28 AM', '12:28 AM', 6, '2020-04-22 10:56:36', '2020-04-22 10:56:36'),
(1206, 15, 6, 4, 'Sunday', 16, '12:28 AM', '12:28 AM', 7, '2020-04-22 10:56:36', '2020-04-22 10:56:36'),
(1207, 15, 6, 5, 'Sunday', 9, '12:28 AM', '12:28 AM', 8, '2020-04-22 10:56:36', '2020-04-22 10:56:36'),
(1208, 15, 6, 6, 'Sunday', 9, '12:28 AM', '12:28 AM', 9, '2020-04-22 10:56:36', '2020-04-22 10:56:36'),
(1209, 15, 6, 7, 'Sunday', 9, '12:28 AM', '12:28 AM', 10, '2020-04-22 10:56:36', '2020-04-22 10:56:36'),
(1214, 16, 8, 1, 'Monday', 9, '04:41 AM', '04:41 AM', 2, '2020-04-26 01:36:37', '2020-04-26 01:36:37'),
(1215, 16, 8, 1, 'Monday', 9, '04:41 AM', '04:41 AM', 3, '2020-04-26 01:36:37', '2020-04-26 01:36:37'),
(1216, 16, 8, 1, 'Monday', 9, '04:41 AM', '04:41 AM', 4, '2020-04-26 01:36:37', '2020-04-26 01:36:37'),
(1217, 16, 8, 6, 'Monday', 9, '01:36 PM', '01:36 PM', 5, '2020-04-26 01:36:37', '2020-04-26 01:36:37'),
(1219, 16, 8, 7, 'Thursday', 9, '01:37 PM', '01:37 PM', 6, '2020-04-26 01:37:20', '2020-04-26 01:37:20'),
(1220, 16, 8, 5, 'Thursday', 9, '01:37 PM', '01:37 PM', 4, '2020-04-26 01:37:21', '2020-04-26 01:37:21'),
(1234, 16, 8, 7, 'Tuesday', 9, '01:37 PM', '01:37 PM', 4, '2020-04-26 01:38:41', '2020-04-26 01:38:41'),
(1235, 16, 8, 6, 'Tuesday', 16, '01:38 PM', '01:38 PM', 4, '2020-04-26 01:38:41', '2020-04-26 01:38:41'),
(1236, 16, 8, 6, 'Tuesday', 9, '01:38 PM', '01:38 PM', 4, '2020-04-26 01:38:41', '2020-04-26 01:38:41'),
(1237, 16, 8, 4, 'Tuesday', 16, '01:38 PM', '01:38 PM', 4, '2020-04-26 01:38:41', '2020-04-26 01:38:41'),
(1238, 16, 8, 7, 'Tuesday', 9, '01:38 PM', '01:38 PM', 6, '2020-04-26 01:38:41', '2020-04-26 01:38:41'),
(1239, 16, 8, 5, 'Tuesday', 9, '01:38 PM', '01:38 PM', 5, '2020-04-26 01:38:41', '2020-04-26 01:38:41'),
(1240, 16, 8, 7, 'Wednesday', 9, '01:38 PM', '01:38 PM', 3, '2020-04-26 01:38:49', '2020-04-26 01:38:49'),
(1247, 16, 5, 1, 'Wednesday', 9, '12:12 PM', '01:00 PM', 3, '2020-04-27 11:47:10', '2020-04-27 11:47:10'),
(1248, 16, 5, 3, 'Wednesday', 16, '12:13 PM', '12:30 PM', 4, '2020-04-27 11:47:11', '2020-04-27 11:47:11'),
(1249, 16, 5, 4, 'Wednesday', 17, '12:30 PM', '01:13 PM', 5, '2020-04-27 11:47:11', '2020-04-27 11:47:11'),
(1250, 16, 5, 5, 'Wednesday', 16, '01:14 AM', '01:53 AM', 8, '2020-04-27 11:47:11', '2020-04-27 11:47:11'),
(1251, 16, 5, 6, 'Wednesday', 17, '12:15 AM', '12:15 AM', 5, '2020-04-27 11:47:11', '2020-04-27 11:47:11'),
(1252, 16, 5, 7, 'Wednesday', 16, '11:47 PM', '11:47 PM', 4, '2020-04-27 11:47:11', '2020-04-27 11:47:11'),
(1277, 16, 5, 1, 'Sunday', 9, '11:47 PM', '11:47 PM', 1, '2020-04-27 11:48:25', '2020-04-27 11:48:25'),
(1278, 16, 5, 3, 'Sunday', 16, '11:47 PM', '11:47 PM', 4, '2020-04-27 11:48:25', '2020-04-27 11:48:25'),
(1279, 16, 5, 4, 'Sunday', 17, '11:48 PM', '11:48 PM', 5, '2020-04-27 11:48:25', '2020-04-27 11:48:25'),
(1280, 16, 5, 5, 'Sunday', 17, '11:48 PM', '11:48 PM', 6, '2020-04-27 11:48:25', '2020-04-27 11:48:25'),
(1281, 16, 5, 6, 'Sunday', 16, '11:48 PM', '11:48 PM', 7, '2020-04-27 11:48:25', '2020-04-27 11:48:25'),
(1282, 16, 5, 7, 'Sunday', 17, '01:44 AM', '11:48 PM', 8, '2020-04-27 11:48:25', '2020-04-27 11:48:25'),
(1340, 15, 5, 1, 'Wednesday', 9, '12:26 AM', '12:26 AM', 1, '2020-04-28 14:40:50', '2020-04-28 14:40:50'),
(1341, 15, 5, 3, 'Wednesday', 16, '12:26 AM', '12:26 AM', 2, '2020-04-28 14:40:50', '2020-04-28 14:40:50'),
(1342, 15, 5, 4, 'Wednesday', 16, '12:26 AM', '04:39 AM', 3, '2020-04-28 14:40:50', '2020-04-28 14:40:50'),
(1343, 15, 5, 5, 'Wednesday', 16, '12:26 AM', '04:39 AM', 4, '2020-04-28 14:40:50', '2020-04-28 14:40:50'),
(1344, 15, 5, 6, 'Wednesday', 16, '12:22 AM', '04:39 AM', 4, '2020-04-28 14:40:50', '2020-04-28 14:40:50'),
(1345, 15, 5, 1, 'Thursday', 9, '12:26 AM', '12:26 AM', 2, '2020-04-28 14:40:53', '2020-04-28 14:40:53'),
(1346, 15, 5, 3, 'Thursday', 16, '12:26 AM', '12:26 AM', 3, '2020-04-28 14:40:53', '2020-04-28 14:40:53'),
(1347, 15, 5, 4, 'Thursday', 17, '12:26 AM', '12:26 AM', 4, '2020-04-28 14:40:53', '2020-04-28 14:40:53'),
(1348, 15, 5, 5, 'Thursday', 17, '12:26 AM', '12:26 AM', 5, '2020-04-28 14:40:53', '2020-04-28 14:40:53'),
(1349, 15, 5, 6, 'Thursday', 16, '12:26 AM', '12:26 AM', 6, '2020-04-28 14:40:53', '2020-04-28 14:40:53'),
(1362, 15, 5, 1, 'Sunday', 9, '12:27 AM', '12:27 AM', 1, '2020-04-28 14:41:25', '2020-04-28 14:41:25'),
(1363, 15, 5, 3, 'Sunday', 16, '12:27 AM', '12:27 AM', 2, '2020-04-28 14:41:25', '2020-04-28 14:41:25'),
(1364, 15, 5, 4, 'Sunday', 17, '12:27 AM', '12:27 AM', 4, '2020-04-28 14:41:25', '2020-04-28 14:41:25'),
(1365, 15, 5, 5, 'Sunday', 16, '12:27 AM', '12:27 AM', 1, '2020-04-28 14:41:25', '2020-04-28 14:41:25'),
(1366, 15, 5, 6, 'Sunday', 16, '12:27 AM', '12:27 AM', 2, '2020-04-28 14:41:25', '2020-04-28 14:41:25'),
(1367, 19, 5, 7, 'Monday', 9, '03:52 AM', '03:52 AM', 3, '2020-04-28 15:53:09', '2020-04-28 15:53:09'),
(1368, 19, 5, 7, 'Monday', 9, '03:52 AM', '03:52 AM', 3, '2020-04-28 15:53:09', '2020-04-28 15:53:09'),
(1369, 19, 5, 7, 'Monday', 9, '03:53 AM', '03:53 AM', 4, '2020-04-28 15:53:09', '2020-04-28 15:53:09'),
(1385, 15, 5, 3, 'Tuesday', 9, '12:25 AM', '12:25 AM', 2, '2020-05-05 15:54:14', '2020-05-05 15:54:14'),
(1386, 15, 5, 1, 'Tuesday', 16, '12:25 AM', '12:25 AM', 3, '2020-05-05 15:54:14', '2020-05-05 15:54:14'),
(1387, 15, 5, 4, 'Tuesday', 17, '12:25 AM', '12:25 AM', 2, '2020-05-05 15:54:14', '2020-05-05 15:54:14'),
(1388, 15, 5, 4, 'Tuesday', 16, '12:25 AM', '12:25 AM', 2, '2020-05-05 15:54:14', '2020-05-05 15:54:14'),
(1389, 15, 5, 6, 'Tuesday', 9, '12:25 AM', '12:25 AM', 2, '2020-05-05 15:54:14', '2020-05-05 15:54:14'),
(1390, 20, 5, 4, 'Monday', 9, '10:25 PM', '10:25 PM', 1, '2020-05-14 10:25:53', '2020-05-14 10:25:53'),
(1391, 20, 5, 6, 'Monday', 9, '10:25 PM', '10:25 PM', 3, '2020-05-14 10:25:53', '2020-05-14 10:25:53'),
(1392, 20, 5, 7, 'Monday', 9, '10:25 PM', '10:25 PM', 3, '2020-05-14 10:25:53', '2020-05-14 10:25:53'),
(1393, 20, 5, 3, 'Monday', 9, '10:25 PM', '10:25 PM', 3, '2020-05-14 10:25:53', '2020-05-14 10:25:53'),
(1394, 20, 5, 5, 'Monday', 9, '10:25 PM', '10:25 PM', 3, '2020-05-14 10:25:53', '2020-05-14 10:25:53'),
(1395, 20, 5, 1, 'Monday', 16, '10:25 PM', '10:25 PM', 4, '2020-05-14 10:25:53', '2020-05-14 10:25:53'),
(1397, 20, 5, 6, 'Tuesday', 9, '10:25 PM', '10:26 PM', 3, '2020-05-14 10:26:49', '2020-05-14 10:26:49'),
(1398, 20, 5, 7, 'Tuesday', 9, '10:26 PM', '10:26 PM', 2, '2020-05-14 10:26:49', '2020-05-14 10:26:49'),
(1399, 20, 5, 3, 'Tuesday', 16, '10:26 PM', '10:26 PM', 4, '2020-05-14 10:26:49', '2020-05-14 10:26:49'),
(1400, 20, 5, 1, 'Tuesday', 16, '10:26 PM', '10:26 PM', 4, '2020-05-14 10:26:49', '2020-05-14 10:26:49'),
(1401, 20, 5, 4, 'Tuesday', 16, '10:26 PM', '10:26 PM', 4, '2020-05-14 10:26:49', '2020-05-14 10:26:49'),
(1402, 20, 5, 5, 'Tuesday', 9, '10:26 PM', '10:26 PM', 3, '2020-05-14 10:26:49', '2020-05-14 10:26:49'),
(1403, 20, 5, 4, 'Wednesday', 9, '10:26 PM', '10:26 PM', 978, '2020-05-14 10:27:45', '2020-05-14 10:27:45'),
(1404, 20, 5, 7, 'Wednesday', 17, '10:27 PM', '10:27 PM', 836, '2020-05-14 10:27:45', '2020-05-14 10:27:45'),
(1405, 20, 5, 6, 'Wednesday', 17, '10:27 PM', '10:27 PM', 993, '2020-05-14 10:27:45', '2020-05-14 10:27:45'),
(1406, 20, 5, 7, 'Wednesday', 17, '10:27 PM', '10:27 PM', 127, '2020-05-14 10:27:45', '2020-05-14 10:27:45'),
(1407, 20, 5, 3, 'Wednesday', 17, '10:27 PM', '10:27 PM', 641, '2020-05-14 10:27:46', '2020-05-14 10:27:46'),
(1408, 20, 5, 3, 'Wednesday', 9, '10:27 PM', '10:27 PM', 142, '2020-05-14 10:27:46', '2020-05-14 10:27:46'),
(1414, 25, 5, 1, 'Monday', 9, '12:54 AM', '12:54 AM', 3, '2020-05-16 12:55:11', '2020-05-16 12:55:11'),
(1415, 25, 5, 3, 'Monday', 9, '12:54 AM', '12:54 AM', 4, '2020-05-16 12:55:11', '2020-05-16 12:55:11'),
(1416, 25, 5, 4, 'Monday', 9, '12:54 AM', '12:54 AM', 3, '2020-05-16 12:55:11', '2020-05-16 12:55:11'),
(1417, 25, 5, 5, 'Monday', 9, '12:54 AM', '12:54 AM', 3, '2020-05-16 12:55:11', '2020-05-16 12:55:11'),
(1418, 25, 5, 6, 'Monday', 17, '12:54 AM', '12:54 AM', 4, '2020-05-16 12:55:11', '2020-05-16 12:55:11'),
(1419, 25, 5, 8, 'Monday', 9, '12:55 AM', '12:55 AM', 4, '2020-05-16 12:55:11', '2020-05-16 12:55:11'),
(1429, 25, 5, 3, 'Wednesday', 9, '12:56 AM', '12:56 AM', 3, '2020-05-16 12:57:24', '2020-05-16 12:57:24'),
(1430, 25, 5, 3, 'Wednesday', 9, '12:56 AM', '12:56 AM', 4, '2020-05-16 12:57:24', '2020-05-16 12:57:24'),
(1431, 25, 5, 5, 'Wednesday', 9, '12:57 AM', '12:57 AM', 3, '2020-05-16 12:57:24', '2020-05-16 12:57:24'),
(1444, 25, 5, 8, 'Tuesday', 9, '12:57 AM', '12:55 AM', 4, '2020-05-16 12:57:49', '2020-05-16 12:57:49'),
(1445, 25, 5, 5, 'Tuesday', 9, '12:55 AM', '12:55 AM', 3, '2020-05-16 12:57:49', '2020-05-16 12:57:49'),
(1446, 25, 5, 6, 'Tuesday', 16, '12:55 AM', '12:55 AM', 5, '2020-05-16 12:57:49', '2020-05-16 12:57:49'),
(1447, 25, 5, 8, 'Tuesday', 16, '12:55 AM', '12:55 AM', 6, '2020-05-16 12:57:49', '2020-05-16 12:57:49'),
(1448, 25, 5, 6, 'Tuesday', 9, '12:55 AM', '12:55 AM', 4, '2020-05-16 12:57:49', '2020-05-16 12:57:49'),
(1449, 25, 5, 5, 'Tuesday', 16, '12:56 AM', '12:54 AM', 4, '2020-05-16 12:57:49', '2020-05-16 12:57:49'),
(1450, 25, 5, 1, 'Sunday', 9, '12:57 AM', '12:57 AM', 4, '2020-05-16 12:57:57', '2020-05-16 12:57:57'),
(1454, 26, 5, 9, 'Monday', 16, '12:34 PM', '12:35 PM', 5, '2020-05-17 00:35:53', '2020-05-17 00:35:53'),
(1455, 26, 5, 8, 'Monday', 9, '12:35 PM', '12:35 PM', 4, '2020-05-17 00:35:53', '2020-05-17 00:35:53'),
(1456, 26, 5, 7, 'Monday', 16, '12:35 PM', '12:35 PM', 5, '2020-05-17 00:35:53', '2020-05-17 00:35:53'),
(1457, 26, 5, 6, 'Monday', 16, '12:35 PM', '12:35 PM', 5, '2020-05-17 00:35:53', '2020-05-17 00:35:53'),
(1458, 26, 5, 4, 'Monday', 16, '12:35 PM', '12:35 PM', 5, '2020-05-17 00:35:53', '2020-05-17 00:35:53'),
(1459, 26, 5, 9, 'Tuesday', 9, '12:35 PM', '12:35 PM', 6, '2020-05-17 00:36:39', '2020-05-17 00:36:39'),
(1460, 26, 5, 8, 'Tuesday', 9, '12:36 PM', '12:36 PM', 5, '2020-05-17 00:36:39', '2020-05-17 00:36:39'),
(1461, 26, 5, 7, 'Tuesday', 16, '12:36 PM', '12:36 PM', 4, '2020-05-17 00:36:39', '2020-05-17 00:36:39'),
(1462, 26, 5, 3, 'Tuesday', 16, '12:36 PM', '12:36 PM', 3, '2020-05-17 00:36:39', '2020-05-17 00:36:39'),
(1463, 26, 5, 4, 'Tuesday', 9, '12:36 PM', '12:36 PM', 4, '2020-05-17 00:36:39', '2020-05-17 00:36:39'),
(1464, 26, 5, 9, 'Wednesday', 9, '12:36 PM', '12:36 PM', 3, '2020-05-17 00:37:05', '2020-05-17 00:37:05'),
(1465, 26, 5, 7, 'Wednesday', 9, '12:36 PM', '12:36 PM', 3, '2020-05-17 00:37:05', '2020-05-17 00:37:05'),
(1466, 26, 5, 3, 'Wednesday', 9, '12:37 PM', '12:37 PM', 2, '2020-05-17 00:37:05', '2020-05-17 00:37:05'),
(1472, 26, 5, 9, 'Thursday', 9, '12:37 PM', '12:37 PM', 2, '2020-05-17 00:38:05', '2020-05-17 00:38:05'),
(1473, 26, 5, 7, 'Thursday', 9, '12:38 PM', '12:38 PM', 4, '2020-05-17 00:38:05', '2020-05-17 00:38:05'),
(1494, 15, 5, 1, 'Saturday', 9, '12:26 AM', '12:26 AM', 1, '2020-05-25 11:57:35', '2020-05-25 11:57:35'),
(1495, 15, 5, 3, 'Saturday', 16, '12:26 AM', '12:26 AM', 1, '2020-05-25 11:57:35', '2020-05-25 11:57:35'),
(1496, 15, 5, 4, 'Saturday', 16, '12:26 AM', '12:26 AM', 1, '2020-05-25 11:57:35', '2020-05-25 11:57:35'),
(1497, 15, 5, 5, 'Saturday', 17, '12:26 AM', '12:26 AM', 1, '2020-05-25 11:57:35', '2020-05-25 11:57:35'),
(1498, 15, 5, 6, 'Saturday', 9, '12:26 AM', '12:26 AM', 1, '2020-05-25 11:57:35', '2020-05-25 11:57:35'),
(1514, 15, 5, 1, 'Monday', 17, '12:25 AM', '12:26 AM', 4, '2020-06-14 14:24:41', '2020-06-14 14:24:41'),
(1515, 15, 5, 3, 'Monday', 9, '12:26 AM', '12:26 AM', 5, '2020-06-14 14:24:41', '2020-06-14 14:24:41'),
(1516, 15, 5, 5, 'Monday', 16, '12:26 AM', '12:26 AM', 10, '2020-06-14 14:24:41', '2020-06-14 14:24:41'),
(1517, 15, 5, 4, 'Monday', 16, '12:26 AM', '12:26 AM', 6, '2020-06-14 14:24:41', '2020-06-14 14:24:41'),
(1518, 15, 5, 9, 'Monday', 16, '12:37 PM', '10:37 PM', 5, '2020-06-14 14:24:41', '2020-06-14 14:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_details` text COLLATE utf8mb4_unicode_ci,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0',
  `is_replied` tinyint(1) NOT NULL DEFAULT '0',
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `name`, `email`, `user_id`, `user_details`, `is_seen`, `is_replied`, `subject`, `body`, `attachment`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Shahin', 'ermhroy@gmail.com', NULL, '', 1, 0, 'Test mail Subject', 'Test mail body', NULL, 1, 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-05-26 09:10:03', '2020-04-30 23:08:16', '2020-05-26 03:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `current_day_attendances`
--

CREATE TABLE `current_day_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `current_day_attendances`
--

INSERT INTO `current_day_attendances` (`id`, `class_id`, `section_id`, `student_id`, `month`, `year`, `date`, `attendance_status`, `note`, `created_at`, `updated_at`) VALUES
(90, 15, 5, 13, 'May', '2020', '17-05-2020', 'present', NULL, '2020-05-17 06:52:10', '2020-05-17 06:52:10'),
(91, 15, 5, 14, 'May', '2020', '17-05-2020', 'absent', NULL, '2020-05-17 06:52:10', '2020-05-19 00:25:11'),
(92, 15, 5, 15, 'May', '2020', '17-05-2020', 'present', NULL, '2020-05-17 06:52:10', '2020-05-17 06:52:10'),
(93, 15, 5, 13, 'May', '2020', '24-05-2020', 'present', 'Good student', '2020-05-24 10:32:35', '2020-05-24 05:08:48'),
(94, 15, 5, 14, 'May', '2020', '24-05-2020', 'present', 'Good student', '2020-05-24 10:32:41', '2020-05-24 05:08:55'),
(95, 15, 5, 15, 'May', '2020', '24-05-2020', 'present', 'Good student edited', '2020-05-24 10:32:41', '2020-05-24 05:12:13'),
(96, 15, 5, 13, 'May', '2020', '25-05-2020', 'present', NULL, '2020-05-24 20:05:44', '2020-05-29 13:37:56'),
(97, 15, 5, 14, 'May', '2020', '25-05-2020', 'present', NULL, '2020-05-24 20:05:44', '2020-05-24 20:05:44'),
(98, 15, 5, 15, 'May', '2020', '25-05-2020', 'present', NULL, '2020-05-24 20:05:45', '2020-05-24 20:05:45'),
(99, 15, 5, 13, 'May', '2020', '31-05-2020', 'absent', NULL, '2020-05-30 20:11:24', '2020-05-30 20:11:24'),
(100, 15, 5, 14, 'May', '2020', '31-05-2020', 'absent', NULL, '2020-05-30 20:11:24', '2020-05-30 20:11:24'),
(101, 15, 5, 15, 'May', '2020', '31-05-2020', 'present', NULL, '2020-05-30 20:11:24', '2020-05-30 20:11:24'),
(102, 15, 5, 13, 'June', '2020', '05-06-2020', 'present', NULL, '2020-06-05 15:53:04', '2020-06-05 15:53:04'),
(103, 15, 5, 14, 'June', '2020', '05-06-2020', 'absent', NULL, '2020-06-05 15:53:05', '2020-06-05 09:53:28'),
(104, 15, 5, 15, 'June', '2020', '05-06-2020', 'present', NULL, '2020-06-05 15:53:05', '2020-06-05 15:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `deleted_by`, `deleted_at`, `deleted_status`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', 1, NULL, NULL, NULL, '2020-04-05 12:53:51', '2020-04-08 10:38:39'),
(2, 'Stacey Wood', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:08', '1', '2020-04-05 13:15:29', '2020-04-06 10:02:08'),
(3, 'Abel George', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:12', '1', '2020-04-05 13:15:33', '2020-04-06 10:02:12'),
(4, 'Jena Franks', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:15', '1', '2020-04-05 13:15:40', '2020-04-06 10:02:15'),
(5, 'Yoshio Nixon', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:18', '1', '2020-04-05 13:15:42', '2020-04-06 10:02:18'),
(6, 'Orli Marquez', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:21', '1', '2020-04-05 13:15:48', '2020-04-06 10:02:21'),
(7, 'Maggie Jarvis', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:23', '1', '2020-04-05 13:15:54', '2020-04-06 10:02:23'),
(8, 'Bethany Pacheco', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:26', '1', '2020-04-05 13:15:58', '2020-04-06 10:02:26'),
(9, 'Stewart Carr', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:29', '1', '2020-04-05 13:16:03', '2020-04-06 10:02:29'),
(10, 'Lillian Britt', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:03', '1', '2020-04-05 13:16:14', '2020-04-06 10:02:03'),
(11, 'Boris Conrad', 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-06 16:02:31', '1', '2020-04-05 13:16:20', '2020-04-06 10:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `designation_known_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `status`, `designation_known_id`, `created_at`, `updated_at`) VALUES
(10, 'Teacher', 1, 1, NULL, NULL),
(11, 'Asst. Teacher', 1, 2, NULL, NULL),
(12, 'Principal', 1, 3, NULL, NULL),
(13, 'Libraian', 1, 4, NULL, NULL),
(14, 'Accountant', 1, 5, NULL, NULL),
(15, 'Another Staf', 1, 6, NULL, NULL),
(16, 'Driver', 1, 7, NULL, NULL),
(17, 'clerk', 1, 8, NULL, NULL),
(18, 'Security Guard', 1, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_known_id` bigint(20) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `role_known_id`, `date`, `year`, `month`, `note`, `attendance_status`, `created_at`, `updated_at`) VALUES
(23, 10, 2, '09-06-2020', '2020', 'June', NULL, 'late', '2020-06-08 19:43:40', '2020-06-09 17:31:00'),
(24, 9, 3, '09-06-2020', '2020', 'June', NULL, 'half_day', '2020-06-08 20:03:50', '2020-06-08 20:04:07'),
(25, 16, 3, '09-06-2020', '2020', 'June', NULL, 'present', '2020-06-08 20:03:50', '2020-06-08 20:03:50'),
(26, 17, 3, '09-06-2020', '2020', 'June', NULL, 'present', '2020-06-08 20:03:50', '2020-06-08 20:03:50'),
(27, 11, 4, '09-06-2020', '2020', 'June', NULL, 'half_day', '2020-06-09 17:29:09', '2020-06-09 17:29:14'),
(28, 12, 5, '09-06-2020', '2020', 'June', NULL, 'present', '2020-06-09 17:32:38', '2020-06-09 17:32:54'),
(29, 10, 2, '11-06-2020', '2020', 'June', NULL, 'absent', '2020-06-11 15:11:38', '2020-06-11 15:11:47'),
(30, 9, 3, '11-06-2020', '2020', 'June', NULL, 'present', '2020-06-11 15:12:00', '2020-06-11 15:12:00'),
(31, 16, 3, '11-06-2020', '2020', 'June', NULL, 'present', '2020-06-11 15:12:00', '2020-06-11 15:12:00'),
(32, 17, 3, '11-06-2020', '2020', 'June', NULL, 'present', '2020-06-11 15:12:00', '2020-06-11 15:12:00'),
(33, 9, 3, '12-06-2020', '2020', 'June', NULL, 'present', '2020-06-11 21:10:09', '2020-06-11 21:10:09'),
(34, 16, 3, '12-06-2020', '2020', 'June', NULL, 'present', '2020-06-11 21:10:09', '2020-06-11 21:10:09'),
(35, 17, 3, '12-06-2020', '2020', 'June', NULL, 'present', '2020-06-11 21:10:09', '2020-06-11 21:10:09'),
(36, 9, 3, '15-06-2020', '2020', 'June', NULL, 'present', '2020-06-14 20:19:27', '2020-06-14 20:19:27'),
(37, 16, 3, '15-06-2020', '2020', 'June', NULL, 'present', '2020-06-14 20:19:27', '2020-06-15 09:35:15'),
(38, 17, 3, '15-06-2020', '2020', 'June', NULL, 'present', '2020-06-14 20:19:27', '2020-06-14 20:19:27'),
(39, 9, 3, '16-06-2020', '2020', 'June', NULL, 'late', '2020-06-15 09:35:31', '2020-06-15 09:35:31'),
(40, 16, 3, '16-06-2020', '2020', 'June', NULL, 'absent', '2020-06-15 09:35:31', '2020-06-15 09:35:31'),
(41, 17, 3, '16-06-2020', '2020', 'June', NULL, 'late', '2020-06-15 09:35:31', '2020-06-15 09:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_salary` decimal(10,2) DEFAULT NULL,
  `payable` decimal(8,2) DEFAULT NULL,
  `due` decimal(8,2) DEFAULT NULL,
  `total_paid` decimal(8,2) DEFAULT NULL,
  `pay_mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `earns` mediumtext COLLATE utf8mb4_unicode_ci,
  `total_earn` decimal(8,2) DEFAULT NULL,
  `earn_types` text COLLATE utf8mb4_unicode_ci,
  `deduction_types` text COLLATE utf8mb4_unicode_ci,
  `deductions` mediumtext COLLATE utf8mb4_unicode_ci,
  `total_deduction` decimal(8,2) DEFAULT NULL,
  `vat` bigint(20) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_advance_salary` tinyint(1) NOT NULL DEFAULT '0',
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salaries`
--

INSERT INTO `employee_salaries` (`id`, `employee_id`, `invoice_no`, `basic_salary`, `payable`, `due`, `total_paid`, `pay_mode`, `earns`, `total_earn`, `earn_types`, `deduction_types`, `deductions`, `total_deduction`, `vat`, `is_paid`, `is_advance_salary`, `date`, `month`, `year`, `note`, `created_at`, `updated_at`) VALUES
(26, 9, 'ES12062027', '10000.00', '11300.00', '0.00', '11300.00', NULL, '[{\"Home rant\":\"1000\"},{\"Medical\":\"1500\"},{\"Mobile bill\":\"750\"}]', '3250.00', '[\"Home rant\",\"Medical\",\"Mobile bill\"]', '[\"Future fund\"]', '[{\"Future fund\":\"1500\"}]', '1500.00', 450, 1, 0, '12-06-2020', 'June', '2020', 'Salary is paid of last month.', '2020-06-12 17:28:36', '2020-06-12 17:29:13'),
(27, 16, 'ES12062028', '10000.00', '10000.00', '0.00', '10000.00', NULL, NULL, '0.00', NULL, NULL, NULL, '0.00', 0, 1, 0, '13-06-2020', 'June', '2020', NULL, '2020-06-12 18:57:50', '2020-06-12 18:57:57'),
(28, 17, 'ES12062029', '10000.00', '9800.00', '0.00', '9800.00', NULL, '[{\"Home rant\":0}]', '0.00', '[\"Home rant\"]', '[\"Future fund\"]', '[{\"Future fund\":\"0\"}]', '0.00', 200, 1, 0, '13-06-2020', 'June', '2020', NULL, '2020-06-12 19:07:12', '2020-06-12 19:07:43'),
(29, 12, 'ES13062030', '10000.00', '9343.00', '0.00', '9343.00', NULL, '[{\"Home rant\":\"200.2\"},{\"Mobile bill\":\"700\"}]', '900.20', '[\"Home rant\",\"Mobile bill\"]', '[\"Future fund\",\"Insurance\"]', '[{\"Future fund\":\"1500.2\"},{\"Insurance\":\"50\"}]', '1550.20', 7, 1, 0, '13-06-2020', 'June', '2020', NULL, '2020-06-13 06:55:41', '2020-06-13 06:56:33'),
(30, 14, 'ES13062031', '10000.00', '10900.00', '0.00', '10900.00', NULL, '[{\"Home rant\":\"1000\"}]', '1000.00', '[\"Home rant\"]', NULL, NULL, '0.00', 100, 1, 0, '13-06-2020', 'June', '2020', NULL, '2020-06-13 11:57:05', '2020-06-13 11:57:21'),
(31, 17, NULL, '10000.00', '15000.00', NULL, NULL, NULL, '[{\"Home rant\":\"7000\"}]', '7000.00', '[\"Home rant\"]', '[\"Future fund\"]', '[{\"Future fund\":\"2000\"}]', '2000.00', 0, 0, 0, NULL, 'May', '2020', NULL, '2020-06-14 20:14:56', '2020-06-14 20:14:56'),
(32, 11, 'ES15062033', '10000.00', '12700.00', '0.00', '12700.00', NULL, '[{\"Home rant\":\"2500\"},{\"Mobile bill\":\"750\"}]', '3250.00', '[\"Home rant\",\"Mobile bill\"]', '[\"Future fund\"]', '[{\"Future fund\":\"550\"}]', '550.00', 0, 1, 0, '15-06-2020', 'June', '2020', NULL, '2020-06-15 11:29:01', '2020-06-15 11:29:24'),
(33, 18, NULL, '10000.00', '10000.00', NULL, NULL, NULL, NULL, '0.00', NULL, NULL, NULL, '0.00', 0, 0, 0, NULL, 'June', '2020', NULL, '2020-06-16 08:03:51', '2020-06-16 08:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_term_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ending_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` bigint(20) UNSIGNED DEFAULT NULL,
  `distributions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `exam_term_id`, `type`, `year`, `starting_date`, `ending_date`, `session_id`, `distributions`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1st Term Exam 2020', 1, 'Marks And Grade', '2020', '04/16/2020', '04/30/2020', 1, '[\"Written\",\"Practical\",\"Viva\"]', 1, NULL, NULL, NULL, '2020-04-15 14:56:57', '2020-05-30 09:15:36'),
(2, '2nd Term Exam 2020', 2, 'Marks', '2020', '04/15/2020', '04/21/2020', 1, '[\"Written\",\"MCQ\"]', 1, NULL, NULL, NULL, '2020-04-15 15:12:40', '2020-05-30 09:15:45'),
(3, 'Final Exam 2020', NULL, 'Grade(GPA)', '2020', '30-05-2020', '30-06-2020', 1, '[\"Written\",\"Practical\",\"Viva\"]', 1, NULL, NULL, NULL, '2020-05-14 00:53:49', '2020-05-14 00:54:17'),
(4, 'Final Exam  2020', 2, 'Marks And Grade', '2020', '02-05-2020', '08-05-2020', 1, '[\"Written\",\"Practical\",\"Attendance\"]', 1, 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-05-30 14:54:45', '2020-05-14 10:07:33', '2020-05-30 08:54:45'),
(5, 'School model test', 1, 'Marks And Grade', '2020', '01-05-2020', '30-05-2020', 1, '[\"Written\",\"Practical\",\"Attendance\"]', 1, NULL, NULL, NULL, '2020-05-16 13:00:26', '2020-05-30 08:46:45'),
(6, 'Final Exam', 3, 'Marks And Grade', '2020', '01-05-2020', '30-05-2020', 1, '[\"Written\",\"Practical\",\"MCQ\"]', 1, 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-05-30 15:02:20', '2020-05-17 00:40:26', '2020-05-30 09:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attendances`
--

CREATE TABLE `exam_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_attendances`
--

INSERT INTO `exam_attendances` (`id`, `class_id`, `section_id`, `student_id`, `exam_id`, `subject_id`, `date`, `month`, `year`, `attendance_status`, `note`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(70, 15, 5, 13, 1, 9, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:09', '2020-05-29 11:37:09'),
(71, 15, 5, 14, 1, 9, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:09', '2020-05-29 11:37:09'),
(72, 15, 5, 15, 1, 9, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:09', '2020-05-29 11:37:09'),
(73, 15, 5, 13, 1, 7, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:16', '2020-05-29 11:37:16'),
(74, 15, 5, 14, 1, 7, '29-05-2020', 'May', '2020', 'absent', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:16', '2020-05-29 11:37:16'),
(75, 15, 5, 15, 1, 7, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:16', '2020-05-29 11:37:16'),
(76, 15, 5, 13, 1, 6, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:22', '2020-05-29 11:37:22'),
(77, 15, 5, 14, 1, 6, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:22', '2020-05-29 11:37:22'),
(78, 15, 5, 15, 1, 6, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:22', '2020-05-29 11:37:22'),
(79, 15, 5, 13, 1, 5, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:27', '2020-05-29 11:37:27'),
(80, 15, 5, 14, 1, 5, '29-05-2020', 'May', '2020', 'absent', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:27', '2020-05-29 11:37:27'),
(81, 15, 5, 15, 1, 5, '29-05-2020', 'May', '2020', 'absent', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:27', '2020-05-29 11:37:27'),
(82, 15, 5, 13, 1, 4, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:33', '2020-05-29 11:37:33'),
(83, 15, 5, 14, 1, 4, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:33', '2020-05-29 11:37:33'),
(84, 15, 5, 15, 1, 4, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:33', '2020-05-29 11:37:33'),
(85, 15, 5, 13, 1, 3, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:41', '2020-05-29 11:37:41'),
(86, 15, 5, 14, 1, 3, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:41', '2020-05-29 11:37:41'),
(87, 15, 5, 15, 1, 3, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:41', '2020-05-29 11:37:41'),
(88, 15, 5, 13, 1, 1, '29-05-2020', 'May', '2020', 'absent', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:48', '2020-05-29 11:37:48'),
(89, 15, 5, 14, 1, 1, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:48', '2020-05-29 11:37:48'),
(90, 15, 5, 15, 1, 1, '29-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-29 11:37:49', '2020-05-29 11:37:49'),
(91, 15, 5, 13, 1, 9, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:03', '2020-05-31 17:40:03'),
(92, 15, 5, 14, 1, 9, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:03', '2020-05-31 17:40:03'),
(93, 15, 5, 15, 1, 9, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:03', '2020-05-31 17:40:03'),
(94, 15, 5, 13, 1, 7, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:16', '2020-05-31 17:40:16'),
(95, 15, 5, 14, 1, 7, '31-05-2020', 'May', '2020', 'absent', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:16', '2020-05-31 17:40:16'),
(96, 15, 5, 15, 1, 7, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:16', '2020-05-31 17:40:16'),
(97, 15, 5, 13, 1, 6, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:27', '2020-05-31 17:40:27'),
(98, 15, 5, 14, 1, 6, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:27', '2020-05-31 17:40:27'),
(99, 15, 5, 15, 1, 6, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:27', '2020-05-31 17:40:27'),
(100, 15, 5, 13, 1, 5, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:36', '2020-05-31 17:40:36'),
(101, 15, 5, 14, 1, 5, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:36', '2020-05-31 17:40:36'),
(102, 15, 5, 15, 1, 5, '31-05-2020', 'May', '2020', 'present', NULL, 1, NULL, NULL, NULL, '2020-05-31 17:40:36', '2020-05-31 17:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `exam_distributions`
--

CREATE TABLE `exam_distributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_distributions`
--

INSERT INTO `exam_distributions` (`id`, `name`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Written', 1, NULL, NULL, NULL, '2020-04-15 11:34:07', '2020-04-15 11:34:46'),
(2, 'School base assignment', 1, 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-16 21:23:19', '2020-04-15 11:35:06', '2020-04-16 15:23:19'),
(3, 'Practical', 1, NULL, NULL, NULL, '2020-04-15 11:35:31', '2020-04-15 11:35:31'),
(4, 'Attendance', 1, NULL, NULL, NULL, '2020-04-15 11:35:42', '2020-04-15 11:35:42'),
(5, 'Viva', 1, NULL, NULL, NULL, '2020-04-15 11:35:51', '2020-04-15 11:35:51'),
(6, 'MCQ', 1, NULL, NULL, NULL, '2020-04-15 11:36:27', '2020-04-17 07:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `exam_halls`
--

CREATE TABLE `exam_halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hall_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sit_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_halls`
--

INSERT INTO `exam_halls` (`id`, `hall_no`, `sit_qty`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '202', '50', 1, NULL, NULL, NULL, '2020-04-15 10:42:02', '2020-04-15 11:15:00'),
(2, '203', '20', 1, NULL, NULL, NULL, '2020-04-15 11:32:09', '2020-04-15 11:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedules`
--

CREATE TABLE `exam_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ending_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_hall_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_id` bigint(20) UNSIGNED DEFAULT NULL,
  `distributions` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_schedules`
--

INSERT INTO `exam_schedules` (`id`, `date`, `year`, `starting_time`, `ending_time`, `class_id`, `section_id`, `exam_hall_id`, `subject_id`, `exam_id`, `session_id`, `distributions`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1191, '01/04/20', '2020', '09:30 PM', '11:30 PM', 16, 5, 1, 1, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"13\"}}]', 1, NULL, NULL, NULL, '2020-04-18 09:31:55', '2020-04-18 16:09:51'),
(1192, '02/04/20', '2020', '09:30 PM', '09:30 PM', 16, 5, 1, 3, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"13\"}}]', 1, NULL, NULL, NULL, '2020-04-18 09:31:55', '2020-04-18 16:09:51'),
(1193, '03/04/20', '2020', '09:30 PM', '09:30 PM', 16, 5, 1, 4, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-04-18 09:31:55', '2020-04-18 16:09:51'),
(1194, '04/04/20', '2020', '09:30 PM', '09:30 PM', 16, 5, 1, 5, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-04-18 09:31:55', '2020-04-18 16:09:51'),
(1195, '05/04/20', '2020', '09:30 PM', '09:30 PM', 16, 5, 2, 6, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-04-18 09:31:56', '2020-04-18 16:09:51'),
(1196, '06/04/20', '2020', '09:30 PM', '09:30 PM', 16, 5, 2, 7, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-04-18 09:31:56', '2020-04-18 16:09:51'),
(1613, '01.05.2020', '2020', '01:01 AM', '01:01 AM', 15, 6, 1, 7, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:03:11', '2020-05-16 13:03:11'),
(1614, '01.05.2020', '2020', '01:01 AM', '01:01 AM', 15, 6, 1, 6, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:03:11', '2020-05-16 13:03:11'),
(1615, '06.05.2020', '2020', '01:02 AM', '01:02 AM', 15, 6, 1, 5, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:03:11', '2020-05-16 13:03:11'),
(1616, '01.05.2020', '2020', '01:02 AM', '01:02 AM', 15, 6, 1, 4, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:03:11', '2020-05-16 13:03:11'),
(1617, '09.05.2020', '2020', '01:02 AM', '01:02 AM', 15, 6, 1, 3, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"13\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:03:11', '2020-05-16 13:03:11'),
(1618, '07.05.2020', '2020', '10:02 AM', '11:00 AM', 15, 6, 1, 1, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"13\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:03:11', '2020-05-16 13:03:11'),
(1627, '01/04/20', '2020', '09:33 PM', '09:33 PM', 16, 6, 1, 6, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:04:02', '2020-05-16 13:04:02'),
(1628, '02/04/20', '2020', '09:33 PM', '09:33 PM', 16, 6, 2, 5, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:04:02', '2020-05-16 13:04:02'),
(1629, '05/04/20', '2020', '09:33 PM', '09:33 PM', 16, 6, 2, 4, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:04:02', '2020-05-16 13:04:02'),
(1630, '09/04/20', '2020', '09:33 PM', '09:33 PM', 16, 6, 1, 1, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"13\"}}]', 1, NULL, NULL, NULL, '2020-05-16 13:04:02', '2020-05-16 13:04:02'),
(1631, '01.05.2020', '2020', '12:41 PM', '12:41 PM', 15, 5, 1, 9, 6, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"40\"}}]', 1, NULL, NULL, NULL, '2020-05-17 00:43:01', '2020-05-17 00:43:01'),
(1632, '01.05.2020', '2020', '12:41 PM', '12:41 PM', 15, 5, 1, 7, 6, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-05-17 00:43:01', '2020-05-17 00:43:01'),
(1633, '01.05.2020', '2020', '12:41 PM', '12:42 PM', 15, 5, 1, 6, 6, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-05-17 00:43:01', '2020-05-17 00:43:01'),
(1634, '06.05.2020', '2020', '12:42 PM', '12:42 PM', 15, 5, 1, 5, 6, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-05-17 00:43:01', '2020-05-17 00:43:01'),
(1635, '13.05.2020', '2020', '12:42 PM', '12:42 PM', 15, 5, 1, 4, 6, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}}]', 1, NULL, NULL, NULL, '2020-05-17 00:43:01', '2020-05-17 00:43:01'),
(1636, '01.05.2020', '2020', '12:42 PM', '12:42 PM', 15, 5, 1, 3, 6, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"13\"}}]', 1, NULL, NULL, NULL, '2020-05-17 00:43:01', '2020-05-17 00:43:01'),
(1637, '01.05.2020', '2020', '12:42 PM', '12:42 PM', 15, 5, 1, 1, 6, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"13\"}}]', 1, NULL, NULL, NULL, '2020-05-17 00:43:01', '2020-05-17 00:43:01'),
(1659, '01.05.2020', '2020', '01:52 AM', '01:52 AM', 15, 5, 1, 9, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"40\"}}]', 1, NULL, NULL, NULL, '2020-05-22 13:53:09', '2020-05-22 13:53:09'),
(1660, '01.04.2020', '2020', '09:02 PM', '09:02 PM', 15, 5, 1, 7, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"18\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"18\"}},{\"MCQ\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}}]', 1, NULL, NULL, NULL, '2020-05-22 13:53:09', '2020-05-22 13:53:09'),
(1661, '14.04.2020', '2020', '09:02 PM', '09:02 PM', 15, 5, 2, 6, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"18\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"18\"}},{\"MCQ\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}}]', 1, NULL, NULL, NULL, '2020-05-22 13:53:09', '2020-05-22 13:53:09'),
(1662, '16.04.2020', '2020', '09:02 PM', '09:02 PM', 15, 5, 1, 5, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"18\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"18\"}},{\"MCQ\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}}]', 1, NULL, NULL, NULL, '2020-05-22 13:53:09', '2020-05-22 13:53:09'),
(1663, '19.04.2020', '2020', '09:02 PM', '09:02 PM', 15, 5, 2, 4, 1, NULL, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"18\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"12\"}}]', 1, NULL, NULL, NULL, '2020-05-22 13:53:09', '2020-05-22 13:53:09'),
(1664, '27.04.202', '2020', '09:02 PM', '09:02 PM', 15, 5, 1, 3, 1, NULL, '[{\"Written\":{\"fullMarks\":\"100\",\"passMarks\":\"33\"}},{\"Practical\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}},{\"MCQ\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}}]', 1, NULL, NULL, NULL, '2020-05-22 13:53:09', '2020-05-22 13:53:09'),
(1665, '21.04.2020', '2020', '09:02 PM', '01:52 AM', 15, 5, 2, 1, 1, NULL, '[{\"Written\":{\"fullMarks\":\"60\",\"passMarks\":\"20\"}},{\"Practical\":{\"fullMarks\":\"40\",\"passMarks\":\"15\"}},{\"MCQ\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}}]', 1, NULL, NULL, NULL, '2020-05-22 13:53:10', '2020-05-22 13:53:10'),
(1701, '01.05.2020', '2020', '12:59 AM', '12:59 AM', 15, 5, 1, 9, 5, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"Attendance\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-05-30 13:01:01', '2020-05-30 13:01:01'),
(1702, '01.05.2020', '2020', '12:59 AM', '12:59 AM', 15, 5, 1, 7, 5, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Attendance\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-05-30 13:01:01', '2020-05-30 13:01:01'),
(1703, '05.05.2020', '2020', '01:00 AM', '01:00 AM', 15, 5, 1, 6, 5, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Attendance\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-05-30 13:01:01', '2020-05-30 13:01:01'),
(1704, '01.05.2020', '2020', '01:00 AM', '01:00 AM', 15, 5, 1, 5, 5, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Attendance\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-05-30 13:01:01', '2020-05-30 13:01:01'),
(1705, '01.05.2020', '2020', '01:00 AM', '01:00 AM', 15, 5, 1, 4, 5, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Attendance\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-05-30 13:01:01', '2020-05-30 13:01:01'),
(1706, '01.05.2020', '2020', '01:00 AM', '01:00 AM', 15, 5, 1, 3, 5, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"Attendance\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-05-30 13:01:01', '2020-05-30 13:01:01'),
(1707, '02.05.2020', '2020', '01:00 AM', '01:00 AM', 15, 5, 2, 1, 5, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"Attendance\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-05-30 13:01:01', '2020-05-30 13:01:01'),
(1732, '04.05.2020', '2020', '12:22 AM', '12:22 AM', 15, 5, 1, 9, 2, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"MCQ\":{\"fullMarks\":\"30\",\"passMarks\":\"40\"}}]', 1, NULL, NULL, NULL, '2020-06-11 14:00:42', '2020-06-11 14:00:42'),
(1733, '01.06.2020', '2020', '03:02 AM', '03:02 AM', 15, 5, 1, 8, 2, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}}]', 1, NULL, NULL, NULL, '2020-06-11 14:00:42', '2020-06-11 14:00:42'),
(1734, '01/04/20', '2020', '09:25 PM', '09:25 PM', 15, 5, 1, 7, 2, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}}]', 1, NULL, NULL, NULL, '2020-06-11 14:00:42', '2020-06-11 14:00:42'),
(1735, '02/04/20', '2020', '09:25 PM', '09:25 PM', 15, 5, 2, 6, 2, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}}]', 1, NULL, NULL, NULL, '2020-06-11 14:00:43', '2020-06-11 14:00:43'),
(1736, '03/04/20', '2020', '09:25 PM', '09:25 PM', 15, 5, 1, 5, 2, 1, '[{\"Written\":{\"fullMarks\":\"100\",\"passMarks\":\"40\"}},{\"MCQ\":{\"fullMarks\":\"Not Available\",\"passMarks\":\"Not Available\"}}]', 1, NULL, NULL, NULL, '2020-06-11 14:00:43', '2020-06-11 14:00:43'),
(1737, '04/04/20', '2020', '09:25 PM', '09:25 PM', 15, 5, 2, 4, 2, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}}]', 1, NULL, NULL, NULL, '2020-06-11 14:00:43', '2020-06-11 14:00:43'),
(1738, '06/04/20', '2020', '09:25 PM', '09:25 PM', 15, 5, 1, 3, 2, 1, '[{\"Written\":{\"fullMarks\":\"100\",\"passMarks\":\"40\"}},{\"MCQ\":{\"fullMarks\":\"N\\/A\",\"passMarks\":\"N\\/A\"}}]', 1, NULL, NULL, NULL, '2020-06-11 14:00:43', '2020-06-11 14:00:43'),
(1739, '07/04/20', '2020', '09:25 PM', '09:25 PM', 15, 5, 2, 1, 2, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"MCQ\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}}]', 1, NULL, NULL, NULL, '2020-06-11 14:00:43', '2020-06-11 14:00:43'),
(1756, '05.05.2020', '2020', '12:49 AM', '12:49 AM', 15, 5, 1, 9, 3, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"20\"}},{\"Viva\":{\"fullMarks\":\"10\",\"passMarks\":\"5\"}}]', 1, NULL, NULL, NULL, '2020-06-16 01:39:25', '2020-06-16 01:39:25'),
(1757, '01.06.2020', '2020', '02:36 PM', '01:36 PM', 15, 5, 1, 8, 3, 1, '[{\"Written\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}},{\"Practical\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}},{\"Viva\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-06-16 01:39:25', '2020-06-16 01:39:25'),
(1758, '01.05.2020', '2020', '10:08 PM', '09:07 PM', 15, 5, 1, 7, 3, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Viva\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-06-16 01:39:26', '2020-06-16 01:39:26'),
(1759, '04.05.2020', '2020', '10:08 PM', '01:39 PM', 15, 5, 1, 6, 3, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Viva\":{\"fullMarks\":\"20\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-06-16 01:39:26', '2020-06-16 01:39:26'),
(1760, '06.05.2020', '2020', '10:08 PM', '10:08 PM', 15, 5, 1, 5, 3, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Viva\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}}]', 1, NULL, NULL, NULL, '2020-06-16 01:39:26', '2020-06-16 01:39:26'),
(1761, '01.05.2020', '2020', '10:09 PM', '10:09 PM', 15, 5, 1, 4, 3, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Practical\":{\"fullMarks\":\"50\",\"passMarks\":\"50\"}},{\"Viva\":{\"fullMarks\":\"0\",\"passMarks\":\"0\"}}]', 1, NULL, NULL, NULL, '2020-06-16 01:39:26', '2020-06-16 01:39:26'),
(1762, '21.05.2020', '2020', '10:09 PM', '10:09 PM', 15, 5, 2, 3, 3, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"Viva\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-06-16 01:39:26', '2020-06-16 01:39:26'),
(1763, '13.05.2020', '2020', '10:09 PM', '10:09 PM', 15, 5, 1, 1, 3, 1, '[{\"Written\":{\"fullMarks\":\"50\",\"passMarks\":\"30\"}},{\"Practical\":{\"fullMarks\":\"20\",\"passMarks\":\"8\"}},{\"Viva\":{\"fullMarks\":\"10\",\"passMarks\":\"10\"}}]', 1, NULL, NULL, NULL, '2020-06-16 01:39:26', '2020-06-16 01:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `exam_terms`
--

CREATE TABLE `exam_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_terms`
--

INSERT INTO `exam_terms` (`id`, `name`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1st Term', 1, NULL, NULL, NULL, '2020-04-14 14:04:01', '2020-05-17 00:29:31'),
(2, '2nd Term', 1, NULL, NULL, NULL, '2020-04-14 14:08:02', '2020-05-17 00:29:33'),
(3, 'Final term exam', 1, NULL, NULL, NULL, '2020-05-17 00:39:20', '2020-05-17 00:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Marks', NULL, NULL),
(2, 'Grade(GPA)', NULL, NULL),
(3, 'Marks And Grade', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expanses`
--

CREATE TABLE `expanses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expanse_header_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expanses`
--

INSERT INTO `expanses` (`id`, `invoice_no`, `expanse_header_id`, `amount`, `date`, `year`, `month`, `note`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '0703202', 3, 200, '14-04-2020', '2020', 'April', 'Notted', 1, 0, NULL, NULL, '2020-03-07 06:10:15', '2020-04-15 21:47:50'),
(3, '0703203', 4, 1500, '18-03-2020', '2020', 'March', 'Note', 1, 0, NULL, NULL, '2020-03-07 06:36:55', '2020-03-29 08:30:24'),
(4, '1803204', 4, 10000, '29-03-2020', '2020', 'March', 'Net Bill', 1, NULL, NULL, NULL, '2020-03-18 05:34:44', '2020-03-29 08:34:42'),
(5, '2903205', 1, 1000, '29-03-2020', '2020', 'March', 'Office Nate Bill', 1, NULL, NULL, NULL, '2020-03-29 08:31:25', '2020-03-29 20:30:27'),
(6, 'SE2903206', 3, 25000, '30-03-2020', '2020', 'April', 'School Snacks', 1, NULL, NULL, NULL, '2020-03-29 08:36:32', '2020-04-15 21:47:27'),
(7, 'SE0504207', 4, 10000, '16-04-2020', '2020', 'April', NULL, 1, NULL, NULL, NULL, '2020-04-05 12:20:30', '2020-04-15 21:47:37'),
(8, 'SE1305208', 6, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:02:18', '2020-05-13 17:02:18'),
(9, 'SE1305209', 6, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:02:24', '2020-05-13 17:02:24'),
(10, 'SE13052010', 6, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:02:30', '2020-05-13 17:02:30'),
(11, 'SE13052011', 6, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:02:35', '2020-05-13 17:02:35'),
(12, 'SE13052012', 6, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:02:43', '2020-05-13 17:02:43'),
(13, 'SE14052013', 6, 10000, '14-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-14 06:21:54', '2020-05-14 06:21:54'),
(14, 'SE14052014', 5, 10000, '14-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-14 06:22:44', '2020-05-14 06:22:44'),
(15, 'SE14052015', 6, 10000, '14-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-14 06:22:52', '2020-05-14 06:22:52'),
(16, 'SE14052016', 6, 10000, '12-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-14 16:17:49', '2020-05-17 06:55:07'),
(17, 'SE16052017', 5, 10000, '16-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-16 19:14:22', '2020-05-16 19:14:22'),
(18, 'SE17052018', 4, 10000, '12-05-2020', '2020', 'June', NULL, 1, NULL, NULL, NULL, '2020-05-17 06:54:55', '2020-06-05 15:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `expanse_headers`
--

CREATE TABLE `expanse_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expanse_headers`
--

INSERT INTO `expanse_headers` (`id`, `name`, `note`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Net Bill', NULL, 1, NULL, NULL, NULL, '2020-03-04 06:53:58', '2020-03-09 05:27:36'),
(2, 'Other Bill', 'Other Bill', 1, NULL, NULL, NULL, '2020-03-06 22:34:02', '2020-03-09 05:27:07'),
(3, 'Snacks', 'School Snacks', 1, NULL, NULL, NULL, '2020-03-06 22:34:18', '2020-03-09 05:26:56'),
(4, 'Dinner', 'School Dinner', 1, NULL, NULL, NULL, '2020-03-06 22:34:44', '2020-03-13 23:49:20'),
(5, 'Donation', 'Donation form any NGO or Organization', 1, 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-04-05 07:44:18', '2020-04-05 07:36:02', '2020-04-05 07:44:18'),
(6, 'dasd', NULL, 1, NULL, NULL, NULL, '2020-04-05 07:38:25', '2020-04-17 10:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_discounts`
--

CREATE TABLE `fees_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_discounts`
--

INSERT INTO `fees_discounts` (`id`, `name`, `code`, `amount`, `description`, `deleted_by`, `deleted_at`, `deleted_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dsggdfg', 'dfsgdfsgdfs', 152, 'dfgdfg', '{\"id\":2,\"guard\":\"admin\"}', '2020-05-04 06:40:40', '1', '0', '2020-05-04 13:34:16', '2020-05-04 13:40:40'),
(2, 'sdfds', 'fdsfdsf', 152689, 'sdfdsfds', '{\"id\":2,\"guard\":\"admin\"}', '2020-05-04 06:41:06', '1', '1', '2020-05-04 13:40:51', '2020-05-04 13:41:06'),
(3, 'dsfdsf', 'dsfdsf', 5644, 'dsfsdf', '{\"id\":2,\"guard\":\"admin\"}', '2020-05-04 06:41:06', '1', '1', '2020-05-04 13:41:02', '2020-05-04 13:41:06'),
(4, 'gdfsfsda', 'fdsafdsf', 1525884, 'fdafds', NULL, NULL, NULL, '1', '2020-05-04 13:42:37', '2020-05-04 13:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `fees_groups`
--

CREATE TABLE `fees_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_groups`
--

INSERT INTO `fees_groups` (`id`, `name`, `description`, `deleted_by`, `deleted_at`, `deleted_status`, `status`, `created_at`, `updated_at`) VALUES
(2, 'gdfsgfds', 'gdfsgfdsg', NULL, NULL, NULL, '1', '2020-05-06 12:21:49', '2020-05-06 12:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `fees_masters`
--

CREATE TABLE `fees_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` int(11) NOT NULL,
  `types` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `fine_type` int(11) DEFAULT NULL,
  `percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_masters`
--

INSERT INTO `fees_masters` (`id`, `group`, `types`, `code`, `date`, `amount`, `fine_type`, `percentage`, `fine_amount`, `deleted_by`, `deleted_at`, `deleted_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'dfsgfdsg-152', '2020-05-05', 152, 0, '46545', '456456', '{\"id\":2,\"guard\":\"admin\"}', '2020-05-10 10:25:11', '1', '0', NULL, '2020-05-10 17:25:11'),
(2, 1, 5, 'dfsgfdsg-4563456', '2020-05-05', 4563456, 0, '655665', '65655', '{\"id\":2,\"guard\":\"admin\"}', '2020-05-10 10:25:11', '1', '0', NULL, '2020-05-10 17:25:11'),
(3, 1, 5, 'dfsgfdsg-546546', '2020-05-06', 546546, 0, NULL, NULL, '{\"id\":2,\"guard\":\"admin\"}', '2020-05-10 10:25:11', '1', '1', NULL, '2020-05-10 17:25:11'),
(4, 2, 5, 'dfsgfdsg-123456789', '2020-05-31', 123456789, NULL, NULL, NULL, '{\"id\":2,\"guard\":\"admin\"}', '2020-05-10 10:25:11', '1', '0', NULL, '2020-05-10 17:25:11'),
(5, 2, 5, 'dfsgfdsg-152', '2020-05-28', 152, 0, '144', '4554', NULL, NULL, NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fees_reminders`
--

CREATE TABLE `fees_reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(11) NOT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_reminders`
--

INSERT INTO `fees_reminders` (`id`, `type`, `days`, `deleted_by`, `deleted_at`, `deleted_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Before', 5, NULL, NULL, NULL, '1', NULL, '2020-05-04 12:36:34'),
(2, 'Before', 60, NULL, NULL, NULL, '1', NULL, '2020-05-04 12:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `fees_types`
--

CREATE TABLE `fees_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_types`
--

INSERT INTO `fees_types` (`id`, `name`, `code`, `description`, `deleted_by`, `deleted_at`, `deleted_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fdsgfds', 'gdfsg', 'dfsgfdsgs', '{\"id\":2,\"guard\":\"admin\"}', '2020-05-04 06:07:00', '1', '1', '2020-05-04 12:52:26', '2020-05-04 13:07:00'),
(2, 'dfgdf', 'dfaldsaf-sdfdslfsd-fsdafldsaf', 'dfsgfd', '{\"id\":2,\"guard\":\"admin\"}', '2020-05-04 06:07:00', '1', '1', '2020-05-04 13:00:37', '2020-05-04 13:07:00'),
(3, 'dsgfdsg', 'fdg', 'fdsgfdsg', '{\"id\":2,\"guard\":\"admin\"}', '2020-05-04 06:11:53', '1', '1', '2020-05-04 13:11:09', '2020-05-04 13:11:53'),
(4, 'dfsgfdgd', 'gdsgfds', 'gfdsgfds', '{\"id\":2,\"guard\":\"admin\"}', '2020-05-04 06:11:53', '1', '1', '2020-05-04 13:11:22', '2020-05-04 13:11:53'),
(5, 'dfsgfdsg', 'dfgfdgfd', 'gfdgfd', NULL, NULL, NULL, '1', '2020-05-06 11:18:37', '2020-05-24 00:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Male', 1, NULL, NULL),
(2, 'Female', 1, NULL, NULL),
(3, 'Other', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_day_attendance` tinyint(4) DEFAULT '1',
  `color_theme` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `period_attendance` tinyint(4) NOT NULL DEFAULT '1',
  `exam_attendance` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `app_logo`, `print_logo`, `school_name`, `school_address`, `phone`, `email`, `website`, `current_day_attendance`, `color_theme`, `created_at`, `updated_at`, `period_attendance`, `exam_attendance`) VALUES
(1, '5ed92b1ca08b2.png', '5eda7836dd479.png', 'MIRPUR UPOSHOHOR HIGH SCHOOL, DHAKA', 'Block F, Mirpur 1, Dhaka, Bangladesh', '01854284712', 'admin@gmail.com', 'https://durbarit.com/', 1, 1, NULL, '2020-06-15 03:09:33', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Science', 1, 0, NULL, NULL),
(2, 'Arts', 1, 0, NULL, NULL),
(3, 'Commerce', 1, 0, NULL, NULL),
(4, 'Others', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hostel_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intake` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_header_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `invoice_no`, `income_header_id`, `amount`, `date`, `year`, `month`, `note`, `status`, `deleted_status`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'SI0504201', 2, 10000, '05-04-2020', '2020', 'April', 'Get a big donation from the x company.', 1, '1', '2020-05-13 16:59:43', '{\"id\":8,\"guard\":\"admin\"}', '2020-04-05 13:51:30', '2020-05-13 10:59:43'),
(2, 'SI1305202', 2, 10000, '13-05-2020', '2020', 'May', 'dfsadfs', 1, '1', '2020-05-13 17:01:21', '{\"id\":8,\"guard\":\"admin\"}', '2020-05-13 16:43:06', '2020-05-13 11:01:21'),
(3, 'SI1305203', 2, 10000, '13-05-2020', '2020', 'May', 'sdfasdfadsf', 1, '1', '2020-05-13 17:00:31', '{\"id\":8,\"guard\":\"admin\"}', '2020-05-13 16:44:47', '2020-05-13 11:00:31'),
(4, 'SI1305204', 2, 10000, '13-05-2020', '2020', 'May', 'qweqwe', 1, '1', '2020-05-13 17:00:21', '{\"id\":8,\"guard\":\"admin\"}', '2020-05-13 16:49:07', '2020-05-13 11:00:21'),
(5, 'SI1305205', 2, 10000, '13-05-2020', '2020', 'May', 'sdfsadfasdf', 1, '1', '2020-05-13 16:59:24', '{\"id\":8,\"guard\":\"admin\"}', '2020-05-13 16:49:33', '2020-05-13 10:59:24'),
(6, 'SI1305206', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, '1', '2020-05-13 17:01:24', '{\"id\":8,\"guard\":\"admin\"}', '2020-05-13 16:54:01', '2020-05-13 11:01:24'),
(7, 'SI1305207', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, '1', '2020-05-13 17:01:26', '{\"id\":8,\"guard\":\"admin\"}', '2020-05-13 16:54:51', '2020-05-13 11:01:26'),
(8, 'SI1305208', 2, 10000, '13-05-2020', '2020', 'May', 'sadfsadfs', 1, '1', '2020-05-13 17:01:29', '{\"id\":8,\"guard\":\"admin\"}', '2020-05-13 16:55:43', '2020-05-13 11:01:29'),
(9, 'SI1305209', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 16:55:51', '2020-05-13 16:55:51'),
(10, 'SI13052010', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 16:56:33', '2020-05-13 16:56:33'),
(11, 'SI13052011', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 16:56:50', '2020-05-13 16:56:50'),
(12, 'SI13052012', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 16:57:04', '2020-05-13 16:57:04'),
(13, 'SI13052013', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 16:57:23', '2020-05-13 16:57:23'),
(14, 'SI13052014', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, '1', '2020-05-13 16:58:25', '{\"id\":8,\"guard\":\"admin\"}', '2020-05-13 16:57:38', '2020-05-13 10:58:25'),
(15, 'SI13052015', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:05:09', '2020-05-13 17:05:09'),
(16, 'SI13052016', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:05:49', '2020-05-13 17:05:49'),
(17, 'SI13052017', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:05:55', '2020-05-13 17:05:55'),
(18, 'SI13052018', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:06:02', '2020-05-13 17:06:02'),
(19, 'SI13052019', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:06:07', '2020-05-13 17:06:07'),
(20, 'SI13052020', 2, 10000, '13-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-13 17:06:16', '2020-05-13 17:06:16'),
(21, 'SI14052021', 2, 10000, '14-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-14 16:17:28', '2020-05-14 16:17:28'),
(22, 'SI17052022', 2, 10000, '17-05-2020', '2020', 'May', NULL, 1, NULL, NULL, NULL, '2020-05-17 06:54:31', '2020-05-17 06:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `income_headers`
--

CREATE TABLE `income_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_headers`
--

INSERT INTO `income_headers` (`id`, `name`, `note`, `status`, `deleted_status`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'sfgsdfds', 'vxcvxzcv', 1, '1', '2020-04-05 13:43:15', '{\"id\":8,\"guard\":\"admin\"}', '2020-04-05 07:43:11', '2020-04-05 07:43:15'),
(2, 'Donation', 'Donation from any Ngo or any organization.', 1, NULL, NULL, NULL, '2020-04-05 07:43:55', '2020-04-05 07:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_categories`
--

CREATE TABLE `inventory_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_applies`
--

CREATE TABLE `leave_applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `apply_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `leave_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval` tinyint(4) NOT NULL DEFAULT '0',
  `attachment_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_applies`
--

INSERT INTO `leave_applies` (`id`, `apply_date`, `employee_id`, `leave_type_id`, `reason`, `start_date`, `end_date`, `approval`, `attachment_file`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, '15-06-2020', 8, 2, 'I want to go to home. Urgently..', '01-06-2020', '01-06-2020', 0, '5ee683c724775.jpg', 1, NULL, NULL, NULL, '2020-06-14 14:08:39', '2020-06-14 14:08:39'),
(8, '15-06-2020', 8, 2, 'Urgently I want to go to home. Please approve my application.', '18-06-2020', '23-06-2020', 0, '5ee76850444d4.jpg', 1, NULL, NULL, NULL, '2020-06-15 06:23:44', '2020-06-15 06:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Medical', 1, NULL, NULL, NULL, '2020-06-13 11:17:44', '2020-06-14 07:45:54'),
(2, 'Another reason', 1, NULL, NULL, NULL, '2020-06-14 07:46:12', '2020-06-14 07:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `mail_drafts`
--

CREATE TABLE `mail_drafts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `is_bulk_mail` tinyint(1) NOT NULL DEFAULT '0',
  `is_replay_mail` tinyint(1) NOT NULL DEFAULT '0',
  `is_send_mail` tinyint(1) NOT NULL DEFAULT '0',
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_drafts`
--

INSERT INTO `mail_drafts` (`id`, `email`, `subject`, `body`, `is_bulk_mail`, `is_replay_mail`, `is_send_mail`, `attachment`, `contract_id`, `created_at`, `updated_at`) VALUES
(5, 'ermhroy@gmail.com', 'Test subject reply mail', 'fsdfdsfs dfsadf sadfs<p></p>', 0, 1, 0, NULL, 1, '2020-05-05 16:41:37', '2020-05-05 23:18:24'),
(6, 'harri@gmail.com', 'Food', '<p><p>dasdasd dasdasdasddsfsdfv sewe</p><p></p><p></p></p>', 0, 0, 1, NULL, NULL, '2020-05-05 22:46:57', '2020-05-06 01:55:09'),
(7, 'harri@gmail.com', 'Food', '<p><p></p><p></p><p></p><p></p><p></p><p>fadsfasda sd</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p></p>', 0, 0, 1, NULL, NULL, '2020-05-05 22:49:00', '2020-05-06 01:54:24'),
(13, NULL, 'Food', '<p>sdfgsdfsd sdf</p>', 1, 0, 0, NULL, NULL, '2020-05-07 02:02:52', '2020-05-07 02:02:52'),
(14, NULL, 'Food', '<p>sadfasd asdfas dfasdf asdf&nbsp;</p>', 1, 0, 0, NULL, NULL, '2020-05-08 00:50:38', '2020-05-08 00:50:38'),
(15, 'ermhroy7@gmail.com', 'compose', '<p>sfgsdfgs sdf sd</p>', 0, 0, 1, NULL, NULL, '2020-05-17 01:00:53', '2020-05-17 01:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `mark_entires`
--

CREATE TABLE `mark_entires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mark_distributions` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_absent` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mark_entires`
--

INSERT INTO `mark_entires` (`id`, `exam_id`, `student_id`, `class_id`, `section_id`, `subject_id`, `mark_distributions`, `status`, `is_absent`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(275, 1, 13, 15, 5, 6, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-04-23 15:52:19', '2020-04-23 15:52:19'),
(276, 1, 14, 15, 5, 6, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-04-23 15:52:19', '2020-04-23 15:52:19'),
(277, 1, 15, 15, 5, 6, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-04-23 15:52:20', '2020-04-23 15:52:20'),
(278, 1, 13, 15, 5, 5, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-04-23 15:52:29', '2020-04-23 15:52:29'),
(279, 1, 14, 15, 5, 5, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-04-23 15:52:29', '2020-04-23 15:52:29'),
(280, 1, 15, 15, 5, 5, '[{\"Written\":\"10\"},{\"Practical\":\"10\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-04-23 15:52:29', '2020-04-23 15:52:29'),
(287, 1, 13, 15, 5, 1, '[{\"Written\":\"22\"},{\"Practical\":\"24\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-04-23 15:53:15', '2020-04-23 15:53:15'),
(288, 1, 14, 15, 5, 1, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-04-23 15:53:15', '2020-04-23 15:53:15'),
(289, 1, 15, 15, 5, 1, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-04-23 15:53:15', '2020-04-23 15:53:15'),
(341, 1, 13, 15, 5, 7, '[{\"Written\":0},{\"Practical\":0},{\"MCQ\":\"N\\/A\"}]', 1, 1, NULL, NULL, NULL, '2020-05-11 01:14:40', '2020-05-11 01:14:40'),
(342, 1, 14, 15, 5, 7, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-11 01:14:40', '2020-05-11 01:14:40'),
(343, 1, 15, 15, 5, 7, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-11 01:14:40', '2020-05-11 01:14:40'),
(344, 3, 13, 15, 5, 5, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"Viva\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-14 10:12:45', '2020-05-14 10:12:45'),
(345, 3, 14, 15, 5, 5, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"Viva\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-14 10:12:45', '2020-05-14 10:12:45'),
(346, 3, 15, 15, 5, 5, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"Viva\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-14 10:12:45', '2020-05-14 10:12:45'),
(353, 1, 13, 15, 5, 3, '[{\"Written\":\"20\"},{\"Practical\":\"N\\/A\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-16 13:06:02', '2020-05-16 13:06:02'),
(354, 1, 14, 15, 5, 3, '[{\"Written\":\"60\"},{\"Practical\":\"N\\/A\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-16 13:06:02', '2020-05-16 13:06:02'),
(355, 1, 15, 15, 5, 3, '[{\"Written\":\"50\"},{\"Practical\":\"N\\/A\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-16 13:06:02', '2020-05-16 13:06:02'),
(359, 6, 13, 15, 5, 7, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"MCQ\":\"20\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:16', '2020-05-17 00:45:16'),
(360, 6, 14, 15, 5, 7, '[{\"Written\":0},{\"Practical\":0},{\"MCQ\":0}]', 1, 1, NULL, NULL, NULL, '2020-05-17 00:45:16', '2020-05-17 00:45:16'),
(361, 6, 15, 15, 5, 7, '[{\"Written\":\"10\"},{\"Practical\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:16', '2020-05-17 00:45:16'),
(362, 6, 13, 15, 5, 6, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"MCQ\":\"20\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:29', '2020-05-17 00:45:29'),
(363, 6, 14, 15, 5, 6, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:29', '2020-05-17 00:45:29'),
(364, 6, 15, 15, 5, 6, '[{\"Written\":\"10\"},{\"Practical\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:29', '2020-05-17 00:45:29'),
(365, 6, 13, 15, 5, 5, '[{\"Written\":\"20\"},{\"Practical\":\"20\"},{\"MCQ\":\"20\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:44', '2020-05-17 00:45:44'),
(366, 6, 14, 15, 5, 5, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:44', '2020-05-17 00:45:44'),
(367, 6, 15, 15, 5, 5, '[{\"Written\":\"10\"},{\"Practical\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:45', '2020-05-17 00:45:45'),
(368, 6, 13, 15, 5, 9, '[{\"Written\":\"19\"},{\"Practical\":\"20\"},{\"MCQ\":\"20\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:55', '2020-05-17 00:45:55'),
(369, 6, 14, 15, 5, 9, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:55', '2020-05-17 00:45:55'),
(370, 6, 15, 15, 5, 9, '[{\"Written\":\"10\"},{\"Practical\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-17 00:45:55', '2020-05-17 00:45:55'),
(371, 1, 13, 15, 5, 4, '[{\"Written\":\"20\"},{\"Practical\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-29 11:19:58', '2020-05-29 11:19:58'),
(372, 1, 14, 15, 5, 4, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"MCQ\":\"23\"}]', 1, 0, NULL, NULL, NULL, '2020-05-29 11:19:58', '2020-05-29 11:19:58'),
(373, 1, 15, 15, 5, 4, '[{\"Written\":\"30\"},{\"Practical\":\"30\"},{\"MCQ\":\"30\"}]', 1, 0, NULL, NULL, NULL, '2020-05-29 11:19:58', '2020-05-29 11:19:58'),
(389, 2, 13, 15, 5, 7, '[{\"Written\":\"20\"},{\"MCQ\":\"20\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:12', '2020-05-31 01:59:12'),
(390, 2, 14, 15, 5, 7, '[{\"Written\":\"30\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:12', '2020-05-31 01:59:12'),
(391, 2, 15, 15, 5, 7, '[{\"Written\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:12', '2020-05-31 01:59:12'),
(392, 2, 13, 15, 5, 6, '[{\"Written\":\"20\"},{\"MCQ\":\"20\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:20', '2020-05-31 01:59:20'),
(393, 2, 14, 15, 5, 6, '[{\"Written\":\"30\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:20', '2020-05-31 01:59:20'),
(394, 2, 15, 15, 5, 6, '[{\"Written\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:20', '2020-05-31 01:59:20'),
(395, 2, 13, 15, 5, 4, '[{\"Written\":\"20\"},{\"MCQ\":\"20\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:37', '2020-05-31 01:59:37'),
(396, 2, 14, 15, 5, 4, '[{\"Written\":\"30\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:37', '2020-05-31 01:59:37'),
(397, 2, 15, 15, 5, 4, '[{\"Written\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:37', '2020-05-31 01:59:37'),
(398, 2, 13, 15, 5, 3, '[{\"Written\":\"20\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:45', '2020-05-31 01:59:45'),
(399, 2, 14, 15, 5, 3, '[{\"Written\":\"30\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:45', '2020-05-31 01:59:45'),
(400, 2, 15, 15, 5, 3, '[{\"Written\":\"10\"},{\"MCQ\":\"N\\/A\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 01:59:45', '2020-05-31 01:59:45'),
(404, 2, 13, 15, 5, 1, '[{\"Written\":\"20\"},{\"MCQ\":\"20\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 02:00:16', '2020-05-31 02:00:16'),
(405, 2, 14, 15, 5, 1, '[{\"Written\":\"30\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 02:00:16', '2020-05-31 02:00:16'),
(406, 2, 15, 15, 5, 1, '[{\"Written\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 02:00:16', '2020-05-31 02:00:16'),
(407, 2, 13, 15, 5, 9, '[{\"Written\":\"20\"},{\"MCQ\":\"20\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 02:05:25', '2020-05-31 02:05:25'),
(408, 2, 14, 15, 5, 9, '[{\"Written\":\"30\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 02:05:25', '2020-05-31 02:05:25'),
(409, 2, 15, 15, 5, 9, '[{\"Written\":\"10\"},{\"MCQ\":\"10\"}]', 1, 0, NULL, NULL, NULL, '2020-05-31 02:05:25', '2020-05-31 02:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `mark_ranges`
--

CREATE TABLE `mark_ranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mark_ranges`
--

INSERT INTO `mark_ranges` (`id`, `name`, `grade_point`, `min_percentage`, `max_percentage`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5.0', '80', '100', 'This is latter mark.', 1, '2020-04-19 16:27:51', '2020-04-23 14:33:11'),
(2, 'A', '4.0', '70', '79', NULL, 1, '2020-04-20 09:52:41', '2020-04-23 14:33:16'),
(3, 'A-', '3.50', '60', '69', NULL, 1, NULL, '2020-04-23 14:33:19'),
(4, 'B', '3.0', '50', '59', NULL, 1, NULL, '2020-04-23 14:33:22'),
(5, 'C', '2.50', '40', '49', NULL, 1, '2020-04-20 09:55:50', '2020-04-23 14:33:25'),
(6, 'D', '2.0', '33', '39', NULL, 1, '2020-04-20 09:56:25', '2020-04-23 14:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(6, '2020_03_01_090204_create_admins_table', 2),
(7, '2020_03_02_062019_create_categories_table', 3),
(9, '2020_03_03_043021_create_classes_table', 4),
(10, '2020_03_03_061200_create_blood_groups_table', 5),
(11, '2020_03_03_092151_create_routes_table', 6),
(13, '2020_03_03_114458_create_vehicles_table', 7),
(14, '2020_03_04_051639_create_route_vehicles_table', 8),
(15, '2020_03_04_104349_create_genders_table', 9),
(16, '2020_03_04_121806_create_expanse_headers_table', 10),
(17, '2017_08_11_073824_create_menus_wp_table', 11),
(18, '2017_08_11_074006_create_menu_items_wp_table', 11),
(19, '2020_03_04_062445_create_menus_table', 11),
(20, '2020_03_04_064536_create_room_types_table', 11),
(21, '2020_03_07_044320_create_expanses_table', 12),
(22, '2020_03_07_085812_create_subjects_table', 13),
(23, '2020_03_08_045807_create_sections_table', 14),
(25, '2020_03_08_061745_create_class_sections_table', 15),
(27, '2020_03_08_043741_create_hostels_table', 16),
(28, '2020_03_08_100336_create_class_subjects_table', 16),
(29, '2020_03_09_094416_create_groups_table', 17),
(33, '2020_03_09_123958_create_designations_table', 18),
(35, '2020_03_14_062846_create_roles_table', 20),
(37, '2020_03_14_085323_create_employees_table', 21),
(38, '2020_03_09_110232_create_class_teachers_table', 22),
(39, '2020_03_28_160143_create_subject_teachers_table', 23),
(40, '2020_03_29_103719_create_vehicle_drivers_table', 24),
(41, '2020_03_30_181548_create_class_timetables_table', 25),
(42, '2020_04_05_130231_create_income_headers_table', 26),
(43, '2020_04_05_130258_create_incomes_table', 26),
(44, '2020_04_05_171101_create_departments_table', 27),
(45, '2020_04_06_171027_create_period_attendances_table', 28),
(46, '2020_04_08_190122_create_current_day_attendances_table', 29),
(47, '2020_04_13_202418_create_exam_terms_table', 30),
(48, '2020_04_13_202703_create_exam_halls_table', 30),
(49, '2020_04_13_202846_create_exam_distributions_table', 30),
(50, '2020_04_13_202946_create_exams_table', 31),
(51, '2020_04_15_185632_create_exam_types_table', 32),
(52, '2020_04_16_223855_create_exam_schedules_table', 33),
(53, '2020_04_19_212930_create_mark_ranges_table', 34),
(54, '2020_04_20_195238_create_mark_entires_table', 35),
(55, '2020_04_24_193545_create_attachment_types_table', 36),
(57, '2020_04_24_201554_create_upload_contents_table', 37),
(59, '2020_04_27_233107_create_banks_table', 38),
(62, '2020_04_29_215539_create_bank_accounts_table', 40),
(63, '2020_05_01_201027_create_voucher_headers_table', 41),
(64, '2020_05_01_215539_create_bank_deposits_table', 42),
(65, '2020_05_01_230421_create_bank_withdraws_table', 43),
(66, '2020_05_02_211818_create_admit_card_templates_table', 44),
(67, '2020_05_02_215628_create_years_table', 45),
(72, '2020_05_03_233829_create_contracts_table', 46),
(73, '2020_05_03_234957_create_mail_drafts_table', 46),
(74, '2020_05_24_103616_create_exam_attendances_table', 47),
(75, '2020_05_30_155222_create_sessions_table', 48),
(76, '2020_06_04_140735_create_general_settings_table', 49),
(77, '2020_06_08_182544_create_employee_attendances_table', 50),
(79, '2020_06_09_180004_create_employee_salaries_table', 51),
(80, '2020_06_13_165241_create_leave_types_table', 52),
(82, '2020_06_14_135329_create_leave_applies_table', 53);

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
-- Table structure for table `period_attendances`
--

CREATE TABLE `period_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `period_attendances`
--

INSERT INTO `period_attendances` (`id`, `class_id`, `section_id`, `subject_id`, `student_id`, `month`, `year`, `date`, `attendance_status`, `note`, `created_at`, `updated_at`) VALUES
(16, 15, 5, 7, 13, 'April', '2020', '07-04-2020', 'present', 'Good Student Edited', '2020-04-07 16:05:28', '2020-04-08 13:53:57'),
(17, 15, 5, 7, 14, 'April', '2020', '07-04-2020', 'present', 'He has gone in half day Edited', '2020-04-07 16:05:28', '2020-04-08 13:54:16'),
(18, 15, 5, 7, 15, 'April', '2020', '07-04-2020', 'present', 'He always late. Edited', '2020-04-07 16:05:28', '2020-04-08 13:54:16'),
(19, 15, 5, 7, 13, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:34:35', '2020-04-09 22:20:08'),
(20, 15, 5, 7, 14, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:34:35', '2020-04-09 22:20:08'),
(21, 15, 5, 7, 15, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:34:35', '2020-04-09 22:20:08'),
(22, 15, 5, 6, 13, 'April', '2020', '08-04-2020', 'half_day', NULL, '2020-04-08 09:34:44', '2020-04-08 14:02:00'),
(23, 15, 5, 6, 14, 'April', '2020', '08-04-2020', 'half_day', NULL, '2020-04-08 09:34:44', '2020-04-08 14:02:00'),
(24, 15, 5, 6, 15, 'April', '2020', '08-04-2020', 'half_day', NULL, '2020-04-08 09:34:44', '2020-04-08 14:02:00'),
(25, 15, 5, 5, 13, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:35:07', '2020-04-08 09:35:07'),
(26, 15, 5, 5, 14, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:35:07', '2020-04-08 09:35:07'),
(27, 15, 5, 5, 15, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:35:07', '2020-04-08 09:35:07'),
(28, 15, 5, 4, 13, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:35:15', '2020-04-08 09:35:15'),
(29, 15, 5, 4, 14, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:35:15', '2020-04-08 09:35:15'),
(30, 15, 5, 4, 15, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:35:15', '2020-04-08 09:35:15'),
(31, 15, 5, 3, 13, 'April', '2020', '08-04-2020', 'absent', 'Good Student', '2020-04-08 09:35:22', '2020-04-08 14:08:03'),
(32, 15, 5, 3, 14, 'April', '2020', '08-04-2020', 'late', 'Good Student', '2020-04-08 09:35:22', '2020-04-08 14:08:03'),
(33, 15, 5, 3, 15, 'April', '2020', '08-04-2020', 'absent', 'Good Student', '2020-04-08 09:35:22', '2020-04-08 14:08:03'),
(34, 15, 5, 1, 13, 'April', '2020', '08-04-2020', 'present', NULL, '2020-04-08 09:35:29', '2020-04-08 09:35:29'),
(35, 15, 5, 1, 14, 'April', '2020', '08-04-2020', 'late', NULL, '2020-04-08 09:35:29', '2020-04-08 13:54:54'),
(36, 15, 5, 1, 15, 'April', '2020', '08-04-2020', 'absent', NULL, '2020-04-08 09:35:30', '2020-04-08 13:54:54'),
(37, 15, 5, 7, 13, 'April', '2020', '10-04-2020', 'present', NULL, '2020-04-09 22:32:03', '2020-04-09 22:32:03'),
(38, 15, 5, 7, 14, 'April', '2020', '10-04-2020', 'present', NULL, '2020-04-09 22:32:03', '2020-04-09 22:32:29'),
(39, 15, 5, 7, 15, 'April', '2020', '10-04-2020', 'absent', NULL, '2020-04-09 22:32:03', '2020-04-09 22:32:36'),
(40, 15, 5, 7, 13, 'April', '2020', '15-04-2020', 'absent', NULL, '2020-04-14 20:45:59', '2020-04-14 20:47:14'),
(41, 15, 5, 7, 14, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:45:59', '2020-04-14 20:45:59'),
(42, 15, 5, 7, 15, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:45:59', '2020-04-14 20:45:59'),
(43, 15, 5, 6, 13, 'April', '2020', '15-04-2020', 'absent', NULL, '2020-04-14 20:46:09', '2020-04-14 20:47:25'),
(44, 15, 5, 6, 14, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:09', '2020-04-14 20:46:09'),
(45, 15, 5, 6, 15, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:09', '2020-04-14 20:46:09'),
(46, 15, 5, 5, 13, 'April', '2020', '15-04-2020', 'absent', NULL, '2020-04-14 20:46:17', '2020-04-14 20:46:17'),
(47, 15, 5, 5, 14, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:17', '2020-04-14 20:46:17'),
(48, 15, 5, 5, 15, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:17', '2020-04-14 20:46:17'),
(49, 15, 5, 4, 13, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:23', '2020-04-14 20:46:23'),
(50, 15, 5, 4, 14, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:23', '2020-04-14 20:47:42'),
(51, 15, 5, 4, 15, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:23', '2020-04-14 20:46:23'),
(52, 15, 5, 3, 13, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:51', '2020-04-14 20:46:51'),
(53, 15, 5, 3, 14, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:51', '2020-04-14 20:46:51'),
(54, 15, 5, 3, 15, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:46:51', '2020-04-14 20:46:51'),
(55, 15, 5, 1, 13, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:47:02', '2020-04-14 20:47:02'),
(56, 15, 5, 1, 14, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:47:02', '2020-04-14 20:47:51'),
(57, 15, 5, 1, 15, 'April', '2020', '15-04-2020', 'present', NULL, '2020-04-14 20:47:02', '2020-04-14 20:47:51'),
(58, 15, 5, 7, 13, 'April', '2020', '18-04-2020', 'absent', NULL, '2020-04-18 13:57:54', '2020-04-18 13:58:11'),
(59, 15, 5, 7, 14, 'April', '2020', '18-04-2020', 'absent', NULL, '2020-04-18 13:57:54', '2020-04-18 13:58:11'),
(60, 15, 5, 7, 15, 'April', '2020', '18-04-2020', 'absent', NULL, '2020-04-18 13:57:54', '2020-04-18 13:58:12'),
(61, 15, 5, 6, 13, 'April', '2020', '20-04-2020', 'present', NULL, '2020-04-20 16:41:54', '2020-04-20 16:41:54'),
(62, 15, 5, 6, 14, 'April', '2020', '20-04-2020', 'present', NULL, '2020-04-20 16:41:54', '2020-04-20 16:41:54'),
(63, 15, 5, 6, 15, 'April', '2020', '20-04-2020', 'half_day', NULL, '2020-04-20 16:41:54', '2020-04-20 16:41:54'),
(64, 15, 5, 7, 13, 'April', '2020', '27-04-2020', 'present', NULL, '2020-04-27 17:51:00', '2020-04-27 17:51:00'),
(65, 15, 5, 7, 14, 'April', '2020', '27-04-2020', 'present', NULL, '2020-04-27 17:51:00', '2020-04-27 17:51:00'),
(66, 15, 5, 7, 15, 'April', '2020', '27-04-2020', 'half_day', NULL, '2020-04-27 17:51:00', '2020-04-27 17:51:22'),
(67, 15, 5, 7, 13, 'April', '2020', '29-04-2020', 'present', NULL, '2020-04-28 20:50:41', '2020-04-28 20:50:41'),
(68, 15, 5, 7, 14, 'April', '2020', '29-04-2020', 'present', NULL, '2020-04-28 20:50:41', '2020-04-28 20:50:41'),
(69, 15, 5, 7, 15, 'April', '2020', '29-04-2020', 'present', NULL, '2020-04-28 20:50:41', '2020-04-28 20:50:41'),
(70, 15, 5, 7, 13, 'May', '2020', '14-05-2020', 'absent', NULL, '2020-05-14 16:29:17', '2020-05-14 16:29:58'),
(71, 15, 5, 7, 14, 'May', '2020', '14-05-2020', 'present', NULL, '2020-05-14 16:29:17', '2020-05-14 16:29:17'),
(72, 15, 5, 7, 15, 'May', '2020', '14-05-2020', 'late', NULL, '2020-05-14 16:29:17', '2020-05-14 16:29:58'),
(73, 15, 5, 6, 13, 'May', '2020', '14-05-2020', 'half_day', NULL, '2020-05-14 16:29:32', '2020-05-14 16:29:32'),
(74, 15, 5, 6, 14, 'May', '2020', '14-05-2020', 'present', NULL, '2020-05-14 16:29:32', '2020-05-14 16:29:32'),
(75, 15, 5, 6, 15, 'May', '2020', '14-05-2020', 'present', NULL, '2020-05-14 16:29:32', '2020-05-14 16:29:32'),
(76, 15, 5, 7, 13, 'May', '2020', '17-05-2020', 'present', NULL, '2020-05-16 19:12:04', '2020-05-16 19:12:04'),
(77, 15, 5, 7, 14, 'May', '2020', '17-05-2020', 'absent', NULL, '2020-05-16 19:12:04', '2020-05-16 19:12:19'),
(78, 15, 5, 7, 15, 'May', '2020', '17-05-2020', 'present', NULL, '2020-05-16 19:12:04', '2020-05-16 19:12:04'),
(79, 15, 5, 9, 13, 'May', '2020', '17-05-2020', 'present', NULL, '2020-05-17 06:52:43', '2020-05-17 06:52:43'),
(80, 15, 5, 9, 14, 'May', '2020', '17-05-2020', 'late', NULL, '2020-05-17 06:52:43', '2020-05-17 06:53:30'),
(81, 15, 5, 9, 15, 'May', '2020', '17-05-2020', 'present', NULL, '2020-05-17 06:52:43', '2020-05-17 06:52:43'),
(82, 15, 5, 6, 13, 'May', '2020', '17-05-2020', 'present', NULL, '2020-05-17 06:53:04', '2020-05-17 06:53:04'),
(83, 15, 5, 6, 14, 'May', '2020', '17-05-2020', 'present', NULL, '2020-05-17 06:53:04', '2020-05-17 06:53:04'),
(84, 15, 5, 6, 15, 'May', '2020', '17-05-2020', 'present', NULL, '2020-05-17 06:53:04', '2020-05-17 06:53:04'),
(85, 15, 5, 9, 13, 'May', '2020', '31-05-2020', 'present', NULL, '2020-05-31 12:18:58', '2020-05-31 12:18:58'),
(86, 15, 5, 9, 14, 'May', '2020', '31-05-2020', 'present', NULL, '2020-05-31 12:18:58', '2020-05-31 12:18:58'),
(87, 15, 5, 9, 15, 'May', '2020', '31-05-2020', 'present', NULL, '2020-05-31 12:18:58', '2020-05-31 12:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_known_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role_known_id`, `created_at`, `updated_at`) VALUES
(6, 'Admin', 2, NULL, NULL),
(7, 'Teacher', 3, NULL, NULL),
(8, 'Accountant', 4, NULL, NULL),
(9, 'Librarian', 5, NULL, NULL),
(10, 'Driver', 6, NULL, NULL),
(11, 'clerk', 7, NULL, NULL),
(12, 'Security Guard', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fare` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `is_assigned_vehicle` tinyint(1) DEFAULT '0',
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `fare`, `status`, `deleted_status`, `is_assigned_vehicle`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Mirpur 1', 150, 1, NULL, 1, NULL, NULL, '2020-03-03 05:05:37', '2020-03-13 23:19:13'),
(4, 'Mirpur 2', 100, 1, NULL, 1, NULL, NULL, '2020-03-03 05:05:48', '2020-03-13 23:19:13'),
(5, 'Mirpur 11.5', 200, 1, NULL, 1, NULL, NULL, '2020-03-11 06:05:52', '2020-03-13 23:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `route_vehicles`
--

CREATE TABLE `route_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `route_vehicles`
--

INSERT INTO `route_vehicles` (`id`, `route_id`, `vehicle_id`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(103, 3, 3, NULL, NULL, NULL, '2020-03-14 00:21:33', '2020-03-14 00:21:33'),
(104, 3, 4, NULL, NULL, NULL, '2020-03-14 00:21:33', '2020-03-14 00:21:33'),
(105, 3, 5, NULL, NULL, NULL, '2020-03-14 00:21:33', '2020-03-14 00:21:33'),
(112, 4, 3, NULL, NULL, NULL, '2020-05-16 13:12:46', '2020-05-16 13:12:46'),
(113, 4, 4, NULL, NULL, NULL, '2020-05-16 13:12:46', '2020-05-16 13:12:46'),
(114, 4, 5, NULL, NULL, NULL, '2020-05-16 13:12:46', '2020-05-16 13:12:46'),
(115, 5, 3, NULL, NULL, NULL, '2020-05-16 13:12:50', '2020-05-16 13:12:50'),
(116, 5, 4, NULL, NULL, NULL, '2020-05-16 13:12:50', '2020-05-16 13:12:50'),
(117, 5, 5, NULL, NULL, NULL, '2020-05-16 13:12:50', '2020-05-16 13:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `capacity` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `capacity`, `created_at`, `updated_at`) VALUES
(5, 'A', 1, NULL, NULL, NULL, 45, '2020-03-08 00:04:47', '2020-03-09 04:10:52'),
(6, 'B', 1, NULL, NULL, NULL, 50, '2020-03-08 00:04:56', '2020-03-09 04:10:56'),
(7, 'C', 1, NULL, NULL, NULL, 55, '2020-03-08 00:05:09', '2020-03-08 00:05:09'),
(8, 'D', 1, NULL, NULL, NULL, 35, '2020-03-08 00:05:27', '2020-03-08 00:05:27'),
(9, 'E', 1, NULL, NULL, NULL, 100, '2020-05-16 00:48:21', '2020-05-16 00:48:21'),
(11, 'F', 1, NULL, NULL, NULL, 100, '2020-05-16 00:50:22', '2020-05-16 00:50:22'),
(12, 'G', 1, NULL, NULL, NULL, 50, '2020-05-16 12:50:50', '2020-05-16 12:50:50'),
(13, 'H', 1, NULL, NULL, NULL, 50, '2020-05-17 00:31:35', '2020-05-17 00:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `session_year`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2019-2020', 1, NULL, NULL, NULL, '2020-05-30 10:28:21', '2020-05-30 10:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `student_admissions`
--

CREATE TABLE `student_admissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admission_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) DEFAULT NULL,
  `session_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` int(11) DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `sibling` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_or_birthid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if_guardian_is` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_address` text COLLATE utf8mb4_unicode_ci,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `route_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `hostel_id` int(11) DEFAULT NULL,
  `room_num` int(11) DEFAULT NULL,
  `previous_school_detail` text COLLATE utf8mb4_unicode_ci,
  `previous_school_note` text COLLATE utf8mb4_unicode_ci,
  `docu_title1` text COLLATE utf8mb4_unicode_ci,
  `docu_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_title2` text COLLATE utf8mb4_unicode_ci,
  `docu_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_title3` text COLLATE utf8mb4_unicode_ci,
  `docu_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docu_title4` text COLLATE utf8mb4_unicode_ci,
  `docu_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_attend` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_admissions`
--

INSERT INTO `student_admissions` (`id`, `admission_no`, `roll_no`, `class`, `section`, `session_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `category`, `religion`, `student_mobile`, `student_email`, `blood_group`, `height`, `weight`, `group_id`, `sibling`, `admission_date`, `nid_or_birthid`, `student_photo`, `father_name`, `father_phone`, `father_occupation`, `father_photo`, `mother_name`, `mother_phone`, `mother_occupation`, `mother_photo`, `if_guardian_is`, `guardian_name`, `guardian_relation`, `guardian_email`, `guardian_photo`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `current_address`, `permanent_address`, `route_id`, `vehicle_id`, `hostel_id`, `room_num`, `previous_school_detail`, `previous_school_note`, `docu_title1`, `docu_1`, `docu_title2`, `docu_2`, `docu_title3`, `docu_3`, `docu_title4`, `docu_4`, `last_attend`, `deleted_by`, `deleted_at`, `deleted_status`, `status`, `created_at`, `updated_at`) VALUES
(13, '458884', 'SR20702', 15, 5, 1, 'Emery', 'Nieves', 2, '2013-01-02', 51, 'Molestias similique', '012244775', 'qopud@mailinator.net', 6, 'Quia debitis possimu', 'Dolores nulla accusa', 1, 'NULL', '1992-05-09', 'Laboris laboriosam', 'th_1586201537.png', 'Neve Hall', '+1577241-7421', 'Quo enim quam beatae', 'th_1586201537.png', 'Robin Humphrey', '+1997469-2331', 'Nostrum enim dolores', 'th_1586201537.png', 'mother', 'Melanie Stuart', 'Mother', 'fyqy@mailinator.net', 'th_1586201537.png', '+1311262-6591', 'Facilis cum dolor re', 'Et officia quis aut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05-06-2020', NULL, NULL, NULL, '1', '2020-04-06 13:32:17', '2020-06-05 15:53:04'),
(14, '1477771', 'SR20701', 15, 5, 1, 'Rinah', 'Pollard', 2, '1989-04-04', 52, 'Sunt eos ipsum harum', '01447878777', 'ciqibasugy@mailinator.net', 3, 'Quasi iure vitae des', 'Qui est obcaecati cu', 3, 'NULL', '1975-04-30', 'Magnam cupiditate lo', 'th_1586259128.png', 'Jeanette Leach', '+1326215-2315', 'Assumenda deserunt o', 'th_1586259128.png', 'Kyle Valentine', '+1356469-6098', 'Nulla et voluptas ea', 'th_1586259128.png', 'father', 'Yuri Neal', 'Father', 'ragy@mailinator.com', 'th_1586259128.png', '+1575468-3549', 'Cupiditate voluptate', 'Voluptas necessitati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05-06-2020', NULL, NULL, NULL, '1', '2020-04-07 05:32:08', '2020-06-05 15:53:04'),
(15, '1114477', 'SR20703', 15, 5, 1, 'Leslie', 'Russell', 2, '1977-06-27', 51, 'Ipsam perferendis ut', '0144588885', 'finenumyw@mailinator.net', 6, 'Velit earum optio s', 'Ullam molestias quam', 4, 'NULL', '2001-03-26', 'Illum consectetur p', 'th_1586259175.png', 'Jakeem Tillman', '+1303662-6353', 'Porro quis ut maxime', 'th_1586259175.png', 'Arden Norman', '+1527218-5782', 'In esse ipsum est a', 'th_1586259175.png', 'mother', 'Heidi Todd', 'Father', 'pehaqy@mailinator.net', 'th_1586259176.png', '+1464904-3068', 'Magnam rem praesenti', 'Nam iure animi aspe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05-06-2020', NULL, NULL, NULL, '1', '2020-04-07 05:32:56', '2020-06-05 15:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `code` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `type`, `code`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bangle', 1, 11355, 1, NULL, NULL, NULL, '2020-03-07 09:55:40', '2020-05-14 16:05:13'),
(3, 'English 2nd part (Advance learner class 6)', 2, 120358, 1, NULL, NULL, NULL, '2020-03-07 10:17:44', '2020-03-11 12:03:36'),
(4, 'Physics', 1, 12588, 1, NULL, NULL, NULL, '2020-03-08 04:37:19', '2020-03-10 05:51:25'),
(5, 'English 1st part', 1, 12558, 1, NULL, NULL, NULL, '2020-03-10 05:54:44', '2020-03-10 05:54:44'),
(6, 'Math', 1, 15894, 1, NULL, NULL, NULL, '2020-03-10 05:55:14', '2020-03-10 05:55:14'),
(7, 'Higher Math', 1, 125514, 1, NULL, NULL, NULL, '2020-03-10 05:55:28', '2020-04-05 18:42:53'),
(8, 'Chemistry', 1, 447788, 1, NULL, NULL, NULL, '2020-05-16 12:51:36', '2020-05-16 12:51:36'),
(9, 'Charukola', 1, 11355, 1, NULL, NULL, NULL, '2020-05-17 00:32:02', '2020-05-17 00:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teachers`
--

CREATE TABLE `subject_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_teachers`
--

INSERT INTO `subject_teachers` (`id`, `class_id`, `section_id`, `group_id`, `subject_id`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 15, 5, NULL, 7, 1, NULL, NULL, NULL, 16, '2020-03-28 12:10:28', '2020-05-29 13:52:27'),
(3, 15, 5, NULL, 6, 1, NULL, NULL, NULL, 9, '2020-03-28 12:50:02', '2020-05-14 10:28:48'),
(4, 15, 6, 1, 4, 1, NULL, NULL, NULL, 16, '2020-03-28 12:57:15', '2020-05-14 10:28:49'),
(5, 26, 5, 1, 8, 1, NULL, NULL, NULL, 16, '2020-05-17 00:34:13', '2020-05-17 00:34:13'),
(6, 16, 5, 1, 7, 1, NULL, NULL, NULL, 16, '2020-05-21 13:12:18', '2020-05-21 13:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `upload_contents`
--

CREATE TABLE `upload_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `publish_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `attachment_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_all_class` tinyint(1) DEFAULT '0',
  `is_for_all_class` tinyint(1) DEFAULT NULL,
  `is_according_to_subject` tinyint(1) DEFAULT '1',
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_contents`
--

INSERT INTO `upload_contents` (`id`, `title`, `type_id`, `class_id`, `subject_id`, `publish_date`, `published_by`, `note`, `attachment_file`, `is_all_class`, `is_for_all_class`, `is_according_to_subject`, `is_published`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, 'Study Material For Bangla', 1, 15, NULL, '01.Apr.2020', NULL, NULL, '5ea5ef9d36ae3-Study Material For Bangla.txt', 0, NULL, 0, 1, NULL, NULL, NULL, '2020-04-26 14:31:25', '2020-06-05 09:34:20'),
(20, 'why laravel is good', 1, NULL, 1, '01.May.2020', NULL, 'sdasdas', '5ebd6f798b673-why laravel is good.txt', 0, 1, 1, 1, NULL, NULL, NULL, '2020-05-14 10:19:05', '2020-05-14 10:19:11'),
(21, 'Laravel is always best for creating the modern web application', 1, NULL, NULL, '01.May.2020', NULL, 'sdasdas', '5ec03bbf4b859-Laravel is always best for creating the modern web application.txt', 0, 1, 1, 1, NULL, NULL, NULL, '2020-05-16 13:15:11', '2020-05-16 13:15:11'),
(22, 'why laravel is good', 1, NULL, NULL, '14.May.2020', NULL, 'sdasdas', '5ec0dffe3a84e-why laravel is good.txt', 0, 1, 0, 1, NULL, NULL, NULL, '2020-05-17 00:55:58', '2020-05-17 00:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_made` bigint(20) DEFAULT NULL,
  `driver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `driver_license` bigint(20) DEFAULT NULL,
  `sit_quantity` bigint(20) NOT NULL DEFAULT '0',
  `driver_contact` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_number`, `vehicle_model`, `year_made`, `driver_id`, `driver_license`, `sit_quantity`, `driver_contact`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'D-702', 'Volvo-2018', 2019, 14, 12345678, 50, NULL, 1, NULL, NULL, NULL, '2020-03-03 23:04:08', '2020-03-29 07:17:55'),
(4, 'D-703', 'Volvo-2020(2)', 2020, 18, 12345678, 20, NULL, 1, NULL, NULL, NULL, '2020-03-03 23:04:31', '2020-04-05 05:47:46'),
(5, 'D-704', 'Volvo-2020', 2020, 18, 12345678, 40, NULL, 1, NULL, NULL, '2020-03-13 23:27:46', '2020-03-03 23:04:47', '2020-04-05 05:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_headers`
--

CREATE TABLE `voucher_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_status` tinyint(1) DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_headers`
--

INSERT INTO `voucher_headers` (`id`, `name`, `status`, `deleted_status`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Student Fee Collection', 1, NULL, NULL, NULL, '2020-05-01 15:41:22', '2020-05-01 17:44:24'),
(3, 'Office Rent', 1, NULL, NULL, NULL, '2020-05-01 15:41:33', '2020-05-01 15:41:33'),
(4, 'Getting Donation', 1, NULL, NULL, NULL, '2020-05-01 15:41:46', '2020-05-01 15:41:46'),
(5, 'Student Fee Collection Edited', 1, 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-05-01 21:48:30', '2020-05-01 15:46:06', '2020-05-01 15:48:30'),
(6, 'Student Fee Collection 2', 1, 1, '{\"id\":8,\"guard\":\"admin\"}', '2020-05-01 21:48:27', '2020-05-01 15:46:37', '2020-05-01 15:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admit_card_templates`
--
ALTER TABLE `admit_card_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admit_card_templates_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `attachment_types`
--
ALTER TABLE `attachment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_deposits_bank_id_foreign` (`bank_id`),
  ADD KEY `bank_deposits_bank_account_id_foreign` (`bank_account_id`),
  ADD KEY `bank_deposits_voucher_header_id_foreign` (`voucher_header_id`);

--
-- Indexes for table `bank_withdraws`
--
ALTER TABLE `bank_withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_withdraws_bank_id_foreign` (`bank_id`),
  ADD KEY `bank_withdraws_bank_account_id_foreign` (`bank_account_id`),
  ADD KEY `bank_withdraws_voucher_header_id_foreign` (`voucher_header_id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_sections`
--
ALTER TABLE `class_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_sections_class_id_foreign` (`class_id`),
  ADD KEY `class_sections_section_id_foreign` (`section_id`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_subjects_class_section_id_foreign` (`class_section_id`),
  ADD KEY `class_subjects_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_teachers_class_section_id_foreign` (`class_section_id`),
  ADD KEY `class_teachers_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `class_timetables`
--
ALTER TABLE `class_timetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_timetables_class_id_foreign` (`class_id`),
  ADD KEY `class_timetables_section_id_foreign` (`section_id`),
  ADD KEY `class_timetables_subject_id_foreign` (`subject_id`),
  ADD KEY `class_timetables_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_user_id_foreign` (`user_id`);

--
-- Indexes for table `current_day_attendances`
--
ALTER TABLE `current_day_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `current_day_attendances_class_id_foreign` (`class_id`),
  ADD KEY `current_day_attendances_section_id_foreign` (`section_id`),
  ADD KEY `current_day_attendances_student_id_foreign` (`student_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_salaries_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_exam_term_id_foreign` (`exam_term_id`);

--
-- Indexes for table `exam_attendances`
--
ALTER TABLE `exam_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_attendances_class_id_foreign` (`class_id`),
  ADD KEY `exam_attendances_section_id_foreign` (`section_id`),
  ADD KEY `exam_attendances_student_id_foreign` (`student_id`),
  ADD KEY `exam_attendances_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_attendances_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `exam_distributions`
--
ALTER TABLE `exam_distributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_halls`
--
ALTER TABLE `exam_halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_schedules_class_id_foreign` (`class_id`),
  ADD KEY `exam_schedules_section_id_foreign` (`section_id`),
  ADD KEY `exam_schedules_exam_hall_id_foreign` (`exam_hall_id`),
  ADD KEY `exam_schedules_subject_id_foreign` (`subject_id`),
  ADD KEY `exam_schedules_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `exam_terms`
--
ALTER TABLE `exam_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expanses`
--
ALTER TABLE `expanses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expanses_expanse_header_id_foreign` (`expanse_header_id`);

--
-- Indexes for table `expanse_headers`
--
ALTER TABLE `expanse_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_discounts`
--
ALTER TABLE `fees_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_groups`
--
ALTER TABLE `fees_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_masters`
--
ALTER TABLE `fees_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_reminders`
--
ALTER TABLE `fees_reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_types`
--
ALTER TABLE `fees_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_income_header_id_foreign` (`income_header_id`);

--
-- Indexes for table `income_headers`
--
ALTER TABLE `income_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_categories`
--
ALTER TABLE `inventory_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_applies`
--
ALTER TABLE `leave_applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_applies_employee_id_foreign` (`employee_id`),
  ADD KEY `leave_applies_leave_type_id_foreign` (`leave_type_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_drafts`
--
ALTER TABLE `mail_drafts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_drafts_contract_id_foreign` (`contract_id`);

--
-- Indexes for table `mark_entires`
--
ALTER TABLE `mark_entires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_entires_exam_id_foreign` (`exam_id`),
  ADD KEY `mark_entires_student_id_foreign` (`student_id`),
  ADD KEY `mark_entires_class_id_foreign` (`class_id`),
  ADD KEY `mark_entires_section_id_foreign` (`section_id`),
  ADD KEY `mark_entires_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `mark_ranges`
--
ALTER TABLE `mark_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- Indexes for table `period_attendances`
--
ALTER TABLE `period_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `period_attendances_class_id_foreign` (`class_id`),
  ADD KEY `period_attendances_section_id_foreign` (`section_id`),
  ADD KEY `period_attendances_subject_id_foreign` (`subject_id`),
  ADD KEY `period_attendances_student_id_foreign` (`student_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route_vehicles`
--
ALTER TABLE `route_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_vehicles_route_id_foreign` (`route_id`),
  ADD KEY `route_vehicles_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_admissions`
--
ALTER TABLE `student_admissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_admissions_admission_no_unique` (`admission_no`),
  ADD UNIQUE KEY `student_admissions_roll_no_unique` (`roll_no`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_teachers_class_id_foreign` (`class_id`),
  ADD KEY `subject_teachers_section_id_foreign` (`section_id`),
  ADD KEY `subject_teachers_group_id_foreign` (`group_id`),
  ADD KEY `subject_teachers_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_teachers_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `upload_contents`
--
ALTER TABLE `upload_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upload_contents_type_id_foreign` (`type_id`),
  ADD KEY `upload_contents_class_id_foreign` (`class_id`),
  ADD KEY `upload_contents_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_headers`
--
ALTER TABLE `voucher_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admit_card_templates`
--
ALTER TABLE `admit_card_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `attachment_types`
--
ALTER TABLE `attachment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bank_withdraws`
--
ALTER TABLE `bank_withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `class_sections`
--
ALTER TABLE `class_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;

--
-- AUTO_INCREMENT for table `class_teachers`
--
ALTER TABLE `class_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `class_timetables`
--
ALTER TABLE `class_timetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1519;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `current_day_attendances`
--
ALTER TABLE `current_day_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_attendances`
--
ALTER TABLE `exam_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `exam_distributions`
--
ALTER TABLE `exam_distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_halls`
--
ALTER TABLE `exam_halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1764;

--
-- AUTO_INCREMENT for table `exam_terms`
--
ALTER TABLE `exam_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expanses`
--
ALTER TABLE `expanses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `expanse_headers`
--
ALTER TABLE `expanse_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_discounts`
--
ALTER TABLE `fees_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fees_groups`
--
ALTER TABLE `fees_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fees_masters`
--
ALTER TABLE `fees_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fees_reminders`
--
ALTER TABLE `fees_reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fees_types`
--
ALTER TABLE `fees_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `income_headers`
--
ALTER TABLE `income_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_categories`
--
ALTER TABLE `inventory_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_applies`
--
ALTER TABLE `leave_applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mail_drafts`
--
ALTER TABLE `mail_drafts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mark_entires`
--
ALTER TABLE `mark_entires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `mark_ranges`
--
ALTER TABLE `mark_ranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `period_attendances`
--
ALTER TABLE `period_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `route_vehicles`
--
ALTER TABLE `route_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_admissions`
--
ALTER TABLE `student_admissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upload_contents`
--
ALTER TABLE `upload_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voucher_headers`
--
ALTER TABLE `voucher_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admit_card_templates`
--
ALTER TABLE `admit_card_templates`
  ADD CONSTRAINT `admit_card_templates_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  ADD CONSTRAINT `bank_deposits_bank_account_id_foreign` FOREIGN KEY (`bank_account_id`) REFERENCES `bank_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bank_deposits_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bank_deposits_voucher_header_id_foreign` FOREIGN KEY (`voucher_header_id`) REFERENCES `voucher_headers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_withdraws`
--
ALTER TABLE `bank_withdraws`
  ADD CONSTRAINT `bank_withdraws_bank_account_id_foreign` FOREIGN KEY (`bank_account_id`) REFERENCES `bank_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bank_withdraws_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bank_withdraws_voucher_header_id_foreign` FOREIGN KEY (`voucher_header_id`) REFERENCES `voucher_headers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_sections`
--
ALTER TABLE `class_sections`
  ADD CONSTRAINT `class_sections_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_sections_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD CONSTRAINT `class_subjects_class_section_id_foreign` FOREIGN KEY (`class_section_id`) REFERENCES `class_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_teachers`
--
ALTER TABLE `class_teachers`
  ADD CONSTRAINT `class_teachers_class_section_id_foreign` FOREIGN KEY (`class_section_id`) REFERENCES `class_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_teachers_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_timetables`
--
ALTER TABLE `class_timetables`
  ADD CONSTRAINT `class_timetables_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_timetables_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_timetables_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_timetables_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `current_day_attendances`
--
ALTER TABLE `current_day_attendances`
  ADD CONSTRAINT `current_day_attendances_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `current_day_attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `current_day_attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_admissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD CONSTRAINT `employee_attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD CONSTRAINT `employee_salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_exam_term_id_foreign` FOREIGN KEY (`exam_term_id`) REFERENCES `exam_terms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_attendances`
--
ALTER TABLE `exam_attendances`
  ADD CONSTRAINT `exam_attendances_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_attendances_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_admissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_attendances_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_schedules`
--
ALTER TABLE `exam_schedules`
  ADD CONSTRAINT `exam_schedules_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_schedules_exam_hall_id_foreign` FOREIGN KEY (`exam_hall_id`) REFERENCES `exam_halls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_schedules_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_schedules_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_schedules_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expanses`
--
ALTER TABLE `expanses`
  ADD CONSTRAINT `expanses_expanse_header_id_foreign` FOREIGN KEY (`expanse_header_id`) REFERENCES `expanse_headers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_income_header_id_foreign` FOREIGN KEY (`income_header_id`) REFERENCES `income_headers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_applies`
--
ALTER TABLE `leave_applies`
  ADD CONSTRAINT `leave_applies_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leave_applies_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mail_drafts`
--
ALTER TABLE `mail_drafts`
  ADD CONSTRAINT `mail_drafts_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mark_entires`
--
ALTER TABLE `mark_entires`
  ADD CONSTRAINT `mark_entires_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_entires_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_entires_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_entires_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_admissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_entires_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `period_attendances`
--
ALTER TABLE `period_attendances`
  ADD CONSTRAINT `period_attendances_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `period_attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `period_attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student_admissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `period_attendances_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD CONSTRAINT `subject_teachers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_teachers_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_teachers_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upload_contents`
--
ALTER TABLE `upload_contents`
  ADD CONSTRAINT `upload_contents_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upload_contents_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upload_contents_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `attachment_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
