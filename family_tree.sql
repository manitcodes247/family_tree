-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2025 at 12:32 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `family_tree`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Name` varchar(50) NOT NULL,
  `ParentId` int DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Id`, `CreatedDate`, `Name`, `ParentId`) VALUES
(27, '2025-07-25 17:54:05', 'newparenttt', NULL),
(26, '2025-07-25 17:53:55', 'newsubchilddd', 25),
(25, '2025-07-25 17:53:46', 'newchildd', 23),
(24, '2025-07-25 17:53:32', 'newchild', 23),
(23, '2025-07-25 17:53:21', 'newparent', NULL),
(22, '2025-07-25 17:53:14', 'subchild', 21),
(21, '2025-07-25 17:53:06', 'child', 20),
(20, '2025-07-25 17:53:00', 'parent', NULL),
(28, '2025-07-25 17:54:16', 'newchildddd', 27),
(29, '2025-07-25 17:54:26', 'newsubbbchhh', 28),
(30, '2025-07-25 17:55:35', 'newsunchildf', 29),
(31, '2025-07-25 17:56:03', 'testnew', 29),
(32, '2025-07-25 17:56:16', 'newsubyyy', 28),
(33, '2025-07-25 17:56:31', 'testchildggg', 28),
(34, '2025-07-25 17:56:46', 'newsubparentchild', 27);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
