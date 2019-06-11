-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2019 at 04:08 AM
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
(11, 'นาย', 'test1', 'test1', '084565dasd', 'asd@asd', '', '5a105e8b9d40e1329780d62ea2265d8a', '5a105e8b9d40e1329780d62ea2265d8a', '2', 'IT', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
