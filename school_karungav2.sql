-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2018 at 06:26 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_karungav2`
--

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `payee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `particulars` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `discipline_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `punishment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_committed` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nid` int(11) NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `created_at`, `updated_at`) VALUES
(1, 'Opener', '2018-01-25 00:58:31', '2018-01-25 00:58:31'),
(2, 'Midterm', '2018-01-25 00:58:31', '2018-01-25 00:58:31'),
(3, 'Endterm', '2018-01-25 00:58:31', '2018-01-25 00:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votehead_id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `adm_no`, `votehead_id`, `term_id`, `year`, `amount`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, '122', 1, 1, 2018, 1500, 'Cash', '2018-01-25 02:06:28', '2018-01-25 02:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `form` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `form`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-01-14 09:16:39', '2018-01-14 09:16:39'),
(2, 2, '2018-01-14 09:16:46', '2018-01-17 19:51:48'),
(3, 3, '2018-01-17 19:52:37', '2018-01-17 19:52:37'),
(4, 4, '2018-01-17 19:52:43', '2018-01-17 19:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `grading_systems`
--

CREATE TABLE `grading_systems` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_point` int(11) NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grading_systems`
--

INSERT INTO `grading_systems` (`id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'A', 12, 92, 100, 'Excellent', '2017-03-09 01:41:11', '2017-03-10 21:23:32'),
(2, 'A-', 11, 84, 91, 'Very Good', '2017-03-09 01:41:38', '2017-03-10 21:24:02'),
(3, 'B+', 10, 76, 83, 'Very Good', '2017-03-09 01:42:13', '2017-03-09 01:42:13'),
(4, 'B', 9, 67, 75, 'Good', '2017-03-09 01:42:46', '2017-03-09 01:42:46'),
(5, 'B-', 8, 60, 66, 'Good', '2017-03-09 01:43:17', '2017-03-09 01:43:17'),
(6, 'C+', 7, 51, 59, 'Good', '2017-03-09 01:43:45', '2017-03-09 01:43:45'),
(7, 'C', 6, 46, 50, 'Average', '2017-03-09 01:44:16', '2017-03-09 16:03:02'),
(8, 'C-', 5, 41, 45, 'Average', '2017-03-09 15:59:35', '2017-03-09 16:03:27'),
(9, 'D+', 4, 36, 40, 'Average', '2017-03-09 16:00:37', '2017-03-09 16:00:37'),
(10, 'D', 3, 30, 35, 'Weak', '2017-03-09 16:02:37', '2017-03-09 16:02:37'),
(11, 'D-', 2, 25, 29, 'Weak', '2017-03-09 16:06:01', '2017-03-09 16:06:01'),
(12, 'E', 1, 0, 24, 'Poor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `stream_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `adm_no`, `year`, `term_id`, `form_id`, `stream_id`, `amount`, `balance`, `created_at`, `updated_at`) VALUES
(1, '122', 2018, 1, 1, 2, 3400, 1900, '2018-01-25 02:04:49', '2018-01-25 02:04:49'),
(2, '3487', 2018, 1, 1, 2, 3400, 3400, '2018-01-25 02:04:49', '2018-01-25 02:04:49'),
(3, '128', 2018, 1, 1, 2, 3400, 3400, '2018-01-25 02:04:49', '2018-01-25 02:04:49');

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
(3, '2018_01_09_160555_laratrust_setup_tables', 1),
(4, '2018_01_10_190341_create_settings_table', 1),
(5, '2018_01_10_190429_create_streams_table', 1),
(6, '2018_01_10_190612_create_forms_table', 1),
(7, '2018_01_10_190927_create_subject_groups_table', 1),
(8, '2018_01_10_191001_create_subjects_table', 1),
(9, '2018_01_10_191032_create_students_table', 1),
(10, '2018_01_10_191055_create_disciplines_table', 1),
(11, '2018_01_10_191200_create_terms_table', 1),
(12, '2018_01_10_191403_create_exams_table', 1),
(13, '2018_01_10_191441_create_results_table', 1),
(14, '2018_01_10_191454_create_scores_table', 1),
(15, '2018_01_10_191608_create_voteheads_table', 1),
(16, '2018_01_10_191823_create_invoices_table', 1),
(17, '2018_01_10_191917_create_fees_table', 1),
(18, '2018_01_10_191930_create_payments_table', 1),
(19, '2018_01_10_193822_create_grading_systems_table', 1),
(20, '2018_01_17_063516_add_academic_year_to_students_table', 1),
(21, '2018_01_20_215231_create_deposits_table', 1),
(22, '2018_01_24_121208_create_employees_table', 1),
(23, '2018_01_24_121427_create_teachers_table', 1);

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
  `id` int(10) UNSIGNED NOT NULL,
  `payee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `particulars` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votehead_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(12, 'CREATE-USER', 'CREATE-USER', 'CREATE-USER', '2018-01-17 20:14:15', '2018-01-17 20:14:15'),
(13, 'EDIT-USER', 'EDIT-USER', 'EDIT-USER', '2018-01-17 20:14:35', '2018-01-17 20:14:35'),
(14, 'VIEW-USER', 'VIEW-USER', 'VIEW-USER', '2018-01-17 20:14:52', '2018-01-17 20:14:52'),
(15, 'DELETE-USER', 'DELETE-USER', 'DELETE-USER', '2018-01-17 20:15:11', '2018-01-17 20:15:11'),
(16, 'CREATE-ROLE', 'CREATE-ROLE', 'CREATE-ROLE', '2018-01-17 20:15:51', '2018-01-17 20:15:51'),
(17, 'EDIT-ROLE', 'EDIT-ROLE', 'EDIT-ROLE', '2018-01-17 20:16:12', '2018-01-17 20:16:12'),
(18, 'VIEW-ROLES', 'VIEW-ROLES', 'VIEW-ROLES', '2018-01-17 20:16:47', '2018-01-17 20:16:47'),
(19, 'DELETE-ROLE', 'DELETE-ROLE', 'DELETE-ROLE', '2018-01-17 20:17:10', '2018-01-17 20:17:10'),
(20, 'CREATE-CLASS', 'CREATE-CLASS', 'CREATE-CLASS', '2018-01-17 20:18:17', '2018-01-17 20:18:17'),
(21, 'EDIT-CLASS', 'EDIT-CLASS', 'EDIT-CLASS', '2018-01-17 20:18:39', '2018-01-17 20:18:39'),
(22, 'VIEW-CLASS', 'VIEW-CLASS', 'VIEW-CLASS', '2018-01-17 20:18:56', '2018-01-17 20:18:56'),
(23, 'DELETE-CLASS', 'DELETE-CLASS', 'DELETE-CLASS', '2018-01-17 20:19:13', '2018-01-17 20:19:13'),
(24, 'CREATE-STUDENT', 'CREATE-STUDENT', 'CREATE-STUDENT', '2018-01-17 20:19:40', '2018-01-17 20:19:40'),
(25, 'VIEW-STUDENT', 'VIEW-STUDENT', 'VIEW-STUDENT', '2018-01-17 20:19:58', '2018-01-17 20:19:58'),
(26, 'EDIT-STUDENT', 'EDIT-STUDENT', 'EDIT-STUDENT', '2018-01-17 20:20:38', '2018-01-17 20:20:38'),
(27, 'DELETE-STUDENT', 'DELETE-STUDENT', 'DELETE-STUDENT', '2018-01-17 20:21:02', '2018-01-17 20:21:02'),
(28, 'SUBMIT-MARKS', 'SUBMIT-MARKS', 'SUBMIT-MARKS', '2018-01-17 20:21:58', '2018-01-17 20:21:58'),
(29, 'VIEW-RESULTS', 'VIEW-RESULTS', 'VIEW-RESULTS', '2018-01-17 20:22:26', '2018-01-17 20:22:26'),
(30, 'PROMOTE-STUDENTS', 'PROMOTE-STUDENTS', 'PROMOTE-STUDENTS', '2018-01-17 20:22:48', '2018-01-17 20:22:48'),
(31, 'CREATE-GRADING-SYSTEM', 'CREATE-GRADING-SYSTEM', 'CREATE-GRADING-SYSTEM', '2018-01-17 20:23:25', '2018-01-17 20:23:25'),
(32, 'VIEW-GRADING-SYSTEM', 'VIEW-GRADING-SYSTEM', 'VIEW-GRADING-SYSTEM', '2018-01-17 20:23:40', '2018-01-17 20:23:40'),
(33, 'EDIT-GRADING-SYSTEM', 'EDIT-GRADING-SYSTEM', 'EDIT-GRADING-SYSTEM', '2018-01-17 20:23:55', '2018-01-17 20:23:55'),
(34, 'DELETE-GRADING-SYSTEM', 'DELETE-GRADING-SYSTEM', 'DELETE-GRADING-SYSTEM', '2018-01-17 20:25:05', '2018-01-17 20:25:05'),
(35, 'ADD-DISCIPLINE-CASE', 'ADD-DISCIPLINE-CASE', 'ADD-DISCIPLINE-CASE', '2018-01-17 20:27:11', '2018-01-17 20:27:11'),
(36, 'VIEW-INDISCIPLINE-CASES', 'VIEW-INDISCIPLINE-CASES', 'VIEW-INDISCIPLINE-CASES', '2018-01-17 20:28:00', '2018-01-17 20:28:00'),
(37, 'DELETE-INDISCIPLINE-CASE', 'DELETE-INDISCIPLINE-CASE', 'DELETE-INDISCIPLINE-CASES', '2018-01-17 20:28:27', '2018-01-17 20:28:27'),
(38, 'MANAGE-SETTINGS', 'MANAGE-SETTINGS', 'MANAGE-SETTINGS', '2018-01-17 20:29:29', '2018-01-17 20:29:29'),
(39, 'CREATE-SUBJECT', 'CREATE-SUBJECT', 'CREATE-SUBJECT', '2018-01-17 20:30:03', '2018-01-17 20:30:03'),
(40, 'EDIT-SUBJECT', 'EDIT-SUBJECT', 'EDIT-SUBJECT', '2018-01-17 20:30:23', '2018-01-17 20:30:23'),
(44, 'DELETE-SUBJECT', 'DELETE-SUBJECT', 'DELETE-SUBJECT', '2018-01-17 20:32:41', '2018-01-17 20:32:41'),
(45, 'VIEW-SUBJECT', 'VIEW-SUBJECT', 'VIEW-SUBJECT', '2018-01-17 20:33:09', '2018-01-17 20:33:09'),
(46, 'CREATE-SUBJECT-GROUP', 'CREATE-SUBJECT-GROUP', 'CREATE-SUBJECT-GROUP', '2018-01-17 20:33:40', '2018-01-17 20:33:40'),
(47, 'EDIT-SUBJECT-GROUP', 'EDIT-SUBJECT-GROUP', 'EDIT-SUBJECT-GROUP', '2018-01-17 20:33:59', '2018-01-17 20:33:59'),
(49, 'VIEW-SUBJECT-GROUP', 'VIEW-SUBJECT-GROUP', 'VIEW-SUBJECT-GROUP', '2018-01-17 20:35:00', '2018-01-17 20:35:00'),
(50, 'DELETE-SUBJECT-GROUP', 'DELETE-SUBJECT-GROUP', 'DELETE-SUBJECT-GROUP', '2018-01-17 20:35:27', '2018-01-17 20:35:27'),
(51, 'CREATE-STREAM', 'CREATE-STREAM', 'CREATE-STREAM', '2018-01-17 20:35:54', '2018-01-17 20:35:54'),
(52, 'EDIT-STREAM', 'EDIT-STREAM', 'EDIT-STREAM', '2018-01-17 20:36:10', '2018-01-17 20:36:10'),
(53, 'VIEW-STREAMS', 'VIEW-STREAMS', 'VIEW-STREAMS', '2018-01-17 20:36:26', '2018-01-17 20:36:26'),
(54, 'DELETE-STREAM', 'DELETE-STREAM', 'DELETE-STREAM', '2018-01-17 20:36:49', '2018-01-17 20:36:49'),
(55, 'DELETE-EXAM', 'DELETE-EXAM', 'DELETE-EXAM', '2018-01-17 20:38:20', '2018-01-17 20:38:20'),
(56, 'CREATE-EXAM', 'CREATE-EXAM', 'CREATE-EXAM', '2018-01-17 20:38:36', '2018-01-17 20:38:36'),
(57, 'VIEW-EXAM', 'VIEW-EXAM', 'VIEW-EXAM', '2018-01-17 20:38:52', '2018-01-17 20:38:52'),
(58, 'EDIT-EXAM', 'EDIT-EXAM', 'EDIT-EXAM', '2018-01-17 20:39:22', '2018-01-17 20:39:22'),
(59, 'CREATE-VOTEHEAD', 'CREATE-VOTEHEAD', 'CREATE-VOTEHEAD', '2018-01-17 20:39:56', '2018-01-17 20:39:56'),
(60, 'VIEW-VOTEHEAD', 'VIEW-VOTEHEAD', 'VIEW-VOTEHEAD', '2018-01-17 20:40:26', '2018-01-17 20:40:26'),
(61, 'EDIT-VOTEHEAD', 'EDIT-VOTEHEAD', 'EDIT-VOTEHEAD', '2018-01-17 20:40:41', '2018-01-17 20:40:41'),
(62, 'DELETE-VOTEHEAD', 'DELETE-VOTEHEAD', 'DELETE-VOTEHEAD', '2018-01-17 20:43:28', '2018-01-17 20:43:28'),
(63, 'CREATE-STAFF-CATEGORY', 'CREATE-STAFF-CATEGORY', 'CREATE-STAFF-CATEGORY', '2018-01-17 20:45:13', '2018-01-17 20:45:13'),
(64, 'EDIT-STAFF-CATEGORY', 'EDIT-STAFF-CATEGORY', 'EDIT-STAFF-CATEGORY', '2018-01-17 20:45:29', '2018-01-17 20:45:29'),
(65, 'VIEW-STAFF-CATEGORY', 'VIEW-STAFF-CATEGORY', 'VIEW-STAFF-CATEGORY', '2018-01-17 20:45:45', '2018-01-17 20:45:45'),
(66, 'DELETE-STAFF-CATEGORY', 'DELETE-STAFF-CATEGORY', 'DELETE-STAFF-CATEGORY', '2018-01-17 20:46:01', '2018-01-17 20:46:01'),
(67, 'CREATE-STAFF', 'CREATE-STAFF', 'CREATE-STAFF', '2018-01-17 20:47:34', '2018-01-17 20:47:34'),
(68, 'EDIT-STAFF', 'EDIT-STAFF', 'EDIT-STAFF', '2018-01-17 20:48:38', '2018-01-17 20:48:38'),
(69, 'VIEW-STAFF', 'VIEW-STAFF', 'VIEW-STAFF', '2018-01-17 20:48:54', '2018-01-17 20:48:54'),
(70, 'DELETE-STAFF', 'DELETE-STAFF', 'DELETE-STAFF', '2018-01-17 20:49:11', '2018-01-17 20:49:11'),
(71, 'UPDATE-PROFILE', 'UPDATE-PROFILE', 'UPDATE-PROFILE', '2018-01-17 20:49:52', '2018-01-17 20:49:52'),
(72, 'CHANGE-PASSWORD', 'CHANGE-PASSWORD', 'CHANGE-PASSWORD', '2018-01-17 20:50:19', '2018-01-17 20:50:19'),
(73, 'CREATE-PERMISSION', 'CREATE-PERMISSION', 'CREATE-PERMISSION', '2018-02-22 00:54:02', '2018-02-22 00:54:02'),
(74, 'VIEW-PERMISSION', 'VIEW-PERMISSION', 'VIEW-PERMISSION', '2018-02-22 00:56:44', '2018-02-22 00:56:44'),
(75, 'DELETE-PERMISSION', 'DELETE-PERMISSION', 'DELETE-PERMISSION', '2018-02-22 00:57:17', '2018-02-22 00:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 6),
(36, 6),
(37, 6),
(38, 6),
(39, 6),
(40, 6),
(44, 6),
(45, 6),
(46, 6),
(47, 6),
(49, 6),
(50, 6),
(51, 6),
(52, 6),
(53, 6),
(54, 6),
(55, 6),
(56, 6),
(57, 6),
(58, 6),
(59, 6),
(60, 6),
(61, 6),
(62, 6),
(63, 6),
(64, 6),
(65, 6),
(66, 6),
(67, 6),
(68, 6),
(69, 6),
(70, 6),
(71, 6),
(72, 6),
(73, 6),
(74, 6),
(75, 6);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `stream_id` int(10) UNSIGNED NOT NULL,
  `score` int(11) DEFAULT NULL,
  `initials` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `adm_no`, `year`, `term_id`, `exam_id`, `subject_id`, `form_id`, `stream_id`, `score`, `initials`, `created_at`, `updated_at`) VALUES
(1, '2340', 2018, 1, 1, 1, 1, 2, 14, '', '2018-02-17 01:54:55', '2018-02-17 01:54:55'),
(2, '3487', 2018, 1, 1, 1, 1, 2, 65, '', '2018-02-17 01:54:55', '2018-02-17 01:54:55'),
(3, '128', 2018, 1, 1, 1, 1, 2, 55, '', '2018-02-17 01:54:55', '2018-02-17 01:54:55'),
(4, '2340', 2018, 1, 1, 2, 1, 2, 45, 'CD', '2018-02-17 02:11:07', '2018-02-17 02:11:07'),
(5, '3487', 2018, 1, 1, 2, 1, 2, 44, 'CD', '2018-02-17 02:11:07', '2018-02-17 02:11:07'),
(6, '128', 2018, 1, 1, 2, 1, 2, 67, 'CD', '2018-02-17 02:11:07', '2018-02-17 02:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(5, 'teacher', 'TEACHER', 'TEACHER', '2018-01-14 06:00:06', '2018-01-14 06:00:06'),
(6, 'Principal', 'School Principal', 'School Principal', '2018-01-17 20:52:44', '2018-01-17 20:54:26'),
(7, 'Deputy Principal', 'Deputy Principal', 'Deputy Principal of the school', '2018-01-17 20:54:08', '2018-01-17 20:54:08'),
(8, 'Secretary', 'School Secretary', 'School Secretary', '2018-01-17 20:56:33', '2018-01-17 20:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(6, 1, 'App\\User'),
(6, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `adm_no`, `year`, `term_id`, `exam_id`, `form_id`, `stream_id`, `total`, `created_at`, `updated_at`) VALUES
(1, '128', 2018, 1, 1, 1, 2, 122, '2018-02-17 01:54:56', '2018-02-17 02:11:07'),
(2, '2340', 2018, 1, 1, 1, 2, 59, '2018-02-17 01:54:56', '2018-02-17 02:11:07'),
(3, '3487', 2018, 1, 1, 1, 2, 109, '2018-02-17 01:54:56', '2018-02-17 02:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `box_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motto` text COLLATE utf8mb4_unicode_ci,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `school_name`, `box_address`, `location`, `motto`, `vision`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Karunga Secondary School', 'P.O Box 40 Mwingi', 'Mwingi', 'Knowledge is Strength', 'Learn to serve', 'logo.jpg', '2018-01-14 04:16:13', '2018-01-14 04:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` int(10) UNSIGNED NOT NULL,
  `stream_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `stream_name`, `created_at`, `updated_at`) VALUES
(2, 'A', '2018-01-14 08:51:12', '2018-01-14 09:01:46'),
(3, 'B', '2018-01-17 19:52:13', '2018-01-17 19:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `stream_id` int(10) UNSIGNED NOT NULL,
  `kcpe_entry` int(11) NOT NULL,
  `parent_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disability` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_condition` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `boarding` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student.png',
  `academic_year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `adm_no`, `fname`, `lname`, `dob`, `doa`, `gender`, `religion`, `form_id`, `stream_id`, `kcpe_entry`, `parent_name`, `parent_contact`, `disability`, `special_condition`, `boarding`, `photo`, `academic_year`, `created_at`, `updated_at`) VALUES
(1, '122', 'Erastus', 'Siocha', '2018-01-15', '2018-01-15', 'Female', 'Christian', 1, 2, 345, 'Erastus Siocha', '0700487357', 'Mobility', 'None', 0, '1516246455.jpg', 2017, '2018-01-15 12:07:34', '2018-01-17 21:34:15'),
(4, '2340', 'james', 'kimanzi', '2018-01-17', '2018-01-17', 'Female', 'Muslim', 1, 2, 555, 'Erastus Siocha', '0700487357', 'None', 'none', 1, '1516246319.jpg', 2018, '2018-01-16 15:41:14', '2018-01-17 21:31:59'),
(5, '3487', 'john', 'kimanzi', '2018-01-18', '2018-01-18', 'Male', 'Christian', 1, 2, 432, 'Erastus Siocha', '0700487357', 'Mobility', 'none', 0, 'student.png', 2018, '2018-01-17 21:00:12', '2018-01-17 21:31:11'),
(6, '128', 'Erastus', 'Siocha', '2018-01-18', '2018-01-18', 'Female', 'Christian', 1, 2, 6666, 'Erastus Siocha', '0700487357', 'Mobility', 'none', 0, 'student.png', 2018, '2018-01-17 21:21:42', '2018-01-17 21:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `subject_code` int(11) NOT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `group_id`, `subject_code`, `subject_name`, `created_at`, `updated_at`) VALUES
(1, 1, 101, 'ENGLISH', '2018-02-22 00:33:29', '2018-02-22 00:33:29'),
(2, 1, 102, 'KISWAHILI', '2018-02-22 00:34:00', '2018-02-22 00:34:00'),
(3, 1, 103, 'MATHEMATICS', '2018-02-22 00:34:44', '2018-02-22 00:34:44'),
(4, 1, 104, 'BIOLOGY', '2018-02-22 00:35:03', '2018-02-22 00:35:03'),
(5, 1, 105, 'PHYSICS', '2018-02-22 00:35:28', '2018-02-22 00:35:28'),
(6, 1, 106, 'CHEMISTRY', '2018-02-22 00:35:54', '2018-02-22 00:35:54'),
(7, 1, 107, 'HISTORY', '2018-02-22 00:36:17', '2018-02-22 00:36:17'),
(8, 1, 108, 'GEOGRAPHY', '2018-02-22 00:36:33', '2018-02-22 00:36:33'),
(9, 1, 109, 'CRE', '2018-02-22 00:37:14', '2018-02-22 00:37:14'),
(10, 1, 110, 'AGRICULTURE', '2018-02-22 00:37:53', '2018-02-22 00:37:53'),
(11, 1, 111, 'BUSINESS', '2018-02-22 00:38:10', '2018-02-22 00:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `subject_groups`
--

CREATE TABLE `subject_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_groups`
--

INSERT INTO `subject_groups` (`id`, `group_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'COMPULSORY', '2017-03-04 01:12:57', '2017-03-04 01:12:57'),
(2, '2', 'SCIENCES', '2017-03-04 01:13:13', '2017-03-04 01:13:13'),
(3, '3', 'HUMANITIES', '2017-03-04 01:13:26', '2017-03-04 01:13:26'),
(4, '4', 'TECHNICALS', '2017-03-04 01:13:40', '2017-03-04 01:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nid` int(11) NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tsc_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `nid`, `fname`, `lname`, `initials`, `tsc_no`, `dob`, `gender`, `religion`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 2, 23456678, 'John', 'Kilombo', 'JK', '43567', '2018-01-25', 'Male', 'Muslim', '702759950', 'john@yahoo.com', '2018-01-25 01:40:29', '2018-01-25 01:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `term` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `term`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-01-25 00:58:31', '2018-01-25 00:58:31'),
(2, 2, '2018-01-25 00:58:31', '2018-01-25 00:58:31'),
(3, 3, '2018-01-25 00:58:31', '2018-01-25 00:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `initials`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chandy David', 'CD', 'chandydavid88@gmail.com', '$2y$10$7wVfst/HyY4GnG1QwRuqmebpMmPyd9YgPDuuaZpXWxDDBQlSFZ.ZS', 'ucizbTzTcUPPcbgSV5x6DHgnfQO4BJY3vGyKka1NcWauAiRCRY6jhNT0dgW3', '2018-01-25 01:10:41', '2018-01-25 01:10:41'),
(2, 'John Kilombo', 'JK', 'john@yahoo.com', '$2y$10$bzfSREXtYXLaCKwkpZwLk.Gfg2WtWtxY9rf79CHI7iu710MFy8Q3S', NULL, '2018-01-25 01:40:29', '2018-01-25 01:40:29'),
(3, 'System Administrator', '', 'admin@karunga.com', '$2y$10$PqrIrvIWIAfxiY3HACSXkOLpO/v38DzdETXDI/V6GwWzrGlAX.tgS', NULL, '2018-02-22 01:01:38', '2018-02-22 01:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `voteheads`
--

CREATE TABLE `voteheads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voteheads`
--

INSERT INTO `voteheads` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tuition Fees', '2017-05-06 06:30:28', '2017-05-07 09:04:08'),
(2, 'Boarding Fee', '2017-05-07 09:04:29', '2017-05-07 09:04:29'),
(3, 'Activity Fees', '2017-05-07 09:04:36', '2017-05-07 09:04:36'),
(4, 'Repairs,Maintenance & Improvement', '2017-05-07 09:04:41', '2017-05-07 09:04:41'),
(5, 'Medical Fees', '2017-05-07 09:04:49', '2017-05-07 09:04:49'),
(6, 'Local Travelling and Transport', '2017-05-07 09:04:59', '2017-05-07 09:04:59'),
(7, 'E.W & C', '2017-05-07 09:05:11', '2017-05-07 09:05:11'),
(8, 'Personal Emolument', '2017-05-07 09:05:19', '2017-05-07 09:05:19'),
(9, 'Development Fund', '2017-05-07 09:05:25', '2017-05-07 09:05:25'),
(10, 'Examination Fees', '2017-05-07 09:07:03', '2017-05-07 09:07:03'),
(11, 'Caution Money', '2017-05-07 09:07:17', '2017-05-07 09:07:17'),
(12, 'Contigencies', '2017-05-07 09:07:33', '2017-05-07 09:07:33'),
(13, 'Uniform Fees', '2017-05-07 09:07:55', '2017-05-07 09:07:55'),
(14, 'P.T.A', '2017-05-07 09:08:09', '2017-05-07 09:08:09'),
(15, 'Fees Arrears', '2017-05-07 09:08:24', '2017-05-07 09:08:24'),
(16, 'Others', '2017-05-07 09:09:26', '2017-05-07 09:09:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplines_student_id_foreign` (`student_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_adm_no_foreign` (`adm_no`),
  ADD KEY `fees_votehead_id_foreign` (`votehead_id`),
  ADD KEY `fees_term_id_foreign` (`term_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forms_form_unique` (`form`);

--
-- Indexes for table `grading_systems`
--
ALTER TABLE `grading_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_adm_no_foreign` (`adm_no`),
  ADD KEY `invoices_term_id_foreign` (`term_id`),
  ADD KEY `invoices_form_id_foreign` (`form_id`),
  ADD KEY `invoices_stream_id_foreign` (`stream_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_votehead_id_foreign` (`votehead_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_adm_no_foreign` (`adm_no`),
  ADD KEY `results_term_id_foreign` (`term_id`),
  ADD KEY `results_exam_id_foreign` (`exam_id`),
  ADD KEY `results_subject_id_foreign` (`subject_id`),
  ADD KEY `results_form_id_foreign` (`form_id`),
  ADD KEY `results_stream_id_foreign` (`stream_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `streams_stream_name_unique` (`stream_name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_adm_no_unique` (`adm_no`),
  ADD KEY `students_form_id_foreign` (`form_id`),
  ADD KEY `students_stream_id_foreign` (`stream_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_subject_code_unique` (`subject_code`),
  ADD UNIQUE KEY `subjects_subject_name_unique` (`subject_name`),
  ADD KEY `subjects_group_id_foreign` (`group_id`);

--
-- Indexes for table `subject_groups`
--
ALTER TABLE `subject_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_groups_group_id_unique` (`group_id`),
  ADD UNIQUE KEY `subject_groups_group_name_unique` (`group_name`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voteheads`
--
ALTER TABLE `voteheads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grading_systems`
--
ALTER TABLE `grading_systems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject_groups`
--
ALTER TABLE `subject_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voteheads`
--
ALTER TABLE `voteheads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD CONSTRAINT `disciplines_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_adm_no_foreign` FOREIGN KEY (`adm_no`) REFERENCES `students` (`adm_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_votehead_id_foreign` FOREIGN KEY (`votehead_id`) REFERENCES `voteheads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_adm_no_foreign` FOREIGN KEY (`adm_no`) REFERENCES `students` (`adm_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_stream_id_foreign` FOREIGN KEY (`stream_id`) REFERENCES `streams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_votehead_id_foreign` FOREIGN KEY (`votehead_id`) REFERENCES `voteheads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_adm_no_foreign` FOREIGN KEY (`adm_no`) REFERENCES `students` (`adm_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_stream_id_foreign` FOREIGN KEY (`stream_id`) REFERENCES `streams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_stream_id_foreign` FOREIGN KEY (`stream_id`) REFERENCES `streams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `subject_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
