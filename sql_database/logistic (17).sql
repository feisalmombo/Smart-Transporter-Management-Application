-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 09:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistic`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `changetype` varchar(191) CHARACTER SET latin1 NOT NULL,
  `changeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `changetype`, `changeDate`, `created_at`, `updated_at`) VALUES
(1, 1, 'DELETE CONTAINER', '2019-12-01 14:40:18', NULL, '2019-12-01 11:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `adds_new_drivers`
--

CREATE TABLE `adds_new_drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `attachments_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adds_new_drivers`
--

INSERT INTO `adds_new_drivers` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `phone_number`, `gender_id`, `attachments_path`, `address`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(1, 'Ruth', 'Wynter', 'Kylynn', 'ruth@gmail.com', '+1 (971) 677-5311', 2, 'attachment/AAeZPYYPFi7TIhl96Vi7RakcqTwV8VMnCITZpV6H.pdf', 'Masaki', '1978-04-21', '2019-11-28 09:03:41', '2019-11-28 09:03:41'),
(2, 'Jeremy', 'Leonard', 'Greer', 'Jeremy@yahoo.com', '+1 (467) 256-9642', 1, 'attachment/58urjuQkdDqWkBE0Cr2c7MqDAHT3r269hKVb1vwK.pdf', 'Msasani', '1963-01-28', '2019-11-28 09:04:57', '2019-11-28 09:04:57'),
(3, 'Dacey', 'Lacy', 'Odessa', 'dacey@gmail.com', '+1 (248) 736-1891', 2, 'attachment/ZBPGfUYxE9w6a71rhMWYXnl6bdZUa8BHvXK8JMw7.pdf', 'Morogoro', '1992-09-17', '2019-11-28 09:06:23', '2019-11-28 09:06:23'),
(4, 'Upton', 'Florence', 'Ulla', 'upton@rocketmail.com', '+1 (252) 626-7525', 1, 'attachment/ZXhAdItEjL1V5SJ6pHMFGzaZgOIAGGjewzpsKgIa.pdf', 'Kisarawe', '1977-03-27', '2019-11-28 09:07:23', '2019-11-28 09:07:23'),
(5, 'Leonard', 'Karleigh', 'Scarlet', 'leonard@gmail.com', '+1 (479) 816-6071', 1, 'attachment/m1oTwTSEpmjeEkvWGkM8AK5xDyJrH90nocHsU315.pdf', 'Makaya, Same', '1987-10-28', '2019-11-28 09:08:36', '2019-11-28 09:08:36'),
(6, 'Candace', 'Hanna', 'Ezekiel', 'candance@yahoo.com', '+1 (813) 761-6411', 2, 'attachment/EbLkOf1upgX86EaT16VozVmnjCoMJmRPSRxUvDpZ.pdf', 'Lushoto', '1977-09-10', '2019-11-28 09:09:40', '2019-11-28 09:09:40');

--
-- Triggers `adds_new_drivers`
--
DELIMITER $$
CREATE TRIGGER `adds_new_drivers_before_delete` BEFORE DELETE ON `adds_new_drivers` FOR EACH ROW BEGIN
   INSERT INTO activity_logs
   SET changetype = 'DELETE DRIVER',
   changeDate=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adds_new_vehicles`
--

CREATE TABLE `adds_new_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `plate_horse_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semi_trailer` tinyint(1) DEFAULT '0',
  `attachments_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adds_new_vehicles`
--

INSERT INTO `adds_new_vehicles` (`id`, `plate_horse_number`, `semi_trailer`, `attachments_path`, `created_at`, `updated_at`) VALUES
(1, 'T 216 DSM', 1, 'Vehicleattachments/dKPF2UB7OVoVVbNBoxqBw60Zwx5d9UTPOTFQbLdb.pdf', '2019-11-28 10:03:35', '2019-11-28 10:03:35'),
(2, 'T 009 DMB', 1, 'Vehicleattachments/zyGAB8ANajDd8sowXVts3XuWMPgiHUuHDvOgdpwH.pdf', '2019-11-28 10:04:23', '2019-11-28 10:04:23'),
(3, 'T 100 DPP', NULL, 'Vehicleattachments/BQ6CGUk3s85gKFNNA3k08JFI28UIQcjK52GeNpge.pdf', '2019-11-28 10:05:00', '2019-11-28 10:05:00'),
(4, 'T SALMA', 1, 'Vehicleattachments/ScDu0Lv2U6lxHNEeRfIOf95MSK1HXeOOrfCXWkng.pdf', '2019-11-28 10:05:40', '2019-11-28 10:05:40'),
(5, 'T 329 DVR', 1, 'Vehicleattachments/MPWXDu4f2Ih5ffkVQg5dmp7isUvfXhuaEdWZ2C3L.pdf', '2019-11-28 10:06:59', '2019-11-28 10:06:59'),
(6, 'T 708 DAD', 1, 'Vehicleattachments/E0unNuAUt7rf2NrQmpKLvgXncmg1jmEwhBZ6U5EW.pdf', '2019-11-28 10:14:52', '2019-11-28 10:14:52');

--
-- Triggers `adds_new_vehicles`
--
DELIMITER $$
CREATE TRIGGER `adds_new_vehicles` BEFORE DELETE ON `adds_new_vehicles` FOR EACH ROW BEGIN
   INSERT INTO activity_logs
   SET changetype = 'DELETE VEHICLE',
   changeDate=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `after_attends`
--

CREATE TABLE `after_attends` (
  `id` int(10) UNSIGNED NOT NULL,
  `requestcustomer_id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `attend_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `after_attends`
--

INSERT INTO `after_attends` (`id`, `requestcustomer_id`, `vehicle_id`, `driver_id`, `user_id`, `attend_description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, 'Ok this car is attended successfully.', '2019-11-28 10:22:40', '2019-11-28 10:22:40'),
(2, 3, 1, 4, 1, 'ok', '2019-12-01 12:16:15', '2019-12-01 12:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `bodytypes`
--

CREATE TABLE `bodytypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `body_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bodytypes`
--

INSERT INTO `bodytypes` (`id`, `body_type_name`, `created_at`, `updated_at`) VALUES
(1, 'Flat Body', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(2, 'Trail', '2019-11-28 08:04:24', '2019-11-28 08:04:24');

--
-- Triggers `bodytypes`
--
DELIMITER $$
CREATE TRIGGER `bodytypes_before_delete` BEFORE DELETE ON `bodytypes` FOR EACH ROW BEGIN
   INSERT INTO activity_logs
   SET changetype = 'DELETE BODYTYPE',
   changeDate=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE `containers` (
  `id` int(10) UNSIGNED NOT NULL,
  `container_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `containers`
--

INSERT INTO `containers` (`id`, `container_name`, `created_at`, `updated_at`) VALUES
(1, '20 ft Container', '2019-11-28 08:04:24', '2019-12-01 11:38:06'),
(2, '40 ft Container', '2019-11-28 08:04:24', '2019-12-01 11:38:31'),
(3, 'Loose Cargo', '2019-11-28 08:04:24', '2019-11-28 08:04:24');

--
-- Triggers `containers`
--
DELIMITER $$
CREATE TRIGGER `containers_before_delete` BEFORE DELETE ON `containers` FOR EACH ROW BEGIN
   INSERT INTO activity_logs
   SET changetype = 'DELETE CONTAINER',
   changeDate=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `driver_vehicles`
--

CREATE TABLE `driver_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `adds_new_drivers_id` int(10) UNSIGNED NOT NULL,
  `adds_new_vehicles_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_vehicles`
--

INSERT INTO `driver_vehicles` (`id`, `adds_new_drivers_id`, `adds_new_vehicles_id`) VALUES
(1, 5, 1),
(2, 1, 2),
(3, 4, 3),
(4, 3, 4),
(5, 2, 5),
(6, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `gender_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender_name`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(2, 'Female', '2019-11-28 08:04:24', '2019-11-28 08:04:24');

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
(141, '2019_10_01_042604_create_users_table', 1),
(142, '2019_10_01_042842_create_roles_table', 1),
(143, '2019_10_01_043109_create_permissions_table', 1),
(144, '2019_10_01_043358_create_users_permissions_table', 1),
(145, '2019_10_01_043531_create_users_roles_table', 1),
(146, '2019_10_01_043715_create_roles_permissions_table', 1),
(147, '2019_10_01_043911_create_user_statuses_table', 1),
(148, '2019_10_01_050619_create_bodytypes_table', 1),
(149, '2019_10_01_050850_create_containers_table', 1),
(150, '2019_10_01_051105_create_genders_table', 1),
(151, '2019_10_01_051609_create_trucktypes_table', 1),
(152, '2019_10_01_064009_create_adds_new_drivers_table', 1),
(153, '2019_10_01_065137_create_adds_new_vehicles_table', 1),
(154, '2019_10_01_104309_create_activity_logs_table', 1),
(155, '2019_10_23_072524_create_driver_vehicles_table', 1),
(156, '2019_11_14_050508_create_request_customers_table', 1),
(157, '2019_11_14_051027_create_request_items_table', 1),
(158, '2019_11_17_195721_create_after_attends_table', 1),
(159, '2019_11_27_065919_create_trailers_table', 1),
(160, '2019_11_27_071319_create_trailer_vehicles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'create', 'Create', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(2, 'edit', 'Edit', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(3, 'delete', 'Delete', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(4, 'update', 'Update', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(5, 'manage_users', 'manage users', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(6, 'view_feedback', 'View Feedback', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(7, 'create_feedback', 'Create Feedback', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(8, 'assign_vehicle', 'Assign Vehicle', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(9, 'manage_privileges', 'Manage Privileges', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(10, 'view_request', 'View Request', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(11, 'create_request', 'Create Request', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(12, 'view_driver', 'View Driver', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(13, 'create_driver', 'Create Driver', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(14, 'edit_driver', 'Edit Driver', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(15, 'update_driver', 'Update Driver', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(16, 'delete_driver', 'Delete Driver', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(17, 'view_vehicle', 'View Vehicle', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(18, 'create_vehicle', 'Create Vehicle', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(19, 'edit_vehicle', 'Edit Vehicle', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(20, 'update_vehicle', 'Update Vehicle', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(21, 'delete_vehicle', 'Delete Vehicle', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(22, 'view_user', 'View User', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(23, 'create_user', 'Create User', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(24, 'edit_user', 'Edit User', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(25, 'delete_user', 'Delete User', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(26, 'update_user', 'Update User', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(27, 'reset_password', 'Reset Password', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(28, 'create_customer', 'Create Customer', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(29, 'view_attendRequest', 'View AttendRequest', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(30, 'view_trucktype', 'View Trucktype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(31, 'create_trucktype', 'Create Trucktype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(32, 'edit_trucktype', 'Edit Trucktype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(33, 'update_trucktype', 'Update Trucktype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(34, 'delete_trucktype', 'Delete TruckType', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(35, 'view_bodytype', 'View Bodytype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(36, 'create_bodytype', 'Create Bodytype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(37, 'edit_bodytype', 'Edit Bodytype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(38, 'update_bodytype', 'Update Bodytype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(39, 'delete_bodytype', 'Delete Bodytype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(40, 'view_containertype', 'View Containertype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(41, 'create_containertype', 'Create Containertype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(42, 'edit_containertype', 'Edit Containertype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(43, 'update_containertype', 'Update Containertype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(44, 'delete_containertype', 'Delete Containertype', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(45, 'download_driver', 'Download Driver', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(46, 'download_vehicle', 'Download Vehicle', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(47, 'view_allstatus', 'View Allstatus', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(48, 'show_request', 'Show Request', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(49, 'download_request', 'Download Request', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(50, 'view_attendedRequest', 'View AttendedRequest', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(51, 'view_trailer', 'View Trailer', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(52, 'create_trailer', 'Create Trailer', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(53, 'edit_trailer', 'Edit trailer', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(54, 'delete_trailer', 'Delete Trailer', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(55, 'view_notification', 'View Notification', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(56, 'create_notification', 'Create Notification', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(57, 'show_notification', 'Show Notification', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(58, 'update_notification', 'Update Notification', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(59, 'download_requestItem', 'Download RequestItem', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(60, 'show_requestItem', 'Show RequestItem', '2019-11-28 21:00:00', '2019-11-28 21:00:00'),
(61, 'download_attendedRequests', 'Download AttendedRequests', '2019-11-28 21:00:00', '2019-11-28 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `request_customers`
--

CREATE TABLE `request_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_allocated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_customers`
--

INSERT INTO `request_customers` (`id`, `customer_id`, `status`, `time_allocated`, `created_at`, `updated_at`) VALUES
(1, 1, 'Attended', '2019-11-28 11:30:36', '2019-11-28 08:30:36', '2019-11-28 10:21:55'),
(2, 2, 'Attended', '2019-11-28 14:19:06', '2019-11-28 11:19:06', '2019-12-02 03:28:14'),
(3, 7, 'Attended', '2019-12-01 15:04:33', '2019-12-01 12:04:33', '2019-12-01 12:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `request_items`
--

CREATE TABLE `request_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `goods_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_packages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `truck_id` int(10) UNSIGNED NOT NULL,
  `requestcustomer_id` int(10) UNSIGNED NOT NULL,
  `origin_point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `container_id` int(10) UNSIGNED NOT NULL,
  `trip_duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachments_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_requests` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_items`
--

INSERT INTO `request_items` (`id`, `goods_description`, `weight`, `number_of_packages`, `truck_id`, `requestcustomer_id`, `origin_point`, `destination_point`, `container_id`, `trip_duration`, `attachments_path`, `details_requests`, `created_at`, `updated_at`) VALUES
(1, '100% Polyester and wax products', '1000 Tones', '3720', 1, 1, 'Dodoma', 'Arusha', 1, '9 hours', 'Requestattachment/v61zsHKFU6qr7qXChzOURQVIef4eUcli0JpEFdK8.pdf', 'Please make sure that my bags secure at a good condition.', '2019-11-28 08:30:36', '2019-11-28 08:30:36'),
(2, 'Building Materials', '100 Tones', '3450', 1, 2, 'Sumbawanga', 'Manyara', 2, '10 hours', 'Requestattachment/oFyVn6y9mC3C59UXXWIj5NbzyqBNn5VfiOL8Q4Y8.pdf', 'This is the Building material from Sumbawanga to Manyara please this package must be arrive on time.', '2019-11-28 11:19:06', '2019-11-28 11:19:06'),
(3, 'Building Materials and tiles', '28 Tones', '100', 1, 3, 'Bandari', 'Mwanza', 1, '9 hours', 'Requestattachment/J2fPahoRI0hQG0iSjB3Mg5x4Sqf8KAeVALUmkt37.pdf', NULL, '2019-12-01 12:04:33', '2019-12-01 12:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'Developer', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(2, 'customer', 'Customer', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(3, 'administrator', 'Administrator', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(4, 'transporter', 'Transporter', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(5, 'manager', 'Manager', '2019-11-28 08:04:24', '2019-11-28 08:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(3, 5),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 45),
(4, 46),
(4, 51),
(4, 52),
(4, 53),
(4, 54),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(5, 38),
(5, 39),
(5, 40),
(5, 41),
(5, 42),
(5, 43),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 51),
(5, 52),
(5, 53),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(5, 59),
(5, 60),
(5, 61);

-- --------------------------------------------------------

--
-- Table structure for table `trailers`
--

CREATE TABLE `trailers` (
  `id` int(10) UNSIGNED NOT NULL,
  `trailer_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bodytype_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trailers`
--

INSERT INTO `trailers` (`id`, `trailer_number`, `bodytype_id`, `created_at`, `updated_at`) VALUES
(1, 'TRN 647', 1, '2019-11-28 09:11:07', '2019-11-28 09:11:07'),
(2, 'TRN 130', 2, '2019-11-28 09:11:19', '2019-11-28 09:11:19'),
(3, 'TRN 190', 1, '2019-11-28 09:11:31', '2019-11-28 09:11:31'),
(4, 'TRN 980', 2, '2019-11-28 09:11:46', '2019-11-28 09:11:46'),
(5, 'TRN 476', 1, '2019-11-28 09:12:01', '2019-11-28 09:12:01'),
(6, 'TRN 982', 2, '2019-11-28 09:12:21', '2019-11-28 09:12:21');

--
-- Triggers `trailers`
--
DELIMITER $$
CREATE TRIGGER `trailers_before_delete` BEFORE DELETE ON `trailers` FOR EACH ROW BEGIN
   INSERT INTO activity_logs
   SET changetype = 'DELETE Trailer',
   changeDate=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trailer_vehicles`
--

CREATE TABLE `trailer_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `trailer_vehicle_id` int(10) UNSIGNED DEFAULT NULL,
  `adds_new_vehicles_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trailer_vehicles`
--

INSERT INTO `trailer_vehicles` (`id`, `trailer_vehicle_id`, `adds_new_vehicles_id`) VALUES
(1, 2, 1),
(2, 6, 2),
(3, 4, 4),
(4, 5, 5),
(5, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `trucktypes`
--

CREATE TABLE `trucktypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `truck_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucktypes`
--

INSERT INTO `trucktypes` (`id`, `truck_name`, `created_at`, `updated_at`) VALUES
(1, 'Local', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(2, 'Transit', '2019-11-28 08:04:24', '2019-11-28 08:04:24');

--
-- Triggers `trucktypes`
--
DELIMITER $$
CREATE TRIGGER `trucktypes_before_delete` BEFORE DELETE ON `trucktypes` FOR EACH ROW BEGIN
   INSERT INTO activity_logs
   SET changetype = 'DELETE TRUCKTYPE',
   changeDate=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `phone_number`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Feisal', 'Suleiman', 'Mombo', 'feisal.mombo@tls.co.tz', '+255684456287', '$2y$10$tD1UNI10Cjw3Vb6zqZLDreCzfmt0nc1ZYJfeGrN0H5LB1ekRKefa2', 'xezwqmyahWa29zMNPcIG89OK2hfbY6hnKrmNDFS1ALs16TEbwYfq9Q9XpjHS', '2019-11-28 08:04:24', '2019-11-28 08:04:24'),
(2, 'Kitumbo', 'Hassani', 'Kazimoto', 'kitumbo.kazimoto@yahoo.com', '+255789098734', '$2y$10$nChL0S4TW9DRdiZwKuUpT.0i2YYN9zMpw/3.1svcLSQLPhi0zPaii', 'Hmz0QYmy7oyHWtPg8a36J8qwz8CNFm9idclAVeSq1HeUMP3kZOc2OzsZNl6J', '2019-11-28 10:59:40', '2019-11-28 11:00:20'),
(3, 'Lavinia', 'Edward', 'May', 'lavinia.may@tls.co.tz', '+1 (508) 814-6867', '$2y$10$hwyB9ol5mv8xgxsubdaa5OmCgi8b9XX3/eAen6EGhpxkbB3kce/jC', NULL, '2019-11-29 03:24:00', '2019-11-29 03:24:00'),
(4, 'Rajabu', 'Omary', 'Hamisi', 'rajabu34@yahoo.com', '+255685446012', '$2y$10$vpoSp3JmzPF3I1DFI8WUDOiVGgxi4Duq6OmrJxrpLxlCeXEhvn9Ea', NULL, '2019-11-29 09:52:43', '2019-11-29 09:53:13'),
(5, 'Fabian', 'Sebastian', 'Mwose', 'fabian.mwose@tls.co.tz', '+255717321850', '$2y$10$UuMSJ3AB27WOCZNkpIOXEOTIqozNeTNd/yyhTNPtPg8v7LHuXi3.G', 'DAmXbIub3l8GjbHswQiHBVYmxcjT9R32biC60Cldfd79s6GHaKBdTtk3uftF', '2019-12-01 10:49:36', '2019-12-01 11:01:03'),
(6, 'Abdalah', 'Thabit', 'Huwel', 'abdalah.huwel@tls.co.tz', '0684456287', '$2y$10$wjkcw1BAVTfO0rjzTuz3vO9Hjy04HqtYJ8/ayTNkgxyiEHTytAg4m', 'PXoBhp1zvvT5tGdDQH9HG42mA3BIHHpwJkw3sR7frJiN4E2orXXHnVLAutqa', '2019-12-01 11:09:41', '2019-12-01 11:10:33'),
(7, 'juma', 'ally', 'hassan', 'juma29@gmail.com', '+255684456287', '$2y$10$LDrYl7mpJgZvSQIE4y5nWOSWdVbvsIaD/B.vMgnubYgDFsYix7Z5O', NULL, '2019-12-01 11:44:10', '2019-12-01 11:45:17'),
(8, 'Almas', 'Kondo', 'Khalidi', 'almas.kondo10@gmail.com', '+255789096723', '$2y$10$eJH6cP9NYmIh00SWZpThgeDtSqAaAuQqudHgoQGhTHD5Jc1xE3s5G', NULL, '2019-12-02 03:14:26', '2019-12-02 03:14:56');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `users_before_delete` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
   INSERT INTO activity_logs
   SET changetype = 'DELETE USER',
   changeDate=NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`user_id`, `permission_id`) VALUES
(1, 1),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(5, 38),
(5, 39),
(5, 40),
(5, 41),
(5, 42),
(5, 43),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 51),
(5, 52),
(5, 53),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(5, 59),
(5, 60),
(5, 61),
(6, 1),
(6, 12),
(6, 13),
(6, 14),
(6, 15),
(6, 16),
(6, 17),
(6, 18),
(6, 19),
(6, 20),
(6, 21),
(6, 51),
(6, 52),
(6, 53),
(6, 54),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 5),
(4, 2),
(5, 1),
(5, 5),
(6, 4),
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_statuses`
--

CREATE TABLE `user_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `slug` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_statuses`
--

INSERT INTO `user_statuses` (`id`, `user_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-11-27 21:00:00', '2019-11-27 21:00:00'),
(2, 2, 1, '2019-11-28 10:59:40', '2019-11-28 11:00:20'),
(3, 3, 0, '2019-11-29 03:24:00', '2019-11-29 03:24:00'),
(4, 4, 1, '2019-11-29 09:52:43', '2019-11-29 09:53:13'),
(5, 5, 1, '2019-12-01 10:49:36', '2019-12-01 10:52:34'),
(6, 6, 1, '2019-12-01 11:09:41', '2019-12-01 11:10:33'),
(7, 7, 1, '2019-12-01 11:44:10', '2019-12-01 11:45:17'),
(8, 8, 1, '2019-12-02 03:14:26', '2019-12-02 03:14:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adds_new_drivers`
--
ALTER TABLE `adds_new_drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adds_new_drivers_email_unique` (`email`),
  ADD KEY `adds_new_drivers_gender_id_foreign` (`gender_id`);

--
-- Indexes for table `adds_new_vehicles`
--
ALTER TABLE `adds_new_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `after_attends`
--
ALTER TABLE `after_attends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `after_attends_requestcustomer_id_foreign` (`requestcustomer_id`),
  ADD KEY `after_attends_vehicle_id_foreign` (`vehicle_id`),
  ADD KEY `after_attends_driver_id_foreign` (`driver_id`),
  ADD KEY `after_attends_user_id_foreign` (`user_id`);

--
-- Indexes for table `bodytypes`
--
ALTER TABLE `bodytypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `containers`
--
ALTER TABLE `containers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_vehicles`
--
ALTER TABLE `driver_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_vehicles_adds_new_drivers_id_foreign` (`adds_new_drivers_id`),
  ADD KEY `driver_vehicles_adds_new_vehicles_id_foreign` (`adds_new_vehicles_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_customers`
--
ALTER TABLE `request_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_customers_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `request_items`
--
ALTER TABLE `request_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_items_truck_id_foreign` (`truck_id`),
  ADD KEY `request_items_container_id_foreign` (`container_id`),
  ADD KEY `request_items_requestcustomer_id_foreign` (`requestcustomer_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `trailers`
--
ALTER TABLE `trailers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trailers_bodytype_id_foreign` (`bodytype_id`);

--
-- Indexes for table `trailer_vehicles`
--
ALTER TABLE `trailer_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trailer_vehicles_trailer_vehicle_id_foreign` (`trailer_vehicle_id`),
  ADD KEY `trailer_vehicles_adds_new_vehicles_id_foreign` (`adds_new_vehicles_id`);

--
-- Indexes for table `trucktypes`
--
ALTER TABLE `trucktypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_statuses_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adds_new_drivers`
--
ALTER TABLE `adds_new_drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adds_new_vehicles`
--
ALTER TABLE `adds_new_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `after_attends`
--
ALTER TABLE `after_attends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bodytypes`
--
ALTER TABLE `bodytypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `containers`
--
ALTER TABLE `containers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver_vehicles`
--
ALTER TABLE `driver_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `request_customers`
--
ALTER TABLE `request_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_items`
--
ALTER TABLE `request_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trailers`
--
ALTER TABLE `trailers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trailer_vehicles`
--
ALTER TABLE `trailer_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trucktypes`
--
ALTER TABLE `trucktypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adds_new_drivers`
--
ALTER TABLE `adds_new_drivers`
  ADD CONSTRAINT `adds_new_drivers_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `after_attends`
--
ALTER TABLE `after_attends`
  ADD CONSTRAINT `after_attends_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `adds_new_drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `after_attends_requestcustomer_id_foreign` FOREIGN KEY (`requestcustomer_id`) REFERENCES `request_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `after_attends_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `after_attends_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `adds_new_vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver_vehicles`
--
ALTER TABLE `driver_vehicles`
  ADD CONSTRAINT `driver_vehicles_adds_new_drivers_id_foreign` FOREIGN KEY (`adds_new_drivers_id`) REFERENCES `adds_new_drivers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `driver_vehicles_adds_new_vehicles_id_foreign` FOREIGN KEY (`adds_new_vehicles_id`) REFERENCES `adds_new_vehicles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_customers`
--
ALTER TABLE `request_customers`
  ADD CONSTRAINT `request_customers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_items`
--
ALTER TABLE `request_items`
  ADD CONSTRAINT `request_items_container_id_foreign` FOREIGN KEY (`container_id`) REFERENCES `containers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_items_requestcustomer_id_foreign` FOREIGN KEY (`requestcustomer_id`) REFERENCES `request_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_items_truck_id_foreign` FOREIGN KEY (`truck_id`) REFERENCES `trucktypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trailers`
--
ALTER TABLE `trailers`
  ADD CONSTRAINT `trailers_bodytype_id_foreign` FOREIGN KEY (`bodytype_id`) REFERENCES `bodytypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trailer_vehicles`
--
ALTER TABLE `trailer_vehicles`
  ADD CONSTRAINT `trailer_vehicles_adds_new_vehicles_id_foreign` FOREIGN KEY (`adds_new_vehicles_id`) REFERENCES `adds_new_vehicles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trailer_vehicles_trailer_vehicle_id_foreign` FOREIGN KEY (`trailer_vehicle_id`) REFERENCES `trailers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD CONSTRAINT `user_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
