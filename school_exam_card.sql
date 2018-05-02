-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2018 at 08:36 PM
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
-- Database: `school_exam_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Diploma in Nursing', 'DIN', '3 Years', '2018-04-29 19:51:44', '2018-04-29 19:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `payee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `particulars` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votehead_id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `form`, `created_at`, `updated_at`) VALUES
(1, 'First Yr', NULL, NULL),
(2, 'Second Yr', NULL, NULL),
(3, 'Third Yr', NULL, NULL),
(4, 'Fourth Yr', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `adm_no`, `year`, `term_id`, `form_id`, `course_id`, `amount`, `balance`, `created_at`, `updated_at`) VALUES
(3, 'DIP/Nurs/211/2018', 2018, 1, 2, 1, 4000, 4000, '2018-05-01 15:36:31', '2018-05-01 15:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nid` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tsc_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '2018_01_09_160555_laratrust_setup_tables', 1),
(4, '2018_01_10_190341_create_settings_table', 1),
(5, '2018_01_10_190429_create_courses_table', 1),
(6, '2018_01_10_190612_create_forms_table', 1),
(8, '2018_01_10_191200_create_terms_table', 1),
(9, '2018_01_10_191403_create_exams_table', 1),
(10, '2018_01_10_191608_create_voteheads_table', 1),
(13, '2018_01_10_191930_create_payments_table', 1),
(14, '2018_01_17_063516_add_academic_year_to_students_table', 1),
(15, '2018_01_20_215231_create_deposits_table', 1),
(16, '2018_01_24_121208_create_employees_table', 1),
(17, '2018_01_24_121427_create_lecturers_table', 1),
(18, '2018_01_10_191032_create_students_table', 2),
(19, '2018_01_10_191823_create_invoices_table', 2),
(20, '2018_01_10_191917_create_fees_table', 2),
(21, '2018_05_01_170212_add_academic_year_to_students_table', 3),
(22, '2018_01_10_191001_create_subjects_table', 4);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `particulars` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(12, 'CREATE-USER', 'CREATE-USER', 'CREATE-USER', '2018-01-17 17:14:15', '2018-01-17 17:14:15'),
(13, 'EDIT-USER', 'EDIT-USER', 'EDIT-USER', '2018-01-17 17:14:35', '2018-01-17 17:14:35'),
(14, 'VIEW-USER', 'VIEW-USER', 'VIEW-USER', '2018-01-17 17:14:52', '2018-01-17 17:14:52'),
(15, 'DELETE-USER', 'DELETE-USER', 'DELETE-USER', '2018-01-17 17:15:11', '2018-01-17 17:15:11'),
(16, 'CREATE-ROLE', 'CREATE-ROLE', 'CREATE-ROLE', '2018-01-17 17:15:51', '2018-01-17 17:15:51'),
(17, 'EDIT-ROLE', 'EDIT-ROLE', 'EDIT-ROLE', '2018-01-17 17:16:12', '2018-01-17 17:16:12'),
(18, 'VIEW-ROLES', 'VIEW-ROLES', 'VIEW-ROLES', '2018-01-17 17:16:47', '2018-01-17 17:16:47'),
(19, 'DELETE-ROLE', 'DELETE-ROLE', 'DELETE-ROLE', '2018-01-17 17:17:10', '2018-01-17 17:17:10'),
(20, 'CREATE-CLASS', 'CREATE-CLASS', 'CREATE-CLASS', '2018-01-17 17:18:17', '2018-01-17 17:18:17'),
(21, 'EDIT-CLASS', 'EDIT-CLASS', 'EDIT-CLASS', '2018-01-17 17:18:39', '2018-01-17 17:18:39'),
(22, 'VIEW-CLASS', 'VIEW-CLASS', 'VIEW-CLASS', '2018-01-17 17:18:56', '2018-01-17 17:18:56'),
(23, 'DELETE-CLASS', 'DELETE-CLASS', 'DELETE-CLASS', '2018-01-17 17:19:13', '2018-01-17 17:19:13'),
(24, 'CREATE-STUDENT', 'CREATE-STUDENT', 'CREATE-STUDENT', '2018-01-17 17:19:40', '2018-01-17 17:19:40'),
(25, 'VIEW-STUDENT', 'VIEW-STUDENT', 'VIEW-STUDENT', '2018-01-17 17:19:58', '2018-01-17 17:19:58'),
(26, 'EDIT-STUDENT', 'EDIT-STUDENT', 'EDIT-STUDENT', '2018-01-17 17:20:38', '2018-01-17 17:20:38'),
(27, 'DELETE-STUDENT', 'DELETE-STUDENT', 'DELETE-STUDENT', '2018-01-17 17:21:02', '2018-01-17 17:21:02'),
(28, 'SUBMIT-MARKS', 'SUBMIT-MARKS', 'SUBMIT-MARKS', '2018-01-17 17:21:58', '2018-01-17 17:21:58'),
(29, 'VIEW-RESULTS', 'VIEW-RESULTS', 'VIEW-RESULTS', '2018-01-17 17:22:26', '2018-01-17 17:22:26'),
(30, 'PROMOTE-STUDENTS', 'PROMOTE-STUDENTS', 'PROMOTE-STUDENTS', '2018-01-17 17:22:48', '2018-01-17 17:22:48'),
(31, 'CREATE-GRADING-SYSTEM', 'CREATE-GRADING-SYSTEM', 'CREATE-GRADING-SYSTEM', '2018-01-17 17:23:25', '2018-01-17 17:23:25'),
(32, 'VIEW-GRADING-SYSTEM', 'VIEW-GRADING-SYSTEM', 'VIEW-GRADING-SYSTEM', '2018-01-17 17:23:40', '2018-01-17 17:23:40'),
(33, 'EDIT-GRADING-SYSTEM', 'EDIT-GRADING-SYSTEM', 'EDIT-GRADING-SYSTEM', '2018-01-17 17:23:55', '2018-01-17 17:23:55'),
(34, 'DELETE-GRADING-SYSTEM', 'DELETE-GRADING-SYSTEM', 'DELETE-GRADING-SYSTEM', '2018-01-17 17:25:05', '2018-01-17 17:25:05'),
(35, 'ADD-DISCIPLINE-CASE', 'ADD-DISCIPLINE-CASE', 'ADD-DISCIPLINE-CASE', '2018-01-17 17:27:11', '2018-01-17 17:27:11'),
(36, 'VIEW-INDISCIPLINE-CASES', 'VIEW-INDISCIPLINE-CASES', 'VIEW-INDISCIPLINE-CASES', '2018-01-17 17:28:00', '2018-01-17 17:28:00'),
(37, 'DELETE-INDISCIPLINE-CASE', 'DELETE-INDISCIPLINE-CASE', 'DELETE-INDISCIPLINE-CASES', '2018-01-17 17:28:27', '2018-01-17 17:28:27'),
(38, 'MANAGE-SETTINGS', 'MANAGE-SETTINGS', 'MANAGE-SETTINGS', '2018-01-17 17:29:29', '2018-01-17 17:29:29'),
(39, 'CREATE-SUBJECT', 'CREATE-SUBJECT', 'CREATE-SUBJECT', '2018-01-17 17:30:03', '2018-01-17 17:30:03'),
(40, 'EDIT-SUBJECT', 'EDIT-SUBJECT', 'EDIT-SUBJECT', '2018-01-17 17:30:23', '2018-01-17 17:30:23'),
(44, 'DELETE-SUBJECT', 'DELETE-SUBJECT', 'DELETE-SUBJECT', '2018-01-17 17:32:41', '2018-01-17 17:32:41'),
(45, 'VIEW-SUBJECT', 'VIEW-SUBJECT', 'VIEW-SUBJECT', '2018-01-17 17:33:09', '2018-01-17 17:33:09'),
(46, 'CREATE-SUBJECT-GROUP', 'CREATE-SUBJECT-GROUP', 'CREATE-SUBJECT-GROUP', '2018-01-17 17:33:40', '2018-01-17 17:33:40'),
(47, 'EDIT-SUBJECT-GROUP', 'EDIT-SUBJECT-GROUP', 'EDIT-SUBJECT-GROUP', '2018-01-17 17:33:59', '2018-01-17 17:33:59'),
(49, 'VIEW-SUBJECT-GROUP', 'VIEW-SUBJECT-GROUP', 'VIEW-SUBJECT-GROUP', '2018-01-17 17:35:00', '2018-01-17 17:35:00'),
(50, 'DELETE-SUBJECT-GROUP', 'DELETE-SUBJECT-GROUP', 'DELETE-SUBJECT-GROUP', '2018-01-17 17:35:27', '2018-01-17 17:35:27'),
(51, 'CREATE-STREAM', 'CREATE-STREAM', 'CREATE-STREAM', '2018-01-17 17:35:54', '2018-01-17 17:35:54'),
(52, 'EDIT-STREAM', 'EDIT-STREAM', 'EDIT-STREAM', '2018-01-17 17:36:10', '2018-01-17 17:36:10'),
(53, 'VIEW-STREAMS', 'VIEW-STREAMS', 'VIEW-STREAMS', '2018-01-17 17:36:26', '2018-01-17 17:36:26'),
(54, 'DELETE-STREAM', 'DELETE-STREAM', 'DELETE-STREAM', '2018-01-17 17:36:49', '2018-01-17 17:36:49'),
(55, 'DELETE-EXAM', 'DELETE-EXAM', 'DELETE-EXAM', '2018-01-17 17:38:20', '2018-01-17 17:38:20'),
(56, 'CREATE-EXAM', 'CREATE-EXAM', 'CREATE-EXAM', '2018-01-17 17:38:36', '2018-01-17 17:38:36'),
(57, 'VIEW-EXAM', 'VIEW-EXAM', 'VIEW-EXAM', '2018-01-17 17:38:52', '2018-01-17 17:38:52'),
(58, 'EDIT-EXAM', 'EDIT-EXAM', 'EDIT-EXAM', '2018-01-17 17:39:22', '2018-01-17 17:39:22'),
(59, 'CREATE-VOTEHEAD', 'CREATE-VOTEHEAD', 'CREATE-VOTEHEAD', '2018-01-17 17:39:56', '2018-01-17 17:39:56'),
(60, 'VIEW-VOTEHEAD', 'VIEW-VOTEHEAD', 'VIEW-VOTEHEAD', '2018-01-17 17:40:26', '2018-01-17 17:40:26'),
(61, 'EDIT-VOTEHEAD', 'EDIT-VOTEHEAD', 'EDIT-VOTEHEAD', '2018-01-17 17:40:41', '2018-01-17 17:40:41'),
(62, 'DELETE-VOTEHEAD', 'DELETE-VOTEHEAD', 'DELETE-VOTEHEAD', '2018-01-17 17:43:28', '2018-01-17 17:43:28'),
(63, 'CREATE-STAFF-CATEGORY', 'CREATE-STAFF-CATEGORY', 'CREATE-STAFF-CATEGORY', '2018-01-17 17:45:13', '2018-01-17 17:45:13'),
(64, 'EDIT-STAFF-CATEGORY', 'EDIT-STAFF-CATEGORY', 'EDIT-STAFF-CATEGORY', '2018-01-17 17:45:29', '2018-01-17 17:45:29'),
(65, 'VIEW-STAFF-CATEGORY', 'VIEW-STAFF-CATEGORY', 'VIEW-STAFF-CATEGORY', '2018-01-17 17:45:45', '2018-01-17 17:45:45'),
(66, 'DELETE-STAFF-CATEGORY', 'DELETE-STAFF-CATEGORY', 'DELETE-STAFF-CATEGORY', '2018-01-17 17:46:01', '2018-01-17 17:46:01'),
(67, 'CREATE-STAFF', 'CREATE-STAFF', 'CREATE-STAFF', '2018-01-17 17:47:34', '2018-01-17 17:47:34'),
(68, 'EDIT-STAFF', 'EDIT-STAFF', 'EDIT-STAFF', '2018-01-17 17:48:38', '2018-01-17 17:48:38'),
(69, 'VIEW-STAFF', 'VIEW-STAFF', 'VIEW-STAFF', '2018-01-17 17:48:54', '2018-01-17 17:48:54'),
(70, 'DELETE-STAFF', 'DELETE-STAFF', 'DELETE-STAFF', '2018-01-17 17:49:11', '2018-01-17 17:49:11'),
(71, 'UPDATE-PROFILE', 'UPDATE-PROFILE', 'UPDATE-PROFILE', '2018-01-17 17:49:52', '2018-01-17 17:49:52'),
(72, 'CHANGE-PASSWORD', 'CHANGE-PASSWORD', 'CHANGE-PASSWORD', '2018-01-17 17:50:19', '2018-01-17 17:50:19'),
(73, 'CREATE-PERMISSION', 'CREATE-PERMISSION', 'CREATE-PERMISSION', '2018-02-21 21:54:02', '2018-02-21 21:54:02'),
(74, 'VIEW-PERMISSION', 'VIEW-PERMISSION', 'VIEW-PERMISSION', '2018-02-21 21:56:44', '2018-02-21 21:56:44'),
(75, 'DELETE-PERMISSION', 'DELETE-PERMISSION', 'DELETE-PERMISSION', '2018-02-21 21:57:17', '2018-02-21 21:57:17');

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
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(5, 'teacher', 'TEACHER', 'TEACHER', '2018-01-14 03:00:06', '2018-01-14 03:00:06'),
(6, 'Principal', 'School Principal', 'School Principal', '2018-01-17 17:52:44', '2018-01-17 17:54:26'),
(7, 'Deputy Principal', 'Deputy Principal', 'Deputy Principal of the school', '2018-01-17 17:54:08', '2018-01-17 17:54:08'),
(8, 'Secretary', 'School Secretary', 'School Secretary', '2018-01-17 17:56:33', '2018-01-17 17:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(5, 1, 'App\\User'),
(6, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `box_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motto` text COLLATE utf8mb4_unicode_ci,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `parent_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student.png',
  `academic_year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `adm_no`, `fname`, `lname`, `dob`, `gender`, `religion`, `form_id`, `course_id`, `parent_name`, `parent_contact`, `photo`, `academic_year`, `created_at`, `updated_at`) VALUES
(1, 'DIP/Nurs/211/2018', 'Erastus', 'Siocha', '2018-05-01', 'Male', 'Christian', 2, 1, 'Muinde', '0704652786', '1525196204.jpg', 2018, '2018-05-01 14:18:46', '2018-05-01 14:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `term`, `created_at`, `updated_at`) VALUES
(1, 'Semester 1', NULL, NULL),
(2, 'Semester 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `initials`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chandy David', 'CD', 'chandydavid88@gmail.com', '$2y$10$7wVfst/HyY4GnG1QwRuqmebpMmPyd9YgPDuuaZpXWxDDBQlSFZ.ZS', 'm3DVSNthJGqZNBqVAHLTWaLcxd5VVru6oG2NzTRuerHhASx5gWxcl6AYFsBa', '2018-01-24 22:10:41', '2018-01-24 22:10:41'),
(2, 'John Kilombo', 'JK', 'john@yahoo.com', '$2y$10$bzfSREXtYXLaCKwkpZwLk.Gfg2WtWtxY9rf79CHI7iu710MFy8Q3S', NULL, '2018-01-24 22:40:29', '2018-01-24 22:40:29'),
(3, 'System Administrator', '', 'admin@karunga.com', '$2y$10$PqrIrvIWIAfxiY3HACSXkOLpO/v38DzdETXDI/V6GwWzrGlAX.tgS', NULL, '2018-02-21 22:01:38', '2018-02-21 22:01:38'),
(4, 'titus Mwangangi', 'TM', 'erick@gmail.com', '$2y$10$JGhPN9U9gshq7xgFsYr6jOKyS58tDUeOT03cgN60kYFYHZ1FWvDUe', NULL, '2018-03-31 06:30:04', '2018-03-31 06:30:04'),
(5, 'Erick Otieno', 'EO', 'sahadat@gmail.com', '$2y$10$MEsHR7qn3EtDh5Sv9TwjZe371iB6JL3RV6Y5i0H6URbm5BWKll3T6', NULL, '2018-05-01 16:58:22', '2018-05-01 16:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `voteheads`
--

CREATE TABLE `voteheads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_name_unique` (`course_name`),
  ADD UNIQUE KEY `courses_course_code_unique` (`course_code`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_adm_no_foreign` (`adm_no`),
  ADD KEY `invoices_term_id_foreign` (`term_id`),
  ADD KEY `invoices_form_id_foreign` (`form_id`),
  ADD KEY `invoices_course_id_foreign` (`course_id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecturers_user_id_foreign` (`user_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_adm_no_unique` (`adm_no`),
  ADD KEY `students_form_id_foreign` (`form_id`),
  ADD KEY `students_course_id_foreign` (`course_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_subject_code_unique` (`subject_code`),
  ADD UNIQUE KEY `subjects_subject_name_unique` (`subject_name`);

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voteheads`
--
ALTER TABLE `voteheads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `invoices_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
