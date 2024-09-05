/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 8.0.30 : Database - weddingplanner
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`weddingplanner` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `weddingplanner`;

/*Table structure for table `caterings` */

DROP TABLE IF EXISTS `caterings`;

CREATE TABLE `caterings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `caterings` */

insert  into `caterings`(`id`,`title`,`description`,`price`,`created_at`,`updated_at`) values 
(2,'PAKEJ RUBY','**Menu Utama**\r\n• Nasi putih&Nasi Minyak\r\n• Ayam goreng berempah& Ayam masak merah\r\n• Daging Masak Hitam\r\n• Dalca sayur\r\n• Acar jelatah\r\n• Papadom\r\n› Buah oren\r\n• Minuman sejuk Sunquick&Sirap\r\n• Air mineral\r\n\r\n**Hidangan pengantin 3 jenis lauk**\r\n• Ayam golek 2 set\r\n• Ikan siakap 2 set\r\n• Udang 2 set\r\n• Buah buahan\r\n\r\n**1 set meja beradap (10 pax)**\r\n• Kek 2 tingkat\r\n• Meja kek\r\n• Pelayan berseragam\r\n• Meja buffet 2 set\r\n• 2 set meja Vip Dome stell\r\n• Hiasan meja beradap',10,'2024-01-07 18:19:55','2024-01-14 20:41:47'),
(4,'PAKEJ DIAMOND','Menu utama\r\n• Nasi putih&Nasi beriani\r\n• Ayam goreng berempah&Ayam Pasu\r\n• Daging kari\r\n• Sambal sotong\r\n• Dalca sayur\r\n• Acar jelatah\r\n• Papadom\r\n• Buah oren\r\n• Minuman sejuk Sunquick&Sirap\r\n• Air mineral\r\n\r\nHidangan pengantin 3 Jenis lauk\r\n• Ayam golek 2 set\r\n• Ikan siakap 2 set\r\n• Udang 2 set\r\n• Buah buahan\r\n\r\n1 set meja beradap (10pax)\r\n• Kek 3 tingkat\r\n• Meja kek\r\n• Pelayan berseragam\r\n• Meja buffet 2 set\r\n• 2 set meja Vip Dome stell\r\n• Hiasan meja beradap',13.8,'2024-01-07 18:27:25','2024-01-14 20:42:42'),
(5,'PAKEJ NILAM','Menu utama\r\n• Nasi putih & Nasi beriani\r\n• Ayam goreng berempah & Ayam pasu\r\n• Gulai kawah\r\n• Sambal sotong & Gulai nenas ikan masin\r\n• Acar jelatah\r\n• Papadom\r\n• Buah oren\r\n• Kuih 2 jenis\r\n• Minuman sejuk Anggur & Sirap\r\n• Air mineral\r\n• ABC corner &Ais cream\r\n\r\nHidangan pengantin 3 jenis lauk\r\n• Ayam golek 2 set\r\n• Ikan siakap 2 set\r\n• Udang 2 set\r\n• Buah buahan\r\n1 set meja beradap (10 pax)\r\n• Kek 3 tingkat\r\n• Meja kek\r\n• Pelayan berseragam\r\n• Meja buffet 2 set\r\n• 2 set meja Vip Dome stell\r\n• Hiasan meja beradap',16.8,'2024-01-07 18:27:35','2024-01-14 20:44:12');

/*Table structure for table `dates` */

DROP TABLE IF EXISTS `dates`;

CREATE TABLE `dates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dates_user_id_foreign` (`user_id`),
  CONSTRAINT `dates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `dates` */

insert  into `dates`(`id`,`date`,`user_id`,`created_at`,`updated_at`,`status`) values 
(135,'07-02-2024',87,'2024-01-31 12:49:09','2024-01-31 14:08:17','Confirmed'),
(136,'14-02-2024',15,'2024-01-31 13:54:58','2024-01-31 14:08:20','Rejected');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `invoice_items` */

DROP TABLE IF EXISTS `invoice_items`;

CREATE TABLE `invoice_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `invoice_id` int unsigned NOT NULL,
  `total_guests` int DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `selected_package_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_package_id_foreign` (`selected_package_id`),
  KEY `items_invoices_id_foreign` (`invoice_id`),
  CONSTRAINT `items_invoices_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `items_package_id_foreign` FOREIGN KEY (`selected_package_id`) REFERENCES `caterings` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `invoice_items` */

