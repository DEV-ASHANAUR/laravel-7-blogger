-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table blogger.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `email`, `username`, `image`, `phone`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Supper Admin', 'superadmin@gmail.com', 'superadmin', '60570f100b7e3.jpg', '01866936562', 1, NULL, '$2y$10$eFUPmCHNu9BdPqEDDZ5snu.Cv/5jySPc90Fyj894fH3SAlf2qqnvK', 'NOR9eQCw3stlCjXyAxOvjNielPdxb3CxlN3s4RM5B4GGUB051hsq3tTNy9Sc', '2021-03-21 09:16:32', '2021-04-05 18:34:36'),
	(2, 'admin', 'admin@gmail.com', 'admin', NULL, NULL, 1, NULL, '$2y$10$akIOBs5ZuxmCB81PXGmDmeR9R3/6osSgpsy3HRMleawgqKVz3l2cW', 'yorojxujeujVHycD48OePimB4osy0i3guhrSVyEj4rAkfLDgfkZKNpL5u91M', '2021-03-27 15:42:11', '2021-03-27 15:42:11');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table blogger.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.categories: ~8 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'HTML', 'html', 'html', 'html6058d2e526eb4.png', '2021-03-22 17:24:55', '2021-03-22 17:24:55'),
	(2, 'CSS', 'css', 'css', 'css6058d2fb8ffc0.png', '2021-03-22 17:25:15', '2021-03-22 17:25:15'),
	(3, 'Javascript', 'javascript', 'javascript', 'javascript6058d30d37079.png', '2021-03-22 17:25:33', '2021-03-22 17:25:33'),
	(4, 'GIS and Remote Sensing', 'gis-and-remote-sensing', 'gis', 'gis-and-remote-sensing6058d320d7588.png', '2021-03-22 17:25:53', '2021-03-22 17:25:53'),
	(5, 'Data Base', 'data-base', 'mysql', 'data-base6058d34de364e.png', '2021-03-22 17:26:38', '2021-03-22 17:26:38'),
	(6, 'Arduino', 'arduino', 'arduino', 'arduino6058d38f603f4.png', '2021-03-22 17:27:43', '2021-03-22 17:27:43'),
	(7, 'Web Mapping', 'web-mapping', 'webmapping', 'web-mapping6058d3a055d6e.png', '2021-03-22 17:28:00', '2021-03-22 17:28:00'),
	(8, 'Web Designe', 'web-designe', 'webdesigne', 'web-designe6058d3b03df8a.png', '2021-03-22 17:28:16', '2021-03-22 17:28:16');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table blogger.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.comments: ~7 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `post_id`, `user_id`, `admin_id`, `comment`, `created_at`, `updated_at`) VALUES
	(3, 8, NULL, 1, 'comment from super admin', '2021-03-28 05:41:55', '2021-03-28 05:41:55'),
	(4, 8, NULL, 1, '😀😀', '2021-03-28 06:45:24', '2021-03-28 06:45:24'),
	(5, 8, NULL, 1, '🙈🙈 wow', '2021-03-28 06:46:46', '2021-03-28 06:46:46'),
	(6, 8, NULL, 1, 'hello', '2021-03-28 10:37:25', '2021-03-28 10:37:25'),
	(7, 5, NULL, 1, 'i also love nature😍', '2021-03-29 09:10:28', '2021-03-29 09:10:28'),
	(8, 9, NULL, 1, 'alhamdulilah😍', '2021-03-29 13:44:03', '2021-03-29 13:44:03'),
	(9, 7, NULL, 1, 'nice😍', '2021-03-30 05:07:14', '2021-03-30 05:07:14');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table blogger.comment_replies
