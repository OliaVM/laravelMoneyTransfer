-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 04 2018 г., 09:50
-- Версия сервера: 5.7.19
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravelmoneytransfer`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number_of_account` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count_money` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `number_of_account`, `user_id`, `count_money`, `created_at`, `updated_at`) VALUES
(1, 100, 1, 1310, NULL, '2018-09-04 00:33:10'),
(2, 200, 2, 2020, NULL, '2018-09-03 23:27:57'),
(3, 300, 3, 299690, NULL, '2018-09-04 00:33:10');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_08_31_165925_create_accounts_table', 1),
('2018_08_31_170022_create_transfers_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `transfers`
--

DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `count_money` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `transfers`
--

INSERT INTO `transfers` (`id`, `from_user_id`, `to_user_id`, `count_money`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 10, '2018-09-01 07:48:35', NULL),
(2, 3, 1, 10, '2018-09-01 08:04:09', NULL),
(3, 3, 1, 10, '2018-09-01 08:13:38', NULL),
(4, 3, 1, 10, '2018-09-01 08:16:01', NULL),
(5, 3, 2, 10, '2018-09-01 08:34:10', '2018-09-01 08:34:10'),
(6, 3, 1, 10, '2018-09-01 09:03:33', '2018-09-01 09:03:33'),
(7, 3, 1, 10, '2018-09-01 09:33:23', '2018-09-01 09:33:23'),
(8, 3, 1, 10, '2018-09-01 09:33:53', '2018-09-01 09:33:53'),
(9, 3, 1, 10, '2018-09-01 09:34:43', '2018-09-01 09:34:43'),
(10, 3, 1, 10, '2018-09-01 09:37:40', '2018-09-01 09:37:40'),
(11, 3, 1, 10, '2018-09-01 09:40:21', '2018-09-01 09:40:21'),
(12, 3, 1, 10, '2018-09-01 09:42:22', '2018-09-01 09:42:22'),
(13, 3, 1, 10, '2018-09-01 09:43:17', '2018-09-01 09:43:17'),
(14, 3, 1, 10, '2018-09-01 09:44:18', '2018-09-01 09:44:18'),
(15, 3, 1, 10, '2018-09-01 09:45:43', '2018-09-01 09:45:44'),
(16, 3, 1, 10, '2018-09-01 09:54:38', '2018-09-01 09:54:38'),
(17, 3, 1, 10, '2018-09-01 09:55:29', '2018-09-01 09:55:29'),
(18, 3, 1, 10, '2018-09-01 09:56:48', '2018-09-01 09:56:48'),
(19, 3, 1, 10, '2018-09-01 09:56:54', '2018-09-01 09:56:54'),
(20, 3, 1, 10, '2018-09-01 10:04:03', '2018-09-01 10:04:03'),
(21, 3, 1, 10, '2018-09-01 10:05:07', '2018-09-01 10:05:07'),
(22, 3, 1, 10, '2018-09-01 10:09:19', '2018-09-01 10:09:19'),
(23, 3, 1, 10, '2018-09-01 10:10:00', '2018-09-01 10:10:00'),
(24, 3, 1, 10, '2018-09-01 10:10:59', '2018-09-01 10:10:59'),
(25, 3, 2, 10, '2018-09-03 23:27:57', '2018-09-03 23:27:57'),
(26, 3, 1, 10, '2018-09-03 23:32:27', '2018-09-03 23:32:27'),
(27, 3, 1, 10, '2018-09-03 23:37:55', '2018-09-03 23:37:55'),
(28, 3, 1, 10, '2018-09-04 00:25:54', '2018-09-04 00:25:54'),
(29, 3, 1, 10, '2018-09-04 00:28:17', '2018-09-04 00:28:17'),
(30, 3, 1, 10, '2018-09-04 00:29:16', '2018-09-04 00:29:16'),
(31, 3, 1, 10, '2018-09-04 00:33:10', '2018-09-04 00:33:10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'user1@mail.ru', '$2y$10$6eeZv6ALYE7seEyeJXRohO/AH8JeQMmyGxt/KI7Sm/uhb3J7HCFSy', 'fyMmxBu4GwPo1BkXJtR3WIFUmbDbew8GsSNGwKJHeICY26k7YZ8yh18NJQkF', '2018-02-10 02:04:37', '2018-02-10 02:04:37'),
(2, 'user2', 'user2@mail.ru', '$2y$10$IJzBqKLaLZ.ybeBLIZaha.QvELU7kXfvfMbAx3UdPq7BO7CMCYE/K', 'LbUKoQwDLevIcbP8ToQc2pnPhtXoVI9hRiJfsTRxG6QNZVvHI3Gmfo1skpHA', '2018-02-11 06:34:42', '2018-02-11 06:34:42'),
(3, 'user3', 'user3@mail.ru', '$2y$10$0qdFUFqqxZrWDJZz2njXCuG8wq6YzM2Jx8WpciKf3GXXtHFp5qwue', 'jqLjCJbU6w51QzHXjk4YoaTlHw1mMt3fatM62p061j12Xx2XURTRQHnx5P59', '2018-09-01 03:02:20', '2018-09-04 02:35:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
