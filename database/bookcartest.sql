-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2019 at 01:39 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookcartest`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `b_startdatetime` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `b_enddatetime` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `b_detail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `driver_id` int(11) NOT NULL,
  `approvers_id` int(11) NOT NULL,
  `b_status` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `applicant_id`, `c_id`, `b_startdatetime`, `b_enddatetime`, `b_detail`, `driver_id`, `approvers_id`, `b_status`) VALUES
(1, 2, 1, '2019-05-14 09:00', '2019-05-15 12:00', 'ยืมไปขับเล่น', 3, 1, 'A'),
(2, 1, 2, '2019-05-20 08:30', '2019-05-25 11:30', 'ลองจองเก็บรายละเอียด', 3, 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `c_id` int(11) NOT NULL,
  `c_licenseplate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_model` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `c_brand` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tc_id` int(11) NOT NULL,
  `c_gear` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_fuel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_purchase_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_Act_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_Act_exp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_insurance_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `c_insurance_exp` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`c_id`, `c_licenseplate`, `c_model`, `c_brand`, `tc_id`, `c_gear`, `c_fuel`, `c_color`, `c_purchase_date`, `c_Act_date`, `c_Act_exp`, `c_insurance_date`, `c_insurance_exp`) VALUES
(1, '9กค 9535', 'rx-8', 'Mazda', 2, 'Auto', 'diesel', 'white', '2018-11-25', '2018-11-26', '2019-11-26', '2018-11-27', '2019-11-27'),
(2, 'ฉว 3939', 'Skyline GTR R34', 'Nissan', 2, 'manual', 'bensin', 'blue', '2019-02-05', '2019-02-06', '2020-02-06', '2019-02-07', '2020-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `type_car`
--

CREATE TABLE `type_car` (
  `tc_id` int(11) NOT NULL,
  `tc_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tc_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_car`
--

INSERT INTO `type_car` (`tc_id`, `tc_name`, `create_date`, `tc_status`) VALUES
(1, 'รถกระบะ', '2019-05-03', 'A'),
(2, 'รถเก๋ง', '2019-05-10', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_prefix` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `u_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `u_permit` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `u_department` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_signature` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_prefix`, `u_fname`, `u_lname`, `u_tel`, `u_email`, `u_address`, `username`, `password`, `u_permit`, `u_department`, `u_signature`) VALUES
(1, 'นาย', 'สวนนท์', 'วัฒนสิทธิ์', '0968908467', 'sawanon01@hotmail.com', '', 'addfe90e8ea18f0a60fa0dc1e08ccbc0', 'c8e1f16582433066e2330f93f86736f7', '1', 'IT', 's_1.png'),
(2, 'นาง', 'ยืมรถ', 'หน่อยจ้า', '0854875464', '3bb@coldmail.com', '', '4e02771b55c0041180efc9fca6e04a77', '81dc9bdb52d04dc20036dbd8313ed055', '2', 'Sale', 's_2.png'),
(3, 'นางสาว', 'ขอขับ', 'หน่อยจ้า', '0854541445', 'wingbeabpeetoon@wingmail.com', '', 'e2d45d57c7e2941b65c6ccd64af4223e', '81dc9bdb52d04dc20036dbd8313ed055', '3', 'Driver', ''),
(4, 'นาย', 'ชูศักดิ์', 'หลักกิจเปร่งโปมโนเปร่งปรั่ง', '0954544545', 'test@hotmail.com', '', '098f6bcd4621d373cade4e832627b4f6', '81dc9bdb52d04dc20036dbd8313ed055', '4', 'IT', ''),
(11, 'นาย', 'test1', 'test1', '084565dasd', 'asd@asd', '', '5a105e8b9d40e1329780d62ea2265d8a', '5a105e8b9d40e1329780d62ea2265d8a', '2', 'IT', ''),
(12, 'นางสาว', 'test2', 'test2', '084565fsd5', 'asd@asdpoagf', '', 'ad0234829205b9033196ba818f7a872b', 'ad0234829205b9033196ba818f7a872b', '1', 'Sale', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `fk_applicant_id` (`applicant_id`),
  ADD KEY `fk_driver_id` (`driver_id`),
  ADD KEY `fk_approvers_id` (`approvers_id`),
  ADD KEY `fk_car_id` (`c_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_licenseplate` (`c_licenseplate`),
  ADD KEY `fk_tc_id` (`tc_id`);

--
-- Indexes for table `type_car`
--
ALTER TABLE `type_car`
  ADD PRIMARY KEY (`tc_id`),
  ADD UNIQUE KEY `tc_name` (`tc_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type_car`
--
ALTER TABLE `type_car`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_applicant_id` FOREIGN KEY (`applicant_id`) REFERENCES `user` (`u_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_approvers_id` FOREIGN KEY (`approvers_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `fk_car_id` FOREIGN KEY (`c_id`) REFERENCES `car` (`c_id`),
  ADD CONSTRAINT `fk_driver_id` FOREIGN KEY (`driver_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `fk_tc_id` FOREIGN KEY (`tc_id`) REFERENCES `type_car` (`tc_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
