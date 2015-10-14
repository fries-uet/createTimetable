-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2015 at 05:35 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `createtimetable2`
--

-- --------------------------------------------------------

--
-- Table structure for table `buoihocLT`
--

CREATE TABLE IF NOT EXISTS `buoihocLT` (
  `maLMH` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `viTri` int(10) NOT NULL,
  `soTiet` int(10) NOT NULL,
  `giangDuong` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `giaoVien` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buoihocLT`
--

INSERT INTO `buoihocLT` (`maLMH`, `viTri`, `soTiet`, `giangDuong`, `giaoVien`) VALUES
('FLF1107 15', 5, 3, 'GD2', 'ko biet'),
('FLF1107 15', 9, 2, 'G2', 'ko biet 2');

-- --------------------------------------------------------

--
-- Table structure for table `buoihocTH`
--

CREATE TABLE IF NOT EXISTS `buoihocTH` (
  `maLMH` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nhom` int(10) NOT NULL,
  `viTri` int(10) NOT NULL,
  `soTiet` int(10) NOT NULL,
  `giangDuong` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `giaoVien` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lopMonHoc`
--

CREATE TABLE IF NOT EXISTS `lopMonHoc` (
  `maLMH` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMH` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lopMonHoc`
--

INSERT INTO `lopMonHoc` (`maLMH`, `maMH`) VALUES
('FLF1107 14', 'FLF1107'),
('FLF1107 15', 'FLF1107'),
('FLF1107 16', 'FLF1107');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE IF NOT EXISTS `monhoc` (
  `maMH` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenMH` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soTinChi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`maMH`, `tenMH`, `soTinChi`) VALUES
('FLF1107', 'Tiếng Anh A1', 4),
('FLF1234', 'Tiếng Anh B1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE IF NOT EXISTS `sinhvien` (
  `id_SV` int(20) NOT NULL,
  `tenSV` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien_dangky`
--

CREATE TABLE IF NOT EXISTS `sinhvien_dangky` (
  `id_SV` int(20) NOT NULL,
  `maMH` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maLMH` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nhomTH` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lopMonHoc`
--
ALTER TABLE `lopMonHoc`
  ADD PRIMARY KEY (`maLMH`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`maMH`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id_SV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id_SV` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
