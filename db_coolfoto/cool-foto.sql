/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `idKategori` bigint unsigned NOT NULL AUTO_INCREMENT,
  `namaKategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idKategori`),
  KEY `kategori_idkategori_index` (`idKategori`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `payment`;
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
  CONSTRAINT `payment_buyer_foreign` FOREIGN KEY (`buyer`) REFERENCES `users` (`idUser`) ON DELETE CASCADE,
  CONSTRAINT `payment_kodeimage_foreign` FOREIGN KEY (`kodeImage`) REFERENCES `post` (`idPost`) ON DELETE CASCADE,
  CONSTRAINT `payment_seller_foreign` FOREIGN KEY (`seller`) REFERENCES `users` (`idUser`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personal_access_tokens`;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `idPost` bigint unsigned NOT NULL AUTO_INCREMENT,
  `postTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postDesc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `kodeUser` bigint unsigned NOT NULL,
  `postCategory` bigint unsigned NOT NULL,
  `postImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postUrl` mediumtext COLLATE utf8mb4_unicode_ci,
  `price` int DEFAULT NULL,
  `status` int NOT NULL,
  `approvalStatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPost`),
  KEY `post_kodeuser_foreign` (`kodeUser`),
  KEY `post_postcategory_foreign` (`postCategory`),
  KEY `post_idpost_index` (`idPost`),
  CONSTRAINT `post_kodeuser_foreign` FOREIGN KEY (`kodeUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE,
  CONSTRAINT `post_postcategory_foreign` FOREIGN KEY (`postCategory`) REFERENCES `kategori` (`idKategori`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `idWishlist` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kodeUser` bigint unsigned NOT NULL,
  `kodePost` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idWishlist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategori` (`idKategori`, `namaKategori`, `created_at`, `updated_at`) VALUES
(4, 'Pemandagan', '2024-02-29 18:21:18', '2024-02-29 18:21:18');
INSERT INTO `kategori` (`idKategori`, `namaKategori`, `created_at`, `updated_at`) VALUES
(5, 'Animasi', '2024-02-29 18:21:26', '2024-02-29 18:21:26');
INSERT INTO `kategori` (`idKategori`, `namaKategori`, `created_at`, `updated_at`) VALUES
(6, 'Perkotaan', '2024-02-29 18:21:34', '2024-02-29 18:21:34');
INSERT INTO `kategori` (`idKategori`, `namaKategori`, `created_at`, `updated_at`) VALUES
(7, 'Langit', '2024-02-29 18:21:39', '2024-02-29 18:21:39'),
(8, 'Manusia', '2024-02-29 18:21:43', '2024-02-29 18:21:43'),
(9, 'Hewan', '2024-02-29 18:21:48', '2024-02-29 18:21:48');



INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 18, 'user_login', '977b4264c2d696dd8e23a69eb1fcde7ec0684c446b22f1d2270b4e9878f61344', '[\"*\"]', NULL, NULL, '2024-02-28 15:08:52', '2024-02-28 15:08:52');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 18, 'user_login', 'a577ec6ff9b2e899d551dff0ad53090a48587f8701a35ae1633cce4222a6e747', '[\"*\"]', NULL, NULL, '2024-02-28 16:03:09', '2024-02-28 16:03:09');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 18, 'user_login', 'd103e18f7f60b9c3eb0892c5c6f9b5ce93efaa8cf7b592109a76df9a661810df', '[\"*\"]', NULL, NULL, '2024-02-28 16:06:07', '2024-02-28 16:06:07');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\User', 18, 'user_login', 'f23419b326733d654bf60f6a0d86944409be2d20fd9533bf8e66138905376bc2', '[\"*\"]', NULL, NULL, '2024-02-28 16:07:39', '2024-02-28 16:07:39'),
(5, 'App\\Models\\User', 18, 'user_login', '3b93a7eec6a4809672eb32f5d51483087357dd982775f4ca369f032a62bf90b6', '[\"*\"]', NULL, NULL, '2024-02-29 03:56:55', '2024-02-29 03:56:55'),
(6, 'App\\Models\\User', 18, 'user_login', '7f5250d7d51269bcc619245531961f55d8420d3557eb9d0de552cc5b5967554e', '[\"*\"]', NULL, NULL, '2024-02-29 07:05:48', '2024-02-29 07:05:48'),
(7, 'App\\Models\\User', 16, 'user_login', '387a19b9413a414ad772c5e22a5b0428d8129faf15fd8f1795eb911a6d227285', '[\"*\"]', NULL, NULL, '2024-02-29 07:51:56', '2024-02-29 07:51:56'),
(8, 'App\\Models\\User', 18, 'user_login', '4ead7149acd6a3164ed986ca2cbf947545cdf0bb02dc7a31794a9a3130b24a03', '[\"*\"]', NULL, NULL, '2024-02-29 14:04:45', '2024-02-29 14:04:45'),
(9, 'App\\Models\\User', 16, 'user_login', '7617076923686cc8f0ad26c8795cf7eb8eedcf79aa405c750cded5ac000b4b95', '[\"*\"]', NULL, NULL, '2024-03-01 05:28:52', '2024-03-01 05:28:52'),
(10, 'App\\Models\\User', 20, 'user_login', '390ca5b0d2fa23fd2d8f70659d8ad74a30f864130d653a5038cef4919b5e5e86', '[\"*\"]', NULL, NULL, '2024-03-01 06:09:42', '2024-03-01 06:09:42'),
(11, 'App\\Models\\User', 21, 'user_login', '7ca08cb1d183781c077c9531e1bf2a071aaf5176cdebd2f9af45094c4f9b0d7c', '[\"*\"]', NULL, NULL, '2024-03-01 06:30:55', '2024-03-01 06:30:55'),
(12, 'App\\Models\\User', 22, 'user_login', '3c599ec85e9acfdb6f7bb8ef4e86c326dc742e4b19884cd0375b1db9d8d2e43e', '[\"*\"]', NULL, NULL, '2024-03-01 06:40:25', '2024-03-01 06:40:25'),
(13, 'App\\Models\\User', 21, 'user_login', 'f6f8e93a17aff3195ba247c3cadad5a1ba9408fb1563869ae8a4058029c16882', '[\"*\"]', NULL, NULL, '2024-03-01 06:59:50', '2024-03-01 06:59:50'),
(14, 'App\\Models\\User', 18, 'user_login', '061af034f0f9ec8deb8f0a44ed2024d1524f1c9b760815cf567448a1a7fd8dbe', '[\"*\"]', NULL, NULL, '2024-03-01 07:22:14', '2024-03-01 07:22:14'),
(15, 'App\\Models\\User', 16, 'user_login', '379612f5a7a24c10ba0e3e76ba3914e7aeebc42521250c6953e0525a6b1e712f', '[\"*\"]', NULL, NULL, '2024-03-01 07:33:06', '2024-03-01 07:33:06');

INSERT INTO `post` (`idPost`, `postTitle`, `postDesc`, `kodeUser`, `postCategory`, `postImage`, `postUrl`, `price`, `status`, `approvalStatus`, `created_at`, `updated_at`) VALUES
(28, 'mortal kombat', 'gambar motrtal kombat', 16, 5, 'NnFDnLITIyQHrc4En5UZ.jpg', NULL, 5000, 1, '0', '2024-03-01 05:56:11', '2024-03-01 05:56:11');
INSERT INTO `post` (`idPost`, `postTitle`, `postDesc`, `kodeUser`, `postCategory`, `postImage`, `postUrl`, `price`, `status`, `approvalStatus`, `created_at`, `updated_at`) VALUES
(29, 'With Hoodie', 'Yellow Hoodie', 20, 8, 'UvlEK9wsgArHiYgHy3l1.jpg', NULL, 400, 1, '0', '2024-03-01 06:11:13', '2024-03-01 06:11:13');
INSERT INTO `post` (`idPost`, `postTitle`, `postDesc`, `kodeUser`, `postCategory`, `postImage`, `postUrl`, `price`, `status`, `approvalStatus`, `created_at`, `updated_at`) VALUES
(31, 'Human', 'Handsome human', 20, 8, '6OZasgccjf1V2qihua4s.jpg', NULL, 100, 1, '0', '2024-03-01 06:13:22', '2024-03-01 06:13:22');
INSERT INTO `post` (`idPost`, `postTitle`, `postDesc`, `kodeUser`, `postCategory`, `postImage`, `postUrl`, `price`, `status`, `approvalStatus`, `created_at`, `updated_at`) VALUES
(32, 'tes', 'Yellow Hoodie', 20, 8, 'a7mlgd4GaDGjWUr11uia.jpg', NULL, 50000, 1, '0', '2024-03-01 06:22:14', '2024-03-01 06:22:14'),
(33, 'Pantai', 'Aku suka pantai', 20, 4, 'iCy4KN2838twClB8xMbc.jpg', NULL, NULL, 2, '0', '2024-03-01 06:24:52', '2024-03-01 06:24:52'),
(34, 'Gunung yang indah', 'kekuasaan allah', 20, 4, 'nLqFvgpI9kEd1yVPzdw9.jpg', NULL, 100000, 1, '0', '2024-03-01 06:26:00', '2024-03-01 06:26:00'),
(35, 'Suasana Malam', 'Suasana malam yang sunyi', 20, 6, 'lBBMqPfwRBz5DPEQm6MI.jpg', NULL, 120000, 1, '0', '2024-03-01 06:27:48', '2024-03-01 06:27:48'),
(36, 'Pemandagan Dari atas', 'Indah', 20, 4, '7euQt6IguGyCXrUfUEMf.jpg', NULL, 145666, 1, '0', '2024-03-01 06:29:15', '2024-03-01 06:29:15'),
(37, 'Little Naruto', 'so cute', 21, 5, 'SIS0H6aJ5bDFbCIlI4f6.jpg', NULL, 123000, 1, '0', '2024-03-01 06:33:41', '2024-03-01 06:33:41'),
(38, 'Little Girl', 'Sweett', 21, 5, '9G90mZ4mRWZsDHmyw5Ya.jpg', NULL, 145000, 1, '0', '2024-03-01 06:34:46', '2024-03-01 06:34:46'),
(39, 'Trio Blue', 'There are so cute', 21, 5, '3uXnNJ1SLFp8BgT56YhV.jpg', NULL, NULL, 2, '0', '2024-03-01 06:35:31', '2024-03-01 06:35:31'),
(40, 'Beautifull sky', 'like them', 21, 7, 'a6f4CABLXs5QqWSkyxDT.jpg', NULL, NULL, 2, '0', '2024-03-01 06:36:51', '2024-03-01 06:36:51'),
(41, 'Clear Sky', 'feel so clean', 21, 7, 'CMc58p8B0asGC0YLNrAi.jpg', NULL, 123, 1, '0', '2024-03-01 06:37:42', '2024-03-01 06:37:42'),
(42, 'Langit di perkotaan', 'Langit senja', 21, 7, 'nJ60qxIwr2jJ84ANWDPr.jpg', NULL, 120000, 1, '0', '2024-03-01 06:38:12', '2024-03-01 06:38:12'),
(43, 'Suasana Kota', 'tenang', 22, 6, 'oF5L8w52UKRhMoRr1T80.jpg', NULL, NULL, 2, '0', '2024-03-01 06:43:35', '2024-03-01 06:43:35'),
(44, 'Sore', 'Menjelang sore di kota ku', 22, 6, '3n5MH1pJgyo9lUrdEc7I.jpg', NULL, NULL, 2, '0', '2024-03-01 06:44:25', '2024-03-01 06:44:25'),
(45, 'Senja', 'Senja bersama gedung gedung tinggi', 22, 6, 'ILFVYEcF1UXknqJGcIdv.jpg', NULL, 100000, 1, '0', '2024-03-01 06:45:00', '2024-03-01 06:45:00'),
(46, 'Cat Walk', 'Pretty Women here', 22, 8, 'tpG2s7H03W84nqw1SaDt.jpg', NULL, 146000, 1, '0', '2024-03-01 06:47:11', '2024-03-01 06:47:11'),
(47, 'Sweet Girl', 'Photograf today', 22, 8, 'mvMCP0t0wwGefVamuho9.jpg', NULL, NULL, 2, '0', '2024-03-01 06:47:52', '2024-03-01 06:47:52'),
(48, 'Pria', 'Pria tegas', 22, 8, 'B69XdiglmqJwZZPyIxCi.jpg', NULL, NULL, 2, '0', '2024-03-01 06:48:23', '2024-03-01 06:48:23'),
(49, 'Rabbit', 'cute rabbit', 22, 9, 'z3LRjtnJNWVq0taJyZS3.jpg', NULL, NULL, 2, '0', '2024-03-01 06:49:46', '2024-03-01 06:49:46'),
(50, 'Giraffe', 'Tall Giraffe', 22, 9, 'i3z9nlmkX4dJhaSZnSOX.jpg', NULL, 450000, 1, '0', '2024-03-01 06:50:23', '2024-03-01 06:50:23'),
(51, 'Panda', 'Eat with panda', 22, 9, 'k3yhCp81T6oP1fwyniUM.jpg', NULL, NULL, 2, '0', '2024-03-01 06:53:40', '2024-03-01 06:53:40');

INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `roles`, `rekenings`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Leilani Pouros DVM', 'elubowitz@example.net', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '515908693', '2024-02-28 15:02:33', '2024-02-28 15:02:33');
INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `roles`, `rekenings`, `created_at`, `updated_at`) VALUES
(2, 'Dr. Blake Ferry', 'mohr.amelia@example.org', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '165601046', '2024-02-28 15:02:33', '2024-02-28 15:02:33');
INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `roles`, `rekenings`, `created_at`, `updated_at`) VALUES
(3, 'Gerry Marvin', 'lucie.feil@example.net', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '202759080', '2024-02-28 15:02:33', '2024-02-28 15:02:33');
INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `roles`, `rekenings`, `created_at`, `updated_at`) VALUES
(4, 'Dr. Walter Kunze I', 'lindgren.anabel@example.net', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '765189416', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(5, 'Prof. Georgianna O\'Reilly V', 'brendon83@example.net', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '683197318', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(6, 'Jackie Schneider Sr.', 'talia29@example.com', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '554721930', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(7, 'Camila Cassin', 'dbotsford@example.org', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '302882932', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(8, 'Kiarra Rippin', 'stehr.ana@example.com', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '862077862', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(9, 'Ethelyn Nienow', 'tparker@example.net', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '372918085', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(10, 'Julianne Romaguera', 'anabelle75@example.com', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '546323845', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(11, 'Augusta Greenholt', 'araceli.bergnaum@example.net', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '731201169', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(12, 'Dr. Willy Hyatt II', 'lilliana57@example.net', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '654996903', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(13, 'Dr. Mireille Kihn MD', 'fpredovic@example.com', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '380020045', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(14, 'Fausto Wyman', 'kian.cormier@example.com', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '477175296', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(15, 'Kari Rohan', 'lydia.willms@example.com', '$2y$12$4nrF6er2SbZ61kFeTjw.0OZoC.NkE8f9NyWUHJf0pb27.LVRo6DPq', 2, '146349016', '2024-02-28 15:02:33', '2024-02-28 15:02:33'),
(16, 'uhuy', 'uhuy@gmail.com', '$2y$12$rzh2dwwauP.RBDZRRhTWrOcgzcDerZm2gK9q/w1VHLfagqO5K5/rm', 2, '0182308120238120', '2024-02-28 15:04:11', '2024-02-28 15:04:11'),
(17, 'judah', 'judah@gmail.com', '$2y$12$lrzPCy0drodpb84k1IPr1uuTCXxNvmxFAeWP50tO8N.GeuHLD7bhm', 2, '0182308120238120', '2024-02-28 15:04:11', '2024-02-28 15:04:11'),
(18, 'zazai', 'zazai@gmail.com', '$2y$12$rmEnE.CFzdgcwZ5ozMfwOeyTRv.VWCK8xR5qXXtMhTFhrOhR.vQKq', 1, '0182308120238120', '2024-02-28 15:04:11', '2024-02-28 15:04:11'),
(19, 'bencong', 'bencong@gmail.com', '$2y$12$b6ca2dx2aH4jSldTildJkOWVr1naspFre8GK5giH8Q8rWQ1QpKcUO', 2, NULL, '2024-03-01 03:33:57', '2024-03-01 03:33:57'),
(20, 'damai', 'damai@gmail.com', '$2y$12$tFS46xYGbXAigniQmNa/gemwGYUeJJOLtwpMaJOb7P9wLxJLm6K62', 2, NULL, '2024-03-01 06:09:31', '2024-03-01 06:09:31'),
(21, 'fahmi', 'fahmi@gmail.com', '$2y$12$MTw46RkDV8mHBaSuSCptpu1d9icTdsl5KCPyFZ3DXouD6UfDUUNaW', 2, NULL, '2024-03-01 06:30:43', '2024-03-01 06:30:43'),
(22, 'jasmin', 'jasmin@gmail.com', '$2y$12$/e3FcHSEm9cq2xnzkJqppuGII8YK/51aarMc7gKL5ilE75gikWlpa', 2, NULL, '2024-03-01 06:39:48', '2024-03-01 06:39:48');




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;