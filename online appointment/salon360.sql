-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2015 at 04:06 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `salon360`
--
CREATE DATABASE IF NOT EXISTS `salon360` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `salon360`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `customer_name`, `comment`, `rate`, `date_posted`) VALUES
(1, 'test', 'tetetet', 3, '2015-12-07 15:28:05'),
(2, 'Melovin', 'Beautiful\n', 5, '2015-12-07 15:34:14'),
(3, 'Melovin Pogi', 'Elegant\n', 5, '2015-12-07 15:34:25'),
(4, 'Vin', 'Nice :D', 4, '2015-12-07 15:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer_appointments`
--

CREATE TABLE IF NOT EXISTS `customer_appointments` (
  `customer_appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_schedule_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `customer_request` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `status` char(1) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  PRIMARY KEY (`customer_appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer_appointments`
--

INSERT INTO `customer_appointments` (`customer_appointment_id`, `employee_schedule_id`, `employee_id`, `customer_request`, `fname`, `lname`, `email`, `mobile`, `status`, `amount`) VALUES
(1, 14, 3, '', 'melovn', 'pedida', 'asdsadasd@gmalo.com', '12345678901', '', '0.00'),
(2, 19, 5, '', 'ivan', 'ivan', 'ivan@yahoo.com', '22222222222', '', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `fname`, `lname`, `email`, `mobile`) VALUES
(3, 'Rap', 'Octavo', 'rap@gmail.com', '12345678901'),
(5, 'Ivan', 'Carbonilla', 'ivan@gmail.com', '11111111111'),
(6, 'Kat', 'Mendoza', '213@gao', '12345678901'),
(8, 'Jonathan', 'Reyes', 'jonathan@gmail.com', '12345678901'),
(9, 'Pogi', 'zxczxc', 'cxzx@asdsad', '12345678901');

-- --------------------------------------------------------

--
-- Table structure for table `employee_schedule`
--

CREATE TABLE IF NOT EXISTS `employee_schedule` (
  `employee_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`employee_schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `employee_schedule`
--

INSERT INTO `employee_schedule` (`employee_schedule_id`, `service_id`, `employee_id`, `start_time`, `end_time`) VALUES
(12, 2, 3, '2015-08-20 01:00:00', '2015-08-20 02:00:00'),
(14, 3, 3, '2015-08-29 01:00:00', '2015-08-29 02:00:00'),
(17, 2, 5, '2015-09-10 01:00:00', '2015-09-10 02:00:00'),
(18, 2, 5, '2015-08-29 01:00:00', '2015-08-29 02:00:00'),
(19, 3, 5, '2015-09-10 00:59:00', '2015-09-10 02:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_services`
--

CREATE TABLE IF NOT EXISTS `employee_services` (
  `employee_services_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_services_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employee_services`
--

INSERT INTO `employee_services` (`employee_services_id`, `service_id`, `employee_id`) VALUES
(1, 2, 3),
(2, 3, 3),
(3, 5, 3),
(4, 4, 3),
(5, 2, 5),
(6, 3, 5),
(7, 4, 5),
(8, 5, 6),
(9, 6, 6),
(10, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_amount` decimal(18,2) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_amount`, `product_category_id`) VALUES
(1, 'Product 1', 'test', '100.00', 1),
(2, 'Product 2', 'test', '200.00', 2),
(3, 'Product 1', 'test', '100.00', 1),
(4, 'Product 1', 'test', '100.00', 1),
(5, 'Product 1', 'test', '100.00', 1),
(6, 'Product 1', 'test', '100.00', 1),
(7, 'Product 1', 'test', '100.00', 1),
(8, 'Product 2', 'test', '200.00', 2),
(9, 'Product 2', 'test', '200.00', 2),
(10, 'Product 2', 'test', '200.00', 2),
(11, 'Product 3', 'test', '200.00', 3),
(12, 'Product 3', 'test', '200.00', 3),
(13, 'Product 3', 'test', '200.00', 3),
(14, 'Product 4', 'test', '200.00', 4),
(15, 'Product 4', 'test', '200.00', 4),
(16, 'Product 4', 'test', '200.00', 4),
(17, 'Product 5', 'test', '200.00', 5),
(18, 'Product 5', 'test', '200.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(255) NOT NULL,
  `product_category_description` varchar(255) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`, `product_category_description`) VALUES
(1, 'Category 1', 'Category 1 description'),
(2, 'Category 2', 'Category 2 description'),
(3, 'Category 3', 'Category 3 description'),
(4, 'Category 4', 'Category 4 description'),
(5, 'Category 5', 'Category 5 description');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_description` varchar(255) NOT NULL,
  `service_amount` decimal(18,2) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_description`, `service_amount`) VALUES
(2, 'Hair Spa', '300.00'),
(3, 'Hair Color', '300.00'),
(4, 'Foot Spa', '100.00'),
(5, 'Manicure', '50.00'),
(6, 'Pedicure', '50.00'),
(7, 'Haircut', '40.00'),
(8, 'Blower', '50.00'),
(9, 'Rebond', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'salon360'),
(2, 'Melovin Pogi', 'melovin', '12345'),
(7, 'test', 'test', 'test'),
(11, 'ivan', 'ivan', 'ivan'),
(12, 'tesyt', 'test', 'test'),
(13, 'testx', 'testx', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE IF NOT EXISTS `user_orders` (
  `user_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase` char(1) NOT NULL DEFAULT 'N',
  `user_wishlist_id` int(11) NOT NULL,
  PRIMARY KEY (`user_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`user_order_id`, `product_id`, `user_id`, `quantity`, `purchase`, `user_wishlist_id`) VALUES
(1, 1, 2, 10, 'N', 1),
(2, 3, 2, 1, 'N', 2),
(3, 1, 11, 1, 'Y', 0),
(4, 1, 11, 1, 'Y', 0),
(5, 3, 11, 1, 'Y', 0),
(6, 4, 11, 1, 'Y', 0),
(7, 1, 12, 1, 'N', 0),
(8, 3, 12, 1, 'N', 0),
(9, 4, 12, 1, 'N', 0),
(10, 8, 7, 2, 'N', 0),
(11, 6, 7, 1, 'N', 0),
(12, 7, 7, 1, 'N', 0),
(13, 5, 7, 1, 'N', 0),
(14, 10, 7, 1, 'N', 0),
(15, 18, 7, 3, 'N', 0),
(16, 15, 7, 1, 'N', 0),
(17, 17, 7, 1, 'N', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_purchase`
--

CREATE TABLE IF NOT EXISTS `user_purchase` (
  `user_purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_amount` decimal(10,2) NOT NULL,
  `purchase_date` date NOT NULL,
  `user_order_id` int(11) NOT NULL,
  PRIMARY KEY (`user_purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_purchase`
--

INSERT INTO `user_purchase` (`user_purchase_id`, `product_id`, `user_id`, `quantity`, `purchase_amount`, `purchase_date`, `user_order_id`) VALUES
(1, 1, 11, 1, '100.00', '2015-09-09', 3),
(2, 1, 11, 1, '100.00', '2015-09-09', 4),
(3, 3, 11, 1, '100.00', '2015-09-09', 5),
(4, 4, 11, 1, '100.00', '2015-09-09', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

CREATE TABLE IF NOT EXISTS `user_wishlist` (
  `user_wishlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tag` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`user_wishlist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_wishlist`
--

INSERT INTO `user_wishlist` (`user_wishlist_id`, `product_id`, `user_id`, `quantity`, `tag`) VALUES
(1, 1, 2, 10, 'N'),
(2, 3, 2, 1, 'N'),
(3, 4, 12, 1, 'N'),
(4, 7, 12, 1, 'N'),
(5, 2, 7, 1, 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
