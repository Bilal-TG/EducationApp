-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2022 at 08:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnmm0_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `course_id`, `chapter_name`, `chapter_description`, `quiz_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chapter 1', 'Chapter 1 Description', NULL, NULL, NULL),
(2, 1, 'Chapter 2', 'Chapter 2 Description', NULL, NULL, NULL),
(3, 1, 'Chapter 3', 'Chapter 3 Description', NULL, NULL, NULL),
(4, 1, 'Chapter 4', 'Chapter 4 Description', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `created_at`, `updated_at`) VALUES
(1, 'A Level', NULL, '2022-05-06 06:15:22'),
(2, 'O Level', NULL, '2022-05-06 06:17:45'),
(3, '10th', NULL, NULL),
(4, '9th', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `add_time` date NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `sale_price` decimal(16,2) DEFAULT NULL,
  `total_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `view_count` int(11) DEFAULT 0,
  `featured` int(11) DEFAULT 0,
  `popular` tinyint(1) DEFAULT 0,
  `total_lessons` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `class_id`, `subject_id`, `add_time`, `course_image`, `intro_video`, `keywords`, `price`, `sale_price`, `total_time`, `status`, `view_count`, `featured`, `popular`, `total_lessons`, `created_at`, `updated_at`) VALUES
(1, 'Fundamentals of Chemistry', 'The Fundamentals of Chemistry is an introduction to the Periodic Table, stoichiometry, chemical states, chemical equilibria, acid & base, oxidation & reduction reactions, chemical kinetics, inorganic nomenclature and chemical bonding.', 0, 1, '2022-03-24', 'https://bookboon.com/thumbnail/380/c4bc79b4-c124-4460-bbd7-a03100c583a7/b5dc4812-36df-4d76-9233-a5cd00e34b0b/fundamentals-of-chemistry.jpg', NULL, 'chemistry, Fundamentals, introduction, Periodic Table, stoichiometry, chemical states, chemical equilibria, acid & base, oxidation, reduction reactions, chemical kinetics', '200.00', NULL, NULL, 0, 0, 1, 0, 2, NULL, '2022-04-01 18:55:48'),
(2, 'Fundamentals of Physics', 'Physics is a natural science that involves the study of matter and its motion through space and time, along with related concepts such as energy and force. More broadly, it is the study of nature in an attempt to understand how the universe behaves.', 0, 2, '2022-03-24', 'https://media.wiley.com/product_data/coverImage300/74/11197734/1119773474.jpg', NULL, 'Physics, natural science, study of matter, motion, space and time, energy, force', '500.00', NULL, NULL, 0, 0, 1, 1, 2, NULL, '2022-04-01 18:55:48'),
(3, 'Fundamentals of Math', 'Physics is a natural science that involves the study of matter and its motion through space and time, along with related concepts such as energy and force. More broadly, it is the study of nature in an attempt to understand how the universe behaves.', 0, 3, '2022-03-24', 'https://media.wiley.com/product_data/coverImage300/74/11197734/1119773474.jpg', NULL, 'Physics, natural science, study of matter, motion, space and time, energy, force', '500.00', NULL, NULL, 0, 0, 1, 1, 2, NULL, '2022-04-01 18:55:48'),
(4, 'New Chemistry Course', 'New Chemistry Course', 1, 1, '2022-05-12', 'http://127.0.0.1:8000/storage/course_cover/New_Chemistry_Course.png', 'http://127.0.0.1:8000/storage/http://127.0.0.1:8000/storage/course_cover/New_Chemistry_Course.png', 'new, course, description, chemistry, latest, update', '200.00', '100.00', NULL, 1, 0, 0, NULL, 0, '2022-05-12 07:09:03', '2022-05-12 07:09:03');

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
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Question 1', 'Question 1: Answer', NULL, NULL),
(2, 'Question 2', 'Question 2 : Answer', NULL, NULL),
(3, 'Question 3', 'Question 3 : Answer', NULL, NULL),
(4, 'Question 4', 'Question 4: Answer', NULL, NULL),
(5, 'Question 5', 'Question 5 : Answer', NULL, NULL),
(6, 'Question 6', 'Question 6 : Answer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `chapter_id`, `course_id`, `title`, `description`, `long_text`, `video_link`, `thumbnail_link`, `video_start_time`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'First Lesson', 'First Lesson Description', 'First Lesson Long Text', NULL, NULL, '0', NULL, NULL, NULL),
(2, 1, 1, '2nd Lesson', '2nd Lesson Description', '2nd Lesson Long Text', NULL, NULL, '0', NULL, NULL, NULL),
(3, 2, 2, '3rd Lesson', '3rd Lesson Description', '3rd Lesson Long Text', NULL, NULL, '0', NULL, NULL, NULL),
(4, 2, 2, '4th Lesson', '4th Lesson Description', '4th Lesson Long Text', NULL, NULL, '0', NULL, NULL, NULL);

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_02_27_193442_create_user_profiles_table', 1),
(11, '2022_03_21_110747_create_classes_table', 1),
(12, '2022_03_21_113737_create_subjects_table', 1),
(13, '2022_03_24_130347_create_courses_table', 1),
(14, '2022_03_29_132247_create_chapters_table', 1),
(15, '2022_03_29_153330_create_lessons_table', 1),
(16, '2022_04_01_151146_create_f_a_q_s_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0d6abefdcc31003cd2c7a3d37af16fb160186acd8ec4c0da3223248d0188263455e612a3b33ddb95', 6, 1, 'authToken', '[]', 0, '2022-04-13 17:15:11', '2022-04-13 17:15:11', '2023-04-13 11:15:11'),
('29813240a07ba1ebfbd3152de8b922f547beef1689274b5d16518f1a13d844d5a9e050d53353dcd3', 6, 1, 'authToken', '[]', 0, '2022-04-13 17:12:24', '2022-04-13 17:12:24', '2023-04-13 11:12:24'),
('628aad7fefa349b11729b9d6096568b2bf7660cce2860544a5a737b328729299ba5da7952328e98e', 6, 1, 'authToken', '[]', 0, '2022-04-13 14:56:00', '2022-04-13 14:56:00', '2023-04-13 08:56:00'),
('bce7a23dcbe680ff0b468ff9bce3b3572c725e0dcf84f3635d0883b0769a55f6c92be9da534813cc', 6, 1, 'authToken', '[]', 0, '2022-04-14 12:39:15', '2022-04-14 12:39:15', '2023-04-14 06:39:15'),
('d2c2390aba1a15ea9a6f258a4b87db18024132e02e18895b7073987424659c0ef7fba83f9d82cd86', 6, 1, 'authToken', '[]', 0, '2022-04-15 15:49:04', '2022-04-15 15:49:04', '2023-04-15 09:49:04'),
('fca880caf27b5b7de73227230a2a8ceb477849d12ab4a8f22028fd424ba4315d4fdb283f919da34b', 6, 1, 'authToken', '[]', 0, '2022-04-15 15:45:46', '2022-04-15 15:45:46', '2023-04-15 09:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'VG67W7zV1cy4UascecalITXVwB4JZjTuJFJufW0v', NULL, 'http://localhost', 1, 0, 0, '2022-04-13 14:50:48', '2022-04-13 14:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-04-13 14:50:48', '2022-04-13 14:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ali@g.c', '$2y$10$RMVYikNWCVz82cJbWaduB.IMlAEvuBSKqUKy/9tZJKMaX6X9E8A5y', '2022-02-08 11:17:15'),
('moosaazzurri@gmail.com', '6111', '2022-02-24 18:15:59'),
('newAccount@gmail.com', '1900', '2022-02-28 14:52:29'),
('ali@gmail.com', '1764', '2022-03-01 19:27:44'),
('bilal.azzuritech@gmail.com', '2447', '2022-03-25 18:18:21');

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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `class_id`, `title`, `icon`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chemistry', 'https://cdn-icons-png.flaticon.com/512/3081/3081530.png', '2022-03-22 19:43:34', '2022-03-22 19:43:34'),
(2, 1, 'Math', 'https://cdn-icons-png.flaticon.com/512/2249/2249488.png', NULL, NULL),
(3, 1, 'Physics', 'https://cdn-icons-png.flaticon.com/512/4069/4069174.png', NULL, NULL),
(4, 1, 'Computer', 'https://cdn-icons-png.flaticon.com/512/1055/1055687.png', NULL, '2022-05-12 02:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'asdf@sadf.c', NULL, '$2y$10$glmaUJwy4AKzeoc34ijjPepVptt/Ev6c8Kr7yKFfBphFzkQbZnJwe', NULL, '2022-04-13 14:49:31', '2022-04-13 14:49:31'),
(6, 'a@a.c', NULL, '$2y$10$Ro6Ojw3DuneW4PvleH5M3ueMMDlujdRHtrIosi7PiENbmij2bXOeK', NULL, '2022-04-13 14:56:00', '2022-04-13 14:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `FirstName`, `LastName`, `institute`, `gender`, `city`, `pp_path`, `email`, `number`, `verified`, `created_at`, `updated_at`) VALUES
(1, 1, '', '', 'lahore', 'male', 'lahore', 'http://education.thinkalizeglobal.com/storage/p_images/ali@g.c_profileImage_1.png', 'ali@g.c', '0', NULL, '2022-03-16 20:44:51', '2022-03-16 20:44:51'),
(2, 7, 'dfdd', 'df', 'dfsddds', 'dfffe', 'gvs', 'http://education.thinkalizeglobal.com/storage/p_images/_profileImage_7.png', 'ali@gmail.com', '0', NULL, '2022-03-17 16:16:10', '2022-03-31 20:54:21'),
(5, 5, 'sadf', 'dfasdf', NULL, NULL, NULL, NULL, 'asdf@sadf.c', '030013212313', NULL, '2022-04-13 14:49:31', '2022-04-13 14:49:31'),
(6, 6, 'sdads', 'asaaa', 'sdsdsad', 'Gender.male', 'Quetta', 'http://app.learnitsmarter.com/storage/p_images/_profileImage_6.jpg', 'a@a.c', '23234243242343', NULL, '2022-04-13 14:56:00', '2022-04-19 12:57:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_profiles_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
