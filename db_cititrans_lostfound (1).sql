-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2026 at 10:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cititrans_lostfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `description`, `ip_address`, `role`, `created_at`, `updated_at`) VALUES
(308, 1, 'login', 'log.login_success', '127.0.0.1', 'admin', '2026-05-06 01:33:40', '2026-05-06 01:33:40'),
(309, 1, 'login', 'log.login_success', '192.168.0.29', 'admin', '2026-05-06 01:40:05', '2026-05-06 01:40:05'),
(310, 1, 'login', 'log.login_success', '192.168.0.20', 'admin', '2026-05-06 01:44:47', '2026-05-06 01:44:47'),
(311, 1, 'login', 'log.login_success', '192.168.0.29', 'admin', '2026-05-06 01:46:18', '2026-05-06 01:46:18'),
(312, 1, 'login', 'log.login_success', '192.168.0.20', 'admin', '2026-05-06 06:26:33', '2026-05-06 06:26:33'),
(313, 1, 'logout', 'User keluar dari sistem', '192.168.0.20', 'admin', '2026-05-06 06:34:41', '2026-05-06 06:34:41'),
(314, 1, 'login', 'log.login_success', '192.168.0.11', 'admin', '2026-05-06 06:35:36', '2026-05-06 06:35:36'),
(315, 1, 'login', 'log.login_success', '192.168.0.20', 'admin', '2026-05-06 07:48:35', '2026-05-06 07:48:35'),
(316, 1, 'delete', 'Admin menghapus data: Cutter', '192.168.0.20', 'admin', '2026-05-06 08:06:11', '2026-05-06 08:06:11'),
(317, 1, 'create', 'Admin menambahkan barang baru: tau tea', '192.168.0.11', 'admin', '2026-05-06 08:27:55', '2026-05-06 08:27:55'),
(318, 1, 'print', 'Admin mencetak dokumen LPB untuk barang: tau tea', '192.168.0.20', 'admin', '2026-05-06 08:28:29', '2026-05-06 08:28:29'),
(319, 1, 'print', 'Admin mencetak dokumen LPB untuk barang: tau tea', '192.168.0.20', 'admin', '2026-05-06 08:28:34', '2026-05-06 08:28:34'),
(320, 4, 'login', 'log.login_success', '192.168.0.11', 'petugas', '2026-05-06 09:31:31', '2026-05-06 09:31:31'),
(321, 1, 'logout', 'User keluar dari sistem', '192.168.0.20', 'admin', '2026-05-06 09:31:59', '2026-05-06 09:31:59'),
(322, 4, 'login', 'log.login_success', '192.168.0.20', 'petugas', '2026-05-06 09:32:09', '2026-05-06 09:32:09'),
(323, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-07 02:23:14', '2026-05-07 02:23:14'),
(324, 4, 'login', 'log.login_success', '192.168.0.24', 'petugas', '2026-05-07 02:30:23', '2026-05-07 02:30:23'),
(325, 4, 'logout', 'User keluar dari sistem', '192.168.0.24', 'petugas', '2026-05-07 02:30:47', '2026-05-07 02:30:47'),
(326, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-07 02:45:33', '2026-05-07 02:45:33'),
(327, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-07 02:45:43', '2026-05-07 02:45:43'),
(328, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'petugas', '2026-05-07 02:49:36', '2026-05-07 02:49:36'),
(329, 4, 'login', 'log.login_success', '192.168.0.24', 'petugas', '2026-05-07 02:49:52', '2026-05-07 02:49:52'),
(330, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-07 02:51:41', '2026-05-07 02:51:41'),
(331, 1, 'print', 'Admin mencetak dokumen LPB untuk barang: tau tea', '192.168.0.23', 'admin', '2026-05-07 02:52:26', '2026-05-07 02:52:26'),
(332, 1, 'print', 'Admin mencetak dokumen LPB untuk barang: tau tea', '192.168.0.23', 'admin', '2026-05-07 02:52:29', '2026-05-07 02:52:29'),
(333, 4, 'create', 'Bayu Septian menambahkan barang baru: heheheh', '192.168.0.24', 'petugas', '2026-05-07 04:41:32', '2026-05-07 04:41:32'),
(334, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-07 04:47:53', '2026-05-07 04:47:53'),
(335, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-07 04:48:00', '2026-05-07 04:48:00'),
(336, 4, 'create', 'Bayu Septian menambahkan barang baru: manusia', '192.168.0.24', 'petugas', '2026-05-07 04:51:54', '2026-05-07 04:51:54'),
(337, 1, 'delete', 'Admin menghapus data: manusia', '192.168.0.23', 'admin', '2026-05-07 04:52:44', '2026-05-07 04:52:44'),
(338, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-07 04:53:32', '2026-05-07 04:53:32'),
(339, NULL, 'create', 'Guest menambahkan barang baru: baju', '192.168.0.23', 'guest', '2026-05-07 05:04:02', '2026-05-07 05:04:02'),
(340, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-07 05:04:14', '2026-05-07 05:04:14'),
(341, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-07 05:04:34', '2026-05-07 05:04:34'),
(342, 5, 'login', 'log.login_success', '192.168.0.23', 'management', '2026-05-07 05:04:46', '2026-05-07 05:04:46'),
(343, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-07 05:05:01', '2026-05-07 05:05:01'),
(344, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-07 05:05:09', '2026-05-07 05:05:09'),
(345, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-08 01:49:03', '2026-05-08 01:49:03'),
(346, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'petugas', '2026-05-08 02:07:50', '2026-05-08 02:07:50'),
(347, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-08 02:08:11', '2026-05-08 02:08:11'),
(348, 1, 'create', 'Admin menambahkan barang baru: baju', '192.168.0.23', 'admin', '2026-05-08 02:15:04', '2026-05-08 02:15:04'),
(349, 1, 'delete', 'Admin menghapus data: baju', '192.168.0.23', 'admin', '2026-05-08 02:15:48', '2026-05-08 02:15:48'),
(350, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-08 02:15:52', '2026-05-08 02:15:52'),
(351, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-08 02:16:01', '2026-05-08 02:16:01'),
(352, 4, 'create', 'Bayu Septian menambahkan barang baru: Handphone Samsung', '192.168.0.23', 'petugas', '2026-05-08 02:16:33', '2026-05-08 02:16:33'),
(353, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'petugas', '2026-05-08 02:16:45', '2026-05-08 02:16:45'),
(354, NULL, 'create', 'Guest menambahkan barang baru: saassa', '192.168.0.23', 'guest', '2026-05-08 02:17:19', '2026-05-08 02:17:19'),
(355, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-08 02:17:30', '2026-05-08 02:17:30'),
(356, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'petugas', '2026-05-08 02:22:53', '2026-05-08 02:22:53'),
(357, NULL, 'create', 'Guest menambahkan barang baru: Handphone Samsung', '192.168.0.23', 'guest', '2026-05-08 02:23:22', '2026-05-08 02:23:22'),
(358, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-08 02:23:31', '2026-05-08 02:23:31'),
(359, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'petugas', '2026-05-08 02:24:22', '2026-05-08 02:24:22'),
(360, NULL, 'create', 'Guest menambahkan barang baru: Handphone Samsung', '192.168.0.23', 'guest', '2026-05-08 02:24:47', '2026-05-08 02:24:47'),
(361, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-08 02:25:02', '2026-05-08 02:25:02'),
(362, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'petugas', '2026-05-08 02:25:26', '2026-05-08 02:25:26'),
(363, 5, 'login', 'log.login_success', '192.168.0.23', 'management', '2026-05-08 02:25:43', '2026-05-08 02:25:43'),
(364, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-08 02:25:55', '2026-05-08 02:25:55'),
(365, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-08 02:26:09', '2026-05-08 02:26:09'),
(366, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'petugas', '2026-05-08 02:26:27', '2026-05-08 02:26:27'),
(367, 5, 'login', 'log.login_success', '192.168.0.23', 'management', '2026-05-08 02:26:36', '2026-05-08 02:26:36'),
(368, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-08 03:05:58', '2026-05-08 03:05:58'),
(369, 5, 'login', 'log.login_success', '192.168.0.23', 'management', '2026-05-08 03:19:17', '2026-05-08 03:19:17'),
(370, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-08 03:20:05', '2026-05-08 03:20:05'),
(371, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-08 03:20:13', '2026-05-08 03:20:13'),
(372, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-08 03:22:37', '2026-05-08 03:22:37'),
(373, 5, 'login', 'log.login_success', '192.168.0.23', 'management', '2026-05-08 03:22:46', '2026-05-08 03:22:46'),
(374, 5, 'update', 'Menyetujui (Approve) user: Bayu', '192.168.0.23', 'management', '2026-05-08 03:24:03', '2026-05-08 03:24:03'),
(375, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-08 03:49:27', '2026-05-08 03:49:27'),
(376, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-08 03:51:02', '2026-05-08 03:51:02'),
(377, 1, 'print', 'Admin mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'admin', '2026-05-08 03:51:42', '2026-05-08 03:51:42'),
(378, 1, 'update', 'Mengupdate data user: Bayu', '192.168.0.23', 'admin', '2026-05-08 03:52:06', '2026-05-08 03:52:06'),
(379, 4, 'login', 'log.login_success', '192.168.0.13', 'petugas', '2026-05-08 04:06:43', '2026-05-08 04:06:43'),
(380, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.13', 'petugas', '2026-05-08 04:07:02', '2026-05-08 04:07:02'),
(381, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-08 04:09:10', '2026-05-08 04:09:10'),
(382, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'petugas', '2026-05-08 04:16:37', '2026-05-08 04:16:37'),
(383, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-08 04:16:45', '2026-05-08 04:16:45'),
(384, 4, 'logout', 'User keluar dari sistem', '192.168.0.13', 'petugas', '2026-05-08 04:17:28', '2026-05-08 04:17:28'),
(385, 4, 'login', 'log.login_success', '192.168.0.13', 'petugas', '2026-05-08 04:18:24', '2026-05-08 04:18:24'),
(386, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.13', 'petugas', '2026-05-08 04:20:55', '2026-05-08 04:20:55'),
(387, 4, 'logout', 'User keluar dari sistem', '192.168.0.13', 'petugas', '2026-05-08 04:21:19', '2026-05-08 04:21:19'),
(388, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-08 04:21:22', '2026-05-08 04:21:22'),
(389, NULL, 'create', 'Guest menambahkan barang baru: tissue', '192.168.0.13', 'guest', '2026-05-08 04:33:16', '2026-05-08 04:33:16'),
(390, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-08 04:33:28', '2026-05-08 04:33:28'),
(391, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-08 08:56:34', '2026-05-08 08:56:34'),
(392, 4, 'login', 'log.login_success', '192.168.0.13', 'petugas', '2026-05-08 09:01:24', '2026-05-08 09:01:24'),
(393, 4, 'logout', 'User keluar dari sistem', '192.168.0.13', 'petugas', '2026-05-08 09:01:38', '2026-05-08 09:01:38'),
(394, 4, 'login', 'log.login_success', '192.168.0.13', 'petugas', '2026-05-08 09:02:11', '2026-05-08 09:02:11'),
(395, 4, 'logout', 'User keluar dari sistem', '192.168.0.13', 'petugas', '2026-05-08 09:04:20', '2026-05-08 09:04:20'),
(396, 4, 'login', 'log.login_success', '192.168.0.13', 'petugas', '2026-05-08 09:16:43', '2026-05-08 09:16:43'),
(397, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-11 05:39:29', '2026-05-11 05:39:29'),
(398, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-11 05:44:47', '2026-05-11 05:44:47'),
(399, 4, 'login', 'log.login_success', '192.168.0.23', 'petugas', '2026-05-11 05:44:55', '2026-05-11 05:44:55'),
(400, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'petugas', '2026-05-11 05:48:39', '2026-05-11 05:48:39'),
(401, 5, 'login', 'log.login_success', '192.168.0.23', 'management', '2026-05-11 05:48:47', '2026-05-11 05:48:47'),
(402, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-11 05:53:37', '2026-05-11 05:53:37'),
(403, 4, 'login', 'log.login_success', '192.168.0.23', 'staff', '2026-05-11 05:54:30', '2026-05-11 05:54:30'),
(404, 4, 'login', 'log.login_success', '192.168.0.23', 'staff', '2026-05-11 05:56:31', '2026-05-11 05:56:31'),
(405, 4, 'login', 'log.login_success', '192.168.0.23', 'staff', '2026-05-11 05:57:28', '2026-05-11 05:57:28'),
(406, 4, 'login', 'log.login_success', '192.168.0.23', 'staff', '2026-05-11 05:58:25', '2026-05-11 05:58:25'),
(407, 4, 'login', 'log.login_success', '192.168.0.23', 'staff', '2026-05-11 05:58:57', '2026-05-11 05:58:57'),
(408, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-11 06:18:14', '2026-05-11 06:18:14'),
(409, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-11 06:19:39', '2026-05-11 06:19:39'),
(410, 4, 'login', 'log.login_success', '192.168.0.23', 'staff', '2026-05-11 06:20:23', '2026-05-11 06:20:23'),
(411, 4, 'login', 'log.login_success', '192.168.0.23', 'staff', '2026-05-11 06:32:26', '2026-05-11 06:32:26'),
(412, 4, 'create', 'Bayu Septian menambahkan barang baru: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 06:41:42', '2026-05-11 06:41:42'),
(413, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 06:42:03', '2026-05-11 06:42:03'),
(414, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'staff', '2026-05-11 06:42:33', '2026-05-11 06:42:33'),
(415, 1, 'login', 'log.login_success', '192.168.0.23', 'admin', '2026-05-11 06:43:27', '2026-05-11 06:43:27'),
(416, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-11 06:44:53', '2026-05-11 06:44:53'),
(417, 1, 'login', 'User login ke sistem', '192.168.0.23', 'admin', '2026-05-11 06:46:36', '2026-05-11 06:46:36'),
(418, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-11 06:47:23', '2026-05-11 06:47:23'),
(419, 5, 'login', 'User login ke sistem', '192.168.0.23', 'management', '2026-05-11 06:47:34', '2026-05-11 06:47:34'),
(420, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-11 06:47:50', '2026-05-11 06:47:50'),
(421, 10, 'create', 'Pendaftaran akun baru: Rangga (rangga)', '192.168.0.23', 'staff', '2026-05-11 06:56:12', '2026-05-11 06:56:12'),
(422, 1, 'login', 'User login ke sistem', '192.168.0.23', 'admin', '2026-05-11 06:58:53', '2026-05-11 06:58:53'),
(423, 1, 'delete', 'Menghapus user: clasic saja', '192.168.0.23', 'admin', '2026-05-11 07:00:14', '2026-05-11 07:00:14'),
(424, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-11 07:03:28', '2026-05-11 07:03:28'),
(425, NULL, 'create', 'Pendaftaran akun baru: Rangga Septian (madara)', '192.168.0.23', 'staff', '2026-05-11 07:04:02', '2026-05-11 07:04:02'),
(426, 1, 'login', 'User login ke sistem', '192.168.0.23', 'admin', '2026-05-11 07:04:27', '2026-05-11 07:04:27'),
(427, 1, 'delete', 'Menghapus user: Rangga Septian', '192.168.0.23', 'admin', '2026-05-11 07:04:48', '2026-05-11 07:04:48'),
(428, 1, 'create', 'Menambahkan user baru: Ilham (ilham)', '192.168.0.23', 'admin', '2026-05-11 07:10:17', '2026-05-11 07:10:17'),
(429, 1, 'update', 'Mengupdate data user: Ilham', '192.168.0.23', 'admin', '2026-05-11 07:10:30', '2026-05-11 07:10:30'),
(430, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-11 07:12:07', '2026-05-11 07:12:07'),
(431, 4, 'login', 'User login ke sistem', '192.168.0.20', 'staff', '2026-05-11 07:13:35', '2026-05-11 07:13:35'),
(432, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.20', 'staff', '2026-05-11 07:14:31', '2026-05-11 07:14:31'),
(433, 4, 'logout', 'User keluar dari sistem', '192.168.0.20', 'staff', '2026-05-11 07:14:45', '2026-05-11 07:14:45'),
(434, 1, 'login', 'User login ke sistem', '192.168.0.20', 'admin', '2026-05-11 07:14:57', '2026-05-11 07:14:57'),
(435, 1, 'login', 'User login ke sistem', '192.168.0.23', 'admin', '2026-05-11 07:15:58', '2026-05-11 07:15:58'),
(436, 4, 'login', 'User login ke sistem', '192.168.0.20', 'staff', '2026-05-11 07:16:50', '2026-05-11 07:16:50'),
(437, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-11 07:16:57', '2026-05-11 07:16:57'),
(438, 4, 'logout', 'User keluar dari sistem', '192.168.0.20', 'staff', '2026-05-11 07:21:30', '2026-05-11 07:21:30'),
(439, 1, 'login', 'User login ke sistem', '192.168.0.20', 'admin', '2026-05-11 07:21:44', '2026-05-11 07:21:44'),
(440, 4, 'login', 'User login ke sistem', '192.168.0.20', 'staff', '2026-05-11 07:23:05', '2026-05-11 07:23:05'),
(441, 4, 'login', 'User login ke sistem', '192.168.0.23', 'staff', '2026-05-11 07:23:37', '2026-05-11 07:23:37'),
(442, 4, 'logout', 'User keluar dari sistem', '192.168.0.20', 'staff', '2026-05-11 07:31:59', '2026-05-11 07:31:59'),
(443, 5, 'login', 'User login ke sistem', '192.168.0.20', 'management', '2026-05-11 07:32:12', '2026-05-11 07:32:12'),
(444, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'staff', '2026-05-11 07:32:29', '2026-05-11 07:32:29'),
(445, 5, 'login', 'User login ke sistem', '192.168.0.23', 'management', '2026-05-11 07:36:53', '2026-05-11 07:36:53'),
(446, 5, 'logout', 'User keluar dari sistem', '192.168.0.20', 'management', '2026-05-11 07:44:02', '2026-05-11 07:44:02'),
(447, 4, 'login', 'User login ke sistem', '192.168.0.20', 'staff', '2026-05-11 07:44:14', '2026-05-11 07:44:14'),
(448, 4, 'logout', 'User keluar dari sistem', '192.168.0.20', 'staff', '2026-05-11 07:53:57', '2026-05-11 07:53:57'),
(449, 1, 'login', 'User login ke sistem', '192.168.0.20', 'admin', '2026-05-11 07:54:12', '2026-05-11 07:54:12'),
(450, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-11 08:09:43', '2026-05-11 08:09:43'),
(451, 1, 'login', 'User login ke sistem', '192.168.0.23', 'admin', '2026-05-11 08:09:52', '2026-05-11 08:09:52'),
(452, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-11 08:13:21', '2026-05-11 08:13:21'),
(453, 4, 'login', 'User login ke sistem', '192.168.0.23', 'staff', '2026-05-11 08:15:42', '2026-05-11 08:15:42'),
(454, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'staff', '2026-05-11 08:19:49', '2026-05-11 08:19:49'),
(455, 5, 'login', 'User login ke sistem', '192.168.0.23', 'management', '2026-05-11 08:20:05', '2026-05-11 08:20:05'),
(456, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-11 08:24:22', '2026-05-11 08:24:22'),
(457, 1, 'login', 'User login ke sistem', '192.168.0.23', 'admin', '2026-05-11 08:24:30', '2026-05-11 08:24:30'),
(458, 1, 'print', 'Admin mencetak dokumen LPB untuk barang: tissue', '192.168.0.20', 'admin', '2026-05-11 08:33:33', '2026-05-11 08:33:33'),
(459, 1, 'logout', 'User keluar dari sistem', '192.168.0.23', 'admin', '2026-05-11 08:45:17', '2026-05-11 08:45:17'),
(460, 5, 'login', 'User login ke sistem', '192.168.0.23', 'management', '2026-05-11 08:45:43', '2026-05-11 08:45:43'),
(461, 5, 'logout', 'User keluar dari sistem', '192.168.0.23', 'management', '2026-05-11 08:46:32', '2026-05-11 08:46:32'),
(462, 4, 'login', 'User login ke sistem', '192.168.0.23', 'staff', '2026-05-11 08:46:42', '2026-05-11 08:46:42'),
(463, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: tissue', '192.168.0.23', 'staff', '2026-05-11 08:55:50', '2026-05-11 08:55:50'),
(464, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 08:56:18', '2026-05-11 08:56:18'),
(465, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:01:33', '2026-05-11 09:01:33'),
(466, 4, 'logout', 'User keluar dari sistem', '192.168.0.23', 'staff', '2026-05-11 09:01:51', '2026-05-11 09:01:51'),
(467, 4, 'login', 'User login ke sistem', '192.168.0.23', 'staff', '2026-05-11 09:40:44', '2026-05-11 09:40:44'),
(468, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:41:57', '2026-05-11 09:41:57'),
(469, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:42:05', '2026-05-11 09:42:05'),
(470, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:43:07', '2026-05-11 09:43:07'),
(471, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:43:41', '2026-05-11 09:43:41'),
(472, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:44:02', '2026-05-11 09:44:02'),
(473, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:45:04', '2026-05-11 09:45:04'),
(474, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:45:29', '2026-05-11 09:45:29'),
(475, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:46:13', '2026-05-11 09:46:13'),
(476, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:46:54', '2026-05-11 09:46:54'),
(477, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:47:49', '2026-05-11 09:47:49'),
(478, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:48:48', '2026-05-11 09:48:48'),
(479, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:49:28', '2026-05-11 09:49:28'),
(480, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:50:12', '2026-05-11 09:50:12'),
(481, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:51:13', '2026-05-11 09:51:13'),
(482, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:51:54', '2026-05-11 09:51:54'),
(483, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:52:29', '2026-05-11 09:52:29'),
(484, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:55:33', '2026-05-11 09:55:33'),
(485, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:56:30', '2026-05-11 09:56:30'),
(486, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:56:46', '2026-05-11 09:56:46'),
(487, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:56:59', '2026-05-11 09:56:59'),
(488, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:57:27', '2026-05-11 09:57:27'),
(489, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:58:22', '2026-05-11 09:58:22'),
(490, 4, 'print', 'Bayu Septian mencetak dokumen LPB untuk barang: Handphone Samsung', '192.168.0.23', 'staff', '2026-05-11 09:59:12', '2026-05-11 09:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-user-device-1', 's:3:\"iOS\";', 1778489417),
('laravel-cache-user-device-4', 's:7:\"Windows\";', 1778493852),
('laravel-cache-user-device-5', 's:3:\"iOS\";', 1778489492),
('laravel-cache-user-is-online-4', 'b:1;', 1778493852);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_07_210647_create_reports_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tanggal_laporan` date NOT NULL,
  `lokasi_ditemukan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rute` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_rute` date DEFAULT NULL,
  `cs_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_kendaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pelapor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_pelapor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_pelapor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `nama_barang`, `kategori`, `deskripsi`, `tanggal_laporan`, `lokasi_ditemukan`, `rute`, `tanggal_rute`, `cs_name`, `nomor_kendaraan`, `nama_pelapor`, `nik_pelapor`, `jabatan_pelapor`, `foto_barang`, `status`, `created_at`, `updated_at`) VALUES
(24, 'Baju', 'Pakaian', 'BAJU HITAM', '2026-04-26', 'Kursi Depan', 'DU-SCBD', '2026-04-26', 'Bayu CS', 'Pool DU', 'Bayu', '323121', 'Penumpang', 'uploads/Xz4h0T473Y0ceaOWWsvSRs4QfUCPz7zDESkRn63B.jpg', 'diproses', '2026-04-26 08:02:20', '2026-04-26 09:52:33'),
(25, 'Korek', 'Lainnya', 'Korek zippo', '2026-04-26', 'Kursi Depan', 'DU-SCBD', '2026-04-26', 'Bayu CS', 'Pool Jakarta', 'Bayu', '-', 'Penumpang', 'uploads/LMwmiE6vxXXLEGrmTylrxwYGFohRq1bW18RFbMe2.jpg', 'claimed', '2026-04-26 09:24:48', '2026-04-26 16:02:35'),
(26, 'Dompet', 'Lainnya', 'Dompet Hitam', '2026-04-26', 'Lemari', 'DU-SCBD', '2026-04-26', 'Rangga', 'Pool Jakarta', 'Budi', '323121', 'Penumpang', 'uploads/LiVXOd50A5zKPRWyjdcauaaCO3N8epxuifBkS4Si.jpg', 'claimed', '2026-04-26 11:30:40', '2026-04-26 11:38:14'),
(27, 'Celana', 'Pakaian', 'celana panjang', '2026-04-26', 'Kursi Depan', 'DU-SCBD', '2026-04-01', 'Rangga', 'Pool Jakarta', 'caca', '323121', 'Penumpang', 'uploads/ekdJRBCOuB2uF0dJRC4Au1vkVg6JGHO0NquzkhbM.png', 'diproses', '2026-04-26 11:44:42', '2026-04-26 11:44:42'),
(28, 'Handphone', 'Elektronik', 'hp iphone x', '2026-04-26', 'Kursi Depan', 'DU-SCBD', '2026-04-01', 'Rangga', 'CT-122', 'caca', '-', 'Penumpang', 'uploads/HWAuWejKJdglhecjdLY2NSGQuSXvSqsyhAE9bYMT.png', 'diproses', '2026-04-26 11:46:01', '2026-04-26 11:46:01'),
(29, 'Handphone', 'Elektronik', 'iphone 14', '2026-04-26', 'Lemari', 'DU-SCBD', '2026-04-29', 'Rangga', 'CT-122', 'Budi', '-', 'Penumpang', 'uploads/r1bU9rE5tSlbIFIvEIjloIQv3bpC3iJ0nMJpLN0O.jpg', 'diproses', '2026-04-26 11:46:34', '2026-04-26 11:46:34'),
(30, 'Baju', 'Dokumen', 'baju hitam putih', '2026-04-26', 'Lemari', 'DU-CP', '2026-04-07', 'Rangga', 'CT-121', 'Budi', '-', 'Penumpang', 'uploads/bupH4LJ2CttjtEG2ZqhcgBUJA89Vifnlu3gNXCjL.png', 'diproses', '2026-04-26 11:47:44', '2026-04-26 11:47:44'),
(31, 'Dompet', 'Elektronik', 'SASASA', '2026-04-26', 'Lemari', 'DU-CP', '2026-04-27', 'SASA', 'CT-121', 'Bayu', 'SA', 'Penumpang', 'uploads/rqzTaAECo9DlUmcU18xyXji2n1p89lZ3o71CEpWN.png', 'claimed', '2026-04-26 11:48:08', '2026-04-26 11:50:16'),
(32, 'Dompet', 'Elektronik', 'SASA', '2026-04-26', 'Lemari', 'DU-SCBD', '2026-04-28', 'Bayu CS', 'CT-121', 'Budi', '2121', 'Penumpang', 'uploads/Wr4aFgA04uPyjTMBC1yhtnHYkgfSgPKM9GP2ZF17.jpg', 'claimed', '2026-04-26 11:48:42', '2026-04-30 04:00:17'),
(33, 'Korek', 'Elektronik', 'ASAS', '2026-04-26', 'Kursi Depan', 'SASA', '2026-04-01', 'Rangga', 'CT-121', 'Bayu', '323121', 'Penumpang', 'uploads/XeSF6yPcFTeepWiQdlX17JW9b9PGPbL8VAI1GJgj.png', 'claimed', '2026-04-26 11:49:05', '2026-04-26 11:50:18'),
(34, 'Handphone', 'Dokumen', 'SASAS', '2026-04-26', 'Lemari', 'DU-SCBD', '2026-04-01', 'SASA', 'CT-121', 'Budi', '43433333', 'Penumpang', 'uploads/k8aDsAsfl9RBjAqo0pUXUvqmtniyH2tWeS7RlaGt.jpg', 'claimed', '2026-04-26 11:49:42', '2026-04-26 11:50:21'),
(35, 'Kacamata', 'Lainnya', 'Kacamata hitam', '2026-04-27', 'Ruang Tunggu', 'DU-SCBD', '2026-04-07', 'Hyundai', 'Pool DU', 'hyundai', '2121', 'cs', 'uploads/XVzQFd17WAS0LkjKEBjhyRHuV4weuPzUfZ7wj8Iw.jpg', 'diproses', '2026-04-26 17:23:09', '2026-04-26 17:23:09'),
(40, 'tau tea', 'Lainnya', 'cair', '2026-05-06', 'kursi 5', 'Jakarta - Bandung', '2026-05-06', 'Uyabb', NULL, 'bayu', '62626', 'Penumpang', 'uploads/0uBaprPX1dmLk7AQ8DBqRx2VO5PD5F4dKBYqaRxP.jpg', 'diproses', '2026-05-06 08:27:55', '2026-05-06 08:27:55'),
(41, 'heheheh', 'Dokumen', 'gsgehehe', '2026-05-07', 'jeheheh', 'Bandung - Jakarta', '2026-05-07', 'yeheheh', 'CT-122', 'heheheh', '7373636', 'bagwgsheh', 'uploads/ZZIDVMjj3ef0Tp4B5yPaKpxSNuYlslbujyxbUcyY.jpg', 'diproses', '2026-05-07 04:41:32', '2026-05-07 04:41:32'),
(45, 'Handphone Samsung', 'Elektronik', 'sasa', '2026-05-08', 'Meja Makan', 'Jakarta - Bandung', '2026-05-08', 'Setiawan', NULL, 'Mamat', '2232312', 'Pekerja', 'uploads/8Ds1hZCV6xSf0o9KQPmL9nnZSpUpiTquby4NAj2f.jpg', 'diproses', '2026-05-08 02:16:33', '2026-05-08 02:16:33'),
(48, 'Handphone Samsung', 'Elektronik', 'sasa', '2026-05-08', 'Kursi Tengah', 'Bandung - Jakarta', '2026-04-30', 'sasa', 'CT-122', 'Mamat', '2232312', 'Pekerja', 'uploads/iQCkFZZsODJdk7WqmC87K6g0A6tLtaMydvPhKvfR.jpg', 'diproses', '2026-05-08 02:24:47', '2026-05-08 02:24:47'),
(49, 'tissue', 'Lainnya', 'tissue livi', '2026-05-08', 'dibawah meha', 'Bandung - Jakarta', '2026-05-11', 'Rangga', 'CT-122', 'Bayu', '329452', 'Penumpang', 'uploads/rIFDbQmFqluiKd55PcvwW75KVOUrNlOmi4SzckvG.jpg', 'diproses', '2026-05-08 04:33:16', '2026-05-08 04:33:16'),
(50, 'Handphone Samsung', 'Elektronik', 'Hanpdhone samsung', '2026-05-11', 'Meja Makan', 'Bandung - Jakarta', '2026-05-11', 'Bayu', 'CT-121', 'Mamat', '200209', 'CS 01', 'uploads/tqlPEl8GvzJkdHwjsuOIytQoRwXS7LVKwTP744Fl.jpg', 'diproses', '2026-05-11 06:41:42', '2026-05-11 06:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BHLeWIXp0xA61ETByDCHVhToYVkzJmcGDC2z2M6e', 4, '192.168.0.23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJCbG9iQUdkanJUS1VBS2R1Wmx4ZExsYVI3eHUwSFhEQ0czR05Sd3pUIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTkyLjE2OC4wLjIzOjgwMDBcL2xhcG9yYW5cLzUwXC9wcmludCIsInJvdXRlIjoicmVwb3J0LnByaW50In0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjo0LCJsb2NhbGUiOiJlbiJ9', 1778493552),
('kLbGZGPkUj7LwypRvX2zn36Oe1lMXnGaspXILqoz', 1, '192.168.0.20', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.4 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJqWkpJMUNMMm1NczFQb2lCbTQ2c0xXWWplUjFJRFdLZ1cxVTBMQ1dSIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTkyLjE2OC4wLjIzOjgwMDBcL3JlcG9ydFwvbGlzdCIsInJvdXRlIjoicmVwb3J0Lmxpc3QifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1778488639);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` int NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `Username`, `email_verified_at`, `password`, `nik`, `remember_token`, `role`, `status`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, '$2y$12$Sy6/GUVnPx/GaBqXe6rSke8ERZV5oE54qwhG3G1InIGnNpdCYVnia', 0, NULL, 'admin', 'active', '1776675103_69e5e91f1c268.png', '2026-04-07 14:31:06', '2026-04-20 01:51:43'),
(4, 'Bayu Septian', 'cscititrans', NULL, '$2y$12$r7qQlJjQnXFfn8N6M6ibVe9UGuMYkNqN4033o/NHa2BJ7EjWn5Ag2', 200209, NULL, 'staff', 'active', '1777223791_69ee486f04205.JPG', '2026-04-19 08:56:36', '2026-04-26 17:16:31'),
(5, 'Manager', 'management', NULL, '$2y$12$AGoSViwfPY8BalLuVdKcDevFF30jFjQNjj5F.SrTWer3F2fKKOCLW', 0, NULL, 'management', 'active', '1776737994_69e6deca87f40.jpg', '2026-04-19 08:57:21', '2026-04-20 19:19:54'),
(10, 'Rangga', 'rangga', NULL, '$2y$12$OL0c8zpkhfu7JpMQE.mAr.nlIOeSNklWXmNUikiTQOMkqNaN84zey', 200210, NULL, 'staff', 'pending', NULL, '2026-05-11 06:56:12', '2026-05-11 06:56:12'),
(12, 'Ilham', 'ilham', NULL, '$2y$12$/0lgEUeUBV.O5adVdQqmPOHVX.95VRRpH3X04089YLNVh/FDtkxaG', 20029, NULL, 'staff', 'pending', NULL, '2026-05-11 07:10:17', '2026-05-11 07:10:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
