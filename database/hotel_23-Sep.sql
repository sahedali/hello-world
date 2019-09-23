-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 07:57 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_ledger`
--

CREATE TABLE IF NOT EXISTS `account_ledger` (
  `ledger_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ledger_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account_ledger`
--

INSERT INTO `account_ledger` (`ledger_id`, `name`, `desc`, `account_type_id`, `date`) VALUES
(1, 'room_rant', 'only for room rant credit', 3, '2019-09-12 19:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `acc_name`) VALUES
(1, 'Asset'),
(2, 'Liabilities'),
(3, 'Income'),
(4, 'Expences');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `booking_number` varchar(256) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `room_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `room_number` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `check_in` int(11) NOT NULL DEFAULT '0' COMMENT '1=checkin,2=advance,3=checkout',
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `booking_number`, `start_date`, `end_date`, `room_id`, `category_name`, `room_number`, `price`, `check_in`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 8, '', '2019-09-12 13:00:00', '2019-09-15 13:00:00', 2, 'L3', 102, 500.00, 0, '0000-00-00', 1, '0000-00-00', 1, 1),
(2, 9, '1309199', '2019-09-12 13:00:00', '2019-09-16 13:00:00', 1, 'L3', 101, 500.00, 0, '0000-00-00', 1, '0000-00-00', 1, 1),
(3, 5, '1309195', '2019-09-12 13:00:00', '2019-09-16 13:00:00', 1, 'L3', 101, 500.00, 0, '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `ph_number` varchar(20) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_value` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `age`, `gender`, `email_id`, `ph_number`, `id_type`, `id_value`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 'Ahsan', 34, 'Male', 'ahsan200905@gmail.com', '8609024873', 2, 'ANNPA6078J', '0000-00-00', 1, '0000-00-00', 1, 1),
(2, 'P Pul', 2, 'Male', 'bal.chal@bc.com', '1234567890', 2, '56ytvbghvbh', '0000-00-00', 1, '0000-00-00', 1, 1),
(3, 'Sahed', 23, 'Male', 'sahedali51@gmail.com', '8609024873', 1, '123456', '0000-00-00', 1, '0000-00-00', 1, 1),
(4, 'sahed ali', 25, 'Male', 'sahedali51@gmail.com', '8609024873', 1, '1234567', '0000-00-00', 1, '0000-00-00', 1, 1),
(5, 'Sahed Ali', 25, 'Male', 'sahedali51@gmail.com', '8609024873', 0, '0', '0000-00-00', 1, '0000-00-00', 1, 1),
(6, 'sfsd', 23, 'Male', 'ahsan200905@gmail.com', '09874852228', 2, '123456789', '0000-00-00', 1, '0000-00-00', 1, 1),
(7, 'asdfghj', 22, 'Male', 'ahsan200905@gmail.com', '09874852228', 0, '0', '0000-00-00', 1, '0000-00-00', 1, 1),
(8, 'Sahed Ali', 23, 'Male', 'ahsan200905@gmail.com', '09874852228', 0, '0', '0000-00-00', 1, '0000-00-00', 1, 1),
(9, 'asgdghfh', 23, 'Male', 'sahedali51@gmail.com', '8609024837', 0, '0', '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `mail_id` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_value` varchar(50) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `date_of_birth`, `contact_no`, `mail_id`, `address`, `id_type`, `id_value`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 'Sahed', 'Ali', '1992-05-28', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0),
(2, '', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0),
(3, '', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0),
(4, '', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0),
(5, '', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `id_master`
--

CREATE TABLE IF NOT EXISTS `id_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `id_master`
--

INSERT INTO `id_master` (`id`, `name`) VALUES
(1, 'Voter Id'),
(2, 'PAN Card'),
(4, 'Adhara'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `price_detail`
--

CREATE TABLE IF NOT EXISTS `price_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `price_detail`
--

INSERT INTO `price_detail` (`id`, `category_id`, `amount`, `start_date`, `end_date`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(2, 1, 1900.00, '2019-08-15', '2019-08-31', '0000-00-00', 1, '0000-00-00', 1, 1),
(4, 3, 2500.00, '2019-11-01', '2020-01-31', '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE IF NOT EXISTS `role_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) NOT NULL,
  `description` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role`, `description`) VALUES
(1, 'Admin', 'Administit');

-- --------------------------------------------------------

--
-- Table structure for table `room_category_master`
--

CREATE TABLE IF NOT EXISTS `room_category_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `week_days_price` double(10,2) NOT NULL,
  `weekend_price` double(10,2) NOT NULL,
  `description` text NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `room_category_master`
--

INSERT INTO `room_category_master` (`id`, `name`, `week_days_price`, `weekend_price`, `description`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 'L1', 1000.00, 1500.00, 'L1', '0000-00-00', 1, '0000-00-00', 1, 1),
(2, 'L2', 900.00, 1300.00, 'L2', '0000-00-00', 1, '0000-00-00', 1, 1),
(3, 'L3', 500.00, 900.00, 'L3', '0000-00-00', 1, '0000-00-00', 1, 1),
(4, 'delux', 1000.00, 1200.00, 'xyz', '0000-00-00', 1, '0000-00-00', 1, 1),
(6, 'L5', 20.00, 30.00, 'l5', '0000-00-00', 1, '0000-00-00', 1, 1),
(11, 'L6', 40.00, 60.00, 'sfsdf', '0000-00-00', 1, '0000-00-00', 1, 1),
(12, 'newTest', 123.00, 321.00, 'hasjkfhkjshdf', '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE IF NOT EXISTS `room_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` int(11) NOT NULL,
  `room_category_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`id`, `room_number`, `room_category_id`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 101, 3, '0000-00-00', 1, '0000-00-00', 1, 1),
(2, 102, 3, '0000-00-00', 1, '0000-00-00', 1, 1),
(3, 103, 3, '0000-00-00', 1, '0000-00-00', 1, 1),
(4, 201, 2, '0000-00-00', 1, '0000-00-00', 1, 1),
(5, 202, 2, '0000-00-00', 1, '0000-00-00', 1, 1),
(6, 203, 2, '0000-00-00', 1, '0000-00-00', 1, 1),
(7, 301, 1, '0000-00-00', 1, '0000-00-00', 1, 1),
(8, 302, 1, '0000-00-00', 1, '0000-00-00', 1, 1),
(9, 303, 1, '0000-00-00', 1, '0000-00-00', 1, 1),
(15, 111, 6, '0000-00-00', 1, '0000-00-00', 1, 1),
(16, 1111, 7, '0000-00-00', 1, '0000-00-00', 1, 1),
(17, 11111, 4, '0000-00-00', 1, '0000-00-00', 1, 1),
(18, 0, 9, '0000-00-00', 1, '0000-00-00', 1, 1),
(19, 0, 10, '0000-00-00', 1, '0000-00-00', 1, 1),
(32, 99, 11, '0000-00-00', 1, '0000-00-00', 1, 1),
(33, 66, 11, '0000-00-00', 1, '0000-00-00', 1, 1),
(39, 333, 12, '0000-00-00', 1, '0000-00-00', 1, 1),
(40, 4444, 12, '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_on` int(11) NOT NULL,
  `created_by` date NOT NULL,
  `modified_on` int(11) NOT NULL,
  `modified_by` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `person_id`, `username`, `password`, `role_id`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 0, 'sahedali51@gmail.com', '12345', 1, 0, '0000-00-00', 0, '0000-00-00', 0),
(2, 0, 'nishi', '1234578', 1, 0, '0000-00-00', 0, '0000-00-00', 0),
(3, 0, 'avik', '1234578', 1, 0, '0000-00-00', 0, '0000-00-00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
