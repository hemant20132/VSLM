
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 03:26 AM
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
-- Table structure for table `membertable`
--

CREATE TABLE IF NOT EXISTS `membertable` (
  `MembershipId` int(11) NOT NULL AUTO_INCREMENT,
  `Member_Name` varchar(100) DEFAULT NULL,
  `Member_Address` varchar(150) DEFAULT NULL,
  `Member_Phone` varchar(20) DEFAULT NULL,
  `Member_Email` varchar(50) DEFAULT NULL,
  `Member_start_date` date DEFAULT NULL,
  `Member_Expires_date` date DEFAULT NULL,
  `Member_Credit_CardNo` varchar(20) DEFAULT NULL,
  `Member_fees_due` int(11) DEFAULT NULL,
  PRIMARY KEY (`MembershipId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `membertable`
--

INSERT INTO `membertable` (`MembershipId`, `Member_Name`, `Member_Address`, `Member_Phone`, `Member_Email`, `Member_start_date`, `Member_Expires_date`, `Member_Credit_CardNo`, `Member_fees_due`) VALUES
(32, 'firstname', 'firstaddress', '1234654654', 're@email.com', '2012-04-15', NULL, '1111-1111-1111-1111', NULL),
(33, 'firstname', 'firstaddress', '1234654654', 're@email.com', '2012-04-15', NULL, '1111-1111-1111-1111', NULL),
(34, 'secondname', 'memberaddress1', '20809483', 'phone@phone.com', '2012-04-15', NULL, '2222-222-222-222', NULL),
(35, 'thirdname', '998, coastal villa, california, usa.', '879879879', 'email@email.com', '2012-04-15', NULL, '1111-1111-1111-111', NULL),
(36, 'newname', 'new address ', '98798798', 'email@email.com', '2015-12-04', NULL, '2222-222-222-222', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
