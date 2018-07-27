-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 02:30 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proje`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `comment_name` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `comment_body` text COLLATE utf8_persian_ci,
  `post_ID` int(11) NOT NULL,
  PRIMARY KEY (`comment_ID`),
  KEY `post_ID_idx` (`post_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_ID`, `comment_name`, `comment_body`, `post_ID`) VALUES
(13, 'شرکت نرم افزار گستر', 'اگر تمایل به کار در شرکت ما دارید لطفا به پست الکترونیکی بنده پیامی با عنوان "داوود یعقوبی" ارسال کنید.\r\nبا تشکر\r\nmatmot118@gmail.com', 2),
(14, 'دبیرستان سنا', 'اگر تمایل به تدریس در دبیرستان سنا واقع در تهران پارس دارید با شماره 021-26101520 در ساعات کاری تماس بگیرید', 1),
(15, 'سازمان جغرافیای کل کشور', 'بدر صورت تمایل برای استخدام به عنوان کارشناس سازمان می توانید به واحد کارگزینی سازمان واقع در سید خندان مراجعه نمایید', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_ID` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `filepath` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` text COLLATE utf8_persian_ci,
  `post_title` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`post_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_ID`, `filename`, `filepath`, `description`, `post_title`) VALUES
(1, 'alireza.pdf', 'files/alireza.pdf', 'با سلام\r\n بنده ساکن تهران هستم ولی پیشنهاد های کاری در شهر های اطراف تهران هم قبول می کنم', 'علی رضا رحمتی'),
(2, 'davood.pdf', 'files/davood.pdf', 'ضمن عرض سلام\r\nپیشنهاد های کاری مدریتی برای بنده اولویت دارند', 'داوود یعقوبی');

-- --------------------------------------------------------

--
-- Table structure for table `usersystem`
--

CREATE TABLE IF NOT EXISTS `usersystem` (
  `username` varchar(45) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_persian_ci DEFAULT NULL,
  `isAdmin` float DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `usersystem`
--

INSERT INTO `usersystem` (`username`, `password`, `isAdmin`) VALUES
('AmI2', '110118', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `post_ID` FOREIGN KEY (`post_ID`) REFERENCES `post` (`post_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
