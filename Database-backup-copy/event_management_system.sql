-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2023 at 07:51 AM
-- Server version: 5.7.24
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'admin@ems.com', 'profile-placeholder.jpg', NULL, '$2y$10$pAykJ7jtP67WYmKKoJ8O.eDpu7dzS0KantxHGhly0oGGTw/Jj6bjm', NULL, '2023-07-04 03:39:24', '2023-07-04 03:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eo_last_seen_at` timestamp NULL DEFAULT NULL,
  `user_last_seen_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `sender`, `receiver`, `created_at`, `updated_at`, `sender_type`, `eo_last_seen_at`, `user_last_seen_at`) VALUES
('6cc1d792-5fd8-48a1-80a6-8c1a0c1782cd', 'a2855510-a226-4f02-9295-01d2478ab02e', '83c216e4-41c3-44b4-933b-62c1710a482c', '2023-07-30 13:53:32', '2023-07-30 13:55:18', 'user', '2023-07-30 13:55:18', '2023-07-30 13:53:32'),
('6fe23b0c-018d-4c9b-9096-00dd69c06937', '7c15eb03-0cba-4724-aab8-d74a4253e6a9', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', '2023-07-17 08:37:33', '2023-07-17 08:37:43', 'user', NULL, NULL),
('7f5b90f3-6c68-4150-b328-89f1300fa6da', 'a2855510-a226-4f02-9295-01d2478ab02e', 'e8650430-8fe9-489b-8453-cb843e05ff0d', '2023-08-02 03:10:27', '2023-08-02 03:10:27', 'user', NULL, '2023-08-02 03:10:27'),
('93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', '2023-07-19 13:55:39', '2023-07-22 03:41:27', 'user', NULL, NULL),
('f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', '2023-07-09 07:28:37', '2023-07-16 07:28:03', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `datetime` timestamp NULL DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_organizer_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `image`, `description`, `datetime`, `country`, `city`, `address`, `event_organizer_id`, `organizer_type`, `is_approved`, `created_at`, `updated_at`) VALUES
(7, 'Ut illo consequatur et.', 'geoffrey-canada1680072100.jpg', 'Deserunt adipisci ut ipsa voluptas voluptatem dolorum necessitatibus. Natus quisquam dolor sunt autem. Laboriosam iste velit id aut accusamus tempora et.', '2023-03-26 14:00:00', 'Pakistan', 'Islamabad', 'Harum id necessitatibus minima nihil.', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'eo', 1, '2023-03-26 08:30:51', '2023-08-05 02:00:49'),
(13, 'Pub G gamers Meetup', 'Best-PUBG-Players1679987148.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2023-03-30 01:41:00', 'Pakistan', 'Islamabad', '433 street', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'eo', 1, '2023-03-27 20:42:50', '2023-03-27 21:05:48'),
(14, 'call of duty players concert', 'maxresdefault1679987158.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2023-04-12 03:45:00', 'Pakistan', 'Islamabad', 'aierpascl;', 'e8650430-8fe9-489b-8453-cb843e05ff0d', 'eo', 1, '2023-03-27 20:46:35', '2023-03-27 21:05:58'),
(15, 'Woman\'s rights conference', 'women-rights-saudi-conference1679987166.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2023-05-24 04:47:00', 'Pakistan', 'Islamabad', '436:93 street', 'e8650430-8fe9-489b-8453-cb843e05ff0d', 'eo', 1, '2023-03-27 20:47:58', '2023-03-27 21:06:06'),
(17, 'TLC Meetup', 'a04d1ece-9a34-4376-9a1a-01adf6365d3c1690743019.jpg', 'test event', '2023-07-31 18:49:00', 'Pakistan', 'Islamabad', '433 street california', '83c216e4-41c3-44b4-933b-62c1710a482c', 'eo', 1, '2023-07-30 13:50:20', '2023-08-02 01:38:05'),
(18, 'Qui architecto tempora voluptatem iusto', 'Budgerigar11691218092.jpg', NULL, '2023-08-05 06:48:00', 'Pakistan', 'Akora', '433 street california', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'eo', 1, '2023-08-05 01:48:13', '2023-08-05 02:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `event_organizers`
--

CREATE TABLE `event_organizers` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_organizers`
--

