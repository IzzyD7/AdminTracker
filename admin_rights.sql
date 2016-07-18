-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2016 at 08:03 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_rights`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` mediumtext NOT NULL,
  `last_name` mediumtext NOT NULL,
  `username` varchar(8) NOT NULL,
  `dept` mediumtext NOT NULL,
  `admin` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `dept`, `admin`) VALUES
(1, 'Ian', 'Butler', 's10110', 'IT', 'y'),
(2, 'Warren', 'Arnold', 's20110', 'ACCT', 'y'),
(3, 'Keith', 'Oliver', 's30105', 'ENG', 'y'),
(4, 'Frank', 'Wright', 's40105', 'SUPPLY', 'n'),
(8, 'Claire', 'Walsh', 's40110', 'SUPPLY', 'n'),
(9, 'Michael', 'Hudson', 's20115', 'ACCT', 'n'),
(10, 'Yvonne', 'Lee', 's30110', 'ENG', 'y'),
(11, 'Grace', 'Jones', 's40115', 'SUPPLY', 'y'),
(12, 'Diane', 'Burgess', 's20105', 'ACCT', 'n'),
(13, 'Wanda', 'Harris', 's10115', 'IT', 'y'),
(14, 'Brian', 'Watson', 's30115', 'ENG', 'y'),
(15, 'Tim', 'Bond', 's50105', 'CUST', 'n'),
(16, 'Fiona', 'Duncan', 's20120', 'ACCT', 'n'),
(17, 'Amy', 'Welch', 's10105', 'IT', 'y'),
(18, 'Stephanie', 'Chapman', 's30120', 'ENG', 'y'),
(19, 'Stephen', 'James', 's50110', 'CUST', 'n'),
(20, 'Julia', 'Clarkson', 's20125', 'ACCT', 'n'),
(21, 'Jacob', 'Morgan', 's30125', 'ENG', 'y'),
(22, 'Phil', 'Piper', 's50115', 'CUST', 'n'),
(23, 'Gavin', 'Slater', 's50120', 'CUST', 'n'),
(24, 'David', 'Cross', 's10120', 'IT', 'y'),
(25, 'Bob', 'Odenkirk', 's30130', 'ENG', 'y'),
(26, 'Sean', 'Dempsy', 's40120', 'SUPPLY', 'y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
