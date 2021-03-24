-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 فبراير 2019 الساعة 09:32
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smart_buy`
--

-- --------------------------------------------------------

--
-- بنية الجدول `product_info`
--

CREATE TABLE IF NOT EXISTS `product_info` (
`product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_company` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_photo` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `product_info`
--

INSERT INTO `product_info` (`product_id`, `product_name`, `product_company`, `product_type`, `product_price`, `product_description`, `product_photo`) VALUES
(22, 'hsg', 'CISCO', 'Router', 76, 'jhsxsj', 'product_1.png'),
(23, 'shusdh', 'CISCO', 'Router', 767, 'uyuy', 'product_1.png'),
(25, 'rygf', 'HUAWEI', 'Switch', 34, '3r43e', 'product_1.png'),
(26, 'hhg', 'JUNIPER', 'Bridge', 6, '                            hhgh                            ', 'product_1.png');

-- --------------------------------------------------------

--
-- بنية الجدول `sitsetting`
--

CREATE TABLE IF NOT EXISTS `sitsetting` (
  `site_name` varchar(50) NOT NULL,
  `site_link` varchar(300) NOT NULL,
  `site_state` varchar(20) NOT NULL,
  `mess_close` varchar(300) NOT NULL,
  `site_dis` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `sitsetting`
--

INSERT INTO `sitsetting` (`site_name`, `site_link`, `site_state`, `mess_close`, `site_dis`) VALUES
('Sm@rt $Buy', '', 'open', 'Soryy the site close for maintenance', '');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `login_name` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_country` varchar(30) NOT NULL,
  `passowrd` varchar(15) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`user_id`, `login_name`, `first_name`, `last_name`, `user_email`, `user_country`, `passowrd`, `user_type`) VALUES
(3, 'Alia Mohammed', 'alia', 'Mohammed', 'Alia@gmail.com', 'palestin', '123456', 'admin'),
(4, 'zolfa20', 'zolfa', 'alsharfi', 'zolfa35@gmail.com', 'egypt', '123456', 'Subscriber'),
(5, 'nore star', 'nore', 'Ali', 'sd@gmail.com', 'palestin', '123456', 'Subscriber'),
(8, 'HM', 'Hager', 'Mohammed', 'Hagern412@gmail.com', 'egypt', '123456', 'Subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
