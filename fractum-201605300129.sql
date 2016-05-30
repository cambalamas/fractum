
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/********************************** DATABASE **********************************/
DROP DATABASE IF EXISTS fractum;
CREATE DATABASE fractum DEFAULT CHARACTER
SET utf8 COLLATE utf8_spanish_ci; USE fractum;
/********************************** DATABASE **********************************/

/*********************************** USERS ************************************/
GRANT USAGE ON *.* TO 'fractum'@'localhost';
DROP USER 'fractum'@'localhost';
CREATE USER 'fractum'@'localhost' IDENTIFIED BY 'fractum';
GRANT USAGE ON * . * TO  'fractum'@'localhost' IDENTIFIED BY  'fractum'
WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
GRANT ALL PRIVILEGES ON  fractum . * TO  'fractum'@'localhost' WITH GRANT OPTION ;
/*********************************** USERS ************************************/

/********************************** CREATES ***********************************/
CREATE TABLE `commit` (
  `id` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `title` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(350) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cost` decimal(5,2) NOT NULL,
  `owner` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `issue` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commit_fk_1` (`owner`),
  KEY `commit_fk_2` (`issue`),
  CONSTRAINT `commit_fk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`dni`) ON DELETE SET NULL,
  CONSTRAINT `commit_fk_2` FOREIGN KEY (`issue`) REFERENCES `issue` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `company` (
  `cif` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `prefix` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(9) NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `definedRules` (
  `rule` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `action` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `field` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `data` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`rule`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `device` (
  `serialNumber` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `upkeep` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(350) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `cost` decimal(7,2) NOT NULL,
  `line` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`serialNumber`),
  KEY `device_fk_1` (`line`),
  KEY `device_fk_2` (`upkeep`),
  CONSTRAINT `device_fk_1` FOREIGN KEY (`line`) REFERENCES `line` (`id`) ON DELETE SET NULL,
  CONSTRAINT `device_fk_2` FOREIGN KEY (`upkeep`) REFERENCES `upkeep` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `issue` (
  `id` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `title` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(350) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `owner` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `device` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `company` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `openDate` datetime DEFAULT NULL,
  `closeDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issue_fk_1` (`owner`),
  KEY `issue_fk_2` (`company`),
  KEY `issue_fk_3` (`device`),
  CONSTRAINT `issue_fk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`dni`) ON DELETE SET NULL,
  CONSTRAINT `issue_fk_2` FOREIGN KEY (`company`) REFERENCES `company` (`cif`) ON DELETE SET NULL,
  CONSTRAINT `issue_fk_3` FOREIGN KEY (`device`) REFERENCES `device` (`serialNumber`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `line` (
  `id` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(350) COLLATE utf8_spanish_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `lineManagers` (
  `manager` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `line` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`manager`,`line`),
  KEY `lineManagers_fk_2` (`line`),
  CONSTRAINT `lineManagers_fk_1` FOREIGN KEY (`manager`) REFERENCES `user` (`dni`) ON DELETE CASCADE,
  CONSTRAINT `lineManagers_fk_2` FOREIGN KEY (`line`) REFERENCES `line` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `permissions` (
  `type` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `actor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `action` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `value` int(1) NOT NULL,
  PRIMARY KEY (`type`,`actor`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `rulesPerUser` (
  `dni` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `rule` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`dni`,`rule`),
  KEY `rulesperuser_fk_2` (`rule`),
  CONSTRAINT `rulesperuser_fk_1` FOREIGN KEY (`dni`) REFERENCES `user` (`dni`) ON DELETE CASCADE,
  CONSTRAINT `rulesperuser_fk_2` FOREIGN KEY (`rule`) REFERENCES `definedRules` (`rule`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `upkeep` (
  `id` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `company` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `time` int(2) NOT NULL,
  `unit` tinyint(1) NOT NULL,
  `cost` decimal(5,2) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `upkeep_fk_1` (`company`),
  CONSTRAINT `upkeep_fk_1` FOREIGN KEY (`company`) REFERENCES `company` (`cif`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `user` (
  `token` int(15) DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dni` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `prefix` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(9) NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`dni`),
  KEY `user_fk_1` (`type`),
  CONSTRAINT `user_fk_1` FOREIGN KEY (`type`) REFERENCES `permissions` (`type`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/********************************** CREATES ***********************************/

/********************************** INSERTS ***********************************/
INSERT INTO `permissions` VALUES ('admin','Commit','Creator',1),('admin','Commit','Eraser',1),('admin','Commit','Puller',1),('admin','Commit','Reader',1),('admin','Commit','Seeker',1),('admin','Commit','Updater',1),('admin','Company','Creator',1),('admin','Company','Eraser',1),('admin','Company','Puller',1),('admin','Company','Reader',1),('admin','Company','Seeker',1),('admin','Company','Updater',1),('admin','Device','Creator',1),('admin','Device','Eraser',1),('admin','Device','Puller',1),('admin','Device','Reader',1),('admin','Device','Seeker',1),('admin','Device','Updater',1),('admin','Issue','Creator',1),('admin','Issue','Eraser',1),('admin','Issue','Puller',1),('admin','Issue','Reader',1),('admin','Issue','Seeker',1),('admin','Issue','Updater',1),('admin','Line','Creator',1),('admin','Line','Eraser',1),('admin','Line','Puller',1),('admin','Line','Reader',1),('admin','Line','Seeker',1),('admin','Line','Updater',1),('admin','Permissions','Creator',1),('admin','Permissions','Eraser',1),('admin','Permissions','Puller',1),('admin','Permissions','Updater',1),('admin','Upkeep','Creator',1),('admin','Upkeep','Eraser',1),('admin','Upkeep','Puller',1),('admin','Upkeep','Reader',1),('admin','Upkeep','Seeker',1),('admin','Upkeep','Updater',1),('admin','User','Creator',1),('admin','User','Eraser',1),('admin','User','Puller',1),('admin','User','Reader',1),('admin','User','Seeker',1),('admin','User','Updater',1);
INSERT INTO `user` VALUES (586366414,'admin','admin','admin','admin','admin','+',0,'admin@domain.com');
INSERT INTO `company` VALUES ('default','default','0',0,'default@default.com','default');
INSERT INTO `upkeep` VALUES ('none','default',0,0,0.00,'0001-01-01 01:01:01');
/********************************** INSERTS ***********************************/
