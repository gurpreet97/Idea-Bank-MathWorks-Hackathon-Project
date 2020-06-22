-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 04:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idea_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--
create database idea_bank;
use idea_bank;

CREATE TABLE `comment` (
  `comment_id` varchar(700) NOT NULL,
  `comment_content` text DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `post_id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `name`, `post_id`) VALUES
('1491827905c13db2531ec7a64c226ca8c0846241d30cc30c50bd475c7f88e3a70f33edeac8b72496', 'comment again!', 'neeraj', 'efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5'),
('50b7f55cc86c6a7ef0e9e3faadf405060370108d4fb3586575ccd3eeb4de56f9690f9445342db98d', 'comment', 'neeraj', 'efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5');

-- --------------------------------------------------------

--
-- Table structure for table `contributors`
--

CREATE TABLE `contributors` (
  `post_id` varchar(200) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `contribution` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contributors`
--

INSERT INTO `contributors` (`post_id`, `c_name`, `contribution`) VALUES
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'gagan', 10),
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'gsingh', 10),
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'neeraj', 10),
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'qwerty2', 10),
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'qwerty3', 10),
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'qwerty4', 10),
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'qwerty5', 10),
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'satyam', 10),
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'vashist', 10),
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'vishal', 10),
('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6', 'gagan', 10),
('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6', 'gsingh', 10),
('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6', 'qwerty4', 10),
('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6', 'qwerty5', 10),
('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6', 'satyam', 10),
('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6', 'vishal', 10),
('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37', 'gagan', 10),
('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37', 'gsingh', 10),
('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37', 'neeraj', 10),
('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37', 'qwerty2', 10),
('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37', 'qwerty5', 10),
('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37', 'satyam', 10),
('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37', 'vishal', 10),
('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5', 'gsingh', 10),
('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5', 'qwerty3', 10),
('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5', 'qwerty4', 10),
('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5', 'qwerty5', 10),
('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5', 'satyam', 10),
('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5', 'vishal', 10);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `offer_title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `offer_title`, `description`, `cost`) VALUES
(1, 'Extra Leave', 'Buy this offer by expending 2000 MWPoints and get an extra leave in the next month.', 2000),
(2, 'Amazon Coupon - Rs.100', 'Buy this offer by expending 500 MWPoints and get an AMAZON Gift Coupon worth Rs. 100.', 500),
(3, 'Amazon Coupon - Rs.200', 'Buy this offer by expending 1000 MWPoints and get an AMAZON Gift Coupon worth Rs. 200.', 1000),
(4, 'Amazon Coupon - Rs.500', 'Buy this offer by expending 2500 MWPoints and get an AMAZON Gift Coupon worth Rs. 500.', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` varchar(200) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `current_status` varchar(30) DEFAULT NULL,
  `post_creation_time` datetime DEFAULT NULL,
  `post_text` text DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `post_heading` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `name`, `current_status`, `post_creation_time`, `post_text`, `type`, `post_heading`) VALUES
('2eb49622ac94c554fd6edd521934ed24c1243240f2c1e15f64b0b9f9d10b57e29d648b978f3c306a', 'gsingh', 'Idea proposed', '2020-06-21 07:11:01', 'ikugwf ic rwuee eiugvb ', 'problem', 'My First Problem'),
('895de440e495e7c71e2a5b44e1e3e13164b3a49ab1d822b46a53b41fec3441a04a7849528973f5c6', 'vishal', 'Idea proposed', '2020-06-21 07:09:17', 'rfhg  rgmd bkjfg ', 'idea', 'First Idea'),
('8d2d8acff50195f820c878ab38dd364e4bdedbd18b9dfb928e995dd90adfe0a402642e9e1bfffc37', 'vishal', 'Idea proposed', '2020-06-21 07:09:45', 'kdfjbgv vvoerbivn ne', 'problem', 'Problem 1'),
('efefdea5449b068568bb843e8c35958a3128fea88fb9c82a515671c3b827a7737440c9a22ac3d6b5', 'gsingh', 'Idea proposed', '2020-06-21 07:11:14', 'terdbv  rkuisvnb  roftgibuvls', 'idea', 'Great Idea');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` varchar(260) NOT NULL,
  `username` varchar(50) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `username`, `offer_id`, `cost`, `purchase_date`) VALUES
('02ef3ee095e7253a5ac4d90f568959c7315e1113f17b491b68dfac85f8b37b4c1609c86e652fc501', 'vishal', 2, 500, '2020-06-21'),
('2ad55a23bf9c8ef1217663b4a8c8a84328736899340f06e81d0a1107b03e6709d21b85238f6c4025', 'gsingh', 2, 500, '2020-06-21'),
('ab7fa4a9337e89401266c706137e872ceca065af96ae4fcbd12c0b62c2db9f140e649009a0ab1846', 'gsingh', 2, 500, '2020-06-21'),
('cb382484c03c753824ebd07c534fa88bed25bcc5b7092ee11eb1974f3e91a4eaddd07e9e719cc7d7', 'gsingh', 3, 1000, '2020-06-21'),
('eb99fed1a0fcdab92f033c8e9955b4d93a5e8c67743da413f8e5f051299e691951ad727569230380', 'vishal', 2, 500, '2020-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `MWpoints` int(11) DEFAULT 100,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `MWpoints`, `password`) VALUES
(1, 'vishal', 500, 'vishal'),
(2, 'gsingh', 550, '123'),
(3, 'neeraj', 800, 'neeraj'),
(4, 'vashist', 870, 'vashist'),
(5, 'gagan', 1100, 'gagan'),
(6, 'satyam', 510, 'satyam'),
(7, 'qwerty2', 80, '123'),
(8, 'qwerty3', 80, '123'),
(9, 'qwerty4', 70, '123'),
(10, 'qwerty5', 60, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`post_id`,`c_name`),
  ADD KEY `c_name` (`c_name`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`,`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`name`) REFERENCES `user` (`name`);

--
-- Constraints for table `contributors`
--
ALTER TABLE `contributors`
  ADD CONSTRAINT `contributors_ibfk_1` FOREIGN KEY (`c_name`) REFERENCES `user` (`name`),
  ADD CONSTRAINT `contributors_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`name`) REFERENCES `user` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