INSERT INTO `event_organizers` (`id`, `name`, `email`, `country`, `city`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'testuser786', 'user786@test.com', 'Pakistan', 'Talagang', 'profile-placeholder.jpg', NULL, '$2y$10$WoJe/h3ODx2STcd14GfYNOj7DMdHjz41mJu3BkkV3XRu/9YRYStuS', NULL, '2023-07-04 07:39:16', '2023-07-04 07:39:16'),
('83c216e4-41c3-44b4-933b-62c1710a482c', 'EO321', 'eo321@organizer.com', 'Pakistan', 'Talagang', 'profile-placeholder.jpg', NULL, '$2y$10$Rvo0Sfnfg7XNdZMyPE6qe.ctLjntD9uMbevR4mkjxJd9pSOMkMLrm', NULL, '2023-07-29 13:45:36', '2023-07-29 13:45:36'),
('e8650430-8fe9-489b-8453-cb843e05ff0d', 'test user', 'test@user.com', 'Bangladesh', 'Badarganj', 'profile-placeholder.jpg', NULL, '$2y$10$WoJe/h3ODx2STcd14GfYNOj7DMdHjz41mJu3BkkV3XRu/9YRYStuS', NULL, '2023-07-04 07:39:16', '2023-07-04 07:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `event_organizer_password_resets`
--

CREATE TABLE `event_organizer_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `from`, `body`, `created_at`, `updated_at`, `read_at`) VALUES
(94, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hi', '2023-07-09 07:28:37', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(99, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hdfghf', '2023-07-09 08:05:02', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(102, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testing', '2023-07-09 08:14:19', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(106, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hi eo', '2023-07-10 07:50:03', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(107, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hi', '2023-07-10 07:51:12', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(108, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'error testing', '2023-07-10 07:56:19', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(109, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'error testing', '2023-07-10 07:57:53', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(110, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'err test', '2023-07-10 08:00:17', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(111, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testing errr', '2023-07-10 08:02:44', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(112, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'err', '2023-07-10 08:04:59', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(113, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'erro testing', '2023-07-10 08:05:55', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(114, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'roo', '2023-07-10 08:07:47', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(115, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'sdfdfsd', '2023-07-10 08:08:44', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(116, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'ghffj', '2023-07-10 08:11:57', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(117, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', ';l;jkl', '2023-07-10 08:12:21', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(118, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testing', '2023-07-10 08:13:12', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(119, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hi', '2023-07-10 08:14:09', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(120, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'gjkkjg', '2023-07-10 08:17:04', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(121, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'error testing', '2023-07-10 08:17:38', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(122, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testing', '2023-07-10 08:19:56', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(123, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hello testing', '2023-07-10 08:24:48', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(124, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hello eo how are you doing', '2023-07-10 08:25:38', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(125, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'erros teting', '2023-07-10 08:30:49', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(126, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'error test', '2023-07-10 08:32:31', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(127, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testing', '2023-07-10 08:33:18', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(128, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'he is testing', '2023-07-10 08:36:53', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(129, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'fg', '2023-07-10 08:37:40', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(130, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'teasing', '2023-07-10 08:39:54', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(131, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'dghshfhgfg', '2023-07-10 08:40:53', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(132, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'error testing', '2023-07-10 08:41:45', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(133, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'i got sumer time', '2023-07-10 08:43:00', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(134, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testt', '2023-07-10 08:46:47', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(135, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'ghjfgjfg', '2023-07-10 08:47:22', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(136, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testing for errors', '2023-07-10 08:58:50', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(137, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testing for erros', '2023-07-10 08:59:40', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(138, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testing shaty tot', '2023-07-10 09:00:53', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(139, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'testing', '2023-07-10 09:07:15', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(140, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'error testing', '2023-07-10 09:09:12', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(141, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'error testing', '2023-07-10 09:19:51', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(142, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hello testing', '2023-07-10 09:20:55', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(143, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hello testing', '2023-07-10 09:24:33', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(144, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'error testing', '2023-07-10 09:24:51', '2023-07-11 08:42:32', '2023-07-11 08:42:32'),
(145, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'hello', '2023-07-11 08:22:42', '2023-07-12 08:30:54', '2023-07-12 08:30:54'),
(146, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'testing', '2023-07-11 08:29:20', '2023-07-12 08:30:54', '2023-07-12 08:30:54'),
(147, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'final testing', '2023-07-12 03:08:43', '2023-07-12 07:43:04', '2023-07-12 07:43:04'),
(148, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'ok from eo', '2023-07-12 07:50:04', '2023-07-12 08:30:54', '2023-07-12 08:30:54'),
(149, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hello zeeshan are you online', '2023-07-14 13:02:28', '2023-07-16 07:28:03', '2023-07-16 07:28:03'),
(150, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'teeasing', '2023-07-16 06:42:12', '2023-07-16 07:28:03', '2023-07-16 07:28:03'),
(151, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hi', '2023-07-16 06:50:37', '2023-07-16 07:28:03', '2023-07-16 07:28:03'),
(152, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hello', '2023-07-16 06:50:58', '2023-07-16 07:28:03', '2023-07-16 07:28:03'),
(153, 'f917e197-af48-448f-bdd8-2c7f4804f20e', '6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'hi', '2023-07-16 06:52:52', '2023-07-16 07:28:03', '2023-07-16 07:28:03'),
(169, '6fe23b0c-018d-4c9b-9096-00dd69c06937', '7c15eb03-0cba-4724-aab8-d74a4253e6a9', 'hello zeeshan', '2023-07-17 08:37:33', '2023-07-17 08:37:43', '2023-07-17 08:37:43'),
(170, '6fe23b0c-018d-4c9b-9096-00dd69c06937', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'hi user786', '2023-07-17 08:37:50', '2023-07-17 08:37:50', NULL),
(171, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', 'hello zeeshan how are you doing?', '2023-07-19 13:55:39', '2023-07-19 13:55:51', '2023-07-19 13:55:51'),
(172, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'hi user616 i am fine? how may i help you', '2023-07-19 13:56:09', '2023-07-19 13:56:09', NULL),
(173, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', 'i want to discuss about a pubG players event you are going to host', '2023-07-19 13:56:58', '2023-07-19 13:57:12', '2023-07-19 13:57:12'),
(174, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'is sy sabit hua k kuch garh barh hy chat mein muje chak krna parhy ga', '2023-07-19 13:57:32', '2023-07-19 13:57:32', NULL),
(175, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', 'pr chalein ap logo ko andaza ho gya hoga mein kia bana raha hn', '2023-07-19 13:57:46', '2023-07-19 13:58:46', '2023-07-19 13:58:46'),
(176, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'ye dekhein JS ik msg ko 2 bar add kr rahi hy lekin asal mein msg sirf ik bar hi aya hy', '2023-07-19 13:58:15', '2023-07-19 13:58:15', NULL),
(177, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', 'ye event Organizer wali side pr kuch masla hy', '2023-07-19 13:58:35', '2023-07-19 13:58:46', '2023-07-19 13:58:46'),
(178, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'ok by got a lot to do', '2023-07-19 13:59:09', '2023-07-19 13:59:09', NULL),
(179, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', 'hello zee', '2023-07-22 03:32:15', '2023-07-22 03:32:27', '2023-07-22 03:32:27'),
(180, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', 'is working fine now', '2023-07-22 03:32:39', '2023-07-22 03:33:20', '2023-07-22 03:33:20'),
(181, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', 'testing again for double msgz', '2023-07-22 03:33:39', '2023-07-22 03:41:11', '2023-07-22 03:41:11'),
(182, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', 'i think now its working fine', '2023-07-22 03:34:00', '2023-07-22 03:41:11', '2023-07-22 03:41:11'),
(183, '93b13a36-c330-48e9-b1a3-4528ab3769f9', '700411ec-5bb0-4b23-8ee0-21dc7562f308', 'new update test kr raha hn', '2023-07-22 03:41:24', '2023-07-22 03:41:27', '2023-07-22 03:41:27'),
(184, '6cc1d792-5fd8-48a1-80a6-8c1a0c1782cd', 'a2855510-a226-4f02-9295-01d2478ab02e', 'hello 321 how about a little  bit testing', '2023-07-30 13:53:32', '2023-07-30 13:54:27', '2023-07-30 13:54:27'),
(185, '6cc1d792-5fd8-48a1-80a6-8c1a0c1782cd', 'a2855510-a226-4f02-9295-01d2478ab02e', 'are you there?', '2023-07-30 13:54:21', '2023-07-30 13:54:27', '2023-07-30 13:54:27'),
(186, '6cc1d792-5fd8-48a1-80a6-8c1a0c1782cd', '83c216e4-41c3-44b4-933b-62c1710a482c', 'Yes i am here', '2023-07-30 13:54:35', '2023-07-30 13:54:35', NULL),
(187, '6cc1d792-5fd8-48a1-80a6-8c1a0c1782cd', 'a2855510-a226-4f02-9295-01d2478ab02e', 'ok lets talk', '2023-07-30 13:54:47', '2023-07-30 13:54:49', '2023-07-30 13:54:49'),
(188, '6cc1d792-5fd8-48a1-80a6-8c1a0c1782cd', 'a2855510-a226-4f02-9295-01d2478ab02e', 'ok, so what is it you wanna talk about?', '2023-07-30 13:55:16', '2023-07-30 13:55:18', '2023-07-30 13:55:18'),
(189, '6cc1d792-5fd8-48a1-80a6-8c1a0c1782cd', '83c216e4-41c3-44b4-933b-62c1710a482c', 'it\'s the things you do in your free time', '2023-07-30 13:55:35', '2023-07-30 13:55:35', NULL),
(190, '7f5b90f3-6c68-4150-b328-89f1300fa6da', 'a2855510-a226-4f02-9295-01d2478ab02e', 'hello test user', '2023-08-02 03:10:27', '2023-08-02 03:10:27', NULL);

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
(5, '2023_03_15_180311_create_admins_table', 1),
(6, '2023_03_15_180348_create_event_organizers_table', 1),
(7, '2023_03_21_072649_create_event_organizer_password_resets_table', 1),
(8, '2023_03_22_164417_create_events_table', 1),
(9, '2023_03_22_164708_create_user_interested_events_table', 1),
(16, '2023_06_28_075848_create_conversations_table', 2),
(17, '2023_07_02_164522_create_messages_table', 2),
(18, '2023_07_03_164320_add_sender_type_column_in_conversations_table', 2),
(19, '2023_07_08_064747_add_read_at_column_in_messages_table', 3),
(22, '2023_07_12_125418_add_sender_last_seen_and_receiver_last_seen_columns_in_conversations_table', 4),
(24, '2023_07_25_125419_create_users_interested_events_table', 5);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `country`, `city`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('022004ad-5c56-4aae-b3cd-33ce2d13b179', 'Test user', 'User@test.com', 'Pakistan', 'Abbottabad', NULL, NULL, '$2y$10$WoJe/h3ODx2STcd14GfYNOj7DMdHjz41mJu3BkkV3XRu/9YRYStuS', 'xVG4LYbXIirQOpj3AZeWeDd8ayKFP4IhuMJ8ae8OuesLz0zqjrx9kVXxudqx', '2023-03-27 22:22:41', '2023-08-05 01:59:49'),
('6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'Faizan', 'faizan@test.com', 'Pakistan', 'Talagang', NULL, NULL, '$2y$10$WoJe/h3ODx2STcd14GfYNOj7DMdHjz41mJu3BkkV3XRu/9YRYStuS', 'xOJAIQNW81bzOgDPGQ2LVRsjD4Wvn9nGtR2AvI3piNgteq6BxnnbDOtG617W', '2023-03-27 22:22:41', '2023-03-28 20:10:11'),
('700411ec-5bb0-4b23-8ee0-21dc7562f308', 'user616', 'user616@test.com', 'Pakistan', 'Abbottabad', 'profile-placeholder.jpg', NULL, '$2y$10$1Whyx7SUgFYtqx6ZlOm7FO3PHvdYPBWjgDaLRIWTnbxc5mMNWsEj2', NULL, '2023-07-19 13:54:29', '2023-07-19 13:54:29'),
('7c15eb03-0cba-4724-aab8-d74a4253e6a9', 'user786', 'user786@test.com', 'Pakistan', 'Bhakkar', 'profile-placeholder.jpg', NULL, '$2y$10$TgiRbDSIzTwsSu5jvpU95eVCRB7u4u.2UtSPatb6Jwe3PztKvTOXq', NULL, '2023-07-16 07:29:57', '2023-07-16 07:29:57'),
('a2855510-a226-4f02-9295-01d2478ab02e', 'user321', 'user321@test.com', 'Pakistan', 'Talagang', 'profile-placeholder.jpg', NULL, '$2y$10$/mKyzURzy6rb27Zzs3AK2u5HXCObdOPokwy1SXy/5Q6K6mcLkEnAy', NULL, '2023-07-30 06:49:08', '2023-07-30 06:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `users_interested_events`
--

CREATE TABLE `users_interested_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `events_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_interested_events`
--

INSERT INTO `users_interested_events` (`id`, `users_id`, `events_id`, `created_at`, `updated_at`) VALUES
(2, 'a2855510-a226-4f02-9295-01d2478ab02e', 14, NULL, NULL),
(3, 'a2855510-a226-4f02-9295-01d2478ab02e', 13, NULL, NULL);

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
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_event_organizer_id_foreign` (`event_organizer_id`);

--
-- Indexes for table `event_organizers`
--
ALTER TABLE `event_organizers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_organizers_email_unique` (`email`);

--
-- Indexes for table `event_organizer_password_resets`
--
ALTER TABLE `event_organizer_password_resets`
  ADD KEY `event_organizer_password_resets_email_index` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_interested_events`
--
ALTER TABLE `users_interested_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_interested_events_users_id_foreign` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_interested_events`
--
ALTER TABLE `users_interested_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_event_organizer_id_foreign` FOREIGN KEY (`event_organizer_id`) REFERENCES `event_organizers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_interested_events`
--
ALTER TABLE `users_interested_events`
  ADD CONSTRAINT `users_interested_events_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
