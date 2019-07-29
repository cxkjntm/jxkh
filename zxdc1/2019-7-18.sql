/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.37-MariaDB : Database - jxkh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jxkh` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `jxkh`;

/*Table structure for table `bz_grade_472739` */

DROP TABLE IF EXISTS `bz_grade_472739`;

CREATE TABLE `bz_grade_472739` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DeptID` int(11) DEFAULT NULL,
  `grade` float(4,2) unsigned zerofill NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `bz_grade_472739` */

insert  into `bz_grade_472739`(`ID`,`DeptID`,`grade`) values 
(1,1,0.00),
(2,2,85.86),
(3,3,85.86),
(4,4,85.86),
(5,5,85.86),
(6,6,85.86),
(7,7,85.86),
(8,8,85.86),
(9,9,85.86),
(10,10,85.83),
(11,11,85.86),
(12,12,85.86),
(13,13,85.86),
(14,14,85.86),
(15,15,85.86),
(16,16,85.86),
(17,17,85.86),
(18,18,0.14),
(19,19,0.14),
(20,20,0.14),
(21,21,0.14),
(22,22,0.14),
(23,23,0.14),
(24,24,0.14),
(25,25,43.00),
(26,26,0.14),
(27,27,0.14),
(28,28,0.14),
(29,29,0.14),
(30,30,0.11),
(31,31,0.14),
(32,32,0.11),
(33,33,0.14),
(34,34,85.86),
(35,35,85.86),
(36,36,85.86),
(37,37,85.86),
(38,38,85.80),
(39,39,85.86),
(40,40,85.86),
(41,41,85.86),
(42,42,85.86),
(43,43,85.86),
(44,44,85.86),
(45,45,85.86),
(46,46,85.86);

/*Table structure for table `deptadmin` */

DROP TABLE IF EXISTS `deptadmin`;

