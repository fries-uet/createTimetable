-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2015 at 09:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `TIME_TABLE`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`course_id` int(11) NOT NULL,
  `course_name` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(1, 'k54'),
(2, 'k55'),
(3, 'k56'),
(4, 'k57'),
(5, 'k58'),
(6, 'k59');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `subject_id` int(10) NOT NULL,
  `maLMH` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nhom` smallint(6) NOT NULL,
  `viTri` smallint(6) NOT NULL,
  `soTiet` smallint(6) NOT NULL,
  `giaoVien` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `giangDuong` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`subject_id`, `maLMH`, `nhom`, `viTri`, `soTiet`, `giaoVien`, `giangDuong`) VALUES
(1, 'INT2209 1', 0, 1, 2, 'Hồ Đắc Phương', '103-G2'),
(1, 'INT2209 1-1', 1, 14, 2, 'Hồ Đắc Phương', '208-G2'),
(2, 'INT2208 4', 0, 28, 3, 'Trương Anh Hoàng', '103-G2'),
(3, 'INT2206 4', 0, 6, 3, 'Không biết', '103-G2'),
(4, 'INT1050 3', 0, 16, 2, 'Lê Phê Đô', 'G2');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE IF NOT EXISTS `major` (
`major_id` int(11) NOT NULL,
  `major_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `major_name`) VALUES
(1, 'Công Nghệ Thông Tin'),
(2, 'Điện Tử Viễn Thông'),
(3, 'Vật Lí Kĩ Thuật & Công Nghệ Na'),
(4, 'Cơ Học Kĩ Thuật & Tự Động Hoá');

-- --------------------------------------------------------

--
-- Table structure for table `order_lesson`
--

CREATE TABLE IF NOT EXISTS `order_lesson` (
  `subject_id` int(10) unsigned NOT NULL,
`click` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `nhom` smallint(6) NOT NULL,
  `viTri` smallint(6) NOT NULL,
  `soTiet` smallint(6) NOT NULL,
  `giaoVien` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `giangDuong` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`subject_id` int(10) unsigned NOT NULL,
  `maMH` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tenMH` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `soTin` smallint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `maMH`, `tenMH`, `soTin`) VALUES
(1, 'INT2209 1', 'Mạng máy tính', 2),
(2, 'INT2208 4', 'Công nghệ phần mềm', 3),
(3, 'INT2206 4', 'Nguyên lý hệ điều hành', 3),
(4, 'INT1050 3', 'Toán rời rạc', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `pass`, `lastname`, `firstname`, `birth`) VALUES
(1, 'Thành chó', 'thanhnv_580vnu.edu.vn', '123456', 'Nguyễn Văn', 'Thành', '2015-02-15'),
(2, 'tutv_58', 'tutv_58@vnu.edu.vn', '123456', 'Trần Văn', 'Tú', '2014-11-05'),
(3, 'quytm_58', 'quytm_58@vnu.edu.vn', '123456', 'Trần Minh ', 'Quý', '2015-07-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
 ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `order_lesson`
--
ALTER TABLE `order_lesson`
 ADD KEY `subject_id` (`subject_id`), ADD KEY `click` (`click`), ADD KEY `viTri` (`viTri`), ADD KEY `giaoVien` (`giaoVien`), ADD KEY `soTiet` (`soTiet`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_id`), ADD UNIQUE KEY `subject_id_2` (`subject_id`), ADD KEY `subject_id` (`subject_id`), ADD KEY `subject_id_3` (`subject_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_lesson`
--
ALTER TABLE `order_lesson`
MODIFY `click` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subject_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
