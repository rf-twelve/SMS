/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_sms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sms` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_sms`;

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `developer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

insert  into `companies`(`id`,`name`,`system`,`logo`,`bg_image`,`address`,`developer`,`created_at`,`updated_at`) values 
(1,'INFANT JESUS SCHOOL','Infant Jesus School Management System','ijs.png','ijs_building.png','KALIBO AKLAN',NULL,NULL,'2023-03-30 02:58:04');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `list_barangays` */

DROP TABLE IF EXISTS `list_barangays`;

CREATE TABLE `list_barangays` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municity_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urban_rural` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `population` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `list_barangays` */

/*Table structure for table `list_municities` */

DROP TABLE IF EXISTS `list_municities`;

CREATE TABLE `list_municities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `list_municities` */

/*Table structure for table `list_provinces` */

DROP TABLE IF EXISTS `list_provinces`;

CREATE TABLE `list_provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `list_provinces` */

/*Table structure for table `list_regions` */

DROP TABLE IF EXISTS `list_regions`;

CREATE TABLE `list_regions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `list_regions` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_12_09_190100_create_offices_table',1),
(6,'2022_12_16_120755_create_permission_tables',1),
(7,'2023_02_26_203422_create_list_barangays_table',1),
(8,'2023_02_26_203547_create_list_municities_table',1),
(9,'2023_02_26_203602_create_list_provinces_table',1),
(10,'2023_02_26_203617_create_list_regions_table',1),
(11,'2023_03_22_142551_create_companies_table',1),
(12,'2023_05_19_190425_create_students_table',1),
(14,'2023_05_21_075146_create_school_fees_table',2),
(15,'2023_05_21_151246_create_payment_records_table',3);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

/*Table structure for table `office_user` */

DROP TABLE IF EXISTS `office_user`;

CREATE TABLE `office_user` (
  `office_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `office_user_office_id_foreign` (`office_id`),
  KEY `office_user_user_id_foreign` (`user_id`),
  CONSTRAINT `office_user_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`),
  CONSTRAINT `office_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `office_user` */

/*Table structure for table `offices` */

DROP TABLE IF EXISTS `offices`;

CREATE TABLE `offices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `offices` */

insert  into `offices`(`id`,`code`,`name`,`created_at`,`updated_at`) values 
(1,'itss','Information Technology Services Section','2023-05-19 20:30:21','2023-05-19 20:30:21'),
(2,'omm','Office of Municipal Mayor','2023-05-19 20:30:21','2023-05-19 20:30:21');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `payment_records` */

DROP TABLE IF EXISTS `payment_records`;

