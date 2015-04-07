-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2015 at 04:31 PM
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
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
`id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `maLMH` varchar(40) NOT NULL,
  `nhom` int(11) NOT NULL,
  `viTri` int(11) NOT NULL,
  `soTiet` int(11) NOT NULL,
  `giaoVien` varchar(40) NOT NULL,
  `giangDuong` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `sub_id`, `maLMH`, `nhom`, `viTri`, `soTiet`, `giaoVien`, `giangDuong`) VALUES
(5, 3, 'INT2209 1', 0, 1, 2, 'Trần Trúc Mai', '301-G2'),
(6, 3, 'INT2209 1 1', 1, 34, 2, 'Trần Trúc Mai', '207-G2'),
(7, 4, 'PHI1005 5', 0, 1, 2, 'ĐHQGHN', '3G3'),
(8, 5, 'INT2206 4', 0, 7, 2, 'Nguyễn Hải Châu', '103-G2'),
(9, 6, 'INT1050 3', 0, 16, 2, 'Lê Phê Đô', '308-G2'),
(10, 7, 'INT2208 4', 0, 28, 3, 'Trương Anh Hoàng', '103-G2'),
(11, 8, 'PES1550 49', 0, 36, 2, 'ĐHQGHN', 'Sân bãi'),
(12, 9, 'BSA2202 2', 0, 46, 3, 'ĐHQGHN', '309-GĐ2'),
(13, 10, 'PES1020 40', 0, 3, 2, 'ĐHQGHN', 'Sân bãi'),
(14, 6, 'INT1050 4', 0, 9, 2, 'Đặng Thanh Hải', '103-G2'),
(15, 3, 'INT2209 4', 0, 16, 2, 'Hồ Đắc Phương', '103-G2'),
(16, 3, 'INT2209 4 2', 2, 38, 2, 'Hồ Đắc Phương', '103-G2'),
(17, 4, 'PHI1005 4', 0, 43, 3, 'ĐHQGHN', '3G3'),
(18, 11, 'PES1553 40', 0, 33, 2, 'ĐHQGHN', 'Sân bãi'),
(19, 12, 'FLF1107 4', 0, 22, 3, 'ĐHQGHN', '303-GĐ2'),
(20, 12, 'FLF1107 5', 0, 47, 3, 'ĐHQGHN', '307-GĐ2'),
(21, 12, 'FLF1107 9', 0, 1, 3, 'ĐHQGHN', '307-GĐ2'),
(22, 13, 'INT2203 3', 0, 16, 3, 'Lê Anh Cường', '308-GĐ2'),
(23, 13, 'INT2203 4', 0, 32, 3, 'Lê Bảo Sơn', '303-GĐ2'),
(24, 14, 'INT2202 2', 0, 1, 3, 'Lê Nguyên Khôi', '3G3'),
(25, 14, 'INT2202 2 1', 1, 26, 2, 'Lê Nguyên Khôi', '3G3'),
(26, 14, 'INT2202 2 2', 2, 36, 2, 'Lê Nguyên Khôi', '3G3'),
(27, 14, 'INT2202 2 3', 3, 6, 2, 'Lê Nguyên Khôi', '3G3'),
(28, 15, 'PHY1100 6', 0, 21, 3, 'Hoàng Nam Nhật', '303-G2'),
(29, 15, 'PHY1100 2', 0, 21, 3, 'Hoàng Nam Nhật', '303-G2'),
(30, 15, 'PHY1100 2 2', 2, 21, 3, 'Hoàng Nam Nhật', '303-G2'),
(31, 15, 'PHY1100 2 1', 1, 31, 3, 'Hoàng Nam Nhật', '303-G2'),
(32, 15, 'PHY1100 2 3', 3, 48, 3, 'Hoàng Nam Nhật', '303-G2');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`id` int(11) NOT NULL,
  `maMH` varchar(40) NOT NULL,
  `tenMH` varchar(40) NOT NULL,
  `soTin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `maMH`, `tenMH`, `soTin`) VALUES
(3, 'INT2209', 'Mạng máy tính', 2),
(4, 'PHI1005', 'Nguyên lí Mac-Lenin 2', 2),
(5, 'INT2206', 'Nguyên lí hệ điều hành', 2),
(6, 'INT1050', 'Toán rời rạc', 2),
(7, 'INT2208', 'Công nghệ phần mềm', 3),
(8, 'PES1550', 'Bóng đá', 1),
(9, 'BSA2202', 'Nguyên lí marketing', 1),
(10, 'PES1020', 'Bóng rổ', 1),
(11, 'PES1553', 'Taewondo', 1),
(12, 'FLF1107', 'Tiếng anh B1', 4),
(13, 'INT2203', 'Cấu trúc dữ liệu và giải thuật', 3),
(14, 'INT2202', 'Lập trình nâng cao', 3),
(15, 'PHY1100', ' Cơ - Nhiệt', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
