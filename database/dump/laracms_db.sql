-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Вер 16 2016 р., 06:24
-- Версія сервера: 5.6.17-log
-- Версія PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `laracms_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  UNIQUE KEY `slug` (`slug`),
  KEY `deleted_at` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Товари', 'tovari', '2016-09-04 14:46:34', '2016-09-04 14:46:34', NULL),
(2, 'Авто запчастини', 'avto-zapchastini', '2016-09-04 14:47:17', '2016-09-04 14:47:17', NULL),
(3, 'Проекти для реставрації', 'proekti-dlya-restavratsii', '2016-09-06 15:44:59', '2016-09-06 15:44:59', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `category_relations`
--

DROP TABLE IF EXISTS `category_relations`;
CREATE TABLE IF NOT EXISTS `category_relations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `child_category_id` int(10) UNSIGNED NOT NULL,
  `parent_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `child_category_id_2` (`child_category_id`,`parent_category_id`),
  KEY `child_category_id` (`child_category_id`),
  KEY `parent_category_id` (`parent_category_id`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `currency_rate`
--

DROP TABLE IF EXISTS `currency_rate`;
CREATE TABLE IF NOT EXISTS `currency_rate` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usd` double NOT NULL,
  `uah` double NOT NULL,
  `eur` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`),
  KEY `deleted_at` (`deleted_at`),
  KEY `usd` (`usd`),
  KEY `uah` (`uah`),
  KEY `eur` (`eur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `currency_rate`
--

