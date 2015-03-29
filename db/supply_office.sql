-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2015 at 08:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `supply_office`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `empNo` varchar(10) NOT NULL,
  `lname` varchar(80) NOT NULL,
  `fname` varchar(80) NOT NULL,
  `mname` varchar(80) NOT NULL,
  `designation` varchar(100) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `empNo`, `lname`, `fname`, `mname`, `designation`) VALUES
(26, '123123123', 'sadfas', 'asdf', 'adsf', 'afd'),
(27, '11111', 'asdasd', 'asdas', 'asdasdas', 'asdasd'),
(29, '23132', '2asda', 'asdasdasd', 'asdasd', 'asdasd'),
(30, '12312', '3123', '123', '2321', '32312'),
(31, '1111', 'Cabanban', 'Lynnette', 'G', 'Instructor I'),
(32, '123', 'songcuan', 'Jerome', 'P', 'MIS Head, DMMMSU-SLUC'),
(33, '123456', 'Cuison', 'Floribeth', 'Panay', 'Dean, BSCS'),
(34, '3065', 'Casem', 'Elvin', 'Estoque', 'Instructor I'),
(37, '1001', 'aaa', 'aaa', 'aa', 'asd'),
(38, '31231', 'ad', 'aaa', 'ass', 'saas');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itemNo` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `unitCost` double(18,2) NOT NULL,
  PRIMARY KEY (`itemNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemNo`, `description`, `unit`, `unitCost`) VALUES
(4, 'Epson SB18 LCD Projector', '10', 23.00),
(5, '60D DSLR Camera', '2', 30.00),
(6, 'Intel Core i7 CPU with 21" LED monitor', '10', 30.00),
(7, '21" LED Phillips Monitor', '20', 19999999.99),
(8, '1 HP LG Aircon', '10', 10000.00),
(13, 'ACER Laptop', '5', 25000.00),
(14, 'asdasd', '111', 12.00),
(15, '11111', '1', 123.00),
(16, '231', '1', 3321.00),
(17, 'ba', '2', 123.50),
(18, 'qqq', '1', 123.12);

-- --------------------------------------------------------

--
-- Table structure for table `pr_list`
--

CREATE TABLE IF NOT EXISTS `pr_list` (
  `transID` bigint(20) NOT NULL AUTO_INCREMENT,
  `prNo` varchar(20) NOT NULL,
  `department` varchar(80) NOT NULL,
  `section` varchar(80) NOT NULL,
  `prDate` date NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `empNo` varchar(80) NOT NULL,
  PRIMARY KEY (`transID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierID` bigint(20) NOT NULL AUTO_INCREMENT,
  `supName` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contactNo` varchar(30) NOT NULL,
  `TIN` varchar(20) NOT NULL,
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `userType` varchar(10) NOT NULL DEFAULT 'staff',
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `userType`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
