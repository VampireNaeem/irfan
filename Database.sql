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
  `remitterId` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remitterName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remitterAddress` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remitterCity` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remitterCountry` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remitterDateIssue` date DEFAULT NULL,
  `remitterDateExpiry` date DEFAULT NULL,
  `remitterNationality` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remitterDob` date DEFAULT NULL,
  `remitterPhone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL COMMENT '1 = "active", 0 = "inactive"',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ki_admin` */

insert  into `ki_admin`(`admin_id`,`remitterId`,`remitterName`,`email`,`user_name`,`password`,`remitterAddress`,`remitterCity`,`remitterCountry`,`remitterDateIssue`,`remitterDateExpiry`,`remitterNationality`,`remitterDob`,`remitterPhone`,`is_active`) values (1,'Naeem',NULL,'hr@nanosoftplus.com','admin','37bb2866bbf1750ba6457d590e31fbb16d8a6af8ae9b7b08d9a19a34e1f26367f81d4d881d4c5eb367af3171c5f53bb2c4888f59bd1c855b23557b267ca093fbZj6N7a9OdunrltMv8VO+zP0QHsvd3JofYuVcXN6TUj8=',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(4,'XYZ','Naeem','softnaeem@gmail.com','Naeem','45c43d0dbeac1af0e247a9eb9e786cb330f477967e4d58db034f336cadb25ff41f23a16509a3b63da404b946042986ef4bec7f45b34557ca1ceae657817da8d2IIuqiMFtdJCvj7Jsem16Y3Dbvm3nDpAINWbTa83/+Qo=','Street 112','Islamabd','Pakistan','2020-10-06','2020-10-06','Pakistan','2000-09-08','03348295371',1);

/*Table structure for table `ki_beneficiary_detail` */

DROP TABLE IF EXISTS `ki_beneficiary_detail`;

CREATE TABLE `ki_beneficiary_detail` (
  `bene_id` int(20) NOT NULL AUTO_INCREMENT,
  `fk_admin_id` int(20) DEFAULT NULL,
  `reference_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valueDate` date DEFAULT NULL,
  `fk_benType_id` int(5) DEFAULT NULL,
  `beneficiaryName` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaryIdNumber` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transactionAmountPkr` double DEFAULT NULL,
  `transactionCurrencyCode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transactionAmount` double DEFAULT NULL,
  `fk_deliveryMode_id` int(20) DEFAULT NULL,
  `transactionDate` date DEFAULT NULL,
  `beneficiaryBank` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaryBranchName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaryAccountNumber` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaryAddress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaryCity` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaryCountry` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beneficiaryPhone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purposeTransaction` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sourceOfIncome` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transactionOriginatorName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iban` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`bene_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ki_beneficiary_detail` */

insert  into `ki_beneficiary_detail`(`bene_id`,`fk_admin_id`,`reference_number`,`valueDate`,`fk_benType_id`,`beneficiaryName`,`beneficiaryIdNumber`,`transactionAmountPkr`,`transactionCurrencyCode`,`transactionAmount`,`fk_deliveryMode_id`,`transactionDate`,`beneficiaryBank`,`beneficiaryBranchName`,`beneficiaryAccountNumber`,`beneficiaryAddress`,`beneficiaryCity`,`beneficiaryCountry`,`beneficiaryPhone`,`purposeTransaction`,`sourceOfIncome`,`transactionOriginatorName`,`iban`,`status`) values (1,4,'bJOgo','2020-10-16',1,'Muneeb','16101-5555551-1',100000,'AUS',1000,1,'2020-10-07','MCb','F10','000000083','street 150','Pindi','Pakistansss','04545121584','Loan Payment','Business','Khalako Khan','IBAN00005511546',1);

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

insert  into `ki_ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values ('eqgn9qrjqmj3293ioscj3q70qflq1ip5','127.0.0.1',1572004246,'__ci_last_regenerate|i:1572004246;'),('rul7c9vhrt8glsp818d60497s49dnllc','127.0.0.1',1572004718,'__ci_last_regenerate|i:1572004718;'),('cbied0j1cf3c8u0sj7aha874a1hkssjg','127.0.0.1',1572004721,'__ci_last_regenerate|i:1572004718;'),('gim1lcaqo0v11ium8joiefampqcjugpf','127.0.0.1',1572017085,'__ci_last_regenerate|i:1572017085;'),('ieganvt92ubo2afme4dab9ubd0dl3t1a','127.0.0.1',1572017428,'__ci_last_regenerate|i:1572017428;'),('2u2p4h3kjddv3j2tdfpa91jedf39lnie','127.0.0.1',1572017780,'__ci_last_regenerate|i:1572017780;'),('5ciasp6qt46uiclaecifnjrhg48jf8ha','127.0.0.1',1572018301,'__ci_last_regenerate|i:1572018301;'),('pd0kc1fbpof9525ksbf4usidtthatmpr','127.0.0.1',1572018713,'__ci_last_regenerate|i:1572018713;'),('h0f3m9lvdresuu921lqh42ssae0jp1i4','127.0.0.1',1572019070,'__ci_last_regenerate|i:1572019070;'),('4jqaqgk5k8p77s639fr71nskvhnea2ul','127.0.0.1',1572019397,'__ci_last_regenerate|i:1572019397;'),('rd96op1565chv3hpff6ivrkc3lth04jt','127.0.0.1',1572019816,'__ci_last_regenerate|i:1572019816;'),('6rrdbs67cli1vesrqst75bffhg15k7vg','127.0.0.1',1572019872,'__ci_last_regenerate|i:1572019816;'),('ets7hbag4e9n910co7ibkg0srnenlbf3','127.0.0.1',1574242460,'__ci_last_regenerate|i:1574242419;'),('gukubjkqk8nqo13pq5hmrur1n80mrd18','127.0.0.1',1599801525,'__ci_last_regenerate|i:1599801525;email|s:21:\"kashifuop99@gmail.com\";user_name|s:12:\"Kashif Ahmad\";admin_id|s:1:\"1\";type|s:9:\"Gandharan\";'),('qngup9jcu5bfeg5oarqkkufqi6971sg3','127.0.0.1',1599801525,'__ci_last_regenerate|i:1599801525;'),('aejlnf32nsk3dki6b2gh3j8901d4cdcd','127.0.0.1',1600407154,'__ci_last_regenerate|i:1600407154;'),('hpop0grl16ql6lubcvo0l0u6safb7ufg','127.0.0.1',1600407316,'__ci_last_regenerate|i:1600407305;'),('p1c6jkpme3joip2n29a2032cbjmbh136','127.0.0.1',1600407311,'__ci_last_regenerate|i:1600407311;'),('bu7eqk87akhhs58d5lgl0bmgbn0c8tub','127.0.0.1',1600409333,'__ci_last_regenerate|i:1600409333;'),('ihban7jl5t6cl1s0f91cn4ofgpph21jc','127.0.0.1',1600409824,'__ci_last_regenerate|i:1600409824;'),('krna7olno48ab4m199koik86cpcbph2n','127.0.0.1',1600413819,'__ci_last_regenerate|i:1600413819;'),('9of488lva3r32tr5lq9f7q2maeeei370','127.0.0.1',1600414249,'__ci_last_regenerate|i:1600414249;'),('n4mpvvdl32qu51uh23dat0t2kgq4gc83','127.0.0.1',1600414840,'__ci_last_regenerate|i:1600414840;'),('9pot6tahadggshkjl7sqjfbddtdk0spu','127.0.0.1',1600415171,'__ci_last_regenerate|i:1600415171;'),('on75894b7imdp1e72r9gt55o5i5t68u9','127.0.0.1',1600416418,'__ci_last_regenerate|i:1600416418;'),('4007rlrcl3096cp0orjj9f1f9s4cj82k','127.0.0.1',1600416723,'__ci_last_regenerate|i:1600416723;'),('68gs7hfmagvbq5lqorm8rmpo3njuu6em','127.0.0.1',1600417281,'__ci_last_regenerate|i:1600417281;'),('vn2pg2c55mojpvrm28dciq6b9jkb7kli','127.0.0.1',1600424316,'__ci_last_regenerate|i:1600424316;'),('d362eeh0kajtfjjsif377ssde4ahc54e','127.0.0.1',1600424708,'__ci_last_regenerate|i:1600424708;'),('4hs8nq9t8rrsge81hdasson9urffa0la','127.0.0.1',1600425697,'__ci_last_regenerate|i:1600425697;'),('49ggevhkc44fql5hi4kiqee5q8vlmvt7','127.0.0.1',1600425741,'__ci_last_regenerate|i:1600425697;'),('b5ieprqvrceudani7is158u5d9811rfe','127.0.0.1',1600434081,'__ci_last_regenerate|i:1600433794;'),('m1fkvk067k5su8k3e2ul4ck27o9lhp5h','127.0.0.1',1600688887,'__ci_last_regenerate|i:1600688887;'),('ogemcfg91fm999hkia19hkfqf7p19hdu','127.0.0.1',1600688887,'__ci_last_regenerate|i:1600688887;'),('igiv3qj0njdk33brjgpb7kecrf9ailkl','127.0.0.1',1600959780,'__ci_last_regenerate|i:1600959780;'),('12t13hnfb1t095gv5spgfm4vitgduup3','127.0.0.1',1600959780,'__ci_last_regenerate|i:1600959780;'),('hvtsf4dmcocvt3ungl1vf7rncppcupl7','127.0.0.1',1601022053,'__ci_last_regenerate|i:1601022053;'),('ckk5k4bk6b6ais6dtkp528pdh36dm3qh','127.0.0.1',1601269922,'__ci_last_regenerate|i:1601269922;'),('b5tvrvrs0foiu4kci5he5r6to26cnc0p','127.0.0.1',1601271228,'__ci_last_regenerate|i:1601271228;'),('hun8nln6si01p57dkn7pbhdud826khsn','127.0.0.1',1601271567,'__ci_last_regenerate|i:1601271567;'),('ehuhjc9gnco2avv8jg9tjd3fm54c3djf','127.0.0.1',1601272355,'__ci_last_regenerate|i:1601272355;'),('6p37bfac8vj5kj4ct2d817j88p1iaf4t','127.0.0.1',1601272364,'__ci_last_regenerate|i:1601272355;'),('gs03bda2i01i4257gmpun7c52b0ird0p','127.0.0.1',1601280969,'__ci_last_regenerate|i:1601280969;sign_in_redirect|s:15:\"admin/dashboard\";'),('u8iiu12n59st2kt7pbpaupqlgul794mg','127.0.0.1',1601282373,'__ci_last_regenerate|i:1601282373;email|s:21:\"ahsa2n@mailinator.com\";user_name|N;admin_id|N;sign_in_redirect|s:15:\"admin/dashboard\";'),('f72vkqbslb4q55mumr4nchof32ji0ak8','127.0.0.1',1601284244,'__ci_last_regenerate|i:1601284244;email|s:21:\"ahsa2n@mailinator.com\";user_name|N;admin_id|N;sign_in_redirect|s:15:\"admin/dashboard\";'),('il6rl14ll0hlnvap29tbsqk4opf4ncn9','127.0.0.1',1601284938,'__ci_last_regenerate|i:1601284938;email|s:21:\"ahsa2n@mailinator.com\";user_name|N;admin_id|N;sign_in_redirect|s:15:\"admin/dashboard\";'),('bg4cneormc8t2g0dn5nmloid2dordmmv','127.0.0.1',1601285255,'__ci_last_regenerate|i:1601285255;email|s:21:\"ahsa2n@mailinator.com\";user_name|s:5:\"Naeem\";admin_id|s:1:\"6\";sign_in_redirect|s:15:\"admin/dashboard\";'),('bguiq6r3qk19aa32851l8565eipnvk06','127.0.0.1',1601291962,'__ci_last_regenerate|i:1601291962;email|s:21:\"ahsa2n@mailinator.com\";user_name|s:5:\"Naeem\";admin_id|s:1:\"6\";sign_in_redirect|s:15:\"admin/dashboard\";'),('tc64h2jcvaim4sijckf19dn5l78lp3es','127.0.0.1',1601291962,'__ci_last_regenerate|i:1601291962;email|s:21:\"ahsa2n@mailinator.com\";user_name|s:5:\"Naeem\";admin_id|s:1:\"6\";sign_in_redirect|s:15:\"admin/dashboard\";'),('v6gcunaf0hc4r7ki0fsi2rau0fhplfdm','127.0.0.1',1601356060,'__ci_last_regenerate|i:1601356059;sign_in_redirect|s:15:\"admin/dashboard\";'),('s69irrocl6s1mmpmv1unghvbhhs198hp','127.0.0.1',1601379234,'__ci_last_regenerate|i:1601379234;'),('r6rf3gcsf9hupr0mu6c7fvdt21o6sq8c','127.0.0.1',1601379245,'__ci_last_regenerate|i:1601379234;'),('cn2fh6vmoupvcfk9sshrkobk7j80tels','127.0.0.1',1601880785,'__ci_last_regenerate|i:1601880784;sign_in_redirect|s:15:\"admin/dashboard\";'),('e4v7gvm7cgfkoap2fdboun8mrmfc9toq','127.0.0.1',1601968596,'__ci_last_regenerate|i:1601968596;success_msg|s:46:\"<strong>Success!</strong> Successfully Message\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}email|s:19:\"softnaeem@gmail.com\";user_name|s:5:\"Naeem\";admin_id|s:1:\"3\";'),('5fj5f73n3dljkat7mlg9u1m4jog412ob','127.0.0.1',1601970359,'__ci_last_regenerate|i:1601970359;email|s:19:\"softnaeem@gmail.com\";user_name|s:5:\"Naeem\";admin_id|s:1:\"4\";success_msg|s:46:\"<strong>Success!</strong> Successfully Message\";__ci_vars|a:1:{s:11:\"success_msg\";s:3:\"old\";}'),('s9qa4lth909tkv4gbqpb564ko588us99','127.0.0.1',1601971896,'__ci_last_regenerate|i:1601971896;email|s:19:\"softnaeem@gmail.com\";user_name|s:5:\"Naeem\";admin_id|s:1:\"4\";'),('6shg1v60kkv7cq4r30so71mt236t5ucv','127.0.0.1',1601972201,'__ci_last_regenerate|i:1601972201;'),('76e7on1jpj3u1og2uocftii8hf3girfd','127.0.0.1',1601973918,'__ci_last_regenerate|i:1601973918;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('1aim0ku81mibpk6mfdhnqsv6ld2a8dur','127.0.0.1',1601977366,'__ci_last_regenerate|i:1601977366;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('p12as92a04n85kknr8hooep7ncnouf6h','127.0.0.1',1601977370,'__ci_last_regenerate|i:1601977366;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('9uq1pi6or9dl4d2e2m9c643d5jk72e7t','127.0.0.1',1602049565,'__ci_last_regenerate|i:1602049564;sign_in_redirect|s:15:\"admin/dashboard\";'),('a3g3bnkh9lm6gmc577abu7so9thaj6es','127.0.0.1',1602058205,'__ci_last_regenerate|i:1602058205;'),('d9n7m5sjvr9td5vl35ugf7vsqaavcglq','127.0.0.1',1602839295,'__ci_last_regenerate|i:1602839164;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('4vasif43jkj0r5vhb7r38lnckcmskdpo','127.0.0.1',1605072406,'__ci_last_regenerate|i:1605072155;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('gi04blu2t9vna7o7qbg00bmca65imvpt','127.0.0.1',1605081714,'__ci_last_regenerate|i:1605081714;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('4rmvmch4ukb06mklu9im8ub3fb39irhh','127.0.0.1',1605082050,'__ci_last_regenerate|i:1605082050;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('3fhol9jri4qr0dp4o1lj7cc15sm2d7oh','127.0.0.1',1605084456,'__ci_last_regenerate|i:1605084456;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('e4tti892v0rfu6hdc81h0bol1551ubhh','127.0.0.1',1605084546,'__ci_last_regenerate|i:1605084456;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('sug6pmst9qrpdgrscikgl1p7f9h3fid6','127.0.0.1',1605246650,'__ci_last_regenerate|i:1605246650;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('ncmk8cbmpdq7n5bcgfmet73g2o6d3bcj','127.0.0.1',1605246650,'__ci_last_regenerate|i:1605246650;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('fb6gnlp5odv2229m3p4ukfssaul81thq','127.0.0.1',1605258150,'__ci_last_regenerate|i:1605258150;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('vj62k3bv5s72vp7q8uhjob6h9rgarutq','127.0.0.1',1605258910,'__ci_last_regenerate|i:1605258910;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('dbe45lkmetvhlqs2kja6a9q96rpjk0u5','127.0.0.1',1605260270,'__ci_last_regenerate|i:1605260270;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('s9e8ud5ji4peoufsif0okklipmb7sm3f','127.0.0.1',1605260616,'__ci_last_regenerate|i:1605260616;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('r09d0i67cvp9e1mn7ejsb4s42ssqt5sv','127.0.0.1',1605260917,'__ci_last_regenerate|i:1605260917;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('akk1crv5cfeq4cjgfvhfcc4k91e3qi4p','127.0.0.1',1605261351,'__ci_last_regenerate|i:1605261351;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('kci4p1ft47ll2212l9qef6me8i30ojkd','127.0.0.1',1605261730,'__ci_last_regenerate|i:1605261730;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('sntg7ddm5as1nrsfa4s2ptf6r11cgu95','127.0.0.1',1605262049,'__ci_last_regenerate|i:1605262049;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('9d3nhasd6uscuq0k1g3soom8f40a3dei','127.0.0.1',1605262385,'__ci_last_regenerate|i:1605262385;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('nb2e2uacfpqnqasnf16j0imlml5h9g1c','127.0.0.1',1605263453,'__ci_last_regenerate|i:1605263453;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('lma7jaen6d033cssug86dvpdhihjapeo','127.0.0.1',1605264156,'__ci_last_regenerate|i:1605264156;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('0dp9phe8nfec9olop1elk70m4b9ndeg5','127.0.0.1',1605264344,'__ci_last_regenerate|i:1605264156;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('j9tg7sp4gt5n47el9gcsrcfj6moaq8do','127.0.0.1',1605511934,'__ci_last_regenerate|i:1605511934;'),('n8b3a7iimnh93g52d37qg4h6sar87eok','127.0.0.1',1605512278,'__ci_last_regenerate|i:1605512278;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('jm06vvekpqrt5o5857gk6m3pcheo9r75','127.0.0.1',1605512641,'__ci_last_regenerate|i:1605512641;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('5im3irmra22ffda80in7gp8n5a0i2dar','127.0.0.1',1605513242,'__ci_last_regenerate|i:1605513242;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('bqht8c7ptaj3jkq24ejs0vs1cjtje3tl','127.0.0.1',1605513561,'__ci_last_regenerate|i:1605513561;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('aobmqh79mped8ll3dlrilt6deq2jrq0d','127.0.0.1',1605515649,'__ci_last_regenerate|i:1605515649;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('en6dfl5u4omf7qrampg5frqt4c4vv3fp','127.0.0.1',1605519079,'__ci_last_regenerate|i:1605519079;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('md8b7qls5aqqmbst1du5a505qfbvilu7','127.0.0.1',1605524735,'__ci_last_regenerate|i:1605524735;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('cc20agmspcccevsql852d2cc93gu2536','127.0.0.1',1605526477,'__ci_last_regenerate|i:1605526477;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('ns8ac496lfgulr92i0jn7aohhgif4fl8','127.0.0.1',1605526479,'__ci_last_regenerate|i:1605526477;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('lgi9t2qqbprit10r24ao84nlguefme9p','127.0.0.1',1605596243,'__ci_last_regenerate|i:1605596243;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";'),('nmiruti84v4t992usrif0grdpbi3kfkl','127.0.0.1',1605596243,'__ci_last_regenerate|i:1605596243;email|s:19:\"hr@nanosoftplus.com\";user_name|s:5:\"admin\";admin_id|s:1:\"1\";');

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
