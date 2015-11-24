-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.itc240grace.com
-- Generation Time: Nov 16, 2015 at 03:03 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_grace`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cookies`
--

CREATE TABLE IF NOT EXISTS `Cookies` (
  `CookiesID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cookie` varchar(50) DEFAULT NULL,
  `Brand` varchar(50) DEFAULT NULL,
  `Calories` int(7) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`CookiesID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Cookies`
--

INSERT INTO `Cookies` (`CookiesID`, `Cookie`, `Brand`, `Calories`, `Description`) VALUES
(1, 'Oreo', 'Nabisco', 140, 'The world''s favorite cookie. Delicious and full of Wonder for over 100 years. Find Oreo games, videos, songs, and see how the Wonderfilled story goes!');
