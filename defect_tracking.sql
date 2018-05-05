-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2018 at 12:39 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defect_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

DROP TABLE IF EXISTS `blocks`;
CREATE TABLE IF NOT EXISTS `blocks` (
  `BlockID` int(10) NOT NULL AUTO_INCREMENT,
  `PhaseID` tinyint(4) NOT NULL,
  `BlockName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ContractorID` int(11) NOT NULL,
  PRIMARY KEY (`BlockID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`BlockID`, `PhaseID`, `BlockName`, `ContractorID`) VALUES
(1, 1, 'Block A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

DROP TABLE IF EXISTS `contractors`;
CREATE TABLE IF NOT EXISTS `contractors` (
  `ContractorID` int(10) NOT NULL AUTO_INCREMENT,
  `ContractorName` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ContractorID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`ContractorID`, `ContractorName`) VALUES
(1, 'An Phong');

-- --------------------------------------------------------

--
-- Table structure for table `defect_headers`
--

DROP TABLE IF EXISTS `defect_headers`;
CREATE TABLE IF NOT EXISTS `defect_headers` (
  `DefectID` int(10) NOT NULL AUTO_INCREMENT,
  `UnitID` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`DefectID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `defect_headers`
--

INSERT INTO `defect_headers` (`DefectID`, `UnitID`, `created`, `modified`) VALUES
(1, 1, '2018-05-04 13:38:26', '2018-05-04 13:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `defect_items`
--

DROP TABLE IF EXISTS `defect_items`;
CREATE TABLE IF NOT EXISTS `defect_items` (
  `DefectItemID` int(10) NOT NULL AUTO_INCREMENT,
  `DefectID` int(11) NOT NULL,
  `TradeDescriptionID` int(11) NOT NULL,
  `ImageFileNameBefore` text COLLATE utf8_unicode_ci,
  `ImageFileNameAfter` text COLLATE utf8_unicode_ci,
  `PlaceID` int(11) NOT NULL,
  `CloseDate` datetime DEFAULT NULL,
  `DefectStatus` text COLLATE utf8_unicode_ci NOT NULL,
  `Note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`DefectItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `defect_items`
--

INSERT INTO `defect_items` (`DefectItemID`, `DefectID`, `TradeDescriptionID`, `ImageFileNameBefore`, `ImageFileNameAfter`, `PlaceID`, `CloseDate`, `DefectStatus`, `Note`, `created`, `modified`) VALUES
(1, 1, 1, '', '', 1, NULL, 'open', '', '2018-02-20 13:39:27', '2018-05-04 13:39:27'),
(2, 1, 1, '', '', 2, NULL, 'open', '', '2018-05-04 13:46:33', '2018-05-04 13:46:33'),
(3, 1, 1, '', '', 1, '2018-03-13 00:00:00', 'close', '', '2018-05-02 13:47:03', '2018-05-04 13:47:03'),
(4, 1, 1, '', '', 1, NULL, 'open', '', '2017-08-21 13:47:20', '2018-05-04 13:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `defect_places`
--

DROP TABLE IF EXISTS `defect_places`;
CREATE TABLE IF NOT EXISTS `defect_places` (
  `DefectPlaceID` int(10) NOT NULL AUTO_INCREMENT,
  `UnitTypeID` int(11) NOT NULL,
  `DefectPlaceName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coordX` int(11) NOT NULL,
  `coordY` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`DefectPlaceID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `defect_places`
--

INSERT INTO `defect_places` (`DefectPlaceID`, `UnitTypeID`, `DefectPlaceName`, `coordX`, `coordY`, `created`, `modified`) VALUES
(1, 1, 'bedroom 1', 315, 132, '2018-05-04 13:18:08', '2018-05-04 13:18:08'),
(2, 1, 'master bedroom', 302, 295, '2018-05-04 13:18:28', '2018-05-04 13:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

DROP TABLE IF EXISTS `phases`;
CREATE TABLE IF NOT EXISTS `phases` (
  `PhaseID` int(10) NOT NULL AUTO_INCREMENT,
  `PhaseName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ProjectID` tinyint(4) NOT NULL,
  PRIMARY KEY (`PhaseID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`PhaseID`, `PhaseName`, `ProjectID`) VALUES
(1, 'Valora', 5);

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20180417043921, 'CreateProjects', '2018-05-04 03:14:44', '2018-05-04 03:14:44', 0),
(20180417045229, 'CreatePhases', '2018-05-04 03:14:44', '2018-05-04 03:14:44', 0),
(20180417045351, 'CreateBlocks', '2018-05-04 03:14:44', '2018-05-04 03:14:45', 0),
(20180417045421, 'CreateUnits', '2018-05-04 03:14:45', '2018-05-04 03:14:45', 0),
(20180419030615, 'CreateUserPositions', '2018-05-04 03:14:45', '2018-05-04 03:14:45', 0),
(20180419035947, 'CreateUsers', '2018-05-04 03:14:45', '2018-05-04 03:14:46', 0),
(20180419045542, 'CreateTradeTypes', '2018-05-04 03:14:46', '2018-05-04 03:14:46', 0),
(20180420035900, 'CreateTrades', '2018-05-04 03:14:46', '2018-05-04 03:14:46', 0),
(20180420050134, 'CreateTradeDescriptions', '2018-05-04 03:14:46', '2018-05-04 03:14:46', 0),
(20180420062310, 'CreateDefectPlaces', '2018-05-04 03:14:46', '2018-05-04 03:14:47', 0),
(20180420062856, 'CreateDefectHeaders', '2018-05-04 03:14:47', '2018-05-04 03:14:47', 0),
(20180420071406, 'CreateDefectItems', '2018-05-04 03:14:47', '2018-05-04 03:14:47', 0),
(20180420071836, 'CreateContractors', '2018-05-04 03:14:47', '2018-05-04 03:14:48', 0),
(20180430072435, 'CreateUnitTypes', '2018-05-04 03:14:48', '2018-05-04 03:14:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `ProjectID` int(10) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ProjectID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ProjectID`, `ProjectName`) VALUES
(4, 'test'),
(5, 'Fuji Residence');

-- --------------------------------------------------------

--
-- Table structure for table `trades`
--

DROP TABLE IF EXISTS `trades`;
CREATE TABLE IF NOT EXISTS `trades` (
  `TradeID` int(10) NOT NULL AUTO_INCREMENT,
  `TradeTypeID` int(11) NOT NULL,
  `TradeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`TradeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trades`
--

INSERT INTO `trades` (`TradeID`, `TradeTypeID`, `TradeName`, `created`, `modified`) VALUES
(1, 1, 'RC Beam', '2018-05-04 13:29:25', '2018-05-04 13:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `trade_descriptions`
--

DROP TABLE IF EXISTS `trade_descriptions`;
CREATE TABLE IF NOT EXISTS `trade_descriptions` (
  `TradeDescriptionID` int(10) NOT NULL AUTO_INCREMENT,
  `TradeID` int(11) NOT NULL,
  `TradeDescriptionDetail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`TradeDescriptionID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trade_descriptions`
--

INSERT INTO `trade_descriptions` (`TradeDescriptionID`, `TradeID`, `TradeDescriptionDetail`, `created`, `modified`) VALUES
(1, 1, 'Alignment out', '2018-05-04 13:37:40', '2018-05-04 13:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `trade_types`
--

DROP TABLE IF EXISTS `trade_types`;
CREATE TABLE IF NOT EXISTS `trade_types` (
  `TradeTypeID` int(10) NOT NULL AUTO_INCREMENT,
  `TradeTypeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`TradeTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trade_types`
--

INSERT INTO `trade_types` (`TradeTypeID`, `TradeTypeName`, `created`, `modified`) VALUES
(1, 'Architect', '2018-05-04 13:27:05', '2018-05-04 13:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `UnitID` int(10) NOT NULL AUTO_INCREMENT,
  `BlockID` int(11) NOT NULL,
  `UnitTypeID` int(11) NOT NULL,
  `UnitName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UnitFloor` int(11) NOT NULL,
  PRIMARY KEY (`UnitID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`UnitID`, `BlockID`, `UnitTypeID`, `UnitName`, `UnitFloor`) VALUES
(1, 1, 1, 'A-1.01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_types`
--

DROP TABLE IF EXISTS `unit_types`;
CREATE TABLE IF NOT EXISTS `unit_types` (
  `UnitTypeID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UnitTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit_types`
--

INSERT INTO `unit_types` (`UnitTypeID`, `name`, `image`) VALUES
(1, 'Căn hộ loại 1', '20180504_201409.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `LoginName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UserPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PositionID` int(11) NOT NULL,
  `FullName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Imei` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RecordStatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_positions`
--

DROP TABLE IF EXISTS `user_positions`;
CREATE TABLE IF NOT EXISTS `user_positions` (
  `PositionID` int(10) NOT NULL AUTO_INCREMENT,
  `PositionName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`PositionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
