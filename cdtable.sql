
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 03:21 AM
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
-- Table structure for table `cdtable`
--

CREATE TABLE IF NOT EXISTS `cdtable` (
  `CDNumber` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) DEFAULT NULL,
  `Artist` varchar(100) DEFAULT NULL,
  `Composer` varchar(100) DEFAULT NULL,
  `Cdentrydt` date NOT NULL,
  `Date_Rented` date NOT NULL,
  `Due_Date` date NOT NULL,
  `available` varchar(10) NOT NULL,
  PRIMARY KEY (`CDNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cdtable`
--

INSERT INTO `cdtable` (`CDNumber`, `Title`, `Artist`, `Composer`, `Cdentrydt`, `Date_Rented`, `Due_Date`, `available`) VALUES
(1, 'cdtitle1', 'cdartist1', 'cdcomposer1', '2015-04-19', '0000-00-00', '0000-00-00', 'Yes'),
(2, 'cdtitlenew', 'artist1', 'composer1', '2015-04-19', '0000-00-00', '0000-00-00', 'Yes'),
(3, 'cdtitle4', 'cdartist4', 'cdcomposer4', '2015-04-21', '0000-00-00', '0000-00-00', 'Yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
