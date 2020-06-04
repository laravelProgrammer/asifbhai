-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2020 at 04:29 PM
-- Server version: 8.0.19
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lescourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE `availabilities` (
  `id` int UNSIGNED NOT NULL,
  `teacher_id` int NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `subject_id` int NOT NULL,
  `level_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`id`, `teacher_id`, `start`, `end`, `created_at`, `updated_at`, `subject_id`, `level_id`) VALUES
(8, 4, '2020-03-27 15:00:00', '2020-03-27 16:00:00', '2020-03-27 05:02:28', '2020-03-27 05:02:28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int UNSIGNED NOT NULL,
  `availability_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `availability_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 8, 5, 'new', '2020-03-31 16:27:06', '2020-03-31 16:27:06'),
(3, 8, 5, 'new', '2020-04-01 06:46:05', '2020-04-01 06:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int UNSIGNED NOT NULL,
  `data_type_id` int UNSIGNED NOT NULL,
  `field` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text,
  `order` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 4),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 5),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 6),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 7),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 2),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 12),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 13),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 10),
(56, 8, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 8, 'code', 'text', 'Code', 0, 1, 1, 1, 1, 1, '{}', 2),
(58, 8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(59, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(60, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(61, 9, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(62, 9, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(63, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 8),
(64, 10, 'id', 'hidden', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(65, 10, 'teacher_id', 'hidden', 'Teacher', 1, 0, 0, 0, 0, 0, '{}', 2),
(68, 10, 'created_at', 'timestamp', 'Created At', 1, 0, 0, 0, 0, 0, '{}', 9),
(69, 10, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, '{}', 10),
(70, 1, 'user_hasmany_availability_relationship', 'relationship', 'Availabilities', 0, 1, 1, 1, 1, 0, '{\"model\":\"App\\\\Availability\",\"table\":\"availabilities\",\"type\":\"hasMany\",\"column\":\"teacher_id\",\"key\":\"id\",\"label\":\"date\",\"pivot_table\":\"availabilities\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(71, 10, 'availability_hasone_subject_relationship', 'relationship', 'Subject', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Subject\",\"table\":\"subjects\",\"type\":\"belongsTo\",\"column\":\"subject_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"availabilities\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(72, 10, 'subject_id', 'select_dropdown', 'Subject', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"Please Select a subject\"}}}', 5),
(73, 10, 'start', 'datetimepicker', 'Start', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"Please Select Start Time\"}}}', 7),
(74, 10, 'end', 'datetimepicker', 'End', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"Please Select End Time\"}}}', 8),
(75, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(76, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(77, 10, 'level_id', 'select_dropdown', 'Level', 1, 1, 1, 1, 1, 1, '{}', 3),
(78, 10, 'availability_hasone_level_relationship', 'relationship', 'Level', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Level\",\"table\":\"levels\",\"type\":\"belongsTo\",\"column\":\"level_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"availabilities\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(79, 10, 'availability_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"teacher_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"availabilities\",\"pivot\":\"0\",\"taggable\":null}', 11),
(80, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(81, 11, 'availability_id', 'text', 'Availability', 1, 1, 1, 1, 1, 1, '{}', 2),
(82, 11, 'user_id', 'text', 'User', 1, 1, 1, 1, 1, 1, '{}', 3),
(83, 11, 'status', 'text', 'Status', 0, 1, 1, 1, 1, 1, '{}', 4),
(84, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(85, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_name_singular` varchar(255) NOT NULL,
  `display_name_plural` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `policy_name` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2020-03-19 17:37:48', '2020-03-20 16:01:10'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(8, 'subjects', 'subjects', 'Subject', 'Subjects', 'voyager-book', 'App\\Subject', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"name\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-03-19 18:35:01', '2020-03-19 18:44:29'),