insert  into `invoice_items`(`id`,`title`,`price`,`invoice_id`,`total_guests`,`total_amount`,`selected_package_id`,`created_at`,`updated_at`) values 
(142,'PAKEJ RUBY',NULL,217,1000,10000.00,2,'2024-01-31 12:43:36','2024-01-31 12:43:36'),
(143,'Make Up Only',150.00,217,NULL,NULL,NULL,'2024-01-31 12:45:53','2024-01-31 12:45:53'),
(148,'Make Up Only',150.00,218,NULL,NULL,NULL,'2024-01-31 13:34:55','2024-01-31 13:34:55'),
(149,'Canopy',200.00,218,NULL,NULL,NULL,'2024-01-31 13:41:13','2024-01-31 13:41:13'),
(150,'Make Up Only',150.00,218,NULL,NULL,NULL,'2024-07-15 03:45:19','2024-07-15 03:45:19');

/*Table structure for table `invoices` */

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Not Yet Paid',
  `date_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_user_id_foreign` (`user_id`),
  KEY `invoices_date_id_foreign` (`date_id`),
  CONSTRAINT `invoices_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `dates` (`id`),
  CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `invoices` */

insert  into `invoices`(`id`,`user_id`,`created_at`,`updated_at`,`status`,`date_id`) values 
(217,87,'2024-01-31 12:43:36','2024-01-31 12:57:45','Completed',135),
(218,15,'2024-01-31 13:34:55','2024-01-31 13:54:58','Not Yet Paid',136);

/*Table structure for table `makeups` */

DROP TABLE IF EXISTS `makeups`;

CREATE TABLE `makeups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `makeups` */

insert  into `makeups`(`id`,`title`,`description`,`price`,`image`,`created_at`,`updated_at`) values 
(13,'Make Up Only','Included:\r\n- Light/Mid/Heavy Make Up\r\n- Touch Up',150.00,'images/makeups/4EkyukS5xSOYiVAeVD23qoiXl6o52DItEL5fm5Hp.jpg','2024-01-30 06:25:08','2024-01-30 06:25:08'),
(14,'Dresses Only','Included:\r\n- 2 Bride Dress\r\n- Dress Accessory',350.00,'images/makeups/roAWLjwBdRmGnOLOfailCxMS0oMvFHNlH6eOjkBs.jpg','2024-01-30 06:26:00','2024-01-30 06:26:00'),
(15,'Combo Bride Master','Included:\r\n- 3 Bride Dress\r\n- Dress Accessory\r\n- Light/Mid/Heavy Make Up\r\n- Touch Up',700.00,'images/makeups/EtpQlkPS9hSUqf1YVcNWXP6WB5pUfgRRrZ5aBHlL.jpg','2024-01-30 06:27:11','2024-01-30 16:58:53');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2014_10_12_100000_create_password_resets_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2023_12_11_152502_remove_age_column_from_table',2),
(7,'2023_12_30_121835_create_checklists_table',3),
(8,'2023_12_30_124327_alter_checklists_table_items_column',4),
(9,'2023_12_30_124417_alter_checklists_table_items_column',4),
(10,'2023_12_30_140724_create_checklists_table',5),
(11,'2023_12_30_152758_create_checklists_table',6),
(12,'2023_12_30_155434_create_checklists_table',7),
(13,'2023_12_30_170120_create_checklists_table',8),
(14,'2023_12_30_171058_create_checklists_table',9),
(15,'2023_12_30_171658_create_checklists_table',10),
(16,'2023_12_31_150835_create_todos_table',11),
(17,'2023_12_31_154828_create_guests_table',12),
(18,'2023_12_31_162306_create_relatives_table',13),
(19,'2023_12_31_162555_create_relative_table',14),
(20,'2024_01_07_163015_create_caterings_table',15),
(21,'2024_01_07_164602_create_add_on_table',15),
(22,'2024_01_07_204517_alter_column_in_checklists_table',16),
(23,'2024_01_07_211510_alter_column_in_todos_table',17),
(24,'2024_01_07_220440_create_guest_table',18),
(25,'2024_01_07_220458_add_foreign_column_in_guest_table',19),
(26,'2024_01_12_123821_create_dates_table',20),
(27,'2024_01_13_165435_create_table_makeups',21),
(28,'2024_01_13_190436_create_invoices_table',22),
(29,'2024_01_29_154600_alter_table_invoices',23);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

insert  into `password_reset_tokens`(`email`,`token`,`created_at`) values 
('dekmat@gmail.com','$2y$10$HPOi2CAzH2XmplDJZWzT7eatxeSmmtiKJpWgF64xDLBDuj2fSKzve','2024-01-29 11:04:53');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `services` */

