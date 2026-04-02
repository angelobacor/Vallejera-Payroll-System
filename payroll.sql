-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2026 at 07:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll1`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `asset_name` varchar(255) NOT NULL,
  `asset_code` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `condition` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `punched_in` varchar(255) NOT NULL,
  `punched_out` varchar(255) NOT NULL,
  `behavior` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `total_hours` varchar(255) NOT NULL,
  `entry` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `date`, `punched_in`, `punched_out`, `behavior`, `type`, `total_hours`, `entry`, `status`, `amount`, `created_at`, `updated_at`) VALUES
(1918, 12, '2025-11-03', '2025-11-03 07:33:03', '2025-11-03 12:14:26', '26 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:12', '2025-12-18 10:04:13'),
(1919, 21, '2025-11-03', '2025-11-03 07:48:53', '2025-11-03 12:02:55', '11 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:12', '2025-12-18 10:04:13'),
(1920, 20, '2025-11-03', '2025-11-03 07:32:56', '2025-11-03 12:13:11', '27 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:12', '2025-12-18 10:04:13'),
(1923, 21, '2025-11-03', '2025-11-03 12:57:42', '2025-11-03 17:26:39', '2 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1924, 20, '2025-11-03', '2025-11-03 12:59:39', '2025-11-03 17:24:32', '0 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1926, 12, '2025-11-03', '2025-11-03 12:57:32', '2025-11-03 17:24:59', '2 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1928, 12, '2025-11-04', '2025-11-04 07:42:18', '2025-11-04 12:08:30', '17 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1931, 20, '2025-11-04', '2025-11-04 07:54:48', '2025-11-04 12:06:17', '5 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1932, 21, '2025-11-04', '2025-11-04 07:38:56', '2025-11-04 12:03:28', '21 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1933, 20, '2025-11-04', '2025-11-04 12:58:34', '2025-11-04 17:15:03', '1 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1934, 21, '2025-11-04', '2025-11-04 12:59:59', '2025-11-04 17:07:44', '0 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1935, 12, '2025-11-04', '2025-11-04 12:50:51', '2025-11-04 17:15:32', '9 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1938, 20, '2025-11-05', '2025-11-05 07:52:54', '2025-11-05 12:08:30', '7 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1939, 21, '2025-11-05', '2025-11-05 07:47:36', '2025-11-05 12:06:50', '12 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1940, 12, '2025-11-05', '2025-11-05 07:43:46', '2025-11-05 12:02:53', '16 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1945, 20, '2025-11-05', '2025-11-05 12:52:24', '2025-11-05 17:01:52', '7 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1946, 21, '2025-11-05', '2025-11-05 12:52:51', '2025-11-05 17:07:33', '7 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1947, 12, '2025-11-05', '2025-11-05 12:55:00', '2025-11-05 17:13:49', '5 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:13'),
(1949, 12, '2025-11-06', '2025-11-06 07:54:47', '2025-11-06 12:07:25', '5 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:14'),
(1951, 21, '2025-11-06', '2025-11-06 07:49:08', '2025-11-06 12:12:32', '10 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:13', '2025-12-18 10:04:14'),
(1952, 20, '2025-11-06', '2025-11-06 07:57:40', '2025-11-06 12:08:57', '2 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:13', '2025-12-18 10:04:14'),
(1954, 20, '2025-11-06', '2025-11-06 12:56:54', '2025-11-06 17:06:24', '3 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1955, 21, '2025-11-06', '2025-11-06 12:52:22', '2025-11-06 17:29:44', '7 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1956, 12, '2025-11-06', '2025-11-06 12:52:01', '2025-11-06 17:20:15', '7 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1958, 20, '2025-11-07', '2025-11-07 07:48:24', '2025-11-07 12:08:29', '11 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1959, 12, '2025-11-07', '2025-11-07 07:58:31', '2025-11-07 12:09:30', '1 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1961, 21, '2025-11-07', '2025-11-07 07:47:29', '2025-11-07 12:13:36', '12 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1963, 20, '2025-11-07', '2025-11-07 12:56:28', '2025-11-07 17:13:44', '3 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1964, 12, '2025-11-07', '2025-11-07 12:56:23', '2025-11-07 17:23:47', '3 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1966, 21, '2025-11-07', '2025-11-07 12:52:19', '2025-11-07 17:17:56', '7 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1969, 12, '2025-11-10', '2025-11-10 07:35:03', '2025-11-10 12:08:45', '24 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1970, 21, '2025-11-10', '2025-11-10 07:56:29', '2025-11-10 12:11:39', '3 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1972, 20, '2025-11-10', '2025-11-10 07:57:15', '2025-11-10 12:07:35', '2 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1973, 20, '2025-11-10', '2025-11-10 12:53:15', '2025-11-10 17:10:50', '6 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1974, 12, '2025-11-10', '2025-11-10 12:55:46', '2025-11-10 17:07:03', '4 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1977, 21, '2025-11-10', '2025-11-10 12:58:44', '2025-11-10 17:23:49', '1 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1979, 21, '2025-11-11', '2025-11-11 07:41:25', '2025-11-11 12:07:56', '18 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1981, 12, '2025-11-11', '2025-11-11 07:49:30', '2025-11-11 12:08:19', '10 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1982, 20, '2025-11-11', '2025-11-11 07:37:43', '2025-11-11 12:13:14', '22 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:14'),
(1983, 21, '2025-11-11', '2025-11-11 12:59:01', '2025-11-11 17:25:37', '0 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:14', '2025-12-18 10:04:15'),
(1984, 20, '2025-11-11', '2025-11-11 12:58:01', '2025-11-11 17:21:56', '1 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:14', '2025-12-18 10:04:15'),
(1987, 12, '2025-11-11', '2025-11-11 12:51:06', '2025-11-11 17:13:13', '8 minutes early', 'imported', '4', 'imported', 'received', '375', '2025-12-18 10:04:15', '2025-12-18 10:06:01'),
(1988, 21, '2025-11-12', '2025-11-12 07:38:11', '2025-11-12 12:14:54', '21 minutes early', 'imported', '4', 'imported', 'received', '575', '2025-12-18 10:04:15', '2025-12-18 10:06:01'),
(1989, 12, '2025-11-12', '2025-11-12 07:48:12', '2025-11-12 12:06:29', '11 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(1991, 20, '2025-11-12', '2025-11-12 07:35:54', '2025-11-12 12:07:26', '24 minutes early', 'imported', '4', 'imported', 'received', '375', '2025-12-18 10:04:15', '2025-12-18 10:06:01'),
(1993, 21, '2025-11-12', '2025-11-12 12:55:51', '2025-11-12 17:20:16', '4 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(1995, 20, '2025-11-12', '2025-11-12 12:54:46', '2025-11-12 17:07:46', '5 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(1997, 12, '2025-11-12', '2025-11-12 12:59:40', '2025-11-12 17:20:54', '0 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(1998, 12, '2025-11-13', '2025-11-13 07:42:36', '2025-11-13 12:12:17', '17 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2001, 20, '2025-11-13', '2025-11-13 07:45:21', '2025-11-13 12:13:44', '14 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2002, 21, '2025-11-13', '2025-11-13 07:45:49', '2025-11-13 12:10:57', '14 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2003, 12, '2025-11-13', '2025-11-13 12:54:45', '2025-11-13 17:02:30', '5 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2005, 21, '2025-11-13', '2025-11-13 12:50:24', '2025-11-13 17:05:06', '9 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2006, 20, '2025-11-13', '2025-11-13 12:50:15', '2025-11-13 17:17:15', '9 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2008, 12, '2025-11-14', '2025-11-14 07:46:21', '2025-11-14 12:06:50', '13 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2011, 20, '2025-11-14', '2025-11-14 07:51:09', '2025-11-14 12:03:27', '8 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2012, 21, '2025-11-14', '2025-11-14 07:49:49', '2025-11-14 12:13:31', '10 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2013, 12, '2025-11-14', '2025-11-14 12:57:13', '2025-11-14 17:02:33', '2 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2015, 21, '2025-11-14', '2025-11-14 12:50:14', '2025-11-14 17:21:29', '9 minutes early', 'imported', '4', 'imported', '', '575', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2016, 20, '2025-11-14', '2025-11-14 12:50:51', '2025-11-14 17:26:46', '9 minutes early', 'imported', '4', 'imported', '', '375', '2025-12-18 10:04:15', '2025-12-18 10:04:15'),
(2018, 12, '2025-11-17', '2025-11-17 07:33:03', '2025-11-17 12:14:26', '26 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:26', '2026-01-07 06:12:26'),
(2019, 21, '2025-11-17', '2025-11-17 07:48:53', '2025-11-17 12:02:55', '11 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:26', '2026-01-07 06:12:26'),
(2020, 20, '2025-11-17', '2025-11-17 07:32:56', '2025-11-17 12:13:11', '27 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:26', '2026-01-07 06:12:26'),
(2025, 21, '2025-11-17', '2025-11-17 12:57:42', '2025-11-17 17:26:39', '2 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:26', '2026-01-07 06:12:26'),
(2026, 20, '2025-11-17', '2025-11-17 12:59:39', '2025-11-17 17:24:32', '0 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:26', '2026-01-07 06:12:26'),
(2028, 12, '2025-11-17', '2025-11-17 12:57:32', '2025-11-17 17:24:59', '2 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:26', '2026-01-07 06:12:26'),
(2032, 12, '2025-11-18', '2025-11-18 07:42:18', '2025-11-18 12:08:30', '17 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:26', '2026-01-07 06:12:26'),
(2035, 20, '2025-11-18', '2025-11-18 07:54:48', '2025-11-18 12:06:17', '5 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:26', '2026-01-07 06:12:26'),
(2036, 21, '2025-11-18', '2025-11-18 07:38:56', '2025-11-18 12:03:28', '21 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:26', '2026-01-07 06:12:26'),
(2038, 20, '2025-11-18', '2025-11-18 12:58:34', '2025-11-18 17:15:03', '1 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2040, 21, '2025-11-18', '2025-11-18 12:59:59', '2025-11-18 17:07:44', '0 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2042, 12, '2025-11-18', '2025-11-18 12:50:51', '2025-11-18 17:15:32', '9 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2045, 20, '2025-11-19', '2025-11-19 07:52:54', '2025-11-19 12:08:30', '7 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2046, 21, '2025-11-19', '2025-11-19 07:47:36', '2025-11-19 12:06:50', '12 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2047, 12, '2025-11-19', '2025-11-19 07:43:46', '2025-11-19 12:02:53', '16 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2054, 20, '2025-11-19', '2025-11-19 12:52:24', '2025-11-19 17:01:52', '7 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2056, 21, '2025-11-19', '2025-11-19 12:52:51', '2025-11-19 17:07:33', '7 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2057, 12, '2025-11-19', '2025-11-19 12:55:00', '2025-11-19 17:13:49', '5 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2060, 12, '2025-11-20', '2025-11-20 07:54:47', '2025-11-20 12:07:25', '5 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2062, 21, '2025-11-20', '2025-11-20 07:49:08', '2025-11-20 12:12:32', '10 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2063, 20, '2025-11-20', '2025-11-20 07:57:40', '2025-11-20 12:08:57', '2 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2067, 20, '2025-11-20', '2025-11-20 12:56:54', '2025-11-20 17:06:24', '3 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2069, 21, '2025-11-20', '2025-11-20 12:52:22', '2025-11-20 17:29:44', '7 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2070, 12, '2025-11-20', '2025-11-20 12:52:01', '2025-11-20 17:20:15', '7 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2072, 20, '2025-11-21', '2025-11-21 07:48:24', '2025-11-21 12:08:29', '11 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2073, 12, '2025-11-21', '2025-11-21 07:58:31', '2025-11-21 12:09:30', '1 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2077, 21, '2025-11-21', '2025-11-21 07:47:29', '2025-11-21 12:13:36', '12 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2080, 20, '2025-11-21', '2025-11-21 12:56:28', '2025-11-21 17:13:44', '3 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2081, 12, '2025-11-21', '2025-11-21 12:56:23', '2025-11-21 17:23:47', '3 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2083, 21, '2025-11-21', '2025-11-21 12:52:19', '2025-11-21 17:17:56', '7 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2087, 12, '2025-11-24', '2025-11-24 07:35:03', '2025-11-24 12:08:45', '24 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2088, 21, '2025-11-24', '2025-11-24 07:56:29', '2025-11-24 12:11:39', '3 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2092, 20, '2025-11-24', '2025-11-24 07:57:15', '2025-11-24 12:07:35', '2 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:27'),
(2093, 20, '2025-11-24', '2025-11-24 12:53:15', '2025-11-24 17:10:50', '6 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:27', '2026-01-07 06:12:28'),
(2094, 12, '2025-11-24', '2025-11-24 12:55:46', '2025-11-24 17:07:03', '4 minutes early', 'imported', '4', 'imported', 'received', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:54'),
(2099, 21, '2025-11-24', '2025-11-24 12:58:44', '2025-11-24 17:23:49', '1 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2101, 21, '2025-11-25', '2025-11-25 07:41:25', '2025-11-25 12:07:56', '18 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2103, 12, '2025-11-25', '2025-11-25 07:49:30', '2025-11-25 12:08:19', '10 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2105, 20, '2025-11-25', '2025-11-25 07:37:43', '2025-11-25 12:13:14', '22 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2108, 21, '2025-11-25', '2025-11-25 12:59:01', '2025-11-25 17:25:37', '0 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2110, 20, '2025-11-25', '2025-11-25 12:58:01', '2025-11-25 17:21:56', '1 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2113, 12, '2025-11-25', '2025-11-25 12:51:06', '2025-11-25 17:13:13', '8 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2114, 21, '2025-11-26', '2025-11-26 07:38:11', '2025-11-26 12:14:54', '21 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2117, 12, '2025-11-26', '2025-11-26 07:48:12', '2025-11-26 12:06:29', '11 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2119, 20, '2025-11-26', '2025-11-26 07:35:54', '2025-11-26 12:07:26', '24 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2121, 21, '2025-11-26', '2025-11-26 12:55:51', '2025-11-26 17:20:16', '4 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2125, 20, '2025-11-26', '2025-11-26 12:54:46', '2025-11-26 17:07:46', '5 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2127, 12, '2025-11-26', '2025-11-26 12:59:40', '2025-11-26 17:20:54', '0 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2128, 12, '2025-11-27', '2025-11-27 07:42:36', '2025-11-27 12:12:17', '17 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2133, 20, '2025-11-27', '2025-11-27 07:45:21', '2025-11-27 12:13:44', '14 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2134, 21, '2025-11-27', '2025-11-27 07:45:49', '2025-11-27 12:10:57', '14 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2135, 12, '2025-11-27', '2025-11-27 12:54:45', '2025-11-27 17:02:30', '5 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2138, 21, '2025-11-27', '2025-11-27 12:50:24', '2025-11-27 17:05:06', '9 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2139, 20, '2025-11-27', '2025-11-27 12:50:15', '2025-11-27 17:17:15', '9 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2141, 12, '2025-11-28', '2025-11-28 07:46:21', '2025-11-28 12:06:50', '13 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2146, 20, '2025-11-28', '2025-11-28 07:51:09', '2025-11-28 12:03:27', '8 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2147, 21, '2025-11-28', '2025-11-28 07:49:49', '2025-11-28 12:13:31', '10 minutes early', 'imported', '4', 'imported', '', '575', '2026-01-07 06:12:28', '2026-01-07 06:12:28'),
(2148, 12, '2025-11-28', '2025-11-28 12:57:13', '2025-11-28 17:02:33', '2 minutes early', 'imported', '4', 'imported', '', '375', '2026-01-07 06:12:28', '2026-01-07 06:12:29'),
(2151, 21, '2025-11-28', '2025-11-28 12:50:14', '2025-11-28 17:21:29', '9 minutes early', 'imported', '4', 'imported', 'received', '575', '2026-01-07 06:12:29', '2026-01-07 06:12:55'),
(2152, 20, '2025-11-28', '2025-11-28 12:50:51', '2025-11-28 17:26:46', '9 minutes early', 'imported', '4', 'imported', 'received', '375', '2026-01-07 06:12:29', '2026-01-07 06:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `contribution_settings`
--

CREATE TABLE `contribution_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number_of_percent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contribution_settings`
--

INSERT INTO `contribution_settings` (`id`, `name`, `number_of_percent`, `created_at`, `updated_at`) VALUES
(1, 'Pagibig', '2.5', NULL, '2026-01-05 06:46:03'),
(2, 'Philhealth', '5', NULL, '2025-12-06 14:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deduction_name` varchar(255) NOT NULL,
  `percent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `user_id`, `deduction_name`, `percent`, `created_at`, `updated_at`) VALUES
(1, 11, 'Pagibig', '352', '2025-06-11 04:45:02', '2025-06-11 04:45:02'),
(2, 11, 'Philhealth', '1000', '2025-06-11 04:45:02', '2025-06-11 04:45:02'),
(3, 11, 'SSS', '900', '2025-06-11 04:45:02', '2025-06-11 04:45:02'),
(4, 12, 'Pagibig', '316.8', '2025-06-11 04:45:02', '2025-06-11 04:45:02'),
(5, 12, 'Philhealth', '900', '2025-06-11 04:45:02', '2025-06-11 04:45:02'),
(6, 12, 'SSS', '810', '2025-06-11 04:45:02', '2025-06-11 04:45:02'),
(25, 20, 'Pagibig', '264', '2025-09-12 12:17:00', '2025-09-12 12:17:00'),
(26, 20, 'Philhealth', '750', '2025-09-12 12:17:00', '2025-09-12 12:17:00'),
(27, 20, 'SSS', '750', '2025-09-12 12:17:00', '2025-09-12 12:17:00'),
(28, 21, 'Pagibig', '316.8', '2025-09-18 12:08:32', '2025-09-18 12:08:32'),
(29, 21, 'Philhealth', '900', '2025-09-18 12:08:32', '2025-09-18 12:08:32'),
(30, 21, 'SSS', '900', '2025-09-18 12:08:32', '2025-09-18 12:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_paids`
--

