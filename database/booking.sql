-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2019 at 08:22 AM
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
  `tc_id` int(11) NOT NULL,
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

INSERT INTO `booking` (`b_id`, `applicant_id`, `tc_id`, `c_id`, `b_startdatetime`, `b_enddatetime`, `b_detail`, `driver_id`, `approvers_id`, `b_status`) VALUES
(1, 2, 1, 1, '2019-06-05 09:00', '2019-06-06 12:00', 'ยืมไปขับเล่น', 3, 1, 'A'),
(2, 1, 1, 2, '2019-06-20 08:30', '2019-06-25 11:30', 'ลองจองเก็บรายละเอียด', 3, 1, 'A');

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
  ADD KEY `fk_car_id` (`c_id`),
  ADD KEY `tc_id` (`tc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
