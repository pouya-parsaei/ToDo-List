-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 05:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `7todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `user_id`, `created_at`) VALUES
(1, 'Personal', 1, '2021-07-25 13:37:24'),
(4, 'daily U2', 2, '2021-07-26 08:31:37'),
(24, 'Shopping', 1, '2021-07-28 18:25:30'),
(26, 'Learning', 1, '2021-07-28 18:26:06'),
(46, 'PL2', 43, '2021-08-01 12:46:04'),
(47, 'PL3', 43, '2021-08-01 12:46:08'),
(48, 'DSFDSF', 44, '2021-08-01 12:48:02'),
(49, 'Sagali', 45, '2021-08-02 11:31:52'),
(50, 'Sagali', 46, '2021-08-02 11:40:53'),
(51, 'dsbcxv', 43, '2021-08-04 11:57:10'),
(66, 'nnvbnbv', 43, '2021-08-06 16:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(512) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `folder_id` int(11) UNSIGNED NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `user_id`, `folder_id`, `is_done`, `created_at`) VALUES
(4, 'job', 1, 1, 1, '2021-07-28 18:03:36'),
(31, 'dfdsf', 1, 26, 1, '2021-07-29 22:42:42'),
(32, 'dsfsadfsda', 1, 24, 0, '2021-07-29 22:42:45'),
(33, 'ghgfhf', 1, 1, 0, '2021-07-29 22:43:32'),
(34, 'dfsdfdsf', 1, 1, 0, '2021-08-01 12:41:51'),
(37, 'TL3', 43, 46, 0, '2021-08-01 12:46:20'),
(38, 'TL4', 43, 46, 0, '2021-08-01 12:46:24'),
(42, 'DSFDSF', 44, 48, 0, '2021-08-01 12:48:11'),
(43, 'baladam baladam', 45, 49, 1, '2021-08-02 11:32:22'),
(44, 'Baladam Baladam', 46, 50, 1, '2021-08-02 11:41:06'),
(49, 'یسبسیب', 43, 51, 0, '2021-08-04 13:34:24'),
(50, 'بیسبسیب', 43, 47, 0, '2021-08-04 13:34:27'),
(54, 'bcbv', 43, 47, 0, '2021-08-04 17:07:14'),
(55, 'l;;', 43, 46, 0, '2021-08-04 17:13:30'),
(56, 'fdgfdg', 43, 46, 0, '2021-08-05 20:25:31'),
(57, 'fdgfdg', 43, 46, 0, '2021-08-05 20:25:33'),
(58, 'fdgfdg', 43, 46, 0, '2021-08-05 20:25:35'),
(59, 'hkuk', 43, 46, 0, '2021-08-05 20:25:38'),
(60, 'fgrr', 43, 46, 0, '2021-08-05 20:25:41'),
(61, 'fdgfds', 43, 46, 0, '2021-08-05 20:25:44'),
(62, 'dsfdsaf', 43, 46, 0, '2021-08-05 20:25:49'),
(63, 'sfsdafsdaf', 43, 46, 0, '2021-08-05 20:25:51'),
(64, 'fdsafdsfdasf', 43, 46, 0, '2021-08-05 20:26:02'),
(65, 'gfdgjhjg', 43, 46, 0, '2021-08-05 20:26:04'),
(66, 'uytuytuy', 43, 46, 0, '2021-08-05 20:26:06'),
(67, 'iooiuoiy', 43, 46, 0, '2021-08-05 20:26:10'),
(68, 'tryewwret', 43, 46, 0, '2021-08-05 20:26:12'),
(69, 'ytrygh', 43, 46, 0, '2021-08-05 20:26:13'),
(70, 'trgfdsg', 43, 46, 0, '2021-08-05 20:26:15'),
(71, 'yutyruytuyturtu', 43, 46, 0, '2021-08-05 20:26:20'),
(72, 'uytu6uytrytutyu', 43, 46, 0, '2021-08-05 20:26:24'),
(73, 'ytryutuytutyuyt', 43, 46, 0, '2021-08-05 20:26:26'),
(74, 'tyuytuytujhgjghjhg', 43, 46, 0, '2021-08-05 20:26:30'),
(75, 'bvcbvcb', 43, 51, 0, '2021-08-06 16:37:43'),
(76, 'nbmnb', 43, 46, 0, '2021-08-06 17:15:25'),
(77, 'trt', 43, 46, 0, '2021-08-22 20:16:11'),
(78, 'trt', 43, 46, 0, '2021-08-22 20:16:14'),
(79, '555', 43, 46, 0, '2021-08-22 20:16:19'),
(80, 'dsfdsf', 43, 46, 1, '2021-08-23 12:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Pouya Parsaei', 'pouya.goodboy1371@gmail.com', 'pouya', '2021-07-25 13:31:35'),
(42, 'Pouya', 'pouya.goodboy@gmail.com', '$2y$10$agI/ygtGTPeeVBQuE8Ow7ORm4PlPfakuYSuTv70yQS2vv30mGhWVS', '2021-07-31 15:13:33'),
(43, 'Pouya', 'Pouya1@gmail.com', '$2y$10$8w5pKeO6iNXelLRqnFHN5u27MWddRnUmjNK1m26VFgPLM283H.4gW', '2021-07-31 15:15:26'),
(44, 'PouyaParsaei', 'Pouya3@gmail.com', '$2y$10$YSJsyb8IZm1xaHl8QHUsqOQluSou2ws97OKmlEPqtGmMyBdayrmK.', '2021-07-31 15:27:23'),
(45, 'foad', 'Foa1@gmail.com', '$2y$10$IzTQh8jjR35u.yw9Yac56eijbfJ0bgZMMs7uNO6S9bMKClsDH60PC', '2021-08-02 11:31:29'),
(46, 'FoadSagi', 'Foad52005@gmail.com', '$2y$10$j.XNcwmGE0F4/6pnTECWv.GrFo/QryrX.JzmFIqUx22bgvi4r364O', '2021-08-02 11:40:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
