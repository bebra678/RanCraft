-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 15 2024 г., 13:11
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rancraft`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bans`
--

CREATE TABLE `bans` (
  `id` int(10) UNSIGNED NOT NULL,
  `bannable_type` varchar(255) NOT NULL,
  `bannable_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_type` varchar(255) DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bans`
--

INSERT INTO `bans` (`id`, `bannable_type`, `bannable_id`, `created_by_type`, `created_by_id`, `comment`, `expired_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, NULL, NULL, 'бла бла', '2024-02-21 14:09:59', NULL, '2024-02-05 14:09:59', '2024-02-05 14:09:59'),
(2, 'App\\Models\\User', 2, NULL, NULL, 'бла бла', '2024-02-05 14:35:03', NULL, '2024-02-05 14:35:03', '2024-02-05 14:35:03'),
(3, 'App\\Models\\User', 4, NULL, NULL, 'бла бла', '2024-02-05 14:37:42', NULL, '2024-02-05 14:37:42', '2024-02-05 14:37:42'),
(4, 'App\\Models\\User', 5, NULL, NULL, 'бла бла', '2030-03-27 17:00:00', NULL, '2024-02-05 14:38:24', '2024-02-05 14:38:24'),
(5, 'App\\Models\\User', 7, NULL, NULL, NULL, NULL, NULL, '2024-02-05 14:39:48', '2024-02-05 14:39:48'),
(6, 'App\\Models\\User', 8, NULL, NULL, NULL, NULL, NULL, '2024-02-05 14:40:06', '2024-02-05 14:40:06'),
(7, 'App\\Models\\User', 9, NULL, NULL, NULL, NULL, NULL, '2024-02-05 14:43:21', '2024-02-05 14:43:21'),
(8, 'App\\Models\\User', 28, NULL, NULL, NULL, NULL, NULL, '2024-02-05 14:48:33', '2024-02-05 14:48:33'),
(9, 'App\\Models\\User', 15, NULL, NULL, NULL, NULL, '2024-02-11 13:25:43', '2024-02-11 13:24:08', '2024-02-11 13:25:43'),
(10, 'App\\Models\\User', 16, NULL, NULL, NULL, NULL, NULL, '2024-02-11 13:40:40', '2024-02-11 13:40:40'),
(11, 'App\\Models\\User', 17, NULL, NULL, NULL, NULL, '2024-02-11 14:05:17', '2024-02-11 13:46:13', '2024-02-11 14:05:17'),
(12, 'App\\Models\\User', 17, NULL, NULL, NULL, NULL, '2024-02-11 14:05:17', '2024-02-11 13:46:44', '2024-02-11 14:05:17'),
(13, 'App\\Models\\User', 17, NULL, NULL, NULL, NULL, '2024-02-11 14:05:17', '2024-02-11 13:47:21', '2024-02-11 14:05:17'),
(14, 'App\\Models\\User', 17, NULL, NULL, NULL, NULL, '2024-02-11 14:05:17', '2024-02-11 14:03:22', '2024-02-11 14:05:17'),
(15, 'App\\Models\\User', 17, NULL, NULL, 'Читы', '2029-12-31 17:00:00', '2024-02-11 14:05:17', '2024-02-11 14:03:50', '2024-02-11 14:05:17'),
(16, 'App\\Models\\User', 17, NULL, NULL, 'Читыasd', '2029-12-31 17:00:00', '2024-02-11 14:09:24', '2024-02-11 14:08:11', '2024-02-11 14:09:24');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'Коммент', '2024-02-14 14:16:48', NULL),
(2, 5, 11, 'Бла бла', '2024-02-14 14:13:13', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `donates`
--

CREATE TABLE `donates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `donate` varchar(255) NOT NULL,
  `type_payment` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `donates`
--

INSERT INTO `donates` (`id`, `user_id`, `nick`, `donate`, `type_payment`, `status`, `updated_at`, `created_at`) VALUES
(1, 1, 'user_123', '1', 'Карта', 0, NULL, NULL),
(2, 2, 'asdd_123', '0', 'Крипта', 0, '2024-01-29 07:08:29', '2024-01-29 07:08:29'),
(3, 2, 'asdd_123', '0', 'Крипта', 0, '2024-01-29 07:08:50', '2024-01-29 07:08:50'),
(4, 2, 'asdd_123', '0', 'Крипта', 0, '2024-01-29 07:10:13', '2024-01-29 07:10:13');

-- --------------------------------------------------------

--
-- Структура таблицы `donate_lists`
--

CREATE TABLE `donate_lists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `donate_lists`
--

INSERT INTO `donate_lists` (`id`, `name`, `price`, `description`, `photo`) VALUES
(1, 'Приват', 150, 'Купи приват', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_22_125231_create_posts_table', 1),
(7, '2024_02_05_161401_add_banned_until_to_users_table', 2),
(8, '2017_03_04_000000_create_bans_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
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
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `text` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `photo`, `created_at`, `updated_at`) VALUES
(10, 'Новость 1', 'Бла бла', 'images/vShA5lGJmG90b9oKpDlHLZZVq2CjOy65Oi3BZBPO.png', '2024-02-04 11:12:12', '2024-02-04 11:12:12'),
(11, 'Новость 2', 'Бла бла', 'images/TKrXhXk9791ybx46ZW8B6xfCvT68oab7WgzG6XnY.png', '2024-02-04 11:14:10', '2024-02-04 11:14:10'),
(12, 'Новость 3', 'Бла бла', 'images/Wn1deUmnCr3lMGq1czlVSpK6IThT9cc9I2g9qesf.png', '2024-02-04 11:16:07', '2024-02-04 11:16:07'),
(13, 'Новость 4', 'Бла бла', 'images/FQ2D7KcrXCsKMzktM4TnLFO2mAGh4GJ6doZ56aIl.png', '2024-02-04 11:17:12', '2024-02-04 11:17:12'),
(14, 'Новость 5', 'Бла блаj', 'images/FRn0ibc3I0ialWe8QMd14doNFA89mMEW7jigS8y9.png', '2024-02-04 11:18:01', '2024-02-04 11:18:01'),
(15, 'Новость 6', 'Бла бла', 'images/FS3FW5eDBNIDEYDoCUd49DPSush3B52gOkJgEKEc.jpg', '2024-02-07 04:47:39', '2024-02-07 04:47:39'),
(16, 'Новость 7', 'Бла бла', 'images/91C26d0HeSHJQMvlXTBpvr8cjzGMHoFyWjqG6AoJ.jpg', '2024-02-07 04:49:15', '2024-02-07 04:49:15');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nick` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `tg` varchar(255) DEFAULT NULL,
  `vk` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nick`, `name`, `email`, `email_verified_at`, `password`, `role`, `photo`, `remember_token`, `tg`, `vk`, `created_at`, `updated_at`, `banned_at`) VALUES
(1, 'user_123', 'Username', 'user@mail.ru', NULL, '$2y$12$vILFA8HQ6STQBefhWyUh7O0J39/CysP5ZLf4mNw5ra.MovI.UuE36', NULL, NULL, NULL, NULL, NULL, '2024-01-22 09:17:20', '2024-02-05 14:09:59', NULL),
(2, 'johan123', 'John', 'john@mail.ru', NULL, '$2y$12$kkquw/EH2R7LEMxwK55dbu3zOGKk7vuaZzJHyq7gIXMIw9pwyk1uG', NULL, NULL, NULL, NULL, NULL, '2024-01-22 10:43:48', '2024-02-05 14:35:03', '2024-02-05 14:35:03'),
(4, 'aboba_123', 'Aboba', 'aboba@mail.ru', NULL, '$2y$12$fHa0qv88IN2Drg9LuVZ7ZuwaBFvl/xSDqSPqhKwP/XY.4RllBnluO', NULL, NULL, NULL, NULL, NULL, '2024-01-23 05:54:04', '2024-02-05 14:37:42', '2024-02-05 14:37:42'),
(5, 'nick_123', 'nick', 'nick@mail.ru', NULL, '$2y$12$k.AbPQATeuwnQceERGyUz.b8TP8wcQaaUvyGqHOVR2ddb5k/Zoptu', NULL, NULL, NULL, NULL, NULL, '2024-01-23 05:56:43', '2024-02-05 14:38:24', '2024-02-05 14:38:24'),
(7, 'fgsad_123', 'asfd', 'sdgsdg@mail.ru', NULL, '$2y$12$V1tJU7q.smMHKngASpGk6.NbKtvjVh1qF3xd0xOPL9CcO4gWS3LJC', NULL, NULL, NULL, NULL, NULL, '2024-01-23 06:05:55', '2024-02-05 14:39:48', '2024-02-05 14:39:48'),
(8, 'asdad_123', 'asdasda', 'asdaddw@mail.ru', NULL, '$2y$12$jhgC7Be57NmtHooowhRgu.vE2U9ggB6quCx2gnLs8ieMyXPyEqH1O', NULL, NULL, NULL, NULL, NULL, '2024-01-23 06:09:39', '2024-02-05 14:40:06', '2024-02-05 14:40:06'),
(9, '_asd1123', 'asdasdasdasd', 'asddkjgj@mail.ru', NULL, '$2y$12$RPw6.ZNushdeFq4XcKnqN.rfafwSAJ9MNrqwnkRl/w7WgrdMsnspS', NULL, NULL, NULL, NULL, NULL, '2024-01-23 06:10:14', '2024-02-05 14:43:21', '2024-02-05 14:43:21'),
(10, 'pivo', 'asddsa', 'asdagre2@mail.com', NULL, '$2y$12$7XvVnhG/MyG2bm7M9zcKGe/W6.pBXOhHMLwX1drxdi3YcL2ioK3Ve', NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:42:24', '2024-01-27 22:42:24', NULL),
(11, 'vgdfgdfbhd', 'gdfgdfgdfg', 'asd2asd@mail.com', NULL, '$2y$12$DuG8y2.UQhfKPiAYuDS07Om7stlHFf6iO1SfMkphnBR8jkIHU3T5m', NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:44:01', '2024-01-27 22:44:01', NULL),
(12, 'pivo_228', 'Имя', 'sony996sd525@gmail.com', '2024-01-27 22:47:05', '$2y$12$XKaiLt8jYSmYvaHSuoBTHuxD/.ak/tbji3mnFA9t/.JMbAhvb5Utq', NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:47:05', '2024-01-27 22:47:05', NULL),
(13, 'zxdsdw', 'asdasd', 'asdad7862@mmail.ru', '2024-01-27 23:50:36', '$2y$12$IKsfNDgOLojJI07e9z2dGOSeHp.MF6/chtXRmhCYSVmewJ062LLTS', NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:50:36', '2024-01-27 22:50:36', NULL),
(14, 'asdasd123', 'adsdasd2d', 'dasf2r@mail.rd', NULL, '$2y$12$JvLqc/s7KIpOr7t0QBHj9OY0lkII0jsKHIcKbwBIZLJE23B7cpa1W', NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:02:39', '2024-01-27 23:02:39', NULL),
(15, 'dfghfghhsd34', 'asd', 'daniilkatrasov@gmail.com', NULL, '$2y$12$nNXsFZytph0uHyGYRBT/VeNpl0kR1hebw7ViHzCyWuYxdKfqithxu', NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:35:12', '2024-02-11 13:25:43', NULL),
(16, 'asdfsdggzsdgsdgsdg', 'asdfs', 'dsadasdafhjg2@mail.ru', NULL, '$2y$12$QR6HTvXyNd0nOcykXloyv.8TLTIoNtPXCHTJevpCHliUlVekXxtIK', NULL, NULL, NULL, NULL, NULL, '2024-01-28 04:27:16', '2024-02-11 13:40:40', '2024-02-11 13:40:40'),
(17, 'asdasdg43y34', '0dsafgeg', 'asfasfasfjjljul@mail.ru', NULL, '$2y$12$qQE0qnqG7dZjbygf.MKZae2wMVgbVHUhvLy.8qTOEel4EKYBZUo8m', NULL, NULL, NULL, NULL, NULL, '2024-01-29 05:03:39', '2024-02-11 14:09:24', NULL),
(18, 'dasdasddsaf21', 'sdfgsdg', 'asdafgi34@mail.ru', NULL, '$2y$12$FnKkRXPZ0yGWGpe7WUUDcuX8dfMmqeTsp/t/J8KmBRDUt6Cs2z/xW', NULL, NULL, NULL, NULL, NULL, '2024-01-29 05:54:00', '2024-01-29 05:54:00', NULL),
(19, 'sdgsdgsdgaw12d_123', 'asdasdf', 'safasffas22d12@mail.com', NULL, '$2y$12$stog8TRaNw5dILqiw9GIe.NJHm9AccTTv08lo17Y6wDEtoVrWXnym', NULL, NULL, NULL, NULL, NULL, '2024-02-04 08:23:40', '2024-02-04 08:23:40', NULL),
(20, 'sdfgjdgshuo2', 'asffasf', 'phpasdstorm889@gmail.comasdsdas', NULL, '$2y$12$CXGYBVZ5vwsSfKy/AHwOUOr9Q4VwTvnlScoUx2eg0u5jRhdsbRzay', NULL, NULL, NULL, NULL, NULL, '2024-02-04 08:52:08', '2024-02-04 08:52:08', NULL),
(21, 'saffsfff22f2f2f', 'asdasd', 'phpstroasdsddm889@gmail.com', NULL, '$2y$12$DVVbqZQIqo1BkMzM5956OuvC.7tErjE0duYObGTDJLdDXx2ActNIu', NULL, NULL, NULL, NULL, NULL, '2024-02-04 08:54:04', '2024-02-04 08:54:04', NULL),
(22, 'test1', 'asdasdasdasg3', 'phpstorasdm889@gmail.com', NULL, '$2y$12$bjrR86JM99T8y28AFMGm2.t18C/kcrK01ZzNdHL4b2nYbU.qai.wa', NULL, NULL, NULL, NULL, NULL, '2024-02-04 08:55:35', '2024-02-04 08:55:35', NULL),
(23, 'jsdjhsdhh2', 'asf', 'sdgjkljklhhjl3@mail.com', NULL, '$2y$12$RwxiD./YBZaUpMiZxcyAS.ZC09k0dlr6FvAiVL8uWg.gy2XTRKg82', NULL, 'images/OhS1MtpwFgIam8PQRybMNjIItIXFH322OtYlXUAH.jpg', NULL, NULL, NULL, '2024-02-04 08:56:42', '2024-02-04 11:48:31', NULL),
(25, 'test4', 'asdasd', 'sony996525@gmail.com', NULL, '$2y$12$iKib1hV/ohz5iKT8CSxe0.RMKzBWztZfXO2ZcnNEsrCbc.ISmQdte', NULL, NULL, NULL, NULL, NULL, '2024-02-04 09:00:32', '2024-02-04 09:00:32', NULL),
(26, 'test5', 'asf', 'sdgjkljk23lhhjl3@mail.com', NULL, '$2y$12$J6buwvUp09JWiFynniNOp.HNbsjF/pVa0RHexvecGqY1C1WBM9Yki', NULL, 'images/vk5TqeT50MEy6PE9EvqD7WY9uv0HMtlWwh44TGGt.jpg', NULL, NULL, NULL, '2024-02-04 12:04:48', '2024-02-04 12:06:44', NULL),
(27, 'admin', 'Admin', 'admin@gmail.com', '2024-02-04 12:09:57', '$2y$12$ljLU8K3V8jojyY3dYoHul.8Sr93NIoz6Zvrtklh5x4WTkKGKJ2lKy', 2, 'images/default.png', NULL, NULL, NULL, '2024-02-04 12:09:54', '2024-02-04 12:09:54', NULL),
(28, 'test7', 'asdasd', 'asdasdadsg4g@mail.com', NULL, '$2y$12$R7tRDg526Js39mz/brPKOevxgJE7BwaZRCuNYg.pkdh8F3W8L1xii', NULL, 'images/default.png', NULL, NULL, NULL, '2024-02-05 14:48:00', '2024-02-05 14:48:33', '2024-02-05 14:48:33'),
(29, 'hiosdggiosdgjogojijipsdg', 'sdopkgipjsdgjip', 'asasgag@mail.com', NULL, '$2y$12$dTh/JFTZ4AB4xH6F/2CU5OniybIId/gr2ZLIHHoEd1bjto02.Nl/6', NULL, 'images/default.png', NULL, NULL, NULL, '2024-02-06 02:28:05', '2024-02-06 02:28:05', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bans_bannable_type_bannable_id_index` (`bannable_type`,`bannable_id`),
  ADD KEY `bans_created_by_type_created_by_id_index` (`created_by_type`,`created_by_id`),
  ADD KEY `bans_expired_at_index` (`expired_at`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `donates`
--
ALTER TABLE `donates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donate` (`donate`);

--
-- Индексы таблицы `donate_lists`
--
ALTER TABLE `donate_lists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bans`
--
ALTER TABLE `bans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `donates`
--
ALTER TABLE `donates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `donate_lists`
--
ALTER TABLE `donate_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
