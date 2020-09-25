/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.30-MariaDB : Database - bhl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bhl` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `bhl`;

/*Table structure for table `ki_admin` */

DROP TABLE IF EXISTS `ki_admin`;

CREATE TABLE `ki_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL COMMENT '1 = "active", 0 = "inactive"',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ki_admin` */

insert  into `ki_admin`(`admin_id`,`first_name`,`last_name`,`email`,`user_name`,`password`,`is_active`) values (1,'Naeem','Malik','hr@nanosoftplus.com','admin','37bb2866bbf1750ba6457d590e31fbb16d8a6af8ae9b7b08d9a19a34e1f26367f81d4d881d4c5eb367af3171c5f53bb2c4888f59bd1c855b23557b267ca093fbZj6N7a9OdunrltMv8VO+zP0QHsvd3JofYuVcXN6TUj8=',1);

/*Table structure for table `ki_benificiarytype` */

DROP TABLE IF EXISTS `ki_benificiarytype`;

CREATE TABLE `ki_benificiarytype` (
  `benType_id` int(5) NOT NULL AUTO_INCREMENT,
  `benType_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `benType_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`benType_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ki_benificiarytype` */

insert  into `ki_benificiarytype`(`benType_id`,`benType_name`,`benType_status`) values (1,'CNIC',1),(2,'Passport',1),(3,'Other',1);

/*Table structure for table `ki_ci_sessions` */

DROP TABLE IF EXISTS `ki_ci_sessions`;

CREATE TABLE `ki_ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ki_ci_sessions` */

insert  into `ki_ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values ('eqgn9qrjqmj3293ioscj3q70qflq1ip5','127.0.0.1',1572004246,'__ci_last_regenerate|i:1572004246;'),('rul7c9vhrt8glsp818d60497s49dnllc','127.0.0.1',1572004718,'__ci_last_regenerate|i:1572004718;'),('cbied0j1cf3c8u0sj7aha874a1hkssjg','127.0.0.1',1572004721,'__ci_last_regenerate|i:1572004718;'),('gim1lcaqo0v11ium8joiefampqcjugpf','127.0.0.1',1572017085,'__ci_last_regenerate|i:1572017085;'),('ieganvt92ubo2afme4dab9ubd0dl3t1a','127.0.0.1',1572017428,'__ci_last_regenerate|i:1572017428;'),('2u2p4h3kjddv3j2tdfpa91jedf39lnie','127.0.0.1',1572017780,'__ci_last_regenerate|i:1572017780;'),('5ciasp6qt46uiclaecifnjrhg48jf8ha','127.0.0.1',1572018301,'__ci_last_regenerate|i:1572018301;'),('pd0kc1fbpof9525ksbf4usidtthatmpr','127.0.0.1',1572018713,'__ci_last_regenerate|i:1572018713;'),('h0f3m9lvdresuu921lqh42ssae0jp1i4','127.0.0.1',1572019070,'__ci_last_regenerate|i:1572019070;'),('4jqaqgk5k8p77s639fr71nskvhnea2ul','127.0.0.1',1572019397,'__ci_last_regenerate|i:1572019397;'),('rd96op1565chv3hpff6ivrkc3lth04jt','127.0.0.1',1572019816,'__ci_last_regenerate|i:1572019816;'),('6rrdbs67cli1vesrqst75bffhg15k7vg','127.0.0.1',1572019872,'__ci_last_regenerate|i:1572019816;'),('ets7hbag4e9n910co7ibkg0srnenlbf3','127.0.0.1',1574242460,'__ci_last_regenerate|i:1574242419;'),('gukubjkqk8nqo13pq5hmrur1n80mrd18','127.0.0.1',1599801525,'__ci_last_regenerate|i:1599801525;email|s:21:\"kashifuop99@gmail.com\";user_name|s:12:\"Kashif Ahmad\";admin_id|s:1:\"1\";type|s:9:\"Gandharan\";'),('qngup9jcu5bfeg5oarqkkufqi6971sg3','127.0.0.1',1599801525,'__ci_last_regenerate|i:1599801525;'),('aejlnf32nsk3dki6b2gh3j8901d4cdcd','127.0.0.1',1600407154,'__ci_last_regenerate|i:1600407154;'),('hpop0grl16ql6lubcvo0l0u6safb7ufg','127.0.0.1',1600407316,'__ci_last_regenerate|i:1600407305;'),('p1c6jkpme3joip2n29a2032cbjmbh136','127.0.0.1',1600407311,'__ci_last_regenerate|i:1600407311;'),('bu7eqk87akhhs58d5lgl0bmgbn0c8tub','127.0.0.1',1600409333,'__ci_last_regenerate|i:1600409333;'),('ihban7jl5t6cl1s0f91cn4ofgpph21jc','127.0.0.1',1600409824,'__ci_last_regenerate|i:1600409824;'),('krna7olno48ab4m199koik86cpcbph2n','127.0.0.1',1600413819,'__ci_last_regenerate|i:1600413819;'),('9of488lva3r32tr5lq9f7q2maeeei370','127.0.0.1',1600414249,'__ci_last_regenerate|i:1600414249;'),('n4mpvvdl32qu51uh23dat0t2kgq4gc83','127.0.0.1',1600414840,'__ci_last_regenerate|i:1600414840;'),('9pot6tahadggshkjl7sqjfbddtdk0spu','127.0.0.1',1600415171,'__ci_last_regenerate|i:1600415171;'),('on75894b7imdp1e72r9gt55o5i5t68u9','127.0.0.1',1600416418,'__ci_last_regenerate|i:1600416418;'),('4007rlrcl3096cp0orjj9f1f9s4cj82k','127.0.0.1',1600416723,'__ci_last_regenerate|i:1600416723;'),('68gs7hfmagvbq5lqorm8rmpo3njuu6em','127.0.0.1',1600417281,'__ci_last_regenerate|i:1600417281;'),('vn2pg2c55mojpvrm28dciq6b9jkb7kli','127.0.0.1',1600424316,'__ci_last_regenerate|i:1600424316;'),('d362eeh0kajtfjjsif377ssde4ahc54e','127.0.0.1',1600424708,'__ci_last_regenerate|i:1600424708;'),('4hs8nq9t8rrsge81hdasson9urffa0la','127.0.0.1',1600425697,'__ci_last_regenerate|i:1600425697;'),('49ggevhkc44fql5hi4kiqee5q8vlmvt7','127.0.0.1',1600425741,'__ci_last_regenerate|i:1600425697;'),('b5ieprqvrceudani7is158u5d9811rfe','127.0.0.1',1600434081,'__ci_last_regenerate|i:1600433794;'),('m1fkvk067k5su8k3e2ul4ck27o9lhp5h','127.0.0.1',1600688887,'__ci_last_regenerate|i:1600688887;'),('ogemcfg91fm999hkia19hkfqf7p19hdu','127.0.0.1',1600688887,'__ci_last_regenerate|i:1600688887;');

