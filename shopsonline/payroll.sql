-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2015 at 06:31 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll`
--
CREATE DATABASE IF NOT EXISTS `payroll` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `payroll`;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
  `payroll_id` bigint(20) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `net_pay` decimal(10,0) NOT NULL,
  `semi_monthly` decimal(10,0) NOT NULL,
  `lates` decimal(10,0) NOT NULL,
  `absents` int(11) NOT NULL,
  `undertime` decimal(10,0) NOT NULL,
  `overtime` decimal(10,0) NOT NULL,
  `sss` decimal(10,0) NOT NULL,
  `pagibig` decimal(10,0) NOT NULL,
  `philhealth` decimal(10,0) NOT NULL,
  `tax` decimal(10,0) NOT NULL,
  `other_earnings` decimal(10,0) NOT NULL,
  `cut_off` int(11) NOT NULL,
  `deduction` decimal(10,0) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payslip`
--

CREATE TABLE IF NOT EXISTS `payslip` (
  `payroll_id` bigint(20) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `net_pay` decimal(10,0) NOT NULL,
  `semi_monthly` decimal(10,0) NOT NULL,
  `lates` decimal(10,0) NOT NULL,
  `absents` int(11) NOT NULL,
  `undertime` decimal(10,0) NOT NULL,
  `overtime` decimal(10,0) NOT NULL,
  `sss` decimal(10,0) NOT NULL,
  `pagibig` decimal(10,0) NOT NULL,
  `philhealth` decimal(10,0) NOT NULL,
  `tax` decimal(10,0) NOT NULL,
  `other_earnings` decimal(10,0) NOT NULL,
  `cut_off` int(11) NOT NULL,
  `deduction` decimal(10,0) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
