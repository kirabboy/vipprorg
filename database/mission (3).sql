-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 03, 2020 at 06:03 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mission`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `ofuser` varchar(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `ofuser`, `content`, `updated_at`, `created_at`) VALUES
(3, '0338927456', 'Bạn đã đã xác nhận hoàn thành nhiệm vụ \"Nhấn like fanpage\"', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `info_users`
--

CREATE TABLE `info_users` (
  `id` int(11) NOT NULL,
  `ofuser` varchar(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `zalo` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info_users`
--

INSERT INTO `info_users` (`id`, `ofuser`, `name`, `email`, `facebook`, `zalo`, `updated_at`, `created_at`) VALUES
(1, '0338927456', 'Nguyễn Chính Hưng ATM', 'kirabboytt@gmail.com', 'fb.com/kira', 'kira', '2020-11-30 10:04:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `type` int(11) NOT NULL,
  `ofrole` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `example` varchar(255) DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `count` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `name`, `description`, `type`, `ofrole`, `link`, `example`, `price`, `count`, `updated_at`, `created_at`) VALUES
(1, 'Nhấn like fanpage', 'Nhấn like fanpage sau đó chụp lại màn hình up lên nhiệm vụ', 1, 0, 'https://www.facebook.com/', 'exfb.png', 5200, 10000, '2020-12-01 04:24:59', '2020-12-01 04:24:59'),
(2, 'Nhấn like fanpage', 'Nhấn like fanpage sau đó chụp lại màn hình up lên nhiệm vụ', 1, 0, 'https://www.facebook.com/', 'exfb.png', 5200, 10000, '2020-12-01 04:24:59', '2020-12-01 04:24:59'),
(3, 'Nhấn like fanpage', 'Nhấn like fanpage sau đó chụp lại màn hình up lên nhiệm vụ', 1, 0, 'https://www.facebook.com/', 'exfb.png', 5200, 10000, '2020-12-01 04:24:59', '2020-12-01 04:24:59'),
(4, 'Nhấn like fanpage', 'Nhấn like fanpage sau đó chụp lại màn hình up lên nhiệm vụ', 1, 0, 'https://www.facebook.com/', 'exfb.png', 5200, 10000, '2020-12-01 04:24:59', '2020-12-01 04:24:59'),
(5, 'Nhấn like fanpage', 'Nhấn like fanpage sau đó chụp lại màn hình up lên nhiệm vụ', 1, 0, 'https://www.facebook.com/', 'exfb.png', 5200, 10000, '2020-12-01 04:24:59', '2020-12-01 04:24:59'),
(6, 'Nhấn like fanpage', 'Nhấn like fanpage sau đó chụp lại màn hình up lên nhiệm vụ', 1, 0, 'https://www.facebook.com/', 'exfb.png', 5200, 10000, '2020-12-01 04:24:59', '2020-12-01 04:24:59'),
(7, 'Nhấn like fanpage', 'Nhấn like fanpage sau đó chụp lại màn hình up lên nhiệm vụ', 1, 0, 'https://www.facebook.com/', 'exfb.png', 5200, 10000, '2020-12-01 04:24:59', '2020-12-01 04:24:59'),
(8, 'Nhấn like fanpage', 'Nhấn like fanpage sau đó chụp lại màn hình up lên nhiệm vụ', 1, 0, 'https://www.facebook.com/', 'exfb.png', 5200, 10000, '2020-12-01 04:24:59', '2020-12-01 04:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `ofrole` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `role_price` bigint(20) NOT NULL,
  `max_price` bigint(20) NOT NULL,
  `max_mission` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `ofrole`, `name`, `description`, `role_price`, `max_price`, `max_mission`, `image_name`, `time`, `updated_at`, `created_at`) VALUES
