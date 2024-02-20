/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `kategori` (
  `idKategori` bigint unsigned NOT NULL AUTO_INCREMENT,
  `namaKategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idKategori`),
  KEY `kategori_idkategori_index` (`idKategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `payment` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeImage` bigint unsigned NOT NULL,
  `buyer` bigint unsigned NOT NULL,
  `seller` bigint unsigned NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_buyer_foreign` (`buyer`),
  KEY `payment_seller_foreign` (`seller`),
  KEY `payment_kodeimage_foreign` (`kodeImage`),
  CONSTRAINT `payment_buyer_foreign` FOREIGN KEY (`buyer`) REFERENCES `users` (`idUser`),
  CONSTRAINT `payment_kodeimage_foreign` FOREIGN KEY (`kodeImage`) REFERENCES `post` (`idPost`),
  CONSTRAINT `payment_seller_foreign` FOREIGN KEY (`seller`) REFERENCES `users` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `post` (
  `idPost` bigint unsigned NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeUser` bigint unsigned NOT NULL,
  `postCategory` bigint unsigned NOT NULL,
  `postImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postUrl` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPost`),
  KEY `post_kodeuser_foreign` (`kodeUser`),
  KEY `post_postcategory_foreign` (`postCategory`),
  KEY `post_idpost_index` (`idPost`),
  CONSTRAINT `post_kodeuser_foreign` FOREIGN KEY (`kodeUser`) REFERENCES `users` (`idUser`),
  CONSTRAINT `post_postcategory_foreign` FOREIGN KEY (`postCategory`) REFERENCES `kategori` (`idKategori`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `idUser` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` int DEFAULT NULL,
  `rekenings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategori` (`idKategori`, `namaKategori`, `created_at`, `updated_at`) VALUES
(1, 'wahh', '2024-02-15 18:59:18', '2024-02-15 19:00:12');
INSERT INTO `kategori` (`idKategori`, `namaKategori`, `created_at`, `updated_at`) VALUES
(2, 'cuyyy', '2024-02-15 18:59:55', '2024-02-15 18:59:55');


INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2024_01_11_000509_create_kategori', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2024_01_11_004610_post', 1),
(14, '2024_01_11_020811_create_payment', 1);



INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(5, 'App\\Models\\User', 1, 'user_login', '4c7d71439424d6d38256a088c3b4c7a8dccde092c52f389f738b4a59605773c6', '[\"*\"]', '2024-02-19 16:26:26', NULL, '2024-02-19 15:30:31', '2024-02-19 16:26:26');


INSERT INTO `post` (`idPost`, `postTitle`, `kodeUser`, `postCategory`, `postImage`, `postUrl`, `status`, `created_at`, `updated_at`) VALUES
(12, 'ad', 8, 1, 'ut', 'ut', 2, '2024-02-16 02:02:00', '2024-02-16 02:02:00');
INSERT INTO `post` (`idPost`, `postTitle`, `kodeUser`, `postCategory`, `postImage`, `postUrl`, `status`, `created_at`, `updated_at`) VALUES
(13, 'sit', 2, 1, 'aut', 'aut', 2, '2024-02-16 02:02:00', '2024-02-16 02:02:00');
INSERT INTO `post` (`idPost`, `postTitle`, `kodeUser`, `postCategory`, `postImage`, `postUrl`, `status`, `created_at`, `updated_at`) VALUES
(14, 'quod', 5, 1, 'qui', 'qui', 2, '2024-02-16 02:02:00', '2024-02-16 02:02:00');
INSERT INTO `post` (`idPost`, `postTitle`, `kodeUser`, `postCategory`, `postImage`, `postUrl`, `status`, `created_at`, `updated_at`) VALUES
(15, 'dolores', 2, 2, 'delectus', 'delectus', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(16, 'et', 7, 1, 'ut', 'ut', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(17, 'officiis', 7, 1, 'quae', 'quae', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(18, 'sint', 4, 1, 'autem', 'autem', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(19, 'sint', 7, 1, 'molestiae', 'molestiae', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(20, 'dolorem', 1, 2, 'nam', 'nam', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(21, 'amet', 1, 2, 'eum', 'eum', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(22, 'sapiente', 1, 1, 'sit', 'sit', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(23, 'doloribus', 1, 1, 'suscipit', 'suscipit', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(24, 'aut', 1, 2, 'vel', 'vel', 2, '2024-02-16 02:02:12', '2024-02-16 02:02:12'),
(25, 'tescuy', 1, 1, 'fotoku.jpg', NULL, 1, '2024-02-16 02:21:37', '2024-02-16 02:21:37');

INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `roles`, `rekenings`, `created_at`, `updated_at`) VALUES
(1, 'zazai', 'zazai@gmail.com', '$2y$12$mQ5j4wijD8HOXilBewoPreOFO3dQnl6Re8UEXqLl45B10CVQSB966', 1, '0182308120238120', '2024-02-15 19:02:33', '2024-02-15 19:02:33');
INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `roles`, `rekenings`, `created_at`, `updated_at`) VALUES
(2, 'Rae Ryan MD', 'bradtke.alena@example.net', '$2y$12$obvdE5BEDF2rBs6pMeu4Z.K24bcZx16CWPqvWOZOYrBPpT4Zn0iIi', 2, '117851872', '2024-02-15 19:02:33', '2024-02-15 19:02:33');
INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `roles`, `rekenings`, `created_at`, `updated_at`) VALUES
(4, 'uhuy', 'uhuy@gmail.com', '$2y$12$cttr320ad4XdETfISY5dT.bN4hNFWJvQXzDdFyaur0vzsfLVGaf1y', 2, '0182308120238120', '2024-02-15 19:03:13', '2024-02-15 19:03:13');
INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `roles`, `rekenings`, `created_at`, `updated_at`) VALUES
(5, 'Robb Jacobson', 'kbailey@example.com', '$2y$12$pRxGynOYG4l88t1rx2453enR7NA015VdI4MuItDlMaVNxwYeqis9a', 2, '594590958', '2024-02-15 19:03:13', '2024-02-15 19:03:13'),
(6, 'Dean Wiza', 'pink17@example.com', '$2y$12$xONIfdgAmq/cpL5tZP0Zge85k.M5pQ31mjm0dfyPdzkP2YDV.jcYG', 2, '327483185', '2024-02-16 02:01:42', '2024-02-16 02:01:42'),
(7, 'Melany Wiza', 'olson.norbert@example.net', '$2y$12$xONIfdgAmq/cpL5tZP0Zge85k.M5pQ31mjm0dfyPdzkP2YDV.jcYG', 2, '319912911', '2024-02-16 02:01:42', '2024-02-16 02:01:42'),
(8, 'Alexzander Yundt', 'qflatley@example.org', '$2y$12$xONIfdgAmq/cpL5tZP0Zge85k.M5pQ31mjm0dfyPdzkP2YDV.jcYG', 2, '849124977', '2024-02-16 02:01:42', '2024-02-16 02:01:42');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;