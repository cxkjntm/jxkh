/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.17-log : Database - jxkh0727
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
(2,2,99.99),
(3,3,99.99),
(4,4,99.99),
(5,5,99.99),
(6,6,99.99),
(7,7,99.99),
(8,8,99.99),
(9,9,99.99),
(10,10,99.99),
(11,11,99.99),
(12,12,99.99),
(13,13,99.99),
(14,14,99.99),
(15,15,99.99),
(16,16,99.99),
(17,17,99.99),
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
(34,34,99.99),
(35,35,99.99),
(36,36,99.99),
(37,37,99.99),
(38,38,99.99),
(39,39,99.99),
(40,40,99.99),
(41,41,99.99),
(42,42,99.99),
(43,43,99.99),
(44,44,99.99),
(45,45,99.99),
(46,46,99.99);

/*Table structure for table `deptadmin` */

DROP TABLE IF EXISTS `deptadmin`;

CREATE TABLE `deptadmin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `Account` varchar(50) NOT NULL,
  `Passwd` varchar(255) NOT NULL,
  `DeptID` int(11) NOT NULL,
  PRIMARY KEY (`AdminID`) USING BTREE,
  KEY `fk_name` (`Account`) USING BTREE,
  KEY `fk_adminDept` (`DeptID`) USING BTREE,
  CONSTRAINT `fk_adminDept` FOREIGN KEY (`DeptID`) REFERENCES `deptinfo` (`DeptID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `deptadmin` */

insert  into `deptadmin`(`AdminID`,`Account`,`Passwd`,`DeptID`) values 
(1,'1000','$2a$08$gniC80RBj0wMgKttNua7suFyTeA3e1YkDg93jMz2E0CT6hcOojlqW',1),
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
(46,'1046','$2a$08$HGVcwxbcGX6l7scWkY9g2eMJY6WPTuSOIAayg9eioMRzUtMd7tz2G',46),
(49,'1048','$2a$08$hucrRW.kmJMWvScRZvqU6uknAwjKvbkTPCLi5YGwuKMEoDZ2vu5F.',34),
(51,'1048','$2a$08$mGQR9/sVP4W4Spku0fChneEicyYY.NDQ0IRVV4c8OouwaXGlrqRlO',34),
(52,'1048','$2a$08$YBG3Zw4DLK8drXkCEcS6k.puYwbQunoirLMZn4KuaSft9WnSVJ/yS',34),
(53,'1048','$2a$08$HAmGS20v6L7E.YD0w6sEYOJNng4NbVR/QP0.gGF3AcUdmpMkx55/C',34),
(54,'30081001','$2a$08$0rFN/nOEikwHtRJJCZuYn.1WzzcaFgxIAMCODwQKnrNlxPtRHDvSi',53);

/*Table structure for table `deptinfo` */

DROP TABLE IF EXISTS `deptinfo`;