/*Table structure for table `ki_deliverymode` */

DROP TABLE IF EXISTS `ki_deliverymode`;

CREATE TABLE `ki_deliverymode` (
  `mode_id` int(11) NOT NULL AUTO_INCREMENT,
  `mode_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1:Active, 0:Inactive',
  PRIMARY KEY (`mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ki_deliverymode` */

insert  into `ki_deliverymode`(`mode_id`,`mode_name`,`status`) values (1,'Cash',1),(2,'Credit to BAHL ',1),(3,'Credit Other Bank’s ',1);

/*Table structure for table `ki_settings` */

DROP TABLE IF EXISTS `ki_settings`;

CREATE TABLE `ki_settings` (
  `setting_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT '',
  `value` text,
  `description` varchar(500) DEFAULT '',
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `ki_settings` */

insert  into `ki_settings`(`setting_id`,`name`,`value`,`description`) values (1,'company_name','Irfan Behsodi and Company',''),(2,'company_email','hr@nanosoftplus.com',''),(3,'company_address','Civil Secretariat, Peshawar, Khyber Pakhtunkhwa',''),(4,'company_mobile','+92 334 8295371',''),(7,'facebook_page','',''),(9,'google_plus_page','',''),(16,'twitter_page','',''),(17,'linkedin_page','asdsad','asdasdsad'),(18,'instagram_page',NULL,''),(19,'timings','Monday To Sunday:10 Am-5pm','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