CREATE TABLE `deduction_paids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deduction_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_reals`
--

CREATE TABLE `deduction_reals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deduction_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `expected_end_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'admin dept.', NULL, NULL),
(2, 'IT dept.', NULL, NULL),
(3, 'Hr dept.', '2025-12-08 06:50:56', '2025-12-08 06:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2025-09-20 12:28:11'),
(2, 'it staff', NULL, NULL),
(3, 'office staff', '2025-12-08 06:50:35', '2025-12-08 06:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `e_name` varchar(255) NOT NULL,
  `e_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_statuses`
--

CREATE TABLE `employment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_statuses`
--

INSERT INTO `employment_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Regular', NULL, NULL),
(2, 'Probation', NULL, NULL),
(3, 'Terminated', NULL, NULL);

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
-- Table structure for table `holiday_payment_increases`
--

CREATE TABLE `holiday_payment_increases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `multiplier` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holiday_payment_increases`
--

INSERT INTO `holiday_payment_increases` (`id`, `name`, `type`, `multiplier`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Good Friday', 'R', '1.5', '2025-04-19', '2025-12-04 02:52:47', '2025-12-04 02:52:47'),
(4, 'test', 'S', '2', '2025-09-25', '2025-12-06 06:51:15', '2025-12-06 06:51:15'),
(6, 'holiday', 'S', '1.3', '2025-12-12', '2025-12-06 14:26:17', '2025-12-06 14:26:17'),
(8, 'holiday1', 'S', '1.3', '2025-12-08', '2025-12-07 11:13:30', '2025-12-07 11:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `start_date`, `end_date`, `leave_type`, `status`, `activity`, `duration`, `created_at`, `updated_at`) VALUES
(1, 12, '2025-06-29', '2025-06-29', 'Paid Sick leave', 'Approved', 'Something', '1', '2025-06-29 03:21:26', '2025-06-29 03:27:18'),
(12, 12, '2025-08-29', '2025-08-29', 'Paid testttt', 'Approved', 'testtt', '1', '2025-08-21 14:45:02', '2025-08-21 14:46:34'),
(13, 12, '2025-08-30', '2025-08-30', 'Paid hhh', 'Approved', 'hhh', '1', '2025-08-21 14:45:28', '2025-08-21 14:46:32'),
(14, 12, '2025-08-31', '2025-08-31', 'Paid f', 'Approved', 'f', '1', '2025-08-21 14:45:46', '2025-08-21 14:46:31'),
(15, 12, '2025-09-01', '2025-09-01', 'Paid j', 'Approved', 'j', '1', '2025-08-21 14:46:12', '2025-08-21 14:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `leave_attachments`
--

CREATE TABLE `leave_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_09_27_103110_create_departments_table', 1),
(2, '2014_09_27_103215_create_shifts_table', 1),
(3, '2014_09_27_103233_create_designations_table', 1),
(4, '2014_09_27_103253_create_employment_statuses_table', 1),
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2014_10_12_103159_create_deductions_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2024_08_07_090148_create_attendance_table', 1),
(11, '2024_08_07_090747_create_leaves_table', 1),
(12, '2024_08_07_091221_create_leave_attachments_table', 1),
(13, '2024_08_07_091354_create_payruns_table', 1),
(14, '2024_08_07_091456_create_payslips_table', 1),
(15, '2024_09_07_105521_create_holiday_payment_increases_table', 1),
(16, '2024_09_27_103317_create_salary_change_table', 1),
(17, '2024_09_27_103334_create_address_table', 1),
(18, '2024_09_27_103356_create_emergency_contact_table', 1),
(19, '2024_09_27_103411_create_social_link_table', 1),
(20, '2024_10_03_105130_create_documents_table', 1),
(21, '2024_10_03_105142_create_assets_table', 1),
(22, '2024_11_16_135737_create_deduction_paids_table', 1),
(23, '2025_06_11_133446_create_overtimes_table', 2),
(24, '2025_06_11_133758_create_undertimes_table', 2),
(25, '2025_12_04_003445_create_deductions_real_table', 3),
(26, '2025_12_04_003621_create_contribution_settings_table', 3),
(27, '2025_12_04_003758_create_sss_table_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payruns`
--

CREATE TABLE `payruns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `generated_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payruns`
--

INSERT INTO `payruns` (`id`, `generated_id`, `date`, `created_at`, `updated_at`) VALUES
(93, 'ICX1FOPB', '2026-01-07', '2026-01-07 05:45:20', '2026-01-07 05:45:20'),
(94, '6VIQ9QE0', '2026-01-07', '2026-01-07 06:11:39', '2026-01-07 06:11:39'),
(95, 'JBGVEQYH', '2026-01-07', '2026-01-07 06:12:54', '2026-01-07 06:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `payslips`
--

CREATE TABLE `payslips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payrun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payrun_period` varchar(255) NOT NULL,
  `payrun_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_salary` varchar(255) NOT NULL,
  `net_salary` varchar(255) NOT NULL,
  `condition` varchar(255) NOT NULL,
  `sss` varchar(255) NOT NULL,
  `pagibig` varchar(255) NOT NULL,
  `philhealth` varchar(255) NOT NULL,
  `tax_income` varchar(20) NOT NULL,
  `sss_es` varchar(255) NOT NULL,
  `pagibig_es` varchar(255) NOT NULL,
  `philhealth_es` varchar(255) NOT NULL,
  `month_range` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payslips`
--

INSERT INTO `payslips` (`id`, `user_id`, `payrun_id`, `payrun_period`, `payrun_type`, `status`, `total_salary`, `net_salary`, `condition`, `sss`, `pagibig`, `philhealth`, `tax_income`, `sss_es`, `pagibig_es`, `philhealth_es`, `month_range`, `created_at`, `updated_at`) VALUES
(578, 12, 93, 'Semi-monthly', 'Default', 'Pending', '6562.5', '7500', 'sent', '375', '187.5', '375', '0', '755', '187.5', '375', '01 - 15 November 2025', '2026-01-07 05:45:20', '2026-01-07 05:45:23'),
(579, 20, 93, 'Semi-monthly', 'Default', 'Pending', '6562.5', '7500', 'sent', '375', '187.5', '375', '0', '755', '187.5', '375', '01 - 15 November 2025', '2026-01-07 05:45:20', '2026-01-07 05:45:23'),
(580, 21, 93, 'Semi-monthly', 'Default', 'Pending', '9900.05', '11500', 'sent', '575', '287.5', '575', '162.45', '1190', '287.5', '575', '01 - 15 November 2025', '2026-01-07 05:45:20', '2026-01-07 05:45:23'),
(585, 12, 94, 'Semi-monthly', 'Default', 'Pending', '-375', '0', 'sent', '375', '0', '0', '0', '755', '0', '0', '16 - 30 November 2025', '2026-01-07 06:11:39', '2026-01-07 06:11:42'),
(586, 20, 94, 'Semi-monthly', 'Default', 'Pending', '-375', '0', 'sent', '375', '0', '0', '0', '755', '0', '0', '16 - 30 November 2025', '2026-01-07 06:11:39', '2026-01-07 06:11:42'),
(587, 21, 94, 'Semi-monthly', 'Default', 'Pending', '-737.45', '0', 'sent', '575', '0', '0', '162.45', '1190', '0', '0', '16 - 30 November 2025', '2026-01-07 06:11:39', '2026-01-07 06:11:42'),
(592, 12, 95, 'Semi-monthly', 'Default', 'Pending', '6562.5', '7500', 'sent', '375', '187.5', '375', '0', '755', '187.5', '375', '16 - 30 November 2025', '2026-01-07 06:12:54', '2026-01-07 06:13:00'),
(593, 20, 95, 'Semi-monthly', 'Default', 'Pending', '6562.5', '7500', 'sent', '375', '187.5', '375', '0', '755', '187.5', '375', '16 - 30 November 2025', '2026-01-07 06:12:55', '2026-01-07 06:13:00'),
(594, 21, 95, 'Semi-monthly', 'Default', 'Pending', '9900.05', '11500', 'sent', '575', '287.5', '575', '162.45', '1190', '287.5', '575', '16 - 30 November 2025', '2026-01-07 06:12:55', '2026-01-07 06:13:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `salary_changes`
--

CREATE TABLE `salary_changes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `effective_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shift_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `shift_name`, `created_at`, `updated_at`) VALUES
(1, 'Morning Shift', NULL, NULL),
(2, 'Night Shift', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `link_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sss_tables`
--

CREATE TABLE `sss_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `min_amount` varchar(255) NOT NULL,
  `max_amount` varchar(255) NOT NULL,
  `employer_share` varchar(255) NOT NULL,
  `employee_share` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sss_tables`
--

INSERT INTO `sss_tables` (`id`, `min_amount`, `max_amount`, `employer_share`, `employee_share`, `created_at`, `updated_at`) VALUES
(16, '10250', '10749.99', '1060', '525', '2025-12-09 07:59:24', '2025-12-09 07:59:24'),
(17, '10750', '11249.99', '1110', '550', '2025-12-09 08:02:15', '2025-12-09 08:02:15'),
(18, '11250', '11749.99', '1160', '575', '2025-12-09 08:06:39', '2025-12-09 08:06:39'),
(19, '11750', '12249.99', '1210', '600', '2025-12-09 08:09:00', '2025-12-09 08:09:00'),
(20, '12250', '12749.99', '1260', '625', '2025-12-09 08:12:05', '2025-12-09 08:12:05'),
(21, '12750', '13249.99', '1310', '650', '2025-12-09 08:13:06', '2025-12-09 08:13:06'),
(22, '13250', '13749.99', '1360', '675', '2025-12-09 08:13:55', '2025-12-09 08:13:55'),
(23, '13750', '14249.99', '1410', '700', '2025-12-09 08:15:05', '2025-12-09 08:15:05'),
(24, '14250', '14749.99', '1460', '725', '2025-12-09 08:16:16', '2025-12-09 08:16:16'),
(25, '14750', '15249.99', '1510', '750', '2025-12-09 08:17:19', '2025-12-09 08:17:19'),
(26, '15250', '15749.99', '1560', '775', '2025-12-09 08:18:30', '2025-12-09 08:18:30'),
(27, '15750', '16249.99', '1610', '800', '2025-12-09 08:19:38', '2025-12-09 08:19:38'),
(28, '16250', '16749.99', '1660', '825', '2025-12-09 08:20:39', '2025-12-09 08:20:39'),
(29, '16750', '17249.99', '1710', '850', '2025-12-09 08:21:47', '2025-12-09 08:21:47'),
(30, '17250', '17749.99', '1760', '875', '2025-12-09 08:23:14', '2025-12-09 08:23:14'),
(31, '17750', '18249.99', '1810', '900', '2025-12-09 08:24:09', '2025-12-09 08:24:09'),
(32, '18250', '18749.99', '1860', '925', '2025-12-09 08:25:17', '2025-12-09 08:25:17'),
(33, '18750', '19249.99', '1910', '950', '2025-12-09 08:26:06', '2025-12-09 08:26:06'),
(34, '19250', '19749.99', '1960', '975', '2025-12-09 08:27:29', '2025-12-09 08:27:29'),
(35, '19750', '20249.99', '2010', '1000', '2025-12-09 08:28:38', '2025-12-09 08:28:38'),
(36, '20250', '20749.99', '2130', '1025', '2025-12-09 08:29:37', '2025-12-09 08:32:18'),
(37, '20750', '21249.99', '2180', '1050', '2025-12-09 08:30:29', '2025-12-09 08:32:48'),
(38, '21250', '21749.99', '2230', '1075', '2025-12-09 08:35:42', '2025-12-09 08:35:42'),
(39, '21750', '22249.99', '2280', '1100', '2025-12-09 08:36:44', '2025-12-09 08:36:44'),
(40, '22250', '22749.99', '2330', '1125', '2025-12-09 08:37:45', '2025-12-09 08:37:45'),
(41, '22750', '23249.99', '2380', '1150', '2025-12-09 08:39:26', '2025-12-09 08:39:26'),
(42, '23250', '23749.99', '2430', '1175', '2025-12-09 08:40:49', '2025-12-09 08:40:49'),
(43, '23750', '24249.99', '2480', '1200', '2025-12-09 08:42:07', '2025-12-09 08:42:07'),
(44, '24250', '24749.99', '2530', '1225', '2025-12-09 08:43:13', '2025-12-09 08:43:13'),
(45, '24750', '30000', '2580', '1250', '2025-12-09 08:44:06', '2025-12-09 08:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `undertimes`
--

CREATE TABLE `undertimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `undertimes`
--

INSERT INTO `undertimes` (`id`, `employee_id`, `date`, `start_time`, `end_time`, `reason`, `status`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, 12, '2025-06-22', '09:16', '12:16', '', 'Disapproved', 11, '2025-06-22 01:17:00', '2025-06-22 01:49:06'),
(2, 12, '2025-06-22', '09:47', '13:47', '', 'Approved', 11, '2025-06-22 01:47:09', '2025-06-22 01:48:26'),
(3, 12, '2025-08-21', '17:38', '18:00', 'Emergency', 'Pending', NULL, '2025-08-21 10:39:45', '2025-08-21 10:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shift_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_img` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `leave_count` varchar(255) NOT NULL,
  `update_leave_count` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `employee_id`, `email_verified_at`, `password`, `salary`, `department_id`, `shift_id`, `designation_id`, `employment_id`, `profile_img`, `payment_method`, `joining_date`, `leave_count`, `update_leave_count`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(11, 'Michael Bacor', 'michael@admin.com', '', NULL, '$2y$10$4VvCbKDTGBNY3c0y/m4OXOy/5cGXnvo2aI7fgNVdr9cSyOsrbeI1y', '20,000', 1, 1, 1, 2, '1764816749_3-3_2021-10.webp', 'Weekly', '2024-10-01', '5', '2024-10-01', NULL, 0, '2025-06-11 04:45:02', '2025-12-19 01:25:38'),
(12, 'Ben Employee test2', 'employee@test.com', 'E025', NULL, '$2y$10$A8MI3ZxSioXMx2hgZGfVoefJu/invSfPcVRnm9/1.a6lWz06n5y52', '15000', 1, 1, 1, 1, '', '15 days', '2024-09-20', '6', '2025-08-21', NULL, 1, '2025-06-11 04:45:02', '2025-12-14 13:02:29'),
(20, 'test payroll officer', 'test@payrollofficer.com', 'E030', NULL, '$2y$10$ytL0OKPKXfLhr6tict46.e3A7HiWXbT5qNptP3ObeP881bfPY/N8K', '15000', 1, 1, 1, 1, '', '15 days', '2025-08-30', '5', NULL, NULL, 4, '2025-09-12 12:17:00', '2025-12-09 09:33:08'),
(21, 'it admin', 'it@admin.com', 'E010', NULL, '$2y$10$UMiJXl/joZCkWCV74mvMm.WXbEsHbTjdRhv8WuB8RlUKKdBJwUncW', '23000', 1, 1, 2, 1, '', '15 days', '2025-09-18', '5', NULL, NULL, 3, '2025-09-18 12:08:32', '2025-12-09 02:49:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_user_id_foreign` (`user_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `contribution_settings`
--
ALTER TABLE `contribution_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deductions_user_id_foreign` (`user_id`);

--
-- Indexes for table `deduction_paids`
--
ALTER TABLE `deduction_paids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deduction_paids_user_id_foreign` (`user_id`);

--
-- Indexes for table `deduction_reals`
--
ALTER TABLE `deduction_reals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deductions_real_employee` (`employee_id`);

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
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emergency_contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `employment_statuses`
--
ALTER TABLE `employment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holiday_payment_increases`
--
ALTER TABLE `holiday_payment_increases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_user_id_foreign` (`user_id`);

--
-- Indexes for table `leave_attachments`
--
ALTER TABLE `leave_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_attachments_leave_id_foreign` (`leave_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtimes_employee_id_foreign` (`employee_id`),
  ADD KEY `overtimes_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payruns`
--
ALTER TABLE `payruns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payslips`
--
ALTER TABLE `payslips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payslips_user_id_foreign` (`user_id`),
  ADD KEY `payslips_payrun_id_foreign` (`payrun_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `salary_changes`
--
ALTER TABLE `salary_changes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_changes_user_id_foreign` (`user_id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_links_user_id_foreign` (`user_id`);

--
-- Indexes for table `sss_tables`
--
ALTER TABLE `sss_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undertimes`
--
ALTER TABLE `undertimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `undertimes_employee_id_foreign` (`employee_id`),
  ADD KEY `undertimes_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_department_id_foreign` (`department_id`),
  ADD KEY `users_shift_id_foreign` (`shift_id`),
  ADD KEY `users_designation_id_foreign` (`designation_id`),
  ADD KEY `users_employment_id_foreign` (`employment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2154;

--
-- AUTO_INCREMENT for table `contribution_settings`
--
ALTER TABLE `contribution_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `deduction_paids`
--
ALTER TABLE `deduction_paids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_reals`
--
ALTER TABLE `deduction_reals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_statuses`
--
ALTER TABLE `employment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday_payment_increases`
--
ALTER TABLE `holiday_payment_increases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leave_attachments`
--
ALTER TABLE `leave_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payruns`
--
ALTER TABLE `payruns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `payslips`
--
ALTER TABLE `payslips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=599;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_changes`
--
ALTER TABLE `salary_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sss_tables`
--
ALTER TABLE `sss_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `undertimes`
--
ALTER TABLE `undertimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deductions`
--
ALTER TABLE `deductions`
  ADD CONSTRAINT `deductions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deduction_paids`
--
ALTER TABLE `deduction_paids`
  ADD CONSTRAINT `deduction_paids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deduction_reals`
--
ALTER TABLE `deduction_reals`
  ADD CONSTRAINT `fk_deductions_real_employee` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD CONSTRAINT `emergency_contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leave_attachments`
--
ALTER TABLE `leave_attachments`
  ADD CONSTRAINT `leave_attachments_leave_id_foreign` FOREIGN KEY (`leave_id`) REFERENCES `leaves` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD CONSTRAINT `overtimes_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `overtimes_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payslips`
--
ALTER TABLE `payslips`
  ADD CONSTRAINT `payslips_payrun_id_foreign` FOREIGN KEY (`payrun_id`) REFERENCES `payruns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payslips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary_changes`
--
ALTER TABLE `salary_changes`
  ADD CONSTRAINT `salary_changes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `social_links`
--
ALTER TABLE `social_links`
  ADD CONSTRAINT `social_links_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `undertimes`
--
ALTER TABLE `undertimes`
  ADD CONSTRAINT `undertimes_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `undertimes_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_employment_id_foreign` FOREIGN KEY (`employment_id`) REFERENCES `employment_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
