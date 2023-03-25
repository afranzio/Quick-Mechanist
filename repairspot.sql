-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 01:20 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repairspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `mech_approved`
--

CREATE TABLE `mech_approved` (
  `order_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `approved_mech_email` varchar(50) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `vehicle_problem` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `order_status` varchar(30) NOT NULL,
  `approved_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mech_approved`
--

INSERT INTO `mech_approved` (`order_id`, `user_email`, `approved_mech_email`, `vehicle_type`, `vehicle_problem`, `location`, `order_status`, `approved_datetime`) VALUES
(1030, 'manojchakra33gmail.com', 'bala@gmail.com', 'bus', 'puncher', 'chennai', 'APPROVED', '2022-04-24 20:12:19'),
(1031, 'manojchakra33gmail.com', 'bala@gmail.com', 'truck', 'engine problem', 'vellore', 'APPROVED', '2022-04-24 20:43:56'),
(1032, 'gopi@gmail.com', 'bala@gmail.com', 'car', 'problem', 'tambaram', 'APPROVED', '2022-04-24 20:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `mech_details`
--

CREATE TABLE `mech_details` (
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `service_type_others` varchar(20) NOT NULL,
  `house_no` int(11) NOT NULL,
  `street` varchar(20) NOT NULL,
  `village_city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mob_num` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mech_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mech_details`
--

INSERT INTO `mech_details` (`f_name`, `l_name`, `dob`, `service_type`, `service_type_others`, `house_no`, `street`, `village_city`, `district`, `email`, `mob_num`, `password`, `mech_id`) VALUES
('BALA', 'MURUGAN', '2022-03-04', 'bike_mechanic', '', 123, '7TH AVENUE', 'KK NAGAR', 'chennai', 'bala@gmail.com', 2147483647, 'bala@123', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_booking_request`
--

CREATE TABLE `user_booking_request` (
  `email` varchar(50) NOT NULL,
  `user_request_place` varchar(200) DEFAULT NULL,
  `vehicle_type` varchar(20) DEFAULT NULL,
  `vehicle_problem` varchar(200) DEFAULT NULL,
  `request_status` varchar(20) DEFAULT NULL,
  `order_id` int(20) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_booking_request`
--

INSERT INTO `user_booking_request` (`email`, `user_request_place`, `vehicle_type`, `vehicle_problem`, `request_status`, `order_id`, `last_updated`) VALUES
('manojchakra33gmail.com', 'trl', 'car', 'break problem', 'CANCELLED', 1027, '2022-04-24 17:31:00'),
('manojchakra33gmail.com', 'chennai', 'flight', 'puncher', 'CANCELLED', 1028, '2022-04-24 17:28:32'),
('manojchakra33gmail.com', 'TIRUVALLUR', 'BIKE', 'BREAK', 'CANCELLED', 1029, '2022-04-24 19:42:07'),
('manojchakra33gmail.com', 'chennai', 'bus', 'puncher', 'CANCELLED', 1030, '2022-04-24 20:38:07'),
('manojchakra33gmail.com', 'vellore', 'truck', 'engine problem', 'PENDING', 1031, '2022-04-24 20:43:36'),
('gopi@gmail.com', 'tambaram', 'car', 'problem', 'PENDING', 1032, '2022-04-24 20:46:34'),
('manojchakra33gmail.com', 'trl', 'nbjn', 'bujnj', 'PENDING', 1033, '2022-04-24 21:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `f_name` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `l_name` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `dob` varchar(11) NOT NULL,
  `house_no` int(11) NOT NULL,
  `street` varchar(20) NOT NULL,
  `village_city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `email` varchar(30) NOT NULL DEFAULT 'NOT NULL',
  `mob_num` int(11) NOT NULL,
  `password` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`f_name`, `l_name`, `dob`, `house_no`, `street`, `village_city`, `district`, `email`, `mob_num`, `password`, `user_id`) VALUES
('MANOJ', 'C', '2013-02-06', 121, 'JN STREET', 'KILNALLATHUR', 'madurai', 'manojchakra33gmail.com', 2147483647, 'Manoj@123', 10),
('GOPI', 'K', '2022-02-03', 123, 'RK STREET', 'RK PURAM', 'chennai', 'gopi@gmail.com', 2147483647, 'Gopi@123', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mech_approved`
--
ALTER TABLE `mech_approved`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `mech_details`
--
ALTER TABLE `mech_details`
  ADD PRIMARY KEY (`mech_id`);

--
-- Indexes for table `user_booking_request`
--
ALTER TABLE `user_booking_request`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mech_details`
--
ALTER TABLE `mech_details`
  MODIFY `mech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_booking_request`
--
ALTER TABLE `user_booking_request`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