insert  into `services`(`id`,`title`,`price`,`status`,`image`,`created_at`,`updated_at`) values 
(1,'Canopy',200,1,'images/services/6014U1WvHq6ElJRj0CNu4KXoK0TPirf1BHEkOJzm.jpg','2024-01-31 01:15:42','2024-01-31 01:15:42'),
(2,'PA System',300,1,'images/services/LCrcqCAkSWneEpRtb4UHvTa4kNcYIyiB1elCpCyl.jpg','2024-01-31 01:16:43','2024-01-31 01:16:59'),
(3,'Indoor Photographer',600,0,'images/services/kKaE8ybYJc7NTOZpTTg972ZIVpIdgL0vLzxfE5ze.jpg','2024-01-31 01:17:34','2024-01-31 14:16:24'),
(4,'Outdoor Photographer',800,1,'images/services/JKtTNoGaVMIbdXMDwZ2b9vSTRAIgr8aCYMUgkBGi.jpg','2024-01-31 01:18:01','2024-01-31 01:18:01');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`user_type`,`image`,`phone_number`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(11,'admin','admin@gmail.com','admin','images/users/P9cJPMqCfKJqtgHkRAYrflkPwyD2iEqbBKCDAsgA.jpg','011725140203','$2y$10$EDThsCSWEGUwHEUOsz2p9usTknceQTDFUpcNZRaQJSwUofXAENYVK',NULL,'2023-12-31 08:45:30','2024-01-13 18:54:17'),
(15,'DekmatPenyuGanu','dekmat@gmail.com','user','images/users/FoNHMRq5PZbSQQsaDKkGTSEPoBFTASj9betv1H1q.jpg','0198372527','$2y$10$VmwqQKnbKJfDt/NQDxR6zuj/h.SnAlQROlTmJPMlPjbjQMUfg03jq',NULL,'2024-01-06 22:59:32','2024-01-15 02:19:27'),
(87,'ismah','ismahismail111@gmail.com','user','images/users/n3NHa9qMRhQdtERYiJuhWwqGF505Iq7vyF3J3tvs.jpg','123','$2y$10$xN84G63AWvXLW4lShpzafeL1rIRBQkad52KVuG97/rkJLaEs9Dp5m','X0LoejEPEVioCRpjyTaw4fLKTr443KbNOLrMxbGhr2Rcv1CdLtDO1uSjjaUo','2024-01-29 11:05:57','2024-01-31 02:44:43'),
(91,'haha','haha@gmail.com','user',NULL,'123','$2y$10$xpzu0kbDS/AR1.QqZutrhOcysvi9ojxOM8c.zTpkjqIit6PwqsRsK',NULL,'2024-01-29 14:26:45','2024-01-29 14:26:45'),
(92,'hakim','hakimrasdi@gmail.com','user',NULL,'111','$2y$10$O7u5RGMdzMXLQM03kxLgr.Vnwyfx4EpnqXf15wGSBzTBIOsb.Qij6',NULL,'2024-01-30 09:56:20','2024-01-30 09:56:20'),
(93,'Tobek Ku','muhdzarif111@gmail.com','user',NULL,NULL,'$2y$10$4awQCr84R08rlqFbs/6OTengHZQNMCxZRaHqiv4hqI8hw0mUDGeN2','FVdWpvMcItpzGa42kDNCgB8J0W1yoOrYyxmzuS8xmRhNjrEtpwjy34TrPZgx','2024-01-30 13:12:30','2024-01-30 13:13:56'),
(95,'SosKicap','soskicap@gmail.com','user',NULL,'123','$2y$10$nRMJCTaCXYzDDjFoz44cHeHIEamRDmgGuc.dGeRJGyMgXMz/13aYm',NULL,'2024-01-30 20:58:55','2024-01-30 20:58:55'),
(96,'hakim dirahs','hakimrasdi47@gmail.com','user','images/users/ZqR6fLuBCMSMpYRHHvvdXPqg2tLAAdoCu7X8VFMp.jpg','0116063','$2y$10$.XK3pi5wKpSazw17EgXV4eB3KwwLnM6YMGbr6Zim/qdwANjiHHBVy',NULL,'2024-01-31 00:36:36','2024-01-31 00:37:55'),
(98,'hafiz','hafiz@gmail.com','user',NULL,'123','$2y$10$d9EJ.MURVCAHCYmTRwXYAO.xK3lPiWq7LrIADgU3fMcLkZaq/PuIa',NULL,'2024-01-31 02:41:36','2024-01-31 02:41:36'),
(99,'ikmal','ikmalfire@gmail.com','user',NULL,'123','$2y$10$gIbZk8/pmhBFbeUlZFC1CuwUgR21CyztdsKUZHatNuJ7jd4EQRIoa',NULL,'2024-01-31 02:43:01','2024-01-31 02:43:01'),
(100,'Ismah Haziq','ismahhaziq7@gmail.com','user',NULL,NULL,NULL,NULL,'2024-01-31 02:43:47','2024-01-31 02:43:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
