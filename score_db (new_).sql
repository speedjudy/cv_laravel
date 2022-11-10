-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2022 at 05:18 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `score_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkserver`
--

DROP TABLE IF EXISTS `checkserver`;
CREATE TABLE IF NOT EXISTS `checkserver` (
  `id` int NOT NULL AUTO_INCREMENT,
  `progress` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `countup_progress` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

DROP TABLE IF EXISTS `line`;
CREATE TABLE IF NOT EXISTS `line` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id`, `line`, `created_at`, `updated_at`) VALUES
(1, 0, '2022-10-24 13:31:41', '2022-10-25 18:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `pool_list`
--

DROP TABLE IF EXISTS `pool_list`;
CREATE TABLE IF NOT EXISTS `pool_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` varchar(100) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `step` tinyint DEFAULT NULL COMMENT '0:active,1:first,2:second,3:third,4:fourth,5:top,6:start',
  `order_num` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `waiting_time` int DEFAULT NULL,
  `countdown_time` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `waiting_time`, `countdown_time`, `created_at`, `updated_at`) VALUES
(1, 30, 150, '2022-10-22 01:29:33', '2022-10-25 17:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `table_num`
--

DROP TABLE IF EXISTS `table_num`;
CREATE TABLE IF NOT EXISTS `table_num` (
  `id` int NOT NULL AUTO_INCREMENT,
  `left_num` int DEFAULT NULL,
  `right_num` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_num`
--

INSERT INTO `table_num` (`id`, `left_num`, `right_num`, `created_at`, `updated_at`) VALUES
(1, 0, 1, '2022-10-25 18:48:10', '2022-10-25 18:48:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
