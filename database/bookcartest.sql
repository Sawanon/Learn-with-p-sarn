-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2019 at 04:52 AM
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
(1, 'รถกระบะ', '2019-05-03', 'A');

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
  `u_signature` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_licenseplate` (`c_licenseplate`);

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
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_car`
--
ALTER TABLE `type_car`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
