-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2019-05-03 14:00:07
-- 伺服器版本: 5.7.21
-- PHP 版本： 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ordering2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `acNO` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `account` varchar(20) NOT NULL,
  `pw` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`acNO`),
  UNIQUE KEY `account` (`account`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `account`
--

INSERT INTO `account` (`acNO`, `name`, `account`, `pw`, `tel`, `email`, `date`, `status`) VALUES
(6, '張大頭', 'a834926', 'a1234567', '0978130088', 'stan860719@gmail.com', '2019-04-15 16:52:20', 1),
(5, '管理員', 'a34631327', 'a1234567', '1234154124312', 'stan860719@gmail.com', '2019-04-14 13:19:14', 1),
(4, '王大明店家', 'a14769369', 'a1234567', '0978130088', 's34631327@gmail.com', '2019-04-14 13:18:35', 2),
(7, '123123', '123123', '123', '3133', '3123', '2019-04-22 15:46:47', 1),
(8, '213213', '12312321', '3213123', '1231', '213', '2019-04-22 15:46:51', 2),
(9, '3213', '123213', '12', '321', '21321', '2019-04-22 15:46:56', 1),
(12, '5125', '3124515', '312125', '15125', '125', '2019-05-01 23:21:44', 1),
(19, '12521521', '5125125', '125', '1521', '5125', '2019-05-01 23:23:28', 1),
(17, '551', '13412', '52151', '15125', '5215', '2019-05-01 23:23:21', 1),
(18, '1515', '21521', '215', '52151', '151', '2019-05-01 23:23:24', 1),
(20, '21512', '1251', '515', '125', '5125', '2019-05-01 23:23:31', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `burger`
--

DROP TABLE IF EXISTS `burger`;
CREATE TABLE IF NOT EXISTS `burger` (
  `bgNO` int(10) NOT NULL AUTO_INCREMENT,
  `burger` varchar(20) CHARACTER SET utf8 NOT NULL,
  `bgNT` int(10) NOT NULL,
  `maketime` int(10) NOT NULL,
  `changetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bgNO`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `burger`
--

INSERT INTO `burger` (`bgNO`, `burger`, `bgNT`, `maketime`, `changetime`) VALUES
(16, '豬柳肉漢堡', 35, 5, '2019-04-15 10:26:26'),
(17, '香雞肉漢堡', 35, 5, '2019-04-15 10:26:26'),
(18, '牛肉漢堡', 35, 5, '2019-04-15 10:26:26'),
(19, '雞肉漢堡', 30, 5, '2019-04-15 10:26:26'),
(20, '豬肉漢堡', 30, 5, '2019-04-15 10:26:26'),
(21, '培根漢堡', 30, 5, '2019-04-15 10:26:26'),
(22, '火腿漢堡', 30, 5, '2019-04-15 10:26:26'),
(23, '夾蛋漢堡', 25, 5, '2019-04-15 10:26:26'),
(1, '椒麻雞腿漢堡', 50, 3, '2019-04-15 10:26:59'),
(2, '雙層培根起士', 50, 3, '2019-04-15 10:26:59'),
(3, '黃金豬排漢堡', 50, 3, '2019-04-15 10:26:59'),
(4, '藍帶起士漢堡', 50, 3, '2019-04-15 10:26:59'),
(5, '厚片牛排漢堡', 50, 3, '2019-04-15 10:26:59'),
(6, '醬燒豬排漢堡', 45, 3, '2019-04-15 10:26:59'),
(7, '鮮炸花枝漢堡', 45, 3, '2019-04-15 10:26:59'),
(8, '原味卡啦雞堡', 45, 3, '2019-04-15 10:26:59'),
(9, '辣味卡啦雞堡', 45, 3, '2019-04-15 10:26:59'),
(10, '黑胡椒里肌堡', 45, 3, '2019-04-15 10:26:59'),
(11, '日式魚排漢堡', 45, 3, '2019-04-15 10:26:59'),
(12, '和風雞排漢堡', 45, 3, '2019-04-15 10:26:59'),
(13, '香檸雞柳漢堡', 45, 3, '2019-04-15 10:26:59');

-- --------------------------------------------------------

--
-- 資料表結構 `meal`
--

DROP TABLE IF EXISTS `meal`;
CREATE TABLE IF NOT EXISTS `meal` (
  `mealNO` int(10) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) CHARACTER SET utf8 NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `meal` varchar(200) CHARACTER SET utf8 NOT NULL,
  `NT` int(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '1',
  `ordertime` datetime NOT NULL,
  `taketime` datetime NOT NULL,
  `orderbg` varchar(200) CHARACTER SET utf8 NOT NULL,
  `orderbgnum` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`mealNO`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `meal`
--

INSERT INTO `meal` (`mealNO`, `account`, `name`, `meal`, `NT`, `status`, `ordertime`, `taketime`, `orderbg`, `orderbgnum`) VALUES
(55, 'a834926', '張大頭', '\"黃金豬排漢堡\"1個, \"醬燒豬排漢堡\"1個, \"豬肉漢堡\"1個, ', 125, '2', '2019-05-02 18:15:26', '2019-05-02 19:53:00', '\"黃金豬排漢堡\",\"醬燒豬排漢堡\",\"豬肉漢堡\",', '1,1,1,'),
(49, 'a834926', '張大頭', '\"椒麻雞腿漢堡\"2個, \"豬柳肉漢堡\"2個, ', 170, '2', '2019-05-02 18:14:51', '2019-05-02 18:30:00', '\"椒麻雞腿漢堡\",\"豬柳肉漢堡\",', '2,2,'),
(50, 'a834926', '張大頭', '\"香檸雞柳漢堡\"1個, \"香雞肉漢堡\"1個, ', 80, '3', '2019-05-02 18:14:55', '2019-05-02 18:38:00', '\"香檸雞柳漢堡\",\"香雞肉漢堡\",', '1,1,'),
(51, 'a834926', '張大頭', '\"黃金豬排漢堡\"1個, \"藍帶起士漢堡\"2個, ', 150, '3', '2019-05-02 18:15:00', '2019-05-02 18:47:00', '\"黃金豬排漢堡\",\"藍帶起士漢堡\",', '1,2,'),
(52, 'a834926', '張大頭', '\"原味卡啦雞堡\"2個, \"雞肉漢堡\"2個, ', 150, '1', '2019-05-02 18:15:05', '2019-05-02 19:03:00', '\"原味卡啦雞堡\",\"雞肉漢堡\",', '2,2,'),
(53, 'a834926', '張大頭', '\"厚片牛排漢堡\"2個, \"培根漢堡\"2個, ', 160, '1', '2019-05-02 18:15:10', '2019-05-02 19:19:00', '\"厚片牛排漢堡\",\"培根漢堡\",', '2,2,'),
(54, 'a834926', '張大頭', '\"和風雞排漢堡\"1個, \"豬柳肉漢堡\"1個, \"牛肉漢堡\"2個, \"豬肉漢堡\"1個, ', 180, '1', '2019-05-02 18:15:17', '2019-05-02 19:42:00', '\"和風雞排漢堡\",\"豬柳肉漢堡\",\"牛肉漢堡\",\"豬肉漢堡\",', '1,1,2,1,'),
(48, 'a834926', '張大頭', '\"和風雞排漢堡\"1個, \"香檸雞柳漢堡\"2個, \"豬柳肉漢堡\"1個, ', 170, '1', '2019-05-02 17:24:27', '2019-05-02 17:38:00', '\"和風雞排漢堡\",\"香檸雞柳漢堡\",\"豬柳肉漢堡\",', '1,2,1,'),
(56, 'a834926', '張大頭', '\"黃金豬排漢堡\"1個, \"厚片牛排漢堡\"2個, \"鮮炸花枝漢堡\"1個, ', 195, '4', '2019-05-02 18:15:58', '2019-05-02 20:05:00', '\"黃金豬排漢堡\",\"厚片牛排漢堡\",\"鮮炸花枝漢堡\",', '1,2,1,'),
(57, 'a834926', '張大頭', '\"椒麻雞腿漢堡\"1個, \"牛肉漢堡\"1個, \"豬肉漢堡\"1個, ', 115, '1', '2019-05-02 18:16:03', '2019-05-02 20:18:00', '\"椒麻雞腿漢堡\",\"牛肉漢堡\",\"豬肉漢堡\",', '1,1,1,');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