(1, 0, 'Đồng', 'Tự hoàn thành nhiệm vụ', 200000, 24500, 3, 'dong.png', 90, '2020-11-30 07:50:10', '0000-00-00 00:00:00'),
(2, 1, 'Bạc', 'Tự hoàn thành nhiệm vụ', 500000, 90000, 20, 'bac.png', 365, '2020-11-30 07:51:35', '0000-00-00 00:00:00'),
(3, 2, 'Vàng', 'Tự hoàn thành nhiệm vụ', 3000000, 250000, 50, 'vang.png', 365, '2020-11-30 07:51:35', '0000-00-00 00:00:00'),
(4, 3, 'Bạch kim', 'Robot sẽ giúp bạn hoàn thành nhiệm vụ', 7000000, 500000, 100, 'bachkim.png', 999, '2020-11-30 07:50:10', '0000-00-00 00:00:00'),
(5, 4, 'Kim cương', 'Robot sẽ giúp bạn hoàn thành nhiệm vụ', 15000000, 950000, 250, 'kimcuong.png', 999, '2020-11-30 07:51:35', '0000-00-00 00:00:00'),
(6, 99, 'Thách đấu', 'Bá đạo', 99999999, 99999999, 99999, 'thachdau.png', 999, '2020-11-30 07:51:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `statistical`
--

CREATE TABLE `statistical` (
  `id` int(11) NOT NULL,
  `ofuser` varchar(20) NOT NULL,
  `today_mission_amount` bigint(20) NOT NULL DEFAULT '0',
  `total_referal` bigint(20) NOT NULL DEFAULT '0',
  `today_total` bigint(20) NOT NULL DEFAULT '0',
  `month_total` bigint(20) NOT NULL DEFAULT '0',
  `total` bigint(20) NOT NULL DEFAULT '0',
  `today_count_mission` bigint(20) NOT NULL DEFAULT '0',
  `total_mission` bigint(20) NOT NULL DEFAULT '0',
  `today` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statistical`
--

INSERT INTO `statistical` (`id`, `ofuser`, `today_mission_amount`, `total_referal`, `today_total`, `month_total`, `total`, `today_count_mission`, `total_mission`, `today`, `updated_at`, `created_at`) VALUES
(1, '0338927456', 0, 0, 0, 0, 0, 0, 0, '2020-12-03', '2020-11-29 10:03:17', '2020-11-29 10:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `taking_mission`
--

CREATE TABLE `taking_mission` (
  `id` int(11) NOT NULL,
  `id_mission` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `result` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `today` date NOT NULL,
  `status_day` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taking_mission`
--

INSERT INTO `taking_mission` (`id`, `id_mission`, `id_user`, `result`, `status`, `today`, `status_day`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '7fb14a0253f34c99be2a5bf0b6c9d4e1.jpeg', 3, '2020-12-01', 1, '2020-12-03 11:00:48', '0000-00-00 00:00:00'),
(2, 2, 1, NULL, 1, '2020-12-02', 1, '2020-12-03 11:00:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `referal_ofuser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phone`, `password`, `role`, `referal_ofuser`, `referal_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '0338927456', '$2y$10$9oVxs5ru0z3DyaxBgZmQ1uByjcp6VChEHJeMFCHhAtPJ1ztuFoauW', 0, NULL, '404979291', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `balance` bigint(20) NOT NULL DEFAULT '0',
  `ofuser` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `balance`, `ofuser`, `updated_at`, `created_at`) VALUES
(1, 0, '0338927456', '2020-11-29 10:03:17', '2020-11-29 10:03:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_users`
--
ALTER TABLE `info_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ofuser` (`ofuser`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ofrole` (`ofrole`);

--
-- Indexes for table `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ofuser` (`ofuser`);

--
-- Indexes for table `taking_mission`
--
ALTER TABLE `taking_mission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ofuser` (`ofuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `info_users`
--
ALTER TABLE `info_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statistical`
--
ALTER TABLE `statistical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taking_mission`
--
ALTER TABLE `taking_mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
