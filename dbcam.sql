-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2025 at 03:23 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcam`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HKV', 'Hikvision', '2025-10-10 02:37:19', '2025-10-10 02:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-livewire-rate-limiter:1051246f8159fe4a4c098e3516fd2c268c7f3882', 'i:1;', 1760325268),
('laravel-cache-livewire-rate-limiter:1051246f8159fe4a4c098e3516fd2c268c7f3882:timer', 'i:1760325268;', 1760325268);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cameras`
--

CREATE TABLE `cameras` (
  `id` bigint UNSIGNED NOT NULL,
  `server_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `camera_variant_id` bigint UNSIGNED NOT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `sub_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noAsset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lens` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cameras`
--

INSERT INTO `cameras` (`id`, `server_id`, `brand_id`, `camera_variant_id`, `type_id`, `category_id`, `location_id`, `sub_location`, `noAsset`, `name`, `model`, `lens`, `resolution`, `ipAddress`, `channel`, `purpose`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 1, 1, 1, 'Absensi Karyawan S/O - Prod.Lt3', 'CI.0001', 'Camera 0001', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.101.164', '1', '-', 'cameras/01K7DQ8Y36025MK91M697G9G84.png', '2025-10-10 03:05:57', '2025-10-12 19:54:12'),
(2, 1, 1, 2, 1, 1, 1, 'Line 05 Seamer Carrando N474', 'CI.0002', 'Camera 0002', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.100.176', '2', '-', 'cameras/01K7DQBR9SQSNWQNJ72CJVYH34.png', '2025-10-10 03:05:57', '2025-10-12 19:54:37'),
(3, 1, 1, 2, 1, 1, 1, 'Area WIP', 'CI.0003', 'Camera 0003', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.100.174', '3', '-', 'cameras/01K7DQQY4N9T1N4AZRMXP1ZTRG.png', '2025-10-10 03:05:57', '2025-10-12 19:55:13'),
(4, 1, 1, 2, 1, 1, 1, 'Line Lipat Papper', 'CI.0004', 'Camera 0004', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.100.178', '4', '-', 'cameras/01K7DQT76BBS77PX0P66VTEPT2.png', '2025-10-10 03:05:57', '2025-10-12 19:53:53'),
(5, 1, 1, 2, 1, 1, 1, 'Area ENG & MTC', 'CI.0005', 'Camera 0005', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.100.173', '5', '-', 'cameras/01K7DQXN5RGTS43J1YZ0J1EM1Z.png', '2025-10-10 03:05:57', '2025-10-12 19:55:46'),
(6, 1, 1, 2, 1, 1, 1, 'Jl Tangga Ke Lt 3', 'CI.0006', 'Camera 0006', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.100.181', '6', '-', 'cameras/01K7DQYTF2S1QH8BQY8NVC3V59.png', '2025-10-10 03:05:57', '2025-10-12 19:56:24'),
(7, 1, 1, 2, 1, 1, 1, 'Packaging Utara - Line 2', 'CI.0007', 'Camera 0007', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.100.235', '7', '-', 'cameras/01K7DR03VEXCVHG8934FV5V87E.png', '2025-10-10 03:05:57', '2025-10-12 19:57:06'),
(8, 1, 1, 2, 1, 1, 1, 'Line Element Assy 1,2', 'CI.0008', 'Camera 0008', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.7.254', '8', '-', 'cameras/01K7DR19Z54B2H4PD4GKWT8EZJ.png', '2025-10-10 03:05:57', '2025-10-12 19:58:46'),
(9, 1, 1, 2, 1, 1, 1, 'Absensi Outsorcing', 'CI.0009', 'Camera 0009', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.100.231', '9', '-', 'cameras/01K7DR4YVM9VHBXNJMXNEGZP1D.png', '2025-10-10 03:05:57', '2025-10-12 19:59:45'),
(10, 1, 1, 2, 1, 1, 1, 'Absensi Outsorcing SSF LT1', 'CI.0010', 'Camera 0010', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.7.231', '10', '-', 'cameras/01K7DR62C1WZ511K0JFTX14Y8J.png', '2025-10-10 03:05:57', '2025-10-12 20:00:22'),
(11, 1, 1, 2, 1, 1, 1, 'Mesin Absen Lt 2 Prod', 'CI.0011', 'Camera 0011', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.7.232', '11', '-', 'cameras/01K7DR75SFN0GK4DGZX66AHKKM.png', '2025-10-10 03:05:57', '2025-10-12 20:00:58'),
(12, 1, 1, 2, 1, 1, 1, 'Leak test Utara Line 4', 'CI.0012', 'Camera 0012', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.7.255', '12', '-', 'cameras/01K7DR8F61R44AV5QBBKBKZZ61.png', '2025-10-10 03:05:57', '2025-10-12 20:01:40'),
(13, 1, 1, 2, 1, 2, 1, 'Area Mesin Oven Curing 2', 'CI.0013', 'Camera 0013', 'DS-2CD1027G2-L', '2.8mm', '2mp', '172.22.7.206', '13', '-', 'cameras/01K7DRDT33ZRMFYZBF44JDZEGR.png', '2025-10-10 03:05:57', '2025-10-12 20:04:35'),
(14, 1, 1, 2, 1, 2, 1, 'Area Mesin curing 2 & Bak Kimia', 'CI.0014', 'Camera 0014', 'DS-2CD1027G2-L', '2.8mm', '2mp', '172.22.7.205', '14', '-', 'cameras/01K7DREY6YYQ5KF46WV37PC4YG.png', '2025-10-10 03:05:57', '2025-10-12 20:05:12'),
(15, 1, 1, 2, 1, 2, 1, 'Area Belakang Bak Kimia', 'CI.0015', 'Camera 0015', 'DS-2CD1027G2-L', '2.8mm', '2mp', '172.22.7.207', '15', '-', 'cameras/01K7DRG69H14CZGEMBQWTVEBM6.png', '2025-10-10 03:05:57', '2025-10-12 20:05:53'),
(16, 1, 1, 2, 1, 1, 1, 'Area Cek Ulir Presshop', 'CI.0016', 'Camera 0016', 'DS-2CD1027G2-L', '2.8mm', '2mp', '172.22.7.193', '16', '-', 'cameras/01K7DRH6P49HBM224CBHX6NWE6.png', '2025-10-10 03:05:57', '2025-10-12 20:06:26'),
(17, 2, 1, 2, 1, 1, 1, 'Area Transit Papper Roll Lt3', 'CI.0017', 'CI.0017', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.102.84', '1', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(18, 2, 1, 2, 1, 1, 1, 'Area Rework1 Lt3', 'CI.0018', 'CI.0018', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.102.86', '2', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(19, 2, 1, 2, 1, 1, 1, 'Area Rework2 Lt3', 'CI.0019', 'CI.0019', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.102.85', '3', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(20, 2, 1, 2, 1, 1, 1, 'Area Rework3 Lt3', 'CI.0020', 'CI.0020', 'DS-2CD2021G1-I', '2.8mm', '2mp', '172.22.100.179', '4', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(21, 2, 1, 2, 1, 2, 1, 'Area Thinner & Kimia', 'CI.0021', 'CI.0021', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.102.82', '5', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(22, 2, 1, 2, 1, 3, 1, 'Area Tooling 5S', 'CI.0022', 'CI.0022', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.102.83', '6', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(23, 2, 1, 2, 1, 2, 1, 'Area Painting Utara1 Lt3', 'CI.0023', 'CI.0023', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.102.81', '7', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(24, 2, 1, 2, 1, 1, 1, 'Area Rework Lt2', 'CI.0024', 'CI.0024', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.30', '9', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(25, 2, 1, 2, 1, 1, 1, 'Area Packaging Selatan Lt2 Line 1', 'CI.0025', 'CI.0025', 'DS-2CD1027G2 - L', '2.8mm', '2mp', '172.22.7.211', '9', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(26, 2, 1, 2, 1, 1, 1, 'Area Packaging Selatan Lt3 Line 5', 'CI.0026', 'CI.0026', 'DS-2CD1027G2 - L', '2.8mm', '2mp', '172.22.7.208', '10', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(27, 2, 1, 2, 1, 1, 1, 'Cek Ulir Utara Line 4 LT2', 'CI.0027', 'CI.0027', 'DS-2CD1027G2 - L', '2.8mm', '2mp', '172.22.7.229', '11', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(28, 2, 1, 2, 1, 1, 1, 'Cek Ulir Utara Line 5 LT2', 'CI.0028', 'CI.0028', 'DS-2CD1027G2 - L', '2.8mm', '2mp', '172.22.7.230', '12', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(29, 2, 1, 2, 1, 1, 1, 'Spiral Conveyor Spin On', 'CI.0029', 'CI.0029', 'DS-2CD1027G2 - L', '2.8mm', '2mp', '172.22.7.233', '13', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(30, 2, 1, 2, 1, 1, 1, 'Line Auto Packaging LT3 A', 'CI.0030', 'CI.0030', 'DS-2CD1027G2H - LIU', '2.8mm', '2mp', '172.22.7.234', '14', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(31, 2, 1, 2, 1, 1, 1, 'Line Auto Packaging LT3 B', 'CI.0031', 'CI.0031', 'DS-2CD1027G2H - LIU', '2.8mm', '2mp', '172.22.7.236', '15', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(32, 2, 1, 2, 1, 1, 1, 'Leak Test Utara Line 1', 'CI.0032', 'CI.0032', 'DS-2CD1027G2H - LIU', '2.8mm', '2mp', '172.22.71.1', '16', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(33, 3, 1, 2, 1, 1, 1, 'Seat-Prog-B.004', 'CI.0033', 'CI.0033', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.93', '1', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(34, 3, 1, 2, 1, 1, 1, 'Seat-Prog-B165,B004', 'CI.0034', 'CI.0034', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.102', '2', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(35, 3, 1, 2, 1, 1, 1, 'Seat-Prog-B165,L227', 'CI.0035', 'CI.0035', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.89', '3', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(36, 3, 1, 2, 1, 1, 1, 'Seat-Prog-B002,B371', 'CI.0036', 'CI.0036', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.90', '4', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(37, 3, 1, 2, 1, 1, 1, 'Seat-Conveyor Waste Progresive', 'CI.0037', 'CI.0037', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.103', '5', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(38, 3, 1, 2, 1, 1, 1, 'Seat-B002', 'CI.0038', 'CI.0038', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.94', '6', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(39, 3, 1, 2, 1, 1, 1, 'Seat-B165,L227', 'CI.0039', 'CI.0039', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.95', '7', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(40, 3, 1, 2, 1, 1, 1, 'Seat-B371', 'CI.0040', 'CI.0040', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.98', '9', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(41, 3, 1, 2, 1, 1, 1, 'Seat- WIP Seat', 'CI.0041', 'CI.0041', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.96', '9', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(42, 3, 1, 2, 1, 1, 1, 'Seat Assy Union Tech 1 WPA.01', 'CI.0042', 'CI.0042', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.97', '10', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(43, 3, 1, 2, 1, 1, 1, 'Seat-Caking-L226', 'CI.0043', 'CI.0043', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.100', '11', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(44, 3, 1, 2, 1, 1, 1, 'Seat-Chamfer-Caking B069', 'CI.0044', 'CI.0044', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.104', '12', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(45, 3, 1, 2, 1, 1, 1, 'Seat-Caking-B069', 'CI.0045', 'CI.0045', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.147', '13', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(46, 3, 1, 2, 1, 1, 1, 'Seat-Prog-B371,L227', 'CI.0046', 'CI.0046', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.92', '14', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(47, 3, 1, 2, 1, 1, 1, 'Tapp-Multihead-L178,L196', 'CI.0047', 'CI.0047', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.109', '15', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(48, 3, 1, 2, 1, 1, 1, 'Tapp-Multihead-TMM16,13,14,15', 'CI.0048', 'CI.0048', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.91', '16', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(49, 4, 1, 2, 1, 1, 1, 'Body-50T-B022,B232', 'CI.0049', 'CI.0049', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.146', '1', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(50, 4, 1, 2, 1, 1, 1, 'Body-Busway-P101', 'CI.0050', 'CI.0050', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.137', '2', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(51, 4, 1, 2, 1, 1, 1, 'Body-50T-B022', 'CI.0051', 'CI.0051', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.134', '3', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(52, 4, 1, 2, 1, 1, 1, 'Body-50T-PHS30,31', 'CI.0052', 'CI.0052', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.135', '4', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(53, 4, 1, 2, 1, 1, 1, 'Body-Spot-B291,123 & F071,073', 'CI.0053', 'CI.0053', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.141', '5', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(54, 4, 1, 2, 1, 1, 1, 'Body-50T-B232,PHS28', 'CI.0054', 'CI.0054', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.139', '6', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(55, 4, 1, 2, 1, 1, 1, 'Body-Busway-P102,L197', 'CI.0055', 'CI.0055', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.133', '7', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(56, 4, 1, 2, 1, 1, 1, 'Body-Busway-B239,B260', 'CI.0056', 'CI.0056', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.138', '9', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(57, 4, 1, 2, 1, 1, 1, 'Seat-Prog-B004', 'CI.0057', 'CI.0057', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.99', '9', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(58, 4, 1, 2, 1, 1, 1, 'Seat-Prog-PME71', 'CI.0058', 'CI.0058', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.106', '10', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(59, 4, 1, 2, 1, 1, 1, 'Tapp-Single Head -B107,167,066', 'CI.0059', 'CI.0059', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.101', '11', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(60, 4, 1, 2, 1, 1, 1, 'Tapp - Single Head B106,067', 'CI.0060', 'CI.0060', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.136', '12', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(61, 4, 1, 2, 1, 3, 1, 'Gd Set-Palet Kosong-Tangga', 'CI.0061', 'CI.0061', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.107', '13', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(62, 4, 1, 2, 1, 3, 1, 'Body-Gd Set-Papan Kemajuan', 'CI.0062', 'CI.0062', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.105', '14', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(63, 4, 1, 2, 1, 3, 1, 'Gudang Set - Lift B', 'CI.0063', 'CI.0063', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.108', '15', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57'),
(64, 4, 1, 2, 1, 3, 1, 'Gd Set - Dial Non Subaru', 'CI.0064', 'CI.0064', 'DS-2CD1021-I', '2.8mm', '2mp', '172.22.7.142', '16', '-', NULL, '2025-10-10 03:05:57', '2025-10-10 03:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `camera_categories`
--

CREATE TABLE `camera_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `camera_categories`
--

INSERT INTO `camera_categories` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PROD', 'Area Produksi', '2025-10-10 02:34:09', '2025-10-10 02:34:09'),
(2, 'ARK', 'Area Rawan Kebakaran', '2025-10-10 02:34:22', '2025-10-10 02:34:22'),
(3, 'GKOMP', 'Gudang Komponen', '2025-10-10 02:34:47', '2025-10-10 02:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `camera_details`
--

CREATE TABLE `camera_details` (
  `id` bigint UNSIGNED NOT NULL,
  `camera_id` bigint UNSIGNED NOT NULL,
  `details` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `camera_types`
--

CREATE TABLE `camera_types` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `camera_types`
--

INSERT INTO `camera_types` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IPC', 'IP Cam', '2025-10-10 02:33:03', '2025-10-10 02:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `camera_variants`
--

CREATE TABLE `camera_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `camera_variants`
--

INSERT INTO `camera_variants` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NA', 'NA', '2025-10-10 02:36:53', '2025-10-10 02:36:53'),
(2, 'OTD', 'Outdoor', '2025-10-10 02:37:28', '2025-10-10 02:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `captures`
--

CREATE TABLE `captures` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `region_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'SSF', 'PT SELAMAT SEMPURNA TBK', '2025-10-10 02:31:46', '2025-10-10 02:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `company_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'SO', 'Spin On', '2025-10-10 02:32:04', '2025-10-10 02:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_08_024521_create_companies_table', 1),
(5, '2025_10_08_024536_create_locations_table', 1),
(6, '2025_10_08_024548_create_sub_locations_table', 1),
(7, '2025_10_08_024557_create_server_types_table', 1),
(8, '2025_10_08_024610_create_brands_table', 1),
(9, '2025_10_08_024846_create_servers_table', 1),
(10, '2025_10_08_024857_create_camera_types_table', 1),
(11, '2025_10_08_024917_create_camera_categories_table', 1),
(12, '2025_10_08_024931_create_camera_variants_table', 1),
(13, '2025_10_08_024940_create_cameras_table', 1),
(14, '2025_10_08_024959_create_captures_table', 1),
(15, '2025_10_08_030601_create_camera_details_table', 1),
(16, '2025_10_08_055854_add_server_id_to_cameras_table', 1),
(17, '2025_10_09_013806_change_field_camera_details', 1),
(18, '2025_10_09_093108_remove_camera_id_from_captures_table', 1),
(19, '2025_10_10_074727_create_regions_and_add_region_id_to_companies', 1),
(20, '2025_10_10_075347_remove_portuse_from_servers_table', 1),
(21, '2025_10_10_091502_change_about_locations', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TGR', 'Tangerang', '2025-10-10 02:31:22', '2025-10-10 02:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `id` bigint UNSIGNED NOT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `sub_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noAsset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portAvailable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hddSize` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `type_id`, `brand_id`, `location_id`, `sub_location`, `noAsset`, `name`, `model`, `portAvailable`, `hddSize`, `ipAddress`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'POS MONITORING CCTV', 'CN.0001', 'TGR-SSF-SO01', 'DS-7616NI-Q2', '16', '8 TB', '172.22.100.180', '2025-10-10 02:44:22', '2025-10-10 04:16:23'),
(2, 1, 1, 1, 'POS MONITORING CCTV', 'CN.0002', 'TGR-SSF-SO02', 'DS-7616NI-Q2', '16', '8 TB', '172.22.102.87', '2025-10-10 03:29:19', '2025-10-10 03:29:19'),
(3, 1, 1, 1, 'POS MONITORING CCTV', 'CN.0003', 'TGR-SSF-SO03', 'DS-7616NI-Q2', '16', '8 TB', '172.22.0.96', '2025-10-10 04:14:58', '2025-10-10 04:14:58'),
(4, 1, 1, 1, 'POS MONITORING CCTV', 'CN.0004', 'TGR-SSF-SO04', 'DS-7616NI-Q2', '16', '8 TB', '172.22.0.97', '2025-10-10 04:16:09', '2025-10-10 04:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `server_types`
--

CREATE TABLE `server_types` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `server_types`
--

INSERT INTO `server_types` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'NVR', 'NVR', '2025-10-10 02:32:40', '2025-10-10 02:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5UhNoDpZrvRYsGbx18m28gQTeFSHwXJuNE7nwNt5', 1, '192.168.88.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibmp2dkNqa0drUHN3YXpVN21DRkllV1I3WTJnOTRMY3RhbmtSSTRzWCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM5OiJodHRwOi8vMTkyLjE2OC44OC4zOTo4MDAwL2FkbWluL2NhbWVyYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkamJsWnlyMjVMc1NMMi9pTlM4QlJXLlJncnd2RnlJa2Z5VUNtYlBkQ0FNWVNuYmJCTWpZYWkiO3M6NjoidGFibGVzIjthOjI6e3M6NDA6ImU2NDQ4MzNmNGU0ZTA4NzEyMzE1ZGE3MWIzM2ZhY2QyX2NvbHVtbnMiO2E6NDp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjQ6Im5hbWUiO3M6NToibGFiZWwiO3M6NDoiTmFtZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NToiZW1haWwiO3M6NToibGFiZWwiO3M6MTM6IkVtYWlsIGFkZHJlc3MiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJDcmVhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJVcGRhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fXM6NDA6IjZhZjFiMzcyY2EwM2ViNzlhM2RiOTdjNmYzMDA0ZmQ3X2NvbHVtbnMiO2E6MjE6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJpbWFnZXMiO3M6NToibGFiZWwiO3M6NToiSW1hZ2UiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6Im5vQXNzZXQiO3M6NToibGFiZWwiO3M6ODoiTm8gYXNzZXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjQ6Im5hbWUiO3M6NToibGFiZWwiO3M6NDoiTmFtZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTE6InNlcnZlci5uYW1lIjtzOjU6ImxhYmVsIjtzOjY6IlNlcnZlciI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImJyYW5kLm5hbWUiO3M6NToibGFiZWwiO3M6NToiQnJhbmQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6Im1vZGVsIjtzOjU6ImxhYmVsIjtzOjU6Ik1vZGVsIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxODoiY2FtZXJhVmFyaWFudC5uYW1lIjtzOjU6ImxhYmVsIjtzOjE0OiJDYW1lcmEgVmFyaWFudCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6OToidHlwZS5uYW1lIjtzOjU6ImxhYmVsIjtzOjQ6IlR5cGUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo4O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJjYXRlZ29yeS5uYW1lIjtzOjU6ImxhYmVsIjtzOjg6IkNhdGVnb3J5IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6OTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJsZW5zIjtzOjU6ImxhYmVsIjtzOjQ6IkxlbnMiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoicmVzb2x1dGlvbiI7czo1OiJsYWJlbCI7czoxMDoiUmVzb2x1dGlvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjExO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6ImlwQWRkcmVzcyI7czo1OiJsYWJlbCI7czoxMDoiSXAgYWRkcmVzcyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjEyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6ImNoYW5uZWwiO3M6NToibGFiZWwiO3M6NzoiQ2hhbm5lbCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjEzO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJjb29yZGluYXRlIjtzOjU6ImxhYmVsIjtzOjEwOiJDb29yZGluYXRlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NzoicHVycG9zZSI7czo1OiJsYWJlbCI7czo3OiJQdXJwb3NlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTU7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTI6InN1Yl9sb2NhdGlvbiI7czo1OiJsYWJlbCI7czoxMjoiU3ViIExvY2F0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTM6ImxvY2F0aW9uLm5hbWUiO3M6NToibGFiZWwiO3M6ODoiTG9jYXRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxNzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyMToibG9jYXRpb24uY29tcGFueS5uYW1lIjtzOjU6ImxhYmVsIjtzOjc6IkNvbXBhbnkiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxODthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyODoibG9jYXRpb24uY29tcGFueS5yZWdpb24ubmFtZSI7czo1OiJsYWJlbCI7czo2OiJSZWdpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxOTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiQ3JlYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6MjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IlVwZGF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO319fX0=', 1760325251),
('6hOFjPT91CaIDawuWg5dYxDePGekC07E3WFxXBxc', 1, '192.168.88.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiUHh5RG1pSXliNEc4OXpXWjJjVGxtZ09GY29SdDRLa3lGcUw3d1FUWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xOTIuMTY4Ljg4LjY5OjgwMDAvYWRtaW4vY2FtZXJhcz9wYWdlPTIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJGpibFp5cjI1THNTTDIvaU5TOEJSVy5SZ3J3dkZ5SWtmeVVDbWJQZENBTVlTbmJiQk1qWWFpIjtzOjY6InRhYmxlcyI7YTozOntzOjQwOiJlNjQ0ODMzZjRlNGUwODcxMjMxNWRhNzFiMzNmYWNkMl9jb2x1bW5zIjthOjQ6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJuYW1lIjtzOjU6ImxhYmVsIjtzOjQ6Ik5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6ImVtYWlsIjtzOjU6ImxhYmVsIjtzOjEzOiJFbWFpbCBhZGRyZXNzIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiQ3JlYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoidXBkYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiVXBkYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fX1zOjQwOiI2YWYxYjM3MmNhMDNlYjc5YTNkYjk3YzZmMzAwNGZkN19jb2x1bW5zIjthOjIxOntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NjoiaW1hZ2VzIjtzOjU6ImxhYmVsIjtzOjU6IkltYWdlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo3OiJub0Fzc2V0IjtzOjU6ImxhYmVsIjtzOjg6Ik5vIGFzc2V0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJuYW1lIjtzOjU6ImxhYmVsIjtzOjQ6Ik5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJzZXJ2ZXIubmFtZSI7czo1OiJsYWJlbCI7czo2OiJTZXJ2ZXIiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJicmFuZC5uYW1lIjtzOjU6ImxhYmVsIjtzOjU6IkJyYW5kIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJtb2RlbCI7czo1OiJsYWJlbCI7czo1OiJNb2RlbCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTg6ImNhbWVyYVZhcmlhbnQubmFtZSI7czo1OiJsYWJlbCI7czoxNDoiQ2FtZXJhIFZhcmlhbnQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo3O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6InR5cGUubmFtZSI7czo1OiJsYWJlbCI7czo0OiJUeXBlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6ODthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMzoiY2F0ZWdvcnkubmFtZSI7czo1OiJsYWJlbCI7czo4OiJDYXRlZ29yeSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjk7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoibGVucyI7czo1OiJsYWJlbCI7czo0OiJMZW5zIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InJlc29sdXRpb24iO3M6NToibGFiZWwiO3M6MTA6IlJlc29sdXRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo5OiJpcEFkZHJlc3MiO3M6NToibGFiZWwiO3M6MTA6IklwIGFkZHJlc3MiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo3OiJjaGFubmVsIjtzOjU6ImxhYmVsIjtzOjc6IkNoYW5uZWwiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY29vcmRpbmF0ZSI7czo1OiJsYWJlbCI7czoxMDoiQ29vcmRpbmF0ZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6InB1cnBvc2UiO3M6NToibGFiZWwiO3M6NzoiUHVycG9zZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEyOiJzdWJfbG9jYXRpb24iO3M6NToibGFiZWwiO3M6MTI6IlN1YiBMb2NhdGlvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJsb2NhdGlvbi5uYW1lIjtzOjU6ImxhYmVsIjtzOjg6IkxvY2F0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MjE6ImxvY2F0aW9uLmNvbXBhbnkubmFtZSI7czo1OiJsYWJlbCI7czo3OiJDb21wYW55IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTg7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6Mjg6ImxvY2F0aW9uLmNvbXBhbnkucmVnaW9uLm5hbWUiO3M6NToibGFiZWwiO3M6NjoiUmVnaW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTk7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjIwO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJVcGRhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fXM6NDA6IjMxNTc0YTIzM2E0NWM1NDRhYWFjNGRhYTc3ZjZmMTMwX2NvbHVtbnMiO2E6MTQ6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJuYW1lIjtzOjU6ImxhYmVsIjtzOjQ6Ik5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6InR5cGUubmFtZSI7czo1OiJsYWJlbCI7czo0OiJUeXBlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiYnJhbmQubmFtZSI7czo1OiJsYWJlbCI7czo1OiJCcmFuZCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6Nzoibm9Bc3NldCI7czo1OiJsYWJlbCI7czo4OiJObyBBc3NldCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NToibW9kZWwiO3M6NToibGFiZWwiO3M6NToiTW9kZWwiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJwb3J0QXZhaWxhYmxlIjtzOjU6ImxhYmVsIjtzOjE0OiJQb3J0IEF2YWlsYWJsZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NzoicG9ydFVzZSI7czo1OiJsYWJlbCI7czo4OiJQb3J0IFVzZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NzoiaGRkU2l6ZSI7czo1OiJsYWJlbCI7czo4OiJIREQgU2l6ZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjg7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6OToiaXBBZGRyZXNzIjtzOjU6ImxhYmVsIjtzOjEwOiJJUCBBZGRyZXNzIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6OTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMzoiY2FtZXJhc19jb3VudCI7czo1OiJsYWJlbCI7czo3OiJDYW1lcmFzIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTI6InN1Yl9sb2NhdGlvbiI7czo1OiJsYWJlbCI7czoxMjoiU3ViIExvY2F0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6Mjg6ImxvY2F0aW9uLmNvbXBhbnkucmVnaW9uLm5hbWUiO3M6NToibGFiZWwiO3M6ODoiTG9jYXRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiQ3JlYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6MTM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IlVwZGF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO319fXM6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1760324506),
('bAJaI5JdSyqNQoXhpf6EfUUnNzjoolLN2IrSgbFv', NULL, '192.168.88.69', 'AVG Antivirus', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnozVzdBQ1V3Q1dCZWZsRmpqNlRqS1dzU0NGREtvZEg2VDAyN3dXYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4Ljg4LjY5OjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760322806),
('EQNnhwv5ZqmTy5jfOsl60RsKGBN20NkTgB37mmlJ', NULL, '192.168.88.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVRLUUxMRmxtcFZKUHBpbXp5RWo3UGpBSWxKY2NOQ0o1dHVINEx6eiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xOTIuMTY4Ljg4LjM5OjgwMDAvYWRtaW4vbG9naW4iO319', 1760325248),
('iY4bdfnAneYlkpbGFdrFcM3BXMjDuuu6C8gduvlX', 1, '192.168.88.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiN0EzNzRGUzkzeDFpVmFsT3BlWEduMW9jc0JyeFVBalJYUnNLa1paayI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTkyLjE2OC44OC4zOTo4MDAwLz9zZWFyY2g9Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJGpibFp5cjI1THNTTDIvaU5TOEJSVy5SZ3J3dkZ5SWtmeVVDbWJQZENBTVlTbmJiQk1qWWFpIjtzOjY6InRhYmxlcyI7YToyOntzOjQwOiJlNjQ0ODMzZjRlNGUwODcxMjMxNWRhNzFiMzNmYWNkMl9jb2x1bW5zIjthOjQ6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJuYW1lIjtzOjU6ImxhYmVsIjtzOjQ6Ik5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6ImVtYWlsIjtzOjU6ImxhYmVsIjtzOjEzOiJFbWFpbCBhZGRyZXNzIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiQ3JlYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoidXBkYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiVXBkYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fX1zOjQwOiI2YWYxYjM3MmNhMDNlYjc5YTNkYjk3YzZmMzAwNGZkN19jb2x1bW5zIjthOjIxOntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NjoiaW1hZ2VzIjtzOjU6ImxhYmVsIjtzOjU6IkltYWdlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo3OiJub0Fzc2V0IjtzOjU6ImxhYmVsIjtzOjg6Ik5vIGFzc2V0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJuYW1lIjtzOjU6ImxhYmVsIjtzOjQ6Ik5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJzZXJ2ZXIubmFtZSI7czo1OiJsYWJlbCI7czo2OiJTZXJ2ZXIiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJicmFuZC5uYW1lIjtzOjU6ImxhYmVsIjtzOjU6IkJyYW5kIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJtb2RlbCI7czo1OiJsYWJlbCI7czo1OiJNb2RlbCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTg6ImNhbWVyYVZhcmlhbnQubmFtZSI7czo1OiJsYWJlbCI7czoxNDoiQ2FtZXJhIFZhcmlhbnQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo3O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6InR5cGUubmFtZSI7czo1OiJsYWJlbCI7czo0OiJUeXBlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6ODthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMzoiY2F0ZWdvcnkubmFtZSI7czo1OiJsYWJlbCI7czo4OiJDYXRlZ29yeSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjk7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoibGVucyI7czo1OiJsYWJlbCI7czo0OiJMZW5zIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InJlc29sdXRpb24iO3M6NToibGFiZWwiO3M6MTA6IlJlc29sdXRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo5OiJpcEFkZHJlc3MiO3M6NToibGFiZWwiO3M6MTA6IklwIGFkZHJlc3MiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo3OiJjaGFubmVsIjtzOjU6ImxhYmVsIjtzOjc6IkNoYW5uZWwiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY29vcmRpbmF0ZSI7czo1OiJsYWJlbCI7czoxMDoiQ29vcmRpbmF0ZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6InB1cnBvc2UiO3M6NToibGFiZWwiO3M6NzoiUHVycG9zZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEyOiJzdWJfbG9jYXRpb24iO3M6NToibGFiZWwiO3M6MTI6IlN1YiBMb2NhdGlvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJsb2NhdGlvbi5uYW1lIjtzOjU6ImxhYmVsIjtzOjg6IkxvY2F0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MjE6ImxvY2F0aW9uLmNvbXBhbnkubmFtZSI7czo1OiJsYWJlbCI7czo3OiJDb21wYW55IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTg7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6Mjg6ImxvY2F0aW9uLmNvbXBhbnkucmVnaW9uLm5hbWUiO3M6NToibGFiZWwiO3M6NjoiUmVnaW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTk7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjIwO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJVcGRhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fX1zOjg6ImZpbGFtZW50IjthOjA6e319', 1760325661),
('qdiRvbvmTJQYwXZhcAvqrn5cDjSsys1Qa6DZrzoE', NULL, '192.168.88.69', 'AVG Antivirus', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2RJWm15aDhzMnlkWnhNbTlyYVJNbkRuQXRoM3VJYXh3Z3FwaVhDaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4Ljg4LjY5OjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760323293),
('WdnsdG6AqJc6g1I93C7Oa1K8Kzz8WzwA9p1x1bf6', NULL, '192.168.88.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWR5elF1bEVEZG9rSFNyRHd2dHJkQjFtMmQwWjRlTTl1QVNOMnI4aiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xOTIuMTY4Ljg4LjM5OjgwMDAvYWRtaW4vbG9naW4iO319', 1760325233),
('XLetSE6jVuqZUUgN5zPZMVriwjzmXsuPrM9K2Pi1', NULL, '192.168.88.69', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkJIWnhOeVk0WXFNS1VjWFpLbVF0ZzA1Y0xGWVVINVVzalVmMWVPTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xOTIuMTY4Ljg4LjY5OjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760323300),
('ymAyoxhjlGkfnJqA5CpbEYnPR12s3t5sQZD8yUfZ', 1, '192.168.88.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWW96cHlwa3ZWWkJOUkdaelI4VDdSY2V1WnRIYnZDeWJHWTZZOGhKQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xOTIuMTY4Ljg4LjY5OjgwMDAvP3NlYXJjaD0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJGpibFp5cjI1THNTTDIvaU5TOEJSVy5SZ3J3dkZ5SWtmeVVDbWJQZENBTVlTbmJiQk1qWWFpIjtzOjY6InRhYmxlcyI7YTo0OntzOjQwOiJlNjQ0ODMzZjRlNGUwODcxMjMxNWRhNzFiMzNmYWNkMl9jb2x1bW5zIjthOjQ6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJuYW1lIjtzOjU6ImxhYmVsIjtzOjQ6Ik5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6ImVtYWlsIjtzOjU6ImxhYmVsIjtzOjEzOiJFbWFpbCBhZGRyZXNzIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiQ3JlYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoidXBkYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiVXBkYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fX1zOjQwOiIzMTU3NGEyMzNhNDVjNTQ0YWFhYzRkYWE3N2Y2ZjEzMF9jb2x1bW5zIjthOjE0OntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoibmFtZSI7czo1OiJsYWJlbCI7czo0OiJOYW1lIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo5OiJ0eXBlLm5hbWUiO3M6NToibGFiZWwiO3M6NDoiVHlwZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImJyYW5kLm5hbWUiO3M6NToibGFiZWwiO3M6NToiQnJhbmQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6Im5vQXNzZXQiO3M6NToibGFiZWwiO3M6ODoiTm8gQXNzZXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6Im1vZGVsIjtzOjU6ImxhYmVsIjtzOjU6Ik1vZGVsIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMzoicG9ydEF2YWlsYWJsZSI7czo1OiJsYWJlbCI7czoxNDoiUG9ydCBBdmFpbGFibGUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6InBvcnRVc2UiO3M6NToibGFiZWwiO3M6ODoiUG9ydCBVc2UiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo3O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6ImhkZFNpemUiO3M6NToibGFiZWwiO3M6ODoiSEREIFNpemUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo4O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6ImlwQWRkcmVzcyI7czo1OiJsYWJlbCI7czoxMDoiSVAgQWRkcmVzcyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjk7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTM6ImNhbWVyYXNfY291bnQiO3M6NToibGFiZWwiO3M6NzoiQ2FtZXJhcyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjEwO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEyOiJzdWJfbG9jYXRpb24iO3M6NToibGFiZWwiO3M6MTI6IlN1YiBMb2NhdGlvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjExO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjI4OiJsb2NhdGlvbi5jb21wYW55LnJlZ2lvbi5uYW1lIjtzOjU6ImxhYmVsIjtzOjg6IkxvY2F0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjEzO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJVcGRhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fXM6NDA6IjZhZjFiMzcyY2EwM2ViNzlhM2RiOTdjNmYzMDA0ZmQ3X2NvbHVtbnMiO2E6MjE6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJpbWFnZXMiO3M6NToibGFiZWwiO3M6NToiSW1hZ2UiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6Im5vQXNzZXQiO3M6NToibGFiZWwiO3M6ODoiTm8gYXNzZXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjQ6Im5hbWUiO3M6NToibGFiZWwiO3M6NDoiTmFtZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTE6InNlcnZlci5uYW1lIjtzOjU6ImxhYmVsIjtzOjY6IlNlcnZlciI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImJyYW5kLm5hbWUiO3M6NToibGFiZWwiO3M6NToiQnJhbmQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6Im1vZGVsIjtzOjU6ImxhYmVsIjtzOjU6Ik1vZGVsIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxODoiY2FtZXJhVmFyaWFudC5uYW1lIjtzOjU6ImxhYmVsIjtzOjE0OiJDYW1lcmEgVmFyaWFudCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6OToidHlwZS5uYW1lIjtzOjU6ImxhYmVsIjtzOjQ6IlR5cGUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo4O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJjYXRlZ29yeS5uYW1lIjtzOjU6ImxhYmVsIjtzOjg6IkNhdGVnb3J5IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6OTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJsZW5zIjtzOjU6ImxhYmVsIjtzOjQ6IkxlbnMiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxMDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoicmVzb2x1dGlvbiI7czo1OiJsYWJlbCI7czoxMDoiUmVzb2x1dGlvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjExO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6ImlwQWRkcmVzcyI7czo1OiJsYWJlbCI7czoxMDoiSXAgYWRkcmVzcyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjEyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6ImNoYW5uZWwiO3M6NToibGFiZWwiO3M6NzoiQ2hhbm5lbCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjEzO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJjb29yZGluYXRlIjtzOjU6ImxhYmVsIjtzOjEwOiJDb29yZGluYXRlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NzoicHVycG9zZSI7czo1OiJsYWJlbCI7czo3OiJQdXJwb3NlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTU7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTI6InN1Yl9sb2NhdGlvbiI7czo1OiJsYWJlbCI7czoxMjoiU3ViIExvY2F0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTM6ImxvY2F0aW9uLm5hbWUiO3M6NToibGFiZWwiO3M6ODoiTG9jYXRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxNzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyMToibG9jYXRpb24uY29tcGFueS5uYW1lIjtzOjU6ImxhYmVsIjtzOjc6IkNvbXBhbnkiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxODthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyODoibG9jYXRpb24uY29tcGFueS5yZWdpb24ubmFtZSI7czo1OiJsYWJlbCI7czo2OiJSZWdpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxOTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiQ3JlYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6MjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IlVwZGF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO319czo0MDoiOTE3MjBkMzZjOGZlMDA1OTA4MTY4YzE2ZGVmZTJmNzJfY29sdW1ucyI7YTo3OntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MjE6ImNhbWVyYS5zZXJ2ZXIubm9Bc3NldCI7czo1OiJsYWJlbCI7czoxNToiTm8gQXNzZXQgU2VydmVyIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxODoiY2FtZXJhLnNlcnZlci5uYW1lIjtzOjU6ImxhYmVsIjtzOjExOiJTZXJ2ZXIgTmFtZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTQ6ImNhbWVyYS5ub0Fzc2V0IjtzOjU6ImxhYmVsIjtzOjE1OiJObyBBc3NldCBDYW1lcmEiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJjYW1lcmEubmFtZSI7czo1OiJsYWJlbCI7czoxMToiQ2FtZXJhIE5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjc6ImRldGFpbHMiO3M6NToibGFiZWwiO3M6MTI6IlRvdGFsIEltYWdlcyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjU7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO31pOjY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IlVwZGF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO319fX0=', 1760324401);

-- --------------------------------------------------------

--
-- Table structure for table `sub_locations`
--

CREATE TABLE `sub_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2025-10-10 02:29:53', '$2y$12$jblZyr25LsSL2/iNS8BRW.RgrwvFyIkfyUCmbPdCAMYSnbbBMjYai', NULL, '2025-10-10 02:29:53', '2025-10-10 02:29:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
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
-- Indexes for table `cameras`
--
ALTER TABLE `cameras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cameras_brand_id_foreign` (`brand_id`),
  ADD KEY `cameras_camera_variant_id_foreign` (`camera_variant_id`),
  ADD KEY `cameras_type_id_foreign` (`type_id`),
  ADD KEY `cameras_category_id_foreign` (`category_id`),
  ADD KEY `cameras_server_id_foreign` (`server_id`),
  ADD KEY `cameras_location_id_foreign` (`location_id`);

--
-- Indexes for table `camera_categories`
--
ALTER TABLE `camera_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camera_details`
--
ALTER TABLE `camera_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `camera_details_camera_id_foreign` (`camera_id`);

--
-- Indexes for table `camera_types`
--
ALTER TABLE `camera_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camera_variants`
--
ALTER TABLE `camera_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captures`
--
ALTER TABLE `captures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_region_id_foreign` (`region_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_company_id_foreign` (`company_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regions_code_unique` (`code`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servers_type_id_foreign` (`type_id`),
  ADD KEY `servers_brand_id_foreign` (`brand_id`),
  ADD KEY `servers_location_id_foreign` (`location_id`);

--
-- Indexes for table `server_types`
--
ALTER TABLE `server_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_locations`
--
ALTER TABLE `sub_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_locations_location_id_foreign` (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cameras`
--
ALTER TABLE `cameras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `camera_categories`
--
ALTER TABLE `camera_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `camera_details`
--
ALTER TABLE `camera_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `camera_types`
--
ALTER TABLE `camera_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `camera_variants`
--
ALTER TABLE `camera_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `captures`
--
ALTER TABLE `captures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `server_types`
--
ALTER TABLE `server_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_locations`
--
ALTER TABLE `sub_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cameras`
--
ALTER TABLE `cameras`
  ADD CONSTRAINT `cameras_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cameras_camera_variant_id_foreign` FOREIGN KEY (`camera_variant_id`) REFERENCES `camera_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cameras_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `camera_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cameras_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cameras_server_id_foreign` FOREIGN KEY (`server_id`) REFERENCES `servers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cameras_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `camera_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `camera_details`
--
ALTER TABLE `camera_details`
  ADD CONSTRAINT `camera_details_camera_id_foreign` FOREIGN KEY (`camera_id`) REFERENCES `cameras` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `servers`
--
ALTER TABLE `servers`
  ADD CONSTRAINT `servers_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `servers_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `servers_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `server_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_locations`
--
ALTER TABLE `sub_locations`
  ADD CONSTRAINT `sub_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
