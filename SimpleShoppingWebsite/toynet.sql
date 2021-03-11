-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2019 年 06 月 11 日 11:38
-- 伺服器版本: 5.7.24
-- PHP 版本： 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `toynet`
--
CREATE DATABASE IF NOT EXISTS `toynet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `toynet`;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `mId` int(20) NOT NULL AUTO_INCREMENT,
  `password` char(20) CHARACTER SET utf8 NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `account` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '登入帳號',
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`mId`),
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- 資料表新增前先清除舊資料 `member`
--

TRUNCATE TABLE `member`;
--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`mId`, `password`, `name`, `account`, `phone`, `email`) VALUES
(1, '1234', 'Guolong', 'test', '0989925555', 'da66666@gmail.com'),
(2, '1111', '管理員', 'root', '', ''),
(4, '111', '111', 'tests2', '111', '111@gmail.com'),
(5, '111', '國隴', 'test2', '098888888', 'da605@gmail.com'),
(6, '111', '1111', 'test3', '09999999', '111@gmail.com'),
(7, '123', 'amy', 'aets', '064654654', 'dadfa@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` int(11) NOT NULL,
  `mId` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表新增前先清除舊資料 `purchase`
--

TRUNCATE TABLE `purchase`;
--
-- 資料表的匯出資料 `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `mId`) VALUES
(4, 1),
(3, 1),
(2, 1),
(1, 1),
(5, 1),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 5),
(12, 5),
(13, 5),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 1),
(24, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `purchase_detail`
--

DROP TABLE IF EXISTS `purchase_detail`;
CREATE TABLE IF NOT EXISTS `purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `toyId` int(11) NOT NULL,
  `count` int(11) NOT NULL COMMENT '購買數量',
  PRIMARY KEY (`purchase_id`,`toyId`),
  UNIQUE KEY `product_id` (`toyId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表新增前先清除舊資料 `purchase_detail`
--

TRUNCATE TABLE `purchase_detail`;
--
-- 資料表的匯出資料 `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase_id`, `toyId`, `count`) VALUES
(2, 3, 1),
(1, 2, 1),
(1, 1, 1),
(3, 8, 1),
(4, 21, 1),
(5, 14, 1),
(9, 5, 1),
(13, 6, 1),
(17, 4, 1),
(19, 9, 1),
(19, 7, 1),
(20, 20, 1),
(20, 19, 1),
(23, 16, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `toy`
--

DROP TABLE IF EXISTS `toy`;
CREATE TABLE IF NOT EXISTS `toy` (
  `toyId` int(8) NOT NULL AUTO_INCREMENT,
  `toyName` char(15) CHARACTER SET utf8 NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `classID` int(3) NOT NULL,
  `counter` int(5) NOT NULL DEFAULT '0',
  `toyPrice` int(5) NOT NULL,
  `toyImage` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`toyId`),
  KEY `classID` (`classID`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- 資料表新增前先清除舊資料 `toy`
--

TRUNCATE TABLE `toy`;
--
-- 資料表的匯出資料 `toy`
--

INSERT INTO `toy` (`toyId`, `toyName`, `description`, `classID`, `counter`, `toyPrice`, `toyImage`) VALUES
(1, 'BMW', NULL, 1, 0, 1500, 'BMW.jpg'),
(2, '挖土機', NULL, 1, 0, 1250, '挖土機.jpg'),
(3, 'DHL', NULL, 1, 0, 1250, 'DHL.jpg'),
(4, 'AUDI', NULL, 1, 0, 1500, 'AUDI.jpg'),
(5, 'FORD', NULL, 1, 0, 1500, 'FORD.jpg'),
(6, 'DREAM LIFTER', NULL, 1, 0, 1250, 'DREAMLIFTER.jpg'),
(7, '鱷魚', NULL, 2, 0, 499, '鱷魚.jpg'),
(8, '四連棋', NULL, 2, 0, 299, '四連棋.jpg'),
(9, '圍棋', NULL, 2, 0, 399, '圍棋.jpg'),
(10, '智慧金字塔', NULL, 2, 0, 799, '智慧金字塔.jpg'),
(11, '敲冰磚', NULL, 2, 0, 499, '敲冰磚.jpg'),
(12, '遙控車', NULL, 3, 0, 899, '遙控車.jpg'),
(13, '遙控越野車', NULL, 3, 0, 899, '遙控越野車.jpg'),
(14, '遙控坦克', NULL, 3, 0, 999, '遙控坦克.jpg'),
(15, '遙控船', NULL, 3, 0, 1299, '遙控船.jpg'),
(16, '遙控無人機', NULL, 3, 0, 1599, '遙控無人機.jpg'),
(17, '呆呆獸', NULL, 4, 0, 429, '呆呆獸.jpg'),
(18, '閃電皮卡丘', NULL, 4, 0, 389, '閃電皮卡丘.jpg'),
(19, '哥吉拉', NULL, 4, 0, 329, '哥吉拉.jpg'),
(20, '超夢', NULL, 4, 0, 329, '超夢.jpg'),
(21, '可達鴨', NULL, 4, 0, 399, '可達鴨.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `toyclass`
--

DROP TABLE IF EXISTS `toyclass`;
CREATE TABLE IF NOT EXISTS `toyclass` (
  `classID` int(3) NOT NULL AUTO_INCREMENT,
  `className` char(8) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`classID`),
  UNIQUE KEY `classID` (`classID`),
  UNIQUE KEY `className` (`className`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- 資料表新增前先清除舊資料 `toyclass`
--

TRUNCATE TABLE `toyclass`;
--
-- 資料表的匯出資料 `toyclass`
--

INSERT INTO `toyclass` (`classID`, `className`) VALUES
(1, '金屬模型'),
(2, '益智玩具'),
(3, '遙控玩具'),
(4, '玩偶');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