CREATE TABLE IF NOT EXISTS `comment_replies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.comment_replies: ~3 rows (approximately)
/*!40000 ALTER TABLE `comment_replies` DISABLE KEYS */;
INSERT INTO `comment_replies` (`id`, `comment_id`, `user_id`, `admin_id`, `reply`, `created_at`, `updated_at`) VALUES
	(4, 3, NULL, 1, '@Supper Admin hmm tai', '2021-03-28 16:24:42', '2021-03-28 16:24:42'),
	(5, 7, NULL, 1, '@Supper Admin tnx', '2021-03-29 09:11:23', '2021-03-29 09:11:23'),
	(6, 8, NULL, 1, '@Supper Admin yes', '2021-03-29 13:44:19', '2021-03-29 13:44:19'),
	(7, 9, 1, NULL, '@Supper Admin tnx', '2021-03-30 05:08:16', '2021-03-30 05:08:16');
/*!40000 ALTER TABLE `comment_replies` ENABLE KEYS */;

-- Dumping structure for table blogger.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table blogger.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_03_04_092744_create_permission_tables', 1),
	(5, '2021_03_17_152415_create_admins_table', 1),
	(6, '2021_03_20_064712_create_categories_table', 1),
	(7, '2021_03_20_134017_create_posts_table', 1),
	(8, '2021_03_20_171926_create_tags_table', 1),
	(9, '2021_03_28_041607_create_comments_table', 2),
	(10, '2021_03_28_092434_create_comment_replies_table', 3),
	(11, '2021_03_29_091326_create_post_user_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table blogger.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table blogger.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.model_has_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\Admin', 1),
	(2, 'App\\Models\\Admin', 2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table blogger.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table blogger.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.permissions: ~29 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
	(1, 'dashboard.view', 'admin', 'dashboard', '2021-03-21 09:16:27', '2021-03-21 09:16:27'),
	(2, 'dashboard.edit', 'admin', 'dashboard', '2021-03-21 09:16:28', '2021-03-21 09:16:28'),
	(3, 'blog.create', 'admin', 'blog', '2021-03-21 09:16:28', '2021-03-21 09:16:28'),
	(4, 'blog.view', 'admin', 'blog', '2021-03-21 09:16:28', '2021-03-21 09:16:28'),
	(5, 'blog.edit', 'admin', 'blog', '2021-03-21 09:16:28', '2021-03-21 09:16:28'),
	(6, 'blog.delete', 'admin', 'blog', '2021-03-21 09:16:28', '2021-03-21 09:16:28'),
	(7, 'blog.approve', 'admin', 'blog', '2021-03-21 09:16:28', '2021-03-21 09:16:28'),
	(8, 'admin.create', 'admin', 'admin', '2021-03-21 09:16:29', '2021-03-21 09:16:29'),
	(9, 'admin.view', 'admin', 'admin', '2021-03-21 09:16:29', '2021-03-21 09:16:29'),
	(10, 'admin.edit', 'admin', 'admin', '2021-03-21 09:16:29', '2021-03-21 09:16:29'),
	(11, 'admin.delete', 'admin', 'admin', '2021-03-21 09:16:29', '2021-03-21 09:16:29'),
	(12, 'admin.approve', 'admin', 'admin', '2021-03-21 09:16:29', '2021-03-21 09:16:29'),
	(13, 'role.create', 'admin', 'role', '2021-03-21 09:16:29', '2021-03-21 09:16:29'),
	(14, 'role.view', 'admin', 'role', '2021-03-21 09:16:30', '2021-03-21 09:16:30'),
	(15, 'role.edit', 'admin', 'role', '2021-03-21 09:16:30', '2021-03-21 09:16:30'),
	(16, 'role.delete', 'admin', 'role', '2021-03-21 09:16:30', '2021-03-21 09:16:30'),
	(17, 'role.approve', 'admin', 'role', '2021-03-21 09:16:30', '2021-03-21 09:16:30'),
	(18, 'profile.view', 'admin', 'profile', '2021-03-21 09:16:30', '2021-03-21 09:16:30'),
	(19, 'profile.edit', 'admin', 'profile', '2021-03-21 09:16:30', '2021-03-21 09:16:30'),
	(20, 'category.create', 'admin', 'category', '2021-03-21 09:16:30', '2021-03-21 09:16:30'),
	(21, 'category.view', 'admin', 'category', '2021-03-21 09:16:31', '2021-03-21 09:16:31'),
	(22, 'category.edit', 'admin', 'category', '2021-03-21 09:16:31', '2021-03-21 09:16:31'),
	(23, 'category.delete', 'admin', 'category', '2021-03-21 09:16:31', '2021-03-21 09:16:31'),
	(24, 'category.approve', 'admin', 'category', '2021-03-21 09:16:31', '2021-03-21 09:16:31'),
	(25, 'post.create', 'admin', 'post', '2021-03-21 09:16:31', '2021-03-21 09:16:31'),
	(26, 'post.view', 'admin', 'post', '2021-03-21 09:16:32', '2021-03-21 09:16:32'),
	(27, 'post.edit', 'admin', 'post', '2021-03-21 09:16:32', '2021-03-21 09:16:32'),
	(28, 'post.delete', 'admin', 'post', '2021-03-21 09:16:32', '2021-03-21 09:16:32'),
	(29, 'post.approve', 'admin', 'post', '2021-03-21 09:16:32', '2021-03-21 09:16:32');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table blogger.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.posts: ~9 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `admin_id`, `user_id`, `category_id`, `title`, `slug`, `image`, `body`, `view_count`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, 3, 'Learning Is My Pashion,', 'learning-is-my-pashion,', 'learning-is-my-pashion,60578195173d8.jpg', '<p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p><blockquote style="box-sizing: inherit; margin-top: 1.25em; margin-bottom: 1.25em; font-size: 16px; font-style: italic; padding: 2.25em 40px; line-height: 1.45; color: rgb(119, 119, 119); border-left: 5px solid rgb(196, 58, 254); background-color: rgb(249, 249, 255); font-family: poppins, sans-serif;">Ea possunt paria non esse. Pudebit te, inquam, illius tabulae, quam Cleanthes sane commode verbis depingere solebat. Urgent tamen et nihil remittunt. An vero displicuit ea, quae tributa est animi virtutibus tanta praestantia? Sint ista Graecorum; Cur igitur, cum de re conveniat, non malumus usitate loqui? Huius ego nunc auctoritatem sequens idem faciam.<cite style="box-sizing: inherit; font-size: 14px; display: block; margin-top: 5px;">Wise Man</cite></blockquote><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>', 0, 1, '2021-03-21 09:37:51', '2021-03-21 17:25:42'),
	(2, 1, NULL, 1, 'Addiction When Gambling Becomes A Problem', 'addiction-when-gambling-becomes-a-problem', 'addiction-when-gambling-becomes-a-problem6057812d319a8.jpg', '<p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p><blockquote style="box-sizing: inherit; margin-top: 1.25em; margin-bottom: 1.25em; font-size: 16px; font-style: italic; padding: 2.25em 40px; line-height: 1.45; color: rgb(119, 119, 119); border-left: 5px solid rgb(196, 58, 254); background-color: rgb(249, 249, 255); font-family: poppins, sans-serif;">Ea possunt paria non esse. Pudebit te, inquam, illius tabulae, quam Cleanthes sane commode verbis depingere solebat. Urgent tamen et nihil remittunt. An vero displicuit ea, quae tributa est animi virtutibus tanta praestantia? Sint ista Graecorum; Cur igitur, cum de re conveniat, non malumus usitate loqui? Huius ego nunc auctoritatem sequens idem faciam.<cite style="box-sizing: inherit; font-size: 14px; display: block; margin-top: 5px;">Wise Man</cite></blockquote><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>', 1, 1, '2021-03-21 17:15:24', '2021-04-11 09:26:52'),
	(4, 1, NULL, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.', 'contrary-to-popular-belief,-lorem-ipsum-is-not-simply-random-text.-it-has-roots-in-a-piece-of-classical-latin-literature.', 'contrary-to-popular-belief,-lorem-ipsum-is-not-simply-random-text.-it-has-roots-in-a-piece-of-classical-latin-literature.6057825230780.jpg', '<p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p><blockquote style="box-sizing: inherit; margin-top: 1.25em; margin-bottom: 1.25em; font-size: 16px; font-style: italic; padding: 2.25em 40px; line-height: 1.45; color: rgb(119, 119, 119); border-left: 5px solid rgb(196, 58, 254); background-color: rgb(249, 249, 255); font-family: poppins, sans-serif;">Ea possunt paria non esse. Pudebit te, inquam, illius tabulae, quam Cleanthes sane commode verbis depingere solebat. Urgent tamen et nihil remittunt. An vero displicuit ea, quae tributa est animi virtutibus tanta praestantia? Sint ista Graecorum; Cur igitur, cum de re conveniat, non malumus usitate loqui? Huius ego nunc auctoritatem sequens idem faciam.<cite style="box-sizing: inherit; font-size: 14px; display: block; margin-top: 5px;">Wise Man</cite></blockquote><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>', 0, 1, '2021-03-21 17:28:53', '2021-03-21 17:28:53'),
	(5, 1, NULL, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.', 'there-are-many-variations-of-passages-of-lorem-ipsum-available,-but-the-majority-have-suffered-alteration-in-some-form.', 'there-are-many-variations-of-passages-of-lorem-ipsum-available,-but-the-majority-have-suffered-alteration-in-some-form.60578846306c2.jpg', '<p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p><blockquote style="box-sizing: inherit; margin-top: 1.25em; margin-bottom: 1.25em; font-size: 16px; font-style: italic; padding: 2.25em 40px; line-height: 1.45; color: rgb(119, 119, 119); border-left: 5px solid rgb(196, 58, 254); background-color: rgb(249, 249, 255); font-family: poppins, sans-serif;">Ea possunt paria non esse. Pudebit te, inquam, illius tabulae, quam Cleanthes sane commode verbis depingere solebat. Urgent tamen et nihil remittunt. An vero displicuit ea, quae tributa est animi virtutibus tanta praestantia? Sint ista Graecorum; Cur igitur, cum de re conveniat, non malumus usitate loqui? Huius ego nunc auctoritatem sequens idem faciam.<cite style="box-sizing: inherit; font-size: 14px; display: block; margin-top: 5px;">Wise Man</cite></blockquote><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>', 1, 1, '2021-03-21 17:30:19', '2021-03-30 06:38:35'),
	(6, 1, NULL, 3, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced.', 'the-standard-chunk-of-lorem-ipsum-used-since-the-1500s-is-reproduced.', 'the-standard-chunk-of-lorem-ipsum-used-since-the-1500s-is-reproduced.605782f87b470.jpg', '<p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p><blockquote style="box-sizing: inherit; margin-top: 1.25em; margin-bottom: 1.25em; font-size: 16px; font-style: italic; padding: 2.25em 40px; line-height: 1.45; color: rgb(119, 119, 119); border-left: 5px solid rgb(196, 58, 254); background-color: rgb(249, 249, 255); font-family: poppins, sans-serif;">Ea possunt paria non esse. Pudebit te, inquam, illius tabulae, quam Cleanthes sane commode verbis depingere solebat. Urgent tamen et nihil remittunt. An vero displicuit ea, quae tributa est animi virtutibus tanta praestantia? Sint ista Graecorum; Cur igitur, cum de re conveniat, non malumus usitate loqui? Huius ego nunc auctoritatem sequens idem faciam.<cite style="box-sizing: inherit; font-size: 14px; display: block; margin-top: 5px;">Wise Man</cite></blockquote><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>', 1, 1, '2021-03-21 17:31:37', '2021-03-30 06:37:22'),
	(7, 1, NULL, 4, 'The standard value of Lorem Ipsum used since the 1500s is reproduced', 'the-standard-value-of-lorem-ipsum-used-since-the-1500s-is-reproduced', 'the-standard-value-of-lorem-ipsum-used-since-the-1500s-is-reproduced6057833d1db6c.jpg', '<p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p><blockquote style="box-sizing: inherit; margin-top: 1.25em; margin-bottom: 1.25em; font-size: 16px; font-style: italic; padding: 2.25em 40px; line-height: 1.45; color: rgb(119, 119, 119); border-left: 5px solid rgb(196, 58, 254); background-color: rgb(249, 249, 255); font-family: poppins, sans-serif;">Ea possunt paria non esse. Pudebit te, inquam, illius tabulae, quam Cleanthes sane commode verbis depingere solebat. Urgent tamen et nihil remittunt. An vero displicuit ea, quae tributa est animi virtutibus tanta praestantia? Sint ista Graecorum; Cur igitur, cum de re conveniat, non malumus usitate loqui? Huius ego nunc auctoritatem sequens idem faciam.<cite style="box-sizing: inherit; font-size: 14px; display: block; margin-top: 5px;">Wise Man</cite></blockquote><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>', 2, 1, '2021-03-21 17:32:49', '2021-03-30 06:39:12'),
	(8, 1, NULL, 7, 'The standard Lorem Ipsum passage, used since the 1500s value.', 'the-standard-lorem-ipsum-passage,-used-since-the-1500s-value.', 'the-standard-lorem-ipsum-passage,-used-since-the-1500s-value.605783ad4e90b.jpg', '<p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p><blockquote style="box-sizing: inherit; margin-top: 1.25em; margin-bottom: 1.25em; font-size: 16px; font-style: italic; padding: 2.25em 40px; line-height: 1.45; color: rgb(119, 119, 119); border-left: 5px solid rgb(196, 58, 254); background-color: rgb(249, 249, 255); font-family: poppins, sans-serif;">Ea possunt paria non esse. Pudebit te, inquam, illius tabulae, quam Cleanthes sane commode verbis depingere solebat. Urgent tamen et nihil remittunt. An vero displicuit ea, quae tributa est animi virtutibus tanta praestantia? Sint ista Graecorum; Cur igitur, cum de re conveniat, non malumus usitate loqui? Huius ego nunc auctoritatem sequens idem faciam.<cite style="box-sizing: inherit; font-size: 14px; display: block; margin-top: 5px;">Wise Man</cite></blockquote><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-family: poppins, sans-serif; font-size: 14px;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>', 3, 1, '2021-03-21 17:34:40', '2021-04-11 08:43:25'),
	(9, NULL, 1, 3, 'The standard Lorem Ipsum relation, used since the 1500s value.', 'the-standard-lorem-ipsum-relation,-used-since-the-1500s-value.', 'check-relation-work-or-not605863270485c.jpg', '<p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-size: 14px; font-family: poppins, sans-serif;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-size: 14px; font-family: poppins, sans-serif;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p><blockquote style="box-sizing: inherit; margin-top: 1.25em; margin-bottom: 1.25em; font-size: 16px; font-style: italic; padding: 2.25em 40px; line-height: 1.45; color: rgb(119, 119, 119); border-left: 5px solid rgb(196, 58, 254); background-color: rgb(249, 249, 255); font-family: poppins, sans-serif;">Ea possunt paria non esse. Pudebit te, inquam, illius tabulae, quam Cleanthes sane commode verbis depingere solebat. Urgent tamen et nihil remittunt. An vero displicuit ea, quae tributa est animi virtutibus tanta praestantia? Sint ista Graecorum; Cur igitur, cum de re conveniat, non malumus usitate loqui? Huius ego nunc auctoritatem sequens idem faciam.<cite style="box-sizing: inherit; font-size: 14px; display: block; margin-top: 5px;">Wise Man</cite></blockquote><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-size: 14px; font-family: poppins, sans-serif;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p><p style="box-sizing: inherit; margin-bottom: 1rem; color: rgb(119, 119, 119); font-size: 14px; font-family: poppins, sans-serif;">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.</p>', 3, 1, '2021-03-22 09:28:13', '2021-04-12 03:32:40'),
	(10, NULL, 1, 6, 'Test Post For User edit', 'test-post-for-user-edit', 'test-post-for-user606b435808235.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos dolorem ad est sit impedit optio omnis, repellendus voluptatibus repudiandae adipisci tempore tenetur, fuga corrupti? Suscipit consequatur amet consectetur mollitia edit', 0, 0, '2021-04-05 17:05:40', '2021-04-05 17:24:31');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table blogger.post_user
CREATE TABLE IF NOT EXISTS `post_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_user_post_id_foreign` (`post_id`),
  KEY `post_user_user_id_foreign` (`user_id`),
  CONSTRAINT `post_user_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.post_user: ~5 rows (approximately)
