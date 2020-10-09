-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 03:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `location`, `is_active`) VALUES
(1, 'Hr1', 'A-1', 0),
(2, 'testing', 'A-2', 1),
(3, 'Develpoment', 'B-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `department_id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `email`, `department_id`, `designation`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Virendra', 'Rathore', 'virendrarathore2202@gmail.com', 3, 'Sr. Software Developer', 1, 1, '2020-10-09 08:30:42', NULL, NULL),
(2, 'Raj', 'Rathore', 'raj@gmail.com', 1, 'Sr. HR', 1, 1, '2020-10-09 10:44:07', NULL, NULL),
(3, 'asd', 'sdadc', 'dasd@dfsa.com', 1, 'sdasda\n', 1, 1, '2020-10-09 13:09:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emp_contact_details`
--

CREATE TABLE `emp_contact_details` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_contact_details`
--

INSERT INTO `emp_contact_details` (`id`, `emp_id`, `phone`, `address`, `is_active`) VALUES
(1, 1, '234234723', 'jjjjjjjj', 0),
(2, 1, '234234723', 'efefdsafsad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `router_details`
--

CREATE TABLE `router_details` (
  `id` int(11) NOT NULL,
  `sapid` varchar(18) NOT NULL,
  `hostname` varchar(14) NOT NULL,
  `loopback` varchar(20) NOT NULL,
  `mac_address` varchar(17) NOT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `router_details`
--

INSERT INTO `router_details` (`id`, `sapid`, `hostname`, `loopback`, `mac_address`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'MHMHXGRKmJN1PgB4Lb', 'MHLIuplkUAxKPB', '214.14.156.222', 'MHCG257CeUnVIKa4t', 0, '2020-10-03 13:18:31', 1, '2020-10-03 13:18:31', NULL),
(2, 'MHMHygcTNj7GFulrWi', 'MHLIMJv23fPrcq', '253.131.100.119', 'MHCGUG3PrTtQo6xef', 0, '2020-10-03 13:24:19', 1, '2020-10-03 13:24:19', NULL),
(3, 'MHMHDvu8Cbi4RhY5WV', 'MHLIne24uT3qf8', '26.138.177.184', 'MHCGY46ViOGxpjHLC', 1, '2020-10-03 08:17:00', 1, NULL, NULL),
(4, 'MHMHyerMu7QVAY8XCh', 'MHLIla5XTbEzBe', '74.106.82.147', 'MHCGTQDqUSLERJkKn', 1, '2020-10-03 08:17:01', 1, NULL, NULL),
(5, 'MHMH6xAgZiy4zwTLoC', 'MHLI0CaOWvnuHl', '218.203.74.2', 'MHCGANnS0QiybUX8d', 1, '2020-10-03 08:17:01', 1, NULL, NULL),
(6, 'MHMHbFwv8Dt2C1USin', 'MHLIRO5H3pKQfx', '113.243.68.246', 'MHCGntlwj3cSKgsLN', 1, '2020-10-03 08:28:48', 1, NULL, NULL),
(7, 'MHMHHudgRQ8Ta5EXhP', 'MHLI9xsCJUjfH8', '106.225.2.12', 'MHCGR42nmpaTgslE1', 1, '2020-10-03 08:28:48', 1, NULL, NULL),
(8, 'MHMHOsfu2k874CNhtp', 'MHLIglKs7aoGuF', '217.247.92.213', 'MHCG5KY4lDTAGofLR', 1, '2020-10-03 08:28:48', 1, NULL, NULL),
(9, 'MHMHzE1S5OVjkLidaD', 'MHLIgN2c8uH90T', '154.146.65.24', 'MHCGUGNAZlLpOY1uc', 1, '2020-10-03 08:28:48', 1, NULL, NULL),
(10, 'MHMHyue4WpgitSZlnd', 'MHLImTDUclNIbk', '16.173.88.233', 'MHCGvDEPhqiVQZwbs', 0, '2020-10-03 11:46:12', 1, '2020-10-03 11:46:12', NULL),
(11, 'MHMHNzJmrWutSDRslH', 'MHLI6U1fB7khNV', '207.139.195.34', 'MHCGTAq216isr3JNE', 1, '2020-10-03 08:28:48', 1, NULL, NULL),
(12, 'MHMHo7XzBMkL1I9jY5', 'MHLIboBeW5DIAd', '3.126.146.130', 'MHCGp9J81OzW5d263', 0, '2020-10-03 11:44:42', 1, '2020-10-03 11:44:42', NULL),
(13, 'MHMHYC4KjutzhDJeG2', 'MHLIiPDAps2rRo', '86.9.51.145', 'MHCGYUsnCve15hEM7', 0, '2020-10-03 08:29:47', 1, '2020-10-03 08:29:47', NULL),
(14, 'MHMHl6TaXOnCEMIser', 'MHLI1S7pVPOQLI', '187.240.123.122', 'MHCGDmPb0QXij12n7', 0, '2020-10-03 08:30:06', 1, '2020-10-03 08:30:06', NULL),
(15, 'MHMHfp7HhVzYb6yXUs', 'MHLIgIQO0Y51jm', '158.132.160.3', 'MHCG5kIQdw1JrTO8n', 1, '2020-10-03 08:28:49', 1, NULL, NULL),
(16, 'fdsfksjkj', 'MHLIMJv23fPrc2', '44324.324324.32', 'MHCGUG3PrTtQo6xe2', 1, '2020-10-03 10:28:07', 1, NULL, NULL),
(17, 'fdsfksjkj', 'MHLIMJv23fPrc2', '44324.324324.32', 'MHCGUG3PrTtQo6xe2', 0, '2020-10-03 11:45:08', 1, '2020-10-03 11:45:08', NULL),
(18, 'fjsljk', 'fsdjfklsj', 'fksjfklsjk', 'kdsjfksjgivsjglj', 0, '2020-10-03 13:31:14', 1, '2020-10-03 13:31:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `phone` int(15) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_contact_details`
--
ALTER TABLE `emp_contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `router_details`
--
ALTER TABLE `router_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username` (`username`),
  ADD UNIQUE KEY `user_email` (`email`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_contact_details`
--
ALTER TABLE `emp_contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `router_details`
--
ALTER TABLE `router_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