(9, 'levels', 'levels', 'Level', 'Levels', 'voyager-study', 'App\\Level', NULL, NULL, NULL, 1, 1, '{\"order_column\":\"name\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":\"name\",\"scope\":null}', '2020-03-19 18:37:30', '2020-03-24 10:57:29'),
(10, 'availabilities', 'availabilities', 'Availability', 'Availabilities', 'voyager-calendar', 'App\\Availability', NULL, '\\App\\Http\\Controllers\\Voyager\\AvailabilityController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-03-20 15:54:02', '2020-03-27 06:47:18'),
(11, 'bookings', 'bookings', 'Booking', 'Bookings', 'voyager-archive', 'App\\Booking', NULL, '\\App\\Http\\Controllers\\Voyager\\BookingController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-03-31 14:33:42', '2020-04-01 05:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'one', '2020-03-24 10:57:51', '2020-03-24 10:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-03-19 17:37:48', '2020-03-19 18:09:04'),
(2, 'teacher', '2020-03-20 15:26:30', '2020-03-20 15:26:39'),
(3, 'student', '2020-03-27 05:34:04', '2020-03-27 05:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int UNSIGNED NOT NULL,
  `menu_id` int UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `parameters` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-03-19 17:37:48', '2020-03-19 17:37:48', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, 10, 3, '2020-03-19 17:37:48', '2020-03-21 04:23:42', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 9, '2020-03-19 17:37:48', '2020-04-01 05:08:05', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 10, 2, '2020-03-19 17:37:48', '2020-03-21 04:23:42', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 10, '2020-03-19 17:37:48', '2020-04-01 05:08:05', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2020-03-19 17:37:48', '2020-03-19 18:38:02', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2020-03-19 17:37:48', '2020-03-19 18:38:02', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2020-03-19 17:37:48', '2020-04-01 05:08:05', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2020-03-19 17:37:48', '2020-04-01 05:08:05', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 11, '2020-03-19 17:37:48', '2020-04-01 05:08:05', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2020-03-19 17:37:48', '2020-04-01 05:08:05', 'voyager.hooks', NULL),
(15, 1, 'Subjects', '', '_self', 'voyager-book', '#000000', NULL, 3, '2020-03-19 18:35:01', '2020-03-19 18:44:03', 'voyager.subjects.index', 'null'),
(16, 1, 'Levels', '', '_self', 'voyager-study', '#000000', NULL, 2, '2020-03-19 18:37:30', '2020-03-19 18:43:38', 'voyager.levels.index', 'null'),
(17, 1, 'Teachers', '/dashboard/users?s=3&key=role_id&filter=equals', '_self', 'voyager-people', '#000000', NULL, 7, '2020-03-20 06:28:46', '2020-04-01 05:08:09', NULL, ''),
(18, 1, 'Parents', '/dashboard/users?s=4&key=role_id&filter=equals', '_self', 'voyager-window-list', '#000000', NULL, 8, '2020-03-20 14:12:30', '2020-04-01 05:08:09', NULL, ''),
(19, 1, 'Students', '/dashboard/users?s=2&key=role_id&filter=equals', '_self', 'voyager-list', '#000000', NULL, 6, '2020-03-20 15:18:54', '2020-04-01 05:08:12', NULL, ''),
(20, 2, 'Dashboard', '', '_self', 'voyager-boat', '#000000', NULL, 10, '2020-03-20 15:27:59', '2020-03-20 15:27:59', 'voyager.dashboard', NULL),
(21, 1, 'Availabilities', '', '_self', 'voyager-calendar', '#000000', NULL, 4, '2020-03-20 15:54:02', '2020-03-21 04:26:06', 'voyager.availabilities.index', 'null'),
(22, 2, 'My Availability', '/dashboard/availabilities', '_self', 'voyager-calendar', '#000000', NULL, 11, '2020-03-20 16:38:30', '2020-03-21 04:26:16', NULL, ''),
(24, 1, 'Setting', '', '_self', 'voyager-settings', '#000000', 10, 1, '2020-03-21 04:23:38', '2020-03-21 04:24:45', 'voyager.settings.index', 'null'),
(25, 3, 'Dashboard', '', '_self', 'voyager-boat', '#000000', NULL, 12, '2020-03-27 05:38:36', '2020-03-27 06:36:29', 'voyager.dashboard', 'null'),
(26, 3, 'Find Tutors', '/dashboard/tutor', '_self', 'voyager-search', '#000000', NULL, 13, '2020-03-27 10:51:08', '2020-03-27 10:51:08', NULL, ''),
(27, 1, 'Bookings', '', '_self', 'voyager-archive', '#000000', NULL, 5, '2020-03-31 14:33:42', '2020-04-01 05:09:01', 'voyager.bookings.index', 'null'),
(28, 3, 'My Bookings', '', '_self', 'voyager-archive', '#000000', NULL, 14, '2020-04-01 06:24:42', '2020-04-01 06:24:42', 'voyager.bookings.index', NULL),
(29, 2, 'My Sessions', '', '_self', 'voyager-archive', '#000000', NULL, 15, '2020-04-01 06:56:22', '2020-04-01 06:56:22', 'voyager.bookings.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_01_01_000000_add_voyager_user_fields', 1),
(3, '2016_01_01_000000_create_data_types_table', 1),
(4, '2016_05_19_173453_create_menu_table', 1),
(5, '2016_10_21_190000_create_roles_table', 1),
(6, '2016_10_21_190000_create_settings_table', 1),
(7, '2016_11_30_135954_create_permission_table', 1),
(8, '2016_11_30_141208_create_permission_role_table', 1),
(9, '2016_12_26_201236_data_types__add__server_side', 1),
(10, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(11, '2017_01_14_005015_create_translations_table', 1),
(12, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(13, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(14, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(15, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(16, '2017_08_05_000000_add_group_to_settings_table', 1),
(17, '2017_11_26_013050_add_user_role_relationship', 1),
(18, '2017_11_26_015000_create_user_roles_table', 1),
(19, '2018_03_11_000000_add_user_settings', 1),
(20, '2018_03_14_000000_add_details_to_data_types_table', 1),
(21, '2018_03_16_000000_make_settings_value_nullable', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2016_01_01_000000_create_pages_table', 2),
(24, '2016_01_01_000000_create_posts_table', 2),
(25, '2016_02_15_204651_create_categories_table', 2),
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(2, 'browse_bread', NULL, '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(3, 'browse_database', NULL, '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(4, 'browse_media', NULL, '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(5, 'browse_compass', NULL, '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(6, 'browse_menus', 'menus', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(7, 'read_menus', 'menus', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(8, 'edit_menus', 'menus', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(9, 'add_menus', 'menus', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(10, 'delete_menus', 'menus', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(11, 'browse_roles', 'roles', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(12, 'read_roles', 'roles', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(13, 'edit_roles', 'roles', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(14, 'add_roles', 'roles', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(15, 'delete_roles', 'roles', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(16, 'browse_users', 'users', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(17, 'read_users', 'users', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(18, 'edit_users', 'users', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(19, 'add_users', 'users', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(20, 'delete_users', 'users', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(21, 'browse_settings', 'settings', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(22, 'read_settings', 'settings', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(23, 'edit_settings', 'settings', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(24, 'add_settings', 'settings', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(25, 'delete_settings', 'settings', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(26, 'browse_hooks', NULL, '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(42, 'browse_subjects', 'subjects', '2020-03-19 18:35:01', '2020-03-19 18:35:01'),
(43, 'read_subjects', 'subjects', '2020-03-19 18:35:01', '2020-03-19 18:35:01'),
(44, 'edit_subjects', 'subjects', '2020-03-19 18:35:01', '2020-03-19 18:35:01'),
(45, 'add_subjects', 'subjects', '2020-03-19 18:35:01', '2020-03-19 18:35:01'),
(46, 'delete_subjects', 'subjects', '2020-03-19 18:35:01', '2020-03-19 18:35:01'),
(47, 'browse_levels', 'levels', '2020-03-19 18:37:30', '2020-03-19 18:37:30'),
(48, 'read_levels', 'levels', '2020-03-19 18:37:30', '2020-03-19 18:37:30'),
(49, 'edit_levels', 'levels', '2020-03-19 18:37:30', '2020-03-19 18:37:30'),
(50, 'add_levels', 'levels', '2020-03-19 18:37:30', '2020-03-19 18:37:30'),
(51, 'delete_levels', 'levels', '2020-03-19 18:37:30', '2020-03-19 18:37:30'),
(52, 'browse_availabilities', 'availabilities', '2020-03-20 15:54:02', '2020-03-20 15:54:02'),
(53, 'read_availabilities', 'availabilities', '2020-03-20 15:54:02', '2020-03-20 15:54:02'),
(54, 'edit_availabilities', 'availabilities', '2020-03-20 15:54:02', '2020-03-20 15:54:02'),
(55, 'add_availabilities', 'availabilities', '2020-03-20 15:54:02', '2020-03-20 15:54:02'),
(56, 'delete_availabilities', 'availabilities', '2020-03-20 15:54:02', '2020-03-20 15:54:02'),
(57, 'browse_tutor', '', NULL, NULL),
(58, 'browse_search_tutor', NULL, NULL, NULL),
(59, 'browse_bookings', 'bookings', '2020-03-31 14:33:42', '2020-03-31 14:33:42'),
(60, 'read_bookings', 'bookings', '2020-03-31 14:33:42', '2020-03-31 14:33:42'),
(61, 'edit_bookings', 'bookings', '2020-03-31 14:33:42', '2020-03-31 14:33:42'),
(62, 'add_bookings', 'bookings', '2020-03-31 14:33:42', '2020-03-31 14:33:42'),
(63, 'delete_bookings', 'bookings', '2020-03-31 14:33:42', '2020-03-31 14:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(52, 3),
(53, 1),
(53, 2),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 2),
(58, 2),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-03-19 17:37:48', '2020-03-19 17:37:48'),
(2, 'student', 'Student', '2020-03-19 17:37:48', '2020-03-19 18:22:42'),
(3, 'teacher', 'Teacher', '2020-03-19 18:23:04', '2020-03-19 18:23:04'),
(4, 'parent', 'Parent', '2020-03-20 06:25:55', '2020-03-20 06:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `details` text,
  `type` varchar(255) NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'LesCours', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Online Tutor', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'LesCours', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'A place to connect students to teachers at home', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(250) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, '38ni', 'English', '2020-03-20 17:48:07', '2020-03-20 17:48:07'),
(2, 'en-32', 'Urdu', '2020-03-27 10:21:00', '2020-03-27 10:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int UNSIGNED NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `column_name` varchar(255) NOT NULL,
  `foreign_key` int UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(22, 'menu_items', 'title', 13, 'pt', 'Publicações', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(24, 'menu_items', 'title', 12, 'pt', 'Categorias', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(25, 'menu_items', 'title', 14, 'pt', 'Páginas', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2020-03-19 17:37:59', '2020-03-19 17:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `settings` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$d.MD.dtwfytkqWIPaoP1Vet1wiKjwRAjInuegDFGCZRKS0woSGjdi', 'Zsvw3J3sJhpDFJucMyAtfwDFdVOyphx2qSfl9DhvUoPj3P7eMwqN2Kh2eKt9', NULL, '2020-03-19 17:37:59', '2020-03-19 17:37:59'),
(4, 3, 'Teacher', 'teacher@gmail.com', 'users/default.png', NULL, '$2y$10$D6fGP9bRTnvdcSbePKrve.AkeXLcwNd6Peaqyrjxur7i9piCfG/iG', 'cYO0xrEdCVR4W3o4eNn369rvAv2QpkoUrqKWY7T7ktIQLGVbuOPNF6QNMQ04', '{\"locale\":\"en\"}', '2020-03-20 15:21:23', '2020-03-20 15:21:23'),
(5, 2, 'Student', 'student@gmail.com', 'users/default.png', NULL, '$2y$10$LUMBa1BiBj5iAOSOg/nfzuIjcq.ZJgF0gkHvYyEfJYKuRtvynsN8S', 'uNZQ77T9Ocu5Ec3DO2nGBxsB3OF93mkO0aphKW49xfGRf4l4ZETxC5qopZFO', '{\"locale\":\"en\"}', '2020-03-20 15:21:40', '2020-03-20 15:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availabilities`
--
ALTER TABLE `availabilities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