/*!40000 ALTER TABLE `post_user` DISABLE KEYS */;
INSERT INTO `post_user` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
	(5, 1, 5, '2021-03-29 13:42:13', '2021-03-29 13:42:13'),
	(8, 1, 8, '2021-03-29 13:54:00', '2021-03-29 13:54:00'),
	(9, 1, 7, '2021-03-30 05:06:57', '2021-03-30 05:06:57'),
	(10, 1, 9, '2021-03-30 05:45:59', '2021-03-30 05:45:59'),
	(11, 2, 7, '2021-03-30 06:36:56', '2021-03-30 06:36:56'),
	(13, 2, 6, '2021-03-30 06:40:26', '2021-03-30 06:40:26');
/*!40000 ALTER TABLE `post_user` ENABLE KEYS */;

-- Dumping structure for table blogger.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'admin', '2021-03-21 09:16:27', '2021-03-21 09:16:27'),
	(2, 'admin', 'admin', '2021-03-21 09:16:27', '2021-03-21 09:16:27'),
	(3, 'editor', 'admin', '2021-03-21 09:16:27', '2021-03-21 09:16:27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table blogger.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.role_has_permissions: ~42 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(1, 2),
	(2, 1),
	(2, 2),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(14, 2),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(20, 2),
	(21, 1),
	(21, 2),
	(22, 1),
	(22, 2),
	(23, 1),
	(23, 2),
	(24, 1),
	(24, 2),
	(25, 1),
	(25, 2),
	(26, 1),
	(26, 2),
	(27, 1),
	(27, 2),
	(28, 1),
	(28, 2),
	(29, 1),
	(29, 2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table blogger.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `postID` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_postid_foreign` (`postID`),
  CONSTRAINT `tags_postid_foreign` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.tags: ~16 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `postID`, `name`) VALUES
	(11, 2, 'simple'),
	(12, 2, 'act'),
	(13, 1, 'coding'),
	(14, 1, 'learning'),
	(17, 4, 'tech'),
	(18, 4, 'science'),
	(21, 6, 'reading'),
	(22, 6, 'book'),
	(23, 7, 'Lorem'),
	(24, 7, 'fashion'),
	(25, 8, 'web'),
	(26, 8, 'address'),
	(29, 5, 'food'),
	(30, 5, 'nature'),
	(35, 10, 'test'),
	(36, 10, 'hello'),
	(37, 9, 'check');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Dumping structure for table blogger.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table blogger.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `image`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Md.Ashanaur Rahman', 'ashanour009@gmail.com', '606b59a1d7d7a.jpg', '01866936562', NULL, '$2y$10$VTCtIHJ6UBVa50OlnSutXe.ievKM7qLjStfrPi9U8KdNSLzRT3rhe', '8d7xEGC6lTjXopOAWZWGxYKryW19bFqk9dBtaPMkQO8DBkRdbf4G9jveUWsl', '2021-03-22 09:25:11', '2021-04-05 18:40:40'),
	(2, 'Nasim', 'nasim009@gmail.com', NULL, NULL, NULL, '$2y$10$Iz0S/DxZtSSAhJs5m3Znk.zV40V37sNjRhDWrRygpcaVtCVfojCcu', NULL, '2021-03-30 06:36:28', '2021-03-30 06:36:28'),
	(3, 'sujon', 'sujon@gmail.com', NULL, NULL, NULL, '$2y$10$r9ypzYBOxXgWphYOebaJBudUDpNwbPQXj6uZKMyMpzWm0W/DRM15S', NULL, '2021-04-04 09:59:04', '2021-04-04 09:59:04'),
	(4, 'Md. Ashanaur Rahman', 'devashanaur009@gmail.com', '6072d233ef51b.jpg', '01866936562', NULL, '$2y$10$Uz2EsOZVCW298.eOBQrI8e2Dw5oLBNrhQYJOVE9NY3dK2u9gNM2sK', 'TZv9xeQPekZdf0HYTxxXvU35ZHKOGuTh43k2kyHORPFfGuWQ4kKeYUiGBvc2', '2021-04-11 10:36:35', '2021-04-11 10:40:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
