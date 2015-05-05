-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2015 at 05:41 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `create_timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `buoihoc`
--

CREATE TABLE IF NOT EXISTS `buoihoc` (
`id` int(11) NOT NULL,
  `nhom` int(11) NOT NULL,
  `viTri` int(11) NOT NULL,
  `soTiet` int(11) NOT NULL,
  `giangDuong` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lopmh`
--

CREATE TABLE IF NOT EXISTS `lopmh` (
`id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `danhSach` varchar(40) NOT NULL,
  `maLMH` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE IF NOT EXISTS `monhoc` (
`id` int(11) NOT NULL,
  `tenMH` varchar(40) NOT NULL,
  `maMH` varchar(40) NOT NULL,
  `soTin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buoihoc`
--
ALTER TABLE `buoihoc`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lopmh`
--
ALTER TABLE `lopmh`
 ADD PRIMARY KEY (`id`,`sub_id`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buoihoc`
--
ALTER TABLE `buoihoc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lopmh`
--
ALTER TABLE `lopmh`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
