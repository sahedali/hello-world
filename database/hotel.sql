-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 10:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_ledger`
--

CREATE TABLE `account_ledger` (
  `ledger_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_ledger`
--

INSERT INTO `account_ledger` (`ledger_id`, `name`, `desc`, `account_type_id`, `date`) VALUES
(1, 'room_rant', 'only for room rant credit', 3, '2019-09-12 19:41:33'),
(2, 'Landori Services', 'londery', 3, '2019-11-08 17:20:40'),
(3, 'food', 'lunch + dnr ', 3, '2019-11-08 17:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(11) NOT NULL,
  `acc_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `booking_number` varchar(256) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `room_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `room_number` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `check_in` int(11) NOT NULL DEFAULT 0 COMMENT '1=checkin,2=advance,3=checkout',
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `booking_number`, `start_date`, `end_date`, `room_id`, `category_name`, `room_number`, `price`, `check_in`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 1, '0911191', '2019-11-09 19:15:38', '2019-11-12 19:15:38', 54, 'Family Suite', 102, 2400.00, 0, '0000-00-00', 1, '0000-00-00', 1, 1),
(2, 2, '1011192', '2019-11-13 01:54:14', '2019-11-16 01:54:14', 54, 'Family Suite 4', 102, 2400.00, 0, '0000-00-00', 1, '0000-00-00', 1, 1),
(3, 2, '1911193', '2019-12-12 19:54:29', '2019-12-15 19:56:32', 48, 'Suite Double', 302, 1000.00, 2, '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
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
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `age`, `gender`, `email_id`, `ph_number`, `id_type`, `id_value`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 'Sahed Ali', 23, 'Male', 'sahedali51@gmail.com', '8609024837', 1, '23457', '0000-00-00', 1, '0000-00-00', 1, 1),
(2, 'Sahed', 23, 'Male', 'sahedali51@gmail.com', '8609024873', 1, '111', '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_gust`
--

CREATE TABLE `customer_gust` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_value` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_gust`
--

