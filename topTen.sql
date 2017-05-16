-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- Host: studentdb-maria.gl.umbc.edu
-- Generation Time: May 16, 2017 at 09:13 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kurts1`
--

-- --------------------------------------------------------

--
-- Table structure for table `topTen`
--

CREATE TABLE IF NOT EXISTS `topTen` (
  `screenName` varchar(50) DEFAULT NULL COMMENT 'name of person',
  `score` int(50) DEFAULT NULL COMMENT 'their score'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topTen`
--

INSERT INTO `topTen` (`screenName`, `score`) VALUES
('BillyBob', 1000),
('JoeSchmo', 2000),
('IWannadie', 500),
('CaptainDude', 5000),
('a', 2908),
('a', 404),
('a', 2908),
('a', 2889),
('a', 2908),
('a', 2332),
('Dorothy', 2308);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
