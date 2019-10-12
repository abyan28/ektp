/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.20-log : Database - ektp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ektp` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ektp`;

/*Table structure for table `alats` */

CREATE TABLE `alats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruang_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `proxy_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proxy_pass` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alats_ruang_id_foreign` (`ruang_id`),
  CONSTRAINT `alats_ruang_id_foreign` FOREIGN KEY (`ruang_id`) REFERENCES `ruangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `alats` */

insert  into `alats`(`id`,`nama`,`ruang_id`,`created_at`,`updated_at`,`proxy_user`,`proxy_pass`,`mode`) values 
(1,'JusTap1',1,'2019-08-29 03:03:39','2019-10-12 07:44:44','ITS-558353-87d1f','cb98b','gembok');

/*Table structure for table `kartus` */

CREATE TABLE `kartus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pengguna_id` bigint(20) unsigned NOT NULL,
  `uid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kartus_uid_unique` (`uid`),
  KEY `kartus_pengguna_id_foreign` (`pengguna_id`),
  CONSTRAINT `kartus_pengguna_id_foreign` FOREIGN KEY (`pengguna_id`) REFERENCES `penggunas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kartus` */

insert  into `kartus`(`id`,`pengguna_id`,`uid`,`tipe`,`created_at`,`updated_at`) values 
(4,3,'042a3cfa122c80','KTP','2019-09-26 09:43:33','2019-10-11 01:33:11'),
(5,4,'990c4e98','KTP','2019-10-12 07:29:39','2019-10-12 07:29:39');

/*Table structure for table `logs` */

CREATE TABLE `logs` (
  `uid_kartu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kartu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `logs` */

