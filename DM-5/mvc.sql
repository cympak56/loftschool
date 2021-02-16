-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 15 2021 г., 13:29
-- Версия сервера: 5.6.41-log
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`message_id`, `message`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'test', '', 3, '2021-01-31 15:17:44', '2021-02-14 23:49:38'),
(2, 'test 2', '', 3, '2021-01-31 15:17:44', '2021-02-14 23:49:38'),
(3, 'test 3', '', 3, '2021-01-31 15:51:03', '2021-02-14 23:49:38'),
(4, 'test', '', 3, '2021-01-31 15:52:38', '2021-02-14 23:49:38'),
(5, 'test 55', '', 3, '2021-01-31 15:54:44', '2021-02-14 23:49:38'),
(6, 'test33', '', 3, '2021-01-31 15:55:02', '2021-02-14 23:49:38'),
(7, '123', '', 3, '2021-01-31 15:56:03', '2021-02-14 23:49:38'),
(8, '321', '', 3, '2021-01-31 15:58:16', '2021-02-14 23:49:38'),
(9, 'tet', '', 3, '2021-01-31 16:14:49', '2021-02-14 23:49:38'),
(10, 'test', '', 3, '2021-01-31 16:24:42', '2021-02-14 23:49:38'),
(11, 'tret', '', 3, '2021-01-31 16:29:50', '2021-02-14 23:49:38'),
(12, 'gfdgdf', '', 3, '2021-01-31 16:30:36', '2021-02-14 23:49:38'),
(13, 'fgdfg', '', 3, '2021-01-31 16:33:16', '2021-02-14 23:49:38'),
(14, 'etert', '1612103653.png', 3, '2021-01-31 16:34:13', '2021-02-14 23:49:38'),
(15, 'test', '1612105921.png', 3, '2021-01-31 17:12:01', '2021-02-14 23:49:38'),
(16, 'test 2', '', 3, '2021-01-31 17:12:16', '2021-02-14 23:49:38'),
(20, 'fghfdh', '1612106218.jpg', 3, '2021-01-31 17:16:58', '2021-02-14 23:49:38'),
(21, 'ertretgdf', '1612106841.jpg', 3, '2021-01-31 17:27:21', '2021-02-14 23:49:38'),
(24, '20', NULL, 3, '2021-01-31 17:41:44', '2021-02-14 23:49:38'),
(25, '21', NULL, 3, '2021-01-31 17:41:49', '2021-02-14 23:49:38'),
(26, 'dfgfd', '1613377697.jpg', 7, '2021-02-15 11:28:17', '2021-02-15 11:28:17'),
(27, 'test', '1613377787.jpg', 7, '2021-02-15 11:29:47', '2021-02-15 11:29:47');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Виталий', 'cympak56@gmail.com', '466bb5bb2d78aec1fc8ef2f2d45793cc77d7670f', NULL, 'user', '2021-01-31 14:36:44', '2021-02-14 23:17:50'),
(2, 'Виталий', 'cympak561@gmail.com', '5079bbd0c5f83c9bb94062420379899e16af408c', NULL, 'user', '2021-01-31 18:00:54', '2021-02-14 23:17:50'),
(3, 'test12', 'cympak1111156@gmail.com', '5079bbd0c5f83c9bb94062420379899e16af408c', NULL, 'user', '2021-02-15 00:18:13', '2021-02-15 00:18:13'),
(5, '123', 'cympak123@gmail.com', '5079bbd0c5f83c9bb94062420379899e16af408c', NULL, '', '2021-02-15 00:22:57', '2021-02-15 13:01:03'),
(7, 'Test', 'cympak321@gmail.com', '5079bbd0c5f83c9bb94062420379899e16af408c', NULL, 'user', '2021-02-15 11:56:08', '2021-02-15 11:56:08'),
(8, 'Test 355', 'cympak555@gmail.com', '5079bbd0c5f83c9bb94062420379899e16af408c', '1613383492.jpg', 'user', '2021-02-15 11:57:10', '2021-02-15 13:16:40'),
(9, 'test 999', 'cympak999@gmail.com', '5079bbd0c5f83c9bb94062420379899e16af408c', '1613384846.jpg', 'user', '2021-02-15 13:27:26', '2021-02-15 13:27:26');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