INSERT INTO `currency_rate` (`id`, `usd`, `uah`, `eur`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 26.45, 1, 29.55, '2016-09-05 08:11:50', '2016-09-05 08:11:50', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `img_600_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `origin_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deleted_at` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `images`
--

INSERT INTO `images` (`id`, `title`, `img_600_url`, `origin_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'My first image', '/images/2016/9/3/photo-1472890293-600.jpg', '/images/2016/9/3/photo-1472890293-hd.jpg', '2016-09-03 05:11:33', '2016-09-03 05:11:33', NULL),
(9, 'Bike', '/images/2016/9/3/photo-1472890642-600.jpg', '/images/2016/9/3/photo-1472890642-hd.jpg', '2016-09-03 05:17:22', '2016-09-03 05:17:22', NULL),
(10, 'pc keyboard', '/images/2016/9/3/photo-1472914017-600.png', '/images/2016/9/3/photo-1472914017-hd.png', '2016-09-03 11:46:58', '2016-09-03 11:46:58', NULL),
(11, '', '/images/2016/9/6/photo-1473184240-600.jpg', '/images/2016/9/6/photo-1473184240-hd.jpg', '2016-09-06 14:50:40', '2016-09-06 14:50:40', NULL),
(12, '', '/images/2016/9/6/photo-1473184244-600.jpg', '/images/2016/9/6/photo-1473184244-hd.jpg', '2016-09-06 14:50:44', '2016-09-06 14:50:44', NULL),
(13, '', '/images/2016/9/6/photo-1473184248-600.jpg', '/images/2016/9/6/photo-1473184248-hd.jpg', '2016-09-06 14:50:48', '2016-09-06 14:50:48', NULL),
(14, '', '/images/2016/9/6/photo-1473184255-600.jpg', '/images/2016/9/6/photo-1473184255-hd.jpg', '2016-09-06 14:50:55', '2016-09-06 14:50:55', NULL),
(15, '', '/images/2016/9/6/photo-1473184259-600.jpg', '/images/2016/9/6/photo-1473184259-hd.jpg', '2016-09-06 14:50:59', '2016-09-06 14:50:59', NULL),
(16, '', '/images/2016/9/9/photo-1473420266-600.jpg', '/images/2016/9/9/photo-1473420266-hd.jpg', '2016-09-09 08:24:27', '2016-09-09 08:24:27', NULL),
(17, '', '/images/2016/9/9/photo-1473420271-600.jpg', '/images/2016/9/9/photo-1473420271-hd.jpg', '2016-09-09 08:24:31', '2016-09-09 08:24:31', NULL),
(18, '', '/images/2016/9/9/photo-1473420275-600.jpg', '/images/2016/9/9/photo-1473420275-hd.jpg', '2016-09-09 08:24:35', '2016-09-09 08:24:35', NULL),
(19, '', '/images/2016/9/9/photo-1473422200-600.jpg', '/images/2016/9/9/photo-1473422200-hd.jpg', '2016-09-09 08:56:40', '2016-09-09 08:56:40', NULL),
(20, '', '/images/2016/9/9/photo-1473422204-600.jpg', '/images/2016/9/9/photo-1473422204-hd.jpg', '2016-09-09 08:56:44', '2016-09-09 08:56:44', NULL),
(21, '', '/images/2016/9/9/photo-1473422208-600.jpg', '/images/2016/9/9/photo-1473422208-hd.jpg', '2016-09-09 08:56:48', '2016-09-09 08:56:48', NULL),
(22, '', '/images/2016/9/9/photo-1473422211-600.jpg', '/images/2016/9/9/photo-1473422211-hd.jpg', '2016-09-09 08:56:52', '2016-09-09 08:56:52', NULL),
(23, '', '/images/2016/9/9/photo-1473422216-600.jpg', '/images/2016/9/9/photo-1473422216-hd.jpg', '2016-09-09 08:56:56', '2016-09-09 08:56:56', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_01_152308_create_categories_table', 1),
('2016_09_01_152308_create_category_relations_table', 1),
('2016_09_01_152308_create_images_table', 1),
('2016_09_01_152308_create_product_images_table', 1),
('2016_09_01_152308_create_products_table', 1),
('2016_09_01_152310_add_foreign_keys_to_category_relations_table', 1),
('2016_09_01_152310_add_foreign_keys_to_product_images_table', 1),
('2016_09_01_152310_add_foreign_keys_to_products_table', 1),
('2016_09_02_164544_create_categories_table', 2),
('2016_09_02_164544_create_category_relations_table', 2),
('2016_09_02_164544_create_images_table', 2),
('2016_09_02_164544_create_password_resets_table', 2),
('2016_09_02_164544_create_product_images_table', 2),
('2016_09_02_164544_create_products_table', 2),
('2016_09_02_164544_create_users_table', 2),
('2016_09_02_164546_add_foreign_keys_to_category_relations_table', 2),
('2016_09_02_164546_add_foreign_keys_to_product_images_table', 2),
('2016_09_02_164546_add_foreign_keys_to_products_table', 2),
('2016_09_03_082359_create_categories_table', 3),
('2016_09_03_082359_create_category_relations_table', 3),
('2016_09_03_082359_create_images_table', 3),
('2016_09_03_082359_create_password_resets_table', 3),
('2016_09_03_082359_create_product_images_table', 3),
('2016_09_03_082359_create_products_table', 3),
('2016_09_03_082359_create_users_table', 3),
('2016_09_03_082400_add_foreign_keys_to_category_relations_table', 3),
('2016_09_03_082400_add_foreign_keys_to_product_images_table', 3),
('2016_09_03_082400_add_foreign_keys_to_products_table', 3),
('2016_09_03_145643_create_categories_table', 4),
('2016_09_03_145643_create_category_relations_table', 4),
('2016_09_03_145643_create_images_table', 4),
('2016_09_03_145643_create_password_resets_table', 4),
('2016_09_03_145643_create_product_images_table', 4),
('2016_09_03_145643_create_products_table', 4),
('2016_09_03_145643_create_users_table', 4),
('2016_09_03_145644_add_foreign_keys_to_category_relations_table', 4),
('2016_09_03_145644_add_foreign_keys_to_product_images_table', 4),
('2016_09_03_145644_add_foreign_keys_to_products_table', 4),
('2016_09_05_081537_create_categories_table', 5),
('2016_09_05_081537_create_category_relations_table', 5),
('2016_09_05_081537_create_images_table', 5),
('2016_09_05_081537_create_password_resets_table', 5),
('2016_09_05_081537_create_product_images_table', 5),
('2016_09_05_081537_create_products_table', 5),
('2016_09_05_081537_create_users_table', 5),
('2016_09_05_081539_add_foreign_keys_to_category_relations_table', 5),
('2016_09_05_081539_add_foreign_keys_to_product_images_table', 5),
('2016_09_05_081539_add_foreign_keys_to_products_table', 5),
('2016_09_05_084840_create_categories_table', 6),
('2016_09_05_084840_create_category_relations_table', 6),
('2016_09_05_084840_create_images_table', 6),
('2016_09_05_084840_create_password_resets_table', 6),
('2016_09_05_084840_create_product_images_table', 6),
('2016_09_05_084840_create_products_table', 6),
('2016_09_05_084840_create_users_table', 6),
('2016_09_05_084842_add_foreign_keys_to_category_relations_table', 6),
('2016_09_05_084842_add_foreign_keys_to_product_images_table', 6),
('2016_09_05_084842_add_foreign_keys_to_products_table', 6),
('2016_09_06_104628_create_categories_table', 7),
('2016_09_06_104628_create_category_relations_table', 7),
('2016_09_06_104628_create_currency_rate_table', 7),
('2016_09_06_104628_create_images_table', 7),
('2016_09_06_104628_create_password_resets_table', 7),
('2016_09_06_104628_create_product_images_table', 7),
('2016_09_06_104628_create_products_table', 7),
('2016_09_06_104628_create_users_table', 7),
('2016_09_06_104630_add_foreign_keys_to_category_relations_table', 7),
('2016_09_06_104630_add_foreign_keys_to_product_images_table', 7),
('2016_09_06_104630_add_foreign_keys_to_products_table', 7),
('2016_09_16_061256_create_categories_table', 8),
('2016_09_16_061256_create_category_relations_table', 8),
('2016_09_16_061256_create_currency_rate_table', 8),
('2016_09_16_061256_create_images_table', 8),
('2016_09_16_061256_create_password_resets_table', 8),
('2016_09_16_061256_create_product_images_table', 8),
('2016_09_16_061256_create_products_table', 8),
('2016_09_16_061256_create_users_table', 8),
('2016_09_16_061258_add_foreign_keys_to_category_relations_table', 8),
('2016_09_16_061258_add_foreign_keys_to_product_images_table', 8),
('2016_09_16_061258_add_foreign_keys_to_products_table', 8);

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('public','archive','private','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'private',
  `price_usd` double DEFAULT NULL,
  `price_uah` double DEFAULT NULL,
  `price_eur` double DEFAULT NULL,
  `selected_currency` enum('usd','uah','eur') COLLATE utf8_unicode_ci DEFAULT NULL,
  `condition` enum('new','used') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'used',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category_id` (`category_id`),
  KEY `deleted_at` (`deleted_at`),
  KEY `status` (`status`),
  KEY `price_usd` (`price_usd`),
  KEY `price_uah` (`price_uah`),
  KEY `price_eur` (`price_eur`),
  KEY `selected_currency` (`selected_currency`),
  KEY `condition` (`condition`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `description`, `slug`, `status`, `price_usd`, `price_uah`, `price_eur`, `selected_currency`, `condition`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 2, 'Harley Davidson WJ 600cc Sports Engine from 1922', '', 'harley-davidson-wj-600cc-sports-engine-from-1922', 'public', 4189.5085066163, 110812.5, 3750, 'eur', 'used', '2016-09-06 14:46:56', '2016-09-06 14:46:56', NULL),
(17, 2, 'Harley Davidson WJ 600cc Sports Engine from 1923', '', 'harley-davidson-wj-600cc-sports-engine-from-1923', 'public', 4189.5085066163, 110812.5, 3750, 'eur', 'used', '2016-09-06 14:46:56', '2016-09-07 15:01:31', NULL),
(18, 2, ' Lucas/Butlers WD REAR TAIL light', '', 'lucasbutlers-wd-rear-tail-light1473420379', 'public', 167.58034026465, 4432.5, 150, 'eur', 'used', '2016-09-09 08:26:19', '2016-09-09 08:26:19', NULL),
(19, 2, ' Lucas/Butlers WD REAR TAIL light', '', 'lucasbutlers-wd-rear-tail-light', 'public', 167.58034026465, 4432.5, 150, 'eur', 'used', '2016-09-09 08:26:35', '2016-09-09 08:26:45', '2016-09-09 08:26:45'),
(20, 2, 'Puch SV175 petrol tank', '', 'puch-sv175-petrol-tank', 'public', 217.85444234405, 5762.25, 195, 'eur', 'used', '2016-09-09 08:57:38', '2016-09-09 08:57:38', NULL),
(21, 2, 'rrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrrr', 'public', 4, 105.8, 3.580372250423, 'usd', 'new', '2016-09-13 07:49:12', '2016-09-16 03:22:29', '2016-09-16 03:22:29');

-- --------------------------------------------------------

--
-- Структура таблиці `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `media_type` enum('App\\Product') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'App\\Product',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id_2` (`product_id`,`image_id`),
  KEY `product_id` (`product_id`),
  KEY `image_id` (`image_id`),
  KEY `media_type` (`media_type`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_id`, `media_type`, `created_at`, `updated_at`) VALUES
(1, 14, 11, 'App\\Product', '2016-09-06 14:52:08', '2016-09-06 14:52:08'),
(2, 14, 12, 'App\\Product', '2016-09-06 14:52:13', '2016-09-06 14:52:13'),
(3, 14, 13, 'App\\Product', '2016-09-06 14:52:18', '2016-09-06 14:52:18'),
(4, 14, 14, 'App\\Product', '2016-09-06 14:52:23', '2016-09-06 14:52:23'),
(5, 14, 15, 'App\\Product', '2016-09-06 14:52:28', '2016-09-06 14:52:28'),
(6, 17, 9, 'App\\Product', '2016-09-07 14:51:19', '2016-09-07 14:51:19'),
(7, 18, 16, 'App\\Product', '2016-09-09 08:27:23', '2016-09-09 08:27:23'),
(8, 18, 17, 'App\\Product', '2016-09-09 08:27:28', '2016-09-09 08:27:28'),
(9, 18, 18, 'App\\Product', '2016-09-09 08:27:33', '2016-09-09 08:27:33'),
(10, 20, 19, 'App\\Product', '2016-09-09 08:57:57', '2016-09-09 08:57:57'),
(11, 20, 20, 'App\\Product', '2016-09-09 08:58:01', '2016-09-09 08:58:01'),
(12, 20, 21, 'App\\Product', '2016-09-09 08:58:07', '2016-09-09 08:58:07'),
(13, 20, 22, 'App\\Product', '2016-09-09 08:58:12', '2016-09-09 08:58:12'),
(14, 20, 23, 'App\\Product', '2016-09-09 08:58:18', '2016-09-09 08:58:18');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('default','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yan Datsyuk', 'yanek2357111317232931@gmail.com', 'admin', '$2y$10$mOZfQBljFeHX8Klm7FDNK.TbgtKbsBiLJE6wH2qE9bTZxxl0HZDL6', NULL, '2016-09-13 13:42:41', '2016-09-13 13:42:41');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `products`
--
ALTER TABLE `products` ADD FULLTEXT KEY `title` (`title`);

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `category_relations`
--
ALTER TABLE `category_relations`
  ADD CONSTRAINT `category_relations_ibfk_1` FOREIGN KEY (`child_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_relations_ibfk_2` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_images_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
