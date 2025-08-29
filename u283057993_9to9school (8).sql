-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 08:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u283057993_9to9school`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(20) NOT NULL,
  `banner_image` text DEFAULT NULL,
  `banner_heading` text DEFAULT NULL,
  `banner_sub_heading` text DEFAULT NULL,
  `banner_para` text DEFAULT NULL,
  `banner_btn_name` text DEFAULT NULL,
  `banner_btn_link` text DEFAULT NULL,
  `image_sec1` text NOT NULL,
  `main_sub_heading` text DEFAULT NULL,
  `main_heading` text NOT NULL,
  `main_para` text NOT NULL,
  `icon_image1` text DEFAULT NULL,
  `sub_heading1` text NOT NULL,
  `para1` text NOT NULL,
  `icon_image2` text DEFAULT NULL,
  `sub_heading2` text NOT NULL,
  `para2` text NOT NULL,
  `icon_image3` text DEFAULT NULL,
  `sub_heading3` text NOT NULL,
  `para3` text NOT NULL,
  `sub_heaading_sec2` text NOT NULL,
  `heading_sec2` text NOT NULL,
  `para_sec2` text NOT NULL,
  `video_link_sec2` varchar(255) NOT NULL,
  `choose_heading` text NOT NULL,
  `choose_icon1` text NOT NULL,
  `choose_title1` text NOT NULL,
  `choose_para1` text DEFAULT NULL,
  `choose_link1` text DEFAULT NULL,
  `choose_icon2` text NOT NULL,
  `choose_title2` text NOT NULL,
  `choose_para2` text DEFAULT NULL,
  `choose_link2` text DEFAULT NULL,
  `choose_icon3` text NOT NULL,
  `choose_title3` text NOT NULL,
  `choose_para3` text DEFAULT NULL,
  `choose_link3` int(255) DEFAULT NULL,
  `choose_icon4` varchar(255) NOT NULL,
  `choose_title4` varchar(255) NOT NULL,
  `choose_para4` varchar(255) DEFAULT NULL,
  `choose_link4` varchar(255) DEFAULT NULL,
  `choose_icon5` varchar(255) NOT NULL,
  `choose_title5` varchar(255) NOT NULL,
  `choose_para5` varchar(255) DEFAULT NULL,
  `choose_link5` varchar(255) DEFAULT NULL,
  `choose_icon6` varchar(255) NOT NULL,
  `choose_title6` varchar(255) NOT NULL,
  `choose_para6` varchar(255) DEFAULT NULL,
  `choose_link6` varchar(255) DEFAULT NULL,
  `heading_newsletter` varchar(255) NOT NULL,
  `para_newsletter` varchar(255) NOT NULL,
  `image_newsletter` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `icon_image4` varchar(255) DEFAULT NULL,
  `sub_heading4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `banner_image`, `banner_heading`, `banner_sub_heading`, `banner_para`, `banner_btn_name`, `banner_btn_link`, `image_sec1`, `main_sub_heading`, `main_heading`, `main_para`, `icon_image1`, `sub_heading1`, `para1`, `icon_image2`, `sub_heading2`, `para2`, `icon_image3`, `sub_heading3`, `para3`, `sub_heaading_sec2`, `heading_sec2`, `para_sec2`, `video_link_sec2`, `choose_heading`, `choose_icon1`, `choose_title1`, `choose_para1`, `choose_link1`, `choose_icon2`, `choose_title2`, `choose_para2`, `choose_link2`, `choose_icon3`, `choose_title3`, `choose_para3`, `choose_link3`, `choose_icon4`, `choose_title4`, `choose_para4`, `choose_link4`, `choose_icon5`, `choose_title5`, `choose_para5`, `choose_link5`, `choose_icon6`, `choose_title6`, `choose_para6`, `choose_link6`, `heading_newsletter`, `para_newsletter`, `image_newsletter`, `status`, `created_at`, `updated_at`, `icon_image4`, `sub_heading4`) VALUES
(1, 'assets/images/about/banner/68260edc56ff1.webp', 'India\'s first round O Clock', 'Pre-School', 'A flexible preschool and childcare solution designed for modern parents who need reliable, quality education and care on their schedule.', 'More About', 'https://demo.thelittlehands.in/about-us', 'assets/images/about/sec1/6826110cf13a0.webp', NULL, 'About Our 9 to 9 School', 'The 9 to 9 School is a revolutionary concept in early childhood education, designed specifically for the modern family. We understand that the traditional preschool hours of 9 AM to 2 PM don\'t align with many parents\' work schedules, which is why we\'ve extended our hours from 9 AM to 9 PM.\r\n</br> </br>\r\n\r\nOur flexible booking system allows you to choose the specific hours your child attends, select their preferred teachers, and only pay for the time they spend with us. We combine high-quality education with reliable childcare, creating an environment where children thrive academically, socially, and emotionally.', 'assets/images/about/icons/6819b795c1945.webp', 'Certified Teachers', 'Every child learns differently. Our classes are tailored to suit each child’s pace and interests, encouraging confidence, creativity, and a lifelong love of learning.', 'assets/images/about/icons/6819b795c6f73.webp', 'Safe Environment', 'We offer flexible schedules designed to work around your life. Choose time slots that match your routine without compromising on the quality of learning and care.', 'assets/images/about/icons/6819b795cbdfc.webp', 'Flexible Scheduling', 'Stay connected with your child’s learning journey. Our real-time chat feature allows parents to communicate directly with teachers for updates, feedback, and support.', '9 to 9 School', 'Welcome to', 'At 9to9 Preschool, we combine flexible care with meaningful early education all in one place. Open from 9 AM to 9 PM, our program supports busy families while giving children a safe, joyful space to learn and grow. Rooted in a play based, child led approach, our expert designed curriculum nurtures curiosity, confidence, and creativity. Every day is filled with stories, songs, movement, and hands-on fun making learning a natural part of your child’s world. We’re not just a school we’re your partner in building a strong foundation for lifelong learning.', 'https://www.youtube.com/embed/LlCwHnp3kL4?si=R2uVicSyHrycRIRd', 'Why Choose 9 to 9 School?', 'assets/images/about/whychoose/6819fa47a54ae.webp', 'Flexible Slot Booking', 'Choose any time between 9AM-9PM', NULL, 'assets/images/about/whychoose/6819fa47af885.webp', 'Choose Your Teacher', 'Select from our expert educators', NULL, 'assets/images/about/whychoose/6819fa47b90e7.webp', 'Pay Per Day', 'Only pay for days you attend', NULL, 'assets/images/about/whychoose/6819fa47c2e02.webp', 'Track Progress', 'Real-time learning progress', NULL, 'assets/images/about/whychoose/6819fa47ccc45.webp', 'Pre-book Attendance', 'Reserve slots in advance', NULL, 'assets/images/about/whychoose/6819fa47d7447.webp', 'Learning Goals', 'Customize your learning path', NULL, 'Subscribe Our Newsletter', 'Updates on new courses and workshops', 'assets/images/about/newsletter/680fece4e3b8b.webp', 1, '2025-05-15 16:06:37', '2025-05-15 16:06:37', 'assets/images/about/icons/6819c1d033a42.webp', 'Learning Through Play');

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_number` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `academic_number`, `status`, `created_at`, `updated_at`) VALUES
(1, '2016', 'active', '2025-06-06 07:23:03', '2025-06-06 07:23:03'),
(2, '2015', 'active', '2025-06-06 07:23:15', '2025-06-06 07:23:15'),
(3, '2025', 'active', '2025-06-25 03:31:46', '2025-06-25 03:31:46'),
(4, '2028', 'active', '2025-06-25 03:44:31', '2025-06-25 03:48:09'),
(5, '2029', 'active', '2025-07-14 23:30:03', '2025-07-14 23:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `activity_pay`
--

CREATE TABLE `activity_pay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` varchar(250) DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` varchar(250) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `pincode` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `date` text DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL,
  `age` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_pay`
--

INSERT INTO `activity_pay` (`id`, `activity_id`, `user_id`, `student_id`, `order_id`, `parent_id`, `school_id`, `pincode`, `name`, `address`, `email`, `city`, `phone`, `status`, `source`, `program`, `date`, `fees`, `age`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1:1', '2025-06-09', 44.00, NULL, '2025-06-05 04:53:01', '2025-06-05 04:53:01'),
(2, 2, '3', 3, 'EORDER_169981', 3, 3, '65656', 'rtrt rtrt', 'ghghg', 'admixn@example.com', 'ghghg', '4454545', 'pending', 'apk', NULL, '23-06-2025', 44.00, '4', '2025-06-23 04:07:58', '2025-06-23 04:07:58'),
(3, 2, '3', 3, 'EORDER_906761', 3, 3, '65656', 'rtrt rtrt', 'ghghg', 'admixn@example.com', 'ghghg', '4454545', 'pending', 'apk', NULL, '23-06-2025', 44.00, '4', '2025-06-23 04:08:18', '2025-06-23 04:08:18'),
(4, 2, '3', 3, 'EORDER_480784', 3, 3, '65656', 'rtrt rtrt', 'ghghg', 'admixn@example.com', 'ghghg', '4454545890', 'PAID', 'apk', NULL, '23-06-2025', 44.00, '4', '2025-06-23 04:08:30', '2025-06-23 04:09:33'),
(5, 2, '12', 4, 'EORDER_212684', 12, 1, '411001', 'Ananya Verma', 'A-203, Green Residency', 'ananya.verma@example.com', 'Pune', '9823456789', 'pending', 'apk', NULL, '31-07-2025', 44.00, '7', '2025-07-31 02:28:55', '2025-07-31 02:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `add_progress`
--

CREATE TABLE `add_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `sub_topic` text DEFAULT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `date_start` varchar(250) DEFAULT NULL,
  `date_end` varchar(250) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_progress`
--

INSERT INTO `add_progress` (`id`, `school_id`, `teacher_id`, `student_id`, `topic`, `sub_topic`, `percent`, `status`, `date_start`, `date_end`, `week`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 3, '1', '[\"4\",\"3\"]', '85', 'active', NULL, NULL, NULL, '2025-06-17 07:55:44', '2025-06-17 07:55:44'),
(2, 1, 2, 3, '2', '[\"1\",\"2\"]', '85', 'active', NULL, NULL, NULL, '2025-06-30 03:39:40', '2025-06-30 03:39:40'),
(3, 1, 2, 3, '1', '[\"1\",\"3\"]', '92', 'active', NULL, NULL, NULL, '2025-07-08 21:52:02', '2025-07-08 21:52:02'),
(4, 1, 2, 3, '3', '[\"1\",\"2\"]', '85', 'active', NULL, NULL, NULL, '2025-07-08 23:18:21', '2025-07-08 23:18:21'),
(5, 7, 2, 3, '3', '[\"1\",\"2\"]', '85', 'active', NULL, NULL, NULL, '2025-07-08 23:19:46', '2025-07-08 23:19:46'),
(6, 7, 2, 3, '3', '[\"1\",\"2\"]', '85', 'active', '05-02-2025', '11-02-2025', NULL, '2025-07-10 06:47:11', '2025-07-10 06:47:11'),
(7, 7, 2, 3, '3', '[\"1\",\"2\"]', '85', 'active', '11-02-2025', '17-02-2025', NULL, '2025-07-10 06:47:31', '2025-07-10 06:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `add_remarks`
--

CREATE TABLE `add_remarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `remark_note` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `topic_id` int(11) DEFAULT NULL,
  `subtopic_id` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_remarks`
--

INSERT INTO `add_remarks` (`id`, `school_id`, `teacher_id`, `student_id`, `remark`, `remark_note`, `image`, `status`, `topic_id`, `subtopic_id`, `date`, `created_at`, `updated_at`) VALUES
(2, NULL, 2, 8, '7dsdsd', NULL, 'assets/images/remark/686d1a5d34ae6.jpg', 'inactive', NULL, NULL, NULL, '2025-07-08 07:47:17', '2025-07-08 07:47:17'),
(3, NULL, 2, 5, '7dsdsd', NULL, 'assets/images/remark/686d1a65b8c1a.jpg', 'inactive', NULL, NULL, NULL, '2025-07-08 07:47:25', '2025-07-08 07:47:25'),
(4, NULL, 2, 3, '7dsdsd', NULL, 'assets/images/remark/686d1a69a56ed.jpg', 'inactive', 3, NULL, '05-02-2025', '2025-07-08 07:47:29', '2025-07-08 07:47:29'),
(5, NULL, 2, 3, '7dsdsd', NULL, 'assets/images/remark/686fb037b0380.jpg', 'inactive', 3, '[\"1\",\"2\"]', '05-02-2025', '2025-07-10 06:51:11', '2025-07-10 06:51:11'),
(6, NULL, 2, 4, '7dsdsd', NULL, 'assets/images/remark/68835fefbb10c.jpg', 'inactive', 1, '[\"1\",\"2\"]', '05-02-2025', '2025-07-25 05:13:59', '2025-07-25 05:13:59'),
(7, NULL, 2, 4, '7dsdsd', NULL, 'assets/images/remark/68836067e2d2c.jpg', 'inactive', 1, '[\"1\",\"2\"]', '05-02-2025', '2025-07-25 05:15:59', '2025-07-25 05:15:59'),
(8, NULL, 2, 4, '7dsdsd', NULL, 'assets/images/remark/6883608c204d0.jpg', 'inactive', 1, '[\"1\",\"2\"]', '05-02-2025', '2025-07-25 05:16:36', '2025-07-25 05:16:36'),
(9, NULL, 2, 4, '7dsdsd', NULL, 'assets/images/remark/68836158ddf33.webp', 'inactive', 1, '[\"1\",\"2\"]', '05-02-2025', '2025-07-25 05:20:01', '2025-07-25 05:20:01'),
(10, NULL, 2, 4, '7dsdsd', NULL, 'assets/images/remark/6883691973e6e.png', 'inactive', 1, '[\"1\",\"2\"]', '05-02-2025', '2025-07-25 05:53:05', '2025-07-25 05:53:05'),
(11, NULL, 2, 4, '7dsdsd', NULL, 'assets/images/remark/688369376d00d.png', 'inactive', 1, '[\"1\",\"2\"]', '05-02-2025', '2025-07-25 05:53:35', '2025-07-25 05:53:35'),
(12, NULL, 2, 4, '7dsdsd', NULL, 'assets/images/remark/6889ca252bafc.jpg', 'inactive', 2, '[\"1\",\"2\"]', '05-02-2025', '2025-07-30 02:00:45', '2025-07-30 02:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `apply_franchise`
--

CREATE TABLE `apply_franchise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `city_state` varchar(255) DEFAULT NULL,
  `preferred_location` varchar(255) DEFAULT NULL,
  `investment_capacity` decimal(10,2) DEFAULT NULL,
  `business_background` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `pin_code` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_franchise`
--

INSERT INTO `apply_franchise` (`id`, `full_name`, `email`, `phone_number`, `city_state`, `preferred_location`, `investment_capacity`, `business_background`, `comments`, `city`, `state`, `pin_code`, `created_at`, `updated_at`) VALUES
(1, 'rtrt rtrt', 'admixn@example.com', '4454545', 'ghghg', 'ghgh', 6565.00, 'gfgf', 'fgfgf', NULL, NULL, NULL, '2025-06-13 08:16:15', '2025-06-13 08:16:15'),
(2, 'ffdfd', 'admixn@example.com', '01233214565', 'ghghg', 'ghgh', 3454.00, 'dfdfdfdf', 'dfsdf', NULL, NULL, NULL, '2025-06-13 10:12:51', '2025-06-13 10:12:51'),
(3, 'test twst', 'test2@mailinator.com', '07894561235', 'us', 'ddsdsd', 56565.00, 'gfgfg', 'fgffgfg', NULL, NULL, NULL, '2025-06-14 04:46:56', '2025-06-14 04:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `apply_leaves`
--

CREATE TABLE `apply_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `date_end` varchar(250) DEFAULT NULL,
  `date_start` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `type` enum('fullday','halfday') DEFAULT NULL,
  `status` enum('approved','pending','reject') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_leaves`
--

INSERT INTO `apply_leaves` (`id`, `teacher_id`, `school_id`, `date_end`, `date_start`, `reason`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, '18-04-2025', '2', 'halfday', 'reject', '2025-07-03 03:12:20', '2025-07-05 02:17:59'),
(2, 1, NULL, '20-04-2025', '18-04-2025', '2', 'halfday', 'approved', '2025-07-04 04:38:41', '2025-07-05 02:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `child_age_group` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `appointment_mode` enum('in_person','video_call') NOT NULL DEFAULT 'in_person',
  `preferred_date` date DEFAULT NULL,
  `preferred_time_slot` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `full_name`, `mobile_number`, `child_age_group`, `state`, `city`, `appointment_mode`, `preferred_date`, `preferred_time_slot`, `notes`, `created_at`, `updated_at`) VALUES
(3, 'mayank katare', '7581955887', '1-2 years', 'madhya pradesh', 'sagar', 'video_call', '2025-06-10', '10:00 AM - 11:00 AM', 'aaaa', '2025-05-07 03:53:02', '2025-05-07 03:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `app_onboarding`
--

CREATE TABLE `app_onboarding` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `screen_1_image` varchar(255) NOT NULL,
  `screen_1_heading` varchar(255) NOT NULL,
  `screen_1_short_intro` text NOT NULL,
  `screen_1_button_text` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('present','absent','leave','halfday','holiday','late') DEFAULT 'absent',
  `role` varchar(250) DEFAULT NULL,
  `note` text DEFAULT NULL COMMENT 'Optional note or remark for attendance',
  `shift` varchar(250) DEFAULT NULL,
  `coordinator_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `school_id`, `teacher_id`, `date`, `status`, `role`, `note`, `shift`, `coordinator_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 7, 1, '2025-07-01', 'present', NULL, 'wewewe', '1', NULL, '2025-07-15 04:22:07', '2025-07-15 04:22:07'),
(2, NULL, 7, 1, '2025-07-01', 'present', NULL, 'wewewe', '1', NULL, '2025-07-15 04:22:19', '2025-07-15 04:22:19'),
(3, NULL, 7, 1, '2025-07-01', 'present', NULL, 'wewewe', '1', NULL, '2025-07-15 04:23:50', '2025-07-15 04:23:50'),
(4, NULL, 7, 1, '2025-07-01', 'present', NULL, 'wewewe', '1', NULL, '2025-07-15 04:24:45', '2025-07-15 04:24:45'),
(5, NULL, 7, 1, '2025-07-01', 'present', NULL, 'wewew', '2', NULL, '2025-07-15 04:24:45', '2025-07-15 04:24:45'),
(6, NULL, 7, 1, '2025-07-01', 'present', NULL, 'fdsdffdfd', '1', NULL, '2025-07-16 01:58:57', '2025-07-16 01:58:57'),
(7, NULL, 7, 1, '2025-07-01', 'present', NULL, 'dfdfd', '2', NULL, '2025-07-16 01:58:57', '2025-07-16 01:58:57'),
(22, 4, 6, 1, '2025-07-25', 'present', 'student', NULL, '1', NULL, '2025-07-25 04:31:22', '2025-07-25 04:31:22'),
(23, 5, 6, 1, '2025-07-25', 'present', 'student', NULL, '1', NULL, '2025-07-25 04:31:22', '2025-07-25 04:31:22'),
(24, NULL, 7, 1, '2025-07-30', 'present', NULL, NULL, '1', NULL, '2025-07-30 01:27:28', '2025-07-30 01:27:28'),
(25, NULL, 7, 2, '2025-07-30', 'halfday', NULL, NULL, '1', NULL, '2025-07-30 01:27:28', '2025-07-30 01:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `short_summary` text DEFAULT NULL,
  `meta_type` enum('title','description','keywords') NOT NULL DEFAULT 'title',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `heading`, `image`, `description`, `button_name`, `button_link`, `status`, `short_summary`, `meta_type`, `created_at`, `updated_at`) VALUES
(2, 'Does a School Franchise Need to Own Premises? | A Guide for Franchise Owners', 'assets/images/blogs/6812fd4e8f043.webp', 'Does a School Franchise Need to Own Premises? | A Guide for Franchise Owners', 'Read More', 'does-a-school-franchise-need-to-own-premises-a-guide-for-franchise-owners-1', 1, 'Explore stunning destinations, hidden gems, and expert travel tips', 'description', '2025-04-02 02:29:00', '2025-05-01 04:49:18'),
(3, 'Start Your Child\'s Learning Journey Today', 'assets/images/blogs/6812ab39491d1.webp', 'Quality and personalized learning experience', 'edit', 'http://127.0.0.1:8000/banner', 1, 'Does a School Franchise Need to Own Premises? | A Guide for Franchise Owners', 'description', '2025-04-30 18:59:27', '2025-04-30 22:59:05'),
(4, 'Does a School Franchise Need to Own Premises? | A Guide for Franchise Owners', 'assets/images/blogs/6812ab820adb8.webp', 'Does a School Franchise Need to Own Premises? | A Guide for Franchise Owners', 'test', 'test', 1, 'test', 'title', '2025-04-30 23:00:18', '2025-04-30 23:00:18'),
(5, 'test', 'assets/images/blogs/6846a7064f7ae.webp', 'lorem ipsum it to', 'test', 'test-1', 1, 'dfdfdfd', 'title', '2025-06-09 03:49:02', '2025-06-09 03:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `book_events`
--

CREATE TABLE `book_events` (
  `id` int(11) NOT NULL,
  `event_id` varchar(50) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `preferred_time` time DEFAULT NULL,
  `preferred_date` date DEFAULT NULL,
  `mode` enum('online','offline') NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_events`
--