INSERT INTO `customer_gust` (`id`, `booking_id`, `name`, `age`, `gender`, `id_type`, `id_value`, `created_by`, `created_on`, `modified_by`, `modified_on`, `is_active`) VALUES
(7, 5, 'ssss', 23, 'Male', 0, '', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(8, 1, 'test', 23, 'Male', 2, '12345789', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(9, 1, 'TEST2', 24, 'Male', 4, '09875432', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(10, 3, 'afrin', 20, 'Male', 4, '', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(11, 2, 'Afrin', 20, 'FeMale', 2, '222', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(12, 2, 'assssff', 24, 'FeMale', 4, '2222', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
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
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `date_of_birth`, `contact_no`, `mail_id`, `address`, `id_type`, `id_value`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 'Sahed', 'Ali', '1992-10-30', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0),
(2, 'Nishi', '', '2019-11-20', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0),
(3, '', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0),
(4, '', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0),
(5, '', '', '0000-00-00', '', '', '', 0, '', '0000-00-00', 0, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `id_master`
--

CREATE TABLE `id_master` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `ledger_id` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `payment_amount`, `ledger_id`, `payment_date`, `created_by`, `created_on`, `modified_by`, `modified_on`, `is_active`) VALUES
(1, 4, '16800.00', 1, '2019-11-08 21:02:47', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(2, 4, '45.00', 2, '2019-11-08 21:02:58', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(3, 4, '890.00', 3, '2019-11-08 21:03:11', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(4, 5, '2600.00', 1, '2019-11-09 10:47:03', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(5, 5, '200.00', 2, '2019-11-09 10:47:22', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(6, 3, '3000.00', 1, '2019-11-20 11:19:40', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(7, 3, '200.00', 2, '2019-11-20 11:19:49', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1),
(8, 3, '500.00', 3, '2019-11-20 11:19:57', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `price_detail`
--

CREATE TABLE `price_detail` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_detail`
--

INSERT INTO `price_detail` (`id`, `category_id`, `amount`, `start_date`, `end_date`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(2, 11, 1900.00, '2019-08-15', '2019-08-31', '0000-00-00', 1, '0000-00-00', 1, 1),
(4, 6, 2500.00, '2019-11-01', '2020-01-31', '0000-00-00', 1, '0000-00-00', 1, 1),
(5, 3, 2400.00, '2019-09-01', '2019-12-31', '0000-00-00', 1, '0000-00-00', 1, 1),
(6, 1, 6000.00, '2019-09-01', '2019-10-31', '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role`, `description`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'SUP', 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `room_category_master`
--

CREATE TABLE `room_category_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `week_days_price` double(10,2) NOT NULL,
  `weekend_price` double(10,2) NOT NULL,
  `description` text NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_category_master`
--

INSERT INTO `room_category_master` (`id`, `name`, `week_days_price`, `weekend_price`, `description`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 'Suite Double', 1000.00, 1500.00, 'L1', '0000-00-00', 1, '0000-00-00', 1, 1),
(2, 'Honeymoon Suite', 900.00, 1300.00, 'L2', '0000-00-00', 1, '0000-00-00', 1, 1),
(3, 'Family Suite 4', 500.00, 900.00, 'L3', '0000-00-00', 1, '0000-00-00', 1, 1),
(4, 'Super Delux Double', 1000.00, 1200.00, 'xyz', '0000-00-00', 1, '0000-00-00', 1, 1),
(6, 'Suite 3', 20.00, 30.00, 'l5', '0000-00-00', 1, '0000-00-00', 1, 1),
(11, 'Super Deluxe', 40.00, 60.00, 'sfsdf', '0000-00-00', 1, '0000-00-00', 1, 1),
(12, 'Deluxe', 123.00, 321.00, 'hasjkfhkjshdf', '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE `room_master` (
  `id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_category_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_on` date NOT NULL,
  `modified_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`id`, `room_number`, `room_category_id`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(16, 1111, 7, '0000-00-00', 1, '0000-00-00', 1, 1),
(18, 0, 9, '0000-00-00', 1, '0000-00-00', 1, 1),
(19, 0, 10, '0000-00-00', 1, '0000-00-00', 1, 1),
(41, 333, 12, '0000-00-00', 1, '0000-00-00', 1, 1),
(42, 4444, 12, '0000-00-00', 1, '0000-00-00', 1, 1),
(43, 99, 11, '0000-00-00', 1, '0000-00-00', 1, 1),
(44, 66, 11, '0000-00-00', 1, '0000-00-00', 1, 1),
(45, 11111, 4, '0000-00-00', 1, '0000-00-00', 1, 1),
(47, 303, 1, '0000-00-00', 1, '0000-00-00', 1, 1),
(48, 302, 1, '0000-00-00', 1, '0000-00-00', 1, 1),
(49, 301, 1, '0000-00-00', 1, '0000-00-00', 1, 1),
(50, 201, 2, '0000-00-00', 1, '0000-00-00', 1, 1),
(51, 202, 2, '0000-00-00', 1, '0000-00-00', 1, 1),
(52, 203, 2, '0000-00-00', 1, '0000-00-00', 1, 1),
(53, 101, 3, '0000-00-00', 1, '0000-00-00', 1, 1),
(54, 102, 3, '0000-00-00', 1, '0000-00-00', 1, 1),
(55, 103, 3, '0000-00-00', 1, '0000-00-00', 1, 1),
(56, 111, 6, '0000-00-00', 1, '0000-00-00', 1, 1),
(57, 112, 6, '0000-00-00', 1, '0000-00-00', 1, 1),
(58, 113, 6, '0000-00-00', 1, '0000-00-00', 1, 1),
(59, 220, 6, '0000-00-00', 1, '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_on` int(11) NOT NULL,
  `created_by` date NOT NULL,
  `modified_on` int(11) NOT NULL,
  `modified_by` date NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `person_id`, `username`, `password`, `role_id`, `created_on`, `created_by`, `modified_on`, `modified_by`, `is_active`) VALUES
(1, 1, 'sahedali51@gmail.com', '12345', 1, 0, '0000-00-00', 0, '0000-00-00', 0),
(2, 2, 'nishi123@gmail.com', '1234578', 2, 0, '0000-00-00', 0, '0000-00-00', 0),
(3, 0, 'avik', '1234578', 1, 0, '0000-00-00', 0, '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_ledger`
--
ALTER TABLE `account_ledger`
  ADD PRIMARY KEY (`ledger_id`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_gust`
--
ALTER TABLE `customer_gust`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_master`
--
ALTER TABLE `id_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `price_detail`
--
ALTER TABLE `price_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_category_master`
--
ALTER TABLE `room_category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_master`
--
ALTER TABLE `room_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_ledger`
--
ALTER TABLE `account_ledger`
  MODIFY `ledger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_gust`
--
ALTER TABLE `customer_gust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `id_master`
--
ALTER TABLE `id_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `price_detail`
--
ALTER TABLE `price_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_category_master`
--
ALTER TABLE `room_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_master`
--
ALTER TABLE `room_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
