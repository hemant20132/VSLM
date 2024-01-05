
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 03:27 AM
-- Server version: 10.0.11-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u374922904_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `rentcdtable`
--

CREATE TABLE IF NOT EXISTS `rentcdtable` (
  `MembershipId` int(11) DEFAULT NULL,
  `RentCDNumber` int(11) DEFAULT NULL,
  `RentCDTitle` varchar(100) DEFAULT NULL,
  `RentCDArtist` varchar(100) DEFAULT NULL,
  `RentCDComposer` varchar(100) DEFAULT NULL,
  `RentCDDt` date NOT NULL,
  `RentCDDueDt` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentcdtable`
--

INSERT INTO `rentcdtable` (`MembershipId`, `RentCDNumber`, `RentCDTitle`, `RentCDArtist`, `RentCDComposer`, `RentCDDt`, `RentCDDueDt`) VALUES
(11, 128, 'cdtitle for cd no 128', 'cd artist new ', 'cd composer by me', '2015-04-19', '2015-04-21'),
(12, 129, 'cdtitle for cd no 128', 'cd artist new ', 'cd composer by me', '2015-04-19', '2015-04-20'),
(45, 128, 'cdtitle for cd no 128', 'cd artist new', 'cd composer by me', '0000-00-00', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