CREATE TABLE `deptinfo` (
  `DeptID` int(11) NOT NULL AUTO_INCREMENT,
  `DeptName` varchar(50) NOT NULL,
  `DeptMemo` varchar(255) NOT NULL,
  `gbnumb` int(11) DEFAULT NULL,
  `jgnumb` int(11) DEFAULT NULL,
  `IsBanned` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`DeptID`) USING BTREE,
  KEY `DeptName` (`DeptName`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `deptinfo` */

insert  into `deptinfo`(`DeptID`,`DeptName`,`DeptMemo`,`gbnumb`,`jgnumb`,`IsBanned`) values 
(1,'纪委、监察处、纪委办公室','科室',3,0,0),
(2,'党委办公室、校长办公室、综合档案室','科室',3,0,0),
(3,'组织部、统战部、党校','科室',3,0,0),
(4,'宣传部、文明办、城建博物馆、校报编辑部','科室',2,0,0),
(5,'学工部、学生处、学生资助中心及事务中心','科室',5,0,0),
(6,'武装部、保卫处','科室',3,0,0),
(7,'发规处、校友办、高教研究所','科室',3,0,0),
(8,'教务处、评估与质量监控办','科室',4,0,0),
(9,'科研（社科）处、学科办、产业发展研究院','科室',3,0,0),
(10,'人事处、教师发展中心','科室',3,0,0),
(11,'财务处','科室',2,0,0),
(12,'招生就业处、就业创业指导中心、创业学院','科室',3,0,0),
(13,'审计处','科室',3,0,0),
(14,'基建处','科室',3,0,0),
(15,'国资处、招标办、设备与实验室管理中心','科室',3,0,0),
(16,'工会、女工委员会、工会办公室','科室',3,0,0),
(17,'团委','科室',2,0,0),
(18,'土木与交通工程学院','院部',6,0,0),
(19,'管理学院','院部',6,0,0),
(20,'市政与环境工程学院','院部',5,0,0),
(21,'建筑与城市规划学院','院部',5,0,0),
(22,'能源与建筑环境工程学院','院部',4,0,0),
(23,'测绘与城市空间信息学院','院部',5,0,0),
(24,'艺术设计学院','院部',4,0,0),
(25,'计算机与数据科学学院','院部',5,6,0),
(26,'电气与控制工程学院','院部',5,0,0),
(27,'材料与化工学院','院部',5,0,0),
(28,'生命科学与工程学院','院部',4,0,0),
(29,'数理学院','院部',3,0,0),
(30,'外国语学院','院部',4,0,0),
(31,'法学院','院部',3,0,0),
(32,'体育教学部','院部',3,0,0),
(33,'思想政治教育教学部','院部',2,0,0),
(34,'国际教育学院、国际合作与交流处','院部',4,0,0),
(35,'继续教育学院','院部',2,0,0),
(36,'公共艺术教育中心','科室',1,0,0),
(37,'心理健康教育指导中心','科室',1,0,0),
(38,'信息中心、信息化建设办公室','科室',2,0,0),
(39,'学报编辑部','科室',2,0,0),
(40,'退休职工服务中心','科室',3,0,0),
(41,'图书馆','科室',2,0,0),
(42,'医院','科室',3,0,0),
(43,'资产经营公司、大学科技园','科室',1,0,0),
(44,'城镇综合设计研究院','科室',4,0,0),
(45,'后勤服务中心、后勤管理处','科室',5,0,0),
(46,'继续教育部','学院',0,0,0),
(53,'校领导','科室',NULL,NULL,0);

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
  `IsBanned` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`LevelID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `levelinfo` */

insert  into `levelinfo`(`LevelID`,`LevelName`,`Memo`,`IsBanned`) values 
(1,'学校领导','',0),
(2,'中层正职','',0),
(3,'中层副职','',0),
(4,'教工代表','',0),
(5,'学生代表','',0),
(6,'普通职工','',0),
(7,'基层员工','基层教师加上职工',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `noteinfo` */

insert  into `noteinfo`(`NoteID`,`NoteTitle`,`NoteContent`,`NotePublisher`,`ReleasedTime`) values 
(1,'干部考核系统发布了。','<p>河南城建学院干部考核系统发布了。加油干</p>\r\n','白燕','2019-01-29'),
(4,'干部考核系统开始测试啦啦','<p>系统开始测试啦，大家赶快来呀。</p>\r\n','柳运昌','2019-01-31'),
(8,'2019年第1次中层干部调查问卷','<p>2019年第1次中层干部调查问卷开始啦！</p>\r\n','白燕','2019-03-11'),
(9,'2019年第1次中层干部调查问卷开始啊','<p>2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊</p>\r\n','白燕','2019-03-11'),
(10,'2019年第1次中层干部调查问卷开始举行','<p>2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊2019年第1次中层干部调查问卷开始啊</p>\r\n','白燕','2019-03-11'),
(11,'','','','2019-07-27'),
(12,'2019第4次中层干部平时调查开始了','','柳运昌','2019-07-27'),
(13,'2019年第4次中层干部问卷调查开始了。','<p>2019年第4次中层干部问卷调查开始了。</p>\r\n','柳运昌','2019-07-27');

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
  PRIMARY KEY (`voteId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `pswjdc_799417` */

insert  into `pswjdc_799417`(`voteId`,`UserID`,`DeptID`,`voteTime`,`zcgbztpj1`,`jcgbztpj2`,`zggbztpj3`,`zcbzjgpj4`,`zcgbzfpj5`,`zcbzzxpj6`,`zcbzjcpj7`,`zcbzyx8`,`zcgbyspj9`,`zcgbmzys10`,`zcgbddgc11`,`zcgbqzlz12`,`zcgbxnlj13`,`zcgbllxx14`,`zcgbdjfz15`,`zcgbzdj16`,`zcgbgzzt17`,`szydyxqk18`,`zcgbzfjs19`,`zcgbsztg20`,`zcgbblzf21`,`zcgbcyzd22`,`zcgbzfjq23`,`zcgbzfjy24`) values 
(1,922,25,'2019-03-03 19:39','C','B','B','C','B','B','B','B','B','B','B','C','C','C','B','B','B','B','B','A,E,G','A,C,D,F','C','B,C,D','无'),
(2,922,25,'2019-03-03 19:41','C','B','B','C','B','B','B','B','B','B','B','B','B','A','A','A','A','C','B','B,C,D','C,D','C','B,C,D','无'),
(3,922,25,'2019-03-03 19:43','B','B','B','C','B','A','A','A','A','A','A','A','A','A','A','A','A','B','A','B,C,D,E','C,D,F','B','B,C,D','无'),
(4,922,25,'2019-03-03 19:45','D','D','D','C','B','B','B','B','B','C','C','C','C','C','C','B','C','C','B','B,C,D,E,F','B,C,D,G,H','C','A,B,C,D','无'),
(5,922,25,'2019-03-03 19:47','B','B','B','B','B','B','B','A','B','B','B','B','B','B','B','B','E','B','A','D,E,F,G','B,C,D,F,G','B','B,C,D','无'),
(6,922,25,'2019-03-03 19:48','C','C','C','B','B','B','B','B','B','B','B','B','B','C','C','B','C','B','A','D,E,F,G','B,C,D,F,G,H','C','B,C,D','无'),
(7,922,25,'2019-03-03 19:49','D','C','C','B','B','C','C','B','C','C','B','C','B','C','C','B','C','B','B','A,D,E,F,G','A,B,C,D,G,H','D','A,B,C','无'),
(8,922,25,'2019-03-03 19:50','D','C','C','C','C','C','C','B','B','B','B','B','B','C','C','B','E','B','B','B,C,D,F','A,B,C,D,G','E','A,B,C','无'),
(9,922,25,'2019-03-03 19:51','D','C','C','C','C','C','C','B','B','B','B','B','B','C','C','B','C','D','B','B,C,D,F','A,B,C,D,G','E','A,B,C','无'),
(10,922,25,'2019-03-03 19:51','D','C','C','C','C','C','C','B','B','B','B','C','C','C','C','B','C','D','B','B,C,D,F','A,B,C,D,G','E','A,B,C','无'),
(11,922,25,'2019-03-06 07:04','B','B','B','B','B','B','B','B','B','B','B','B','B','B','B','B','A','B','A','B,C','A,B','B','B,C','wu '),
(14,922,25,'2019-03-30 17:00','C','C','C','B','B','B','B','B','B','C','C','B','C','C','C','B','C','B','B','A,D,E','A,B,C,D','C','B,C','无'),
(15,923,25,'2019-03-30 17:48','B','B','B','C','C','C','C','B','C','B','B','B','B','B','B','B','A','B','B','B,C,D,G','B,C,G,H','B','A,B,C,D','调动教职工的积极性'),
(16,924,25,'2019-03-30 17:50','B','B','A','A','A','A','A','A','A','A','A','B','B','B','B','A','A','B','B','B','A,H','B','B,C','领导太年轻，没有微信。'),
(17,925,25,'2019-03-30 19:04','B','B','B','B','B','B','B','A','A','A','A','A','A','B','B','B','A','B','A','A,D,E,G','C,F,H','B','A,B,C,D','少批评同事'),
(18,927,25,'2019-03-30 19:06','B','B','B','B','B','B','A','A','B','B','B','B','B','B','B','B','E','B','B','B,C,H','B,C','B','B,D','调动大家干事创业的积极性'),
(19,926,25,'2019-03-30 19:09','C','C','C','C','C','C','C','B','C','C','C','C','C','C','C','B','B','C','B','A,B,E,F','A,B,C,D,F,G,H','C','A,B,C,D','建立好标准，落实好执行。'),
(20,401,25,'2019-03-30 19:11','B','B','B','B','B','B','B','A','A','A','A','A','A','A','A','B','A','B','A','A,B,D,E','A,B,C,F','B','A,B,C,D','改进工作作风，扎扎实实做实事。'),
(21,402,25,'2019-03-30 19:13','B','B','B','B','B','B','B','B','B','B','B','B','B','B','B','B','A','B','B','B,C,D,F','B,C,F,G','B','B,C','形式主义严重'),
(22,403,25,'2019-03-30 19:14','B','B','B','B','B','B','B','A','A','B','B','B','A','A','B','B','A','B','B','B,C,F','A,F,G','B','A,B,C,D,E','尊重老同志'),
(23,315,1,'2019-04-15 20:34','B','B','B','B','A','A','A','A','B','B','B','B','B','B','B','B','A','B','A','A,B,C','A,B,C','B','A,B,C','努力与群众搞好关系');

/*Table structure for table `question` */

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `questionID` int(11) NOT NULL AUTO_INCREMENT,
  `parent_qid` int(11) NOT NULL DEFAULT '0',
  `RecordID` int(11) NOT NULL,
  `type` varchar(1) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `question` text,
  PRIMARY KEY (`questionID`) USING BTREE,
  KEY `RecordID` (`RecordID`) USING BTREE,
  CONSTRAINT `RecordID` FOREIGN KEY (`RecordID`) REFERENCES `voterecord` (`RecordID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `question` */

insert  into `question`(`questionID`,`parent_qid`,`RecordID`,`type`,`title`,`question`) values 
(1,0,8,'S','Q1','您对学校中层干部作风情况的总体评价是：'),
(2,0,8,'S','Q2','您对学校基层干部作风的总体评价是：'),
(3,0,8,'S','Q3','您对学校机关干部作风的总体评价是：'),
(4,3,8,'1','A ','好'),
(5,3,8,'1','B','较好'),
(6,3,8,'1','C','一般'),
(7,3,8,'1','D','较差'),
(8,3,8,'1','E','差'),
(9,3,8,'1','F','不了解'),
(10,0,8,'T','Q7','您认为本单位中层领导班子的结构是否合理？'),
(11,0,8,'S','Q4','您认为本单位中层领导班子的结构是否合理？'),
(12,11,8,'1','A','合理'),
(13,11,8,'1','B','较合理'),
(14,11,8,'1','C','一般'),
(15,11,8,'1','D','不合理'),
(16,0,8,'S','Q5','您对本单位中层领导干部作风的整体评价是'),
(17,16,8,'1','A','好'),
(18,16,8,'1','B','较好'),
(19,16,8,'1','C','一般'),
(20,16,8,'1','D ','较差'),
(21,16,8,'1','E','差'),
(22,16,8,'1','F','不了解'),
(23,0,8,'S','Q6','您对本单位中层领导班子在学校重大决策、重要工作方面的执行力评价是：'),
(24,23,8,'1','A','好'),
(25,23,8,'1','B','较好'),
(26,23,8,'1','C','一般'),
(27,23,8,'1','D','较差'),
(28,23,8,'1','E','差'),
(29,23,8,'1','F','不了解'),
(30,1,8,'1','A','好'),
(31,1,8,'1','B','较好'),
(32,1,8,'1','C','一般'),
(33,1,8,'1','D','较差'),
(34,1,8,'1','E','差'),
(35,1,8,'1','F','不知道'),
(36,2,8,'1','A','好'),
(37,2,8,'1','B','较好'),
(38,2,8,'1','C','一般'),
(39,2,8,'1','D','较差'),
(40,2,8,'1','E','差'),
(41,2,8,'1','F','不了解'),
(42,0,8,'D','Q8','您单位中层领导干部亟待加强哪方面作风建设？'),
(43,42,8,'0','A','思想作风'),
(44,42,8,'0','B','工作作风'),
(45,42,8,'0','C','学风'),
(46,42,8,'0','D','领导作风'),
(47,42,8,'0','E','生活作风'),
(48,0,7,'S','zcgbztpj1','您对学校中层干部作风情况的总体评价为：'),
(49,48,7,'1','A','很好'),
(50,48,7,'1','B','较好'),
(51,48,7,'1','C','一般'),
(52,48,7,'1','D','较差'),
(53,48,7,'1','E','差'),
(54,48,7,'1','F','不了解'),
(55,0,7,'S','jcgbztpj2','您对学校基层干部作风的总体评价是：'),
(56,55,7,'1','A','好'),
(57,55,7,'1','B','较好'),
(58,55,7,'1','C','一般'),
(59,55,7,'1','D','较差'),
(60,55,7,'1','E','差'),
(61,55,7,'1','F','不了解'),
(62,0,7,'S','zggbztpj3','您对学校机关干部作风的总体评价是：'),
(63,62,7,'1','A','好'),
(64,62,7,'1','B','较好'),
(65,62,7,'1','C','一般'),
(66,62,7,'1','D','较差'),
(67,62,7,'1','E','差'),
(68,62,7,'1','F','不了解'),
(69,0,7,'S','zcbzjgpj4','您认为本单位中层领导班子的结构是否合理？'),
(70,69,7,'1','A','合理'),
(71,69,7,'1','B','较合理'),
(72,69,7,'1','C','一般'),
(73,69,7,'1','D','不合理'),
(74,0,7,'S','zcgbzfpj5','您对本单位中层领导干部作风的整体评价是：'),
(75,74,7,'1','A','好'),
(76,74,7,'1','B','较好'),
(77,74,7,'1','C','一般'),
(78,74,7,'1','D','较差'),
(79,74,7,'1','E','差'),
(80,74,7,'1','F','不了解'),
(81,0,7,'S','zcbzzxpj6','您对本单位中层领导班子在学校重大决策、重要工作方面的执行力评价是：'),
(82,81,7,'1','A','好'),
(83,81,7,'1','B','较好'),
(84,81,7,'1','C','一般'),
(85,81,7,'1','D','较差'),
(86,81,7,'1','E','差'),
(87,81,7,'1','F','不了解'),
(88,0,7,'S','zcbzjcpj7','您认为本单位中层领导班子在科学决策能力、形成班子合力、推动事业发展等方面：'),
(89,88,7,'1','A','好'),
(90,88,7,'1','B','较好'),
(91,88,7,'1','C','一般'),
(92,88,7,'1','D','较差'),
(93,88,7,'1','E','差'),
(94,88,7,'1','F','不了解'),
(95,0,7,'S','zcbzyx8','您单位的中层领导班子给您的印象是：'),
(96,95,7,'1','A','求真务实'),
(97,95,7,'1','B','决策能力不强'),
(98,95,7,'1','C','班子运行不和'),
(99,95,7,'1','D','推进事业发展不利'),
(100,0,7,'S','zcgbyspj9','您认为本单位中层领导干部的大局意识、团结意识和责任意识：'),
(101,100,7,'1','A','好'),
(102,100,7,'1','B','较好'),
(103,100,7,'1','C','一般'),
(104,100,7,'1','D','较差'),
(105,100,7,'1','E','差'),
(106,100,7,'1','F','不了解'),
(107,0,7,'S','zcgbmzys10','您认为本单位中层领导干部的民主意识、主动征言纳策意识：'),
(108,107,7,'1','A','强'),
(109,107,7,'1','B','较强'),
(110,107,7,'1','C','一般'),
(111,107,7,'1','D','较差'),
(112,107,7,'1','E','差'),
(113,107,7,'1','F','不了解'),
(114,0,7,'S','zcgbddgc11','您认为本单位中层领导干部在担当作为、改革创新方面：'),
(115,114,7,'1','A','好'),
(116,114,7,'1','B','较好'),
(117,114,7,'1','C','一般'),
(118,114,7,'1','D','较差'),
(119,114,7,'1','E','差'),
(120,114,7,'1','F','不了解'),
(121,0,7,'S','zcgbqzlz12','您认为本单位中层领导干部在勤政廉政、自我约束方面：'),
(122,121,7,'1','A','好'),
(123,121,7,'1','B','较好'),
(124,121,7,'1','C','一般'),
(125,121,7,'1','D','较差'),
(126,121,7,'1','E','差'),
(127,121,7,'1','F','不了解'),
(128,0,7,'S','zcgbxnlj13','您认为本单位中层领导干部在信念坚定、令行禁止方面做得：'),
(129,128,7,'1','A','好'),
(130,128,7,'1','B','较好'),
(131,128,7,'1','C','一般'),
(132,128,7,'1','D','较差'),
(133,128,7,'1','E','差'),
(134,128,7,'1','F','不了解'),
(135,0,7,'S','zcgbllxx14','您认为本单位中层领导干部在理论学习、学以致用方面做得：'),
(136,135,7,'1','A','好'),
(137,135,7,'1','B','较好'),
(138,135,7,'1','C','一般'),
(139,135,7,'1','D','较差'),
(140,135,7,'1','E','差'),
(141,135,7,'1','F','不了解'),
(142,0,7,'S','zcgbdjfz15','您认为本单位中层领导干部抓党建促发展方面做得：'),
(143,142,7,'1','A','好'),
(144,142,7,'1','B','较好'),
(145,142,7,'1','C','一般'),
(146,142,7,'1','D','较差'),
(147,142,7,'1','E','差'),
(148,142,7,'1','F','不了解'),
(149,0,7,'S','zcgbzdj16','您认为本单位中层领导干部对“抓好党建就是最大的政绩”的认识：'),
(150,149,7,'1','A','很到位'),
(151,149,7,'1','B','比较到位'),
(152,149,7,'1','C','不到位'),
(153,149,7,'1','D','差'),
(154,149,7,'1','E','不了解'),
(155,0,7,'S','zcgbgzzt17','您认为本单位中层领导干部的工作状态：'),
(156,155,7,'1','A','求真务实，勇于创新'),
(157,155,7,'1','B','墨守成规，不思进取'),
(158,155,7,'1','C','工作浮漂，敷衍了事'),
(159,155,7,'1','D','推推动动，不敢担当'),
(160,155,7,'1','E','急功近利，形象工程'),
(161,155,7,'1','F','不了解'),
(162,0,7,'S','szydyxqk18','您单位“三重一大”（重大事项决策、重要干部任免、重要项目安排、大额资金的使用,必须经集体讨论做出决定）的运行情况是：'),
(163,162,7,'1','A','好'),
(164,162,7,'1','B','较好'),
(165,162,7,'1','C','一般'),
(166,162,7,'1','D','较差'),
(167,162,7,'1','E','差'),
(168,162,7,'1','F','不了解'),
(169,0,7,'S','zcgbzfjs19','现在您单位中层领导干部在作风建设上哪一方面的问题最为突出？'),
(170,169,7,'1','A','形式主义'),
(171,169,7,'1','B','官僚主义'),
(172,169,7,'1','C','享乐主义'),
(173,169,7,'1','D','奢靡之风'),
(174,0,7,'D','zcgbsztg20','您认为您单位中层领导干部急需提高的素质有：'),
(175,174,7,'0','A','党性修养'),
(176,174,7,'0','B','战略思维'),
(177,174,7,'0','C','开放视野'),
(178,174,7,'0','D','领导方法'),
(179,174,7,'0','E','工作作风'),
(180,174,7,'0','F','专业知识水平'),
(181,174,7,'0','G','事业心责任感'),
(182,174,7,'0','H','其他'),
(183,0,7,'D','zcgbblzf21','您单位的中层领导干部有无下列情况？'),
(184,183,7,'0','A','纪律松懈，迟到早退'),
(185,183,7,'0','B','亲亲疏疏，搞不团结'),
(186,183,7,'0','C','独断专行，个人说了算'),
(187,183,7,'0','D','慵懒散拖'),
(188,183,7,'0','E','经常打牌'),
(189,183,7,'0','F','充当老好人'),
(190,183,7,'0','G','与民争利'),
(191,183,7,'0','H','假公济私'),
(192,0,7,'S','zcgbcyzd22','您单位全面从严治党主体责任落实情况：'),
(193,192,7,'1','A','很好'),
(194,192,7,'1','B','较好'),
(195,192,7,'1','C','一般'),
(196,192,7,'1','D','差'),
(197,192,7,'1','E','不了解'),
(198,0,7,'D','zcgbzfjq23','您单位中层领导干部亟待加强哪方面作风建设？'),
(199,198,7,'0','A','思想作风'),
(200,198,7,'0','B','工作作风'),
(201,198,7,'0','C','学风'),
(202,198,7,'0','D','领导作风'),
(203,198,7,'0','E','生活作风'),
(204,0,7,'T','zcgbzfjy24','您认为您单位中层领导干部作风方面最需要整改的突出问题有哪些，有何意见和建议？');

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
(33,922,25,'0','0','0','0','0','0');

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
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `qz_ldcykhinfo_472739` */

insert  into `qz_ldcykhinfo_472739`(`id`,`UserID`,`BPUserID`,`ZZSX`,`GZNL`,`GZZF`,`YFBS`,`LXYZ`,`LJZV`,`ZTPJ`) values 
(141,922,401,'0','0','0','0','0','0','0'),
(142,922,402,'0','0','0','0','0','0','0'),
(143,922,403,'0','0','0','0','0','0','0'),
(144,922,404,'0','0','0','0','0','0','0'),
(145,922,405,'0','0','0','0','0','0','0');

/*Table structure for table `role_menu` */

DROP TABLE IF EXISTS `role_menu`;

CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `role_menu` */

insert  into `role_menu`(`id`,`role_id`,`menu_id`,`status`) values 
(1,2,1,0),
(2,2,2,0),
(3,2,3,0),
(4,2,4,0),
(5,2,5,0),
(6,2,6,0),
(7,2,10,0),
(8,2,11,0),
(9,2,12,0),
(10,3,1,0),
(11,3,2,0),
(12,3,3,0),
(13,3,4,0),
(14,3,5,0),
(15,3,10,0),
(16,3,11,0),
(17,3,12,0),
(18,1,1,0),
(19,1,2,1),
(20,1,3,0),
(21,1,4,0),
(22,1,5,0),
(23,1,10,0),
(24,1,11,0),
(25,1,12,0),
(26,4,1,0),
(27,4,2,0),
(28,4,3,0),
(29,4,7,0),
(30,4,8,0),
(31,4,10,0),
(32,4,11,0),
(33,4,12,0),
(34,6,1,0),
(35,6,2,0),
(36,6,3,0),
(37,6,7,0),
(38,6,10,0),
(39,6,11,0),
(40,6,12,0);

/*Table structure for table `superinfo` */

DROP TABLE IF EXISTS `superinfo`;

CREATE TABLE `superinfo` (
  `SuperID` int(11) NOT NULL AUTO_INCREMENT,
  `SuperName` varchar(20) NOT NULL,
  `SuperPwd` varchar(80) NOT NULL,
  `SuperMemo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SuperID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `superinfo` */

insert  into `superinfo`(`SuperID`,`SuperName`,`SuperPwd`,`SuperMemo`) values 
(1,'admin','$2a$08$2kijbS.zyuS5Qbi2mSFOB.c2GrKLU0YSBmq79Eq2IgVwa2yth9qsK','超级管理员');

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
) ENGINE=InnoDB AUTO_INCREMENT=958 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `userinfo` */

insert  into `userinfo`(`UserID`,`Account`,`UserName`,`Passwd`,`Photo`,`DeptID`,`LevelID`,`session_id`,`logtimes`,`IsDB`) values 
(315,'30081021','孙留山','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',1,2,'c012a4gpro3cahblvmob1lntc7',95,0),
(316,'30081022','姜  欣','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',1,3,'kki9bb3hp3c6v1dd0snr06bci4',6,0),
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
(402,'30081108','何宗耀','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/13f9b866e397c44c78820b8c59502c52.jpg',25,2,'e7uqgsnq7r7l6psvamra72ibs7',18,0),
(403,'30081109','张  星','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/2.jpeg',25,3,'nn18i5ejjc4pr00sak2v35m8u2',8,0),
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
(922,'20161021','柳运昌','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','upload/head-student.png',25,4,'s56m8jsn0lntk7slffiu78o9v7',9,0),
(923,'30080803','张娜','$2a$08$kdsHtBaKhAEAAIhQIJ3ImO.MEBX6hIXwBKopWoVBS70/C4oS1VJuK','images/head-student.png',25,6,'ss8jkvt7pmi1bcm1u77fdrs5s7',28,0),
(924,'30080804','郭力争','$2a$08$wvKzE2TUEsFv1nKIFmJ3kOr64/Zh5.qdxFUGjSbQSGeX/6UBhj44W','images/head-student.png',25,6,'dku01krsv5ep3noq525s3avdd1',6,0),
(925,'30080805','陈红军','$2a$08$i4aCuzMHCXXVWXgVqBBaze6kODF6Ah1PB6DyvHCxX5b61HTpoClau','images/head-student.png',25,6,'sub3n5d31n5cma9kf2dq8i1f41',2,0),
(926,'20170106','史春雷','$2a$08$hezAAirJw5iQl0vIdq0KRe5HytWY025698DSGnPJ6vc.x.g9Ts77C','upload/img_tea.png',25,6,'onil6dl1akl2c51svoge238ms0',1,0),
(927,'30080806','刘荣辉','$2a$08$cCsw2O6ZpE59iBttIohn0OnpU5ssz6/mqIfUWwPxcMNXIwoCv1aWm','images/head-student.png',25,3,'udm8lt604jof4q381ht4se9uo3',7,0),
(928,'30080001','王晓东','$2a$08$NPIMJiVsC.pq8CPBsGqQFOJQWtZSbRLR.AO8DZityuciYjAkMcNn6','',NULL,NULL,NULL,0,NULL),
(949,'30081171','测试一','$2a$08$O/y9EtCAzSmRVAEQPvsoP.QeXhGjBwp8GWfmUUreApx7YawokZhGK','images/head-student.png',46,2,NULL,0,NULL),
(950,'30081172','测试二','$2a$08$GeK3L4TPm7BRIC29XqzDKeRIHoNA6412bU0Gy2baP82UVyYHoXN5.','images/head-student.png',46,3,NULL,0,NULL),
(951,'20161022','测试三','$2a$08$NxymotAFR2JaxEG9TTtcbOcuy5F3NufRZwrIULpYQBG9NRX3N7PHG','images/head-student.png',46,4,NULL,0,NULL),
(952,'20161023','测试四','$2a$08$OM7r9nuGS87PTwRpCRpM6uQVZ6lRg2lfzcEIA.10CQ0yb4FqfFJMq','images/head-student.png',46,6,'u6s4jfou97ah98tug5rcdne4d7',1,NULL),
(954,'30081000','王梦琪','$2a$08$NPIMJiVsC.pq8CPBsGqQFOJQWtZSbRLR.AO8DZityuciYjAkMcNn6','images/head-student.png',25,6,'mvohlr78csdfmf8kua2rcrudo2',4,NULL),
(956,'30085001','王召东','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',53,1,'florvgbb7c6tmh63l72hht4k10',1,NULL),
(957,'30085002','张惠真','$2a$08$ofIThXr9ox62PCI6eiQpNu5uKrZJuYcP4eDMBjldTfZNQq.vOD30S','images/head-student.png',53,1,'bblohkahqjs91okjgv5gthksn5',1,NULL);

/*Table structure for table `userinfo_old` */

DROP TABLE IF EXISTS `userinfo_old`;

CREATE TABLE `userinfo_old` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Account` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Passwd` varchar(80) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `DeptID` int(11) NOT NULL,
  `Rank` int(11) NOT NULL,
  `IsEvaluated` tinyint(1) NOT NULL,
  `IsPj` tinyint(1) DEFAULT NULL,
  `IsBanned` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  KEY `DeptID` (`DeptID`),
  KEY `Rank` (`Rank`),
  CONSTRAINT `UserInfo_old_ibfk_1` FOREIGN KEY (`DeptID`) REFERENCES `deptinfo` (`DeptID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `UserInfo_old_ibfk_2` FOREIGN KEY (`Rank`) REFERENCES `levelinfo` (`LevelID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1611 DEFAULT CHARSET=utf8;

/*Data for the table `userinfo_old` */

insert  into `userinfo_old`(`UserID`,`Account`,`UserName`,`Passwd`,`Photo`,`DeptID`,`Rank`,`IsEvaluated`,`IsPj`,`IsBanned`) values 
(164,'30081024','张大力','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,3,0,0,1),
(315,'30081021','孙留山','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,2,0,0,0),
(316,'30081022','姜  欣','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,3,0,0,1),
(317,'30081023','张守义','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,3,0,0,1),
(318,'30081024','田中敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,2,0,0,0),
(319,'30081025','王世翔','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,3,0,0,1),
(320,'30081026','吴  晶','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,3,0,0,1),
(321,'30081027','白  燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,2,0,0,0),
(322,'30081028','吴晓红','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,3,0,0,1),
(323,'30081029','舒雪冬','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,3,0,0,1),
(324,'30081030','张建国','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',4,2,0,0,0),
(325,'30081031','王  哲','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',4,3,0,0,1),
(326,'30081032','杨  璐','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(327,'30081033','殷战稳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,2,0,0,0),
(328,'30081034','赵灵芝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(329,'30081035','樊昀瑛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(330,'30081036','杜留记','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(331,'30081037','侯占营','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,2,0,0,0),
(332,'30081038','王  译','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,3,0,0,1),
(333,'30081039','褚清营','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,3,0,0,1),
(334,'30081040','毕军贤','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,2,0,0,1),
(335,'30081041','杨高峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,3,0,0,1),
(336,'30081042','王东旭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,3,0,0,1),
(337,'30081043','赵安芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,2,0,0,1),
(338,'30081044','赵兴涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(339,'30081045','霍松涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(340,'30081046','郭金敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(341,'30081047','马明江','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,2,0,0,1),
(342,'30081048','曹恒慧','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,3,0,0,1),
(343,'30081049','张大力','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,3,0,0,1),
(344,'30081050','张洪力','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,2,0,0,1),
(345,'30081051','高成全','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,3,0,0,1),
(346,'30081052','苗道华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,3,0,0,1),
(347,'30081053','郑豪民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',11,2,0,0,1),
(348,'30081054','徐明升','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',11,3,0,0,1),
(349,'30081055','闫继涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,2,0,0,1),
(350,'30081056','何  燚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,3,0,0,1),
(351,'30081057','李涛飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,3,0,0,1),
(352,'30081058','马照民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,2,0,0,1),
(353,'30081059','张晓丽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,3,0,0,1),
(354,'30081060','李旭伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,3,0,0,1),
(355,'30081061','牛季收','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,2,0,0,1),
(356,'30081062','李红群','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,3,0,0,1),
(357,'30081063','范光明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,3,0,0,1),
(358,'30081064','陈松涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,2,0,0,1),
(359,'30081065','张群祎','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,3,0,0,1),
(360,'30081066','李永献','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,3,0,0,1),
(361,'30081067','闫中华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,2,0,0,1),
(362,'30081068','周桂芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,3,0,0,1),
(363,'30081069','陈艳民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,3,0,0,1),
(364,'30081070','孙方行','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',17,2,0,0,1),
(365,'30081071','欧阳华澍','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',17,3,0,0,1),
(366,'30081072','李青岭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,2,0,0,1),
(367,'30081073','宋新生','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,2,0,0,1),
(368,'30081074','卫国祥','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(369,'30081075','尹振羽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(370,'30081076','朱  凯','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(371,'30081077','李爱增','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(372,'30081078','谢学明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,2,0,0,1),
(373,'30081079','闫  瑾','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,2,0,0,1),
(374,'30081080','刘  钦','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(375,'30081081','马  斌','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(376,'30081082','祖立厂','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(377,'30081083','王  宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(378,'30081084','马宁奇','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,2,0,0,1),
(379,'30081085','郭一飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,2,0,0,1),
(380,'30081086','朱泮民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(381,'30081087','田长勋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(382,'30081088','毛艳丽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(383,'30081089','王  森','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,2,0,0,1),
(384,'30081090','邢  燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,2,0,0,1),
(385,'30081091','周  勃','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(386,'30081092','郭  汝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(387,'30081093','朱晓菲','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(388,'30081094','刘海燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,2,0,0,1),
(389,'30081095','马良涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,2,0,0,1),
(390,'30081096','弓亚超','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,3,0,0,1),
(391,'30081097','周恒涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,3,0,0,1),
(392,'30081098','吕鹏飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,2,0,0,1),
(393,'30081099','张宏敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,2,0,0,1),
(394,'30081100','卫柳艳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(395,'30081101','刘贵明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(396,'30081102','高松峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(397,'30081103','马步伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,2,0,0,1),
(398,'30081104','陈玉兴','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,2,0,0,1),
(399,'30081105','李  阳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,3,0,0,1),
(400,'30081106','汤喜辉','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,3,0,0,1),
(401,'30081107','李宝宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,2,0,0,1),
(402,'30081108','何宗要','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,2,0,0,1),
(403,'30081109','张  星','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(404,'30081110','赵军民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(405,'30081111','张俊峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(406,'30081112','赵静生','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,2,0,0,1),
(407,'30081113','樊晓虹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,2,0,0,1),
(408,'30081114','董燕飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(409,'30081115','孙炳海','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(410,'30081116','韩耀飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(411,'30081117','焦学然','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,2,0,0,1),
(412,'30081118','赵海鹏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,2,0,0,1),
(413,'30081119','赵振新','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(414,'30081120','雷佑安','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(415,'30081121','丁明洁','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(416,'30081122','金  利','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,2,0,0,1),
(417,'30081123','李冰冰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,2,0,0,1),
(418,'30081124','胡建业','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,3,0,0,1),
(419,'30081125','谢朝晖','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,3,0,0,1),
(420,'30081126','刘雅妹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,2,0,0,1),
(421,'30081127','徐华锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,2,0,0,1),
(422,'30081128','李富强','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,3,0,0,1),
(423,'30081129','袁  晓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,2,0,0,1),
(424,'30081130','秦平新','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,2,0,0,1),
(425,'30081131','于修涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,3,0,0,1),
(426,'30081132','秦小锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,3,0,0,1),
(427,'30081133','王艳芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,2,0,0,1),
(428,'30081134','张  强','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,2,0,0,1),
(429,'30081135','王芹萼','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,3,0,0,1),
(430,'30081136','常  静','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,2,0,0,1),
(431,'30081137','杨雷亭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,3,0,0,1),
(432,'30081138','赵爱民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,3,0,0,1),
(433,'30081139','卢华东','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',33,2,0,0,1),
(434,'30081140','段怀录','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',33,3,0,0,1),
(435,'30081141','米启超','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,2,0,0,1),
(436,'30081142','王许涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(437,'30081143','刘艳杰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(438,'30081144','董兴华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(439,'30081145','马东晓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',35,2,0,0,1),
(440,'30081146','樊铮钰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',35,3,0,0,1),
(441,'30081147','张溪潺','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',36,2,0,0,1),
(442,'30081148','李红亚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',37,2,0,0,1),
(443,'30081149','闫  涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',38,2,0,0,1),
(444,'30081150','张  凯','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',38,3,0,0,1),
(445,'30081151','刘新民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',39,2,0,0,1),
(446,'30081152','胡红伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',39,3,0,0,1),
(447,'30081153','张法成','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,2,0,0,1),
(448,'30081154','樊继宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,3,0,0,1),
(449,'30081155','杨新民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,3,0,0,1),
(450,'30081156','武伯军','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',41,2,0,0,1),
(451,'30081157','蒋剑虹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',41,3,0,0,1),
(452,'30081158','张玉焕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,2,0,0,1),
(453,'30081159','蔡宝森','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,3,0,0,1),
(454,'30081160','景  勤','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,3,0,0,1),
(455,'30081161','杜玲枝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',43,2,0,0,1),
(456,'30081162','杨广建','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,2,0,0,1),
(457,'30081163','赵宝山','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(458,'30081164','程建敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(459,'30081165','朱新锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(460,'30081166','张奉举','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,2,0,0,1),
(461,'30081167','张龙栓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(462,'30081168','罗  代','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(463,'30081169','  刘 健','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(464,'30081170','王  刚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(465,'30081021','孙留山','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,2,0,0,1),
(466,'30081022','姜  欣','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,3,0,0,1),
(467,'30081023','张守义','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,3,0,0,1),
(468,'30081024','田中敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,2,0,0,1),
(469,'30081025','王世翔','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,3,0,0,1),
(470,'30081026','吴  晶','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,3,0,0,1),
(471,'30081027','白  燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,2,0,0,1),
(472,'30081028','吴晓红','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,3,0,0,1),
(473,'30081029','舒雪冬','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,3,0,0,1),
(474,'30081030','张建国','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',4,2,0,0,1),
(475,'30081031','王  哲','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',4,3,0,0,1),
(476,'30081032','杨  璐','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(477,'30081033','殷战稳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,2,0,0,1),
(478,'30081034','赵灵芝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(479,'30081035','樊昀瑛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(480,'30081036','杜留记','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(481,'30081037','侯占营','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,2,0,0,1),
(482,'30081038','王  译','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,3,0,0,1),
(483,'30081039','褚清营','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,3,0,0,1),
(484,'30081040','毕军贤','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,2,0,0,1),
(485,'30081041','杨高峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,3,0,0,1),
(486,'30081042','王东旭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,3,0,0,1),
(487,'30081043','赵安芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,2,0,0,1),
(488,'30081044','赵兴涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(489,'30081045','霍松涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(490,'30081046','郭金敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(491,'30081047','马明江','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,2,0,0,1),
(492,'30081048','曹恒慧','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,3,0,0,1),
(493,'30081049','张大力','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,3,0,0,1),
(494,'30081050','张洪力','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,2,0,0,1),
(495,'30081051','高成全','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,3,0,0,1),
(496,'30081052','苗道华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,3,0,0,1),
(497,'30081053','郑豪民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',11,2,0,0,1),
(498,'30081054','徐明升','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',11,3,0,0,1),
(499,'30081055','闫继涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,2,0,0,1),
(500,'30081056','何  燚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,3,0,0,1),
(501,'30081057','李涛飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,3,0,0,1),
(502,'30081058','马照民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,2,0,0,1),
(503,'30081059','张晓丽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,3,0,0,1),
(504,'30081060','李旭伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,3,0,0,1),
(505,'30081061','牛季收','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,2,0,0,1),
(506,'30081062','李红群','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,3,0,0,1),
(507,'30081063','范光明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,3,0,0,1),
(508,'30081064','陈松涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,2,0,0,1),
(509,'30081065','张群祎','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,3,0,0,1),
(510,'30081066','李永献','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,3,0,0,1),
(511,'30081067','闫中华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,2,0,0,1),
(512,'30081068','周桂芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,3,0,0,1),
(513,'30081069','陈艳民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,3,0,0,1),
(514,'30081070','孙方行','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',17,2,0,0,1),
(515,'30081071','欧阳华澍','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',17,3,0,0,1),
(516,'30081072','李青岭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,2,0,0,1),
(517,'30081073','宋新生','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,2,0,0,1),
(518,'30081074','卫国祥','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(519,'30081075','尹振羽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(520,'30081076','朱  凯','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(521,'30081077','李爱增','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(522,'30081078','谢学明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,2,0,0,1),
(523,'30081079','闫  瑾','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,2,0,0,1),
(524,'30081080','刘  钦','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(525,'30081081','马  斌','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(526,'30081082','祖立厂','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(527,'30081083','王  宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(528,'30081084','马宁奇','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,2,0,0,1),
(529,'30081085','郭一飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,2,0,0,1),
(530,'30081086','朱泮民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(531,'30081087','田长勋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(532,'30081088','毛艳丽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(533,'30081089','王  森','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,2,0,0,1),
(534,'30081090','邢  燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,2,0,0,1),
(535,'30081091','周  勃','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(536,'30081092','郭  汝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(537,'30081093','朱晓菲','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(538,'30081094','刘海燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,2,0,0,1),
(539,'30081095','马良涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,2,0,0,1),
(540,'30081096','弓亚超','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,3,0,0,1),
(541,'30081097','周恒涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,3,0,0,1),
(542,'30081098','吕鹏飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,2,0,0,1),
(543,'30081099','张宏敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,2,0,0,1),
(544,'30081100','卫柳艳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(545,'30081101','刘贵明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(546,'30081102','高松峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(547,'30081103','马步伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,2,0,0,1),
(548,'30081104','陈玉兴','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,2,0,0,1),
(549,'30081105','李  阳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,3,0,0,1),
(550,'30081106','汤喜辉','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,3,0,0,1),
(551,'30081107','李宝宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,2,0,0,1),
(552,'30081108','何宗要','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,2,0,0,1),
(553,'30081109','张  星','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(554,'30081110','赵军民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(555,'30081111','张俊峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(556,'30081112','赵静生','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,2,0,0,1),
(557,'30081113','樊晓虹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,2,0,0,1),
(558,'30081114','董燕飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(559,'30081115','孙炳海','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(560,'30081116','韩耀飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(561,'30081117','焦学然','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,2,0,0,1),
(562,'30081118','赵海鹏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,2,0,0,1),
(563,'30081119','赵振新','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(564,'30081120','雷佑安','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(565,'30081121','丁明洁','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(566,'30081122','金  利','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,2,0,0,1),
(567,'30081123','李冰冰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,2,0,0,1),
(568,'30081124','胡建业','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,3,0,0,1),
(569,'30081125','谢朝晖','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,3,0,0,1),
(570,'30081126','刘雅妹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,2,0,0,1),
(571,'30081127','徐华锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,2,0,0,1),
(572,'30081128','李富强','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,3,0,0,1),
(573,'30081129','袁  晓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,2,0,0,1),
(574,'30081130','秦平新','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,2,0,0,1),
(575,'30081131','于修涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,3,0,0,1),
(576,'30081132','秦小锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,3,0,0,1),
(577,'30081133','王艳芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,2,0,0,1),
(578,'30081134','张  强','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,2,0,0,1),
(579,'30081135','王芹萼','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,3,0,0,1),
(580,'30081136','常  静','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,2,0,0,1),
(581,'30081137','杨雷亭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,3,0,0,1),
(582,'30081138','赵爱民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,3,0,0,1),
(583,'30081139','卢华东','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',33,2,0,0,1),
(584,'30081140','段怀录','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',33,3,0,0,1),
(585,'30081141','米启超','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,2,0,0,1),
(586,'30081142','王许涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(587,'30081143','刘艳杰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(588,'30081144','董兴华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(589,'30081145','马东晓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',35,2,0,0,1),
(590,'30081146','樊铮钰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',35,3,0,0,1),
(591,'30081147','张溪潺','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',36,2,0,0,1),
(592,'30081148','李红亚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',37,2,0,0,1),
(593,'30081149','闫  涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',38,2,0,0,1),
(594,'30081150','张  凯','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',38,3,0,0,1),
(595,'30081151','刘新民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',39,2,0,0,1),
(596,'30081152','胡红伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',39,3,0,0,1),
(597,'30081153','张法成','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,2,0,0,1),
(598,'30081154','樊继宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,3,0,0,1),
(599,'30081155','杨新民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,3,0,0,1),
(600,'30081156','武伯军','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',41,2,0,0,1),
(601,'30081157','蒋剑虹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',41,3,0,0,1),
(602,'30081158','张玉焕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,2,0,0,1),
(603,'30081159','蔡宝森','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,3,0,0,1),
(604,'30081160','景  勤','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,3,0,0,1),
(605,'30081161','杜玲枝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',43,2,0,0,1),
(606,'30081162','杨广建','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,2,0,0,1),
(607,'30081163','赵宝山','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(608,'30081164','程建敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(609,'30081165','朱新锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(610,'30081166','张奉举','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,2,0,0,1),
(611,'30081167','张龙栓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(612,'30081168','罗  代','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(613,'30081169','  刘 健','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(614,'30081170','王  刚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(615,'30081021','孙留山','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,2,0,0,1),
(616,'30081022','姜  欣','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,3,0,0,1),
(617,'30081023','张守义','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,3,0,0,1),
(618,'30081024','田中敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,2,0,0,1),
(619,'30081025','王世翔','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,3,0,0,1),
(620,'30081026','吴  晶','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,3,0,0,1),
(621,'30081027','白  燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,2,0,0,1),
(622,'30081028','吴晓红','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,3,0,0,1),
(623,'30081029','舒雪冬','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,3,0,0,1),
(624,'30081030','张建国','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',4,2,0,0,1),
(625,'30081031','王  哲','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',4,3,0,0,1),
(626,'30081032','杨  璐','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(627,'30081033','殷战稳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,2,0,0,1),
(628,'30081034','赵灵芝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(629,'30081035','樊昀瑛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(630,'30081036','杜留记','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(631,'30081037','侯占营','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,2,0,0,1),
(632,'30081038','王  译','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,3,0,0,1),
(633,'30081039','褚清营','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,3,0,0,1),
(634,'30081040','毕军贤','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,2,0,0,1),
(635,'30081041','杨高峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,3,0,0,1),
(636,'30081042','王东旭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,3,0,0,1),
(637,'30081043','赵安芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,2,0,0,1),
(638,'30081044','赵兴涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(639,'30081045','霍松涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(640,'30081046','郭金敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(641,'30081047','马明江','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,2,0,0,1),
(642,'30081048','曹恒慧','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,3,0,0,1),
(643,'30081049','张大力','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,3,0,0,1),
(644,'30081050','张洪力','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,2,0,0,1),
(645,'30081051','高成全','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,3,0,0,1),
(646,'30081052','苗道华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,3,0,0,1),
(647,'30081053','郑豪民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',11,2,0,0,1),
(648,'30081054','徐明升','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',11,3,0,0,1),
(649,'30081055','闫继涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,2,0,0,1),
(650,'30081056','何  燚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,3,0,0,1),
(651,'30081057','李涛飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,3,0,0,1),
(652,'30081058','马照民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,2,0,0,1),
(653,'30081059','张晓丽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,3,0,0,1),
(654,'30081060','李旭伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,3,0,0,1),
(655,'30081061','牛季收','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,2,0,0,1),
(656,'30081062','李红群','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,3,0,0,1),
(657,'30081063','范光明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,3,0,0,1),
(658,'30081064','陈松涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,2,0,0,1),
(659,'30081065','张群祎','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,3,0,0,1),
(660,'30081066','李永献','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,3,0,0,1),
(661,'30081067','闫中华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,2,0,0,1),
(662,'30081068','周桂芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,3,0,0,1),
(663,'30081069','陈艳民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,3,0,0,1),
(664,'30081070','孙方行','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',17,2,0,0,1),
(665,'30081071','欧阳华澍','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',17,3,0,0,1),
(666,'30081072','李青岭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,2,0,0,1),
(667,'30081073','宋新生','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,2,0,0,1),
(668,'30081074','卫国祥','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(669,'30081075','尹振羽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(670,'30081076','朱  凯','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(671,'30081077','李爱增','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(672,'30081078','谢学明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,2,0,0,1),
(673,'30081079','闫  瑾','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,2,0,0,1),
(674,'30081080','刘  钦','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(675,'30081081','马  斌','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(676,'30081082','祖立厂','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(677,'30081083','王  宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(678,'30081084','马宁奇','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,2,0,0,1),
(679,'30081085','郭一飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,2,0,0,1),
(680,'30081086','朱泮民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(681,'30081087','田长勋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(682,'30081088','毛艳丽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(683,'30081089','王  森','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,2,0,0,1),
(684,'30081090','邢  燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,2,0,0,1),
(685,'30081091','周  勃','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(686,'30081092','郭  汝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(687,'30081093','朱晓菲','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(688,'30081094','刘海燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,2,0,0,1),
(689,'30081095','马良涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,2,0,0,1),
(690,'30081096','弓亚超','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,3,0,0,1),
(691,'30081097','周恒涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,3,0,0,1),
(692,'30081098','吕鹏飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,2,0,0,1),
(693,'30081099','张宏敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,2,0,0,1),
(694,'30081100','卫柳艳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(695,'30081101','刘贵明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(696,'30081102','高松峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(697,'30081103','马步伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,2,0,0,1),
(698,'30081104','陈玉兴','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,2,0,0,1),
(699,'30081105','李  阳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,3,0,0,1),
(700,'30081106','汤喜辉','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,3,0,0,1),
(701,'30081107','李宝宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,2,0,0,1),
(702,'30081108','何宗要','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,2,0,0,1),
(703,'30081109','张  星','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(704,'30081110','赵军民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(705,'30081111','张俊峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(706,'30081112','赵静生','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,2,0,0,1),
(707,'30081113','樊晓虹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,2,0,0,1),
(708,'30081114','董燕飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(709,'30081115','孙炳海','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(710,'30081116','韩耀飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(711,'30081117','焦学然','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,2,0,0,1),
(712,'30081118','赵海鹏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,2,0,0,1),
(713,'30081119','赵振新','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(714,'30081120','雷佑安','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(715,'30081121','丁明洁','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(716,'30081122','金  利','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,2,0,0,1),
(717,'30081123','李冰冰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,2,0,0,1),
(718,'30081124','胡建业','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,3,0,0,1),
(719,'30081125','谢朝晖','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,3,0,0,1),
(720,'30081126','刘雅妹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,2,0,0,1),
(721,'30081127','徐华锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,2,0,0,1),
(722,'30081128','李富强','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,3,0,0,1),
(723,'30081129','袁  晓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,2,0,0,1),
(724,'30081130','秦平新','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,2,0,0,1),
(725,'30081131','于修涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,3,0,0,1),
(726,'30081132','秦小锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,3,0,0,1),
(727,'30081133','王艳芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,2,0,0,1),
(728,'30081134','张  强','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,2,0,0,1),
(729,'30081135','王芹萼','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,3,0,0,1),
(730,'30081136','常  静','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,2,0,0,1),
(731,'30081137','杨雷亭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,3,0,0,1),
(732,'30081138','赵爱民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,3,0,0,1),
(733,'30081139','卢华东','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',33,2,0,0,1),
(734,'30081140','段怀录','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',33,3,0,0,1),
(735,'30081141','米启超','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,2,0,0,1),
(736,'30081142','王许涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(737,'30081143','刘艳杰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(738,'30081144','董兴华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(739,'30081145','马东晓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',35,2,0,0,1),
(740,'30081146','樊铮钰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',35,3,0,0,1),
(741,'30081147','张溪潺','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',36,2,0,0,1),
(742,'30081148','李红亚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',37,2,0,0,1),
(743,'30081149','闫  涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',38,2,0,0,1),
(744,'30081150','张  凯','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',38,3,0,0,1),
(745,'30081151','刘新民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',39,2,0,0,1),
(746,'30081152','胡红伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',39,3,0,0,1),
(747,'30081153','张法成','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,2,0,0,1),
(748,'30081154','樊继宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,3,0,0,1),
(749,'30081155','杨新民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,3,0,0,1),
(750,'30081156','武伯军','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',41,2,0,0,1),
(751,'30081157','蒋剑虹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',41,3,0,0,1),
(752,'30081158','张玉焕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,2,0,0,1),
(753,'30081159','蔡宝森','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,3,0,0,1),
(754,'30081160','景  勤','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,3,0,0,1),
(755,'30081161','杜玲枝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',43,2,0,0,1),
(756,'30081162','杨广建','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,2,0,0,1),
(757,'30081163','赵宝山','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(758,'30081164','程建敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(759,'30081165','朱新锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(760,'30081166','张奉举','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,2,0,0,1),
(761,'30081167','张龙栓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(762,'30081168','罗  代','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(763,'30081169','  刘 健','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(764,'30081170','王  刚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(765,'30081021','孙留山','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,2,0,0,1),
(766,'30081022','姜  欣','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,3,0,0,1),
(767,'30081023','张守义','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',1,3,0,0,1),
(768,'30081024','田中敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,2,0,0,1),
(769,'30081025','王世翔','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,3,0,0,1),
(770,'30081026','吴  晶','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',2,3,0,0,1),
(771,'30081027','白  燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,2,0,0,1),
(772,'30081028','吴晓红','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,3,0,0,1),
(773,'30081029','舒雪冬','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',3,3,0,0,1),
(774,'30081030','张建国','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',4,2,0,0,1),
(775,'30081031','王  哲','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',4,3,0,0,1),
(776,'30081032','杨  璐','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(777,'30081033','殷战稳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,2,0,0,1),
(778,'30081034','赵灵芝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(779,'30081035','樊昀瑛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(780,'30081036','杜留记','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',5,3,0,0,1),
(781,'30081037','侯占营','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,2,0,0,1),
(782,'30081038','王  译','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,3,0,0,1),
(783,'30081039','褚清营','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',6,3,0,0,1),
(784,'30081040','毕军贤','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,2,0,0,1),
(785,'30081041','杨高峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,3,0,0,1),
(786,'30081042','王东旭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',7,3,0,0,1),
(787,'30081043','赵安芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,2,0,0,1),
(788,'30081044','赵兴涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(789,'30081045','霍松涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(790,'30081046','郭金敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',8,3,0,0,1),
(791,'30081047','马明江','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,2,0,0,1),
(792,'30081048','曹恒慧','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,3,0,0,1),
(793,'30081049','张大力','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',9,3,0,0,1),
(794,'30081050','张洪力','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,2,0,0,1),
(795,'30081051','高成全','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,3,0,0,1),
(796,'30081052','苗道华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',10,3,0,0,1),
(797,'30081053','郑豪民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',11,2,0,0,1),
(798,'30081054','徐明升','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',11,3,0,0,1),
(799,'30081055','闫继涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,2,0,0,1),
(800,'30081056','何  燚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,3,0,0,1),
(801,'30081057','李涛飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',12,3,0,0,1),
(802,'30081058','马照民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,2,0,0,1),
(803,'30081059','张晓丽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,3,0,0,1),
(804,'30081060','李旭伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',13,3,0,0,1),
(805,'30081061','牛季收','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,2,0,0,1),
(806,'30081062','李红群','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,3,0,0,1),
(807,'30081063','范光明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',14,3,0,0,1),
(808,'30081064','陈松涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,2,0,0,1),
(809,'30081065','张群祎','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,3,0,0,1),
(810,'30081066','李永献','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',15,3,0,0,1),
(811,'30081067','闫中华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,2,0,0,1),
(812,'30081068','周桂芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,3,0,0,1),
(813,'30081069','陈艳民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',16,3,0,0,1),
(814,'30081070','孙方行','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',17,2,0,0,1),
(815,'30081071','欧阳华澍','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',17,3,0,0,1),
(816,'30081072','李青岭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,2,0,0,1),
(817,'30081073','宋新生','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,2,0,0,1),
(818,'30081074','卫国祥','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(819,'30081075','尹振羽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(820,'30081076','朱  凯','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(821,'30081077','李爱增','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',18,3,0,0,1),
(822,'30081078','谢学明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,2,0,0,1),
(823,'30081079','闫  瑾','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,2,0,0,1),
(824,'30081080','刘  钦','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(825,'30081081','马  斌','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(826,'30081082','祖立厂','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(827,'30081083','王  宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',19,3,0,0,1),
(828,'30081084','马宁奇','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,2,0,0,1),
(829,'30081085','郭一飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,2,0,0,1),
(830,'30081086','朱泮民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(831,'30081087','田长勋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(832,'30081088','毛艳丽','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',20,3,0,0,1),
(833,'30081089','王  森','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,2,0,0,1),
(834,'30081090','邢  燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,2,0,0,1),
(835,'30081091','周  勃','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(836,'30081092','郭  汝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(837,'30081093','朱晓菲','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',21,3,0,0,1),
(838,'30081094','刘海燕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,2,0,0,1),
(839,'30081095','马良涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,2,0,0,1),
(840,'30081096','弓亚超','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,3,0,0,1),
(841,'30081097','周恒涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',22,3,0,0,1),
(842,'30081098','吕鹏飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,2,0,0,1),
(843,'30081099','张宏敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,2,0,0,1),
(844,'30081100','卫柳艳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(845,'30081101','刘贵明','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(846,'30081102','高松峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',23,3,0,0,1),
(847,'30081103','马步伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,2,0,0,1),
(848,'30081104','陈玉兴','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,2,0,0,1),
(849,'30081105','李  阳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,3,0,0,1),
(850,'30081106','汤喜辉','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',24,3,0,0,1),
(851,'30081107','李宝宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,2,0,0,1),
(852,'30081108','何宗要','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,2,0,0,1),
(853,'30081109','张  星','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(854,'30081110','赵军民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(855,'30081111','张俊峰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,3,0,0,1),
(856,'30081112','赵静生','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,2,0,0,1),
(857,'30081113','樊晓虹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,2,0,0,1),
(858,'30081114','董燕飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(859,'30081115','孙炳海','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(860,'30081116','韩耀飞','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',26,3,0,0,1),
(861,'30081117','焦学然','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,2,0,0,1),
(862,'30081118','赵海鹏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,2,0,0,1),
(863,'30081119','赵振新','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(864,'30081120','雷佑安','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(865,'30081121','丁明洁','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',27,3,0,0,1),
(866,'30081122','金  利','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,2,0,0,1),
(867,'30081123','李冰冰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,2,0,0,1),
(868,'30081124','胡建业','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,3,0,0,1),
(869,'30081125','谢朝晖','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',28,3,0,0,1),
(870,'30081126','刘雅妹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,2,0,0,1),
(871,'30081127','徐华锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,2,0,0,1),
(872,'30081128','李富强','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',29,3,0,0,1),
(873,'30081129','袁  晓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,2,0,0,1),
(874,'30081130','秦平新','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,2,0,0,1),
(875,'30081131','于修涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,3,0,0,1),
(876,'30081132','秦小锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',30,3,0,0,1),
(877,'30081133','王艳芳','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,2,0,0,1),
(878,'30081134','张  强','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,2,0,0,1),
(879,'30081135','王芹萼','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',31,3,0,0,1),
(880,'30081136','常  静','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,2,0,0,1),
(881,'30081137','杨雷亭','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,3,0,0,1),
(882,'30081138','赵爱民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',32,3,0,0,1),
(883,'30081139','卢华东','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',33,2,0,0,1),
(884,'30081140','段怀录','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',33,3,0,0,1),
(885,'30081141','米启超','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,2,0,0,1),
(886,'30081142','王许涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(887,'30081143','刘艳杰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(888,'30081144','董兴华','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',34,3,0,0,1),
(889,'30081145','马东晓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',35,2,0,0,1),
(890,'30081146','樊铮钰','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',35,3,0,0,1),
(891,'30081147','张溪潺','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',36,2,0,0,1),
(892,'30081148','李红亚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',37,2,0,0,1),
(893,'30081149','闫  涛','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',38,2,0,0,1),
(894,'30081150','张  凯','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',38,3,0,0,1),
(895,'30081151','刘新民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',39,2,0,0,1),
(896,'30081152','胡红伟','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',39,3,0,0,1),
(897,'30081153','张法成','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,2,0,0,1),
(898,'30081154','樊继宏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,3,0,0,1),
(899,'30081155','杨新民','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',40,3,0,0,1),
(900,'30081156','武伯军','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',41,2,0,0,1),
(901,'30081157','蒋剑虹','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',41,3,0,0,1),
(902,'30081158','张玉焕','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,2,0,0,1),
(903,'30081159','蔡宝森','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,3,0,0,1),
(904,'30081160','景  勤','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,3,0,0,1),
(905,'30081161','杜玲枝','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',43,2,0,0,1),
(906,'30081162','杨广建','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,2,0,0,1),
(907,'30081163','赵宝山','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(908,'30081164','程建敏','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(909,'30081165','朱新锋','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',44,3,0,0,1),
(910,'30081166','张奉举','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,2,0,0,1),
(911,'30081167','张龙栓','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(912,'30081168','罗  代','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(913,'30081169','  刘 健','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(914,'30081170','王  刚','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',45,3,0,0,1),
(917,'30081171','张大军','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',42,4,0,0,NULL),
(918,'20161021','柳运昌','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,4,0,0,NULL),
(919,'30080808','郭力争','$2a$08$MszvaUVDReELMp/szgiePudvyHM0R7MtDRmTc1Z9EHyNqGZgtMv5S','images/head-student.png',25,4,0,0,0),
(920,'20161021','柳运昌','123456','img/1234.jpg',25,4,0,0,0),
(921,'30081021','孙留山','123456','img/1234.jpg',1,2,0,0,0),
(922,'30081022','姜  欣','123456','img/1234.jpg',1,3,0,0,0),
(923,'30081023','张守义','123456','img/1234.jpg',1,3,0,0,0),
(924,'30081024','田中敏','123456','img/1234.jpg',2,2,0,0,0),
(925,'30081025','王世翔','123456','img/1234.jpg',2,3,0,0,0),
(926,'30081026','吴  晶','123456','img/1234.jpg',2,3,0,0,0),
(927,'30081027','白  燕','123456','img/1234.jpg',3,2,0,0,0),
(928,'30081028','吴晓红','123456','img/1234.jpg',3,3,0,0,0),
(929,'30081029','舒雪冬','123456','img/1234.jpg',3,3,0,0,0),
(930,'30081030','张建国','123456','img/1234.jpg',4,2,0,0,0),
(931,'30081031','王  哲','123456','img/1234.jpg',4,3,0,0,0),
(932,'30081032','杨  璐','123456','img/1234.jpg',5,3,0,0,0),
(933,'30081033','殷战稳','123456','img/1234.jpg',5,2,0,0,0),
(934,'30081034','赵灵芝','123456','img/1234.jpg',5,3,0,0,0),
(935,'30081035','樊昀瑛','123456','img/1234.jpg',5,3,0,0,0),
(936,'30081036','杜留记','123456','img/1234.jpg',5,3,0,0,0),
(937,'30081037','侯占营','123456','img/1234.jpg',6,2,0,0,0),
(938,'30081038','王  译','123456','img/1234.jpg',6,3,0,0,0),
(939,'30081039','褚清营','123456','img/1234.jpg',6,3,0,0,0),
(940,'30081040','毕军贤','123456','img/1234.jpg',7,2,0,0,0),
(941,'30081041','杨高峰','123456','img/1234.jpg',7,3,0,0,0),
(942,'30081042','王东旭','123456','img/1234.jpg',7,3,0,0,0),
(943,'30081043','赵安芳','123456','img/1234.jpg',8,2,0,0,0),
(944,'30081044','赵兴涛','123456','img/1234.jpg',8,3,0,0,0),
(945,'30081045','霍松涛','123456','img/1234.jpg',8,3,0,0,0),
(946,'30081046','郭金敏','123456','img/1234.jpg',8,3,0,0,0),
(947,'30081047','马明江','123456','img/1234.jpg',9,2,0,0,0),
(948,'30081048','曹恒慧','123456','img/1234.jpg',9,3,0,0,0),
(949,'30081049','张大力','123456','img/1234.jpg',9,3,0,0,0),
(950,'30081050','张洪力','123456','img/1234.jpg',10,2,0,0,0),
(951,'30081051','高成全','123456','img/1234.jpg',10,3,0,0,0),
(952,'30081052','苗道华','123456','img/1234.jpg',10,3,0,0,0),
(953,'30081053','郑豪民','123456','img/1234.jpg',11,2,0,0,0),
(954,'30081054','徐明升','123456','img/1234.jpg',11,3,0,0,0),
(955,'30081055','闫继涛','123456','img/1234.jpg',12,2,0,0,0),
(956,'30081056','何  燚','123456','img/1234.jpg',12,3,0,0,0),
(957,'30081057','李涛飞','123456','img/1234.jpg',12,3,0,0,0),
(958,'30081058','马照民','123456','img/1234.jpg',13,2,0,0,0),
(959,'30081059','张晓丽','123456','img/1234.jpg',13,3,0,0,0),
(960,'30081060','李旭伟','123456','img/1234.jpg',13,3,0,0,0),
(961,'30081061','牛季收','123456','img/1234.jpg',14,2,0,0,0),
(962,'30081062','李红群','123456','img/1234.jpg',14,3,0,0,0),
(963,'30081063','范光明','123456','img/1234.jpg',14,3,0,0,0),
(964,'30081064','陈松涛','123456','img/1234.jpg',15,2,0,0,0),
(965,'30081065','张群祎','123456','img/1234.jpg',15,3,0,0,0),
(966,'30081066','李永献','123456','img/1234.jpg',15,3,0,0,0),
(967,'30081067','闫中华','123456','img/1234.jpg',16,2,0,0,0),
(968,'30081068','周桂芳','123456','img/1234.jpg',16,3,0,0,0),
(969,'30081069','陈艳民','123456','img/1234.jpg',16,3,0,0,0),
(970,'30081070','孙方行','123456','img/1234.jpg',17,2,0,0,0),
(971,'30081071','欧阳华澍','123456','img/1234.jpg',17,3,0,0,0),
(972,'30081072','李青岭','123456','img/1234.jpg',18,2,0,0,0),
(973,'30081073','宋新生','123456','img/1234.jpg',18,2,0,0,0),
(974,'30081074','卫国祥','123456','img/1234.jpg',18,3,0,0,0),
(975,'30081075','尹振羽','123456','img/1234.jpg',18,3,0,0,0),
(976,'30081076','朱  凯','123456','img/1234.jpg',18,3,0,0,0),
(977,'30081077','李爱增','123456','img/1234.jpg',18,3,0,0,0),
(978,'30081078','谢学明','123456','img/1234.jpg',19,2,0,0,0),
(979,'30081079','闫  瑾','123456','img/1234.jpg',19,2,0,0,0),
(980,'30081080','刘  钦','123456','img/1234.jpg',19,3,0,0,0),
(981,'30081081','马  斌','123456','img/1234.jpg',19,3,0,0,0),
(982,'30081082','祖立厂','123456','img/1234.jpg',19,3,0,0,0),
(983,'30081083','王  宏','123456','img/1234.jpg',19,3,0,0,0),
(984,'30081084','马宁奇','123456','img/1234.jpg',20,2,0,0,0),
(985,'30081085','郭一飞','123456','img/1234.jpg',20,2,0,0,0),
(986,'30081086','朱泮民','123456','img/1234.jpg',20,3,0,0,0),
(987,'30081087','田长勋','123456','img/1234.jpg',20,3,0,0,0),
(988,'30081088','毛艳丽','123456','img/1234.jpg',20,3,0,0,0),
(989,'30081089','王  森','123456','img/1234.jpg',21,2,0,0,0),
(990,'30081090','邢  燕','123456','img/1234.jpg',21,2,0,0,0),
(991,'30081091','周  勃','123456','img/1234.jpg',21,3,0,0,0),
(992,'30081092','郭  汝','123456','img/1234.jpg',21,3,0,0,0),
(993,'30081093','朱晓菲','123456','img/1234.jpg',21,3,0,0,0),
(994,'30081094','刘海燕','123456','img/1234.jpg',22,2,0,0,0),
(995,'30081095','马良涛','123456','img/1234.jpg',22,2,0,0,0),
(996,'30081096','弓亚超','123456','img/1234.jpg',22,3,0,0,0),
(997,'30081097','周恒涛','123456','img/1234.jpg',22,3,0,0,0),
(998,'30081098','吕鹏飞','123456','img/1234.jpg',23,2,0,0,0),
(999,'30081099','张宏敏','123456','img/1234.jpg',23,2,0,0,0),
(1000,'30081100','卫柳艳','123456','img/1234.jpg',23,3,0,0,0),
(1001,'30081101','刘贵明','123456','img/1234.jpg',23,3,0,0,0),
(1002,'30081102','高松峰','123456','img/1234.jpg',23,3,0,0,0),
(1003,'30081103','马步伟','123456','img/1234.jpg',24,2,0,0,0),
(1004,'30081104','陈玉兴','123456','img/1234.jpg',24,2,0,0,0),
(1005,'30081105','李  阳','123456','img/1234.jpg',24,3,0,0,0),
(1006,'30081106','汤喜辉','123456','img/1234.jpg',24,3,0,0,0),
(1007,'30081107','李宝宏','123456','img/1234.jpg',25,2,0,0,0),
(1008,'30081108','何宗要','123456','img/1234.jpg',25,2,0,0,0),
(1009,'30081109','张  星','123456','img/1234.jpg',25,3,0,0,0),
(1010,'30081110','赵军民','123456','img/1234.jpg',25,3,0,0,0),
(1011,'30081111','张俊峰','123456','img/1234.jpg',25,3,0,0,0),
(1012,'30081112','赵静生','123456','img/1234.jpg',26,2,0,0,0),
(1013,'30081113','樊晓虹','123456','img/1234.jpg',26,2,0,0,0),
(1014,'30081114','董燕飞','123456','img/1234.jpg',26,3,0,0,0),
(1015,'30081115','孙炳海','123456','img/1234.jpg',26,3,0,0,0),
(1016,'30081116','韩耀飞','123456','img/1234.jpg',26,3,0,0,0),
(1017,'30081117','焦学然','123456','img/1234.jpg',27,2,0,0,0),
(1018,'30081118','赵海鹏','123456','img/1234.jpg',27,2,0,0,0),
(1019,'30081119','赵振新','123456','img/1234.jpg',27,3,0,0,0),
(1020,'30081120','雷佑安','123456','img/1234.jpg',27,3,0,0,0),
(1021,'30081121','丁明洁','123456','img/1234.jpg',27,3,0,0,0),
(1022,'30081122','金  利','123456','img/1234.jpg',28,2,0,0,0),
(1023,'30081123','李冰冰','123456','img/1234.jpg',28,2,0,0,0),
(1024,'30081124','胡建业','123456','img/1234.jpg',28,3,0,0,0),
(1025,'30081125','谢朝晖','123456','img/1234.jpg',28,3,0,0,0),
(1026,'30081126','刘雅妹','123456','img/1234.jpg',29,2,0,0,0),
(1027,'30081127','徐华锋','123456','img/1234.jpg',29,2,0,0,0),
(1028,'30081128','李富强','123456','img/1234.jpg',29,3,0,0,0),
(1029,'30081129','袁  晓','123456','img/1234.jpg',30,2,0,0,0),
(1030,'30081130','秦平新','123456','img/1234.jpg',30,2,0,0,0),
(1031,'30081131','于修涛','123456','img/1234.jpg',30,3,0,0,0),
(1032,'30081132','秦小锋','123456','img/1234.jpg',30,3,0,0,0),
(1033,'30081133','王艳芳','123456','img/1234.jpg',31,2,0,0,0),
(1034,'30081134','张  强','123456','img/1234.jpg',31,2,0,0,0),
(1035,'30081135','王芹萼','123456','img/1234.jpg',31,3,0,0,0),
(1036,'30081136','常  静','123456','img/1234.jpg',32,2,0,0,0),
(1037,'30081137','杨雷亭','123456','img/1234.jpg',32,3,0,0,0),
(1038,'30081138','赵爱民','123456','img/1234.jpg',32,3,0,0,0),
(1039,'30081139','卢华东','123456','img/1234.jpg',33,2,0,0,0),
(1040,'30081140','段怀录','123456','img/1234.jpg',33,3,0,0,0),
(1041,'30081141','米启超','123456','img/1234.jpg',34,2,0,0,0),
(1042,'30081142','王许涛','123456','img/1234.jpg',34,3,0,0,0),
(1043,'30081143','刘艳杰','123456','img/1234.jpg',34,3,0,0,0),
(1044,'30081144','董兴华','123456','img/1234.jpg',34,3,0,0,0),
(1045,'30081145','马东晓','123456','img/1234.jpg',35,2,0,0,0),
(1046,'30081146','樊铮钰','123456','img/1234.jpg',35,3,0,0,0),
(1047,'30081147','张溪潺','123456','img/1234.jpg',36,2,0,0,0),
(1048,'30081148','李红亚','123456','img/1234.jpg',37,2,0,0,0),
(1049,'30081149','闫  涛','123456','img/1234.jpg',38,2,0,0,0),
(1050,'30081150','张  凯','123456','img/1234.jpg',38,3,0,0,0),
(1051,'30081151','刘新民','123456','img/1234.jpg',39,2,0,0,0),
(1052,'30081152','胡红伟','123456','img/1234.jpg',39,3,0,0,0),
(1053,'30081153','张法成','123456','img/1234.jpg',40,2,0,0,0),
(1054,'30081154','樊继宏','123456','img/1234.jpg',40,3,0,0,0),
(1055,'30081155','杨新民','123456','img/1234.jpg',40,3,0,0,0),
(1056,'30081156','武伯军','123456','img/1234.jpg',41,2,0,0,0),
(1057,'30081157','蒋剑虹','123456','img/1234.jpg',41,3,0,0,0),
(1058,'30081158','张玉焕','123456','img/1234.jpg',42,2,0,0,0),
(1059,'30081159','蔡宝森','123456','img/1234.jpg',42,3,0,0,0),
(1060,'30081160','景  勤','123456','img/1234.jpg',42,3,0,0,0),
(1061,'30081161','杜玲枝','123456','img/1234.jpg',43,2,0,0,0),
(1062,'30081162','杨广建','123456','img/1234.jpg',44,2,0,0,0),
(1063,'30081163','赵宝山','123456','img/1234.jpg',44,3,0,0,0),
(1064,'30081164','程建敏','123456','img/1234.jpg',44,3,0,0,0),
(1065,'30081165','朱新锋','123456','img/1234.jpg',44,3,0,0,0),
(1066,'30081166','张奉举','123456','img/1234.jpg',45,2,0,0,0),
(1067,'30081167','张龙栓','123456','img/1234.jpg',45,3,0,0,0),
(1068,'30081168','罗  代','123456','img/1234.jpg',45,3,0,0,0),
(1069,'30081169','  刘 健','123456','img/1234.jpg',45,3,0,0,0),
(1070,'30081170','王  刚','123456','img/1234.jpg',45,3,0,0,0),
(1071,'30081021','孙留山','123456','img/1234.jpg',1,2,0,0,0),
(1072,'30081022','姜  欣','123456','img/1234.jpg',1,3,0,0,0),
(1073,'30081023','张守义','123456','img/1234.jpg',1,3,0,0,0),
(1074,'30081024','田中敏','123456','img/1234.jpg',2,2,0,0,0),
(1075,'30081025','王世翔','123456','img/1234.jpg',2,3,0,0,0),
(1076,'30081026','吴  晶','123456','img/1234.jpg',2,3,0,0,0),
(1077,'30081027','白  燕','123456','img/1234.jpg',3,2,0,0,0),
(1078,'30081028','吴晓红','123456','img/1234.jpg',3,3,0,0,0),
(1079,'30081029','舒雪冬','123456','img/1234.jpg',3,3,0,0,0),
(1080,'30081030','张建国','123456','img/1234.jpg',4,2,0,0,0),
(1081,'30081031','王  哲','123456','img/1234.jpg',4,3,0,0,0),
(1082,'30081032','杨  璐','123456','img/1234.jpg',5,3,0,0,0),
(1083,'30081033','殷战稳','123456','img/1234.jpg',5,2,0,0,0),
(1084,'30081034','赵灵芝','123456','img/1234.jpg',5,3,0,0,0),
(1085,'30081035','樊昀瑛','123456','img/1234.jpg',5,3,0,0,0),
(1086,'30081036','杜留记','123456','img/1234.jpg',5,3,0,0,0),
(1087,'30081037','侯占营','123456','img/1234.jpg',6,2,0,0,0),
(1088,'30081038','王  译','123456','img/1234.jpg',6,3,0,0,0),
(1089,'30081039','褚清营','123456','img/1234.jpg',6,3,0,0,0),
(1090,'30081040','毕军贤','123456','img/1234.jpg',7,2,0,0,0),
(1091,'30081041','杨高峰','123456','img/1234.jpg',7,3,0,0,0),
(1092,'30081042','王东旭','123456','img/1234.jpg',7,3,0,0,0),
(1093,'30081043','赵安芳','123456','img/1234.jpg',8,2,0,0,0),
(1094,'30081044','赵兴涛','123456','img/1234.jpg',8,3,0,0,0),
(1095,'30081045','霍松涛','123456','img/1234.jpg',8,3,0,0,0),
(1096,'30081046','郭金敏','123456','img/1234.jpg',8,3,0,0,0),
(1097,'30081047','马明江','123456','img/1234.jpg',9,2,0,0,0),
(1098,'30081048','曹恒慧','123456','img/1234.jpg',9,3,0,0,0),
(1099,'30081049','张大力','123456','img/1234.jpg',9,3,0,0,0),
(1100,'30081050','张洪力','123456','img/1234.jpg',10,2,0,0,0),
(1101,'30081051','高成全','123456','img/1234.jpg',10,3,0,0,0),
(1102,'30081052','苗道华','123456','img/1234.jpg',10,3,0,0,0),
(1103,'30081053','郑豪民','123456','img/1234.jpg',11,2,0,0,0),
(1104,'30081054','徐明升','123456','img/1234.jpg',11,3,0,0,0),
(1105,'30081055','闫继涛','123456','img/1234.jpg',12,2,0,0,0),
(1106,'30081056','何  燚','123456','img/1234.jpg',12,3,0,0,0),
(1107,'30081057','李涛飞','123456','img/1234.jpg',12,3,0,0,0),
(1108,'30081058','马照民','123456','img/1234.jpg',13,2,0,0,0),
(1109,'30081059','张晓丽','123456','img/1234.jpg',13,3,0,0,0),
(1110,'30081060','李旭伟','123456','img/1234.jpg',13,3,0,0,0),
(1111,'30081061','牛季收','123456','img/1234.jpg',14,2,0,0,0),
(1112,'30081062','李红群','123456','img/1234.jpg',14,3,0,0,0),
(1113,'30081063','范光明','123456','img/1234.jpg',14,3,0,0,0),
(1114,'30081064','陈松涛','123456','img/1234.jpg',15,2,0,0,0),
(1115,'30081065','张群祎','123456','img/1234.jpg',15,3,0,0,0),
(1116,'30081066','李永献','123456','img/1234.jpg',15,3,0,0,0),
(1117,'30081067','闫中华','123456','img/1234.jpg',16,2,0,0,0),
(1118,'30081068','周桂芳','123456','img/1234.jpg',16,3,0,0,0),
(1119,'30081069','陈艳民','123456','img/1234.jpg',16,3,0,0,0),
(1120,'30081070','孙方行','123456','img/1234.jpg',17,2,0,0,0),
(1121,'30081071','欧阳华澍','123456','img/1234.jpg',17,3,0,0,0),
(1122,'30081072','李青岭','123456','img/1234.jpg',18,2,0,0,0),
(1123,'30081073','宋新生','123456','img/1234.jpg',18,2,0,0,0),
(1124,'30081074','卫国祥','123456','img/1234.jpg',18,3,0,0,0),
(1125,'30081075','尹振羽','123456','img/1234.jpg',18,3,0,0,0),
(1126,'30081076','朱  凯','123456','img/1234.jpg',18,3,0,0,0),
(1127,'30081077','李爱增','123456','img/1234.jpg',18,3,0,0,0),
(1128,'30081078','谢学明','123456','img/1234.jpg',19,2,0,0,0),
(1129,'30081079','闫  瑾','123456','img/1234.jpg',19,2,0,0,0),
(1130,'30081080','刘  钦','123456','img/1234.jpg',19,3,0,0,0),
(1131,'30081081','马  斌','123456','img/1234.jpg',19,3,0,0,0),
(1132,'30081082','祖立厂','123456','img/1234.jpg',19,3,0,0,0),
(1133,'30081083','王  宏','123456','img/1234.jpg',19,3,0,0,0),
(1134,'30081084','马宁奇','123456','img/1234.jpg',20,2,0,0,0),
(1135,'30081085','郭一飞','123456','img/1234.jpg',20,2,0,0,0),
(1136,'30081086','朱泮民','123456','img/1234.jpg',20,3,0,0,0),
(1137,'30081087','田长勋','123456','img/1234.jpg',20,3,0,0,0),
(1138,'30081088','毛艳丽','123456','img/1234.jpg',20,3,0,0,0),
(1139,'30081089','王  森','123456','img/1234.jpg',21,2,0,0,0),
(1140,'30081090','邢  燕','123456','img/1234.jpg',21,2,0,0,0),
(1141,'30081091','周  勃','123456','img/1234.jpg',21,3,0,0,0),
(1142,'30081092','郭  汝','123456','img/1234.jpg',21,3,0,0,0),
(1143,'30081093','朱晓菲','123456','img/1234.jpg',21,3,0,0,0),
(1144,'30081094','刘海燕','123456','img/1234.jpg',22,2,0,0,0),
(1145,'30081095','马良涛','123456','img/1234.jpg',22,2,0,0,0),
(1146,'30081096','弓亚超','123456','img/1234.jpg',22,3,0,0,0),
(1147,'30081097','周恒涛','123456','img/1234.jpg',22,3,0,0,0),
(1148,'30081098','吕鹏飞','123456','img/1234.jpg',23,2,0,0,0),
(1149,'30081099','张宏敏','123456','img/1234.jpg',23,2,0,0,0),
(1150,'30081100','卫柳艳','123456','img/1234.jpg',23,3,0,0,0),
(1151,'30081101','刘贵明','123456','img/1234.jpg',23,3,0,0,0),
(1152,'30081102','高松峰','123456','img/1234.jpg',23,3,0,0,0),
(1153,'30081103','马步伟','123456','img/1234.jpg',24,2,0,0,0),
(1154,'30081104','陈玉兴','123456','img/1234.jpg',24,2,0,0,0),
(1155,'30081105','李  阳','123456','img/1234.jpg',24,3,0,0,0),
(1156,'30081106','汤喜辉','123456','img/1234.jpg',24,3,0,0,0),
(1157,'30081107','李宝宏','123456','img/1234.jpg',25,2,0,0,0),
(1158,'30081108','何宗要','123456','img/1234.jpg',25,2,0,0,0),
(1159,'30081109','张  星','123456','img/1234.jpg',25,3,0,0,0),
(1160,'30081110','赵军民','123456','img/1234.jpg',25,3,0,0,0),
(1161,'30081111','张俊峰','123456','img/1234.jpg',25,3,0,0,0),
(1162,'30081112','赵静生','123456','img/1234.jpg',26,2,0,0,0),
(1163,'30081113','樊晓虹','123456','img/1234.jpg',26,2,0,0,0),
(1164,'30081114','董燕飞','123456','img/1234.jpg',26,3,0,0,0),
(1165,'30081115','孙炳海','123456','img/1234.jpg',26,3,0,0,0),
(1166,'30081116','韩耀飞','123456','img/1234.jpg',26,3,0,0,0),
(1167,'30081117','焦学然','123456','img/1234.jpg',27,2,0,0,0),
(1168,'30081118','赵海鹏','123456','img/1234.jpg',27,2,0,0,0),
(1169,'30081119','赵振新','123456','img/1234.jpg',27,3,0,0,0),
(1170,'30081120','雷佑安','123456','img/1234.jpg',27,3,0,0,0),
(1171,'30081121','丁明洁','123456','img/1234.jpg',27,3,0,0,0),
(1172,'30081122','金  利','123456','img/1234.jpg',28,2,0,0,0),
(1173,'30081123','李冰冰','123456','img/1234.jpg',28,2,0,0,0),
(1174,'30081124','胡建业','123456','img/1234.jpg',28,3,0,0,0),
(1175,'30081125','谢朝晖','123456','img/1234.jpg',28,3,0,0,0),
(1176,'30081126','刘雅妹','123456','img/1234.jpg',29,2,0,0,0),
(1177,'30081127','徐华锋','123456','img/1234.jpg',29,2,0,0,0),
(1178,'30081128','李富强','123456','img/1234.jpg',29,3,0,0,0),
(1179,'30081129','袁  晓','123456','img/1234.jpg',30,2,0,0,0),
(1180,'30081130','秦平新','123456','img/1234.jpg',30,2,0,0,0),
(1181,'30081131','于修涛','123456','img/1234.jpg',30,3,0,0,0),
(1182,'30081132','秦小锋','123456','img/1234.jpg',30,3,0,0,0),
(1183,'30081133','王艳芳','123456','img/1234.jpg',31,2,0,0,0),
(1184,'30081134','张  强','123456','img/1234.jpg',31,2,0,0,0),
(1185,'30081135','王芹萼','123456','img/1234.jpg',31,3,0,0,0),
(1186,'30081136','常  静','123456','img/1234.jpg',32,2,0,0,0),
(1187,'30081137','杨雷亭','123456','img/1234.jpg',32,3,0,0,0),
(1188,'30081138','赵爱民','123456','img/1234.jpg',32,3,0,0,0),
(1189,'30081139','卢华东','123456','img/1234.jpg',33,2,0,0,0),
(1190,'30081140','段怀录','123456','img/1234.jpg',33,3,0,0,0),
(1191,'30081141','米启超','123456','img/1234.jpg',34,2,0,0,0),
(1192,'30081142','王许涛','123456','img/1234.jpg',34,3,0,0,0),
(1193,'30081143','刘艳杰','123456','img/1234.jpg',34,3,0,0,0),
(1194,'30081144','董兴华','123456','img/1234.jpg',34,3,0,0,0),
(1195,'30081145','马东晓','123456','img/1234.jpg',35,2,0,0,0),
(1196,'30081146','樊铮钰','123456','img/1234.jpg',35,3,0,0,0),
(1197,'30081147','张溪潺','123456','img/1234.jpg',36,2,0,0,0),
(1198,'30081148','李红亚','123456','img/1234.jpg',37,2,0,0,0),
(1199,'30081149','闫  涛','123456','img/1234.jpg',38,2,0,0,0),
(1200,'30081150','张  凯','123456','img/1234.jpg',38,3,0,0,0),
(1201,'30081151','刘新民','123456','img/1234.jpg',39,2,0,0,0),
(1202,'30081152','胡红伟','123456','img/1234.jpg',39,3,0,0,0),
(1203,'30081153','张法成','123456','img/1234.jpg',40,2,0,0,0),
(1204,'30081154','樊继宏','123456','img/1234.jpg',40,3,0,0,0),
(1205,'30081155','杨新民','123456','img/1234.jpg',40,3,0,0,0),
(1206,'30081156','武伯军','123456','img/1234.jpg',41,2,0,0,0),
(1207,'30081157','蒋剑虹','123456','img/1234.jpg',41,3,0,0,0),
(1208,'30081158','张玉焕','123456','img/1234.jpg',42,2,0,0,0),
(1209,'30081159','蔡宝森','123456','img/1234.jpg',42,3,0,0,0),
(1210,'30081160','景  勤','123456','img/1234.jpg',42,3,0,0,0),
(1211,'30081161','杜玲枝','123456','img/1234.jpg',43,2,0,0,0),
(1212,'30081162','杨广建','123456','img/1234.jpg',44,2,0,0,0),
(1213,'30081163','赵宝山','123456','img/1234.jpg',44,3,0,0,0),
(1214,'30081164','程建敏','123456','img/1234.jpg',44,3,0,0,0),
(1215,'30081165','朱新锋','123456','img/1234.jpg',44,3,0,0,0),
(1216,'30081166','张奉举','123456','img/1234.jpg',45,2,0,0,0),
(1217,'30081167','张龙栓','123456','img/1234.jpg',45,3,0,0,0),
(1218,'30081168','罗  代','123456','img/1234.jpg',45,3,0,0,0),
(1219,'30081169','  刘 健','123456','img/1234.jpg',45,3,0,0,0),
(1220,'30081170','王  刚','123456','img/1234.jpg',45,3,0,0,0),
(1311,'30081021','孙留山','123456','img/1234.jpg',1,2,0,0,0),
(1312,'30081022','姜  欣','123456','img/1234.jpg',1,3,0,0,0),
(1313,'30081023','张守义','123456','img/1234.jpg',1,3,0,0,0),
(1314,'30081024','田中敏','123456','img/1234.jpg',2,2,0,0,0),
(1315,'30081025','王世翔','123456','img/1234.jpg',2,3,0,0,0),
(1316,'30081026','吴  晶','123456','img/1234.jpg',2,3,0,0,0),
(1317,'30081027','白  燕','123456','img/1234.jpg',3,2,0,0,0),
(1318,'30081028','吴晓红','123456','img/1234.jpg',3,3,0,0,0),
(1319,'30081029','舒雪冬','123456','img/1234.jpg',3,3,0,0,0),
(1320,'30081030','张建国','123456','img/1234.jpg',4,2,0,0,0),
(1321,'30081031','王  哲','123456','img/1234.jpg',4,3,0,0,0),
(1322,'30081032','杨  璐','123456','img/1234.jpg',5,3,0,0,0),
(1323,'30081033','殷战稳','123456','img/1234.jpg',5,2,0,0,0),
(1324,'30081034','赵灵芝','123456','img/1234.jpg',5,3,0,0,0),
(1325,'30081035','樊昀瑛','123456','img/1234.jpg',5,3,0,0,0),
(1326,'30081036','杜留记','123456','img/1234.jpg',5,3,0,0,0),
(1327,'30081037','侯占营','123456','img/1234.jpg',6,2,0,0,0),
(1328,'30081038','王  译','123456','img/1234.jpg',6,3,0,0,0),
(1329,'30081039','褚清营','123456','img/1234.jpg',6,3,0,0,0),
(1330,'30081040','毕军贤','123456','img/1234.jpg',7,2,0,0,0),
(1331,'30081041','杨高峰','123456','img/1234.jpg',7,3,0,0,0),
(1332,'30081042','王东旭','123456','img/1234.jpg',7,3,0,0,0),
(1333,'30081043','赵安芳','123456','img/1234.jpg',8,2,0,0,0),
(1334,'30081044','赵兴涛','123456','img/1234.jpg',8,3,0,0,0),
(1335,'30081045','霍松涛','123456','img/1234.jpg',8,3,0,0,0),
(1336,'30081046','郭金敏','123456','img/1234.jpg',8,3,0,0,0),
(1337,'30081047','马明江','123456','img/1234.jpg',9,2,0,0,0),
(1338,'30081048','曹恒慧','123456','img/1234.jpg',9,3,0,0,0),
(1339,'30081049','张大力','123456','img/1234.jpg',9,3,0,0,0),
(1340,'30081050','张洪力','123456','img/1234.jpg',10,2,0,0,0),
(1341,'30081051','高成全','123456','img/1234.jpg',10,3,0,0,0),
(1342,'30081052','苗道华','123456','img/1234.jpg',10,3,0,0,0),
(1343,'30081053','郑豪民','123456','img/1234.jpg',11,2,0,0,0),
(1344,'30081054','徐明升','123456','img/1234.jpg',11,3,0,0,0),
(1345,'30081055','闫继涛','123456','img/1234.jpg',12,2,0,0,0),
(1346,'30081056','何  燚','123456','img/1234.jpg',12,3,0,0,0),
(1347,'30081057','李涛飞','123456','img/1234.jpg',12,3,0,0,0),
(1348,'30081058','马照民','123456','img/1234.jpg',13,2,0,0,0),
(1349,'30081059','张晓丽','123456','img/1234.jpg',13,3,0,0,0),
(1350,'30081060','李旭伟','123456','img/1234.jpg',13,3,0,0,0),
(1351,'30081061','牛季收','123456','img/1234.jpg',14,2,0,0,0),
(1352,'30081062','李红群','123456','img/1234.jpg',14,3,0,0,0),
(1353,'30081063','范光明','123456','img/1234.jpg',14,3,0,0,0),
(1354,'30081064','陈松涛','123456','img/1234.jpg',15,2,0,0,0),
(1355,'30081065','张群祎','123456','img/1234.jpg',15,3,0,0,0),
(1356,'30081066','李永献','123456','img/1234.jpg',15,3,0,0,0),
(1357,'30081067','闫中华','123456','img/1234.jpg',16,2,0,0,0),
(1358,'30081068','周桂芳','123456','img/1234.jpg',16,3,0,0,0),
(1359,'30081069','陈艳民','123456','img/1234.jpg',16,3,0,0,0),
(1360,'30081070','孙方行','123456','img/1234.jpg',17,2,0,0,0),
(1361,'30081071','欧阳华澍','123456','img/1234.jpg',17,3,0,0,0),
(1362,'30081072','李青岭','123456','img/1234.jpg',18,2,0,0,0),
(1363,'30081073','宋新生','123456','img/1234.jpg',18,2,0,0,0),
(1364,'30081074','卫国祥','123456','img/1234.jpg',18,3,0,0,0),
(1365,'30081075','尹振羽','123456','img/1234.jpg',18,3,0,0,0),
(1366,'30081076','朱  凯','123456','img/1234.jpg',18,3,0,0,0),
(1367,'30081077','李爱增','123456','img/1234.jpg',18,3,0,0,0),
(1368,'30081078','谢学明','123456','img/1234.jpg',19,2,0,0,0),
(1369,'30081079','闫  瑾','123456','img/1234.jpg',19,2,0,0,0),
(1370,'30081080','刘  钦','123456','img/1234.jpg',19,3,0,0,0),
(1371,'30081081','马  斌','123456','img/1234.jpg',19,3,0,0,0),
(1372,'30081082','祖立厂','123456','img/1234.jpg',19,3,0,0,0),
(1373,'30081083','王  宏','123456','img/1234.jpg',19,3,0,0,0),
(1374,'30081084','马宁奇','123456','img/1234.jpg',20,2,0,0,0),
(1375,'30081085','郭一飞','123456','img/1234.jpg',20,2,0,0,0),
(1376,'30081086','朱泮民','123456','img/1234.jpg',20,3,0,0,0),
(1377,'30081087','田长勋','123456','img/1234.jpg',20,3,0,0,0),
(1378,'30081088','毛艳丽','123456','img/1234.jpg',20,3,0,0,0),
(1379,'30081089','王  森','123456','img/1234.jpg',21,2,0,0,0),
(1380,'30081090','邢  燕','123456','img/1234.jpg',21,2,0,0,0),
(1381,'30081091','周  勃','123456','img/1234.jpg',21,3,0,0,0),
(1382,'30081092','郭  汝','123456','img/1234.jpg',21,3,0,0,0),
(1383,'30081093','朱晓菲','123456','img/1234.jpg',21,3,0,0,0),
(1384,'30081094','刘海燕','123456','img/1234.jpg',22,2,0,0,0),
(1385,'30081095','马良涛','123456','img/1234.jpg',22,2,0,0,0),
(1386,'30081096','弓亚超','123456','img/1234.jpg',22,3,0,0,0),
(1387,'30081097','周恒涛','123456','img/1234.jpg',22,3,0,0,0),
(1388,'30081098','吕鹏飞','123456','img/1234.jpg',23,2,0,0,0),
(1389,'30081099','张宏敏','123456','img/1234.jpg',23,2,0,0,0),
(1390,'30081100','卫柳艳','123456','img/1234.jpg',23,3,0,0,0),
(1391,'30081101','刘贵明','123456','img/1234.jpg',23,3,0,0,0),
(1392,'30081102','高松峰','123456','img/1234.jpg',23,3,0,0,0),
(1393,'30081103','马步伟','123456','img/1234.jpg',24,2,0,0,0),
(1394,'30081104','陈玉兴','123456','img/1234.jpg',24,2,0,0,0),
(1395,'30081105','李  阳','123456','img/1234.jpg',24,3,0,0,0),
(1396,'30081106','汤喜辉','123456','img/1234.jpg',24,3,0,0,0),
(1397,'30081107','李宝宏','123456','img/1234.jpg',25,2,0,0,0),
(1398,'30081108','何宗要','123456','img/1234.jpg',25,2,0,0,0),
(1399,'30081109','张  星','123456','img/1234.jpg',25,3,0,0,0),
(1400,'30081110','赵军民','123456','img/1234.jpg',25,3,0,0,0),
(1401,'30081111','张俊峰','123456','img/1234.jpg',25,3,0,0,0),
(1402,'30081112','赵静生','123456','img/1234.jpg',26,2,0,0,0),
(1403,'30081113','樊晓虹','123456','img/1234.jpg',26,2,0,0,0),
(1404,'30081114','董燕飞','123456','img/1234.jpg',26,3,0,0,0),
(1405,'30081115','孙炳海','123456','img/1234.jpg',26,3,0,0,0),
(1406,'30081116','韩耀飞','123456','img/1234.jpg',26,3,0,0,0),
(1407,'30081117','焦学然','123456','img/1234.jpg',27,2,0,0,0),
(1408,'30081118','赵海鹏','123456','img/1234.jpg',27,2,0,0,0),
(1409,'30081119','赵振新','123456','img/1234.jpg',27,3,0,0,0),
(1410,'30081120','雷佑安','123456','img/1234.jpg',27,3,0,0,0),
(1411,'30081121','丁明洁','123456','img/1234.jpg',27,3,0,0,0),
(1412,'30081122','金  利','123456','img/1234.jpg',28,2,0,0,0),
(1413,'30081123','李冰冰','123456','img/1234.jpg',28,2,0,0,0),
(1414,'30081124','胡建业','123456','img/1234.jpg',28,3,0,0,0),
(1415,'30081125','谢朝晖','123456','img/1234.jpg',28,3,0,0,0),
(1416,'30081126','刘雅妹','123456','img/1234.jpg',29,2,0,0,0),
(1417,'30081127','徐华锋','123456','img/1234.jpg',29,2,0,0,0),
(1418,'30081128','李富强','123456','img/1234.jpg',29,3,0,0,0),
(1419,'30081129','袁  晓','123456','img/1234.jpg',30,2,0,0,0),
(1420,'30081130','秦平新','123456','img/1234.jpg',30,2,0,0,0),
(1421,'30081131','于修涛','123456','img/1234.jpg',30,3,0,0,0),
(1422,'30081132','秦小锋','123456','img/1234.jpg',30,3,0,0,0),
(1423,'30081133','王艳芳','123456','img/1234.jpg',31,2,0,0,0),
(1424,'30081134','张  强','123456','img/1234.jpg',31,2,0,0,0),
(1425,'30081135','王芹萼','123456','img/1234.jpg',31,3,0,0,0),
(1426,'30081136','常  静','123456','img/1234.jpg',32,2,0,0,0),
(1427,'30081137','杨雷亭','123456','img/1234.jpg',32,3,0,0,0),
(1428,'30081138','赵爱民','123456','img/1234.jpg',32,3,0,0,0),
(1429,'30081139','卢华东','123456','img/1234.jpg',33,2,0,0,0),
(1430,'30081140','段怀录','123456','img/1234.jpg',33,3,0,0,0),
(1431,'30081141','米启超','123456','img/1234.jpg',34,2,0,0,0),
(1432,'30081142','王许涛','123456','img/1234.jpg',34,3,0,0,0),
(1433,'30081143','刘艳杰','123456','img/1234.jpg',34,3,0,0,0),
(1434,'30081144','董兴华','123456','img/1234.jpg',34,3,0,0,0),
(1435,'30081145','马东晓','123456','img/1234.jpg',35,2,0,0,0),
(1436,'30081146','樊铮钰','123456','img/1234.jpg',35,3,0,0,0),
(1437,'30081147','张溪潺','123456','img/1234.jpg',36,2,0,0,0),
(1438,'30081148','李红亚','123456','img/1234.jpg',37,2,0,0,0),
(1439,'30081149','闫  涛','123456','img/1234.jpg',38,2,0,0,0),
(1440,'30081150','张  凯','123456','img/1234.jpg',38,3,0,0,0),
(1441,'30081151','刘新民','123456','img/1234.jpg',39,2,0,0,0),
(1442,'30081152','胡红伟','123456','img/1234.jpg',39,3,0,0,0),
(1443,'30081153','张法成','123456','img/1234.jpg',40,2,0,0,0),
(1444,'30081154','樊继宏','123456','img/1234.jpg',40,3,0,0,0),
(1445,'30081155','杨新民','123456','img/1234.jpg',40,3,0,0,0),
(1446,'30081156','武伯军','123456','img/1234.jpg',41,2,0,0,0),
(1447,'30081157','蒋剑虹','123456','img/1234.jpg',41,3,0,0,0),
(1448,'30081158','张玉焕','123456','img/1234.jpg',42,2,0,0,0),
(1449,'30081159','蔡宝森','123456','img/1234.jpg',42,3,0,0,0),
(1450,'30081160','景  勤','123456','img/1234.jpg',42,3,0,0,0),
(1451,'30081161','杜玲枝','123456','img/1234.jpg',43,2,0,0,0),
(1452,'30081162','杨广建','123456','img/1234.jpg',44,2,0,0,0),
(1453,'30081163','赵宝山','123456','img/1234.jpg',44,3,0,0,0),
(1454,'30081164','程建敏','123456','img/1234.jpg',44,3,0,0,0),
(1455,'30081165','朱新锋','123456','img/1234.jpg',44,3,0,0,0),
(1456,'30081166','张奉举','123456','img/1234.jpg',45,2,0,0,0),
(1457,'30081167','张龙栓','123456','img/1234.jpg',45,3,0,0,0),
(1458,'30081168','罗  代','123456','img/1234.jpg',45,3,0,0,0),
(1459,'30081169','  刘 健','123456','img/1234.jpg',45,3,0,0,0),
(1460,'30081170','王  刚','123456','img/1234.jpg',45,3,0,0,0),
(1461,'30081021','孙留山','123456','img/1234.jpg',1,2,0,0,0),
(1462,'30081022','姜  欣','123456','img/1234.jpg',1,3,0,0,0),
(1463,'30081023','张守义','123456','img/1234.jpg',1,3,0,0,0),
(1464,'30081024','田中敏','123456','img/1234.jpg',2,2,0,0,0),
(1465,'30081025','王世翔','123456','img/1234.jpg',2,3,0,0,0),
(1466,'30081026','吴  晶','123456','img/1234.jpg',2,3,0,0,0),
(1467,'30081027','白  燕','123456','img/1234.jpg',3,2,0,0,0),
(1468,'30081028','吴晓红','123456','img/1234.jpg',3,3,0,0,0),
(1469,'30081029','舒雪冬','123456','img/1234.jpg',3,3,0,0,0),
(1470,'30081030','张建国','123456','img/1234.jpg',4,2,0,0,0),
(1471,'30081031','王  哲','123456','img/1234.jpg',4,3,0,0,0),
(1472,'30081032','杨  璐','123456','img/1234.jpg',5,3,0,0,0),
(1473,'30081033','殷战稳','123456','img/1234.jpg',5,2,0,0,0),
(1474,'30081034','赵灵芝','123456','img/1234.jpg',5,3,0,0,0),
(1475,'30081035','樊昀瑛','123456','img/1234.jpg',5,3,0,0,0),
(1476,'30081036','杜留记','123456','img/1234.jpg',5,3,0,0,0),
(1477,'30081037','侯占营','123456','img/1234.jpg',6,2,0,0,0),
(1478,'30081038','王  译','123456','img/1234.jpg',6,3,0,0,0),
(1479,'30081039','褚清营','123456','img/1234.jpg',6,3,0,0,0),
(1480,'30081040','毕军贤','123456','img/1234.jpg',7,2,0,0,0),
(1481,'30081041','杨高峰','123456','img/1234.jpg',7,3,0,0,0),
(1482,'30081042','王东旭','123456','img/1234.jpg',7,3,0,0,0),
(1483,'30081043','赵安芳','123456','img/1234.jpg',8,2,0,0,0),
(1484,'30081044','赵兴涛','123456','img/1234.jpg',8,3,0,0,0),
(1485,'30081045','霍松涛','123456','img/1234.jpg',8,3,0,0,0),
(1486,'30081046','郭金敏','123456','img/1234.jpg',8,3,0,0,0),
(1487,'30081047','马明江','123456','img/1234.jpg',9,2,0,0,0),
(1488,'30081048','曹恒慧','123456','img/1234.jpg',9,3,0,0,0),
(1489,'30081049','张大力','123456','img/1234.jpg',9,3,0,0,0),
(1490,'30081050','张洪力','123456','img/1234.jpg',10,2,0,0,0),
(1491,'30081051','高成全','123456','img/1234.jpg',10,3,0,0,0),
(1492,'30081052','苗道华','123456','img/1234.jpg',10,3,0,0,0),
(1493,'30081053','郑豪民','123456','img/1234.jpg',11,2,0,0,0),
(1494,'30081054','徐明升','123456','img/1234.jpg',11,3,0,0,0),
(1495,'30081055','闫继涛','123456','img/1234.jpg',12,2,0,0,0),
(1496,'30081056','何  燚','123456','img/1234.jpg',12,3,0,0,0),
(1497,'30081057','李涛飞','123456','img/1234.jpg',12,3,0,0,0),
(1498,'30081058','马照民','123456','img/1234.jpg',13,2,0,0,0),
(1499,'30081059','张晓丽','123456','img/1234.jpg',13,3,0,0,0),
(1500,'30081060','李旭伟','123456','img/1234.jpg',13,3,0,0,0),
(1501,'30081061','牛季收','123456','img/1234.jpg',14,2,0,0,0),
(1502,'30081062','李红群','123456','img/1234.jpg',14,3,0,0,0),
(1503,'30081063','范光明','123456','img/1234.jpg',14,3,0,0,0),
(1504,'30081064','陈松涛','123456','img/1234.jpg',15,2,0,0,0),
(1505,'30081065','张群祎','123456','img/1234.jpg',15,3,0,0,0),
(1506,'30081066','李永献','123456','img/1234.jpg',15,3,0,0,0),
(1507,'30081067','闫中华','123456','img/1234.jpg',16,2,0,0,0),
(1508,'30081068','周桂芳','123456','img/1234.jpg',16,3,0,0,0),
(1509,'30081069','陈艳民','123456','img/1234.jpg',16,3,0,0,0),
(1510,'30081070','孙方行','123456','img/1234.jpg',17,2,0,0,0),
(1511,'30081071','欧阳华澍','123456','img/1234.jpg',17,3,0,0,0),
(1512,'30081072','李青岭','123456','img/1234.jpg',18,2,0,0,0),
(1513,'30081073','宋新生','123456','img/1234.jpg',18,2,0,0,0),
(1514,'30081074','卫国祥','123456','img/1234.jpg',18,3,0,0,0),
(1515,'30081075','尹振羽','123456','img/1234.jpg',18,3,0,0,0),
(1516,'30081076','朱  凯','123456','img/1234.jpg',18,3,0,0,0),
(1517,'30081077','李爱增','123456','img/1234.jpg',18,3,0,0,0),
(1518,'30081078','谢学明','123456','img/1234.jpg',19,2,0,0,0),
(1519,'30081079','闫  瑾','123456','img/1234.jpg',19,2,0,0,0),
(1520,'30081080','刘  钦','123456','img/1234.jpg',19,3,0,0,0),
(1521,'30081081','马  斌','123456','img/1234.jpg',19,3,0,0,0),
(1522,'30081082','祖立厂','123456','img/1234.jpg',19,3,0,0,0),
(1523,'30081083','王  宏','123456','img/1234.jpg',19,3,0,0,0),
(1524,'30081084','马宁奇','123456','img/1234.jpg',20,2,0,0,0),
(1525,'30081085','郭一飞','123456','img/1234.jpg',20,2,0,0,0),
(1526,'30081086','朱泮民','123456','img/1234.jpg',20,3,0,0,0),
(1527,'30081087','田长勋','123456','img/1234.jpg',20,3,0,0,0),
(1528,'30081088','毛艳丽','123456','img/1234.jpg',20,3,0,0,0),
(1529,'30081089','王  森','123456','img/1234.jpg',21,2,0,0,0),
(1530,'30081090','邢  燕','123456','img/1234.jpg',21,2,0,0,0),
(1531,'30081091','周  勃','123456','img/1234.jpg',21,3,0,0,0),
(1532,'30081092','郭  汝','123456','img/1234.jpg',21,3,0,0,0),
(1533,'30081093','朱晓菲','123456','img/1234.jpg',21,3,0,0,0),
(1534,'30081094','刘海燕','123456','img/1234.jpg',22,2,0,0,0),
(1535,'30081095','马良涛','123456','img/1234.jpg',22,2,0,0,0),
(1536,'30081096','弓亚超','123456','img/1234.jpg',22,3,0,0,0),
(1537,'30081097','周恒涛','123456','img/1234.jpg',22,3,0,0,0),
(1538,'30081098','吕鹏飞','123456','img/1234.jpg',23,2,0,0,0),
(1539,'30081099','张宏敏','123456','img/1234.jpg',23,2,0,0,0),
(1540,'30081100','卫柳艳','123456','img/1234.jpg',23,3,0,0,0),
(1541,'30081101','刘贵明','123456','img/1234.jpg',23,3,0,0,0),
(1542,'30081102','高松峰','123456','img/1234.jpg',23,3,0,0,0),
(1543,'30081103','马步伟','123456','img/1234.jpg',24,2,0,0,0),
(1544,'30081104','陈玉兴','123456','img/1234.jpg',24,2,0,0,0),
(1545,'30081105','李  阳','123456','img/1234.jpg',24,3,0,0,0),
(1546,'30081106','汤喜辉','123456','img/1234.jpg',24,3,0,0,0),
(1547,'30081107','李宝宏','123456','img/1234.jpg',25,2,0,0,0),
(1548,'30081108','何宗要','123456','img/1234.jpg',25,2,0,0,0),
(1549,'30081109','张  星','123456','img/1234.jpg',25,3,0,0,0),
(1550,'30081110','赵军民','123456','img/1234.jpg',25,3,0,0,0),
(1551,'30081111','张俊峰','123456','img/1234.jpg',25,3,0,0,0),
(1552,'30081112','赵静生','123456','img/1234.jpg',26,2,0,0,0),
(1553,'30081113','樊晓虹','123456','img/1234.jpg',26,2,0,0,0),
(1554,'30081114','董燕飞','123456','img/1234.jpg',26,3,0,0,0),
(1555,'30081115','孙炳海','123456','img/1234.jpg',26,3,0,0,0),
(1556,'30081116','韩耀飞','123456','img/1234.jpg',26,3,0,0,0),
(1557,'30081117','焦学然','123456','img/1234.jpg',27,2,0,0,0),
(1558,'30081118','赵海鹏','123456','img/1234.jpg',27,2,0,0,0),
(1559,'30081119','赵振新','123456','img/1234.jpg',27,3,0,0,0),
(1560,'30081120','雷佑安','123456','img/1234.jpg',27,3,0,0,0),
(1561,'30081121','丁明洁','123456','img/1234.jpg',27,3,0,0,0),
(1562,'30081122','金  利','123456','img/1234.jpg',28,2,0,0,0),
(1563,'30081123','李冰冰','123456','img/1234.jpg',28,2,0,0,0),
(1564,'30081124','胡建业','123456','img/1234.jpg',28,3,0,0,0),
(1565,'30081125','谢朝晖','123456','img/1234.jpg',28,3,0,0,0),
(1566,'30081126','刘雅妹','123456','img/1234.jpg',29,2,0,0,0),
(1567,'30081127','徐华锋','123456','img/1234.jpg',29,2,0,0,0),
(1568,'30081128','李富强','123456','img/1234.jpg',29,3,0,0,0),
(1569,'30081129','袁  晓','123456','img/1234.jpg',30,2,0,0,0),
(1570,'30081130','秦平新','123456','img/1234.jpg',30,2,0,0,0),
(1571,'30081131','于修涛','123456','img/1234.jpg',30,3,0,0,0),
(1572,'30081132','秦小锋','123456','img/1234.jpg',30,3,0,0,0),
(1573,'30081133','王艳芳','123456','img/1234.jpg',31,2,0,0,0),
(1574,'30081134','张  强','123456','img/1234.jpg',31,2,0,0,0),
(1575,'30081135','王芹萼','123456','img/1234.jpg',31,3,0,0,0),
(1576,'30081136','常  静','123456','img/1234.jpg',32,2,0,0,0),
(1577,'30081137','杨雷亭','123456','img/1234.jpg',32,3,0,0,0),
(1578,'30081138','赵爱民','123456','img/1234.jpg',32,3,0,0,0),
(1579,'30081139','卢华东','123456','img/1234.jpg',33,2,0,0,0),
(1580,'30081140','段怀录','123456','img/1234.jpg',33,3,0,0,0),
(1581,'30081141','米启超','123456','img/1234.jpg',34,2,0,0,0),
(1582,'30081142','王许涛','123456','img/1234.jpg',34,3,0,0,0),
(1583,'30081143','刘艳杰','123456','img/1234.jpg',34,3,0,0,0),
(1584,'30081144','董兴华','123456','img/1234.jpg',34,3,0,0,0),
(1585,'30081145','马东晓','123456','img/1234.jpg',35,2,0,0,0),
(1586,'30081146','樊铮钰','123456','img/1234.jpg',35,3,0,0,0),
(1587,'30081147','张溪潺','123456','img/1234.jpg',36,2,0,0,0),
(1588,'30081148','李红亚','123456','img/1234.jpg',37,2,0,0,0),
(1589,'30081149','闫  涛','123456','img/1234.jpg',38,2,0,0,0),
(1590,'30081150','张  凯','123456','img/1234.jpg',38,3,0,0,0),
(1591,'30081151','刘新民','123456','img/1234.jpg',39,2,0,0,0),
(1592,'30081152','胡红伟','123456','img/1234.jpg',39,3,0,0,0),
(1593,'30081153','张法成','123456','img/1234.jpg',40,2,0,0,0),
(1594,'30081154','樊继宏','123456','img/1234.jpg',40,3,0,0,0),
(1595,'30081155','杨新民','123456','img/1234.jpg',40,3,0,0,0),
(1596,'30081156','武伯军','123456','img/1234.jpg',41,2,0,0,0),
(1597,'30081157','蒋剑虹','123456','img/1234.jpg',41,3,0,0,0),
(1598,'30081158','张玉焕','123456','img/1234.jpg',42,2,0,0,0),
(1599,'30081159','蔡宝森','123456','img/1234.jpg',42,3,0,0,0),
(1600,'30081160','景  勤','123456','img/1234.jpg',42,3,0,0,0),
(1601,'30081161','杜玲枝','123456','img/1234.jpg',43,2,0,0,0),
(1602,'30081162','杨广建','123456','img/1234.jpg',44,2,0,0,0),
(1603,'30081163','赵宝山','123456','img/1234.jpg',44,3,0,0,0),
(1604,'30081164','程建敏','123456','img/1234.jpg',44,3,0,0,0),
(1605,'30081165','朱新锋','123456','img/1234.jpg',44,3,0,0,0),
(1606,'30081166','张奉举','123456','img/1234.jpg',45,2,0,0,0),
(1607,'30081167','张龙栓','123456','img/1234.jpg',45,3,0,0,0),
(1608,'30081168','罗  代','123456','img/1234.jpg',45,3,0,0,0),
(1609,'30081169','  刘 健','123456','img/1234.jpg',45,3,0,0,0),
(1610,'30081170','王  刚','123456','img/1234.jpg',45,3,0,0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `voterecord` */

insert  into `voterecord`(`RecordID`,`RecordName`,`RecordCode`,`starttime`,`endtime`,`status`,`describtion`,`welcome`,`end`,`evalutiontype`,`khtype`) values 
(6,'2019年干部考核第2次问卷调查','417258','2019-03-1','2019-12-30','Running',NULL,NULL,NULL,'平时考核',0),
(7,'2019年中层干部第3次问卷调查','799417','2019-07-12','2019-12-10','Finished','2019年中层干部第3次问卷调查','欢迎参加','感谢投票','平时考核',0),
(8,'2019年第4次问卷调查','768573','2019-04-12','2019-12-10','Finished','<p>2019年第4次中层干部问卷调查</p>','欢迎您积极参与问卷调查','感谢您的支持！','平时考核',0),
(9,'2019年中层干部综合考评','472739','2019-04-12','2019-05-31','Running','<p>2019年中层干部综合考评</p>','<p>欢迎大家参与2019年中层干部综合考评</p>','<p>感谢大家参与2019年中层干部综合考评</p>',NULL,1),
(10,'测试问卷','178964','2019-07-13','2019-07-15','Running','','','',NULL,0),
(11,'df','935318','2019-07-18','2019-07-26','未发布','','','',NULL,0),
(12,'2019年中层干部第4次平时调查','335766','2019-07-27','2019-07-31','未发布','<p>2019年中层干部第4次平时调查</p>','欢迎使用','感谢你的参与',NULL,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=772 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='中层领导班子互评完成，在isvote_472739中插入1';

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
(742,922,46,'','0',''),
(743,923,2,'','0',''),
(744,923,3,'','0',''),
(745,923,4,'','0',''),
(746,923,5,'','0',''),
(747,923,6,'','0',''),
(748,923,7,'','0',''),
(749,923,8,'','0',''),
(750,923,9,'','0',''),
(751,923,10,'','0',''),
(752,923,11,'','0',''),
(753,923,12,'','0',''),
(754,923,13,'','0',''),
(755,923,14,'','0',''),
(756,923,15,'','0',''),
(757,923,16,'','0',''),
(758,923,17,'','0',''),
(759,923,34,'','0',''),
(760,923,35,'','0',''),
(761,923,36,'','0',''),
(762,923,37,'','0',''),
(763,923,38,'','0',''),
(764,923,39,'','0',''),
(765,923,40,'','0',''),
(766,923,41,'','0',''),
(767,923,42,'','0',''),
(768,923,43,'','0',''),
(769,923,44,'','0',''),
(770,923,45,'','0',''),
(771,923,46,'','0','');

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