insert  into `logs`(`uid_kartu`,`nama`,`tipe_kartu`,`ruangan`,`hasil`,`created_at`,`updated_at`) values 
('def','test','KTM','LAB MI',2,'2019-09-09 03:54:37','2019-09-09 03:54:37'),
('abc','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-09 03:54:38','2019-09-09 03:54:38'),
('abc','test','KTM','LAB MI',2,'2019-09-09 03:57:44','2019-09-09 03:57:44'),
('abc','test','KTM','LAB MI',1,'2019-09-09 03:57:52','2019-09-09 03:57:52'),
('abc','test','KTM','LAB MI',1,'2019-09-09 03:58:19','2019-09-09 03:58:19'),
('deg','test','KTM','LAB MI',2,'2019-09-09 03:58:24','2019-09-09 03:58:24'),
('deg','test','KTM','LAB MI',1,'2019-09-09 03:58:27','2019-09-09 03:58:27'),
('deg','test','KTM','LAB MI',1,'2019-09-09 03:58:29','2019-09-09 03:58:29'),
('deg','test','KTM','LAB MI',1,'2019-09-09 03:58:59','2019-09-09 03:58:59'),
('deg','test','KTM','LAB MI',0,'2019-09-09 04:00:23','2019-09-09 04:00:23'),
('abc','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:04:20','2019-09-16 11:04:20'),
('abc','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:04:20','2019-09-16 11:04:20'),
('abc','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:04:33','2019-09-16 11:04:33'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:05:33','2019-09-16 11:05:33'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:05:38','2019-09-16 11:05:38'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:05:43','2019-09-16 11:05:43'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:05:48','2019-09-16 11:05:48'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:05:52','2019-09-16 11:05:52'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:07:37','2019-09-16 11:07:37'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:07:42','2019-09-16 11:07:42'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:07:47','2019-09-16 11:07:47'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:07:52','2019-09-16 11:07:52'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:07:57','2019-09-16 11:07:57'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:08:02','2019-09-16 11:08:02'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:08:07','2019-09-16 11:08:07'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:08:12','2019-09-16 11:08:12'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:08:17','2019-09-16 11:08:17'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:08:22','2019-09-16 11:08:22'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:09:18','2019-09-16 11:09:18'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:09:23','2019-09-16 11:09:23'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:09:28','2019-09-16 11:09:28'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:09:33','2019-09-16 11:09:33'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:09:38','2019-09-16 11:09:38'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:09:43','2019-09-16 11:09:43'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:09:49','2019-09-16 11:09:49'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:09:53','2019-09-16 11:09:53'),
('042a3cfa122c80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:12:55','2019-09-16 11:12:55'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:13:01','2019-09-16 11:13:01'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:28:34','2019-09-16 11:28:34'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:29:52','2019-09-16 11:29:52'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:30:13','2019-09-16 11:30:13'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:30:31','2019-09-16 11:30:31'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:30:45','2019-09-16 11:30:45'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-16 11:31:04','2019-09-16 11:31:04'),
('042a3cfa122c80','test','KTP','LAB MI',2,'2019-09-16 11:32:35','2019-09-16 11:32:35'),
('042a3cfa122c80','test','KTP','LAB MI',1,'2019-09-16 11:36:17','2019-09-16 11:36:17'),
('04915162112a80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-26 09:28:09','2019-09-26 09:28:09'),
('04915162112a80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-26 09:28:19','2019-09-26 09:28:19'),
('04915162112a80','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-26 09:28:48','2019-09-26 09:28:48'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',2,'2019-09-26 09:31:12','2019-09-26 09:31:12'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:31:18','2019-09-26 09:31:18'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:31:35','2019-09-26 09:31:35'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:31:58','2019-09-26 09:31:58'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:32:18','2019-09-26 09:32:18'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:32:48','2019-09-26 09:32:48'),
('8f4c6fdc','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-26 09:33:15','2019-09-26 09:33:15'),
('8f4c6fdc','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-09-26 09:33:23','2019-09-26 09:33:23'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:33:32','2019-09-26 09:33:32'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:33:49','2019-09-26 09:33:49'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:34:11','2019-09-26 09:34:11'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:34:32','2019-09-26 09:34:32'),
('042a3cfa122c80','Dhafa Hikmawan','KTP','LAB MI',1,'2019-09-26 09:34:49','2019-09-26 09:34:49'),
('04915162112a80','Muhammad Abyan Dzaka','KTP','LAB MI',2,'2019-09-26 09:43:33','2019-09-26 09:43:33'),
('04915162112a80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-09-26 09:45:27','2019-09-26 09:45:27'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',2,'2019-09-26 09:47:30','2019-09-26 09:47:30'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-09-26 09:47:56','2019-09-26 09:47:56'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-09-26 09:48:41','2019-09-26 09:48:41'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-09-26 09:50:11','2019-09-26 09:50:11'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-09-26 09:50:30','2019-09-26 09:50:30'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-09-26 09:51:14','2019-09-26 09:51:14'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-09-26 09:51:52','2019-09-26 09:51:52'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-09-26 09:53:14','2019-09-26 09:53:14'),
('abc','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-10 23:38:32','2019-10-10 23:38:32'),
('abc','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-10 23:38:50','2019-10-10 23:38:50'),
('abc','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-10 23:39:58','2019-10-10 23:39:58'),
('abc','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-10 23:40:02','2019-10-10 23:40:02'),
('abc','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-10 23:40:32','2019-10-10 23:40:32'),
('abc','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-10 23:40:35','2019-10-10 23:40:35'),
('abc','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-10 23:41:30','2019-10-10 23:41:30'),
('def','Muhammad Abyan Dzaka','KTP','LAB MI',2,'2019-10-10 23:41:46','2019-10-10 23:41:46'),
('def','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-10 23:41:55','2019-10-10 23:41:55'),
('abc','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-10-11 00:54:50','2019-10-11 00:54:50'),
('def','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 00:54:54','2019-10-11 00:54:54'),
('def','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 01:21:06','2019-10-11 01:21:06'),
('def','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 01:21:48','2019-10-11 01:21:48'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',2,'2019-10-11 01:33:11','2019-10-11 01:33:11'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 01:33:17','2019-10-11 01:33:17'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 01:36:12','2019-10-11 01:36:12'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 01:36:40','2019-10-11 01:36:40'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-10-11 01:39:18','2019-10-11 01:39:18'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 01:39:22','2019-10-11 01:39:22'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 07:55:44','2019-10-11 07:55:44'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 08:21:29','2019-10-11 08:21:29'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 08:21:32','2019-10-11 08:21:32'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 09:37:45','2019-10-11 09:37:45'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 09:41:11','2019-10-11 09:41:11'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-11 22:44:33','2019-10-11 22:44:33'),
('def','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-10-12 07:03:06','2019-10-12 07:03:06'),
('def','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-10-12 07:03:43','2019-10-12 07:03:43'),
('8f8c1888','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-10-12 07:14:16','2019-10-12 07:14:16'),
('8f8c1888','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-10-12 07:14:19','2019-10-12 07:14:19'),
('990c4e98','Tak Dikenal','Tak Diketahui','LAB MI',0,'2019-10-12 07:14:57','2019-10-12 07:14:57'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-12 07:19:07','2019-10-12 07:19:07'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-12 07:19:18','2019-10-12 07:19:18'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-12 07:19:47','2019-10-12 07:19:47'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-12 07:22:11','2019-10-12 07:22:11'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-12 07:25:08','2019-10-12 07:25:08'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-12 07:25:51','2019-10-12 07:25:51'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-12 07:26:00','2019-10-12 07:26:00'),
('990c4e98','Dhafa Hikmawan','KTP','LAB MI',2,'2019-10-12 07:29:39','2019-10-12 07:29:39'),
('990c4e98','Dhafa Hikmawan','KTP','LAB MI',1,'2019-10-12 07:29:43','2019-10-12 07:29:43'),
('042a3cfa122c80','Muhammad Abyan Dzaka','KTP','LAB MI',1,'2019-10-12 07:43:43','2019-10-12 07:43:43');

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_07_01_042551_create_pengguna_table',1),
(4,'2019_08_14_082253_create_logs_table',1),
(5,'2019_08_28_072503_create_kartus_table',1),
(6,'2019_08_28_072647_create_ruangs_table',1),
(7,'2019_08_28_072853_create_pendaftarans_table',1),
(8,'2019_08_28_073123_create_pengguna_ruang_table',1),
(9,'2019_08_28_073124_create_alats_table',1),
(10,'2019_08_28_073330_add_constraint_pengguna_ruang_table',1),
(11,'2019_08_28_073348_add_constraint_kartus_table',1),
(12,'2019_08_28_074036_add_constraint_pendaftarans_table',1),
(13,'2019_08_28_075354_create_constraint_alats_table',1),
(15,'2019_09_03_074958_add_proxy_to_alat',2),
(17,'2019_10_10_041406_add_mode_to_alats',4),
(18,'2019_10_10_041314_create_transaksis_table',5),
(19,'2019_10_10_042104_add_constraints_to_transaksis',6);

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pendaftarans` */

CREATE TABLE `pendaftarans` (
  `uid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alat_id` bigint(20) unsigned NOT NULL,
  `pengguna_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `pendaftarans_pengguna_id_foreign` (`pengguna_id`),
  KEY `pendaftarans_alat_id_foreign` (`alat_id`),
  CONSTRAINT `pendaftarans_alat_id_foreign` FOREIGN KEY (`alat_id`) REFERENCES `alats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pendaftarans_pengguna_id_foreign` FOREIGN KEY (`pengguna_id`) REFERENCES `penggunas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pendaftarans` */

/*Table structure for table `pengguna_ruang` */

CREATE TABLE `pengguna_ruang` (
  `pengguna_id` bigint(20) unsigned NOT NULL,
  `ruang_id` bigint(20) unsigned NOT NULL,
  KEY `pengguna_ruang_pengguna_id_foreign` (`pengguna_id`),
  KEY `pengguna_ruang_ruang_id_foreign` (`ruang_id`),
  CONSTRAINT `pengguna_ruang_pengguna_id_foreign` FOREIGN KEY (`pengguna_id`) REFERENCES `penggunas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pengguna_ruang_ruang_id_foreign` FOREIGN KEY (`ruang_id`) REFERENCES `ruangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pengguna_ruang` */

insert  into `pengguna_ruang`(`pengguna_id`,`ruang_id`) values 
(3,1),
(4,1);

/*Table structure for table `penggunas` */

CREATE TABLE `penggunas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrp` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid_kartu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `penggunas_id_nik_unique` (`id_nik`),
  UNIQUE KEY `penggunas_nrp_unique` (`nrp`),
  UNIQUE KEY `penggunas_nohp_unique` (`nohp`),
  UNIQUE KEY `penggunas_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penggunas` */

insert  into `penggunas`(`id`,`id_nik`,`name`,`nrp`,`jenis_kelamin`,`alamat`,`nohp`,`email`,`password`,`uid_kartu`,`status`,`created_at`,`updated_at`) values 
(3,'3215053001980003','Muhammad Abyan Dzaka','05111640007003','Laki-Laki','Perumahan puri kosambi blok W-29, Duren, Klari, Karawang.','085881751588','abyan.dzaka.if.its@gmail.com','$2y$10$PJcr3VhRwVTve2BQnN38kO4kQq.Ha7odXSxg8qyDPxUjcBUp5eD7u',NULL,0,'2019-09-26 09:40:25','2019-09-26 09:40:25'),
(4,'3573011807990004','Dhafa Hikmawan','05111640000124','Laki-Laki','Jl. Simpang Asahan 5','085853891701','nawamkihafahd@gmail.com','$2y$10$8jnp.ZAWOPG5FrNWoSQ9vOdkcKADeYtuO6UPTXn0WXJOL.hVBRKGW',NULL,0,'2019-10-11 22:36:55','2019-10-11 22:36:55');

/*Table structure for table `ruangs` */

CREATE TABLE `ruangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ruangs_nama_unique` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ruangs` */

insert  into `ruangs`(`id`,`nama`,`created_at`,`updated_at`) values 
(1,'LAB MI','2019-08-29 03:03:39','2019-08-29 03:03:39');

/*Table structure for table `transaksis` */

CREATE TABLE `transaksis` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alat_id` bigint(20) unsigned NOT NULL,
  KEY `transaksis_alat_id_foreign` (`alat_id`),
  CONSTRAINT `transaksis_alat_id_foreign` FOREIGN KEY (`alat_id`) REFERENCES `alats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaksis` */

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','admin','admin@gmail.com',NULL,'$2y$10$uPMSf0UjKUyU8GI3sL.1aueCnjEYMgZdiR4vYXNW5peCJsgUiT8Yy',NULL,'2019-08-29 03:03:39','2019-08-29 03:03:39');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