CREATE TABLE `deptadmin` (
  `AdminID` int(11) NOT NULL,
  `Account` varchar(50) NOT NULL,
  `Passwd` varchar(255) NOT NULL,
  `DeptID` int(11) NOT NULL,
  PRIMARY KEY (`AdminID`) USING BTREE,
  KEY `fk_name` (`Account`) USING BTREE,
  KEY `fk_adminDept` (`DeptID`) USING BTREE,
  CONSTRAINT `fk_adminDept` FOREIGN KEY (`DeptID`) REFERENCES `deptinfo` (`DeptID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `deptadmin` */

insert  into `deptadmin`(`AdminID`,`Account`,`Passwd`,`DeptID`) values 
(1,'1001','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',1),
(2,'1002','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',2),
(3,'1003','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',3),
(4,'1004','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',4),
(5,'1005','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',5),
(6,'1006','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',6),
(7,'1007','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',7),
(8,'1008','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',8),
(9,'1009','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',9),
(10,'1010','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',10),
(11,'1011','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',11),
(12,'1012','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',12),
(13,'1013','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',13),
(14,'1014','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',14),
(15,'1015','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',15),
(16,'1016','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',16),
(17,'1017','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',17),
(18,'1018','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',18),
(19,'1019','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',19),
(20,'1020','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',20),
(21,'1021','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',21),
(22,'1022','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',22),
(23,'1023','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',23),
(24,'1024','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',24),
(25,'1025','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',25),
(26,'1026','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',26),
(27,'1027','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',27),
(28,'1028','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',28),
(29,'1029','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',29),
(30,'1030','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',30),
(31,'1031','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',31),
(32,'1032','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',32),
(33,'1033','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',33),
(34,'1034','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',34),
(35,'1035','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',35),
(36,'1036','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',36),
(37,'1037','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',37),
(38,'1038','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',38),
(39,'1039','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',39),
(40,'1040','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',40),
(41,'1041','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',41),
(42,'1042','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',42),
(43,'1043','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',43),
(44,'1044','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',44),
(45,'1045','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',45),
(46,'1046','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',46);

/*Table structure for table `deptinfo` */

DROP TABLE IF EXISTS `deptinfo`;

CREATE TABLE `deptinfo` (
  `DeptID` int(11) NOT NULL AUTO_INCREMENT,
  `DeptName` varchar(50) NOT NULL,
  `DeptMemo` varchar(255) NOT NULL,
  `gbnumb` int(11) DEFAULT NULL,
  `jgnumb` int(11) DEFAULT NULL,
  PRIMARY KEY (`DeptID`) USING BTREE,
  KEY `DeptName` (`DeptName`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `deptinfo` */

insert  into `deptinfo`(`DeptID`,`DeptName`,`DeptMemo`,`gbnumb`,`jgnumb`) values 
(1,'纪委、监察处、纪委办公室','科室',3,0),
(2,'党委办公室、校长办公室、综合档案室','科室',3,0),
(3,'组织部、统战部、党校','科室',3,0),
(4,'宣传部、文明办、城建博物馆、校报编辑部','科室',2,0),
(5,'学工部、学生处、学生资助中心及事务中心','科室',5,0),
(6,'武装部、保卫处','科室',3,0),
(7,'发规处、校友办、高教研究所','科室',3,0),
(8,'教务处、评估与质量监控办','科室',4,0),
(9,'科研（社科）处、学科办、产业发展研究院','科室',3,0),
(10,'人事处、教师发展中心','科室',3,0),
(11,'财务处','科室',2,0),
(12,'招生就业处、就业创业指导中心、创业学院','科室',3,0),
(13,'审计处','科室',3,0),
(14,'基建处','科室',3,0),
(15,'国资处、招标办、设备与实验室管理中心','科室',3,0),
(16,'工会、女工委员会、工会办公室','科室',3,0),
(17,'团委','科室',2,0),
(18,'土木与交通工程学院','院部',6,0),
(19,'管理学院','院部',6,0),
(20,'市政与环境工程学院','院部',5,0),
(21,'建筑与城市规划学院','院部',5,0),
(22,'能源与建筑环境工程学院','院部',4,0),
(23,'测绘与城市空间信息学院','院部',5,0),
(24,'艺术设计学院','院部',4,0),
(25,'计算机与数据科学学院','院部',5,6),
(26,'电气与控制工程学院','院部',5,0),
(27,'材料与化工学院','院部',5,0),
(28,'生命科学与工程学院','院部',4,0),
(29,'数理学院','院部',3,0),
(30,'外国语学院','院部',4,0),
(31,'法学院','院部',3,0),
(32,'体育教学部','院部',3,0),
(33,'思想政治教育教学部','院部',2,0),
(34,'国际教育学院、国际合作与交流处','院部',4,0),
(35,'继续教育学院','院部',2,0),
(36,'公共艺术教育中心','科室',1,0),
(37,'心理健康教育指导中心','科室',1,0),
(38,'信息中心、信息化建设办公室','科室',2,0),
(39,'学报编辑部','科室',2,0),
(40,'退休职工服务中心','科室',3,0),
(41,'图书馆','科室',2,0),
(42,'医院','科室',3,0),
(43,'资产经营公司、大学科技园','科室',1,0),
(44,'城镇综合设计研究院','科室',4,0),
(45,'后勤服务中心、后勤管理处','科室',5,0),
(46,'继续教育部','学院',0,0);

/*Table structure for table `grades_472739` */

DROP TABLE IF EXISTS `grades_472739`;

CREATE TABLE `grades_472739` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `grade` float(4,2) unsigned zerofill NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  KEY `grade_User` (`UserID`) USING BTREE,
  CONSTRAINT `grade_User` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `grades_472739` */

insert  into `grades_472739`(`ID`,`UserID`,`grade`) values 
(151,315,0.00),
(152,316,0.00),
(153,317,0.00),
(155,318,0.34),
(156,319,0.00),
(157,320,0.00),
(158,321,0.34),
(159,322,0.00),
(160,323,0.00),
(161,324,0.34),
(162,325,0.00),
(163,326,0.00),
(164,327,0.34),
(165,328,0.00),
(166,329,0.00),
(167,330,0.00),
(168,331,0.34),
(169,332,0.00),
(170,333,0.00),
(171,334,0.34),
(172,335,0.00),
(173,336,0.00),
(174,338,0.00),
(175,339,0.00),
(176,340,0.00),
(177,337,0.34),
(178,342,0.00),
(179,343,0.00),
(180,341,0.34),
(181,344,0.34),
(182,345,0.00),
(183,346,0.00),
(184,347,0.34),
(185,348,0.00),
(186,349,0.34),
(187,350,0.00),
(188,351,0.00),
(189,352,0.34),
(190,353,0.00),
(191,354,0.00),
(192,355,0.34),
(193,356,0.00),
(194,357,0.00),
(195,358,0.34),
(196,359,0.00),
(197,360,0.00),
(198,361,0.34),
(199,362,0.00),
(200,363,0.00),
(201,364,0.34),
(202,365,0.00),
(203,367,0.34),
(204,368,0.00),
(205,369,0.00),
(206,370,0.00),
(207,371,0.00),
(208,366,0.34),
(209,372,0.34),
(210,373,0.34),
(211,374,0.00),
(212,375,0.00),
(213,376,0.00),
(214,377,0.00),
(215,379,0.34),
(216,380,0.00),
(217,381,0.00),
(218,382,0.00),
(219,378,0.34),
(220,383,0.34),
(221,384,0.34),
(222,385,0.00),
(223,386,0.00),
(224,387,0.00),
(225,388,0.34),
(227,390,0.00),
(228,391,0.00),
(229,392,0.34),
(230,393,0.34),
(231,394,0.00),
(232,395,0.00),
(233,396,0.00),
(234,397,0.34),
(235,398,0.34),
(236,399,0.00),
(237,400,0.00),
(238,401,11.76),
(239,402,11.76),
(240,403,11.42),
(241,404,11.42),
(242,405,11.42),
(243,406,0.34),
(244,407,0.34),
(245,408,0.00),
(246,409,0.00),
(247,410,0.00),
(248,411,0.34),
(249,412,0.34),
(250,413,0.00),
(251,414,0.00),
(252,415,0.00),
(253,416,0.34),
(254,417,0.34),
(255,418,0.00),
(256,419,0.00),
(257,420,0.34),
(258,421,0.34),
(259,422,0.00),
(260,423,0.34),
(261,424,0.34),
(262,425,0.00),
(263,426,0.00),
(264,429,0.00),
(265,427,0.34),
(266,428,0.34),
(267,430,0.34),
(268,431,0.00),
(269,432,0.00),
(270,433,0.34),
(271,434,0.00),
(272,435,0.34),
(273,436,0.00),
(274,437,0.00),
(275,438,0.00),
(276,440,0.00),
(277,439,0.34),
(278,441,0.34),
(279,442,0.34),
(280,443,0.34),
(281,444,0.00),
(282,445,0.34),
(283,446,0.00),
(284,447,0.34),
(285,448,0.00),
(286,449,0.00),
(287,450,0.34),
(288,451,0.00),
(289,452,0.34),
(290,453,0.00),
(291,454,0.00),
(292,455,0.34),
(293,456,0.34),
(294,457,0.00),
(295,458,0.00),
(296,459,0.00),
(297,461,0.00),
(298,462,0.00),
(299,463,0.00),
(301,460,0.34);

/*Table structure for table `isvote_472739` */

DROP TABLE IF EXISTS `isvote_472739`;

CREATE TABLE `isvote_472739` (
  `VoteID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `Voted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`VoteID`) USING BTREE,
  KEY `IsVote_User` (`UserID`) USING BTREE,
  CONSTRAINT `IsVote_User` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `isvote_472739` */

insert  into `isvote_472739`(`VoteID`,`UserID`,`Voted`) values 
(172,404,2),
(173,404,2),
(174,404,2),
(175,404,2),
(176,404,2),
(177,404,1),
(184,315,2),
(185,315,2),
(186,315,2),
(187,315,2),
(188,315,2),
(189,318,2),
(190,318,2),
(191,318,2),
(192,318,2),
(193,318,2),
(194,318,2),
(195,318,2),
(196,318,2),
(197,318,2),
(198,318,2),
(199,318,2),
(200,318,2),
(201,318,2),
(202,318,2),
(203,318,2),
(204,315,1),
(205,315,1),
(206,315,1),
(207,315,1),
(208,315,1),
(209,315,1),
(210,315,1),
(211,315,1),
(212,315,1),
(213,315,1),
(214,319,1),
(215,319,1),
(225,315,1),
(226,315,2),
(227,315,2),
(228,315,2),
(229,315,2),
(230,315,2),
(231,315,2),
(232,315,2),
(233,315,2),
(234,315,2),
(235,315,2),
(236,315,2),
(237,315,2),
(238,315,2),
(239,315,2),
(240,315,2),
(241,315,2),
(242,315,2),
(243,315,2),
(244,315,2),
(245,315,2),
(246,315,2),
(247,315,2),
(248,315,2),
(249,315,2),
(250,315,2),
(251,315,2),
(252,315,2),
(253,315,2),
(254,315,2),
(255,315,2),
(256,315,2),
(257,315,2),
(258,315,2),
(259,315,1);

/*Table structure for table `levelinfo` */

DROP TABLE IF EXISTS `levelinfo`;

CREATE TABLE `levelinfo` (
  `LevelID` int(11) NOT NULL AUTO_INCREMENT,
  `LevelName` varchar(20) NOT NULL,
  `Memo` varchar(255) NOT NULL,
  PRIMARY KEY (`LevelID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `levelinfo` */

insert  into `levelinfo`(`LevelID`,`LevelName`,`Memo`) values 
(1,'学校领导',''),
(2,'中层正职',''),
(3,'中层副职',''),
(4,'职工代表',''),
(5,'干部代表',''),
(6,'普通职工',''),
(7,'基层员工','基层教师加上职工');

/*Table structure for table `menuinfo` */

DROP TABLE IF EXISTS `menuinfo`;

CREATE TABLE `menuinfo` (
  `MenuID` int(11) NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(20) NOT NULL,
  `MenuMid` int(11) NOT NULL,
  `Menu_URL` varchar(40) NOT NULL,
  `Pare_Menu_ID` varchar(20) NOT NULL,
  `paixu` int(11) NOT NULL,
  `stats` int(11) NOT NULL,
  PRIMARY KEY (`MenuID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `menuinfo` */

insert  into `menuinfo`(`MenuID`,`MenuName`,`MenuMid`,`Menu_URL`,`Pare_Menu_ID`,`paixu`,`stats`) values 
(1,'平时考核',1000,'javascript:;','0',1,1),
(2,'问卷调查',1001,'checktime.php','1000',1,1),
(3,'综合考核',2000,'javascipt:;','0',1,1),
(4,'领导班子互评',2001,'zhkp/checkvote0.php','2000',1,1),
(5,'领导成员互评',2002,'zhkp/checkvote1.php','2000',1,1),
(6,'正职评副职',2003,'zhkp/checkvote2.php','2000',1,1),
(7,'群众评班子',2004,'zhkp/checkvote3.php','2000',1,1),
(8,'双向互评A',2005,'zhkp/checkvote4.php','2000',1,1),
(9,'双向互评B',2006,'zhkp/checkvote5.php','2000',1,1),
(10,'账号信息',3000,'javascript:;','0',1,1),
(11,'个人信息',3001,'getUserInfo.php','3000',1,1),
(12,'修改密码',3002,'mypwd.php','3000',1,1),
(17,'领导评中层班子',2007,'zhkp/checkvote6.php','2000',1,1),
(18,'领导评中层干部',2008,'zhkp/checkvote7.php','2000',1,1),
(19,'教工管理',4000,'javascipt:;','0',1,1),
(20,'职工信息浏览',4001,'person/view_user.php','4000',1,1),
(22,'增加职工',4003,'person/add_user.php','4000',1,1),
(23,'投票信息',5000,'javascipt:;','0',1,1),
(24,'投票详情',5001,'voteinformation/view.php','5000',1,1);

/*Table structure for table `noteinfo` */

DROP TABLE IF EXISTS `noteinfo`;

CREATE TABLE `noteinfo` (
  `NoteID` int(11) NOT NULL AUTO_INCREMENT,
  `NoteTitle` varchar(60) NOT NULL,
  `NoteContent` varchar(255) NOT NULL,
  `NotePublisher` varchar(10) NOT NULL,
  `ReleasedTime` varchar(20) NOT NULL,
  PRIMARY KEY (`NoteID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `noteinfo` */

insert  into `noteinfo`(`NoteID`,`NoteTitle`,`NoteContent`,`NotePublisher`,`ReleasedTime`) values 
(1,'干部考核系统发布了。','<p>河南城建学院干部考核系统发布了。加油干</p>\r\n','白燕','2019-01-29'),
(4,'干部考核系统开始测试啦啦','<p>系统开始测试啦，大家赶快来呀。</p>\r\n','柳运昌','2019-01-31'),
(5,'干部考核系统开始测试啦啦','<p>系统开始测试啦，大家赶快来呀。炸</p>\r\n','柳运昌','2019-01-31'),
(8,'2019年第1次中层干部调查问卷','<p>2019年第1次中层干部调查问卷开始啦！</p>\r\n','白燕','2019-03-11'),
(9,'2019年第1次中层干部调查问卷开始啊','<p>2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊</p>\r\n','白燕','2019-03-11'),
(10,'2019年第1次中层干部调查问卷开始举行','<p>2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊</p>\r\n','白燕','2019-03-11');

/*Table structure for table `pswjdc_417258` */

DROP TABLE IF EXISTS `pswjdc_417258`;

CREATE TABLE `pswjdc_417258` (
  `voteId` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `voteTime` varchar(100) NOT NULL,
  `zcgbztpj1` varchar(4) NOT NULL,
  `jcgbztpj2` varchar(4) NOT NULL,
  `zggbztpj3` varchar(4) NOT NULL,
  `zcbzjgpj4` varchar(4) NOT NULL,
  `zcgbzfpj5` varchar(4) NOT NULL,
  `zcbzzxpj6` varchar(4) NOT NULL,
  `zcbzjcpj7` varchar(4) NOT NULL,
  `zcbzyx8` varchar(40) NOT NULL,
  `zcgbyspj9` varchar(4) NOT NULL,
  `zcgbmzys10` varchar(4) NOT NULL,
  `zcgbddgc11` varchar(4) NOT NULL,
  `zcgbqzlz12` varchar(4) NOT NULL,
  `zcgbxnlj13` varchar(4) NOT NULL,
  `zcgbllxx14` varchar(4) NOT NULL,
  `zcgbdjfz15` varchar(4) NOT NULL,
  `zcgbzdj16` varchar(4) NOT NULL,
  `zcgbgzzt17` varchar(40) NOT NULL,
  `szydyxqk18` varchar(4) NOT NULL,
  `zcgbzfjs19` varchar(40) NOT NULL,
  `zcgbsztg20` varchar(40) NOT NULL,
  `zcgbblzf21` varchar(40) NOT NULL,
  `zcgbcyzd22` varchar(4) NOT NULL,
  `zcgbzfjq23` varchar(40) NOT NULL,
  `zcgbzfjy24` varchar(200) NOT NULL,
  `voteIssue` int(255) NOT NULL,
  PRIMARY KEY (`voteId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `pswjdc_417258` */

insert  into `pswjdc_417258`(`voteId`,`UserID`,`DeptID`,`voteTime`,`zcgbztpj1`,`jcgbztpj2`,`zggbztpj3`,`zcbzjgpj4`,`zcgbzfpj5`,`zcbzzxpj6`,`zcbzjcpj7`,`zcbzyx8`,`zcgbyspj9`,`zcgbmzys10`,`zcgbddgc11`,`zcgbqzlz12`,`zcgbxnlj13`,`zcgbllxx14`,`zcgbdjfz15`,`zcgbzdj16`,`zcgbgzzt17`,`szydyxqk18`,`zcgbzfjs19`,`zcgbsztg20`,`zcgbblzf21`,`zcgbcyzd22`,`zcgbzfjq23`,`zcgbzfjy24`,`voteIssue`) values 
(2,928,0,'2019-07-13 23:43','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','que测试',417258);

/*Table structure for table `pswjdc_799417` */

DROP TABLE IF EXISTS `pswjdc_799417`;

CREATE TABLE `pswjdc_799417` (
  `voteId` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `voteTime` varchar(100) NOT NULL,
  `zcgbztpj1` varchar(4) NOT NULL,
  `jcgbztpj2` varchar(4) NOT NULL,
  `zggbztpj3` varchar(4) NOT NULL,
  `zcbzjgpj4` varchar(4) NOT NULL,
  `zcgbzfpj5` varchar(4) NOT NULL,
  `zcbzzxpj6` varchar(4) NOT NULL,
  `zcbzjcpj7` varchar(4) NOT NULL,
  `zcbzyx8` varchar(40) NOT NULL,
  `zcgbyspj9` varchar(4) NOT NULL,
  `zcgbmzys10` varchar(4) NOT NULL,
  `zcgbddgc11` varchar(4) NOT NULL,
  `zcgbqzlz12` varchar(4) NOT NULL,
  `zcgbxnlj13` varchar(4) NOT NULL,
  `zcgbllxx14` varchar(4) NOT NULL,
  `zcgbdjfz15` varchar(4) NOT NULL,
  `zcgbzdj16` varchar(4) NOT NULL,
  `zcgbgzzt17` varchar(40) NOT NULL,
  `szydyxqk18` varchar(4) NOT NULL,
  `zcgbzfjs19` varchar(40) NOT NULL,
  `zcgbsztg20` varchar(40) NOT NULL,
  `zcgbblzf21` varchar(40) NOT NULL,
  `zcgbcyzd22` varchar(4) NOT NULL,
  `zcgbzfjq23` varchar(40) NOT NULL,
  `zcgbzfjy24` varchar(200) NOT NULL,
  PRIMARY KEY (`voteId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `pswjdc_799417` */

/*Table structure for table `qz_ldbzkhinfo_472739` */

DROP TABLE IF EXISTS `qz_ldbzkhinfo_472739`;

CREATE TABLE `qz_ldbzkhinfo_472739` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `DDJS` varchar(255) NOT NULL,
  `LDNL` varchar(255) NOT NULL,
  `GZSJ` varchar(255) NOT NULL,
  `LZJS` varchar(255) NOT NULL,
  `XXJY` varchar(255) NOT NULL,
  `ZTPJ` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `kh_qzDept` (`DeptID`) USING BTREE,
  KEY `kh_qzUser` (`UserID`) USING BTREE,
  CONSTRAINT `kh_qzDept` FOREIGN KEY (`DeptID`) REFERENCES `deptinfo` (`DeptID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kh_qzUser` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `qz_ldbzkhinfo_472739` */

insert  into `qz_ldbzkhinfo_472739`(`id`,`UserID`,`DeptID`,`DDJS`,`LDNL`,`GZSJ`,`LZJS`,`XXJY`,`ZTPJ`) values 
(33,922,25,'0','0','0','0','0','0'),
(34,953,25,'0','0','0','0','0','0');

/*Table structure for table `qz_ldcykhinfo_472739` */

DROP TABLE IF EXISTS `qz_ldcykhinfo_472739`;

CREATE TABLE `qz_ldcykhinfo_472739` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `BPUserID` int(11) NOT NULL,
  `ZZSX` varchar(255) NOT NULL,
  `GZNL` varchar(255) NOT NULL,
  `GZZF` varchar(255) NOT NULL,
  `YFBS` varchar(255) NOT NULL,
  `LXYZ` varchar(255) NOT NULL,
  `LJZV` varchar(255) NOT NULL,
  `ZTPJ` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `qzcy_User` (`UserID`) USING BTREE,
  KEY `qzcy_BP` (`BPUserID`) USING BTREE,
  CONSTRAINT `qzcy_BP` FOREIGN KEY (`BPUserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `qzcy_User` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `qz_ldcykhinfo_472739` */

insert  into `qz_ldcykhinfo_472739`(`id`,`UserID`,`BPUserID`,`ZZSX`,`GZNL`,`GZZF`,`YFBS`,`LXYZ`,`LJZV`,`ZTPJ`) values 
(141,922,401,'0','0','0','0','0','0','0'),
(142,922,402,'0','0','0','0','0','0','0'),
(143,922,403,'0','0','0','0','0','0','0'),
(144,922,404,'0','0','0','0','0','0','0'),
(145,922,405,'0','0','0','0','0','0','0'),
(146,953,401,'0','0','0','0','0','0','0'),
(147,953,402,'0','0','0','0','0','0','0'),
(148,953,403,'0','0','0','0','0','0','0'),
(149,953,404,'0','0','0','0','0','0','0'),
(150,953,405,'0','0','0','0','0','0','0');

/*Table structure for table `role_menu` */

DROP TABLE IF EXISTS `role_menu`;

CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `role_menu` */

/*Table structure for table `superinfo` */

DROP TABLE IF EXISTS `superinfo`;

CREATE TABLE `superinfo` (
  `SuperID` int(11) NOT NULL AUTO_INCREMENT,
  `SuperName` varchar(20) NOT NULL,
  `SuperPwd` varchar(80) NOT NULL,
  `SuperMemo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SuperID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `superinfo` */

insert  into `superinfo`(`SuperID`,`SuperName`,`SuperPwd`,`SuperMemo`) values 
(1,'admin','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S',NULL);

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gb` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `test` */

insert  into `test`(`ID`,`gb`) values 
(1,1),
(2,1),
(3,1),
(4,150),
(5,150),
(6,150),
(7,150),
(8,150);

/*Table structure for table `userinfo` */

DROP TABLE IF EXISTS `userinfo`;

CREATE TABLE `userinfo` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Account` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Passwd` varchar(80) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `DeptID` int(11) DEFAULT NULL,
  `LevelID` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `logtimes` int(11) DEFAULT '0',
  `IsDB` int(255) DEFAULT NULL,
  PRIMARY KEY (`UserID`) USING BTREE,
  KEY `fk_deptid` (`DeptID`) USING BTREE,
  KEY `fk_levelid` (`LevelID`) USING BTREE,
  CONSTRAINT `fk_deptid` FOREIGN KEY (`DeptID`) REFERENCES `deptinfo` (`DeptID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_levelid` FOREIGN KEY (`LevelID`) REFERENCES `levelinfo` (`LevelID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=955 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `userinfo` */

insert  into `userinfo`(`UserID`,`Account`,`UserName`,`Passwd`,`Photo`,`DeptID`,`LevelID`,`session_id`,`logtimes`,`IsDB`) values 
(315,'30081021','孙留山','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',1,2,'bf66jdv14lpvb500fh58a3jrm0',92,0),
(316,'30081022','姜  欣','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',1,3,'8cdglrh7e2a4r4raj6ireu4ra0',3,0),
(317,'30081023','张守义','$2a$08$2kijbS.zyuS5Qbi2mSFOB.c2GrKLU0YSBmq79Eq2IgVwa2yth9qsK','upload/head-student.png',1,3,'9ed2kudhphdv77jvffq5n20pv0',2,0),
(318,'30081024','田中敏','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/10004693-44A3-4C58-B08D-3805C404DE22.jpeg',2,2,'vq8f8b42ivh5k0ur5rslg20au6',2,0),
(319,'30081025','王世翔','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',2,3,'equl3pn4k2mvkqh2ik65dkdt67',2,0),
(320,'30081026','吴  晶','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',2,3,NULL,0,0),
(321,'30081027','白  燕','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',3,2,NULL,0,0),
(322,'30081028','吴晓红','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',3,3,NULL,0,0),
(323,'30081029','舒雪冬','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',3,3,'avd2tmb7sfgjgg7tgehceu3bm2',1,0),
(324,'30081030','张建国','$2a$08$KHxB/88tFJmJj2TQdKyyj.7SIBjZYrWfp6JEw8xrBZHJCVmSkNNcC','images/head-student.png',4,2,'h4ed03s40em0ho44chcbl6gv03',4,0),
(325,'30081031','王  哲','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',4,3,'lp26a1o8etdjhdri1ms29v1p75',1,0),
(326,'30081032','杨  璐','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',5,3,'htmikd1b0u71act7gh8u9tn3r1',1,0),
(327,'30081033','殷战稳','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',5,2,'f3022pvgm4ecib10msa5sgnjk1',1,0),
(328,'30081034','赵灵芝','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',5,3,'4ltspo83j9porq2mg2jkkihlj0',2,0),
(329,'30081035','樊昀瑛','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',5,3,'grp1ehjihh531q1qkn8susic06',1,0),
(330,'30081036','杜留记','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',5,3,'reo14560kl5m26d24u8b99d1l0',2,0),
(331,'30081037','侯占营','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',6,2,'qfdluca6rsni007cpnrqkg2c67',1,0),
(332,'30081038','王  译','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',6,3,'rm0scmfkrmp8lbqpuppeseptu5',6,0),
(333,'30081039','褚清营','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',6,3,'crhlcgkr6imum98l055fijsvm7',1,0),
(334,'30081040','毕军贤','$2a$08$hmKl1te670VjJJRQgvOSCuSEKQwCRD3YEBqGaqtge8rUp5iTHxtBK','upload/QQ图片20190713212335.jpg',7,2,'qtd19r5qafo5t11usrg0bbsdn6',5,0),
(335,'30081041','杨高峰','$2a$08$0fPc8YNtcHCyc7cZMzsxfuuqIVai.t2LIvH8mGxJoEaBMROTFuY0G','upload/QQ图片20190713212335.jpg',7,3,'2uivnp512qa6jr6mse9s4j1te3',2,0),
(336,'30081042','王东旭','$2a$08$aJonVq4Qot/sLKOpIFDWS.7CSqBbdw6wEhapR39lN0KmwlpzIwMNa','images/head-student.png',7,3,'brrjh9hea49tapap9qb9ths2d7',2,0),
(337,'30081043','赵安芳','$2a$08$n7TYr4JD9QtMCVCdQ9Ul3OrdsszjpLZO8yBAiDfHG593gV0CfU1o2','images/head-student.png',8,2,'ns8ujh0kaujktocue7au2mq6p2',1,0),
(338,'30081044','赵兴涛','$2a$08$sRUDR0H0zyjOk2jmTyzGLe8SVj3NY0eDScRmbBizuWoxZ8jiu9Vsi','images/head-student.png',8,3,'fl6v7op68bsbupn5k8fjajgn85',2,0),
(339,'30081045','霍松涛','$2a$08$oPibcdXd80Cz/HYPfnQSkeO49e95pEM5Y2wZRW8dPDQv06Ng4EiUi','upload/QQ图片20190713212335.jpg',8,3,'et4si1gh5dhkl7gd94rk74rhm3',2,0),
(340,'30081046','郭金敏','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',8,3,'55t7oo2vi9qba3is042gtl4234',3,0),
(341,'30081047','马明江','$2a$08$OUvnH5FEr8soCqOqSZcQouWpTylwHPVF.ypGVuDhFOt9NxliQh8NO','images/head-student.png',9,2,'ss2b44rqbku0cklhq6096op2c4',1,0),
(342,'30081048','曹恒慧','$2a$08$LWViTyAQrB/t8N6gzoQ60uxACAm9OZ2JJPDFFPvsqZc/fqlr0LImG','images/head-student.png',9,3,'8c3lasmorsak1041t9mmvqa0f7',2,0),
(343,'30081049','张大力','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',9,3,'bnufdjorukhaehlo69l90c85k4',3,0),
(344,'30081050','张洪力','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/a53d93cacef402348d9f6794617585e.jpg',10,2,'493nlkqcdatcvfeh1b8s1bqhq6',3,0),
(345,'30081051','高成全','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',10,3,'6rtt0b9u0t21km7f7qj37mpki7',1,0),
(346,'30081052','苗道华','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',10,3,NULL,0,0),
(347,'30081053','郑豪民','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',11,2,NULL,0,0),
(348,'30081054','徐明升','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',11,3,NULL,0,0),
(349,'30081055','闫继涛','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',12,2,'6tl6gg3f10ghu3ld1r1t6u1o41',1,0),
(350,'30081056','何  燚','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',12,3,'hnpvr6igg4qis26ofv583mgm01',2,0),
(351,'30081057','李涛飞','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',12,3,NULL,0,0),
(352,'30081058','马照民','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',13,2,NULL,0,0),
(353,'30081059','张晓丽','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',13,3,NULL,0,0),
(354,'30081060','李旭伟','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',13,3,NULL,0,0),
(355,'30081061','牛季收','$2a$08$ZzDYSOPqvNJauHZOONWLIucQl/UFBN6E.3KW331UwwntjBdaq36ya','upload/v2-11a2542b24e382d67ff9e086701ec5ad.jpg',14,2,'ptks0octcjlkqe30oqei9qqjh0',7,0),
(356,'30081062','李红群','$2a$08$VTBw9UBg8nU207vKxI4jsO8M7sVqjehngebPFVpdKu.81bIESNdsu','images/head-student.png',14,3,'2qt65nhtfori55bfm7m45h8ge0',2,0),
(357,'30081063','范光明','$2a$08$mJgOwidiPTSY23s77tl/i.GCMPsKCS50GGpPQfmcz7Pa3xPfvVQLe','upload/v2-1057a075108039a6ed173f6ce443b1a3.jpg',14,3,'cu5v9d7885qq58h6bjrak2lnn2',4,0),
(358,'30081064','陈松涛','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',15,2,NULL,0,0),
(359,'30081065','张群祎','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/未标题-1.jpg',15,3,'shsjbb09c13354imuen0bmh3l3',1,0),
(360,'30081066','李永献','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',15,3,'1nau319ohqb507jtqk9stv1kv4',2,0),
(361,'30081067','闫中华','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',16,2,NULL,0,0),
(362,'30081068','周桂芳','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',16,3,NULL,0,0),
(363,'30081069','陈艳民','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',16,3,NULL,0,0),
(364,'30081070','孙方行','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',17,2,NULL,0,0),
(365,'30081071','欧阳华澍','$2a$08$NQQPYIJVYFj6tXD/.9zCyOzzNk51riJiZq6y6y7kpZWerd5SC.UI6','upload/婷婷.jpg',17,3,'914j7u4kt91egu1mpmmd99tv55',5,0),
(366,'30081072','李青岭','$2a$08$8.QoN3A50PRrL5dg2PGEuecvOL7meHaRS82HPfd6UfRCYS6akU7LC','images/head-student.png',18,2,'govkhafn9c0f2cupfvj2uh3146',2,0),
(367,'30081073','宋新生','$2a$08$kPOKxG8maQ2V/9DmmXi5iOJXzbcovRyCN9WzHil53MBRIeSdHWLLC','images/head-student.png',18,2,'ct3aegct52i6di099qe68ulq97',1,0),
(368,'30081074','卫国祥','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',18,3,'q634qv9872smedcihe1cp2spk7',1,0),
(369,'30081075','尹振羽','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',18,3,'dt04i581s2eob6c2jo9ojluhi3',1,0),
(370,'30081076','朱  凯','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',18,3,'t716tfq3tlnurg3fv57vod7ms1',2,0),
(371,'30081077','李爱增','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',18,3,NULL,0,0),
(372,'30081078','谢学明','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',19,2,'5so5a4o43i9vu00k2b2glvi201',1,0),
(373,'30081079','闫  瑾','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/u=15576430,1042561804&fm=27&gp=0.jpg',19,2,'3qsdaf7mvjtgvi96cov9kveqa7',2,0),
(374,'30081080','刘  钦','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/u=15576430,1042561804&fm=27&gp=0.jpg',19,3,'grp12l2hcmf7qjbav1a9jvf9j2',1,0),
(375,'30081081','马  斌','$2a$08$QHcmJx/PXDgZBbAit1yx6e6pBkF7aMl2wyXS.pauCnYWEndBzFdDG','upload/13f9b866e397c44c78820b8c59502c52.jpg',19,3,'rns23afhsc7b2843sduold1at3',8,0),
(376,'30081082','祖立厂','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',19,3,'51jtsrfr3uajlcf91mab333pd6',2,0),
(377,'30081083','王  宏','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',19,3,NULL,0,0),
(378,'30081084','马宁奇','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',20,2,NULL,0,0),
(379,'30081085','郭一飞','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',20,2,NULL,0,0),
(380,'30081086','朱泮民','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',20,3,NULL,0,0),
(381,'30081087','田长勋','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',20,3,NULL,0,0),
(382,'30081088','毛艳丽','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',20,3,NULL,0,0),
(383,'30081089','王  森','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',21,2,NULL,0,0),
(384,'30081090','邢  燕','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',21,2,NULL,0,0),
(385,'30081091','周  勃','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',21,3,NULL,0,0),
(386,'30081092','郭  汝','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',21,3,NULL,0,0),
(387,'30081093','朱晓菲','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',21,3,NULL,0,0),
(388,'30081094','刘海燕','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',22,2,NULL,0,0),
(389,'30081095','马良涛','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',22,2,NULL,0,0),
(390,'30081096','弓亚超','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',22,3,NULL,0,0),
(391,'30081097','周恒涛','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',22,3,NULL,0,0),
(392,'30081098','吕鹏飞','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',23,2,NULL,0,0),
(393,'30081099','张宏敏','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',23,2,'j4qp54vf4dc32hnvvbqpnulb02',1,0),
(394,'30081100','卫柳艳','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',23,3,NULL,0,0),
(395,'30081101','刘贵明','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',23,3,NULL,0,0),
(396,'30081102','高松峰','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',23,3,NULL,0,0),
(397,'30081103','马步伟','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',24,2,NULL,0,0),
(398,'30081104','陈玉兴','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',24,2,NULL,0,0),
(399,'30081105','李  阳','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',24,3,NULL,0,0),
(400,'30081106','汤喜辉','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',24,3,NULL,0,0),
(401,'30081107','李宝宏','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',25,2,NULL,0,0),
(402,'30081108','何宗耀','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/08ADDDAD-F4DB-4B59-B023-A22805C6BBF3.png',25,2,'rvaabachj58gajprv2cob10vh1',17,0),
(403,'30081109','张  星','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/2.jpeg',25,3,'4o4b17aijj4l3v509ioe6h4ga5',6,0),
(404,'30081110','赵军民','$2a$08$7uSL/iadv6pFeKG4eKyZJOA8ckso94b0/XVHI8uuBpXjwKwgnxWku','images/head-student.png',25,3,'118j00usgmpdqush2d1419pbg4',3,0),
(405,'30081111','张俊峰','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',25,3,NULL,0,0),
(406,'30081112','赵静生','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',26,2,NULL,0,0),
(407,'30081113','樊晓虹','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',26,2,NULL,0,0),
(408,'30081114','董燕飞','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',26,3,NULL,0,0),
(409,'30081115','孙炳海','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',26,3,NULL,0,0),
(410,'30081116','韩耀飞','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',26,3,NULL,0,0),
(411,'30081117','焦学然','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',27,2,NULL,0,0),
(412,'30081118','赵海鹏','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',27,2,NULL,0,0),
(413,'30081119','赵振新','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',27,3,NULL,0,0),
(414,'30081120','雷佑安','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',27,3,NULL,0,0),
(415,'30081121','丁明洁','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',27,3,NULL,0,0),
(416,'30081122','金  利','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',28,2,NULL,0,0),
(417,'30081123','李冰冰','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',28,2,NULL,0,0),
(418,'30081124','胡建业','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',28,3,NULL,0,0),
(419,'30081125','谢朝晖','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',28,3,NULL,0,0),
(420,'30081126','刘雅妹','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',29,2,NULL,0,0),
(421,'30081127','徐华锋','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',29,2,NULL,0,0),
(422,'30081128','李富强','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',29,3,NULL,0,0),
(423,'30081129','袁  晓','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',30,2,NULL,0,0),
(424,'30081130','秦平新','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',30,2,NULL,0,0),
(425,'30081131','于修涛','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',30,3,NULL,0,0),
(426,'30081132','秦小锋','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',30,3,NULL,0,0),
(427,'30081133','王艳芳','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',31,2,NULL,0,0),
(428,'30081134','张  强','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',31,2,NULL,0,0),
(429,'30081135','王芹萼','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',31,3,NULL,0,0),
(430,'30081136','常  静','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',32,2,NULL,0,0),
(431,'30081137','杨雷亭','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',32,3,NULL,0,0),
(432,'30081138','赵爱民','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',32,3,NULL,0,0),
(433,'30081139','卢华东','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',33,2,NULL,0,0),
(434,'30081140','段怀录','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',33,3,NULL,0,0),
(435,'30081141','米启超','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',34,2,NULL,0,0),
(436,'30081142','王许涛','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',34,3,NULL,0,0),
(437,'30081143','刘艳杰','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',34,3,NULL,0,0),
(438,'30081144','董兴华','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',34,3,NULL,0,0),
(439,'30081145','马东晓','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',35,2,NULL,0,0),
(440,'30081146','樊铮钰','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',35,3,NULL,0,0),
(441,'30081147','张溪潺','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',36,2,NULL,0,0),
(442,'30081148','李红亚','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',37,2,NULL,0,0),
(443,'30081149','闫  涛','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',38,2,NULL,0,0),
(444,'30081150','张  凯','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',38,3,NULL,0,0),
(445,'30081151','刘新民','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',39,2,NULL,0,0),
(446,'30081152','胡红伟','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',39,3,NULL,0,0),
(447,'30081153','张法成','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',40,2,NULL,0,0),
(448,'30081154','樊继宏','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',40,3,NULL,0,0),
(449,'30081155','杨新民','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',40,3,NULL,0,0),
(450,'30081156','武伯军','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',41,2,NULL,0,0),
(451,'30081157','蒋剑虹','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',41,3,NULL,0,0),
(452,'30081158','张玉焕','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',42,2,NULL,0,0),
(453,'30081159','蔡宝森','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',42,3,NULL,0,0),
(454,'30081160','景  勤','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',42,3,NULL,0,0),
(455,'30081161','杜玲枝','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',43,2,NULL,0,0),
(456,'30081162','杨广建','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',44,2,NULL,0,0),
(457,'30081163','赵宝山','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',44,3,NULL,0,0),
(458,'30081164','程建敏','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',44,3,'l97ststjtos47htbu20pgrta62',4,0),
(459,'30081165','朱新锋','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',44,3,NULL,0,0),
(460,'30081166','张奉举','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',45,2,'1mnta92t9q5knds9cjc9sm1cm5',1,0),
(461,'30081167','张龙栓','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',45,3,NULL,0,0),
(462,'30081168','罗  代','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',45,3,NULL,0,0),
(463,'30081169','刘 健','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',45,3,NULL,0,0),
(922,'20161021','柳运昌','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/head-student.png',25,4,'3q5jb7u294ko7ud6k4l8o8jga0',7,0),
(923,'30080803','张娜','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',25,4,'j936sufrpsli0dhioj2gu5hra1',26,0),
(924,'30080804','郭力争','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',25,4,'dku01krsv5ep3noq525s3avdd1',6,0),
(925,'30080805','陈红军','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',25,4,'sub3n5d31n5cma9kf2dq8i1f41',2,0),
(926,'20170106','史春雷','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/img_tea.png',25,4,'onil6dl1akl2c51svoge238ms0',1,0),
(927,'30080806','刘荣辉','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',25,4,'udm8lt604jof4q381ht4se9uo3',7,0),
(949,'30081171','测试一','$2a$08$O/y9EtCAzSmRVAEQPvsoP.QeXhGjBwp8GWfmUUreApx7YawokZhGK','images/head-student.png',46,2,NULL,0,NULL),
(950,'30081172','测试二','$2a$08$GeK3L4TPm7BRIC29XqzDKeRIHoNA6412bU0Gy2baP82UVyYHoXN5.','images/head-student.png',46,3,NULL,0,NULL),
(951,'20161022','测试三','$2a$08$NxymotAFR2JaxEG9TTtcbOcuy5F3NufRZwrIULpYQBG9NRX3N7PHG','images/head-student.png',46,4,NULL,0,NULL),
(952,'20161023','测试四','$2a$08$OM7r9nuGS87PTwRpCRpM6uQVZ6lRg2lfzcEIA.10CQ0yb4FqfFJMq','images/head-student.png',46,6,'u6s4jfou97ah98tug5rcdne4d7',1,NULL),
(953,'20161000','测试一','$2a$08$FSbNrmM9M8C6bPP68GXcHuT/SEJVU8N7njwsegnJzRMX9BLjWTQke','images/head-student.png',25,6,'8ob20cdknfglllhacerlmp9mb6',4,NULL),
(954,'30081000','王梦琪','$2a$08$NPIMJiVsC.pq8CPBsGqQFOJQWtZSbRLR.AO8DZityuciYjAkMcNn6','images/head-student.png',25,6,NULL,0,NULL);

/*Table structure for table `vote_questions` */

DROP TABLE IF EXISTS `vote_questions`;

CREATE TABLE `vote_questions` (
  `questionID` int(11) NOT NULL AUTO_INCREMENT,
  `parent_qid` int(11) NOT NULL DEFAULT '0',
  `RecordID` int(11) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL DEFAULT '',
  `question` text NOT NULL,
  PRIMARY KEY (`questionID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `vote_questions` */

/*Table structure for table `voteinfo` */

DROP TABLE IF EXISTS `voteinfo`;

CREATE TABLE `voteinfo` (
  `voteId` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `voteTime` varchar(100) NOT NULL,
  `voteIssue` varchar(40) NOT NULL,
  `zcgbztpj1` int(11) NOT NULL,
  `jcgbztpj2` int(11) NOT NULL,
  `zggbztpj3` int(11) NOT NULL,
  `zcbzjgpj4` int(11) NOT NULL,
  `zcgbzfpj5` int(11) NOT NULL,
  `zcbzzxpj6` int(11) NOT NULL,
  `zcbzjcpj7` int(11) NOT NULL,
  `zcbzyx8` varchar(40) NOT NULL,
  `zcgbyspj9` int(11) NOT NULL,
  `zcgbmzys10` int(11) NOT NULL,
  `zcgbddgc11` int(11) NOT NULL,
  `zcgbqzlz12` int(11) NOT NULL,
  `zcgbxnlj13` int(11) NOT NULL,
  `zcgbllxx14` int(11) NOT NULL,
  `zcgbdjfz15` int(11) NOT NULL,
  `zcgbzdj16` int(11) NOT NULL,
  `zcgbgzzt17` varchar(40) NOT NULL,
  `szydyxqk18` int(11) NOT NULL,
  `zcgbzfjs19` varchar(80) NOT NULL,
  `zcgbsztg20` varchar(20) NOT NULL,
  `zcgbblzf21` varchar(200) NOT NULL,
  `zcgbcyzd22` int(11) NOT NULL,
  `zcgbzfjq23` varchar(200) NOT NULL,
  `zcgbzfjy24` varchar(200) NOT NULL,
  PRIMARY KEY (`voteId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `voteinfo` */

/*Table structure for table `voteinfo_new` */

DROP TABLE IF EXISTS `voteinfo_new`;

CREATE TABLE `voteinfo_new` (
  `voteId` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `voteTime` varchar(100) NOT NULL,
  `voteIssue` varchar(40) NOT NULL,
  `zcgbztpj1` varchar(4) NOT NULL,
  `jcgbztpj2` varchar(4) NOT NULL,
  `zggbztpj3` varchar(4) NOT NULL,
  `zcbzjgpj4` varchar(4) NOT NULL,
  `zcgbzfpj5` varchar(4) NOT NULL,
  `zcbzzxpj6` varchar(4) NOT NULL,
  `zcbzjcpj7` varchar(4) NOT NULL,
  `zcbzyx8` varchar(40) NOT NULL,
  `zcgbyspj9` varchar(4) NOT NULL,
  `zcgbmzys10` varchar(4) NOT NULL,
  `zcgbddgc11` varchar(4) NOT NULL,
  `zcgbqzlz12` varchar(4) NOT NULL,
  `zcgbxnlj13` varchar(4) NOT NULL,
  `zcgbllxx14` varchar(4) NOT NULL,
  `zcgbdjfz15` varchar(4) NOT NULL,
  `zcgbzdj16` varchar(4) NOT NULL,
  `zcgbgzzt17` varchar(40) NOT NULL,
  `szydyxqk18` varchar(4) NOT NULL,
  `zcgbzfjs19` varchar(40) NOT NULL,
  `zcgbsztg20` varchar(40) NOT NULL,
  `zcgbblzf21` varchar(40) NOT NULL,
  `zcgbcyzd22` varchar(4) NOT NULL,
  `zcgbzfjq23` varchar(40) NOT NULL,
  `zcgbzfjy24` varchar(200) NOT NULL,
  PRIMARY KEY (`voteId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `voteinfo_new` */

/*Table structure for table `voterecord` */

DROP TABLE IF EXISTS `voterecord`;

CREATE TABLE `voterecord` (
  `RecordID` int(11) NOT NULL AUTO_INCREMENT,
  `RecordName` varchar(20) NOT NULL,
  `RecordCode` varchar(6) NOT NULL,
  `starttime` varchar(40) NOT NULL,
  `endtime` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `describtion` text,
  `welcome` text,
  `end` text,
  `evalutiontype` varchar(20) DEFAULT NULL,
  `khtype` int(11) NOT NULL,
  PRIMARY KEY (`RecordID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `voterecord` */

insert  into `voterecord`(`RecordID`,`RecordName`,`RecordCode`,`starttime`,`endtime`,`status`,`describtion`,`welcome`,`end`,`evalutiontype`,`khtype`) values 
(6,'2019年干部考核第2次问卷调查','417258','2019-03-1','2019-12-30','Running',NULL,NULL,NULL,'平时考核',0),
(7,'2019年中层干部第3次问卷调查','799417','2019-07-12','2019-12-10','Finished','2019年中层干部第3次问卷调查','欢迎参加','感谢投票','平时考核',0),
(8,'2019年第4次问卷调查','768573','2019-04-12','2019-12-10','Finished','<p>2019年第4次中层干部问卷调查</p>','欢迎您积极参与问卷调查','感谢您的支持！','平时考核',0),
(9,'2019年中层干部综合考评','472739','2019-04-12','2019-05-31','Running','<p>2019年中层干部综合考评</p>','<p>欢迎大家参与2019年中层干部综合考评</p>','<p>感谢大家参与2019年中层干部综合考评</p>',NULL,1),
(10,'测试问卷','178964','2019-07-13','2019-07-15','Running','','','',NULL,0);

/*Table structure for table `voterecord_799417` */

DROP TABLE IF EXISTS `voterecord_799417`;

CREATE TABLE `voterecord_799417` (
  `voteId` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `voteTime` varchar(100) NOT NULL,
  `voteIssue` varchar(40) NOT NULL,
  `zcgbztpj1` varchar(4) NOT NULL,
  `jcgbztpj2` varchar(4) NOT NULL,
  `zggbztpj3` varchar(4) NOT NULL,
  `zcbzjgpj4` varchar(4) NOT NULL,
  `zcgbzfpj5` varchar(4) NOT NULL,
  `zcbzzxpj6` varchar(4) NOT NULL,
  `zcbzjcpj7` varchar(4) NOT NULL,
  `zcbzyx8` varchar(40) NOT NULL,
  `zcgbyspj9` varchar(4) NOT NULL,
  `zcgbmzys10` varchar(4) NOT NULL,
  `zcgbddgc11` varchar(4) NOT NULL,
  `zcgbqzlz12` varchar(4) NOT NULL,
  `zcgbxnlj13` varchar(4) NOT NULL,
  `zcgbllxx14` varchar(4) NOT NULL,
  `zcgbdjfz15` varchar(4) NOT NULL,
  `zcgbzdj16` varchar(4) NOT NULL,
  `zcgbgzzt17` varchar(40) NOT NULL,
  `szydyxqk18` varchar(4) NOT NULL,
  `zcgbzfjs19` varchar(40) NOT NULL,
  `zcgbsztg20` varchar(40) NOT NULL,
  `zcgbblzf21` varchar(40) NOT NULL,
  `zcgbcyzd22` varchar(4) NOT NULL,
  `zcgbzfjq23` varchar(40) NOT NULL,
  `zcgbzfjy24` varchar(200) NOT NULL,
  PRIMARY KEY (`voteId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `voterecord_799417` */

/*Table structure for table `zc_ldbzkhinfo_472739` */

DROP TABLE IF EXISTS `zc_ldbzkhinfo_472739`;

CREATE TABLE `zc_ldbzkhinfo_472739` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `voteTime` varchar(100) NOT NULL,
  `ZHKH` varchar(255) NOT NULL,
  `bz` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE,
  KEY `bz_User` (`UserID`) USING BTREE,
  KEY `bz_Dept` (`DeptID`) USING BTREE,
  CONSTRAINT `bz_Dept` FOREIGN KEY (`DeptID`) REFERENCES `deptinfo` (`DeptID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bz_User` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=743 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='中层领导班子互评完成，在isvote_472739中插入1';

/*Data for the table `zc_ldbzkhinfo_472739` */

insert  into `zc_ldbzkhinfo_472739`(`Id`,`UserID`,`DeptID`,`voteTime`,`ZHKH`,`bz`) values 
(640,315,10,'','1',''),
(641,315,32,'','1',''),
(642,315,38,'','2',''),
(643,315,2,'','0',''),
(644,315,36,'','0',''),
(645,315,42,'','0',''),
(646,315,7,'','0',''),
(647,315,45,'','0',''),
(648,315,17,'','0',''),
(649,315,15,'','0',''),
(650,315,34,'','0',''),
(651,315,41,'','0',''),
(652,315,18,'','0',''),
(653,315,44,'','0',''),
(654,315,14,'','0',''),
(655,315,30,'','1',''),
(656,315,5,'','0',''),
(657,315,39,'','0',''),
(658,315,13,'','0',''),
(659,315,4,'','0',''),
(660,315,16,'','0',''),
(661,315,20,'','0',''),
(662,315,21,'','0',''),
(663,315,37,'','0',''),
(664,315,33,'','0',''),
(665,315,12,'','0',''),
(666,315,8,'','0',''),
(667,315,29,'','0',''),
(668,315,27,'','0',''),
(669,315,6,'','0',''),
(670,315,31,'','0',''),
(671,315,23,'','0',''),
(672,315,28,'','0',''),
(673,315,26,'','0',''),
(674,315,9,'','0',''),
(675,315,19,'','0',''),
(676,315,3,'','0',''),
(677,315,35,'','0',''),
(678,315,46,'','0',''),
(679,315,22,'','0',''),
(680,315,24,'','0',''),
(681,315,25,'','0',''),
(682,315,11,'','0',''),
(683,315,43,'','0',''),
(684,315,40,'','0',''),
(714,922,2,'','0',''),
(715,922,3,'','0',''),
(716,922,4,'','0',''),
(717,922,5,'','0',''),
(718,922,6,'','0',''),
(719,922,7,'','0',''),
(720,922,8,'','0',''),
(721,922,9,'','0',''),
(722,922,10,'','0',''),
(723,922,11,'','0',''),
(724,922,12,'','0',''),
(725,922,13,'','0',''),
(726,922,14,'','0',''),
(727,922,15,'','0',''),
(728,922,16,'','0',''),
(729,922,17,'','0',''),
(730,922,34,'','0',''),
(731,922,35,'','0',''),
(732,922,36,'','0',''),
(733,922,37,'','0',''),
(734,922,38,'','0',''),
(735,922,39,'','0',''),
(736,922,40,'','0',''),
(737,922,41,'','0',''),
(738,922,42,'','0',''),
(739,922,43,'','0',''),
(740,922,44,'','0',''),
(741,922,45,'','0',''),
(742,922,46,'','0','');

/*Table structure for table `zc_ldcykhinfo_472739` */

DROP TABLE IF EXISTS `zc_ldcykhinfo_472739`;

CREATE TABLE `zc_ldcykhinfo_472739` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `BPUserID` int(11) NOT NULL,
  `DDJS` varchar(255) NOT NULL,
  `LDNL` varchar(255) NOT NULL,
  `LZJS` varchar(255) NOT NULL,
  `LXYZ` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `cy_User` (`UserID`) USING BTREE,
  KEY `cy_BP` (`BPUserID`) USING BTREE,
  CONSTRAINT `cy_BP` FOREIGN KEY (`BPUserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cy_User` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2786 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='中层领导互评完成，在isvote_中插入2；';

/*Data for the table `zc_ldcykhinfo_472739` */

insert  into `zc_ldcykhinfo_472739`(`id`,`UserID`,`BPUserID`,`DDJS`,`LDNL`,`LZJS`,`LXYZ`) values 
(2639,315,318,'0','0','0','0'),
(2640,315,319,'0','0','0','0'),
(2641,315,320,'0','0','0','0'),
(2642,315,321,'0','0','0','0'),
(2643,315,322,'0','0','0','0'),
(2644,315,323,'0','0','0','0'),
(2645,315,324,'0','0','0','0'),
(2646,315,325,'0','0','0','0'),
(2647,315,327,'0','0','0','0'),
(2648,315,328,'0','0','0','0'),
(2649,315,329,'0','0','0','0'),
(2650,315,330,'0','0','0','0'),
(2651,315,326,'0','0','0','0'),
(2652,315,331,'0','0','0','0'),
(2653,315,332,'0','0','0','0'),
(2654,315,333,'0','0','0','0'),
(2655,315,334,'0','0','0','0'),
(2656,315,335,'0','0','0','0'),
(2657,315,336,'0','0','0','0'),
(2658,315,339,'0','0','0','0'),
(2659,315,340,'0','0','0','0'),
(2660,315,337,'0','0','0','0'),
(2661,315,338,'0','0','0','0'),
(2662,315,343,'0','0','0','0'),
(2663,315,341,'0','0','0','0'),
(2664,315,342,'0','0','0','0'),
(2665,315,345,'0','0','0','0'),
(2666,315,346,'0','0','0','0'),
(2667,315,344,'0','0','0','0'),
(2668,315,347,'0','0','0','0'),
(2669,315,348,'0','0','0','0'),
(2670,315,349,'0','0','0','0'),
(2671,315,350,'0','0','0','0'),
(2672,315,351,'0','0','0','0'),
(2673,315,352,'0','0','0','0'),
(2674,315,353,'0','0','0','0'),
(2675,315,354,'0','0','0','0'),
(2676,315,356,'0','0','0','0'),
(2677,315,357,'0','0','0','0'),
(2678,315,355,'0','0','0','0'),
(2679,315,359,'0','0','0','0'),
(2680,315,360,'0','0','0','0'),
(2681,315,358,'0','0','0','0'),
(2682,315,362,'0','0','0','0'),
(2683,315,363,'0','0','0','0'),
(2684,315,361,'0','0','0','0'),
(2685,315,364,'0','0','0','0'),
(2686,315,365,'0','0','0','0'),
(2687,315,371,'0','0','0','0'),
(2688,315,366,'0','0','0','0'),
(2689,315,367,'0','0','0','0'),
(2690,315,368,'0','0','0','0'),
(2691,315,369,'0','0','0','0'),
(2692,315,370,'0','0','0','0'),
(2693,315,377,'0','0','0','0'),
(2694,315,372,'0','0','0','0'),
(2695,315,373,'0','0','0','0'),
(2696,315,374,'0','0','0','0'),
(2697,315,375,'0','0','0','0'),
(2698,315,376,'0','0','0','0'),
(2699,315,378,'0','0','0','0'),
(2700,315,379,'0','0','0','0'),
(2701,315,380,'0','0','0','0'),
(2702,315,381,'0','0','0','0'),
(2703,315,382,'0','0','0','0'),
(2704,315,383,'0','0','0','0'),
(2705,315,384,'0','0','0','0'),
(2706,315,385,'0','0','0','0'),
(2707,315,386,'0','0','0','0'),
(2708,315,387,'0','0','0','0'),
(2709,315,388,'0','0','0','0'),
(2710,315,389,'0','0','0','0'),
(2711,315,390,'0','0','0','0'),
(2712,315,391,'0','0','0','0'),
(2713,315,395,'0','0','0','0'),
(2714,315,396,'0','0','0','0'),
(2715,315,392,'0','0','0','0'),
(2716,315,393,'0','0','0','0'),
(2717,315,394,'0','0','0','0'),
(2718,315,400,'0','0','0','0'),
(2719,315,397,'0','0','0','0'),
(2720,315,398,'0','0','0','0'),
(2721,315,399,'0','0','0','0'),
(2722,315,401,'0','0','0','0'),
(2723,315,402,'0','0','0','0'),
(2724,315,403,'0','0','0','0'),
(2725,315,404,'0','0','0','0'),
(2726,315,405,'0','0','0','0'),
(2727,315,406,'0','0','0','0'),
(2728,315,407,'0','0','0','0'),
(2729,315,408,'0','0','0','0'),
(2730,315,409,'0','0','0','0'),
(2731,315,410,'0','0','0','0'),
(2732,315,412,'0','0','0','0'),
(2733,315,413,'0','0','0','0'),
(2734,315,414,'0','0','0','0'),
(2735,315,415,'0','0','0','0'),
(2736,315,411,'0','0','0','0'),
(2737,315,416,'0','0','0','0'),
(2738,315,417,'0','0','0','0'),
(2739,315,418,'0','0','0','0'),
(2740,315,419,'0','0','0','0'),
(2741,315,420,'0','0','0','0'),
(2742,315,421,'0','0','0','0'),
(2743,315,422,'0','0','0','0'),
(2744,315,423,'0','0','0','0'),
(2745,315,424,'0','0','0','0'),
(2746,315,425,'0','0','0','0'),
(2747,315,426,'0','0','0','0'),
(2748,315,427,'0','0','0','0'),
(2749,315,428,'0','0','0','0'),
(2750,315,429,'0','0','0','0'),
(2751,315,430,'0','0','0','0'),
(2752,315,431,'0','0','0','0'),
(2753,315,432,'0','0','0','0'),
(2754,315,433,'0','0','0','0'),
(2755,315,434,'0','0','0','0'),
(2756,315,435,'0','0','0','0'),
(2757,315,436,'0','0','0','0'),
(2758,315,437,'0','0','0','0'),
(2759,315,438,'0','0','0','0'),
(2760,315,439,'0','0','0','0'),
(2761,315,440,'0','0','0','0'),
(2762,315,441,'0','0','0','0'),
(2763,315,442,'0','0','0','0'),
(2764,315,444,'0','0','0','0'),
(2765,315,443,'0','0','0','0'),
(2766,315,445,'0','0','0','0'),
(2767,315,446,'0','0','0','0'),
(2768,315,447,'0','0','0','0'),
(2769,315,448,'0','0','0','0'),
(2770,315,449,'0','0','0','0'),
(2771,315,450,'0','0','0','0'),
(2772,315,451,'0','0','0','0'),
(2773,315,453,'0','0','0','0'),
(2774,315,454,'0','0','0','0'),
(2775,315,452,'0','0','0','0'),
(2776,315,455,'0','0','0','0'),
(2777,315,456,'0','0','0','0'),
(2778,315,457,'0','0','0','0'),
(2779,315,458,'0','0','0','0'),
(2780,315,459,'0','0','0','0'),
(2781,315,461,'0','0','0','0'),
(2782,315,462,'0','0','0','0'),
(2783,315,463,'0','0','0','0'),
(2785,315,460,'0','0','0','0');

/* Trigger structure for table `qz_ldbzkhinfo_472739` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_bzqz` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_bzqz` AFTER INSERT ON `qz_ldbzkhinfo_472739` FOR EACH ROW /*
检索投票人的LevelID
	switch(LevelID){
		case 1 : 校领导评价领导班子：计算校领导数量，单位票数/校领导数量*本票得分率*校领导评价领导班子分数比例
		case 2 or 3 : 中层领导评价其他部门领导班子：计算除本单位的中层领导外的所有中层领导数量，
									单位票数/中层领导数量*本票得分率*中层领导评价其他部门领导班子分数比例
		case 4 : 本部门职工评价领导班子：计算本部门职工数量，单位票数/职工数量*本票得分率*本部门职工评价领导班子分数比例
		case 6 : 教工代表评价所有领导班子：计算所有教工代表数量，单位票数/教工代表数量*本票得分率*教工代表评价领导班子分数比例
*/
begin
declare xld int ;
declare jg int ;
declare gb int ;
declare db int;
declare dba int;
declare dept int;
declare leID int ;


-- 投票人的DEPTID
set dept = (select DeptID from userinfo where UserID=new.UserID);

-- 校级干部数量
set xld =( select count(*) from userinformation where LevelID = 1);

-- 本单位教工数量
set jg = (select count(*) from userinfo where DeptID  = dept and LevelID = 6);

-- 除本单位领导外的所有初级领导数量
set gb = (select count(*) from userinformation where (LevelID = 2 or LevelID =3) AND DeptID <> dept) ;

-- 所有代表数量
set db = (select count(*) from userinformation where LevelID = 4) ;

-- 本次投票人的等级
set leID = (select LevelID from userinfo where UserID = new.UserID);

-- 校级领导评价领导班子
if(leID = 1) then 
	if (new.ZTPJ = 0) then 
	update bz_grade_472739 set grade = grade + 1.00/xld *20 where DeptID = new.DeptID; end if;
	if (new.ZTPJ = 1) then
	update bz_grade_472739 set grade = grade + 1.00/xld *16 where DeptID = new.DeptID; end if;
	if (new.ZTPJ = 2) then
	update bz_grade_472739 set grade = grade + 1.00/xld *12 where DeptID = new.DeptID; end if;
end if;


-- 处级领导互评
if( leID = 2 or leID = 3) then 
if (new.ZTPJ = 0) then 
	update bz_grade_472739 set grade = grade + 1.00/gb *20 where DeptID = new.DeptID; end if;
	if (new.ZTPJ = 1) then
	update bz_grade_472739 set grade = grade + 1.00/gb *16 where DeptID = new.DeptID; end if;
	if (new.ZTPJ = 2) then
	update bz_grade_472739 set grade = grade + 1.00/gb *12 where DeptID = new.DeptID; end if;
end if;

-- 教工代表评价领导班子
if(leID = 4 ) then  
		if (new.ZTPJ = 0) then
		update bz_grade_472739 set grade = grade + 1.00/db *20 where DeptID = new.DeptID; end if;
		if (new.ZTPJ = 1) then
		update bz_grade_472739 set grade = grade + 1.00/db *16 where DeptID = new.DeptID; end if;
		if (new.ZTPJ = 2) then
		update bz_grade_472739 set grade = grade + 1.00/db *12 where DeptID = new.DeptID; end if;
	end if;

-- 普通职工评价领导班子
if(leID = 6 ) then  
		if (new.ZTPJ = 0) then
		update bz_grade_472739 set grade = grade + 1.00/jg *40 where DeptID = new.DeptID; end if;
		if (new.ZTPJ = 1) then
		update bz_grade_472739 set grade = grade + 1.00/jg *32 where DeptID = new.DeptID; end if;
		if (new.ZTPJ = 2) then
		update bz_grade_472739 set grade = grade + 1.00/jg *24 where DeptID = new.DeptID; end if;
	end if;


	end */$$


DELIMITER ;

/* Trigger structure for table `qz_ldcykhinfo_472739` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_grade_zc` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_grade_zc` BEFORE INSERT ON `qz_ldcykhinfo_472739` FOR EACH ROW -- 正副级干部由于能够评价除本部门单位外的所有单位，故而也能评价机关单位
-- 教工代表能够评价机关单位，因此正副级干部权限包含教工代表的权限，因此，正副级干部也可以是教工代表

-- 处级领导干部的得分由三个部分组成，
-- 1.校领导评价 2.本单位教工评价 3.处级干部互评 
/*
注 ： 得分率如此计算： 非常满意 1.0 ，满意 0.8 ，基本满意 0.6，不满意 0

检索投票人的levelid
	switch (LeveID){
		 case 1 : 校领导评价中层干部： 计算校领导数量，单位票数/校领导数量*本票得分率*校领导评价分数比例 
		 case 2 : if (BPleID = 2) { 处级领导互评： 计算除本单位的处级领导所有处级领导数量， 单位票数/处级领导数量*本票得分率*处级领导互评分数比例 }
							if (BPleID = 3) { 处级领导评价副处级领导： 计算本部门正处级领导数量， 			
							单位票数/处级领导数量*本票得分率*处级领导评价副处级领导分数比例}
		 case 3 : 处级领导互评： 计算单位的处级领导所有处级领导数量， 单位票数/处级领导数量*本票得分率*副处级领导互评分数比例
		 default : 普通职工（包括教工代表）评价中层干部： 计算本部门普通职工数量，
							单位票数/普通职工数量*本票得分率*普通职工评价中层干部分数比例
							}
*/
begin
declare xld int ;
declare jg int ;
declare cjgb int;
declare bbzz int;
declare leID int ;
declare dept int;
declare BPleID int;
declare fzgb int;


-- 校级干部数量
set xld =( select count(*) num from userinformation where LevelID = 1);

-- 投票人所属部门
set dept = (select DeptID from userinfo where UserID=new.UserID);

-- 教工数量(包括教工代表）
set jg = (select count(*) from userinformation where DeptID = dept  and LevelID >= 4);

-- 除本部门的所有处级干部
set cjgb = (select count(*) from userinformation where (LevelID = 2 or LevelID = 3) and DeptID <> dept) ;


-- 所属部门正职干部数量
set bbzz = (select count(*) from userinformation where DeptID = dept and LevelID = 2);

-- 本次投票人的LeID
set leID = (select LevelID from userinfo where UserID = new.UserID);

-- 被投人的leID
set BPleID = (select LevelID from userinfo where UserID = new.BPUserID);


-- 校领导投票
if(leID = 1) then 
	if (new.ZTPJ = 0) then 
	update grades_472739 set grade = grade + 1.00/xld *20 where UserID = new.BPUserID; end if;
	if (new.ZTPJ = 1) then
	update grades_472739 set grade = grade + 1.00/xld *16 where UserID = new.BPUserID; end if;
	if (new.ZTPJ = 2) then
	update grades_472739 set grade = grade + 1.00/xld *12 where UserID = new.BPUserID; end if;
end if;


-- 处级领导（正处级）互评或者正职评副职
if( leID = 2) then 
		-- 正职互评
	if (BPleID = 2 or BPleID = 3) then 
		if (new.ZTPJ = 0) then 
		update grades_472739 set grade = grade + 1.00/zzgb *20 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 1) then
		update grades_472739 set grade = grade + 1.00/zzgb *16 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 2) then
		update grades_472739 set grade = grade + 1.00/zzgb *12 where UserID = new.BPUserID; end if;
	end if;
	-- 正职评副职
	if (BPleID = 3) then
		if (new.ZTPJ = 0) then 
		update grades_472739 set grade = grade + 1.00/bbzz *10 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 1) then
		update grades_472739 set grade = grade + 1.00/bbzz *8 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 2) then
		update grades_472739 set grade = grade + 1.00/bbzz *6 where UserID = new.BPUserID; end if;
	end if;
end if;

-- 处级领导互评2（副处级）
if( leID = 3) then 
	if (new.ZTPJ = 0) then 
		update grades_472739 set grade = grade + 1.00/cjgb *20 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 1) then
		update grades_472739 set grade = grade + 1.00/cjgb *16 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 2) then
		update grades_472739 set grade = grade + 1.00/cjgb *12 where UserID = new.BPUserID; end if;
end if;

-- 直属单位教职工评正副值（教工代表、普通教工）
if(leID >= 4) then 
	if (new.ZTPJ = 0) then
	update grades_472739 set grade = grade + 1.00/jg *40 where UserID = new.BPUserID; end if;
	if (new.ZTPJ = 1) then
	update grades_472739 set grade = grade + 1.00/jg *32 where UserID = new.BPUserID; end if;
	if (new.ZTPJ = 2) then
	update grades_472739 set grade = grade + 1.00/jg *24 where UserID = new.BPUserID; end if;
end if;

	end */$$


DELIMITER ;

/* Trigger structure for table `zc_ldbzkhinfo_472739` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_bz_grade` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_bz_grade` AFTER INSERT ON `zc_ldbzkhinfo_472739` FOR EACH ROW /*
检索投票人的LevelID
	switch(LevelID){
		case 1 : 校领导评价领导班子：计算校领导数量，单位票数/校领导数量*本票得分率*校领导评价领导班子分数比例
		case 2 or 3 : 中层领导评价其他部门领导班子：计算除本单位的中层领导外的所有中层领导数量，
									单位票数/中层领导数量*本票得分率*中层领导评价其他部门领导班子分数比例
		case 4 : 本部门职工评价领导班子：计算本部门职工数量，单位票数/职工数量*本票得分率*本部门职工评价领导班子分数比例
		case 6 : 教工代表评价所有领导班子：计算所有教工代表数量，单位票数/教工代表数量*本票得分率*教工代表评价领导班子分数比例
*/
begin
declare xld int ;
declare jg int ;
declare gb int ;
declare db int;
declare dba int;
declare dept int;
declare leID int ;


-- 投票人的DEPTID
set dept = (select DeptID from userinfo where UserID=new.UserID);

-- 校级干部数量
set xld =( select count(*) from userinformation where LevelID = 1);

-- 本单位教工数量
set jg = (select count(*) from userinfo where DeptID  = dept and LevelID = 6);

-- 除本单位领导外的所有初级领导数量
set gb = (select count(*) from userinformation where (LevelID = 2 or LevelID =3) AND DeptID <> dept) ;

-- 所有代表数量
set db = (select count(*) from userinformation where LevelID = 4) ;

-- 本次投票人的等级
set leID = (select LevelID from userinfo where UserID = new.UserID);

-- 校级领导评价领导班子
if(leID = 1) then 
	if (new.ZHKH = 0) then 
	update bz_grade_472739 set grade = grade + 1.00/xld *20 where DeptID = new.DeptID; end if;
	if (new.ZHKH = 1) then
	update bz_grade_472739 set grade = grade + 1.00/xld *16 where DeptID = new.DeptID; end if;
	if (new.ZHKH = 2) then
	update bz_grade_472739 set grade = grade + 1.00/xld *12 where DeptID = new.DeptID; end if;
end if;


-- 处级领导互评
if( leID = 2 or leID = 3) then 
if (new.ZHKH = 0) then 
	update bz_grade_472739 set grade = grade + 1.00/gb *20 where DeptID = new.DeptID; end if;
	if (new.ZHKH = 1) then
	update bz_grade_472739 set grade = grade + 1.00/gb *16 where DeptID = new.DeptID; end if;
	if (new.ZHKH = 2) then
	update bz_grade_472739 set grade = grade + 1.00/gb *12 where DeptID = new.DeptID; end if;
end if;

-- 教工代表评价领导班子
if(leID = 4 ) then  
		if (new.ZHKH = 0) then
		update bz_grade_472739 set grade = grade + 1.00/db *20 where DeptID = new.DeptID; end if;
		if (new.ZHKH = 1) then
		update bz_grade_472739 set grade = grade + 1.00/db *16 where DeptID = new.DeptID; end if;
		if (new.ZHKH = 2) then
		update bz_grade_472739 set grade = grade + 1.00/db *12 where DeptID = new.DeptID; end if;
	end if;

-- 普通职工评价领导班子
if(leID = 4 ) then  
		if (new.ZHKH = 0) then
		update bz_grade_472739 set grade = grade + 1.00/jg *40 where DeptID = new.DeptID; end if;
		if (new.ZHKH = 1) then
		update bz_grade_472739 set grade = grade + 1.00/jg *32 where DeptID = new.DeptID; end if;
		if (new.ZHKH = 2) then
		update bz_grade_472739 set grade = grade + 1.00/jg *24 where DeptID = new.DeptID; end if;
	end if;

	end */$$


DELIMITER ;

/* Trigger structure for table `zc_ldcykhinfo_472739` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_vote` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_vote` AFTER INSERT ON `zc_ldcykhinfo_472739` FOR EACH ROW -- 正副级干部由于能够评价除本部门单位外的所有单位，故而也能评价机关单位
-- 教工代表能够评价机关单位，因此正副级干部权限包含教工代表的权限，因此，正副级干部也可以是教工代表

-- 处级领导干部的得分由三个部分组成，
-- 1.校领导评价 2.本单位教工评价 3.处级干部互评 
/*
注 ： 得分率如此计算： 非常满意 1.0 ，满意 0.8 ，基本满意 0.6，不满意 0

检索投票人的levelid
	switch (LeveID){
		 case 1 : 校领导评价中层干部： 计算校领导数量，单位票数/校领导数量*本票得分率*校领导评价分数比例 
		 case 2 : if (BPleID = 2) { 处级领导互评： 计算除本单位的处级领导所有处级领导数量， 单位票数/处级领导数量*本票得分率*处级领导互评分数比例 }
							if (BPleID = 3) { 处级领导评价副处级领导： 计算本部门正处级领导数量， 			
							单位票数/处级领导数量*本票得分率*处级领导评价副处级领导分数比例}
		 case 3 : 处级领导互评： 计算单位的处级领导所有处级领导数量， 单位票数/处级领导数量*本票得分率*副处级领导互评分数比例
		 default : 普通职工（包括教工代表）评价中层干部： 计算本部门普通职工数量，
							单位票数/普通职工数量*本票得分率*普通职工评价中层干部分数比例
							}
*/
begin
declare xld int ;
declare jg int ;
declare cjgb int;
declare bbzz int;
declare leID int ;
declare dept int;
declare BPleID int;
declare BPDD int;


-- 校级干部数量
set xld =( select count(*) num from userinformation where LevelID = 1);

-- 投票人所属部门
set dept = (select DeptID from userinfo where UserID=new.UserID);

-- 教工数量(包括教工代表）
set jg = (select count(*) from userinformation where DeptID = dept  and LevelID >= 4);

-- 除本部门的所有处级干部干部数量
set cjgb = (select count(*) from userinformation where (LevelID = 2 or LevelID = 3) and DeptID <> dept) ;

-- 所属部门正职干部数量
set bbzz = (select count(*) from userinformation where DeptID = dept and LevelID = 2);

-- 本次投票人的LeID
set leID = (select LevelID from userinfo where UserID = new.UserID);

-- 被投人的leID
set BPleID = (select LevelID from userinfo where UserID = new.BPUserID);

-- 被投人的DeptID
set BPDD = (select DeptID from userinfo where UserID = new.BPUserID);

-- 校领导投票
if(leID = 1) then 
	if (new.DDJS = 0) then 
	update grades_472739 set grade = grade + 1.00/xld *20 where UserID = new.BPUserID; end if;
	if (new.DDJS = 1) then
	update grades_472739 set grade = grade + 1.00/xld *16 where UserID = new.BPUserID; end if;
	if (new.DDJS = 2) then
	update grades_472739 set grade = grade + 1.00/xld *12 where UserID = new.BPUserID; end if;
end if;


-- 处级领导（正处级）互评或者正职评副职
if( leID = 2) then 
		-- 正职互评
	if (BPleID = 2 or BPleID = 3) then 
		if (new.DDJS = 0) then 
		update grades_472739 set grade = grade + 1.00/cjgb *20 where UserID = new.BPUserID; end if;
		if (new.DDJS = 1) then
		update grades_472739 set grade = grade + 1.00/cjgb *16 where UserID = new.BPUserID; end if;
		if (new.DDJS = 2) then
		update grades_472739 set grade = grade + 1.00/cjgb *12 where UserID = new.BPUserID; end if;
	end if;
	-- 正职评副职
	if (BPleID = 3 and BPDD = dept) then
		if (new.DDJS = 0) then 
		update grades_472739 set grade = grade + 1.00/bbzz *10 where UserID = new.BPUserID; end if;
		if (new.DDJS = 1) then
		update grades_472739 set grade = grade + 1.00/bbzz *8 where UserID = new.BPUserID; end if;
		if (new.DDJS = 2) then
		update grades_472739 set grade = grade + 1.00/bbzz *6 where UserID = new.BPUserID; end if;
	end if;
end if;

-- 处级领导互评2（副处级）
if( leID = 3) then 
	if (new.DDJS = 0) then 
		update grades_472739 set grade = grade + 1.00/cjgb *20 where UserID = new.BPUserID; end if;
		if (new.DDJS = 1) then
		update grades_472739 set grade = grade + 1.00/cjgb *16 where UserID = new.BPUserID; end if;
		if (new.DDJS = 2) then
		update grades_472739 set grade = grade + 1.00/cjgb *12 where UserID = new.BPUserID; end if;
end if;

-- 直属单位教职工评正副值（教工代表、普通教工）
if(leID >= 4) then 
	if (new.DDJS = 0) then
	update grades_472739 set grade = grade + 1.00/jg *40 where UserID = new.BPUserID; end if;
	if (new.DDJS = 1) then
	update grades_472739 set grade = grade + 1.00/jg *32 where UserID = new.BPUserID; end if;
	if (new.DDJS = 2) then
	update grades_472739 set grade = grade + 1.00/jg *24 where UserID = new.BPUserID; end if;
end if;

	end */$$


DELIMITER ;

/* Procedure structure for procedure `NewProc` */

/*!50003 DROP PROCEDURE IF EXISTS  `NewProc` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `NewProc`(in UserID int)
BEGIN
declare xld int ;
declare jg int ;
declare gb int ;
DECLARE done INT DEFAULT 0;
DECLARE xldnumb cursor for select count(*) num from userinformation where LevelID = 1;
declare jgnumb  cursor for select jgnumb from deptinfo where DeptID = (select DeptID from userinfo where UserID=UserID);
declare gbnumb  cursor for select count(*) from userinformation where (LevelID=2 or LevelID =3) ;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	open jgnumb;
	fetch jgnumb into jg;-- select jg;
	close jgnumb;
	 set done = 0;
	
	open gbnumb;
	fetch gbnumb into gb;-- select gb;
	close gbnumb;
	 set done = 0;
	
	open xldnumb;
	get_ld:loop
	fetch xldnumb into xld;-- select xld;
	end loop;
	close xldnumb;

END */$$
DELIMITER ;

/*Table structure for table `dept_bp` */

DROP TABLE IF EXISTS `dept_bp`;

/*!50001 DROP VIEW IF EXISTS `dept_bp` */;
/*!50001 DROP TABLE IF EXISTS `dept_bp` */;

/*!50001 CREATE TABLE  `dept_bp`(
 `DeptID` int(11) ,
 `DeptName` varchar(50) ,
 `num` bigint(21) 
)*/;

/*Table structure for table `userinformation` */

DROP TABLE IF EXISTS `userinformation`;

/*!50001 DROP VIEW IF EXISTS `userinformation` */;
/*!50001 DROP TABLE IF EXISTS `userinformation` */;

/*!50001 CREATE TABLE  `userinformation`(
 `UserID` int(11) ,
 `Account` varchar(20) ,
 `UserName` varchar(20) ,
 `LevelID` int(11) ,
 `DeptID` int(11) ,
 `DeptName` varchar(50) 
)*/;

/*View structure for view dept_bp */

/*!50001 DROP TABLE IF EXISTS `dept_bp` */;
/*!50001 DROP VIEW IF EXISTS `dept_bp` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dept_bp` AS (select `deptinfo`.`DeptID` AS `DeptID`,`deptinfo`.`DeptName` AS `DeptName`,count(`zc_ldbzkhinfo_472739`.`ZHKH`) AS `num` from (`zc_ldbzkhinfo_472739` join `deptinfo`) where (`zc_ldbzkhinfo_472739`.`DeptID` = `deptinfo`.`DeptID`) group by `zc_ldbzkhinfo_472739`.`DeptID`,`zc_ldbzkhinfo_472739`.`ZHKH`) */;

/*View structure for view userinformation */

/*!50001 DROP TABLE IF EXISTS `userinformation` */;
/*!50001 DROP VIEW IF EXISTS `userinformation` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userinformation` AS select `u`.`UserID` AS `UserID`,`u`.`Account` AS `Account`,`u`.`UserName` AS `UserName`,`u`.`LevelID` AS `LevelID`,`u`.`DeptID` AS `DeptID`,`d`.`DeptName` AS `DeptName` from (`userinfo` `u` join `deptinfo` `d`) where (`u`.`DeptID` = `d`.`DeptID`) order by `u`.`DeptID` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
