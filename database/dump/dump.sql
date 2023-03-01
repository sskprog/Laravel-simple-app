-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20230113.c95b64afeb
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 01 2023 г., 19:28
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `map`
--

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Ромашка', 'office@rom.ru', 'Москва, ул. Шумкина, д.4', 'logos/GcYWGg3iJxJXNCocOlKqjmOTZTWDdxL9q3wSdc8t.jpg', NULL, '2023-02-19 14:47:43'),
(2, 'Вымпел', 'office@vympel.ru', 'Москва, ул. Суворовская, д. 27', 'logos/lCG4C0pdjTIF5UltWJItG0tIllKkEgiwFEtTgC3t.jpg', NULL, '2023-02-19 14:48:01'),
(3, 'Круиз', 'office@kruiz.ru', 'Санкт-Петербург, ул. Садовая, д. 56', 'logos/9UnQ2Yp2mY7xqAntoie7I6x4hPAVW3S0fp3QTYHH.jpg', NULL, '2023-02-19 14:48:18'),
(4, 'Прометей', 'office@prom.ru', 'Санкт-Петербург, ул. Народная, д. 33', 'logos/TppVeJMK1ceyz1nPelUxkKT7CAk5vA8j9l7jwLmj.jpg', NULL, '2023-02-19 15:34:28'),
(5, 'Жара', 'office@zhara.ru', 'Санкт-Петербург, ул. Сестрорецкая, д. 5', 'logos/v7C5zB8DdGvKWcv2w80iUTPi0vw32Vn2QE9mxkH6.jpg', NULL, '2023-02-19 15:58:08'),
(6, 'Артель', 'art@art.ru', 'Санкт-Петербург, ул. Торжковская, д.7', 'logos/x8FpXOseUyQs8iOqs8qhWeUyia07ONekP5AItK4x.jpg', '2023-02-13 15:04:51', '2023-02-20 14:11:57'),
(10, 'Тестер', 'test@tester.ru', 'Санкт-Петербург, ул. Есенина, 3', 'logos/Y28KdmSBxzzYlnE7iT0d8GSr7SvCHC70AiLRF8M8.jpg', '2023-02-14 16:40:07', '2023-02-20 14:42:09'),
(11, 'Полет', 'polet@polet.com', 'Санкт-Петербург, ул. Коллонтай, 18', 'logos/QTokJXRItdH0rNHma3rAzQno3KQif94FUZ33BV9g.jpg', '2023-02-17 14:29:30', '2023-02-20 14:14:32'),
(12, 'Электрон', 'elec@elec.ru', 'Санкт-Петербург, ул. Дыбенко, 21', 'logos/nueV6DlxPpJ1Z7bnriW0iWPNEBR4DVsqZCzAmDlF.jpg', '2023-02-17 14:35:33', '2023-02-20 14:21:44'),
(13, 'Восход', 'offiсe@vs.ru', 'Санкт-Петербург, ул. Крыленко, 23', 'logos/N1FWFhVq3I2f47KiYay11SsBn0iEUG371Wm7iza2.jpg', '2023-02-19 07:46:16', '2023-02-20 14:43:26'),
(29, 'Акцепт', 'accept@mail.me', 'Санкт-Петербург, Лесной пр., 21', NULL, '2023-02-28 15:01:31', '2023-02-28 15:01:31');

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `emp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `company_id`, `emp_name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(2, 1, 'Петров А.В', 'petrov@mail.me', '1234567', '2023-02-22 14:18:25', '2023-02-28 16:41:20'),
(3, 12, 'Иванов И.М.', 'ivan@mail.me', '1347834', '2023-02-22 14:57:49', '2023-02-28 16:41:53'),
(4, 6, 'Сидоров К.С.', 'sidor@mail.me', '2315622', '2023-02-22 15:13:11', '2023-02-28 16:42:32'),
(5, 1, 'Конев С.К.', 'konev@mail.me', '9874534', '2023-02-22 15:25:05', '2023-02-28 16:43:30'),
(7, 12, 'Полевой А.С.', 'polev@mail.me', '3451233', '2023-02-28 16:44:16', '2023-02-28 16:44:16'),
(8, 12, 'Неверов И.М.', 'neverov@mail.me', '1122345', '2023-02-28 16:45:05', '2023-02-28 16:45:05'),
(9, 3, 'Попов В.А.', 'popov@mail.me', '2334511', '2023-02-28 16:45:30', '2023-02-28 16:45:30'),
(10, 2, 'Курбанов В.В.', 'kurbanov@mail.me', '12333221', '2023-02-28 16:46:05', '2023-02-28 16:46:05'),
(11, 13, 'Четкий С.С.', 'chet@mail.me', '2223768', '2023-02-28 16:46:47', '2023-02-28 16:46:47'),
(12, 6, 'Ненашева А.А.', 'nenash@mail.me', '3334122', '2023-02-28 16:47:42', '2023-02-28 16:47:42'),
(13, 4, 'Соколова А.Н.', 'sokol@mail.me', '7774523', '2023-02-28 16:48:35', '2023-02-28 16:48:35');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_13_164114_create_companies_table', 2),
(6, '2023_02_21_182912_create_employees_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@user.ru', NULL, '$2y$10$pEtcGMfsnaYcAZi2ONmgZum9dmJdXE62xEdqmQZVxtQZVk/dEe46i', NULL, '2023-02-11 14:37:30', '2023-02-11 14:37:30');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_company_id_foreign` (`company_id`);

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
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