CREATE TABLE `payment_records` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_of_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payment_records` */

insert  into `payment_records`(`id`,`student_id`,`date`,`amount`,`form_of_payment`,`created_at`,`updated_at`) values 
(1,'1','2023-05-21','3000','Cash','2023-05-21 19:53:17','2023-05-21 19:53:17'),
(2,'1','2023-05-21','100','Cash','2023-05-21 19:59:17','2023-05-21 19:59:17'),
(3,'1','2023-05-21','122','Cash','2023-05-21 19:59:56','2023-05-21 19:59:56'),
(4,'1','2023-05-21','50','Check','2023-05-21 20:00:58','2023-05-21 20:00:58'),
(5,'1','2023-05-21','20000','Cash','2023-05-21 20:03:09','2023-05-21 20:03:09'),
(6,'1','2023-05-21','100','Cash','2023-05-21 20:03:30','2023-05-21 20:03:30'),
(7,'1','2023-05-21','100','Cash','2023-05-21 20:05:55','2023-05-21 20:05:55'),
(8,'1','2023-05-21','1000','Cash','2023-05-21 20:10:57','2023-05-21 20:10:57'),
(9,'1','2023-05-21','5000','Check','2023-05-21 20:13:19','2023-05-21 20:13:19'),
(10,'1','2023-05-21','10','Cash','2023-05-21 20:27:21','2023-05-21 20:27:21'),
(11,'1','2023-05-21','100','Cash','2023-05-21 20:28:35','2023-05-21 20:28:35');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

/*Table structure for table `school_fees` */

DROP TABLE IF EXISTS `school_fees`;

CREATE TABLE `school_fees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g1` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g3` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g4` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g5` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g12` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `school_fees` */

insert  into `school_fees`(`id`,`name`,`k1`,`k2`,`g1`,`g2`,`g3`,`g4`,`g5`,`g6`,`g7`,`g8`,`g9`,`g10`,`g11`,`g12`,`created_at`,`updated_at`) values 
(1,'Tuition Fee','15500','15500','17500','17500','1','6','7',NULL,'19500','19500',NULL,NULL,'23000','23000',NULL,NULL),
(2,'Computer','1000','1000','1400','1400','1','6','7',NULL,'1500','1500',NULL,NULL,'1600','1600',NULL,NULL),
(3,'Internet','0','0','600','600','4','6','7',NULL,'600','600',NULL,NULL,'600','600',NULL,NULL),
(4,'Development Fee','750','750','750','750','1','6','7',NULL,'750','750',NULL,NULL,'750','750',NULL,NULL),
(5,'Registration','350','350','350','350','1','6','7',NULL,'350','350',NULL,NULL,'350','350',NULL,NULL),
(6,'E-Library(LMS)','150','150','300','300','1','6','7',NULL,'400','400',NULL,NULL,'450','450',NULL,NULL),
(7,'Science Lab','0','0','250','250','4','6','7',NULL,'450','450',NULL,NULL,'450','450',NULL,NULL),
(8,'Sports Development','0','0','100','100','1','6','7',NULL,'100','100',NULL,NULL,'100','100',NULL,NULL),
(9,'Isurance','60','60','60','60','1','6','7',NULL,'60','60',NULL,NULL,'60','60',NULL,NULL),
(10,'Medical/Dental','240','240','270','270','1','6','7',NULL,'270','270',NULL,NULL,'270','270',NULL,NULL),
(11,'Instructional Materials','950','950','760','760','1','6','7',NULL,'780','780',NULL,NULL,'780','780',NULL,NULL),
(12,'School Publication','240','240','250','250','1','6','7',NULL,'250','250',NULL,NULL,'250','250',NULL,NULL),
(13,'Guidance & Testing','100','100','300','300','1','6','7',NULL,'470','470',NULL,NULL,'480','480',NULL,NULL),
(14,'Capstone Project','0','0','2','0','1','6','7',NULL,'0','0',NULL,NULL,'450','450',NULL,NULL);

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lrn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `students` */

insert  into `students`(`id`,`first_name`,`middle_name`,`last_name`,`mobile_no`,`email`,`address`,`age`,`sex`,`religion`,`citizenship`,`birth_date`,`birth_place`,`lrn`,`grade_level`,`strand`,`section`,`user_id`,`status`,`image`,`created_at`,`updated_at`) values 
(1,'Lacy','Mara Allen','Blevins','89','xydabyqo@mailinator.com','Voluptate a impedit','91','31','Ratione deleniti sin','Perspiciatis et obc','2014-12-06','Perferendis cupidata','114850100036','g12','Commodi perspiciatis','Eum pariatur Velit',NULL,'Enrolled','o0jWRUryESYSeBIxOLKZioC6k3IKEPmv1ETfpkRP.jpg','2023-05-20 17:39:29','2023-05-21 07:44:03'),
(2,'Dawn','Theodore Cain','Tran','75','nilecyjox@mailinator.com','Excepturi sit doloru','5','54','Reprehenderit non e','Repellendus Quos cu','1998-07-05','Exercitationem beata','224850100036','g11','Hic corporis est ab ','Ipsum vel voluptate',NULL,'Enrolled','aVPFhcR1eM2rI81CaaXQaEZSVtqs94r4Qzf1upf4.jpg','2023-05-20 17:40:47','2023-05-21 07:44:22');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`fullname`,`office_id`,`username`,`email`,`is_active`,`avatar`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Administrator',1,'admin','francisco12rosel@gmail.com',0,NULL,NULL,'$2y$10$TRsViFz.es//wsyTpzd4V.cGkIFMhAsHnsoBPzQpcyqMCO5rQ7tpK',NULL,'2023-05-19 20:30:21','2023-05-19 20:30:21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