INSERT INTO `book_events` (`id`, `event_id`, `event_name`, `child_name`, `age`, `preferred_time`, `preferred_date`, `mode`, `notes`, `created_at`, `updated_at`) VALUES
(2, '2', 'Storytelling Sessions - 1', 'child', 3, '14:30:00', '2025-07-15', 'online', 'Child has a preference for afternoon slots.', '2025-05-24 06:37:00', '2025-05-24 06:37:00'),
(3, '2', 'Storytelling Sessions - 1', 'We', 5, '14:30:00', '2025-07-15', 'online', 'W', '2025-06-11 10:44:24', '2025-06-11 10:44:24');

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admissions', 'what are the admission requirement', 1, '2025-04-04 02:02:59', '2025-05-01 08:11:58'),
(2, 'Fees & Payment', 'what are the tution fees', 1, '2025-04-04 02:03:52', '2025-05-01 08:12:20'),
(5, 'Curriculum', 'Curriculum', 1, '2025-04-24 02:12:56', '2025-04-24 02:12:56'),
(6, 'Teacher Applications', 'Teacher Applications', 1, '2025-04-24 02:13:40', '2025-04-24 02:13:40'),
(7, 'Teacher Page', 'Find answers to common questions about teaching opportunities at 9 to 9 school', 1, '2025-05-01 08:22:44', '2025-05-01 08:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `category_section1`
--

CREATE TABLE `category_section1` (
  `id` int(11) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `span_heading` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `btn_text1` varchar(255) NOT NULL,
  `btn_link1` varchar(255) NOT NULL,
  `btn_text2` varchar(255) NOT NULL,
  `btn_link2` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `bg_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_section2`
--

CREATE TABLE `category_section2` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `btn_name` varchar(255) NOT NULL,
  `btn_link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_learning_applications`
--

CREATE TABLE `child_learning_applications` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `app_image1` varchar(255) NOT NULL,
  `app_link1` varchar(255) DEFAULT NULL,
  `app_image2` varchar(255) NOT NULL,
  `app_link2` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `child_learning_applications`
--

INSERT INTO `child_learning_applications` (`id`, `heading`, `description`, `image`, `app_image1`, `app_link1`, `app_image2`, `app_link2`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Start Your Child\'s Learning Journey Today', 'Applying is quick, easy, and just the first step toward a beautiful learning experience for your child. Fill in a few details below and our team will get in touch to guide you through the next steps. Let’s make preschool personal, flexible, and fun—together!', 'assets/images/child_learning/68112882cdc80.webp', 'assets/images/child_learning/6811282a84d1f.webp', 'test', 'assets/images/child_learning/6811282a85b2b.webp', 'test', 1, '2025-04-29 19:29:07', '2025-04-29 19:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `child_safeties`
--

CREATE TABLE `child_safeties` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_settings`
--

CREATE TABLE `common_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_header` varchar(255) DEFAULT NULL,
  `logo_footer` varchar(255) DEFAULT NULL,
  `mobile_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_desc` text DEFAULT NULL,
  `copyright_content` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `insta` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `privacy_policy` text DEFAULT NULL,
  `terms_and_conditions` text DEFAULT NULL,
  `refund_policy` text DEFAULT NULL,
  `shipping_policy` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_settings`
--

INSERT INTO `common_settings` (`id`, `logo_header`, `logo_footer`, `mobile_logo`, `favicon`, `site_title`, `site_desc`, `copyright_content`, `address`, `mobile_number`, `email_id`, `facebook`, `insta`, `twitter`, `linkedin`, `privacy_policy`, `terms_and_conditions`, `refund_policy`, `shipping_policy`, `created_at`, `updated_at`) VALUES
(1, 'uploads/settings/1746714694_header.png', 'uploads/settings/1746714694_footer.png', 'uploads/settings/1746714694_mobile.png', 'uploads/settings/1746511355_favicon.png', '9 To 9 Schools', '9 To 9 Schools is a chain of schools which operates from 9AM To 9PM', '© 2025 9 To 9 Schools. All rights reserved.', '9 To 9 Schools', '781955887', 'support@9to9school.com', 'https://facebook.com/', 'https://instagram.com/', 'https://twitter.com/', 'https://linkedin.com/company/', 'Our privacy policy ensures complete data protection', 'By using our site, you agree to our terms', 'Refunds are available within 30 days of purchase', 'We offer free shipping worldwide on orders above $50', '2025-04-04 05:05:37', '2025-05-08 14:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conference_name` varchar(255) NOT NULL,
  `classroom_name` varchar(255) NOT NULL,
  `start_timing` datetime NOT NULL,
  `end_timing` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `is_active` enum('active','false') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'We', 'Example@gmail.com', 'Qwwdwq', 'Qwqd', '2025-06-11 10:29:07', '2025-06-11 10:29:07'),
(2, 'Hetain', 'Example@gmail.com', 'Hwhe', 'Hwhwh', '2025-06-11 12:40:05', '2025-06-11 12:40:05'),
(3, 'Gags', 'H@gmail.com', 'Hshw', 'Hwhe', '2025-06-11 12:40:34', '2025-06-11 12:40:34'),
(4, 'test', 'test@gmail.com', 'test', 'test', '2025-06-21 05:48:18', '2025-06-21 05:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `custom_goals`
--

CREATE TABLE `custom_goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `goals_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custom_goals`
--

INSERT INTO `custom_goals` (`id`, `student_id`, `parent_id`, `goals_id`, `created_at`, `updated_at`) VALUES
(12, 4, 9, 1, '2025-07-12 08:04:22', '2025-07-12 08:04:22'),
(13, 4, 9, 4, '2025-07-12 08:04:22', '2025-07-12 08:04:22'),
(16, 4, 1, 1, '2025-07-16 05:12:23', '2025-07-16 05:12:23'),
(18, 4, 1, 1, '2025-07-18 00:53:42', '2025-07-18 00:53:42'),
(19, 4, 1, 3, '2025-07-18 00:53:43', '2025-07-18 00:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `daycare_activites`
--

CREATE TABLE `daycare_activites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daycare_activites`
--

INSERT INTO `daycare_activites` (`id`, `image`, `heading`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/daycare/activites/681299032a6ff.webp', 'Creative Arts', 'Explore painting, drawing, collage, and sensory art experiences that encourage self-expression and creativity.', NULL, 1, '2025-04-30 14:28:28', '2025-04-30 21:41:23'),
(2, 'assets/images/daycare/activites/6835bcb7945ed.webp', 'Music & Movement', 'Develop rhythm, coordination, and self-expression through songs, dance, and musical instrument exploration.', NULL, 1, '2025-04-30 21:33:39', '2025-05-27 13:23:03'),
(3, 'assets/images/daycare/activites/6835bcbecb21a.webp', 'Literacy & Language', 'Foster a love of reading through storytelling, letter recognition, and rich vocabulary development activities.', NULL, 1, '2025-04-30 21:34:12', '2025-05-27 13:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `daycare_banners`
--

CREATE TABLE `daycare_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_name1` varchar(255) DEFAULT NULL,
  `button_link1` varchar(255) DEFAULT NULL,
  `button_name2` varchar(255) DEFAULT NULL,
  `button_link2` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daycare_banners`
--

INSERT INTO `daycare_banners` (`id`, `heading`, `sub_heading`, `image`, `description`, `button_name1`, `button_link1`, `button_name2`, `button_link2`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to the', '9 TO 9 School', 'assets/images/daycare/banner/6835bc06b8024.webp', 'Our daycare program provides a safe, loving environment for your child to learn, play, and grow.', 'Enroll Now', 'https://www.9to9school.com/talk-expert', 'Schedule a Visit', 'https://calendly.com/9to9schools/30min', 1, '2025-04-30 13:22:56', '2025-05-27 13:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `daycare_pays`
--

CREATE TABLE `daycare_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `daycare_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `date` text DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL,
  `user_id` varchar(250) DEFAULT NULL,
  `order_id` varchar(250) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `pincode` varchar(250) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daycare_pays`
--

INSERT INTO `daycare_pays` (`id`, `daycare_id`, `student_id`, `type`, `hours`, `date`, `fees`, `user_id`, `order_id`, `parent_id`, `school_id`, `pincode`, `name`, `address`, `email`, `city`, `phone`, `status`, `source`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'daily', '2', '2025-06-24', 200.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-05 06:34:44', '2025-06-05 06:34:44'),
(2, 4, 2, 'weekly', '14', '2025-06-18', 444.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-06 01:16:21', '2025-06-06 01:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `daycare_programs`
--

CREATE TABLE `daycare_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `key1` varchar(255) DEFAULT NULL,
  `key2` varchar(255) DEFAULT NULL,
  `key3` varchar(255) DEFAULT NULL,
  `key4` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daycare_programs`
--

INSERT INTO `daycare_programs` (`id`, `image`, `heading`, `description`, `sub_heading`, `key1`, `key2`, `key3`, `key4`, `status`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/daycare/program/6835bc728d8d0.webp', 'Toddlers (1-2 Years)', 'Focused on sensory exploration, motor skills, and building secure attachments with caregivers.', 'Key Skills Developed:', 'Letter recognition', 'Number concepts', 'Cooperative play', 'Emotional expression', 1, '2025-04-30 14:20:49', '2025-05-27 13:21:54'),
(2, 'assets/images/daycare/program/6835bc86b64cc.webp', 'Early Preschool (2-3 Years)', 'Encouraging independence, language development, and structured play with peers.', 'Key Skills Developed:', 'Letter recognition', 'Number concepts', 'Cooperative play', 'Emotional expression', 1, '2025-05-02 07:31:56', '2025-05-27 13:22:14'),
(3, 'assets/images/daycare/program/6835bc9177900.webp', 'Preschool (3-4 Years)', 'Building pre-academic foundations through guided activities and emotional regulation.', 'Key Skills Developed:', 'Letter recognition', 'Number concepts', 'Cooperative play', 'Emotional expression', 1, '2025-05-02 07:32:33', '2025-05-27 13:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `daycare_registers`
--

CREATE TABLE `daycare_registers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  `type` enum('daily','weekly','monthly') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daycare_registers`
--

INSERT INTO `daycare_registers` (`id`, `name`, `price`, `hour`, `type`, `created_at`, `updated_at`) VALUES
(1, 'day cares', 200.00, 2, 'daily', '2025-06-03 01:10:31', '2025-06-03 01:23:30'),
(4, 'tesrt', 444.00, 14, 'weekly', '2025-06-05 06:02:35', '2025-06-05 06:02:35'),
(5, 'tesrt', 444.00, 14, 'weekly', '2025-06-05 06:05:22', '2025-06-05 06:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `daycare_schedules`
--

CREATE TABLE `daycare_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `timing` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daycare_schedules`
--

INSERT INTO `daycare_schedules` (`id`, `image`, `heading`, `timing`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/daycare/schedule/681295f55a46d.webp', 'Arrival & Welcome', '8:00-9:00 AM', 'Free play, parent check-ins, and welcoming greetings to start the day with excitement.', NULL, 1, '2025-04-30 21:28:21', '2025-04-30 21:28:21'),
(2, 'assets/images/daycare/schedule/6812961e916a2.webp', 'Morning Circle', '9:00-9:30 AM', 'Calendar, weather updates, songs, and introductions to daily themes for engaging learning moments.', NULL, 1, '2025-04-30 21:29:02', '2025-04-30 21:29:02'),
(3, 'assets/images/daycare/schedule/681296421ca71.webp', 'Learning Circle', '9:30-10:30 AM', 'Focused activities, interactive lessons, and hands-on exploration to stimulate curiosity and development.', NULL, 1, '2025-04-30 21:29:38', '2025-04-30 21:29:38'),
(4, 'assets/images/daycare/schedule/6812966685aeb.webp', 'Lunch Time', '11:00-12:00 PM', 'Healthy meals, practicing table manners, and fostering social skills during mealtime conversations.', NULL, 1, '2025-04-30 21:30:14', '2025-04-30 21:30:14'),
(5, 'assets/images/daycare/schedule/68129685c636c.webp', 'Rest Time', '12:00-2:00 PM', 'Quiet time for napping or relaxing activities to recharge and refresh for the day.', NULL, 1, '2025-04-30 21:30:45', '2025-04-30 21:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `daycare_skills`
--

CREATE TABLE `daycare_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daycare_whychooses`
--

CREATE TABLE `daycare_whychooses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daycare_whychooses`
--

INSERT INTO `daycare_whychooses` (`id`, `image`, `heading`, `description`, `color`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/daycare/choose/681230e9b354b.webp', 'Trained & Caring Staff', 'Our experienced, compassionate team provides personalised care, fostering growth, learning, and emotional support daily.', NULL, '2025-04-30 14:17:13', '2025-04-30 14:19:10'),
(2, 'assets/images/daycare/choose/6812919402a19.webp', 'Nutritious Meals', 'Our staff ensures children are fed on time, with healthy meals to support their day.', NULL, '2025-04-30 21:09:40', '2025-04-30 21:09:40'),
(3, 'assets/images/daycare/choose/681291ba38c69.webp', 'Safe Environment', 'Safety is our priority—every space is childproofed, secure, and designed with your child’s well-being in mind.', NULL, '2025-04-30 21:10:18', '2025-04-30 21:10:18'),
(4, 'assets/images/daycare/choose/681291dca0669.webp', 'CCTV Monitoring', 'Our premises are securely monitored with CCTV, ensuring a safe, supervised environment for all children.', NULL, '2025-04-30 21:10:52', '2025-04-30 21:10:52'),
(5, 'assets/images/daycare/choose/68129220a4290.webp', 'Flexible Hours', 'We offer convenient, flexible hours between 9 AM and 9 PM to accommodate your schedule.', NULL, '2025-04-30 21:12:00', '2025-04-30 21:12:00'),
(6, 'assets/images/daycare/choose/681292478e3b2.webp', 'Daily Updates', 'Parents receive daily updates about their child\'s activities, progress, and experiences to stay informed and connected.', NULL, '2025-04-30 21:12:39', '2025-04-30 21:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `day_care_enquiries`
--

CREATE TABLE `day_care_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demos`
--

CREATE TABLE `demos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquire`
--

CREATE TABLE `enquire` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pin_code` varchar(250) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` enum('new','follow-up') NOT NULL DEFAULT 'new',
  `page` varchar(250) DEFAULT NULL,
  `age` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enquire`
--

INSERT INTO `enquire` (`id`, `name`, `email`, `mobile`, `state`, `city`, `pin_code`, `message`, `status`, `page`, `age`, `source`, `created_at`, `updated_at`) VALUES
(1, 'rtrt rtrt', 'admixn@example.com', '8529637412', 'ghgh', 'ghghg', NULL, 'jioipo', 'new', 'enroll_enquiry', NULL, NULL, '2025-06-13 07:58:16', '2025-06-13 07:58:16'),
(2, 'rtrt rtrt', 'admixn@example.com', '7894561230', 'ghgh', 'ghghg', NULL, 'klklkl', 'new', 'day-care', NULL, NULL, '2025-06-13 07:58:51', '2025-06-13 07:58:51'),
(3, 'rtrt rtrt', 'admixn@example.com', '7894561232', 'ghgh', 'ghghg', NULL, 'iuuiui', 'new', 'Events', NULL, NULL, '2025-06-13 07:59:32', '2025-06-13 07:59:32'),
(4, 'rtrt rtrt', 'admixn@example.com', '4454545', 'ghgh', 'ghghg', NULL, 'rtrtrtr', 'new', 'contact', NULL, NULL, '2025-06-13 08:17:21', '2025-06-13 08:17:21'),
(5, 'test', 'test2@mailinator.com', '0789456123', 'Kansas', 'us', NULL, 'test', 'new', 'contact', NULL, NULL, '2025-06-14 04:26:22', '2025-06-14 04:26:22'),
(6, 'test3', NULL, '7894561230', NULL, NULL, NULL, NULL, 'new', 'pre-school', '44', NULL, '2025-06-14 04:34:13', '2025-06-14 04:34:13'),
(7, 'test3', 'test2@mailinator.com', '0789456123', 'Kansas', 'us', NULL, 'test', 'new', 'day-care', NULL, NULL, '2025-06-14 04:37:45', '2025-06-14 04:37:45'),
(8, 'test3', 'test2@mailinator.com', '0789456123', 'Kansas', 'us', NULL, 'test', 'new', 'day-care', NULL, NULL, '2025-06-14 04:38:36', '2025-06-14 04:38:36'),
(9, 'test twst', 'test2@mailinator.com', '07894561235', 'Kansas', 'us', NULL, 'test', 'new', 'Events', NULL, NULL, '2025-06-14 04:40:05', '2025-06-14 04:40:05'),
(10, 'rtrt rtrt', 'hsanwale1998@gmail.com', '7894561235', 'ghgh', 'ghghg', NULL, 'ftrtrt', 'new', 'contact', NULL, NULL, '2025-06-18 08:10:38', '2025-06-18 08:10:38'),
(11, 'rtrt rtrt', 'hsanwale1998@gmail.com', '7894561235', 'ghgh', 'ghghg', NULL, 'ftrtrt', 'new', 'contact', NULL, NULL, '2025-06-18 08:13:25', '2025-06-18 08:13:25'),
(12, 'rtrt rtrt', 'hsanwale1998@gmail.com', '1234567892', 'ghgh', 'ghghg', NULL, 'sdsdsds', 'new', 'contact', NULL, NULL, '2025-06-18 08:26:56', '2025-06-18 08:26:56'),
(13, 'test twst', 'votivephp.harshita@gmail.com', '07894561235', 'Madhya Pradesh', 'Barwani', '451666', 'wwwewew', 'new', 'contact', NULL, NULL, '2025-06-21 01:32:50', '2025-06-21 01:32:50'),
(14, 'test', 'test@gmail.com', 'test', 'test', 'fffgfdgfd', 'fgfgfgfgf', 'ggfgfgfg', 'new', 'contact', NULL, NULL, '2025-06-21 08:18:18', '2025-06-21 08:18:18'),
(15, 'test', 'hsanwale1998@gmail.com', '1233214567', 'Madhya Pradesh', 'Barwani', '451666', 'test', 'new', 'contact', NULL, NULL, '2025-06-30 02:43:47', '2025-06-30 02:43:47'),
(16, 'rtrt rtrt', 'votivephp.harshita@gmail.com', '1234567897', 'Madhya Pradesh', 'Barwani', '451666', 'fgfgfgf', 'new', 'contact', NULL, NULL, '2025-06-30 02:45:03', '2025-06-30 02:45:03'),
(17, 'rtrt rtrt', 'votivephp.harshita@gmail.com', '1234567852', 'Madhya Pradesh', 'Barwani', '451666', 'fffdf', 'new', 'contact', NULL, NULL, '2025-06-30 02:49:17', '2025-06-30 02:49:17'),
(18, 'test', 'votivephp.harshita@gmail.com', '1234567897', 'Madhya Pradesh', 'Barwani', '451666', 'test', 'new', 'contact', NULL, NULL, '2025-06-30 03:03:57', '2025-06-30 03:03:57'),
(19, 'John Doe', 'john@example.com', '9876543210', 'Maharashtra', 'Mumbai', '400001', 'Testing JSON request', 'new', 'day-care', NULL, NULL, '2025-07-14 05:02:24', '2025-07-14 05:02:24'),
(20, 'John Doe', 'john@example.com', '9876543210', NULL, NULL, NULL, NULL, 'new', 'pre-school', '12', NULL, '2025-07-14 05:19:50', '2025-07-14 05:19:50'),
(21, 'John Doe', 'john@example.com', '9876543210', NULL, NULL, NULL, NULL, 'new', 'pre-school', '12', NULL, '2025-07-14 05:22:07', '2025-07-14 05:22:07'),
(22, 'John Doe', 'harshitasanwale@gmail.com', '9876543210', 'Maharashtra', 'Mumbai', '400001', 'Testing JSON request', 'new', 'day-care', NULL, NULL, '2025-07-15 00:39:16', '2025-07-15 00:39:16'),
(23, 'John Doe', 'harshitasanwale@gmail.com', '9876543210', NULL, NULL, NULL, NULL, 'new', 'pre-school', '12', NULL, '2025-07-15 00:40:34', '2025-07-15 00:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_partner_schools`
--

CREATE TABLE `enquiry_partner_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `que_of_concern` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry_partner_schools`
--

INSERT INTO `enquiry_partner_schools` (`id`, `partner_school_id`, `full_name`, `email`, `mobile_number`, `que_of_concern`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 01:47:10', '2025-07-31 01:47:10'),
(2, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 01:47:46', '2025-07-31 01:47:46'),
(3, 2, 'Ramesh Sharma', 'hetainsharma88@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 01:49:39', '2025-07-31 01:49:39'),
(4, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:14:04', '2025-07-31 02:14:04'),
(5, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:16:56', '2025-07-31 02:16:56'),
(6, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:17:26', '2025-07-31 02:17:26'),
(7, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:17:39', '2025-07-31 02:17:39'),
(8, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:18:18', '2025-07-31 02:18:18'),
(9, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:18:41', '2025-07-31 02:18:41'),
(10, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:18:55', '2025-07-31 02:18:55'),
(11, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:19:51', '2025-07-31 02:19:51'),
(12, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:22:10', '2025-07-31 02:22:10'),
(13, 2, 'Ramesh Sharma', 'harshitasanwale@gmail.com', '9876543210', 'Looking for curriculum support', '2025-07-31 02:23:11', '2025-07-31 02:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `father_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `duration` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `materials` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_heading` varchar(255) DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `banner_description` text DEFAULT NULL,
  `no_of_student` varchar(250) DEFAULT NULL,
  `no_of_teacher` varchar(250) DEFAULT NULL,
  `fees` varchar(250) DEFAULT NULL,
  `program` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_url`, `image`, `description`, `status`, `duration`, `age`, `materials`, `skills`, `banner_image`, `banner_heading`, `sub_heading`, `banner_description`, `no_of_student`, `no_of_teacher`, `fees`, `program`, `created_at`, `updated_at`) VALUES
(2, 'Storytelling Sessions - 1', 'storytelling-sessions', 'assets/images/events/68111e0bc9918.webp', 'Let your child dive into a world of fantasy characters and imagination - 1', 1, '45 mins', '2 - 3', 'material 1, material 2', 'abc, def', 'assets/images/events/681272f4dbc54.webp', 'Exciting Events & Fun Activities - 1', 'For your child -1', 'Creating memories and fostering growth through engaging experiences - 1', '[\"5\",\"3\"]', '[\"1\",\"1\"]', '44', '[\"1:1\",\"5:1\"]', '2025-04-24 00:57:59', '2025-06-05 04:15:08'),
(3, '4-5 Art & Craft', 'arts-and-crafts', 'assets/images/events/68111f06d356f.webp', 'Boost creativity with fun and hands-on activities!', 1, '45 mins', '2 - 3', NULL, NULL, '/tmp/phpD7Mal6', 'test', 'Tradition Of Trust Creation With Time', 'test', '[\"1\",\"5\"]', '[\"1\",\"1\"]', '[\"44.00\",\"3000.00\"]', '[\"1:1\",\"5:1\"]', '2025-04-24 03:24:51', '2025-06-05 04:17:58'),
(4, 'Music & Movement', 'music-and-movement', 'assets/images/events/68111f699757f.webp', 'Dance rhythm and body coordination in a lively session!', 1, '45 mins', '2 - 3', NULL, NULL, NULL, 'Life Skills Hacks', 'Tradition Of Trust Creation With Time', NULL, NULL, NULL, '[\"44.00\",\"3000.00\"]', '[\"1:1\",\"5:1\"]', '2025-04-24 03:42:56', '2025-06-05 04:18:14'),
(5, 'Nature Exploration', 'nature-exploratiokn', 'assets/images/events/68111fadb151e.webp', 'A closer look at the wonders of the nature, natural world, indoors & outdoors', 1, '45 mins', 'Age 3-6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-29 18:51:25', '2025-04-29 19:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `event_packages`
--

CREATE TABLE `event_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `package_services` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`package_services`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_packages`
--

INSERT INTO `event_packages` (`id`, `title`, `description`, `price`, `status`, `package_services`, `created_at`, `updated_at`) VALUES
(1, 'evevnts', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non nobis, itaque suscipit quaerat quae sed! Consectetur magni illum iste quibusdam aspernatur culpa ratione doloribus enim minus, accusantium maiores tenetur aperiam ullam nam fugiat amet vero nostrum! Modi, deserunt eius aliquid obcaecati, mollitia earum sed quam reprehenderit, quod totam consectetur cupiditate.', 200.00, 'active', '1', '2025-06-04 07:30:55', '2025-06-04 08:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `expert_consultations`
--

CREATE TABLE `expert_consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `preferred_time` varchar(255) NOT NULL,
  `question_or_concern` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expert_consultations`
--

INSERT INTO `expert_consultations` (`id`, `full_name`, `mobile_number`, `email`, `preferred_time`, `question_or_concern`, `created_at`, `updated_at`) VALUES
(1, 'mayank katare', '7581955887', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'aaaa', '2025-05-07 03:04:07', '2025-05-07 03:04:07'),
(2, 'mayank katare', '7581955887', 'user@example.com', '10:00 AM - 11:00 AM', 'aaa', '2025-05-07 06:08:01', '2025-05-07 06:08:01'),
(3, 'Anand Harshvardhan Singh', '0700768050', 'anandsingh678970@gmail.com', 'Select Time', 'test', '2025-05-10 08:55:01', '2025-05-10 08:55:01'),
(4, 'POOJA PRAJAPATI', '8307733088', 'prajapatipooja232@gmail.com', 'Select Time', 'sadssaadsdxax', '2025-05-24 08:56:43', '2025-05-24 08:56:43'),
(5, 'POOJA PRAJAPATI', '8307733088', 'prajapatipooja232@gmail.com', 'Select Time', 'ccscscsc', '2025-05-27 13:48:50', '2025-05-27 13:48:50'),
(6, 'test', '1232132123', '9to9schools@gmail.com', 'Select Time', 'test', '2025-05-27 17:21:53', '2025-05-27 17:21:53'),
(7, 'test', '1232132123', 'admin@admin.com', '12:00 PM - 1:00 PM', 'twxt', '2025-05-27 19:42:02', '2025-05-27 19:42:02'),
(8, 'pooja', '8307733088', 'prajapatipooja232@gmail.com', '10:00 AM - 11:00 AM', 'NBJJ JBJBJ JBJHB', '2025-05-28 15:48:26', '2025-05-28 15:48:26'),
(9, 'test twst', '7894561235', 'test2@mailinator.com', '12:00 PM - 1:00 PM', 'fgffgfg', '2025-05-29 04:02:29', '2025-05-29 04:02:29'),
(10, 'test twst', '7894561235', 'test2@mailinator.com', 'Select Time', 'wewewe', '2025-05-30 07:09:06', '2025-05-30 07:09:06'),
(11, 'test twst', '7894561235', 'test2@mailinator.com', '10:00 AM - 11:00 AM', 'trtytyty', '2025-05-31 05:51:57', '2025-05-31 05:51:57'),
(12, 'test twst', '7894561235', 'test2@mailinator.com', '10:00 AM - 11:00 AM', 'dfdfdf', '2025-06-02 04:02:19', '2025-06-02 04:02:19'),
(13, 'user', '1234567890', 'kataremayank79@gmail.com', '10:00 AM - 11:00 AM', 'aaaaa', '2025-06-13 03:26:28', '2025-06-13 03:26:28'),
(14, 'user', '1234567890', 'kataremayank79@gmail.com', '10:00 AM - 11:00 AM', 'aaaaa', '2025-06-13 03:28:19', '2025-06-13 03:28:19'),
(15, 'user', '1234567890', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'aaaa', '2025-06-13 03:36:17', '2025-06-13 03:36:17'),
(16, 'user', '1234567890', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'aaaa', '2025-06-13 03:38:51', '2025-06-13 03:38:51'),
(17, 'user', '1234567890', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'hhhh', '2025-06-13 03:40:11', '2025-06-13 03:40:11'),
(18, 'user', '1234567890', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'aaaaa', '2025-06-13 03:42:58', '2025-06-13 03:42:58'),
(19, 'user', '1234567890', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'jhk', '2025-06-13 03:45:15', '2025-06-13 03:45:15'),
(20, 'user', '1234567890', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'enquiry', '2025-06-13 03:58:37', '2025-06-13 03:58:37'),
(21, 'user', '1234567890', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'enquiry', '2025-06-13 04:03:32', '2025-06-13 04:03:32'),
(22, 'user', '1234567890', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'aaaaa', '2025-06-13 04:04:06', '2025-06-13 04:04:06'),
(23, 'user', '1234567890', 'kataremayank79@gmail.com', '10:00 AM - 11:00 AM', 'aaaaa', '2025-06-13 04:05:51', '2025-06-13 04:05:51'),
(24, 'user', '1234567890', 'kataremayank79@gmail.com', '3:00 PM - 4:00 PM', 'aaaaa', '2025-06-13 04:19:25', '2025-06-13 04:19:25'),
(25, 'user', '1234567890', 'kataremayank79@outlook.com', '12:00 PM - 1:00 PM', 'aaaaa', '2025-06-13 04:47:40', '2025-06-13 04:47:40'),
(26, 'user', '1234567890', 'kataremayank79@outlook.com', '12:00 PM - 1:00 PM', 'bbbb', '2025-06-13 05:02:00', '2025-06-13 05:02:00'),
(27, 'user', '1234567890', 'kataremayank79@outlook.com', '12:00 PM - 1:00 PM', 'admission', '2025-06-13 06:05:20', '2025-06-13 06:05:20'),
(28, 'user', '1234567890', 'kataremayank79@outlook.com', '12:00 PM - 1:00 PM', 'admission', '2025-06-13 06:06:09', '2025-06-13 06:06:09'),
(29, 'user', '1234567890', 'kataremayank79@outlook.com', '12:00 PM - 1:00 PM', 'admission', '2025-06-13 06:08:06', '2025-06-13 06:08:06'),
(30, 'user', '1234567890', 'kataremayank79@gmail.com', '12:00 PM - 1:00 PM', 'admission', '2025-06-13 06:09:09', '2025-06-13 06:09:09'),
(31, 'user', '1234567890', 'kataremayank79@gmail.com', '3:00 PM - 4:00 PM', 'admission', '2025-06-13 06:11:38', '2025-06-13 06:11:38'),
(32, 'user', '1234567890', 'kataremayank79@gmail.com', '3:00 PM - 4:00 PM', 'admission', '2025-06-13 07:01:57', '2025-06-13 07:01:57'),
(33, 'user', '1234567890', 'kataremayank79@gmail.com', '3:00 PM - 4:00 PM', 'admission', '2025-06-13 07:11:32', '2025-06-13 07:11:32'),
(34, 'Riya Sharma', '9876543210', 'riya.sharma@example.com', '10pm', 'gfgfg', '2025-07-14 05:52:30', '2025-07-14 05:52:30');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `name`, `category_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'what are admission reuirements', 1, 'Admission requirements typically include a completed application form, academic transcripts, proof of identity', 1, '2025-04-04 03:51:29', '2025-04-24 02:37:13'),
(3, 'When does the admission process start?', 1, 'Admissions typically start in March every year.', 1, '2025-04-24 02:16:37', '2025-04-24 02:16:37'),
(4, 'What are the tuition fees?', 2, 'Tuition fees depend on the course you select. Refer to the brochure.', 1, '2025-05-01 08:15:27', '2025-05-01 08:15:27'),
(5, 'Are there any scholarships available?', 2, 'Yes, we offer merit-based and need-based scholarships.', 1, '2025-05-01 08:16:15', '2025-05-01 08:16:15'),
(6, 'What curriculum do you follow?', 5, 'We follow the CBSE/ICSE curriculum depending on the grade level.', 1, '2025-05-01 08:17:07', '2025-05-01 08:17:07'),
(7, 'What are the class sizes?', 5, 'Class sizes are kept small, averaging 25 students per class.', 1, '2025-05-01 08:17:47', '2025-05-01 08:17:47'),
(8, 'What are the teacher qualifications required?', 6, 'A B.Ed. degree and relevant teaching experience are required.', 1, '2025-05-01 08:18:58', '2025-05-01 08:18:58'),
(9, 'How can I apply for a teaching position?', 6, 'You can apply through the careers section on our website.', 1, '2025-05-01 08:20:01', '2025-05-01 08:20:01'),
(10, 'What is the working schedule?', 7, 'Our school operates from 9 AM to 9 PM. Teachers can choose flexible shifts within this timeframe that best suit their schedule and lifestyle. Both full-time and part-time positions are available', 1, '2025-05-01 08:31:42', '2025-05-01 08:31:42'),
(11, 'Do I need prior teaching experience?', 7, 'No, prior experience is not mandatory. We provide training to all new teachers.', 1, '2025-05-01 08:32:36', '2025-05-01 08:32:36'),
(12, 'What benefits do I get?', 7, 'Benefits include paid training, flexible hours, health insurance, and performance bonuses.', 1, '2025-05-01 08:33:50', '2025-05-01 08:33:50'),
(13, 'How long does the hiring process take?', 7, 'Typically, it takes about 1 to 2 weeks after your initial application.', 1, '2025-05-01 08:34:24', '2025-05-01 08:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `franchises`
--

CREATE TABLE `franchises` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_heading` varchar(255) NOT NULL,
  `banner_para` text NOT NULL,
  `btn_name` varchar(255) NOT NULL,
  `btn_link` varchar(255) DEFAULT NULL,
  `why_choose_heading` varchar(255) DEFAULT NULL,
  `why_choose_para` text DEFAULT NULL,
  `requirement_heading` varchar(255) NOT NULL,
  `requirement_para` text NOT NULL,
  `requirement_image1` varchar(255) NOT NULL,
  `requirement_title1` varchar(255) NOT NULL,
  `requirement_image2` varchar(255) NOT NULL,
  `requirement_title2` varchar(255) NOT NULL,
  `investment_heading` varchar(255) DEFAULT NULL,
  `investment_para` text DEFAULT NULL,
  `investment_image` varchar(255) DEFAULT NULL,
  `steps_heading` varchar(255) NOT NULL,
  `steps_para` text NOT NULL,
  `step1` varchar(255) NOT NULL,
  `step2` varchar(255) NOT NULL,
  `step3` varchar(255) NOT NULL,
  `step4` varchar(255) NOT NULL,
  `location_heading` varchar(255) NOT NULL,
  `location_para` text NOT NULL,
  `blog_heading` varchar(255) NOT NULL,
  `blog_para` text DEFAULT NULL,
  `get_start_heading` varchar(255) NOT NULL,
  `get_start_para` text NOT NULL,
  `get_start_btn_name` varchar(255) NOT NULL,
  `get_start_link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `why_choose_heading1` varchar(255) DEFAULT NULL,
  `why_choose_para1` text DEFAULT NULL,
  `why_choose_heading2` varchar(255) DEFAULT NULL,
  `why_choose_para2` text DEFAULT NULL,
  `why_choose_heading3` varchar(255) DEFAULT NULL,
  `why_choose_para3` text DEFAULT NULL,
  `why_choose_heading4` varchar(255) DEFAULT NULL,
  `why_choose_para4` text DEFAULT NULL,
  `why_choose_heading5` varchar(255) DEFAULT NULL,
  `why_choose_para5` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `franchises`
--

INSERT INTO `franchises` (`id`, `banner_image`, `banner_heading`, `banner_para`, `btn_name`, `btn_link`, `why_choose_heading`, `why_choose_para`, `requirement_heading`, `requirement_para`, `requirement_image1`, `requirement_title1`, `requirement_image2`, `requirement_title2`, `investment_heading`, `investment_para`, `investment_image`, `steps_heading`, `steps_para`, `step1`, `step2`, `step3`, `step4`, `location_heading`, `location_para`, `blog_heading`, `blog_para`, `get_start_heading`, `get_start_para`, `get_start_btn_name`, `get_start_link`, `status`, `created_at`, `updated_at`, `why_choose_heading1`, `why_choose_para1`, `why_choose_heading2`, `why_choose_para2`, `why_choose_heading3`, `why_choose_para3`, `why_choose_heading4`, `why_choose_para4`, `why_choose_heading5`, `why_choose_para5`) VALUES
(1, 'assets/images/franchise/banner/681f440d64165.webp', 'Start Your Own', 'Join India\'s fastest-growing education franchise network and build a profitable business while transforming education.', 'Apply For Franchise', 'lorem ipsum', 'Open 9 AM to 9 PM', 'Flexible operations that cater to various student schedules and maximize your earning potential.', 'lorem ipsum', 'lorem ipsum', 'assets/images/franchise/requirement/6811926ecac35.webp', 'lorem ipsum', 'assets/images/franchise/requirement/6811926ef2a16.webp', 'lorem ipsum', 'Investment vs Return', 'See how your investment grows over time', 'assets/images/franchise/requirement/6811979380e21.webp', 'lorem ipsum', 'lorem ipsum', 'Submit Application', 'Get Onboarded & Trained', 'Set Up Center & Go Live', 'Start Earning with 9to9School', 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'Ready to Get Started?', 'Join our network of successful franchise owners and make a difference in your community', 'Book a Visit', 'lorem ipsum', 1, '2025-06-12 15:22:10', '2025-06-12 15:22:10', 'Pay-per-class Model', 'Simple booking and payment system that allows for transparent financial management.', 'Modern Admin Dashboard', 'Complete control over your franchise with an intuitive management dashboard.', 'Parent Mobile App', 'Keep parents engaged with real-time progress tracking and easy communication.', 'Full Onboarding Support', 'Zero experience needed - we provide complete training and ongoing support.', 'Low Investment, High ROI', 'Start your profitable education business with minimal upfront investment.');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(250) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `type` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `video`, `heading`, `status`, `type`, `created_at`, `updated_at`) VALUES
(9, NULL, 'assets/videos/gallery/6855531ff1a54.mp4', 'test', 1, 'video', '2025-06-20 06:55:03', '2025-06-20 06:55:03'),
(10, 'assets/images/gallery/685e3fca09a99.webp', NULL, 'test', 1, 'image', '2025-06-27 01:22:58', '2025-06-27 01:22:58'),
(11, 'assets/images/gallery/685e49672e20a.webp', NULL, 'test55', 1, 'image', '2025-06-27 02:03:59', '2025-06-27 02:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `habits`
--

CREATE TABLE `habits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `type` enum('good','bad') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `habits`
--

INSERT INTO `habits` (`id`, `name`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'rtrt rtrt', 'active', 'good', '2025-07-14 12:56:17', '2025-07-14 12:56:17'),
(2, 'test', 'active', 'bad', '2025-07-14 12:56:31', '2025-07-14 12:56:31');

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
-- Table structure for table `kits`
--

CREATE TABLE `kits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `products` varchar(255) DEFAULT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `final_price` decimal(10,2) DEFAULT NULL,
  `age` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kits`
--

INSERT INTO `kits` (`id`, `title`, `image`, `desc`, `products`, `discount_price`, `final_price`, `age`, `created_at`, `updated_at`) VALUES
(3, 'dfdfdf', 'assets/images/products/kit/6856cc0f3f362.jpg', 'rrrtrt', '[\"4\"]', 4444.00, 444.00, '5-6 Years', '2025-06-21 09:43:19', '2025-06-21 09:43:19'),
(4, 'test', 'assets/images/products/kit/6866a817b406a.jpg', 'test', '[\"4\"]', 30.00, 30.00, '5-6 Years', '2025-07-03 10:26:07', '2025-07-03 10:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `kit_orders`
--

CREATE TABLE `kit_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `kit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `delivery_charge` decimal(10,2) DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `payment_date` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kit_orders`
--

INSERT INTO `kit_orders` (`id`, `order_id`, `parent_id`, `school_id`, `student_id`, `kit_id`, `user_id`, `name`, `address`, `email`, `city`, `state`, `pincode`, `phone`, `item_price`, `delivery_charge`, `total`, `status`, `payment_date`, `source`, `type`, `created_at`, `updated_at`) VALUES
(1, 'ORDTQY2GQH4', NULL, NULL, NULL, 2, 1, 'Mayank', 'Mahakali Ward', NULL, 'Sagar', 'MP', '470001', '9876543210', 44.00, 40.00, 84.00, 'paid', NULL, NULL, NULL, '2025-06-07 04:20:48', '2025-06-07 04:26:19'),
(2, 'ORDK8XMMW59', NULL, NULL, NULL, 2, 1, 'Mayank', 'Mahakali Ward', NULL, 'Sagar', 'MP', '470001', '9876543210', 44.00, 40.00, 84.00, 'paid', NULL, NULL, NULL, '2025-06-07 05:46:52', '2025-06-07 06:17:07'),
(13, 'ORDGFGKKYLY', NULL, NULL, NULL, 2, 1, 'harshita', 'Mahakali Ward', NULL, 'Sagar', 'MP', '470001', '9876543210', 44.00, 40.00, 84.00, 'paid', NULL, NULL, NULL, '2025-06-09 08:24:35', '2025-06-09 08:24:35'),
(16, 'KORDER_252848', 3, 1, 3, 3, 5, 'Rohit Sharma', '123 Main Street', NULL, 'Mumbai', 'Maharashtra', '400001', '9876543210', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 01:16:41', '2025-06-23 01:16:41'),
(17, 'KORDER_993432', 3, 1, 3, 3, 5, 'Rohit Sharma', '123 Main Street', NULL, 'Mumbai', 'Maharashtra', '400001', '9876543210', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 01:17:20', '2025-06-23 01:17:20'),
(18, 'KORDER_690143', 3, 1, 3, 3, 5, 'Rohit Sharma', '123 Main Street', NULL, 'Mumbai', 'Maharashtra', '400001', '9876543210', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 01:18:39', '2025-06-23 01:18:39'),
(19, 'KORDER_379012', 3, 1, 3, 3, 5, 'Rohit Sharma', '123 Main Street', NULL, 'Mumbai', 'Maharashtra', '400001', '9876543210', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 01:19:32', '2025-06-23 01:19:32'),
(20, 'KORDER_813765', 3, 1, 3, 3, 5, 'Rohit Sharma', '123 Main Street', NULL, 'Mumbai', 'Maharashtra', '400001', '9876543210', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 01:19:52', '2025-06-23 01:19:52'),
(21, 'KORDER_441708', 2, 2, 2, 3, 2, 'rtrt rtrt', 'ghghg', NULL, 'ghghg', 'ghgh', '65656', '4454545', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 02:57:17', '2025-06-23 02:57:17'),
(22, 'KORDER_436563', 2, 2, 2, 3, 2, 'rtrt rtrt', 'ghghg', NULL, 'ghghg', 'ghgh', '65656', '1234567892', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 02:59:40', '2025-06-23 02:59:40'),
(23, 'KORDER_624175', 2, 2, 2, 3, 2, 'rtrt rtrt', 'ghghg', NULL, 'ghghg', 'ghgh', '65656', '1234567892', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 03:00:52', '2025-06-23 03:00:52'),
(24, 'KORDER_338390', 2, 2, 2, 3, 2, 'rtrt rtrt', 'ghghg', NULL, 'ghghg', 'ghgh', '65656', '1234567892', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 03:01:47', '2025-06-23 03:01:47'),
(25, 'KORDER_817965', 5, 5, 5, 3, 5, 'rtrt rtrt', 'ghghg', NULL, 'ghghg', 'ghgh', '65656', '1234567896', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 03:08:40', '2025-06-23 03:08:40'),
(26, 'KORDER_632648', 5, 5, 5, 3, 5, 'rtrt rtrt', 'ghghg', NULL, 'ghghg', 'ghgh', '65656', '1234567896', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 03:17:25', '2025-06-23 03:17:25'),
(27, 'KORDER_344625', 5, 5, 5, 3, 5, 'rtrt rtrt', 'ghghg', NULL, 'ghghg', 'ghgh', '65656', '1234567896', 444.00, 40.00, 484.00, 'PAID', NULL, 'apk', NULL, '2025-06-23 03:17:59', '2025-06-23 03:22:39'),
(28, 'KORDER_528675', 3, 3, 3, 3, 3, 'rtrt rtrt', 'fgfgf', NULL, 'ghghg', 'ghgh', '65656', '1233214565', 444.00, 40.00, 484.00, 'pending', NULL, 'apk', NULL, '2025-06-23 04:01:41', '2025-06-23 04:01:41'),
(29, 'KORDER_169353', 1, 0, 0, 3, 1, 'test', 'fgfgf', NULL, 'ghghg', 'ghgh', '65656', '01233214565', 444.00, 40.00, 484.00, 'PAID', '17-07-2025', 'apk', 'pre-reg', '2025-07-17 01:44:39', '2025-07-17 01:45:09'),
(30, 'KORDER_801630', 5, 1, 3, 3, NULL, 'Rohit Sharma', '123 Main Street', NULL, 'Mumbai', 'Maharashtra', '400001', '9876543210', 444.00, 40.00, 484.00, 'pending', '17-07-2025', 'apk', 'pre-reg', '2025-07-17 02:43:19', '2025-07-17 02:43:19'),
(31, 'KORDER_332379', 5, 0, 0, 3, NULL, 'Rohit Sharma', '123 Main Street', NULL, 'Mumbai', 'Maharashtra', '400001', '9876543210', 444.00, 40.00, 484.00, 'pending', '17-07-2025', 'apk', 'pre-reg', '2025-07-17 02:52:46', '2025-07-17 02:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `life_hack_details`
--

CREATE TABLE `life_hack_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `life_hack_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `short_summary` text DEFAULT NULL,
  `meta_type` enum('title','description','keywords') NOT NULL DEFAULT 'title',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `life_hack_details`
--

INSERT INTO `life_hack_details` (`id`, `life_hack_id`, `title`, `image`, `description`, `button_name`, `button_link`, `status`, `short_summary`, `meta_type`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test', NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-18 05:11:56', '2025-06-18 05:11:56'),
(2, NULL, 'tfgfgfg', 'assets/images/life_skills/add-content/6852980480922.webp', '<p>fgfgfdgfd</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-18 05:12:12', '2025-06-18 05:12:12'),
(5, 3, 'test555', 'assets/images/life_skills/add-content/6855386289fe9.webp', 'fdfdfdfd', NULL, NULL, 'active', NULL, 'title', '2025-06-20 05:00:58', '2025-06-20 05:00:58'),
(7, 7, 'fereriiobnnndd', 'assets/images/life_skills/add-content/6855396b6bd98.webp', '<p>ewewe</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-20 05:05:23', '2025-06-28 04:16:07'),
(9, 4, 'test123', 'assets/images/life_skills/add-content/685698116bb7f.webp', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem', NULL, NULL, 'active', NULL, 'title', '2025-06-21 06:01:29', '2025-06-21 06:01:29'),
(10, 10, 'test3333', 'assets/images/life_skills/add-content/6856982945498.webp', '<p>sdsdsdsd</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-21 06:01:53', '2025-06-28 04:17:55'),
(11, 8, NULL, NULL, '<h3><strong>The standard Lorem Ipsum passage, used since the 1500s</strong></h3><p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3><strong>Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</strong></h3><p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-26 01:56:39', '2025-06-26 02:01:43'),
(12, 12, 'dsdsdsdd', 'assets/images/life_skills/add-content/685fb87545e7c.webp', '<p>sdsssds</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-28 04:10:05', '2025-06-28 04:13:30'),
(13, 13, 'test', 'assets/images/life_skills/add-content/685fb968088ee.webp', '<p>ddsds</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-28 04:14:08', '2025-06-28 04:15:22'),
(14, 3, 'yyy', 'assets/images/life_skills/add-content/685fb9d9cf265.webp', '<p>fdfdfdf</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-28 04:16:01', '2025-06-28 04:16:01'),
(15, 15, 'fdfdf', 'assets/images/life_skills/add-content/685fba6fb3ded.webp', '<p>fdfdfdfd</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-28 04:18:31', '2025-06-28 04:18:48'),
(16, 16, 'ddd', 'assets/images/life_skills/add-content/685fbbf4e99a6.webp', '<p>dsds</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-28 04:25:00', '2025-06-28 04:25:06'),
(17, 4, 'sssd', 'assets/images/life_skills/add-content/685fbc32bf101.webp', '<p>sadsds</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-28 04:26:02', '2025-06-28 04:26:02'),
(18, 4, 'fdfdf', 'assets/images/life_skills/add-content/685fbdd665ae6.webp', '<p>sdsds</p>', NULL, NULL, 'active', NULL, 'title', '2025-06-28 04:33:02', '2025-06-28 04:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `life_skills_hacks`
--

CREATE TABLE `life_skills_hacks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_heading` varchar(255) DEFAULT NULL,
  `banner_description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `life_skills_hacks`
--

INSERT INTO `life_skills_hacks` (`id`, `title`, `url`, `image`, `description`, `banner_image`, `banner_heading`, `banner_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The Power of Preschool Community: Building Connections Beyond the Classroom', 'the-power-of-preschool-community-building-connections-beyond-the-classroom', 'assets/images/life_skills/6818a2208a81c.webp', 'At 9to9 school , we believe preschool is more than just early education it’s the beginning of a child’s social world', 'assets/images/life_skills/banner/6818a22141d29.webp', NULL, 'At 9to9 school , we believe preschool is more than just early education it’s the beginning of a child’s social world. A strong preschool community lays the foundation for lifelong relationships, a sense of belonging, and meaningful growth. When children feel connected, safe, and seen, they thrive not just in the classroom, but in every area of their development.\r\nOur goal is to nurture those connections through more than just play and structured learning. We celebrate birthdays together, share meals, explore emotions, and solve problems as a team. In these everyday moments, children learn empathy, cooperation, and confidence. They begin to understand they are part of something bigger a  classroom family where their voice matters.\r\nBut the power of community doesn\'t stop with the children. It extends to parents, too. We want every family to feel welcome, informed, and involved. Whether it’s chatting during drop-off, joining us for a special event, or reading classroom updates, we invite you to be part of your child’s world at school. You are not just enrolling in a program; you’re joining a community that celebrates your child’s uniqueness and supports your parenting journey.\r\nTogether, we raise kind, curious, and connected little humans. When a child sees their parents and teachers working as a team, they gain a deep sense of security that stays with them far beyond preschool. It takes a village and at 9to9 school , we’re proud to be part of yours.', 1, '2025-05-05 11:35:10', '2025-05-05 11:35:10'),
(2, 'Screen Time and Preschoolers: What’s Too Much?', 'screen-time-and-preschoolers-whats-too-much', 'assets/images/life_skills/6818a9eed7f28.webp', 'Screens are everywhere phones, tablets, TVs and while technology has its place, it’s natural for parents to wonder: how much is too much?', 'assets/images/life_skills/banner/6818a9ef8311b.webp', NULL, 'Screens are everywhere phones, tablets, TVs and while technology has its place, it’s natural for parents to wonder: how much is too much? At 9to9 school , we understand the modern challenges of parenting in a digital age. That’s why we focus on balance and connection, helping families find screen habits that support not replace real-life learning.\r\nResearch suggests that preschoolers benefit most from hands-on, imaginative, and social experiences. Excessive screen time can impact attention span, sleep, and social skills. But that doesn’t mean all screen use is bad. Video chats with grandparents, interactive story apps, or calming music can be wonderful tools when used with care and intention.\r\nOur philosophy is simple: screens should never replace human connection. Children learn best through play, movement, and face-to-face communication. That’s why in our classrooms, you’ll find building blocks instead of tablets, story time instead of screen time, and group activities that build real social-emotional skills.\r\nWe also support parents in building healthy media habits at home. Setting limits, choosing high-quality content, and co-viewing can make a big difference. A good rule of thumb? If screen time is getting in the way of sleep, play, or family time, it may be time to reset.\r\nYou’re not alone in navigating this. We’re here to partner with you without judgment to support your child’s development in and out of the classroom. Together, we can help them grow up curious, balanced, and connected to the world around them not just the one on a screen.', 1, '2025-05-05 12:07:11', '2025-05-05 12:07:11'),
(3, 'Separation Anxiety: What’s Normal and How to Help', 'separation-anxiety-whats-normal-and-how-to-help', 'assets/images/life_skills/6818ac0072cbf.webp', 'That tearful goodbye at drop-off can tug at every parent’s heart. Separation anxiety is a common and completely normal part of early childhood but that doesn’t make it easy.', 'assets/images/life_skills/banner/6818ac011987a.webp', NULL, 'That tearful goodbye at drop-off can tug at every parent’s heart. Separation anxiety is a common and completely normal part of early childhood but that doesn’t make it easy. At 9to9 school , we honour both your child’s emotions and your own, helping families transition with care, patience, and trust.\r\nFor many young children, preschool is their first big step away from home. It’s unfamiliar, and they’re learning to trust a new environment without their parents by their side. This anxiety often shows up as tears, clinginess, or fear but underneath it all is a growing child learning how to cope, adapt, and become more independent.\r\nOur teachers are trained to respond with empathy, not pressure. We build predictable routines, offer comforting transitions, and form strong relationships with each child so they feel seen and safe. In time often quicker than expected most children begin to run through the doors with excitement.\r\nParents play a big role in this transition too. Staying calm and confident during drop-off, creating a consistent goodbye ritual, and talking positively about school at home can all make a difference. It’s okay to feel emotional we see you, and we’re here to support you, too.\r\nSeparation anxiety is a sign of strong attachment, not weakness. It means your child has a loving bond and is learning that they can return to you even after time apart. With warmth, patience, and partnership, we help children move from fear to confidence. And in that journey, we build trust not only between the child and teacher, but between your family and our school community. We’re with you every step of the way.', 1, '2025-05-05 12:16:01', '2025-05-05 12:16:01'),
(4, 'ryrtyt', 'ryrtyt', 'assets/images/life_skills/686cd0c2366c8.webp', 'fgfdgfg', 'assets/images/life_skills/banner/68529eb074a36.webp', 'tytyty', 'ghghg', 1, '2025-07-08 08:03:14', '2025-07-08 02:33:14'),
(6, 'fhgfhgf666', 'fhgfhgf666', 'assets/images/life_skills/686ccfd0221dd.webp', 'test2666', 'assets/images/life_skills/banner/6856a1bc3ae3a.webp', 'test66', 'jhgjggjgjgjgjgghgjhghhgh66', 1, '2025-07-08 07:59:12', '2025-07-08 02:29:12'),
(7, 'test22', 'test22', 'assets/images/life_skills/686ccfea70b92.webp', 'Embracing the 9-to-9 Preschool: Redefining Your Role as Educators As educators, we’ve always balanced nurturing young minds with structure and curriculum. But what happens when school becomes more flexible open from 9 AM to 9 PM and infused with real-time parent tracking and adaptive learning? We don’t just adapt. We evolve. Why Flexible Preschools Need Evolving Teachers Extended hours don’t mean extended stress. In fact, they offer more creative space. With rotating shifts, integrated technology, and flexible scheduling, educators have more room to personalise learning and offer children something incredibly rare: individual attention on their timeline. This isn’t just a model shift. It’s a mindset shift. New Skills for a New Model Tech-Integrated Teaching: Use apps not just for reporting, but for reflection. Share moments, celebrate milestones. Parents love real-time feedback. Activity-Based Learning: Flexible time = less rigidity. So plan story-based, tactile, and exploratory sessions throughout the day. Evening Learners Matter: Some children shine in evening hours. Flexibility helps uncover hidden learning styles that strict 9-to-1 schools often miss. Collaboration & Communication Be the bridge. With an open-door model, your communication with parents (via app or in-person) becomes vital. Clarity and warmth go a long way. Teamwork between educators is key. With staggered shifts, strong handovers, shared curriculum logs, and unified goals keep the preschool experience smooth. Teaching in This Model is a Privilege You’re not just a teacher you’re a guide, a nurturer, and now, a co-partner with families in real-time. This preschool isn’t just redefining learning for kids it’s elevating your impact. Let’s embrace this evolution together. Till next time, With Gratitude, Team 9to9\r\n\r\nEmbracing the 9-to-9 Preschool: Redefining Your Role as Educators As educators, we’ve always balanced nurturing young minds with structure and curriculum. But what happens when school becomes more flexible open from 9 AM to 9 PM and infused with real-time parent tracking and adaptive learning? We don’t just adapt. We evolve. Why Flexible Preschools Need Evolving Teachers Extended hours don’t mean extended stress. In fact, they offer more creative space. With rotating shifts, integrated technology, and flexible scheduling, educators have more room to personalise learning and offer children something incredibly rare: individual attention on their timeline. This isn’t just a model shift. It’s a mindset shift. New Skills for a New Model Tech-Integrated Teaching: Use apps not just for reporting, but for reflection. Share moments, celebrate milestones. Parents love real-time feedback. Activity-Based Learning: Flexible time = less rigidity. So plan story-based, tactile, and exploratory sessions throughout the day. Evening Learners Matter: Some children shine in evening hours. Flexibility helps uncover hidden learning styles that strict 9-to-1 schools often miss. Collaboration & Communication Be the bridge. With an open-door model, your communication with parents (via app or in-person) becomes vital. Clarity and warmth go a long way. Teamwork between educators is key. With staggered shifts, strong handovers, shared curriculum logs, and unified goals keep the preschool experience smooth. Teaching in This Model is a Privilege You’re not just a teacher you’re a guide, a nurturer, and now, a co-partner with families in real-time. This preschool isn’t just redefining learning for kids it’s elevating your impact. Let’s embrace this evolution together. Till next time, With Gratitude, Team 9to9', 'assets/images/life_skills/banner/685aaa3643716.webp', NULL, NULL, 1, '2025-07-08 07:59:38', '2025-07-08 02:29:38'),
(8, 'test33', 'test33', 'assets/images/life_skills/685cf57a06668.webp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electroni', 'assets/images/life_skills/banner/685cf57a93c38.webp', 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electroni', 1, '2025-06-26 01:53:38', '2025-06-26 01:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `master_payments`
--

CREATE TABLE `master_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_payments`
--

INSERT INTO `master_payments` (`id`, `student_id`, `parent_id`, `school_id`, `order_id`, `total`, `source`, `purpose`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 5, 'KORDER_344625', 484.00, 'apk', 'kit order', '2025-06-23 03:22:39', '2025-06-23 03:22:39'),
(2, 3, 3, 3, 'EORDER_480784', 84.00, 'apk', 'Event order', '2025-06-23 04:09:33', '2025-06-23 04:09:33'),
(3, 3, 3, 7, 'SFORDER_946541', 444.00, 'apk', 'Student Fees', '2025-06-23 05:27:40', '2025-06-23 05:27:40'),
(4, 3, 3, 7, 'SFORDER_946541', 444.00, 'apk', 'Student Fees', '2025-06-23 05:29:13', '2025-06-23 05:29:13'),
(5, 0, 1, 0, 'KORDER_169353', 484.00, 'apk', 'kit order', '2025-07-17 01:45:09', '2025-07-17 01:45:09'),
(6, NULL, 67, 6, 'SFORDER_274016', 500.00, 'apk', 'wallet recharge', '2025-07-25 04:02:38', '2025-07-25 04:02:38'),
(7, NULL, 67, 6, 'SFORDER_274016', 500.00, 'apk', 'wallet recharge', '2025-07-25 04:02:57', '2025-07-25 04:02:57'),
(8, NULL, 67, 6, 'SFORDER_274016', 500.00, 'apk', 'wallet recharge', '2025-07-25 04:03:27', '2025-07-25 04:03:27'),
(9, NULL, 67, 6, 'SFORDER_537202', 5000.00, 'apk', 'wallet recharge', '2025-07-25 04:31:07', '2025-07-25 04:31:07'),
(10, NULL, 67, 6, 'SFORDER_537202', 5000.00, 'apk', 'wallet recharge', '2025-07-25 08:34:16', '2025-07-25 08:34:16');

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
(4, '2025_03_25_095927_create_personal_access_tokens_table', 1),
(5, '2025_03_30_142657_create_app_onboarding_table', 1),
(6, '2025_03_30_143100_on_boarding_slider_table', 1),
(7, '2025_03_30_143727_create_conference_table', 2),
(8, '2025_03_30_143927_create_pre_registration_table', 2),
(9, '2025_03_30_144130_create_pre_register_price_table', 2),
(10, '2025_04_01_070651_crate_usps_table', 3),
(11, '2025_04_02_053629_create_banners_table', 4),
(12, '2025_04_02_062829_create_blogs_table', 5),
(13, '2025_04_03_060802_create_otps_table', 6),
(14, '2025_04_04_065043_create_categories_table', 7),
(15, '2025_04_04_065613_create_faqs_table', 8),
(16, '2025_04_04_101521_create_common_settings_table', 9),
(17, '2025_04_05_071707_create_events_table', 10),
(18, '2025_04_05_115822_create_web_banners_table', 11),
(19, '2025_04_06_110108_create_pages_preschool_table', 12),
(20, '2025_04_25_065627_create_pre_banners_table', 12),
(21, '2025_04_25_065646_create_pre_explores_table', 12),
(22, '2025_04_25_065710_create_pre_whychooses_table', 12),
(23, '2025_04_25_065749_create_pre_program_tailoreds_table', 12),
(24, '2025_04_25_065824_create_pre_child_safeties_table', 12),
(25, '2025_04_25_065852_create_pre_galleries_table', 12),
(26, '2025_04_29_140728_create_daycare_banners_table', 13),
(27, '2025_04_29_140759_create_daycare_whychooses_table', 13),
(28, '2025_04_29_140900_create_daycare_programs_table', 13),
(29, '2025_04_29_141012_create_daycare_activites_table', 13),
(30, '2025_04_30_122705_create_daycare_skills_table', 13),
(31, '2025_04_30_122741_create_daycare_schedules_table', 13),
(32, '2025_05_29_142445_create_apply_franchise_table', 14),
(33, '2025_05_30_121940_create_usp_details_table', 15),
(34, '2025_05_31_070047_create_products_table', 16),
(35, '2025_05_31_134926_create_kits_table', 17),
(36, '2025_06_03_064756_create_programmes_table', 18),
(37, '2025_06_05_095016_create_activity_pay_table', 19),
(38, '2025_06_05_111621_create_daycare_pays_table', 20),
(39, '2025_06_07_121028_create_sub_topics_table', 21),
(40, '2025_06_13_083828_create_school_banners_table', 22),
(41, '2025_06_13_095714_create_school_galleries_table', 23),
(42, '2025_06_13_110523_create_school_aboutuses_table', 24),
(43, '2025_06_13_121125_create_schoolfacilities_table', 25),
(44, '2025_06_13_141222_create_teacher_applications_table', 26),
(47, '2025_06_14_105209_create_school_fees_table', 27),
(48, '2025_06_17_072204_create_add_remarks_table', 28),
(50, '2025_06_17_130116_create_add_progress_table', 29),
(51, '2025_06_21_142705_create_master_payments_table', 30),
(52, '2025_07_03_082005_create_apply_leaves_table', 31),
(53, '2025_07_15_053645_create_teacher_galleries_table', 32),
(54, '2025_07_15_082150_create_teacher_wallets_table', 33),
(55, '2025_07_26_074305_create_partner_schools_table', 34),
(56, '2025_07_26_080423_create_partner_school_fees_table', 35),
(57, '2025_07_31_065716_create_enquiry_partner_schools_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `popular_id` bigint(20) UNSIGNED NOT NULL,
  `goal_month` varchar(255) DEFAULT NULL,
  `goal_heading` varchar(255) DEFAULT NULL,
  `goal_description` text DEFAULT NULL,
  `goal_breaf` text DEFAULT NULL,
  `topics_including` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `popular_id`, `goal_month`, `goal_heading`, `goal_description`, `goal_breaf`, `topics_including`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 'months 1-3', 'Orientation & Foundation (Months 1-3)', 'Themes: Me & My World, Family, Body Parts, Colors', 'Themes: Me & My World, Family, Body Parts, Colors', '[\"1\",\"2\",\"3\",\"6\",\"7\",\"9\"]', 1, '2025-05-16 15:41:45', '2025-06-11 09:39:35'),
(9, 1, 'months 4-6', 'Exploration & Curiosity (Months 4-6)', 'Themes: Animals, Nature, Emotions, Opposites', 'Themes: Animals, Nature, Emotions, Opposites', '[\"1\",\"2\",\"3\",\"6\",\"7\",\"9\"]', 1, '2025-05-16 15:44:50', '2025-06-11 09:43:42'),
(10, 1, 'months 7-9', 'Communication & Discovery (Months 7-9)', 'Themes: Food, Transport, Community Helpers, Patterns', 'Themes: Food, Transport, Community Helpers, Patterns', '[\"1\",\"2\",\"3\",\"6\",\"7\",\"9\"]', 1, '2025-05-16 15:47:07', '2025-06-11 09:41:37'),
(11, 1, 'months 10-12', 'Integration & Readiness (Months 10-12)', 'Themes: Seasons, Celebrations, Home & School, Numbers', 'Themes: Seasons, Celebrations, Home & School, Numbers', '[\"1\",\"2\",\"3\",\"6\",\"7\",\"9\"]', 1, '2025-05-16 15:49:03', '2025-06-11 09:42:30'),
(12, 2, 'months 1-3', 'Building Independence & Routine (Months 1–3)', 'Themes: All About Me, My Family, Colors, Shapes', 'Themes: All About Me, My Family, Colors, Shapes', '[\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', 1, '2025-05-16 15:50:31', '2025-06-11 10:04:30'),
(13, 2, 'months 4-6', 'Exploration & Vocabulary Building (Months 4–6)', 'Themes: Animals, Seasons, Emotions, Opposites', 'Themes: Animals, Seasons, Emotions, Opposites', '[\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', 1, '2025-05-16 15:53:01', '2025-06-11 10:05:46'),
(14, 2, 'months 7-9', 'Communication & Pre-Academics (Months 7–9)', 'Themes: Transport, Community Helpers, Patterns, Numbers', 'Themes: Transport, Community Helpers, Patterns, Numbers', '[\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', 1, '2025-05-16 15:54:18', '2025-06-11 10:06:39'),
(15, 2, 'months 10-12', 'Readiness & Integration (Months 10–12)', 'Themes: Food & Nutrition, Home & School, Numbers & Letters, Safety', 'Themes: Food & Nutrition, Home & School, Numbers & Letters, Safety', '[\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', 1, '2025-05-16 15:55:43', '2025-06-11 10:07:39'),
(16, 3, 'months 1-3', 'Foundation & Familiarization (Months 1–3)', 'Themes: All About Me, My School, My Family, Colors & Shapes', 'Themes: All About Me, My School, My Family, Colors & Shapes', '[\"16\",\"17\",\"18\",\"19\",\"20\",\"21\"]', 1, '2025-05-16 15:57:47', '2025-06-11 10:14:20'),
(17, 3, 'months 4-6', 'Exploration & Concept Development (Months 4–6)', 'Themes: Seasons, Animals, Community Helpers, Comparing & Measuring', 'Themes: Seasons, Animals, Community Helpers, Comparing & Measuring', '[\"16\",\"17\",\"18\",\"19\",\"20\",\"21\"]', 1, '2025-05-16 15:59:21', '2025-06-11 12:11:23'),
(18, 3, 'months 7-9', 'Academic Readiness (Months 7–9)', 'Themes: Numbers & Patterns, Transportation, Safety, Healthy Habits', 'Themes: Numbers & Patterns, Transportation, Safety, Healthy Habits', '[\"16\",\"17\",\"18\",\"19\",\"20\",\"21\"]', 1, '2025-05-16 16:14:01', '2025-06-11 12:12:43'),
(19, 3, 'months 10-12', 'Integration & Independence (Months 10–12)', 'Themes: Nature, Weather, Celebrations Around the World, Time Concepts', 'Themes: Nature, Weather, Celebrations Around the World, Time Concepts', '[\"16\",\"17\",\"18\",\"19\",\"20\",\"21\"]', 1, '2025-05-16 16:15:31', '2025-06-11 12:13:23'),
(20, 4, '3 Months', NULL, NULL, NULL, '[\"53\",\"54\",\"55\",\"56\"]', 1, '2025-05-16 16:20:05', '2025-05-16 16:20:05'),
(21, 4, '6 Months', NULL, NULL, NULL, '[\"57\",\"58\",\"59\",\"60\"]', 1, '2025-05-16 16:21:32', '2025-05-16 16:21:32'),
(22, 4, '9 Months', NULL, NULL, NULL, '[\"61\",\"62\",\"63\",\"64\"]', 1, '2025-05-16 16:24:39', '2025-05-16 16:24:39'),
(23, 4, '12 Months', NULL, NULL, NULL, '[\"65\",\"66\",\"67\",\"68\"]', 1, '2025-05-16 16:31:11', '2025-05-16 16:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `on_boarding_slider`
--

CREATE TABLE `on_boarding_slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `screen_1_image` varchar(255) NOT NULL,
  `screen_1_heading` varchar(255) NOT NULL,
  `screen_1_short_intro` text NOT NULL,
  `screen_1_button_text` varchar(255) NOT NULL,
  `screen_2_image` varchar(255) NOT NULL,
  `screen_2_heading` varchar(255) NOT NULL,
  `screen_2_short_intro` text NOT NULL,
  `screen_2_button_text` varchar(255) NOT NULL,
  `screen_3_image` varchar(255) NOT NULL,
  `screen_3_heading` varchar(255) NOT NULL,
  `screen_3_short_intro` text NOT NULL,
  `screen_3_button_text` varchar(255) NOT NULL,
  `screen_4_image` varchar(255) NOT NULL,
  `screen_4_heading` varchar(255) NOT NULL,
  `screen_4_short_intro` text NOT NULL,
  `screen_4_button_text` varchar(255) NOT NULL,
  `screen_5_image` varchar(255) NOT NULL,
  `screen_5_heading` varchar(255) NOT NULL,
  `screen_5_short_intro` text NOT NULL,
  `screen_5_button_text` varchar(255) NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `expires_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `userid`, `phone_number`, `otp`, `status`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, NULL, '9310009651', '5036', 0, '2025-05-28 14:52:59', '2025-05-20 11:40:37', '2025-05-28 14:52:59'),
(2, NULL, '7007680502', '9314', 0, '2025-05-28 14:25:45', '2025-05-20 11:41:07', '2025-05-28 14:25:45'),
(3, NULL, '7007680502', '6566', 0, '2025-05-20 12:45:37', '2025-05-20 12:45:37', '2025-05-20 12:45:37'),
(4, NULL, '9310009651', '5154', 0, '2025-05-20 12:53:47', '2025-05-20 12:53:47', '2025-05-20 12:53:47'),
(5, NULL, '9810538155', '8324', 0, '2025-05-20 12:55:24', '2025-05-20 12:55:24', '2025-05-20 12:55:24'),
(6, NULL, '9310009651', '5598', 0, '2025-05-20 12:57:33', '2025-05-20 12:57:33', '2025-05-20 12:57:33'),
(7, NULL, '9310009651', '8264', 0, '2025-05-20 13:33:34', '2025-05-20 13:33:34', '2025-05-20 13:33:34'),
(8, NULL, '9310009651', '8707', 0, '2025-05-20 16:23:51', '2025-05-20 16:23:51', '2025-05-20 16:23:51'),
(9, NULL, '9310009651', '3778', 0, '2025-05-20 17:17:42', '2025-05-20 17:17:42', '2025-05-20 17:17:42'),
(10, NULL, '7581955887', '7176', 0, '2025-05-24 04:53:22', '2025-05-24 04:53:22', '2025-05-24 04:53:22'),
(11, NULL, '8307733088', '1738', 0, '2025-05-28 06:55:20', '2025-05-28 06:55:20', '2025-05-28 06:55:20'),
(12, NULL, '9971745507', '2931', 0, '2025-05-28 15:07:11', '2025-05-28 15:07:11', '2025-05-28 15:07:11'),
(13, NULL, '9369186149', '4382', 0, '2025-05-28 16:39:48', '2025-05-28 16:39:48', '2025-05-28 16:39:48'),
(14, NULL, '9406875324', '4777', 1, '2025-07-16 18:04:25', '2025-06-13 06:12:49', '2025-07-16 12:34:25'),
(15, NULL, '1234567890', '6127', 0, '2025-06-14 13:01:46', '2025-06-14 00:28:41', '2025-06-14 07:31:46'),
(16, NULL, '919406875324', '1878', 0, '2025-06-17 11:11:41', '2025-06-17 05:36:28', '2025-06-17 05:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `our_programs`
--

CREATE TABLE `our_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `time_from` varchar(250) DEFAULT NULL,
  `time_to` varchar(250) DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `student` int(11) DEFAULT NULL,
  `age_group` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `high_lights` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_programs`
--

INSERT INTO `our_programs` (`id`, `heading`, `short_description`, `long_description`, `image`, `time_from`, `time_to`, `fees`, `week`, `student`, `age_group`, `status`, `high_lights`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'Little explores', 'perfect introduction to learning through sensory play and createive activities', 'A comprehensive early learning program designed specifically for toddlers aged 2-3 years. This program focuses on building foundamental skill', 'assets/images/our_programs/6870cdd991930.webp', '09:00:00', '12:00:00', 300.00, 'week 1-2', 1, '2-3 yr', 1, NULL, NULL, '2025-07-11 01:49:27', '2025-07-11 03:09:53'),
(5, 'dfdfdf', 'dfdfdf', 'dfdfdf', 'assets/images/our_programs/688481a8e5d99.webp', '00:49 AM', '14:49 PM', 44.00, '6', 66, '2 - 3', 1, '[\"dfdf,iiii\"]', '[\"hhhh,uuuu\"]', '2025-07-26 01:50:08', '2025-07-26 01:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `per_month_fee` decimal(10,2) DEFAULT NULL,
  `annual_fee` decimal(10,2) DEFAULT NULL,
  `discount_fee` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_services`
--

CREATE TABLE `package_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_services`
--

INSERT INTO `package_services` (`id`, `name`, `image`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'packages', 'assets/images/package_services/684017fda65c3.webp', 100.00, 'active', '2025-06-04 04:25:09', '2025-06-04 04:34:46'),
(3, 'services', 'assets/images/package_services/68402ef8b08d7.webp', 200.00, 'active', '2025-06-04 06:03:12', '2025-06-04 06:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `pages_preschool`
--

CREATE TABLE `pages_preschool` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(255) DEFAULT NULL,
  `admission_number` varchar(255) DEFAULT NULL,
  `admission_date` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `phone_number_1` varchar(255) NOT NULL,
  `phone_number_2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_schools`
--

CREATE TABLE `partner_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_logo` varchar(255) DEFAULT NULL,
  `school_email` varchar(255) NOT NULL,
  `school_phone_1` varchar(255) NOT NULL,
  `school_phone_2` varchar(255) DEFAULT NULL,
  `principal_name` varchar(255) NOT NULL,
  `vice_principal_name` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `age` varchar(255) DEFAULT NULL,
  `fees` varchar(250) DEFAULT NULL,
  `about_us` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner_schools`
--

INSERT INTO `partner_schools` (`id`, `school_name`, `school_logo`, `school_email`, `school_phone_1`, `school_phone_2`, `principal_name`, `vice_principal_name`, `address`, `city`, `state`, `zip`, `document`, `image`, `status`, `age`, `fees`, `about_us`, `created_at`, `updated_at`) VALUES
(2, 'Dreamland Kids School', 'assets/images/user/partner_school/1753522916_WhatsApp Image 2025-07-25 at 12.22.33 PM.jpeg', 'adminrrrrrr@example.com', '9874562158', '6548769087', 'Rn verma', 'Mr Rohan singh', 'ghghg', 'ghghg', 'ghgh', '65656', NULL, NULL, 'active', '[\"1\"]', '[{\"annual_fees\":\"0.00\",\"per_month_fees\":\"500.00\"}]', NULL, '2025-07-26 04:11:56', '2025-07-30 03:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `partner_school_fees`
--

CREATE TABLE `partner_school_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `per_month_fees` decimal(10,2) NOT NULL DEFAULT 0.00,
  `annual_fees` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partner_school_fees`
--

INSERT INTO `partner_school_fees` (`id`, `partner_school_id`, `age`, `per_month_fees`, `annual_fees`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, '1', 500.00, 0.00, 'active', '2025-07-26 03:04:52', '2025-07-26 03:04:52'),
(5, 2, '1', 500.00, 0.00, 'active', '2025-07-30 03:57:35', '2025-07-30 03:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('testrrrr@mailinator.com', '$2y$12$WM7imPfKZl/hT6rObImg6O.gGNvpcZ5ruwWadyQyaO3HIqENjIa5e', '2025-07-02 09:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `transaction_id` varchar(250) DEFAULT NULL,
  `reference_id` varchar(250) DEFAULT NULL,
  `online_tranc_id` varchar(250) DEFAULT NULL,
  `payment_session_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'INR',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `month` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `payment_mode` varchar(250) DEFAULT NULL,
  `response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`response`)),
  `note` text DEFAULT NULL,
  `stu_academy` int(11) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `transaction_id`, `reference_id`, `online_tranc_id`, `payment_session_id`, `customer_id`, `email`, `phone`, `amount`, `due_amount`, `currency`, `status`, `month`, `date`, `payment_mode`, `response`, `note`, `stu_academy`, `source`, `created_at`, `updated_at`) VALUES
(1, 'order_309697', NULL, NULL, NULL, NULL, '4', 'nn@mailinator.com', '07894561235', 2000.00, 1000.00, 'INR', 'partial', 'January', '2025-01-01', 'cash', NULL, NULL, NULL, NULL, '2025-06-03 08:41:50', '2025-06-03 08:41:50'),
(2, 'order_502942', NULL, NULL, NULL, NULL, '4', 'nn@mailinator.com', '07894561235', 3000.00, 1000.00, 'INR', 'partial', 'February', '2025-02-01', 'cash', NULL, NULL, NULL, NULL, '2025-06-03 08:42:15', '2025-06-03 08:42:15'),
(3, 'order_320298', NULL, NULL, '2193626656', 'session_wg8G_YI8rmE2f-x4zDTfsAmuVkqrCd6X4M5OTshxeAfvlRabXxDYf4tMaLcZ-mHSixiAH9XQ5LyzeUNyBU2F0ixAEhfE4GIqvTZ5SC-wCBVwOOMmAaBYO39pbUDewQpaymentpayment', '4', 'nn@mailinator.com', '07894561235', 3000.00, 1000.00, 'INR', 'PAID', 'March', '2025-03-01', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2193626656\",\"created_at\":\"2025-06-03T19:42:52+05:30\",\"customer_details\":{\"customer_id\":\"4\",\"customer_name\":\"fdfdsf\",\"customer_email\":\"nn@mailinator.com\",\"customer_phone\":\"07894561235\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":3000,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-03T19:42:52+05:30\",\"order_id\":\"order_320298\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/admin-callback?order_id=order_320298\",\"notify_url\":\"http:\\/\\/127.0.0.1:8000\\/payment\\/success\",\"payment_methods\":\"cc,dc,upi\"},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_wg8G_YI8rmE2f-x4zDTfsAmuVkqrCd6X4M5OTshxeAfvlRabXxDYf4tMaLcZ-mHSixiAH9XQ5LyzeUNyBU2F0ixAEhfE4GIqvTZ5SC-wCBVwOOMmAaBYO39pbUDewQpaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-06-03 08:43:09', '2025-06-03 08:43:09'),
(4, 'order_803813', NULL, NULL, NULL, NULL, '4', 'nn@mailinator.com', '07894561235', 4000.00, 6000.00, 'INR', 'pending', NULL, NULL, 'cash', NULL, NULL, NULL, NULL, '2025-06-03 08:44:23', '2025-06-03 08:44:23'),
(5, 'order_822645', NULL, NULL, NULL, NULL, '4', 'nn@mailinator.com', '07894561235', 4000.00, 1991000.00, 'INR', 'pending', 'April', NULL, 'cash', NULL, NULL, NULL, NULL, '2025-06-03 08:44:43', '2025-06-03 08:44:43'),
(6, 'order_650861', NULL, NULL, NULL, NULL, '4', 'nn@mailinator.com', '07894561235', 4000.00, 1990000.00, 'INR', 'pending', 'April', '2025-04-03', 'cash', NULL, NULL, NULL, NULL, '2025-06-03 08:45:11', '2025-06-03 08:45:11'),
(7, 'order_489625', NULL, NULL, '2193652317', 'session_vN2UzyOBWx_WiMm2ul71P4OPvWDgYZjCTos10f1_immlEOgLGyn8-YcTNjHSDjTLsVoTDg1zzsvXj9VPKTPB58TNUKs5v7Y7pK_1YqxHRUSFZzBeb1K61OhkCHXTGQpaymentpayment', '11', 'test255@mailinator.com', '6694561235', 2000.00, 0.00, 'INR', 'PAID', 'June', '2025-06-01', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2193652317\",\"created_at\":\"2025-06-04T12:31:37+05:30\",\"customer_details\":{\"customer_id\":\"11\",\"customer_name\":\"fdfdf\",\"customer_email\":\"test255@mailinator.com\",\"customer_phone\":\"6694561235\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":2000,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-04T12:31:37+05:30\",\"order_id\":\"order_489625\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/admin-callback?order_id=order_489625\",\"notify_url\":\"http:\\/\\/127.0.0.1:8000\\/payment\\/success\",\"payment_methods\":\"cc,dc,upi\"},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_vN2UzyOBWx_WiMm2ul71P4OPvWDgYZjCTos10f1_immlEOgLGyn8-YcTNjHSDjTLsVoTDg1zzsvXj9VPKTPB58TNUKs5v7Y7pK_1YqxHRUSFZzBeb1K61OhkCHXTGQpaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-06-04 01:32:12', '2025-06-04 01:32:12'),
(8, 'order_997310', NULL, NULL, NULL, NULL, '11', 'test255@mailinator.com', '6694561235', 1000.00, 1000.00, 'INR', 'partial', 'July', '2025-07-04', 'cash', NULL, NULL, NULL, NULL, '2025-06-04 03:30:32', '2025-06-04 03:30:32'),
(9, 'order_909098', NULL, NULL, '2194066116', 'session_Hbx6KIywiDdZgdwf0GINjkegrAV3TkgOseOt6PpX4-pC2SVtPJ9gkihT4iJk-njaisJLlrWO5LoXFz3ZKZTmHdP5-N5lpjlpVmmdvxjoMIIrBiXK9vx36jyVYtQb8Qpaymentpayment', '11', 'test255@mailinator.com', '6694561235', 3000.00, 0.00, 'INR', 'PAID', 'February', '2025-06-09', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2194066116\",\"created_at\":\"2025-06-16T11:32:09+05:30\",\"customer_details\":{\"customer_id\":\"11\",\"customer_name\":\"fdfdf\",\"customer_email\":\"test255@mailinator.com\",\"customer_phone\":\"6694561235\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":3000,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-16T11:32:09+05:30\",\"order_id\":\"order_909098\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/admin-callback?order_id=order_909098\",\"notify_url\":\"http:\\/\\/127.0.0.1:8000\\/payment\\/success\",\"payment_methods\":\"cc,dc,upi\"},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_Hbx6KIywiDdZgdwf0GINjkegrAV3TkgOseOt6PpX4-pC2SVtPJ9gkihT4iJk-njaisJLlrWO5LoXFz3ZKZTmHdP5-N5lpjlpVmmdvxjoMIIrBiXK9vx36jyVYtQb8Qpaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-06-16 00:33:10', '2025-06-16 00:33:10'),
(10, 'KORDER_344625', NULL, NULL, '2194262787', 'session_NLRk3aab6hatfpBy4WxDjfkMrjny_v6dh90GFKeiKkxvQGbGpuk3Y79fKC8Q6R8FEQdaR0HE5ngtWvwn47i7rqTyeDKRWnaGycDTiLYoEJoJgjuZi7ra9j_-zgiMjwpaymentpayment', '555', 'admixn@example.com', '1234567896', 484.00, NULL, 'INR', 'PAID', NULL, '23-06-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2194262787\",\"created_at\":\"2025-06-23T14:18:00+05:30\",\"customer_details\":{\"customer_id\":\"555\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"1234567896\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":484,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-23T14:18:00+05:30\",\"order_id\":\"KORDER_344625\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/kit-payment-response?order_id=KORDER_344625\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_NLRk3aab6hatfpBy4WxDjfkMrjny_v6dh90GFKeiKkxvQGbGpuk3Y79fKC8Q6R8FEQdaR0HE5ngtWvwn47i7rqTyeDKRWnaGycDTiLYoEJoJgjuZi7ra9j_-zgiMjwpaymentpayment\",\"terminal_data\":null}', NULL, NULL, 'apk', '2025-06-23 03:21:00', '2025-06-23 03:21:00'),
(11, 'KORDER_344625', NULL, NULL, '2194262787', 'session_EPD8k9hQztN4vseYkeIN-OhYyX8s2mvdgz2TP8V9Py5PPs3GfsTRVgfLZ2jhPnori672USataHNCTWUW2ur-qOiX4yEtqmvwOsZ2DFWpt69juIyrmDU2smyogbpyowpaymentpayment', '555', 'admixn@example.com', '1234567896', 484.00, NULL, 'INR', 'PAID', NULL, '23-06-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2194262787\",\"created_at\":\"2025-06-23T14:18:00+05:30\",\"customer_details\":{\"customer_id\":\"555\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"1234567896\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":484,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-23T14:18:00+05:30\",\"order_id\":\"KORDER_344625\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/kit-payment-response?order_id=KORDER_344625\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_EPD8k9hQztN4vseYkeIN-OhYyX8s2mvdgz2TP8V9Py5PPs3GfsTRVgfLZ2jhPnori672USataHNCTWUW2ur-qOiX4yEtqmvwOsZ2DFWpt69juIyrmDU2smyogbpyowpaymentpayment\",\"terminal_data\":null}', NULL, NULL, 'apk', '2025-06-23 03:22:03', '2025-06-23 03:22:03'),
(12, 'KORDER_344625', NULL, NULL, '2194262787', 'session_7n18KNerynyFe-ER35nDzXQFVXFQa6E0yYvvEsQNjaIEK_GUk1Yg2SS2hAjNjG5hH4suRvw5n0Z0S0clLY_LjsaPastptXmSyoy4kXHFeGdgPFKtOjjT6Y_rIDtuJgpaymentpayment', '555', 'admixn@example.com', '1234567896', 484.00, NULL, 'INR', 'PAID', NULL, '23-06-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2194262787\",\"created_at\":\"2025-06-23T14:18:00+05:30\",\"customer_details\":{\"customer_id\":\"555\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"1234567896\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":484,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-23T14:18:00+05:30\",\"order_id\":\"KORDER_344625\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/kit-payment-response?order_id=KORDER_344625\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_7n18KNerynyFe-ER35nDzXQFVXFQa6E0yYvvEsQNjaIEK_GUk1Yg2SS2hAjNjG5hH4suRvw5n0Z0S0clLY_LjsaPastptXmSyoy4kXHFeGdgPFKtOjjT6Y_rIDtuJgpaymentpayment\",\"terminal_data\":null}', NULL, NULL, 'apk', '2025-06-23 03:22:39', '2025-06-23 03:22:39'),
(13, 'EORDER_480784', NULL, NULL, '2194264960', 'session_zHmoEhOhdcUvBywPmZy1VnOqHkL_H0tXEBK4HOu8OwjH_7WCGaHt0rm4RNMxdfUWvZUV7vQDfGgnjpbhq5uuhh1TE4ij6avcXJlbpUgQbMxhE2a4FZmwxfv9P1nNlgpaymentpayment', '3', 'admixn@example.com', '4454545890', 84.00, NULL, 'INR', 'PAID', NULL, '23-06-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2194264960\",\"created_at\":\"2025-06-23T15:08:31+05:30\",\"customer_details\":{\"customer_id\":\"3\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"4454545890\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":84,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-23T15:08:31+05:30\",\"order_id\":\"EORDER_480784\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/event-payment-response?order_id=EORDER_480784\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_zHmoEhOhdcUvBywPmZy1VnOqHkL_H0tXEBK4HOu8OwjH_7WCGaHt0rm4RNMxdfUWvZUV7vQDfGgnjpbhq5uuhh1TE4ij6avcXJlbpUgQbMxhE2a4FZmwxfv9P1nNlgpaymentpayment\",\"terminal_data\":null}', NULL, NULL, 'apk', '2025-06-23 04:08:51', '2025-06-23 04:08:51'),
(14, 'EORDER_480784', NULL, NULL, '2194264960', 'session_Rp-r0iO53v-2ri9lOFN27mVFV0_NBlO9VymB0mgeN9XQbuvYdrKIAtHvEr6YTJiPtOaVS4ygcMo69hk2nFPQpnh0PsUy7nRaUyb6HS-LDvdYBugJDNpuLWIdTv_fcgpaymentpayment', '3', 'admixn@example.com', '4454545890', 84.00, NULL, 'INR', 'PAID', NULL, '23-06-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2194264960\",\"created_at\":\"2025-06-23T15:08:31+05:30\",\"customer_details\":{\"customer_id\":\"3\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"4454545890\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":84,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-23T15:08:31+05:30\",\"order_id\":\"EORDER_480784\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/event-payment-response?order_id=EORDER_480784\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_Rp-r0iO53v-2ri9lOFN27mVFV0_NBlO9VymB0mgeN9XQbuvYdrKIAtHvEr6YTJiPtOaVS4ygcMo69hk2nFPQpnh0PsUy7nRaUyb6HS-LDvdYBugJDNpuLWIdTv_fcgpaymentpayment\",\"terminal_data\":null}', NULL, NULL, 'apk', '2025-06-23 04:09:33', '2025-06-23 04:09:33'),
(15, 'SFORDER_946541', NULL, NULL, '2194267608', 'session_fhD-txJTd74S6EMHGeC9pLLYojfggf5DyEz8XqF2dTgdKf08RtgMzRcInj0aWNmxE0hFLz2qqyJBJbtHb8K2C8r2lS1gIj7mQ5X5WP1YjOGTuHBUF1ql8vGCU_nzRgpaymentpayment', '3', 'admixndddd@example.com', '4454545789', 444.00, 1994556.00, 'INR', 'PAID', NULL, '23-06-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2194267608\",\"created_at\":\"2025-06-23T16:27:14+05:30\",\"customer_details\":{\"customer_id\":\"3\",\"customer_name\":\"rtrt rtrt\",\"customer_email\":\"admixndddd@example.com\",\"customer_phone\":\"4454545789\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":444,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-23T16:27:14+05:30\",\"order_id\":\"SFORDER_946541\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/fees-payment-response?order_id=SFORDER_946541\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_fhD-txJTd74S6EMHGeC9pLLYojfggf5DyEz8XqF2dTgdKf08RtgMzRcInj0aWNmxE0hFLz2qqyJBJbtHb8K2C8r2lS1gIj7mQ5X5WP1YjOGTuHBUF1ql8vGCU_nzRgpaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-06-23 05:27:40', '2025-06-23 05:27:40'),
(16, 'SFORDER_946541', NULL, NULL, '2194267608', 'session_qSgIXC5QQH9j1mBcCx0BUfGthWHupw0vDiH2uRsZUBVyXQ5qomw7zLgPkwJtTywP31wqg1wI_Fag6hGBrxoJFnmx56ro1A5ZOL0dD3P_0txf_wvXs4Q4HodXqlCLowpaymentpayment', '3', 'admixndddd@example.com', '4454545789', 444.00, 1994556.00, 'INR', 'PAID', NULL, '23-06-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2194267608\",\"created_at\":\"2025-06-23T16:27:14+05:30\",\"customer_details\":{\"customer_id\":\"3\",\"customer_name\":\"rtrt rtrt\",\"customer_email\":\"admixndddd@example.com\",\"customer_phone\":\"4454545789\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":444,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-07-23T16:27:14+05:30\",\"order_id\":\"SFORDER_946541\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/fees-payment-response?order_id=SFORDER_946541\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_qSgIXC5QQH9j1mBcCx0BUfGthWHupw0vDiH2uRsZUBVyXQ5qomw7zLgPkwJtTywP31wqg1wI_Fag6hGBrxoJFnmx56ro1A5ZOL0dD3P_0txf_wvXs4Q4HodXqlCLowpaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-06-23 05:29:13', '2025-06-23 05:29:13'),
(17, 'KORDER_169353', NULL, NULL, '2195002919', 'session_BOhOZcC87X9KWPRzM7rc0wbBMCy2fDg_tq9xVEzaPCSuCFph2n6jAv16cAzShNqg_wrAo-2f-6DXWqqXA9RI7n0-DZj2PWiy5YNFjnSs3NMuPKjmIhNrH4bbaSInxgpaymentpayment', '1', 'admixntest@example.com', '01233214565', 484.00, NULL, 'INR', 'PAID', NULL, '17-07-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2195002919\",\"created_at\":\"2025-07-17T12:44:40+05:30\",\"customer_details\":{\"customer_id\":\"1\",\"customer_name\":null,\"customer_email\":\"admixntest@example.com\",\"customer_phone\":\"01233214565\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":484,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-08-16T12:44:40+05:30\",\"order_id\":\"KORDER_169353\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/pre-kit-payment-response?order_id=KORDER_169353\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_BOhOZcC87X9KWPRzM7rc0wbBMCy2fDg_tq9xVEzaPCSuCFph2n6jAv16cAzShNqg_wrAo-2f-6DXWqqXA9RI7n0-DZj2PWiy5YNFjnSs3NMuPKjmIhNrH4bbaSInxgpaymentpayment\",\"terminal_data\":null}', NULL, NULL, 'apk', '2025-07-17 01:45:09', '2025-07-17 01:45:09'),
(18, 'SFORDER_274016', NULL, NULL, '2195273696', 'session_W6kgp76RdyZ3g0_cyOikZI5VNa_WNz6YO1BEMEn8xVL6U1PGqgD14sAG5npdYQnWLheySKXX-LMhM2Rv9IpUXauZWW_c1Z6WS2auif0SVbwVeZxR8J0vAEK30_HjuQpaymentpayment', '67', 'admixn@example.com', '01233214565', 500.00, 0.00, 'INR', 'PAID', NULL, '25-07-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2195273696\",\"created_at\":\"2025-07-25T15:02:04+05:30\",\"customer_details\":{\"customer_id\":\"67\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"01233214565\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":500,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-08-24T15:02:04+05:30\",\"order_id\":\"SFORDER_274016\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/fees-payment-response?order_id=SFORDER_274016\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_W6kgp76RdyZ3g0_cyOikZI5VNa_WNz6YO1BEMEn8xVL6U1PGqgD14sAG5npdYQnWLheySKXX-LMhM2Rv9IpUXauZWW_c1Z6WS2auif0SVbwVeZxR8J0vAEK30_HjuQpaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-07-25 04:02:38', '2025-07-25 04:02:38'),
(19, 'SFORDER_274016', NULL, NULL, '2195273696', 'session_0EqKRE8Lc2fUYve_NeJs1MP-FCcWNjws1KRtLbq-x7Qheky694YSnvsoJfyQRL2LX-ZZJrfZzh_4qli-_7BYIT0x1K423TpDQAnzzOQb6Cyr5NC2_Ul5QaDo62V-dApaymentpayment', '67', 'admixn@example.com', '01233214565', 500.00, 0.00, 'INR', 'PAID', NULL, '25-07-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2195273696\",\"created_at\":\"2025-07-25T15:02:04+05:30\",\"customer_details\":{\"customer_id\":\"67\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"01233214565\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":500,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-08-24T15:02:04+05:30\",\"order_id\":\"SFORDER_274016\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/fees-payment-response?order_id=SFORDER_274016\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_0EqKRE8Lc2fUYve_NeJs1MP-FCcWNjws1KRtLbq-x7Qheky694YSnvsoJfyQRL2LX-ZZJrfZzh_4qli-_7BYIT0x1K423TpDQAnzzOQb6Cyr5NC2_Ul5QaDo62V-dApaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-07-25 04:02:57', '2025-07-25 04:02:57'),
(20, 'SFORDER_274016', NULL, NULL, '2195273696', 'session_IRffrxMuIf4he7OfbAB5vR66el2ae05LZaJRICzjCIBzb6NRuXj9PGQFRl7aIrBnxZsCxF_Akz_K6a14JR-1M3IodsS3VOrVkwkT8U0MGl5gTHZcuanDjr-fsuxrBgpaymentpayment', '67', 'admixn@example.com', '01233214565', 500.00, 0.00, 'INR', 'PAID', NULL, '25-07-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2195273696\",\"created_at\":\"2025-07-25T15:02:04+05:30\",\"customer_details\":{\"customer_id\":\"67\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"01233214565\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":500,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-08-24T15:02:04+05:30\",\"order_id\":\"SFORDER_274016\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/fees-payment-response?order_id=SFORDER_274016\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_IRffrxMuIf4he7OfbAB5vR66el2ae05LZaJRICzjCIBzb6NRuXj9PGQFRl7aIrBnxZsCxF_Akz_K6a14JR-1M3IodsS3VOrVkwkT8U0MGl5gTHZcuanDjr-fsuxrBgpaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-07-25 04:03:27', '2025-07-25 04:03:27'),
(21, 'SFORDER_537202', NULL, NULL, '2195274401', 'session_TqVmgrNRlAcNC3b-Jce6YurrxGLli1XfrGNVW6oEG2k1V-WcItbiya8t9w_SXOsb5oaDQH4JskSD-MtQv5rR6pZW-FmhEwUOMNCv1uDue0TFr4C7bFjTKI68hN70uApaymentpayment', '67', 'admixn@example.com', '01233214565', 5000.00, 0.00, 'INR', 'PAID', NULL, '25-07-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2195274401\",\"created_at\":\"2025-07-25T15:30:54+05:30\",\"customer_details\":{\"customer_id\":\"67\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"01233214565\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":5000,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-08-24T15:30:54+05:30\",\"order_id\":\"SFORDER_537202\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/fees-payment-response?order_id=SFORDER_537202\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_TqVmgrNRlAcNC3b-Jce6YurrxGLli1XfrGNVW6oEG2k1V-WcItbiya8t9w_SXOsb5oaDQH4JskSD-MtQv5rR6pZW-FmhEwUOMNCv1uDue0TFr4C7bFjTKI68hN70uApaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-07-25 04:31:07', '2025-07-25 04:31:07'),
(22, 'SFORDER_537202', NULL, NULL, '2195274401', 'session_lW6ckDsKZ4k9wcBOUl520DTI9VCh6M-3IFTg7ObbI3RgMKbkZm5r0eGE5iLbB39bj_benmV21TftB8M_qPnlh8obQ_Gg98pLRWYoO3YPLng_NIHdYuI-5QzYxAh_ggpaymentpayment', '67', 'admixn@example.com', '01233214565', 5000.00, 0.00, 'INR', 'PAID', NULL, '25-07-2025', 'online', '{\"cart_details\":null,\"cf_order_id\":\"2195274401\",\"created_at\":\"2025-07-25T15:30:54+05:30\",\"customer_details\":{\"customer_id\":\"67\",\"customer_name\":null,\"customer_email\":\"admixn@example.com\",\"customer_phone\":\"01233214565\",\"customer_uid\":null},\"entity\":\"order\",\"order_amount\":5000,\"order_currency\":\"INR\",\"order_expiry_time\":\"2025-08-24T15:30:54+05:30\",\"order_id\":\"SFORDER_537202\",\"order_meta\":{\"return_url\":\"http:\\/\\/127.0.0.1:8000\\/api\\/fees-payment-response?order_id=SFORDER_537202\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_lW6ckDsKZ4k9wcBOUl520DTI9VCh6M-3IFTg7ObbI3RgMKbkZm5r0eGE5iLbB39bj_benmV21TftB8M_qPnlh8obQ_Gg98pLRWYoO3YPLng_NIHdYuI-5QzYxAh_ggpaymentpayment\",\"terminal_data\":null}', NULL, NULL, NULL, '2025-07-25 08:34:16', '2025-07-25 08:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `guard_name` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '[\"school\\/login-form\",\"school\\/login\",\"school\\/dashboard\"]', 'school', 1, '2025-05-29 06:12:01', '2025-05-29 06:12:01'),
(3, NULL, '[\"admin\\/seo\",\"admin\\/seo\\/create\",\"admin\\/add-seo\",\"admin\\/seo\\/{id}\\/edit\",\"admin\\/seo\\/{id}\",\"admin\\/seo\\/{id}\"]', 'admin', 1, '2025-06-27 04:13:52', '2025-06-27 04:13:52'),
(4, NULL, '[\"admin\\/seo\",\"admin\\/seo\\/create\",\"admin\\/add-seo\",\"admin\\/seo\\/{id}\\/edit\",\"admin\\/seo\\/{id}\",\"admin\\/seo\\/{id}\"]', 'marketing', 1, '2025-06-27 05:19:22', '2025-06-27 05:19:22'),
(5, 5, '[\"admin\\/seo\",\"admin\\/seo\\/create\",\"admin\\/add-seo\",\"admin\\/seo\\/{id}\\/edit\",\"admin\\/seo\\/{id}\",\"admin\\/seo\\/{id}\"]', 'marketing', 1, '2025-06-27 05:24:30', '2025-06-27 05:24:30'),
(8, 11, '[\"marketing\\/login-form\",\"marketing\\/login\",\"marketing\\/logout\",\"marketing\\/dashboard\",\"marketing\\/profile\",\"marketing\\/edit\\/{id}\",\"marketing\\/seo\",\"marketing\\/seo\\/create\",\"marketing\\/add-seo\",\"marketing\\/seo\\/{id}\\/edit\",\"marketing\\/seo\\/{id}\",\"marketing\\/seo\\/{id}\"]', 'marketing', 1, '2025-07-01 07:46:24', '2025-07-01 07:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 9, 'parent-token', '85f2a34ae78fd6f28751d3a2d2b55023ca0fdb0cdd47e798a67f6d7a1da32bee', '[\"*\"]', NULL, NULL, '2025-06-26 05:36:16', '2025-06-26 05:36:16'),
(4, 'App\\Models\\User', 9, 'parent-token', 'a4fe00153dbb6aff3c084c93c89c4c815f13f8842de2fc82254ea6d9a672dae1', '[\"*\"]', NULL, NULL, '2025-06-26 05:42:57', '2025-06-26 05:42:57'),
(5, 'App\\Models\\User', 33, 'teacher-token', 'ea727473981163373e73b655e0215ed9125a521ada0e8931b4e10f651118d5d0', '[\"*\"]', NULL, NULL, '2025-06-26 06:07:43', '2025-06-26 06:07:43'),
(6, 'App\\Models\\User', 33, 'teacher-token', 'cdd04d9a84915e725f145d15df23576dd46fe182ef7ecbf95cb9551f2651b66c', '[\"*\"]', NULL, NULL, '2025-06-26 06:09:08', '2025-06-26 06:09:08'),
(7, 'App\\Models\\User', 3, 'parent-token', '9f7f2b070516d370efcc0e163b5a7694979bbcf1e16851b473e8fb1901a6c2b1', '[\"*\"]', NULL, NULL, '2025-06-28 02:24:23', '2025-06-28 02:24:23'),
(8, 'App\\Models\\User', 12, 'parent-token', '589de83e1ec679759eff4bc01277b80c9b494579e3e5649faae05f107c6e7583', '[\"*\"]', NULL, NULL, '2025-06-28 02:25:04', '2025-06-28 02:25:04'),
(9, 'App\\Models\\User', 32, 'teacher-token', 'a87c5052158e0b98085dca0d8d7f5b9f4b1e19cab964869b9379eed4e992064f', '[\"*\"]', NULL, NULL, '2025-06-28 07:14:04', '2025-06-28 07:14:04'),
(10, 'App\\Models\\User', 32, 'teacher-token', 'cbe8f9b5ed2efdd9d4f447c82ca9ef66e9e520fa9a5f74a615936e3fb7f08f72', '[\"*\"]', NULL, NULL, '2025-06-28 07:15:37', '2025-06-28 07:15:37'),
(11, 'App\\Models\\User', 12, 'parent-token', '9db679d002ddc3f3955f9090a346cd73486c055b5d6f5eae646fd19b3dfb7dd2', '[\"*\"]', NULL, NULL, '2025-07-18 01:18:05', '2025-07-18 01:18:05'),
(12, 'App\\Models\\User', 66, 'parent-token', 'e4caf8b676873404e68c4d8a86e1b80195c829e25c654f0603dad2cae25f6cf4', '[\"*\"]', NULL, NULL, '2025-07-18 01:19:11', '2025-07-18 01:19:11'),
(13, 'App\\Models\\User', 66, 'parent-token', '40a4078fe352135b88fbeb0067382938d7927419b10b512e1ed899fa36ec0db2', '[\"*\"]', NULL, NULL, '2025-07-18 02:08:24', '2025-07-18 02:08:24'),
(14, 'App\\Models\\User', 66, 'parent-token', 'd9fe5f8c4c235ee3703a8dbb5b91cb5987a4c5a615927e9b0f40b29fa841604e', '[\"*\"]', NULL, NULL, '2025-07-18 02:09:15', '2025-07-18 02:09:15'),
(15, 'App\\Models\\User', 66, 'parent-token', '07773f4c59103cca02bfae19eca07ec63c46b351e457915368f7c1f7d74b2144', '[\"*\"]', NULL, NULL, '2025-07-18 02:09:57', '2025-07-18 02:09:57'),
(16, 'App\\Models\\User', 66, 'parent-token', 'facbbce4bbbe7dbaece719f1e0d149ea0c5fb6d78dde3406f47cae8bafabcf86', '[\"*\"]', NULL, NULL, '2025-07-18 02:13:00', '2025-07-18 02:13:00'),
(17, 'App\\Models\\User', 66, 'parent-token', '70bd810645e1b8b60e6be7b98091cf48c82a790d4d8505d7205baf94b2045183', '[\"*\"]', NULL, NULL, '2025-07-18 02:14:21', '2025-07-18 02:14:21'),
(18, 'App\\Models\\User', 66, 'parent-token', 'c80daac026c67bec4abd50395f8049f7f2ecbb3ac5190704484f758b07213d1e', '[\"*\"]', NULL, NULL, '2025-07-18 02:15:47', '2025-07-18 02:15:47'),
(19, 'App\\Models\\User', 66, 'parent-token', 'b52ec84c8e02aaed389e21716ae9ef73ae88b43816a9c60bff75b1cd8a140caa', '[\"*\"]', NULL, NULL, '2025-07-18 02:18:42', '2025-07-18 02:18:42'),
(20, 'App\\Models\\User', 66, 'parent-token', 'a2842d0ddd4d5570159aa414f951b461121a474d9265145960d04188b0c650dd', '[\"*\"]', NULL, NULL, '2025-07-18 02:19:42', '2025-07-18 02:19:42'),
(21, 'App\\Models\\User', 32, 'teacher-token', '42b380c4328bc2d2495ce3615c6dd2ae3fd47131dceec8c0b39186113b819d06', '[\"*\"]', NULL, NULL, '2025-07-24 08:57:01', '2025-07-24 08:57:01'),
(22, 'App\\Models\\User', 32, 'teacher-token', '137833817db1119526a7da6722b2d065187e29590b0a51f55b42787641f80d15', '[\"*\"]', NULL, NULL, '2025-07-24 09:02:44', '2025-07-24 09:02:44'),
(23, 'App\\Models\\User', 42, 'parent-token', '36eb96c481c678a8e4df03c27e26fc8dcb17d37c0e17bddca342d8bc759a92f2', '[\"*\"]', NULL, NULL, '2025-07-24 10:58:38', '2025-07-24 10:58:38'),
(24, 'App\\Models\\User', 66, 'parent-token', '1ab4916bce16305055f54a26f64c6fe2c7f61382fbae1d71e39ff40c1fbe2ffe', '[\"*\"]', NULL, NULL, '2025-07-24 10:59:08', '2025-07-24 10:59:08'),
(25, 'App\\Models\\User', 66, 'parent-token', '3504dbd7ce806c159afd7d1922bb856d019bac22fe72677b124ec3f4c8eff9c4', '[\"*\"]', NULL, NULL, '2025-07-24 11:01:53', '2025-07-24 11:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `populars`
--

CREATE TABLE `populars` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_heading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `per_month_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `annual_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `annual_discount_fee` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `populars`
--

INSERT INTO `populars` (`id`, `title`, `url`, `image`, `banner_image`, `banner_heading`, `description`, `per_month_fee`, `annual_fee`, `discount_fee`, `annual_discount_fee`, `status`, `created_at`, `updated_at`) VALUES
(1, '2-3 Years', '2-3 Years', 'assets/images/popular/680846160c8ac.webp', NULL, 'Child Learning Milestones', 'Our curriculum is carefully designed to support key developmental milestones at each age. See how we nurture your child\'s growth through targeted learning experiences.', 500.00, 0.00, 0.00, 0.00, 1, '2025-06-06 10:37:06', '2025-06-06 10:37:06'),
(2, '3-4 Years', '3-4-years', 'assets/images/popular/681a63d051fea.webp', NULL, NULL, NULL, 500.00, 0.00, 0.00, 0.00, 1, '2025-06-06 10:37:09', '2025-06-06 10:37:09'),
(3, '4-5 Years', '4-5-years', 'assets/images/popular/681a63e49c572.webp', NULL, NULL, NULL, 500.00, 0.00, 0.00, 0.00, 1, '2025-06-06 10:37:11', '2025-06-06 10:37:11'),
(4, '5-6 Years', '5-6-years', 'assets/images/popular/681a64f7f3fd0.webp', NULL, 'Child Learning Milestones', 'At 9to9 Preschool, every child’s journey is shaped by a custom-tailored curriculum, blending expert lessons with joyful discovery. With flexible hours from 9 AM to 9 PM, learning flows with your schedule. Crafted for young minds, designed for modern families where education is both personal and effortless.', 100.00, 1200.00, 1000.00, 200.00, 1, '2025-06-05 13:23:50', '2025-06-05 07:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `preferred_times`
--

CREATE TABLE `preferred_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `preferred_time` varchar(255) NOT NULL,
  `date_from` varchar(250) DEFAULT NULL,
  `date_to` varchar(250) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferred_times`
--

INSERT INTO `preferred_times` (`id`, `student_id`, `parent_id`, `school_id`, `preferred_time`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`) VALUES
(4, 8, 69, 2, '10:00 AM - 11:30 AM', '2025-06-21', '2025-06-28', 'active', '2025-06-20 04:24:04', '2025-06-20 04:24:04'),
(5, 2, 11, 7, '10:00 AM - 11:30 AM', '18-04-2025', '25-04-2025', 'active', '2025-07-01 04:22:42', '2025-07-01 04:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `pre_banners`
--

CREATE TABLE `pre_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `topbar` varchar(255) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_name1` varchar(255) DEFAULT NULL,
  `button_link1` varchar(255) DEFAULT NULL,
  `button_name2` varchar(255) DEFAULT NULL,
  `button_link2` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_banners`
--

INSERT INTO `pre_banners` (`id`, `page`, `topbar`, `heading`, `sub_heading`, `image`, `description`, `button_name1`, `button_link1`, `button_name2`, `button_link2`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Welcome to MyApp', 'Welcome to the', '9 TO 9 School', 'assets/images/preschool/banner/6835c65dac007.webp', 'Where every child feels at home and inspired. Learning here is fun, flexible, and full of love', 'Enroll Now', 'http://127.0.0.1:8000/talk-expert', 'Schedule a Visit', 'https://calendly.com/9to9schools/30min', 1, '2025-04-29 12:16:57', '2025-05-27 14:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `pre_child_safeties`
--

CREATE TABLE `pre_child_safeties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_child_safeties`
--

INSERT INTO `pre_child_safeties` (`id`, `heading`, `description`, `color`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flexible Timing', 'Open from 9AM to 9PM to suit working parents\' schedules', '#d7f4f9', 'assets/images/preschool/safety/683078f27334b.webp', 1, '2025-04-29 13:24:50', '2025-05-23 13:32:34'),
(2, 'Book Per Day', 'No monthly commitment - pay only for the days you need', '#e6c3f9', 'assets/images/preschool/safety/68307918002fa.webp', 1, '2025-04-30 10:12:37', '2025-05-23 13:33:12'),
(3, 'Choose Teacher', 'Select the perfect teacher for your child\'s unique needs', '#ffe3bd', 'assets/images/preschool/safety/68307930486db.webp', 1, '2025-04-30 14:14:47', '2025-05-23 13:33:36'),
(4, 'Daily Updates', 'Get progress reports and updates on your child\'s day', '#effdc8', 'assets/images/preschool/safety/68307949db19d.webp', 1, '2025-05-08 13:55:47', '2025-05-23 13:34:01'),
(5, 'Complete Care', 'Nutritious meals, comfortable naps, and engaging learning', '#dcf1fd', 'assets/images/preschool/safety/6830796150ba6.webp', 1, '2025-05-08 13:56:22', '2025-05-23 13:34:25'),
(6, 'CCTV Access', 'Watch your child\'s activities anytime for peace of mind', '#fcc6c7', 'assets/images/preschool/safety/6830797daca52.webp', 1, '2025-05-08 13:56:45', '2025-05-23 13:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `pre_explores`
--

CREATE TABLE `pre_explores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_explores`
--

INSERT INTO `pre_explores` (`id`, `heading`, `sub_heading`, `image`, `description`, `button_name`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Explore and grow with', '9 TO 9 School', 'assets/images/preschool/explore/6811f8612dbad.webp', 'Where every child feels at home learning is joyful, flexible, and filled with love, care, and endless opportunities to grow.', 'Enroll Now', 'https://9to9school.com/talk-expert', 1, '2025-04-30 10:16:01', '2025-05-19 06:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `pre_galleries`
--

CREATE TABLE `pre_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_program_tailoreds`
--

CREATE TABLE `pre_program_tailoreds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `key1` varchar(255) DEFAULT NULL,
  `key2` varchar(255) DEFAULT NULL,
  `key3` varchar(255) DEFAULT NULL,
  `key4` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_program_tailoreds`
--

INSERT INTO `pre_program_tailoreds` (`id`, `page`, `image`, `heading`, `description`, `sub_heading`, `key1`, `key2`, `key3`, `key4`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'assets/images/preschool/program/68120b506a376.webp', 'Toddlers (1-2 Years)', 'Focused on sensory exploration, motor skills, and building secure attachments with caregivers.', 'Key Skills Developed:', 'Letter recognition', 'Number concepts', 'Cooperative play', 'Emotional expression', 1, '2025-04-29 13:14:22', '2025-04-30 11:36:48'),
(2, NULL, 'assets/images/preschool/program/68120be411156.webp', 'Early Preschool (2-3 Years)', 'Encouraging independence, language development, and structured play with peers.', 'Key Skills Developed:', 'Letter recognition', 'Number concepts', 'Cooperative play', 'Emotional expression', 1, '2025-04-29 13:21:09', '2025-04-30 11:39:16'),
(3, NULL, 'assets/images/preschool/program/681283821a42f.webp', 'Preschool (3-4 Years)', 'Building pre-academic foundations through guided activities and emotional regulation.', 'Key Skills Developed:', 'Letter recognition', 'Number concepts', 'Cooperative play', 'Emotional expression', 1, '2025-04-30 20:09:38', '2025-04-30 20:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `pre_registeration_callback`
--

CREATE TABLE `pre_registeration_callback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_registeration_callbacks`
--

CREATE TABLE `pre_registeration_callbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_registeration_callbacks`
--

INSERT INTO `pre_registeration_callbacks` (`id`, `name`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'Guest', '7581955887', '2025-05-20 07:21:17', '2025-05-20 07:21:17'),
(2, 'Guest', '9310009651', '2025-05-27 10:18:55', '2025-05-27 10:18:55'),
(3, 'Guest', '7007680502', '2025-05-28 04:23:35', '2025-05-28 04:23:35'),
(4, 'Guest', '8307733088', '2025-05-28 06:55:20', '2025-05-28 06:55:20'),
(5, 'Guest', '9971745507', '2025-05-28 15:07:11', '2025-05-28 15:07:11'),
(6, 'Guest', '9369186149', '2025-05-28 16:39:48', '2025-05-28 16:39:48'),
(7, 'Guest', '9406875324', '2025-06-13 06:12:49', '2025-06-13 06:12:49'),
(8, 'Guest', '1234567890', '2025-06-14 00:28:40', '2025-06-14 00:28:40'),
(9, 'Guest', '919406875324', '2025-06-17 05:36:28', '2025-06-17 05:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `pre_register_price`
--

CREATE TABLE `pre_register_price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pre_register_id` bigint(20) UNSIGNED NOT NULL,
  `user_phone_number` varchar(255) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_response` text NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_registration`
--

CREATE TABLE `pre_registration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_registration_banners`
--

CREATE TABLE `pre_registration_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_registration_banners`
--

INSERT INTO `pre_registration_banners` (`id`, `heading`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'test', 'assets/images/preregistration/banner/686648457507b.jpg', 'active', '2025-07-03 03:37:17', '2025-07-03 03:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `pre_school_registrations`
--

CREATE TABLE `pre_school_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `child_age` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_whychooses`
--

CREATE TABLE `pre_whychooses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `paragraph` varchar(255) DEFAULT NULL,
  `title2` text DEFAULT NULL,
  `paragraph2` varchar(255) DEFAULT NULL,
  `title3` text DEFAULT NULL,
  `paragraph3` varchar(255) DEFAULT NULL,
  `title4` text DEFAULT NULL,
  `paragraph4` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_whychooses`
--

INSERT INTO `pre_whychooses` (`id`, `heading`, `description`, `image`, `title`, `paragraph`, `title2`, `paragraph2`, `title3`, `paragraph3`, `title4`, `paragraph4`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Track Progress with Our App', 'Stay connected with your child\'s learning journey through our intuitive parent app.', 'assets/images/preschool/whychoose/682e3f61ed8ff.webp', 'Daily Updates', 'Receive photos and notes about your child\'s activities', 'Attendance Tracking', 'Monitor attendance and schedule future visits', 'Skill Progress', 'View detailed reports on developmental milestones', 'Live Chat with Teachers', 'Direct interaction for parents to discuss progress and concerns.', 1, '2025-04-29 12:30:35', '2025-05-21 21:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `mrp` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `desc`, `mrp`, `price`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Bartender', 'assets/images/products/product/683b132ab3ad6.webp', 'ddfdf', 10.00, 10.00, 'active', '2025-05-31 09:03:14', '2025-05-31 09:03:14'),
(5, 'test33', 'assets/images/products/product/683d4597560af.webp', 'sddfdfdf', 33.00, 10.00, 'active', '2025-06-02 01:02:55', '2025-06-02 01:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `no_of_student` bigint(20) UNSIGNED DEFAULT NULL,
  `no_of_teacher` bigint(20) UNSIGNED DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL,
  `group_class` varchar(250) DEFAULT NULL,
  `group_class_fees` decimal(10,2) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `title`, `no_of_student`, `no_of_teacher`, `fees`, `group_class`, `group_class_fees`, `type`, `status`, `created_at`, `updated_at`) VALUES
(9, '1:2', 2, 1, 555.00, NULL, NULL, NULL, 'active', '2025-07-12 06:02:50', '2025-07-12 06:02:50'),
(10, 'group', 0, 0, 999.00, NULL, NULL, NULL, 'active', '2025-07-12 06:03:20', '2025-07-12 06:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `progress_goals`
--

CREATE TABLE `progress_goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress_goals`
--

INSERT INTO `progress_goals` (`id`, `image`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/progress_goals/683ffb258ccd6.webp', 'progress goals', NULL, 'active', '2025-06-04 01:55:23', '2025-06-04 02:22:05'),
(3, 'assets/images/progress_goals/68777e9b3e840.webp', 'sdsdsd', 'sdsdsd', 'active', '2025-07-16 04:57:39', '2025-07-16 04:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_content`
--

CREATE TABLE `quiz_content` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `btn_name` varchar(255) NOT NULL,
  `btn_link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz_content`
--

INSERT INTO `quiz_content` (`id`, `heading`, `sub_heading`, `image`, `description`, `btn_name`, `btn_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fun for Parents', 'Unlock Two Days of Free Learning!', 'assets/images/child_learning/681123b305ae4.webp', 'Ready to have a little fun? Take this light-hearted quiz to discover your parenting style—and get custom tips to match! Whether you\'re all about structure or full of spontaneous play, there’s no wrong answer—just insight and laughs.', 'Start Quiz', 'Start Quiz', 1, '2025-04-29 19:08:35', '2025-04-29 19:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Morning routines in your home look like....', 'Planned the night before, everything ready', 'A mix of chaos and cuddles', 'We make it by 9:00 somehow!', 'We go with the flow', 'assets/images/quiz_questions/68382c6dedaf7.webp', 1, '2025-05-29 04:14:14', '2025-05-29 04:35:32'),
(2, 'When your child starts asking 500 questions, you...', 'Pull out a book and explain every answer', 'Answer creatively and turn it into a story', 'Google 3 of them, then pretend you didn’t hear the rest', 'Redirect with \"Wanna go build a rocket?\"', 'assets/images/quiz_questions/68382f3e01b8d.webp', 1, '2025-05-29 04:26:14', '2025-05-29 04:26:14'),
(3, 'Your favourite kind of playtime is...', 'Puzzle-solving or quiet games', 'Dancing in the living room', 'Arts and crafts (until glitter happens)', 'Outdoor adventures—rain or shine!', 'assets/images/quiz_questions/68382f936f308.webp', 1, '2025-05-29 04:27:39', '2025-05-29 04:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_name` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `group_name`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Seo', 'marketing', 1, '2025-07-01 07:46:24', '2025-07-01 07:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `schoolfacilities`
--

CREATE TABLE `schoolfacilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('active','Inactive') NOT NULL DEFAULT 'active',
  `type` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_logo` varchar(255) DEFAULT NULL,
  `school_email` varchar(255) NOT NULL,
  `school_phone_1` varchar(255) NOT NULL,
  `school_phone_2` varchar(255) DEFAULT NULL,
  `principal_name` varchar(255) NOT NULL,
  `vice_principal_name` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `age` varchar(250) DEFAULT NULL,
  `fees_price` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `user_id`, `school_name`, `school_logo`, `school_email`, `school_phone_1`, `school_phone_2`, `principal_name`, `vice_principal_name`, `address`, `city`, `state`, `zip`, `document`, `image`, `status`, `age`, `fees_price`, `created_at`, `updated_at`) VALUES
(1, 5, 'Delhi Public School', 'assets/images/user/school/1746798726_school_logo.jpg', 'dps2@school.com', '7485961420', '4185759625', 'Mr Principal', 'Mr Vice Principal', 'mahakali ward', 'sagar', 'madhya pradesh', '485961', NULL, NULL, 'active', NULL, NULL, '2025-05-09 08:22:06', '2025-05-09 08:22:06'),
(2, 7, 'pyschool', 'assets/images/user/school/1748498374_generic-high-school-building-20262841.webp', 'pyschool2@gmail.com', '7894561299', '1234567893', 'test', 'test', 'indore', 'indore', 'mp', '451666', NULL, NULL, 'active', NULL, NULL, '2025-05-29 00:29:34', '2025-05-29 00:29:34'),
(3, 18, 'tyty', 'assets/images/user/school/1749908538_download.jpg', 'wwwwttddt@mailinator.com', '6745129635', '1234567893', 'test', 'wewe', 'us', 'us', 'Kansas', '451666', NULL, NULL, 'active', '[\"1\"]', '[{\"annual_fees\":\"889\",\"per_month_fees\":\"500.00\"}]', '2025-06-14 08:12:18', '2025-06-14 08:12:18'),
(4, 19, 'tyty', 'assets/images/user/school/1749908640_download.jpg', 'wwwwttffddt@mailinator.com', '9745129635', '1234567893', 'test', 'wewe', 'us', 'us', 'Kansas', '451666', NULL, NULL, 'active', '[null]', '[{\"annual_fees\":null,\"per_month_fees\":null}]', '2025-06-14 08:14:00', '2025-06-14 08:14:00'),
(5, 20, 'tyty', 'assets/images/user/school/1749908688_download.jpg', 'wwwwttffddffft@mailinator.com', '9945129635', '1234567893', 'test', 'wewe', 'us', 'us', 'Kansas', '451666', NULL, NULL, 'active', '[\"1\"]', '[{\"annual_fees\":\"888\",\"per_month_fees\":\"500.00\"}]', '2025-06-14 08:14:48', '2025-06-14 08:14:48'),
(6, 21, 'pyschool', 'assets/images/user/school/1749908933_download (1).jpg', 'teseet2@mailinator.com', '1234567877', '1234567893', 'trtrtrtr', 'rtrtrt', 'indore', 'indore', 'mp', '451666', NULL, NULL, 'active', '[\"2\",\"3\"]', '[{\"annual_fees\":\"0.00\",\"per_month_fees\":\"500.00\"},{\"annual_fees\":\"0.00\",\"per_month_fees\":\"500.00\"}]', '2025-06-14 08:18:53', '2025-06-14 09:11:31'),
(7, 36, 'rsschool', 'assets/images/user/school/1752554331_WhatsApp Image 2025-06-24 at 6.26.28 PM.jpeg', 'adminschool@example.com', '2589631456', '1234569521', 'fdfdf', 'xsssdsd', 'fgfgf', 'ghghg', 'ghgh', '65656', NULL, NULL, 'active', '[\"1\"]', '[\"999\"]', '2025-07-14 23:08:51', '2025-07-14 23:08:51'),
(8, 49, 'pyschool', 'assets/images/user/school/1752588893_generic-high-school-building-20262841.webp', 'adminschdddool@example.com', '7894562315', '1233214565', 'sdsdsd', 'sdsd', 'ghghg', 'ghghg', 'ghgh', '65656', NULL, NULL, 'active', '[\"2\"]', '[\"0.00\"]', '2025-07-15 08:44:53', '2025-07-15 08:44:53'),
(9, 68, 'Dreamland Kids School1', 'assets/images/user/school/1753864232_download.jpg', 'pu@example.com', '9898123856', '4447778889', 'Rn verma', 'Mr Rohan singh', 'indore', 'ghghg', 'MP', '65656', NULL, NULL, 'active', '[\"2\",\"1\"]', '[{\"annual_fees\":\"0.00\",\"per_month_fees\":\"500.00\"},{\"annual_fees\":\"0.00\",\"per_month_fees\":\"500.00\"}]', '2025-07-30 03:00:32', '2025-07-30 03:10:55'),
(10, 69, 'Dreamland Kids School3', 'assets/images/user/school/1753865243_download.jpg', 'uo@example.com', '7412589635', '3339990987', 'Rn verma', 'Mr Rohan singh', 'indore', 'ghghg', 'Madhya Pradesh', '65656', NULL, NULL, 'active', '[\"3\",\"1\"]', '[{\"annual_fees\":\"0.00\",\"per_month_fees\":\"500.00\"},{\"annual_fees\":\"0.00\",\"per_month_fees\":\"500.00\"}]', '2025-07-30 03:17:23', '2025-07-30 03:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `school_aboutuses`
--

CREATE TABLE `school_aboutuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','Inactive') NOT NULL DEFAULT 'active',
  `type` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_aboutuses`
--

INSERT INTO `school_aboutuses` (`id`, `school_id`, `description`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 7, 'tytytytyysdsd', 'active', NULL, '2025-06-13 06:35:52', '2025-06-13 06:39:35'),
(2, 2, 'gfgfgfg', 'active', 'school', '2025-07-26 08:29:41', '2025-07-26 08:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `school_banners`
--

CREATE TABLE `school_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','Inactive') NOT NULL DEFAULT 'active',
  `type` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_banners`
--

INSERT INTO `school_banners` (`id`, `school_id`, `image`, `status`, `type`, `created_at`, `updated_at`) VALUES
(3, 2, 'assets/images/partnerschooldetail/banner/6884a354ca93b.jpeg', 'active', 'partner_school', '2025-07-26 04:13:48', '2025-07-26 04:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `school_category`
--

CREATE TABLE `school_category` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_url` varchar(255) NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `school_category`
--

INSERT INTO `school_category` (`id`, `image`, `category_name`, `category_url`, `banner_image`, `content`, `status`, `created_at`, `updated_at`) VALUES
(3, 'assets/images/category/680fd12c9e7d0.webp', 'Preschool', 'pre-school', NULL, 'Our preschool program offers a creative, nurturing space where your child can explore and thrive!', 1, '2025-04-28 19:04:12', '2025-04-28 19:04:12'),
(4, 'assets/images/category/680fd1de252fc.webp', 'Day care', 'day-care', NULL, 'Our daycare program provides a safe, loving environment for your child to learn, play, and grow.', 1, '2025-04-28 19:07:10', '2025-04-28 19:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `school_fees`
--

CREATE TABLE `school_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `age` int(11) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `per_month_fees` decimal(10,2) DEFAULT NULL,
  `annual_fees` decimal(10,2) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_fees`
--

INSERT INTO `school_fees` (`id`, `age`, `school_id`, `per_month_fees`, `annual_fees`, `status`, `created_at`, `updated_at`) VALUES
(62, 1, 8, 800.00, 6000.00, 'active', '2025-07-12 08:19:10', '2025-07-12 08:19:10'),
(63, 2, 8, 500.00, 6000.00, 'active', '2025-07-12 08:19:10', '2025-07-12 08:19:10'),
(64, 3, 8, 500.00, 6000.00, 'active', '2025-07-12 08:19:10', '2025-07-12 08:19:10'),
(65, 4, 8, 500.00, 6000.00, 'active', '2025-07-12 08:19:10', '2025-07-12 08:19:10'),
(70, 1, 2, 500.00, 6000.00, 'active', '2025-07-12 08:21:24', '2025-07-12 08:21:24'),
(71, 2, 2, 500.00, 6000.00, 'active', '2025-07-12 08:21:24', '2025-07-12 08:21:24'),
(72, 3, 2, 500.00, 6000.00, 'active', '2025-07-12 08:21:24', '2025-07-12 08:21:24'),
(73, 4, 2, 100.00, 1200.00, 'active', '2025-07-12 08:21:24', '2025-07-12 08:21:24'),
(74, 1, 5, 500.00, 6000.00, 'active', '2025-07-12 08:21:54', '2025-07-12 08:21:54'),
(75, 2, 5, 500.00, 6000.00, 'active', '2025-07-12 08:21:54', '2025-07-12 08:21:54'),
(76, 3, 5, 500.00, 6000.00, 'active', '2025-07-12 08:21:54', '2025-07-12 08:21:54'),
(77, 4, 5, 500.00, 6000.00, 'active', '2025-07-12 08:21:54', '2025-07-12 08:21:54'),
(78, 1, 6, 500.00, 6000.00, 'active', '2025-07-12 08:22:31', '2025-07-12 08:22:31'),
(79, 2, 6, 500.00, 6000.00, 'active', '2025-07-12 08:22:31', '2025-07-12 08:22:31'),
(80, 3, 6, 500.00, 6000.00, 'active', '2025-07-12 08:22:31', '2025-07-12 08:22:31'),
(81, 4, 6, 100.00, 1200.00, 'active', '2025-07-12 08:22:31', '2025-07-12 08:22:31'),
(82, 1, 7, 500.00, 6000.00, 'active', '2025-07-12 08:22:51', '2025-07-12 08:22:51'),
(83, 2, 7, 500.00, 6000.00, 'active', '2025-07-12 08:22:51', '2025-07-12 08:22:51'),
(84, 3, 7, 500.00, 6000.00, 'active', '2025-07-12 08:22:51', '2025-07-12 08:22:51'),
(85, 4, 7, 500.00, 6000.00, 'active', '2025-07-12 08:22:51', '2025-07-12 08:22:51'),
(86, 1, 1, 500.00, 6000.00, 'active', '2025-07-12 15:10:47', '2025-07-12 15:10:47'),
(87, 2, 1, 500.00, 6000.00, 'active', '2025-07-12 15:10:47', '2025-07-12 15:10:47'),
(88, 3, 1, 500.00, 6000.00, 'active', '2025-07-12 15:10:47', '2025-07-12 15:10:47'),
(89, NULL, 1, 100.00, 1200.00, 'active', '2025-07-12 15:10:47', '2025-07-12 15:10:47'),
(94, 1, 10, 500.00, 6000.00, 'active', '2025-07-14 08:04:42', '2025-07-14 08:04:42'),
(95, 2, 10, 500.00, 6000.00, 'active', '2025-07-14 08:04:42', '2025-07-14 08:04:42'),
(96, 3, 10, 500.00, 6000.00, 'active', '2025-07-14 08:04:42', '2025-07-14 08:04:42'),
(97, NULL, 10, 500.00, 6000.00, 'active', '2025-07-14 08:04:42', '2025-07-14 08:04:42'),
(98, 1, 11, 500.00, 6000.00, 'active', '2025-07-15 08:06:20', '2025-07-15 08:06:20'),
(99, 2, 11, 500.00, 6000.00, 'active', '2025-07-15 08:06:20', '2025-07-15 08:06:20'),
(100, 3, 11, 500.00, 6000.00, 'active', '2025-07-15 08:06:20', '2025-07-15 08:06:20'),
(101, 4, 11, 100.00, 1200.00, 'active', '2025-07-15 08:06:20', '2025-07-15 08:06:20'),
(102, 4, 12, 100.00, 1200.00, 'active', '2025-07-16 04:58:50', '2025-07-16 04:58:50'),
(103, 2, 13, 500.00, 0.00, 'active', '2025-07-16 05:13:06', '2025-07-16 05:13:06'),
(104, 1, 14, 500.00, 6000.00, 'active', '2025-07-16 05:21:19', '2025-07-16 05:21:19'),
(105, 2, 14, 500.00, 6000.00, 'active', '2025-07-16 05:21:19', '2025-07-16 05:21:19'),
(106, 3, 14, 500.00, 6000.00, 'active', '2025-07-16 05:21:19', '2025-07-16 05:21:19'),
(107, 4, 14, 100.00, 1200.00, 'active', '2025-07-16 05:21:19', '2025-07-16 05:21:19'),
(112, 1, 15, 500.00, 6000.00, 'active', '2025-07-17 05:10:30', '2025-07-17 05:10:30'),
(113, 2, 15, 500.00, 6000.00, 'active', '2025-07-17 05:10:30', '2025-07-17 05:10:30'),
(114, 3, 15, 500.00, 6000.00, 'active', '2025-07-17 05:10:30', '2025-07-17 05:10:30'),
(115, 4, 15, 1000.00, 12000.00, 'active', '2025-07-17 05:10:30', '2025-07-17 05:10:30'),
(118, 2, 9, 500.00, 0.00, 'active', '2025-07-30 03:10:55', '2025-07-30 03:10:55'),
(119, 1, 9, 500.00, 0.00, 'active', '2025-07-30 03:10:55', '2025-07-30 03:10:55'),
(120, 3, 10, 500.00, 0.00, 'active', '2025-07-30 03:17:23', '2025-07-30 03:17:23'),
(121, 1, 10, 500.00, 0.00, 'active', '2025-07-30 03:17:23', '2025-07-30 03:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `school_galleries`
--

CREATE TABLE `school_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','Inactive') NOT NULL DEFAULT 'active',
  `type` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('hRCnHuAaXtAwTw2MR2LW9KBCniTFUDpCET5VtAzC', NULL, '127.0.0.1', 'PostmanRuntime/7.44.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTRUUTBFaGV3b3ozcGl3UndJcGlNZjZPQjhOWGtSbzhZYzMyOWY5VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753948063),
('Vd56SsEMVB0U843AEExwAoIi94z5lmpagtEi3nNw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia3JrTWNTMlZ6RmJIS3JGMUZwWnE0TWEyWm5PeVhMT0hibkhsRFBJNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi90ZWFjaGVyLzEvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1753942794);

-- --------------------------------------------------------

--
-- Table structure for table `skill_learns`
--

CREATE TABLE `skill_learns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `button` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `playbtn` varchar(255) DEFAULT NULL,
  `playurl` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialized_classes`
--

CREATE TABLE `specialized_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_url` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `banner_heading` varchar(255) DEFAULT NULL,
  `banner_description` text DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `no_of_student` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`no_of_student`)),
  `no_of_teacher` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`no_of_teacher`)),
  `fees` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`fees`)),
  `materials` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 = Active, 0 = Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialized_classes`
--

INSERT INTO `specialized_classes` (`id`, `class_name`, `class_url`, `image`, `banner_image`, `description`, `banner_heading`, `banner_description`, `sub_heading`, `duration`, `age`, `no_of_student`, `no_of_teacher`, `fees`, `materials`, `skills`, `status`, `created_at`, `updated_at`) VALUES
(1, 'special class', 'http://127.0.0.1:8000/admin/specialized-class', 'assets/images/specialized/6853fcb436970.webp', 'assets/images/specialized/6853fc4ce43d0.webp', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 'banner', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 'testing', '2hr', '4 - 5', '[\"1\"]', '[\"1\"]', '[\"44.00\"]', 'testing', 'abc', 1, '2025-06-19 06:32:21', '2025-06-19 06:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(250) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `student_image` varchar(255) DEFAULT NULL,
  `academic_year` varchar(255) DEFAULT NULL,
  `admission_number` varchar(255) DEFAULT NULL,
  `admission_date` varchar(250) DEFAULT NULL,
  `roll_number` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` varchar(250) DEFAULT NULL,
  `primary_contact` varchar(255) DEFAULT NULL,
  `mother_tongue` varchar(255) DEFAULT NULL,
  `language_known` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(250) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number_1` varchar(255) DEFAULT NULL,
  `phone_number_2` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `medical_condition` varchar(250) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `religion` varchar(250) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `medications` varchar(255) DEFAULT NULL,
  `per_month_fee` decimal(10,2) DEFAULT NULL,
  `discount_fee` decimal(10,2) DEFAULT 0.00,
  `annual_fee` decimal(10,2) DEFAULT NULL,
  `age` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `time_shift` varchar(250) DEFAULT NULL,
  `father_occup` varchar(250) DEFAULT NULL,
  `mother_occup` varchar(250) DEFAULT NULL,
  `topic` text DEFAULT NULL,
  `subtopic` text DEFAULT NULL,
  `good_habit` varchar(250) DEFAULT NULL,
  `bad_habit` varchar(250) DEFAULT NULL,
  `father_image` varchar(250) DEFAULT NULL,
  `mother_image` varchar(250) DEFAULT NULL,
  `birth_cert` varchar(250) DEFAULT NULL,
  `tranc_cert` varchar(250) DEFAULT NULL,
  `medical_image` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `misc2` varchar(250) DEFAULT NULL,
  `misc1` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `student_id`, `school_id`, `student_image`, `academic_year`, `admission_number`, `admission_date`, `roll_number`, `class`, `gender`, `first_name`, `last_name`, `dob`, `primary_contact`, `mother_tongue`, `language_known`, `father_name`, `mother_name`, `email`, `phone_number_1`, `phone_number_2`, `address`, `city`, `state`, `zip`, `medical_condition`, `allergies`, `religion`, `nationality`, `medications`, `per_month_fee`, `discount_fee`, `annual_fee`, `age`, `status`, `time_shift`, `father_occup`, `mother_occup`, `topic`, `subtopic`, `good_habit`, `bad_habit`, `father_image`, `mother_image`, `birth_cert`, `tranc_cert`, `medical_image`, `description`, `misc2`, `misc1`, `created_at`, `updated_at`) VALUES
(7, 71, 'STU-102507300001', 10, 'assets/images/user/student/6889e7342c584.jfif', '2016', '9T91025073000001', '07-07-2025', NULL, NULL, 'Male', 'rtrt', 'rtrt', NULL, '8887775656', 'hjhj', 'ggfg', 'fddfd', 'ghghg', 'oop@example.com', '8887775656', '0909675679', 'fgfgf', 'ghghg', 'ghgh', '65656', 'no', NULL, 'hjhj', NULL, NULL, 500.00, 0.00, 0.00, '1', 'active', '1', 'dsdsd', 'sdsd', '[\"2\",\"3\",\"6\",\"7\",\"9\"]', '[\"3\",\"4\",\"7\",\"22\",\"64\",\"105\",\"106\",\"107\",\"108\",\"109\",\"110\",\"111\",\"112\",\"113\",\"114\",\"115\",\"116\",\"117\",\"118\",\"119\",\"120\",\"121\",\"122\",\"123\",\"124\",\"125\",\"126\",\"127\",\"128\",\"129\",\"130\",\"131\",\"132\",\"133\",\"134\",\"135\",\"136\",\"137\",\"138\",\"139\",\"140\",\"141\",\"142\",\"143\",\"144\",\"145\",\"146\",\"147\",\"148\",\"149\",\"150\",\"151\",\"152\",\"153\",\"154\",\"155\",\"156\",\"157\",\"158\",\"159\",\"160\",\"161\",\"162\",\"163\",\"164\",\"165\",\"166\",\"167\"]', '1', '2', 'assets/images/user/student/parents/6889e7342a2c2.png', 'assets/images/user/student/parents/6889e7342aea2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-30 04:04:44', '2025-07-30 04:04:44'),
(8, 71, 'STU-052507300002', 5, 'assets/images/user/student/6889e7342dec5.jpg', NULL, '9T90525073000002', '02-07-2025', NULL, NULL, 'Male', 'rtrt', 'rtrt', NULL, '8887775656', 'hjhj', 'ggfg', 'fddfd', 'ghghg', 'oop@example.com', '8887775656', '0909675679', 'fgfgf', 'ghghg', 'ghgh', '65656', NULL, NULL, 'hjhj', NULL, NULL, 500.00, 0.00, 0.00, '1', 'active', '2', 'dsdsd', 'sdsd', '[\"2\",\"3\",\"6\",\"7\",\"9\"]', '[\"3\",\"4\",\"7\",\"22\",\"64\",\"105\",\"106\",\"107\",\"108\",\"109\",\"110\",\"111\",\"112\",\"113\",\"114\",\"115\",\"116\",\"117\",\"118\",\"119\",\"120\",\"121\",\"122\",\"123\",\"124\",\"125\",\"126\",\"127\",\"128\",\"129\",\"130\",\"131\",\"132\",\"133\",\"134\",\"135\",\"136\",\"137\",\"138\",\"139\",\"140\",\"141\",\"142\",\"143\",\"144\",\"145\",\"146\",\"147\",\"148\",\"149\",\"150\",\"151\",\"152\",\"153\",\"154\",\"155\",\"156\",\"157\",\"158\",\"159\",\"160\",\"161\",\"162\",\"163\",\"164\",\"165\",\"166\",\"167\"]', NULL, NULL, 'assets/images/user/student/parents/6889e7342a2c2.png', 'assets/images/user/student/parents/6889e7342aea2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-30 04:04:44', '2025-07-30 04:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `per_month_fees` decimal(10,2) DEFAULT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `payment_mode` varchar(250) DEFAULT NULL,
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('pending','paid','failed','partial') NOT NULL DEFAULT 'pending',
  `status` varchar(250) DEFAULT NULL,
  `transaction_id` varchar(250) DEFAULT NULL,
  `reference_id` varchar(250) DEFAULT NULL,
  `stu_academy` int(250) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `student_id`, `school_id`, `parent_id`, `order_id`, `per_month_fees`, `due_amount`, `month`, `date`, `payment_mode`, `discount_amount`, `paid_amount`, `payment_status`, `status`, `transaction_id`, `reference_id`, `stu_academy`, `note`, `source`, `created_at`, `updated_at`) VALUES
(1, 32, 4, 4, 'order_309697', 3000.00, 1000.00, 'January', '2025-01-01', 'cash', NULL, 2000.00, 'partial', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-03 08:41:50', '2025-06-03 08:41:50'),
(2, 32, 4, 4, 'order_502942', 3000.00, 1000.00, 'February', '2025-02-01', 'cash', NULL, 3000.00, 'partial', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-03 08:42:15', '2025-06-03 08:42:15'),
(3, 32, 4, 4, 'order_320298', 3000.00, 1000.00, 'March', '2025-03-01', 'online', NULL, 3000.00, 'partial', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-03 08:43:09', '2025-06-03 08:43:09'),
(4, 32, 4, 4, 'order_803813', 3000.00, 6000.00, NULL, NULL, 'cash', NULL, 4000.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-03 08:44:23', '2025-06-03 08:44:23'),
(5, 32, 4, 4, 'order_822645', 3000.00, 1991000.00, 'April', NULL, 'cash', NULL, 4000.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-03 08:44:43', '2025-06-03 08:44:43'),
(6, 32, 4, 4, 'order_650861', 3000.00, 1990000.00, 'April', '2025-04-03', 'cash', NULL, 4000.00, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-03 08:45:11', '2025-06-03 08:45:11'),
(7, 1, 6, 11, 'order_489625', 2000.00, 0.00, 'June', '2025-06-01', 'online', 22.00, 2000.00, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-04 01:32:12', '2025-06-04 01:32:12'),
(8, 1, 6, 11, 'order_997310', 2000.00, 1000.00, 'July', '2025-07-04', 'cash', 22.00, 1000.00, 'partial', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-04 03:30:32', '2025-06-04 03:30:32'),
(9, 2, 7, 11, 'order_909098', 3000.00, 0.00, 'February', '2025-06-09', 'online', NULL, 3000.00, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-16 00:33:10', '2025-06-16 00:33:10'),
(10, 3, 7, 3, 'SFORDER_353410', 3000.00, NULL, NULL, '23-06-2025', 'online', NULL, 444.00, 'pending', NULL, NULL, NULL, NULL, NULL, 'apk', '2025-06-23 05:26:45', '2025-06-23 05:26:45'),
(11, 3, 7, 3, 'SFORDER_946541', 3000.00, NULL, NULL, '23-06-2025', 'online', NULL, 444.00, 'pending', 'paid', NULL, NULL, NULL, NULL, 'apk', '2025-06-23 05:27:12', '2025-06-23 05:27:40'),
(12, 3, 7, 5666, 'SFORDER_129383', 3000.00, NULL, NULL, '26-06-2025', 'online', NULL, 500.00, 'pending', NULL, NULL, NULL, NULL, NULL, 'apk', '2025-06-26 03:01:57', '2025-06-26 03:01:57'),
(13, 3, 7, 5666, 'SFORDER_588088', 3000.00, NULL, NULL, '26-06-2025', 'online', NULL, 500.00, 'pending', NULL, NULL, NULL, NULL, NULL, 'apk', '2025-06-26 03:06:31', '2025-06-26 03:06:31'),
(14, 3, 7, 5666, 'SFORDER_608024', 3000.00, NULL, NULL, '26-06-2025', 'online', NULL, 500.00, 'pending', NULL, NULL, NULL, NULL, NULL, 'apk', '2025-06-26 03:06:57', '2025-06-26 03:06:57'),
(15, 3, 7, 5666, 'SFORDER_999432', 3000.00, NULL, NULL, '26-06-2025', 'online', NULL, 500.00, 'pending', NULL, NULL, NULL, NULL, NULL, 'apk', '2025-06-26 03:18:24', '2025-06-26 03:18:24'),
(22, 4, 6, 67, NULL, 3000.00, NULL, NULL, '2025-07-25', 'wallet', 0.00, 136.36, 'paid', NULL, NULL, NULL, NULL, NULL, 'apk', '2025-07-25 04:31:22', '2025-07-25 04:31:22'),
(23, 5, 6, 67, NULL, 3000.00, NULL, NULL, '2025-07-25', 'wallet', 0.00, 136.36, 'paid', NULL, NULL, NULL, NULL, NULL, 'apk', '2025-07-25 04:31:22', '2025-07-25 04:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `student_wallet`
--

CREATE TABLE `student_wallet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `student_coins` decimal(10,2) DEFAULT NULL,
  `payment_date` varchar(250) DEFAULT NULL,
  `ladger_status` enum('credit','debit') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_wallet`
--

INSERT INTO `student_wallet` (`id`, `student_id`, `parent_id`, `student_coins`, `payment_date`, `ladger_status`, `status`, `source`, `created_at`, `updated_at`) VALUES
(1, 31, NULL, 3000.00, NULL, 'credit', 'active', NULL, '2025-06-03 08:28:39', '2025-06-03 08:28:39'),
(2, 31, NULL, 3000.00, NULL, 'credit', 'active', NULL, '2025-06-03 08:29:19', '2025-06-03 08:29:19'),
(3, 31, NULL, 3000.00, NULL, 'credit', 'active', NULL, '2025-06-03 08:37:34', '2025-06-03 08:37:34'),
(4, 31, NULL, 3000.00, '2025-06-18', 'credit', 'active', NULL, '2025-06-03 08:38:09', '2025-06-03 08:38:09'),
(5, 31, NULL, 3000.00, '2025-06-17', 'credit', 'active', NULL, '2025-06-03 08:38:38', '2025-06-03 08:38:38'),
(6, 32, NULL, 3000.00, '2025-06-27', 'credit', 'active', NULL, '2025-06-03 08:39:49', '2025-06-03 08:39:49'),
(7, 32, NULL, 2000.00, '2025-01-01', 'credit', 'active', NULL, '2025-06-03 08:41:50', '2025-06-03 08:41:50'),
(8, 32, NULL, 3000.00, '2025-02-01', 'credit', 'active', NULL, '2025-06-03 08:42:15', '2025-06-03 08:42:15'),
(9, 32, NULL, 3000.00, '2025-03-01', 'credit', 'active', NULL, '2025-06-03 08:43:09', '2025-06-03 08:43:09'),
(10, 32, NULL, 4000.00, NULL, 'credit', 'active', NULL, '2025-06-03 08:44:23', '2025-06-03 08:44:23'),
(11, 32, NULL, 4000.00, NULL, 'credit', 'active', NULL, '2025-06-03 08:44:43', '2025-06-03 08:44:43'),
(12, 32, NULL, 4000.00, '2025-04-03', 'credit', 'active', NULL, '2025-06-03 08:45:11', '2025-06-03 08:45:11'),
(13, 1, NULL, 2000.00, '2025-06-01', 'credit', 'active', NULL, '2025-06-04 01:32:12', '2025-06-04 01:32:12'),
(14, 1, NULL, 1000.00, '2025-07-04', 'credit', 'active', NULL, '2025-06-04 03:30:32', '2025-06-04 03:30:32'),
(15, 1, NULL, 2956.00, '2025-06-06', 'debit', 'active', NULL, '2025-06-04 11:04:32', '2025-06-04 11:04:32'),
(16, 1, NULL, 0.00, '2025-06-07', 'debit', 'active', NULL, '2025-06-05 01:12:53', '2025-06-05 01:12:53'),
(17, 1, NULL, 0.00, '2025-06-09', 'debit', 'active', NULL, '2025-06-05 04:53:01', '2025-06-05 04:53:01'),
(18, 2, NULL, 3000.00, '2025-06-09', 'credit', 'active', NULL, '2025-06-16 00:33:10', '2025-06-16 00:33:10'),
(19, 2, NULL, 2863.64, '2025-06-19', 'debit', 'active', NULL, '2025-06-19 02:45:22', '2025-06-19 02:45:22'),
(20, 3, NULL, 444.00, '23-06-2025', 'credit', 'active', NULL, '2025-06-23 05:29:13', '2025-06-23 05:29:13'),
(21, 3, NULL, 307.64, '2025-07-02', 'debit', 'active', 'attendance', '2025-07-02 03:41:05', '2025-07-02 03:41:05'),
(30, NULL, 67, 5000.00, '25-07-2025', 'credit', 'active', 'apk', '2025-07-25 04:31:07', '2025-07-25 04:31:07'),
(31, 4, 67, 136.36, '2025-07-25', 'debit', 'active', 'apk', '2025-07-25 04:31:22', '2025-07-25 04:31:22'),
(32, 5, 67, 136.36, '2025-07-25', 'debit', 'active', 'apk', '2025-07-25 04:31:22', '2025-07-25 04:31:22'),
(33, NULL, 67, 5000.00, '25-07-2025', 'credit', 'active', 'apk', '2025-07-25 08:34:16', '2025-07-25 08:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `sub_topics`
--

CREATE TABLE `sub_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `quarters` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_topics`
--

INSERT INTO `sub_topics` (`id`, `topic_name`, `name`, `age`, `status`, `quarters`, `created_at`, `updated_at`) VALUES
(3, '2', 'matching pictures', '1', 'active', 'months 1-3', '2025-06-09 04:48:33', '2025-06-25 04:14:01'),
(4, '1', 'Puzzles (2-4 pieces)', '1', 'active', 'months 4-6', '2025-06-09 04:52:02', '2025-06-11 11:37:10'),
(7, '2', 'Stacking blocks', '1', 'active', 'months 1-3', '2025-06-09 04:57:40', '2025-06-09 08:37:41'),
(8, '7', 'tearing paper', 'tearing paper', 'active', NULL, '2025-06-09 04:58:26', '2025-06-09 04:58:26'),
(9, '7', 'walking', 'walking', 'active', NULL, '2025-06-09 04:58:44', '2025-06-09 04:58:44'),
(10, '7', 'kicking a ball', 'kicking a ball', 'active', NULL, '2025-06-09 04:59:06', '2025-06-09 04:59:06'),
(11, '3', 'Parallel play', 'Parallel play', 'active', NULL, '2025-06-09 04:59:22', '2025-06-09 04:59:22'),
(12, '3', 'greeting routines,', 'greeting routines,', 'active', NULL, '2025-06-09 04:59:46', '2025-06-09 04:59:46'),
(13, '3', 'understanding “mine/yours”', 'understanding “mine/yours”', 'active', NULL, '2025-06-09 05:00:26', '2025-06-09 05:00:26'),
(14, '4', 'Water play', 'Water play', 'active', NULL, '2025-06-09 05:00:54', '2025-06-09 05:00:54'),
(15, '4', 'finger painting', 'finger painting', 'active', NULL, '2025-06-09 05:01:54', '2025-06-09 05:01:54'),
(16, '4', 'music instruments', 'music instruments', 'active', NULL, '2025-06-09 05:02:11', '2025-06-09 05:02:11'),
(17, '4', 'Washing hands', 'Washing hands', 'active', NULL, '2025-06-09 05:06:50', '2025-06-09 05:06:50'),
(18, '4', 'putting toys away', 'putting toys away', 'active', NULL, '2025-06-09 05:07:13', '2025-06-09 05:07:13'),
(19, '4', 'sitting at the table', 'sitting at the table', 'active', NULL, '2025-06-09 05:07:45', '2025-06-09 05:07:45'),
(20, '1', 'Puzzles (2-4 pieces)', 'Puzzles (2-4 pieces)', 'active', NULL, '2025-06-09 05:09:51', '2025-06-09 05:09:51'),
(21, '1', 'classifying animals (land/water)', 'classifying animals (land/water)', 'active', NULL, '2025-06-09 05:41:11', '2025-06-09 05:41:11'),
(22, '1', 'test twst', '1', 'active', 'months 1-3', '2025-06-09 08:10:04', '2025-06-09 08:10:04'),
(23, '16', 'Sorting by attributes', '3', 'active', 'months 1-3', '2025-06-11 10:21:38', '2025-06-11 10:21:38'),
(24, '16', 'shape recognition', '3', 'active', 'months 1-3', '2025-06-11 10:21:56', '2025-06-11 10:21:56'),
(25, '16', 'classifying objects', '3', 'active', 'months 1-3', '2025-06-11 10:22:13', '2025-06-11 10:22:13'),
(26, '17', 'Story retelling', '3', 'active', 'months 1-3', '2025-06-11 10:22:57', '2025-06-11 10:22:57'),
(27, '17', 'Identifying beginning sounds', '3', 'active', 'months 1-3', '2025-06-11 10:23:34', '2025-06-11 10:23:34'),
(28, '17', 'Recognizing name and some letters', '3', 'active', 'months 1-3', '2025-06-11 10:24:17', '2025-06-11 10:24:17'),
(29, '18', 'Tracing lines/shapes', '3', 'active', 'months 1-3', '2025-06-11 10:24:41', '2025-06-11 10:25:35'),
(30, '18', 'Ball bouncing', '3', 'active', 'months 1-3', '2025-06-11 10:25:21', '2025-06-11 10:25:21'),
(31, '18', 'Hopping on one foot', '3', 'active', 'months 1-3', '2025-06-11 10:25:59', '2025-06-11 10:25:59'),
(32, '19', 'Sharing', '3', 'active', 'months 1-3', '2025-06-11 10:26:40', '2025-06-11 10:26:40'),
(33, '19', 'Naming emotions', '3', 'active', 'months 1-3', '2025-06-11 10:27:28', '2025-06-11 10:27:28'),
(34, '19', 'Practicing turn-taking', '3', 'active', 'months 1-3', '2025-06-11 10:28:18', '2025-06-11 10:28:18'),
(35, '20', 'Finger painting', '3', 'active', 'months 1-3', '2025-06-11 10:28:52', '2025-06-11 10:28:52'),
(36, '20', 'Building with blocks', '3', 'active', 'months 1-3', '2025-06-11 10:29:16', '2025-06-11 10:29:16'),
(37, '20', 'Color mixing', '3', 'active', 'months 1-3', '2025-06-11 10:29:37', '2025-06-11 10:29:37'),
(38, '21', 'Dressing self (zips/buttons)', '3', 'active', 'months 1-3', '2025-06-11 10:30:30', '2025-06-11 10:30:30'),
(39, '21', 'Setting up snack', '3', 'active', 'months 1-3', '2025-06-11 10:30:56', '2025-06-11 10:30:56'),
(40, '10', 'Match colors/shapes', '2', 'active', 'months 1-3', '2025-06-11 10:36:35', '2025-06-11 10:36:35'),
(41, '10', 'Simple sorting,', '2', 'active', 'months 1-3', '2025-06-11 10:36:59', '2025-06-11 10:36:59'),
(42, '10', 'Follow 2-step commands', '2', 'active', 'months 1-3', '2025-06-11 10:37:18', '2025-06-11 10:37:18'),
(43, '11', 'Storytime Q&A', '2', 'active', 'months 1-3', '2025-06-11 10:37:52', '2025-06-11 10:37:52'),
(44, '11', 'Name writing (with help)', '2', 'active', 'months 1-3', '2025-06-11 10:38:18', '2025-06-11 10:38:18'),
(45, '11', 'Phonemic awareness', '2', 'active', 'months 1-3', '2025-06-11 10:38:41', '2025-06-11 10:38:41'),
(46, '12', 'Cutting lines', '2', 'active', 'months 1-3', '2025-06-11 10:39:18', '2025-06-11 10:39:18'),
(47, '12', 'Climbing', '2', 'active', 'months 1-3', '2025-06-11 10:39:42', '2025-06-11 10:39:42'),
(48, '12', 'Balancing', '2', 'active', 'months 1-3', '2025-06-11 10:40:05', '2025-06-11 10:40:05'),
(49, '13', 'Circle time participation', '2', 'active', 'months 1-3', '2025-06-11 10:40:38', '2025-06-11 10:40:38'),
(50, '13', 'Expressing likes/dislikes', '2', 'active', 'months 1-3', '2025-06-11 10:41:24', '2025-06-11 10:41:24'),
(51, '14', 'Painting with brushes', '2', 'active', 'months 1-3', '2025-06-11 10:41:51', '2025-06-11 10:41:51'),
(52, '14', 'Color mixing', '2', 'active', 'months 1-3', '2025-06-11 10:42:16', '2025-06-11 10:42:16'),
(53, '14', 'Playdough modeling', '2', 'active', 'months 1-3', '2025-06-11 10:42:46', '2025-06-11 10:42:46'),
(54, '15', 'Handwashing independently', '2', 'active', 'months 1-3', '2025-06-11 10:43:08', '2025-06-11 10:43:08'),
(55, '15', 'Packing/unpacking bag', '2', 'active', 'months 1-3', '2025-06-11 10:43:26', '2025-06-11 10:43:26'),
(56, '10', 'Categorize animals', '2', 'active', 'months 4-6', '2025-06-11 10:45:32', '2025-06-11 10:45:32'),
(57, '10', 'Weather sorting', '2', 'active', 'months 4-6', '2025-06-11 10:46:07', '2025-06-11 10:46:07'),
(58, '10', 'Basic cause-effect', '2', 'active', 'months 4-6', '2025-06-11 10:46:33', '2025-06-11 10:46:33'),
(59, '11', 'Vocabulary cards', '2', 'active', 'months 4-6', '2025-06-11 10:47:07', '2025-06-11 10:47:07'),
(60, '11', 'Describe objects/events', '2', 'active', 'months 4-6', '2025-06-11 10:47:32', '2025-06-11 10:47:32'),
(61, '11', 'Rhyming games', '2', 'active', 'months 4-6', '2025-06-11 10:47:58', '2025-06-11 10:47:58'),
(62, '12', 'Scissor snipping', '2', 'active', 'months 4-6', '2025-06-11 10:48:27', '2025-06-11 10:48:27'),
(63, '12', 'Throwing/catching', '2', 'active', 'months 4-6', '2025-06-11 10:48:59', '2025-06-11 10:48:59'),
(64, '7', 'Dot tracing', '1', 'active', 'months 4-6', '2025-06-11 10:49:27', '2025-06-11 10:49:27'),
(65, '13', 'Talk about feelings', '2', 'active', 'months 4-6', '2025-06-11 10:50:00', '2025-06-11 10:50:00'),
(66, '13', 'Basic conflict resolution', '2', 'active', 'months 4-6', '2025-06-11 10:50:44', '2025-06-11 10:50:44'),
(67, '14', 'Water tables', '2', 'active', 'months 4-6', '2025-06-11 10:54:45', '2025-06-11 10:54:45'),
(68, '14', 'Sensory bins (rice, beans)', '2', 'active', 'months 4-6', '2025-06-11 10:55:15', '2025-06-11 10:55:15'),
(69, '14', 'Emotion puppet', '2', 'active', 'months 4-6', '2025-06-11 10:55:42', '2025-06-11 10:55:42'),
(70, '15', 'Buttoning', '2', 'active', 'months 4-6', '2025-06-11 10:56:28', '2025-06-11 10:56:28'),
(71, '15', 'Zidding', '2', 'active', 'months 4-6', '2025-06-11 10:56:48', '2025-06-11 10:56:48'),
(72, '15', 'Tidying play area', '2', 'active', 'months 4-6', '2025-06-11 10:57:47', '2025-06-11 10:57:47'),
(73, '10', 'Create patterns', '2', 'active', 'months 7-9', '2025-06-11 10:58:18', '2025-06-11 10:58:18'),
(74, '10', 'Compare sizes', '2', 'active', 'months 7-9', '2025-06-11 10:58:42', '2025-06-11 10:58:42'),
(75, '10', 'Count objects (1–10)', '2', 'active', 'months 7-9', '2025-06-11 10:59:20', '2025-06-11 10:59:20'),
(76, '11', 'Retell stories', '2', 'active', 'months 7-9', '2025-06-11 10:59:50', '2025-06-11 10:59:50'),
(77, '11', 'Identify letters in own name', '2', 'active', 'months 7-9', '2025-06-11 11:00:43', '2025-06-11 11:00:43'),
(78, '11', 'Beginning sounds', '2', 'active', 'months 7-9', '2025-06-11 11:01:01', '2025-06-11 11:01:01'),
(79, '12', 'Use glue sticks precisely', '2', 'active', 'months 7-9', '2025-06-11 11:01:29', '2025-06-11 11:01:29'),
(80, '12', 'Balance beam', '2', 'active', 'months 7-9', '2025-06-11 11:02:44', '2025-06-11 11:02:44'),
(81, '12', 'Draw shapes', '2', 'active', 'months 7-9', '2025-06-11 11:03:06', '2025-06-11 11:03:06'),
(82, '13', 'Group activities,', '2', 'active', 'months 7-9', '2025-06-11 11:03:41', '2025-06-11 11:03:41'),
(83, '13', 'Pretend play with peers', '2', 'active', 'months 7-9', '2025-06-11 11:04:06', '2025-06-11 11:04:06'),
(84, '14', 'Collages', '2', 'active', 'months 7-9', '2025-06-11 11:05:02', '2025-06-11 11:05:02'),
(85, '14', 'Building with recycled materials', '2', 'active', 'months 7-9', '2025-06-11 11:05:25', '2025-06-11 11:05:25'),
(86, '14', 'Role play', '2', 'active', 'months 7-9', '2025-06-11 11:05:45', '2025-06-11 11:05:45'),
(87, '15', 'Serving food', '2', 'active', 'months 7-9', '2025-06-11 11:06:07', '2025-06-11 11:06:07'),
(88, '15', 'Cleaning up spills', '2', 'active', 'months 7-9', '2025-06-11 11:06:27', '2025-06-11 11:06:27'),
(89, '15', 'Choosing outfits', '2', 'active', 'months 7-9', '2025-06-11 11:06:45', '2025-06-11 11:06:45'),
(90, '10', 'Memory games', '2', 'active', 'months 10-12', '2025-06-11 11:07:21', '2025-06-11 11:07:21'),
(91, '10', 'Simple sequencing (first/next/last)', '2', 'active', 'months 10-12', '2025-06-11 11:07:40', '2025-06-11 11:07:40'),
(92, '10', 'Puzzles', '2', 'active', 'months 10-12', '2025-06-11 11:08:01', '2025-06-11 11:08:01'),
(93, '11', 'Identify common sight words', '2', 'active', 'months 10-12', '2025-06-11 11:08:27', '2025-06-11 11:08:27'),
(94, '11', 'Pre-writing practice', '2', 'active', 'months 10-12', '2025-06-11 11:08:48', '2025-06-11 11:08:48'),
(95, '11', 'Name tracing', '2', 'active', 'months 10-12', '2025-06-11 11:09:06', '2025-06-11 11:09:06'),
(96, '12', 'Pencil grip strengthening', '2', 'active', 'months 10-12', '2025-06-11 11:09:27', '2025-06-11 11:09:27'),
(97, '12', 'Dance/movement games', '2', 'active', 'months 10-12', '2025-06-11 11:09:43', '2025-06-11 11:09:43'),
(98, '13', 'Practice saying “please”/“thank you”', '2', 'active', 'months 10-12', '2025-06-11 11:10:19', '2025-06-11 11:10:19'),
(99, '13', 'Follow 3-step direction', '2', 'active', 'months 10-12', '2025-06-11 11:10:43', '2025-06-11 11:10:43'),
(100, '14', 'Cooking with teacher', '2', 'active', 'months 10-12', '2025-06-11 11:11:26', '2025-06-11 11:11:26'),
(101, '14', 'Dress-up', '2', 'active', 'months 10-12', '2025-06-11 11:11:51', '2025-06-11 11:11:51'),
(102, '14', 'Story-based crafts', '2', 'active', 'months 10-12', '2025-06-11 11:12:09', '2025-06-11 11:12:09'),
(103, '15', 'Set the table', '2', 'active', 'months 10-12', '2025-06-11 11:13:10', '2025-06-11 11:13:10'),
(104, '15', 'Learn basic safety rules (don’t run, stranger danger)', '2', 'active', 'months 10-12', '2025-06-11 11:13:26', '2025-06-11 12:49:35'),
(105, '2', 'basic storytelling', '1', 'active', 'months 1-3', '2025-06-11 11:15:29', '2025-06-11 11:15:29'),
(106, '2', 'Songs and rhymes', '1', 'active', 'months 1-3', '2025-06-11 11:15:43', '2025-06-11 11:15:43'),
(107, '7', 'Stacking blocks', '1', 'active', 'months 1-3', '2025-06-11 11:16:22', '2025-06-11 11:16:22'),
(108, '7', 'Tearing paper, walking', '1', 'active', 'months 1-3', '2025-06-11 11:16:44', '2025-06-11 11:16:44'),
(109, '7', 'Kicking a ball', '1', 'active', 'months 1-3', '2025-06-11 11:16:59', '2025-06-11 11:16:59'),
(110, '3', 'Parallel play', '1', 'active', 'months 1-3', '2025-06-11 11:18:02', '2025-06-11 11:18:02'),
(111, '3', 'Greeting routines', '1', 'active', 'months 1-3', '2025-06-11 11:18:27', '2025-06-11 11:18:27'),
(112, '3', 'Understanding “mine/yours”', '1', 'active', 'months 1-3', '2025-06-11 11:18:47', '2025-06-11 11:18:47'),
(113, '6', 'Water play', '1', 'active', 'months 1-3', '2025-06-11 11:19:07', '2025-06-11 11:19:07'),
(114, '6', 'Finger painting', '1', 'active', 'months 1-3', '2025-06-11 11:19:43', '2025-06-11 11:19:43'),
(115, '6', 'Music instruments', '1', 'active', 'months 1-3', '2025-06-11 11:20:01', '2025-06-11 11:20:01'),
(116, '9', 'Washing hands', '1', 'active', 'months 1-3', '2025-06-11 11:20:29', '2025-06-11 11:20:29'),
(117, '9', 'Putting toys away', '1', 'active', 'months 1-3', '2025-06-11 11:20:48', '2025-06-11 11:20:48'),
(118, '9', 'Sitting at the table', '1', 'active', 'months 1-3', '2025-06-11 11:21:12', '2025-06-11 11:21:12'),
(119, '1', 'Classifying animals (land/water)', '1', 'active', 'months 4-6', '2025-06-11 11:37:36', '2025-06-11 11:37:36'),
(120, '2', 'Picture books', '1', 'active', 'months 4-6', '2025-06-11 11:38:15', '2025-06-11 11:38:15'),
(121, '2', 'Asking “What’s this?”', '1', 'active', 'months 4-6', '2025-06-11 11:38:32', '2025-06-11 11:38:32'),
(122, '2', 'Name & repeat words', '1', 'active', 'months 4-6', '2025-06-11 11:38:48', '2025-06-11 11:38:48'),
(123, '7', 'Beading', '1', 'active', 'months 4-6', '2025-06-11 11:39:40', '2025-06-11 11:39:40'),
(124, '7', 'Jumping', '1', 'active', 'months 4-6', '2025-06-11 11:40:05', '2025-06-11 11:40:05'),
(125, '7', 'Simple obstacle course', '1', 'active', 'months 4-6', '2025-06-11 11:40:21', '2025-06-11 11:40:21'),
(126, '3', 'Sharing games', '1', 'active', 'months 4-6', '2025-06-11 11:40:40', '2025-06-11 11:40:40'),
(127, '3', 'Naming emotions with faces', '1', 'active', 'months 4-6', '2025-06-11 11:41:14', '2025-06-11 11:41:14'),
(128, '6', 'Sand play', '1', 'active', 'months 4-6', '2025-06-11 11:42:04', '2025-06-11 11:42:04'),
(129, '6', 'Playdough', '1', 'active', 'months 4-6', '2025-06-11 11:42:27', '2025-06-11 11:42:27'),
(130, '6', 'Collage using glue', '1', 'active', 'months 4-6', '2025-06-11 11:42:45', '2025-06-11 11:42:45'),
(131, '9', 'Drinking from cup', '1', 'active', 'months 4-6', '2025-06-11 11:43:23', '2025-06-11 11:43:23'),
(132, '9', 'Wiping spills', '1', 'active', 'months 4-6', '2025-06-11 11:43:43', '2025-06-11 11:43:43'),
(133, '9', 'Putting on shoes (helped)', '1', 'active', 'months 4-6', '2025-06-11 11:44:03', '2025-06-11 11:44:03'),
(134, '1', 'Memory games', '1', 'active', 'months 7-9', '2025-06-11 11:44:29', '2025-06-11 11:44:29'),
(135, '1', 'Cause-effect toys', '1', 'active', 'months 7-9', '2025-06-11 11:44:46', '2025-06-11 11:44:46'),
(136, '1', 'Pattern recognition', '1', 'active', 'months 7-9', '2025-06-11 11:45:04', '2025-06-11 11:45:04'),
(137, '2', '2-3 word phrases', '1', 'active', 'months 7-9', '2025-06-11 11:45:32', '2025-06-11 11:45:32'),
(138, '2', 'Nursery rhymes', '1', 'active', 'months 7-9', '2025-06-11 11:45:51', '2025-06-11 11:45:51'),
(139, '2', 'Identifying objects in books', '1', 'active', 'months 7-9', '2025-06-11 11:46:08', '2025-06-11 11:46:08'),
(140, '7', 'Drawing circles/lines', '1', 'active', 'months 7-9', '2025-06-11 11:46:35', '2025-06-11 11:46:35'),
(141, '7', 'Ball toss', '1', 'active', 'months 7-9', '2025-06-11 11:47:14', '2025-06-11 11:47:14'),
(142, '7', 'Lacing cards', '1', 'active', 'months 7-9', '2025-06-11 11:47:33', '2025-06-11 11:47:33'),
(143, '3', 'Playing in group', '1', 'active', 'months 7-9', '2025-06-11 11:47:57', '2025-06-11 11:47:57'),
(144, '3', 'Simple rules (wait/turn)', '1', 'active', 'months 7-9', '2025-06-11 11:48:30', '2025-06-11 11:48:30'),
(145, '6', 'Cooking (mixing)', '1', 'active', 'months 7-9', '2025-06-11 11:48:53', '2025-06-11 11:48:53'),
(146, '6', 'Nature walks', '1', 'active', 'months 7-9', '2025-06-11 11:49:32', '2025-06-11 11:49:32'),
(147, '6', 'Dancing', '1', 'active', 'months 7-9', '2025-06-11 11:49:58', '2025-06-11 11:49:58'),
(148, '9', 'Tidying up', '1', 'active', 'months 7-9', '2025-06-11 11:51:36', '2025-06-11 11:51:36'),
(149, '9', 'Brushing teeth (with help)', '1', 'active', 'months 7-9', '2025-06-11 11:51:58', '2025-06-11 11:51:58'),
(150, '9', 'Dressing with suppor', '1', 'active', 'months 7-9', '2025-06-11 11:52:15', '2025-06-11 11:52:15'),
(151, '1', 'Number recognition (1-5)', '1', 'active', 'months 10-12', '2025-06-11 11:53:26', '2025-06-11 11:53:26'),
(152, '1', 'Sequencing 3 steps', '1', 'active', 'months 10-12', '2025-06-11 11:53:51', '2025-06-11 11:53:51'),
(153, '1', 'Simple logic', '1', 'active', 'months 10-12', '2025-06-11 11:54:19', '2025-06-11 11:54:19'),
(154, '2', 'Retelling stories', '1', 'active', 'months 10-12', '2025-06-11 11:54:47', '2025-06-11 11:54:47'),
(155, '2', 'Identifying letters in name', '1', 'active', 'months 10-12', '2025-06-11 11:55:03', '2025-06-11 11:55:03'),
(156, '2', 'Letters in name', '1', 'active', 'months 10-12', '2025-06-11 11:55:16', '2025-06-11 11:55:16'),
(157, '7', 'Threading large beads', '1', 'active', 'months 10-12', '2025-06-11 11:55:52', '2025-06-11 11:55:52'),
(158, '7', 'Hopping', '1', 'active', 'months 10-12', '2025-06-11 11:56:10', '2025-06-11 11:56:10'),
(159, '7', 'Using crayons with control', '1', 'active', 'months 10-12', '2025-06-11 11:56:38', '2025-06-11 11:56:38'),
(160, '3', 'Role play (family, doctor)', '1', 'active', 'months 10-12', '2025-06-11 11:56:59', '2025-06-11 11:56:59'),
(161, '3', 'Following 2-step instructions', '1', 'active', 'months 10-12', '2025-06-11 11:57:19', '2025-06-11 11:57:19'),
(162, '6', 'Seasonal crafts', '1', 'active', 'months 10-12', '2025-06-11 11:57:47', '2025-06-11 11:57:47'),
(163, '6', 'Holiday songs', '1', 'active', 'months 10-12', '2025-06-11 11:58:06', '2025-06-11 11:58:06'),
(164, '6', 'Taste tests (safe foods)', '1', 'active', 'months 10-12', '2025-06-11 11:58:21', '2025-06-11 11:58:21'),
(165, '9', 'Toileting with support', '1', 'active', 'months 10-12', '2025-06-11 11:58:41', '2025-06-11 11:58:41'),
(166, '9', 'Clearing table', '1', 'active', 'months 10-12', '2025-06-11 11:59:01', '2025-06-11 11:59:01'),
(167, '9', 'Putting on jacket', '1', 'active', 'months 10-12', '2025-06-11 11:59:22', '2025-06-11 11:59:22'),
(168, '16', 'Compare size/length', '3', 'active', 'months 4-6', '2025-06-11 12:28:41', '2025-06-11 12:28:41'),
(169, '16', 'Use of nonstandard units (e.g. blocks to measure)', '3', 'active', 'months 4-6', '2025-06-11 12:29:02', '2025-06-11 12:29:02'),
(170, '16', 'Sequencing 3–4 items', '3', 'active', 'months 4-6', '2025-06-11 12:29:19', '2025-06-11 12:29:19'),
(171, '17', 'Follow multi-step directions', '3', 'active', 'months 4-6', '2025-06-11 12:29:48', '2025-06-11 12:29:48'),
(172, '17', 'Story dictation', '3', 'active', 'months 4-6', '2025-06-11 12:30:06', '2025-06-11 12:30:06'),
(173, '18', 'Cutting along curves', '3', 'active', 'months 4-6', '2025-06-11 12:30:23', '2025-06-11 12:30:23'),
(174, '18', 'Climbing activities', '3', 'active', 'months 4-6', '2025-06-11 12:30:45', '2025-06-11 12:30:45'),
(175, '18', 'Tracing letters', '3', 'active', 'months 4-6', '2025-06-11 12:31:02', '2025-06-11 12:31:02'),
(176, '19', 'Describing feelings', '3', 'active', 'months 4-6', '2025-06-11 12:31:30', '2025-06-11 12:31:30'),
(177, '19', 'Engaging in role-play scenarios', '3', 'active', 'months 4-6', '2025-06-11 12:31:43', '2025-06-11 12:31:43'),
(178, '20', 'Leaf rubbings', '3', 'active', 'months 4-6', '2025-06-11 12:32:05', '2025-06-11 12:32:05'),
(179, '20', 'Community helper costumes', '3', 'active', 'months 4-6', '2025-06-11 12:32:23', '2025-06-11 12:32:23'),
(180, '21', 'Packing bag independently', '3', 'active', 'months 4-6', '2025-06-11 12:32:55', '2025-06-11 12:32:55'),
(181, '21', 'Learning phone number/address basics (optional)', '3', 'active', 'months 4-6', '2025-06-11 12:33:16', '2025-06-11 12:33:16'),
(182, '16', 'Count to 20', '3', 'active', 'months 7-9', '2025-06-11 12:33:40', '2025-06-11 12:33:40'),
(183, '16', 'Recognize numbers to 10', '3', 'active', 'months 7-9', '2025-06-11 12:33:58', '2025-06-11 12:33:58'),
(184, '16', 'Identify patterns (ABAB, AABB)', '3', 'active', 'months 7-9', '2025-06-11 12:34:21', '2025-06-11 12:34:21'),
(185, '16', 'sort by 2+ attributes', '3', 'active', 'months 7-9', '2025-06-11 12:34:33', '2025-06-11 12:34:33'),
(186, '17', 'Sight word introduction', '3', 'active', 'months 7-9', '2025-06-11 12:35:00', '2025-06-11 12:35:00'),
(187, '17', 'Beginning journal drawing/dictation', '3', 'active', 'months 7-9', '2025-06-11 12:35:37', '2025-06-11 12:35:37'),
(188, '17', 'Identify more uppercase/lowercase', '3', 'active', 'months 7-9', '2025-06-11 12:35:55', '2025-06-11 12:35:55'),
(189, '18', 'Lacing', '3', 'active', 'months 7-9', '2025-06-11 12:36:14', '2025-06-11 12:36:14'),
(190, '18', 'Connect-the-dots', '3', 'active', 'months 7-9', '2025-06-11 12:36:32', '2025-06-11 12:36:32'),
(191, '18', 'Beginning to copy simple word', '3', 'active', 'months 7-9', '2025-06-11 12:36:46', '2025-06-11 12:36:46'),
(192, '19', 'Problem-solving with peers', '3', 'active', 'months 7-9', '2025-06-11 12:37:05', '2025-06-11 12:37:05'),
(193, '19', 'Respecting classroom rule', '3', 'active', 'months 7-9', '2025-06-11 12:37:18', '2025-06-11 12:37:18'),
(194, '20', 'Make traffic signs,', '3', 'active', 'months 7-9', '2025-06-11 12:37:53', '2025-06-11 12:37:53'),
(195, '20', 'Shape stamping', '3', 'active', 'months 7-9', '2025-06-11 12:38:12', '2025-06-11 12:38:12'),
(196, '20', 'Build vehicles with recycled materials', '3', 'active', 'months 7-9', '2025-06-11 12:38:29', '2025-06-11 12:38:29'),
(197, '27', 'Making simple snacks (e.g., sandwich)', '3', 'active', 'months 7-9', '2025-06-11 12:39:03', '2025-06-11 12:39:03'),
(198, '27', 'Using scissors correctly', '3', 'active', 'months 7-9', '2025-06-11 12:39:26', '2025-06-11 12:39:26'),
(199, '27', 'Crossing street safely', '3', 'active', 'months 7-9', '2025-06-11 12:39:44', '2025-06-11 12:39:44'),
(200, '16', 'Understand days of week', '3', 'active', 'months 10-12', '2025-06-11 12:40:40', '2025-06-11 12:40:40'),
(201, '16', 'Calendar use', '3', 'active', 'months 10-12', '2025-06-11 12:41:03', '2025-06-11 12:41:03'),
(202, '16', 'Basic time concepts (morning/night)', '3', 'active', 'months 10-12', '2025-06-11 12:41:32', '2025-06-11 12:41:32'),
(203, '16', 'Categorize holidays', '3', 'active', 'months 10-12', '2025-06-11 12:41:50', '2025-06-11 12:41:50'),
(204, '17', 'Inventive spelling', '3', 'active', 'months 10-12', '2025-06-11 12:42:22', '2025-06-11 12:42:22'),
(205, '17', 'Reading beginner books with support', '3', 'active', 'months 10-12', '2025-06-11 12:42:47', '2025-06-11 12:42:47'),
(206, '17', 'Matching sounds to letters', '3', 'active', 'months 10-12', '2025-06-11 12:43:03', '2025-06-11 12:43:03'),
(207, '18', 'Print first name legibly', '3', 'active', 'months 10-12', '2025-06-11 12:43:52', '2025-06-11 12:43:52'),
(208, '18', 'Complete mazes', '3', 'active', 'months 10-12', '2025-06-11 12:44:13', '2025-06-11 12:44:13'),
(209, '18', 'Improve posture & gri', '3', 'active', 'months 10-12', '2025-06-11 12:44:31', '2025-06-11 12:44:31'),
(210, '19', 'Increased leadership (line leader, helper roles)', '3', 'active', 'months 10-12', '2025-06-11 12:44:56', '2025-06-11 12:44:56'),
(211, '19', 'Express pride in work', '3', 'active', 'months 10-12', '2025-06-11 12:45:11', '2025-06-11 12:45:11'),
(212, '20', 'Create holiday crafts from different cultures', '3', 'active', 'months 10-12', '2025-06-11 12:47:04', '2025-06-11 12:47:04'),
(213, '20', 'Explore weather through experiments', '3', 'active', 'months 10-12', '2025-06-11 12:47:20', '2025-06-11 12:47:20'),
(214, '27', 'Plan a class celebration', '3', 'active', 'months 10-12', '2025-06-11 12:47:52', '2025-06-11 12:47:52'),
(215, '27', 'Take responsibility for classroom job', '3', 'active', 'months 10-12', '2025-06-11 12:48:11', '2025-06-11 12:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seos`
--

CREATE TABLE `tbl_seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_seos`
--

INSERT INTO `tbl_seos` (`id`, `url`, `title`, `description`, `keyword`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://www.9to9school.com/', 'Best Preschools in India | 9to9 School', 'Discover the best preschool in India offering affordable daycare services, full-day preschool programs, and flexible timing. Join 9to9 School for top early childhood education, Montessori preschool franchises, and excellent preschool curriculum near you.', 'Best preschool in India,\r\nTop play schools near me,\r\nAffordable daycare services,\r\nEarly childhood education programs,\r\nFull-day preschool programs,', NULL, 1, '2025-07-04 17:04:50', '2025-07-04 17:04:50'),
(2, 'http://127.0.0.1:8000/franchise', 'Best Preschool Franchise in India | Low Investment Daycare & Preschool Opportunities 1', 'Start the best preschool franchise in India with 9to9 School. Low investment, high ROI, and daycare franchise model. Discover the best preschool franchise in India with 9to9 School. Benefit from low investment daycare and preschool franchise models under ₹10 lakhs. Unlock top preschool business opportunities and join a trusted education franchise network.', 'best preschool franchise in India, preschool franchise in India, preschool business opportunity, low investment preschool franchise, daycare franchise model, education franchise under 10 lakhs, preschool franchise opportunities in India, daycare franchise business model, top preschool franchises', NULL, 1, '2025-07-04 17:17:15', '2025-07-11 05:53:44'),
(3, 'https://9to9school.com/pre-school', 'Best Preschool Curriculum in India | Play-Based Early Learning for Kids', 'Enroll your child in the best preschool program with a play-based curriculum designed for 2 to 5-year-olds. 9to9 School offers creative early learning programs that foster imagination, social skills, and cognitive development.', 'best preschool curriculum, play-based preschool education, early learning programs, preschool for toddlers, preschool for 2 to 5 year olds, creative learning for kids, early childhood education, top preschool programs in India, toddler education programs', NULL, 1, '2025-07-04 17:18:17', '2025-07-04 17:18:17'),
(4, 'https://www.9to9school.com/events', 'Preschool Events & Activities 2025 | Fun Educational Programs for Kids', 'Explore 9to9 School’s preschool events and activities for 2025. From interactive kids\' programs to educational school events, our calendar is filled with fun learning experiences for toddlers and young learners.', 'preschool events 2025, school events for kids, educational events for preschoolers, interactive kids activities, preschool activities calendar, preschool learning events, fun school events, preschool event ideas, events for toddlers, kids activity programs', NULL, 1, '2025-07-04 17:19:31', '2025-07-04 17:19:31'),
(5, 'https://www.9to9school.com/teachers', 'Best Preschool Teachers in India | Experienced & Certified Early Education Staff', 'Meet our certified and experienced preschool teachers at 9to9 School. Learn about our dedicated daycare staff, excellent teacher-child ratios, and faculty profiles focused on delivering the best early childhood education.', 'experienced preschool teachers, certified daycare staff, preschool faculty profiles, best teachers for early education, teacher-child ratio preschool, early childhood educators India, qualified preschool staff, top daycare teachers, preschool teacher team, early education professionals', NULL, 1, '2025-07-04 17:20:32', '2025-07-04 17:20:32'),
(6, 'https://www.9to9school.com/quiz', 'Preschool Readiness Quiz | Early Childhood & Parenting Assessment', 'Is your child ready for preschool? Take our interactive quiz to evaluate your child’s early learning readiness, behavior, and development. Understand parenting styles and get expert insights with our easy and fun assessments.', 'preschool readiness quiz, is your child preschool ready, early childhood development quiz, parenting style quiz, toddler readiness test, preschooler behavior quiz, early learning quiz, child development quiz, quiz for parents of toddlers', NULL, 1, '2025-07-04 17:21:42', '2025-07-04 17:21:42'),
(7, 'https://www.9to9school.com/about-us', 'About 9to9 School | Best Early Learning Center & Preschool Education Values', 'Learn about 9to9 School’s journey and mission to provide the best preschool education. Discover our core values, commitment to early childhood development, and why we are a trusted early learning center in India.', 'about 9to9 School, preschool journey, mission of 9to9 School, preschool education values, best early learning center, early childhood education India, trusted preschool brand, preschool education mission, top preschool center India', NULL, 1, '2025-07-04 17:22:31', '2025-07-04 17:22:31'),
(8, 'https://www.9to9school.com/life-skills', 'Life Skills for Preschoolers | Social & Emotional Development at 9to9 School', 'Explore life skills programs at 9to9 School designed to build social skills, emotional development, and practical life habits in preschoolers. Foster personality growth and independence in toddlers through fun, engaging activities.', 'life skills for preschoolers, social skills for kids, emotional development in toddlers, practical life activities for kids, preschool personality development, early childhood development, life skills education, soft skills for preschoolers, toddler growth programs, personal development for kids', NULL, 1, '2025-07-04 17:24:32', '2025-07-04 17:24:32'),
(9, 'https://9to9school.com/day-care', 'Best Daycare in India | Full‑Day, Safe & Affordable Childcare', 'Discover the best daycare in India at 9to9 School, offering safe, affordable full-day child care for toddlers. Trusted by working parents for quality daycare services.', 'best daycare in India, full-day child care center, safe daycare for toddlers, affordable daycare services, working parents daycare, child care India, toddler daycare, quality daycare', NULL, 1, '2025-07-04 17:33:31', '2025-07-04 17:33:31'),
(10, 'https://www.9to9school.com/contact-us', 'Contact 9to9 School | Preschool & Daycare Admission Help', 'Get in touch with 9to9 School for preschool and daycare inquiries. Contact our admission team for preschool contact details, franchise opportunities, and child care information.', 'contact 9to9 school, preschool contact details, talk to admission team, preschool near me, preschool contact number, daycare school phone number, nursery school contact details, play school near me with contact, 9to9 school contact number, how to contact 9to9 preschool, preschool admission helpline, contact form for preschool admission, child care school contact info, education franchise contact India, preschool franchise inquiry, best preschool franchise in India contact', NULL, 1, '2025-07-04 17:49:39', '2025-07-04 17:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` varchar(250) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `primary_contact_number1` varchar(255) DEFAULT NULL,
  `primary_contact_number2` varchar(255) DEFAULT NULL,
  `date_of_joining` varchar(250) DEFAULT NULL,
  `dob` varchar(250) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `language_known` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `previous_school1` varchar(255) DEFAULT NULL,
  `previous_school2` varchar(255) DEFAULT NULL,
  `previous_school_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `epf_no` varchar(255) DEFAULT NULL,
  `basic_salary` varchar(255) DEFAULT NULL,
  `contract_type` varchar(255) DEFAULT NULL,
  `work_shift` varchar(255) DEFAULT NULL,
  `date_leaving` varchar(250) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `letter` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `skills` varchar(250) DEFAULT NULL,
  `medical_leaves` varchar(250) DEFAULT NULL,
  `casual_leaves` varchar(250) DEFAULT NULL,
  `maternity_leaves` varchar(250) DEFAULT NULL,
  `sick_leaves` varchar(250) DEFAULT NULL,
  `is_coordinator` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `teacher_id`, `school_id`, `image`, `first_name`, `last_name`, `class`, `subject`, `gender`, `primary_contact_number1`, `primary_contact_number2`, `date_of_joining`, `dob`, `marital_status`, `email`, `language_known`, `qualification`, `work_experience`, `previous_school1`, `previous_school2`, `previous_school_number`, `address`, `permanent_address`, `id_number`, `city`, `state`, `zip`, `notes`, `epf_no`, `basic_salary`, `contract_type`, `work_shift`, `date_leaving`, `account_name`, `account_number`, `bank_name`, `ifsc_code`, `branch_name`, `resume`, `letter`, `password`, `status`, `skills`, `medical_leaves`, `casual_leaves`, `maternity_leaves`, `sick_leaves`, `is_coordinator`, `created_at`, `updated_at`) VALUES
(1, 32, '12345678', 7, 'assets/images/user/teacher/1750347207_WhatsApp Image 2025-06-19 at 12.19.59 PM.jpeg', 'test', 'twst', 'Select', '[\"3\",\"4\"]', 'Male', '9894561235', '7894561235', '01-07-2025', '27-06-2025', 'married', 'testwww2@mailinator.com', 'ffdfSasa', 'MBA', '2Year', 'test', NULL, '1234567878', 'us', 'gfgfgf', '34343', 'us', 'Kansas', '451666', 'ddssds', '5554545', '20000', 'permanent', '[\"1\",\"2\"]', '09-08-2025', '3445454545', 'rtrrrtrtrt', 'fffdf', 'ereere', 'ewrerer', 'assets/docs/teacher/resume/1750347207_resume_Email content (1).pdf', 'assets/docs/teacher/letter/1750347207_letter_Email content (1).pdf', NULL, 'active', NULL, '44', '44', '44', '44', 'no', '2025-06-19 10:03:27', '2025-07-31 00:49:49'),
(2, 33, 'test', 7, 'uploads/teacher_images/685d41a5e0802.jpg', 'Mayank Katare', 'Mayank Katare', 'Select', '[\"1\",\"4\"]', 'Male', '8521479635', '8521479635', '30-06-2025', '10-05-1996', '--Select--', 'mayank@example.com', 'hindi', 'wqwq', '3 years', 'ffdf', NULL, NULL, 'Bhopal, India', 'indore', '34343', 'ghghg', 'ghgh', '65656', 'ewewew', NULL, NULL, 'Select', '[\"2\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-24 01:43:31', '2025-07-16 06:49:27'),
(3, 55, 'T150725003', 6, 'assets/images/user/teacher/1752597553_WhatsApp Image 2025-06-24 at 6.26.28 PM.jpeg', 'rtrt', 'rtrt', NULL, '[\"4\"]', 'Female', '99345678969', '7894561235', '31-07-2025', '29-07-2025', NULL, 'admindddd@example.com', 'hindi', 'wqwq', '6', 'ffdf', NULL, NULL, 'ghghg', 'indore', '34343', 'ghghg', 'ghgh', '65656', 'sdsdsd', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-15 11:09:13', '2025-07-15 11:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_applications`
--

CREATE TABLE `teacher_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pin_code` varchar(250) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_applications`
--

INSERT INTO `teacher_applications` (`id`, `fullname`, `email`, `phone_number`, `state`, `city`, `pin_code`, `resume`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admixn@example.com', NULL, 'ghgh', 'ghghg', NULL, 'assets/pdfs/teacher/resume_684c3df47df4f.pdf', '2025-06-13 09:34:20', '2025-06-13 09:34:20'),
(2, NULL, 'admixn@example.com', NULL, 'ghgh', 'ghghg', NULL, 'assets/pdfs/teacher/resume_684c3eba81f11.pdf', '2025-06-13 09:37:38', '2025-06-13 09:37:38'),
(3, NULL, 'admixn@example.com', NULL, 'ghgh', 'ghghg', NULL, 'assets/pdfs/teacher/resume_684c3fef775ed.pdf', '2025-06-13 09:42:47', '2025-06-13 09:42:47'),
(4, NULL, 'admixn@example.com', NULL, 'ghgh', 'ghghg', NULL, 'assets/pdfs/teacher/resume_684c40b8c3243.pdf', '2025-06-13 09:46:08', '2025-06-13 09:46:08'),
(5, NULL, 'admixn@example.com', NULL, 'ghgh', 'ghghg', NULL, 'assets/pdfs/teacher/resume_684c4114b4d32.pdf', '2025-06-13 09:47:40', '2025-06-13 09:47:40'),
(6, 'test twst', 'test2@mailinator.com', '07894561235', 'Kansas', 'us', NULL, 'assets/pdfs/teacher/resume_684d4aa9d71e8.pdf', '2025-06-14 04:40:49', '2025-06-14 04:40:49'),
(7, 'test twst', 'test2@mailinator.com', '07894561235', 'Kansas', 'us', NULL, 'assets/pdfs/teacher/resume_684d4abd98013.pdf', '2025-06-14 04:41:09', '2025-06-14 04:41:09'),
(8, 'test twst', 'test2@mailinator.com', '07894561235', 'Kansas', 'us', NULL, 'assets/pdfs/teacher/resume_684d4addd3560.pdf', '2025-06-14 04:41:41', '2025-06-14 04:41:41'),
(9, 'test', 'test2@mailinator.com', '07894561235', 'Kansas', 'us', NULL, 'assets/pdfs/teacher/resume_684d4af0eeda6.pdf', '2025-06-14 04:42:00', '2025-06-14 04:42:00'),
(10, 'test twst', 'test2@mailinator.com', '07894561235', 'Kansas', 'us', NULL, 'assets/pdfs/teacher/resume_684d4b30ac8ba.pdf', '2025-06-14 04:43:04', '2025-06-14 04:43:04'),
(11, 'test twst', 'test2@mailinator.com', '07894561235', 'Kansas', 'us', NULL, 'assets/pdfs/teacher/resume_684d4be91039e.pdf', '2025-06-14 04:46:09', '2025-06-14 04:46:09'),
(12, 'test', 'votivephp.harshita@gmail.com', '1234567890', 'fdsfdf', 'dfdf', NULL, 'assets/pdfs/teacher/resume_6852ca3abc0cc.pdf', '2025-06-18 08:46:26', '2025-06-18 08:46:26'),
(13, 'test', 'votivephp.harshita@gmail.com', '1234567890', 'fdsfdf', 'dfdf', NULL, 'assets/pdfs/teacher/resume_6852ca531dd0d.pdf', '2025-06-18 08:46:51', '2025-06-18 08:46:51'),
(14, 'Riya Sharma', 'riya.sharma@example.com', '9876543210', 'Uttar Pradesh', 'Lucknow', NULL, 'assets/pdfs/teacher/resume_6874e581cadac.pdf', '2025-07-14 05:39:53', '2025-07-14 05:39:53'),
(15, 'Riya Sharma', 'riya.sharma@example.com', '9876543210', 'Uttar Pradesh', 'Lucknow', NULL, 'assets/pdfs/teacher/resume_6875f10b8e0d2.pdf', '2025-07-15 00:41:23', '2025-07-15 00:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_enquiry`
--

CREATE TABLE `teacher_enquiry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `highest_qualification` varchar(255) NOT NULL,
  `teaching_experience` varchar(255) DEFAULT NULL,
  `previous_institution` varchar(255) DEFAULT NULL,
  `subjects` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`subjects`)),
  `preferred_location` varchar(255) NOT NULL,
  `current_salary` varchar(50) DEFAULT NULL,
  `expected_salary` varchar(50) DEFAULT NULL,
  `available_from` varchar(100) DEFAULT NULL,
  `why_join` text DEFAULT NULL,
  `resume_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_enquiry`
--

INSERT INTO `teacher_enquiry` (`id`, `full_name`, `email`, `phone`, `age`, `highest_qualification`, `teaching_experience`, `previous_institution`, `subjects`, `preferred_location`, `current_salary`, `expected_salary`, `available_from`, `why_join`, `resume_link`, `created_at`, `updated_at`) VALUES
(1, 'mayank katare', 'mayanka@example.com', '9876543210', 28, 'BE', '1 years', 'Delhi public School', '[\"Physics\",\"Mathematics\"]', 'Bhopal', '35000', '45000', 'Immediately', 'I want to new School.', 'http://127.0.0.1:8000/api/kit-order', '2025-06-11 02:18:22', '2025-06-11 02:18:22'),
(2, 'mayank katare', 'mayanka@example.com', '9876543210', 28, 'BE', '1 years', 'Delhi public School', '[\"Physics\",\"Mathematics\"]', 'Bhopal', '35000', '45000', 'Immediately', 'I want to new School.', 'https://9to9school.com/git-main/api/teacher-enquiry', '2025-06-25 17:12:47', '2025-06-25 17:12:47'),
(3, 'mayank katare', 'mayanka@example.com', '9876543210', 28, 'BE', '1 years', 'Delhi public School', '[\"Physics\",\"Mathematics\"]', 'Bhopal', '35000', '45000', 'Immediately', 'I want to new School.', 'https://9to9school.com/git-main/api/teacher-enquiry', '2025-06-25 17:13:37', '2025-06-25 17:13:37'),
(4, 'mayank katare', 'mayanka@example.com', '9876543210', 28, 'BE', '1 years', 'Delhi public School', '[\"Physics\",\"Mathematics\"]', 'Bhopal', '35000', '45000', 'Immediately', 'I want to new School.', 'https://9to9school.com/git-main/api/teacher-enquiry', '2025-06-25 17:29:33', '2025-06-25 17:29:33'),
(5, 'mayank katare', 'mayanka@example.com', '9876543210', 28, 'BE', '1 years', 'Delhi public School', '[\"Physics\",\"Mathematics\"]', 'Bhopal', '35000', '45000', 'Immediately', 'I want to new School.', 'https://9to9school.com/git-main/api/teacher-enquiry', '2025-06-25 17:57:09', '2025-06-25 17:57:09'),
(6, 'mayank katare', 'mayanka@example.com', '9876543210', 28, 'BE', '1 years', 'Delhi public School', '[\"Physics\",\"Mathematics\"]', 'Bhopal', '35000', '45000', 'Immediately', 'I want to new School.', 'https://9to9school.com/git-main/api/teacher-enquiry', '2025-06-25 18:38:01', '2025-06-25 18:38:01'),
(7, 'mayank katare', 'mayanka@example.com', '9876543210', 28, 'BE', '1 years', 'Delhi public School', '[\"Physics\",\"Mathematics\"]', 'Bhopal', '35000', '45000', 'Immediately', 'I want to new School.', 'https://9to9school.com/git-main/api/teacher-enquiry', '2025-06-25 18:51:13', '2025-06-25 18:51:13'),
(8, 'bcequw', 'exmple@gmnail.com', '999999999', 33, 'BE', '33', '33', '[\"Hindi\"]', 'Hyderabad', '33', '33', '33', '333', 'https://example.com/fake-resume.pdf', '2025-06-25 18:55:28', '2025-06-25 18:55:28'),
(9, 'hetain', 'Example@gmail.com', '9310009651', 33, 'BE', '33', '333', '[\"English\"]', 'Mumbai', '33', '33', '33', '333', 'https://example.com/fake-resume.pdf', '2025-06-25 18:56:25', '2025-06-25 18:56:25'),
(10, 'Mayank Katare', 'mayanka@example.com', '9876543210', 28, 'BE', '1 year', 'Delhi Public School', '[\"Physics\",\"Mathematics\"]', 'Bhopal', '35000', '45000', 'Immediately', 'I want to join a new school for better opportunities.', 'https://9to9school.com/resumes/mayank-katare.pdf', '2025-06-26 03:31:45', '2025-06-26 03:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_galleries`
--

CREATE TABLE `teacher_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('image','video') DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_galleries`
--

INSERT INTO `teacher_galleries` (`id`, `teacher_id`, `name`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1752559217_Big_Buck_Bunny_360_10s_1MB.mp4', 'video', 'active', '2025-07-15 00:30:17', '2025-07-15 00:30:17'),
(2, 1, 'assets/images/teachers/gallery/images1752841346_WhatsApp Image 2025-06-24 at 6.26.28 PM.jpeg', 'image', 'active', '2025-07-18 06:52:26', '2025-07-18 06:52:26'),
(3, 3, 'assets/images/teachers/gallery/images1753367753_man.jpg', 'image', 'active', '2025-07-24 09:05:53', '2025-07-24 09:05:53'),
(4, 3, 'assets/images/teachers/gallery/images1753368428_man.jpg', 'image', 'active', '2025-07-24 09:17:08', '2025-07-24 09:17:08'),
(5, 3, 'assets/images/teacher/gallery/images1753368472_women.jpg', 'image', 'active', '2025-07-24 09:17:52', '2025-07-24 09:17:52'),
(6, 3, 'assets/images/teacher/gallery/images/1753368611_women.jpg', 'image', 'active', '2025-07-24 09:20:11', '2025-07-24 09:20:11'),
(7, 3, 'assets/images/teacher/gallery/images/1753368679_images1.png', 'image', 'active', '2025-07-24 09:21:19', '2025-07-24 09:21:19'),
(8, 3, 'assets/images/teacher/gallery/images/1753368835_images1.png', 'image', 'active', '2025-07-24 09:23:55', '2025-07-24 09:23:55'),
(9, 3, 'assets/images/teacher/gallery/images/68824a5e6d849.png', 'image', 'active', '2025-07-24 09:29:42', '2025-07-24 09:29:42'),
(10, 3, 'assets/images/teacher/gallery/images/68824c0b5b0b0.jpg', 'image', 'active', '2025-07-24 09:36:51', '2025-07-24 09:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_pages`
--

CREATE TABLE `teacher_pages` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_heading` varchar(255) NOT NULL,
  `banner_para` varchar(255) NOT NULL,
  `btn_name` varchar(255) NOT NULL,
  `btn_link` varchar(255) DEFAULT NULL,
  `why_apply_heading` varchar(255) DEFAULT NULL,
  `why_apply_para` varchar(255) DEFAULT NULL,
  `journey_heading` varchar(255) DEFAULT NULL,
  `journey_para` varchar(255) DEFAULT NULL,
  `journey_image` varchar(255) NOT NULL,
  `position_heading` varchar(255) DEFAULT NULL,
  `position_para` varchar(255) DEFAULT NULL,
  `faq_heading` varchar(255) DEFAULT NULL,
  `faq_para` varchar(255) DEFAULT NULL,
  `works_heading` varchar(255) NOT NULL,
  `works_para` varchar(255) NOT NULL,
  `works_subheading1` varchar(255) NOT NULL,
  `works_para1` varchar(255) NOT NULL,
  `works_subheading2` varchar(255) NOT NULL,
  `works_para2` varchar(255) NOT NULL,
  `works_subheading3` varchar(255) NOT NULL,
  `works_para3` varchar(255) NOT NULL,
  `apply_heading` varchar(255) NOT NULL,
  `apply_para` varchar(255) NOT NULL,
  `apply_image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_pages`
--

INSERT INTO `teacher_pages` (`id`, `banner_image`, `banner_heading`, `banner_para`, `btn_name`, `btn_link`, `why_apply_heading`, `why_apply_para`, `journey_heading`, `journey_para`, `journey_image`, `position_heading`, `position_para`, `faq_heading`, `faq_para`, `works_heading`, `works_para`, `works_subheading1`, `works_para1`, `works_subheading2`, `works_para2`, `works_subheading3`, `works_para3`, `apply_heading`, `apply_para`, `apply_image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/teacher/banner/682623199900a.webp', 'Join Our 9 To 9 School', 'Join a school where passionate teachers thrive earning with purpose, inspiring young minds, and growing in a supportive, rewarding environment every day.', 'Apply Now', NULL, 'Why Apply Here?', 'We offer a supportive environment where educators thrive professionally and personally', 'Ready To Begin Your Journey?', 'Our application process typically takes 1–2 weeks from submission to final decision.', 'assets/images/teacher/journey/6835bf2b4d68f.webp', 'Open Positions', 'Explore our current teaching opportunities and find the perfect role for your skills and interests.', 'Frequently Asked Questions', 'Find answers to common questions about teaching opportunities at 9 to 9 school', 'How It Works', 'Our streamlined application process makes it easy to join our teaching team in just a few steps.', 'Apply Online', 'Submit your application with your details, experience, and preferred teaching subjects.', 'Interview Process', 'Get shortlisted and attend our comprehensive interview and teaching demonstration.', 'Start Teaching', 'Join our team, receive onboarding support, and begin inspiring students.', 'Apply Now', 'Take the first step towards a rewarding teaching career at TeachVille. Fill out the application form, and our team will contact you to discuss the next steps.', 'assets/images/teacher/apply/6835bf2b56724.webp', '<h3><strong>What Happens Next?</strong></h3>\r\n\r\n<ul>\r\n	<li>We&rsquo;ll review your application within 3&ndash;5 business days.</li>\r\n	<li>Shortlisted candidates will be invited for an interview and teaching demonstration.</li>\r\n	<li>Successful candidates will receive an offer letter within a week after the interview.</li>\r\n</ul>', 1, '2025-05-27 13:33:31', '2025-05-27 13:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_wallets`
--

CREATE TABLE `teacher_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `teacher_coins` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `ledger_status` enum('credit','debit') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_wallets`
--

INSERT INTO `teacher_wallets` (`id`, `teacher_id`, `school_id`, `shift`, `teacher_coins`, `payment_date`, `ledger_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '1', 434.78, '2025-07-01', 'credit', 'active', '2025-07-15 04:23:50', '2025-07-15 04:23:50'),
(2, 1, 7, '1', 434.78, '2025-07-01', 'credit', 'active', '2025-07-15 04:24:45', '2025-07-15 04:24:45'),
(3, 1, 7, '2', 434.78, '2025-07-01', 'credit', 'active', '2025-07-15 04:24:45', '2025-07-15 04:24:45'),
(4, 1, 7, '1', 434.78, '2025-07-01', 'credit', 'active', '2025-07-16 01:58:57', '2025-07-16 01:58:57'),
(5, 1, 7, '2', 434.78, '2025-07-01', 'credit', 'active', '2025-07-16 01:58:57', '2025-07-16 01:58:57'),
(6, 1, 7, '1', 434.78, '2025-07-30', 'credit', 'active', '2025-07-30 01:27:28', '2025-07-30 01:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_why_apply_heres`
--

CREATE TABLE `teacher_why_apply_heres` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `type` enum('teacher','franchise') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='''teacher'',''franchise''';

--
-- Dumping data for table `teacher_why_apply_heres`
--

INSERT INTO `teacher_why_apply_heres` (`id`, `image`, `title`, `description`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/teacher_why_apply_here/681314829dd7d.webp', 'Flexible Working Hours', 'Choose a schedule that suits your life.', 1, 'teacher', '2025-05-01 06:28:18', '2025-05-01 06:28:18'),
(2, 'assets/images/teacher_why_apply_here/68119eec643bc.webp', 'Extended School Hours', 'Longer hours support working family schedules. More time means deeper daily learning.', 1, 'franchise', '2025-04-30 03:54:20', '2025-04-30 03:54:20'),
(3, 'assets/images/teacher_why_apply_here/68119f02693fe.webp', 'Pay-per-attendance Model', 'Only pay when your child attends. Flexible, fair, and budget-friendly option.', 1, 'franchise', '2025-04-30 03:54:42', '2025-04-30 03:54:42'),
(4, 'assets/images/teacher_why_apply_here/68119f1895c88.webp', 'Flexible Learning Modules', 'Lessons adapt to each child\'s pace. Engaging content keeps learning exciting daily.', 1, 'franchise', '2025-04-30 03:55:04', '2025-04-30 03:55:04'),
(5, 'assets/images/teacher_why_apply_here/681314c05dc70.webp', 'Growth & Learning', 'Gain support to grow and learn continuously.', 1, 'teacher', '2025-05-01 06:29:20', '2025-05-01 06:29:20'),
(6, 'assets/images/teacher_why_apply_here/681314dfcdc24.webp', 'Work-Life Balance', 'Balance your career well-being daily', 1, 'teacher', '2025-05-01 06:29:51', '2025-05-01 06:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Rahul S.', 'Great experience! The option to choose a teacher that suits my child has made a big difference. The app keeps me updated on her progress too', 'assets/images/Testimonial/681cadd1a45d6.webp', 1, '2025-05-08 13:12:49', '2025-05-08 13:12:49'),
(3, 'Neha K.', 'Perfect for working parents! The flexible slots fit my schedule, and I’m never stressed about missing a day. My child is thriving here!', 'assets/images/Testimonial/681cadfd369f0.webp', 1, '2025-05-08 13:13:33', '2025-05-08 13:13:33'),
(4, 'Anil R.', 'I appreciate how they track progress and share updates. It’s great seeing my child learn and grow. Very happy with the school!', 'assets/images/Testimonial/681cae4432566.webp', 1, '2025-05-08 13:14:44', '2025-05-08 13:14:44'),
(5, 'Vikram D', 'The progress updates are so helpful, and I love that I can choose the teacher based on my child’s needs. Truly a great experience!', 'assets/images/Testimonial/681cae6a35897.webp', 1, '2025-05-08 13:15:22', '2025-05-08 13:15:22'),
(6, 'Asha G.', 'was nervous about finding a preschool that worked with my schedule, but this school has been amazing. The flexibility is a game-changer, and my daughter is really enjoying it!\"', 'assets/images/Testimonial/681cae9d4d3f9.webp', 1, '2025-05-08 13:16:13', '2025-05-08 13:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `time_shifts`
--

CREATE TABLE `time_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_from` varchar(250) DEFAULT NULL,
  `time_to` varchar(250) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_shifts`
--

INSERT INTO `time_shifts` (`id`, `time_from`, `time_to`, `status`, `created_at`, `updated_at`) VALUES
(1, '11:56 AM', '02:58 AM', 'active', '2025-07-14 12:55:48', '2025-07-15 03:10:37'),
(2, '10:56 AM', '10:56 AM', 'active', '2025-07-14 23:57:50', '2025-07-14 23:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `source`, `login_id`, `created_at`, `updated_at`) VALUES
(2, '6|qE7x4JgDnix0Zm8I0swLUwBvSAndt0UgXyBorNYDd8e2122a', 'teacher', 33, '2025-06-26 06:09:08', '2025-06-26 06:09:08'),
(3, '7|r1LT9mEphRqaCnSokrZBfW5nSGf1NZELV0xSdQT8fcdc13b1', 'teacher', 3, '2025-06-28 02:24:23', '2025-06-28 02:24:23'),
(4, '8|gm0YojtjbQs02M8wUiFO4DEYQfRz66eKUIP0sAYxbfe13921', 'teacher', 12, '2025-06-28 02:25:04', '2025-06-28 02:25:04'),
(5, '9|7zUoGAF3mdOr3G8SeV7WzKgl6Af86cC3dXZoguNP639b364d', 'teacher', 32, '2025-06-28 07:14:04', '2025-06-28 07:14:04'),
(6, '10|Uh9dGyvgKxpJsQuZCAfnE82AodvIvX0GpluVUkUs172879d9', 'teacher', 32, '2025-06-28 07:15:37', '2025-06-28 07:15:37'),
(7, '6C6xpy0LMGVpTXjQmqmNaNsqFxNFQSQrRjnp75BPQmlA62gugmTsTNdcgZht', 'otp', NULL, '2025-07-16 12:34:25', '2025-07-16 12:34:25'),
(8, '11|9ATZ75UecSyWYyPGD3yOpI8DBTbnTkZGx7CFDD3X0ffac13d', 'teacher', 12, '2025-07-18 01:18:05', '2025-07-18 01:18:05'),
(9, '12|I2fkl3DNtheAZCZ7wtgliBoC3nRHjyJhpu15fD2Nf7dd232b', 'teacher', 66, '2025-07-18 01:19:11', '2025-07-18 01:19:11'),
(10, '13|6mKm3X5NkPHen00BrVqaGZvCIeEggNJRKHU5adJk9af54ee2', 'parent', 66, '2025-07-18 02:08:25', '2025-07-18 02:08:25'),
(11, '14|cGwkBjRC5EE7dP4d7KCu1tIpBhqXRBbf4PgmRDhyffa83413', 'parent', 66, '2025-07-18 02:09:15', '2025-07-18 02:09:15'),
(12, '15|O00I2TM2PAmrUXm354wttPfHSBAfiNZK4lR7LZLKcc7ef0a9', 'parent', 66, '2025-07-18 02:09:57', '2025-07-18 02:09:57'),
(13, '16|mqWyISwHXXhwMVKq4tYtR4bRyOejjveIyjBYWhK7ef169112', 'parent', 66, '2025-07-18 02:13:00', '2025-07-18 02:13:00'),
(14, '17|0buwR1WP7ceu9CvgnDdkuRMaLC0ARp2rr1TE16Gpc97b1a7f', 'parent', 66, '2025-07-18 02:14:21', '2025-07-18 02:14:21'),
(15, '18|nK9fAwnjpzZhnnnKI3t19YCyCTaDMwlkMJ3cNmjZ108a3b85', 'parent', 66, '2025-07-18 02:15:47', '2025-07-18 02:15:47'),
(16, '19|WSAESOZ0jo12jtbeQ7SAatr804xwZXjTIEWIuVG8485f98ed', 'parent', 66, '2025-07-18 02:18:42', '2025-07-18 02:18:42'),
(17, '20|bvmmsAylK2upkhuhOGIGkDB4evIPwgDQUYNs9cPO13272d95', 'parent', 66, '2025-07-18 02:19:42', '2025-07-18 02:19:42'),
(18, '21|DoHsFK67bFZykUKB9yRgEVBvdDF9VVKsPr8aH1Wr57f7888e', 'teacher', 32, '2025-07-24 08:57:01', '2025-07-24 08:57:01'),
(19, '22|3fvazZ6yx3HYC139NjCexSzWZvIbHcUumZn8Qhqy6af20978', 'teacher', 32, '2025-07-24 09:02:44', '2025-07-24 09:02:44'),
(20, '23|x7eRhnDPwnNP1sLQVDER7XcBB7Xxs8jps6B7tdooac467cce', 'parent', 42, '2025-07-24 10:58:38', '2025-07-24 10:58:38'),
(21, '24|wcvgvf4E1XJgwJTc8l1aXJBVGeoWoqAIGpP8SDgw36bf8eac', 'parent', 66, '2025-07-24 10:59:08', '2025-07-24 10:59:08'),
(22, '25|ffMNit1ul3uC9zMxpCtIzYPWBOCoskRQfadZZ1or9192d45c', 'parent', 66, '2025-07-24 11:01:53', '2025-07-24 11:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `topics_including`
--

CREATE TABLE `topics_including` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `age` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics_including`
--

INSERT INTO `topics_including` (`id`, `topic_name`, `image`, `description`, `status`, `age`, `created_at`, `updated_at`) VALUES
(1, 'Cognitive', NULL, 'Cognitive', 1, '2', '2025-06-07 10:11:17', '2025-06-24 02:06:50'),
(2, 'Language & Literacy', NULL, 'Language & Literacy', 1, '1', '2025-06-07 10:13:02', '2025-06-09 07:37:31'),
(3, 'Social-Emotional Skills', NULL, 'Social-Emotional', 1, '1', '2025-06-07 10:13:24', '2025-06-11 09:29:22'),
(4, 'Life Skills', NULL, 'Life Skills', 1, NULL, '2025-06-07 10:14:12', '2025-06-09 05:06:26'),
(6, 'Sensory/Creative', NULL, 'Sensory/Creative', 1, '1', '2025-06-07 10:15:58', '2025-06-11 09:35:54'),
(7, 'Motor Skills', NULL, 'Motor Skills', 1, '1', '2025-06-09 04:57:20', '2025-06-11 09:36:33'),
(9, 'Life Skills', NULL, NULL, 1, '1', '2025-06-11 09:30:41', '2025-06-11 09:35:37'),
(10, 'Cognitive', NULL, NULL, 1, '2', '2025-06-11 09:52:44', '2025-06-11 09:52:44'),
(11, 'Language & Literacy', NULL, NULL, 1, '2', '2025-06-11 09:53:17', '2025-06-11 09:53:17'),
(12, 'Motor Skills', NULL, NULL, 1, '2', '2025-06-11 09:53:35', '2025-06-11 09:53:35'),
(13, 'Social-Emotional', NULL, NULL, 1, '2', '2025-06-11 09:53:50', '2025-06-11 09:53:50'),
(14, 'Creative/Sensory', NULL, NULL, 1, '2', '2025-06-11 09:54:05', '2025-06-11 09:54:05'),
(15, 'Practical Life', NULL, NULL, 1, '2', '2025-06-11 09:54:18', '2025-06-11 09:54:18'),
(16, 'Cognitive', NULL, NULL, 1, '3', '2025-06-11 09:54:58', '2025-06-11 09:54:58'),
(17, 'Language & Literacy', NULL, NULL, 1, '3', '2025-06-11 09:55:43', '2025-06-11 09:55:43'),
(18, 'Motor Skills', NULL, NULL, 1, '3', '2025-06-11 09:56:10', '2025-06-11 09:56:10'),
(19, 'Social-Emotional', NULL, NULL, 1, '3', '2025-06-11 09:56:24', '2025-06-11 09:56:24'),
(20, 'Creative/Sensory', NULL, NULL, 1, '3', '2025-06-11 09:56:39', '2025-06-11 09:56:39'),
(21, 'Practical Life', NULL, NULL, 1, '3', '2025-06-11 09:57:15', '2025-06-11 09:57:15'),
(22, 'Cognitive', NULL, NULL, 1, '3', '2025-06-11 12:05:58', '2025-06-11 12:05:58'),
(23, 'Language & Literacy', NULL, NULL, 1, '3', '2025-06-11 12:06:25', '2025-06-11 12:06:25'),
(24, 'Motor Skills', NULL, NULL, 1, '3', '2025-06-11 12:06:42', '2025-06-11 12:06:42'),
(25, 'Social-Emotional', NULL, NULL, 1, '3', '2025-06-11 12:06:54', '2025-06-11 12:06:54'),
(26, 'Creative/Sensory', NULL, NULL, 1, '3', '2025-06-11 12:07:01', '2025-06-11 12:07:01'),
(27, 'Practical Life', NULL, NULL, 1, '3', '2025-06-11 12:07:13', '2025-06-11 12:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avtar` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt_password` varchar(255) DEFAULT NULL,
  `role` enum('super_admin','admin','tech','teacher','school','student','is_data','marketing') NOT NULL,
  `email_verified` enum('true','false') NOT NULL DEFAULT 'false',
  `phone_verified` enum('true','false') NOT NULL DEFAULT 'false',
  `status` enum('active','inactive','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avtar`, `dob`, `address`, `phone_number`, `password`, `salt_password`, `role`, `email_verified`, `phone_verified`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mayank katare', 'admin@example.com', 'assets/images/profile/6841a5af145b0.jpg', '1996-12-01', 'mahakali ward deori', '7581955887', '$2y$12$a3wmM8Y1ru15t3zJptiv3ekjE.8elkT5RFvL.fUjcRlvGqHxTM3FG', '3P', 'admin', 'true', 'true', 'active', '2025-04-01 00:29:27', '2025-06-05 08:41:59'),
(2, 'admin', 'admin@gmail.com', NULL, NULL, NULL, '7581955861', '$2y$12$AAU1g2w/XEF3HI5FDhdb5.ttyjubUKeIjbZ8/gi6VeX5K1gQrmu2O', NULL, 'admin', 'false', 'false', 'pending', '2025-04-03 02:41:26', '2025-04-03 02:41:26'),
(3, 'gfgfg', 'test@gmail.com', 'assets/images/user/student/parents/1750946593_685d5321ea863.jpg', '1996-05-10', 'bhopal', '987654326', '$2y$12$O6Bjy9WvjUqSS9Mr9431QO6nME7kKFXn1Rt6kjTHo1qgFDSoEo1LS', '12345', 'student', 'false', 'false', 'active', '2025-05-27 19:26:15', '2025-06-26 08:33:13'),
(5, 'tets', 'admins@admin.com', NULL, NULL, 'test', '4564546542', '$2y$12$GAIes7uSxoWroa0j3PERtOPBKy7/VdOblcDdy.jLLJurOD8H9u8fq', '12345', 'student', 'false', 'false', 'active', '2025-05-27 19:29:52', '2025-05-30 03:37:52'),
(6, 'pyschool', 'pyschool@gmail.com', NULL, NULL, 'indore', '7894561288', '$2y$12$V6m.Sah3hHLYmrV8K/6db.9agUKurimBixkC0lsyWfi5kIDpyVaMO', '12345', 'school', 'false', 'false', 'active', '2025-05-29 00:27:48', '2025-05-30 07:56:26'),
(7, 'pyschool', 'pyschool2@gmail.com', NULL, NULL, 'indore', '7894561299', '$2y$12$8evRshQP6bYSsuZLgSeswusTkQiQjS1ZrznqJZDaiyaFEi/zG4HFG', '12345', 'school', 'false', 'false', 'active', '2025-05-29 00:29:34', '2025-05-30 07:56:31'),
(9, 'Mayank Katare', 'fgfgfg@mailinator.com', NULL, '1996-05-10', 'Bhopal, India', '9876543210', '$2y$12$IKCKyPDoK705etgbJQaATeRSYDFhcj9DVUYKh6bPnSCWJ6e8ldaRS', '12345', 'student', 'false', 'false', 'active', '2025-06-04 01:23:27', '2025-06-26 06:00:31'),
(11, 'gfgfg', 'teste@gmail.com', 'assets/images/user/student/parents/1750946879_685d543f04be9.jpg', '1996-05-10', 'bhopal', '987654328', '$2y$12$kemfCvqVmk0MHZ1IsPqwTeWVvnUFsyDwRGviQ2KDutxvM8keSh.Am', '12345', 'student', 'false', 'false', 'active', '2025-06-04 01:30:29', '2025-06-26 08:37:59'),
(12, 'hjhjh', 'testrrrr@mailinator.com', NULL, NULL, 'us\r\nus', '7894561000', '$2y$12$CEteD8FosuOf7MrK3qbWf.k7bd.ebYQkUGD8YKpuh9Uskr1Y9iqT6', '12345', 'student', 'false', 'false', 'active', '2025-06-05 09:16:31', '2025-06-05 15:00:28'),
(13, 'pyschoolgg', 'testjkjkjk@mailinator.com', NULL, NULL, 'us', '0894561777', '$2y$12$w/TzcB/EzH7xMv3PYtKFPOFGPpUq.Xq//x/QtM8s4phWmna8ITWM.', '12345', 'school', 'false', 'false', 'pending', '2025-06-05 09:55:08', '2025-06-05 09:55:08'),
(14, 'cxzcxzcxz', 'testiiii@mailinator.com', NULL, NULL, 'us\r\nus', '7894561200', '$2y$12$Rv2sGGzF60gAMuX0yORxaeOiv36fXEGGZOjHViEFmypysys7RQKgy', '12345', 'student', 'false', 'false', 'pending', '2025-06-06 05:07:33', '2025-06-06 05:07:33'),
(15, 'pyschool3', 'testwyyy2@mailinator.com', NULL, NULL, 'us', '1234567893', '$2y$12$iOkPp2YKcbEZ319SkKnLkOiYLNNsw5qnSaCL/FM4ZF6AwaiUZgzTO', '12345', 'school', 'false', 'false', 'pending', '2025-06-14 08:06:48', '2025-06-14 08:06:48'),
(17, 'tyty', 'wwwwttt@mailinator.com', NULL, NULL, 'us', '8745129635', '$2y$12$8pGKqob.5eP.Cca2qfNy2e1Du/ZHC1oyl.I6qhxfzUAdJcf9N5b2u', '12345', 'school', 'false', 'false', 'pending', '2025-06-14 08:10:20', '2025-06-14 08:10:20'),
(18, 'tyty', 'wwwwttddt@mailinator.com', NULL, NULL, 'us', '6745129635', '$2y$12$gYf6VffDVHVVh4IE9CAA8.Ri/s759xUh8vacQp0rlHF9DC7rrNpsi', '12345', 'school', 'false', 'false', 'pending', '2025-06-14 08:12:18', '2025-06-14 08:12:18'),
(19, 'tyty', 'wwwwttffddt@mailinator.com', NULL, NULL, 'us', '9745129635', '$2y$12$gFs9PvtOOrQGTaZCK7OGQOem2HWALiRTbhOPWfuWfMKkUDyFCGsYe', '12345', 'school', 'false', 'false', 'pending', '2025-06-14 08:14:00', '2025-06-14 08:14:00'),
(20, 'tyty', 'wwwwttffddffft@mailinator.com', NULL, NULL, 'us', '9945129635', '$2y$12$azu4faF6KADClFcrINUJDuHFE4XaFWiCmf.FxFCC7xh5ufTGEXS82', '12345', 'school', 'false', 'false', 'pending', '2025-06-14 08:14:48', '2025-06-14 08:14:48'),
(21, 'pyschool', 'teseet2@mailinator.com', NULL, NULL, 'indore', '1234567877', '$2y$12$SR9S0nQHt7F2O5ilzZ4UzOD5sIYI5./G5RMGwIEweJafonGPphtDi', '12345', 'school', 'false', 'false', 'pending', '2025-06-14 08:18:53', '2025-06-14 08:18:53'),
(22, 'rtrt', 'teachmmn@example.com', NULL, NULL, 'ghghg', '2581479635', '$2y$12$vZCtqDMc90S7YQ8YiBkFLu.JmuyV7g9tPf3bpPnfLdrvCz6v6Vc3C', '12345', 'teacher', 'false', 'false', 'pending', '2025-06-16 07:04:34', '2025-06-16 07:04:34'),
(24, 'rtrt', 'teacfffhmmn@example.com', NULL, NULL, 'ghghg', '2581079635', '$2y$12$/ACordrBhLKDxHjn0BlFZONlgB/x56fXTj3BByHgheZWqMKdGwSPC', '12345', 'teacher', 'false', 'false', 'pending', '2025-06-16 07:08:07', '2025-06-16 07:08:07'),
(25, 'rtrt', 'teacfttffhmmn@example.com', NULL, NULL, 'ghghg', '7781079635', '$2y$12$GvuIZo7KSHJcGvdttrB0puswQ7nIL2C.yXWAMnm7QXRVzTqAeMbXy', '12345', 'teacher', 'false', 'false', 'pending', '2025-06-16 07:09:37', '2025-06-16 07:09:37'),
(27, 'rtrt', 'admixndddd@example.com', NULL, NULL, 'ghghg', '8527412584', '$2y$12$yU32/mGxtfq.XqIQsMkknOnU9vTH6Ui/GfXn048rCIZr9oCkOJZMm', '12345', 'teacher', 'false', 'false', 'pending', '2025-06-16 07:48:45', '2025-06-16 07:48:45'),
(28, 'test', 'test245@mailinator.com', NULL, NULL, 'us', '7899961235', '$2y$12$THChSY8buBZF2y4h/bd.vO4w5CV/aSjhF9gWpbmuDJbZOkJCDe/YS', '12345', 'teacher', 'false', 'false', 'active', '2025-06-19 06:34:44', '2025-06-19 06:34:44'),
(30, 'test', 'test2@mailinator.com', NULL, NULL, 'us', '7894561255', '$2y$12$u0N3txVyUhbs0gp3K.UzpeKDTtST.H15vpOPlk2ca.1l/AmeIroRu', '12345', 'teacher', 'false', 'false', 'active', '2025-06-19 06:41:42', '2025-06-19 06:41:42'),
(31, 'test', 'tesRTYt2@mailinator.com', NULL, NULL, 'us', '8945610006', '$2y$12$toO74nAfHlYe8lWmLVj2z.9OWfgZkFSkPSzCXnWvI69.7uqpfPStW', '12345', 'teacher', 'false', 'false', 'active', '2025-06-19 09:57:45', '2025-06-19 09:57:45'),
(32, 'test', 'testwww2@mailinator.com', NULL, NULL, 'us', '9894561235', '$2y$12$VdTlwxv.nKAPgoTUNBV6ieKU6hIDIM9nu/7kWlEUNLtzNSz681gbG', '12345', 'teacher', 'false', 'false', 'active', '2025-06-19 10:03:27', '2025-06-19 10:03:27'),
(33, 'Mayank Katare', 'mayank@example.com', 'uploads/avatars/685d41a5e0802.jpg', '1996-05-10', 'Bhopal, India', '8521479635', '$2y$12$O6Bjy9WvjUqSS9Mr9431QO6nME7kKFXn1Rt6kjTHo1qgFDSoEo1LS', '12345', 'teacher', 'false', 'false', 'active', '2025-06-24 01:43:31', '2025-06-26 07:18:37'),
(34, 'test', 'marketing@example.com', 'assets/images/user/general/1751017021_download.jpg', NULL, 'ffdfdf', '1478523698', '$2y$12$2/JMqfLh7sK6KhYoXaYC3eUq.2p8U/jBxkdg1UWXeuEZco2tvl7wW', '12345', 'marketing', 'false', 'false', 'active', '2025-06-27 03:31:40', '2025-06-27 04:07:01'),
(35, 'ghghg', '677admintest2@example.com', NULL, NULL, 'ghghg', '651', '$2y$12$URKqsnJn1dSDsW5A1EmxfuTGH55Vlf6iEUimNpvJK7Qnq6A2XetB6', '12345', 'student', 'false', 'false', 'active', '2025-07-14 12:59:21', '2025-07-14 12:59:21'),
(36, 'rsschool', 'adminschool@example.com', NULL, NULL, NULL, '2589631456', '$2y$12$cfXNy6OslGbo7361uhsZGuoUvSL4pVJ1dhSU5hkkfva5iNxg37JeG', NULL, 'school', 'false', 'false', 'pending', '2025-07-14 23:08:51', '2025-07-14 23:08:51'),
(37, 'fddfd', '487adminsdddchool@example.com', NULL, NULL, 'sasa', '337', '$2y$12$6OpzbEh4WxT8qDgVHLtVpe7O5Clx5ssbu4eKfM6S8lUZC5VKE.89m', '12345', 'student', 'false', 'false', 'active', '2025-07-15 04:42:30', '2025-07-15 04:42:30'),
(38, 'fddfd', '729adminscdddhool@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '134', '$2y$12$UmFs/GjlbxId0CR16iPu3.0nUqvwVKLdP6fLp0LQYOa09r00BevyS', '12345', 'student', 'false', 'false', 'active', '2025-07-15 04:44:42', '2025-07-15 04:44:42'),
(39, 'sasas', '466adminschosssssol@example.com', NULL, NULL, 'ghghg\r\nindore', '715', '$2y$12$EdQcLxxSYCkVMLiJlb/Siul6uoIC5rXh765smg2pX.WZvu1QU4WNu', '12345', 'student', 'false', 'false', 'active', '2025-07-15 04:55:31', '2025-07-15 04:55:31'),
(40, 'dfdfdf', '220adminschooliii@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '274', '$2y$12$eWQl2NCijVEQb4aTYJwFfuXR0BKHmKrr1A/UQJbA0fWf7VATiAemK', '12345', 'student', 'false', 'false', 'active', '2025-07-15 05:02:13', '2025-07-15 05:02:13'),
(41, 'dfdfdf', '252adminschooliii@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '369', '$2y$12$qePap2wjz7oI4oG.apImM.g/3yUPWGgZru/mIxLBVeyVVj6mdZCji', '12345', 'student', 'false', 'false', 'active', '2025-07-15 05:03:24', '2025-07-15 05:03:24'),
(42, 'dfdfdf', '685adminschooliii@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '688', '$2y$12$dJgi3QQL6y10z5s5t1HxLuVdxcHkahFCrausGaW6GEUcuKXsG.jyy', '12345', 'student', 'false', 'false', 'active', '2025-07-15 05:03:37', '2025-07-15 05:03:37'),
(43, 'dfdfdf', '746adminschooliii@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '266', '$2y$12$39/9tZYphTFC8CAnzsyWrO.0IHQILBrwnQrg4ifCMIiE6m.zcZtb6', '12345', 'student', 'false', 'false', 'active', '2025-07-15 05:03:54', '2025-07-15 05:03:54'),
(44, 'dfdfdf', '341adminschossoliii@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '254', '$2y$12$Pmi26ES5YVohgRPXzrJcrO3YORG2tBUa.btrrcvfiTdUqiK0Zam8u', '12345', 'student', 'false', 'false', 'active', '2025-07-15 05:10:50', '2025-07-15 05:10:50'),
(45, 'dfdfdf', '949adminschossoliii@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '496', '$2y$12$8M4J6CX8aM0A7rUpr4uNUu7nkY.GArdsBd3JfNp42HLDVTY9MM1/C', '12345', 'student', 'false', 'false', 'active', '2025-07-15 05:11:22', '2025-07-15 05:11:22'),
(46, 'dfdfdf', '143adminschossoliii@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '590', '$2y$12$losblZ2uaHIc074znarR4.gZh2TmGwHckdND30A9PkGERxtD5N1T.', '12345', 'student', 'false', 'false', 'active', '2025-07-15 05:11:44', '2025-07-15 05:11:44'),
(47, 'fddfd', '748adminschodddddol@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '967', '$2y$12$CU5A50pcFJZQIkLM3eWXyem7qiz64Qjl1oGC05POOaC8OOn/66dqW', '12345', 'student', 'false', 'false', 'active', '2025-07-15 05:14:25', '2025-07-15 05:14:25'),
(48, 'fddfd', '816adminschodddddol@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '3336669988', '$2y$12$TFWucsAa1xvQv680AC3Be.KpkgIB2I9.18Jjtt4uuPJUn.ccHN9y2', '12345', 'student', 'false', 'false', 'active', '2025-07-15 05:14:42', '2025-07-15 09:52:00'),
(49, 'pyschool', 'adminschdddool@example.com', NULL, NULL, NULL, '7894562315', '$2y$12$FE5iKVBigYrYB/LMLWgCEurjyUaVLfCipKRI8zLCGU5LcpMwZN422', NULL, 'school', 'false', 'false', 'pending', '2025-07-15 08:44:53', '2025-07-15 08:44:53'),
(50, 'rtrt', 'admidddnschool@example.com', NULL, NULL, 'ghghg', '2223338954', '$2y$12$KH25NHPCnt.9d4OGKhC.KecFPgbklXocKyRd5H5xLJJnvikUm3iy6', '12345', 'teacher', 'false', 'false', 'active', '2025-07-15 09:02:13', '2025-07-15 09:02:13'),
(51, 'rtrt', 'admindddd@example.com', NULL, NULL, 'ghghg', '99345678969', '$2y$12$M7nRtGp7LupLSKtJcGCVIuaUjFL19iZSV6QyK97JIfTP8gCGaISTK', '12345', 'teacher', 'false', 'false', 'active', '2025-07-15 11:06:13', '2025-07-15 11:06:13'),
(53, 'rtrt', '158admindddd@example.com', NULL, NULL, 'ghghg', '49499345678969', '$2y$12$m2IbaakG5pphqmbKR8Mx4.RxHVE3HMSHPgC01yJ.fZ9Nl2SVGbmuO', '12345', 'teacher', 'false', 'false', 'active', '2025-07-15 11:08:43', '2025-07-15 11:08:43'),
(54, 'rtrt', '666admindddd@example.com', NULL, NULL, 'ghghg', '56299345678969', '$2y$12$c2y9EQjjRIVJX1vi7BucG.ZrGYJ1Sz.ARcQGxvWq9YZiUvJejY3TC', '12345', 'teacher', 'false', 'false', 'active', '2025-07-15 11:09:01', '2025-07-15 11:09:01'),
(55, 'rtrt', '184admindddd@example.com', NULL, NULL, 'ghghg', '71199345678969', '$2y$12$GSHpmUmAc6PincPzoVHKmuRJTu0VSCyikWwqlmGIX5uu6/6oHQody', '12345', 'teacher', 'false', 'false', 'active', '2025-07-15 11:09:13', '2025-07-15 11:09:13'),
(56, 'fddfd', '910admin890@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '83112345678987', '$2y$12$ahiQdB1vMw8CCxSjj4Fg5utTHVMopoNu3GAEdR1P5uVCXOm6Wm3Hm', '12345', 'student', 'false', 'false', 'active', '2025-07-15 11:17:28', '2025-07-15 11:17:28'),
(57, 'fddfd', '394admin890@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '12345678987', '$2y$12$p3p5VKMt1boxCX03K65TouG3XHQOxoorcYusICWGqMPKQk8M5dvTO', '12345', 'student', 'false', 'false', 'active', '2025-07-15 11:19:23', '2025-07-15 11:46:50'),
(58, 'fddfd', '677admi777n@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '3062223336667', '$2y$12$re/3umh4gwbyGxdkwGQpyufmAo1ESRp60ZUCypexYNZOqTlnVV2Ne', '12345', 'student', 'false', 'false', 'active', '2025-07-15 11:26:00', '2025-07-15 11:26:00'),
(59, 'fddfd', '787admi777n@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '5992223336667', '$2y$12$lHnsYh7V141du31nkk5LYuligw8L1V8l9RALSMXye9WFO84bRfkim', '12345', 'student', 'false', 'false', 'active', '2025-07-15 11:26:20', '2025-07-15 11:26:20'),
(60, 'fddfd', '873admi777n@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '2672223336667', '$2y$12$DJnUJSo.7x.lfGTAT9ustevOFAQF.67ilFe4lucf9w1vvZraN50pS', '12345', 'student', 'false', 'false', 'active', '2025-07-15 11:29:16', '2025-07-15 11:29:16'),
(61, 'fddfd', '134admi777n@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '5322223336667', '$2y$12$cUrtAsRaoNuwZxJWxhnjGOZK5M7wJFw64iDs6wX5QlNBtMyo./6ba', '12345', 'student', 'false', 'false', 'active', '2025-07-15 11:29:29', '2025-07-15 11:29:29'),
(62, 'fddfd', '416admi777n@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '8102223336667', '$2y$12$d5pEbPCVnlGmeuhKpR73heOOFg3ogZMdALSo2jhyReQVZmQe4.I5a', '12345', 'student', 'false', 'false', 'active', '2025-07-15 11:30:50', '2025-07-15 11:30:50'),
(63, 'ddfdfdf', 'admihjhjhjhn@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '8574159684', '$2y$12$LNsER8T2wII.k3e4LHbtX.c4KCYBj23gPL7/6/B2w39/6Io79Z3F6', '12345', 'student', 'false', 'false', 'active', '2025-07-15 11:38:45', '2025-07-15 11:38:45'),
(65, 'ddfdfdf', '931admihjhjhjhn@example.com', NULL, NULL, 'indore\r\nindore\r\nindore', '8574859684', '$2y$12$LrTGQCZ0lRm/7YzNcVKcGO0/.r11Oz8eNiisgVWk/i1f7Vxiwc7Be', '12345', 'student', 'false', 'false', 'active', '2025-07-15 11:39:30', '2025-07-15 11:45:32'),
(66, 'fgfgfg', 'test123@gmal.com', NULL, NULL, 'sdsd', '7894561230', '$2y$12$CTzVMFjlUoyQ0yzXU97T9uCAL8HHJz/tViDQlk6UfvzZewMNCtery', '12345', 'student', 'false', 'false', 'active', '2025-07-16 01:00:49', '2025-07-16 01:00:49'),
(67, 'sdsds', 'test123777@gmal.com', NULL, NULL, 'fgfgf', '2587411593', '$2y$12$q.DdD5rurXE7qHWjGfnNOem5XAtyOo8W42YYhWCVW2VbKoDk90LMa', '12345', 'student', 'false', 'false', 'active', '2025-07-16 01:04:23', '2025-07-16 01:04:23'),
(68, 'Dreamland Kids School1', 'pu@example.com', NULL, NULL, 'indore', '9898123856', '$2y$12$FyNEbbhil2l7Ios9/BZ03e6AdcbF4/MnFpNKnn0JQ8iVWOUQSyt.e', NULL, 'school', 'false', 'false', 'active', '2025-07-30 03:00:32', '2025-07-30 03:10:55'),
(69, 'Dreamland Kids School3', 'uo@example.com', NULL, NULL, NULL, '7412589635', '$2y$12$GuhR2YwjWi034QiJ7NiBx.ro84fBn9inEUAnPVvnd.xcuA6mqc.O6', NULL, 'school', 'false', 'false', 'active', '2025-07-30 03:17:23', '2025-07-30 03:17:23'),
(70, 'rg verma', 'yop@example.com', NULL, NULL, 'ghghg\r\nindore', '9512365478', '$2y$12$ReCzt396rhwxbYuTzgbmDOAfO.5pUXoCxNe95RK9UX4x7KC57CKMm', '12345', 'student', 'false', 'false', 'active', '2025-07-30 03:29:55', '2025-07-30 03:29:55'),
(71, 'fddfd', 'oop@example.com', NULL, NULL, 'fgfgf', '8887775656', '$2y$12$bAJmBdfxwusvr5/pdHNa.OkdlYX17j3Bsz.gsGwEizWWobJYlw2cW', '12345', 'student', 'false', 'false', 'active', '2025-07-30 04:04:44', '2025-07-30 04:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `usps`
--

CREATE TABLE `usps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usps`
--

INSERT INTO `usps` (`id`, `heading`, `image`, `description`, `button_name`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Easy Class Booking', 'uploads/app/usp/1747548804_usp1.svg', 'Choose the class timings that fit your schedule. Pick any available slot between 9 AM - 9 PM effortlessly.', 'Read More', NULL, 1, '2025-05-18 06:13:24', '2025-05-18 06:13:24'),
(12, 'Customise your kids classes', 'uploads/app/usp/1747549306_usp2.png', 'Easily switch teachers to match your child’s learning needs and comfort level.', 'Next', NULL, 1, '2025-05-18 06:21:46', '2025-05-18 06:21:46'),
(13, 'Flexible Payments', 'uploads/app/usp/1747549399_usp3.png', 'No monthly fees, no extra charges. Pay only for the days your child is present.', 'Next', NULL, 1, '2025-05-18 06:23:19', '2025-05-18 06:23:19'),
(14, 'Progress Tracking', 'uploads/app/usp/1747549509_usp4.png', 'Get real-time progress reports, attendance tracking, and performance insights at your fingertips.', 'Next', NULL, 1, '2025-05-18 06:25:09', '2025-05-18 06:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `usp_details`
--

CREATE TABLE `usp_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usp_details`
--

INSERT INTO `usp_details` (`id`, `image`, `heading`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'assets/images/webbanner/684b083294ee4.webp', 'Choose Your Time, Book a Class Anytime!', 'Every family has a unique schedule, and children learn best at different times of the day. With our flexible booking system, you can select any available time slot between 9 AM and 9 PM, ensuring learning fits seamlessly into your daily routine. Whether it’s morning, afternoon, or evening, the choice is yours! No rigid schedules—just learning at your convenience.', 'active', '2025-06-12 15:26:54', '2025-06-12 17:02:42'),
(4, 'assets/images/webbanner/684b083fd436c.webp', 'The Right Teacher for Your Child!', 'Every child has a unique learning style, and finding the right teacher can make all the difference. We give you the flexibility to select and switch teachers to match your child’s comfort level and educational needs. Whether they prefer a patient mentor, an energetic instructor, or a specialist in a particular subject, you’re in control of their learning experience.', 'active', '2025-06-12 15:40:26', '2025-06-12 17:02:55'),
(5, 'assets/images//uspdetails684af4fba3a39.webp', 'No Extra Charges, Pay as You Go!', 'Say goodbye to unnecessary expenses! Unlike traditional preschools that charge fixed monthly fees, we offer a pay-per-attendance model—you only pay for the days your child attends. There are no hidden costs, no advance payments, and no long-term commitments. Learning should be accessible, affordable, and stress-free!', 'active', '2025-06-12 15:40:43', '2025-06-12 15:40:43'),
(6, 'assets/images//uspdetails684af5104b5e4.webp', 'Progress Tracking', 'Stay informed about your child’s learning journey with our real-time progress tracking system. From attendance records to performance insights, you’ll have access to detailed reports at your fingertips. Monitor their growth, track milestones, and ensure they’re on the right path—all in one place!', 'active', '2025-06-12 15:41:04', '2025-06-12 15:41:04'),
(7, 'assets/images//uspdetails684af52409ae6.webp', 'One Subscription, Access to All 9-to-9 School Branches', 'Education should be flexible and accessible no matter where you are. With just one subscription, your child gets the freedom to attend classes at any 9-to-9 School branch across different locations.\r\nWhether you\'re traveling, relocating, or simply need a different learning environment, your child can seamlessly continue their education without any disruptions. No need to re-register or pay extra—just walk into any 9-to-9 School branch and attend classes as per your booked schedule.\r\nThis ensures consistent learning, convenience for parents, and uninterrupted progress—all with a single, hassle-free subscription!', 'active', '2025-06-12 15:41:24', '2025-06-12 15:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `visit_bookings`
--

CREATE TABLE `visit_bookings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `btn_name` varchar(255) NOT NULL,
  `btn_link` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visit_bookings`
--

INSERT INTO `visit_bookings` (`id`, `title`, `description`, `btn_name`, `btn_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ready to give Your Child the Best Start?', 'Schedule a visit to one of our campuses and see firsthand how our innovative approach to early childhood education can benefit your child', 'Book a Visit', 'Book a Visit', 1, '2025-04-29 19:15:17', '2025-04-29 19:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `web_banners`
--

CREATE TABLE `web_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subheading` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `btn_name` varchar(255) DEFAULT NULL,
  `btn_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `backgroundimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_banners`
--

INSERT INTO `web_banners` (`id`, `subheading`, `heading`, `description`, `button_name`, `button_link`, `btn_name`, `btn_link`, `status`, `image`, `backgroundimage`, `created_at`, `updated_at`) VALUES
(8, NULL, 'Arsenic', NULL, NULL, NULL, NULL, NULL, 1, 'assets/images/daycare/banner/6818763f69694.webp', NULL, '2025-05-05 08:26:39', '2025-05-05 08:26:39'),
(9, NULL, 'Arsenic', NULL, NULL, NULL, NULL, NULL, 1, 'assets/images/daycare/banner/681876736f75a.webp', NULL, '2025-05-05 08:27:31', '2025-05-05 08:27:31'),
(10, NULL, 'Arsenic', NULL, NULL, NULL, NULL, NULL, 1, 'assets/images/daycare/banner/68187680bec15.webp', NULL, '2025-05-05 08:27:44', '2025-05-05 08:27:44'),
(11, NULL, 'Arsenic', NULL, NULL, NULL, NULL, NULL, 1, 'assets/images/daycare/banner/6818769596a9b.webp', NULL, '2025-05-05 08:28:05', '2025-05-05 08:28:05'),
(12, NULL, 'Arsenic', NULL, NULL, NULL, NULL, NULL, 1, 'assets/images/daycare/banner/681876a753128.webp', NULL, '2025-05-05 08:28:23', '2025-05-05 08:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `web_contents`
--

CREATE TABLE `web_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `subheading` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `button_name2` varchar(255) DEFAULT NULL,
  `button_link2` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_contents`
--

INSERT INTO `web_contents` (`id`, `image`, `background_image`, `subheading`, `heading`, `title`, `description`, `button_name`, `button_link`, `button_name2`, `button_link2`, `status`, `created_at`, `updated_at`) VALUES
(2, 'assets/web/images/home/child.webp', NULL, '9 TO 9 School\n', 'India\'s first round o clock preschool', 'Welcome to the', 'At 9to9 Preschool, every child\'s journey is shaped by a custom-tailored curriculum, blending expert lessons with joyful discovery. With flexible hours from 9 AM to 9 PM, learning flows with your schedule. Crafted for young minds, designed for modern families where education is both personal and effortless.', 'Apply Today', 'http://127.0.0.1:8000/talk-expert', '📄 Download Brochure', 'https://9to9school.com/assets/franchise-page.pdf', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_uses`
--

CREATE TABLE `why_choose_uses` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `box_heading1` varchar(255) NOT NULL,
  `box_content1` varchar(255) NOT NULL,
  `box_heading2` varchar(255) NOT NULL,
  `box_content2` varchar(255) NOT NULL,
  `box_heading3` varchar(255) NOT NULL,
  `box_content3` varchar(255) NOT NULL,
  `box_heading4` varchar(255) NOT NULL,
  `box_content4` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `why_we_stand_aparts`
--

CREATE TABLE `why_we_stand_aparts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_heading` varchar(255) DEFAULT NULL,
  `banner_description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `why_we_stand_aparts`
--

INSERT INTO `why_we_stand_aparts` (`id`, `title`, `url`, `description`, `image`, `banner_image`, `banner_heading`, `banner_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Choose Your Time, Book a Class Anytime!', 'Choose Your Time, Book a Class Anytime!', 'Flexible timings for your convenience', 'assets/images/popular/68085b4c8fee3.webp', 'assets/images/popular/banner/68085ae841843.webp', 'Child Learning Milestones', 'Creating memories and fostering growth through engaging experiences', 1, '2025-04-29 18:10:11', '2025-04-29 18:10:11'),
(2, 'The Right Teacher for Your Child!', 'Only pay for what you use', 'Only pay for what you use', 'assets/images/popular/6811168a3749b.webp', 'assets/images/popular/banner/6811168a7d7d2.webp', NULL, NULL, 1, '2025-04-29 18:12:26', '2025-04-29 18:12:26'),
(3, 'No Extra Charges, Pay as You Go!', 'usp-details', 'Only pay for what you use', 'assets/images/popular/681118b2d8ff6.webp', NULL, NULL, NULL, 1, '2025-04-29 18:21:38', '2025-04-29 18:21:38'),
(4, 'Monitor Your Child’s Growth', 'usp-details', 'Track your child’s learning progress easily', 'assets/images/popular/681cb0fde5f79.webp', 'assets/images/popular/banner/681a6ed30c5da.webp', NULL, NULL, 1, '2025-05-15 10:05:05', '2025-05-15 10:05:05'),
(5, 'Daily Child Activity Report', 'usp-details', 'Get daily insights on your child’s meals, sleep, and learning progress.', 'assets/images/popular/68111b5c287e4.webp', NULL, NULL, NULL, 1, '2025-05-15 10:06:08', '2025-05-15 10:06:08'),
(6, 'Real-Time Updates & Photos', 'usp-details', 'Stay connected with live photos, videos, and activity updates.', 'assets/images/popular/68111b9e03667.webp', NULL, NULL, NULL, 1, '2025-04-29 18:34:06', '2025-04-29 18:34:06'),
(7, 'Personalised Learning Plans', 'usp-details', 'Track and support your child’s growth with tailored learning plans.', 'assets/images/popular/68111bf444c5e.webp', NULL, NULL, NULL, 1, '2025-04-29 18:35:32', '2025-04-29 18:35:32'),
(8, 'Health & Wellness Tracking', 'usp-details', 'Easily monitor health, medication, and allergies in one place.', 'assets/images/popular/681cb0c447849.webp', NULL, NULL, NULL, 1, '2025-05-08 13:25:24', '2025-05-08 13:25:24'),
(9, 'Secure Digital Record-Keeping', 'usp-details', 'Access and manage all important records anytime, anywhere.', 'assets/images/popular/681cb0de201e8.webp', 'assets/images/popular/banner/681a6f02d0a7d.webp', NULL, NULL, 1, '2025-05-08 13:25:50', '2025-05-08 13:25:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_pay`
--
ALTER TABLE `activity_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_progress`
--
ALTER TABLE `add_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_remarks`
--
ALTER TABLE `add_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_franchise`
--
ALTER TABLE `apply_franchise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_leaves`
--
ALTER TABLE `apply_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_onboarding`
--
ALTER TABLE `app_onboarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_events`
--
ALTER TABLE `book_events`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_section1`
--
ALTER TABLE `category_section1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_section2`
--
ALTER TABLE `category_section2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_learning_applications`
--
ALTER TABLE `child_learning_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_safeties`
--
ALTER TABLE `child_safeties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_settings`
--
ALTER TABLE `common_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_goals`
--
ALTER TABLE `custom_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daycare_activites`
--
ALTER TABLE `daycare_activites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daycare_banners`
--
ALTER TABLE `daycare_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daycare_pays`
--
ALTER TABLE `daycare_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daycare_programs`
--
ALTER TABLE `daycare_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daycare_registers`
--
ALTER TABLE `daycare_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daycare_schedules`
--
ALTER TABLE `daycare_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daycare_skills`
--
ALTER TABLE `daycare_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daycare_whychooses`
--
ALTER TABLE `daycare_whychooses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demos`
--
ALTER TABLE `demos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquire`
--
ALTER TABLE `enquire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_partner_schools`
--
ALTER TABLE `enquiry_partner_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_packages`
--
ALTER TABLE `event_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert_consultations`
--
ALTER TABLE `expert_consultations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_category_id_foreign` (`category_id`);

--
-- Indexes for table `franchises`
--
ALTER TABLE `franchises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `habits`
--
ALTER TABLE `habits`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `kits`
--
ALTER TABLE `kits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kit_orders`
--
ALTER TABLE `kit_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `life_hack_details`
--
ALTER TABLE `life_hack_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `life_skills_hacks`
--
ALTER TABLE `life_skills_hacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_payments`
--
ALTER TABLE `master_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_boarding_slider`
--
ALTER TABLE `on_boarding_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_programs`
--
ALTER TABLE `our_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_services`
--
ALTER TABLE `package_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_preschool`
--
ALTER TABLE `pages_preschool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_schools`
--
ALTER TABLE `partner_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_school_fees`
--
ALTER TABLE `partner_school_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `populars`
--
ALTER TABLE `populars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferred_times`
--
ALTER TABLE `preferred_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `pre_banners`
--
ALTER TABLE `pre_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_child_safeties`
--
ALTER TABLE `pre_child_safeties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_explores`
--
ALTER TABLE `pre_explores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_galleries`
--
ALTER TABLE `pre_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_program_tailoreds`
--
ALTER TABLE `pre_program_tailoreds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_registeration_callbacks`
--
ALTER TABLE `pre_registeration_callbacks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `pre_register_price`
--
ALTER TABLE `pre_register_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pre_register_price_pre_register_id_foreign` (`pre_register_id`);

--
-- Indexes for table `pre_registration`
--
ALTER TABLE `pre_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_registration_banners`
--
ALTER TABLE `pre_registration_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_whychooses`
--
ALTER TABLE `pre_whychooses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress_goals`
--
ALTER TABLE `progress_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_content`
--
ALTER TABLE `quiz_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolfacilities`
--
ALTER TABLE `schoolfacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_school_email_unique` (`school_email`),
  ADD KEY `schools_user_id_foreign` (`user_id`);

--
-- Indexes for table `school_aboutuses`
--
ALTER TABLE `school_aboutuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_banners`
--
ALTER TABLE `school_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_category`
--
ALTER TABLE `school_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_fees`
--
ALTER TABLE `school_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_galleries`
--
ALTER TABLE `school_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skill_learns`
--
ALTER TABLE `skill_learns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialized_classes`
--
ALTER TABLE `specialized_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_class_name` (`class_name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_wallet`
--
ALTER TABLE `student_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_topics`
--
ALTER TABLE `sub_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seos`
--
ALTER TABLE `tbl_seos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_applications`
--
ALTER TABLE `teacher_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_enquiry`
--
ALTER TABLE `teacher_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_galleries`
--
ALTER TABLE `teacher_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_pages`
--
ALTER TABLE `teacher_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_wallets`
--
ALTER TABLE `teacher_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_why_apply_heres`
--
ALTER TABLE `teacher_why_apply_heres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_shifts`
--
ALTER TABLE `time_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `topics_including`
--
ALTER TABLE `topics_including`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- Indexes for table `usps`
--
ALTER TABLE `usps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usp_details`
--
ALTER TABLE `usp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_bookings`
--
ALTER TABLE `visit_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_banners`
--
ALTER TABLE `web_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_contents`
--
ALTER TABLE `web_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_uses`
--
ALTER TABLE `why_choose_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_we_stand_aparts`
--
ALTER TABLE `why_we_stand_aparts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `activity_pay`
--
ALTER TABLE `activity_pay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `add_progress`
--
ALTER TABLE `add_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `add_remarks`
--
ALTER TABLE `add_remarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `apply_franchise`
--
ALTER TABLE `apply_franchise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apply_leaves`
--
ALTER TABLE `apply_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_onboarding`
--
ALTER TABLE `app_onboarding`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_events`
--
ALTER TABLE `book_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_section1`
--
ALTER TABLE `category_section1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_section2`
--
ALTER TABLE `category_section2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child_learning_applications`
--
ALTER TABLE `child_learning_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `child_safeties`
--
ALTER TABLE `child_safeties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `common_settings`
--
ALTER TABLE `common_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `custom_goals`
--
ALTER TABLE `custom_goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `daycare_activites`
--
ALTER TABLE `daycare_activites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daycare_banners`
--
ALTER TABLE `daycare_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daycare_pays`
--
ALTER TABLE `daycare_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daycare_programs`
--
ALTER TABLE `daycare_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daycare_registers`
--
ALTER TABLE `daycare_registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daycare_schedules`
--
ALTER TABLE `daycare_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daycare_skills`
--
ALTER TABLE `daycare_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daycare_whychooses`
--
ALTER TABLE `daycare_whychooses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `demos`
--
ALTER TABLE `demos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquire`
--
ALTER TABLE `enquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `enquiry_partner_schools`
--
ALTER TABLE `enquiry_partner_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_packages`
--
ALTER TABLE `event_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expert_consultations`
--
ALTER TABLE `expert_consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `franchises`
--
ALTER TABLE `franchises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `habits`
--
ALTER TABLE `habits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kits`
--
ALTER TABLE `kits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kit_orders`
--
ALTER TABLE `kit_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `life_hack_details`
--
ALTER TABLE `life_hack_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `life_skills_hacks`
--
ALTER TABLE `life_skills_hacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_payments`
--
ALTER TABLE `master_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `on_boarding_slider`
--
ALTER TABLE `on_boarding_slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `our_programs`
--
ALTER TABLE `our_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package_services`
--
ALTER TABLE `package_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages_preschool`
--
ALTER TABLE `pages_preschool`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partner_schools`
--
ALTER TABLE `partner_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partner_school_fees`
--
ALTER TABLE `partner_school_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `populars`
--
ALTER TABLE `populars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `preferred_times`
--
ALTER TABLE `preferred_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pre_banners`
--
ALTER TABLE `pre_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pre_child_safeties`
--
ALTER TABLE `pre_child_safeties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pre_explores`
--
ALTER TABLE `pre_explores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pre_galleries`
--
ALTER TABLE `pre_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_program_tailoreds`
--
ALTER TABLE `pre_program_tailoreds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pre_registeration_callbacks`
--
ALTER TABLE `pre_registeration_callbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pre_register_price`
--
ALTER TABLE `pre_register_price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_registration`
--
ALTER TABLE `pre_registration`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_registration_banners`
--
ALTER TABLE `pre_registration_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pre_whychooses`
--
ALTER TABLE `pre_whychooses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `progress_goals`
--
ALTER TABLE `progress_goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_content`
--
ALTER TABLE `quiz_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schoolfacilities`
--
ALTER TABLE `schoolfacilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_aboutuses`
--
ALTER TABLE `school_aboutuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_banners`
--
ALTER TABLE `school_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_category`
--
ALTER TABLE `school_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_fees`
--
ALTER TABLE `school_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `school_galleries`
--
ALTER TABLE `school_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill_learns`
--
ALTER TABLE `skill_learns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialized_classes`
--
ALTER TABLE `specialized_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_wallet`
--
ALTER TABLE `student_wallet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sub_topics`
--
ALTER TABLE `sub_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `tbl_seos`
--
ALTER TABLE `tbl_seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_applications`
--
ALTER TABLE `teacher_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teacher_enquiry`
--
ALTER TABLE `teacher_enquiry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher_galleries`
--
ALTER TABLE `teacher_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher_pages`
--
ALTER TABLE `teacher_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_wallets`
--
ALTER TABLE `teacher_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher_why_apply_heres`
--
ALTER TABLE `teacher_why_apply_heres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `time_shifts`
--
ALTER TABLE `time_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `topics_including`
--
ALTER TABLE `topics_including`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `usps`
--
ALTER TABLE `usps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usp_details`
--
ALTER TABLE `usp_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visit_bookings`
--
ALTER TABLE `visit_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_banners`
--
ALTER TABLE `web_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `web_contents`
--
ALTER TABLE `web_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `why_choose_uses`
--
ALTER TABLE `why_choose_uses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `why_we_stand_aparts`
--
ALTER TABLE `why_we_stand_aparts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kit_orders`
--
ALTER TABLE `kit_orders`
  ADD CONSTRAINT `kit_orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `9to9_11june`.`users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pre_register_price`
--
ALTER TABLE `pre_register_price`
  ADD CONSTRAINT `pre_register_price_pre_register_id_foreign` FOREIGN KEY (`pre_register_id`) REFERENCES `pre_registration` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
