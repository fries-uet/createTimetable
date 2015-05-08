-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2015 at 04:09 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `buoihoc`
--

INSERT INTO `buoihoc` (`id`, `nhom`, `viTri`, `soTiet`, `giangDuong`, `giaoVien`) VALUES
(1, 0, 1, 2, '301-G2', 'Hồ Đắc Phương'),
(2, 1, 34, 2, '207-G2', 'Hồ Đắc Phương'),
(3, 2, 32, 2, '207-G2', 'Đào Minh Thư'),
(4, 0, 28, 3, '103-G2', 'Trương Anh Hoàng'),
(5, 0, 16, 2, '310-G2', 'Lê Phê Đô'),
(6, 0, 24, 2, '301-G2', 'Lê Phê Đô'),
(7, 3, 34, 2, '403-E3', 'Phạm Bảo Sơn'),
(8, 0, 6, 3, '103-G2', 'Nguyễn Hải Châu'),
(9, 0, 36, 2, 'ĐHQGHN', 'Sân bãi'),
(10, 0, 33, 2, 'ĐHQGHN', 'Sân bãi'),
(11, 0, 46, 3, '309-GĐ2', 'Hồ Chí Dũng'),
(12, 0, 3, 3, '3-G3', 'Phạm Công Nhất'),
(13, 0, 43, 3, '3-G3', 'ĐHQGHN'),
(14, 0, 21, 4, '304-GĐ2', 'ĐHQGHN'),
(15, 0, 31, 4, '307-GĐ2', 'ĐHQGHN'),
(16, 0, 16, 3, '308-GĐ2', 'Lê Anh Cường'),
(17, 1, 32, 2, '201-G2', 'Lê Anh Cường'),
(18, 2, 32, 2, '207-G2', 'Lê Anh Cường'),
(19, 3, 34, 2, '208-G2', 'Lê Hoàng Quỳnh'),
(20, 0, 1, 3, '3-G3', 'Lê Nguyên Khôi'),
(21, 1, 26, 2, '202-G2', 'Lê Nguyên Khôi'),
(22, 2, 26, 2, '207-G2', 'Lê Nguyên Khôi'),
(23, 3, 6, 2, '208-G2', 'Lê Nguyên Khôi'),
(24, 0, 21, 3, '303-G2', 'Hoàng Nam Nhật'),
(25, 1, 21, 3, '303-G2', 'Hoàng Nam Nhật'),
(26, 2, 31, 3, '303-G2', 'Hoàng Nam Nhật'),
(27, 3, 48, 3, '303-G2', 'Hoàng Nam Nhật');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `lopmh`
--

INSERT INTO `lopmh` (`id`, `sub_id`, `danhSach`, `maLMH`) VALUES
(1, 1, '[1,2]', 'INT2209 1'),
(2, 1, '[1,3]', 'INT2209 1'),
(3, 3, '[4]', 'INT2208 4'),
(4, 2, '[5,6]', 'INT1050 3'),
(5, 1, '[1,7]', 'INT2209 1'),
(6, 8, '[10]', 'PES1553 40'),
(7, 6, '[11]', 'BSA2202 2'),
(8, 4, '[12]', 'PHI1005 5'),
(9, 4, '[13]', 'PHI1005 4'),
(10, 5, '[8]', 'INT2206 4'),
(11, 7, '[9]', 'PES1550 49'),
(12, 9, '[14,15]', 'FLF1107 4'),
(13, 10, '[16,17]', 'INT2203 3'),
(14, 10, '[16,18]', 'INT2203 3'),
(15, 10, '[16,19]', 'INT2203 3'),
(16, 11, '[20,21]', 'INT2202 2'),
(17, 11, '[20,22]', 'INT2202 2'),
(18, 11, '[20,23]', 'INT2202 2'),
(19, 12, '[24,25]', 'PHY1100 2'),
(20, 12, '[24,26]', 'PHY1100 2'),
(21, 12, '[24,27]', 'PHY1100 2');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`id`, `tenMH`, `maMH`, `soTin`) VALUES
(1, 'Mạng máy tính', 'INT2209', 2),
(2, 'Toán rời rạc', 'INT1050', 2),
(3, 'Công nghệ phần mềm', 'INT2208', 3),
(4, 'Nguyên lí Mac-Lenin 2', 'PHI1005', 2),
(5, 'Nguyên lí hệ điều hành', 'INT2206', 2),
(6, 'Nguyên lí marketing', 'BSA2202', 1),
(7, 'Bóng đá', 'PES1550', 1),
(8, 'Taewondo', 'PES1553', 1),
(9, 'Tiếng anh B1', 'FLF1107', 4),
(10, 'Cấu trúc dữ liệu và giải thuật', 'INT2203', 3),
(11, 'Lập trình nâng cao', 'INT2202', 3),
(12, 'Cơ - Nhiệt', 'PHY1100', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
