-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2021 at 07:45 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message`, `image`, `user_id`, `created_at`) VALUES
(1, 'test', '', 3, '2021-01-31 15:17:44'),
(2, 'test 2', '', 3, '2021-01-31 15:17:44'),
(3, 'test 3', '', 3, '2021-01-31 15:51:03'),
(4, 'test', '', 3, '2021-01-31 15:52:38'),
(5, 'test 55', '', 3, '2021-01-31 15:54:44'),
(6, 'test33', '', 3, '2021-01-31 15:55:02'),
(7, '123', '', 3, '2021-01-31 15:56:03'),
(8, '321', '', 3, '2021-01-31 15:58:16'),
(9, 'tet', '', 3, '2021-01-31 16:14:49'),
(10, 'test', '', 3, '2021-01-31 16:24:42'),
(11, 'tret', '', 3, '2021-01-31 16:29:50'),
(12, 'gfdgdf', '', 3, '2021-01-31 16:30:36'),
(13, 'fgdfg', '', 3, '2021-01-31 16:33:16'),
(14, 'etert', '1612103653.png', 3, '2021-01-31 16:34:13'),
(15, 'test', '1612105921.png', 3, '2021-01-31 17:12:01'),
(16, 'test 2', '', 3, '2021-01-31 17:12:16'),
(20, 'fghfdh', '1612106218.jpg', 3, '2021-01-31 17:16:58'),
(21, 'ertretgdf', '1612106841.jpg', 3, '2021-01-31 17:27:21'),
(23, '19', NULL, 3, '2021-01-31 17:41:41'),
(24, '20', NULL, 3, '2021-01-31 17:41:44'),
(25, '21', NULL, 3, '2021-01-31 17:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `created_at`) VALUES
(3, 'Виталий', 'cympak56@gmail.com', '466bb5bb2d78aec1fc8ef2f2d45793cc77d7670f', '2021-01-31 14:36:44'),
(4, 'Виталий', 'cympak561@gmail.com', '5079bbd0c5f83c9bb94062420379899e16af408c', '2021-01-31 18:00:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
