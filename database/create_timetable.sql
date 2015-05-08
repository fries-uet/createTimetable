-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2015 at 02:59 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nhom` int(11) NOT NULL,
  `viTri` int(11) NOT NULL,
  `soTiet` int(11) NOT NULL,
  `giangDuong` varchar(40) NOT NULL,
  `giaoVien` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `buoihoc`
--

INSERT INTO `buoihoc` (`id`, `nhom`, `viTri`, `soTiet`, `giangDuong`, `giaoVien`) VALUES
(1, 0, 1, 2, '301-G2', 'Hồ Đắc Phương'),
(2, 1, 34, 2, '207-G2', 'Hồ Đắc Phương'),
(3, 2, 32, 2, '207-G2', 'Đào Minh Thư'),
(4, 0, 28, 3, '103-G2', 'Trương Anh Hoàng'),
(5, 0, 16, 2, '310-G2', 'Lê Phê Đô'),
(6, 0, 33, 2, '301-G2', 'Lê Phê Đô'),
(7, 3, 34, 2, '403-E3', 'Phạm Bảo Sơn');

-- --------------------------------------------------------

--
-- Table structure for table `lopmh`
--

CREATE TABLE IF NOT EXISTS `lopmh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `danhSach` varchar(40) NOT NULL,
  `maLMH` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lopmh`
--

INSERT INTO `lopmh` (`id`, `sub_id`, `danhSach`, `maLMH`) VALUES
(1, 1, '[1,2]', 'INT2209 1'),
(2, 1, '[1,3]', 'INT2209 1'),
(3, 3, '[4]', 'INT2208 4'),
(4, 2, '[5,6]', 'INT1050 3'),
(5, 1, '[1,7]', 'INT2209 1');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE IF NOT EXISTS `monhoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenMH` varchar(40) NOT NULL,
  `maMH` varchar(40) NOT NULL,
  `soTin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`id`, `tenMH`, `maMH`, `soTin`) VALUES
(1, 'Mạng máy tính', 'INT2209', 2),
(2, 'Toán rời rạc', 'INT1050', 2),
(3, 'Công nghệ phần mềm', 'INT2208', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
